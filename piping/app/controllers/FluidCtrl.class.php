<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\FluidEditForm;

class FluidCtrl {

    private $form;

    public function __construct() {
        $this->form = new FluidEditForm();
    }

    public function validateSave() {
        $this->form->idfluids = ParamUtils::getFromRequest('idfluids', true, 'Błędne wywołanie aplikacji');
        $this->form->fluid = ParamUtils::getFromRequest('fluid', true, 'Błędne wywołanie aplikacji');
        $this->form->cisOperacyjne = ParamUtils::getFromRequest('cisOperacyjne', true, 'Błędne wywołanie aplikacji');
        $this->form->cisObliczeniowe = ParamUtils::getFromRequest('cisObliczeniowe', true, 'Błędne wywołanie aplikacji');
        $this->form->tempOperacyjna = ParamUtils::getFromRequest('tempOperacyjna', true, 'Błędne wywołanie aplikacji');
        $this->form->tempObliczeniowa = ParamUtils::getFromRequest('tempObliczeniowa', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        if (empty(trim($this->form->fluid))) {
            Utils::addErrorMessage('Wprowadź nazwę płynu');
        }
        if (empty(trim($this->form->cisObliczeniowe))) {
            Utils::addErrorMessage('Wprowadź ciśnienie obliczeniowe');
        }
        if (empty(trim($this->form->tempObliczeniowa))) {
            Utils::addErrorMessage('Wprowadź temperaturę obliczeniową');
        }
        if (!is_numeric($this->form->tempObliczeniowa)) {
            Utils::addErrorMessage('Temperatura obliczeniowa musi być wartością liczbową');
        }
        if (!is_numeric($this->form->tempOperacyjna)) {
            Utils::addErrorMessage('Temperatura operacyjna musi być wartością liczbową');
        }
        if (!is_numeric($this->form->cisOperacyjne)) {
            Utils::addErrorMessage('Ciśnienie operacyjne musi być wartością liczbową');
        }
        if (!is_numeric($this->form->cisObliczeniowe)) {
            Utils::addErrorMessage('Ciśnienie obliczeniowe musi być wartością liczbową');
        }
        if (($this->form->cisObliczeniowe) < 0) {
            Utils::addErrorMessage('Ciśnienie musi być powyżej ciśnienie otoczenia');
        }

        if (App::getMessages()->isError())
            return false;

        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->idfluids = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_fluidNew() {
        $this->generateView();
    }

    public function action_fluidEdit() {
        if ($this->validateEdit()) {
            try {
                $record = App::getDB()->get("fluids", "*", [
                    "idfluids" => $this->form->idfluids
                ]);
                $this->form->idfluids = $record['idfluids'];
                $this->form->fluid = $record['fluid'];
                $this->form->cisOperacyjne = $record['cisOperacyjne'];
                $this->form->cisObliczeniowe = $record['cisObliczeniowe'];
                $this->form->tempOperacyjna = $record['tempOperacyjna'];
                $this->form->tempObliczeniowa = $record['tempObliczeniowa'];

                Utils::addInfoMessage('Pomyślnie odczytano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        } 

        $this->generateView();
    }

    public function action_fluidDelete() {
        if ($this->validateEdit()) {
                try {
                    App::getDB()->delete("fluids", [
                        "idfluids" => $this->form->idfluids
                    ]);

                    Utils::addInfoMessage('Pomyślnie usunięto rekord');
                } catch (\PDOException $e) {
                    Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                    if (App::getConf()->debug)
                        Utils::addErrorMessage($e->getMessage());
                }
        }

        App::getRouter()->forwardTo('fluidList');
    }

    public function action_fluidSave() {
        if ($this->validateSave()) {
            try {
                if ($this->form->idfluids == '') {
                    App::getDB()->insert("fluids", [
                        "fluid" => $this->form->fluid,
                        "cisOperacyjne" => $this->form->cisOperacyjne,
                        "cisObliczeniowe" => $this->form->cisObliczeniowe,
                        "tempOperacyjna" => $this->form->tempOperacyjna,
                        "tempObliczeniowa" => $this->form->tempObliczeniowa,
                    ]);
                    Utils::addInfoMessage('Pomyślnie zapisano rekord');
                } else {
                    App::getDB()->update("fluids", [
                        "fluid" => $this->form->fluid,
                        "cisOperacyjne" => $this->form->cisOperacyjne,
                        "cisObliczeniowe" => $this->form->cisObliczeniowe,
                        "tempOperacyjna" => $this->form->tempOperacyjna,
                        "tempObliczeniowa" => $this->form->tempObliczeniowa,
                        ], [
                        "idfluids" => $this->form->idfluids
                        ]);
                }
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
            App::getRouter()->forwardTo('fluidNew');
        } else {
            $this->generateView();
        }
    }

    public function generateView() {

        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('fluidNew.tpl');
    }

}