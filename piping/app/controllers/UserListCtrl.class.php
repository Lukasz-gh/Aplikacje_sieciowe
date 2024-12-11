<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\UserListForm;

class UserListCtrl {


    private $records;


    // public function action_addUser() {
    
    // }

    // public function action_deleteUser() {
    
    // }

    // public function action_changeRole() {
    
    // }

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
        App::getSmarty()->display("userList.tpl");

    }

}
