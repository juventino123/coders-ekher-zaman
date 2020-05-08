<?php
session_start();
require_once "../module/functions.php";

testAccess("teacher");

require_once('../module/DatabaseManager.php');
$db = new DatabaseManager();


require_once('../module/semesterClass.php');

require_once('../module/registrationClass.php');   // added


include "./header.php";
?>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Class List</h2>
        </div>

        <div class="row contact-info">

          <div class="col-md-12">
            
            <div class="contact-address">

              <h3>ID : <?php print $_SESSION['login']['id'];?></h3>
              <h3>Name : <?php print $_SESSION['login']['name'];?></h3>
            </div>
           
          </div>

          

         

        </div>
      </div>
</section>
<?php 

$chosenCourseOfferingId = intval($_GET['val']);

// select all registered students in a course
$registration1 = new registration($db);

$resultRegisteredStudents = $registration1->selectRegisteredStudentsInCourse($chosenCourseOfferingId); 

//print('<pre>');
//print_r($resultRegisteredStudents);
//print('</pre>');


if(empty($resultRegisteredStudents) ){
	 print '<div class="container alert alert-danger" role="alert">No result Found</div>';
}
else{
	print '<div class="container">
      
      <div class="row border row-title-green">
        <div class="col-2 border">Student ID</div>
        <div class="col-2 border">First Name</div>
        <div class="col-2 border">Middle Name</div>
        <div class="col-2 border">Last Name</div>
        <div class="col-3 border">Email</div>
        <div class="col-1 border"><center>Grade</center></div>
      </div>';

      $counter=0; // the number of students in a class
      $sum = 0.0; // sum of all grades
      $minGrade = 100; // minimum grade
      $maxGrade = 0;

      foreach ($resultRegisteredStudents as $studentRegistration) {
  
		    print '<div class="row border">

		    <div class="col-2 border">'.$studentRegistration['registrationStudentId'].'</div>
        <div class="col-2 border">'.$studentRegistration['studentFirstName'].'</div>
		    <div class="col-2 border">'.$studentRegistration['studentMiddleName'].'</div>
        <div class="col-2 border">'.$studentRegistration['studentLastName'].'</div>
        <div class="col-3 border">'.$studentRegistration['studentEmail'].'</div>
        <div class="col-1 border"><center>'.((!empty($studentRegistration['registrationStudentGrade']))?$studentRegistration['registrationStudentGrade']:'---').'</center></div>
 
 		    </div>';
        
        if(empty($studentRegistration['registrationStudentGrade']))
        {
            $grade = 0.0;
        }
        else
        {
            $grade = intval($studentRegistration['registrationStudentGrade']);
        }
            
        $sum = $sum + $grade;
        $counter++;
        
        if( $grade < $minGrade)
        {
            $minGrade = $grade;
        }
        
        if( $grade > $maxGrade)
        {
            $maxGrade = $grade;
        }
        
		} // end for 
    
  
      
      
      print '</div>';
      
      print '<br>';
      
      print '<div class="container">';

        print '<div class="row">
    
        <div class="col-9"></div>
        <div class="col-2 border" style="background-color:#50d8af; color:#fff"><b>Average: </b></div>
        <div class="col-1 border"><b><center>'.((($counter>0) && ($sum>0) )?(round(($sum/$counter),2)):'---').'</center></b></div>
    
        </div>';
      
      
        print '<div class="row">
    
        <div class="col-9"></div>
        <div class="col-2 border" style="background-color:#50d8af; color:#fff"><b>Minimum: </b></div>
        <div class="col-1 border"><b><center>'.(($minGrade>0)?$minGrade:'---').'</center></b></div>
    
        </div>';
      
        print '<div class="row">
    
        <div class="col-9"></div>
        <div class="col-2 border" style="background-color:#50d8af; color:#fff"><b>Maximum: </b></div>
        <div class="col-1 border"><b><center>'.(($maxGrade>0)?$maxGrade:'---').'</center></b></div>
    
        </div>';    

      print '</div>';   
         
} // end else


?>

<p></p>
 
    
	<!--================ End Registration Area =================-->
	<?php
	include "./footer.php";
?>

