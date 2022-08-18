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
class iHRIS_PageFormDropSemester extends iHRIS_PageFormParentPerson {
    /**
     * Create and load data for the objects used for this form.
     * 
     * Create the list object and if this is a form submission load
     * the data from the form data.  It determines the type based on the
     * {@link $type} member variable.
     */
    protected function loadObjects() {
    	$this->student_registration=STS_PageFormPerson::load_current_registration($this->request("parent"));
    	###Deny drop semester for completed students###
		$progObj=$this->factory->createContainer($this->student_registration["training_program"]);
		$progObj->populate();
		if($this->student_registration["admission_type"]=="admission_type|full-time")
		$total_semesters=$progObj->getField("total_semesters_fulltime")->getDBValue();
		else if($this->student_registration["admission_type"]=="admission_type|part-time")
		$total_semesters=$progObj->getField("total_semesters_parttime")->getDBValue();
    	$completed=IHS_PageFormEnrollcourse::completed_school(
    																				$this->student_registration["semester"],
    																				$total_semesters,$this->request("parent")
    																			 );
    	if($completed) {
    		$this->userMessage("You Have Completed The Program");
      	$this->setRedirect("view?id=" . $this->request("parent"));
      	return;
    		}
    	###End of denying drop semester for completed students###
    	
    	//check to ensure That A Student Must Resume Before Next Drop
    	if($this->get_exists("parent")) {
    		$parent=$this->request("parent");
    		$persObj=$this->factory->createContainer($parent);
			$persObj->populateChildren("drop_semester");
			foreach($persObj->getChildren("drop_semester") as $dropSemObj) {
				if($dropSemObj->getField("registration")->getDBValue()!=$this->student_registration["id"])
				continue;
				$dropSemObj->populateChildren("resume_semester");
				$resSemObj=$dropSemObj->getChildren("resume_semester");
				if(count($resSemObj)==0) {
					$this->userMessage("This Student Is Currently Dropped In A Semester");
      			$this->setRedirect(  "view?id=" . $parent );
      			return;
					}
				}
				
			//avoid a student to drop a semester when GPA is already there
			 $persObj->populateChildren("registration");
			 $regObjs=$persObj->getChildren("registration");
			 foreach ($regObjs as $regObj) {
			 	if($regObj->getField("registration_status")->getDBValue()!="registration_status|ongoing")
			 	continue;
			 	$semester=$regObj->getField("semester")->getDBValue();
			 	}
			 $where=array("operator"=>"AND",
			 					"operand"=>array(0=>array(	"operator"=>"FIELD_LIMIT",
			 														"field"=>"semester",
			 														"style"=>"equals",
			 														"data"=>array("value"=>$semester)),
			 										  1=>array(	"operator"=>"FIELD_LIMIT",
			 														"field"=>"parent",
			 														"style"=>"equals",
			 														"data"=>array("value"=>$parent)),
			 										  2=>array(	"operator"=>"FIELD_LIMIT",
			 														"field"=>"registration",
			 														"style"=>"equals",
			 														"data"=>array("value"=>$this->student_registration["id"]))
			 										  ));
			 $semGPA=I2CE_FormStorage::search("semester_GPA",false,$where);
			 if(count($semGPA) > 0) {
				$this->userMessage("You Cant Drop This Semester");
      		$this->setRedirect(  "view?id=" . $parent );
      		return;
			 	}
    		}
    	
        if ($this->isPost()) {
            $primary = $this->factory->createContainer($this->getForm());
            if (!$primary instanceof I2CE_Form) {
                return false;
            }
            $primary->load($this->post);
        } elseif ( $this->get_exists('id') ) {
            if ($this->get_exists('id')) {
                $id = $this->get('id');
                if (strpos($id,'|')=== false) {
                    I2CE::raiseError("Deprecated use of id variable");
                    $id = $this->getForm() . '|' . $id;
                }
            } else {
                $id = $this->getForm() . '|0';
            }
            $primary = $this->factory->createContainer($id);
            if (!$primary instanceof I2CE_Form || $primary->getName() != $this->getForm()) {
                I2CE::raiseError("Could not create valid " . $this->getForm() . "form from id:$id");
                return false;
            }
            $primary->populate();
        } elseif ( $this->get_exists('parent') ) {
            $primary = $this->factory->createContainer($this->getForm());
            if (!$primary instanceof I2CE_Form) {
                return;
            }
            $parent = $this->get('parent');
            if (strpos($parent,'|')=== false) {
                I2CE::raiseError("Deprecated use of parent variable");
                $parent =  'person|' . $parent;            
            }
            $primary->setParent($parent);
        }
        if ($this->isGet()) {
            $primary->load($this->get());
        }
        $person = parent::loadPerson(  $primary->getParent() );
        if (!$person instanceof iHRIS_Person) {
            I2CE::raiseError("Could not create person form from " . $primary->getParent());
            return;
        }
        $this->applyLimits($primary);
        $this->setObject($primary, I2CE_PageForm::EDIT_PRIMARY, null, true);
        $this->setObject($person, I2CE_PageForm::EDIT_PARENT, null, true);
        return true;
    }

