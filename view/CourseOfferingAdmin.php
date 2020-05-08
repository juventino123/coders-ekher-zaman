<html>
<?php
session_start();
require_once "../module/functions.php";

testAccess("admin");

require_once('../module/DatabaseManager.php');
$db = new DatabaseManager();


require_once('../module/semesterClass.php');

require_once "../module/courseOfferingClass.php";
require_once "../module/teacherClass.php";
require_once "../module/courseClass.php";
require_once "../module/scheduleClass.php";

include "./header.php";
?>
<!--================ End Header Menu Area =================-->



<!-- Start Align Area -->
<body>
    <div id="main2">
<?php 
// select all the semesters
$semester1 = new semester($db);
$resultSelectSemester = $semester1->selectAllSemester();  

// select all the teachers
$teacher1 = new teacher($db);
$resultSelectTeacher = $teacher1->selectAllTeacher();


// select all the Course
$course1 = new course($db);
$resultSelectCourse = $course1->selectAllCourse();

// select all the schedule
$schedule1 = new schedule($db);
$resultSelectSchedule = $schedule1->selectAllSchedule();

?>

<div class="container">
	<div class="comment-form " style="padding-bottom:60px;">
		<h2>Course Offering Admin</h2>
		<form method='post' action="../controller/addCourseOffering.php">
			<div class="form-group form-inline">
				<div class="form-group col-lg-3 col-md-3 name">
					<!-- <input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" -->

					<!-- onblur="this.placeholder = 'Enter Name'"> -->
					<label class="font-weight-bold text-uppercase">Semester : </label>
					<select id="semesterBtn" name="semester" class="custom-select mx-2">
        <?php 

        foreach ($resultSelectSemester as $semester) {
           print '<option value="'.$semester['id'].(($semester['id'] == 1 )?'selected':'').'">'.$semester['name'].'</option>';
         
        } // end for?>
      </select>
			</div>

			</div>
			<div class="form-group form-inline">
				<div class="form-group col-lg-6 col-md-6 name">
					<label class="font-weight-bold text-uppercase">Course : </label>
					<select id="coursecode" name="course" class="form-control mx-4">
				<?php 

        foreach ($resultSelectCourse as $courseDetails) {
           print '<option value="'.$courseDetails['id'].(($courseDetails['id'] == 1 )?'selected':'').'">'.$courseDetails['name'].'</option>';
         
        } // end for?>
					</select>
	
				</div>
			</div>
			<div class="form-group form-inline">
				<div class="form-group col-lg-6 col-md-6 name">
					<label class="font-weight-bold text-uppercase">Schedule : </label>
					<select id="schedule" name="schedule" class="form-control mx-2">
					<?php 

        foreach ($resultSelectSchedule as $scheduleDetails) {
           print '<option value="'.$scheduleDetails['id'].(($scheduleDetails['id'] == 1 )?'selected':'').'">'.$scheduleDetails['name'].'</option>';
         
        } // end for?>
					</select>
				</div>
				<div class="form-group col-lg-6 col-md-6 email">
					<label class="font-weight-bold text-uppercase">Teacher : </label>
					<select id="teacher" name="teacher" class="form-control mx-2">
					<?php 

        foreach ($resultSelectTeacher as $teacherDetails) {
           print '<option value="'.$teacherDetails['id'].(($teacherDetails['id'] == 1 )?'selected':'').'">'.$teacherDetails['firstName'].' '.$teacherDetails['lastName'].'</option>';
         
        } // end for?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" class="primary-btn" style="float:right" value="Add">			
			</div>
		</form>
	</div>
</div>

</div>
<!-- -->
<div class="container">
    <?php 
    if( $_GET && isset($_GET['errorMsg']) && $_GET['errorMsg'] == 1 ){
      print '<div class="alert alert-danger" role="alert">the course offering is already added</div>';
      } // end if ?>

      <h2 class="text-left">Course offering</h2>
      <div class="row border row-title-blue">
        <div class="col-2 border">Code</div>
        <div class="col-2 border">Course</div>
        <div class="col-2 border">Credits</div>
        <div class="col-2 border">Schedule</div>
        <div class="col-2 border">Teacher</div>
        <div class="col-2 border"></div>
      </div>

      
       <?php
       // get the offered courses 
       $courseOffering1 = new courseOffering($db);
      $result = $courseOffering1->selectCourseOffered();

    if(!empty($result)){
      foreach ($result as $course) {?>

       
        <div class="row border">
      
        <div class="col-2 border"><?php print $course['code'];?></div>
        <div class="col-2 border"><?php print $course['courseName'];?></div>
        <div class="col-2 border"><?php print $course['numberOfCredits'];?></div>
        <div class="col-2 border"><?php print $course['scheduleName'];?></div>
        <div class="col-2 border"><?php print $course['firstName'].' '.$course['lastName'];?></div>
        <div class="col-2 border"><a href="#myModal" class="trigger-btn" data-toggle="modal" data-whatever="<?php print $course['courseOfferingID'];?>"><i class="material-icons" style="color:red;">&#xE5CD;</i></a></div>
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
  <form action="../controller/adminDeleteCourseOffering.php" method="post">
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
        <p>Do you really want to delete this course? This process cannot be undone.</p>
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
});
</script>
<?php require_once('footer.php');?>



