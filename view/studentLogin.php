<?php
include "./header.php";
?>
	<!--================ Start Registration Area =================-->
	<div class="section_gap registration_area">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-3">
					
				</div>
				<div class="col-lg-9">
					<div class="register_form" style="width:60%">
						<?php 
						if($_GET && $_GET['errorMsg'] == 1 ){
							print '<div class="alert alert-danger" role="alert">The username or password you entered is incorrect. Please try again</div>';
						}
						?>
						<p><img src="../img/login/student.jpg" width="10%"></p>
						<h3>Login</h3>
						<p>We develop masters</p>
						<form class="form_area" action="../controller/verifyStudentLogin.php" method="post">
							<div class="row">
								<div class="col-lg-12 form_group">
									<input name="userId" placeholder="Username" required="" type="text">
									<input name="pwd" placeholder="Password" required="" type="password">
								</div>
								<div class="col-lg-12 text-center">
									<input type="submit" name="submitButton" class="primary-btn" value="LOGIN">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================ End Registration Area =================-->
	<!--================ End Registration Area =================--><?php
	include "./footer.php";
?>