	protected function applyLimits($primary) {
			$sem_id=explode("|",$this->student_registration["semester"]);
			$sem_id=$sem_id[1];
		$where=array(	"operator"=>"FIELD_LIMIT",
							"field"=>"id",
							"style"=>"equals",
							"data"=>array("value"=>$sem_id)
						 );
		$sem_field=$primary->getField("semester");
		$sem_field->setOption(array("meta","limits","default","semester"),$where);
		$current_academic_year=iHRIS_AcademicYear::currentAcademicYear();
		$academic_year_id=iHRIS_AcademicYear::academicYearId($current_academic_year);
		$where=array(	"operator"=>"FIELD_LIMIT",
							"field"=>"id",
							"style"=>"equals",
							"data"=>array("value"=>$academic_year_id)
						 );
		$ac_field=$primary->getField("academic_year");
		$ac_field->setOption(array("meta","limits","default","academic_year"),$where);
		}

    /**
     * Save the objects to the database.
     * 
     * Save the default object being edited and return to the view page.
     * @global array
     */
    protected function save() {
    	$current_academic_year=iHRIS_AcademicYear::currentAcademicYear();
		$academic_year_id=iHRIS_AcademicYear::academicYearId($current_academic_year);
		$academic_year_id="academic_year|".$academic_year_id;
		$dropSemObj=$this->factory->createContainer("drop_semester");
		$dropSemObj->load($this->post);
		$dropSemObj->getField("registration")->setFromDB($this->student_registration["id"]);
		
		//drop results for this semester and all enrolled courses.
		$where=array(	"operator"=>"AND",
							"operand"=>array(0=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"parent",
																"style"=>"equals",
																"data"=>array("value"=>$this->getPrimary()->getParent())),
												  1=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"semester",
																"style"=>"equals",
																"data"=>array("value"=>$this->student_registration["semester"])),
												  2=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"registration",
																"style"=>"equals",
																"data"=>array("value"=>$this->student_registration["id"])),
												  ));
		$enrolled_courses=I2CE_FormStorage::search("enroll_course",false,$where);
		foreach($enrolled_courses as $enroll_id) {
						$where=array(	"operator"=>"FIELD_LIMIT",
											"field"=>"enroll_course",
											"style"=>"equals",
											"data"=>array("value"=>"enroll_course|".$enroll_id));
					$results=I2CE_FormStorage::search("students_results_grade",false,$where);
					foreach ($results as $id) {
						$resObj=$this->factory->createContainer("students_results_grade|".$id);
						$resObj->populateChildren("students_results");
						foreach($resObj->getChildren("students_results") as $stResObj) {
							$stResObj->populate();
							$stResObj->delete();
							}
						$resObj->populate();
						$resObj->delete();
						}
				$enrObj=$this->factory->createContainer("enroll_course|".$enroll_id);
				$enrObj->populate();
				$enrObj->delete();
			}
      $dropSemObj->save($this->user);
      $dropSemObj->cleanup();
      if ($saved !== false) {
         $message = "Student Dropped From Current Semester.";
      } else {
         $message = "Failed To Drop A Student From This Semester.";
      }
      $this->userMessage($message);
      $this->setRedirect(  "view?id=" . $this->getPrimary()->getParent() );
      return $saved;
    }
                
}


# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
