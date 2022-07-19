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
* Class iHRIS_Module_DropSemester
* 
* @access public
*/


class iHRIS_Module_DropSemester extends I2CE_Module {

    public static function getMethods() {
        return array(
            'iHRIS_PageView->action_drop_semester' => 'action_drop_semester'
            );
    }
    
    public static function getHooks() {
        return array(
'validate_form_resume_semester'=>'validate_form_resume_semester'
                     );
    }

	 public function validate_form_resume_semester($form) {
	 	$ff = I2CE_FormFactory::instance();
	 	$academic_year=implode("|",$form->academic_year);
	 	if($academic_year=="|")
 		return;
	 	$acadYrObj=$ff->createContainer($academic_year);
	 	$acadYrObj->populate();
	 	$academic_year=$acadYrObj->getField("name")->getDBValue();
		
		$academic_year=explode("/",$academic_year);
		$start_dateObj=I2CE_Date::getDate(01,07,$academic_year[0]);
		$end_dateObj=I2CE_Date::getDate(30,05,$academic_year[1]);
		$start_date=$start_dateObj->displayDate();
		$end_date=$end_dateObj->displayDate();
		if($start_dateObj->compare($form->resume_date)==-1) {
			$form->setInvalidMessage( "resume_date" ,"Resume Date Should Be After $start_date");
			}
		if($end_dateObj->compare($form->resume_date)!=-1) {
			$form->setInvalidMessage( "resume_date" ,"Resume Date Should Be Before $end_date");
			}
	 	}
	 	
    public function action_drop_semester($page) {
        if (!$page instanceof iHRIS_PageView) {
            return false;
        }
        $template = $page->getTemplate();
        $appendNode = $template->getElementById('drop_semester');
        if (!$appendNode instanceof DOMNode) {
            return true;
        }
        $person = $page->getPerson();
        if (!$person instanceof iHRIS_Person) {
            return false;
        } 
        $factory = I2CE_FormFactory::instance();
        $where=array(	"operator"=>"FIELD_LIMIT",
        						"field"=>"parent",
        						"style"=>"equals",
        						"data"=>array("value"=>"person|".$person->getId())
        					);
        $dropped_semIds=I2CE_FormStorage::search("drop_semester",false,$where);
        $drpsem = array();
        foreach ($dropped_semIds as $id) {
            $dropSemForm = $factory->createContainer('drop_semester'.'|'.$id);
            $dropSemForm->populate();            
            $drpsem[] = $dropSemForm;
        }
        if(count($drpsem)==0) {
        	return false;
        	}

        foreach ($drpsem as $child) {
            $node = $template->appendFileByNode('view_drop_semester.html', 'div',  $appendNode );
            if (!$node instanceof DOMNode) {
                I2CE::raiseError("Could not find template $template for child form $form of person");
                return false;
            }
            $template->setForm($child,$node);
                $child->populateChildren('resume_semester');
                $resumes = $child->getChildren('resume_semester');
                if (count($resumes) > 0) {
                    $template->setDisplayDataImmediate('has_exam_results',1,$node);
                    foreach ($resumes as $resume) {
                        if (!  ($resumeNode = $template->appendFileById('view_resume_semester.html','tbody','resume_semester',false,$node)) instanceof DOMNode) {
                            continue;
                        }
                        $template->setForm($resume,$resumeNode);
                    }
                } else {
                    $template->setDisplayDataImmediate('has_resume_semester',0,$node);
                }
            
            $drop_semester = $factory->createContainer($child->drop_semester);
            if (!$drop_semester instanceof iHRIS_DropSemester || $drop_semester->getId() =='0') {
                I2CE::raiseError( "Bad Drop Semester:" . $child->drop_semester );
                continue;
            }
            $drop_semester->populate();
            $template->setForm($drop_semester,$node);
            
        }
    }
}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
