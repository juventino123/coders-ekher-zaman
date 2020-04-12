<?php

class course
{
	public $id;
	public $code;
	public $name;
	public $numberOfCredits;
	public $description;
	
	public function __set($property, $value){	
		
		$this->property = $value;

	} 
	public function __get($property){
		return $this->property;
	} 
	

    function __construct($db)
    {
    	
		$this->db = $db;
	}
	
	
} // end class
?>