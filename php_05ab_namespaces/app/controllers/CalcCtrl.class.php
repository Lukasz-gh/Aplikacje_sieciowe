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
			
			$creditAmmount = $this->form->money + $this->form->money * (($this->form->years * $this->form->percent) / 100);
			$this->result->result = $result = round($creditAmmount / ($this->form->years * 12) ,2);

			getMessages()->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}

	public function generateView(){

		getSmarty()->assign('page_title','Kalkulator kredytowy');
		getSmarty()->assign('page_header','Zadanie 5ab');
		getSmarty()->assign('page_description','Dodanie namespaces');

		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('result',$this->result);
		
		getSmarty()->display('calc.html');
	}

}