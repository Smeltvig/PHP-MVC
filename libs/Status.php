<?php
class Status{
	public $StateCode = 0;
	public $StateText = "ok";
	public function __construct($myStateText = false){
		if($myStateText!=false )
		{
			$this->StateCode = 1;
			$this->StateText = $myStateText;
		}
		return $this;
	}
}
?>
