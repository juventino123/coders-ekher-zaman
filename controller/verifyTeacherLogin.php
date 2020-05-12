<?php
session_start();
require_once('../module/DatabaseManager.php');
require_once('../module/teacherClass.php');
require_once('../module/semesterClass.php');


$db = new DatabaseManager();

$teacher1 = new teacher($db);
$teacher1->id = $_POST['userId'];
$teacher1->password =$_POST['pwd'];

$result = $teacher1->verifyLogin();

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

	$_SESSION['login']['id'] =  $teacher1->id;
	$_SESSION['login']['name'] = $teacher1->firstName.' '.$teacher1->lastName;
	$_SESSION['login']['type'] = 'teacher';

	// put the current semester in session 
  	$semester1 = new semester($db);
 	$resultSelectSemester = $semester1->selectCurrentSemester(); 
  	foreach ($resultSelectSemester as $semester) {
	    $_SESSION['currentSemesterName'] = $semester['name'];
	    $_SESSION['currentSemesterId'] = $semester['id'];
	    } // end for  


	header("location:../view/teacherMain.php");
	} // end if 
else{
	header("location:../view/teacherLogin.php?errorMsg=1");
	} // end else
?>

