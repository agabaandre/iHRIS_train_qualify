<?php namespace FHIR_STU_THREE\FHIRResource\FHIRMedication;

/*!
 * This class was generated with the PHPFHIR library (https://github.com/dcarbone/php-fhir) using
 * class definitions from HL7 FHIR (https://www.hl7.org/fhir/)
 * 
 * Class creation date: October 17th, 2016
 * 
 * PHPFHIR Copyright:
 * 
 * Copyright 2016 Daniel Carbone (daniel.p.carbone@gmail.com)
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *        http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 *
 * FHIR Copyright Notice:
 *
 *   Copyright (c) 2011+, HL7, Inc.
 *   All rights reserved.
 * 
 *   Redistribution and use in source and binary forms, with or without modification,
 *   are permitted provided that the following conditions are met:
 * 
 *    * Redistributions of source code must retain the above copyright notice, this
 *      list of conditions and the following disclaimer.
 *    * Redistributions in binary form must reproduce the above copyright notice,
 *      this list of conditions and the following disclaimer in the documentation
 *      and/or other materials provided with the distribution.
 *    * Neither the name of HL7 nor the names of its contributors may be used to
 *      endorse or promote products derived from this software without specific
 *      prior written permission.
 * 
 *   THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 *   ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 *   WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
 *   IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT,
 *   INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT
 *   NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
 *   PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY,
 *   WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 *   ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 *   POSSIBILITY OF SUCH DAMAGE.
 * 
 * 
 *   Generated on Thu, Aug 11, 2016 17:02+1000 for FHIR v1.6.0
 * 
 *   Note: the schemas & schematrons do not contain all of the rules about what makes resources
 *   valid. Implementers will still need to be familiar with the content of the specification and with
 *   any profiles that apply to the resources in order to make a conformant implementation.
 * 
 */

use FHIR_STU_THREE\FHIRElement\FHIRBackboneElement;
use FHIR_STU_THREE\JsonSerializable;

/**
 * This resource is primarily used for the identification and definition of a medication. It covers the ingredients and the packaging for a medication.
 */
class FHIRMedicationContent extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * Identifies one of the items in the package. (choose any one of item*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $itemCodeableConcept = null;

    /**
     * Identifies one of the items in the package. (choose any one of item*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $itemReference = null;

    /**
     * The amount of the product that is in the package.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRQuantity
     */
    public $amount = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'Medication.Content';

    /**
     * Identifies one of the items in the package. (choose any one of item*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getItemCodeableConcept()
    {
        return $this->itemCodeableConcept;
    }

    /**
     * Identifies one of the items in the package. (choose any one of item*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $itemCodeableConcept
     * @return $this
     */
    public function setItemCodeableConcept($itemCodeableConcept)
    {
        $this->itemCodeableConcept = $itemCodeableConcept;
        return $this;
    }

    /**
     * Identifies one of the items in the package. (choose any one of item*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getItemReference()
    {
        return $this->itemReference;
    }

    /**
     * Identifies one of the items in the package. (choose any one of item*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $itemReference
     * @return $this
     */
    public function setItemReference($itemReference)
    {
        $this->itemReference = $itemReference;
        return $this;
    }

    /**
     * The amount of the product that is in the package.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRQuantity
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * The amount of the product that is in the package.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRQuantity $amount
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return string
     */
    public function get_fhirElementName()
    {
        return $this->_fhirElementName;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->get_fhirElementName();
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $json = parent::jsonSerialize();
        if (null !== $this->itemCodeableConcept) $json['itemCodeableConcept'] = $this->itemCodeableConcept->jsonSerialize();
        if (null !== $this->itemReference) $json['itemReference'] = $this->itemReference->jsonSerialize();
        if (null !== $this->amount) $json['amount'] = $this->amount->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<MedicationContent xmlns="http://hl7.org/fhir"></MedicationContent>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->itemCodeableConcept) $this->itemCodeableConcept->xmlSerialize(true, $sxe->addChild('itemCodeableConcept'));
        if (null !== $this->itemReference) $this->itemReference->xmlSerialize(true, $sxe->addChild('itemReference'));
        if (null !== $this->amount) $this->amount->xmlSerialize(true, $sxe->addChild('amount'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}