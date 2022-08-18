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
class FHIRStructureMapTarget extends FHIRBackboneElement implements JsonSerializable
{
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
     * Field to create in the context.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $element = null;

    /**
     * Named context for field, if desired, and a field is specified.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRId
     */
    public $variable = null;

    /**
     * If field is a list, how to manage the list.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRStructureMapListMode[]
     */
    public $listMode = array();

    /**
     * Internal rule reference for shared list items.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRId
     */
    public $listRuleId = null;

    /**
     * How the data is copied / created.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRStructureMapTransform
     */
    public $transform = null;

    /**
     * Parameters to the transform.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRStructureMap\FHIRStructureMapParameter[]
     */
    public $parameter = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'StructureMap.Target';

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
     * Field to create in the context.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getElement()
    {
        return $this->element;
    }

    /**
     * Field to create in the context.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $element
     * @return $this
     */
    public function setElement($element)
    {
        $this->element = $element;
        return $this;
    }

    /**
     * Named context for field, if desired, and a field is specified.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRId
     */
    public function getVariable()
    {
        return $this->variable;
    }

    /**
     * Named context for field, if desired, and a field is specified.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRId $variable
     * @return $this
     */
    public function setVariable($variable)
    {
        $this->variable = $variable;
        return $this;
    }

    /**
     * If field is a list, how to manage the list.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRStructureMapListMode[]
     */
    public function getListMode()
    {
        return $this->listMode;
    }

    /**
     * If field is a list, how to manage the list.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRStructureMapListMode[] $listMode
     * @return $this
     */
    public function addListMode($listMode)
    {
        $this->listMode[] = $listMode;
        return $this;
    }

    /**
     * Internal rule reference for shared list items.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRId
     */
    public function getListRuleId()
    {
        return $this->listRuleId;
    }

    /**
     * Internal rule reference for shared list items.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRId $listRuleId
     * @return $this
     */
    public function setListRuleId($listRuleId)
    {
        $this->listRuleId = $listRuleId;
        return $this;
    }

    /**
     * How the data is copied / created.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRStructureMapTransform
     */
    public function getTransform()
    {
        return $this->transform;
    }

    /**
     * How the data is copied / created.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRStructureMapTransform $transform
     * @return $this
     */
    public function setTransform($transform)
    {
        $this->transform = $transform;
        return $this;
    }

    /**
     * Parameters to the transform.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRStructureMap\FHIRStructureMapParameter[]
     */
    public function getParameter()
    {
        return $this->parameter;
    }

    /**
     * Parameters to the transform.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRStructureMap\FHIRStructureMapParameter[] $parameter
     * @return $this
     */
    public function addParameter($parameter)
    {
        $this->parameter[] = $parameter;
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
        if (null !== $this->context) $json['context'] = $this->context->jsonSerialize();
        if (null !== $this->contextType) $json['contextType'] = $this->contextType->jsonSerialize();
        if (null !== $this->element) $json['element'] = $this->element->jsonSerialize();
        if (null !== $this->variable) $json['variable'] = $this->variable->jsonSerialize();
        if (0 < count($this->listMode)) {
            $json['listMode'] = array();
            foreach($this->listMode as $listMode) {
                $json['listMode'][] = $listMode->jsonSerialize();
            }
        }
        if (null !== $this->listRuleId) $json['listRuleId'] = $this->listRuleId->jsonSerialize();
        if (null !== $this->transform) $json['transform'] = $this->transform->jsonSerialize();
        if (0 < count($this->parameter)) {
            $json['parameter'] = array();
            foreach($this->parameter as $parameter) {
                $json['parameter'][] = $parameter->jsonSerialize();
            }
        }
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<StructureMapTarget xmlns="http://hl7.org/fhir"></StructureMapTarget>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->context) $this->context->xmlSerialize(true, $sxe->addChild('context'));
        if (null !== $this->contextType) $this->contextType->xmlSerialize(true, $sxe->addChild('contextType'));
        if (null !== $this->element) $this->element->xmlSerialize(true, $sxe->addChild('element'));
        if (null !== $this->variable) $this->variable->xmlSerialize(true, $sxe->addChild('variable'));
        if (0 < count($this->listMode)) {
            foreach($this->listMode as $listMode) {
                $listMode->xmlSerialize(true, $sxe->addChild('listMode'));
            }
        }
        if (null !== $this->listRuleId) $this->listRuleId->xmlSerialize(true, $sxe->addChild('listRuleId'));
        if (null !== $this->transform) $this->transform->xmlSerialize(true, $sxe->addChild('transform'));
        if (0 < count($this->parameter)) {
            foreach($this->parameter as $parameter) {
                $parameter->xmlSerialize(true, $sxe->addChild('parameter'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}