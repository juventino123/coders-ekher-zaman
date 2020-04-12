<?php

class semester
{
	public $id;
	public $name;
	public $startingDate;
	public $endingDate;
	public $currentSemester;
	
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
	
	public function selectAllSemester(){

		$query = 'SELECT *
				  FROM  semester 
				  Order By currentSemester DESC' ;	 
		
		//checking if the username is available in db
			        
		$resultSelectSemester = ($this->db)->selectQuery($query);
		return $resultSelectSemester;

		
	} // end function 

	// select current semester
	public function selectCurrentSemester(){

		$query = 'SELECT *
				  FROM  semester 
				  WHERE currentSemester = 1' ;	 
		
		//checking if the username is available in db
			        
		$resultCurrentSemester = ($this->db)->selectQuery($query);
		return $resultCurrentSemester;

		
	} // end function 
	
} // end class
?>