<?php
//function that tests if the user can access the current page
function testAccess($type){
	if( !isset($_SESSION['login']['id']) || $_SESSION['login']['id'] <= 0 || $_SESSION['login']['type'] != $type ){
		if($type == "student"){
			header('location:studentLogin.php');
			}
		elseif($type == "teacher"){
			header('location:teacherLogin.php');
			}
		elseif($type == "admin"){
			header('location:adminLogin.php');
			}
	}
} // end function 
?>