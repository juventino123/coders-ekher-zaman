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

	public function selectAllCourse(){

			$query = 'SELECT *
					  FROM  course 
					  Order By name Asc' ;	 
			
						
			$resultSelectCourse = ($this->db)->selectQuery($query);
			return $resultSelectCourse;

		
	} // end function 

	
	
} // end class
?>