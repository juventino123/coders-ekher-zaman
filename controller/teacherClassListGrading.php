<?php
session_start();
require_once('../module/DatabaseManager.php');
require_once('../module/registrationClass.php'); //

$db = new DatabaseManager();

$registration1 = new registration($db);

$registration1->courseOfferingId = $_SESSION['chosenCourseOfferingID'];

$registration1->studentId = $_POST['studentIdToUpdate']; // 

$semesterId = $_SESSION['currentSemesterId'];

$newGrade = $_POST['newGrade'];

$result = $registration1->updateGrade($newGrade);

//print('<pre>');
//print_r($_POST);
//print('</pre>');

// echo "courseOfferingId=   " . $registration1->courseOfferingId . "   Student ID=   " . $registration1->studentId . "   New grade=" . $newGrade;


if( $result == 1 ){
	  echo "Grade Updated...";
    
    //die();
	} // end if 
else{
	header("location:../view/teacherClassListGrading.php?errorMsg=1");
	} // end else
?>
