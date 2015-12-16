<?php
class Model{
	function __construct(){
		$file = 'libs/rb.php';
		if (file_exists($file)) {
			require $file;
			R::setup('sqlite:/data.db');
		}
		else
		{
			print_r(new Status('Redbeanphp fil ikke fundet'));
		}
	}
}

?>
