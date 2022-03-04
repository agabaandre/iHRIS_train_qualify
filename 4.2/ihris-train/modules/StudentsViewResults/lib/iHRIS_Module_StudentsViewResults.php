<?php
/**
* © Copyright 2009 IntraHealth International, Inc.
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
* Class iHRIS_Module_StudentsViewResults
* 
* @access public
*/


	class iHRIS_Module_StudentsViewResults extends I2CE_Module {
	
	    public static function getMethods() {
	        return array(
	            'iHRIS_PageView->action_students_results_grade' => 'action_students_results_grade'
	            );
	    }
	
	protected $person_id;
	protected $program;
	protected $curr_semester;
	protected $enrolled_courses=array();
	protected $template;
	
	    public function action_students_results_grade($page) {
	    	$this->ff = I2CE_FormFactory::instance();
	        if (!$page instanceof iHRIS_PageView) {
	            return false;
	        }
		$this->template = $page->getTemplate();
		$this->person_id=$page->getPerson()->getNameId();
		$this->persObj=$this->ff->createContainer($this->person_id);
		$this->manual_constructor();
		$this->getEnrolledCourses();
	$no_results=true;
	//start displaying results
	foreach($this->enrolled_courses as $id=>$courses) {
		$semester_node = $this->template->appendFileById("student_view_results_table.html", "div", "students_results");
		$results_available=$this->displayResults($this->enrolled_semesters[$id],$this->enrolled_academic_years[$id],$courses,$semester_node);
		if($no_results==true and $results_available>0)
			$no_results=false;
	}
	
	}
	
	protected function manual_constructor() {
		$this->student_registration=STS_PageFormPerson::load_current_registration($this->person_id);
		$this->program=$this->student_registration["training_program"];
		$this->curr_semester=$this->student_registration["semester"];
		$this->reg_num=$this->student_registration["registration_number"];
		}
	
	protected function getEnrolledCourses() {
	$semester_name=$this->getSemesterName($this->curr_semester);
	for($semester=$semester_name;$semester>0;$semester--) {	
		$semester_name="semester|".$semester;
			$this->persObj->populateChildren("enroll_course");
			foreach($this->persObj->getChildren("enroll_course") as $enrollcourseObj) {
				if($enrollcourseObj->getField("semester")->getDBValue()==$semester_name and 
					$enrollcourseObj->getField("registration")->getDBValue()==$this->student_registration["id"]) {
					$id=$enrollcourseObj->getField("id")->getDBValue();
					$this->enrolled_courses[$id]=$enrollcourseObj->getField("training")->getDBValue();
					$this->enrolled_semesters[$id]=$enrollcourseObj->getField("semester")->getDBValue();
					$this->enrolled_academic_years[$id]=$enrollcourseObj->getField("academic_year")->getDBValue();
				}
				}
			}
	}
	
	protected function getSemesterName($semester) {
		$ff = I2CE_FormFactory::instance();
		$semObj=$ff->createContainer($semester);
		$semObj->populate();
		$semester=$semObj->getField("name")->getDBValue();		
		return $semester;
	}
	
	protected function getSemesterId($semester) {
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
	
	protected function displayResults($semester,$academic_year,$courses,$semester_node) {
		$display_GPA=true;
		$accObj=$this->ff->createContainer($academic_year);
		$accObj->populate();
		$acc_year_name=$accObj->getField("name")->getDBValue();
		$this->template->setDisplayDataImmediate( "student_results_header", "$acc_year_name Semester ".$this->getSemesterName($semester)." Results", $semester_node);		
		$counter=1;				
		$courses=explode(",",$courses);
		foreach ($courses as $course) {
			$row_node = $this->template->appendFileByName( "student_view_results_row.html", "tr", "student_results_rows", 0, $semester_node);
			$mark=0;
			$status="";
			$grade="";
			$this->template->setDisplayDataImmediate( "results_row_counter", $counter, $row_node );
			list($course_form,$course_id) = array_pad(explode("|", $course,2),2,'');
			$field_data = I2CE_FormStorage::lookupField($course_form,$course_id,array('name','code','training_course_exam_type'),false);
			$this->template->setDisplayDataImmediate( "results_row_code", $field_data["code"], $row_node );
			$this->template->setDisplayDataImmediate( "results_row_name", $field_data["name"], $row_node );
			$exam_types_array=explode(",",$field_data["training_course_exam_type"]);
			$has_final_exam=$this->has_final_exam($course);
			//if course has final exam,check if is approved,otherwise it is approved
			if($has_final_exam) {
				$is_approved=$this->is_approved($academic_year,$course);
				if(!$is_approved) {
					$display_GPA=false;
					}
				}
			else {
				$is_approved=true;
				}
			
			foreach($exam_types_array as $exam_type) {
				$total_marks="";
				$this->persObj->populateChildren("students_results_grade");
				foreach($this->persObj->getChildren("students_results_grade") as $resultsObj) {
					$training=$resultsObj->getField("training")->getDBValue();
					$results_acc_year=$resultsObj->getField("academic_year")->getDBValue();
					if($resultsObj->getField("enroll_course")->getDBValue() != $enroll_id or $training!=$course)
					continue;						
					$status=$resultsObj->getField("status")->getDBValue();
					$grade=$resultsObj->getField("grade")->getDBValue();
					$total_marks=$resultsObj->getField("total_marks")->getDBValue();
					$id=$resultsObj->getField("id")->getDBValue();
					$assessparentObj=$this->ff->createContainer($id);
					$assessparentObj->populateChildren("students_results");
					foreach($assessparentObj->getChildren("students_results") as $assessObj) {
						$mark=$assessObj->getField("score")->getDBValue();
						$assessment=$assessObj->getField("training_course_exam_type")->getDBValue();
						if($assessment!=$exam_type)
						continue;
						if($mark=="")
							$mark="-";						
						$examtypeObj=$this->ff->createContainer($exam_type);
						$examtypeObj->populate();
						$exam_type_name=$examtypeObj->getField("name")->getDBValue();
						$type_node = $this->template->appendFileByName( "student_view_results_row_exam_types.html", "div", "results_row_exam_types", 0, $row_node );
						if($exam_type=="training_course_exam_type|final" and !$is_approved)
						$mark="-";
						$this->template->setDisplayDataImmediate( "exam_types_name", $exam_type_name.": ".$mark, $type_node );					
						}
					}			
			}
			if($status=="")
			$status="-";
			if($grade=="")
			$grade="-";
			if($total_marks=="")
			$total_marks="-";
			if(!$is_approved) {
				$status="-";
				$grade="-";
				$total_marks="Waiting Approval";
				}
				$this->template->setDisplayDataImmediate( "results_row_total", $total_marks, $row_node );
				$this->template->setDisplayDataImmediate( "results_row_grade", $grade, $row_node );
				$this->template->setDisplayDataImmediate( "results_row_status", $status, $row_node );
			$counter++;
		}
			$this->persObj->populateChildren("semester_GPA");
			foreach($this->persObj->getChildren("semester_GPA") as $semGPAObj) {
				if($semGPAObj->getFIeld("semester")->getDBValue()==$semester and $semGPAObj->getField("registration")->getDBValue()==$this->student_registration["id"]) {
					$GPA=$semGPAObj->getField("GPA")->getDBValue();
					}
				}
		if($GPA=="")
		$GPA="-";
		if(!$display_GPA) {
			$GPA="-";
			}
		$this->template->setDisplayDataImmediate( "semester_gpa", "Semester ".$this->getSemesterName($semester)." GPA ". $GPA ,$semester_node);
		return $counter;
	}
	
	protected function is_approved($results_academic_year,$course) {
		$academic_year=iHRIS_AcademicYear::currentAcademicYear();
		$academic_year_id=iHRIS_AcademicYear::academicYearId($academic_year);
		$academic_year_id="academic_year|".$academic_year_id;
		if($results_academic_year!=$academic_year_id) {
			return true;
			}
		$where=array(	"operator"=>"AND",
							"operand"=>array(0=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"academic_year",
																"style"=>"equals",
																"data"=>array("value"=>$academic_year_id)),
												  1=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"training",
																"style"=>"like",
																"data"=>array("value"=>"%".$course."%")),
												  2=>array(	"operator"=>"FIELD_LIMIT",
																"field"=>"training_institution",
																"style"=>"equals",
																"data"=>array("value"=>$this->student_registration["training_institution"])),
												 ));
		$is_approved=I2CE_FormStorage::search("results_approval",false,$where);
		if(count($is_approved)>0) {
			return true;
			}
		return false;													
		}
		
	protected function has_final_exam($course) {
		$ff = I2CE_FormFactory::instance();
		$courseObj=$ff->createContainer($course);
		$courseObj->populate();
		$assessment=$courseObj->getField("training_course_exam_type")->getDBValue();
		$assessments=explode(",",$assessment);
		if(in_array("training_course_exam_type|final",$assessments)) {
			return true;
			}
		return false;
		}
	}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
