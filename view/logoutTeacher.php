<?php
session_start();
require_once "../module/functions.php";
testAccess("teacher");
unset($_SESSION['login']);
unset($_SESSION);
header('location:teacherLogin.php')
?>