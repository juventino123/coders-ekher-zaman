<?php
	//start the session
	session_start();
	
	//// We should have the following info in a session ......
	$_SESSION['login']['id'] = 80;
	$_SESSION['login']['name'] = 'John';
	$_SESSION['semester'] = 61;
	
	$teacherId = $_SESSION['login']['id']; 
	$teacherName = $_SESSION['login']['name'];
	$semesterID = $_SESSION['semester']; 

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>Elements</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/boo	tstrap.css">
    <link rel="stylesheet" href="vendors/linericon/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="vendors/animate-css/animate.css">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!--================ Start Header Menu Area =================-->
    <header class="header_area">
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6 col-4 header-top-left">
                        <a href="tel:+9530123654896">
                            <span class="lnr lnr-phone"></span>
                            <span class="text">
                                <span class="text">+953012 3654 896</span>
                            </span>
                        </a>
                        <a href="mailto:support@colorlib.com">
                            <span class="lnr lnr-envelope"></span>
                            <span class="text">
                                <span class="text">support@colorlib.com</span>
                            </span>
                        </a>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-8 header-top-right">
                        <a href="#" class="text-uppercase">Login</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main_menu">
            <div class="search_input" id="search_input_box">
                <div class="container">
                    <form class="d-flex justify-content-between" method="" action="">
                        <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                        <button type="submit" class="btn"></button>
                        <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
                    </form>
                </div>
            </div>

            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about-us.html">About</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Pages</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="courses.html">Courses</a></li>
                                    <li class="nav-item"><a class="nav-link" href="course-details.html">Course Details</a></li>
                                    <li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>
                                </ul>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                                    <li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                            <li class="nav-item">
                                <a href="#" class="nav-link search" id="search">
                                    <i class="lnr lnr-magnifier"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================ End Header Menu Area =================-->

	
	
	<!-- Start Align Area -->
	
	
	
	
	
	
<pre>       

</pre>

<div class="container">

	<div>
			<label>Teacher ID: <?php print($teacherId); ?></label>
			<br>
			<label>Teacher Name: <?php print($teacherName); ?></label>
			<br>
			<br>
		</div>
					
		<label>Spring 2020 Course Load</label>

	</div>
	
	<div class="whole-wrap">
		<div class="container">
			  <table class="table table-hover">
    <thead>
      <h1><tr>
		<th>courseOfferingID</th>
		<th>Course Code</th>
		<th>Course Name</th>
		<th>Schedule Name</th>
		<th>View Class List</th>
      </tr></h1>
    </thead>
    <tbody>
	
	
	<?php

	$server = 'localhost';
	$user = 'root';
	$pass = '';

	$mydb = 'universityproject';
	

	$connect = mysql_connect($server, $user, $pass);

	if(!$connect)
	{
		die("Cannot connect to $server using $user");

	}
	else
	{
		$SQLcmd = "SELECT courseOffering.id, courseOffering.courseId, course.id, course.code, course.name, courseOffering.scheduleId, schedule.name FROM ((courseOffering INNER JOIN course ON courseOffering.courseId = course.id) INNER JOIN schedule ON courseOffering.scheduleId = schedule.id) WHERE courseOffering.teacherID = '$teacherId' AND courseOffering.semesterID = $semesterID ORDER BY courseOffering.scheduleId ASC";

		mysql_select_db($mydb);

		$results_id = mysql_query($SQLcmd, $connect);


		if($results_id)
		{
			// looping over the table courseOffering
			while($row = mysql_fetch_row($results_id))	
			{
				print("<tr>");
				// looping over the cells of a certain row 
				
				$courseOfferingID = $row[0];
				$courseOfferingCourseID = $row[1];
				$courseID = $row[2];
				$courseCode = $row[3];
				$courseName = $row[4];
				$scheduleID = $row[5];
				$scheduleName = $row[6];
				
				print("<td>$courseOfferingID</td><td>$courseCode</td><td>$courseName</td><td>$scheduleName</td>");
				print('<td><a href="./classlistteacher.php?val=' . $courseOfferingID. '" class="primary-btn" style="float:left" id = "View">View</a></td>');
				
				print("</tr>");
			}// end while
			print("</tbody>");
			print("</table>");
		}
		else
		{
			die("Cannot display table");
		}
	
	} // end if connected
		
	mysql_close($connect);

