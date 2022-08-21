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
 * This resource provides the adjudication details from the processing of a Claim resource.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRClaimResponse extends FHIRDomainResource implements JsonSerializable
{
    /**
     * The Response business identifier.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * The status of the resource instance.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRClaimResponseStatus
     */
    public $status = null;

    /**
     * Original request resource referrence. (choose any one of request*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $requestIdentifier = null;

    /**
     * Original request resource referrence. (choose any one of request*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $requestReference = null;

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
     * The date when the enclosed suite of services were performed or completed.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $created = null;

    /**
     * The Insurer who produced this adjudicated response. (choose any one of organization*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $organizationIdentifier = null;

    /**
     * The Insurer who produced this adjudicated response. (choose any one of organization*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $organizationReference = null;

    /**
     * The practitioner who is responsible for the services rendered to the patient. (choose any one of requestProvider*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $requestProviderIdentifier = null;

    /**
     * The practitioner who is responsible for the services rendered to the patient. (choose any one of requestProvider*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $requestProviderReference = null;

    /**
     * The organization which is responsible for the services rendered to the patient. (choose any one of requestOrganization*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $requestOrganizationIdentifier = null;

    /**
     * The organization which is responsible for the services rendered to the patient. (choose any one of requestOrganization*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $requestOrganizationReference = null;

    /**
     * Processing outcome errror, partial or complete processing.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $outcome = null;

    /**
     * A description of the status of the adjudication.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $disposition = null;

    /**
     * Party to be reimbursed: Subscriber, provider, other.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $payeeType = null;

    /**
     * The first tier service adjudications for submitted services.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRClaimResponse\FHIRClaimResponseItem[]
     */
    public $item = array();

    /**
     * The first tier service adjudications for payor added services.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRClaimResponse\FHIRClaimResponseAddItem[]
     */
    public $addItem = array();

    /**
     * Mutually exclusive with Services Provided (Item).
     * @var \FHIR_STU_THREE\FHIRResource\FHIRClaimResponse\FHIRClaimResponseError[]
     */
    public $error = array();

    /**
     * The total cost of the services reported.
     * @var \FHIR_STU_THREE\FHIRMoney
     */
    public $totalCost = null;

    /**
     * The amount of deductible applied which was not allocated to any particular service line.
     * @var \FHIR_STU_THREE\FHIRMoney
     */
    public $unallocDeductable = null;

    /**
     * Total amount of benefit payable (Equal to sum of the Benefit amounts from all detail lines and additions less the Unallocated Deductible).
     * @var \FHIR_STU_THREE\FHIRMoney
     */
    public $totalBenefit = null;

    /**
     * Payment details for the claim if the claim has been paid.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRClaimResponse\FHIRClaimResponsePayment
     */
    public $payment = null;

    /**
     * Status of funds reservation (For provider, for Patient, None).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $reserved = null;

    /**
     * The form to be used for printing the content.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $form = null;

    /**
     * Note text.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRClaimResponse\FHIRClaimResponseNote[]
     */
    public $note = array();

    /**
     * Financial instrument by which payment information for health care.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRClaimResponse\FHIRClaimResponseCoverage[]
     */
    public $coverage = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'ClaimResponse';

    /**
     * The Response business identifier.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * The Response business identifier.
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
     * @return \FHIR_STU_THREE\FHIRElement\FHIRClaimResponseStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status of the resource instance.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRClaimResponseStatus $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Original request resource referrence. (choose any one of request*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getRequestIdentifier()
    {
        return $this->requestIdentifier;
    }

    /**
     * Original request resource referrence. (choose any one of request*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $requestIdentifier
     * @return $this
     */
    public function setRequestIdentifier($requestIdentifier)
    {
        $this->requestIdentifier = $requestIdentifier;
        return $this;
    }

    /**
     * Original request resource referrence. (choose any one of request*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getRequestReference()
    {
        return $this->requestReference;
    }

    /**
     * Original request resource referrence. (choose any one of request*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $requestReference
     * @return $this
     */
    public function setRequestReference($requestReference)
    {
        $this->requestReference = $requestReference;
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
     * The date when the enclosed suite of services were performed or completed.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * The date when the enclosed suite of services were performed or completed.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $created
     * @return $this
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * The Insurer who produced this adjudicated response. (choose any one of organization*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getOrganizationIdentifier()
    {
        return $this->organizationIdentifier;
    }

    /**
     * The Insurer who produced this adjudicated response. (choose any one of organization*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $organizationIdentifier
     * @return $this
     */
    public function setOrganizationIdentifier($organizationIdentifier)
    {
        $this->organizationIdentifier = $organizationIdentifier;
        return $this;
    }

    /**
     * The Insurer who produced this adjudicated response. (choose any one of organization*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getOrganizationReference()
    {
        return $this->organizationReference;
    }

    /**
     * The Insurer who produced this adjudicated response. (choose any one of organization*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $organizationReference
     * @return $this
     */
    public function setOrganizationReference($organizationReference)
    {
        $this->organizationReference = $organizationReference;
        return $this;
    }

    /**
     * The practitioner who is responsible for the services rendered to the patient. (choose any one of requestProvider*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getRequestProviderIdentifier()
    {
        return $this->requestProviderIdentifier;
    }

    /**
     * The practitioner who is responsible for the services rendered to the patient. (choose any one of requestProvider*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $requestProviderIdentifier
     * @return $this
     */
    public function setRequestProviderIdentifier($requestProviderIdentifier)
    {
        $this->requestProviderIdentifier = $requestProviderIdentifier;
        return $this;
    }

    /**
     * The practitioner who is responsible for the services rendered to the patient. (choose any one of requestProvider*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getRequestProviderReference()
    {
        return $this->requestProviderReference;
    }

    /**
     * The practitioner who is responsible for the services rendered to the patient. (choose any one of requestProvider*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $requestProviderReference
     * @return $this
     */
    public function setRequestProviderReference($requestProviderReference)
    {
        $this->requestProviderReference = $requestProviderReference;
        return $this;
    }

    /**
     * The organization which is responsible for the services rendered to the patient. (choose any one of requestOrganization*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getRequestOrganizationIdentifier()
    {
        return $this->requestOrganizationIdentifier;
    }

    /**
     * The organization which is responsible for the services rendered to the patient. (choose any one of requestOrganization*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $requestOrganizationIdentifier
     * @return $this
     */
    public function setRequestOrganizationIdentifier($requestOrganizationIdentifier)
    {
        $this->requestOrganizationIdentifier = $requestOrganizationIdentifier;
        return $this;
    }

    /**
     * The organization which is responsible for the services rendered to the patient. (choose any one of requestOrganization*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getRequestOrganizationReference()
    {
        return $this->requestOrganizationReference;
    }

    /**
     * The organization which is responsible for the services rendered to the patient. (choose any one of requestOrganization*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $requestOrganizationReference
     * @return $this
     */
    public function setRequestOrganizationReference($requestOrganizationReference)
    {
        $this->requestOrganizationReference = $requestOrganizationReference;
        return $this;
    }

    /**
     * Processing outcome errror, partial or complete processing.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getOutcome()
    {
        return $this->outcome;
    }

    /**
     * Processing outcome errror, partial or complete processing.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $outcome
     * @return $this
     */
    public function setOutcome($outcome)
    {
        $this->outcome = $outcome;
        return $this;
    }

    /**
     * A description of the status of the adjudication.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getDisposition()
    {
        return $this->disposition;
    }

    /**
     * A description of the status of the adjudication.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $disposition
     * @return $this
     */
    public function setDisposition($disposition)
    {
        $this->disposition = $disposition;
        return $this;
    }

    /**
     * Party to be reimbursed: Subscriber, provider, other.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getPayeeType()
    {
        return $this->payeeType;
    }

    /**
     * Party to be reimbursed: Subscriber, provider, other.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $payeeType
     * @return $this
     */
    public function setPayeeType($payeeType)
    {
        $this->payeeType = $payeeType;
        return $this;
    }

    /**
     * The first tier service adjudications for submitted services.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRClaimResponse\FHIRClaimResponseItem[]
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * The first tier service adjudications for submitted services.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRClaimResponse\FHIRClaimResponseItem[] $item
     * @return $this
     */
    public function addItem($item)
    {
        $this->item[] = $item;
        return $this;
    }

    /**
     * The first tier service adjudications for payor added services.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRClaimResponse\FHIRClaimResponseAddItem[]
     */
    public function getAddItem()
    {
        return $this->addItem;
    }

    /**
     * The first tier service adjudications for payor added services.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRClaimResponse\FHIRClaimResponseAddItem[] $addItem
     * @return $this
     */
    public function addAddItem($addItem)
    {
        $this->addItem[] = $addItem;
        return $this;
    }

    /**
     * Mutually exclusive with Services Provided (Item).
     * @return \FHIR_STU_THREE\FHIRResource\FHIRClaimResponse\FHIRClaimResponseError[]
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Mutually exclusive with Services Provided (Item).
     * @param \FHIR_STU_THREE\FHIRResource\FHIRClaimResponse\FHIRClaimResponseError[] $error
     * @return $this
     */
    public function addError($error)
    {
        $this->error[] = $error;
        return $this;
    }

    /**
     * The total cost of the services reported.
     * @return \FHIR_STU_THREE\FHIRMoney
     */
    public function getTotalCost()
    {
        return $this->totalCost;
    }

    /**
     * The total cost of the services reported.
     * @param \FHIR_STU_THREE\FHIRMoney $totalCost
     * @return $this
     */
    public function setTotalCost($totalCost)
    {
        $this->totalCost = $totalCost;
        return $this;
    }

    /**
     * The amount of deductible applied which was not allocated to any particular service line.
     * @return \FHIR_STU_THREE\FHIRMoney
     */
    public function getUnallocDeductable()
    {
        return $this->unallocDeductable;
    }

    /**
     * The amount of deductible applied which was not allocated to any particular service line.
     * @param \FHIR_STU_THREE\FHIRMoney $unallocDeductable
     * @return $this
     */
    public function setUnallocDeductable($unallocDeductable)
    {
        $this->unallocDeductable = $unallocDeductable;
        return $this;
    }

    /**
     * Total amount of benefit payable (Equal to sum of the Benefit amounts from all detail lines and additions less the Unallocated Deductible).
     * @return \FHIR_STU_THREE\FHIRMoney
     */
    public function getTotalBenefit()
    {
        return $this->totalBenefit;
    }

    /**
     * Total amount of benefit payable (Equal to sum of the Benefit amounts from all detail lines and additions less the Unallocated Deductible).
     * @param \FHIR_STU_THREE\FHIRMoney $totalBenefit
     * @return $this
     */
    public function setTotalBenefit($totalBenefit)
    {
        $this->totalBenefit = $totalBenefit;
        return $this;
    }

    /**
     * Payment details for the claim if the claim has been paid.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRClaimResponse\FHIRClaimResponsePayment
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * Payment details for the claim if the claim has been paid.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRClaimResponse\FHIRClaimResponsePayment $payment
     * @return $this
     */
    public function setPayment($payment)
    {
        $this->payment = $payment;
        return $this;
    }

    /**
     * Status of funds reservation (For provider, for Patient, None).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getReserved()
    {
        return $this->reserved;
    }

    /**
     * Status of funds reservation (For provider, for Patient, None).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $reserved
     * @return $this
     */
    public function setReserved($reserved)
    {
        $this->reserved = $reserved;
        return $this;
    }

    /**
     * The form to be used for printing the content.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * The form to be used for printing the content.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $form
     * @return $this
     */
    public function setForm($form)
    {
        $this->form = $form;
        return $this;
    }

    /**
     * Note text.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRClaimResponse\FHIRClaimResponseNote[]
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Note text.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRClaimResponse\FHIRClaimResponseNote[] $note
     * @return $this
     */
    public function addNote($note)
    {
        $this->note[] = $note;
        return $this;
    }

    /**
     * Financial instrument by which payment information for health care.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRClaimResponse\FHIRClaimResponseCoverage[]
     */
    public function getCoverage()
    {
        return $this->coverage;
    }

    /**
     * Financial instrument by which payment information for health care.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRClaimResponse\FHIRClaimResponseCoverage[] $coverage
     * @return $this
     */
    public function addCoverage($coverage)
    {
        $this->coverage[] = $coverage;
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
        if (null !== $this->requestIdentifier) $json['requestIdentifier'] = $this->requestIdentifier->jsonSerialize();
        if (null !== $this->requestReference) $json['requestReference'] = $this->requestReference->jsonSerialize();
        if (null !== $this->ruleset) $json['ruleset'] = $this->ruleset->jsonSerialize();
        if (null !== $this->originalRuleset) $json['originalRuleset'] = $this->originalRuleset->jsonSerialize();
        if (null !== $this->created) $json['created'] = $this->created->jsonSerialize();
        if (null !== $this->organizationIdentifier) $json['organizationIdentifier'] = $this->organizationIdentifier->jsonSerialize();
        if (null !== $this->organizationReference) $json['organizationReference'] = $this->organizationReference->jsonSerialize();
        if (null !== $this->requestProviderIdentifier) $json['requestProviderIdentifier'] = $this->requestProviderIdentifier->jsonSerialize();
        if (null !== $this->requestProviderReference) $json['requestProviderReference'] = $this->requestProviderReference->jsonSerialize();
        if (null !== $this->requestOrganizationIdentifier) $json['requestOrganizationIdentifier'] = $this->requestOrganizationIdentifier->jsonSerialize();
        if (null !== $this->requestOrganizationReference) $json['requestOrganizationReference'] = $this->requestOrganizationReference->jsonSerialize();
        if (null !== $this->outcome) $json['outcome'] = $this->outcome->jsonSerialize();
        if (null !== $this->disposition) $json['disposition'] = $this->disposition->jsonSerialize();
        if (null !== $this->payeeType) $json['payeeType'] = $this->payeeType->jsonSerialize();
        if (0 < count($this->item)) {
            $json['item'] = array();
            foreach($this->item as $item) {
                $json['item'][] = $item->jsonSerialize();
            }
        }
        if (0 < count($this->addItem)) {
            $json['addItem'] = array();
            foreach($this->addItem as $addItem) {
                $json['addItem'][] = $addItem->jsonSerialize();
            }
        }
        if (0 < count($this->error)) {
            $json['error'] = array();
            foreach($this->error as $error) {
                $json['error'][] = $error->jsonSerialize();
            }
        }
        if (null !== $this->totalCost) $json['totalCost'] = $this->totalCost->jsonSerialize();
        if (null !== $this->unallocDeductable) $json['unallocDeductable'] = $this->unallocDeductable->jsonSerialize();
        if (null !== $this->totalBenefit) $json['totalBenefit'] = $this->totalBenefit->jsonSerialize();
        if (null !== $this->payment) $json['payment'] = $this->payment->jsonSerialize();
        if (null !== $this->reserved) $json['reserved'] = $this->reserved->jsonSerialize();
        if (null !== $this->form) $json['form'] = $this->form->jsonSerialize();
        if (0 < count($this->note)) {
            $json['note'] = array();
            foreach($this->note as $note) {
                $json['note'][] = $note->jsonSerialize();
            }
        }
        if (0 < count($this->coverage)) {
            $json['coverage'] = array();
            foreach($this->coverage as $coverage) {
                $json['coverage'][] = $coverage->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ClaimResponse xmlns="http://hl7.org/fhir"></ClaimResponse>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (null !== $this->requestIdentifier) $this->requestIdentifier->xmlSerialize(true, $sxe->addChild('requestIdentifier'));
        if (null !== $this->requestReference) $this->requestReference->xmlSerialize(true, $sxe->addChild('requestReference'));
        if (null !== $this->ruleset) $this->ruleset->xmlSerialize(true, $sxe->addChild('ruleset'));
        if (null !== $this->originalRuleset) $this->originalRuleset->xmlSerialize(true, $sxe->addChild('originalRuleset'));
        if (null !== $this->created) $this->created->xmlSerialize(true, $sxe->addChild('created'));
        if (null !== $this->organizationIdentifier) $this->organizationIdentifier->xmlSerialize(true, $sxe->addChild('organizationIdentifier'));
        if (null !== $this->organizationReference) $this->organizationReference->xmlSerialize(true, $sxe->addChild('organizationReference'));
        if (null !== $this->requestProviderIdentifier) $this->requestProviderIdentifier->xmlSerialize(true, $sxe->addChild('requestProviderIdentifier'));
        if (null !== $this->requestProviderReference) $this->requestProviderReference->xmlSerialize(true, $sxe->addChild('requestProviderReference'));
        if (null !== $this->requestOrganizationIdentifier) $this->requestOrganizationIdentifier->xmlSerialize(true, $sxe->addChild('requestOrganizationIdentifier'));
        if (null !== $this->requestOrganizationReference) $this->requestOrganizationReference->xmlSerialize(true, $sxe->addChild('requestOrganizationReference'));
        if (null !== $this->outcome) $this->outcome->xmlSerialize(true, $sxe->addChild('outcome'));
        if (null !== $this->disposition) $this->disposition->xmlSerialize(true, $sxe->addChild('disposition'));
        if (null !== $this->payeeType) $this->payeeType->xmlSerialize(true, $sxe->addChild('payeeType'));
        if (0 < count($this->item)) {
            foreach($this->item as $item) {
                $item->xmlSerialize(true, $sxe->addChild('item'));
            }
        }
        if (0 < count($this->addItem)) {
            foreach($this->addItem as $addItem) {
                $addItem->xmlSerialize(true, $sxe->addChild('addItem'));
            }
        }
        if (0 < count($this->error)) {
            foreach($this->error as $error) {
                $error->xmlSerialize(true, $sxe->addChild('error'));
            }
        }
        if (null !== $this->totalCost) $this->totalCost->xmlSerialize(true, $sxe->addChild('totalCost'));
        if (null !== $this->unallocDeductable) $this->unallocDeductable->xmlSerialize(true, $sxe->addChild('unallocDeductable'));
        if (null !== $this->totalBenefit) $this->totalBenefit->xmlSerialize(true, $sxe->addChild('totalBenefit'));
        if (null !== $this->payment) $this->payment->xmlSerialize(true, $sxe->addChild('payment'));
        if (null !== $this->reserved) $this->reserved->xmlSerialize(true, $sxe->addChild('reserved'));
        if (null !== $this->form) $this->form->xmlSerialize(true, $sxe->addChild('form'));
        if (0 < count($this->note)) {
            foreach($this->note as $note) {
                $note->xmlSerialize(true, $sxe->addChild('note'));
            }
        }
        if (0 < count($this->coverage)) {
            foreach($this->coverage as $coverage) {
                $coverage->xmlSerialize(true, $sxe->addChild('coverage'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}