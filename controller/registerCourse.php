<?php
session_start();
require_once('../module/DatabaseManager.php');
require_once('../module/registrationClass.php');

$db = new DatabaseManager();

$registration1 = new registration($db);

$registration1->courseOfferingId = $_GET['courseOfferingId'];
$registration1->studentId = $_SESSION['login']['id'];
$semesterId = $_SESSION['currentSemesterId'];
$result = $registration1->registerCourse($semesterId);

if( $result == 1 ){

	header("location:../view/registerStudent.php");
	} // end if 
else{
	header("location:../view/registerStudent.php?errorMsg=1");
	} // end else
?>
