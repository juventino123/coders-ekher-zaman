<?php
session_start();
require_once "../module/functions.php";
testAccess("admin");
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
              <div class="icon"><i class="fa fa-registered"></i></div>
              <h4 class="title"><a href="courseOfferingAdmin.php">CourseOfferingAdmin</a></h4>
              
            </div>
            
          </div>

        

         

        </div>

      </div>
    </section><!-- End Services Section -->
	<?php
	include "./footer.php";
?>

