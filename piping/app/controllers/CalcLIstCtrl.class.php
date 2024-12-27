<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\User;
use app\forms\CalcListForm;


class CalcListCtrl {

    private $records;
    private $logins;
    private $roles;
    private $user;
    private $save;
    private $users;
    // public $login;
    // global $role;
    
    // dodać stronnicowanie

    public function action_calcList() {
        try {
            $this->records = App::getDB()->select("calulations", [
                "[>]users" => ["idusers"],
                "[>]steel" => ["idsteel"],
                "[>]diameter" => ["iddiameter"],
                "[>]wallThickness" => ["idwallThickness"],

            ], [
                "cisnienieObliczeniowe",
                "tempObliczeniowa",
                "login",
                "gatunek",
                "idcalulations",
                "wallThickness",
                "real",
                "najmniejszaGrubosc",
                "pocienienie",
                "tolerancjaScianki",
                "korozja",
                "wytrzymaloscZlacza",
                "naprezeniaProjektowe",
            ]);
                
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                 Utils::addErrorMessage($e->getMessage());
        }
    
        $this->user = SessionUtils::loadObject($users, $keep = true);

        App::getSmarty()->assign('calculation', $this->records); 
        App::getSmarty()->assign('user', $this->user);
        // App::getSmarty()->assign('logins', ParamUtils::getFromSession($login)); 


        // $this->save = SessionUtils::loadObject($users, $keep = true)->login;
		

        // $this->logins = SessionUtils::load($login, $keep = true);

        // App::getSmarty()->assign('logins', SessionUtils::load($login, $keep = true)); 
        // App::getSmarty()->assign('roles', ParamUtils::getFromSession($role)); 


        print_r($this->save);
        // App::getSmarty()->assign('role', App::getConf()->roles); 
        App::getSmarty()->display("CalcList.tpl");
    
    }

}
