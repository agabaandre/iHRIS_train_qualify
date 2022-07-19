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
 * Manage adding or editing a person to the database.
 * 
 * @package iHRIS
 * @subpackage Train
 * @access public
 * @author Luke Duncan <lduncan@intrahealth.org>
 * @copyright Copyright &copy; 2007, 2008 IntraHealth International, Inc. 
 * @since v2.0.0
 * @version v2.0.0
 */

/**
 * Page object to handle the adding or editing people to the database.
 * 
 * @package iHRIS
 * @subpackage Train
 * @access public
 */
class iHRIS_PageFormPersonTrain extends  iHRIS_PageFormPerson {
        
                        
    /**
     * Set the active menu
     */
    protected function setActiveMenu() {
        if ( $this->getPrimary()->getId() != '0' ) { 
            $this->template->appendFileById( "menu_view_link.html", "li", "navBarUL", true );
        } else {
            $this->template->setAttribute( "class", "active", "menuManage", "a[@href='manage']" );
            $this->template->appendFileById( "menu_manage.html", "ul", "menuManage" );
            $this->template->setAttribute( "class", "active", "menuManage", "ul/li/a[@href='person']" );                            
        }   
        return parent::setActiveMenu();
    }

        
    /**
     * Display the save or confirm button templates as needed.
     * @param boolean $save Flag to show the save button.
     * @param boolean $show_edit (defaults to true)
     */
    protected function displayControls( $save = false, $show_edit = true ) {
        if ( $save ) {
            $this->template->addFile( "button_save.html" );
        } elseif ( $this->getPrimary()->getId() != '0' ) {
            $this->template->addFile( "button_confirm_notchild.html" );     
        } else {
            $node = $this->template->addFile( "button_confirm.html" );    
            $return = $this->template->getElementById("button_return",$node);
            if ($return instanceof DOMElement) {
                $return->setAttribute("href","manage");
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
