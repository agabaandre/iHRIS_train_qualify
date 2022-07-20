<?php
/*
 * © Copyright 2013 IntraHealth International, Inc.
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
 * Manage adding or editing forms associated with a provider instance to the database.
 * 
 * @package iHRIS
 * @subpackage Train
 * @access public
 * @author Luke Duncan <lduncan@intrahealth.org>
 * @copyright Copyright &copy; 2012 IntraHealth International, Inc. 
 * @since v4.1.6
 * @version v4.1.6
 */

/**
 * Page object to handle adding an exam number to participants in a provider instance
 * 
 * @package iHRIS
 * @subpackage Train
 * @access public
 */
class iHRIS_PageEditExams extends I2CE_Page {

    /**
     * @var iHRIS_ProviderInstance the provider instance for this page.
     */
    protected $instance;
    /**
     * @var iHRIS_FormFactory the form factory for this page.
     */
    protected $factory;
    /**
     * @var array Data to be used in the page.
     */
    protected $data;
        
    /**
     *  Initialize the page
     * @return boolean
     */
    protected function initPage() {
        $this->factory = I2CE_FormFactory::instance();
        $this->data = array();
        return $this->loadObjects();
    }

    /**
     * Load the objects for this page.
     * @return boolean
     */
    protected function loadObjects() {
        $id = 0;
        if ( $this->get_exists( 'id' ) ) {
            $id = $this->get('id');
            if ( strpos( $id, '|' ) === false ) {
                I2CE::raiseError( "Deprecated use of id variable." );
                $id = 'provider_instance|' . $id;
            }
        }
        $this->instance = $this->factory->createContainer( $id );
        if ( !$this->instance instanceof iHRIS_ProviderInstance ) {
            I2CE::raiseError( "Unable to create provider instance from $id" );
            return false;
        }
        $this->instance->populate();
        $this->template->setForm( $this->instance );
        return true;
    }

    /**
     * Perform the actions of the page.
     * @return boolean
     */
    protected function action() {
        $this->template->addHeaderLink( 'mootools-core.js' );
        $this->template->addHeaderLink( 'I2CE_ClassValues.js' );
        $this->template->addHeaderLink( 'I2CE_SubmitButton.js' );
        $action = "exam_number"; //set default value
        if ( count( $this->request_remainder ) > 0 ) {
            $action = array_shift( $this->request_remainder );
        }

        if ( $this->isPost() ) {
            $method = "process_$action";
            if ( method_exists( $this, $method ) ) {
                if ( !$this->$method() ) {
                    I2CE::raiseError( "Error calling $method." );
                }
            } else {
                I2CE::raiseError( "Unable to process page for $method." );
            }
        }
        $this->template->appendFileById( "edit_exam_${action}_header.html", "th", "participant_header" );
        $this->data['titleNode'] = $this->template->addFile( "edit_exam_${action}_title.html" );
        $this->data['detailsNode'] = $this->template->addFile( "edit_exam_${action}.html" );

        $pre_method = "action_pre_$action";
        if ( method_exists( $this, $pre_method ) ) {
            $this->$pre_method();
        }

        if ( array_key_exists( 'invalid', $this->data ) && $this->data['invalid'] ) {
            I2CE::raiseMessage("Invalid data so not processing participants.");
            return true;
        }
        $participants = $this->getParticipants();
        $list = array();
        foreach( $participants as $participant ) {
            $participantObj = $this->factory->createContainer( "person_instance|" . $participant );
            $participantObj->populate();

            $person = $this->factory->createContainer( $participantObj->getParent() );
            $person->populate();

            $list[$person->surname . " " . $person->firstname] = array( 'person' => $person, 'person_instance' => $participantObj );
            ksort( $list );
        }
        foreach( $list as $name => $objects ) {
            $node = $this->template->appendFileById( "edit_exam_participant.html", "tr", "participant_list" );
            $this->template->setForm( $objects['person'], $node );

            $method = "action_participant_$action";
            if ( method_exists( $this, $method ) ) {
                if ( !$this->$method( $node, $objects ) ) {
                    I2CE::raiseError("Unable to do participant method $method!" );
                }
            } else {
                I2CE::raiseError("Unable to find method $method!" );
            }
        }
        $post_method = "action_post_$action";
        if ( method_exists( $this, $post_method ) ) {
            $this->$post_method();
        }
        return true;
    }

    /**
     * Do the pre action for exam numbers
     */
    protected function action_pre_exam_number() {
        $this->data['exam_numbers'] = array();
        $this->data['show_save_button'] = false;
    }

