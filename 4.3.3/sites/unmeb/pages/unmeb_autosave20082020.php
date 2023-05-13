<?php
$i2ce_site_user_access_init = null;

//$script = array_shift( $argv );

if (file_exists(dirname(__FILE__) . DIRECTORY_SEPARATOR . '/local' . DIRECTORY_SEPARATOR . 'config.values.php')) {
  require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '/local' . DIRECTORY_SEPARATOR . 'config.values.php');
} else {
  require_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . '/config.values.php');
}

$i2ce_site_i2ce_path = "/var/lib/iHRIS/releases/4.2.1/i2ce";

require_once ($i2ce_site_i2ce_path . DIRECTORY_SEPARATOR . 'I2CE_config.inc.php');

@I2CE::initializeDSN($i2ce_site_dsn,   $i2ce_site_user_access_init,    $i2ce_site_module_config);

unset($i2ce_site_user_access_init);

unset($i2ce_site_dsn);

unset($i2ce_site_i2ce_path);

unset($i2ce_site_module_config);

global $user;

$user = new I2CE_User(1, false, false, false);

$db = I2CE::PDO();

/*if ( PEAR::isError( $db ) ) {
  die( $db->getMessage() );
}
*/
$form_factory = I2CE_FormFactory::instance();

//echo "Memory Limit: " . ini_get( "memory_limit" ) . "\n";

//echo "Execution Time: " . ini_get( "max_execution_time" ) . "\n";

/*$find_id = array(
            'operator' => 'FIELD_LIMIT',
            'field' => 'id',
            'style' => 'equals',
            'data' => array(
                    'value' => '',
                    )
            );*/

//$person_ids = I2CE_FormStorage::listFields('person',array('id'),false,$find_id);
$person_ids = array();

if ( isset($_POST['submit'])) {
	if($_FILES['file_csv']['name']){
		$filename = explode(".",$_FILES['file_csv']['name']);
		if($filename[1] == "csv"){
			$handle = fopen($_FILES['file_csv']['tmp_name'], "r");
			while($data = fgetcsv($handle)){
				array_push($person_ids, $data[0]);
			}
		}
		else{
			echo 'Upload CSV File';
		}
	}
}

