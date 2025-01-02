<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\FluidListForm;
use app\forms\FluidSearch;

class FluidListCtrl {

    private $records;
    private $form;

    public function __construct() {
        $this->form = new FluidSearch();
    }

    public function validate() {
        $this->form->fluidSearch = ParamUtils::getFromRequest('fluidSearch');
        return !App::getMessages()->isError();
    }

    public function action_fluidList() {  
        $this->validate();

        $search_params = [];
        if (isset($this->form->fluidSearch) && strlen($this->form->fluidSearch) > 0) {
            $search_params['fluid[~]'] = $this->form->fluidSearch . '%'; //
        }

        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }

        $where ["ORDER"] = "fluid";


        try {
            $this->records = App::getDB()->select("fluids", [
                "idfluids",
                "fluid",
                "cisOperacyjne",
                "cisObliczeniowe",
                "tempOperacyjna",
                "tempObliczeniowa",
            ]
            , $where
        );
            
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('fluids', $this->records); 
        App::getSmarty()->display("FluidList.tpl");

    }

}
