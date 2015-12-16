<?php
class bootstrap{
	
	function __construct(){
		$url = $_GET['url'];
		$url = rtrim($url,'/');
		$url = explode('/',$url);
		$fileName = $url[0];
		if ($fileName=='')
		{
			$fileName = 'index';
		}
		$file = 'controllers/'.$fileName.'.php';
		if (file_exists($file)) 
		{
			require_once $file;
			if (class_exists($fileName)) 
			{
				$controller = new $fileName();
				
				if(isset($url[1]))
				{
					
					if(method_exists($url[0], $url[1]))
					{
						if(isset($url[2]))
						{
							
							if(isset($url[3]))
							{
								$array = $url;
								unset($array[0]);
								unset($array[1]);
								
								//unset($array[2]);
								$controller->{$url[1]}($array);
							}
							else{
								$controller->{$url[1]}($url[2]);
							}
						}
						else{
							$controller->{$url[1]}();
						}
					}
				}
			}
			else
			{
				
			}
		}
		else {
			$status = (object) new Status('Filen "controllers/'.$fileName.'.php" blev ikke fundet' );
			
			echo $status->StateText;
		}
	}
}
?>
