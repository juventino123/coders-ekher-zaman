<?php
session_start();
require_once "../module/functions.php";
testAccess("student");
include "./header.php";
?>

						
						<div class="row">
  						 <div class="col-sm-3" style="text-align: right;">STUDENT ID : </div>
     					 <div class="col-sm-3" style="text-align: left;">2222</div>
     					 <div class="col-sm-3" style="text-align: right;">STUDENT Name : </div>
     					 <div class="col-sm-3" style="text-align: left;">cccc</div>
						</div>
						<div class="row">
  						 <div class="col-sm-3" style="text-align: right;">SEMESTER : </div>
     					 <div class="col-sm-3" style="text-align: left;">FALL 2020</div>
     					 <div class="col-sm-3" style="text-align: right;">TOTAL CREDITS : </div>
     					 <div class="col-sm-3" style="text-align: left;">11<i> (Max 18)</i></div>
						</div>
						
						<h4 >Registred Courses</h4>
						<div class="row" style="margin-bottom: 5%;">
      <div class="col-sm-2"  style="background-color: yellow;">Code</div>
      <div class="col-sm-2"  style="background-color: yellow;">Course</div>
      <div class="col-sm-2"  style="background-color: red;">Credits</div>
     <div class="col-sm-2"  style="background-color: yellow;">Schedule</div>
      <div class="col-sm-2"  style="background-color: yellow;">Teacher</div>
      <div class="col-sm-2"  style="background-color: red;">Action</div>
    </div>
<form name="form1" action="registerStudent.php" method="post">
  <div class="input-group" style="width:30%">
    <input type="text" class="form-control" placeholder="Search">
    <div class="input-group-btn">
      <button class="btn btn-default" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  </div>
</form>

    					<div class="row">
      <div class="col-sm-2"  style="background-color: yellow;">Code</div>
      <div class="col-sm-2"  style="background-color: yellow;">Course</div>
      <div class="col-sm-2"  style="background-color: red;">Credits</div>
     <div class="col-sm-2"  style="background-color: yellow;">Schedule</div>
      <div class="col-sm-2"  style="background-color: yellow;">Teacher</div>
      <div class="col-sm-2"  style="background-color: red;">Action</div>
    </div>
    
	<!--================ End Registration Area =================-->
	<!--================ End Registration Area =================-->
	<?php
	include "./footer.php";
?>

