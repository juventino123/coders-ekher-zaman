<?php
session_start();
require_once('../module/DatabaseManager.php');
require_once('../module/courseOfferingClass.php');  //

$db = new DatabaseManager();

$courseOffering1 = new courseoffering($db); //

$courseOffering1->teacherId = $_SESSION['login']['id']; //

$result = $courseOffering1->selectCourseOfferingTeacher($_SESSION['currentSemesterId']);

if(empty($result) ){
	 print '<div class="container alert alert-danger" role="alert">No result Found</div>';
}
else{
	print '<div class="container">
      
      <div class="row border row-title-green">
        <div class="col-2 border">ID</div>
        <div class="col-2 border">Code</div>
        <div class="col-3 border">Course</div>
        <div class="col-3 border">Schedule</div>
        <div class="col-2 border">Enter Grades</div>
      </div>';

      foreach ($result as $course) {
  
		print '<div class="row border">

		<div class="col-2 border">'.$course['courseId'].'</div>
		<div class="col-2 border">'.$course['courseCode'].'</div>
		<div class="col-3 border">'.$course['courseName'].'</div>
		<div class="col-3 border">'.$course['scheduleName'].'</div>
    <div class="col-2 border"><a href="teacherClassListGrading.php?val='.$course['courseOfferingId'].'" id="UpdateGrade">Update</a></div>   

		</div>';
		} // end for 
      
      print '</div>';
      
} // end else 

?>
