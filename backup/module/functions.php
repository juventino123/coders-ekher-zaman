<?php
//function that tests if the user can access the current page
function testAccess($type){
	if( !isset($_SESSION['login']['id']) || $_SESSION['login']['id'] <= 0 || $_SESSION['login']['type'] != $type ){
		if($type == "student"){
			header('location:studentLogin.php');
			}
		else{
			header('location:teacherLogin.php');
			}
	}
} // end function 
?>