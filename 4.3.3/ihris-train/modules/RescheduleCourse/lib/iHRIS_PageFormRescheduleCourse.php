<?php
/*
 * © Copyright 2014 IntraHealth International, Inc.
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
 * Manage adding or editing forms associated with a person to the database.
 * 
 * @package iHRIS
 * @subpackage Common
 * @access public
 * @author Ally Shaban <allyshaban5@gmail.com>
 * @copyright Copyright &copy; 2014, 2008 IntraHealth International, Inc. 
 * @since v2.0.0
 * @version v2.0.0
 */

/**
 * Page object to handle the adding or editing forms associated with a person to the database.
 * 
 * @package iHRIS
 * @subpackage Common
 * @access public
 */
class iHRIS_PageFormRescheduleCourse extends I2CE_PageForm {
    /**
     * Create and load data for the objects used for this form.
     * 
     * Create the list object and if this is a form submission load
     * the data from the form data.  It determines the type based on the
     * {@link $type} member variable.
     */
    protected function loadObjects() {
    	if(!$this->hasPermission("task(can_edit_reschedule_course)") or $this->getUser()->role=="admin") {
			$this->setRedirect("noaccess");
			}
		if ($this->isPost()) {
			$primary = $this->factory->createContainer('reschedule_course');
			$course=$this->post["form"]["reschedule_course"][0][0]["fields"]["training"];
			$courseObj=$this->factory->createContainer($course);
			$courseObj->populate();
 			$prev_sem=$courseObj->getField("semester")->getDBValue();
 			$training_program=$courseObj->getField("training_program")->getDBValue();
	 		$this->post["form"]["reschedule_course"][0][0]["fields"]["old_semester"]=$prev_sem;
	 		$this->post["form"]["reschedule_course"][0][0]["fields"]["training_program"]=$training_program;
	 		$username=$this->getUser()->username;
	 		$inst_id=iHRIS_PageFormLecturer::fetch_institution($username);
	 		$this->post["form"]["reschedule_course"][0][0]["fields"]["training_institution"]=$inst_id;
			$primary->load($this->post);
			}
      else {
			$primary = $this->factory->createContainer('reschedule_course|0');
        	}
		$username=$this->getUser()->username;
		$role=$this->getUser()->role;
		$this->applyLimits($primary,$inst_id,$role);
		$this->setObject($primary);
		return true;
    }
    
    protected function applyLimits($primary,$inst_id,$role) {
    	$all_trng_prgrms=iHRIS_PageFormEnrollcourse::get_institution_programs();
    	$dep_training_prgrms=iHRIS_PageFormEnrollcourse::get_department_programs();
    	$semesters=array("semester|1","semester|3","semester|5");
    	if($role=="registrar") {
	    	$where=array(	"operator"=>"AND",
	    						"operand"=>array(0=>array(	"operator"=>"FIELD_LIMIT",
	    															"field"=>"semester",
	    															"style"=>"in",
	    															"data"=>array("value"=>$semesters)),
	    											  1=>array(	"operator"=>"FIELD_LIMIT",
	    															"field"=>"training_program",
	    															"style"=>"in",
	    															"data"=>array("value"=>$all_trng_prgrms))
	    											 ));
    		}
    	else if($role=="hod") {
	    	$where=array(	"operator"=>"AND",
	    						"operand"=>array(0=>array(	"operator"=>"FIELD_LIMIT",
	    															"field"=>"semester",
	    															"style"=>"in",
	    															"data"=>array("value"=>$semesters)),
	    											  1=>array(	"operator"=>"FIELD_LIMIT",
	    															"field"=>"training_program",
	    															"style"=>"in",
	    															"data"=>array("value"=>$dep_training_prgrms))
	    											 ));
    		}
    	$training=$primary->getField("training");
    	$training->setOption(array("meta","limits","default","training"),$where);
    	
    	iHRIS_AcademicYear::ensureAcademicYear();
		$current_academic_year=iHRIS_AcademicYear::currentAcademicYear();
		$academic_year_id=iHRIS_AcademicYear::academicYearId($current_academic_year);
		$where=array(	"operator"=>"FIELD_LIMIT",
							"field"=>"id",
							"style"=>"equals",
							"data"=>array("value"=>$academic_year_id));
    	$ac_yr=$primary->getField("academic_year");
    	$ac_yr->setOption(array("meta","limits","default","academic_year"),$where);
    	}
    /**
     * Save the objects to the database.
     * 
     * Save the default object being edited and return to the view page.
     * @global array
     */
    protected function save() {
      $saved = parent::save();
      $this->userMessage("Course Rescheduled Successfully");
      $this->setRedirect(  "reschedule_course" );
      return $saved;
    }
                
}


# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
