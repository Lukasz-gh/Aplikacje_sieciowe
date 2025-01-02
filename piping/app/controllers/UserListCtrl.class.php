<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\UserSearch;

class UserListCtrl {

    private $form;
    private $records;

    public function __construct() {
        $this->form = new UserSearch();
    }

    public function validate() {
        $this->form->loginSearch = ParamUtils::getFromRequest('loginSearch');
        return !App::getMessages()->isError();
    }


    public function action_userList() {  
        $this->validate();

        $search_params = [];
        if (isset($this->form->loginSearch) && strlen($this->form->loginSearch) > 0) {
            $search_params['login[~]'] = $this->form->loginSearch . '%'; //
        }

        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }

        $where ["ORDER"] = "login";

        try {
            $this->records = App::getDB()->select("users", [
                "[>]roles" => "idroles"
            ], [
                "login",
                "password",
                "roles",
                "active",
                "idusers",
            ]
            , $where
        );
            
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('people', $this->records); 
        App::getSmarty()->display('UserList.tpl');

    }

}