<?php
class admin
{
	private $id;
	private $name;
	private $userName;
	private $password;
	
		
	public function __set($property, $value){	
		$this->property = $value;
	} 
	public function __get($property){	
		return $this->property;
	} 

    function __construct()
    {
		
	}


	public function verifyLogin(){

		$query = "SELECT *
				  FROM admin 
				  WHERE userName = '".$this->userName."' 
				   and password = '".$this->password."'" ;	 

		//checking if the username is available in db
		$resultSelectUser = $db->selectQuery($query);
		$count_row = count($resultSelectUser);

		//if the check is correct put the admin's details in session
		if ($count_row == 1){

			foreach ($resultSelectUser as $admin) {
				$_SESSION['login']['id'] =  $admin['id'];
				$_SESSION['login']['name'] = $admin['name'];
				} // end for 
			}
		else{
			 print'The username or password you entered is incorrect. Please try again';
			} // end else

		} // end function




	public function logout() {
		$_SESSION['login'] = FALSE;
		session_destroy();
	}
}
?>