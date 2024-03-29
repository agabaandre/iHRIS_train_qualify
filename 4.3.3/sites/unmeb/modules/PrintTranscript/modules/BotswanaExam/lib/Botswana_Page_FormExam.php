<?php
/**
* © Copyright 2010 IntraHealth International, Inc.
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
* @package ihris-common
* @subpackage trainingcourse
* @author Carl Leitner <litlfred@ibiblio.org>
* @version v4.0.8
* @since v4.0.8
* @filesource 
*/ 
/** 
* Class iHRIS_Page_FormExam
* 
* @access public
*/


class Botswana_Page_FormExam extends I2CE_PageForm {

    protected function loadObjects() {    	
        $ff = I2CE_FormFactory::instance();
        if ($this->isPost()) {
            if ($this->request_exists('id') && $this->request('id')) {
                if ( ! ($primary = $this->factory->createContainer($this->request('id'))) instanceof iHRIS_Training_Course_Exam) {
                    return false;
                }
					 $this->getAssessment("id");
					 
					 $this->addTemplate($primary);
					 $primary->populate();
                $primary->load($this->post);
                
            } else {
                if ( ! ($primary = $this->factory->createContainer('training_course_exam')) instanceof iHRIS_Training_Course_Exam) {
                    return false;                    
                }
                $this->getAssessment("parent");
					 $this->addTemplate($primary);
                $primary->load($this->post);
                
            }
            if (($primary->getParent() == '0' || $primary->getParent() == '' || $primary->getParent() == '|')  && $this->request('parent')) {
                $primary->setParent($this->request('parent'));
            }
        } elseif ( $this->get_exists('id') ) {
            if ($this->get_exists('id')) {
                $id = $this->get('id');
                if (strpos($id,'|')=== false) {
                    I2CE::raiseError("Deprecated use of id variable");
                    $id =  'training_course_exam|' . $id;
                }
            } else {
                $id = 'training_course_exam|0';
            }
            $primary = $this->factory->createContainer($id);
            if (!$primary instanceof iHRIS_Training_Course_Exam) {
                I2CE::raiseError("Could not create valid training_course_exam from id:$id");
                return false;
            }
            $this->getAssessment("id");        	        	
				$this->addTemplate($primary);
            $primary->populate();
        } elseif ( $this->get_exists('parent') ) {
            $primary = $this->factory->createContainer('training_course_exam|0');
            if (!$primary instanceof iHRIS_Training_Course_Exam) {
                return false;
            }
				$this->getAssessment("parent");
				$this->addTemplate($primary);
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
        if (! ($personScheduledCourse = $ff->createContainer( $primary->getParent() ))  instanceof iHRIS_Person_Scheduled_Training_Course) {
            I2CE::raiseError("Cannot instantitatne person scheudled training course " . $primary->getParent());
            return false;
        }        
        $this->template->setDisplayData('parent',$personScheduledCourse->getNameId());
        $personScheduledCourse->populate();
        if (! ($person = $ff->createContainer($personScheduledCourse->getParent())) instanceof iHRIS_Person) {
            I2CE::raiseError("bad person " . $personScheduledCourse->getParent());
            return false;
        }
        $person->populate();
        if ($personScheduledCourse->getId() == '0') {
            I2CE::raiseError("Bad ID");
            return false;
        }
        if ( !($scheduledTrainingCourse = $ff->createContainer($personScheduledCourse->scheduled_training_course)) instanceof iHRIS_Scheduled_Training_Course) {
            I2CE::raiseError("No linked scheduled training course");
            return false;
        }
        $scheduledTrainingCourse->populate();
        if ( !($trainingCourse = $ff->createContainer($scheduledTrainingCourse->training_course)) instanceof iHRIS_Training_Course) {
            I2CE::raiseError("No linked training course");
            return false;
        }
        $trainingCourse->populate();
        $this->personScheduledTrainingCourse = $personScheduledCourse;
        $this->trainingCourse = $trainingCourse;
        $this->person = $person;
        $this->template->setDisplayData('passing_score',$trainingCourse->passing_score);
        if ($this->request_exists('action') && $this->request('action') == 'updatescore' && $this->request_exists('exam_type') && $this->request('exam_type')) {
        		$this->assessment=$this->request("assessment");
            $primary->getField('training_course_exam_type')->setFromDB('training_course_exam_type|' . $this->request('exam_type'));
            if($this->assessment=="assessment|evaluation")
            $primary->getField('evaluation')->setFromDB($this->request('score'));
            if($this->assessment=="assessment|exam" or $this->assessment=="")
            $primary->getField('score')->setFromPost($this->request('score'));
            $primary->getField('evaluation_date')->setValue(I2CE_Date::now());
        }

        $this->setObject($primary);
    }

    protected $person;
    protected $trainingCouse;
    protected $personScheduledTrainingCouse;

    /**
     * Set the I2CE_Form object in the page template.
     * 
     * This method will pass the edit object to the page template so that it can process all the form variables.
     */
    
    protected function applyLimits($primary)
    {
    	$wherefexam=array( "operator"=>"FIELD_LIMIT",
    								"field"=>"id",
    								"style"=>"equals",
    								"data"=>array("value"=>"final")
    							 );
    	$exam_type_field=$primary->getField("training_course_exam_type");		
		$exam_type_field->setOption(array("meta","limits","default","training_course_exam_type"),$wherefexam);
    }
    
    protected function getAssessment($name)
    {
      if($name=="id")
      {     
	 		list($teform,$teid)=array_pad(explode("|",$this->request("id"),2),2,"");
	     	$pstc=I2CE_FormStorage::lookupField($teform,$teid,"parent");
	     	list($pstcform,$pstcid)=array_pad(explode("|",$pstc,2),2,"");
     	}
     	else if($name=="parent")
     	{
     		list($pstcform,$pstcid)=array_pad(explode("|",$this->request("parent"),2),2,"");
     	}
     	     	
     	$stc=I2CE_FormStorage::lookupField($pstcform,$pstcid,"scheduled_training_course");
     	list($stcform,$stcid)=array_pad(explode("|",$stc,2),2,"");
     	$this->assessment=I2CE_FormStorage::lookupField($stcform,$stcid,"assessment");
     	
    }
    
    protected function addTemplate($primary)
    {
		if($this->assessment=="assessment|exam" or $this->assessment=="")
     	$this->template->addFile("form_exams.html","div","");
     	else if($this->assessment=="assessment|evaluation")
     	{
	     	$this->template->addFile("form_evaluation.html","div","");
	     	$this->applyLimits($primary);
     	}
    }
    
    protected function setForm() {
        $this->template->setForm($this->personScheduledTrainingCourse); //needs to be first for return button
        $this->template->setForm($this->person);
        parent::setForm();
        $this->template->setForm($this->trainingCourse);
    }


    /**
     * Save the objects to the database.
     * 
     * Save the default object being edited b
     * @global array
     */
    protected function save() {
    	$examObj = $this->getPrimary();
    	if($this->assessment=="assessment|exam" or $this->assessment=="")
			$field="score";
		else if($this->assessment=="assessment|evaluation")
			$field="evaluation";
			
			$value=$examObj->getField($field)->getDBValue();		
		if(($value=="" or ($field=="score" and (!is_numeric($value) or $value>100))) and $this->request('action') != 'updatescore')
		{
		list($tce_form,$tce_id)=array_pad(explode("|",$examObj->getField("id")->getDBValue(),2),2,"");
		if($tce_id>0)
		{
		$this->userMessage("Some thing wrong with the ".ucfirst($field));
		$this->setRedirect("training-course/exam?id=".$examObj->getField("id")->getDBValue());
		}
		else if($tce_id==0)
		{
		$this->userMessage("Some thing wrong with the ".ucfirst($field));		
		$this->setRedirect("training-course/exam?parent=".$examObj->getField("parent")->getDBValue());
		}
		return false;
		}
		
        if ($this->evaluate()) {
            $this->setObject($this->personScheduledTrainingCourse,I2CE_PageForm::EDIT_SECONDARY);
        }
        parent::save();
        if ($this->request_exists('action') && $this->request('action') == 'updatescore') {
            
        } else {
            $this->setRedirect( "view?id=" . $this->person->getNameId());
        }
        return true;
    }
    

    protected function evaluate() {
    	
        if (!($examObj = $this->getPrimary()) instanceof iHRIS_Training_Course_Exam) {
            return false;
        }
        
        if ($examObj->getField('training_course_exam_type')->getDBValue() != 'training_course_exam_type|final') {
            return false;
        }

        if($this->assessment=="assessment|evaluation")
        {
				if($examObj->getField('evaluation')->getDBValue()=="evaluation|pass")
				$this->personScheduledTrainingCourse->getField('training_course_evaluation')->setFromDB('training_course_evaluation|pass');
				else if($examObj->getField('evaluation')->getDBValue()=="evaluation|fail")
				$this->personScheduledTrainingCourse->getField('training_course_evaluation')->setFromDB('training_course_evaluation|fail');
        }
        
        else
        {
        $passingScore = $this->trainingCourse->getField('passing_score')->getDBValue();
        if ($passingScore <= 0 || $passingScore > 100) {
            return false;
        }
        if ($examObj->getField('score')->getDBValue() < $passingScore) {
            $this->personScheduledTrainingCourse->getField('training_course_evaluation')->setFromDB('training_course_evaluation|fail');
        } else {
            $this->personScheduledTrainingCourse->getField('training_course_evaluation')->setFromDB('training_course_evaluation|pass');
        }
        }
        return true;
    }

}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
