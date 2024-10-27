<?php
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

function getParams(&$money, &$years, &$percent) {
	$money = isset($_REQUEST['money']) ? $_REQUEST['money'] : null;
	$years = isset($_REQUEST['years']) ? $_REQUEST['years'] : null;
	$percent = isset($_REQUEST['percent']) ? $_REQUEST['percent'] : null;	
}

function validate(&$money, &$years, &$percent, &$messages){
	global $role;
	
	if ( ! (isset($money) && isset($years) && isset($percent))) return false;

	if ( $money == "") $messages [] = 'Nie podano kwoty kredytu';
	if ( $years == "") $messages [] = 'Nie podano okresu kredytowania';
	if ( $percent == "") $messages [] = 'Nie podano rocznego oprocentowania';
	if (count ( $messages ) != 0) return false;
	
	if (! is_numeric( $money )) $messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	if (! is_numeric( $years )) $messages [] = 'Druga wartość nie jest liczbą całkowitą';
	if (! is_numeric( $percent )) $messages [] = 'Trzecia wartość nie jest liczbą';

	if (($percent != 5) && ($role == 'client')) $messages [] = 'Tylko pracownik banku może zmienić oprocentowanie z 5%';
	if (($money >= 1000000) && (($role == 'client') || ($role == 'banker'))) $messages [] = 'Tylko manager może oblczyć ratę dla kredytu >= 1 mln PLN';

	if (count ( $messages ) != 0) return false;

	else return true;
}

function calculations(&$money, &$years, &$percent, &$messages, &$result){
		$money = intval($money);
		$years = intval($years);
		$percent = floatval($percent);

		// kwota kredytu z oprocentowaniem
		$creditAmmount = $money + $money * (($years * $percent) / 100);

		// rata miesieczna
		$result = $creditAmmount / ($years * 12);
}

$money = null;
$years = null;
$percent = null;
$result = null;
$messages = array();

getParams($money, $years, $percent);
if ( validate($money, $years, $percent, $messages) ) {
	calculations($money, $years, $percent, $messages, $result);
}

include 'calc_view.php';