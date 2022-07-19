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
class iHRIS_PageFormAddResults extends I2CE_PageForm  {

protected $course_id;
protected $exam_types=array();
protected function action() {
	if(!$this->hasPermission("task(can_add_students_results)") or $this->getUser()->role=="admin") {
		$this->setRedirect("noaccess");
		return;
		}
	$this->ff = I2CE_FormFactory::instance();
	//update academic year
	iHRIS_AcademicYear::ensureAcademicYear();
	//retrive the academic year
	$current_academic_year=iHRIS_AcademicYear::currentAcademicYear();
	$academic_year_id=iHRIS_AcademicYear::academicYearId($current_academic_year);
	$academic_year_id="academic_year|".$academic_year_id;
	$this->course_id=$this->request("id");
	$where_course_id= array("operator"=>"AND","operand"=>array(
										0=>array('operator' => 'FIELD_LIMIT',
                								'field' => 'training',
                								'style' => 'like',
                								'data' => array('value' => "%".$this->course_id."%")
                                      ),
										1=>array('operator'=>'FIELD_LIMIT',
													'field'=>'academic_year',
													'style'=>'equals',
													'data'=>array('value'=>$academic_year_id)
												  )
												                             ));
	$parents=I2CE_FormStorage::listFields("enroll_course",array("parent","training","academic_year"),false,$where_course_id);
    if (! ($listNode = $this->template->getElementByID("students_list")) instanceof DOMNode) {
	return ;
        }
    if (! ($hidden_data = $this->template->getElementByID("hidden_data")) instanceof DOMNode) {
	return ;
        }

	if(count($parents)==0) {
	$this->userMessage("No students enrolled for this course!!!");
	$this->setRedirect("add_results_select_course");
	}

	$input =$this->template->createElement("input",array("type"=>"hidden","name"=>"course_id","value"=>$this->course_id));
	$this->template->appendNode($input,$listNode);
	$table =$this->template->createElement("table",array("class"=>"multiFormTable","width"=>"100%","border"=>"0","cellpadding"=>"0","cellspacing"=>"0"));
	$tr =$this->template->createElement("tr");
	$th=$this->template->createElement("th",array("width"=>"60%"),"Student Name");
	$this->template->appendNode($th,$tr);
	$th=$this->template->createElement("th","","Registration Number");
	$this->template->appendNode($th,$tr);
	$this->appendExamTypesHeaders($tr);
	$this->template->appendNode($tr,$table);

		//retrieving the max mark for each assessment
	foreach($this->exam_types as $exam_type) {
	list($form,$id) = array_pad(explode("|", $exam_type,2),2,'');

	list($form,$course_id) = array_pad(explode("|", $this->course_id,2),2,'');
	$max_mark=I2CE_FormStorage::lookupField("training",$course_id,array($id),false);
	$max_mark=$max_mark[$id];
	$input =$this->template->createElement("input",array("type"=>"hidden","name"=>$id,"id"=>$id,"value"=>$max_mark));
	$this->template->appendNode($input,$listNode);
	}

	//fecth lecturer institution to make sure can see students for his/her institution
	$username=$this->getUser()->username;
	$inst_id=iHRIS_PageFormLecturer::fetch_institution($username);
	foreach ($parents as $enroll_id=>$parent) {
		$reg_details=STS_PageFormPerson::load_current_registration($person_id);
		###drop students which are on different institution###
		if($inst_id!=$reg_details["training_institution"]) {
			continue;
			}
		$trainings=explode(",",$parent["training"]);
		$tr =$this->template->createElement("tr");
		$person_id=$parent["parent"];
		$reg_num=$this->getRegistrationNumber($person_id);
		$input =$this->template->createElement("input",array("type"=>"hidden","name"=>"reg_num[".$reg_num."]","value"=>$reg_num));
		$this->template->appendNode($input,$tr);
		list($form,$id) = array_pad(explode("|", $person_id,2),2,'');
		$field_data = I2CE_FormStorage::lookupField("person",$id,array('firstname','surname'),false);
		if (is_array($field_data) && array_key_exists('surname',$field_data) && array_key_exists('firstname',$field_data)) {
			$fullname=$field_data['firstname'] . ' ' . $field_data['surname'];
        	$aNode =$this->template->createElement("a",array("href"=>"view?id=" . $person_id),$fullname);
			$td =$this->template->createElement("td");
        	$this->template->appendNode($aNode,$td);
        	$this->template->appendNode($td,$tr);
			$td =$this->template->createElement("td",array("id"=>$reg_num,"align"=>"center"));
			$this->template->addTextNode($reg_num,$reg_num,$td);
        	$this->template->appendNode($td,$tr);
			$this->appendExamTypesInput($tr,$reg_num,$person_id,$this->course_id,$parent["academic_year"],$enroll_id);
			}
		$this->template->appendNode($tr,$table);
		}
	$tr =$this->template->createElement("tr");
	$td =$this->template->createElement("td",array("colspan"=>"10","align"=>"right"));
	$input =$this->template->createElement("input",array("type"=>"submit","value"=>"Save","onclick"=>"return verify()"));
	$this->template->appendNode($input,$td);
	$this->template->appendNode($td,$tr);
	$this->template->appendNode($tr,$table);
	$this->template->appendNode($table,$listNode);
}

protected function appendExamTypesInput($tr,$reg_num,$person_id,$training_courses,$enroll_academic_year,$enroll_id) {
	foreach ($this->exam_types as $exam_type) {
		//check if results available
		$inputNodeHidden=0;
		$results=$this->checkResults($exam_type,$person_id,$training_courses,$enroll_academic_year,$enroll_id);
		unset($mark);
		foreach($results as $results_id=>$mark)
		{
			//do nothing
		}

		$student_registration=STS_PageFormPerson::load_current_registration($person_id);
		//check if this course is in the current semester enrollment,if not,make it readonly
		$where=array(	"operator"=>"AND",
							"operand"=>array(0=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"semester",
																"style"=>"equals",
																"data"=>array("value"=>$student_registration["semester"])),
												  1=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"parent",
																"style"=>"equals",
																"data"=>array("value"=>$person_id)),
												  2=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"training",
																"style"=>"like",
																"data"=>array("value"=>"%".$training_courses."%")),
												  3=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"registration",
																"style"=>"equals",
																"data"=>array("value"=>$student_registration["id"])),
												));
		$enrolls=I2CE_FormStorage::search("enroll_course",false,$where);
		if(count($enrolls)==0) {
			$inputNode =$this->template->createElement("input",array("type"=>"text","name"=>$exam_type."/".$reg_num,"value"=>$mark,"readonly"=>"true"));
			$inputNodeHidden =$this->template->createElement("input",array("type"=>"hidden","name"=>$reg_num."_results","value"=>$results_id));
			$this->template->appendNode($inputNodeHidden,$tr);
			}
		else {
		if($mark==0) {

			$inputNode =$this->template->createElement("input",array("type"=>"text","name"=>$exam_type."/".$reg_num,"size"=>4,"maxlength"=>"5","class"=>"results"));
			$errorNode=$this->template->createElement("span",array("class"=>"error","id"=>$exam_type."/".$reg_num));
			$this->template->appendNode($error,$inputNode);
			}
		else if($mark>0) {
			$inputNode =$this->template->createElement("input",array("type"=>"text","name"=>$exam_type."/".$reg_num,"value"=>$mark,"readonly"=>"true"));
			$inputNodeHidden =$this->template->createElement("input",array("type"=>"hidden","name"=>$reg_num."_results","value"=>$results_id));
			$this->template->appendNode($inputNodeHidden,$tr);
			}
			}

		$td =$this->template->createElement("td");
		$this->template->appendNode($errorNode,$td);
		$this->template->appendNode($inputNode,$td);
		$this->template->appendNode($td,$tr);
		}
	}

