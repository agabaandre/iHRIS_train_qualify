<?php
/**
 * @copyright © 2007, 2008, 2009 Intrahealth International, Inc.
 * This File is part of I2CE
 *
 * I2CE is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by
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
 * View the details for then given record that is an instance of a I2CE_List.
 * @package I2CE
 * @subpackage Common
 * @access public
 * @author Nobert Mijumbi <nmijumbi@intrahealth.org>
 * @since v2.0.0
 * @version v2.0.0
 */

/**
 * The page class for displaying a I2CE_List record.
 * @package I2CE
 * @subpackage Common
 * @access public
 */
 
use FHIR_STU_THREE\FHIRDomainResource\FHIRCodeSystem as FHIRCodeSystem;
use FHIR_STU_THREE\FHIRResource\FHIRCodeSystem\FHIRCodeSystemConcept as FHIRCodeSystemConcept;
use FHIR_STU_THREE\FHIRElement\FHIRCode as FHIRCode;
use FHIR_STU_THREE\FHIRElement\FHIRString as FHIRString;
use FHIR_STU_THREE\FHIRElement\FHIRId as FHIRId; 
use FHIR_STU_THREE\FHIRElement\FHIRUri as FHIRUri;
 
class I2CE_FHIR_CodeSystem {
    
    
    /* the main resource being processed
     * @var \FHIR_STU_THREE\FHIRResource
     */
    public $resource;
    /**
     * @var integer The record id number of the object being edited.
     */
    protected $id;
    /**
     * @var string The form list of the object being used.
     */
    protected $simplelist;
    
    
    public function __construct($form,$base_url) {
        parent::__construct($form, $base_url);
        if (is_null($base_url)){
        $base_url = I2CE::getAccessedBaseURL();
        }
        $this->id = 0;
        if (strlen($this->id) > 0 && strpos($this->id,'|') === false) {
            I2CE::raiseError("Deprecated use of id: {$this->id}");
            $this->id = $form->getName() . '|' . $this->id;
            
            $this->simplelist = $factory->createContainer( $this->id );
            if (!$this->simplelist instanceof I2CE_SimpleList) {
                I2CE::raiseError($form->getName() . " is not a simplelist ");
                return false;
            }
        }

    }
    
    /**
     * Get the resource indicated by the 
     * @param  \FHIR_DSTU_TWO\FHIRReference $reference
     * @param string $resource_type the type of the contained resource e.g. 'ValueSet'.  
     * @return \FHIR_STU_THREE\FHIRDomainResource\FHIRCodeSystem
     */
    public function getResource() {
        
            if ($resource instanceof FHIRCodeSystem
                && $resource->id instanceof FHIRId
                && $resource->url instanceof FHIRUri 
                && ($resource->id->value = $this->simplelist->name()) instanceof FHIRString
                && ($resource->url->value = $this->base_url) instanceof FHIRString
                ){
                return $resource;
            }
         throw new Exception("Not a STU3 CodeSystem resource");
    }
  

}


# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
