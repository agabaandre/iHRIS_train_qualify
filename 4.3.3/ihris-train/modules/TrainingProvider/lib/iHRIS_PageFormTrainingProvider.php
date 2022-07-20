<?php
/**
* © Copyright 2007 IntraHealth International, Inc.
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
*/
/**
*  iHRIS_PageFormTrainingProvider
* @package I2CE
* @subpackage Core
* @author Carl Leitner <litlfred@ibiblio.org>
* @copyright Copyright &copy; 2007 IntraHealth International, Inc. 
* This file is part of I2CE. I2CE is free software; you can redistribute it and/or modify it under 
* the terms of the GNU General Public License as published by the Free Software Foundation; either 
* version 3 of the License, or (at your option) any later version. I2CE is distributed in the hope 
* that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY 
* or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details. You should have 
* received a copy of the GNU General Public License along with this program. If not, see <http://www.gnu.org/licenses/>.
* @version 2.1
* @access public
*/


class iHRIS_PageFormTrainingProvider extends I2CE_PageForm{


    /**
     * Set the active menu
     * @return boolean
     */
    protected function setActiveMenu() {
        if ( $this->getPrimary()->getId() != '0' ) {
        } else {
            $this->template->setAttribute( "class", "active", "menu_trainingprovider", "a[@href='manage?action=provider']" );
            $this->template->appendFileById( "menu_manage_provider.html", "ul", "menu_trainingprovider" );
            $this->template->setAttribute( "class", "active", "menu_trainingprovider", "ul/li/a[@href='trainingprovider']" );
        }
        return parent::setActiveMenu();
    }

    /**
     * Create and load data for the objects used for this form.
     * 
     * Create the list object and if this is a form submission load
     * the data from the form data.
     */
    protected function loadObjects() {
        $factory = I2CE_FormFactory::instance();
        if ($this->isPost()) {
            $trainingprovider = $factory->createContainer('trainingprovider');
            if (!$trainingprovider instanceof iHRIS_TrainingProvider) {
                I2CE::raiseError("Could not create trainingprovider form");
                return;
            }
            $trainingprovider->load($this->post);
            $name_ignore = $trainingprovider->getField('name_ignore');
            $ignore_path = array('forms','trainingprovider',$trainingprovider->getID(),'ignore','name');
            if ($name_ignore instanceof I2CE_FormField && $this->post_exists($ignore_path)) {
                $name_ignore->setFromPost($this->post($ignore_path));
            }
        } else {
            if ($this->get_exists('id')) {
                $id = $this->get('id');
                if (strpos($id,'|')=== false) {
                    I2CE::raiseError("Depcreated use of id variable");
                    $id = 'trainingprovider|' . $id;
                }
            } else {
                $id = 'trainingprovider|0';
            }
            $trainingprovider = $factory->createContainer($id);
            if (!$trainingprovider instanceof iHRIS_TrainingProvider) {
                I2CE::raiseError("Could not create valid trainingprovider form from id:$id");
                return;
            }
            $trainingprovider->populate();
        }
        $this->setObject( $trainingprovider);
    }

    /**
     * Save the objects to the database.
     * 
     * Save the default object being edited and return to the view page.
     * @global array
     */
    protected function save() {
        parent::save();
        $this->setRedirect(  "viewprovider?id=" . $this->getPrimary()->getNameId() );
    }

    /** 
     * Display the save or confirm buttons as needed.
     * 
     * If the page is a confirmation view then the save / edit button template will be displayed.  
     * Otherwise the confirm and return buttons will be shown.
     * @param boolean $save Flag to show the save button. (Defaults to false)
     * @param boolean $show_edit (defaults to true)
     * @global array
     */
    protected  function displayControls( $save = false, $show_edit = true ) {
        if ( $save ) {
            parent::displayControls( $save, $show_edit );
        } elseif ( $this->getPrimary()->getId() != '0' ) {
            $this->template->addFile( 'button_provider_confirm_notchild.html' );
        }  else {       
            $node = $this->template->addFile( 'button_provider_confirm_notchild.html' );
            $return = $this->template->getElementById( "button_return", $node );
            if ( $return instanceof DOMElement ) {
                $return->setAttribute("href","manage?action=provider");
                $return->setAttribute("no_value","true");
            }
        }               
    }               


}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
