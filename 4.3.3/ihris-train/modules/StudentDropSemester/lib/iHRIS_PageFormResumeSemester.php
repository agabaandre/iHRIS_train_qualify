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
class iHRIS_PageFormResumeSemester extends I2CE_PageForm {
    /**
     * Create and load data for the objects used for this form.
     * 
     * Create the list object and if this is a form submission load
     * the data from the form data.  It determines the type based on the
     * {@link $type} member variable.
     */
    protected function loadObjects() {
    	if($this->get_exists("parent")) {
			$dropObj=$this->factory->createContainer($this->request("parent"));
			$dropObj->populate();
			$dropObj->populateChildren("resume_semester");
			$resSem=$dropObj->getChildren("resume_semester");
			if(count($resSem)>0) {
				$this->userMessage("This Student Has Already Resumed For This Semester");
      		$this->setRedirect(  "view?id=" . $dropObj->getParent() );
      		return;
				}
    		}
    		
        if ($this->isPost()) {
                if ( ! ($primary = $this->factory->createContainer('resume_semester')) instanceof iHRIS_ResumeSemester) {
                    return false;
                }
                $primary->load($this->post);
				
				$this->drop_sem=$this->factory->createContainer("drop_semester");
            $this->drop_sem->load($this->post);
            $drp_sem_id=$this->drop_sem->getField("id")->getDBValue();
            $parent=$this->drop_sem->getField("parent")->getDBValue();
            $this->person = $this->factory->createContainer($this->drop_sem->getParent());
        		$this->person->populate();
        		
            if (($primary->getParent() == '0' || $primary->getParent() == '' || $primary->getParent() == '|')  && $drp_sem_id) {
                $primary->setParent($drp_sem_id);
            }
        } elseif ( $this->get_exists('parent') ) {
            $primary = $this->factory->createContainer('resume_semester|0');
            $this->drop_sem=$this->factory->createContainer($this->get('parent'));
            $this->drop_sem->populate();
            $this->person = $this->factory->createContainer($this->drop_sem->getParent());
        		$this->person->populate();
            $parent = $this->get('parent');
            if (strpos($parent,'|')=== false) {
                I2CE::raiseError("Deprecated use of parent variable");
                $parent =  'person|' . $id;            
            }
            $primary->setParent($parent);
        }
        if ($this->isGet()) {
            $primary->load($this->get());
        }
        $this->applyLimits($primary);
        $this->setObject($primary);
        return true;
    }
    
