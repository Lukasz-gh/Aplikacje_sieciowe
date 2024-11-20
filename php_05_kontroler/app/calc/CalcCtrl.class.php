<?php

require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/calc/CalcForm.class.php';
require_once $conf->root_path.'/app/calc/CalcResult.class.php';

class CalcCtrl {

	private $form;
	private $infos;
	private $messages;
	private $result;

	public function __construct(){

		$this->messages = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	
	public function getParams() {

		$this->form->money = isset($_REQUEST['money']) ? $_REQUEST['money'] : null;
		$this->form->years = isset($_REQUEST['years']) ? $_REQUEST['years'] : null;
		$this->form->percent = isset($_REQUEST['percent']) ? $_REQUEST['percent'] : null;	
	}

	public function validate() {

		if (! (isset ( $this->form->money ) && isset ( $this->form->years ) && isset ( $this->form->percent ))) {
			return false;
		}
		
		$this->messages->addInfo('Przekazano parametry kredytu.');

		if ($this->form->money == "") {
			$this->messages->addError('Nie podano kwoty kredytu');
		}
		if ($this->form->years == "") {
			$this->messages->addError('Nie podano okresu kredytowania');
		}
		if ($this->form->percent == "") {
			$this->messages->addError('Nie podano rocznego oprocentowania');
		}

		if (! $this->messages->isError()) {
			
			if (! is_numeric ( $this->form->money )) {
				$this->messages->addError('Pierwsza wartość nie jest liczbą całkowitą');
			}
			
			if (! is_numeric ( $this->form->years )) {
				$this->messages->addError('Druga wartość nie jest liczbą całkowitą');
			}

			if (! is_numeric ( $this->form->percent )) {
				$this->messages->addError('Trzecia wartość nie jest liczbą');
			}
		}

		return ! $this->messages->isError();
	}

	public function process(){

		$this->getparams();
		
		if ($this->validate()) {
			$this->form->money = intval($this->form->money);
			$this->form->years = intval($this->form->years);
			$this->form->percent = floatval($this->form->percent);
			$this->messages->addInfo('Przekazane dane zweryfikowano.');
			
			$creditAmmount = $this->form->money + $this->form->money * (($this->form->years * $this->form->percent) / 100);
			$this->result->result = $result = round($creditAmmount / ($this->form->years * 12) ,2);

			$this->messages->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}

	public function generateView(){
		
		global $conf;
		
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		
		$smarty->assign('page_title','Kalkulator kredytowy');
		$smarty->assign('page_header','Kontroler główny');
		$smarty->assign('page_description','Dodanie kontrolera');

		$smarty->assign('messages',$this->messages);
		$smarty->assign('form',$this->form);
		$smarty->assign('result',$this->result);
		
		$smarty->display($conf->root_path.'/app/calc/calc.html');
	}

}