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
    private $diameters;
    private $wallThicknesses;
    private $steels;
    private $diametersEdit;
    private $wallThicknessesEdit;
    private $steelsEdit;
    private $fluids;

    public function __construct() {
        $this->form = new CalcEditForm();
    }

    public function validateSave() {
        $this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacji');
        $this->form->idfluids = ParamUtils::getFromRequest('idfluids', true, 'Błędne wywołanie aplikacji');
        $this->form->idSteel = ParamUtils::getFromRequest('idSteel', true, 'Błędne wywołanie aplikacji');
        $this->form->idDiameter = ParamUtils::getFromRequest('idDiameter', true, 'Błędne wywołanie aplikacji');
        $this->form->idWallThickness = ParamUtils::getFromRequest('idWallThickness', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        $v = new Validator();

        $this->form->korozja = $v->validateFromRequest('korozja', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Wprowadź naddatek na korozje',
            'numeric' => true,
            'validator_message' => 'Naddatek na korozje nie jest wartością liczbową',
        ]);

        $this->form->pocienienie = $v->validateFromRequest('pocienienie', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Wprowadź pocienienie ścianki',
            'numeric' => true,
            'validator_message' => 'Pocienienie ścianki nie jest wartością liczbową',
        ]);

        $this->form->wytrzymaloscZlacza = $v->validateFromRequest('wytrzymaloscZlacza', [
            'trim' => true,
            'required' => true,
            'required_message' => 'WWprowadź wytrzymałość złącza',
            'numeric' => true,
            'validator_message' => 'Wytrzymałość złącza ścianki nie jest wartością liczbową',
            'max' => 1,
            'min' => 0.7,
            'validator_message' => 'Wytrzymałość złącza może być w zakresie 0,7 do 1',       
        ]);

        if (App::getMessages()->isError())
            return false;

        return !App::getMessages()->isError();
    }

	public function calcCompute(){

        $cisObliczeniowe;
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

                $this->records = App::getDB()->select("fluids", [
                    "cisObliczeniowe",
                    ], [
                    "idfluids" => $this->form->idfluids,
                ]);

                $cisObliczeniowe = $this->records[0]['cisObliczeniowe'];

                Utils::addInfoMessage('Pomyślnie odczytano rekordy');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

        if ($granicaPlastycznosci / 1.5 > $granicaWytrzymalosci / 2.4) {
            $this->form->naprezeniaProjekowe = round($granicaWytrzymalosci / 2.4, 2);
        } else {
            $this->form->naprezeniaProjekowe = round($granicaPlastycznosci / 1.5, 2);
        }
        Utils::addInfoMessage('Granice wytrzymałości do obliczeń = '.$this->form->naprezeniaProjekowe);

        if($gruboscScianki * 0.125 > 0.4) {
            $this->form->tolerancjaScianki = $gruboscScianki * 0.125;
        } else {
            $this->form->tolerancjaScianki = 0.4;
        }
        Utils::addInfoMessage('Tolerancja ścianki = '.$this->form->tolerancjaScianki);

        $this->form->najmniejszaGrubosc = round(($cisObliczeniowe * $srednicaRury / (2 * $this->form->naprezeniaProjekowe * $this->form->wytrzymaloscZlacza + $cisObliczeniowe)
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
                $this->form->idfluids = $record['idfluids'];
                // $this->form->cisObliczeniowe = $record['cisnienieObliczeniowe'];
                // $this->form->tempObliczeniowa = $record['tempObliczeniowa'];
                $this->form->wytrzymaloscZlacza = $record['wytrzymaloscZlacza'];
                $this->form->korozja = $record['korozja'];
                $this->form->pocienienie = $record['pocienienie'];
                // $this->form->idUser = $record['idUser'];
                $this->form->idSteel = $record['idsteel'];
                $this->form->idDiameter = $record['iddiameter'];
                $this->form->idWallThickness = $record['idwallThickness'];


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

    public function getDbData() {
        try {
            $this->diameters = App::getDB()->select("diameter", [
                "iddiameter",
                "real",
                ]);

            $this->wallThicknesses = App::getDB()->select("wallThickness", [
                "idwallThickness",
                "wallThickness",
                ]);

            $this->steels = App::getDB()->select("steel", [
                "idsteel",
                "gatunek",
                ]);

            $this->fluids = App::getDB()->select("fluids", [
                "idfluids",
                "fluid",
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
                if ($this->form->id == '') {
                    App::getDB()->insert("calulations", [
                        // "cisnienieObliczeniowe" => $this->form->cisObliczeniowe,
                        // "tempObliczeniowa" => $this->form->tempObliczeniowa,
                        "idfluids" => $this->form->idfluids,
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
                } else {
                    App::getDB()->update("calulations", [
                        // "cisnienieObliczeniowe" => $this->form->cisObliczeniowe,
                        // "tempObliczeniowa" => $this->form->tempObliczeniowa,
                        "idfluids" => $this->form->idfluids,
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
                    ], [
                        "idcalulations" => $this->form->id,
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            App::getRouter()->forwardTo('calcList');
        } else {
            $this->generateView();
        }

    }
    public function generateView() {

        // $this->user = SessionUtils::loadObject($users, $keep = true);

        $this->getDbData();
        App::getSmarty()->assign('diameters', $this->diameters);
        App::getSmarty()->assign('wallThicknesses', $this->wallThicknesses);
        App::getSmarty()->assign('steels', $this->steels);
        App::getSmarty()->assign('fluids', $this->fluids);
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('CalcNew.tpl');
    }

}
