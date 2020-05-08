<?php

class courseoffering
{
	public $id;
	public $semesterId;
	public $courseId;
	public $scheduleId;
	public $teacherId;
	
	public function __set($property, $value){	
		
		$this->property = $value;

	} 
	public function __get($property){
		return $this->property;
	} 
	

    function __construct($db)
    {
    	
		$this->db = $db;
	}
	

// get the number of credits of a specific course
	public function getCourseNbCredits(){
		$query = 'SELECT course.numberOfCredits as nbCredits
				  FROM  course, courseoffering 
				  WHERE  course.id = courseoffering.courseId
				  and courseoffering.id = '.$this->id;
				 
	echo $query;
		//checking if the username is available in db

		$resultCountCredits = ($this->db)->selectQuery($query);
		foreach ($resultCountCredits as $course) {
			return $course['nbCredits'];
		} // end for

		return 0;
	} // end function getCourseNbCredits
  
  

  public function selectCourseOfferingTeacher($semId){
  		
    // echo "<br>SemesterID = " . $semId . "<br>";
    // echo "<br>TeacherID = " . $this->teacherId . "<br>";
    
    $query = 'SELECT *, courseOffering.id as courseOfferingId, courseOffering.courseId as courseOfferingCourseId, course.id as courseId, course.code as courseCode, course.name as courseName, courseOffering.scheduleId as scheduleId, schedule.name as scheduleName 
              FROM ((courseOffering INNER JOIN course ON courseOffering.courseId = course.id) INNER JOIN schedule ON courseOffering.scheduleId = schedule.id) 
              WHERE ((courseOffering.teacherID ='.$this->teacherId.') AND (courseOffering.semesterID ='. $semId . '))';
      
    $resultCourses = ($this->db)->selectQuery($query);
		$count_row = count($resultCourses);

		// there's a result
		if ($count_row > 0){
			return $resultCourses;

		} // end if
    
		// no result
		return 0;
  
  } // end function selectCourseOfferingTeacher
  

public function selectCourseOffering($studentId){

	
		$query = 'SELECT *,schedule.name as scheduleName, course.name as courseName,courseoffering.id  as courseOfferingID
				  FROM  courseoffering ,course, schedule, teacher  
				  WHERE courseoffering.courseId = course.id
				  and courseoffering.scheduleId = schedule.id 
				  AND courseoffering.teacherId = teacher.id
				  AND courseoffering.semesterId = '.$this->semesterId.'
				  AND courseoffering.id NOT IN (SELECT courseOfferingId 
				  							    FROM registration,courseoffering
				  								where registration.courseOfferingId = courseoffering.id
				  								and courseoffering.semesterId= '.$this->semesterId.'
				  								and studentId ='. $studentId.')';		
		$resultCourses = ($this->db)->selectQuery($query);
		$count_row = count($resultCourses);

		// there's a result
		if ($count_row > 0){
			return $resultCourses;

		} // end if
		
		// no result
		return 0;
	} // end function
} // end class
?>	