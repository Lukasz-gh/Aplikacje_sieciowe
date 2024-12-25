<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('calcList'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('loginShow',    'LoginCtrl');
Utils::addRoute('login',        'LoginCtrl');
Utils::addRoute('logout',       'LoginCtrl');
Utils::addRoute('userList',     'UserListCtrl',	        ['admin']);
Utils::addRoute('userNew',      'UserEditCtrl',     	['admin']);
Utils::addRoute('userSave',     'UserEditCtrl',	        ['admin']);
Utils::addRoute('userDelete',   'UserEditCtrl',	        ['admin']);
Utils::addRoute('userEdit',     'UserEditCtrl',	        ['admin']);
Utils::addRoute('calcList',     'CalcListCtrl');
Utils::addRoute('calcNew',      'CalcCtrl',             ['admin', 'projectManager', 'engineer', 'expert']);
Utils::addRoute('calcEdit',     'CalcCtrl',             ['admin', 'projectManager', 'engineer', 'expert']);
Utils::addRoute('calcDelete',   'CalcCtrl',             ['admin', 'projectManager', 'engineer', 'expert']);
Utils::addRoute('calcSave',     'CalcCtrl',             ['admin', 'projectManager', 'engineer', 'expert']);
Utils::addRoute('catList',      'CatListCtrl',          ['admin', 'projectManager', 'engineer', 'expert']);


// Utils::addRoute('steelEdit',      'SteelEditCtrl' ['enginner']);
