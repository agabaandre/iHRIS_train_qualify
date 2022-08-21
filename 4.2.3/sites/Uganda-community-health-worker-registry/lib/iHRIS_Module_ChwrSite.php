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
* Class iHRIS_Module_PersonDemographic
*
* @access public
*/


class iHRIS_Module_ChwrSite extends I2CE_Module {

     
     public function post_update( $old_vers, $new_vers ) {
        if ( I2CE_Validate::checkVersion( $old_vers, '<', '4.3.0' ) ) {
            if ( !$this->update_uuids()) {
                return false;
            }
        }
        return true;
    }


    
    protected function update_uuids() {
        foreach (array('parish','village') as $form) {
            if (! (iHRIS_Module_CSDCache::add_uuids($form))) {
                return false;
            }
        }
        return true;
    }
    /**
     * Return the array of hooks available in this module.
     * @return array
     */
    public static function getHooks() {
        return array(
                'validate_form_person_field_national_id' => 'validate_form_person_field_national_id',
                'validate_form_person_field_mobile_phone' => 'validate_form_person_field_mobile_phone',
                'validate_form_person_field_alt_telephone' => 'validate_form_person_field_alt_telephone',
                'validate_form_person' => 'validate_form_person',
		'form_pre_save_parish' => 'form_pre_save',
            	'form_pre_save_village' => 'form_pre_save',
            	'form_post_save_parish' => 'form_post_save',
		'form_post_save_village' => 'form_post_save',
                );
    }
    
    /**
     * Perform extra validation for the person form fied ID.
     * A new person record needs to verify the ID is Standard
     * @param I2CE_Form $form
     */
    public function validate_form_person_field_national_id( $field ) {
           
        $regexp = "/^[A-NP-Z0-9]{14}$/";
        $val = $field->getValue();
        if (strlen($val)  > 0 && !preg_match($regexp, $val)) {
            $field->setInvalidMessage('Please enter NIN that is in All CAPs, has no Letter O and has 14 characters only');   
        }
    
    }
     /**
     * Perform extra validation for the person form fied mobile_phone.
     * A new person record needs to verify the Mobile Phone is Standard
     * @param I2CE_Form $form
     */
    public function validate_form_person_field_mobile_phone( $field ) {
        
        //Check if the number doesn't already start with the correct code and is a 10-digit Number:
        $pfx = "\+256";
        //$regexp = "/^[0-9]{10}+$/";
        $regexp = "/^[0]{1}[7]{1}[0,1,5,7-9]{1}[0-9]{7}$/";
        $val = $field->getValue();
        if (strlen($val)  > 0 ){
            if(!preg_match('/^'.$pfx.'/', $val)){
               if(preg_match($regexp, $val )  ){
                    //Strip out leading zeros:
                    $val = ltrim($val, '0');
                    $val = "+256".$val;
                    $field->setValue($val);   
                }else {
                    $field->setInvalidMessage('Please enter a valid 10-digit Phone Number that starts with 07');
	            } 
                
            }
            
        }
       } 
     /**
     * Perform extra validation for the person form fied alt_telephone.
     * A new person record needs to verify the alt_telephone is Standard
     * @param I2CE_Form $form
     */
    public function validate_form_person_field_alt_telephone( $field ) {
           
        $pfx = "\+256";
	    $regexp = "/^[0]{1}[7]{1}[0,1,5,7-9]{1}[0-9]{7}$/";
        $val = $field->getValue();
	 if (strlen($val)  > 0 ){
            if(!preg_match('/^'.$pfx.'/', $val)){
               if(preg_match($regexp, $val )  ){
                    //Strip out leading zeros:
                    $val = ltrim($val, '0');
                    $val = "+256".$val;
                    $field->setValue($val);   
                }else {
                    $field->setInvalidMessage('Please enter a valid 10-digit Phone Number that starts with 07');
	            } 
                
            }
            
        }

     }
    /**
     * Perform extra validation for the person form.
     * A new person record needs to verify there aren't any existing 
     * records with the same name.
     * @param I2CE_Form $form
     */
    public function validate_form_person( $form ) {
        
        $search = array();
        $surname_ignore = false;
        if ( isset( $form->surname_ignore ) ) {
            $surname_ignore = $form->surname_ignore;
        }
        if ( I2CE_ModuleFactory::instance()->isEnabled('forms-storage') 
             && $form->getId() == '0' && !$surname_ignore
             && I2CE_Validate::checkString( $form->surname ) 
             && I2CE_Validate::checkString( $form->firstname )
             && I2CE_Validate::checkString( $form->national_id ) ) {
            
            $where_data = array(
                        'operator'=>'FIELD_LIMIT',
                        'field'=>'national_id',
                        'style'=>'lowerequals',
                        'data'=>array('value'=>strtolower($form->national_id))
                        );
            $national_id_results = I2CE_FormStorage::listFields('person',array('national_id'),false,$where_data,array('national_id'));  
            if( count($national_id_results) > 0 ) {
                foreach ($results as $id=>&$data) {
                    $data = implode(', ', $data);
                }
                $form->setInvalidMessage('national_id','unique', array( "view?id=" => $results ));
            }
            
            $where = array(
                'operator' => 'AND',
                'operand'=>array(
                    0=>array(
                        'operator'=>'FIELD_LIMIT',
                        'field'=>'surname',
                        'style'=>'lowerequals',
                        'data'=>array('value'=>strtolower($form->surname))
                        ),
                    1=>array(
                        'operator'=>'FIELD_LIMIT',
                        'field'=>'firstname',
                        'style'=>'lowerequals',
                        'data'=>array('value'=>strtolower($form->firstname))
                        )
                    )
                );
            $results = I2CE_FormStorage::listFields('person',array('surname','firstname'),false,$where,array('surname','firstname'));
            if( count($results) > 0 ) {
                foreach ($results as $id=>&$data) {
                    $data = implode(', ', $data);
                }
                $form->setInvalidMessage('surname','unique', array( "view?id=" => $results ));
            }
        }
        
    }

    public function form_pre_save($data) {
        iHRIS_Module_CSDCache::form_pre_save($data);
    }
 
   public function form_post_save($data) {
        iHRIS_Module_CSDCache::form_post_save($data);
    }

}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
