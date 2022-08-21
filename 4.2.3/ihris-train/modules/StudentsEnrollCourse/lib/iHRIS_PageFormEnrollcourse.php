<?php
/*
 * © Copyright 2007, 2008 IntraHealth International, Inc.
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
 * Manage license renewals.
 * 
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 * @author Ally Shaban <allyshaban5@gmail.com>
 * @copyright Copyright &copy; 2007, 2008 IntraHealth International, Inc. 
 * @since v2.0.0
 * @version v2.0.0
 */

/**
 * Page object to handle the renewal of licenses.
 * 
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 */
	class iHRIS_PageFormEnrollcourse extends iHRIS_PageFormParentPerson {
	protected $person_id;
	protected $program;
	protected $training_institution;
	protected $curr_semester;
	protected $curr_level;
	protected $date_registered;
	protected $passing_score;
	protected $subject_courses=array();
	protected $elective_courses=array();
	protected function action() {
		$role=$this->getUser()->role;


		if($role!="student")
		{
	     $this->userMessage("Only A Student Can Enroll Into Courses");
	     $this->setRedirect(  "view?id=" . $this->Get("parent") );
	     return false;     	
		}

	iHRIS_AcademicYear::ensureAcademicYear();
	$this->person_id=$this->Get("parent");
	$this->getProgramAndSemester();

	############Deny Course Registration For A Student Dropped Out Of Semester###################
	$persObj=I2CE_FormFactory::instance()->createContainer($this->person_id);
	$persObj->populateChildren("drop_semester");
	foreach($persObj->getChildren("drop_semester") as $dropSemObj) {
		//check to insure that this drop semester is the one that belongs to the current registration
		if($dropSemObj->getField("registration")->getDBValue()!=$this->student_registration["id"])
		continue;
		$dropSemObj->populateChildren("resume_semester");
		$resSemObj=$dropSemObj->getChildren("resume_semester");
		if(count($resSemObj)==0) {
			$this->userMessage("You Are Currently Dropped From A Semester,Course Enrollment Not Allowed");
      	$this->setRedirect(  "view?id=" . $this->person_id );
      	return;
			}
		}
	############End Of Denying Course Registration For A Student Dropped Out Of Semester###################
	
	############checking if course enrollment closed#################
	$username=$this->getUser()->username;
	$this->training_institution=iHRIS_PageFormLecturer::fetch_institution($username);
	$where=array(	"operator"=>"FIELD_LIMIT",
						"field"=>"training_institution",
						"style"=>"equals",
						"data"=>array("value"=>$this->training_institution));
	$fields=I2CE_FormStorage::listFields("schedule_course_enrollment",array("start_date","end_date"),false,$where);
	foreach($fields as $id=>$field) {
		$start_date=$field["start_date"];
		$end_date=$field["end_date"];
	}
	
	if(count($fields)==0) {
		$this->userMessage("Course Registration Closed");
		$this->setRedirect("view?id=" . self::$person_id);
		return false;	
	}
	
	else {
		$start_date=strtotime($start_date);
		$end_date=strtotime($end_date);
		$today=strtotime(date("Y-m-d"));
		if($today>$end_date) {
			$this->userMessage("Course Registration Closed");
			$this->setRedirect("view?id=" . self::$person_id);
			return false;
		}
	}
	########### End checking of course enrollment deadline #####################
	
	########### Check if this student is not discontinued  #####################
	if($this->check_discontinue($this->person_id)) {
		$this->userMessage("You have discontinued from this program!!!");
		$this->setRedirect( "view?id=" . $this->person_id);
		return false;
	}
	########### End of checking if a student has discontinued #################
	
	########### If its a new semester then increment the semester and level ################
	######get total number of semesters######
	list($prog_form,$prog_id)=array_pad(explode("|",$this->program,2),2,"");	
	$total_sems=I2CE_FormStorage::lookupField("training_program",$prog_id,array("total_semesters"),false);
	$total_semesters=$total_sems["total_semesters"];
	######end of getting total number of semesters######
	
	######get passing score######
	list($inst_form,$inst_id)=array_pad(explode("|",$this->training_institution,2),2,"");	
	$pass_score=I2CE_FormStorage::lookupField("training_institution",$inst_id,array("passing_score"),false);
	$this->passing_score=$pass_score["passing_score"];
	######end of getting passing score######
	
	$semester_name=self::getSemesterName($this->curr_semester);
	$where_GPA=array(
							"operator"=>"AND",
							"operand"=>array(
													0=>array(
																"operator"=>"FIELD_LIMIT",
																"field"=>"parent",
																"style"=>"equals",
																"data"=>array("value"=>$this->person_id)),
													1=>array(
																"operator"=>"FIELD_LIMIT",
																"field"=>"semester",
																"style"=>"equals",
																"data"=>array("value"=>$this->curr_semester)	),							
																  ),
													2=>array(
																"operator"=>"FIELD_LIMIT",
																"field"=>"registration",
																"style"=>"equals",
																"data"=>array("value"=>$this->student_registration["id"])
												 )
							);
	######if GPA for current semester available then increment the semester######
	$sem_GPA=I2CE_FormStorage::Search("semester_GPA",false,$where_GPA);
	if(count($sem_GPA)>0 and $semester_name<$total_semesters) {
		$regObj=$this->factory->createContainer($this->student_registration["id"]);
		list($form,$level)=array_pad(explode("|",$this->curr_level,2),2,"");
		$semester_name=++$semester_name;
		if($semester_name % 2!=0)
		$new_level=++$level;
		$new_semester="semester|".$semester_name;
		$user=new I2CE_User;
		$regObj->populate();
		$regObj->getField("semester")->setFromDB($new_semester);
		if($semester_name % 2!=0)
		$regObj->getField("academic_level")->setFromDB("academic_level|".$new_level);
		$regObj->save($user);
	}
	########### End of incrementing the semester and level ############	
			
	$this->getProgramCourses($this->curr_semester);
	$this->getElectiveCourses($this->curr_semester);
	$this->getPreviousSemesterCourses($this->curr_semester);
	if(count($this->subject_courses)==0 and count($this->elective_courses)==0) {
		$this->userMessage("No courses defined into the system,try later on!!!");
		$this->setRedirect( "view?id=" . $this->person_id);
	}
	
	$this->displayCourses($this->subject_courses,"subject","Subject Courses");
	if(count($this->elective_courses)>0)
	$this->displayCourses($this->elective_courses,"elective","Elective Courses");
	
	//append hidden values to be used on the onload
	    if (! ($hidden = $this->template->getElementByID("hidden_values")) instanceof DOMNode)
		return ;
	$input=$this->template->createElement("input",array("type"=>"hidden","name"=>"person_id","value"=>$this->person_id));
	$this->template->appendNode($input,$hidden);
	$input=$this->template->createElement("input",array("type"=>"hidden","name"=>"curr_semester","value"=>$this->curr_semester));
	$this->template->appendNode($input,$hidden);
	
	if (! ($div = $this->template->getElementByID("button")) instanceof DOMNode)
	return ;
	$input =$this->template->createElement("input",array("type"=>"submit","value"=>"Save"));
	$this->template->appendNode($input,$div);	
	}
	
	protected function check_discontinue($person_id) {
		$where_disco=array("operator"=>"AND",
									"operand"=>array(0=>array(	"operator"=>"FIELD_LIMIT",
																		"field"=>"parent",
																		"style"=>"equals",
																		"data"=>array("value"=>$person_id)),
														  1=>array(	"operator"=>"FIELD_LIMIT",
																		"field"=>"registration",
																		"style"=>"equals",
																		"data"=>array("value"=>$this->student_registration["id"])),
							     ));
		$isdisco=I2CE_FormStorage::search("discontinued",false,$where_disco);
		if(count($isdisco)>0) {
			return true;
			}
		}
		
	protected function getProgramAndSemester() {
		$this->student_registration=STS_PageFormPerson::load_current_registration($this->person_id);
		$this->date_registered=$this->student_registration["registration_date"];
		$this->program=$this->student_registration["training_program"];
		$this->curr_semester=$this->student_registration["semester"];
		$this->curr_level=$this->student_registration["academic_level"];
		$this->training_institution=$this->student_registration["training_institution"];
	}
	
	protected function isEnrolled($training_course) {
	$academic_year=iHRIS_AcademicYear::currentAcademicYear();
	$academic_year_id=iHRIS_AcademicYear::academicYearId($academic_year);
	$academic_year_id="academic_year|".$academic_year_id;
	$where=array("operator"=>"AND","operand"=>array(
								0=>array("operator"=>"FIELD_LIMIT",
											"field"=>"parent",
											"style"=>"equals",
											"data"=>array("value"=>$this->person_id)),
								1=>array("operator"=>"FIELD_LIMIT",
											"field"=>"training",
											"style"=>"like",
											"data"=>array("value"=>"%".$training_course."%")),
								2=>array("operator"=>"FIELD_LIMIT",
											"field"=>"academic_year",
											"style"=>"equals",
											"data"=>array("value"=>$academic_year_id)),
								3=>array("operator"=>"FIELD_LIMIT",
											"field"=>"registration",
											"style"=>"equals",
											"data"=>array("value"=>$this->student_registration["id"])),
											));
	$is_enrolled=I2CE_FormStorage::search('enroll_course',false, $where);
	if(count($is_enrolled)>0)
	return true;
	}
	
	protected function getProgramCourses($semester) {
		$current_academic_year=iHRIS_AcademicYear::currentAcademicYear();
		$academic_year_id=iHRIS_AcademicYear::academicYearId($current_academic_year);
		$current_academic_year_id="academic_year|".$academic_year_id;
		$where=array(
				"operator"=>"AND",
				"operand"=>array(
						0=>array(
							"operator"=>"FIELD_LIMIT",
							"field"=>"semester",
							"style"=>"equals",
							"data"=>array("value"=>$semester)
							),
						1=>array(
							"operator"=>"FIELD_LIMIT",
							"field"=>"training_program",
							"style"=>"equals",
							"data"=>array("value"=>$this->program)
							)
						)
				);
	
		$courses=I2CE_FormStorage::listFields("training",array("id"),false,$where);
		
		foreach ($courses as $id=>$course_array) {
			$training_course="training|".$id;
			//check if this course has been rescheduled to other semesters and ignore it
			if($this->is_rescheduled($training_course,$current_academic_year_id,$semester))
			continue;
			
			$this->subject_courses[$id]=$training_course;
		}
		
		//get program courses that have been rescheduled to this semester
		$where=array(	"operator"=>"AND",
							"operand"=>array(0=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"academic_year",
																"style"=>"equals",
																"data"=>array("value"=>$current_academic_year_id)),
												  1=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"semester",
																"style"=>"equals",
																"data"=>array("value"=>$semester)),
												  2=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"training_program",
																"style"=>"equals",
																"data"=>array("value"=>$this->program)),
												  3=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"training_institution",
																"style"=>"equals",
																"data"=>array("value"=>$this->training_institution))
												 ));
		$courses=I2CE_FormStorage::listFields("reschedule_course",array("training"),false,$where);
		foreach ($courses as $course) {
			$trn_id=explode("|",$course["training"]);
			$id=$trn_id[1];
			$this->subject_courses[$id]=$course["training"];
			}
	}
	
	protected function is_rescheduled($course,$academic_year,$curr_semester) {
		$where=array(	"operator"=>"AND",
							"operand"=>array(0=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"training",
																"style"=>"equals",
																"data"=>array("value"=>$course)),
												  1=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"training_institution",
																"style"=>"equals",
																"data"=>array("value"=>$this->training_institution)),
												  2=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"old_semester",
																"style"=>"equals",
																"data"=>array("value"=>$curr_semester)),
												  3=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"academic_year",
																"style"=>"equals",
																"data"=>array("value"=>$academic_year))
												 ));
		$is_rescheduled=I2CE_FormStorage::search("reschedule_course",false,$where);
		if(count($is_rescheduled)>0) {
			return true;
			}
		return false;
		}
		
	//check courses that a student failed
	protected function getPreviousSemesterCourses($curr_semester) {
		$current_academic_year=iHRIS_AcademicYear::currentAcademicYear();
		$academic_year_id=iHRIS_AcademicYear::academicYearId($current_academic_year);
		$current_academic_year_id="academic_year|".$academic_year_id;
		$curr_semester=self::getSemesterName($curr_semester);
		for($semester=$curr_semester;$semester>0;$semester=$semester-2) {
		if($semester==$curr_semester)
		continue;
		$semester_id="semester|". self::getSemesterId($semester);
		//check previous semester courses a student failed which have been rescheduled and include them
		$where=array(	"operator"=>"AND",
							"operand"=>array(0=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"semester",
																"style"=>"equals",
																"data"=>array("value"=>$semester_id)),
												  1=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"training_program",
																"style"=>"equals",
																"data"=>array("value"=>$this->program)),
												  2=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"academic_year",
																"style"=>"equals",
																"data"=>array("value"=>$current_academic_year_id)),
												  3=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"training_institution",
																"style"=>"equals",
																"data"=>array("value"=>$this->training_institution))
								  				 ));
		$rescheduled_courses=I2CE_FormStorage::listFields("reschedule_course",array("training"),false,$where);
		foreach($rescheduled_courses as $courses) {
			$trng_id=explode("|",$courses["training"]);
			$training_courses[]=$trng_id[1];
			}
		$where_rescheduled=array(	"operator"=>"FIELD_LIMIT",
												"field"=>"id",
												"style"=>"in",
												"data"=>array("value"=>$training_courses));
												
		$resch_trang=I2CE_FormStorage::listFields("training",array("id"),false,$where_rescheduled);
		$where=array(
				"operator"=>"AND",
				"operand"=>array(
						0=>array(
							"operator"=>"FIELD_LIMIT",
							"field"=>"semester",
							"style"=>"equals",
							"data"=>array("value"=>$semester_id)
							),
						1=>array(
							"operator"=>"FIELD_LIMIT",
							"field"=>"training_program",
							"style"=>"equals",
							"data"=>array("value"=>$this->program)
							)
						)
				);
		$sem_courses=I2CE_FormStorage::listFields("training",array("id"),false,$where);
		$courses=array_merge($sem_courses,$resch_trang);
		foreach ($courses as $id=>$course_array) {
			//check if results for this course does not exist or the student failed this course
			$training_course="training|".$id;
			//check if this course has been rescheduled to other semesters and ignore it
				//avoid ignoring courses that are not offered in this semester but they are in the reschedule
				$courseObj=$this->factory->createContainer($training_course);
				$courseObj->populate();
				$crs_semester=$courseObj->getField("semester")->getDBValue();
			if($this->is_rescheduled($training_course,$current_academic_year_id,$semester_id) and $crs_semester==$semester_id)
			continue;
			$where=array(
								"operator"=>"AND",
								"operand"=>array(0=>array(								
																	"operator"=>"FIELD_LIMIT",
																	"field"=>"training",
																	"style"=>"equals",
																	"data"=>array("value"=>$training_course)
							 									 ),
							 						  1=>array(
																	"operator"=>"FIELD_LIMIT",
																	"field"=>"parent",
																	"style"=>"equals",
																	"data"=>array("value"=>$this->person_id)
							 									 ),
													  2=>array(	"operator"=>"FIELD_LIMIT",
															"field"=>"registration",
															"style"=>"equals",
															"data"=>array("value"=>$this->student_registration["id"])),
							 						 )
							 						 );
			$results=I2CE_FormStorage::ListFields("students_results_grade",array("total_marks","status"),false,$where);
				$status="display";
				foreach($results as $result) {
					if($result["status"]=="status|pass") {
						$status="dont_diplay";
						break;
						}
					}
				
				if($status=="display")
				$this->subject_courses[$id]=$training_course;
		}
	}
	}
	
	protected function getElectiveCourses($curr_semester) {
		$current_academic_year=iHRIS_AcademicYear::currentAcademicYear();
		$academic_year_id=iHRIS_AcademicYear::academicYearId($current_academic_year);
		$current_academic_year_id="academic_year|".$academic_year_id;
		$semester=self::getSemesterName($curr_semester);
		$trng_prgrms=self::get_institution_programs();
		unset($trng_prgrms[$this->program]);
		for($semester=$semester;$semester>0;$semester=$semester-2) {
			$semester_id="semester|". self::getSemesterId($semester);
			$where=array(
					"operator"=>"AND",
					"operand"=>array(
											0=>array(
														"operator"=>"FIELD_LIMIT",
														"field"=>"semester",
														"style"=>"equals",
														"data"=>array("value"=>$semester_id)
														),
											1=>array(0=>array("operator"=>"FIELD_LIMIT",
																	"field"=>"training_program",
																	"style"=>"in",
																	"data"=>array("value"=>$trng_prgrms)
												  				  )
													  ),
										)
						    );
			$courses=I2CE_FormStorage::listFields("training",array("id"),false,$where);
			foreach ($courses as $id=>$course_array) {
				$training_course="training|".$id;
				if($this->is_rescheduled($training_course,$current_academic_year_id,$curr_semester))
				continue;
				//check if a student took and passed this course then skip displaying it
					$where=array(
									"operator"=>"AND",
									"operand"=>array(0=>array(								
																		"operator"=>"FIELD_LIMIT",
																		"field"=>"training",
																		"style"=>"equals",
																		"data"=>array("value"=>$training_course)
								 									 ),
								 						  1=>array(
																		"operator"=>"FIELD_LIMIT",
																		"field"=>"parent",
																		"style"=>"equals",
																		"data"=>array("value"=>$this->person_id)
								 									 ),
														  2=>array(	"operator"=>"FIELD_LIMIT",
															"field"=>"registration",
															"style"=>"equals",
															"data"=>array("value"=>$this->student_registration["id"]))
								 						 )
								 );
					$results=I2CE_FormStorage::ListFields("students_results_grade",array("total_marks","status"),false,$where);
					$status="display";
					foreach($results as $result) {
						if($result["status"]=="status|pass") {
							$status="pass";
							break;
							}
						}
					if($status=="display")
					$this->elective_courses[$id]=$training_course;
				}
				
		//get elective courses that have been rescheduled to this semester
		$where=array(	"operator"=>"AND",
							"operand"=>array(0=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"academic_year",
																"style"=>"equals",
																"data"=>array("value"=>$current_academic_year_id)),
												  1=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"semester",
																"style"=>"equals",
																"data"=>array("value"=>$semester)),
												  2=>array(	"operator"=>"NOT",
																"operand"=>array(0=>array(	"operator"=>"FIELD_LIMIT",
																									"field"=>"training_program",
																									"style"=>"equals",
																									"data"=>array("value"=>$this->program)))),
												  3=>array(	"operator"=>"FIELD_LIMIT",
							 									"field"=>"training_institution",
							 									"style"=>"equals",
							 									"data"=>array("value"=>$this->training_institution))
												 ));
		$courses=I2CE_FormStorage::listFields("reschedule_course",array("training"),false,$where);
		foreach ($courses as $course) {
			$trn_id=explode("|",$course["training"]);
			$id=$trn_id[1];
			$this->elective_courses[$id]=$course["training"];
			}
		}
	}
	
	static function get_institution_programs() {
		$pageObj=new I2CE_Page;
		$username=$pageObj->getUser()->username;
		$training_institution=IHS_PageFormLecturer::fetch_institution($username);
		$where=array(	"operator"=>"FIELD_LIMIT",
							"field"=>"training_institution",
							"style"=>"like",
							"data"=>array("value"=>"%".$training_institution."%")
						 );
		$prgrms=I2CE_FormStorage::search("training_program",false,$where);
		foreach($prgrms as $prgrm) {
			$trng_prgrms["training_program|".$prgrm]="training_program|".$prgrm;
			}
		return $trng_prgrms;
		}
		
	static function get_department_programs() {
		$ff = I2CE_FormFactory::instance();
		$pageObj=new I2CE_Page;
		$username=$pageObj->getUser()->username;
		$user_info=iHRIS_PageFormLecturer::fetch_user_info($username);
		$dep_id=$user_info["department"];
		$all_trng_prgrms=self::get_institution_programs();
		foreach($all_trng_prgrms as $prgrms) {
			$progObj=$ff->createContainer($prgrms);
			$progObj->populate();
			if($progObj->getField("department")->getDBValue()==$dep_id) {
				$trng_prgrms[]=$prgrms;
				}
			}
		return $trng_prgrms;
		}
	
	static function getSemesterName($semester) {
		$ff = I2CE_FormFactory::instance();
		$semObj=$ff->createContainer($semester);
		$semObj->populate();
		$semester=$semObj->getField("name")->getDBValue();		
		return $semester;
		}
	
	static function getSemesterId($semester) {
		$where=array(
							"operator"=>"FIELD_LIMIT",
							"field"=>"name",
							"style"=>"equals",
							"data"=>array("value"=>$semester)
						 );
		$semester_id=I2CE_FormStorage::listFields("semester",array("id"),false,$where);
		foreach($semester_id as $semester)
		$semester=$semester["id"];
		return $semester;
	}
	
	protected function displayCourses($courses,$div,$text,$limit=false) {
	    if (! ($div = $this->template->getElementByID($div)) instanceof DOMNode)
		return ;
		$table =$this->template->createElement("table",array("class"=>"multiFormTable","border"=>"0","cellpadding"=>"0","cellspacing"=>"0"));
		$header=$this->template->createElement("H2","","$text");
		$this->template->appendNode($header,$div);
		$tr =$this->template->createElement("tr");
		$th=$this->template->createElement("th",array("width"=>"40","align"=>"center"),"SN");
		$this->template->appendNode($th,$tr);
		$th=$this->template->createElement("th",array("width"=>"10","align"=>"center"),"Select");
		$this->template->appendNode($th,$tr);
		$th=$this->template->createElement("th",array("width"=>"100","align"=>"center"),"Course Code");
		$this->template->appendNode($th,$tr);
		$th=$this->template->createElement("th","","Course Name");
		$this->template->appendNode($th,$tr);
		$th=$this->template->createElement("th","","Course Type");		
		$this->template->appendNode($th,$tr);		
		$th=$this->template->createElement("th","","Course Credits");
		$this->template->appendNode($th,$tr);	
		$th=$this->template->createElement("th","","Course Semester");
		$this->template->appendNode($th,$tr);	
		$this->template->appendNode($tr,$table);
		$counter=1;
	
		foreach ($courses as $id=>$subject)
		{
			$tr =$this->template->createElement("tr");
			$td =$this->template->createElement("td",array("align"=>"center"),$counter);
			$this->template->appendNode($td,$tr);
			$td =$this->template->createElement("td",array("align"=>"center"));
			if($this->isEnrolled($subject))
			$checkbox =$this->template->createElement("input",array("type"=>"checkbox","name"=>"course[".$subject."]","value"=>$subject,"checked"=>"checked"));
			else if($limit==true)
			$checkbox =$this->template->createElement("input",array("type"=>"checkbox","name"=>"course[".$subject."]","value"=>$subject,"disabled"=>"true"));
			else
			$checkbox =$this->template->createElement("input",array("type"=>"checkbox","name"=>"course[".$subject."]","value"=>$subject));
			$this->template->appendNode($checkbox,$td);
			$this->template->appendNode($td,$tr);
			if($limit==true)
			{
			$ids=explode("|",$subject);
			$id=$ids[1];
			}
			$where=array(
								"operator"=>"FIELD_LIMIT",
								"field"=>"id",
								"style"=>"equals",
								"data"=>array("value"=>$id)
							 );
			$course_descriptions=I2CE_FormStorage::listFields("training",array("name","code","course_type","course_credits","semester"),false,$where);
			$course_type_nameObj=$this->factory->createContainer($course_descriptions[$id]["course_type"]);
			$course_type_nameObj->populate();
			$course_type_name=$course_type_nameObj->getField("name")->getDBValue();
			$td =$this->template->createElement("td",array("align"=>"center"),$course_descriptions[$id]["code"]);
			$this->template->appendNode($td,$tr);
			$td =$this->template->createElement("td","",$course_descriptions[$id]["name"]);
			$this->template->appendNode($td,$tr);
			$td =$this->template->createElement("td",array("align"=>"center"),$course_type_name);
			$this->template->appendNode($td,$tr);				
			$td =$this->template->createElement("td",array("align"=>"center","width"=>100),$course_descriptions[$id]["course_credits"]);
			$this->template->appendNode($td,$tr);	
			$td =$this->template->createElement("td",array("align"=>"center","width"=>120),self::getSemesterName($course_descriptions[$id]["semester"]));
			$this->template->appendNode($td,$tr);				
			$this->template->appendNode($tr,$table);
			$counter++;
		}
		$this->template->appendNode($table,$div);
	}
	
	}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
