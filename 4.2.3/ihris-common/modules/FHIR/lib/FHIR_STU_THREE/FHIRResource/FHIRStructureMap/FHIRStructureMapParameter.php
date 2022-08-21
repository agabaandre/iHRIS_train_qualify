<?php namespace FHIR_STU_THREE\FHIRResource\FHIRStructureMap;

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
 * A Map of relationships between 2 structures that can be used to transform data.
 */
class FHIRStructureMapParameter extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * Parameter value - variable or literal. (choose any one of value*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRId
     */
    public $valueId = null;

    /**
     * Parameter value - variable or literal. (choose any one of value*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $valueString = null;

    /**
     * Parameter value - variable or literal. (choose any one of value*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public $valueBoolean = null;

    /**
     * Parameter value - variable or literal. (choose any one of value*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public $valueInteger = null;

    /**
     * Parameter value - variable or literal. (choose any one of value*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDecimal
     */
    public $valueDecimal = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'StructureMap.Parameter';

    /**
     * Parameter value - variable or literal. (choose any one of value*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRId
     */
    public function getValueId()
    {
        return $this->valueId;
    }

    /**
     * Parameter value - variable or literal. (choose any one of value*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRId $valueId
     * @return $this
     */
    public function setValueId($valueId)
    {
        $this->valueId = $valueId;
        return $this;
    }

    /**
     * Parameter value - variable or literal. (choose any one of value*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getValueString()
    {
        return $this->valueString;
    }

    /**
     * Parameter value - variable or literal. (choose any one of value*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $valueString
     * @return $this
     */
    public function setValueString($valueString)
    {
        $this->valueString = $valueString;
        return $this;
    }

    /**
     * Parameter value - variable or literal. (choose any one of value*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public function getValueBoolean()
    {
        return $this->valueBoolean;
    }

    /**
     * Parameter value - variable or literal. (choose any one of value*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBoolean $valueBoolean
     * @return $this
     */
    public function setValueBoolean($valueBoolean)
    {
        $this->valueBoolean = $valueBoolean;
        return $this;
    }

    /**
     * Parameter value - variable or literal. (choose any one of value*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public function getValueInteger()
    {
        return $this->valueInteger;
    }

    /**
     * Parameter value - variable or literal. (choose any one of value*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRInteger $valueInteger
     * @return $this
     */
    public function setValueInteger($valueInteger)
    {
        $this->valueInteger = $valueInteger;
        return $this;
    }

    /**
     * Parameter value - variable or literal. (choose any one of value*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDecimal
     */
    public function getValueDecimal()
    {
        return $this->valueDecimal;
    }

    /**
     * Parameter value - variable or literal. (choose any one of value*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDecimal $valueDecimal
     * @return $this
     */
    public function setValueDecimal($valueDecimal)
    {
        $this->valueDecimal = $valueDecimal;
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
        if (null !== $this->valueId) $json['valueId'] = $this->valueId->jsonSerialize();
        if (null !== $this->valueString) $json['valueString'] = $this->valueString->jsonSerialize();
        if (null !== $this->valueBoolean) $json['valueBoolean'] = $this->valueBoolean->jsonSerialize();
        if (null !== $this->valueInteger) $json['valueInteger'] = $this->valueInteger->jsonSerialize();
        if (null !== $this->valueDecimal) $json['valueDecimal'] = $this->valueDecimal->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<StructureMapParameter xmlns="http://hl7.org/fhir"></StructureMapParameter>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->valueId) $this->valueId->xmlSerialize(true, $sxe->addChild('valueId'));
        if (null !== $this->valueString) $this->valueString->xmlSerialize(true, $sxe->addChild('valueString'));
        if (null !== $this->valueBoolean) $this->valueBoolean->xmlSerialize(true, $sxe->addChild('valueBoolean'));
        if (null !== $this->valueInteger) $this->valueInteger->xmlSerialize(true, $sxe->addChild('valueInteger'));
        if (null !== $this->valueDecimal) $this->valueDecimal->xmlSerialize(true, $sxe->addChild('valueDecimal'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}