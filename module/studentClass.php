<?php

class student
{
	public $id;
	public $firstName;
	public $middleName;
	public $lastName;
	public $email;
	public $mobileNumber;
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
				  FROM  student 
				  WHERE id = '".$this->id."'
				        and password = '".$this->password."'" ;	 
		//checking if the username is available in db

		$resultSelectUser = ($this->db)->selectQuery($query);
		$count_row = count($resultSelectUser);

		//if the check is correct put the admin's details in session
		if ($count_row == 1){

			foreach ($resultSelectUser as $student) {
				$this->setStudent($student);
				} // end for 
			return 1;
			}
		else{
			 return 0;
			} // end else

		} // end function

public function setStudent($data){
	$this->id=$data['id'];
	$this->firstName=$data['firstName'];
	$this->middleName=$data['middleName'];
	$this->lastName=$data['lastName'];
	$this->email=$data['email'];
	$this->mobileNumber=$data['mobileNumber'];
	$this->password=$data['password'];
	

}


	public function logout() {
		$_SESSION['login'] = FALSE;
		session_destroy();
	}
}
?>