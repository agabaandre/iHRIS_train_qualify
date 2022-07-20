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
* @package ihris-common
* @author Carl Leitner <litlfred@ibiblio.org>
* @version v3.2
* @since v3.2
* @filesource
*/
/**
* Class iHRIS_Module_ProviderInstance
*
* @access public
*/


class iHRIS_Module_ProviderInstance extends I2CE_Module {

   
    /**
     * Return the array of hooks available in this module.
     * @return array
     */
    public static function getHooks() {
        return array(
                'validate_form_provider_instance' => 'validate_form_provider_instance',
                );
    }

    /**
     * Checks to make sure the end date is after the start date for the person position.
     * @param I2CE_Form $form
     */
    public function validate_form_provider_instance( $form ) {
        if ( $form->start_date->isValid() && $form->end_date->isValid() ) {
            if ( $form->start_date->compare( $form->end_date ) < 1 ) {
                $form->getField('end_date')->setInvalid( "The end date must be after the start date." );
            }
        }
     }

    public static function getMethods() {
        return array(
            'iHRIS_PageViewTrainingProvider->action_fee' => 'action_fee'
            );
    }


    public function action_fee($page) {
        if (!$page instanceof iHRIS_PageViewTrainingProvider) {
            return;
        }
        if ( !$page->getMainObject()->getName() == "provider_instance" ) {
            return;
        }
        return $page->addChildForms('fee');
    }
    

}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
