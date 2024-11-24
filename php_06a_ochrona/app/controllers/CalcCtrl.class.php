<?php namespace app\controllers;

use app\forms\CalcForm;
use app\results\CalcResult;

class CalcCtrl {

	private $form;
	private $result;

	public function __construct(){

		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	
	public function getParams() {

		$this->form->money = getFromRequest('money');
		$this->form->years = getFromRequest('years');
		$this->form->percent = getFromRequest('percent');	
	}

	public function validate() {

		if (! (isset ( $this->form->money ) && isset ( $this->form->years ) && isset ( $this->form->percent ))) {
			return false;
		}
		
		getMessages()->addInfo('Przekazano parametry kredytu.');

		if ($this->form->money == "") {
			getMessages()->addError('Nie podano kwoty kredytu');
		}
		if ($this->form->years == "") {
			getMessages()->addError('Nie podano okresu kredytowania');
		}
		if ($this->form->percent == "") {
			getMessages()->addError('Nie podano rocznego oprocentowania');
		}

		if (! getMessages()->isError()) {
			
			if (! is_numeric ( $this->form->money )) {
				getMessages()->addError('Pierwsza wartość nie jest liczbą całkowitą');
			}
			
			if (! is_numeric ( $this->form->years )) {
				getMessages()->addError('Druga wartość nie jest liczbą całkowitą');
			}

			if (! is_numeric ( $this->form->percent )) {
				getMessages()->addError('Trzecia wartość nie jest liczbą');
			}
		}

		return ! getMessages()->isError();
	}

	public function process(){

		$this->getparams();
		
		if ($this->validate()) {
			$this->form->money = intval($this->form->money);
			$this->form->years = intval($this->form->years);
			$this->form->percent = floatval($this->form->percent);
			getMessages()->addInfo('Przekazane dane zweryfikowano.');
			
			if(inRole('client')) {
				if ($this->form->percent != 5 ) {
					getMessages()->addError('Tylko pracownik banku może zmienić oprocentowanie z 5%');
				} else if ($this->form->money > 100000) {
					getMessages()->addError('Tylko manager może obliczyć ratę dla kredytu >= 1 mln PLN');
				} else {
					$creditAmmount = $this->form->money + $this->form->money * (($this->form->years * $this->form->percent) / 100);
					$this->result->result = $result = round($creditAmmount / ($this->form->years * 12) ,2);	
				}
			} else if(inRole('banker')) {
				if ($this->form->money > 100000) {
					getMessages()->addError('Tylko manager może obliczyć ratę dla kredytu >= 1 mln PLN');
				} else {
					$creditAmmount = $this->form->money + $this->form->money * (($this->form->years * $this->form->percent) / 100);
					$this->result->result = $result = round($creditAmmount / ($this->form->years * 12) ,2);	
				}
			} else {
				$creditAmmount = $this->form->money + $this->form->money * (($this->form->years * $this->form->percent) / 100);
				$this->result->result = $result = round($creditAmmount / ($this->form->years * 12) ,2);	
			}

			getMessages()->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}

	public function generateView(){

		getSmarty()->assign('user', unserialize($_SESSION['user']));

		getSmarty()->assign('page_title','Kalkulator kredytowy');
		getSmarty()->assign('page_header','Zadanie 6a');
		getSmarty()->assign('page_description','Dodanie ról');

		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('result',$this->result);
		
		getSmarty()->display('calc.html');
	}

}