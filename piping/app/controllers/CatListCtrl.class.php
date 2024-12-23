<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\CatListForm;

class CatListCtrl {

    private $records;

    public function action_catList() {  
        try {
            $this->records = App::getDB()->select("steel", [
                "gatunek",
                "granicaPlastycznosci",
                "granicaWytrzymalosci",
                "idsteel",
            ]);
            
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        App::getSmarty()->assign('steel', $this->records); 
        App::getSmarty()->display("CatalogueList.tpl");

    }

}
