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
class FHIRStructureMapRule extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * Name of the rule for internal references.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRId
     */
    public $name = null;

    /**
     * Source inputs to the mapping.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRStructureMap\FHIRStructureMapSource[]
     */
    public $source = array();

    /**
     * Content to create because of this mapping rule.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRStructureMap\FHIRStructureMapTarget[]
     */
    public $target = array();

    /**
     * Rules contained in this rule.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRStructureMap\FHIRStructureMapRule[]
     */
    public $rule = array();

    /**
     * Which other rules to apply in the context of this rule.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRStructureMap\FHIRStructureMapDependent[]
     */
    public $dependent = array();

    /**
     * Documentation for this instance of data.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $documentation = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'StructureMap.Rule';

    /**
     * Name of the rule for internal references.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRId
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Name of the rule for internal references.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRId $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Source inputs to the mapping.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRStructureMap\FHIRStructureMapSource[]
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Source inputs to the mapping.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRStructureMap\FHIRStructureMapSource[] $source
     * @return $this
     */
    public function addSource($source)
    {
        $this->source[] = $source;
        return $this;
    }

    /**
     * Content to create because of this mapping rule.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRStructureMap\FHIRStructureMapTarget[]
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Content to create because of this mapping rule.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRStructureMap\FHIRStructureMapTarget[] $target
     * @return $this
     */
    public function addTarget($target)
    {
        $this->target[] = $target;
        return $this;
    }

    /**
     * Rules contained in this rule.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRStructureMap\FHIRStructureMapRule[]
     */
    public function getRule()
    {
        return $this->rule;
    }

    /**
     * Rules contained in this rule.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRStructureMap\FHIRStructureMapRule[] $rule
     * @return $this
     */
    public function addRule($rule)
    {
        $this->rule[] = $rule;
        return $this;
    }

    /**
     * Which other rules to apply in the context of this rule.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRStructureMap\FHIRStructureMapDependent[]
     */
    public function getDependent()
    {
        return $this->dependent;
    }

    /**
     * Which other rules to apply in the context of this rule.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRStructureMap\FHIRStructureMapDependent[] $dependent
     * @return $this
     */
    public function addDependent($dependent)
    {
        $this->dependent[] = $dependent;
        return $this;
    }

    /**
     * Documentation for this instance of data.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getDocumentation()
    {
        return $this->documentation;
    }

    /**
     * Documentation for this instance of data.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $documentation
     * @return $this
     */
    public function setDocumentation($documentation)
    {
        $this->documentation = $documentation;
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
        if (null !== $this->name) $json['name'] = $this->name->jsonSerialize();
        if (0 < count($this->source)) {
            $json['source'] = array();
            foreach($this->source as $source) {
                $json['source'][] = $source->jsonSerialize();
            }
        }
        if (0 < count($this->target)) {
            $json['target'] = array();
            foreach($this->target as $target) {
                $json['target'][] = $target->jsonSerialize();
            }
        }
        if (0 < count($this->rule)) {
            $json['rule'] = array();
            foreach($this->rule as $rule) {
                $json['rule'][] = $rule->jsonSerialize();
            }
        }
        if (0 < count($this->dependent)) {
            $json['dependent'] = array();
            foreach($this->dependent as $dependent) {
                $json['dependent'][] = $dependent->jsonSerialize();
            }
        }
        if (null !== $this->documentation) $json['documentation'] = $this->documentation->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<StructureMapRule xmlns="http://hl7.org/fhir"></StructureMapRule>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->name) $this->name->xmlSerialize(true, $sxe->addChild('name'));
        if (0 < count($this->source)) {
            foreach($this->source as $source) {
                $source->xmlSerialize(true, $sxe->addChild('source'));
            }
        }
        if (0 < count($this->target)) {
            foreach($this->target as $target) {
                $target->xmlSerialize(true, $sxe->addChild('target'));
            }
        }
        if (0 < count($this->rule)) {
            foreach($this->rule as $rule) {
                $rule->xmlSerialize(true, $sxe->addChild('rule'));
            }
        }
        if (0 < count($this->dependent)) {
            foreach($this->dependent as $dependent) {
                $dependent->xmlSerialize(true, $sxe->addChild('dependent'));
            }
        }
        if (null !== $this->documentation) $this->documentation->xmlSerialize(true, $sxe->addChild('documentation'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}