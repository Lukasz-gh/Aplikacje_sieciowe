<?php
require_once 'init.php';

getConf()->login_action = 'login';

switch ($action) {
	default :
		control('app\\controllers', 'CalcCtrl',	'generateView', ['banker','client', 'manager']);
	case 'login': 
		control('app\\controllers', 'LoginCtrl', 'doLogin');
	case 'calcCompute' : 
		control(null, 'CalcCtrl', 'process', ['banker','client', 'manager']);
	case 'logout' : 
		control(null, 'LoginCtrl', 'doLogout', ['banker','client', 'manager']);
}