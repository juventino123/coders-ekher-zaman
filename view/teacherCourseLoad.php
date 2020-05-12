<?php
session_start();
require_once "../module/functions.php";

testAccess("teacher");

require_once('../module/DatabaseManager.php');
$db = new DatabaseManager();


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
            </div>
           
          </div>

          

         

        </div>
      </div>
</section>
<?php 
// select all the semesters
$semester1 = new semester($db);
$resultSelectSemester = $semester1->selectAllSemester();     

?>
<div class="container">
  <div class="form">

    <div class="form-row">
      <div class="form-group col-md-6">
      <select id="semesterBtn" name="semester" class="custom-select">
        <option value="0">Select a semester</option>
        <?php 

        foreach ($resultSelectSemester as $semester) {
           print '<option value="'.$semester['id'].(($semester['id'] == 1 )?' selected':'').'">'.$semester['name'].'</option>';
         
        } // end for?>
        
      </select>     
      </div>
      <div class="form-group col-md-6"></div>
     
    </div>
  
  </div>
  </div>   
<p></p>
         

<script type="text/javascript">
  $(document).ready(function () {
      
     $('#semesterBtn').change(function(){
      $.ajax('../controller/teacherCourseLoad.php',{
      type: 'POST',  // http method
      data: { semester: $(this).val() },  // data to submit
      success: function (data, status, xhr) {
        $('p').html(data);
      },
      error: function (jqXhr, textStatus, errorMessage) {
            $('p').html('Error' + errorMessage);
      }
  });
      });
     });
    </script>
    
	<!--================ End Registration Area =================-->
	<?php
	include "./footer.php";
?>

