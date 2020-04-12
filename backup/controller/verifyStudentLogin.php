<?php
session_start();
require_once "../module/studentClass.php";
require_once('../module/DatabaseManager.php');
print '<pre>';
print_r($_POST);
print '</pre>';

// create an object of the db class 
$db = new DatabaseManager();

//create an object  the student class
$student1 = new student($db);
$student1->id = $_POST['userId'];
$student1->password = $_POST['pwd'];

$result = $student1->verifyLogin();

if( $result == 1 ){
	header("location:../view/studentMain.php");
	} // end if 
else{
	header("location:../view/studentLogin.php?errorMsg=1");
	} // end else
?>


?>