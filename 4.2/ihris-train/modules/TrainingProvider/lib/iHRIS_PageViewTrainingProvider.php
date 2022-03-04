<?php
/*
 * © Copyright 2007, 2008 IntraHealth International, Inc.
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
 * View a trainingprovider's record.
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 * @author Luke Duncan <lduncan@intrahealth.org>
 * @copyright Copyright &copy; 2007, 2008 IntraHealth International, Inc. 
 * @since v2.0.0
 * @version v2.0.0
 */

/**
 * The page class for displaying the a trainingprovider's record.
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 */
class iHRIS_PageViewTrainingProvider extends I2CE_Page{ 

    /**
     * @var I2CE_Form The main object for this page.
     */
    protected $mainObj;

    /**
     * @var I2CE_FormFactory The form factory.
     */
    protected $factory;

    /**
     * Return the main object of this page.
     * @return I2CE_Form
     */
    public function getMainObject() {
        return $this->mainObj;
    }

    /**
     * Set up the main object for this page as well as the training provider.
     */
    protected function loadPrimaryObject() {
        $this->factory = I2CE_FormFactory::instance();
        if (!$this->request_exists('id')) {
            $this->userMessage("Invalid Training Provider Requested");
            return false;
        }
        if ($this->request_exists('id')) {
            $id = $this->request('id');
            if (strpos($id,'|')=== false) {
                I2CE::raiseError("Deprecated use of id variable");
                $id = 'trainingprovider|' . $id;
            }
        } else {
            $id = 'trainingprovider|0';
        }
        $this->mainObj = $this->factory->createContainer( $id);
        $this->mainObj->populate();
        if ( !$this->mainObj instanceof iHRIS_TrainingProvider && $this->mainObj->getParentID() != 0 ) {
            $provider = $this->factory->createContainer( $this->mainObj->getParent() );
            $provider->populate();
            $this->template->setForm( $provider);
        }
        $this->template->setForm( $this->mainObj );
    }

    /**
     * Initialize the page.
     */
    protected function initPage() {
        $this->loadPrimaryObject();
        return true;
    }
    /**
     * Perform the main actions of the page.
     */
    protected function action() {
        parent::action();
        if (!$this->hasPermission("task(provider_can_view)")) {
            $this->userMessage("You do not have permission to view this provider");
            return false;
        }
        $this->template->addHeaderLink("view.js");
        $this->template->appendFileById( "menu_view.html", "li", "navBarUL", true );
        $this->template->addFile( "view_pr_" . $this->mainObj->getName() . ".html" );
        $this->template->appendFileById( "menu_view_pr_" . $this->mainObj->getName() . ".html", "ul", "menuView" );


        if ($this->mainObj instanceof iHRIS_TrainingProvider) {
            return $this->action_trainingprovider();
        } elseif ( $this->mainObj instanceof iHRIS_ProviderTraining ) {
            return $this->action_providertraining();
        } elseif ( $this->mainObj instanceof iHRIS_ProviderInstance ) {
            return $this->action_provider_instance();
        }
        return true;

    }

