<?php
session_start();
require_once('../module/DatabaseManager.php');
require_once('../module/teacherClass.php');

$db = new DatabaseManager();

$teacher1 = new teacher($db);
$teacher1->id = $_POST['userId'];
$teacher1->password =$_POST['pwd'];

print $teacher1->password;
print '<pre>';
print_r($teacher1);
print '</pre>';

$result = $teacher1->verifyLogin();
if( $result == 1 ){
	header("location:../view/teacherMain.php");
	} // end if 
else{
	header("location:../view/teacherLogin.php?errorMsg=1");
	} // end else
?>

