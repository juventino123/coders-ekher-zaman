 <?php 
 require_once('header.php');
?>
<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 about-img">
            <img src="../assets/img/about-img.jpg" alt="">
          </div>

          <div class="col-lg-6 content">
                     	
	      <!-- form login -->
        <div class="section-header">
          <h2>Student Login</h2>
          
        </div>
          <?php 
            if( $_GET && $_GET['errorMsg'] == 1 ){
              print '<div class="alert alert-danger" role="alert">The username or password you entered is incorrect. Please try again</div>';
              } // end if ?>
              
           
  
         <form action="../controller/verifyStudentLogin.php" name="form1" method="post" class="needs-validation">
          <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" name="userId" class="form-control form-control-lg" placeholder="Enter your ID" id="id" required value="<?php if(isset($_COOKIE["member_login"])) { print $_COOKIE["member_login"]; } ?>"/>
           
            <div class="invalid-feedback">Please enter your ID.</div>
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" name="pwd" class="form-control form-control-lg" placeholder="Enter password" id="pwd" required value="<?php if(isset($_COOKIE["member_password"])) { print $_COOKIE["member_password"]; } ?>"/>
            
    <div class="invalid-feedback">Please enter your Password.</div>
          </div>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customRememberMe" name="rememberMe" value="1" <?php if(isset($_COOKIE["member_login"])) { print 'checked="checked"'; } ?>>
            <label class="custom-control-label" for="customRememberMe">Remember me</label>
          </div>
          <div class="text-center">
            <input type="submit" class="btn btn-blue" value="LOGIN">
          </div>

        
        </form>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    

  </main><!-- End #main -->
   <?php 
 require_once('footer.php');?>
