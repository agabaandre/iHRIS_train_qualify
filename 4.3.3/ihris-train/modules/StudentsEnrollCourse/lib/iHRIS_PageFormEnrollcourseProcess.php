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
	class iHRIS_PageFormEnrollcourseProcess extends I2CE_PageForm {
    
    /**
     * Create and load data for the objects used for this form.
     */


	protected function loadObjects() {
		$this->ff = I2CE_FormFactory::instance();
		//check to ensure that the current academic year is available
		iHRIS_AcademicYear::ensureAcademicYear();
		
		$selected_courses=$this->post("course");
		$person_id=$this->post("person_id");
		$curr_semester=$this->post("curr_semester");
		$student_registration=STS_PageFormPerson::load_current_registration($person_id);
		if(count($selected_courses)==0) {
			$this->userMessage("No courses Selected!!!");
			$this->setRedirect( "view?id=" . $this->person_id);
		}
		foreach($selected_courses as $course) {
			$courseObj=$this->factory->createContainer($course);
			$courseObj->populate();
			$total_credits=$total_credits+$courseObj->getField("course_credits")->getDBValue();
			}
		$selected_courses=implode(",",$selected_courses);
		$where=array(
							"operator"=>"AND",
							"operand"=>array(0=>array(
																"operator"=>"FIELD_LIMIT",
																"field"=>"parent",
																"style"=>"equals",
																"data"=>array("value"=>$person_id)
																),
												  1=>array(
												  				"operator"=>"FIELD_LIMIT",
												  				"field"=>"semester",
												  				"style"=>"equals",
												  				"data"=>array("value"=>$curr_semester)
												  			 ),
												  2=>array(
												  				"operator"=>"FIELD_LIMIT",
												  				"field"=>"registration",
												  				"style"=>"equals",
												  				"data"=>array("value"=>$student_registration["id"])
												  			 )
												 )
						 );
		$enrolled_courses=I2CE_FormStorage::search("enroll_course",false,$where);
		
		if(count($enrolled_courses)>0) {
		foreach ($enrolled_courses as $enrollment)
		$course_enrollment_form="enroll_course|".$enrollment;
		}
		else
		$course_enrollment_form="enroll_course";
		
		if (! ( $enrollcourseObj=$this->ff->createContainer($course_enrollment_form))  instanceof I2CE_Form) {	
			I2CE::raiseError("Invalid Object");
			return false;
		}
	
		$trainingCourseField  = $enrollcourseObj->getField("training");
		$trainingCourseField->setFromPost($selected_courses);
		$date_enrolled=date("Y-m-d");
		$enrollcourseObj->getField("date_enrolled")->setFromDB($date_enrolled);		
		$semesterField  = $enrollcourseObj->getField("semester");
		$semesterField->setFromPost($curr_semester);
		$enrollcourseObj->getField("total_credits")->setValue($total_credits);
		$enrollcourseObj->getField("registration")->setFromDB($student_registration["id"]);
		$current_academic_year=iHRIS_AcademicYear::currentAcademicYear();
		$academic_year_id=iHRIS_AcademicYear::academicYearId($current_academic_year);
		$academic_year_id="academic_year|".$academic_year_id;
		
		if(!($academicYearField  = $enrollcourseObj->getField("academic_year")) instanceof I2CE_FormField_MAP)
		return;
		$academicYearField->setFromDB($academic_year_id);
	
		$parentObj = $this->ff->createContainer($person_id);
		if ($parentObj instanceof I2CE_Form) {	
			$parentObj->populate();
		}
		
		$this->setObject($enrollcourseObj,I2CE_PageForm::EDIT_PRIMARY);
		$this->setObject($parentObj,I2CE_PageForm::EDIT_PARENT);
		parent::save();
		$this->userMessage("Courses Enrolled Successfully");
		$this->setRedirect( "view?id=" . $person_id);
		return true;
	}
	}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
