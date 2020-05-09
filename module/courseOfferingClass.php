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
    
    $query = 'SELECT *, courseoffering.id as courseOfferingId, courseoffering.courseId as courseOfferingCourseId, course.id as courseId, course.code as courseCode, course.name as courseName, courseoffering.scheduleId as scheduleId, schedule.name as scheduleName 
              FROM ((courseoffering INNER JOIN course ON courseoffering.courseId = course.id) INNER JOIN schedule ON courseoffering.scheduleId = schedule.id) 
              WHERE ((courseoffering.teacherID ='.$this->teacherId.') AND (courseoffering.semesterID ='. $semId . '))';
      
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
	
	// check if the current course has a time conflict with another course
	public function checkCourseOfferingExist(){
		
		$query = 'SELECT *
				  FROM  courseoffering ,course, semester, schedule, teacher  
				  WHERE courseoffering.courseId = course.id
				  AND courseoffering.semesterId = semester.id 
				  AND courseoffering.scheduleId = schedule.id 
				  AND courseoffering.teacherId = teacher.id
				  AND semester.canRegister =1
				  AND courseoffering.teacherId = '.$this->teacherId.'
				  AND courseoffering.scheduleId =  '.$this->scheduleId;	 
			
		$resultCourseOffered = ($this->db)->selectQuery($query);
		$count_row = count($resultCourseOffered); 
	
		// there is a course added with the same teacher and the same schedule
		if ($count_row >0){
			return 1;
		} // end if
		else{

			return 0;
		} // end else
	} // end function

		public function addCourse(){
		
		// add the courseoffering if the courseoffering doesn't exist
		if( !$this->checkCourseOfferingExist()){	
			$query = 'INSERT INTO courseoffering(semesterId,courseId,scheduleId,teacherId)
					  VALUES('.$this->semesterId.',
							  '.$this->courseId.',
							  '.$this->scheduleId.',
							  '.$this->teacherId.')';	 
		
			$resultInsert = ($this->db)->executeQuery($query);

			return 1;
			}
		else{
			return 0;
			}
			

	} // end function
		//
		public function selectCourseOffered(){
		
		$query = 'SELECT *,schedule.name as scheduleName, course.name as courseName,courseoffering.id as courseOfferingID
				  FROM  courseoffering ,course, semester, schedule, teacher  
				  WHERE courseoffering.courseId = course.id
				  AND courseoffering.semesterId = semester.id 
				  AND courseoffering.scheduleId = schedule.id 
				  AND courseoffering.teacherId = teacher.id
				  AND semester.canRegister =1';	 
			
		$resultCourseOffered = ($this->db)->selectQuery($query);
		$count_row = count($resultCourseOffered);

		// there's a result
		if ($count_row > 0){
			return $resultCourseOffered;

		} // end if
		
		// no result
		return 0;
		
	}
// delete a course 
	public function deleteCourse(){
		
		
			// delete a courseoffering 
			$query = 'DELETE 
					  FROM  courseoffering
					  WHERE id = '.$this->id;

			$resultSelectUser = ($this->db)->executeQuery($query);
			return 1;
		
		
	} // end function
	
} // end class
?>