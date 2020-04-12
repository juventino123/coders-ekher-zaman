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
						<p><img src="../img/login/teacher.png" width="10%"></p>
						<h3>Login</h3>
						<p>We develop masters</p>
						<form class="form_area" action="../controller/verifyLogin.php" method="post">
							<div class="row">
								<div class="col-lg-12 form_group">
									<input name="username" placeholder="Username" required="" type="text">
									<input name="password" placeholder="Password" required="" type="password">
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
