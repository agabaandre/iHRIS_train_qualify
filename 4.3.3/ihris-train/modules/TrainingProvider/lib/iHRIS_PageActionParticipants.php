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
 * Edit participants action for a training
 * @package iHRIS
 * @subpackage Train
 * @access public
 * @author Luke Duncan <lduncan@intrahealth.org>
 * @copyright Copyright &copy; 2012 IntraHealth International, Inc. 
 * @since v4.1.3
 * @version v4.1.3
 */

/**
 * The action page class for editing particpants for a training
 * @package iHRIS
 * @subpackage Train
 * @access public
 */
class iHRIS_PageActionParticipants extends I2CE_Page { 

    /**
     * @var I2CE_ProviderInstance The provider instance object for this page.
     */
    protected $instance;

    /**
     * @var I2CE_FormFactory The form factory.
     */
    protected $factory;

    /**
     * Perform the main actions of the page.
     * @return boolean
     */
    protected function action() {
        if ( !parent::action() ) {
            return false;
        }
        if (!$this->hasPermission("task(person_can_edit_child_form_person_instance)")) {
            $this->userMessage("You do not have permission to edit participants for this instance.");
            return false;
        }
        if ( !$this->get_exists('person') || !$this->get_exists('instance') ) {
            $this->template->addFile('action_participants_error.html');
            return true;
        }
        $person_instance = $this->getPersonInstance( $this->get('person'), $this->get('instance') );
        $piObj = I2CE_FormFactory::instance()->createContainer( "person_instance|" . $person_instance );
        if ( $person_instance ) {
            $piObj->populate();
            if ( $piObj->attending == 0 ) {
                $piObj->attending = 1;
                $this->template->addFile("action_participants_add.html");
            } else {
                $piObj->attending = 0;
                $this->template->addFile("action_participants_remove.html");
            }
        } else {
            $piObj->setParent($this->get('person'));
            $piObj->getField('provider_instance')->setFromDB($this->get('instance'));
            $piObj->getField('attending')->setFromDB(1);
            $this->template->addFile("action_participants_add.html");
        }
        return $piObj->save( $this->user );

    }

    /**
     * Get the person instance ID if it exists
     * @param string $person
     * @param string $instance
     * @return integer
     */
    protected function getPersonInstance( $person, $instance ) {
        $where_data = array(
                'operator' => 'FIELD_LIMIT',
                'field' => 'provider_instance',
                'style' => 'equals',
                'data' => array(
                    'value' => $instance,
                    )
                );
        $participants = I2CE_FormStorage::search( 'person_instance', $person, $where_data, array(), 1 );
        return $participants;
    }

    
}



# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
