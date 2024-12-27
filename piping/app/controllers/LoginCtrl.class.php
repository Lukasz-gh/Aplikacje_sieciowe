<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\User;
use app\forms\LoginForm;

class LoginCtrl {

    private $form;
    private $records;
    private $roles;
    private $role;

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new LoginForm();
    }

    public function validate() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass = ParamUtils::getFromRequest('pass');

        //nie ma sensu walidować dalej, gdy brak parametrów
        if (!isset($this->form->login))
            return false;

        // sprawdzenie, czy potrzebne wartości zostały przekazane
        if (empty($this->form->login)) {
            Utils::addErrorMessage('Nie podano loginu');
        }
        if (empty($this->form->pass)) {
            Utils::addErrorMessage('Nie podano hasła');
        }

        //nie ma sensu walidować dalej, gdy brak wartości
        if (App::getMessages()->isError())
            return false;

        // sprawdzenie, czy dane logowania poprawne
        if ($this->checkDB()) {

        } else {
            Utils::addErrorMessage('Niepoprawny login lub hasło');
            return false;
        }

        return !App::getMessages()->isError();
    }

    public function checkDB() {
        try {      
            if(
                $this->records = App::getDB()->select("users", [
                    "login",
                    "password",
                    "active",
                ], [
                    "login" => $this->form->login,
                    "password" => $this->form->pass,
                ])
            ) {
                if($this->records[0]['active'] == 2){
                    Utils::addInfoMessage('Dane poprawne');
                    $this->getRole();
                    return true;
                }
                else {
                    Utils::addErrorMessage('Użytkownik ma nieaktywne konto');
                    return false;
                }
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
    }

    public function getRole() {
        try {
            $this->roles = App::getDB()->select("users", [
                "[>]roles" => "idroles"
            ], [
                "roles[String]",
            ], [
                "login" => $this->form->login,
            ]);

            $this->role = $this->roles[0]['roles'];
            Utils::addInfoMessage('Rola odczytana');

        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
    }

    public function action_loginShow() {
        $this->generateView();
    }

    public function action_login() {
        if ($this->validate()) {
            //zalogowany => przekieruj na główną akcję (z przekazaniem messages przez sesję)
            $user = new User($this->form->login, $this->role);

            // SessionUtils::store($login, $this->form->login);
            // SessionUtils::store($login, $this->role);

            SessionUtils::storeObject($users, $user);
            RoleUtils::addRole($this->role);
            
            Utils::addInfoMessage('Poprawnie zalogowano do systemu');
            App::getRouter()->redirectTo("calc");
        } else {
            //niezalogowany => pozostań na stronie logowania
            $this->generateView();
        }
    }

    public function action_logout() {
        // 1. zakończenie sesji
        session_destroy();
        // 2. idź na stronę główną - system automatycznie przekieruje do strony logowania
        App::getRouter()->redirectTo('login');
    }

    public function generateView() {
        
        App::getSmarty()->assign('roles', $this->roles); 
        // App::getSmarty()->assign('users', $this->records); 


        App::getSmarty()->assign('form', $this->form); // dane formularza do widoku
        App::getSmarty()->display('Login.tpl');
    }

}