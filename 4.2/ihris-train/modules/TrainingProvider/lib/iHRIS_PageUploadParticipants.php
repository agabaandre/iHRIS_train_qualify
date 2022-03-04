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
 * Edit participants for a training
 * @package iHRIS
 * @subpackage Train
 * @access public
 * @author Luke Duncan <lduncan@intrahealth.org>
 * @copyright Copyright &copy; 2012 IntraHealth International, Inc. 
 * @since v4.1.3
 * @version v4.1.3
 */

/**
 * The page class for uploading particpants for a training
 * @package iHRIS
 * @subpackage Train
 * @access public
 */
class iHRIS_PageUploadParticipants extends I2CE_PageFormCSV { 

    /**
     * @var iHRIS_ProviderInstance The provider instance object for this page.
     */
    protected $instance;

    /**
     * @var array The list of participants for this training.
     */
    protected $participants;

    /**
     * Return the provider instance for this page.
     * @return iHRIS_ProviderInstance
     */
    public function getProviderInstance() {
        return $this->instance;
    }

    /**
     * Load the objects for the page.
     * @return boolean
     */
    protected function loadObjects() {
        parent::loadObjects();
        if (!$this->get_exists('id')) {
            $this->userMessage("Invalid Training Provider Requested");
            return false;
        }
        if ($this->get_exists('id')) {
            $id = $this->get('id');
            if (strpos($id,'|')=== false) {
                I2CE::raiseError("Deprecated use of id variable");
                $id = 'provider_instance|' . $id;
            }
        } else {
            $id = 'provider_instance|0';
        }
        $this->instance = $this->factory->createContainer( $id );

        $this->instance->populate();
    }

    /**
     * Set the form on the page.
     */
    protected function setForm() {
        $this->template->setForm( $this->instance );
    }
    
    /**
     * Displa the save or confirm buttons as needed.
     *
     * @param boolean @save Flag to show the save button.
     * @param boolean $show_edit
     */
    protected function displayControls( $save = false, $show_edit = true ) {
        if ( $save ) {
            $this->template->addFile( 'button_provider_save_return.html' );
        } else {
            $this->template->addFile( 'button_provider_confirm_notchild.html' );
        }
    }


    /**
     * Setup the list of all participants for this instance.
     */
    protected function setupParticipants() {
        if ( !is_array( $this->participants ) ) {
            $this->participants = array();
            $where_data = array(
                    'operator' => 'FIELD_LIMIT',
                    'field' => 'provider_instance',
                    'style' => 'equals',
                    'data' => array(
                        'value' => $this->instance->getNameId()
                        )
                    );
            $participants = I2CE_FormStorage::listFields( 'person_instance', array('attending','parent'), false, $where_data );
            foreach( $participants as $p_instance => $i_data ) {
                $this->participants[$i_data['parent']] = $i_data['attending'];
            }
        } else {
            I2CE::raiseError( "setupParticipants was called twice, so nothing was done the second time." );
        }

    }
    
    protected function validate() {
        // Just check the headers for now.
        if ( !$this->checked_validation ) {
            if ( !$this->processHeaderRow( 'providers' ) ) {
                $this->userMessage("Unable to read headers from CSV file.");
                $this->invalid = true;
                return;
            }
            $required_headers = array('NIN','Surname', 'Firstname', 'Gender', 'Home District', 
                    'Position', 'Facility Name', 'Work District', 'Tel', 'Email' );
            $invalid_headers = array();
            foreach( $required_headers as $header ) {
                if ( !in_array( $header, $this->current['providers']['header'] ) ) {
                    $invalid_headers[] = $header;
                }
            }
            if ( count( $invalid_headers ) > 0 ) {
                $this->userMessage( "There are missing headers from the CSV file: " . implode( ', ', $invalid_headers ) );
                $this->invalid = true;
                return;
            }
	    

            $this->checked_validation = true;
        }
        return true;
    }

    /**
     * Save the CSV for this page.
     */
    protected function save() {
        if ( parent::save() ) {
            $this->userMessage("The CSV file has been uploaded.");
        } else {
            $this->userMessage("An error occurred trying to upload your file.");
        }
        $this->setRedirect( "viewprovider?id=" . $this->instance->getNameId() );
    }

