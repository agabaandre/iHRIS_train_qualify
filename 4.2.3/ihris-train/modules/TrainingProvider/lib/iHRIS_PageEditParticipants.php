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
 * The page class for editing particpants for a training
 * @package iHRIS
 * @subpackage Train
 * @access public
 */
class iHRIS_PageEditParticipants extends I2CE_PageReportAction { 

    /**
     * @var I2CE_ProviderInstance The provider instance object for this page.
     */
    protected $instance;

    /**
     * @var I2CE_FormFactory The form factory.
     */
    protected $factory;

    /**
     * @var array The list of participants for this training.
     */
    protected $participants;

    /**
     * Return the action text to display in each cell based on the fields passed.
     * @param array $fields The field values for this row.
     * @return string
     */
    public function getActionText( $fields ) {
        if ( array_key_exists( $fields[0], $this->participants ) && $this->participants[$fields[0]] == 1 ) {
            return "Remove Participant";
        } else {
            return "Add Participant";
        }
    }

    /**
     * Return the arguments to pass to the action method.
     * These arguments should be ready to pass directly to the javascript
     * method so must be quoted and escaped if needed.
     * @return array
     */
    public function getActionArguments() {
        return array( 'this', "'" . $this->instance->getNameId() . "'" );
    }

    /**
     * Perform the main actions of the page.
     */
    protected function action() {
        if ( !parent::action() ) {
            return false;
        }
        if (!$this->hasPermission("task(person_can_edit_child_form_person_instance)")) {
            $this->userMessage("You do not have permission to edit participants for this instance.");
            return false;
        }

        $this->template->addHeaderLink("view.js");
        //$this->template->appendFileById( "menu_view.html", "li", "navBarUL", true );
        $this->factory = I2CE_FormFactory::instance();
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
        $this->template->setForm( $this->instance );

        $job = $this->instance->getField('job');
        // Note, this will fail if the request() method has been called on this page since that
        // caches all the get/post details and it can't be changed after that without changing core code.
        // lduncan@intrahealth.org
        //
        if ( !$this->post_exists('limits') &&
                !$this->get_exists('limits') ) {
            if ( $job && $job instanceof I2CE_FormField_MAP_MULT ) {
                if ( $job->isValid() ) {
                    $this->get['limits']['position+job']['in']['value'] = explode( ',', $job->getDBValue() );
                }
            } else {
                I2CE::raiseError("Invalid job from provider instance to limit participants.");
            }
        }

        $this->setupParticipants();

        return $this->actionReport( "id=$id" );

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

    
}



# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
