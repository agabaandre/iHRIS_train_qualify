<?php namespace FHIR_STU_THREE\FHIRDomainResource;

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

use FHIR_STU_THREE\FHIRResource\FHIRDomainResource;
use FHIR_STU_THREE\JsonSerializable;

/**
 * This resource defines a decision support rule of the form [on Event] if Condition then Action. It is intended to be a shareable, computable definition of a actions that should be taken whenever some condition is met in response to a particular event or events.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRDecisionSupportRule extends FHIRDomainResource implements JsonSerializable
{
    /**
     * The metadata for the decision support rule, including publishing, life-cycle, version, documentation, and supporting evidence.
     * @var \FHIR_STU_THREE\FHIRDomainResource\FHIRModuleMetadata
     */
    public $moduleMetadata = null;

    /**
     * A reference to a Library containing the formal logic used by the rule.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $library = array();

    /**
     * The trigger element defines when the rule should be invoked. This information is used by consumers of the rule to determine how to integrate the rule into a specific workflow.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRTriggerDefinition[]
     */
    public $trigger = array();

    /**
     * The condition element describes he "if" portion of the rule that determines whether or not the rule "fires". The condition must be the name of an expression in a referenced library.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $condition = null;

    /**
     * The action element defines the "when" portion of the rule that determines what actions should be performed if the condition evaluates to true.
     * @var \[]
     */
    public $action = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'DecisionSupportRule';

    /**
     * The metadata for the decision support rule, including publishing, life-cycle, version, documentation, and supporting evidence.
     * @return \FHIR_STU_THREE\FHIRDomainResource\FHIRModuleMetadata
     */
    public function getModuleMetadata()
    {
        return $this->moduleMetadata;
    }

    /**
     * The metadata for the decision support rule, including publishing, life-cycle, version, documentation, and supporting evidence.
     * @param \FHIR_STU_THREE\FHIRDomainResource\FHIRModuleMetadata $moduleMetadata
     * @return $this
     */
    public function setModuleMetadata($moduleMetadata)
    {
        $this->moduleMetadata = $moduleMetadata;
        return $this;
    }

    /**
     * A reference to a Library containing the formal logic used by the rule.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getLibrary()
    {
        return $this->library;
    }

    /**
     * A reference to a Library containing the formal logic used by the rule.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $library
     * @return $this
     */
    public function addLibrary($library)
    {
        $this->library[] = $library;
        return $this;
    }

    /**
     * The trigger element defines when the rule should be invoked. This information is used by consumers of the rule to determine how to integrate the rule into a specific workflow.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRTriggerDefinition[]
     */
    public function getTrigger()
    {
        return $this->trigger;
    }

    /**
     * The trigger element defines when the rule should be invoked. This information is used by consumers of the rule to determine how to integrate the rule into a specific workflow.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRTriggerDefinition[] $trigger
     * @return $this
     */
    public function addTrigger($trigger)
    {
        $this->trigger[] = $trigger;
        return $this;
    }

    /**
     * The condition element describes he "if" portion of the rule that determines whether or not the rule "fires". The condition must be the name of an expression in a referenced library.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * The condition element describes he "if" portion of the rule that determines whether or not the rule "fires". The condition must be the name of an expression in a referenced library.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $condition
     * @return $this
     */
    public function setCondition($condition)
    {
        $this->condition = $condition;
        return $this;
    }

    /**
     * The action element defines the "when" portion of the rule that determines what actions should be performed if the condition evaluates to true.
     * @return \[]
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * The action element defines the "when" portion of the rule that determines what actions should be performed if the condition evaluates to true.
     * @param \[] $action
     * @return $this
     */
    public function addAction($action)
    {
        $this->action[] = $action;
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
        $json['resourceType'] = $this->_fhirElementName;
        if (null !== $this->moduleMetadata) $json['moduleMetadata'] = $this->moduleMetadata->jsonSerialize();
        if (0 < count($this->library)) {
            $json['library'] = array();
            foreach($this->library as $library) {
                $json['library'][] = $library->jsonSerialize();
            }
        }
        if (0 < count($this->trigger)) {
            $json['trigger'] = array();
            foreach($this->trigger as $trigger) {
                $json['trigger'][] = $trigger->jsonSerialize();
            }
        }
        if (null !== $this->condition) $json['condition'] = $this->condition->jsonSerialize();
        if (0 < count($this->action)) {
            $json['action'] = array();
            foreach($this->action as $action) {
                $json['action'][] = $action->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<DecisionSupportRule xmlns="http://hl7.org/fhir"></DecisionSupportRule>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->moduleMetadata) $this->moduleMetadata->xmlSerialize(true, $sxe->addChild('moduleMetadata'));
        if (0 < count($this->library)) {
            foreach($this->library as $library) {
                $library->xmlSerialize(true, $sxe->addChild('library'));
            }
        }
        if (0 < count($this->trigger)) {
            foreach($this->trigger as $trigger) {
                $trigger->xmlSerialize(true, $sxe->addChild('trigger'));
            }
        }
        if (null !== $this->condition) $this->condition->xmlSerialize(true, $sxe->addChild('condition'));
        if (0 < count($this->action)) {
            foreach($this->action as $action) {
                $action->xmlSerialize(true, $sxe->addChild('action'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}