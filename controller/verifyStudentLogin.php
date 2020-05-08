<?php

session_start();

require_once "../module/studentClass.php";
require_once('../module/registrationClass.php');
require_once('../module/semesterClass.php');
require_once('../module/DatabaseManager.php');


// create an object of the db class 
$db = new DatabaseManager();

//create an object  the student class
$student1 = new student($db);
$student1->id = $_POST['userId'];
$student1->password = $_POST['pwd'];

$result = $student1->verifyLogin();

if( $result == 1 ){

	if( isset($_POST["rememberMe"]) && $_POST["rememberMe"] == 1 ) {
		// The cookie will expire after 30 days
		setcookie ("member_login",$_POST["userId"],time()+ (30 * 365 * 24 * 60 * 60), "/");
		setcookie ("member_password",$_POST["pwd"],time()+ (30 * 365 * 24 * 60 * 60), "/");
	} 
	elseif( count($_COOKIE) > 0 ){
			setcookie ("member_login",$_POST["userId"],time()-(30 * 365 * 24 * 60 * 60), "/");
		setcookie ("member_password",$_POST["pwd"],time()-(30 * 365 * 24 * 60 * 60), "/");
	
		
	}
	$_SESSION['login']['id'] =  $student1->id;
	$_SESSION['login']['name'] = $student1->firstName.' '.$student1->lastName;
	$_SESSION['login']['type'] = 'student';

	// put the current semester in session 
	$semester1 = new semester($db);
	$resultSelectSemester = $semester1->selectCurrentSemester(); 
	foreach ($resultSelectSemester as $semester) {
		$_SESSION['currentSemesterName'] = $semester['name'];
		$_SESSION['currentSemesterId'] = $semester['id'];
		} // end for  

	// put the nb of credits of the current user in session

	// get the number of credits of the current user
	$registration1 = new registration($db);
	
	$registration1->studentId = $_SESSION['login']['id'];

	$resultTotalCredits = $registration1->totalStudentCredits(); 

	$_SESSION['totalStudentCredits'] = 0+ $resultTotalCredits['nbCredits'];
		
	

	header("location:../view/studentMain.php");
	} // end if 
else{
	header("location:../view/studentLogin.php?errorMsg=1");
	} // end else
?>

