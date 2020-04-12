<?php

class admin
{
	public $id;
	public $name;
	public $userName;
	public $password;
	public $db;
		
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


	public function verifyLogin(){

		$query = "SELECT *
				  FROM  admin 
				  WHERE userName = '".$this->userName."'
				        and password = '".$this->password."'" ;	 
		
		//checking if the username is available in db

		$resultSelectUser = ($this->db)->selectQuery($query);
		$count_row = count($resultSelectUser);

		//if the check is correct put the admin's details in session
		if ($count_row == 1){

			foreach ($resultSelectUser as $admin) {
				$_SESSION['login']['id'] =  $admin['id'];
				$_SESSION['login']['name'] = $admin['name'];
				$_SESSION['login']['type'] = 'admin';
				} // end for 
			return 1;
			}
		else{
			 return 0;
			} // end else

		} // end function




	public function logout() {
		$_SESSION['login'] = FALSE;
		session_destroy();
	}
}
?>