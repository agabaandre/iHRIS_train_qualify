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
 * @subpackage Train
 * @access public
 * @author Ally Shaban <allyshaban5@gmail.com>
 * @copyright Copyright &copy; 2014 IntraHealth International, Inc.
 * @since v4.1.4
 * @version v4.1.4
 */

/**
 * The page class for editing participants for a training
 * @package iHRIS
 * @subpackage Manage
 * @access public
 */
class iHRIS_PageFormSelectcourse extends I2CE_PageForm  {

    protected function action() {

	//check to ensure that the current academic year is available
	iHRIS_AcademicYear::ensureAcademicYear();
	$this->showCourses();
}

	protected function showCourses() {
        if (! ($listNode = $this->template->getElementByID("existing_course_list")) instanceof DOMNode) {
			return ;
        }

	if($this->getUser()->role=="registrar" || $this->getUser()->role=="lecturer" ||
		$this->getUser()->role=="hod" || $this->getUser()->role=="principal" || $this->getUser()->role=="deputy_principal") {

	######getting id of the currently logged in lecturer######
	$username=$this->getUser()->username;
	$where=array(
						"operator"=>"FIELD_LIMIT",
						"field"=>"identification_number",
						"style"=>"equals",
						"data"=>array("value"=>$username)
					 );
	$lecturer=I2CE_FormStorage::search("lecturer",false,$where);
	foreach($lecturer as $id)
	$lecturer_id="lecturer|".$id;

	######Getting the current academic year######
	$academic_year=iHRIS_AcademicYear::currentAcademicYear();
	$where=array(
						"operator"=>"FIELD_LIMIT",
						"field"=>"name",
						"style"=>"equals",
						"data"=>array("value"=>$academic_year)
					 );
	$academic_year_id=I2CE_FormStorage::Search("academic_year",false,$where);
	$academic_year_id="academic_year|".$academic_year_id[0];
	######Getting a list of courses assigned to this lecturer######
	$where_assign_course=array("operator"=>"AND",
											"operand"=>array(
																	0=>array(
																				"operator"=>"FIELD_LIMIT",
																				"field"=>"lecturer",
																				"style"=>"equals",
																				"data"=>array("value"=>$lecturer_id)),
																	1=>array(
																				"operator"=>"FIELD_LIMIT",
																				"field"=>"academic_year",
																				"style"=>"equals",
																				"data"=>array("value"=>$academic_year_id)
																				)
																 )
										  );
	$assigned_courses=I2CE_FormStorage::listFields("assign_course_trainer",array("training"),false,$where_assign_course);
	}
	else {
			$this->userMessage("Login as a training provider to add results");
			$this->redirect("manage?action=provider");
			return false;
	}

	 ######Displaying courses assigned to this lecturer######
	 if(count($assigned_courses)==0) {
	 	$this->userMessage("No courses assigned to you,contact the Registrar for further assistance");
		$this->redirect("manage?action=provider");
		return false;
	 	}

    foreach ($assigned_courses as $id=>$course) {
    		$course_id=explode("|",$course["training"]);
    		$course_id=$course_id[1];
    		$where=array(
    							"operator"=>"FIELD_LIMIT",
    							"field"=>"id",
    							"style"=>"equals",
    							"data"=>array("value"=>$course_id)
    				  		 );
  	 		$training_courses=I2CE_FormStorage::ListFields("training",array("name","code"),false,$where);
    		foreach($training_courses as $id=>$training_course) {
	 			$course_name = $training_course["name"];
    			$course_code = $training_course["code"];
    			$course=$course_code."-".$course_name;
    			$id="training|".$id;
        		$aNode =$this->template->createElement("a",array("href"=>"add_results?id=" . $id),$course);
     			$liNode =$this->template->createElement("li");
     			$this->template->appendNode($aNode,$liNode);
     			$this->template->appendNode($liNode,$listNode);
	 		}
    }

}

}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
