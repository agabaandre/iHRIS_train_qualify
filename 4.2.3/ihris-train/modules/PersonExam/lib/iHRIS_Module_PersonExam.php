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
*
* @package ihris-common
* @author Carl Leitner <litlfred@ibiblio.org>
* @version v3.2
* @since v3.2
* @filesource
*/
/**
* Class iHRIS_Module_PersonExam
*
* @access public
*/


class iHRIS_Module_PersonExam extends I2CE_Module {

    
    public static function getMethods() {
        return array(
            );
    }

    public static function getHooks() {
        return array(
                'post_add_child_form_person_instance' => 'action_person_exam',
                'validate_form_person_exam' => 'validate_form_person_exam',
                'form_post_save_person_exam' => 'form_post_save_person_exam',
                );
    }


    /**
     * Add the person exam details to the person page.
     * @param array $args
     */
    public function action_person_exam($args) {
        $add_exams = true;
        $provider_instance = $args['form']->getField('provider_instance')->getMappedFormObject();
        if ( $provider_instance instanceof iHRIS_ProviderInstance ) {
            $providertraining = $provider_instance->getField('providertraining')->getMappedFormObject();
            if ( $providertraining instanceof iHRIS_ProviderTraining ) {
                $training = $providertraining->getField('training')->getMappedFormObject();
                if ( $training instanceof iHRIS_Training ) {
                    if ( $training->getField('training_length_type')->getDBValue() == 'training_length_type|in_service' ) {
                        $add_exams = false;
                    }
                }
            }
        }
        if ( $add_exams ) {
            $args['page']->getTemplate()->appendFileByName( "view_person_exam_link.html", 'li', 'person_instance_edit_links', 0, $args['node'] );
			$args['page']->getTemplate()->appendFileByName( "view_person_exam_hide.html", 'li', 'person_instance_edit_links', 0, $args['node'] );

			$hide_exam = $args['page']->getTemplate()->getElementByName( 'exam_hide', 0, $args['node'] );
			$hide_exam->setAttribute("onclick", "expandText['person_exam_" . $args['form']->getId() . "'] = 'Show Exams'; return hideDiv('person_exam_" . $args['form']->getId() . "', this);");

            $template = "view_person_exam.html";
            $args['form']->populateChildren( 'person_exam' );
            $exam_node = $args['page']->getTemplate()->getElementByName( 'person_exam', 0, $args['node'] );
            $exam_node->setAttribute("id", "person_exam_" . $args['form']->getId());
            if ( array_key_exists( 'person_exam', $args['form']->children ) ) {
                foreach( $args['form']->children['person_exam'] as $key => $exam ) {
                    $node = $args['page']->getTemplate()->appendFileByNode( $template, 'div', $exam_node );
                    $args['page']->getTemplate()->setForm( $exam, $node );
                }
            }
        }
    }
    
	public function validate_form_person_exam($form) {
		
		if ($form->results != '' ) {
			if($form->results > 80){
				$form->getField('exam_grade')->setFromDB( 'exam_grade|grade_1' );
				}elseif($form->results > 74){
				$form->getField('exam_grade')->setFromDB( 'exam_grade|grade_2' );	
				}elseif($form->results > 68){
				$form->getField('exam_grade')->setFromDB( 'exam_grade|grade_3' );	
				}elseif($form->results > 62){
				$form->getField('exam_grade')->setFromDB( 'exam_grade|grade_4' );	
				}elseif($form->results > 56){
				$form->getField('exam_grade')->setFromDB( 'exam_grade|grade_5' );	
				}elseif($form->results > 49){
				$form->getField('exam_grade')->setFromDB( 'exam_grade|grade_6' );	
				}elseif($form->results > 44){
				$form->getField('exam_grade')->setFromDB( 'exam_grade|grade_7' );	
				}elseif($form->results < 45){
				$form->getField('exam_grade')->setFromDB( 'exam_grade|grade_8' );	
				}
		}
		
        /*
		$factory = I2CE_FormFactory::instance();
		$currentPersonInstance = $factory->createContainer($form->getParent());
		$currentPersonInstance->populate();
        if ( I2CE_Validate::checkString( $form->exam_number )) {
            $where = array(
                'operator' => 'AND',
                'operand'=>array(
                    0 => array(
                        'operator'=>'FIELD_LIMIT',
                        'field'=>'exam_number',
                        'style'=>'lowerequals',
                        'data'=>array(
							'value'=>strtolower($form->exam_number)
							)
                        )
                    )
                );
            $results = I2CE_FormStorage::listFields('person_exam',array('exam_number','parent'),false,$where,array('exam_number'));
            if( count($results) > 0 ) {
				foreach( $results as $e_instance => $e_data ) {
					if($e_data['parent'] != $form->getParent()){
					$person_instance= $factory->createContainer($e_data['parent']);
					$person_instance->populate();
					if($currentPersonInstance->getField('provider_instance')->getDBValue() == $person_instance->getField('provider_instance')->getDBValue() ){
						$form->getField('exam_number')->setInvalid( "Duplicate records match this record's exam number:");
						return;
						}
					}
				}
			} 
		}
        */
	}
	
	public function form_post_save_person_exam($args){
		$factory = I2CE_FormFactory::instance();
		$currentPersonInstance = $factory->createContainer($args['form']->getParent());
		$currentPersonInstance->populate();
		$currentPersonInstance->populateChildren('person_exam');
		$sum = 0;
		$grades = array();
		$attempts = array();
		foreach( $currentPersonInstance->children['person_exam'] as $exam ) {
			$grades[] = $exam->getField('exam_grade')->getDisplayValue(); 
			$attempts[] = $exam->getField('try')->getDBValue();		
		}
		if (max( $grades ) >= 7){
		$currentPersonInstance->av_mark = "";
		}else{
		$currentPersonInstance->av_mark = array_sum($grades)/count($grades);	
		};
		
		$real_try = '';
		$try_order = array( 'exam_try|final', 'exam_try|retry', 'exam_try|first' );
		foreach( $try_order as $try ) {
			if ( in_array( $try, $attempts ) ) {
				$real_try = $try;
				break;
			}
		}
		$currentPersonInstance->getField('try')->setFromDB( $real_try );
		
		$result = '';
		if ( $real_try != 'exam_try|first' ) {
			$result = 'R';
		}

			if($currentPersonInstance->av_mark <= 0 || $currentPersonInstance->av_mark == '' ){
				$result .= 'F';
			}elseif($currentPersonInstance->av_mark <= 2 && $real_try == 'exam_try|first' ){
				$result .= 'D';
			}elseif($currentPersonInstance->av_mark <= 2 ){
				$result .= 'P';
			}elseif($currentPersonInstance->av_mark <= 4.3 && $real_try == 'exam_try|first' ){
				$result .= 'C';
			}elseif($currentPersonInstance->av_mark <= 6 ){
				$result .= 'P';
			}else{
				$result .= 'F';
			}
			$currentPersonInstance->exam_result = $result;
			if ( !$currentPersonInstance->save($args['user']) ) {
				I2CE::raiseError("Failed to save person instance with person exam details.");
				$this->userMessage("Unable to save instance summary with exam details.");
			}
		}
}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
