<?php namespace FHIR_STU_THREE\FHIRResource\FHIRContract;

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
 * A formal agreement between parties regarding the conduct of business, exchange of information or other matters.
 */
class FHIRContractTerm extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * Unique identifier for this particular Contract Provision.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $identifier = null;

    /**
     * When this Contract Provision was issued.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $issued = null;

    /**
     * Relevant time or time-period when this Contract Provision is applicable.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public $applies = null;

    /**
     * Type of Contract Provision such as specific requirements, purposes for actions, obligations, prohibitions, e.g. life time maximum benefit.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $type = null;

    /**
     * Subtype of this Contract Provision, e.g. life time maximum payment for a contract term for specific valued item, e.g. disability payment.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $subType = null;

    /**
     * The matter of concern in the context of this provision of the agrement.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $topic = array();

    /**
     * Action stipulated by this Contract Provision.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $action = array();

    /**
     * Reason or purpose for the action stipulated by this Contract Provision.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $actionReason = array();

    /**
     * An actor taking a role in an activity for which it can be assigned some degree of responsibility for the activity taking place.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRContract\FHIRContractAgent1[]
     */
    public $agent = array();

    /**
     * Human readable form of this Contract Provision.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $text = null;

    /**
     * Contract Provision Valued Item List.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRContract\FHIRContractValuedItem1[]
     */
    public $valuedItem = array();

    /**
     * Nested group of Contract Provisions.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRContract\FHIRContractTerm[]
     */
    public $group = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'Contract.Term';

    /**
     * Unique identifier for this particular Contract Provision.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Unique identifier for this particular Contract Provision.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $identifier
     * @return $this
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
        return $this;
    }

    /**
     * When this Contract Provision was issued.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getIssued()
    {
        return $this->issued;
    }

    /**
     * When this Contract Provision was issued.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $issued
     * @return $this
     */
    public function setIssued($issued)
    {
        $this->issued = $issued;
        return $this;
    }

    /**
     * Relevant time or time-period when this Contract Provision is applicable.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public function getApplies()
    {
        return $this->applies;
    }

    /**
     * Relevant time or time-period when this Contract Provision is applicable.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPeriod $applies
     * @return $this
     */
    public function setApplies($applies)
    {
        $this->applies = $applies;
        return $this;
    }

    /**
     * Type of Contract Provision such as specific requirements, purposes for actions, obligations, prohibitions, e.g. life time maximum benefit.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Type of Contract Provision such as specific requirements, purposes for actions, obligations, prohibitions, e.g. life time maximum benefit.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Subtype of this Contract Provision, e.g. life time maximum payment for a contract term for specific valued item, e.g. disability payment.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getSubType()
    {
        return $this->subType;
    }

    /**
     * Subtype of this Contract Provision, e.g. life time maximum payment for a contract term for specific valued item, e.g. disability payment.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $subType
     * @return $this
     */
    public function setSubType($subType)
    {
        $this->subType = $subType;
        return $this;
    }

    /**
     * The matter of concern in the context of this provision of the agrement.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * The matter of concern in the context of this provision of the agrement.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $topic
     * @return $this
     */
    public function addTopic($topic)
    {
        $this->topic[] = $topic;
        return $this;
    }

    /**
     * Action stipulated by this Contract Provision.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Action stipulated by this Contract Provision.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $action
     * @return $this
     */
    public function addAction($action)
    {
        $this->action[] = $action;
        return $this;
    }

    /**
     * Reason or purpose for the action stipulated by this Contract Provision.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getActionReason()
    {
        return $this->actionReason;
    }

    /**
     * Reason or purpose for the action stipulated by this Contract Provision.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $actionReason
     * @return $this
     */
    public function addActionReason($actionReason)
    {
        $this->actionReason[] = $actionReason;
        return $this;
    }

    /**
     * An actor taking a role in an activity for which it can be assigned some degree of responsibility for the activity taking place.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRContract\FHIRContractAgent1[]
     */
    public function getAgent()
    {
        return $this->agent;
    }

    /**
     * An actor taking a role in an activity for which it can be assigned some degree of responsibility for the activity taking place.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRContract\FHIRContractAgent1[] $agent
     * @return $this
     */
    public function addAgent($agent)
    {
        $this->agent[] = $agent;
        return $this;
    }

    /**
     * Human readable form of this Contract Provision.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Human readable form of this Contract Provision.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $text
     * @return $this
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Contract Provision Valued Item List.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRContract\FHIRContractValuedItem1[]
     */
    public function getValuedItem()
    {
        return $this->valuedItem;
    }

    /**
     * Contract Provision Valued Item List.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRContract\FHIRContractValuedItem1[] $valuedItem
     * @return $this
     */
    public function addValuedItem($valuedItem)
    {
        $this->valuedItem[] = $valuedItem;
        return $this;
    }

    /**
     * Nested group of Contract Provisions.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRContract\FHIRContractTerm[]
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Nested group of Contract Provisions.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRContract\FHIRContractTerm[] $group
     * @return $this
     */
    public function addGroup($group)
    {
        $this->group[] = $group;
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
        if (null !== $this->identifier) $json['identifier'] = $this->identifier->jsonSerialize();
        if (null !== $this->issued) $json['issued'] = $this->issued->jsonSerialize();
        if (null !== $this->applies) $json['applies'] = $this->applies->jsonSerialize();
        if (null !== $this->type) $json['type'] = $this->type->jsonSerialize();
        if (null !== $this->subType) $json['subType'] = $this->subType->jsonSerialize();
        if (0 < count($this->topic)) {
            $json['topic'] = array();
            foreach($this->topic as $topic) {
                $json['topic'][] = $topic->jsonSerialize();
            }
        }
        if (0 < count($this->action)) {
            $json['action'] = array();
            foreach($this->action as $action) {
                $json['action'][] = $action->jsonSerialize();
            }
        }
        if (0 < count($this->actionReason)) {
            $json['actionReason'] = array();
            foreach($this->actionReason as $actionReason) {
                $json['actionReason'][] = $actionReason->jsonSerialize();
            }
        }
        if (0 < count($this->agent)) {
            $json['agent'] = array();
            foreach($this->agent as $agent) {
                $json['agent'][] = $agent->jsonSerialize();
            }
        }
        if (null !== $this->text) $json['text'] = $this->text->jsonSerialize();
        if (0 < count($this->valuedItem)) {
            $json['valuedItem'] = array();
            foreach($this->valuedItem as $valuedItem) {
                $json['valuedItem'][] = $valuedItem->jsonSerialize();
            }
        }
        if (0 < count($this->group)) {
            $json['group'] = array();
            foreach($this->group as $group) {
                $json['group'][] = $group->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ContractTerm xmlns="http://hl7.org/fhir"></ContractTerm>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->identifier) $this->identifier->xmlSerialize(true, $sxe->addChild('identifier'));
        if (null !== $this->issued) $this->issued->xmlSerialize(true, $sxe->addChild('issued'));
        if (null !== $this->applies) $this->applies->xmlSerialize(true, $sxe->addChild('applies'));
        if (null !== $this->type) $this->type->xmlSerialize(true, $sxe->addChild('type'));
        if (null !== $this->subType) $this->subType->xmlSerialize(true, $sxe->addChild('subType'));
        if (0 < count($this->topic)) {
            foreach($this->topic as $topic) {
                $topic->xmlSerialize(true, $sxe->addChild('topic'));
            }
        }
        if (0 < count($this->action)) {
            foreach($this->action as $action) {
                $action->xmlSerialize(true, $sxe->addChild('action'));
            }
        }
        if (0 < count($this->actionReason)) {
            foreach($this->actionReason as $actionReason) {
                $actionReason->xmlSerialize(true, $sxe->addChild('actionReason'));
            }
        }
        if (0 < count($this->agent)) {
            foreach($this->agent as $agent) {
                $agent->xmlSerialize(true, $sxe->addChild('agent'));
            }
        }
        if (null !== $this->text) $this->text->xmlSerialize(true, $sxe->addChild('text'));
        if (0 < count($this->valuedItem)) {
            foreach($this->valuedItem as $valuedItem) {
                $valuedItem->xmlSerialize(true, $sxe->addChild('valuedItem'));
            }
        }
        if (0 < count($this->group)) {
            foreach($this->group as $group) {
                $group->xmlSerialize(true, $sxe->addChild('group'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}