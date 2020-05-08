<?php
session_start();
require_once('../module/DatabaseManager.php');
require_once('../module/courseOfferingClass.php');

$db = new DatabaseManager();

$coursePlus = new courseOffering($db);

$coursePlus->semesterId = $_POST['semester'];
$coursePlus->courseId = $_POST['course'];
$coursePlus->scheduleId = $_POST['schedule'];
$coursePlus->teacherId = $_POST['teacher'];

$result = $coursePlus->addCourse();

if( $result == 1 ){
	
	header("location:../view/courseOfferingAdmin.php");
	} // end if 
else{
	header("location:../view/courseOfferingAdmin.php?errorMsg=1");
	} // end else
?>
