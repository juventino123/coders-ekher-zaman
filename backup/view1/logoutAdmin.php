<?php
session_start();
require_once "../module/functions.php";
testAccess("admin");
unset($_SESSION['login']);
unset($_SESSION);
header('location:adminLogin.php')
?>