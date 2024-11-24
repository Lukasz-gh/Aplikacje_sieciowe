<?php

namespace app\controllers;

use app\results\User;
use app\forms\LoginForm;

class LoginCtrl{
	private $form;
	
	public function __construct(){
		$this->form = new LoginForm();
	}
	
	public function getParams(){
		$this->form->login = getFromRequest('login');
		$this->form->password = getFromRequest('password');
	}
	
	public function validate() {
		if (! (isset ( $this->form->login ) && isset ( $this->form->password ))) {
			return false;
		}
			
		if (! getMessages()->isError ()) {
			
			if ($this->form->login == "") {
				getMessages()->addError ( 'Nie podano loginu' );
			}
			if ($this->form->password == "") {
				getMessages()->addError ( 'Nie podano hasła' );
			}
		}

		if ( !getMessages()->isError() ) {
		
            if ($this->form->login == 'manager' && $this->form->password == 'manager') {

				$user = new User($this->form->login, 'manager');
				$_SESSION['user'] = serialize($user);
				addRole($user->role);

			} else if ($this->form->login == 'banker' && $this->form->password == 'banker') {

				$user = new User($this->form->login, 'banker');
				$_SESSION['user'] = serialize($user);
				addRole($user->role);

			} else if ($this->form->login == 'client' && $this->form->password == 'client') {

				$user = new User($this->form->login, 'client');
				$_SESSION['user'] = serialize($user);
				addRole($user->role);
				
			} else {
				getMessages()->addError('Niepoprawny login lub hasło');
			}
		}
		
		return ! getMessages()->isError();
	}
	
	public function action_login(){

		$this->getParams();
		
		if ($this->validate()){
			header("Location: ".getConf()->app_url."/");
		} else {
			$this->generateView(); 
		}
		
	}
	
	public function action_logout(){
		session_destroy();
		
		getMessages()->addInfo('Poprawnie wylogowano z systemu');

		$this->generateView();		 
	}
	
	public function generateView(){
		
		getSmarty()->assign('page_title','Kalkulator kredytowy');
		getSmarty()->assign('page_header','Ekran logowania do kalkulatora kredytowego');
        getSmarty()->assign('page_description','Możesz zalogować się jako: manager, banker, client');

		getSmarty()->assign('form',$this->form);

		getSmarty()->display('Login.html');		
	}
}