//Open and Save Person instances to make sure semester and academic years show.
foreach ($person_ids as $id) {
    $person = $form_factory->createContainer($id);
    $person->populate();
    $person->populateChildren('person_instance');


    if(count($person->children['person_instance']) > 0){
        $sort_ids = array();
        foreach( $person->children['person_instance'] as $person_instance ) {
        	$provider_instance = $person_instance->getField('provider_instance')->getMappedFormObject();
        	
            if ($provider_instance->getField('academic_year')->getDBValue() == 'academic_year|year_1' || $provider_instance->getField('academic_year')->getDBValue() == 'academic_year|year_2' || $provider_instance->getField('academic_year')->getDBValue() == 'academic_year|1') {
                $index = explode('|', $provider_instance->getField('academic_year')->getDBValue());
		        //$instance_id = explode('|', $person_instance->getField('semester')->getDBValue());

		        if ($index[1] == '1') {
		            $index[1] = '3';
		        }

		        if ($index[1] == 'year_1' || $index[1] == 'year_2') {
		            $index = explode('_', $index[1]);
		        }

		        if ($index[1] == '1') {
		            if (!array_key_exists(1, $sort_ids)){
		                $sort_ids[1] = $person_instance->getField('id')->getDBValue() . ',' . 'exam_try|first';
		            }
		            else{
		                if (!array_key_exists(2, $sort_ids)) {
		                    $sort_ids[2] = $person_instance->getField('id')->getDBValue() . ',' . 'exam_try|retry';
		                }else{
		                    $sort_ids[3] = $person_instance->getField('id')->getDBValue() . ',' . 'exam_try|final';
		                }
		            }
		        }

		        if ($index[1] == '2') {
		            if (!array_key_exists(4, $sort_ids)) {
		                $sort_ids[4] = $person_instance->getField('id')->getDBValue() . ',' . 'exam_try|first';
		            }
		            else{
		                if (!array_key_exists(5, $sort_ids)) {
		                    $sort_ids[5] = $person_instance->getField('id')->getDBValue() . ',' . 'exam_try|retry';
		                }else{
		                    $sort_ids[6] = $person_instance->getField('id')->getDBValue() . ',' . 'exam_try|final';
		                }
		            }
		        }

		        if ($index[1] == '3') {
		            if (!array_key_exists(7, $sort_ids)) {
		                $sort_ids[7] = $person_instance->getField('id')->getDBValue() . ',' . 'exam_try|first';
		            }
		            else{
		                if (!array_key_exists(8, $sort_ids)) {
		                    $sort_ids[8] = $person_instance->getField('id')->getDBValue() . ',' . 'exam_try|retry';
		                }else{
		                    $sort_ids[9] = $person_instance->getField('id')->getDBValue() . ',' . 'exam_try|final';
		                }
		            }
		        }
            }
          
        }

        foreach ($sort_ids as $person_instance_id) {
        	$id = explode(',', $person_instance_id);
        	$person_instance = $form_factory->createContainer($id[0]);
    		$person_instance->populate();
    		$person_instance->populateChildren('person_exam');
    		
    		if(count($person_instance->children['person_exam']) > 0){
                foreach( $person_instance->children['person_exam'] as $person_exam ) {
                	I2CE::raiseError($person_exam->course_name);
                	I2CE::raiseError($person_exam->getField('paper')->getDisplayValue());
                	I2CE::raiseError($person_exam->getField('try')->getDisplayValue());

                	$person_exam->results = round($person_exam->results_section_a1 + $person_exam->results_section_b1 + $person_exam->results_section_c1 + $person_exam->results_section_a2 + $person_exam->results_section_b2 + $person_exam->results_section_c2 + $person_exam->results_section_c3);
                	$person_exam->getField('try')->setFromDB($id[1]);

                	$provider_instance = $person_instance->getField('provider_instance')->getMappedFormObject();
                    $providertraining = $provider_instance->getField('providertraining')->getMappedFormObject();

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
                                                            'value' => $person_exam->getField('paper')->getDBValue(),
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
			            $results = I2CE_FormStorage::listDisplayFields('exampaper',array('code','content'),false,$where_data);

			            count($results);

			            foreach( $results as $e_instance => $e_data ) {
			                $course_code = $e_data['code'];
			                $course_name = $e_data['content'];
			            }

			            $person_exam->course_code = $course_code;
			            $person_exam->course_name = $course_name;
			            //I2CE::raiseError('Code ' . $person_exam->course_code);
			            //I2CE::raiseError('Name ' . $person_exam->course_name);
			        }

			        $grade = '';
			        $lgrade = '';
			        
			        if ($person_exam->results != '') {
			            if ($person_exam->results <= 100 ){
			                if($person_exam->results >= 80){
			                    $person_exam->getField('exam_grade')->setFromDB( 'exam_grade|grade_1' );
		                        $person_exam->getField('exam_lgrade')->setFromDB( 'exam_lgrade|grade_1' );
		                        if ($person_exam->getField('try')->getDBValue() == 'exam_try|first') {
		                            $person_exam->getField('final_grade')->setFromDB( 'final_grade|grade_1' );
		                            $person_exam->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_1' ); 
		                        }else{
		                        	$grade = 'final_grade|grade_1';
		                        	$lgrade = 'final_lgrade|grade_9';
		                        }

			                    
			                }elseif($person_exam->results >= 75){
			                    $person_exam->getField('exam_grade')->setFromDB( 'exam_grade|grade_2' );
		                        $person_exam->getField('exam_lgrade')->setFromDB( 'exam_lgrade|grade_2' );
		                        if ($person_exam->getField('try')->getDBValue() == 'exam_try|first') {
		                            $person_exam->getField('final_grade')->setFromDB( 'final_grade|grade_2' );
		                            $person_exam->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_2' ); 
		                        }else{
		                        	$grade = 'final_grade|grade_2';
		                        	$lgrade = 'final_lgrade|grade_10';
		                        }
			                }elseif($person_exam->results >= 70){
			                    $person_exam->getField('exam_grade')->setFromDB( 'exam_grade|grade_3' );
		                        $person_exam->getField('exam_lgrade')->setFromDB( 'exam_lgrade|grade_3' );
		                        if ($person_exam->getField('try')->getDBValue() == 'exam_try|first') {
		                            $person_exam->getField('final_grade')->setFromDB( 'final_grade|grade_3' );
		                            $person_exam->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_3' ); 
		                        }else{
		                        	$grade = 'final_grade|grade_3';
		                        	$lgrade = 'final_lgrade|grade_11';
		                        }
			                }elseif($person_exam->results >= 65){
			                    $person_exam->getField('exam_grade')->setFromDB( 'exam_grade|grade_4' );
		                        $person_exam->getField('exam_lgrade')->setFromDB( 'exam_lgrade|grade_4' );
		                        if ($person_exam->getField('try')->getDBValue() == 'exam_try|first') {
		                            $person_exam->getField('final_grade')->setFromDB( 'final_grade|grade_4' );
		                            $person_exam->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_4' ); 
		                        }else{
		                        	$grade = 'final_grade|grade_4';
		                        	$lgrade = 'final_lgrade|grade_12';
		                        }
			                }elseif($person_exam->results >= 60){
			                    $person_exam->getField('exam_grade')->setFromDB( 'exam_grade|grade_5' );
		                        $person_exam->getField('exam_lgrade')->setFromDB( 'exam_lgrade|grade_5' );
		                        if ($person_exam->getField('try')->getDBValue() == 'exam_try|first') {
		                            $person_exam->getField('final_grade')->setFromDB( 'final_grade|grade_5' );
		                            $person_exam->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_5' ); 
		                        }else{
		                        	$grade = 'final_grade|grade_5';
		                        	$lgrade = 'final_lgrade|grade_13';
		                        }
			                }elseif($person_exam->results >= 55){
			                    $person_exam->getField('exam_grade')->setFromDB( 'exam_grade|grade_6' );
		                        $person_exam->getField('exam_lgrade')->setFromDB( 'exam_lgrade|grade_6' );
		                        if ($person_exam->getField('try')->getDBValue() == 'exam_try|first') {
		                            $person_exam->getField('final_grade')->setFromDB( 'final_grade|grade_6' );
		                            $person_exam->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_6' ); 
		                        }else{
		                        	$grade = 'final_grade|grade_6';
		                        	$lgrade = 'final_lgrade|grade_14';
		                        }
			                }elseif($person_exam->results >= 50){
			                    $person_exam->getField('exam_grade')->setFromDB( 'exam_grade|grade_7' );
		                        $person_exam->getField('exam_lgrade')->setFromDB( 'exam_lgrade|grade_7' );
		                        if ($person_exam->getField('try')->getDBValue() == 'exam_try|first') {
		                            $person_exam->getField('final_grade')->setFromDB( 'final_grade|grade_7' );
		                            $person_exam->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_7' ); 
		                        }else{
		                        	$grade = 'final_grade|grade_7';
		                        	$lgrade = 'final_lgrade|grade_15';
		                        }
			                }elseif($person_exam->results < 50){      

			                    $where_data = null;

			                    if (($provider_instance->getField('academic_year')->getDBValue() == "academic_year|year_1") || ($provider_instance->getField('academic_year')->getDBValue() == "academic_year|year_2") || ($provider_instance->getField('academic_year')->getDBValue() == "academic_year|1")) {
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
		                                                                'value' => $person_exam->getField('paper')->getDBValue(),
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

			                    $course_name = null;

			                    if ($where_data){
			                        $results = I2CE_FormStorage::listDisplayFields('exampaper',array('content'),false,$where_data);

			                        foreach( $results as $e_instance => $e_data ) {
			                            $course_name = $e_data['content'];
			                        }

			                        if (($person_exam->results == 48 ) || ($person_exam->results == 49)) {
			                            if (strcasecmp($course_name, 'Oral and Practical') == 0) {
			                                $person_exam->getField('exam_grade')->setFromDB( 'exam_grade|grade_8' );
		                                    $person_exam->getField('exam_lgrade')->setFromDB( 'exam_lgrade|grade_8' );
		                                    if ($person_exam->getField('try')->getDBValue() == 'exam_try|first') {
		                                        $person_exam->getField('final_grade')->setFromDB( 'final_grade|grade_8' );
		                                        $person_exam->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_8' ); 
		                                    }else{
					                        	$grade = 'final_grade|grade_8';
					                        	$lgrade = 'final_lgrade|grade_8';
					                        }
			                            }else{
			                                $person_exam->getField('exam_grade')->setFromDB( 'exam_grade|grade_7' );
		                                    $person_exam->getField('exam_lgrade')->setFromDB( 'exam_lgrade|grade_7' );
		                                    if ($person_exam->getField('try')->getDBValue() == 'exam_try|first') {
		                                        $person_exam->getField('final_grade')->setFromDB( 'final_grade|grade_7' );
		                                        $person_exam->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_15' ); 
		                                    }else{
					                        	$grade = 'final_grade|grade_7';
					                        	$lgrade = 'final_lgrade|grade_15';
					                        }
			                            }
			                        }else{
			                            $person_exam->getField('exam_grade')->setFromDB( 'exam_grade|grade_8' );
		                                $person_exam->getField('exam_lgrade')->setFromDB( 'exam_lgrade|grade_8' );
		                                if ($person_exam->getField('try')->getDBValue() == 'exam_try|first') {
		                                    $person_exam->getField('final_grade')->setFromDB( 'final_grade|grade_8' );
		                                    $person_exam->getField('final_lgrade')->setFromDB( 'final_lgrade|grade_8' ); 
		                                }else{
					                        	$grade = 'final_grade|grade_8';
					                        	$lgrade = 'final_lgrade|grade_8';
					                        }
			                        }
			                    }   
			                }
			            }else{
			                I2CE::raiseMessage("not valid " . $person_exam->results);
			                $person_exam->getField('results')->setInvalid( "The total value from the sections exceeds 100. Please correct the values form the section results");
			            }
			        }

			        if ($person_exam->getField('try')->getDBValue() == 'exam_try|retry' || $person_exam->getField('try')->getDBValue() == 'exam_try|final') {
		        		foreach ($person->children['person_instance'] as $previous_instances) {
		        			$previous_instances->populate();
        					$previous_instances->populateChildren('person_exam');

        					if (count($previous_instances->children['person_exam']) > 0) {
        						foreach ($previous_instances->children['person_exam'] as $previous_exam) {
        							$previous_exam->populate();
        							if ($previous_exam->course_name == $person_exam->course_name && ($previous_exam->getField('id')->getDBValue() != $person_exam->getField('id')->getDBValue())) {
        								if ($person_exam->results > $previous_exam->results) {
        									if ($person_exam->getField('try')->getDBValue() == 'exam_try|retry' ) {
        										$previous_exam->getField('try')->setFromDB('exam_try|first');
        										$previous_instances->getField('try')->setFromDB('exam_try|first');
        										$previous_exam->getField('final_grade')->setFromDB( $grade );
		                                    	$previous_exam->getField('final_lgrade')->setFromDB( $lgrade );
		                                    	$previous_exam->save($user);
		                                    	$per_inst = $form_factory->createContainer($previous_exam->getParent());
	                                    		$per_inst->populate();
	                                    		$per_inst->getField('try')->setFromDB('exam_try|first');
	                                    		$per_inst->save($user);

        									}
        									if ($person_exam->getField('try')->getDBValue() == 'exam_try|final' ) {
        										if ($previous_exam->getField('try')->getDBValue() != 'exam_try|retry') {
        											$previous_exam->getField('try')->setFromDB('exam_try|first');
        											$previous_instances->getField('try')->setFromDB('exam_try|first');
        											$previous_exam->getField('final_grade')->setFromDB( $grade );
		                                    		$previous_exam->getField('final_lgrade')->setFromDB( $lgrade );
		                                    		$previous_exam->save($user);
		                                    		$per_inst = $form_factory->createContainer($previous_exam->getParent());
		                                    		$per_inst->populate();
		                                    		$per_inst->getField('try')->setFromDB('exam_try|first');
		                                    		$per_inst->save($user);
        										}
        										
        									}
        								}
        							}
        						}
        					}
		        		}
		        		$person_exam->getField('try')->setFromDB($id[1]);
		        		#I2CE::raiseError('1 ' . $person_exam->getField('try')->getDisplayValue());
		        		$person_exam->save($user);
		        	}
		        	else{
		        		$person_exam->getField('try')->setFromDB($id[1]);
		        		#I2CE::raiseError('2 ' . $person_exam->getField('try')->getDisplayValue());
                    	$person_exam->save($user);
		        	}
                }
            }
            $person_instance->getField('try')->setFromDB($id[1]);

            $person_instance->validate();
            $person_instance->save($user);
           # I2CE::raiseError('1 ' . $person_instance->getField('try')->getDisplayValue());
        }
 
    }
}

echo 'Update Complete'

?>

