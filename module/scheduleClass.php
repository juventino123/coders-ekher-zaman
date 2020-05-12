<?php

class schedule
{
	public $id;
	public $name;
	
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

	public function selectAllSchedule(){

			$query = 'SELECT *
					  FROM  schedule 
					  Order By id ASC' ;	 
			
						
			$resultSelectSchedule = ($this->db)->selectQuery($query);
			return $resultSelectSchedule;

		
	} // end function 

	
	
} // end class
?>