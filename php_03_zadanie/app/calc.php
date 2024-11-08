<?php
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';

function getParams(&$form) {
	$form['money'] = isset($_REQUEST['money']) ? $_REQUEST['money'] : null;
	$form['years'] = isset($_REQUEST['years']) ? $_REQUEST['years'] : null;
	$form['percent'] = isset($_REQUEST['percent']) ? $_REQUEST['percent'] : null;	
}

function validate(&$form, &$infos, &$messages){
	global $role;
	
	if ( ! (isset($form['money']) && isset($form['years']) && isset($form['percent']))) return false;

	$infos [] = 'Przekazano parametry kredytu.';

	if ( $form['money'] == "") $messages [] = 'Nie podano kwoty kredytu';
	if ( $form['years'] == "") $messages [] = 'Nie podano okresu kredytowania';
	if ( $form['percent'] == "") $messages [] = 'Nie podano rocznego oprocentowania';
	if (count ( $messages ) != 0) return false;
	
	if (! is_numeric( $form['money'] )) $messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	if (! is_numeric( $form['years'] )) $messages [] = 'Druga wartość nie jest liczbą całkowitą';
	if (! is_numeric( $form['percent'] )) $messages [] = 'Trzecia wartość nie jest liczbą';

	if (($form['percent'] != 5) && ($role == 'client')) $messages [] = 'Tylko pracownik banku może zmienić oprocentowanie z 5%';
	if (($form['money'] >= 1000000) && (($role == 'client') || ($role == 'banker'))) $messages [] = 'Tylko manager może obliczyć ratę dla kredytu >= 1 mln PLN';

	if (count ( $messages ) != 0) return false;

	else return true;
}

function calculations(&$form, &$infos, &$messages, &$result){
		$infos [] = 'Przekazane dane zweryfikowano zweryfikowano.';
		$form['money'] = intval($form['money']);
		$form['years'] = intval($form['years']);
		$form['percent'] = floatval($form['percent']);

		// kwota kredytu z oprocentowaniem
		$creditAmmount = $form['money'] + $form['money'] * (($form['years'] * $form['percent']) / 100);

		// rata miesieczna
		$result = $creditAmmount / ($form['years'] * 12);
		$result = round($result, 2);
}

$form = null;
$infos = array();
$messages = array();
$result = null;

getParams($form);
if ( validate($form, $infos, $messages) ) {
	calculations($form, $infos, $messages, $result);
}

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Kalkulator kredytowy');
$smarty->assign('page_header','Szablony Smarty');
$smarty->assign('page_description','Szablonowanie oparte na bibliotece Smarty');

$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('infos',$infos);
$smarty->assign('role',$role);
$smarty->assign('messages',$messages);

$smarty->display(_ROOT_PATH.'/app/calc.html');