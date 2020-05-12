 <?php 
 session_start();
 require_once "../module/functions.php";

 // this function redirect the user to main if he is logged in
redirectToMain();

 require_once('header.php');?>
  <!-- ======= Intro Section ======= -->
  <section id="intro">

    <div class="intro-content">
      <h2>Making <span>your ideas</span><br>happen!</h2>
      <div>
        <a href="studentLogin.php" class="btn-blue scrollto">Student Login</a>
        <a href="teacherLogin.php" class="btn-green scrollto">Teacher Login</a>
        <a href="adminLogin.php" class="btn-red scrollto">Admin Login</a>

      </div>
    </div>

    <div id="intro-carousel" class="owl-carousel">
      <div class="item" style="background-image: url('../assets/img/intro-carousel/1.jpg');"></div>
      <div class="item" style="background-image: url('../assets/img/intro-carousel/2.jpg');"></div>
      <div class="item" style="background-image: url('../assets/img/intro-carousel/3.jpg');"></div>
      <div class="item" style="background-image: url('../assets/img/intro-carousel/4.jpg');"></div>
      <div class="item" style="background-image: url('../assets/img/intro-carousel/5.jpg');"></div>
    </div>

  </section><!-- End Intro Section -->
 <?php 
 require_once('footer.php');?>