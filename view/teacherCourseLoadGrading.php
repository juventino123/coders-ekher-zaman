<?php
session_start();
require_once "../module/functions.php";

testAccess("teacher");

require_once('../module/DatabaseManager.php');
$db = new DatabaseManager();

require_once('../module/courseOfferingClass.php'); 

require_once('../module/semesterClass.php');

include "./header.php";
?>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Course Load</h2>
        </div>

        <div class="row contact-info">

          <div class="col-md-12">
            
            <div class="contact-address">

              <h3>ID : <?php print $_SESSION['login']['id'];?></h3>
              <h3>Name : <?php print $_SESSION['login']['name'];?></h3>
              <h3>
                Current semester : <?php print $_SESSION['currentSemesterName'];?>
              </h3>

            </div>
           
          </div>

        </div>
      </div>
</section>

<?php
        $db = new DatabaseManager();

        $courseOffering1 = new courseoffering($db); //

        $courseOffering1->teacherId = $_SESSION['login']['id']; //

        $result = $courseOffering1->selectCourseOfferingTeacher($_SESSION['currentSemesterId']);

        if(empty($result) ){
        print '<div class="container alert alert-danger" role="alert">No result Found</div>';
        }
        else{
        print '<div class="container">

          <div class="row border row-title-green">
            <div class="col-2 border">ID</div>
            <div class="col-2 border">Code</div>
            <div class="col-3 border">Course</div>
            <div class="col-3 border">Schedule</div>
            <div class="col-2 border"></div>
          </div>';

          foreach ($result as $course) {

          print '<div class="row border">

            <div class="col-2 border">'.$course['courseId'].'</div>
            <div class="col-2 border">'.$course['courseCode'].'</div>
            <div class="col-3 border">'.$course['courseName'].'</div>
            <div class="col-3 border">'.$course['scheduleName'].'</div>
            <div class="col-2 border">
              <a href="teacherClassListGrading.php?val='.$course['courseOfferingId'].'" id="UpdateGrade">Enter Grades</a>
            </div>

          </div>';
          } // end for

          print '
        </div>';

        } // end else
?>

   
<p></p>
    
	<!--================ End Registration Area =================-->
	<?php
	include "./footer.php";
?>

