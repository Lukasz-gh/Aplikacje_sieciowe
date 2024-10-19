<?php
require_once dirname(__FILE__).'/../config.php';

$money = $_REQUEST ['money'];
$years = $_REQUEST ['years'];
$percent = $_REQUEST ['percent'];

if ( ! (isset($money) && isset($years) && isset($percent))) {
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ( $money == "") {
	$messages [] = 'Nie podano kwoty kredytu';
}
if ( $years == "") {
	$messages [] = 'Nie podano okresu kredytowania';
}
if ( $percent == "") {
	$messages [] = 'Nie podano rocznego oprocentowania';
}

if (empty( $messages )) {

	if (! is_numeric( $money )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $years )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}	

	if (! is_numeric( $percent )) {
		$messages [] = 'Trzecia wartość nie jest liczbą całkowitą';
	}	

}

if (empty ( $messages )) {

	$money = intval($money);
	$years = intval($years);
	$percent = floatval($percent);
	
	// kwota kredytu z oprocentowaniem
	$creditAmmount = $money + $money * (($years * $percent) / 100);

	// rata miesieczna
	$result = $creditAmmount / ($years * 12);
}

include 'calc_view.php';