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
 * A task to be performed.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRTask extends FHIRDomainResource implements JsonSerializable
{
    /**
     * The business identifier for this task.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $identifier = null;

    /**
     * Identifies a plan, proposal or order that this task has been created in fulfillment of.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $basedOn = array();

    /**
     * An identifier that links together multiple tasks and other requests that were created in the same context.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $requisition = null;

    /**
     * Task that this particular task is part of.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $parent = array();

    /**
     * The current status of the task.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRTaskStatus
     */
    public $status = null;

    /**
     * An explanation as to why this task is held, failed, was refused, etc.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $statusReason = null;

    /**
     * Contains business-specific nuances of the business state.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $businessStatus = null;

    /**
     * Indicates the "level" of actionability associated with the Task.  I.e. Is this a proposed task, a planned task, an actionable task, etc.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $stage = null;

    /**
     * A name or code (or both) briefly describing what the task involves.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $code = null;

    /**
     * The priority of the task among other tasks of the same type.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRTaskPriority
     */
    public $priority = null;

    /**
     * A free-text description of what is to be performed.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $description = null;

    /**
     * The request being actioned or the resource being manipulated by this task.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $focus = null;

    /**
     * The entity who benefits from the performance of the service specified in the task (e.g., the patient).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $for = null;

    /**
     * The healthcare event  (e.g. a patient and healthcare provider interaction) during which this task was created.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $context = null;

    /**
     * The date and time this task was created.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $created = null;

    /**
     * The date and time of last modification to this task.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $lastModified = null;

    /**
     * The creator of the task.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $requester = null;

    /**
     * The owner of this task.  The participant who can execute this task.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $owner = null;

    /**
     * The type of participant that can execute the task.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $performerType = array();

    /**
     * A description or code indicating why this task needs to be performed.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $reason = null;

    /**
     * Free-text information captured about the task as it progresses.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRAnnotation[]
     */
    public $note = array();

    /**
     * Identifies any limitations on what part of a referenced task subject request should be actioned.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRTask\FHIRTaskFulfillment
     */
    public $fulfillment = null;

    /**
     * A reference to a formal or informal definition of the task.  For example, a protocol, a step within a defined workflow definition, etc.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRUri
     */
    public $definition = null;

    /**
     * Additional information that may be needed in the execution of the task.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRTask\FHIRTaskInput[]
     */
    public $input = array();

    /**
     * Outputs produced by the Task.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRTask\FHIRTaskOutput[]
     */
    public $output = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'Task';

    /**
     * The business identifier for this task.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * The business identifier for this task.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $identifier
     * @return $this
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
        return $this;
    }

    /**
     * Identifies a plan, proposal or order that this task has been created in fulfillment of.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getBasedOn()
    {
        return $this->basedOn;
    }

    /**
     * Identifies a plan, proposal or order that this task has been created in fulfillment of.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $basedOn
     * @return $this
     */
    public function addBasedOn($basedOn)
    {
        $this->basedOn[] = $basedOn;
        return $this;
    }

    /**
     * An identifier that links together multiple tasks and other requests that were created in the same context.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getRequisition()
    {
        return $this->requisition;
    }

    /**
     * An identifier that links together multiple tasks and other requests that were created in the same context.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $requisition
     * @return $this
     */
    public function setRequisition($requisition)
    {
        $this->requisition = $requisition;
        return $this;
    }

    /**
     * Task that this particular task is part of.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Task that this particular task is part of.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $parent
     * @return $this
     */
    public function addParent($parent)
    {
        $this->parent[] = $parent;
        return $this;
    }

    /**
     * The current status of the task.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRTaskStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The current status of the task.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRTaskStatus $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * An explanation as to why this task is held, failed, was refused, etc.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getStatusReason()
    {
        return $this->statusReason;
    }

    /**
     * An explanation as to why this task is held, failed, was refused, etc.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $statusReason
     * @return $this
     */
    public function setStatusReason($statusReason)
    {
        $this->statusReason = $statusReason;
        return $this;
    }

    /**
     * Contains business-specific nuances of the business state.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getBusinessStatus()
    {
        return $this->businessStatus;
    }

    /**
     * Contains business-specific nuances of the business state.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $businessStatus
     * @return $this
     */
    public function setBusinessStatus($businessStatus)
    {
        $this->businessStatus = $businessStatus;
        return $this;
    }

    /**
     * Indicates the "level" of actionability associated with the Task.  I.e. Is this a proposed task, a planned task, an actionable task, etc.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getStage()
    {
        return $this->stage;
    }

    /**
     * Indicates the "level" of actionability associated with the Task.  I.e. Is this a proposed task, a planned task, an actionable task, etc.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $stage
     * @return $this
     */
    public function setStage($stage)
    {
        $this->stage = $stage;
        return $this;
    }

    /**
     * A name or code (or both) briefly describing what the task involves.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * A name or code (or both) briefly describing what the task involves.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * The priority of the task among other tasks of the same type.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRTaskPriority
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * The priority of the task among other tasks of the same type.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRTaskPriority $priority
     * @return $this
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * A free-text description of what is to be performed.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * A free-text description of what is to be performed.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * The request being actioned or the resource being manipulated by this task.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getFocus()
    {
        return $this->focus;
    }

    /**
     * The request being actioned or the resource being manipulated by this task.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $focus
     * @return $this
     */
    public function setFocus($focus)
    {
        $this->focus = $focus;
        return $this;
    }

    /**
     * The entity who benefits from the performance of the service specified in the task (e.g., the patient).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getFor()
    {
        return $this->for;
    }

    /**
     * The entity who benefits from the performance of the service specified in the task (e.g., the patient).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $for
     * @return $this
     */
    public function setFor($for)
    {
        $this->for = $for;
        return $this;
    }

    /**
     * The healthcare event  (e.g. a patient and healthcare provider interaction) during which this task was created.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * The healthcare event  (e.g. a patient and healthcare provider interaction) during which this task was created.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $context
     * @return $this
     */
    public function setContext($context)
    {
        $this->context = $context;
        return $this;
    }

    /**
     * The date and time this task was created.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * The date and time this task was created.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $created
     * @return $this
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * The date and time of last modification to this task.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }

    /**
     * The date and time of last modification to this task.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $lastModified
     * @return $this
     */
    public function setLastModified($lastModified)
    {
        $this->lastModified = $lastModified;
        return $this;
    }

    /**
     * The creator of the task.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getRequester()
    {
        return $this->requester;
    }

    /**
     * The creator of the task.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $requester
     * @return $this
     */
    public function setRequester($requester)
    {
        $this->requester = $requester;
        return $this;
    }

    /**
     * The owner of this task.  The participant who can execute this task.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * The owner of this task.  The participant who can execute this task.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $owner
     * @return $this
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
        return $this;
    }

    /**
     * The type of participant that can execute the task.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getPerformerType()
    {
        return $this->performerType;
    }

    /**
     * The type of participant that can execute the task.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $performerType
     * @return $this
     */
    public function addPerformerType($performerType)
    {
        $this->performerType[] = $performerType;
        return $this;
    }

    /**
     * A description or code indicating why this task needs to be performed.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * A description or code indicating why this task needs to be performed.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $reason
     * @return $this
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
        return $this;
    }

    /**
     * Free-text information captured about the task as it progresses.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRAnnotation[]
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Free-text information captured about the task as it progresses.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRAnnotation[] $note
     * @return $this
     */
    public function addNote($note)
    {
        $this->note[] = $note;
        return $this;
    }

    /**
     * Identifies any limitations on what part of a referenced task subject request should be actioned.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRTask\FHIRTaskFulfillment
     */
    public function getFulfillment()
    {
        return $this->fulfillment;
    }

    /**
     * Identifies any limitations on what part of a referenced task subject request should be actioned.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRTask\FHIRTaskFulfillment $fulfillment
     * @return $this
     */
    public function setFulfillment($fulfillment)
    {
        $this->fulfillment = $fulfillment;
        return $this;
    }

    /**
     * A reference to a formal or informal definition of the task.  For example, a protocol, a step within a defined workflow definition, etc.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRUri
     */
    public function getDefinition()
    {
        return $this->definition;
    }

    /**
     * A reference to a formal or informal definition of the task.  For example, a protocol, a step within a defined workflow definition, etc.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRUri $definition
     * @return $this
     */
    public function setDefinition($definition)
    {
        $this->definition = $definition;
        return $this;
    }

    /**
     * Additional information that may be needed in the execution of the task.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRTask\FHIRTaskInput[]
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * Additional information that may be needed in the execution of the task.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRTask\FHIRTaskInput[] $input
     * @return $this
     */
    public function addInput($input)
    {
        $this->input[] = $input;
        return $this;
    }

    /**
     * Outputs produced by the Task.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRTask\FHIRTaskOutput[]
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * Outputs produced by the Task.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRTask\FHIRTaskOutput[] $output
     * @return $this
     */
    public function addOutput($output)
    {
        $this->output[] = $output;
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
        if (null !== $this->identifier) $json['identifier'] = $this->identifier->jsonSerialize();
        if (0 < count($this->basedOn)) {
            $json['basedOn'] = array();
            foreach($this->basedOn as $basedOn) {
                $json['basedOn'][] = $basedOn->jsonSerialize();
            }
        }
        if (null !== $this->requisition) $json['requisition'] = $this->requisition->jsonSerialize();
        if (0 < count($this->parent)) {
            $json['parent'] = array();
            foreach($this->parent as $parent) {
                $json['parent'][] = $parent->jsonSerialize();
            }
        }
        if (null !== $this->status) $json['status'] = $this->status->jsonSerialize();
        if (null !== $this->statusReason) $json['statusReason'] = $this->statusReason->jsonSerialize();
        if (null !== $this->businessStatus) $json['businessStatus'] = $this->businessStatus->jsonSerialize();
        if (null !== $this->stage) $json['stage'] = $this->stage->jsonSerialize();
        if (null !== $this->code) $json['code'] = $this->code->jsonSerialize();
        if (null !== $this->priority) $json['priority'] = $this->priority->jsonSerialize();
        if (null !== $this->description) $json['description'] = $this->description->jsonSerialize();
        if (null !== $this->focus) $json['focus'] = $this->focus->jsonSerialize();
        if (null !== $this->for) $json['for'] = $this->for->jsonSerialize();
        if (null !== $this->context) $json['context'] = $this->context->jsonSerialize();
        if (null !== $this->created) $json['created'] = $this->created->jsonSerialize();
        if (null !== $this->lastModified) $json['lastModified'] = $this->lastModified->jsonSerialize();
        if (null !== $this->requester) $json['requester'] = $this->requester->jsonSerialize();
        if (null !== $this->owner) $json['owner'] = $this->owner->jsonSerialize();
        if (0 < count($this->performerType)) {
            $json['performerType'] = array();
            foreach($this->performerType as $performerType) {
                $json['performerType'][] = $performerType->jsonSerialize();
            }
        }
        if (null !== $this->reason) $json['reason'] = $this->reason->jsonSerialize();
        if (0 < count($this->note)) {
            $json['note'] = array();
            foreach($this->note as $note) {
                $json['note'][] = $note->jsonSerialize();
            }
        }
        if (null !== $this->fulfillment) $json['fulfillment'] = $this->fulfillment->jsonSerialize();
        if (null !== $this->definition) $json['definition'] = $this->definition->jsonSerialize();
        if (0 < count($this->input)) {
            $json['input'] = array();
            foreach($this->input as $input) {
                $json['input'][] = $input->jsonSerialize();
            }
        }
        if (0 < count($this->output)) {
            $json['output'] = array();
            foreach($this->output as $output) {
                $json['output'][] = $output->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<Task xmlns="http://hl7.org/fhir"></Task>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->identifier) $this->identifier->xmlSerialize(true, $sxe->addChild('identifier'));
        if (0 < count($this->basedOn)) {
            foreach($this->basedOn as $basedOn) {
                $basedOn->xmlSerialize(true, $sxe->addChild('basedOn'));
            }
        }
        if (null !== $this->requisition) $this->requisition->xmlSerialize(true, $sxe->addChild('requisition'));
        if (0 < count($this->parent)) {
            foreach($this->parent as $parent) {
                $parent->xmlSerialize(true, $sxe->addChild('parent'));
            }
        }
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (null !== $this->statusReason) $this->statusReason->xmlSerialize(true, $sxe->addChild('statusReason'));
        if (null !== $this->businessStatus) $this->businessStatus->xmlSerialize(true, $sxe->addChild('businessStatus'));
        if (null !== $this->stage) $this->stage->xmlSerialize(true, $sxe->addChild('stage'));
        if (null !== $this->code) $this->code->xmlSerialize(true, $sxe->addChild('code'));
        if (null !== $this->priority) $this->priority->xmlSerialize(true, $sxe->addChild('priority'));
        if (null !== $this->description) $this->description->xmlSerialize(true, $sxe->addChild('description'));
        if (null !== $this->focus) $this->focus->xmlSerialize(true, $sxe->addChild('focus'));
        if (null !== $this->for) $this->for->xmlSerialize(true, $sxe->addChild('for'));
        if (null !== $this->context) $this->context->xmlSerialize(true, $sxe->addChild('context'));
        if (null !== $this->created) $this->created->xmlSerialize(true, $sxe->addChild('created'));
        if (null !== $this->lastModified) $this->lastModified->xmlSerialize(true, $sxe->addChild('lastModified'));
        if (null !== $this->requester) $this->requester->xmlSerialize(true, $sxe->addChild('requester'));
        if (null !== $this->owner) $this->owner->xmlSerialize(true, $sxe->addChild('owner'));
        if (0 < count($this->performerType)) {
            foreach($this->performerType as $performerType) {
                $performerType->xmlSerialize(true, $sxe->addChild('performerType'));
            }
        }
        if (null !== $this->reason) $this->reason->xmlSerialize(true, $sxe->addChild('reason'));
        if (0 < count($this->note)) {
            foreach($this->note as $note) {
                $note->xmlSerialize(true, $sxe->addChild('note'));
            }
        }
        if (null !== $this->fulfillment) $this->fulfillment->xmlSerialize(true, $sxe->addChild('fulfillment'));
        if (null !== $this->definition) $this->definition->xmlSerialize(true, $sxe->addChild('definition'));
        if (0 < count($this->input)) {
            foreach($this->input as $input) {
                $input->xmlSerialize(true, $sxe->addChild('input'));
            }
        }
        if (0 < count($this->output)) {
            foreach($this->output as $output) {
                $output->xmlSerialize(true, $sxe->addChild('output'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}