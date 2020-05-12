<?php
session_start();
require_once "../module/functions.php";
testAccess("teacher");




include "./header.php";
?>
<!-- ======= Services Section ======= -->
    <section id="services">
      <div class="container">
       
        <div class="section-header">
         <div class="col-lg-12">
          <h2><small><?php 
          print 'WELCOME: '.$_SESSION['login']['name'].'<p>ID : '.$_SESSION['login']['id'];?></small> </h2>
         </div>

        </div>

        <div class="row">

          <div class="col-lg-6">
            
            <div class="box wow fadeInLeft">
              <a href="teacherCourseLoad.php">
              <div class="icon"><i class="fa fa-info-circle"></i></div>
              <h4 class="title text-secondary">Course Load</h4></a>
              
            </div>
            
          </div>

          <div class="col-lg-6">
            
            <div class="box wow fadeInRight">
              <a href="teacherCourseLoadGrading.php">
              <div class="icon"><i class="fa fa-pencil fa-fw"></i></div>
              <h4 class="title text-secondary">Final Grades</h4></a>
             
            </div>
            
          </div>

         

        </div>

      </div>
    </section><!-- End Services Section -->
	<?php
	include "./footer.php";
?>

