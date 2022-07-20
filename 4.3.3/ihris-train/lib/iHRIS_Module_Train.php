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
*  iHRIS_Module_Qualify
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


class iHRIS_Module_Train extends I2CE_Module {


    /**
     * Return any fuzzy methds that this module implements
     * @return array
     */
    public static function getMethods() {
        return array(
                'iHRIS_PageView->action_education' => 'action_education',
                'iHRIS_PageView->action_position' => 'action_position',
                );
    }


    /**
     * Handle adding the education form to the person page view page.
     * @param iHRIS_PageView $page
     * @return boolean
     */
    public function action_education( $page ) {
        if ( !$page instanceof iHRIS_PageView ) {
            return false;
        }
        return $page->addChildForms( 'education', 'siteContent' );
    }

     /**
     * Handle adding the position form to the person page view page.
     * @param iHRIS_PageView $page
     * @return boolean
     */
    public function action_position( $page ) {
        if ( !$page instanceof iHRIS_PageView ) {
            return false;
        }
        return $page->addChildForms( 'position' , 'siteContent');
    }
}


# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
