<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\UserListForm;

class UserListCtrl {

    private $records;
    private $login;

    // dodać stronnicowanie

    // $login = SessionUtils::load($login, $keep = true);

    public function action_userList() {  
        try {
            $this->records = App::getDB()->select("users", [
                "[>]roles" => "idroles"
            ], [
                "login",
                "password",
                "roles",
                "idusers",
            ]);
            
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        App::getSmarty()->assign('people', $this->records); 
        // App::getSmarty()->assign('login', SessionUtils::load($login, $keep = true)); 
        App::getSmarty()->display('UserList.tpl');

    }

}