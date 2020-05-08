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

	if( isset($_POST["rememberMe"]) && $_POST["rememberMe"] == 1 ) {
		// The cookie will expire after 30 days
		setcookie ("member_login",$_POST["userId"],time()+ (30 * 365 * 24 * 60 * 60), "/");
		setcookie ("member_password",$_POST["pwd"],time()+ (30 * 365 * 24 * 60 * 60), "/");
	} 
	elseif( count($_COOKIE) > 0 ){
		setcookie ("member_login",$_POST["userId"],time()-(30 * 365 * 24 * 60 * 60), "/");
		setcookie ("member_password",$_POST["pwd"],time()-(30 * 365 * 24 * 60 * 60), "/");
	
		
	}
	
	$_SESSION['login']['id'] =  $admin1->id;
	$_SESSION['login']['name'] = $admin1->name;
	$_SESSION['login']['type'] = 'admin';

	header("location:../view/adminMain.php");
	} // end if 
else{
	header("location:../view/adminLogin.php?errorMsg=1");
	} // end else
?>

