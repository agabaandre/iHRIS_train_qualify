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

		$factory = I2CE_FormFactory::instance();
        $currentPersonInstance = $factory->createContainer($form->getParent());
        $currentPersonInstance->populate();
        $currentPersonInstance->populateChildren('person_exam');       

        $provider_instance = $currentPersonInstance->getField('provider_instance')->getMappedFormObject();

        if ( $provider_instance instanceof iHRIS_ProviderInstance ) {
            $providertraining = $provider_instance->getField('providertraining')->getMappedFormObject();
            if ( $providertraining instanceof iHRIS_ProviderTraining ) {
                $training = $providertraining->getField('training')->getMappedFormObject();
                if ( $training instanceof iHRIS_Training ) {
                    $where_data = array(
                                'operator' => 'AND',
                                'operand' => array(
                                            0 => array(
                                                'operator' => 'FIELD_LIMIT',
                                                'field' => 'training',
                                                'style' => 'equals',
                                                'data' => array(
                                                        'value' => $providertraining->getField('training')->getDBValue(),
                                                        )
                                                ),
                                            1 => array(
                                                'operator' => 'FIELD_LIMIT',
                                                'field' => 'paper',
                                                'style' => 'equals',
                                                'data' => array(
                                                        'value' => $form->getField('paper')->getDBValue(),
                                                        )
                                                ),
                                            2 => array(
                                                'operator' => 'FIELD_LIMIT',
                                                'field' => 'academic_year',
                                                'style' => 'equals',
                                                'data' => array(
                                                        'value' => $provider_instance->getField('academic_year')->getDBValue(),
                                                        )
                                                ),
                                            ),
                                );
                }
            }
        }
	
    	$form->results = round($form->results_section_a1 + $form->results_section_b1 + $form->results_section_c1 + $form->results_section_a2 + $form->results_section_b2 + $form->results_section_c2 + $form->results_section_c3);
		if ($form->results != '') {
			if ($form->results <= 100 ){
				if($form->results >= 80){
					$form->getField('exam_grade')->setFromDB( 'exam_grade|grade_1' );
					$form->getField('exam_lgrade')->setFromDB( 'exam_lgrade|grade_1' );
                    if ($form->getField('try')->getDBValue() == 'exam_try|first') {
                        $form->getField('final_grade')->setFromDB( 'final_grade|grade_1' );
                        $form->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_1' ); 
                    }
				}elseif($form->results >= 75){
					$form->getField('exam_grade')->setFromDB( 'exam_grade|grade_2' );	
					$form->getField('exam_lgrade')->setFromDB( 'exam_lgrade|grade_2' );
                    if ($form->getField('try')->getDBValue() == 'exam_try|first') {
                        $form->getField('final_grade')->setFromDB( 'final_grade|grade_2' );
                        $form->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_2' ); 
                    }
				}elseif($form->results >= 70){
					$form->getField('exam_grade')->setFromDB( 'exam_grade|grade_3' );	
					$form->getField('exam_lgrade')->setFromDB( 'exam_lgrade|grade_3' );
                    if ($form->getField('try')->getDBValue() == 'exam_try|first') {
                        $form->getField('final_grade')->setFromDB( 'final_grade|grade_3' );
                        $form->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_3' ); 
                    }
				}elseif($form->results >= 65){
					$form->getField('exam_grade')->setFromDB( 'exam_grade|grade_4' );
					$form->getField('exam_lgrade')->setFromDB( 'exam_lgrade|grade_4' );
                    if ($form->getField('try')->getDBValue() == 'exam_try|first') {
                        $form->getField('final_grade')->setFromDB( 'final_grade|grade_4' );
                        $form->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_4' ); 
                    }	
				}elseif($form->results >= 60){
					$form->getField('exam_grade')->setFromDB( 'exam_grade|grade_5' );
					$form->getField('exam_lgrade')->setFromDB( 'exam_lgrade|grade_5' );	
                    if ($form->getField('try')->getDBValue() == 'exam_try|first') {
                        $form->getField('final_grade')->setFromDB( 'final_grade|grade_5' );
                        $form->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_5' ); 
                    }
				}elseif($form->results >= 55){
					$form->getField('exam_grade')->setFromDB( 'exam_grade|grade_6' );
					$form->getField('exam_lgrade')->setFromDB( 'exam_lgrade|grade_6' );
                    if ($form->getField('try')->getDBValue() == 'exam_try|first') {
                        $form->getField('final_grade')->setFromDB( 'final_grade|grade_6' );
                        $form->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_6' ); 
                    }
				}elseif($form->results >= 50){
					$form->getField('exam_grade')->setFromDB( 'exam_grade|grade_7' );
					$form->getField('exam_lgrade')->setFromDB( 'exam_lgrade|grade_7' );	
                    if ($form->getField('try')->getDBValue() == 'exam_try|first') {
                        $form->getField('final_grade')->setFromDB( 'final_grade|grade_7' );
                        $form->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_7' ); 
                    }
				}elseif($form->results < 50){
					$course_name = null;

					if ($where_data){
            			$results = I2CE_FormStorage::listDisplayFields('exampaper',array('content'),false,$where_data);

	            		foreach( $results as $e_instance => $e_data ) {
	                		$course_name = $e_data['content'];
	            		}

	            		if (($form->results == 48 ) || ($form->results == 49) ) {
							if (strcasecmp($course_name, 'Oral and Practical') == 0) {
								$form->getField('exam_grade')->setFromDB( 'exam_grade|grade_8' );
								$form->getField('exam_lgrade')->setFromDB( 'exam_lgrade|grade_8' );
								if ($form->getField('try')->getDBValue() == 'exam_try|first') {
                                    $form->getField('final_grade')->setFromDB( 'final_grade|grade_8' );
                                    $form->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_8' ); 
                                }
							}else{
								$form->getField('exam_grade')->setFromDB( 'exam_grade|grade_7' );
								$form->getField('exam_lgrade')->setFromDB( 'exam_lgrade|grade_7' );
                                if ($form->getField('try')->getDBValue() == 'exam_try|first') {
                                    $form->getField('final_grade')->setFromDB( 'final_grade|grade_7' );
                                    $form->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_7' ); 
                                }
							}
						}else{
							$form->getField('exam_grade')->setFromDB( 'exam_grade|grade_8' );
							$form->getField('exam_lgrade')->setFromDB( 'exam_lgrade|grade_8' );
							if ($form->getField('try')->getDBValue() == 'exam_try|first') {
                                $form->getField('final_grade')->setFromDB( 'final_grade|grade_8' );
                                $form->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_8' ); 
                            }
						}
                    }	
			    }

			    if ($where_data){
		            $results = I2CE_FormStorage::listDisplayFields('exampaper',array('code','content'),false,$where_data);

		            count($results);

		            //$form->course_code = $results['code'];
		            //$form->getField('course_name')->setFromDB($results['course_content']);

		            foreach( $results as $e_instance => $e_data ) {
		                $course_code = $e_data['code'];
		                $course_name = $e_data['content'];
		            }

		            $form->course_code = $course_code;
		            $form->course_name = $course_name;
		            I2CE::raiseError($course_code);
		            I2CE::raiseError($course_name);
		        }
			}else{
				//I2CE::raiseMessage("not valid " . $form->results);
				$form->getField('results')->setInvalid( "The total value from the sections exceeds 100. Please correct the values form the section results");
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
		$decimals = 1;
		if (max( $grades ) >= 7){
		$temp_av_mark = "";
		}else{
		$av_mark_long = array_sum($grades)/count($grades);
		$point_index = strrpos($av_mark_long, '.'); 
		$temp_av_mark = substr($av_mark_long, 0, $point_index + $decimals+ 1);	
		}
		/*
		if (max( $grades ) >= 7){
		$currentPersonInstance->av_mark = "";
		}else{
		$currentPersonInstance->av_mark = truncate((array_sum($grades)/count($grades)),1);	
		};
		*/
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

		if($temp_av_mark <= 0 || $temp_av_mark == '' ){
			$result .= 'F';
		}elseif($temp_av_mark <= 2 && $real_try == 'exam_try|first' ){
			$result .= 'D';
		}elseif($temp_av_mark <= 2 ){
			$result .= 'P';
		}elseif($temp_av_mark <= 4.5 && $real_try == 'exam_try|first' ){
			$result .= 'C';
		}elseif($temp_av_mark <= 6 ){
			$result .= 'P';
		}else{
			$result .= 'F';
		}

        if ( $real_try != 'exam_try|first' ) {
		$currentPersonInstance->av_mark = "";
	    }else{
        $currentPersonInstance->av_mark = $temp_av_mark ;
        }

		$currentPersonInstance->exam_result = $result;
		if ( !$currentPersonInstance->save($args['user']) ) {
			I2CE::raiseError("Failed to save person instance with person exam details.");
			$this->userMessage("Unable to save instance summary with exam details.");
		}

		$provider_instance = $currentPersonInstance->getField('provider_instance')->getMappedFormObject();

        if ( $provider_instance instanceof iHRIS_ProviderInstance ) {
            $providertraining = $provider_instance->getField('providertraining')->getMappedFormObject();
            $academic_year = $provider_instance->getField('academic_year')->getMappedFormObject();
            $academic_year_id = $provider_instance->getField('academic_year')->getDBValue();

            if ( $providertraining instanceof iHRIS_ProviderTraining ) {
                $training = $providertraining->getField('training')->getMappedFormObject();
                if ( $training instanceof iHRIS_Training ) {
                    $where_data = array(
                                'operator' => 'AND',
                                'operand' => array(
                                            0 => array(
                                                'operator' => 'FIELD_LIMIT',
                                                'field' => 'training',
                                                'style' => 'equals',
                                                'data' => array(
                                                        'value' => $providertraining->getField('training')->getDBValue(),
                                                        )
                                                ),
                                            1 => array(
                                                'operator' => 'FIELD_LIMIT',
                                                'field' => 'academic_year',
                                                'style' => 'equals',
                                                'data' => array(
                                                        'value' => $academic_year_id,
                                                        )
                                                ),
                                            ),
                                );
                }
            }
        }
         
        if ($where_data){
            $results = I2CE_FormStorage::listFields('exampaper',array('content','credit_unit','paper'),false,$where_data);
            
            $grades = array();
            $papers = array();
            
            foreach( $currentPersonInstance->children['person_exam'] as $exam ) {
                $grades[] = $exam->getField('final_grade')->getDisplayValue();
                $papers[] = $exam->getField('paper')->getDBValue();
            }
        
            $gpa = 0;
            $current_academic_year_credit_hours = count($results);
        
        
            foreach( $results as $e_instance => $e_data ) {
                $key = array_search($e_data['paper'], $papers);

                if(isset($key)){
                    $gpa += $grades[$key];
                }
            }

            I2CE::raiseError($gpa);
            I2CE::raiseError($current_academic_year_credit_hours);
            I2CE::raiseError($gpa / $current_academic_year_credit_hours);


            $currentPersonInstance->grade_credit = $gpa;
            $currentPersonInstance->total_credit_hours = $current_academic_year_credit_hours;
            $currentPersonInstance->gpa = $gpa / $current_academic_year_credit_hours;
        }


       /*************************************************/
       // Caculating the CGPA.
       // Have to find all instances for that training
       /************************************************/
        $total_credit_hours = 0;
        $total_grade_credit = 0;
        
        $person_id = $currentPersonInstance->getParent();
        $person = $factory->createContainer($person_id);
        $person->populate();
        $person->populateChildren('person_instance');
        $sem = explode('|', $academic_year_id);
        $year = explode('_', $sem[1]);
        foreach( $person->children['person_instance'] as $personInstance ) {
            $personInstance->populate();
            $providerInstance = $personInstance->getField('provider_instance')->getMappedFormObject();
            if ( $providerInstance instanceof iHRIS_ProviderInstance ) {
                $providerTraining = $providerInstance->getField('providertraining')->getMappedFormObject();
                $newSemester = $providerInstance->getField('academic_year')->getDBValue();
                $newSem = explode('|', $newSemester);

                if ( $providerTraining instanceof iHRIS_ProviderTraining ) {
                    $newTraining = $providerTraining->getField('training')->getMappedFormObject();

                    if ( $newTraining instanceof iHRIS_Training && $newTraining === $training ) {
                        if ((((int)$newSem[1]) == ((int)$sem[1]))) {
                            $currentPersonInstance->populate();
                            $currentPersonInstance->populateChildren('person_exam');
                            foreach ($currentPersonInstance->children['person_exam'] as $current_person_exam) {
                                $personInstance->populate();
                                $personInstance->populateChildren('person_exam');
                                
                                foreach( $personInstance->children['person_exam'] as $person_exam ) {
                                    
                                    if ($current_person_exam->getField('try')->getDBValue() == 'exam_try|retry' || $current_person_exam->getField('try')->getDBValue() == 'exam_try|final') {
                                        if($current_person_exam->getField('paper')->getDBValue() == $person_exam->getField('paper')->getDBValue()){
                                            if($current_person_exam->results > $person_exam->getField('results')->getDBValue()){
                                                if ($current_person_exam->results <= 100 ){
                                                    if($current_person_exam->results >= 80){
                                                        $person_exam->getField('final_grade')->setFromDB( 'final_grade|grade_1' );
                                                        $person_exam->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_9' );
                                                    }elseif($current_person_exam->results >= 75){
                                                        $person_exam->getField('final_grade')->setFromDB( 'final_grade|grade_2' );
                                                        $person_exam->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_10' );
                                                    }elseif($current_person_exam->results >= 70){
                                                        $person_exam->getField('final_grade')->setFromDB( 'final_grade|grade_3' );
                                                        $person_exam->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_11' );
                                                    }elseif($current_person_exam->results >= 65){
                                                        $person_exam->getField('final_grade')->setFromDB( 'final_grade|grade_4' );
                                                        $person_exam->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_12' );
                                                    }elseif($current_person_exam->results >= 60){
                                                        $person_exam->getField('final_grade')->setFromDB( 'final_grade|grade_5' );
                                                        $person_exam->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_13' );
                                                    }elseif($current_person_exam->results >= 55){
                                                        $person_exam->getField('final_grade')->setFromDB( 'final_grade|grade_6' );
                                                        $person_exam->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_14' );
                                                    }elseif($current_person_exam->results >= 50){
                                                        $person_exam->getField('final_grade')->setFromDB( 'final_grade|grade_7' );
                                                        $person_exam->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_15' );
                                                    }elseif($current_person_exam->results < 50){
                                                        $course_name = null;

                                                        $where_data = array(
                                                                        'operator' => 'AND',
                                                                        'operand' => array(
                                                                                    0 => array(
                                                                                        'operator' => 'FIELD_LIMIT',
                                                                                        'field' => 'training',
                                                                                        'style' => 'equals',
                                                                                        'data' => array(
                                                                                                'value' => $providertraining->getField('training')->getDBValue(),
                                                                                                )
                                                                                        ),
                                                                                    1 => array(
                                                                                        'operator' => 'FIELD_LIMIT',
                                                                                        'field' => 'paper',
                                                                                        'style' => 'equals',
                                                                                        'data' => array(
                                                                                                'value' => $form->getField('paper')->getDBValue(),
                                                                                                )
                                                                                        ),
                                                                                    2 => array(
                                                                                        'operator' => 'FIELD_LIMIT',
                                                                                        'field' => 'academic_year',
                                                                                        'style' => 'equals',
                                                                                        'data' => array(
                                                                                                'value' => $provider_instance->getField('academic_year')->getDBValue(),
                                                                                                )
                                                                                        ),
                                                                                    ),
                                                                        );

                                                        if ($where_data){
                                                            $results = I2CE_FormStorage::listDisplayFields('exampaper',array('content'),false,$where_data);

                                                            foreach( $results as $e_instance => $e_data ) {
                                                                $course_name = $e_data['content'];
                                                            }

                                                            if (($current_person_exam->results == 48 ) || ($current_person_exam->results == 49) ) {
                                                                if (strcasecmp($course_name, 'Oral and Practical') == 0) {
                                                                    $person_exam->getField('final_grade')->setFromDB( 'final_grade|grade_8' );
                                                                    $person_exam->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_8' );
                                                                }else{
                                                                    $person_exam->getField('final_grade')->setFromDB( 'final_grade|grade_7' );
                                                                    $person_exam->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_15' );
                                                                }
                                                            }else{
                                                                $person_exam->getField('final_grade')->setFromDB( 'final_grade|grade_8' );
                                                                $person_exam->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_8' );
                                                            }
                                                        }   
                                                    }

                                                    $person_exam->save($args['user']);

                                                }else{
                                                    //I2CE::raiseMessage("not valid " . $form->results);
                                                    $form->getField('results')->setInvalid( "The total value from the sections exceeds 100. Please correct the values form the section results");
                                                }

                                            }
                                        }
                                    }
                                }
                            }   
                        }
                        
                    }
                }
            }
        }

        $count = 0;
        $count_gpa = 0; 

        foreach( $person->children['person_instance'] as $personInstance ) {
            $personInstance->populate();
            $providerInstance = $personInstance->getField('provider_instance')->getMappedFormObject();
            if ( $providerInstance instanceof iHRIS_ProviderInstance ) {
                $providerTraining = $providerInstance->getField('providertraining')->getMappedFormObject();
                
                if ( $providerTraining instanceof iHRIS_ProviderTraining ) {
                    $newTraining = $providerTraining->getField('training')->getMappedFormObject();

                    if ( $newTraining instanceof iHRIS_Training && $newTraining === $training) {
                    	$newSemester = $providerInstance->getField('academic_year')->getDBValue();
		                $newSem = explode('|', $newSemester);
		                $newYear = explode('_', $newSem[1]);
		                I2CE::raiseError((int)$newYear[1]);
		                I2CE::raiseError((int)$year[1]);

                        if ((int)$newYear[1] < (int)$year[1] /*|| (int)$newSem[1] < (int)$sem[1]*/) {
                        	if($personInstance->getField('try')->getDBValue() == "exam_try|first"){		
	                            $count_gpa += $personInstance->gpa;
	                            $count++;
                        	}
                        }
                        
                    }
                }
            }
        }
        exit;
        
        $total_gpa = $currentPersonInstance->gpa + $count_gpa ;
        I2CE::raiseError('here ' . $total_gpa);
        I2CE::raiseError('There ' . $count);

        $currentPersonInstance->cgpa = $total_gpa/$count;
        I2CE::raiseError($currentPersonInstance->cgpa);
        exit;

                     
                       
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
