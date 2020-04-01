<?php
session_start();
require_once "../module/functions.php";
testAccess("admin");
include "./header.php";
?>
						<h1>Welcome <?php print $_SESSION['login']['name'];?></h1>
    
	<!--================ End Registration Area =================-->
	<!--================ End Registration Area =================-->
	<?php
	include "./footer.php";
?>