protected function appendExamTypesHeaders($tr) {
	list($form,$id) = array_pad(explode("|", $this->course_id,2),2,'');
	$field_data = I2CE_FormStorage::lookupField($form,$id,array('training_course_exam_type'),false);
	$this->exam_types=explode(",",$field_data["training_course_exam_type"]);

	foreach ($this->exam_types as $exam_type) {
		list($form,$id) = array_pad(explode("|", $exam_type,2),2,'');
		$field_data = I2CE_FormStorage::lookupField($form,$id,array('name'),false);
		$th=$this->template->createElement("th",array("width"=>"10","align"=>"center"),$field_data["name"]);
		$this->template->appendNode($th,$tr);
		}
	}

	protected function checkResults($exam_type,$person_id,$training_courses,$enroll_academic_year,$enroll_id) {
		$where=array("operator"=>"AND","operand"=>array(
														0=>array("operator"=>"FIELD_LIMIT",
														   		"field"=>"parent",
														   		"style"=>"equals",
														   		"data"=>array("value"=>$person_id)),
														1=>array("operator"=>"FIELD_LIMIT",
														   		"field"=>"training",
														   		"style"=>"equals",
											               	"data"=>array("value"=>$training_courses)), 														    															2=>array("operator"=>"FIELD_LIMIT",
														   		"field"=>"enroll_course",
														   		"style"=>"equals",
							                        		"data"=>array("value"=>"enroll_course|".$enroll_id)),
					                                        )
					    );
		$id=I2CE_FormStorage::Search("students_results_grade",false,$where);
		$id=$id[0];
		$resultsObj=$this->ff->createContainer("students_results_grade|".$id);
		$resultsObj->populateChildren("students_results");
		$result=array();

		foreach($resultsObj->getChildren("students_results") as $results) {
			$assessment=$results->getFIeld("training_course_exam_type")->getDBValue();
			if($assessment==$exam_type) {
				$mark=$results->getFIeld("score")->getDBValue();
				$results_id=$results->getFIeld("id")->getDBValue();
				$result[$id]=$mark;
				}
			}
		return $result;
		}

	protected function getRegistrationNumber($person_id) {
		$persObj=$this->ff->createContainer($person_id);
		$persObj->populateChildren("registration");
		foreach($persObj->getChildren("registration") as $regObj)
		return $regObj->getField("registration_number")->getDBValue();
		}
}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
