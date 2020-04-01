<?php
session_start();
require_once "../module/functions.php";
testAccess("student");
unset($_SESSION['login']);
unset($_SESSION);
header('location:studentLogin.php')
?>