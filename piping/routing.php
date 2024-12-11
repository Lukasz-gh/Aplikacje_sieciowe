<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('calc'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('calc',         'CalcCtrl');
Utils::addRoute('loginShow',    'LoginCtrl');
Utils::addRoute('login',        'LoginCtrl');
Utils::addRoute('logout',       'LoginCtrl');
Utils::addRoute('userList',     'UserListCtrl',	        ['admin']);
Utils::addRoute('userNew',      'UserEditCtrl',     	['admin']);
Utils::addRoute('userSave',     'UserEditCtrl',	        ['admin']);
Utils::addRoute('userDelete',   'UserEditCtrl',	        ['admin']);

// Utils::addRoute('addUser',      'NewUserCtrl',	    ['admin']);

// Utils::addRoute('calcEdit',       'CalcEditCtrl' ['enginner']);
// Utils::addRoute('steelEdit',      'SteelEditCtrl' ['enginner']);
// Utils::addRoute('addUser',        'UserCtrl',	['admin']);
// Utils::addRoute('editUser',       'UserCtrl',	['admin']);