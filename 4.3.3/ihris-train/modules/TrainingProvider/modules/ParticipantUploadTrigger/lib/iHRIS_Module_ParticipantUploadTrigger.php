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
* @package ihris-train
* @author Luke Duncan <lduncan@intrahealth.org>
* @version v4.2
* @since v4.2
* @filesource
*/
/**
* Class iHRIS_Module_ParticipantUploadTrigger
*
* @access public
*/


class iHRIS_Module_ParticipantUploadTrigger extends I2CE_Module {

   
    /**
     * Return the array of hooks available in this module.
     * @return array
     */
    public static function getHooks() {
        return array(
                'post_save_csv_upload_I2CE_page_uploadparticipants' => 'trigger_upload_save',
                );
    }

    /**
     * Sends any triggers when participants are uploaded
     * @param I2CE_PageFormCSV $page
     */
    public function trigger_upload_save( $page ) {
        if ( !$page instanceof I2CE_PageFormCSV ) {
            return;
        }
        $module_factory = I2CE_ModuleFactory::instance();
        if ( $module_factory->isEnabled("UserTriggers") ) {
            $triggers = $module_factory->getClass("UserTriggers");
            $instance = $page->getProviderInstance();
            $details = I2CE_List::lookup( $instance->getId(), $instance->getName() );
            $triggers->trigger( 'participant_upload_save', null, 'Participants were uploaded for ' . $details, true, $instance->getNameId() );
        } else {
            I2CE::raiseError( "Unable to call trigger because UserTriggers isn't enabled!" );
        }
     }

}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
