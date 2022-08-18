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
 * This resource provides: the claim details; adjudication details from the processing of a Claim; and optionally account balance information, for informing the subscriber of the benefits provided.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRExplanationOfBenefit extends FHIRDomainResource implements JsonSerializable
{
    /**
     * The EOB Business Identifier.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * The status of the resource instance.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRExplanationOfBenefitStatus
     */
    public $status = null;

    /**
     * The insurer which is responsible for the explanation of benefit. (choose any one of author*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $authorIdentifier = null;

    /**
     * The insurer which is responsible for the explanation of benefit. (choose any one of author*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $authorReference = null;

    /**
     * The business identifier for the instance: invoice number, claim number, pre-determination or pre-authorization number. (choose any one of claim*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $claimIdentifier = null;

    /**
     * The business identifier for the instance: invoice number, claim number, pre-determination or pre-authorization number. (choose any one of claim*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $claimReference = null;

    /**
     * The business identifier for the instance: invoice number, claim number, pre-determination or pre-authorization number. (choose any one of claimResponse*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $claimResponseIdentifier = null;

    /**
     * The business identifier for the instance: invoice number, claim number, pre-determination or pre-authorization number. (choose any one of claimResponse*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $claimResponseReference = null;

    /**
     * The category of claim, eg, oral, pharmacy, vision, insitutional, professional.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $type = null;

    /**
     * A finer grained suite of claim subtype codes which may convey Inpatient vs Outpatient and/or a specialty service. In the US the BillType.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding[]
     */
    public $subType = array();

    /**
     * The version of the specification on which this instance relies.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $ruleset = null;

    /**
     * The version of the specification from which the original instance was created.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $originalRuleset = null;

    /**
     * The date when the EOB was created.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $created = null;

    /**
     * The billable period for which charges are being submitted.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public $billablePeriod = null;

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
     * The provider which is responsible for the claim. (choose any one of provider*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $providerIdentifier = null;

    /**
     * The provider which is responsible for the claim. (choose any one of provider*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $providerReference = null;

    /**
     * The provider which is responsible for the claim. (choose any one of organization*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $organizationIdentifier = null;

    /**
     * The provider which is responsible for the claim. (choose any one of organization*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $organizationReference = null;

    /**
     * Facility where the services were provided. (choose any one of facility*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $facilityIdentifier = null;

    /**
     * Facility where the services were provided. (choose any one of facility*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $facilityReference = null;

    /**
     * Other claims which are related to this claim such as prior claim versions or for related services.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitRelated[]
     */
    public $related = array();

    /**
     * Prescription to support the dispensing of Pharmacy or Vision products. (choose any one of prescription*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $prescriptionIdentifier = null;

    /**
     * Prescription to support the dispensing of Pharmacy or Vision products. (choose any one of prescription*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $prescriptionReference = null;

    /**
     * Original prescription which has been superceded by this prescription to support the dispensing of pharmacy services, medications or products. (choose any one of originalPrescription*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $originalPrescriptionIdentifier = null;

    /**
     * Original prescription which has been superceded by this prescription to support the dispensing of pharmacy services, medications or products. (choose any one of originalPrescription*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $originalPrescriptionReference = null;

    /**
     * The party to be reimbursed for the services.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitPayee
     */
    public $payee = null;

    /**
     * The referral resource which lists the date, practitioner, reason and other supporting information. (choose any one of referral*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $referralIdentifier = null;

    /**
     * The referral resource which lists the date, practitioner, reason and other supporting information. (choose any one of referral*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $referralReference = null;

    /**
     * Additional information codes regarding exceptions, special considerations, the condition, situation, prior or concurrent issues. Often there are mutiple jurisdiction specific valuesets which are required.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitInformation[]
     */
    public $information = array();

    /**
     * Ordered list of patient diagnosis for which care is sought.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitDiagnosis[]
     */
    public $diagnosis = array();

    /**
     * Ordered list of patient procedures performed to support the adjudication.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitProcedure[]
     */
    public $procedure = array();

    /**
     * Patient Resource. (choose any one of patient*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $patientIdentifier = null;

    /**
     * Patient Resource. (choose any one of patient*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $patientReference = null;

    /**
     * Precedence (primary, secondary, etc.).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPositiveInt
     */
    public $precedence = null;

    /**
     * Financial instrument by which payment information for health care.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitCoverage
     */
    public $coverage = null;

    /**
     * An accident which resulted in the need for healthcare services.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitAccident
     */
    public $accident = null;

    /**
     * The start and optional end dates of when the patient was precluded from working due to the treatable condition(s).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public $employmentImpacted = null;

    /**
     * The start and optional end dates of when the patient was confined to a treatment center.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public $hospitalization = null;

    /**
     * First tier of goods and services.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitItem[]
     */
    public $item = array();

    /**
     * The first tier service adjudications for payor added services.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitAddItem[]
     */
    public $addItem = array();

    /**
     * A list of teeth which would be expected but are not found due to having been previously  extracted or for other reasons.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitMissingTeeth[]
     */
    public $missingTeeth = array();

    /**
     * The total cost of the services reported.
     * @var \FHIR_STU_THREE\FHIRMoney
     */
    public $totalCost = null;

    /**
     * The amount of deductable applied which was not allocated to any particular service line.
     * @var \FHIR_STU_THREE\FHIRMoney
     */
    public $unallocDeductable = null;

    /**
     * Total amount of benefit payable (Equal to sum of the Benefit amounts from all detail lines and additions less the Unallocated Deductable).
     * @var \FHIR_STU_THREE\FHIRMoney
     */
    public $totalBenefit = null;

    /**
     * Payment details for the claim if the claim has been paid.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitPayment
     */
    public $payment = null;

    /**
     * The form to be used for printing the content.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $form = null;

    /**
     * Note text.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitNote[]
     */
    public $note = array();

    /**
     * Balance by Benefit Category.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitBenefitBalance[]
     */
    public $benefitBalance = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'ExplanationOfBenefit';

    /**
     * The EOB Business Identifier.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * The EOB Business Identifier.
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
     * @return \FHIR_STU_THREE\FHIRElement\FHIRExplanationOfBenefitStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status of the resource instance.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRExplanationOfBenefitStatus $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * The insurer which is responsible for the explanation of benefit. (choose any one of author*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getAuthorIdentifier()
    {
        return $this->authorIdentifier;
    }

    /**
     * The insurer which is responsible for the explanation of benefit. (choose any one of author*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $authorIdentifier
     * @return $this
     */
    public function setAuthorIdentifier($authorIdentifier)
    {
        $this->authorIdentifier = $authorIdentifier;
        return $this;
    }

    /**
     * The insurer which is responsible for the explanation of benefit. (choose any one of author*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getAuthorReference()
    {
        return $this->authorReference;
    }

    /**
     * The insurer which is responsible for the explanation of benefit. (choose any one of author*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $authorReference
     * @return $this
     */
    public function setAuthorReference($authorReference)
    {
        $this->authorReference = $authorReference;
        return $this;
    }

    /**
     * The business identifier for the instance: invoice number, claim number, pre-determination or pre-authorization number. (choose any one of claim*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getClaimIdentifier()
    {
        return $this->claimIdentifier;
    }

    /**
     * The business identifier for the instance: invoice number, claim number, pre-determination or pre-authorization number. (choose any one of claim*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $claimIdentifier
     * @return $this
     */
    public function setClaimIdentifier($claimIdentifier)
    {
        $this->claimIdentifier = $claimIdentifier;
        return $this;
    }

    /**
     * The business identifier for the instance: invoice number, claim number, pre-determination or pre-authorization number. (choose any one of claim*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getClaimReference()
    {
        return $this->claimReference;
    }

    /**
     * The business identifier for the instance: invoice number, claim number, pre-determination or pre-authorization number. (choose any one of claim*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $claimReference
     * @return $this
     */
    public function setClaimReference($claimReference)
    {
        $this->claimReference = $claimReference;
        return $this;
    }

    /**
     * The business identifier for the instance: invoice number, claim number, pre-determination or pre-authorization number. (choose any one of claimResponse*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getClaimResponseIdentifier()
    {
        return $this->claimResponseIdentifier;
    }

    /**
     * The business identifier for the instance: invoice number, claim number, pre-determination or pre-authorization number. (choose any one of claimResponse*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $claimResponseIdentifier
     * @return $this
     */
    public function setClaimResponseIdentifier($claimResponseIdentifier)
    {
        $this->claimResponseIdentifier = $claimResponseIdentifier;
        return $this;
    }

    /**
     * The business identifier for the instance: invoice number, claim number, pre-determination or pre-authorization number. (choose any one of claimResponse*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getClaimResponseReference()
    {
        return $this->claimResponseReference;
    }

    /**
     * The business identifier for the instance: invoice number, claim number, pre-determination or pre-authorization number. (choose any one of claimResponse*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $claimResponseReference
     * @return $this
     */
    public function setClaimResponseReference($claimResponseReference)
    {
        $this->claimResponseReference = $claimResponseReference;
        return $this;
    }

    /**
     * The category of claim, eg, oral, pharmacy, vision, insitutional, professional.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * The category of claim, eg, oral, pharmacy, vision, insitutional, professional.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * A finer grained suite of claim subtype codes which may convey Inpatient vs Outpatient and/or a specialty service. In the US the BillType.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding[]
     */
    public function getSubType()
    {
        return $this->subType;
    }

    /**
     * A finer grained suite of claim subtype codes which may convey Inpatient vs Outpatient and/or a specialty service. In the US the BillType.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding[] $subType
     * @return $this
     */
    public function addSubType($subType)
    {
        $this->subType[] = $subType;
        return $this;
    }

    /**
     * The version of the specification on which this instance relies.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getRuleset()
    {
        return $this->ruleset;
    }

    /**
     * The version of the specification on which this instance relies.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $ruleset
     * @return $this
     */
    public function setRuleset($ruleset)
    {
        $this->ruleset = $ruleset;
        return $this;
    }

    /**
     * The version of the specification from which the original instance was created.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getOriginalRuleset()
    {
        return $this->originalRuleset;
    }

    /**
     * The version of the specification from which the original instance was created.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $originalRuleset
     * @return $this
     */
    public function setOriginalRuleset($originalRuleset)
    {
        $this->originalRuleset = $originalRuleset;
        return $this;
    }

    /**
     * The date when the EOB was created.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * The date when the EOB was created.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $created
     * @return $this
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * The billable period for which charges are being submitted.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public function getBillablePeriod()
    {
        return $this->billablePeriod;
    }

    /**
     * The billable period for which charges are being submitted.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPeriod $billablePeriod
     * @return $this
     */
    public function setBillablePeriod($billablePeriod)
    {
        $this->billablePeriod = $billablePeriod;
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
     * The provider which is responsible for the claim. (choose any one of provider*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getProviderIdentifier()
    {
        return $this->providerIdentifier;
    }

    /**
     * The provider which is responsible for the claim. (choose any one of provider*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $providerIdentifier
     * @return $this
     */
    public function setProviderIdentifier($providerIdentifier)
    {
        $this->providerIdentifier = $providerIdentifier;
        return $this;
    }

    /**
     * The provider which is responsible for the claim. (choose any one of provider*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getProviderReference()
    {
        return $this->providerReference;
    }

    /**
     * The provider which is responsible for the claim. (choose any one of provider*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $providerReference
     * @return $this
     */
    public function setProviderReference($providerReference)
    {
        $this->providerReference = $providerReference;
        return $this;
    }

    /**
     * The provider which is responsible for the claim. (choose any one of organization*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getOrganizationIdentifier()
    {
        return $this->organizationIdentifier;
    }

    /**
     * The provider which is responsible for the claim. (choose any one of organization*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $organizationIdentifier
     * @return $this
     */
    public function setOrganizationIdentifier($organizationIdentifier)
    {
        $this->organizationIdentifier = $organizationIdentifier;
        return $this;
    }

    /**
     * The provider which is responsible for the claim. (choose any one of organization*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getOrganizationReference()
    {
        return $this->organizationReference;
    }

    /**
     * The provider which is responsible for the claim. (choose any one of organization*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $organizationReference
     * @return $this
     */
    public function setOrganizationReference($organizationReference)
    {
        $this->organizationReference = $organizationReference;
        return $this;
    }

    /**
     * Facility where the services were provided. (choose any one of facility*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getFacilityIdentifier()
    {
        return $this->facilityIdentifier;
    }

    /**
     * Facility where the services were provided. (choose any one of facility*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $facilityIdentifier
     * @return $this
     */
    public function setFacilityIdentifier($facilityIdentifier)
    {
        $this->facilityIdentifier = $facilityIdentifier;
        return $this;
    }

    /**
     * Facility where the services were provided. (choose any one of facility*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getFacilityReference()
    {
        return $this->facilityReference;
    }

    /**
     * Facility where the services were provided. (choose any one of facility*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $facilityReference
     * @return $this
     */
    public function setFacilityReference($facilityReference)
    {
        $this->facilityReference = $facilityReference;
        return $this;
    }

    /**
     * Other claims which are related to this claim such as prior claim versions or for related services.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitRelated[]
     */
    public function getRelated()
    {
        return $this->related;
    }

    /**
     * Other claims which are related to this claim such as prior claim versions or for related services.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitRelated[] $related
     * @return $this
     */
    public function addRelated($related)
    {
        $this->related[] = $related;
        return $this;
    }

    /**
     * Prescription to support the dispensing of Pharmacy or Vision products. (choose any one of prescription*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getPrescriptionIdentifier()
    {
        return $this->prescriptionIdentifier;
    }

    /**
     * Prescription to support the dispensing of Pharmacy or Vision products. (choose any one of prescription*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $prescriptionIdentifier
     * @return $this
     */
    public function setPrescriptionIdentifier($prescriptionIdentifier)
    {
        $this->prescriptionIdentifier = $prescriptionIdentifier;
        return $this;
    }

    /**
     * Prescription to support the dispensing of Pharmacy or Vision products. (choose any one of prescription*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getPrescriptionReference()
    {
        return $this->prescriptionReference;
    }

    /**
     * Prescription to support the dispensing of Pharmacy or Vision products. (choose any one of prescription*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $prescriptionReference
     * @return $this
     */
    public function setPrescriptionReference($prescriptionReference)
    {
        $this->prescriptionReference = $prescriptionReference;
        return $this;
    }

    /**
     * Original prescription which has been superceded by this prescription to support the dispensing of pharmacy services, medications or products. (choose any one of originalPrescription*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getOriginalPrescriptionIdentifier()
    {
        return $this->originalPrescriptionIdentifier;
    }

    /**
     * Original prescription which has been superceded by this prescription to support the dispensing of pharmacy services, medications or products. (choose any one of originalPrescription*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $originalPrescriptionIdentifier
     * @return $this
     */
    public function setOriginalPrescriptionIdentifier($originalPrescriptionIdentifier)
    {
        $this->originalPrescriptionIdentifier = $originalPrescriptionIdentifier;
        return $this;
    }

    /**
     * Original prescription which has been superceded by this prescription to support the dispensing of pharmacy services, medications or products. (choose any one of originalPrescription*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getOriginalPrescriptionReference()
    {
        return $this->originalPrescriptionReference;
    }

    /**
     * Original prescription which has been superceded by this prescription to support the dispensing of pharmacy services, medications or products. (choose any one of originalPrescription*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $originalPrescriptionReference
     * @return $this
     */
    public function setOriginalPrescriptionReference($originalPrescriptionReference)
    {
        $this->originalPrescriptionReference = $originalPrescriptionReference;
        return $this;
    }

    /**
     * The party to be reimbursed for the services.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitPayee
     */
    public function getPayee()
    {
        return $this->payee;
    }

    /**
     * The party to be reimbursed for the services.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitPayee $payee
     * @return $this
     */
    public function setPayee($payee)
    {
        $this->payee = $payee;
        return $this;
    }

    /**
     * The referral resource which lists the date, practitioner, reason and other supporting information. (choose any one of referral*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getReferralIdentifier()
    {
        return $this->referralIdentifier;
    }

    /**
     * The referral resource which lists the date, practitioner, reason and other supporting information. (choose any one of referral*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $referralIdentifier
     * @return $this
     */
    public function setReferralIdentifier($referralIdentifier)
    {
        $this->referralIdentifier = $referralIdentifier;
        return $this;
    }

    /**
     * The referral resource which lists the date, practitioner, reason and other supporting information. (choose any one of referral*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getReferralReference()
    {
        return $this->referralReference;
    }

    /**
     * The referral resource which lists the date, practitioner, reason and other supporting information. (choose any one of referral*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $referralReference
     * @return $this
     */
    public function setReferralReference($referralReference)
    {
        $this->referralReference = $referralReference;
        return $this;
    }

    /**
     * Additional information codes regarding exceptions, special considerations, the condition, situation, prior or concurrent issues. Often there are mutiple jurisdiction specific valuesets which are required.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitInformation[]
     */
    public function getInformation()
    {
        return $this->information;
    }

    /**
     * Additional information codes regarding exceptions, special considerations, the condition, situation, prior or concurrent issues. Often there are mutiple jurisdiction specific valuesets which are required.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitInformation[] $information
     * @return $this
     */
    public function addInformation($information)
    {
        $this->information[] = $information;
        return $this;
    }

    /**
     * Ordered list of patient diagnosis for which care is sought.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitDiagnosis[]
     */
    public function getDiagnosis()
    {
        return $this->diagnosis;
    }

    /**
     * Ordered list of patient diagnosis for which care is sought.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitDiagnosis[] $diagnosis
     * @return $this
     */
    public function addDiagnosis($diagnosis)
    {
        $this->diagnosis[] = $diagnosis;
        return $this;
    }

    /**
     * Ordered list of patient procedures performed to support the adjudication.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitProcedure[]
     */
    public function getProcedure()
    {
        return $this->procedure;
    }

    /**
     * Ordered list of patient procedures performed to support the adjudication.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitProcedure[] $procedure
     * @return $this
     */
    public function addProcedure($procedure)
    {
        $this->procedure[] = $procedure;
        return $this;
    }

    /**
     * Patient Resource. (choose any one of patient*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getPatientIdentifier()
    {
        return $this->patientIdentifier;
    }

    /**
     * Patient Resource. (choose any one of patient*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $patientIdentifier
     * @return $this
     */
    public function setPatientIdentifier($patientIdentifier)
    {
        $this->patientIdentifier = $patientIdentifier;
        return $this;
    }

    /**
     * Patient Resource. (choose any one of patient*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getPatientReference()
    {
        return $this->patientReference;
    }

    /**
     * Patient Resource. (choose any one of patient*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $patientReference
     * @return $this
     */
    public function setPatientReference($patientReference)
    {
        $this->patientReference = $patientReference;
        return $this;
    }

    /**
     * Precedence (primary, secondary, etc.).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPositiveInt
     */
    public function getPrecedence()
    {
        return $this->precedence;
    }

    /**
     * Precedence (primary, secondary, etc.).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPositiveInt $precedence
     * @return $this
     */
    public function setPrecedence($precedence)
    {
        $this->precedence = $precedence;
        return $this;
    }

    /**
     * Financial instrument by which payment information for health care.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitCoverage
     */
    public function getCoverage()
    {
        return $this->coverage;
    }

    /**
     * Financial instrument by which payment information for health care.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitCoverage $coverage
     * @return $this
     */
    public function setCoverage($coverage)
    {
        $this->coverage = $coverage;
        return $this;
    }

    /**
     * An accident which resulted in the need for healthcare services.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitAccident
     */
    public function getAccident()
    {
        return $this->accident;
    }

    /**
     * An accident which resulted in the need for healthcare services.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitAccident $accident
     * @return $this
     */
    public function setAccident($accident)
    {
        $this->accident = $accident;
        return $this;
    }

    /**
     * The start and optional end dates of when the patient was precluded from working due to the treatable condition(s).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public function getEmploymentImpacted()
    {
        return $this->employmentImpacted;
    }

    /**
     * The start and optional end dates of when the patient was precluded from working due to the treatable condition(s).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPeriod $employmentImpacted
     * @return $this
     */
    public function setEmploymentImpacted($employmentImpacted)
    {
        $this->employmentImpacted = $employmentImpacted;
        return $this;
    }

    /**
     * The start and optional end dates of when the patient was confined to a treatment center.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public function getHospitalization()
    {
        return $this->hospitalization;
    }

    /**
     * The start and optional end dates of when the patient was confined to a treatment center.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPeriod $hospitalization
     * @return $this
     */
    public function setHospitalization($hospitalization)
    {
        $this->hospitalization = $hospitalization;
        return $this;
    }

    /**
     * First tier of goods and services.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitItem[]
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * First tier of goods and services.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitItem[] $item
     * @return $this
     */
    public function addItem($item)
    {
        $this->item[] = $item;
        return $this;
    }

    /**
     * The first tier service adjudications for payor added services.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitAddItem[]
     */
    public function getAddItem()
    {
        return $this->addItem;
    }

    /**
     * The first tier service adjudications for payor added services.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitAddItem[] $addItem
     * @return $this
     */
    public function addAddItem($addItem)
    {
        $this->addItem[] = $addItem;
        return $this;
    }

    /**
     * A list of teeth which would be expected but are not found due to having been previously  extracted or for other reasons.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitMissingTeeth[]
     */
    public function getMissingTeeth()
    {
        return $this->missingTeeth;
    }

    /**
     * A list of teeth which would be expected but are not found due to having been previously  extracted or for other reasons.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitMissingTeeth[] $missingTeeth
     * @return $this
     */
    public function addMissingTeeth($missingTeeth)
    {
        $this->missingTeeth[] = $missingTeeth;
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
     * The amount of deductable applied which was not allocated to any particular service line.
     * @return \FHIR_STU_THREE\FHIRMoney
     */
    public function getUnallocDeductable()
    {
        return $this->unallocDeductable;
    }

    /**
     * The amount of deductable applied which was not allocated to any particular service line.
     * @param \FHIR_STU_THREE\FHIRMoney $unallocDeductable
     * @return $this
     */
    public function setUnallocDeductable($unallocDeductable)
    {
        $this->unallocDeductable = $unallocDeductable;
        return $this;
    }

    /**
     * Total amount of benefit payable (Equal to sum of the Benefit amounts from all detail lines and additions less the Unallocated Deductable).
     * @return \FHIR_STU_THREE\FHIRMoney
     */
    public function getTotalBenefit()
    {
        return $this->totalBenefit;
    }

    /**
     * Total amount of benefit payable (Equal to sum of the Benefit amounts from all detail lines and additions less the Unallocated Deductable).
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
     * @return \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitPayment
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * Payment details for the claim if the claim has been paid.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitPayment $payment
     * @return $this
     */
    public function setPayment($payment)
    {
        $this->payment = $payment;
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
     * @return \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitNote[]
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Note text.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitNote[] $note
     * @return $this
     */
    public function addNote($note)
    {
        $this->note[] = $note;
        return $this;
    }

    /**
     * Balance by Benefit Category.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitBenefitBalance[]
     */
    public function getBenefitBalance()
    {
        return $this->benefitBalance;
    }

    /**
     * Balance by Benefit Category.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit\FHIRExplanationOfBenefitBenefitBalance[] $benefitBalance
     * @return $this
     */
    public function addBenefitBalance($benefitBalance)
    {
        $this->benefitBalance[] = $benefitBalance;
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
        if (null !== $this->authorIdentifier) $json['authorIdentifier'] = $this->authorIdentifier->jsonSerialize();
        if (null !== $this->authorReference) $json['authorReference'] = $this->authorReference->jsonSerialize();
        if (null !== $this->claimIdentifier) $json['claimIdentifier'] = $this->claimIdentifier->jsonSerialize();
        if (null !== $this->claimReference) $json['claimReference'] = $this->claimReference->jsonSerialize();
        if (null !== $this->claimResponseIdentifier) $json['claimResponseIdentifier'] = $this->claimResponseIdentifier->jsonSerialize();
        if (null !== $this->claimResponseReference) $json['claimResponseReference'] = $this->claimResponseReference->jsonSerialize();
        if (null !== $this->type) $json['type'] = $this->type->jsonSerialize();
        if (0 < count($this->subType)) {
            $json['subType'] = array();
            foreach($this->subType as $subType) {
                $json['subType'][] = $subType->jsonSerialize();
            }
        }
        if (null !== $this->ruleset) $json['ruleset'] = $this->ruleset->jsonSerialize();
        if (null !== $this->originalRuleset) $json['originalRuleset'] = $this->originalRuleset->jsonSerialize();
        if (null !== $this->created) $json['created'] = $this->created->jsonSerialize();
        if (null !== $this->billablePeriod) $json['billablePeriod'] = $this->billablePeriod->jsonSerialize();
        if (null !== $this->outcome) $json['outcome'] = $this->outcome->jsonSerialize();
        if (null !== $this->disposition) $json['disposition'] = $this->disposition->jsonSerialize();
        if (null !== $this->providerIdentifier) $json['providerIdentifier'] = $this->providerIdentifier->jsonSerialize();
        if (null !== $this->providerReference) $json['providerReference'] = $this->providerReference->jsonSerialize();
        if (null !== $this->organizationIdentifier) $json['organizationIdentifier'] = $this->organizationIdentifier->jsonSerialize();
        if (null !== $this->organizationReference) $json['organizationReference'] = $this->organizationReference->jsonSerialize();
        if (null !== $this->facilityIdentifier) $json['facilityIdentifier'] = $this->facilityIdentifier->jsonSerialize();
        if (null !== $this->facilityReference) $json['facilityReference'] = $this->facilityReference->jsonSerialize();
        if (0 < count($this->related)) {
            $json['related'] = array();
            foreach($this->related as $related) {
                $json['related'][] = $related->jsonSerialize();
            }
        }
        if (null !== $this->prescriptionIdentifier) $json['prescriptionIdentifier'] = $this->prescriptionIdentifier->jsonSerialize();
        if (null !== $this->prescriptionReference) $json['prescriptionReference'] = $this->prescriptionReference->jsonSerialize();
        if (null !== $this->originalPrescriptionIdentifier) $json['originalPrescriptionIdentifier'] = $this->originalPrescriptionIdentifier->jsonSerialize();
        if (null !== $this->originalPrescriptionReference) $json['originalPrescriptionReference'] = $this->originalPrescriptionReference->jsonSerialize();
        if (null !== $this->payee) $json['payee'] = $this->payee->jsonSerialize();
        if (null !== $this->referralIdentifier) $json['referralIdentifier'] = $this->referralIdentifier->jsonSerialize();
        if (null !== $this->referralReference) $json['referralReference'] = $this->referralReference->jsonSerialize();
        if (0 < count($this->information)) {
            $json['information'] = array();
            foreach($this->information as $information) {
                $json['information'][] = $information->jsonSerialize();
            }
        }
        if (0 < count($this->diagnosis)) {
            $json['diagnosis'] = array();
            foreach($this->diagnosis as $diagnosis) {
                $json['diagnosis'][] = $diagnosis->jsonSerialize();
            }
        }
        if (0 < count($this->procedure)) {
            $json['procedure'] = array();
            foreach($this->procedure as $procedure) {
                $json['procedure'][] = $procedure->jsonSerialize();
            }
        }
        if (null !== $this->patientIdentifier) $json['patientIdentifier'] = $this->patientIdentifier->jsonSerialize();
        if (null !== $this->patientReference) $json['patientReference'] = $this->patientReference->jsonSerialize();
        if (null !== $this->precedence) $json['precedence'] = $this->precedence->jsonSerialize();
        if (null !== $this->coverage) $json['coverage'] = $this->coverage->jsonSerialize();
        if (null !== $this->accident) $json['accident'] = $this->accident->jsonSerialize();
        if (null !== $this->employmentImpacted) $json['employmentImpacted'] = $this->employmentImpacted->jsonSerialize();
        if (null !== $this->hospitalization) $json['hospitalization'] = $this->hospitalization->jsonSerialize();
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
        if (0 < count($this->missingTeeth)) {
            $json['missingTeeth'] = array();
            foreach($this->missingTeeth as $missingTeeth) {
                $json['missingTeeth'][] = $missingTeeth->jsonSerialize();
            }
        }
        if (null !== $this->totalCost) $json['totalCost'] = $this->totalCost->jsonSerialize();
        if (null !== $this->unallocDeductable) $json['unallocDeductable'] = $this->unallocDeductable->jsonSerialize();
        if (null !== $this->totalBenefit) $json['totalBenefit'] = $this->totalBenefit->jsonSerialize();
        if (null !== $this->payment) $json['payment'] = $this->payment->jsonSerialize();
        if (null !== $this->form) $json['form'] = $this->form->jsonSerialize();
        if (0 < count($this->note)) {
            $json['note'] = array();
            foreach($this->note as $note) {
                $json['note'][] = $note->jsonSerialize();
            }
        }
        if (0 < count($this->benefitBalance)) {
            $json['benefitBalance'] = array();
            foreach($this->benefitBalance as $benefitBalance) {
                $json['benefitBalance'][] = $benefitBalance->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ExplanationOfBenefit xmlns="http://hl7.org/fhir"></ExplanationOfBenefit>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (null !== $this->authorIdentifier) $this->authorIdentifier->xmlSerialize(true, $sxe->addChild('authorIdentifier'));
        if (null !== $this->authorReference) $this->authorReference->xmlSerialize(true, $sxe->addChild('authorReference'));
        if (null !== $this->claimIdentifier) $this->claimIdentifier->xmlSerialize(true, $sxe->addChild('claimIdentifier'));
        if (null !== $this->claimReference) $this->claimReference->xmlSerialize(true, $sxe->addChild('claimReference'));
        if (null !== $this->claimResponseIdentifier) $this->claimResponseIdentifier->xmlSerialize(true, $sxe->addChild('claimResponseIdentifier'));
        if (null !== $this->claimResponseReference) $this->claimResponseReference->xmlSerialize(true, $sxe->addChild('claimResponseReference'));
        if (null !== $this->type) $this->type->xmlSerialize(true, $sxe->addChild('type'));
        if (0 < count($this->subType)) {
            foreach($this->subType as $subType) {
                $subType->xmlSerialize(true, $sxe->addChild('subType'));
            }
        }
        if (null !== $this->ruleset) $this->ruleset->xmlSerialize(true, $sxe->addChild('ruleset'));
        if (null !== $this->originalRuleset) $this->originalRuleset->xmlSerialize(true, $sxe->addChild('originalRuleset'));
        if (null !== $this->created) $this->created->xmlSerialize(true, $sxe->addChild('created'));
        if (null !== $this->billablePeriod) $this->billablePeriod->xmlSerialize(true, $sxe->addChild('billablePeriod'));
        if (null !== $this->outcome) $this->outcome->xmlSerialize(true, $sxe->addChild('outcome'));
        if (null !== $this->disposition) $this->disposition->xmlSerialize(true, $sxe->addChild('disposition'));
        if (null !== $this->providerIdentifier) $this->providerIdentifier->xmlSerialize(true, $sxe->addChild('providerIdentifier'));
        if (null !== $this->providerReference) $this->providerReference->xmlSerialize(true, $sxe->addChild('providerReference'));
        if (null !== $this->organizationIdentifier) $this->organizationIdentifier->xmlSerialize(true, $sxe->addChild('organizationIdentifier'));
        if (null !== $this->organizationReference) $this->organizationReference->xmlSerialize(true, $sxe->addChild('organizationReference'));
        if (null !== $this->facilityIdentifier) $this->facilityIdentifier->xmlSerialize(true, $sxe->addChild('facilityIdentifier'));
        if (null !== $this->facilityReference) $this->facilityReference->xmlSerialize(true, $sxe->addChild('facilityReference'));
        if (0 < count($this->related)) {
            foreach($this->related as $related) {
                $related->xmlSerialize(true, $sxe->addChild('related'));
            }
        }
        if (null !== $this->prescriptionIdentifier) $this->prescriptionIdentifier->xmlSerialize(true, $sxe->addChild('prescriptionIdentifier'));
        if (null !== $this->prescriptionReference) $this->prescriptionReference->xmlSerialize(true, $sxe->addChild('prescriptionReference'));
        if (null !== $this->originalPrescriptionIdentifier) $this->originalPrescriptionIdentifier->xmlSerialize(true, $sxe->addChild('originalPrescriptionIdentifier'));
        if (null !== $this->originalPrescriptionReference) $this->originalPrescriptionReference->xmlSerialize(true, $sxe->addChild('originalPrescriptionReference'));
        if (null !== $this->payee) $this->payee->xmlSerialize(true, $sxe->addChild('payee'));
        if (null !== $this->referralIdentifier) $this->referralIdentifier->xmlSerialize(true, $sxe->addChild('referralIdentifier'));
        if (null !== $this->referralReference) $this->referralReference->xmlSerialize(true, $sxe->addChild('referralReference'));
        if (0 < count($this->information)) {
            foreach($this->information as $information) {
                $information->xmlSerialize(true, $sxe->addChild('information'));
            }
        }
        if (0 < count($this->diagnosis)) {
            foreach($this->diagnosis as $diagnosis) {
                $diagnosis->xmlSerialize(true, $sxe->addChild('diagnosis'));
            }
        }
        if (0 < count($this->procedure)) {
            foreach($this->procedure as $procedure) {
                $procedure->xmlSerialize(true, $sxe->addChild('procedure'));
            }
        }
        if (null !== $this->patientIdentifier) $this->patientIdentifier->xmlSerialize(true, $sxe->addChild('patientIdentifier'));
        if (null !== $this->patientReference) $this->patientReference->xmlSerialize(true, $sxe->addChild('patientReference'));
        if (null !== $this->precedence) $this->precedence->xmlSerialize(true, $sxe->addChild('precedence'));
        if (null !== $this->coverage) $this->coverage->xmlSerialize(true, $sxe->addChild('coverage'));
        if (null !== $this->accident) $this->accident->xmlSerialize(true, $sxe->addChild('accident'));
        if (null !== $this->employmentImpacted) $this->employmentImpacted->xmlSerialize(true, $sxe->addChild('employmentImpacted'));
        if (null !== $this->hospitalization) $this->hospitalization->xmlSerialize(true, $sxe->addChild('hospitalization'));
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
        if (0 < count($this->missingTeeth)) {
            foreach($this->missingTeeth as $missingTeeth) {
                $missingTeeth->xmlSerialize(true, $sxe->addChild('missingTeeth'));
            }
        }
        if (null !== $this->totalCost) $this->totalCost->xmlSerialize(true, $sxe->addChild('totalCost'));
        if (null !== $this->unallocDeductable) $this->unallocDeductable->xmlSerialize(true, $sxe->addChild('unallocDeductable'));
        if (null !== $this->totalBenefit) $this->totalBenefit->xmlSerialize(true, $sxe->addChild('totalBenefit'));
        if (null !== $this->payment) $this->payment->xmlSerialize(true, $sxe->addChild('payment'));
        if (null !== $this->form) $this->form->xmlSerialize(true, $sxe->addChild('form'));
        if (0 < count($this->note)) {
            foreach($this->note as $note) {
                $note->xmlSerialize(true, $sxe->addChild('note'));
            }
        }
        if (0 < count($this->benefitBalance)) {
            foreach($this->benefitBalance as $benefitBalance) {
                $benefitBalance->xmlSerialize(true, $sxe->addChild('benefitBalance'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}