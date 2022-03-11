<?php
/*
 * © Copyright 2012 IntraHealth International, Inc.
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
 * Manage adding or editing forms associated with a provider instance to the database.
 * 
 * @package iHRIS
 * @subpackage Train
 * @access public
 * @author Luke Duncan <lduncan@intrahealth.org>
 * @copyright Copyright &copy; 2012 IntraHealth International, Inc. 
 * @since v4.1.3
 * @version v4.1.3
 */

/**
 * Page object to handle the adding or editing a provider instance to the database.
 * 
 * @package iHRIS
 * @subpackage Train
 * @access public
 */
class iHRIS_PageFormProviderInstance extends iHRIS_PageFormParentTrainingProvider {
        
    /**
     * Create and load data for the objects used for this form.
     * 
     */
    protected function setDisplayData() {
        parent::setDisplayData();
        if ( $this->getPrimary() instanceof iHRIS_ProviderInstance && $this->getPrimary()->hasField('providertraining') ) {
            $provider_training = $this->getPrimary()->getField('providertraining')->getMappedFormObject();
            if ( $provider_training instanceof iHRIS_ProviderTraining && $provider_training->hasField('training') ) {
                $training = $provider_training->getField('training')->getMappedFormObject();
                if ( $training instanceof iHRIS_Training ) {
                    $this->template->setForm($training,'trainingprovider_form');
                } else {
                    I2CE::raiseError("Invalid training class.");
                }
            } else {
                I2CE::raiseError("Invalid providertraining class.");
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
