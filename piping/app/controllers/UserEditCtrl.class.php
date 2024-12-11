<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\UserEditForm;

class UserEditCtrl {

    private $form;

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

        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_userNew() {
        $this->generateView();
    }


    //wysiweltenie rekordu do edycji wskazanego parametrem 'id'
    public function action_userEdit() {
        // // 1. walidacja id osoby do edycji
        // if ($this->validateEdit()) {
        //     try {
        //         // 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
        //         $record = App::getDB()->get("person", "*", [
        //             "idperson" => $this->form->id
        //         ]);
        //         // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
        //         $this->form->id = $record['idperson'];
        //         $this->form->name = $record['name'];
        //         $this->form->surname = $record['surname'];
        //         $this->form->birthdate = $record['birthdate'];
        //     } catch (\PDOException $e) {
        //         Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
        //         if (App::getConf()->debug)
        //             Utils::addErrorMessage($e->getMessage());
        //     }
        // }

        // // 3. Wygenerowanie widoku
        // $this->generateView();
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
                App::getDB()->insert("users", [
                    "login" => $this->form->login,
                    "password" => $this->form->password,
                    "idroles" => $this->form->role
                ]);
        //             } else { //za dużo rekordów
        //                 // Gdy za dużo rekordów to pozostań na stronie
        //                 Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
        //                 $this->generateView(); //pozostań na stronie edycji
        //                 exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
        //             }
        //         } else {
        //             //2.2 Edycja rekordu o danym ID
        //             App::getDB()->update("person", [
        //                 "name" => $this->form->name,
        //                 "surname" => $this->form->surname,
        //                 "birthdate" => $this->form->birthdate
        //                     ], [
        //                 "idperson" => $this->form->id
        //             ]);
        //         }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
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
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('userNew.tpl');
    }

}