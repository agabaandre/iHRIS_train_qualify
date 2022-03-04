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
 * Manage adding or editing forms associated with a training to the database.
 * 
 * @package iHRIS
 * @subpackage Train
 * @access public
 * @author Luke Duncan <lduncan@intrahealth.org>
 * @copyright Copyright &copy; 2013 IntraHealth International, Inc. 
 * @since v4.1.5
 * @version v4.1.5
 */

/**
 * Page object to handle the adding or editing forms associated with a training to the database.
 * 
 * @package iHRIS
 * @subpackage Train
 * @access public
 */
class iHRIS_PageFormPersonExam extends I2CE_PageForm {
        
    /**
     * @var integer The record id number of the object being edited.
     */
    protected $id;
    /**
     * @var integer The recored if number of the parent of the object being edited
     */
    protected $parent_id;
        
    /**
     * Create a new instance of a page.
     * 
     * The default constructor should be called by any pages extending this object.  It creates the
     * {@link I2CE_Template} and {@link I2CE_User} objects and sets up the basic member variables.
     * @param array $args
     * @param array $request_remainder The remainder of the request path
     */
    public  function __construct( $args, $request_remainder) {
        parent::__construct( $args, $request_remainder );
        $this->id = 0;
        if ( $this->isPost() && $this->post_exists( 'id' ) ) {
            $this->id = $this->post('id');
        } elseif ( $this->get_exists( 'id' ) ) {
            $this->id = $this->get('id');
        }
        if ( $this->id > 0 && array_key_exists( 'edit_access', $args ) && is_array( $args['edit_access'] ) ) {
            $this->setAccess( $args['edit_access'] );
        }
        if ( $this->get_exists( 'parent' ) ) {
            $this->parent_id = $this->get('parent');
        }
    }
        
    /**
     * Display the save or confirm buttons as needed.
     * 
     * If the page is a confirmation view then the save / edit button template will be displayed.  Otherwise the confirm
     * and return buttons will be shown.
     * @param boolean $save Flag to show the save button.
     * @param boolean $show_edit (defaults to true)
     */
    protected function displayControls( $save = false, $show_edit = true ) {
        if ( $save ) {
            if ( $show_edit )
                $this->template->addFile( "button_save.html" );
            else
                $this->template->addFile( "button_save_only.html" );
        } else {
            $this->template->addFile( "button_confirm_person_exam.html" );     
        }
    }
                
    /**
     * Create and load data for the objects used for this form.
     */
    protected function loadObjects() {
        if ( $this->factory->exists( 'person_exam' ) ) {
            if ( $this->id ) {
                $this->setObject( $this->factory->createContainer( $this->id ) );
            } else {
                $this->setObject( $this->factory->createContainer( 'person_exam' ) );
            }
            if ( $this->isPost() ) {
                $this->getPrimary()->load( $this->post );
                $this->parent_id = $this->getPrimary()->getParent();
            }
        }
        if ( $this->parent_id != '' ) {
            $parent = $this->factory->createContainer( $this->parent_id );
            $parent->populate();
            $this->setObject( $parent, I2CE_PageForm::EDIT_PARENT );
        }
        parent::loadObjects();
    }

    /**
     * Set the I2CE_Form object in the page template.
     */
    protected function setForm() {
        parent::setForm();
        $person = $this->factory->createContainer( $this->getParent()->getParent() );
        $person->populate();
        $this->template->setForm( $person, 'siteContent' );
        $provider_instance = $this->factory->createContainer( $this->getParent()->getField('provider_instance')->getDBValue() );
        $provider_instance->populate();
        $this->template->setForm( $provider_instance, 'siteContent' );
    }
        
    /**
     * Set the data to be displayed for the page.
     */
    protected function setDisplayData() {
        parent::setDisplayData();
    }

    /**
     * Save the objects to the database.
     * 
     * Save the default object being edited and return to the view page.  If the action needs to be 
     * logged then the {@link log} method is also called.  Any pages overriding this default save method
     * will need to include any logging necessary.
     */
    protected function save() {
        parent::save();
        $this->setRedirect( "view?id=" . $this->getParent()->getParent() );
    }
                
}


# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
