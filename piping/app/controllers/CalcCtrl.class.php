<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\Validator;
use core\ParamUtils;
use app\forms\CalcEditForm;


class CalcCtrl {

    private $form;
    private $records;

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
        $this->form->idDiamater = ParamUtils::getFromRequest('idDiamater', true, 'Błędne wywołanie aplikacji');
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
        $idScianki = $this->form->idWallThickness;
        $idStali = $this->form->idSteel;
        $idSrednicy = $this->form->idDiamater;

        if ($this->validateSave()) {
            try {
                $granicaPlastycznosci = App::getDB()->select("steel", "*", [
                    "granicaPlastycznosci",
                    ], [
                    "idSteel" == $idStali,
                ]);
                $granicaWytrzymalosci = App::getDB()->select("steel", "*", [
                    "granicaWytrzymalosci",
                    ], [
                    "idSteel" == $idStali,
                ]);
                $srednicaRury = App::getDB()->select("diameter", "*", [
                    "real",
                    ], [
                    "idSteel" == $idSrednicy,
                ]);
                $gruboscScianki = App::getDB()->select("wallthickness", "*", [
                    "wallThickness",
                    ], [
                    "idWallThickness" == $idScianki,
                ]);


                Utils::addInfoMessage('Pomyślnie odczytano rekordy');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

        // if ($granicaPlastycznosci(0) / 1.5 > $granicaWytrzymalosci(0) / 2.4) {
        //     $this->form->naprezeniaProjekowe = $granicaWytrzymalosci / 2.4;
        // } else {
        //     $this->form->naprezeniaProjekowe = $granicaPlastycznosci / 1.5;
        // }
        $this->form->naprezeniaProjekowe = 200;
        Utils::addInfoMessage('Pomyślnie granice wytrzymałości = '.$this->form->naprezeniaProjekowe);

        // if($gruboscScianki * 0.2 > 0.5) {
        //     $this->form->najmniejszaGrubosc = $gruboscScianki * 0.2;
        // } else {
        //     $this->form->najmniejszaGrubosc = 0.5;
        // }
        $this->form->tolerancjaScianki = 0.5;
        Utils::addInfoMessage('Tolerancja ścianki ścianki = '.$this->form->tolerancjaScianki);

        // $this->form->najmniejszaGrubosc = $this->form->cisObliczeniowe * $srednicaRury * (2 * $this->form->naprezeniaProjekowe * $this->form->wytrzymaloscZlacza + $this->form->cisObliczeniowe)
        //     + $this->form->korozja + $this->form->pocienienie + $this->form->najmniejszaGrubosc;

        $this->form->najmniejszaGrubosc = 1;
        Utils::addInfoMessage('Najmniejszą grubości ścianki = '.$this->form->najmniejszaGrubosc);


        $gruboscScianki = 3;
        Utils::addInfoMessage('grubości ścianki = '.$gruboscScianki);


        if ($this->form->najmniejszaGrubosc > $gruboscScianki)
            Utils::addErrorMessage('Zamówieniowa grubość ścianki jest mniejsza niż obliczona');


        if (App::getMessages()->isError())
            return false;

        return !App::getMessages()->isError();


    }
}
    

	public function action_calcEdit(){
    
    }


	public function action_calcDelete(){
    
    }

    public function action_calcNew() {
        $this->generateView();
    }


    public function action_calcSave() {
        // $this->calcCompute();
        
        if ($this->calcCompute()) {
            try { 
                App::getDB()->insert("calulations", [
                    "cisnienieObliczeniowe" => $this->form->cisObliczeniowe,
                    "tempObliczeniowa" => $this->form->tempObliczeniowa,
                    "naprezeniaProjektowe" => $this->form->naprezeniaProjekowe,
                    "wytrzymaloscZlacza" => $this->form->wytrzymaloscZlacza,
                    "korozja" => $this->form->korozja,
                    "tolerancjaScianki" => $this->form->tolerancjaScianki,
                    "pocienienie" => $this->form->pocienienie,
                    "najmniejszaGrubosc" => $this->form->najmniejszaGrubosc,
                    "idusers" => 101,
                    "idsteel" => $this->form->idSteel,
                    "iddiameter" => $this->form->idDiamater,
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
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('CalcNew.tpl');
    }

}
