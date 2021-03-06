<?php
session_start();
require_once('../module/DatabaseManager.php');
require_once('../module/registrationClass.php');

$db = new DatabaseManager();

$registration1 = new registration($db);

$registration1->studentId = $_SESSION['login']['id'];

$result = $registration1->selectCourseRegistered($_POST['semester']);
if(empty($result) ){
	 print '<div class="container alert alert-danger" role="alert">No result Found</div>';
}
else{
	$nbCurrentStudentCredits = $registration1->totalStudentCreditsPerSemester($_POST['semester']);
	print '<div class="container">';
      	print '<h4>Total Credits : '.$nbCurrentStudentCredits.' credits</h4>

      <div class="row border row-title-green">
        <div class="col-2 border">Code</div>
        <div class="col-2 border">Course</div>
        <div class="col-2 border">Credits</div>
        <div class="col-2 border">Schedule</div>
        <div class="col-2 border">Teacher</div>
        <div class="col-2 border">Grade</div>
      </div>';

      foreach ($result as $course) {
  
		print '<div class="row border">

		<div class="col-2 border">'.$course['code'].'</div>
		<div class="col-2 border">'.$course['courseName'].'</div>
		<div class="col-2 border">'.$course['numberOfCredits'].'</div>
		<div class="col-2 border">'.$course['scheduleName'].'</div>
		<div class="col-2 border">'.$course['firstName'].''.$course['lastName'].'</div>
		<div class="col-2 border">'.((!empty($course['grade']))?$course['grade']:'---').'</div>

		</div>';
		} // end for 
      print '

	</div>';
} // end else 
?>