?>


	</div>
	
	</div>
<pre>       





</Pre>
	
	<!-- End Align Area -->

	<!--================ Start footer Area  =================-->
    <footer class="footer-area section_gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-6 single-footer-widget">
						<h4>Top Products</h4>
						<ul>
							<li><a href="#">Managed Website</a></li>
							<li><a href="#">Manage Reputation</a></li>
							<li><a href="#">Power Tools</a></li>
							<li><a href="#">Marketing Service</a></li>
						</ul>
					</div>
					<div class="col-lg-2 col-md-6 single-footer-widget">
						<h4>Quick Links</h4>
						<ul>
							<li><a href="#">Jobs</a></li>
							<li><a href="#">Brand Assets</a></li>
							<li><a href="#">Investor Relations</a></li>
							<li><a href="#">Terms of Service</a></li>
						</ul>
					</div>
					<div class="col-lg-2 col-md-6 single-footer-widget">
						<h4>Features</h4>
						<ul>
							<li><a href="#">Jobs</a></li>
							<li><a href="#">Brand Assets</a></li>
							<li><a href="#">Investor Relations</a></li>
							<li><a href="#">Terms of Service</a></li>
						</ul>
					</div>
					<div class="col-lg-2 col-md-6 single-footer-widget">
						<h4>Resources</h4>
						<ul>
							<li><a href="#">Guides</a></li>
							<li><a href="#">Research</a></li>
							<li><a href="#">Experts</a></li>
							<li><a href="#">Agencies</a></li>
						</ul>
					</div>
					<div class="col-lg-4 col-md-6 single-footer-widget">
						<h4>Newsletter</h4>
						<p>You can trust us. we only send promo offers,</p>
						<div class="form-wrap" id="mc_embed_signup">
							<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
								method="get" class="form-inline">
								<input class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''"
									onblur="this.placeholder = 'Your Email Address '" required="" type="email">
								<button class="click-btn btn btn-default">
									<span>subscribe</span>
								</button>
								<div style="position: absolute; left: -5000px;">
									<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
								</div>
	
								<div class="info"></div>
							</form>
						</div>
					</div>
				</div>
				<div class="row footer-bottom d-flex justify-content-between">
					<p class="col-lg-8 col-sm-12 footer-text m-0 text-white">Copyright © 2018 All rights reserved | This
						template is
						made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Colorlib</a></p>
					<div class="col-lg-4 col-sm-12 footer-social">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-dribbble"></i></a>
						<a href="#"><i class="fa fa-behance"></i></a>
					</div>
				</div>
			</div>
		</footer> -->
		<!--================ End footer Area  =================-->
	
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<!-- <script src="js/jquery-3.2.1.min.js"></script> -->
		<!-- <script src="js/popper.js"></script> -->
		<!-- <script src="js/bootstrap.min.js"></script> -->
		<!-- <script src="js/stellar.js"></script> -->
		<!-- <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script> -->
		<!-- <script src="vendors/owl-carousel/owl.carousel.min.js"></script> -->
		<!-- <script src="js/owl-carousel-thumb.min.js"></script> -->
		<!-- <script src="js/jquery.ajaxchimp.min.js"></script> -->
		<!-- <script src="vendors/counter-up/jquery.counterup.js"></script> -->
		<!-- <script src="js/mail-script.js"></script> -->
		<!-- <!--gmaps Js--> -->
		<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script> -->
		<!-- <script src="js/gmaps.min.js"></script> -->
		<!-- <script src="js/theme.js"></script> -->
	</body>
	
	</html>