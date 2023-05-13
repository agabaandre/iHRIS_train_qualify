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
 * Edit participants action for a training
 * @package iHRIS
 * @subpackage Common
 * @access public
 * @author  Carl Leitner <litlfred@ibiblio.org> 
 * @copyright Copyright &copy; 2012 IntraHealth International, Inc. 
 * @since v4.1.3
 * @version v4.1.3
 */

/**
 * The action page class for editing particpants for a training
 * @package iHRIS
 * @subpackage Train
 * @access public
 */
class iHRIS_PageActionStudentTranscripts extends I2CE_PageGenerateRelationshipTemplate {

    protected $person_id = array();   
      
    protected function loadPrimary() {
    	
    if($this->request_exists('id')){
      $provider_instance_id = substr( $this->request('id'),strpos($this->request('id'), '|')+1 );
      $provider_training_id = I2CE_FormStorage::lookupField('provider_instance',$provider_instance_id,array('providertraining'));
      $training_id = I2CE_FormStorage::lookupField('providertraining',$provider_training_id,array('training'));
      I2CE::raiseError($provider_instance_id);
      I2CE::raiseError($provider_training_id);
      I2CE::raiseError($training_id);
      I2CE::raiseError($this->request('id'));
      if($training_id){
        $where = array( 
            'operator'=>'FIELD_LIMIT',
            'field'=>'provider_instance',
            'style'=>'equals',
            'data'=>array(
              'value'=>$this->request('id')
              )
            );
      }
      $error_msg="Failed to print";
      $redirection="view_list?mapped=&type=training&id=".$this->request("id");
      /*else{
      $error_msg="Failed to print";
      $redirection="view_list?mapped=&type=training&id=".$this->request("id");
    	$where=array("operator"=>"AND","operand"=>array(
    					0=>array(
    								"operator"=>"FIELD_LIMIT",
    								"field"=>"training",
    								"style"=>"equals",
    								"data"=>array("value"=>$this->request("id"))
    								)
    					 )
            );
    					 
    	//$persons=I2CE_FormStorage::listFields("person_scheduled_training_course",array("parent"),true,$where);
    	}*/
      $persons=I2CE_FormStorage::listFields("person_instance",array("parent"),false,$where);
      foreach ($persons as $person_id)
      $this->person_id[] = $person_id["parent"];    	
    	$stc_id=$this->request("id");  	
    }
    	
    	if(count($this->person_id)==0){
        $this->userMessage($error_msg);
        $this->setRedirect($redirection);
        return false;
    	}
    	else{
        $formFactory = I2CE_FormFactory::instance();
        if  (! ($this->primObj = $formFactory->createContainer($stc_id)) instanceof I2CE_Form
             || $this->formRelationship->getPrimaryForm() != $this->primObj->getName()
            ) {
            I2CE::raiseError("invalid form id :" . print_r($this->request(),true) . "\ndoes not match " . $this->formRelationship->getPrimaryForm());
            return false;
        }
        $this->primObj->populate();
       }              
    }
        


    /**
     *Loads in the requeted data from the relationship
     * @returns boolean  True on success
     */
    protected function loadData($as_iterator = true) {
    	if(count($this->person_id)>0){
            $p_where = array(
                'operator'=>'FIELD_LIMIT',
                'field'=>'parent',
                'style'=>'in',
                'data'=>array(
                    'value'=>$this->person_id
                    )
                );
            $this->formRelationship->setAdditionalLimit('person_instance',$p_where);
      return parent::loadData($as_iterator);
      }
    }

    protected function getODTTemplate() {
    if( count($this->person_id)>0 ){
        //first we see if we have a certificate uploaded to the training course itself
        $have_certificate =false;
        $providertrainingObj = $this->primObj->getField('providertraining')->getMappedFormObject();
        $providertrainingObj->populate();
        $trainingObj->getField('training')->getMappedFormObject();
        if (($trainingObj = $tcField->getMappedFormObject()) instanceof iHRIS_Training) {
            $trainingObj->populate();
            if ( ($docField = $trainingObj->getField('transcript')) instanceof I2CE_FormField_DOCUMENT
                 && $docField->isValid()
                 && ($content = $docField->getValue())
                 && ($name = $docField->getFileName())) {
                $pos = strrpos($name,'.');
                $ext ='';
                if ($pos !== false) {
                    $ext = substr($name,$pos);
                    $name = substr($name, 0,$pos);
                }
                $this->template_file = tempnam(sys_get_temp_dir(), basename($name .'_' ))  . $ext;
                I2CE::raiseError($this->template_file);
                file_put_contents($this->template_file,$content);                           
                return true;
            }
        }
        return parent::getODTTemplate();
      }
    }
}

# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