    /**
     * Do the participant loop for exam numbers
     * @param DOMNode $node
     * @param array $objects
     * @return boolean
     */
    protected function action_participant_exam_number( $node, $objects ) {
        if ( $objects['person_instance']->exam_number != "" ) {
            $this->data['exam_numbers'][] = $objects['person_instance']->exam_number;
            $exam_node = $this->template->appendFileByNode( "edit_exam_participant_exam_number_show_exam.html", "td", $node );
        } else {
            $this->data['show_save_button'] = true;
            $exam_node = $this->template->appendFileByNode( "edit_exam_participant_exam_number_set_exam.html", "td", $node );
            $checkbox = $this->template->query( "./descendant-or-self::input[@type='checkbox']", $exam_node );
            if ( $checkbox->length > 0 ) {
                $checkbox->item(0)->setAttribute( "value", $objects['person_instance']->getNameId() );
                $checkbox->item(0)->setAttribute( "id", "participant_" . $objects['person_instance']->getNameId() );
            }
            $label = $this->template->query( "./descendant-or-self::label[@name='set_label']", $exam_node );
            if ( $label->length > 0 ) {
                $label->item(0)->setAttribute( "for", "participant_" . $objects['person_instance']->getNameId() );
            }
        }
        $this->template->setForm( $objects['person_instance'], $exam_node );
        return true;
    }

    /**
     * Do the post action for exam numbers
     */
    protected function action_post_exam_number() {
        if ( count( $this->data['exam_numbers'] ) > 0 ) {
            $current_max = max( $this->data['exam_numbers'] );
        } else {
            $current_max = 0;
        }
        $this->template->setDisplayDataImmediate( "current_max", $current_max );
        if ( $this->data['show_save_button'] ) {
            $this->template->addFile( "edit_person_instance_exam_button_save.html" );
        } else {
            $this->template->addFile( "edit_exam_exam_number_complete.html" );
        }
    }

    /**
     * Process the page for exam numbers
     * @return boolean
     */
    protected function process_exam_number() {
        if ( $this->post_exists( "participants" ) && count( $this->post("participants") ) > 0 ) {
            if ( $this->post_exists( 'current_max' ) ) {
                $start = $this->post( 'current_max' ) + 1;
            } else {
                $start = 1;
            }
            foreach( $this->post('participants') as $participant ) {
                $participantObj = $this->factory->createContainer( $participant );
                $participantObj->populate();
                $participantObj->exam_number = sprintf( "%03d", $start );
                if ( !$participantObj->save( $this->user ) ) {
                    $this->userMessage("Unable to update exam number for $participant!");
                }
                $start++;
            }
        }
        return true;
    }

    /**
     * Do the pre action for exam results
     */
    protected function action_pre_exam_results() {
        if ( $this->request_exists( 'paper' ) ) {
            $this->data['paper'] = $this->factory->createContainer( $this->request( 'paper' ) );
            if ( !$this->data['paper'] instanceof I2CE_SimpleList || $this->data['paper']->getName() != 'paper' ) {
                I2CE::raiseMessage("not a paper form " . get_class($this->data['paper']) );
                $this->template->addFile( 'edit_exam_exam_results_invalid_paper.html' );
                $this->data['invalid'] = true;
            } else {
                $this->data['paper']->populate();
                if ( $this->data['paper']->name == '' ) {
                    I2CE::raiseMessage("name field is blank");
                    $this->template->addFile( 'edit_exam_exam_results_invalid_paper.html' );
                    $this->data['invalid'] = true;
                } else {
                    $this->template->addHeaderLink( 'mootools-more.js' );
                    $this->template->addHeaderLink( 'I2CE_InputFormatter.js' );
                    $personExam = $this->factory->createContainer( 'person_exam|0' );
                    $this->template->setForm( $personExam, $this->data['detailsNode'] );
                    $this->template->setDisplayData( "exam_paper_name", $this->data['paper']->name, $this->data['titleNode'] );
                }
            }
        } else {
            I2CE::raiseMessage("no paper field request");
            $this->template->addFile( 'edit_exam_exam_results_invalid_paper.html' );
            $this->data['invalid'] = true;
        }
    }

