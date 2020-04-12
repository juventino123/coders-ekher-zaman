<?php
session_start();
require_once('../module/DatabaseManager.php');
require_once('../module/adminClass.php');

$db = new DatabaseManager();

$admin1 = new admin($db);
$admin1->userName = $_POST['userId'];
$admin1->password =$_POST['pwd'];

$result = $admin1->verifyLogin();
if( $result == 1 ){
	header("location:../view/adminMain.php");
	} // end if 
else{
	header("location:../view/adminLogin.php?errorMsg=1");
	} // end else
?>

