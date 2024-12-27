<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\Validator;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\CalcEditForm;


class CalcCtrl {

    private $form;
    private $records;
    private $idusers;
    private $save;

    public function __construct() {
        $this->form = new CalcEditForm();
    }

    public function validateSave() {
        $this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacji');
        $this->form->cisObliczeniowe = ParamUtils::getFromRequest('cisObliczeniowe', true, 'Błędne wywołanie aplikacji');
        $this->form->tempObliczeniowa = ParamUtils::getFromRequest('tempObliczeniowa', true, 'Błędne wywołanie aplikacji');
        $this->form->korozja = ParamUtils::getFromRequest('korozja', true, 'Błędne wywołanie aplikacji');
        $this->form->pocienienie = ParamUtils::getFromRequest('pocienienie', true, 'Błędne wywołanie aplikacji');
        $this->form->wytrzymaloscZlacza = ParamUtils::getFromRequest('wytrzymaloscZlacza', true, 'Błędne wywołanie aplikacji');
        $this->form->idSteel = ParamUtils::getFromRequest('idSteel', true, 'Błędne wywołanie aplikacji');
        $this->form->idDiameter = ParamUtils::getFromRequest('idDiameter', true, 'Błędne wywołanie aplikacji');
        $this->form->idWallThickness = ParamUtils::getFromRequest('idWallThickness', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        if (empty(trim($this->form->cisObliczeniowe))) {
            Utils::addErrorMessage('Wprowadź ciśnienie obliczeniowe');
        }
        if (!is_numeric($this->form->cisObliczeniowe)) {
            Utils::addErrorMessage('Ciśnienie obliczeniowe nie jest liczbą');
        }
        if (empty(trim($this->form->tempObliczeniowa))) {
            Utils::addErrorMessage('Wprowadź temperaturę obliczeniową');
        }
        if (!is_numeric($this->form->tempObliczeniowa)) {
            Utils::addErrorMessage('Temperatura obliczeniowa nie jest liczbą');
        }
        if (empty(trim($this->form->korozja))) {
            Utils::addErrorMessage('Wprowadź naddatek na korozje');
        }
        if (!is_numeric($this->form->korozja)) {
            Utils::addErrorMessage('Naddatek na korozje nie jest liczbą');
        }
        if (empty(trim($this->form->wytrzymaloscZlacza))) {
            Utils::addErrorMessage('Wprowadź wytrzymałość złącza');
        }
        if (!is_numeric($this->form->wytrzymaloscZlacza)) {
            Utils::addErrorMessage('Wytrzymałość złącza nie jest liczbą');
        }
        if (($this->form->wytrzymaloscZlacza) > 1) {
            Utils::addErrorMessage('Wytrzymałość złącza nie możę być większe od 1');
        }
        if (empty(trim($this->form->pocienienie))) {
            Utils::addErrorMessage('Wprowadź pocienienie ścianki');
        }
        if (!is_numeric($this->form->pocienienie)) {
            Utils::addErrorMessage('Pocieninie ścianki nie jest liczbą');
        }

        if (App::getMessages()->isError())
            return false;

        return !App::getMessages()->isError();
    }

	public function calcCompute(){

        $granicaPlastycznosci;
        $granicaWytrzymalosci;
        $gruboscScianki;
        $srednicaRury;

        if ($this->validateSave()) {
            try {
                $this->records = App::getDB()->select("steel", [
                    "granicaPlastycznosci",
                    "granicaWytrzymalosci",
                    ], [
                    "idSteel" => $this->form->idSteel,
                ]);

                $granicaWytrzymalosci = $this->records[0]['granicaWytrzymalosci'];
                $granicaPlastycznosci = $this->records[0]['granicaPlastycznosci'];

                $this->records = App::getDB()->select("diameter", [
                    "real",
                    ], [
                    "idDiameter" => $this->form->idDiameter,
                ]);

                $srednicaRury = $this->records[0]['real'];

                $this->records = App::getDB()->select("wallthickness", [
                    "wallThickness",
                    ], [
                    "idWallThickness" => $this->form->idWallThickness,
                ]);

                $gruboscScianki = $this->records[0]['wallThickness'];

                Utils::addInfoMessage('Pomyślnie odczytano rekordy');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

        if ($granicaPlastycznosci / 1.5 > $granicaWytrzymalosci / 2.4) {
            $this->form->naprezeniaProjekowe = $granicaWytrzymalosci / 2.4;
        } else {
            $this->form->naprezeniaProjekowe = $granicaPlastycznosci / 1.5;
        }
        Utils::addInfoMessage('Granice wytrzymałości do obliczeń = '.$this->form->naprezeniaProjekowe);


        if($gruboscScianki * 0.125 > 0.4) {
            $this->form->tolerancjaScianki = $gruboscScianki * 0.125;
        } else {
            $this->form->tolerancjaScianki = 0.4;
        }
        Utils::addInfoMessage('Tolerancja ścianki = '.$this->form->tolerancjaScianki);

        $this->form->najmniejszaGrubosc = round(($this->form->cisObliczeniowe * $srednicaRury / (2 * $this->form->naprezeniaProjekowe * $this->form->wytrzymaloscZlacza + $this->form->cisObliczeniowe)
            + ($this->form->korozja + $this->form->pocienienie + $this->form->najmniejszaGrubosc)), 2);

        Utils::addInfoMessage('Najmniejszą grubości ścianki = '.$this->form->najmniejszaGrubosc);

        if ($this->form->najmniejszaGrubosc > $gruboscScianki)
            Utils::addErrorMessage('Zamówieniowa grubość ścianki jest mniejsza niż obliczona');

        if (App::getMessages()->isError())
            return false;

        return !App::getMessages()->isError();
    }
}
    
    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

	public function action_calcEdit(){
        if ($this->validateEdit()) {
            try {
                $record = App::getDB()->get("calulations", "*", [
                    "idcalulations" => $this->form->id
                ]);
                $this->form->id = $record['idcalulations'];
                $this->form->cisObliczeniowe = $record['cisnienieObliczeniowe'];
                $this->form->tempObliczeniowa = $record['tempObliczeniowa'];
                $this->form->wytrzymaloscZlacza = $record['wytrzymaloscZlacza'];
                $this->form->korozja = $record['korozja'];
                $this->form->pocienienie = $record['pocienienie'];
                // $this->form->idUser = $record['idUser'];
                $this->form->idSteel = $record['idsteel'];
                $this->form->idDiameter = $record['iddiameter'];
                $this->form->idWallThickness = $record['iddiameter'];


            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        $this->generateView();
    }

    public function getUser() {
        $this->save = SessionUtils::loadObject($users, $keep = true)->login;
        try {
            $this->idusers = App::getDB()->select("users", [
                "idusers",
                ], [
                "login" => $this->save
            ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

    }

	public function action_calcDelete(){
        if ($this->validateEdit()) {
            try {
                App::getDB()->delete("calulations", [
                    "idcalulations" => $this->form->id,
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        App::getRouter()->forwardTo('calcList');
    }

    public function action_calcNew() {
        $this->generateView();
    }

    public function action_calcSave() {
        if ($this->calcCompute()) {
            try { 
                $this->getUser();
                App::getDB()->insert("calulations", [
                    "cisnienieObliczeniowe" => $this->form->cisObliczeniowe,
                    "tempObliczeniowa" => $this->form->tempObliczeniowa,
                    "naprezeniaProjektowe" => $this->form->naprezeniaProjekowe,
                    "wytrzymaloscZlacza" => $this->form->wytrzymaloscZlacza,
                    "korozja" => $this->form->korozja,
                    "tolerancjaScianki" => $this->form->tolerancjaScianki,
                    "pocienienie" => $this->form->pocienienie,
                    "najmniejszaGrubosc" => $this->form->najmniejszaGrubosc,
                    "idusers" => $this->idusers[0]['idusers'],
                    "idsteel" => $this->form->idSteel,
                    "iddiameter" => $this->form->idDiameter,
                    "idwallThickness" => $this->form->idWallThickness,

                ]);
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            App::getRouter()->forwardTo('calcNew');
        } else {
            $this->generateView();
        }

    }

    public function generateView() {

        // $this->user = SessionUtils::loadObject($users, $keep = true);




        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('CalcNew.tpl');
    }

}
