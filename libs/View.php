<?php
class View{
	protected $error;
	function __construct(){
		echo 'vi er i main View<br />';
	}
	public function render($name){ 
		$file = 'views/'.$name.'.php';
		if(file_exists($file)) {
			require $file;
		}
		else{
			echo 'vi er i main View og den fejler<br />';
		}
	}
}
?>
