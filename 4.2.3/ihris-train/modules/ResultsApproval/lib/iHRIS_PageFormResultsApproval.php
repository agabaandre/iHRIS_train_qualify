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
	class iHRIS_PageFormResultsApproval extends I2CE_PageForm {
		protected $courses=array();
		/**
		* Create and load data for the objects used for this form.
		*/
	
	protected function loadObjects() {
		//check to ensure that the current academic year is available
		iHRIS_AcademicYear::ensureAcademicYear();
		if(!$this->hasPermission("task(can_approve_results)") or $this->getUser()->role=="admin") {
			$this->setRedirect("noaccess");
			}
			
		if ($this->isPost()) {
			$apprObj=$this->factory->createContainer("results_approval");				
			$this->applyLimits($apprObj);
			$apprObj->load($this->post);
			}
		else {
			$username=$this->getUser()->username;
			$user_info=iHRIS_PageFormLecturer::fetch_user_info($username);
			$inst_id=$user_info["training_institution"];
			$academic_year=iHRIS_AcademicYear::currentAcademicYear();
			$academic_year_id=iHRIS_AcademicYear::academicYearId($academic_year);
			$academic_year_id="academic_year|".$academic_year_id;
			//check if the object exists
			$where=array(	"operator"=>"AND",
								"operand"=>array(0=>array(	"operator"=>"FIELD_LIMIT",
																	"field"=>"academic_year",
																	"style"=>"equals",
																	"data"=>array("value"=>$academic_year_id)),
													  1=>array(	"operator"=>"FIELD_LIMIT",
																	"field"=>"training_institution",
																	"style"=>"equals",
																	"data"=>array("value"=>$inst_id))
													 ));
			$approval=I2CE_FormStorage::search("results_approval",false,$where);
			$appr_id=0;
			foreach($approval as $appr) {
				$appr_id=$appr;
				}
			$apprObj=$this->factory->createContainer("results_approval|".$appr_id);
			$apprObj->populate();
			$this->applyLimits($apprObj);
			}
		$this->setObject( $apprObj, I2CE_PageForm::EDIT_PRIMARY, null, true );		
		}
		
	protected function applyLimits($resAppObj){
	   $username=$this->getUser()->username;
		$user_info=iHRIS_PageFormLecturer::fetch_user_info($username);
		$inst_id=$user_info["training_institution"];
	
		$academic_year=iHRIS_AcademicYear::currentAcademicYear();
		$academic_year_id=iHRIS_AcademicYear::academicYearId($academic_year);
		$academic_year_id="academic_year|".$academic_year_id;
		
		####################Limiting the display of training courses####################
		//get list of training that are having end of semester assessment
		$trng_prgrms=iHRIS_PageFormEnrollcourse::get_department_programs();
		$where=array(	"operator"=>"AND",
							"operand"=>array(0=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"training_course_exam_type",
																"style"=>"equals",
																"data"=>array("training_course_exam_type|final")),
												  1=>array(	"operator"=>"FIELD_LIMIT",
												  				"field"=>"training_program",
												  				"style"=>"in",
												  				"data"=>array("value"=>$trng_prgrms))
												 ));
		$trainings=I2CE_FormStorage::search("training",false,$where);
	
		foreach($trainings as $training) {
			$training_courses[]="training|".$training;
			}
		
		//get list of courses assigned to lecturers
		$where=array(	"operator"=>"AND",
							"operand"=>array(0=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"academic_year",
																"style"=>"equals",
																"data"=>array("value"=>$academic_year_id)),
												  1=>array(	"operator"=>"FIELD_LIMIT",
												  				"field"=>"training_institution",
												  				"style"=>"equals",
												  				"data"=>array("value"=>$inst_id))
												 ));
																
		$trainer_assigned_courses=I2CE_FormStorage::listFields("assign_course_trainer",array("training"),false,$where);
		$assigned_courses=array();
		if(is_array($trainer_assigned_courses)) {
			foreach($trainer_assigned_courses as $crs) {
				$assigned_courses[]=$crs["training"];
				}
			}
		//get list of courses for which results have been uploaded
		$where=array(	"operator"=>"AND",
							"operand"=>array(0=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"academic_year",
																"style"=>"equals",
																"data"=>array("value"=>$academic_year_id)),
												  1=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"training",
																"style"=>"in",
																"data"=>array("value"=>$training_courses))
												 ));
		$results=I2CE_FormStorage::listFields("students_results_grade",array("training"),false,$where);
		unset($training_courses);
		if(count($results)>0) {
			foreach($results as $id=>$result) {
				//avoid displaying courses with results,but from other institutions
				if(!in_array($result["training"],$assigned_courses))
				continue;
				$course=explode("|",$result["training"]);
				$training_courses[]=$course[1];
				}
			}
		//end of getting list of courses for which results have been uploaded
			
		$where=array(	"operator"=>"FIELD_LIMIT",
							"field"=>"id",
							"style"=>"in",
							"data"=>array("value"=>$training_courses)
						 );
		$course_field=$resAppObj->getField("training");
		$course_field->setOption(array("meta","limits","default","training"),$where);
		#######################End of limiting the display of training courses###########################
		
		####################Limiting the display of training institution######################
		$train_inst_id=explode("|",$inst_id);
		$train_inst_id=$train_inst_id[1];
		$where=array(	"operator"=>"FIELD_LIMIT",
							"field"=>"id",
							"style"=>"equals",
							"data"=>array("value"=>$train_inst_id)
						 );
		$inst_field=$resAppObj->getField("training_institution");
		$inst_field->setOption(array("meta","limits","default","training_institution"),$where);
		####################End Limiting the display of training institution######################
		
		###################Limiting the display of academic year###############################
		$ac_yr=explode("|",$academic_year_id);
		$ac_yr=$ac_yr[1];
		$where=array(	"operator"=>"FIELD_LIMIT",
							"field"=>"id",
							"style"=>"equals",
							"data"=>array("value"=>$ac_yr)
						 );
		$acyr_field=$resAppObj->getField("academic_year");
		$acyr_field->setOption(array("meta","limits","default","academic_year"),$where);
		###################End of Limiting the display of acdemic year########################
		}
	
	protected function save() {
		parent::save();
		$this->userMessage("Semester Results Approved Successfully");
		$this->setRedirect("results_approval");
		}
	}
	# Local Variables:
	# mode: php
	# c-default-style: "bsd"
	# indent-tabs-mode: nil
	# c-basic-offset: 4
	# End:
