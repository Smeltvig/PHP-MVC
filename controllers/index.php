<?php
class index extends Controller{
	function __construct(){
		parent::__construct();
		
		$this->View->msg = 'Dette er index';
		$this->View->render('index/index');
	}

}
?>
