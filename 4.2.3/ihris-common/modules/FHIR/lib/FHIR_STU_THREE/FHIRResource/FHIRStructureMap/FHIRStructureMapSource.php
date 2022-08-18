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
class FHIRStructureMapSource extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * Whether this rule applies if the source isn't found.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public $required = null;

    /**
     * Type or variable this rule applies to.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRId
     */
    public $context = null;

    /**
     * How to interpret the context.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRStructureMapContextType
     */
    public $contextType = null;

    /**
     * Optional field for this source.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $element = null;

    /**
     * How to handle the list mode for this element.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRStructureMapListMode
     */
    public $listMode = null;

    /**
     * Named context for field, if a field is specified.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRId
     */
    public $variable = null;

    /**
     * FluentPath expression  - must be true or the rule does not apply.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $condition = null;

    /**
     * FluentPath expression  - must be true or the mapping engine throws an error instead of completing.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $check = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'StructureMap.Source';

    /**
     * Whether this rule applies if the source isn't found.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * Whether this rule applies if the source isn't found.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBoolean $required
     * @return $this
     */
    public function setRequired($required)
    {
        $this->required = $required;
        return $this;
    }

    /**
     * Type or variable this rule applies to.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRId
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Type or variable this rule applies to.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRId $context
     * @return $this
     */
    public function setContext($context)
    {
        $this->context = $context;
        return $this;
    }

    /**
     * How to interpret the context.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRStructureMapContextType
     */
    public function getContextType()
    {
        return $this->contextType;
    }

    /**
     * How to interpret the context.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRStructureMapContextType $contextType
     * @return $this
     */
    public function setContextType($contextType)
    {
        $this->contextType = $contextType;
        return $this;
    }

    /**
     * Optional field for this source.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getElement()
    {
        return $this->element;
    }

    /**
     * Optional field for this source.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $element
     * @return $this
     */
    public function setElement($element)
    {
        $this->element = $element;
        return $this;
    }

    /**
     * How to handle the list mode for this element.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRStructureMapListMode
     */
    public function getListMode()
    {
        return $this->listMode;
    }

    /**
     * How to handle the list mode for this element.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRStructureMapListMode $listMode
     * @return $this
     */
    public function setListMode($listMode)
    {
        $this->listMode = $listMode;
        return $this;
    }

    /**
     * Named context for field, if a field is specified.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRId
     */
    public function getVariable()
    {
        return $this->variable;
    }

    /**
     * Named context for field, if a field is specified.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRId $variable
     * @return $this
     */
    public function setVariable($variable)
    {
        $this->variable = $variable;
        return $this;
    }

    /**
     * FluentPath expression  - must be true or the rule does not apply.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * FluentPath expression  - must be true or the rule does not apply.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $condition
     * @return $this
     */
    public function setCondition($condition)
    {
        $this->condition = $condition;
        return $this;
    }

    /**
     * FluentPath expression  - must be true or the mapping engine throws an error instead of completing.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getCheck()
    {
        return $this->check;
    }

    /**
     * FluentPath expression  - must be true or the mapping engine throws an error instead of completing.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $check
     * @return $this
     */
    public function setCheck($check)
    {
        $this->check = $check;
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
        if (null !== $this->required) $json['required'] = $this->required->jsonSerialize();
        if (null !== $this->context) $json['context'] = $this->context->jsonSerialize();
        if (null !== $this->contextType) $json['contextType'] = $this->contextType->jsonSerialize();
        if (null !== $this->element) $json['element'] = $this->element->jsonSerialize();
        if (null !== $this->listMode) $json['listMode'] = $this->listMode->jsonSerialize();
        if (null !== $this->variable) $json['variable'] = $this->variable->jsonSerialize();
        if (null !== $this->condition) $json['condition'] = $this->condition->jsonSerialize();
        if (null !== $this->check) $json['check'] = $this->check->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<StructureMapSource xmlns="http://hl7.org/fhir"></StructureMapSource>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->required) $this->required->xmlSerialize(true, $sxe->addChild('required'));
        if (null !== $this->context) $this->context->xmlSerialize(true, $sxe->addChild('context'));
        if (null !== $this->contextType) $this->contextType->xmlSerialize(true, $sxe->addChild('contextType'));
        if (null !== $this->element) $this->element->xmlSerialize(true, $sxe->addChild('element'));
        if (null !== $this->listMode) $this->listMode->xmlSerialize(true, $sxe->addChild('listMode'));
        if (null !== $this->variable) $this->variable->xmlSerialize(true, $sxe->addChild('variable'));
        if (null !== $this->condition) $this->condition->xmlSerialize(true, $sxe->addChild('condition'));
        if (null !== $this->check) $this->check->xmlSerialize(true, $sxe->addChild('check'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}