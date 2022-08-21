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
 * This resource provides the insurance eligibility details from the insurer regarding a specified coverage and optionally some class of service.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIREligibilityRequest extends FHIRDomainResource implements JsonSerializable
{
    /**
     * The Response business identifier.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * The status of the resource instance.
     * @var \FHIR_STU_THREE\FHIRElement\FHIREligibilityRequestStatus
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
     * The Insurer who is target  of the request. (choose any one of insurer*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $insurerIdentifier = null;

    /**
     * The Insurer who is target  of the request. (choose any one of insurer*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $insurerReference = null;

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
     * Immediate (STAT), best effort (NORMAL), deferred (DEFER).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $priority = null;

    /**
     * Person who created the invoice/claim/pre-determination or pre-authorization. (choose any one of enterer*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $entererIdentifier = null;

    /**
     * Person who created the invoice/claim/pre-determination or pre-authorization. (choose any one of enterer*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $entererReference = null;

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
     * Financial instrument by which payment information for health care. (choose any one of coverage*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $coverageIdentifier = null;

    /**
     * Financial instrument by which payment information for health care. (choose any one of coverage*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $coverageReference = null;

    /**
     * The contract number of a business agreement which describes the terms and conditions.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $businessArrangement = null;

    /**
     * The date or dates when the enclosed suite of services were performed or completed. (choose any one of serviced*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDate
     */
    public $servicedDate = null;

    /**
     * The date or dates when the enclosed suite of services were performed or completed. (choose any one of serviced*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public $servicedPeriod = null;

    /**
     * Dental, Vision, Medical, Pharmacy, Rehab etc.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $benefitCategory = null;

    /**
     * Dental: basic, major, ortho; Vision exam, glasses, contacts; etc.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $benefitSubCategory = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'EligibilityRequest';

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
     * @return \FHIR_STU_THREE\FHIRElement\FHIREligibilityRequestStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status of the resource instance.
     * @param \FHIR_STU_THREE\FHIRElement\FHIREligibilityRequestStatus $status
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
     * The Insurer who is target  of the request. (choose any one of insurer*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getInsurerIdentifier()
    {
        return $this->insurerIdentifier;
    }

    /**
     * The Insurer who is target  of the request. (choose any one of insurer*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $insurerIdentifier
     * @return $this
     */
    public function setInsurerIdentifier($insurerIdentifier)
    {
        $this->insurerIdentifier = $insurerIdentifier;
        return $this;
    }

    /**
     * The Insurer who is target  of the request. (choose any one of insurer*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getInsurerReference()
    {
        return $this->insurerReference;
    }

    /**
     * The Insurer who is target  of the request. (choose any one of insurer*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $insurerReference
     * @return $this
     */
    public function setInsurerReference($insurerReference)
    {
        $this->insurerReference = $insurerReference;
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
     * Immediate (STAT), best effort (NORMAL), deferred (DEFER).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Immediate (STAT), best effort (NORMAL), deferred (DEFER).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $priority
     * @return $this
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * Person who created the invoice/claim/pre-determination or pre-authorization. (choose any one of enterer*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getEntererIdentifier()
    {
        return $this->entererIdentifier;
    }

    /**
     * Person who created the invoice/claim/pre-determination or pre-authorization. (choose any one of enterer*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $entererIdentifier
     * @return $this
     */
    public function setEntererIdentifier($entererIdentifier)
    {
        $this->entererIdentifier = $entererIdentifier;
        return $this;
    }

    /**
     * Person who created the invoice/claim/pre-determination or pre-authorization. (choose any one of enterer*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getEntererReference()
    {
        return $this->entererReference;
    }

    /**
     * Person who created the invoice/claim/pre-determination or pre-authorization. (choose any one of enterer*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $entererReference
     * @return $this
     */
    public function setEntererReference($entererReference)
    {
        $this->entererReference = $entererReference;
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
     * Financial instrument by which payment information for health care. (choose any one of coverage*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getCoverageIdentifier()
    {
        return $this->coverageIdentifier;
    }

    /**
     * Financial instrument by which payment information for health care. (choose any one of coverage*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $coverageIdentifier
     * @return $this
     */
    public function setCoverageIdentifier($coverageIdentifier)
    {
        $this->coverageIdentifier = $coverageIdentifier;
        return $this;
    }

    /**
     * Financial instrument by which payment information for health care. (choose any one of coverage*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getCoverageReference()
    {
        return $this->coverageReference;
    }

    /**
     * Financial instrument by which payment information for health care. (choose any one of coverage*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $coverageReference
     * @return $this
     */
    public function setCoverageReference($coverageReference)
    {
        $this->coverageReference = $coverageReference;
        return $this;
    }

    /**
     * The contract number of a business agreement which describes the terms and conditions.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getBusinessArrangement()
    {
        return $this->businessArrangement;
    }

    /**
     * The contract number of a business agreement which describes the terms and conditions.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $businessArrangement
     * @return $this
     */
    public function setBusinessArrangement($businessArrangement)
    {
        $this->businessArrangement = $businessArrangement;
        return $this;
    }

    /**
     * The date or dates when the enclosed suite of services were performed or completed. (choose any one of serviced*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDate
     */
    public function getServicedDate()
    {
        return $this->servicedDate;
    }

    /**
     * The date or dates when the enclosed suite of services were performed or completed. (choose any one of serviced*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDate $servicedDate
     * @return $this
     */
    public function setServicedDate($servicedDate)
    {
        $this->servicedDate = $servicedDate;
        return $this;
    }

    /**
     * The date or dates when the enclosed suite of services were performed or completed. (choose any one of serviced*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public function getServicedPeriod()
    {
        return $this->servicedPeriod;
    }

    /**
     * The date or dates when the enclosed suite of services were performed or completed. (choose any one of serviced*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPeriod $servicedPeriod
     * @return $this
     */
    public function setServicedPeriod($servicedPeriod)
    {
        $this->servicedPeriod = $servicedPeriod;
        return $this;
    }

    /**
     * Dental, Vision, Medical, Pharmacy, Rehab etc.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getBenefitCategory()
    {
        return $this->benefitCategory;
    }

    /**
     * Dental, Vision, Medical, Pharmacy, Rehab etc.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $benefitCategory
     * @return $this
     */
    public function setBenefitCategory($benefitCategory)
    {
        $this->benefitCategory = $benefitCategory;
        return $this;
    }

    /**
     * Dental: basic, major, ortho; Vision exam, glasses, contacts; etc.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getBenefitSubCategory()
    {
        return $this->benefitSubCategory;
    }

    /**
     * Dental: basic, major, ortho; Vision exam, glasses, contacts; etc.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $benefitSubCategory
     * @return $this
     */
    public function setBenefitSubCategory($benefitSubCategory)
    {
        $this->benefitSubCategory = $benefitSubCategory;
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
        if (null !== $this->insurerIdentifier) $json['insurerIdentifier'] = $this->insurerIdentifier->jsonSerialize();
        if (null !== $this->insurerReference) $json['insurerReference'] = $this->insurerReference->jsonSerialize();
        if (null !== $this->providerIdentifier) $json['providerIdentifier'] = $this->providerIdentifier->jsonSerialize();
        if (null !== $this->providerReference) $json['providerReference'] = $this->providerReference->jsonSerialize();
        if (null !== $this->organizationIdentifier) $json['organizationIdentifier'] = $this->organizationIdentifier->jsonSerialize();
        if (null !== $this->organizationReference) $json['organizationReference'] = $this->organizationReference->jsonSerialize();
        if (null !== $this->priority) $json['priority'] = $this->priority->jsonSerialize();
        if (null !== $this->entererIdentifier) $json['entererIdentifier'] = $this->entererIdentifier->jsonSerialize();
        if (null !== $this->entererReference) $json['entererReference'] = $this->entererReference->jsonSerialize();
        if (null !== $this->facilityIdentifier) $json['facilityIdentifier'] = $this->facilityIdentifier->jsonSerialize();
        if (null !== $this->facilityReference) $json['facilityReference'] = $this->facilityReference->jsonSerialize();
        if (null !== $this->patientIdentifier) $json['patientIdentifier'] = $this->patientIdentifier->jsonSerialize();
        if (null !== $this->patientReference) $json['patientReference'] = $this->patientReference->jsonSerialize();
        if (null !== $this->coverageIdentifier) $json['coverageIdentifier'] = $this->coverageIdentifier->jsonSerialize();
        if (null !== $this->coverageReference) $json['coverageReference'] = $this->coverageReference->jsonSerialize();
        if (null !== $this->businessArrangement) $json['businessArrangement'] = $this->businessArrangement->jsonSerialize();
        if (null !== $this->servicedDate) $json['servicedDate'] = $this->servicedDate->jsonSerialize();
        if (null !== $this->servicedPeriod) $json['servicedPeriod'] = $this->servicedPeriod->jsonSerialize();
        if (null !== $this->benefitCategory) $json['benefitCategory'] = $this->benefitCategory->jsonSerialize();
        if (null !== $this->benefitSubCategory) $json['benefitSubCategory'] = $this->benefitSubCategory->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<EligibilityRequest xmlns="http://hl7.org/fhir"></EligibilityRequest>');
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
        if (null !== $this->insurerIdentifier) $this->insurerIdentifier->xmlSerialize(true, $sxe->addChild('insurerIdentifier'));
        if (null !== $this->insurerReference) $this->insurerReference->xmlSerialize(true, $sxe->addChild('insurerReference'));
        if (null !== $this->providerIdentifier) $this->providerIdentifier->xmlSerialize(true, $sxe->addChild('providerIdentifier'));
        if (null !== $this->providerReference) $this->providerReference->xmlSerialize(true, $sxe->addChild('providerReference'));
        if (null !== $this->organizationIdentifier) $this->organizationIdentifier->xmlSerialize(true, $sxe->addChild('organizationIdentifier'));
        if (null !== $this->organizationReference) $this->organizationReference->xmlSerialize(true, $sxe->addChild('organizationReference'));
        if (null !== $this->priority) $this->priority->xmlSerialize(true, $sxe->addChild('priority'));
        if (null !== $this->entererIdentifier) $this->entererIdentifier->xmlSerialize(true, $sxe->addChild('entererIdentifier'));
        if (null !== $this->entererReference) $this->entererReference->xmlSerialize(true, $sxe->addChild('entererReference'));
        if (null !== $this->facilityIdentifier) $this->facilityIdentifier->xmlSerialize(true, $sxe->addChild('facilityIdentifier'));
        if (null !== $this->facilityReference) $this->facilityReference->xmlSerialize(true, $sxe->addChild('facilityReference'));
        if (null !== $this->patientIdentifier) $this->patientIdentifier->xmlSerialize(true, $sxe->addChild('patientIdentifier'));
        if (null !== $this->patientReference) $this->patientReference->xmlSerialize(true, $sxe->addChild('patientReference'));
        if (null !== $this->coverageIdentifier) $this->coverageIdentifier->xmlSerialize(true, $sxe->addChild('coverageIdentifier'));
        if (null !== $this->coverageReference) $this->coverageReference->xmlSerialize(true, $sxe->addChild('coverageReference'));
        if (null !== $this->businessArrangement) $this->businessArrangement->xmlSerialize(true, $sxe->addChild('businessArrangement'));
        if (null !== $this->servicedDate) $this->servicedDate->xmlSerialize(true, $sxe->addChild('servicedDate'));
        if (null !== $this->servicedPeriod) $this->servicedPeriod->xmlSerialize(true, $sxe->addChild('servicedPeriod'));
        if (null !== $this->benefitCategory) $this->benefitCategory->xmlSerialize(true, $sxe->addChild('benefitCategory'));
        if (null !== $this->benefitSubCategory) $this->benefitSubCategory->xmlSerialize(true, $sxe->addChild('benefitSubCategory'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}