    protected function applyLimits($primary) {
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
    	
    protected function setForm() {
    	$this->template->setForm($this->person);
    	$this->template->setForm($this->drop_sem);
    	parent::setForm();
    	}
    
    /**
     * Save the objects to the database.
     * 
     * Save the default object being edited and return to the view page.
     * @global array
     */
    protected function save() {
	 /**    
     * Check the number of semesters that have elapsed since this student dropped,if < 10 then a student may proceed,otherwise readmit to sem 			 1
     */
     	$dropObj=$this->factory->createContainer("drop_semester");
     	$dropObj->load($this->post);
     	$resObj=$this->factory->createContainer("resume_semester");
     	$resObj->load($this->post);
     	
     	$drp_sem_ac=$dropObj->getField("academic_year")->getDBValue();
     	$drp_month=$dropObj->getField("drop_date")->getDBValue();
     	$res_sem_ac=$resObj->getField("academic_year")->getDBValue();
     	
		$drpacObj=$this->factory->createContainer($drp_sem_ac);
		$drpacObj->populate();
		$drp_sem_ac_name=$drpacObj->getField("name")->getDBValue();
		$resacObj=$this->factory->createContainer($res_sem_ac);
		$resacObj->populate();
		$res_sem_ac_name=$resacObj->getField("name")->getDBValue();
		$ac_year1=explode("/",$drp_sem_ac_name);
		$ac_year1=$ac_year1[0];
		$ac_year2=explode("/",$res_sem_ac_name);
		$ac_year2=$ac_year2[0];
		
     	if($drp_sem_ac_name!=$res_sem_ac_name) {
     		$res_month=$resObj->getField("resume_date")->getDBValue();
     		$drp_month=explode("-",$drp_month);
     		$drp_month=$drp_month[1];
     		$res_month=explode("-",$res_month);
     		$res_month=$res_month[1];
     		$ac_year_diff=$ac_year2-$ac_year1;
     		if($drp_month>=7 and $drp_month<=12) {
     			$sem=$sem+2;
     			}
     		else if($drp_month>=1 and $drp_month<=5) {
     			$sem=$sem+1;
     			}
     			
     		if($res_month>=7 and $res_month<=12) {
     			$sem=$sem+0;
     			}
     		else if($res_month>=1 and $res_month<=5) {
     			$sem=$sem+1;
     			}
     		$sem=$sem+(($ac_year_diff-1)*2);
     		}
     		
     	else {
			$sem=1;     		
     		}

		//if a student resumes after 10 semesters have elapsed,take him/her to semester one
		if($sem>10) {
			$student_registration=STS_PageFormPerson::load_current_registration($this->person);
			
			//mark the ongoing registration as expired and create the new one
			$regObj=$this->factory->createContainer($student_registration["id"]);
			$regObj->populate();
			$regObj->getField("registration_status")->setFromDB("registration_status|expired");
			$regObj->getField("expire_date")->setFromDB($resObj->getField("resume_date")->getDBValue());
			$regObj->save($this->user);
			$regObj->cleanup();
			unset($regObj);
			
			//create the new registration
			$regObj=$this->factory->createContainer("registration");
			$regObj->populate();
			$regObj->getField("parent")->setFromDB($this->person);
			$regObj->getField("admission_type")->setFromDB($student_registration["admission_type"]);
			$regObj->getField("council_reg_num")->setFromDB($student_registration["council_reg_num"]);
			$regObj->getField("identification_number")->setFromDB($student_registration["identification_number"]);
			$regObj->getField("identification_type")->setFromDB($student_registration["identification_type"]);
			$regObj->getField("joined_semester")->setFromDB("semester|1");
			$regObj->getField("registration_number")->setFromDB($student_registration["registration_number"]);
			$regObj->getField("registration_status")->setFromDB("registration_status|ongoing");
			$regObj->getField("training_institution")->setFromDB($student_registration["training_institution"]);
			$regObj->getField("training_program")->setFromDB($student_registration["training_program"]);
			$reg_date=$resObj->getField("resume_date")->getDBValue();
			$reg_date=date("Y-m-d",strtotime($reg_date));
			$regObj->getField("registration_date")->setFromPost($reg_date);
			$regObj->getField("semester")->setFromDB("semester|1");
			$regObj->getField("academic_level")->setFromDB("academic_level|1");
			$regObj->getField("academic_year")->setFromDB($resObj->getField("academic_year")->getDBValue());
			$regObj->save($this->user);
			
			//add this student to the rejoin form for tracking info
			$ac_year_ended=$drp_sem_ac;
			$ac_year_rejoin=$res_sem_ac;
			$rejoin_reason="rejoin_reason|dropped_semester";
			$rejoinObj=$this->factory->createContainer("rejoin");
			$rejoinObj->getField("academic_year_ended")->setFromDB($dropObj->getField("academic_year")->getDBValue());
			$rejoinObj->getField("academic_year_rejoin")->setFromDB($resObj->getField("academic_year")->getDBValue());
			$rejoinObj->getField("prev_registration")->setFromDB($student_registration["id"]);
			$rejoinObj->getField("new_registration")->setFromDB("registration|".$regObj->getID());
			$rejoinObj->getField("rejoin_reason")->setFromDB($rejoin_reason);
			$rejoinObj->save($this->user);
			}
			
      $saved = parent::save();
      if ($saved !== false) {
         $message = "Student Resumed Successfully.";
      } else {
         $message = "This Student Has Not Been Resumed.";
      }
      $this->userMessage($message);
      $this->setRedirect(  "view?id=" . $this->person->getNameId() );
      return $saved;
    }
                
}


# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
