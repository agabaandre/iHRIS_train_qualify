<?php
/**
* © Copyright 2009 IntraHealth International, Inc.
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
*
* @package iHRIS
* @subpackage Train
* @author Luke Duncan <lduncan@intrahealth.org>
* @version v4.1.6
* @since v4.1.6
* @filesource
*/
/**
* Class iHRIS_Module_TrainPosition
*
* @access public
*/


class iHRIS_Module_TrainPosition extends I2CE_Module {

    
    public static function getMethods() {
        return array(
            'iHRIS_PageView->action_position' => 'action_position'
            );
    }


    public function action_position($obj) {
        if (!$obj instanceof iHRIS_PageView) {
            return;
        }
        return $obj->addLastChildForm('position', 'start_date');
    }
    

}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
