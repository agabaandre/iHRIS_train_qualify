<?php
/**
* © Copyright 2012 IntraHealth International, Inc.
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
* @package Botswana
* @subpackage 
* @author Carl Leitner <litlfred@ibiblio.org>
* @version v4.1.4.1
* @since v4.1.4.1
* @filesource 
*/ 
/** 
* Class Botswana_Modules_Training
* 
* @access public
*/


class iHRIS_Module_Training_Transcripts  extends I2CE_Module {
	
    public static function getMethods() {
      return array(
       'iHRIS_PageViewTrainingProvider->action_provider_instance' => array('priority'=>300,'method'=>'action_provider_instance'),
                   );
    }

    public function action_provider_instance($page) {
        if (!$page instanceof iHRIS_PageView) {
            return false;
        }
    }
    
}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
