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
 * @package iHRIS
 * @subpackage Manage
 * @access public
 * @author Luke Duncan <lduncan@intrahealth.org>
 * @copyright Copyright &copy; 2007, 2008 IntraHealth International, Inc. 
 * @since v2.0.0
 * @version v2.0.0
 */

/**
 * The page class for displaying the manage people page.
 * @package iHRIS
 * @subpackage Manage
 * @access public
 */
class iHRIS_PageManage extends I2CE_Page {
        
    /**
     * Perform the main actions of the page.
     */
    protected function action() {
        parent::action();
        switch( $this->get('action') ) {
        case "provider" :
            $this->template->addFile( "manage_provider.html" );
            $this->template->setAttribute( "class", "active", "menu_trainingprovider", "a[@href='manage?action=provider']" );
            $this->template->appendFileById( "menu_manage_provider.html", "ul", "menu_trainingprovider" );
            break;
        default :
            $this->template->addFile( "manage_people.html" );
            $this->template->setAttribute( "class", "active", "menuManage", "a[@href='manage']" );
            $this->template->appendFileById( "menu_manage.html", "ul", "menuManage" );
            break;
        }
    }
        
}


# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
