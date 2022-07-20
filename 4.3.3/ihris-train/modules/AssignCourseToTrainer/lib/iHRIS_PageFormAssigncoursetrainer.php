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
	class iHRIS_PageFormAssigncoursetrainer extends I2CE_PageForm {
		protected $courses=array();
		/**
		* Create and load data for the objects used for this form.
		*/
	
		protected function loadObjects() {
			if(!$this->hasPermission("task(can_assign_course_trainer)") or $this->getUser()->role=="admin") {
			$this->setRedirect("noaccess");
			}
			$factory = I2CE_FormFactory::instance();
	//check to ensure that the current academic year is available
	iHRIS_AcademicYear::ensureAcademicYear();
	
		if ($this->isPost()) {
			$assign_course_trainer=$factory->createContainer("assign_course_trainer");				
			$assign_course_trainer->load($this->post);
			$this->applyLimits($assign_course_trainer);
			$this->setObject($assign_course_trainer);
			}
	
		else {
			if($this->get_exist("id"))
			$id ="assign_course_trainer|".$this->get('id');
			$id="assign_course_trainer|0";
			$assign_course_trainer=$factory->createContainer($id);
			$this->applyLimits($assign_course_trainer);
			$assign_course_trainer->populate();
			$this->setObject($assign_course_trainer);
			}
			
		}
		
	protected function applyLimits($assign_course_trainer){
	   $username=$this->getUser()->username;
	   $user_info=iHRIS_PageFormLecturer::fetch_user_info($username);
		$inst_id=$user_info["training_institution"];
		$dep_id=$user_info["department"];
		
		$where_lecturer=array(
									"operator"=>"FIELD_LIMIT",
									"field"=>"training_institution",
									"style"=>"equals",
									"data"=>array("value"=>$inst_id)
								     );
		$lecturer_field=$assign_course_trainer->getField("lecturer");
		$lecturer_field->setOption(array("meta","limits","default","lecturer"),$where_lecturer);
	
		$academic_year=iHRIS_AcademicYear::currentAcademicYear();
		$academic_year_id=iHRIS_AcademicYear::academicYearId($academic_year);
		$academic_year_id="academic_year|".$academic_year_id;
		
		$where_assigned=array("operator"=>"AND",
										"operand"=>array(0=>array(	"operator"=>"FIELD_LIMIT",
																			"field"=>"academic_year",
																			"style"=>"equals",
																			"data"=>array("value"=>$academic_year_id)),
												  			  1=>array(	"operator"=>"FIELD_LIMIT",
												  							"field"=>"training_institution",
												  							"style"=>"equals",
												  							"data"=>array("value"=>$inst_id))
												 			 ));
		$assigned_courses_array=I2CE_FormStorage::listFields("assign_course_trainer",array("training"),false,$where_assigned);
			
		foreach($assigned_courses_array as $assigned_course) {	
			$courses=explode(",",$assigned_course["training"]);
			foreach($courses as $course)
			list($form,$assigned_courses[])=array_pad(explode("|",$course,2),2,"");			
			}

		$trng_prgrms=iHRIS_PageFormEnrollcourse::get_department_programs();

		$where_courses=array(	"operator"=>"FIELD_LIMIT",
										"field"=>"training_program",
										"style"=>"in",
										"data"=>array("value"=>$trng_prgrms)
									 );
		$course_field=$assign_course_trainer->getField("training");
		$course_field->setOption(array("meta","limits","default","training"),$where_courses);
		
		$current_academic_year=iHRIS_AcademicYear::currentAcademicYear();
		$academic_year_id=iHRIS_AcademicYear::academicYearId($current_academic_year);
		$where=array(	"operator"=>"FIELD_LIMIT",
	                  "field"=>"id",
	                  "style"=>"equals",
	                  "data"=>array("value"=>$academic_year_id));
	 	$ac_field=$assign_course_trainer->getField("academic_year");
	 	$ac_field->setOption(array("meta","limits","default","academic_year"),$where);
		
		}
	
	protected function save() {
		$username=$this->getUser()->username;
		$training_institution=iHRIS_PageFormLecturer::fetch_institution($username);
		$assign_course_trainer=$this->factory->createContainer("assign_course_trainer");
		$assign_course_trainer->load($this->post);
		$assign_course_trainer->getField("training_institution")->setFromDB($training_institution);
		$lecturer=$assign_course_trainer->getField("lecturer")->getDBValue();
		$training_courses=$assign_course_trainer->getField("training")->getDBValue();
		$academic_year=$assign_course_trainer->getField("academic_year")->getDBValue();
		$training_courses=explode(",",$training_courses);	
		$lecturers=explode(",",$lecturer);
		foreach($lecturers as $lecturer) {
			foreach($training_courses as $training_course) {
				//check if this course has been assigned for this lecturer
				$academic_year=iHRIS_AcademicYear::currentAcademicYear();
				$academic_year_id=iHRIS_AcademicYear::academicYearId($academic_year);
				$academic_year_id="academic_year|".$academic_year_id;
				$where_assigned=array("operator"=>"AND",
												"operand"=>array(0=>array(	"operator"=>"FIELD_LIMIT",
																					"field"=>"academic_year",
																					"style"=>"equals",
																					"data"=>array("value"=>$academic_year_id)),
																	  1=>array(	"operator"=>"FIELD_LIMIT",
																					"field"=>"training",
																					"style"=>"equals",
																					"data"=>array("value"=>$training_course)),
																	  2=>array(	"operator"=>"FIELD_LIMIT",
																					"field"=>"lecturer",
																					"style"=>"equals",
																					"data"=>array("value"=>$lecturer)),
																	  3=>array(	"operator"=>"FIELD_LIMIT",
																					"field"=>"training_institution",
																					"style"=>"equals",
																					"data"=>array("value"=>$training_institution))
																	 ));
				$is_assigned=I2CE_FormStorage::search("assign_course_trainer",false,$where_assigned);
				if(count($is_assigned)>0)
				continue;
				$assign_course_trainer=$this->factory->createContainer("assign_course_trainer");
				$assign_course_trainer->getField("lecturer")->setFromDB($lecturer);
				$assign_course_trainer->getField("academic_year")->setFromDB($academic_year_id);
				$assign_course_trainer->getField("training")->setFromDB($training_course);
				$assign_course_trainer->getField("training_institution")->setFromDB($training_institution);
				
				/***alert HOD***/
				//get lecturer department
				$lectObj=$this->factory->createContainer($lecturer);
				$lectObj->populate();
				$lect_dep_id=$lectObj->getField("department")->getDBValue();
				//get course department
				$trainObj=$this->factory->createContainer($training_course);
				$trainObj->populate();
				$program=$trainObj->getField("training_program")->getDBValue();
				$progObj=$this->factory->createContainer($program);
				$progObj->populate();
				$course_dep_id=$progObj->getField("department")->getDBValue();
				
				$where=array(	"operator"=>"AND",
									"operand"=>array(0=>array(	"operator"=>"FIELD_LIMIT",
																		"field"=>"training_institution",
																		"style"=>"equals",
																		"data"=>array("value"=>$training_institution)),
														  1=>array(	"operator"=>"OR",
																		"operand"=>array(0=>array(	"operator"=>"FIELD_LIMIT",
																											"field"=>"department",
																											"style"=>"equals",
																											"data"=>array("value"=>$lect_dep_id)),
																							  1=>array(	"operator"=>"FIELD_LIMIT",
																											"field"=>"department",
																											"style"=>"equals",
																											"data"=>array("value"=>$course_dep_id)))
																	 ),
														  2=>array(	"operator"=>"FIELD_LIMIT",
																		"field"=>"role",
																		"style"=>"equals",
																		"data"=>array("value"=>"role|hod"))
														 ));
				$hods=I2CE_FormStorage::listFields("lecturer",array("identification_number"),false,$where);
				$module_factory = I2CE_ModuleFactory::instance();
				$code=$trainObj->getField("code")->getDBValue();
				$course_name=$trainObj->getField("name")->getDBValue();
				$lect_fname=$lectObj->getField("first_name")->getDBValue();
				$lect_sname=$lectObj->getField("surname")->getDBValue();
				$lect_oname=$lectObj->getField("other_name")->getDBValue();
				$lect_name=$lect_fname." ".$lect_oname." ".$lect_sname;
				$lect_name=trim($lect_name);
				foreach($hods as $hod) {
					if ( $module_factory->isEnabled("UserAlerts") ) {
    					$alerts = $module_factory->getClass("UserAlerts");
    					$alerts->sendUserAlert($hod["identification_number"], 'notice',$code."-".$course_name." Has Been Assigned To ".$lect_name, 'CustomReports/show/lecturer_assigned_courses', 'Vew Course Assignment Report');
						}
					else {
    					I2CE::raiseError( "Tried to send user alert, but the module isn't enabled.");
						}
					}
				/***End of alerting HOD***/
				$assign_course_trainer->save($this->user);
				}
			}
		$this->userMessage("Course(s) Assigned To Trainer!!!");
		$this->setRedirect("assign_course_trainer");
		}
	}
	# Local Variables:
	# mode: php
	# c-default-style: "bsd"
	# indent-tabs-mode: nil
	# c-basic-offset: 4
	# End:
