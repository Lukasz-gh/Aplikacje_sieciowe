<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\FluidListForm;

class FluidListCtrl {

    private $records;

    public function action_fluidList() {  
        try {
            $this->records = App::getDB()->select("fluids", [
                "idfluids",
                "fluid",
                "cisOperacyjne",
                "cisObliczeniowe",
                "tempOperacyjna",
                "tempObliczeniowa",
            ]);
            
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        App::getSmarty()->assign('fluids', $this->records); 
        App::getSmarty()->display("FluidList.tpl");

    }

}
