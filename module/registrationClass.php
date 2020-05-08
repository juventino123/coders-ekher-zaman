<?php
require_once('../module/courseOfferingClass.php');
class registration
{
	public $id;
	public $courseOfferingId;
	public $studentId;
	public $grade;
	
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
	
	// get the number of credits taked by the current student in the current semester
	public function selectCourseRegistered($semesterId){
		
		$query = 'SELECT *,schedule.name as scheduleName, course.name as courseName,registration.id as registrationID
				  FROM  registration, courseoffering ,course, semester, schedule, teacher  
				  WHERE registration.courseOfferingId = courseoffering.id 
				  AND courseoffering.courseId = course.id
				  AND courseoffering.semesterId = semester.id 
				  AND courseoffering.scheduleId = schedule.id 
				  AND courseoffering.teacherId = teacher.id
				  AND semester.id = '.$semesterId.'
				  AND registration.studentId = '.$this->studentId;	 
			
		$resultRegisteredCourses = ($this->db)->selectQuery($query);
		$count_row = count($resultRegisteredCourses);

		// there's a result
		if ($count_row > 0){
			return $resultRegisteredCourses;

		} // end if
		
		// no result
		return 0;
		
	} 
	// get the number of credits taked by the current student in the nxt semester 
	public function totalStudentCredits(){
		
		$query = 'SELECT sum(course.numberOfCredits) as nbCredits
				  FROM  registration, courseoffering ,course, semester  
				  WHERE registration.courseOfferingId = courseoffering.id 
				  and courseoffering.courseId = course.id
				  and courseoffering.semesterId = semester.id 
				  AND semester.canRegister = 1
				  AND registration.studentId = '.$this->studentId.'
				  GROUP BY courseoffering.semesterId';	 
	
		

		$resultCountCredits = ($this->db)->selectQuery($query);
		
		foreach ($resultCountCredits as $credits) {
			return $credits['nbCredits'];

		} // end for

		return 0;
	} 
// get the number of credits taked by the current student in a specific semester
	public function totalStudentCreditsPerSemester($semesterID){
		
		$query = 'SELECT sum(course.numberOfCredits) as nbCredits
				  FROM  registration, courseoffering ,course, semester  
				  WHERE registration.courseOfferingId = courseoffering.id 
				  and courseoffering.courseId = course.id
				  and courseoffering.semesterId = semester.id 
				  AND semester.id = '.$semesterID.'
				  AND registration.studentId = '.$this->studentId.'
				  GROUP BY courseoffering.semesterId';	 
	
		

		$resultCountCredits = ($this->db)->selectQuery($query);
		
		foreach ($resultCountCredits as $credits) {
			return $credits['nbCredits'];

		} // end for

		return 0;
	} 

	// check if the current course has a time conflict with another course
	public function checkCourseSchedule(){
		
		$query = 'SELECT *
				  FROM  registration, courseoffering , semester  
				  WHERE registration.courseOfferingId = courseoffering.id 
				  and courseoffering.semesterId = semester.id 
				  AND semester.currentSemester = 1
				  AND registration.studentId = '.$this->studentId.'
				  AND courseoffering.id != '.$this->courseOfferingId.'
				  GROUP BY courseoffering.semesterId';	 
	
		

		$resultSchedule = ($this->db)->selectQuery($query);
		
		$count_row = count($resultSchedule);

		// the current course has a time conflict with another course
		if ($count_row == 1){
			return 1;
		} // end if
		else{

			return 0;
		} // end else
	} // end function

	// register in a course 
	public function registerCourse($semesterId){
		
		// 1- test if the student can register (nb credits < 18 )
		
		$nbCurrentStudentCredits = $this->totalStudentCreditsPerSemester($semesterId);
		
		// 2- get nb_credits of the CURRENT course 
		
		$course1 = new courseoffering($this->db);
		$course1->id = $this->courseOfferingId;
		$nbCurrentCourseCredits = $course1->getCourseNbCredits();

		$totalCredits = $nbCurrentStudentCredits + $nbCurrentCourseCredits;

		if( $totalCredits < 18 ){
			// 3 - checkCourseSchedule
			$resultConflict = $this->checkCourseSchedule();

			if( !$resultConflict ){
				// 4- add the course if nb credits < 18 
				$query = 'INSERT INTO registration(courseOfferingId,studentId,grade)
						  VALUES("'.$this->courseOfferingId.'",
						  		  '.$this->studentId.',
						  		  0)';	 
			
				$resultSelectUser = ($this->db)->executeQuery($query);

				$_SESSION['totalStudentCredits'] += $nbCurrentCourseCredits;
				return 1;
			}// END IF 
			
					
		} // end if 

		// the student can't add the course
		return 0;

	} // end function

	// delete a course 
	public function deleteCourse(){
		
		// get the nb of credits of the course taht we want to delete and make sure that it is registered in the current semester
		$query = 'SELECT course.numberOfCredits	
				  FROM  registration, courseoffering, course, semester  
				  WHERE registration.courseOfferingId = courseoffering.id 
				  AND courseoffering.courseId = course.id
				  AND courseoffering.semesterId = semester.id 
				  AND semester.currentSemester = 1
				  AND registration.id = '.$this->id;	 
	
		$resultNbCredits = ($this->db)->selectQuery($query);
		
		$count_row = count($resultNbCredits);

		// the current course has a time conflict with another course
		if ( $count_row == 1 ){
			foreach( $resultNbCredits as $value ){
				$_SESSION['totalStudentCredits'] -= $value['numberOfCredits'];		
			}		
		
			// delete a course in the current semester for the current student from registration 
			$query = 'DELETE 
					  FROM  registration
					  WHERE id = '.$this->id.'
					  AND studentId ='.$this->studentId;

			$resultSelectUser = ($this->db)->executeQuery($query);
			return 1;
			} // end if 
		else{
			return 0;
			}
		
	} // end function


} // end class
?>