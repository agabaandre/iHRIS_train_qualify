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
 * This resource provides the status of the payment for goods and services rendered, and the request and response resource references.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRPaymentNotice extends FHIRDomainResource implements JsonSerializable
{
    /**
     * The notice business identifier.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * The status of the resource instance.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPaymentNoticeStatus
     */
    public $status = null;

    /**
     * The version of the style of resource contents. This should be mapped to the allowable profiles for this and supporting resources.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $ruleset = null;

    /**
     * The style (standard) and version of the original material which was converted into this resource.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $originalRuleset = null;

    /**
     * The date when this resource was created.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $created = null;

    /**
     * The Insurer who is target  of the request. (choose any one of target*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $targetIdentifier = null;

    /**
     * The Insurer who is target  of the request. (choose any one of target*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $targetReference = null;

    /**
     * The practitioner who is responsible for the services rendered to the patient. (choose any one of provider*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $providerIdentifier = null;

    /**
     * The practitioner who is responsible for the services rendered to the patient. (choose any one of provider*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $providerReference = null;

    /**
     * The organization which is responsible for the services rendered to the patient. (choose any one of organization*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $organizationIdentifier = null;

    /**
     * The organization which is responsible for the services rendered to the patient. (choose any one of organization*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $organizationReference = null;

    /**
     * Reference of resource for which payment is being made. (choose any one of request*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $requestIdentifier = null;

    /**
     * Reference of resource for which payment is being made. (choose any one of request*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $requestReference = null;

    /**
     * Reference of response to resource for which payment is being made. (choose any one of response*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $responseIdentifier = null;

    /**
     * Reference of response to resource for which payment is being made. (choose any one of response*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $responseReference = null;

    /**
     * The payment status, typically paid: payment sent, cleared: payment received.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $paymentStatus = null;

    /**
     * The date when the above payment action occurrred.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDate
     */
    public $statusDate = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'PaymentNotice';

    /**
     * The notice business identifier.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * The notice business identifier.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * The status of the resource instance.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPaymentNoticeStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status of the resource instance.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPaymentNoticeStatus $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * The version of the style of resource contents. This should be mapped to the allowable profiles for this and supporting resources.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getRuleset()
    {
        return $this->ruleset;
    }

    /**
     * The version of the style of resource contents. This should be mapped to the allowable profiles for this and supporting resources.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $ruleset
     * @return $this
     */
    public function setRuleset($ruleset)
    {
        $this->ruleset = $ruleset;
        return $this;
    }

    /**
     * The style (standard) and version of the original material which was converted into this resource.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getOriginalRuleset()
    {
        return $this->originalRuleset;
    }

    /**
     * The style (standard) and version of the original material which was converted into this resource.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $originalRuleset
     * @return $this
     */
    public function setOriginalRuleset($originalRuleset)
    {
        $this->originalRuleset = $originalRuleset;
        return $this;
    }

    /**
     * The date when this resource was created.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * The date when this resource was created.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $created
     * @return $this
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * The Insurer who is target  of the request. (choose any one of target*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getTargetIdentifier()
    {
        return $this->targetIdentifier;
    }

    /**
     * The Insurer who is target  of the request. (choose any one of target*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $targetIdentifier
     * @return $this
     */
    public function setTargetIdentifier($targetIdentifier)
    {
        $this->targetIdentifier = $targetIdentifier;
        return $this;
    }

    /**
     * The Insurer who is target  of the request. (choose any one of target*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getTargetReference()
    {
        return $this->targetReference;
    }

    /**
     * The Insurer who is target  of the request. (choose any one of target*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $targetReference
     * @return $this
     */
    public function setTargetReference($targetReference)
    {
        $this->targetReference = $targetReference;
        return $this;
    }

    /**
     * The practitioner who is responsible for the services rendered to the patient. (choose any one of provider*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getProviderIdentifier()
    {
        return $this->providerIdentifier;
    }

    /**
     * The practitioner who is responsible for the services rendered to the patient. (choose any one of provider*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $providerIdentifier
     * @return $this
     */
    public function setProviderIdentifier($providerIdentifier)
    {
        $this->providerIdentifier = $providerIdentifier;
        return $this;
    }

    /**
     * The practitioner who is responsible for the services rendered to the patient. (choose any one of provider*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getProviderReference()
    {
        return $this->providerReference;
    }

    /**
     * The practitioner who is responsible for the services rendered to the patient. (choose any one of provider*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $providerReference
     * @return $this
     */
    public function setProviderReference($providerReference)
    {
        $this->providerReference = $providerReference;
        return $this;
    }

    /**
     * The organization which is responsible for the services rendered to the patient. (choose any one of organization*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getOrganizationIdentifier()
    {
        return $this->organizationIdentifier;
    }

    /**
     * The organization which is responsible for the services rendered to the patient. (choose any one of organization*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $organizationIdentifier
     * @return $this
     */
    public function setOrganizationIdentifier($organizationIdentifier)
    {
        $this->organizationIdentifier = $organizationIdentifier;
        return $this;
    }

    /**
     * The organization which is responsible for the services rendered to the patient. (choose any one of organization*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getOrganizationReference()
    {
        return $this->organizationReference;
    }

    /**
     * The organization which is responsible for the services rendered to the patient. (choose any one of organization*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $organizationReference
     * @return $this
     */
    public function setOrganizationReference($organizationReference)
    {
        $this->organizationReference = $organizationReference;
        return $this;
    }

    /**
     * Reference of resource for which payment is being made. (choose any one of request*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getRequestIdentifier()
    {
        return $this->requestIdentifier;
    }

    /**
     * Reference of resource for which payment is being made. (choose any one of request*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $requestIdentifier
     * @return $this
     */
    public function setRequestIdentifier($requestIdentifier)
    {
        $this->requestIdentifier = $requestIdentifier;
        return $this;
    }

    /**
     * Reference of resource for which payment is being made. (choose any one of request*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getRequestReference()
    {
        return $this->requestReference;
    }

    /**
     * Reference of resource for which payment is being made. (choose any one of request*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $requestReference
     * @return $this
     */
    public function setRequestReference($requestReference)
    {
        $this->requestReference = $requestReference;
        return $this;
    }

    /**
     * Reference of response to resource for which payment is being made. (choose any one of response*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getResponseIdentifier()
    {
        return $this->responseIdentifier;
    }

    /**
     * Reference of response to resource for which payment is being made. (choose any one of response*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $responseIdentifier
     * @return $this
     */
    public function setResponseIdentifier($responseIdentifier)
    {
        $this->responseIdentifier = $responseIdentifier;
        return $this;
    }

    /**
     * Reference of response to resource for which payment is being made. (choose any one of response*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getResponseReference()
    {
        return $this->responseReference;
    }

    /**
     * Reference of response to resource for which payment is being made. (choose any one of response*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $responseReference
     * @return $this
     */
    public function setResponseReference($responseReference)
    {
        $this->responseReference = $responseReference;
        return $this;
    }

    /**
     * The payment status, typically paid: payment sent, cleared: payment received.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }

    /**
     * The payment status, typically paid: payment sent, cleared: payment received.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $paymentStatus
     * @return $this
     */
    public function setPaymentStatus($paymentStatus)
    {
        $this->paymentStatus = $paymentStatus;
        return $this;
    }

    /**
     * The date when the above payment action occurrred.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDate
     */
    public function getStatusDate()
    {
        return $this->statusDate;
    }

    /**
     * The date when the above payment action occurrred.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDate $statusDate
     * @return $this
     */
    public function setStatusDate($statusDate)
    {
        $this->statusDate = $statusDate;
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
        if (null !== $this->status) $json['status'] = $this->status->jsonSerialize();
        if (null !== $this->ruleset) $json['ruleset'] = $this->ruleset->jsonSerialize();
        if (null !== $this->originalRuleset) $json['originalRuleset'] = $this->originalRuleset->jsonSerialize();
        if (null !== $this->created) $json['created'] = $this->created->jsonSerialize();
        if (null !== $this->targetIdentifier) $json['targetIdentifier'] = $this->targetIdentifier->jsonSerialize();
        if (null !== $this->targetReference) $json['targetReference'] = $this->targetReference->jsonSerialize();
        if (null !== $this->providerIdentifier) $json['providerIdentifier'] = $this->providerIdentifier->jsonSerialize();
        if (null !== $this->providerReference) $json['providerReference'] = $this->providerReference->jsonSerialize();
        if (null !== $this->organizationIdentifier) $json['organizationIdentifier'] = $this->organizationIdentifier->jsonSerialize();
        if (null !== $this->organizationReference) $json['organizationReference'] = $this->organizationReference->jsonSerialize();
        if (null !== $this->requestIdentifier) $json['requestIdentifier'] = $this->requestIdentifier->jsonSerialize();
        if (null !== $this->requestReference) $json['requestReference'] = $this->requestReference->jsonSerialize();
        if (null !== $this->responseIdentifier) $json['responseIdentifier'] = $this->responseIdentifier->jsonSerialize();
        if (null !== $this->responseReference) $json['responseReference'] = $this->responseReference->jsonSerialize();
        if (null !== $this->paymentStatus) $json['paymentStatus'] = $this->paymentStatus->jsonSerialize();
        if (null !== $this->statusDate) $json['statusDate'] = $this->statusDate->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<PaymentNotice xmlns="http://hl7.org/fhir"></PaymentNotice>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (null !== $this->ruleset) $this->ruleset->xmlSerialize(true, $sxe->addChild('ruleset'));
        if (null !== $this->originalRuleset) $this->originalRuleset->xmlSerialize(true, $sxe->addChild('originalRuleset'));
        if (null !== $this->created) $this->created->xmlSerialize(true, $sxe->addChild('created'));
        if (null !== $this->targetIdentifier) $this->targetIdentifier->xmlSerialize(true, $sxe->addChild('targetIdentifier'));
        if (null !== $this->targetReference) $this->targetReference->xmlSerialize(true, $sxe->addChild('targetReference'));
        if (null !== $this->providerIdentifier) $this->providerIdentifier->xmlSerialize(true, $sxe->addChild('providerIdentifier'));
        if (null !== $this->providerReference) $this->providerReference->xmlSerialize(true, $sxe->addChild('providerReference'));
        if (null !== $this->organizationIdentifier) $this->organizationIdentifier->xmlSerialize(true, $sxe->addChild('organizationIdentifier'));
        if (null !== $this->organizationReference) $this->organizationReference->xmlSerialize(true, $sxe->addChild('organizationReference'));
        if (null !== $this->requestIdentifier) $this->requestIdentifier->xmlSerialize(true, $sxe->addChild('requestIdentifier'));
        if (null !== $this->requestReference) $this->requestReference->xmlSerialize(true, $sxe->addChild('requestReference'));
        if (null !== $this->responseIdentifier) $this->responseIdentifier->xmlSerialize(true, $sxe->addChild('responseIdentifier'));
        if (null !== $this->responseReference) $this->responseReference->xmlSerialize(true, $sxe->addChild('responseReference'));
        if (null !== $this->paymentStatus) $this->paymentStatus->xmlSerialize(true, $sxe->addChild('paymentStatus'));
        if (null !== $this->statusDate) $this->statusDate->xmlSerialize(true, $sxe->addChild('statusDate'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}