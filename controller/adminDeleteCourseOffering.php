<?php
session_start();
require_once('../module/DatabaseManager.php');
require_once('../module/courseOfferingClass.php');

$db = new DatabaseManager();

$courseOffering1 = new courseOffering($db);

$courseOffering1->id = $_POST['course_id'];

$result = $courseOffering1->deleteCourse();

if( $result == 1 ){
	
	header("location:../view/courseOfferingAdmin.php");
	} // end if 
else{
	header("location:../view/courseOfferingAdmin.php?errorMsg=1");
	} // end else
?>
