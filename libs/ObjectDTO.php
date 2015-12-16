<?php

class Convert
{
	public function __construct()
  {

  }
	public function toObject($arr)
	{
		$objectTT = new ObjectDTO();
	
		foreach ($arr as $key => $value)
		{
			foreach ($value as $key => $value2)
			{
				$objectTT->$key = $value;
			}
		}
		
		$objectTT = json_decode(json_encode($arr), FALSE);
		return $objectTT;
	}
	
}
class ObjectDTO
{
}
?>
