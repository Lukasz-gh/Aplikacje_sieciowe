<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\ParamUtils;
use app\forms\CalcListForm;

class CalcListCtrl {

    private $records;
    
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
    
        App::getSmarty()->assign('calculation', $this->records); 
        App::getSmarty()->display("CalcList.tpl");
    
    }

}
