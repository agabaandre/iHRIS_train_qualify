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
 * Financial instrument which may be used to pay for or reimburse health care products and services.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRCoverage extends FHIRDomainResource implements JsonSerializable
{
    /**
     * The status of the resource instance.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoverageStatus
     */
    public $status = null;

    /**
     * The program or plan underwriter or payor including both insurance and non-insurance agreements, such as patient-pay agreements. (choose any one of issuer*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $issuerIdentifier = null;

    /**
     * The program or plan underwriter or payor including both insurance and non-insurance agreements, such as patient-pay agreements. (choose any one of issuer*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $issuerReference = null;

    /**
     * A self, or other, payment agreement not an insurance policy.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public $isAgreement = null;

    /**
     * Business Identification Number (BIN number) used to identify the routing  of eClaims.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $bin = null;

    /**
     * Time period during which the coverage is in force. A missing start date indicates the start date isn't known, a missing end date means the coverage is continuing to be in force.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public $period = null;

    /**
     * The type of coverage: social program, medical plan, accident coverage (workers compensation, auto), group health.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $type = null;

    /**
     * The party who 'owns' the insurance contractual relationship to the policy or to whom the benefit of the policy is due. (choose any one of planholder*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $planholderIdentifier = null;

    /**
     * The party who 'owns' the insurance contractual relationship to the policy or to whom the benefit of the policy is due. (choose any one of planholder*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $planholderReference = null;

    /**
     * The party who benefits from the insurance coverage. (choose any one of beneficiary*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $beneficiaryIdentifier = null;

    /**
     * The party who benefits from the insurance coverage. (choose any one of beneficiary*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $beneficiaryReference = null;

    /**
     * The relationship of beneficiary (patient) (subscriber) to the the planholder.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $relationship = null;

    /**
     * The main (and possibly only) identifier for the coverage - often referred to as a Member Id, Subscriber Id, Certificate number or Personal Health Number or Case ID.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * Identifies a style or collective of coverage issues by the underwriter, for example may be used to identify a class of coverage or employer group. May also be referred to as a Policy or Group ID.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $group = null;

    /**
     * Identifies a style or collective of coverage issues by the underwriter, for example may be used to identify a class of coverage or employer group. May also be referred to as a Policy or Group ID.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $subGroup = null;

    /**
     * Identifies a style or collective of coverage issues by the underwriter, for example may be used to identify a class of coverage or employer group. May also be referred to as a Policy or Group ID.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $plan = null;

    /**
     * Identifies a sub-style or sub-collective of coverage issues by the underwriter, for example may be used to identify a specific employer group within a class of employers. May be referred to as a Section or Division ID.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $subPlan = null;

    /**
     * Identifies a style or collective of coverage issues by the underwriter, for example may be used to identify a class of coverage or employer group.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $class = null;

    /**
     * A unique identifier for a dependent under the coverage.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPositiveInt
     */
    public $dependent = null;

    /**
     * An optional counter for a particular instance of the identified coverage which increments upon each renewal.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPositiveInt
     */
    public $sequence = null;

    /**
     * The identifier for a community of providers.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $network = null;

    /**
     * The policy(s) which constitute this insurance coverage.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $contract = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'Coverage';

    /**
     * The status of the resource instance.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoverageStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status of the resource instance.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoverageStatus $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * The program or plan underwriter or payor including both insurance and non-insurance agreements, such as patient-pay agreements. (choose any one of issuer*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getIssuerIdentifier()
    {
        return $this->issuerIdentifier;
    }

    /**
     * The program or plan underwriter or payor including both insurance and non-insurance agreements, such as patient-pay agreements. (choose any one of issuer*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $issuerIdentifier
     * @return $this
     */
    public function setIssuerIdentifier($issuerIdentifier)
    {
        $this->issuerIdentifier = $issuerIdentifier;
        return $this;
    }

    /**
     * The program or plan underwriter or payor including both insurance and non-insurance agreements, such as patient-pay agreements. (choose any one of issuer*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getIssuerReference()
    {
        return $this->issuerReference;
    }

    /**
     * The program or plan underwriter or payor including both insurance and non-insurance agreements, such as patient-pay agreements. (choose any one of issuer*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $issuerReference
     * @return $this
     */
    public function setIssuerReference($issuerReference)
    {
        $this->issuerReference = $issuerReference;
        return $this;
    }

    /**
     * A self, or other, payment agreement not an insurance policy.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public function getIsAgreement()
    {
        return $this->isAgreement;
    }

    /**
     * A self, or other, payment agreement not an insurance policy.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBoolean $isAgreement
     * @return $this
     */
    public function setIsAgreement($isAgreement)
    {
        $this->isAgreement = $isAgreement;
        return $this;
    }

    /**
     * Business Identification Number (BIN number) used to identify the routing  of eClaims.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getBin()
    {
        return $this->bin;
    }

    /**
     * Business Identification Number (BIN number) used to identify the routing  of eClaims.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $bin
     * @return $this
     */
    public function setBin($bin)
    {
        $this->bin = $bin;
        return $this;
    }

    /**
     * Time period during which the coverage is in force. A missing start date indicates the start date isn't known, a missing end date means the coverage is continuing to be in force.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Time period during which the coverage is in force. A missing start date indicates the start date isn't known, a missing end date means the coverage is continuing to be in force.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPeriod $period
     * @return $this
     */
    public function setPeriod($period)
    {
        $this->period = $period;
        return $this;
    }

    /**
     * The type of coverage: social program, medical plan, accident coverage (workers compensation, auto), group health.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * The type of coverage: social program, medical plan, accident coverage (workers compensation, auto), group health.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * The party who 'owns' the insurance contractual relationship to the policy or to whom the benefit of the policy is due. (choose any one of planholder*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getPlanholderIdentifier()
    {
        return $this->planholderIdentifier;
    }

    /**
     * The party who 'owns' the insurance contractual relationship to the policy or to whom the benefit of the policy is due. (choose any one of planholder*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $planholderIdentifier
     * @return $this
     */
    public function setPlanholderIdentifier($planholderIdentifier)
    {
        $this->planholderIdentifier = $planholderIdentifier;
        return $this;
    }

    /**
     * The party who 'owns' the insurance contractual relationship to the policy or to whom the benefit of the policy is due. (choose any one of planholder*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getPlanholderReference()
    {
        return $this->planholderReference;
    }

    /**
     * The party who 'owns' the insurance contractual relationship to the policy or to whom the benefit of the policy is due. (choose any one of planholder*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $planholderReference
     * @return $this
     */
    public function setPlanholderReference($planholderReference)
    {
        $this->planholderReference = $planholderReference;
        return $this;
    }

    /**
     * The party who benefits from the insurance coverage. (choose any one of beneficiary*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getBeneficiaryIdentifier()
    {
        return $this->beneficiaryIdentifier;
    }

    /**
     * The party who benefits from the insurance coverage. (choose any one of beneficiary*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $beneficiaryIdentifier
     * @return $this
     */
    public function setBeneficiaryIdentifier($beneficiaryIdentifier)
    {
        $this->beneficiaryIdentifier = $beneficiaryIdentifier;
        return $this;
    }

    /**
     * The party who benefits from the insurance coverage. (choose any one of beneficiary*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getBeneficiaryReference()
    {
        return $this->beneficiaryReference;
    }

    /**
     * The party who benefits from the insurance coverage. (choose any one of beneficiary*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $beneficiaryReference
     * @return $this
     */
    public function setBeneficiaryReference($beneficiaryReference)
    {
        $this->beneficiaryReference = $beneficiaryReference;
        return $this;
    }

    /**
     * The relationship of beneficiary (patient) (subscriber) to the the planholder.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getRelationship()
    {
        return $this->relationship;
    }

    /**
     * The relationship of beneficiary (patient) (subscriber) to the the planholder.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $relationship
     * @return $this
     */
    public function setRelationship($relationship)
    {
        $this->relationship = $relationship;
        return $this;
    }

    /**
     * The main (and possibly only) identifier for the coverage - often referred to as a Member Id, Subscriber Id, Certificate number or Personal Health Number or Case ID.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * The main (and possibly only) identifier for the coverage - often referred to as a Member Id, Subscriber Id, Certificate number or Personal Health Number or Case ID.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * Identifies a style or collective of coverage issues by the underwriter, for example may be used to identify a class of coverage or employer group. May also be referred to as a Policy or Group ID.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Identifies a style or collective of coverage issues by the underwriter, for example may be used to identify a class of coverage or employer group. May also be referred to as a Policy or Group ID.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $group
     * @return $this
     */
    public function setGroup($group)
    {
        $this->group = $group;
        return $this;
    }

    /**
     * Identifies a style or collective of coverage issues by the underwriter, for example may be used to identify a class of coverage or employer group. May also be referred to as a Policy or Group ID.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getSubGroup()
    {
        return $this->subGroup;
    }

    /**
     * Identifies a style or collective of coverage issues by the underwriter, for example may be used to identify a class of coverage or employer group. May also be referred to as a Policy or Group ID.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $subGroup
     * @return $this
     */
    public function setSubGroup($subGroup)
    {
        $this->subGroup = $subGroup;
        return $this;
    }

    /**
     * Identifies a style or collective of coverage issues by the underwriter, for example may be used to identify a class of coverage or employer group. May also be referred to as a Policy or Group ID.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * Identifies a style or collective of coverage issues by the underwriter, for example may be used to identify a class of coverage or employer group. May also be referred to as a Policy or Group ID.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $plan
     * @return $this
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;
        return $this;
    }

    /**
     * Identifies a sub-style or sub-collective of coverage issues by the underwriter, for example may be used to identify a specific employer group within a class of employers. May be referred to as a Section or Division ID.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getSubPlan()
    {
        return $this->subPlan;
    }

    /**
     * Identifies a sub-style or sub-collective of coverage issues by the underwriter, for example may be used to identify a specific employer group within a class of employers. May be referred to as a Section or Division ID.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $subPlan
     * @return $this
     */
    public function setSubPlan($subPlan)
    {
        $this->subPlan = $subPlan;
        return $this;
    }

    /**
     * Identifies a style or collective of coverage issues by the underwriter, for example may be used to identify a class of coverage or employer group.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Identifies a style or collective of coverage issues by the underwriter, for example may be used to identify a class of coverage or employer group.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $class
     * @return $this
     */
    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }

    /**
     * A unique identifier for a dependent under the coverage.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPositiveInt
     */
    public function getDependent()
    {
        return $this->dependent;
    }

    /**
     * A unique identifier for a dependent under the coverage.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPositiveInt $dependent
     * @return $this
     */
    public function setDependent($dependent)
    {
        $this->dependent = $dependent;
        return $this;
    }

    /**
     * An optional counter for a particular instance of the identified coverage which increments upon each renewal.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPositiveInt
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * An optional counter for a particular instance of the identified coverage which increments upon each renewal.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPositiveInt $sequence
     * @return $this
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;
        return $this;
    }

    /**
     * The identifier for a community of providers.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getNetwork()
    {
        return $this->network;
    }

    /**
     * The identifier for a community of providers.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $network
     * @return $this
     */
    public function setNetwork($network)
    {
        $this->network = $network;
        return $this;
    }

    /**
     * The policy(s) which constitute this insurance coverage.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * The policy(s) which constitute this insurance coverage.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $contract
     * @return $this
     */
    public function addContract($contract)
    {
        $this->contract[] = $contract;
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
        if (null !== $this->status) $json['status'] = $this->status->jsonSerialize();
        if (null !== $this->issuerIdentifier) $json['issuerIdentifier'] = $this->issuerIdentifier->jsonSerialize();
        if (null !== $this->issuerReference) $json['issuerReference'] = $this->issuerReference->jsonSerialize();
        if (null !== $this->isAgreement) $json['isAgreement'] = $this->isAgreement->jsonSerialize();
        if (null !== $this->bin) $json['bin'] = $this->bin->jsonSerialize();
        if (null !== $this->period) $json['period'] = $this->period->jsonSerialize();
        if (null !== $this->type) $json['type'] = $this->type->jsonSerialize();
        if (null !== $this->planholderIdentifier) $json['planholderIdentifier'] = $this->planholderIdentifier->jsonSerialize();
        if (null !== $this->planholderReference) $json['planholderReference'] = $this->planholderReference->jsonSerialize();
        if (null !== $this->beneficiaryIdentifier) $json['beneficiaryIdentifier'] = $this->beneficiaryIdentifier->jsonSerialize();
        if (null !== $this->beneficiaryReference) $json['beneficiaryReference'] = $this->beneficiaryReference->jsonSerialize();
        if (null !== $this->relationship) $json['relationship'] = $this->relationship->jsonSerialize();
        if (0 < count($this->identifier)) {
            $json['identifier'] = array();
            foreach($this->identifier as $identifier) {
                $json['identifier'][] = $identifier->jsonSerialize();
            }
        }
        if (null !== $this->group) $json['group'] = $this->group->jsonSerialize();
        if (null !== $this->subGroup) $json['subGroup'] = $this->subGroup->jsonSerialize();
        if (null !== $this->plan) $json['plan'] = $this->plan->jsonSerialize();
        if (null !== $this->subPlan) $json['subPlan'] = $this->subPlan->jsonSerialize();
        if (null !== $this->class) $json['class'] = $this->class->jsonSerialize();
        if (null !== $this->dependent) $json['dependent'] = $this->dependent->jsonSerialize();
        if (null !== $this->sequence) $json['sequence'] = $this->sequence->jsonSerialize();
        if (null !== $this->network) $json['network'] = $this->network->jsonSerialize();
        if (0 < count($this->contract)) {
            $json['contract'] = array();
            foreach($this->contract as $contract) {
                $json['contract'][] = $contract->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<Coverage xmlns="http://hl7.org/fhir"></Coverage>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (null !== $this->issuerIdentifier) $this->issuerIdentifier->xmlSerialize(true, $sxe->addChild('issuerIdentifier'));
        if (null !== $this->issuerReference) $this->issuerReference->xmlSerialize(true, $sxe->addChild('issuerReference'));
        if (null !== $this->isAgreement) $this->isAgreement->xmlSerialize(true, $sxe->addChild('isAgreement'));
        if (null !== $this->bin) $this->bin->xmlSerialize(true, $sxe->addChild('bin'));
        if (null !== $this->period) $this->period->xmlSerialize(true, $sxe->addChild('period'));
        if (null !== $this->type) $this->type->xmlSerialize(true, $sxe->addChild('type'));
        if (null !== $this->planholderIdentifier) $this->planholderIdentifier->xmlSerialize(true, $sxe->addChild('planholderIdentifier'));
        if (null !== $this->planholderReference) $this->planholderReference->xmlSerialize(true, $sxe->addChild('planholderReference'));
        if (null !== $this->beneficiaryIdentifier) $this->beneficiaryIdentifier->xmlSerialize(true, $sxe->addChild('beneficiaryIdentifier'));
        if (null !== $this->beneficiaryReference) $this->beneficiaryReference->xmlSerialize(true, $sxe->addChild('beneficiaryReference'));
        if (null !== $this->relationship) $this->relationship->xmlSerialize(true, $sxe->addChild('relationship'));
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (null !== $this->group) $this->group->xmlSerialize(true, $sxe->addChild('group'));
        if (null !== $this->subGroup) $this->subGroup->xmlSerialize(true, $sxe->addChild('subGroup'));
        if (null !== $this->plan) $this->plan->xmlSerialize(true, $sxe->addChild('plan'));
        if (null !== $this->subPlan) $this->subPlan->xmlSerialize(true, $sxe->addChild('subPlan'));
        if (null !== $this->class) $this->class->xmlSerialize(true, $sxe->addChild('class'));
        if (null !== $this->dependent) $this->dependent->xmlSerialize(true, $sxe->addChild('dependent'));
        if (null !== $this->sequence) $this->sequence->xmlSerialize(true, $sxe->addChild('sequence'));
        if (null !== $this->network) $this->network->xmlSerialize(true, $sxe->addChild('network'));
        if (0 < count($this->contract)) {
            foreach($this->contract as $contract) {
                $contract->xmlSerialize(true, $sxe->addChild('contract'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}