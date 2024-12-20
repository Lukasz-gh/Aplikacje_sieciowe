<?php
require_once dirname(__FILE__).'/../../config.php';

require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';

//pobranie parametrów
function getParamsLogin(&$form){
	$form['login'] = isset ($_REQUEST ['login']) ? $_REQUEST ['login'] : null;
	$form['pass'] = isset ($_REQUEST ['pass']) ? $_REQUEST ['pass'] : null;
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validateLogin(&$form, &$messages){
	// sprawdzenie, czy parametry zostały przekazane
	if ( ! (isset($form['login']) && isset($form['pass']))) {
		//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
		return false;
	}

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $form['login'] == "") {
		$messages [] = 'Nie podano loginu';
	}
	if ( $form['pass'] == "") {
		$messages [] = 'Nie podano hasła';
	}

	//nie ma sensu walidować dalej, gdy brak parametrów
	if (count ( $messages ) > 0) return false;

	// sprawdzenie, czy dane logowania są poprawne
	// - takie informacje najczęściej przechowuje się w bazie danych
	//   jednak na potrzeby przykładu sprawdzamy bezpośrednio
	if ($form['login'] == "manager" && $form['pass'] == "manager") {
		session_start();
		$_SESSION['role'] = 'manager';
		return true;
	}

	if ($form['login'] == "banker" && $form['pass'] == "banker") {
		session_start();
		$_SESSION['role'] = 'banker';
		return true;
	}

	if ($form['login'] == "client" && $form['pass'] == "client") {
		session_start();
		$_SESSION['role'] = 'client';
		return true;
	}
	
	$messages [] = 'Niepoprawny login lub hasło';
	return false; 
}

//inicjacja potrzebnych zmiennych
$form = array();
$messages = array();

// pobierz parametry i podejmij akcję
getParamsLogin($form);

if (!validateLogin($form, $messages)) {
	//jeśli błąd logowania to wyświetl formularz z tekstami z $messages
	// include _ROOT_PATH.'/app/security/login.html';
} else {
	header("Location: "._APP_URL);
}

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Kalkulator kredytowy');
$smarty->assign('page_header','Ekran logowania do kalkulatora kredytowego');
$smarty->assign('page_description','Możesz zalogować się jako: manager, banker, client');

$smarty->assign('form', $form);
$smarty->assign('messages', $messages);

$smarty->display(_ROOT_PATH.'/app/security/login.html');