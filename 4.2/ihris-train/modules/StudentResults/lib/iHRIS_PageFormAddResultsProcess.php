<?php
/*
 * © Copyright 2012 IntraHealth International, Inc.
 * 
 * This File is part of iHRIS
 * 
 * iHRIS is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
/**
 * @package iHRIS
 * @subpackage Manage
 * @access public
 * @author Ally Shaban <allyshaban5@gmail.com>
 * @copyright Copyright &copy; 2012 IntraHealth International, Inc. 
 * @since v4.1.4
 * @version v4.1.4
 */

/**
 * The page class for editing particpants for a training
 * @package iHRIS
 * @subpackage Manage
 * @access public
 */
	class iHRIS_PageFormAddResultsProcess extends I2CE_Page  {
	protected $exam_types=array();
	protected $course_id;
	protected $results=array();
	protected $reg_num;
	protected $user;
	protected $training_program;
	protected $person_id;
	protected $registered_academic_year;
	protected $date_registered;
	protected $core_courses=array();
	protected $optional_courses=array();
	protected $enrolled_courses=array();
	protected $curr_semester;
	protected $training_institution;
	protected $points;
	protected $GPA;
	protected $overall_GPA;
	protected $results_form;
	protected $update;
	protected $current_academic_year;
	protected $academic_year_id;
	
	protected function action() {
		if(!$this->hasPermission("task(can_add_students_results)" or $this->getUser()->role=="admin")) {
			$this->setRedirect("noaccess");
			}
	$this->ff = I2CE_FormFactory::instance();
	$this->user=new I2CE_User;
	//check to ensure that the current academic year is available
	iHRIS_AcademicYear::ensureAcademicYear();
	$this->current_academic_year=iHRIS_AcademicYear::currentAcademicYear();
	$academic_year_id=iHRIS_AcademicYear::academicYearId($this->current_academic_year);
	$this->academic_year_id="academic_year|".$academic_year_id;
	
	$this->course_id=$this->request("course_id");
	
	if ( ! ($courseObj = $this->ff->createContainer($this->course_id)) instanceof iHRIS_Training
	   || ! ($examTypesField = $courseObj->getField('training_course_exam_type')) instanceof I2CE_FormField_MAP_MULT
	   ) {
	  I2CE::raiseError("Invalid training course: " . $this->course_id);
	  return false;    
	}

	$courseObj->populate();
	$reg_numbers=$this->post("reg_num");	
	######start processing results of each student######
	foreach($reg_numbers as $this->reg_num) {
	$this->getParentId($this->reg_num);
	$all_results=false;
	$this->update=false;	
	######process each course assessment for this student######
	$exam_types=explode(",",$examTypesField->getDBValue());
	foreach ($exam_types as $exam_type) {
		if($this->post_exists($this->reg_num."_results")) {
			$this->students_results_grade_form="students_results_grade|".$this->post($this->reg_num."_results");
			break;
		}
		else {
			$this->students_results_grade_form="students_results_grade";
			}
		}

	foreach ($exam_types as $exam_type) {
		######Skip processing existing assessment results######
		$mark=$this->check_assessment_mark($exam_type);		
	   if(($this->post($exam_type."/".$this->reg_num))!="" and $mark < 0)
	        $this->results[$exam_type]=$this->post($exam_type."/".$this->reg_num);
	}

	if(count($this->results)>0)
	$this->saveResults($exam_types);
	unset($this->results);	
	######End of processing each course assessment for this student######
	}
	######End of processing results of each student######	
	}
	
	protected function saveResults($exam_types) {
	if (! ( $resultsgradeObj=$this->ff->createContainer($this->students_results_grade_form))  instanceof I2CE_Form
	 || ! ($trainingField = $resultsgradeObj->getField('training')) instanceof I2CE_FormField
	 || ! ($regNumField  = $resultsgradeObj->getField("registration_number")) instanceof I2CE_FormField
	 || ! ($accYearField  = $resultsgradeObj->getField("academic_year")) instanceof I2CE_FormField
	){
	I2CE::raiseError("Invalid Object");
	return false;
	}
	$resultsgradeObj->populate();
	//retrieve the enroll_course form for this person
	$where=array(	"operator"=>"AND",
						"operand"=>array(0=>array(	"operator"=>"FIELD_LIMIT",
															"field"=>"semester",
															"style"=>"equals",
															"data"=>array("value"=>$this->curr_semester)),
											  1=>array(	"operator"=>"FIELD_LIMIT",
															"field"=>"parent",
															"style"=>"equals",
															"data"=>array("value"=>$this->person_id)),
											  2=>array(	"operator"=>"FIELD_LIMIT",
															"field"=>"training",
															"style"=>"like",
															"data"=>array("value"=>"%".$this->course_id."%")),
											  3=>array(	"operator"=>"FIELD_LIMIT",
															"field"=>"registration",
															"style"=>"equals",
															"data"=>array("value"=>$this->student_registration["id"])),
											));
	$enrolls=I2CE_FormStorage::search("enroll_course",false,$where);
	foreach ($enrolls as $enroll) {
		$this->enroll_course="enroll_course|".$enroll;
		}
	$enrollObj=$this->factory->createContainer($this->enroll_course);
	$enrollObj->populate();
	$enroll_sem=$enrollObj->getField("semester")->getDBValue();
	$resultsgradeObj->getField("enroll_course")->setFromDB($this->enroll_course);
	$resultsgradeObj->getField("semester")->setFromDB($enroll_sem);
	$resultsgradeObj->getField("registration")->setFromDB($this->student_registration["id"]);
	$accYearField->setFromDB($this->academic_year_id);
	$trainingField->setFromDB($this->course_id);
	$regNumField->setFromPost($this->reg_num);		
	
	//check to see if all results are entered and calculate grade
	foreach ($exam_types as $exam_type) {
	        if(($this->post($exam_type."/".$this->reg_num))!="" or $this->check_assessment_mark($exam_type)>=0) {
				  $all_results_available=true;
				  }
			  else {
			     $all_results_available=false;
			     break;
		     }
	}
	
	$disco_reason=null;
	if($all_results_available) {
	$total_marks=$this->totalMarks($exam_types);
	$grade=$this->calculateGrade($total_marks);
	if(!($gradeField=$resultsgradeObj->getField("grade")) instanceof I2CE_FormField) {
	I2CE::raiseError("Invalid Object");
	return false;
	}
	$gradeField->setFromDB($grade);
	
	if(!($totalMarksField=$resultsgradeObj->getField("total_marks")) instanceof I2CE_FormField) {
	I2CE::raiseError("Invalid Object");
	return false;
	}
	$totalMarksField->setFromDB($total_marks);
	
	$status=$this->getStatus($total_marks);
	if(!($statusField=$resultsgradeObj->getField("status")) instanceof I2CE_FormField) {
	I2CE::raiseError("Invalid Object");
	return false;
	}
	$statusField->setFromDB($status);
	
	$attempt=$this->checkAttempt($this->course_id);
	$attempt++;
	$resultsgradeObj->getField("attempt")->setFromPost($attempt);
	}
	$date_uploaded=date("Y-m-d");
	$resultsgradeObj->getField("date_uploaded")->setFromDB($date_uploaded);
	$resultsgradeObj->getField("parent")->setValue($this->person_id);
	$resultsgradeObj->save($this->user);
	$results_grade_id=$resultsgradeObj->getID();
	
	foreach ($this->results as $field=>$result) {
		$assesResultsObj=$this->ff->createContainer("students_results");
		$assesResultsObj->getField("training_course_exam_type")->setFromDB($field);
		$assesResultsObj->getField("score")->setFromDB($result);
		$assesResultsObj->getField("parent")->setValue("students_results_grade|".$results_grade_id);		
		$assesResultsObj->save($this->user);
		}
		
	if($this->calculateGPA()) {
		$GPAObj=$this->getGPAObj();
		if($GPAObj==false)
		$semester_GPA="semester_GPA";
		else
		$semester_GPA=$GPAObj;
		$semesterGPAObj=$this->ff->createContainer($semester_GPA);
		$semesterGPAObj->populate();
		if(!$GPAObj) {
			$semesterGPAObj->getField("academic_year")->setFromDB($this->academic_year_id);
			$semesterGPAObj->getField("registration_number")->setFromPost($this->reg_num);
			$semester_name=$this->getCourseSemester();	
			$semesterGPAObj->getField("semester")->setFromDB($semester_name);
			$semesterGPAObj->getField("enroll_course")->setFromDB($this->enroll_course);
			$semesterGPAObj->getField("parent")->setValue($this->person_id);
			$semesterGPAObj->getField("registration")->setFromDB($this->student_registration["id"]);
			}
		$date_calc=date("Y-m-d");
		$semesterGPAObj->getField("GPA")->setFromDB($this->GPA);
		$semesterGPAObj->getField("date_calculated")->setFromDB($date_calc);
		$semesterGPAObj->save($this->user);
		
		//if the GPA is less than 1.5 then add to discontinued form		
		if($this->GPA<$this->min_semester_GPA) {
			if(isset($disco_reason))
			$disco_reason=$disco_reason.","."disco_reason|below_gpa";
			else
			$disco_reason="disco_reason|below_gpa";
		}
		
		######If all semester GPA Available,calculate overall GPA######
				//check total semesters
			$progObj=$this->ff->createContainer($this->training_program);
			$progObj->populate();
			$total_semesters=$progObj->getField("total_semesters")->getDBValue();
			$persObj=$this->ff->createContainer($this->person_id);
			$persObj->populateChildren("semester_GPA");
			if(count($persObj->getChildren("semester_GPA")) == $total_semesters) {
				foreach($persObj->getChildren("semester_GPA") as $GPAObj) {
					//we need to ensure that we pick GPA for the current registration only.
					if($GPAObj->getField("registration")->getDBValue()==$this->student_registration["id"])
					$total_GPA=$GPAObj->getField("GPA")->getDBValue()+$total_GPA;
					}
					
					$overall_GPA=$total_GPA/$total_semesters;
					$where=array(	"operator"=>"AND",
											"operand"=>array(0=>array(	"operator"=>"FIELD_LIMIT",
																				"field"=>"registration",
																				"style"=>"equals",
																				"data"=>array("value"=>$this->student_registration["id"])),
																  1=>array(	"operator"=>"FIELD_LIMIT",
																				"field"=>"parent",
																				"style"=>"equals",
																				"data"=>array("value"=>$this->person_id))
												              ));
					$overall_GPA=I2CE_FormStorage::search("overall_GPA",false,$where);
					if(count($overall_GPA)>0) {
						$overallGPAObj=$this->factory->createContainer("overall_GPA|".$overall_GPA[0]);
						}
					else {
						$overallGPAObj=$this->ff->createContainer("overall_GPA");
						}
					$overallGPAObj->populate();
					$overallGPAObj->getField("GPA")->setFromDB($overall_GPA);
					$overallGPAObj->getField("parent")->setValue($this->person_id);
					$overallGPAObj->getField("registration")->setFromDB($this->student_registration["id"]);
					$overallGPAObj->save($this->user);
					if($overall_GPA<$this->min_overall_GPA) {
						if(isset($disco_reason))
						$disco_reason=$disco_reason.","."disco_reason|below_overall_gpa";
						else
						$disco_reason="disco_reason|below_overall_gpa";
					}
				}
	   ######End of calculating overall GPA######
	}
	
	//if the discontnued reason exist then add this person to discontinued form
	if(isset($disco_reason))
	$this->addToDiscontinued($disco_reason,$this->getDiscoForm());	
	$this->save();
	return true;
	}
		
	protected function checkAttempt($course_id) {
	$where=array("operator"=>"AND","operand"=>array(
															 			0=>array("operator"=>"FIELD_LIMIT",
																					"field"=>"registration_number",
																					"style"=>"equals",
																					"data"=>array("value"=>$this->reg_num)),
																		1=>array("operator"=>"FIELD_LIMIT",
																					"field"=>"training",
																					"style"=>"equals",
																					"data"=>array("value"=>$course_id)),
																		2=>array("operator"=>"NOT",
																					"operand"=>array(
																									0=>array("operator"=>"FIELD_LIMIT",
																												"field"=>"semester",
																												"style"=>"equals",
																												"data"=>array("value"=>$this->curr_semester))
																										 )),
																		3=>array("operator"=>"FIELD_LIMIT",
																					"field"=>"registration",
																					"style"=>"equals",
																					"data"=>array("value"=>$this->student_registration["id"]))
																	));
	$results=I2CE_FormStorage::listFields("students_results_grade",array("attempt"),false,$where);
	$attempt=0;
	foreach($results as $result) {
		if($attempt<$result["attempt"]) {
			$attempt=$result["attempt"];
			}
		}
	return $attempt;
	}
	
	protected function getDiscoForm() {
		$where=array(	"operator"=>"AND",
							"operand"=>array(0=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"parent",
																"style"=>"equals",
																"data"=>array("value"=>$this->person_id)),
												  1=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"registration",
																"style"=>"equals",
																"data"=>array("value"=>$this->student_registration["id"]))
													));
		$disco=I2CE_FormStorage::Search("discontinued",false,$where);
		if(count($disco)>0)
		return "discontinued|".$disco[0];
		else
		return "discontinued";
	}
	
	protected function addToDiscontinued($reason,$discoForm) {
	if(!($discoObj=$this->ff->createContainer($discoForm)) instanceof I2CE_Form) {
			I2CE::raiseError("invalid Object");
			return false;
		}
		$discoObj->populate();
		$id=explode("|",$discoForm);
		if(count($id)==2) {
			$id=$id[1];
			$fields=I2CE_FormStorage::lookupField("discontinued",$id,array("reason"),false);
			$reason=$reason.",".$fields["reason"];
			$reasons_array=explode(",",$reason);
			$reasons=array_unique($reasons_array);
			$reason=implode(",",$reasons);
			}
		$date_disco=date("Y-m-d");
		$discoObj->getField("date_discontinued")->setFromDB($date_disco);
		$discoObj->getField("registration_number")->setFromPost($this->reg_num);
		$discoObj->getField("registration")->setFromDB($this->student_registration["id"]);
		$discoObj->getField("reason")->setFromDB($reason);
		$discoObj->getField("recommendations")->setFromDB("recommendations|FD");
		$discoObj->getField("parent")->setFromPost($this->person_id);
		$discoObj->getField("academic_year")->setFromDB($this->academic_year_id);
		$discoObj->save($this->user);
	}
	
	protected function getGPAObj() {
		$course_semester=getCourseSemester();
	   $where = array(	'operator'=>'AND','operand'=>array(
	   																		0=>array('operator' => 'FIELD_LIMIT',
	        	      																	'field' => "registration_number",
																							'style' => 'equals',
	        	      																	'data' => array('value' => $this->reg_num)),
	        	      														1=>array('operator'=> 'FIELD_LIMIT',
	        	      																	'field' => 'semester',
	        	      																	'style' =>'equals',
	        	      																	'data' => array('value' => $course_semester)),
																				2=>array('operator'=>'FIELD_LIMIT',
																						'field'=>'registration',
																						'style'=>'equals',
																						'data'=>array('value'=>$this->student_registration["id"]))
	        	      													  ));
		$GPA_array = I2CE_FormStorage::ListFields('semester_GPA',array("id"),false,$where);
		if(count($GPA_array)==0)
		return false;
		foreach($GPA_array as $id=>$GPA)
		return "semester_GPA|".$id;
		}
	
	protected function getParentId($reg_num) {
	          $where = array('operator' => 'FIELD_LIMIT',
	        	      		'field' => "registration_number",
								'style' => 'equals',
	        	      		'data' => array('value' => $reg_num)
							 );
	$registrations = I2CE_FormStorage::ListFields('registration',array("parent"),false,$where);
	
	foreach($registrations as $registration) {
		$this->person_id=$registration["parent"];
		}

		$this->student_registration=STS_PageFormPerson::load_current_registration($this->person_id);
		
		$this->date_registered=$this->student_registration["registration_date"];
		$this->training_program=$this->student_registration["training_program"];
		$this->training_institution=$this->student_registration["training_institution"];
		$this->curr_semester=$this->student_registration["semester"];
		$this->registered_academic_year=$this->student_registration["academic_year"];
		$instObj=$this->ff->createContainer($this->training_institution);
		$instObj->populate();
		$this->min_semester_GPA=$instObj->getField("minimum_semester_GPA")->getDBValue();
		$this->min_overall_GPA=$instObj->getField("minimum_overall_GPA")->getDBValue();
		$this->passing_score=$instObj->getField("passing_score")->getDBValue();
	}
	
	protected function getStatus($total_marks) {
	if($total_marks>=$this->passing_score and $total_marks<=100)
	$status="status|pass";
	else if($total_marks>=0 and $total_marks<$this->passing_score)
	$status="status|fail";
	return $status;
	}
	
	protected function calculateGrade($total_marks) {
		if($total_marks>=90 and $total_marks<=100) {
			$this->points=5;
			$grade="A+";
		}
		else if($total_marks>=85 and $total_marks<=89.9) {
			$this->points=4.9;
			$grade="A";
		}
	else if($total_marks>=80 and $total_marks<=84.9) {
			$this->points=4.7;
			$grade="A-";
		}
	else if($total_marks>=75 and $total_marks<=79.9) {
			$this->points=4.5;
			$grade="B+";
		}
	else if($total_marks>=70 and $total_marks<=74.9) {
			$this->points=4;
			$grade="B";
		}
	else if($total_marks>=65 and $total_marks<=69.9) {
			$this->points=3.5;
			$grade="B-";
		}
	else if($total_marks>=60 and $total_marks<=64.9) {
			$this->points=3;
			$grade="C+";
		}
	else if($total_marks>=55 and $total_marks<=59.9) {
			$this->points=2.5;
			$grade="C";
		}
	else if($total_marks>=50 and $total_marks<=54.9) {
			$this->points=2;
			$grade="C-";
		}
	else if($total_marks>=45 and $total_marks<=49.9) {
			$this->points=1.5;
			$grade="D+";
		}
	else if($total_marks>=40 and $total_marks<=44.9) {
			$this->points=1;
			$grade="D";
		}
	else if($total_marks>=35 and $total_marks<=39.9) {
			$this->points=0.5;
			$grade="D-";
		}
	else if($total_marks>=0 and $total_marks<=34.9) {
			$this->points=0;
			$grade="E";
		}
	
	return $grade;
	}
	
	protected function totalMarks($exam_types) {
		foreach ($exam_types as $exam_type) {
			$result=$this->check_assessment_mark($exam_type);
			//if no results from DB,try to check,it might be the one which is currently processed
			if($result==-1) {				
				$result=$this->post($exam_type."/".$this->reg_num);
				}				
			$total_marks=$total_marks+$result;
			}
		return $total_marks;
		}
	
	protected function check_assessment_mark($exam_type) {
		$mark=-1;
		$resultsObj=$this->ff->createContainer($this->students_results_grade_form);		
		$resultsObj->populateChildren("students_results");
		foreach($resultsObj->getChildren("students_results") as $results) {
			$assessment=$results->getFIeld("training_course_exam_type")->getDBValue();
			if($assessment==$exam_type) {
				$mark=$results->getFIeld("score")->getDBValue();				
				}
			}
			return $mark;	          
	}
	
	protected function calculateGPA() {
	$semester=$this->getCourseSemester();
	
	$this->loadEnrolledCourses($semester,$this->person_id);
	
	if($this->allResultsLoaded()) {
	return true;
	}
	}
	
	protected function getCourseSemester() {
		$id=explode("|",$this->course_id);
		$where=array(
					'operator' => 'FIELD_LIMIT',
		              'field' => 'id',
		              'style' => 'equals',
		              'data' => array(
		                  'value' => $id[1]
		                  )
		              );
		            $semesters = I2CE_FormStorage::listFields("training",array("semester"),false,$where);
		foreach($semesters as $semester_array)
			$semester=$semester_array["semester"];
		return $semester;
	}
	
	protected function loadEnrolledCourses($semester,$person_id) {
		$where = array(	'operator'=>'AND',
								'operand'=>array(0=>array(	'operator'=>'FIELD_LIMIT',
	                      									'field'=>'parent',
	                      									'style'=>'equals',
	                      									'data'=>array('value'=>$person_id)),
	                    						  1=>array(	'operator'=>'FIELD_LIMIT',
	                          								'field'=>'semester',
	                          								'style'=>'equals',
	                          								'data'=>array('value'=>$semester)),
													  2=>array(	'operator'=>'FIELD_LIMIT',
																	'field'=>'registration',
																	'style'=>'equals',
																	'data'=>array('value'=>$this->student_registration["id"]))
	                                     ));
	        
		$courses= I2CE_FormStorage::listFields("enroll_course",array("training"),false,$where);
		foreach ($courses as $course) {
			$course_array=explode(",",$course["training"]);
			foreach($course_array as $course)
				$this->enrolled_courses[]=$course;
			}
	return $this->enrolled_courses;
	}
	
	protected function allResultsLoaded() {
	foreach ($this->enrolled_courses as $course) {
		//obtain the highest marks for this course
		if($course!=$this->course_id)
		{
			$total_course_marks=$this->getCourseHighestMark($course);
		}
		
		if(!isset($total_course_marks) and $course!=$this->course_id)
		return false;
		
		
		if($course==$this->course_id) {
		if ( ! ($courseObj = $this->ff->createContainer($course)) instanceof iHRIS_Training
	   || ! ($examTypesField = $courseObj->getField('training_course_exam_type')) instanceof I2CE_FormField_MAP_MULT
	   ) {
	  		I2CE::raiseError("Invalid training course: " . $this->course_id);
	  		return false;
		}
		$courseObj->populate();
		
		//check if there is already results of this course in the DB
		$db_marks=$this->getCourseHighestMark($course);
		$exam_types=explode(",",$examTypesField->getDBValue());
		//retrieve results of this course which are currently entered
		foreach ($exam_types as $exam_type) {
			$results=$this->check_assessment_mark($exam_type);		
			if($results!=-1)
			$total_course_marks=$results+$total_course_marks;		
			else if($this->post($exam_type."/".$this->reg_num)!="")		
			$total_course_marks=$this->post($exam_type."/".$this->reg_num)+$total_course_marks;		
			else
			return false;
		}
		if($db_marks>$total_course_marks)
		$total_course_marks=$db_marks;
		}
			
			
			$grade=$this->calculateGrade($total_course_marks);
			$total_course_marks=null;
			$db_marks=null;
			$courseObj = $this->ff->createContainer($course);
			$courseObj->populate();
			$credits=$courseObj->getField('course_credits')->getValue();
			$quality_points=$credits*$this->points;
			$total_quality_points=$total_quality_points+$quality_points;
			$total_credits=$total_credits+$credits;
	}
			$this->GPA=number_format($total_quality_points/$total_credits,3);
			return true;
	}
	
	protected function getCourseHighestMark($course_id) {
		$where=array("operator"=>"AND","operand"=>array(
																 			0=>array("operator"=>"FIELD_LIMIT",
																						"field"=>"registration_number",
																						"style"=>"equals",
																						"data"=>array("value"=>$this->reg_num)),
																			1=>array("operator"=>"FIELD_LIMIT",
																						"field"=>"training",
																						"style"=>"equals",
																						"data"=>array("value"=>$course_id)),
																			2=>array("operator"=>"FIELD_LIMIT",
																						"field"=>"registration",
																						"style"=>"equals",
																						"data"=>array("value"=>$this->student_registration["id"]))
																		));
		$results=I2CE_FormStorage::ListFields("students_results_grade",array("total_marks"),false,$where);
		$mark=null;
		foreach($results as $result) {
			//if total marks is missing then this course has no all results,return false
			if($mark<$result["total_marks"])
			$mark=$result["total_marks"];
			}																
		return $mark;
	}
	
	protected function save() {
	$this->userMessage("Results Entered Successfully!!!");
	$this->setRedirect( "add_results?id=" . $this->course_id);
	}	
	}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
