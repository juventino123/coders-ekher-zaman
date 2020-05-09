<?php
session_start();
require_once "../module/functions.php";
testAccess("student");
include "./header.php";
require_once "../module/registrationClass.php";
require_once "../module/courseOfferingClass.php";
require_once('../module/semesterClass.php');

require_once('../module/DatabaseManager.php');

// create an object of the db class 
$db = new DatabaseManager();

// put the nb of credits of the current user in session

  // get the number of credits of the current user
  $registration1 = new registration($db);
  
  $registration1->studentId = $_SESSION['login']['id'];

  $resultTotalCredits = $registration1->totalStudentCredits(); 
  $_SESSION['totalStudentCredits'] = 0 + $resultTotalCredits;

  // put the current semester in session 
  $semester1 = new semester($db);
  $resultSelectSemester = $semester1->selectCanRegisterSemester(); 
  foreach ($resultSelectSemester as $semester) {
    $_SESSION['currentSemesterName'] = $semester['name'];
    $_SESSION['currentSemesterId'] = $semester['id'];
    } // end for  


?>
     <!-- ======= Contact Section ======= -->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Course Load</h2>
        </div>

        <div class="row contact-info">

          <div class="col-md-6">
            
            <div class="contact-address">

              <h3>ID : <?php print $_SESSION['login']['id'];?></h3>
              <h3>Name : <?php print $_SESSION['login']['name'];?></h3>
            </div>
           
          </div>

          <div class="col-md-6">
           
             <div class="contact-phone">

              <h3>SEMESTER : <?php print $_SESSION['currentSemesterName'];?></h3>
              <h3>TOTAL CREDITS : <?php print $_SESSION['totalStudentCredits'];?></h3>
              </div>
          </div>

         

        </div>
      </div>
</section>
     
   


      <div class="container">
    <?php 
    if( $_GET && isset($_GET['errorMsg']) && $_GET['errorMsg'] == 1 ){
      print '<div class="alert alert-danger" role="alert">You can not register (max Nb credits = 18) or the course has a time Conflict</div>';
      } // end if ?>

      <h2 class="text-left">Registered Courses</h2>
      <div class="row border row-title-blue">
        <div class="col-2 border">Code</div>
        <div class="col-2 border">Course</div>
        <div class="col-2 border">Credits</div>
        <div class="col-2 border">Schedule</div>
        <div class="col-2 border">Teacher</div>
        <div class="col-2 border"></div>
      </div>

      
       <?php
       // get the registred courses 
       $registration1 = new registration($db);
       $registration1->studentId = $_SESSION['login']['id'];
      $result = $registration1->selectCourseRegistered($_SESSION['currentSemesterId']);

    if(!empty($result)){
      foreach ($result as $course) {?>

       
        <div class="row border">
      
        <div class="col-2 border"><?php print $course['code'];?></div>
        <div class="col-2 border"><?php print $course['courseName'];?></div>
        <div class="col-2 border"><?php print $course['numberOfCredits'];?></div>
        <div class="col-2 border"><?php print $course['scheduleName'];?></div>
        <div class="col-2 border"><?php print $course['firstName'].' '.$course['lastName'];?></div>
        <div class="col-2 border"><a href="#myModal" class="trigger-btn" data-toggle="modal" data-whatever="<?php print $course['registrationID'];?>"><i class="material-icons" style="color:red;">&#xE5CD;</i></a></div>
      </div>
      
      <?php 
    } // end for
  }
  else{
       print '<div class="row border"><div class="col-12><div class="alert alert-danger" role="alert">No result</div></div></div>';
  }?>
        </div>
<!-- Modal HTML -->
<div id="myModal" class="modal modal-danger fade">
  <form action="../controller/studentDeleteCourse.php" method="post">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <div class="icon-box">
          <i class="material-icons">&#xE5CD;</i>
        </div>        
        <h4 class="modal-title">Are you sure?</h4>  
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete these course? This process cannot be undone.</p>
        <input type="hidden" name="course_id" id="course_id" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
        <input type="submit" class="btn btn-warning" value="Yes, Delete">
        
              </div>
    </div>
  </div>
</form>
</div>     

      

      <div class="container">
       <h2 class="text-left mt-4">Add Courses</h2>
      
      <input class="form-control" id="myInput" type="text" placeholder="Search..">
     <div id="myDIV" class="mt-3">
  
      <div id="titlediv" class="row border row-title-green">
        <div class="col-2 border">Code</div>
        <div class="col-2 border">Course</div>
        <div class="col-2 border">Credits</div>
        <div class="col-2 border">Schedule</div>
        <div class="col-2 border">Teacher</div>
        <div class="col-2 border"></div>
      </div>
<?php 
        // get the course offering 
       $co1 = new courseoffering($db);
       $co1->semesterId = $_SESSION['currentSemesterId'];
       
        $result = $co1->selectCourseOffering($_SESSION['login']['id']);
      
      if(!empty($result)){
      foreach ($result as $course) {?>

       
        <div class="row border">
      
        <div class="col-2 border"><?php print $course['code'];?></div>
        <div class="col-2 border"><?php print $course['courseName'];?></div>
        <div class="col-2 border"><?php print $course['numberOfCredits'];?></div>
        <div class="col-2 border"><?php print $course['scheduleName'];?></div>
        <div class="col-2 border"><?php print $course['firstName'].' '.$course['lastName'];?></div>

        <div class="col-2 border"><a href="../controller/registerCourse.php?courseOfferingId=<?php print $course['courseOfferingID'];?>" class="btn btn-info btn-sm" role="button"><i class="ion-ios-add-outline"></i>Add</a></div>
      </div>
      <?php 
    } // end for
  } // end if 
  else{
       print '<div class="row border"><div class="col-12><div class="alert alert-danger" role="alert">No result</div></div></div>';
  }
  ?>
   </div>   
    </div>


    </section><!-- End Contact Section -->
		<script>
		$(document).ready(function(){
		  $('#myModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var x = button.data('whatever'); // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		 
		  var modal = $(this);
		  
		  modal.find('.modal-body #course_id').val(x);
		});

$("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myDIV *").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  });
</script>
    
	<!--================ End Registration Area =================-->
	<?php
	include "./footer.php";
?>

