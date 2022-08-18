<?php namespace FHIR_STU_THREE\FHIRResource\FHIRCodeSystem;

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
 * A code system resource specifies a set of codes drawn from one or more code systems.
 */
class FHIRCodeSystemDesignation extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * The language this designation is defined for.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCode
     */
    public $language = null;

    /**
     * A code that details how this designation would be used.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $use = null;

    /**
     * The text value for this designation.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $value = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'CodeSystem.Designation';

    /**
     * The language this designation is defined for.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCode
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * The language this designation is defined for.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCode $language
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * A code that details how this designation would be used.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getUse()
    {
        return $this->use;
    }

    /**
     * A code that details how this designation would be used.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $use
     * @return $this
     */
    public function setUse($use)
    {
        $this->use = $use;
        return $this;
    }

    /**
     * The text value for this designation.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * The text value for this designation.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;
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
        return (string)$this->getValue();
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $json = parent::jsonSerialize();
        if (null !== $this->language) $json['language'] = $this->language->jsonSerialize();
        if (null !== $this->use) $json['use'] = $this->use->jsonSerialize();
        if (null !== $this->value) $json['value'] = $this->value->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<CodeSystemDesignation xmlns="http://hl7.org/fhir"></CodeSystemDesignation>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->language) $this->language->xmlSerialize(true, $sxe->addChild('language'));
        if (null !== $this->use) $this->use->xmlSerialize(true, $sxe->addChild('use'));
        if (null !== $this->value) $this->value->xmlSerialize(true, $sxe->addChild('value'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}