    /**
     * Do the participant loop for exam numbers
     * @param DOMNode $node
     * @param array $objects
     * @return boolean
     */
    protected function action_participant_exam_results( $node, $objects ) {
        $currentPaper = $this->data['paper']->getNameId();

        $existingExam = $this->findExam( $objects['person_instance'], $currentPaper );
        /*
        if ( !$existingExam ) {
            $existingExam = $this->factory->createContainer( 'person_exam|0' );
        }
        */
        if ( $existingExam ) {
            $examNode = $this->template->appendFileByNode( 'edit_exam_participant_exam_results_done.html', 'td', $node );
            $this->template->setDisplayDataImmediate( 'exam_results', $existingExam->results, $examNode );
        } else {

            $examNode = $this->template->appendFileByNode( 'edit_exam_participant_exam_results_form.html', 'td', $node );
            //$this->template->setForm( $existingExam, $examNode );
            //return true;
            $input = $this->template->query( "./descendant-or-self::input[@name='exam_results']", $examNode );
            if ( $input->length == 0 ) {
                I2CE::raiseError( "Unable to find exam results field to process." );
                return true;
            }
            $input = $input->item(0);
            /*
            if ( $existingExam ) {
                $input->setAttribute( "value", $existingExam->results );
            }
            */
            $js = "I2CE_InputFormatter.format(this,'percentage',0,{'nonempty':{}}); 
var e = $(this);
e.setStyle('background-color', 'yellow');
new Request({
        'useSpinner':true,
        url: 'index.php/editexams/exam_results?id=".$this->instance->getNameId()."',
        method: 'post',
        'data':{'paper':'$currentPaper','person_instance':'" 
        . $objects['person_instance']->getNameId() . "','person_exam':'" 
        . ($existingExam ? $existingExam->getNameId() : 0) 
        . "','results':e.get('value'),'exam_date':e.form['form[person_exam][0][0][fields][exam_date]'].value},
        onComplete: function(response) {
        if ( response == 'err' ) {
            e.setStyle('background-color', 'red');
        } else if ( response == 'ok' ) {
            e.setStyle('background-color', 'lightgreen');
        }
        }
        }).send();";
            $input->setAttribute('onchange', $js);
        }

        return true;
    }

    /**
     * Process the exam results.  This is AJAXy
     */
    protected function process_exam_results() {
        if ( !$this->post_exists( 'person_instance' ) || !$this->post('person_instance') ) {
            I2CE::raiseError( "No person instance passed to save exam results." );
            return $this->showResults('err');
        } else {
            $instance = $this->factory->createContainer( $this->post( 'person_instance' ) );
            $instance->populate();
            if ( $instance->getField('provider_instance')->getDBValue() != $this->instance->getNameId() ) {
                I2CE::raiseError( "Invalid person instance passed to exam results.  It doesn't match the provider instance given." );
                return $this->showResults('err');
            }
        }
        if ( !$this->post_exists('paper') || !$this->post('paper') ) {
            return $this->showResults('err');
        } else {
            $paper = $this->factory->createContainer( $this->post('paper') );
            $paper->populate();
            if ( !$paper->getField('name')->getDBValue() ) {
                I2CE::raiseError( "Invalid paper passed to exam results." );
                return $this->showResults('err');
            }
        }
        if ( !$this->post_exists( 'results' )) {
            I2CE::raiseError( "No results given to exam results." );
            return $this->showResults('err');
        }
        if ( !$this->post_exists('exam_date') || !$this->post('exam_date') ) {
            I2CE::raiseError( "No exam date given to exam results." );
            return $this->showResults('err');
        }
        if ( $this->post_exists('person_exam') && $this->post('person_exam') ) {
            $personExam = $this->factory->createContainer( $this->post( 'person_exam' ) );
            $personExam->populate();
        } else {
            $personExam = $this->factory->createContainer( 'person_exam|0' );
            $personExam->setParent( $this->post( 'person_instance' ) );
        }
        $personExam->getField('exam_date')->setFromPost( $this->post('exam_date') );
        $personExam->getField('paper')->setFromPost( $this->post( 'paper' ) );
        $personExam->getField('results')->setFromPost( $this->post('results') );
        $personExam->getField('try')->setFromPost('exam_try|first');
        $personExam->validate();
        if ( $personExam->hasInvalid() ) {
            I2CE::raiseError( "Invalid data for person exam so can't save."
            . "date " . $personExam->getField('exam_date')->getInvalid() 
            . "results " . $personExam->getField('results')->getInvalid() 
            . "paper " . $personExam->getField('paper')->getInvalid() 
            . "try " . $personExam->getField('try')->getInvalid() );
            return $this->showResults('err');
        } elseif ( !$personExam->save( $this->user ) ) {
            return $this->showResults('err');
        } 
        //I2CE::raiseMessage("Saved new exam for " . $personExam->getNameId() );
        return $this->showResults('ok');
        exit();
    }

    /**
     * Show the given results of the AJAX page.
     * @param string $display
     */
    protected function showResults( $display ) {
        echo $display;
        exit();
    }

    /**
     * Find a given exam for the person instance with the given paper
     * @param iHRIS_PersonInstance $instance
     * @param string $paper The id of the paper form
     * @return iHRIS_PersonExam
     */
    protected function findExam( $instance, $paper ) {
        $instance->populateChildren( 'person_exam' );
        $existingExam = null;
        if ( array_key_exists( 'person_exam', $instance->children ) ) {
            foreach( $instance->children['person_exam'] as $exam ) {
                if ( $exam->getField('paper')->getDBValue() == $paper ) {
                    $existingExam = $exam;
                    //I2CE::raiseMessage("found exam " . $exam->getNameId() );
                    break;
                }
            }
        }
        return $existingExam;
    }
 
    /**
     * Return a list of all person_instances attending this provider instance
     * @return array
     */
    protected function getParticipants() {
        $where_data = array(
                'operator' => 'AND',
                'operand' => array(
                    0 => array(
                        'operator' => 'FIELD_LIMIT',
                        'field' => 'provider_instance',
                        'style' => 'equals',
                        'data' => array(
                            'value' => $this->instance->getNameId(),
                            )
                        ),
                    1 => array(
                        'operator' => 'FIELD_LIMIT',
                        'field' => 'attending',
                        'style' => 'equals',
                        'data' => array(
                            'value' => 1,
                            )
                        ),
                    ),
                );
        return I2CE_FormStorage::search( 'person_instance', false, $where_data );
    }


}


# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
