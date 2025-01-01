<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\SessionUtils;
use core\Validator;
use app\forms\User;
use app\forms\LoginForm;

class LoginCtrl {

    private $form;
    private $records;
    private $roles;
    private $role;

    public function __construct() {
        $this->form = new LoginForm();
    }

    public function validate() {
        $v = new Validator();

        $this->form->login = $v->validateFromRequest('login', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Podaj login',
        ]);

        $this->form->pass = $v->validateFromRequest('pass', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Nie podano hasła',
        ]);

        if (App::getMessages()->isError())
            return false;

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
            // SessionUtils::store($role, $this->role);

            SessionUtils::storeObject($users, $user);
            RoleUtils::addRole($this->role);
            
            Utils::addInfoMessage('Poprawnie zalogowano do systemu');
            App::getRouter()->redirectTo("calcList");
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