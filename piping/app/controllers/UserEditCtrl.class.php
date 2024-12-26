<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\UserEditForm;

class UserEditCtrl {

    private $form;
    private $roles;

    public function __construct() {
        $this->form = new UserEditForm();
    }

    public function validateSave() {
        $this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacji');
        $this->form->login = ParamUtils::getFromRequest('login', true, 'Błędne wywołanie aplikacji');
        $this->form->password = ParamUtils::getFromRequest('password', true, 'Błędne wywołanie aplikacji');
        $this->form->role = ParamUtils::getFromRequest('role', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        if (empty(trim($this->form->login))) {
            Utils::addErrorMessage('Wprowadź login');
        }
        if (empty(trim($this->form->password))) {
            Utils::addErrorMessage('Wprowadź hasło');
        }
        if (empty(trim($this->form->role))) {
            Utils::addErrorMessage('Wprowadź role');
        }

        if (App::getMessages()->isError())
            return false;

        if ($this->form->id == '') {
            if(
                $records = App::getDB()->select("users", [
                    "login",
                ], [
                    "login" => $this->form->login,
                ])
                ) {
                    Utils::addErrorMessage('Istniejej już użytkownik o takim loginie');
                    return false;
                }
        }

        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_userNew() {
        $this->generateView();
    }

    public function getRolesForm() {
        try {
            $this->roles = App::getDB()->select("roles", [
                "idroles",
                "roles",
                ]
            );
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
    }

    public function action_userEdit() {
        if ($this->validateEdit()) {
            try {
                $record = App::getDB()->get("users", "*", [
                    "idusers" => $this->form->id
                ]);
                $this->form->id = $record['idusers'];
                $this->form->login = $record['login'];
                $this->form->password = $record['password'];
                $this->form->role = $record['idroles'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        $this->generateView();
    }

    public function action_userDelete() {
        if ($this->validateEdit()) {
            try {
                App::getDB()->delete("users", [
                    "idusers" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        App::getRouter()->forwardTo('userList');
    }

    public function action_userSave() {
        if ($this->validateSave()) {
            try {
                if ($this->form->id == '') {
                    App::getDB()->insert("users", [
                        "login" => $this->form->login,
                        "password" => $this->form->password,
                        "idroles" => $this->form->role
                    ]);
                    Utils::addInfoMessage('Pomyślnie zapisano rekord');
                } else {
                    App::getDB()->update("users", [
                        "login" => $this->form->login,
                        "password" => $this->form->password,
                        "idroles" => $this->form->role
                        ], [
                        "idusers" => $this->form->id
                        ]);
                }
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
            App::getRouter()->forwardTo('userList');
        } else {
            $this->generateView();
        }
    }

    public function generateView() {
        $this->getRolesForm();
        // print_r($this->roles);
        App::getSmarty()->assign('roles', $this->roles);
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('userNew.tpl');
    }

}