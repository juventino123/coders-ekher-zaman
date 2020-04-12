<?php
session_start();
require_once('../module/DatabaseManager.php');
require_once('../module/registrationClass.php');

$db = new DatabaseManager();

$registration1 = new registration($db);

$registration1->id = $_POST['course_id'];
$registration1->studentId = $_SESSION['login']['id'];

$result = $registration1->deleteCourse();

if( $result == 1 ){
	
	header("location:../view/registerStudent.php");
	} // end if 
else{
	header("location:../view/registerStudent.php?errorMsg=1");
	} // end else
?>
