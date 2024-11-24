<?php
require_once 'init.php';

getRouter()->setDefaultRoute('calcShow');
getRouter()->setLoginRoute('login');

getRouter()->addRoute('calcShow', 'CalcCtrl', ['banker', 'client', 'manager']);
getRouter()->addRoute('calcCompute', 'CalcCtrl', ['banker', 'client', 'manager']);
getRouter()->addRoute('login', 'LoginCtrl');
getRouter()->addRoute('logout', 'LoginCtrl', ['banker', 'client', 'manager']);

getRouter()->go();