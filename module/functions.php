<?php
//function that tests if the user can access the current page
function testAccess($type){
	
	if( !isset($_SESSION['login']['id']) || $_SESSION['login']['id'] < 0 || $_SESSION['login']['type'] != $type ){
		if( $type == "student" ){
			header('location:studentLogin.php');
			}
		elseif($type == "teacher"){
			header('location:teacherLogin.php');
			}
		elseif($type == "admin"){
			header('location:adminLogin.php');
			}

	}
	elseif( isset($page) && $page=="login" ){
		
		header('location:'.$type.'Main.php');
			
	} // end else 
} // end function 

// this function redirects the user to main if he is logged in, we call this function only in index.php
function redirectToMain(){
	if( isset($_SESSION['login']['id']) && $_SESSION['login']['id'] > 0  ){
		
		header('location:'.$_SESSION['login']['type'].'Main.php');
	}
}
// this function redirects the user to main if he is already logged in, we call this function only in login.php
function redirectLoginToMain($type){
	if( isset($_SESSION['login']['id']) && $_SESSION['login']['id'] > 0 &&  $_SESSION['login']['type'] == $type ){
		
		header('location:'.$_SESSION['login']['type'].'Main.php');
	}
}
?>