    /**
     * Validate the current row for the given key
     * @param string $key
     */
    protected function validateRow( $key ) {
        // Don't do any validations for now
        return true;
    }

    /**
     * Save the current row for the given key
     * @param string $key
     * @return boolean
     */
    protected function saveRow( $key ) {
        if ( !$this->current[$key]['row']['Firstname'] && !$this->current[$key]['row']['Surname'] ) {
            $this->userMessage("Unable to add people without names.");
            return false;
        }
        $job = $this->lookupList( "job", $this->current[$key]['row']['Position'], 'title' );
        if (!$job || !$this->current[$key]['row']['Position'] ) {
            $this->userMessage("Unable to find Job/Position" . $this->current[$key]['row']['Position'] . " for Person: " . $this->current[$key]['row']['Surname'] . " - " . $this->current[$key]['row']['Firstname'] ); 
            return false;
        }
        $facility = $this->lookupList( "health_facility", $this->current[$key]['row']['Facility Name'] );
        if (!$facility  || !$this->current[$key]['row']['Facility Name'] ) {
            $this->userMessage("Unable to find Facility
            " . $this->current[$key]['row']['Facility Name'] . " for Person: " . $this->current[$key]['row']['Surname'] . " - " . $this->current[$key]['row']['Firstname'] ); 
            return false;
        }
        $created = false;
        $home_district = $this->lookupList( "district", $this->current[$key]['row']['Home District'] );
        $work_district = $this->lookupList( "district", $this->current[$key]['row']['Work District'] );
	$tel=false;
	$email=false;	
	$tel =  $this->current[$key]['row']['Tel'] ;
        $email =  $this->current[$key]['row']['Email'] ;

        $id_type = $this->lookupList( "id_type", "National ID" );
        $gender = false;
        if ( strtolower( $this->current[$key]['row']['Gender'][0] ) == 'm' ) {
            $gender = "gender|M";
        } elseif ( strtolower( $this->current[$key]['row']['Gender'][0] ) == 'f' ) {
            $gender = "gender|F";
        }
	//$this->userMessage("Match ".$this->current[$key]['row']['Tel']);
	if ( $this->current[$key]['row']['Tel'] ) {

		$num_digits = strlen($this->current[$key]['row']['Tel']);
		if($num_digits < 9){
                $this->userMessage( "Invalid Phone Number ". $this->current[$key]['row']['Tel']);
                return false;
		}
            }
	if ( !isset($this->current[$key]['row']['Tel']) || !isset($this->current[$key]['row']['NIN'])) {

                $this->userMessage( "NIN or Telephone should have a value ");
                return false;
		
            } 
        $person_id = false;
        $no_nin_person_id = false;
	$num_digits = strlen($this->current[$key]['row']['Tel']);

	      if($num_digits == 9){

			$telephone = $this->current[$key]['row']['Tel'];
		}else{
	
			$telephone = substr($this->current[$key]['row']['Tel'], -9);
		
		}


	       if ( $this->current[$key]['row']['NIN'] ) {
           	 $find_nin = array( 
                    'operator' => 'AND',
                    'operand' => array( 0 => array(
                            'operator' => 'FIELD_LIMIT',
                            'style' => 'lowerequals',
                            'field' => 'id_num',
                            'data' => array( 'value' => $this->current[$key]['row']['NIN'] ),
                            ),
                        1 => array(
                            'operator' => 'FIELD_LIMIT',
                            'style' => 'equals',
                            'field' => 'id_type',
                            'data' => array( 'value' => $id_type ),
                            ),
                        )
                    );
             $nin_id = I2CE_FormStorage::search( "person_id", false, $find_nin, array(), true );

	      }

	     if($this->current[$key]['row']['Tel']){


              $find_contact = array(
                                         'operator' => 'FIELD_LIMIT',
                                         'style' => 'equals',
                                         'field' => 'telephone',
                                         'data' => array(
                                                         'value' => $telephone
                                      
                                                )
                                  );
               $contact_id = I2CE_FormStorage::search( "person_contact_personal", false, $find_contact, array(), true );

		}

            if ( $nin_id ) {
                $person_id_form = $this->factory->createContainer( "person_id|$nin_id" );
                $person_id_form->populate();
                $person_id = $person_id_form->getParent();
			
		if ( $gender ) {
                
		$find_demographic = array(
                                         'operator' => 'FIELD_LIMIT',
                                         'style' => 'equals',
                                         'field' => 'parent',
                                         'data' => array(
                                                         'value' => $person_id,
                                      
                                                )
                                  );
                $demographic_id = I2CE_FormStorage::search( "demographic", false, $find_demographic, array(), true );
              
               
                if ( $demographic_id ) {
                $demographic = $this->factory->createContainer( 'demographic|'. $demographic_id );
                $demographic->populate();
                $demographic->getField("gender")->setFromDB( $gender );
                $demographic->setParent( $person_id );
                $demographic->save( $this->user );
		
                $demographic->cleanup();
                unset( $demographic );
                }else{
		
		$demographic = $this->factory->createContainer( "demographic" );
                $demographic->getField("gender")->setFromDB( $gender );
                $demographic->setParent( $person_id );
                $demographic->save( $this->user );
		
                $demographic->cleanup();
                unset( $demographic );

		 }
		
              }

		if ( $home_district || $work_district ) {
                
		
                $person = $this->factory->createContainer( 'person|'. $person_id );
                $person->populate();
                $person->getField('residence')->setFromDB( $work_district );
		$person->getField('home')->setFromDB( $home_district );
                $person->setParent( $person_id );
                $person->save( $this->user );
		
                
              }

		if ( $job || $facility ) {
                
		$find_position = array(
                                         'operator' => 'FIELD_LIMIT',
                                         'style' => 'equals',
                                         'field' => 'parent',
                                         'data' => array(
                                                         'value' => $person_id,
                                      
                                                )
                                  );
                $position_id = I2CE_FormStorage::search( "position", false, $find_position, array(), true );
              
               
                if ( $position_id ) {
                $position = $this->factory->createContainer( 'position|'. $position_id );
		$position->populate();
		$position->getField('health_facility')->setFromDB($facility);
                $position->getField('job')->setFromDB($job);
                $position->setParent( $person_id );
                $position->save( $this->user );

                $position->cleanup();
                unset( $position );
                }else{
		
		$position = $this->factory->createContainer( "position" );
                $position->getField('health_facility')->setFromDB($facility);
                $position->getField('job')->setFromDB($job);
                $position->setParent( $person_id );
                $position->save( $this->user );

                $position->cleanup();
                unset( $position );

		 }
		
              }

		if ( $email || $tel ) {
                
		$find_contact = array(
                                         'operator' => 'FIELD_LIMIT',
                                         'style' => 'equals',
                                         'field' => 'parent',
                                         'data' => array(
                                                         'value' => $person_id,
                                      
                                                )
                                  );
                $contact_id = I2CE_FormStorage::search( "person_contact_personal", false, $find_contact, array(), true );



               
                if ( $contact_id ) {
                $contact = $this->factory->createContainer( 'person_contact_personal|'. $contact_id );
		$contact->populate();
		$contact->telephone = $this->current[$key]['row']['Tel'];
                $contact->email = $this->current[$key]['row']['Email'];
                $contact->setParent( $person_id );
                $contact->save( $this->user );

                $contact->cleanup();
                unset( $contact );
              
                }else{
		
		
                $contact = $this->factory->createContainer( "person_contact_personal" );
                $contact->telephone = $this->current[$key]['row']['Tel'];
                $contact->email = $this->current[$key]['row']['Email'];
                $contact->setParent( $person_id );
                $contact->save( $this->user );

                $contact->cleanup();
                unset( $contact );
              

		 }
		
              }
	    
	  $find_inst = array( 
                    'operator' => 'FIELD_LIMIT',
                    'style' => 'equals',
                    'field' => 'provider_instance',
                    'data' => array( 'value' => $this->instance->getNameID() ),
                    );
            $inst_id = I2CE_FormStorage::search( "person_instance", $person_id, $find_inst, array(), true );
            if ( $inst_id ) {
                $pers_instance = $this->factory->createContainer( "person_instance|$inst_id" );
                $pers_instance->populate();
            } else {
                $pers_instance = $this->factory->createContainer( "person_instance" );
                $pers_instance->setParent( $person_id );
                $pers_instance->getField("provider_instance")->setFromDB( $this->instance->getNameId() );
            }
            $pers_instance->attending = 1;
            if ( !$pers_instance->save( $this->user ) ) {
                I2CE::raiseError( "Unable to save child form for person_instance" );
                return false;
            }

            $pers_instance->cleanup();
            unset( $pers_instance );


	}elseif($contact_id){
	        
		$person_contact_form = $this->factory->createContainer( "person_contact_personal|$contact_id" );
                $person_contact_form->populate();
                $person_id = $person_contact_form->getParent();

               
	    //$this->userMessage("Match ".$person_id);
            
            if ( $person_id ) {
                
			
		if ( $gender ) {
                
		$find_demographic = array(
                                         'operator' => 'FIELD_LIMIT',
                                         'style' => 'equals',
                                         'field' => 'parent',
                                         'data' => array(
                                                         'value' => $person_id
                                      
                                                )
                                  );
                $demographic_id = I2CE_FormStorage::search( "demographic", false, $find_demographic, array(), true );
              
               
                if ( $demographic_id ) {
                $demographic = $this->factory->createContainer( 'demographic|'. $demographic_id );
                $demographic->populate();
                $demographic->getField("gender")->setFromDB( $gender );
                $demographic->setParent( $person_id );
                $demographic->save( $this->user );
		
                $demographic->cleanup();
                unset( $demographic );
                }else{
		
		$demographic = $this->factory->createContainer( "demographic" );
                $demographic->getField("gender")->setFromDB( $gender );
                $demographic->setParent( $person_id );
                $demographic->save( $this->user );
		
                $demographic->cleanup();
                unset( $demographic );

		 }
		
              }

		if ( $this->current[$key]['row']['NIN'] ) {
		$person_id_form = $this->factory->createContainer( "person_id" );
                $person_id_form->getField("id_type")->setFromDB( $id_type );
                $person_id_form->id_num = $this->current[$key]['row']['NIN'];
                $person_id_form->setParent( $person_id );
                $person_id_form->save( $this->user );

                $person_id_form->cleanup();
                unset( $person_id_form );
                }

		if ( $home_district || $work_district ) {
                
		
                $person = $this->factory->createContainer( 'person|'. $person_id );
                $person->populate();
                $person->getField('residence')->setFromDB( $work_district );
		$person->getField('home')->setFromDB( $home_district );
                $person->setParent( $person_id );
                $person->save( $this->user );
		
                
              }

		if ( $job || $facility ) {
                
		$find_position = array(
                                         'operator' => 'FIELD_LIMIT',
                                         'style' => 'equals',
                                         'field' => 'parent',
                                         'data' => array(
                                                         'value' => $person_id
                                      
                                                )
                                  );
                $position_id = I2CE_FormStorage::search( "position", false, $find_position, array(), true );
              
               
                if ( $position_id ) {
                $position = $this->factory->createContainer( 'position|'. $position_id );
		$position->populate();
		$position->getField('health_facility')->setFromDB($facility);
                $position->getField('job')->setFromDB($job);
                $position->setParent( $person_id );
                $position->save( $this->user );

                $position->cleanup();
                unset( $position );
                }else{
		
		$position = $this->factory->createContainer( "position" );
                $position->getField('health_facility')->setFromDB($facility);
                $position->getField('job')->setFromDB($job);
                $position->setParent( $person_id );
                $position->save( $this->user );

                $position->cleanup();
                unset( $position );

		 }
		
              }

		if ( $email || $tel ) {
                
		$find_contact = array(
                                         'operator' => 'FIELD_LIMIT',
                                         'style' => 'equals',
                                         'field' => 'parent',
                                         'data' => array(
                                                         'value' => $person_id
                                      
                                                )
                                  );
                $contact_id = I2CE_FormStorage::search( "person_contact_personal", false, $find_contact, array(), true );



               
                if ( $contact_id ) {
                $contact = $this->factory->createContainer( 'person_contact_personal|'. $contact_id );
		$contact->populate();
		$contact->telephone = $this->current[$key]['row']['Tel'];
                $contact->email = $this->current[$key]['row']['Email'];
                $contact->setParent( $person_id );
                $contact->save( $this->user );

                $contact->cleanup();
                unset( $contact );
              
                }else{
		
		
                $contact = $this->factory->createContainer( "person_contact_personal" );
                $contact->telephone = $this->current[$key]['row']['Tel'];
                $contact->email = $this->current[$key]['row']['Email'];
                $contact->setParent( $person_id );
                $contact->save( $this->user );

                $contact->cleanup();
                unset( $contact );
              

		 }
		
              }
	    
	  $find_inst = array( 
                    'operator' => 'FIELD_LIMIT',
                    'style' => 'equals',
                    'field' => 'provider_instance',
                    'data' => array( 'value' => $this->instance->getNameID() ),
                    );
            $inst_id = I2CE_FormStorage::search( "person_instance", $person_id, $find_inst, array(), true );
            if ( $inst_id ) {
                $pers_instance = $this->factory->createContainer( "person_instance|$inst_id" );
                $pers_instance->populate();
            } else {
                $pers_instance = $this->factory->createContainer( "person_instance" );
                $pers_instance->setParent( $person_id );
                $pers_instance->getField("provider_instance")->setFromDB( $this->instance->getNameId() );
            }
            $pers_instance->attending = 1;
            if ( !$pers_instance->save( $this->user ) ) {
                I2CE::raiseError( "Unable to save child form for person_instance" );
                return false;
            }

            $pers_instance->cleanup();
            unset( $pers_instance );
		

		
		}
            }else{

	      $person = $this->factory->createContainer( "person" );
              $person->surname = $this->current[$key]['row']['Surname'];
              $person->firstname = $this->current[$key]['row']['Firstname'];
              $person->getField('residence')->setFromDB( $work_district );
	      $person->getField('home')->setFromDB( $home_district );
              if ( !$person->save( $this->user ) ) {
                I2CE::raiseError("Unable to save person for provider upload.");
                return false;
              }
              $person_id = $person->getNameID();

		
            
            if ( $person_id ) {

		if ( $this->current[$key]['row']['NIN'] ) {
		$person_id_form = $this->factory->createContainer( "person_id" );
                $person_id_form->getField("id_type")->setFromDB( $id_type );
                $person_id_form->id_num = $this->current[$key]['row']['NIN'];
                $person_id_form->setParent( $person_id );
                $person_id_form->save( $this->user );

                $person_id_form->cleanup();
                unset( $person_id_form );
                }
                
			
		if ( $gender ) {
                
		$demographic = $this->factory->createContainer( "demographic" );
                $demographic->getField("gender")->setFromDB( $gender );
                $demographic->setParent( $person_id );
                $demographic->save( $this->user );
		
                $demographic->cleanup();
                unset( $demographic );

		 }
		
             
		if ( $job || $facility ) {
                
		$position = $this->factory->createContainer( "position" );
                $position->getField('health_facility')->setFromDB($facility);
                $position->getField('job')->setFromDB($job);
                $position->setParent( $person_id );
                $position->save( $this->user );

                $position->cleanup();
                unset( $position );

		 }
		
		if ( $email || $tel ) {
                
		
                $contact = $this->factory->createContainer( "person_contact_personal" );
                $contact->telephone = $telephone;
                $contact->email = $this->current[$key]['row']['Email'];
                $contact->setParent( $person_id );
                $contact->save( $this->user );

                $contact->cleanup();
                unset( $contact );
              

		 }
		
              
	    
	  $find_inst = array( 
                    'operator' => 'FIELD_LIMIT',
                    'style' => 'equals',
                    'field' => 'provider_instance',
                    'data' => array( 'value' => $this->instance->getNameID() ),
                    );
            $inst_id = I2CE_FormStorage::search( "person_instance", $person_id, $find_inst, array(), true );
            if ( $inst_id ) {
                $pers_instance = $this->factory->createContainer( "person_instance|$inst_id" );
                $pers_instance->populate();
            } else {
                $pers_instance = $this->factory->createContainer( "person_instance" );
                $pers_instance->setParent( $person_id );
                $pers_instance->getField("provider_instance")->setFromDB( $this->instance->getNameId() );
            }
            $pers_instance->attending = 1;
            if ( !$pers_instance->save( $this->user ) ) {
                I2CE::raiseError( "Unable to save child form for person_instance" );
                return false;
            }

            $pers_instance->cleanup();
            unset( $pers_instance );
		

		
		}


	

	}
       
       I2CE_ModuleFactory::callHooks( "upload_participants_" . $key . "_post_save_row", 
                array( 'created' => $created, 'person' => $person_id, 'data' => $this->current[$key]['row'] ) );
        return true; 
    
  }  
}



# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
