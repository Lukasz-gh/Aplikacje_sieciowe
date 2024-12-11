<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\ParamUtils;

class CalcCtrl {


    private $records;
	// private $form;

    
	// public function __construct(){

	// }


	// public function validate() {

	// }


	// public function action_calcCompute(){

    // }
    

	// public function action_calcShow(){

	// }


	// public function generateView(){

    // }


    public function action_calc() {
		        
        $variable = 123;

        App::getMessages()->addMessage(new Message("Hello world message", Message::INFO));
        Utils::addInfoMessage("Or even easier message :-)");
        


        App::getSmarty()->assign("value",$variable);    
        App::getSmarty()->assign('people', $this->records); 
        App::getSmarty()->display("Calc.tpl");
        




    }
    
}
