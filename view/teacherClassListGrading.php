<?php
session_start();
require_once "../module/functions.php";

testAccess("teacher");

require_once('../module/DatabaseManager.php');
$db = new DatabaseManager();


require_once('../module/semesterClass.php');

require_once('../module/registrationClass.php');


include "./header.php";
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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

// select all the semesters
//$semester1 = new semester($db);
//$resultSelectSemester = $semester1->selectAllSemester();

if(isset($_GET['val']))
{
    $chosenCourseOfferingId = intval($_GET['val']);
    $_SESSION['chosenCourseOfferingID'] = $chosenCourseOfferingId; // Added
}
else{

    // echo "chosenCourseOfferingID is = " . $_SESSION['chosenCourseOfferingID'];
}


// select all registered students in a course
$registration1 = new registration($db);

$resultRegisteredStudents = $registration1->selectRegisteredStudentsInCourse($_SESSION['chosenCourseOfferingID']); 


//print('<pre>');
//print_r($resultRegisteredStudents);
//print('</pre>');

// NOTE maybe have to put these in controller

if(empty($resultRegisteredStudents) ){
	 print '<div class="container alert alert-danger" role="alert">No result Found</div>';
}
else{

        print '<div id="result1"></div>';
        
	print '<div class="container">
      
      <div class="row border row-title-green">
        <div class="col-2 border">Student ID</div>
        <div class="col-2 border">First Name</div>
        <div class="col-2 border">Middle Name</div>
        <div class="col-2 border">Last Name</div>
        <div class="col-1 border"><center>Current Grade</center></div>
        <div class="col-1 border"><center>New Grade</center></div>
        <div class="col-2 border"></div>
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
        <div class="col-2 border">'.$studentRegistration['studentLastName'].'</div>';

        print '<div class="col-1 border"><center>'.((!empty($studentRegistration['registrationStudentGrade']))?$studentRegistration['registrationStudentGrade']:'---').'</center>
        
 		    </div>';

        print '<div class="col-1 border">';
        if(!empty($studentRegistration['registrationStudentGrade']))
        {
            print '<center><select name="grade'.$studentRegistration['registrationStudentId'].'" id="grade'.$studentRegistration['registrationStudentId'].'">';

							for($i=100; $i>=20; $i--)
							{	
                $status = '';
								if($studentRegistration['registrationStudentGrade'] == $i)
                {
                  $status = 'selected'; 
                }
                
                print '<option value="'.$i.'"'.$status.'>'.$i.'</option>'; // display a set of grades between 10 and 100
							}
        
            print '</select></center>';
        }
        else
        {
            print '<center><select name="grade'.$studentRegistration['registrationStudentId'].'" id="grade'.$studentRegistration['registrationStudentId'].'">';

							for($i=100; $i>=20; $i--)
							{	
                $status = '';
								if($i == 50)
                {
                  $status = 'selected'; 
                }
                
                print '<option value="'.$i.'"'.$status.'>'.$i.'</option>'; // display a set of grades between 10 and 100
							}
        
            print '</select></center>';
        }
        
        print '</div>';
        
        ?>
    
        
        <?php
        
        print '<div class="col-2 border"><center><input type="button" class="btnUpdateGrade" id="btn-' . $studentRegistration['registrationStudentId'] . '" value="Update"></input></center></div>';
        
        // print '<div class="col-2 border"><center><a href="../controller/teacherClassListGrading.php?registrationStudentId=' . $studentRegistration['registrationStudentId'] . '&newGrade=70" class="btn btn-info btn-sm" role="button"><i class="ion-ios-add-outline"></i>Update</a></center></div>';
        
         print '</div>';
 
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
    

      
      print '</div>'; //  
      
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



		<script>

			function GetSelectedValue(){
				var e = document.getElementById("country");
				var result = e.options[e.selectedIndex].value;

				document.getElementById("result").innerHTML = result;
			}

			function GetSelectedText(){
				var e = document.getElementById("country");
				var result = e.options[e.selectedIndex].text;

				document.getElementById("result").innerHTML = result;
			}

<p><span id="selectedValue"></span></p>
		</script>




<script>
  $(document).ready(function(){
  $(".btnUpdateGrade").click(function(){

  var sID = (this.id).split("-");

  var gradeOfStudentIndex ="#grade"+sID[1];

  var studentNewGrade = $(gradeOfStudentIndex).children("option:selected").val();

  //alert(" " + sID + "     " + gradeOfStudentIndex+"  "+studentNewGrade);

  $.post('../controller/teacherClassListGrading.php',
  {
  studentIdToUpdate: sID[1],
  newGrade: studentNewGrade
  },
  function(data,status){
  $('#result1').html(data);
  history.go(0);
  header("location:teacherClassListGrading.php?val=" . $_SESSION['chosenCourseOfferingID']);

  });
  });
  });
</script>
 
    
	<!--================ End Registration Area =================-->
	<?php
	include "./footer.php";
?>

