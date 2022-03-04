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
* @package iHRIS
* @author Ally Shaban <allyshaban5@gmail.com>
* @version v3.2.2
* @since v3.2.2
* @filesource 
*/ 
/** 

* 
* @access public
*/


class iHRIS_Module_TrainingProgram extends I2CE_Module {
    
    public static function getHooks() {
        return array(
'validate_form_training_program'=>'validate_form_training_program'
                );
    }
    
    public function validate_form_training_program($form) {
    	$ff = I2CE_FormFactory::instance();
    	$department=implode("|",$form->department);
    	$institution=implode("|",$form->training_institution);
    	if($department=="|" or $institution=="|") {
    		return;
    		}
    	$depObj=$ff->createContainer($department);
    	$depObj->populate();
    	$dep_inst=$depObj->getField("training_institution")->getDBValue();
    	if(strpos($dep_inst,$institution)===false) {
    		$instObj=$ff->createContainer($institution);
    		$instObj->populate();
    		$form->setInvalidMessage("department","This Department Does Not Belong To ".$instObj->getField("name")->getDBValue());
    		}
    	}
}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
