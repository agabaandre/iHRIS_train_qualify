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
 * Represents a request for a patient to employ a medical device. The device may be an implantable device, or an external assistive device, such as a walker.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRDeviceUseRequest extends FHIRDomainResource implements JsonSerializable
{
    /**
     * Identifiers assigned to this order by the orderer or by the receiver.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * Protocol or definition followed by this request. For example: The proposed act must be performed if the indicated conditions occur, e.g.., shortness of breath, SpO2 less than x%.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $definition = array();

    /**
     * Plan/proposal/order fulfilled by this request.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $basedOn = array();

    /**
     * The request takes the place of the referenced completed or terminated request(s).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $replaces = array();

    /**
     * Composite request this is part of.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $requisition = null;

    /**
     * The status of the request.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCode
     */
    public $status = null;

    /**
     * Whether the request is a proposal, plan, an original order or a reflex order.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $stage = null;

    /**
     * The details of the device to be used. (choose any one of device*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $deviceReference = null;

    /**
     * The details of the device to be used. (choose any one of device*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $deviceCodeableConcept = null;

    /**
     * The patient who will use the device.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $subject = null;

    /**
     * An encounter that provides additional context in which this request is made.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $context = null;

    /**
     * The timing schedule for the use of the device. The Schedule data type allows many different expressions, for example. "Every 8 hours"; "Three times a day"; "1/2 an hour before breakfast for 10 days from 23-Dec 2011:"; "15 Oct 2013, 17 Oct 2013 and 1 Nov 2013". (choose any one of occurrence*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $occurrenceDateTime = null;

    /**
     * The timing schedule for the use of the device. The Schedule data type allows many different expressions, for example. "Every 8 hours"; "Three times a day"; "1/2 an hour before breakfast for 10 days from 23-Dec 2011:"; "15 Oct 2013, 17 Oct 2013 and 1 Nov 2013". (choose any one of occurrence*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public $occurrencePeriod = null;

    /**
     * The timing schedule for the use of the device. The Schedule data type allows many different expressions, for example. "Every 8 hours"; "Three times a day"; "1/2 an hour before breakfast for 10 days from 23-Dec 2011:"; "15 Oct 2013, 17 Oct 2013 and 1 Nov 2013". (choose any one of occurrence*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRTiming
     */
    public $occurrenceTiming = null;

    /**
     * When the request transitioned to being actionable.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $authored = null;

    /**
     * Who/what is requesting diagnostics.  The practitioner that holds legal responsibility for ordering the investigation.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $requester = null;

    /**
     * Desired type of performer for doing the diagnostic testing.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $performerType = null;

    /**
     * The desired perfomer for doing the diagnostic testing.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $performer = null;

    /**
     * Reason or justification for the use of this device.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $reasonCode = array();

    /**
     * Reason or justification for the use of this device.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $reasonReference = array();

    /**
     * Additional clinical information about the patient that may influence the request fulfilment.  For example, this may includes body where on the subject's the device will be used ( i.e. the target site).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $supportingInfo = array();

    /**
     * Details about this request that were not represented at all or sufficiently in one of the attributes provided in a class. These may include for example a comment, an instruction, or a note associated with the statement.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRAnnotation[]
     */
    public $note = array();

    /**
     * Key events in the history of the request.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $relevantHistory = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'DeviceUseRequest';

    /**
     * Identifiers assigned to this order by the orderer or by the receiver.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Identifiers assigned to this order by the orderer or by the receiver.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * Protocol or definition followed by this request. For example: The proposed act must be performed if the indicated conditions occur, e.g.., shortness of breath, SpO2 less than x%.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getDefinition()
    {
        return $this->definition;
    }

    /**
     * Protocol or definition followed by this request. For example: The proposed act must be performed if the indicated conditions occur, e.g.., shortness of breath, SpO2 less than x%.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $definition
     * @return $this
     */
    public function addDefinition($definition)
    {
        $this->definition[] = $definition;
        return $this;
    }

    /**
     * Plan/proposal/order fulfilled by this request.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getBasedOn()
    {
        return $this->basedOn;
    }

    /**
     * Plan/proposal/order fulfilled by this request.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $basedOn
     * @return $this
     */
    public function addBasedOn($basedOn)
    {
        $this->basedOn[] = $basedOn;
        return $this;
    }

    /**
     * The request takes the place of the referenced completed or terminated request(s).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getReplaces()
    {
        return $this->replaces;
    }

    /**
     * The request takes the place of the referenced completed or terminated request(s).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $replaces
     * @return $this
     */
    public function addReplaces($replaces)
    {
        $this->replaces[] = $replaces;
        return $this;
    }

    /**
     * Composite request this is part of.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getRequisition()
    {
        return $this->requisition;
    }

    /**
     * Composite request this is part of.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $requisition
     * @return $this
     */
    public function setRequisition($requisition)
    {
        $this->requisition = $requisition;
        return $this;
    }

    /**
     * The status of the request.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCode
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status of the request.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCode $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Whether the request is a proposal, plan, an original order or a reflex order.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getStage()
    {
        return $this->stage;
    }

    /**
     * Whether the request is a proposal, plan, an original order or a reflex order.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $stage
     * @return $this
     */
    public function setStage($stage)
    {
        $this->stage = $stage;
        return $this;
    }

    /**
     * The details of the device to be used. (choose any one of device*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getDeviceReference()
    {
        return $this->deviceReference;
    }

    /**
     * The details of the device to be used. (choose any one of device*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $deviceReference
     * @return $this
     */
    public function setDeviceReference($deviceReference)
    {
        $this->deviceReference = $deviceReference;
        return $this;
    }

    /**
     * The details of the device to be used. (choose any one of device*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getDeviceCodeableConcept()
    {
        return $this->deviceCodeableConcept;
    }

    /**
     * The details of the device to be used. (choose any one of device*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $deviceCodeableConcept
     * @return $this
     */
    public function setDeviceCodeableConcept($deviceCodeableConcept)
    {
        $this->deviceCodeableConcept = $deviceCodeableConcept;
        return $this;
    }

    /**
     * The patient who will use the device.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * The patient who will use the device.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * An encounter that provides additional context in which this request is made.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * An encounter that provides additional context in which this request is made.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $context
     * @return $this
     */
    public function setContext($context)
    {
        $this->context = $context;
        return $this;
    }

    /**
     * The timing schedule for the use of the device. The Schedule data type allows many different expressions, for example. "Every 8 hours"; "Three times a day"; "1/2 an hour before breakfast for 10 days from 23-Dec 2011:"; "15 Oct 2013, 17 Oct 2013 and 1 Nov 2013". (choose any one of occurrence*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getOccurrenceDateTime()
    {
        return $this->occurrenceDateTime;
    }

    /**
     * The timing schedule for the use of the device. The Schedule data type allows many different expressions, for example. "Every 8 hours"; "Three times a day"; "1/2 an hour before breakfast for 10 days from 23-Dec 2011:"; "15 Oct 2013, 17 Oct 2013 and 1 Nov 2013". (choose any one of occurrence*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $occurrenceDateTime
     * @return $this
     */
    public function setOccurrenceDateTime($occurrenceDateTime)
    {
        $this->occurrenceDateTime = $occurrenceDateTime;
        return $this;
    }

    /**
     * The timing schedule for the use of the device. The Schedule data type allows many different expressions, for example. "Every 8 hours"; "Three times a day"; "1/2 an hour before breakfast for 10 days from 23-Dec 2011:"; "15 Oct 2013, 17 Oct 2013 and 1 Nov 2013". (choose any one of occurrence*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public function getOccurrencePeriod()
    {
        return $this->occurrencePeriod;
    }

    /**
     * The timing schedule for the use of the device. The Schedule data type allows many different expressions, for example. "Every 8 hours"; "Three times a day"; "1/2 an hour before breakfast for 10 days from 23-Dec 2011:"; "15 Oct 2013, 17 Oct 2013 and 1 Nov 2013". (choose any one of occurrence*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPeriod $occurrencePeriod
     * @return $this
     */
    public function setOccurrencePeriod($occurrencePeriod)
    {
        $this->occurrencePeriod = $occurrencePeriod;
        return $this;
    }

    /**
     * The timing schedule for the use of the device. The Schedule data type allows many different expressions, for example. "Every 8 hours"; "Three times a day"; "1/2 an hour before breakfast for 10 days from 23-Dec 2011:"; "15 Oct 2013, 17 Oct 2013 and 1 Nov 2013". (choose any one of occurrence*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRTiming
     */
    public function getOccurrenceTiming()
    {
        return $this->occurrenceTiming;
    }

    /**
     * The timing schedule for the use of the device. The Schedule data type allows many different expressions, for example. "Every 8 hours"; "Three times a day"; "1/2 an hour before breakfast for 10 days from 23-Dec 2011:"; "15 Oct 2013, 17 Oct 2013 and 1 Nov 2013". (choose any one of occurrence*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRTiming $occurrenceTiming
     * @return $this
     */
    public function setOccurrenceTiming($occurrenceTiming)
    {
        $this->occurrenceTiming = $occurrenceTiming;
        return $this;
    }

    /**
     * When the request transitioned to being actionable.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getAuthored()
    {
        return $this->authored;
    }

    /**
     * When the request transitioned to being actionable.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $authored
     * @return $this
     */
    public function setAuthored($authored)
    {
        $this->authored = $authored;
        return $this;
    }

    /**
     * Who/what is requesting diagnostics.  The practitioner that holds legal responsibility for ordering the investigation.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getRequester()
    {
        return $this->requester;
    }

    /**
     * Who/what is requesting diagnostics.  The practitioner that holds legal responsibility for ordering the investigation.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $requester
     * @return $this
     */
    public function setRequester($requester)
    {
        $this->requester = $requester;
        return $this;
    }

    /**
     * Desired type of performer for doing the diagnostic testing.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getPerformerType()
    {
        return $this->performerType;
    }

    /**
     * Desired type of performer for doing the diagnostic testing.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $performerType
     * @return $this
     */
    public function setPerformerType($performerType)
    {
        $this->performerType = $performerType;
        return $this;
    }

    /**
     * The desired perfomer for doing the diagnostic testing.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getPerformer()
    {
        return $this->performer;
    }

    /**
     * The desired perfomer for doing the diagnostic testing.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $performer
     * @return $this
     */
    public function setPerformer($performer)
    {
        $this->performer = $performer;
        return $this;
    }

    /**
     * Reason or justification for the use of this device.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getReasonCode()
    {
        return $this->reasonCode;
    }

    /**
     * Reason or justification for the use of this device.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $reasonCode
     * @return $this
     */
    public function addReasonCode($reasonCode)
    {
        $this->reasonCode[] = $reasonCode;
        return $this;
    }

    /**
     * Reason or justification for the use of this device.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getReasonReference()
    {
        return $this->reasonReference;
    }

    /**
     * Reason or justification for the use of this device.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $reasonReference
     * @return $this
     */
    public function addReasonReference($reasonReference)
    {
        $this->reasonReference[] = $reasonReference;
        return $this;
    }

    /**
     * Additional clinical information about the patient that may influence the request fulfilment.  For example, this may includes body where on the subject's the device will be used ( i.e. the target site).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getSupportingInfo()
    {
        return $this->supportingInfo;
    }

    /**
     * Additional clinical information about the patient that may influence the request fulfilment.  For example, this may includes body where on the subject's the device will be used ( i.e. the target site).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $supportingInfo
     * @return $this
     */
    public function addSupportingInfo($supportingInfo)
    {
        $this->supportingInfo[] = $supportingInfo;
        return $this;
    }

    /**
     * Details about this request that were not represented at all or sufficiently in one of the attributes provided in a class. These may include for example a comment, an instruction, or a note associated with the statement.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRAnnotation[]
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Details about this request that were not represented at all or sufficiently in one of the attributes provided in a class. These may include for example a comment, an instruction, or a note associated with the statement.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRAnnotation[] $note
     * @return $this
     */
    public function addNote($note)
    {
        $this->note[] = $note;
        return $this;
    }

    /**
     * Key events in the history of the request.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getRelevantHistory()
    {
        return $this->relevantHistory;
    }

    /**
     * Key events in the history of the request.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $relevantHistory
     * @return $this
     */
    public function addRelevantHistory($relevantHistory)
    {
        $this->relevantHistory[] = $relevantHistory;
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
        if (0 < count($this->identifier)) {
            $json['identifier'] = array();
            foreach($this->identifier as $identifier) {
                $json['identifier'][] = $identifier->jsonSerialize();
            }
        }
        if (0 < count($this->definition)) {
            $json['definition'] = array();
            foreach($this->definition as $definition) {
                $json['definition'][] = $definition->jsonSerialize();
            }
        }
        if (0 < count($this->basedOn)) {
            $json['basedOn'] = array();
            foreach($this->basedOn as $basedOn) {
                $json['basedOn'][] = $basedOn->jsonSerialize();
            }
        }
        if (0 < count($this->replaces)) {
            $json['replaces'] = array();
            foreach($this->replaces as $replaces) {
                $json['replaces'][] = $replaces->jsonSerialize();
            }
        }
        if (null !== $this->requisition) $json['requisition'] = $this->requisition->jsonSerialize();
        if (null !== $this->status) $json['status'] = $this->status->jsonSerialize();
        if (null !== $this->stage) $json['stage'] = $this->stage->jsonSerialize();
        if (null !== $this->deviceReference) $json['deviceReference'] = $this->deviceReference->jsonSerialize();
        if (null !== $this->deviceCodeableConcept) $json['deviceCodeableConcept'] = $this->deviceCodeableConcept->jsonSerialize();
        if (null !== $this->subject) $json['subject'] = $this->subject->jsonSerialize();
        if (null !== $this->context) $json['context'] = $this->context->jsonSerialize();
        if (null !== $this->occurrenceDateTime) $json['occurrenceDateTime'] = $this->occurrenceDateTime->jsonSerialize();
        if (null !== $this->occurrencePeriod) $json['occurrencePeriod'] = $this->occurrencePeriod->jsonSerialize();
        if (null !== $this->occurrenceTiming) $json['occurrenceTiming'] = $this->occurrenceTiming->jsonSerialize();
        if (null !== $this->authored) $json['authored'] = $this->authored->jsonSerialize();
        if (null !== $this->requester) $json['requester'] = $this->requester->jsonSerialize();
        if (null !== $this->performerType) $json['performerType'] = $this->performerType->jsonSerialize();
        if (null !== $this->performer) $json['performer'] = $this->performer->jsonSerialize();
        if (0 < count($this->reasonCode)) {
            $json['reasonCode'] = array();
            foreach($this->reasonCode as $reasonCode) {
                $json['reasonCode'][] = $reasonCode->jsonSerialize();
            }
        }
        if (0 < count($this->reasonReference)) {
            $json['reasonReference'] = array();
            foreach($this->reasonReference as $reasonReference) {
                $json['reasonReference'][] = $reasonReference->jsonSerialize();
            }
        }
        if (0 < count($this->supportingInfo)) {
            $json['supportingInfo'] = array();
            foreach($this->supportingInfo as $supportingInfo) {
                $json['supportingInfo'][] = $supportingInfo->jsonSerialize();
            }
        }
        if (0 < count($this->note)) {
            $json['note'] = array();
            foreach($this->note as $note) {
                $json['note'][] = $note->jsonSerialize();
            }
        }
        if (0 < count($this->relevantHistory)) {
            $json['relevantHistory'] = array();
            foreach($this->relevantHistory as $relevantHistory) {
                $json['relevantHistory'][] = $relevantHistory->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<DeviceUseRequest xmlns="http://hl7.org/fhir"></DeviceUseRequest>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (0 < count($this->definition)) {
            foreach($this->definition as $definition) {
                $definition->xmlSerialize(true, $sxe->addChild('definition'));
            }
        }
        if (0 < count($this->basedOn)) {
            foreach($this->basedOn as $basedOn) {
                $basedOn->xmlSerialize(true, $sxe->addChild('basedOn'));
            }
        }
        if (0 < count($this->replaces)) {
            foreach($this->replaces as $replaces) {
                $replaces->xmlSerialize(true, $sxe->addChild('replaces'));
            }
        }
        if (null !== $this->requisition) $this->requisition->xmlSerialize(true, $sxe->addChild('requisition'));
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (null !== $this->stage) $this->stage->xmlSerialize(true, $sxe->addChild('stage'));
        if (null !== $this->deviceReference) $this->deviceReference->xmlSerialize(true, $sxe->addChild('deviceReference'));
        if (null !== $this->deviceCodeableConcept) $this->deviceCodeableConcept->xmlSerialize(true, $sxe->addChild('deviceCodeableConcept'));
        if (null !== $this->subject) $this->subject->xmlSerialize(true, $sxe->addChild('subject'));
        if (null !== $this->context) $this->context->xmlSerialize(true, $sxe->addChild('context'));
        if (null !== $this->occurrenceDateTime) $this->occurrenceDateTime->xmlSerialize(true, $sxe->addChild('occurrenceDateTime'));
        if (null !== $this->occurrencePeriod) $this->occurrencePeriod->xmlSerialize(true, $sxe->addChild('occurrencePeriod'));
        if (null !== $this->occurrenceTiming) $this->occurrenceTiming->xmlSerialize(true, $sxe->addChild('occurrenceTiming'));
        if (null !== $this->authored) $this->authored->xmlSerialize(true, $sxe->addChild('authored'));
        if (null !== $this->requester) $this->requester->xmlSerialize(true, $sxe->addChild('requester'));
        if (null !== $this->performerType) $this->performerType->xmlSerialize(true, $sxe->addChild('performerType'));
        if (null !== $this->performer) $this->performer->xmlSerialize(true, $sxe->addChild('performer'));
        if (0 < count($this->reasonCode)) {
            foreach($this->reasonCode as $reasonCode) {
                $reasonCode->xmlSerialize(true, $sxe->addChild('reasonCode'));
            }
        }
        if (0 < count($this->reasonReference)) {
            foreach($this->reasonReference as $reasonReference) {
                $reasonReference->xmlSerialize(true, $sxe->addChild('reasonReference'));
            }
        }
        if (0 < count($this->supportingInfo)) {
            foreach($this->supportingInfo as $supportingInfo) {
                $supportingInfo->xmlSerialize(true, $sxe->addChild('supportingInfo'));
            }
        }
        if (0 < count($this->note)) {
            foreach($this->note as $note) {
                $note->xmlSerialize(true, $sxe->addChild('note'));
            }
        }
        if (0 < count($this->relevantHistory)) {
            foreach($this->relevantHistory as $relevantHistory) {
                $relevantHistory->xmlSerialize(true, $sxe->addChild('relevantHistory'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}