    /**
     * Perform the action for training providers.
     * @return boolean
     */
    public function action_trainingprovider() {

        if (!$this->hasPermission("task(provider_can_view_child_forms)")) {
            $this->userMessage("You do not have permission to view this provider");
            return false;
        }

        $child_forms = $this->mainObj->getChildForms();
        foreach($child_forms as $form) {
            if ( $form == 'provider_instance' ) { 
                // This is handled specially
                continue;
            }
            if (!$this->hasPermission("task(provider_can_view_child_forms|provider_can_view_child_form_{$form})")) {
                continue;
            }
            $method = 'action_' . $form;
            if ($this->_hasMethod($method)) {
                if (!$this->$method()) {
                    I2CE::raiseError("Could not do action for $form");
                }
            }
        }

        $trainings = $this->getTrainings();
        foreach( $trainings as $training ) {
            $trainObj = $this->factory->createContainer( "providertraining|" . $training );
            $trainObj->populate();
            // Set parent for the links, this won't be saved so it's just temporary
            $trainObj->setParent( $this->mainObj );
            $trainNode = $this->template->appendFileById( "view_pr_trainingprovider_providertraining.html", "div", "provider_trainings");
            $prov_instance = "provider_instance_" . $trainObj->getId();
            $this->template->setAttribute("name", "jump_training_" . $trainObj->getId(), null, "//a[@name='jump_training']", $trainNode );
            $this->template->setAttribute("id", $prov_instance, null, "//div[@id='provider_instance']", $trainNode );
            $this->template->setAttribute("onclick", "return hideDiv('$prov_instance', this);", null, "//a[@class='hide']", $trainNode );
            $this->template->setForm( $trainObj, $trainNode );

            $menuNode = $this->template->appendElementById( "menu_trainingprovider", "li" );
            $this->template->appendElementByNode( $menuNode, "a", 
                    array( 
                        "href" => "#jump_training_" . $trainObj->getId(),
                        "onclick" => "if(prevAnchor) prevAnchor.className=''; this.className='active'; prevAnchor=this;",
                        ), 
                    $trainObj->getField("training")->getDisplayValue() );

            $instances = $this->getInstances( "providertraining|" . $training, "end_date", -30, 5 );
            foreach( $instances as $instance ) {
                $instanceObj = $this->factory->createContainer( "provider_instance|" . $instance );
                $instanceObj->populate();

                $instanceNode = $this->template->appendFileById( "view_pr_trainingprovider_provider_instance.html", "div", $prov_instance );
                $this->template->setForm($instanceObj, $instanceNode );

            }

        }

        $child_forms = $this->mainObj->getChildForms();
        foreach($child_forms as $form) {
            // provider_instance is handled as a special case, but do this for any other children.
            if ( $form == 'provider_instance' ) {
                continue;
            }
            if (!$this->hasPermission("task(person_can_view_child_forms|person_can_view_child_form_{$form})")) {
                continue;
            }
            $method = 'action_' . $form;
            if ($this->_hasMethod($method)) {
                if (!$this->$method()) {
                    I2CE::raiseError("Could not do action for $form");
                }
            }
        }


        return true;
    }

    /**
     * Perform the actions for provider trainings
     * @return boolean
     */
    public function action_providertraining() {
        $provider = $this->mainObj->getField("trainingprovider")->getMappedFormObject();
        $this->template->setForm( $provider, "siteContent" );
        $instances = $this->getInstances( $this->mainObj->getNameId(), "end_date" );
        foreach( $instances as $instance ) { 
            $instanceObj = $this->factory->createContainer( "provider_instance|" . $instance );
            $instanceObj->populate();

            $instanceNode = $this->template->appendFileById( "view_pr_trainingprovider_provider_instance.html", "div", "provider_trainings" );
            $this->template->setForm($instanceObj, $instanceNode );

        }   

        return true;
    }

    /**
     * Perform the actions for provider instances
     * @return boolean
     */
    public function action_provider_instance() {
        $this->template->addHeaderLink( 'data_list.css' );
        $training = $this->mainObj->getField("providertraining")->getMappedFormObject();
        $provider = $training->getField("trainingprovider")->getMappedFormObject();
        $this->template->setForm( $provider, "siteContent" );
        $child_forms = $this->mainObj->getChildForms();
        foreach( $child_forms as $form ) {
            $method = 'action_' . $form;
            if ( $this->_hasMethod($method) ) {
                if ( !$this->$method() ) {
                    I2CE::raiseError("Could not do action for $form.");
                }
            }
        }
        $participants = $this->getParticipants();
        foreach( $participants as $participant ) {
            $participantObj = $this->factory->createContainer( "person_instance|" . $participant );
            $participantObj->populate();

            $person = $this->factory->createContainer( $participantObj->getParent() );
            $person->populate();

            //$participantNode = $this->template->appendFileById( "view_pr_provider_instance_person_instance.html", "div", "participant_details" );
            $participantNode = $this->template->appendFileById( "view_pr_provider_instance_person_instance.html", "tr", "participant_details_table" );
            $this->template->setForm($participantObj, $participantNode );
            $this->template->setForm($person, $participantNode );
        }
        return true;
    }

    /**
     * Return a list of all trainings for this provider.
     * @return array
     */
    protected function getTrainings() {
        $where_data = array(
                'operator' => 'FIELD_LIMIT',
                'field' => 'trainingprovider',
                'style' => 'equals',
                'data' => array(
                    'value' => $this->mainObj->getNameId()
                    )
                );
        return I2CE_FormStorage::search( 'providertraining', false, $where_data );
    }

