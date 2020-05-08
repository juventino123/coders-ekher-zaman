<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ParkUni</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Reveal - v2.0.0
  * Template URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="fa fa-envelope-o"></i> <a href="mailto:info@park-innovation.com
">info@park-innovation.com
</a>
        <i class="fa fa-phone"></i> 78 807 966
      </div>
      <div class="social-links float-right">
        <a href="https://www.facebook.com/pg/ParkInnovation/about/?ref=page_internal" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="https://www.instagram.com/parkinnovation/" class="instagram"><i class="fa fa-instagram"></i></a>
       
      </div>
    </div>
  </section><!-- End Top Bar-->

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#topbar" class="scrollto">Park<span>Uni</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#topbar"><img src="../assets/img/logo.png" alt=""></a>-->
      </div>

      <?php 
       if( isset($_SESSION['login']) ){?>
        <nav id="nav-menu-container">
          <ul class="nav-menu">
            <?php 
            switch ($_SESSION['login']['type']){
              // display the menu % user type
              case "student":
                // display the menu of the student ?>
                <li><a href="studentMain.php?link=1" <?php print (( $_GET && isset($_GET['link']) && $_GET['link'] == 1)?'class="menu-active"':'');?>>Main</a></li>
                <li><a href="registerStudent.php?link=2" <?php print (( $_GET && isset($_GET['link']) && $_GET['link'] == 2)?'class="menu-active"':'');?>>Register</a></li>
                <li><a href="studentCourseLoad.php?link=3" <?php print (( $_GET && isset($_GET['link']) && $_GET['link'] == 3)?'class="menu-active"':'');?>>Course Load</a></li>


                
                <li><a href="logoutStudent.php">Logout</a></li>
              <?php 
              break;
              case "teacher":
                // display the menu of the teacher?>
                <li><a href="teacherMain.php?link=1" <?php print (( $_GET && isset($_GET['link']) && $_GET['link'] == 1)?'class="menu-active"':'');?>>Main</a></li>
                <li><a href="logoutTeacher.php">Logout</a></li>
              <?php 
              break;
              case "admin":
               // display the menu of the admin?>
               <li><a href="teacherMain.php?link=1" <?php print (( $_GET && isset($_GET['link']) && $_GET['link'] == 1)?'class="menu-active"':'');?>>Main</a></li>
               <li><a href="logoutAdmin.php">Logout</a></li>
             <?php 
              break;

            }?>
          </ul>
        </nav><!-- #nav-menu-container -->
        <?php 
      } // end if $_SESSION['login'] ?>
    </div>
  </header><!-- End Header -->

  <main id="main">
