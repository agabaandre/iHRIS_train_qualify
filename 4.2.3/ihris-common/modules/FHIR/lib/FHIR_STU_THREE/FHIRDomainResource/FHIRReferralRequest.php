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
 * Used to record and send details about a request for referral service or transfer of a patient to the care of another provider or provider organization.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRReferralRequest extends FHIRDomainResource implements JsonSerializable
{
    /**
     * Business identifier that uniquely identifies the referral/care transfer request instance.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * Indicates any plans, proposals or orders that this request is intended to satisfy - in whole or in part.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $basedOn = array();

    /**
     * The business identifier of the logical "grouping" request/order that this referral is a part of.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $parent = null;

    /**
     * The status of the authorization/intention reflected by the referral request record.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReferralStatus
     */
    public $status = null;

    /**
     * Distinguishes the "level" of authorization/demand implicit in this request.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReferralCategory
     */
    public $category = null;

    /**
     * An indication of the type of referral (or where applicable the type of transfer of care) request.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $type = null;

    /**
     * An indication of the urgency of referral (or where applicable the type of transfer of care) request.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $priority = null;

    /**
     * The patient who is the subject of a referral or transfer of care request.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $patient = null;

    /**
     * The encounter at which the request for referral or transfer of care is initiated.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $context = null;

    /**
     * The period of time within which the services identified in the referral/transfer of care is specified or required to occur.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public $fulfillmentTime = null;

    /**
     * Date/DateTime of creation for draft requests and date of activation for active requests.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $authored = null;

    /**
     * The healthcare provider or provider organization who/which initiated the referral/transfer of care request. Can also be  Patient (a self referral).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $requester = null;

    /**
     * Indication of the clinical domain or discipline to which the referral or transfer of care request is sent.  For example: Cardiology Gastroenterology Diabetology.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $specialty = null;

    /**
     * The healthcare provider(s) or provider organization(s) who/which is to receive the referral/transfer of care request.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $recipient = array();

    /**
     * Description of clinical condition indicating why referral/transfer of care is requested.  For example:  Pathological Anomalies, Disabled (physical or mental),  Behavioral Management.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $reason = null;

    /**
     * The reason element gives a short description of why the referral is being made, the description expands on this to support a more complete clinical summary.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $description = null;

    /**
     * The service(s) that is/are requested to be provided to the patient.  For example: cardiac pacemaker insertion.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $serviceRequested = array();

    /**
     * Any additional (administrative, financial or clinical) information required to support request for referral or transfer of care.  For example: Presenting problems/chief complaints Medical History Family History Alerts Allergy/Intolerance and Adverse Reactions Medications Observations/Assessments (may include cognitive and fundtional assessments) Diagnostic Reports Care Plan.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $supportingInformation = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'ReferralRequest';

    /**
     * Business identifier that uniquely identifies the referral/care transfer request instance.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Business identifier that uniquely identifies the referral/care transfer request instance.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * Indicates any plans, proposals or orders that this request is intended to satisfy - in whole or in part.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getBasedOn()
    {
        return $this->basedOn;
    }

    /**
     * Indicates any plans, proposals or orders that this request is intended to satisfy - in whole or in part.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $basedOn
     * @return $this
     */
    public function addBasedOn($basedOn)
    {
        $this->basedOn[] = $basedOn;
        return $this;
    }

    /**
     * The business identifier of the logical "grouping" request/order that this referral is a part of.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * The business identifier of the logical "grouping" request/order that this referral is a part of.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $parent
     * @return $this
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * The status of the authorization/intention reflected by the referral request record.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReferralStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status of the authorization/intention reflected by the referral request record.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReferralStatus $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Distinguishes the "level" of authorization/demand implicit in this request.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReferralCategory
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Distinguishes the "level" of authorization/demand implicit in this request.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReferralCategory $category
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * An indication of the type of referral (or where applicable the type of transfer of care) request.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * An indication of the type of referral (or where applicable the type of transfer of care) request.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * An indication of the urgency of referral (or where applicable the type of transfer of care) request.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * An indication of the urgency of referral (or where applicable the type of transfer of care) request.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $priority
     * @return $this
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * The patient who is the subject of a referral or transfer of care request.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * The patient who is the subject of a referral or transfer of care request.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $patient
     * @return $this
     */
    public function setPatient($patient)
    {
        $this->patient = $patient;
        return $this;
    }

    /**
     * The encounter at which the request for referral or transfer of care is initiated.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * The encounter at which the request for referral or transfer of care is initiated.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $context
     * @return $this
     */
    public function setContext($context)
    {
        $this->context = $context;
        return $this;
    }

    /**
     * The period of time within which the services identified in the referral/transfer of care is specified or required to occur.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public function getFulfillmentTime()
    {
        return $this->fulfillmentTime;
    }

    /**
     * The period of time within which the services identified in the referral/transfer of care is specified or required to occur.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPeriod $fulfillmentTime
     * @return $this
     */
    public function setFulfillmentTime($fulfillmentTime)
    {
        $this->fulfillmentTime = $fulfillmentTime;
        return $this;
    }

    /**
     * Date/DateTime of creation for draft requests and date of activation for active requests.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getAuthored()
    {
        return $this->authored;
    }

    /**
     * Date/DateTime of creation for draft requests and date of activation for active requests.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $authored
     * @return $this
     */
    public function setAuthored($authored)
    {
        $this->authored = $authored;
        return $this;
    }

    /**
     * The healthcare provider or provider organization who/which initiated the referral/transfer of care request. Can also be  Patient (a self referral).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getRequester()
    {
        return $this->requester;
    }

    /**
     * The healthcare provider or provider organization who/which initiated the referral/transfer of care request. Can also be  Patient (a self referral).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $requester
     * @return $this
     */
    public function setRequester($requester)
    {
        $this->requester = $requester;
        return $this;
    }

    /**
     * Indication of the clinical domain or discipline to which the referral or transfer of care request is sent.  For example: Cardiology Gastroenterology Diabetology.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getSpecialty()
    {
        return $this->specialty;
    }

    /**
     * Indication of the clinical domain or discipline to which the referral or transfer of care request is sent.  For example: Cardiology Gastroenterology Diabetology.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $specialty
     * @return $this
     */
    public function setSpecialty($specialty)
    {
        $this->specialty = $specialty;
        return $this;
    }

    /**
     * The healthcare provider(s) or provider organization(s) who/which is to receive the referral/transfer of care request.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * The healthcare provider(s) or provider organization(s) who/which is to receive the referral/transfer of care request.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $recipient
     * @return $this
     */
    public function addRecipient($recipient)
    {
        $this->recipient[] = $recipient;
        return $this;
    }

    /**
     * Description of clinical condition indicating why referral/transfer of care is requested.  For example:  Pathological Anomalies, Disabled (physical or mental),  Behavioral Management.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Description of clinical condition indicating why referral/transfer of care is requested.  For example:  Pathological Anomalies, Disabled (physical or mental),  Behavioral Management.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $reason
     * @return $this
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
        return $this;
    }

    /**
     * The reason element gives a short description of why the referral is being made, the description expands on this to support a more complete clinical summary.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * The reason element gives a short description of why the referral is being made, the description expands on this to support a more complete clinical summary.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * The service(s) that is/are requested to be provided to the patient.  For example: cardiac pacemaker insertion.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getServiceRequested()
    {
        return $this->serviceRequested;
    }

    /**
     * The service(s) that is/are requested to be provided to the patient.  For example: cardiac pacemaker insertion.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $serviceRequested
     * @return $this
     */
    public function addServiceRequested($serviceRequested)
    {
        $this->serviceRequested[] = $serviceRequested;
        return $this;
    }

    /**
     * Any additional (administrative, financial or clinical) information required to support request for referral or transfer of care.  For example: Presenting problems/chief complaints Medical History Family History Alerts Allergy/Intolerance and Adverse Reactions Medications Observations/Assessments (may include cognitive and fundtional assessments) Diagnostic Reports Care Plan.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getSupportingInformation()
    {
        return $this->supportingInformation;
    }

    /**
     * Any additional (administrative, financial or clinical) information required to support request for referral or transfer of care.  For example: Presenting problems/chief complaints Medical History Family History Alerts Allergy/Intolerance and Adverse Reactions Medications Observations/Assessments (may include cognitive and fundtional assessments) Diagnostic Reports Care Plan.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $supportingInformation
     * @return $this
     */
    public function addSupportingInformation($supportingInformation)
    {
        $this->supportingInformation[] = $supportingInformation;
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
        if (0 < count($this->basedOn)) {
            $json['basedOn'] = array();
            foreach($this->basedOn as $basedOn) {
                $json['basedOn'][] = $basedOn->jsonSerialize();
            }
        }
        if (null !== $this->parent) $json['parent'] = $this->parent->jsonSerialize();
        if (null !== $this->status) $json['status'] = $this->status->jsonSerialize();
        if (null !== $this->category) $json['category'] = $this->category->jsonSerialize();
        if (null !== $this->type) $json['type'] = $this->type->jsonSerialize();
        if (null !== $this->priority) $json['priority'] = $this->priority->jsonSerialize();
        if (null !== $this->patient) $json['patient'] = $this->patient->jsonSerialize();
        if (null !== $this->context) $json['context'] = $this->context->jsonSerialize();
        if (null !== $this->fulfillmentTime) $json['fulfillmentTime'] = $this->fulfillmentTime->jsonSerialize();
        if (null !== $this->authored) $json['authored'] = $this->authored->jsonSerialize();
        if (null !== $this->requester) $json['requester'] = $this->requester->jsonSerialize();
        if (null !== $this->specialty) $json['specialty'] = $this->specialty->jsonSerialize();
        if (0 < count($this->recipient)) {
            $json['recipient'] = array();
            foreach($this->recipient as $recipient) {
                $json['recipient'][] = $recipient->jsonSerialize();
            }
        }
        if (null !== $this->reason) $json['reason'] = $this->reason->jsonSerialize();
        if (null !== $this->description) $json['description'] = $this->description->jsonSerialize();
        if (0 < count($this->serviceRequested)) {
            $json['serviceRequested'] = array();
            foreach($this->serviceRequested as $serviceRequested) {
                $json['serviceRequested'][] = $serviceRequested->jsonSerialize();
            }
        }
        if (0 < count($this->supportingInformation)) {
            $json['supportingInformation'] = array();
            foreach($this->supportingInformation as $supportingInformation) {
                $json['supportingInformation'][] = $supportingInformation->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ReferralRequest xmlns="http://hl7.org/fhir"></ReferralRequest>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (0 < count($this->basedOn)) {
            foreach($this->basedOn as $basedOn) {
                $basedOn->xmlSerialize(true, $sxe->addChild('basedOn'));
            }
        }
        if (null !== $this->parent) $this->parent->xmlSerialize(true, $sxe->addChild('parent'));
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (null !== $this->category) $this->category->xmlSerialize(true, $sxe->addChild('category'));
        if (null !== $this->type) $this->type->xmlSerialize(true, $sxe->addChild('type'));
        if (null !== $this->priority) $this->priority->xmlSerialize(true, $sxe->addChild('priority'));
        if (null !== $this->patient) $this->patient->xmlSerialize(true, $sxe->addChild('patient'));
        if (null !== $this->context) $this->context->xmlSerialize(true, $sxe->addChild('context'));
        if (null !== $this->fulfillmentTime) $this->fulfillmentTime->xmlSerialize(true, $sxe->addChild('fulfillmentTime'));
        if (null !== $this->authored) $this->authored->xmlSerialize(true, $sxe->addChild('authored'));
        if (null !== $this->requester) $this->requester->xmlSerialize(true, $sxe->addChild('requester'));
        if (null !== $this->specialty) $this->specialty->xmlSerialize(true, $sxe->addChild('specialty'));
        if (0 < count($this->recipient)) {
            foreach($this->recipient as $recipient) {
                $recipient->xmlSerialize(true, $sxe->addChild('recipient'));
            }
        }
        if (null !== $this->reason) $this->reason->xmlSerialize(true, $sxe->addChild('reason'));
        if (null !== $this->description) $this->description->xmlSerialize(true, $sxe->addChild('description'));
        if (0 < count($this->serviceRequested)) {
            foreach($this->serviceRequested as $serviceRequested) {
                $serviceRequested->xmlSerialize(true, $sxe->addChild('serviceRequested'));
            }
        }
        if (0 < count($this->supportingInformation)) {
            foreach($this->supportingInformation as $supportingInformation) {
                $supportingInformation->xmlSerialize(true, $sxe->addChild('supportingInformation'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}