    /**
     * Return a list of all instances for the given training.
     * @param string $training the training to get instances for
     * @param string $date_field the date field to use for limits and sorting
     * @param int $days the number of days before or after today to start the list
     * @param int $count the number of instances to return
     * @return array
     */
    protected function getInstances( $training, $date_field, $days=null, $count=null ) {
        $where_data = array(
                'operator' => 'FIELD_LIMIT',
                'field' => 'providertraining',
                'style' => 'equals',
                'data' => array(
                    'value' => $training
                    )
                );
        if ( $days !== null ) {
            $date = I2CE_Date::now( I2CE_Date::DATE, time() + $days * 86400 );
            $where_data = array(
                'operator' => 'AND',
                'operand' => array(
                    0 => $where_data,
                    1 => array(
                        'operator' => 'FIELD_LIMIT',
                        'field' => $date_field,
                        'style' => 'greaterthan_equals',
                        'data' => $date->getValues(),
                        ),
                    ),
                );
        }
        return I2CE_FormStorage::search( 'provider_instance', false, $where_data, array( $date_field ), $count );
    }

    /**
     * Return a list of participants for the main object
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
                            'value' => $this->mainObj->getNameId()
                            )
                        ),
                    1 => array(
                        'operator' => 'FIELD_LIMIT',
                        'field' => 'attending',
                        'style' => 'equals',
                        'data' => array(
                            'value' => 1,
                            )
                        )
                    )
                );
        return I2CE_FormStorage::search( 'person_instance', false, $where_data );
    }

    /**
     * Check to see if the main object of this page has a given child form and optionally populate it
     * if not already populated.
     * @param string $form The child form
     * @param boolean $populate
     * @return boolean
     */
    public function hasChildForm( $form, $populate=false ) {
        if ( $populate ) {
            $this->mainObj->populateChildren($form);
        }
        return ( array_key_exists( $form, $this->mainObj->children )
                && is_array( $this->mainObj->children[$form] )
                && count( $this->mainObj->children[$form] ) > 0 );
    }

    /**
     * Add child forms to the page
     * @param string $form The child form to add
     * @param string $set_on_node The node to set the child object to
     * @param string $template The template file to use
     * @param string $tag The root tag in the template
     * @param mixed $append_node The node id or DOMNode to append the template to
     * @return boolean
     */
    public function addChildForms( $form, $set_on_node=null, $template=false, $tag='div', $append_node=null ) {
        $this->mainObj->populateChildren($form);
        return $this->appendChildTemplate( $form, $set_on_node, $template, $tag, $append_node );
    }

    /**
     * Add last child form to the page
     * @param string $form The child form to add
     * @param string $field The field to sort by for determining the last child
     * @param string $set_on_node The node to set the child object to
     * @param string $template The template file to use
     * @param string $tag The root tag in the template
     * @param mixed $append_node The node id or DOMNode to append the template to
     * @return boolean
     */
    public function addLastChildForm( $form, $field, $set_on_node=null, $template=false, $tag='div', $append_node=null ) {
        $this->mainObj->populateLast( array( $form => $field ) );
        return $this->appendChildTemplate( $form, $set_on_node, $template, $tag, $append_node );
    }

    /**
     * Add child template to page.
     * @param string $form The child form to add
     * @param string $set_on_node The node to set the child object to
     * @param string $template The template file to use
     * @param string $tag The root tag in the template
     * @param mixed $append_node The node id or DOMNode to append the template to
     * @return boolean
     */
    public function appendChildTemplate( $form, $set_on_node=null, $template=false, $tag='div', $append_node=null ) {
        if ( !array_key_exists( $form, $this->mainObj->children ) || !is_array( $this->mainObj->children[$form] ) ) {
            return true;
        }
        if ( !is_string($template)) {
            $template = 'view_pr_' . $form . '.html';
        }
        if ( $append_node === null ) {
            $append_node = $form;
        }
        if ( is_string($append_node) ) {
            $append_node = $this->template->getElementById($append_node);
        }
        if ( !$append_node instanceof DOMNode ) {
            I2CE::raiseError("Do not know where to add child form $form");
            return false;
        }
        foreach( $this->mainObj->children[$form] as $child ) {
            $node = $this->template->appendFileByNode($template, $tag, $append_node );
            if ( !$node instanceof DOMNode ) {
                I2CE::raiseError("Could not find template $template for child form $form.");
                return false;
            }
            $this->template->setForm( $child, $node );
            if ( $set_on_node !== null ) {
                $this->template->setForm( $child, $set_on_node );
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
