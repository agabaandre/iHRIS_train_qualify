<?php
/**
* © Copyright 2014 IntraHealth International, Inc.
* 
* This File is part of I2CE 
* 
* I2CE is free software; you can redistribute it and/or modify 
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
* @package iHRIS
* @author Ally Shaban <allyshaban5@gmail.com>
* @version v3.2.2
* @since v3.2.2
* @filesource 
*/ 
/** 
* Class iHRIS_Module_RescheduleCourse
* 
* @access public
*/


class iHRIS_Module_RescheduleCourse extends I2CE_Module {

    public static function getHooks() {
        return array(
'validate_form_reschedule_course'=>'validate_form_reschedule_course'
                     );
    }
    
    public function validate_form_reschedule_course($form) {
    	$semester = implode("|", $form->new_semester);
    	$course = implode("|", $form->training);
    	$academic_year=implode("|", $form->academic_year);
    	$username=$this->getUser()->username;
	 	$training_institution=iHRIS_PageFormLecturer::fetch_institution($username);
    	$where=array(	"operator"=>"AND",
    						"operand"=>array(0=>array(	"operator"=>"FIELD_LIMIT",
    															"field"=>"academic_year",
    															"style"=>"equals",
    															"data"=>array("value"=>$academic_year)),
    											  1=>array(	"operator"=>"FIELD_LIMIT",
    															"field"=>"training",
    															"style"=>"equals",
    															"data"=>array("value"=>$course)),
    											  2=>array(	"operator"=>"FIELD_LIMIT",
    															"field"=>"training_institution",
    															"style"=>"equals",
    															"data"=>array("value"=>$training_institution))
    											 ));
      $is_rescheduled=I2CE_FormStorage::search("reschedule_course",false,$where);
      if(count($is_rescheduled)>0) {
      	$form->setInvalidMessage("training","This Course Already Rescheduled For This Semester In This Academic Year");
      	}
    	$ff = I2CE_FormFactory::instance();
    	if(!($courseObj=$ff->createContainer($course)) instanceof iHRIS_Training)
    	return;
    	$courseObj->populate();
    	$crs_semester=$courseObj->getField("semester")->getDBValue();
    	if($crs_semester==$semester) {
    		$form->setInvalidMessage("new_semester","This Course Is Currently Offered In This Semester");
    		return;
    		}
    	$sem=$form->new_semester[1];
    	$crs_semester=explode("|",$crs_semester);
    	$crs_semester=$crs_semester[1];
    	if($crs_semester > $sem or ($sem-$crs_semester) != 1) {
    		$form->setInvalidMessage("new_semester","A Course Must Be Rescheduled To A Next Semester");
    		}
    	}

}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
