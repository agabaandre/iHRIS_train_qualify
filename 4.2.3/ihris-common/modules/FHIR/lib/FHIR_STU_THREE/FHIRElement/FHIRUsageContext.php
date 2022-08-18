<?php namespace FHIR_STU_THREE\FHIRElement;

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

use FHIR_STU_THREE\FHIRElement;
use FHIR_STU_THREE\JsonSerializable;

/**
 * Specifies clinical metadata that can be used to retrieve, index and/or categorize the knowledge artifact. This metadata can either be specific to the applicable population (e.g., age category, DRG) or the specific context of care (e.g., venue, care setting, provider of care).
 * If the element is present, it must have a value for at least one of the defined elements, an @id referenced from the Narrative, or extensions
 */
class FHIRUsageContext extends FHIRElement implements JsonSerializable
{
    /**
     * The gender of the patient. For this item type, use HL7 administrative gender codes (OID: 2.16.840.1.113883.1.11.1).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $patientGender = array();

    /**
     * A patient demographic category for which this artifact is applicable. Allows specification of age groups using coded values originating from the MeSH Code system (OID: 2.16.840.1.113883.6.177). More specifically, only codes from the AgeGroupObservationValue value set are valid for this field  [2.16.840.1.113883.11.75].
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $patientAgeGroup = array();

    /**
     * The clinical concept(s) addressed by the artifact.  For example, disease, diagnostic test interpretation, medication ordering. Please refer to the implementation guide on which code system and codes to use.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $clinicalFocus = array();

    /**
     * The user types to which an artifact is targeted.  For example, PCP, Patient, Cardiologist, Behavioral Professional, Oral Health Professional, Prescriber, etc... taken from the NUCC Health Care provider taxonomyCode system (OID: 2.16.840.1.113883.6.101).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $targetUser = array();

    /**
     * The settings in which the artifact is intended for use.  For example, admission, pre-op, etc.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $workflowSetting = array();

    /**
     * The context for the clinical task(s) represented by this artifact. Can be any task context represented by the HL7 ActTaskCode value set (OID: 2.16.840.1.113883.1.11.19846). General categories include: order entry, patient documentation and patient information review.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $workflowTask = array();

    /**
     * The venue in which an artifact could be used.  For example, Outpatient, Inpatient, Home, Nursing home. The code value may originate from either the HL7 ActEncounter (OID: 2.16.840.1.113883.1.11.13955) or NUCC non-individual provider codes OID: 2.16.840.1.113883.1.11.19465.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $clinicalVenue = array();

    /**
     * The jurisdiction in which the artifact is intended to be used.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $jurisdiction = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'UsageContext';

    /**
     * The gender of the patient. For this item type, use HL7 administrative gender codes (OID: 2.16.840.1.113883.1.11.1).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getPatientGender()
    {
        return $this->patientGender;
    }

    /**
     * The gender of the patient. For this item type, use HL7 administrative gender codes (OID: 2.16.840.1.113883.1.11.1).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $patientGender
     * @return $this
     */
    public function addPatientGender($patientGender)
    {
        $this->patientGender[] = $patientGender;
        return $this;
    }

    /**
     * A patient demographic category for which this artifact is applicable. Allows specification of age groups using coded values originating from the MeSH Code system (OID: 2.16.840.1.113883.6.177). More specifically, only codes from the AgeGroupObservationValue value set are valid for this field  [2.16.840.1.113883.11.75].
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getPatientAgeGroup()
    {
        return $this->patientAgeGroup;
    }

    /**
     * A patient demographic category for which this artifact is applicable. Allows specification of age groups using coded values originating from the MeSH Code system (OID: 2.16.840.1.113883.6.177). More specifically, only codes from the AgeGroupObservationValue value set are valid for this field  [2.16.840.1.113883.11.75].
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $patientAgeGroup
     * @return $this
     */
    public function addPatientAgeGroup($patientAgeGroup)
    {
        $this->patientAgeGroup[] = $patientAgeGroup;
        return $this;
    }

    /**
     * The clinical concept(s) addressed by the artifact.  For example, disease, diagnostic test interpretation, medication ordering. Please refer to the implementation guide on which code system and codes to use.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getClinicalFocus()
    {
        return $this->clinicalFocus;
    }

    /**
     * The clinical concept(s) addressed by the artifact.  For example, disease, diagnostic test interpretation, medication ordering. Please refer to the implementation guide on which code system and codes to use.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $clinicalFocus
     * @return $this
     */
    public function addClinicalFocus($clinicalFocus)
    {
        $this->clinicalFocus[] = $clinicalFocus;
        return $this;
    }

    /**
     * The user types to which an artifact is targeted.  For example, PCP, Patient, Cardiologist, Behavioral Professional, Oral Health Professional, Prescriber, etc... taken from the NUCC Health Care provider taxonomyCode system (OID: 2.16.840.1.113883.6.101).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getTargetUser()
    {
        return $this->targetUser;
    }

    /**
     * The user types to which an artifact is targeted.  For example, PCP, Patient, Cardiologist, Behavioral Professional, Oral Health Professional, Prescriber, etc... taken from the NUCC Health Care provider taxonomyCode system (OID: 2.16.840.1.113883.6.101).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $targetUser
     * @return $this
     */
    public function addTargetUser($targetUser)
    {
        $this->targetUser[] = $targetUser;
        return $this;
    }

    /**
     * The settings in which the artifact is intended for use.  For example, admission, pre-op, etc.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getWorkflowSetting()
    {
        return $this->workflowSetting;
    }

    /**
     * The settings in which the artifact is intended for use.  For example, admission, pre-op, etc.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $workflowSetting
     * @return $this
     */
    public function addWorkflowSetting($workflowSetting)
    {
        $this->workflowSetting[] = $workflowSetting;
        return $this;
    }

    /**
     * The context for the clinical task(s) represented by this artifact. Can be any task context represented by the HL7 ActTaskCode value set (OID: 2.16.840.1.113883.1.11.19846). General categories include: order entry, patient documentation and patient information review.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getWorkflowTask()
    {
        return $this->workflowTask;
    }

    /**
     * The context for the clinical task(s) represented by this artifact. Can be any task context represented by the HL7 ActTaskCode value set (OID: 2.16.840.1.113883.1.11.19846). General categories include: order entry, patient documentation and patient information review.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $workflowTask
     * @return $this
     */
    public function addWorkflowTask($workflowTask)
    {
        $this->workflowTask[] = $workflowTask;
        return $this;
    }

    /**
     * The venue in which an artifact could be used.  For example, Outpatient, Inpatient, Home, Nursing home. The code value may originate from either the HL7 ActEncounter (OID: 2.16.840.1.113883.1.11.13955) or NUCC non-individual provider codes OID: 2.16.840.1.113883.1.11.19465.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getClinicalVenue()
    {
        return $this->clinicalVenue;
    }

    /**
     * The venue in which an artifact could be used.  For example, Outpatient, Inpatient, Home, Nursing home. The code value may originate from either the HL7 ActEncounter (OID: 2.16.840.1.113883.1.11.13955) or NUCC non-individual provider codes OID: 2.16.840.1.113883.1.11.19465.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $clinicalVenue
     * @return $this
     */
    public function addClinicalVenue($clinicalVenue)
    {
        $this->clinicalVenue[] = $clinicalVenue;
        return $this;
    }

    /**
     * The jurisdiction in which the artifact is intended to be used.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getJurisdiction()
    {
        return $this->jurisdiction;
    }

    /**
     * The jurisdiction in which the artifact is intended to be used.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $jurisdiction
     * @return $this
     */
    public function addJurisdiction($jurisdiction)
    {
        $this->jurisdiction[] = $jurisdiction;
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
        if (0 < count($this->patientGender)) {
            $json['patientGender'] = array();
            foreach($this->patientGender as $patientGender) {
                $json['patientGender'][] = $patientGender->jsonSerialize();
            }
        }
        if (0 < count($this->patientAgeGroup)) {
            $json['patientAgeGroup'] = array();
            foreach($this->patientAgeGroup as $patientAgeGroup) {
                $json['patientAgeGroup'][] = $patientAgeGroup->jsonSerialize();
            }
        }
        if (0 < count($this->clinicalFocus)) {
            $json['clinicalFocus'] = array();
            foreach($this->clinicalFocus as $clinicalFocus) {
                $json['clinicalFocus'][] = $clinicalFocus->jsonSerialize();
            }
        }
        if (0 < count($this->targetUser)) {
            $json['targetUser'] = array();
            foreach($this->targetUser as $targetUser) {
                $json['targetUser'][] = $targetUser->jsonSerialize();
            }
        }
        if (0 < count($this->workflowSetting)) {
            $json['workflowSetting'] = array();
            foreach($this->workflowSetting as $workflowSetting) {
                $json['workflowSetting'][] = $workflowSetting->jsonSerialize();
            }
        }
        if (0 < count($this->workflowTask)) {
            $json['workflowTask'] = array();
            foreach($this->workflowTask as $workflowTask) {
                $json['workflowTask'][] = $workflowTask->jsonSerialize();
            }
        }
        if (0 < count($this->clinicalVenue)) {
            $json['clinicalVenue'] = array();
            foreach($this->clinicalVenue as $clinicalVenue) {
                $json['clinicalVenue'][] = $clinicalVenue->jsonSerialize();
            }
        }
        if (0 < count($this->jurisdiction)) {
            $json['jurisdiction'] = array();
            foreach($this->jurisdiction as $jurisdiction) {
                $json['jurisdiction'][] = $jurisdiction->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<UsageContext xmlns="http://hl7.org/fhir"></UsageContext>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->patientGender)) {
            foreach($this->patientGender as $patientGender) {
                $patientGender->xmlSerialize(true, $sxe->addChild('patientGender'));
            }
        }
        if (0 < count($this->patientAgeGroup)) {
            foreach($this->patientAgeGroup as $patientAgeGroup) {
                $patientAgeGroup->xmlSerialize(true, $sxe->addChild('patientAgeGroup'));
            }
        }
        if (0 < count($this->clinicalFocus)) {
            foreach($this->clinicalFocus as $clinicalFocus) {
                $clinicalFocus->xmlSerialize(true, $sxe->addChild('clinicalFocus'));
            }
        }
        if (0 < count($this->targetUser)) {
            foreach($this->targetUser as $targetUser) {
                $targetUser->xmlSerialize(true, $sxe->addChild('targetUser'));
            }
        }
        if (0 < count($this->workflowSetting)) {
            foreach($this->workflowSetting as $workflowSetting) {
                $workflowSetting->xmlSerialize(true, $sxe->addChild('workflowSetting'));
            }
        }
        if (0 < count($this->workflowTask)) {
            foreach($this->workflowTask as $workflowTask) {
                $workflowTask->xmlSerialize(true, $sxe->addChild('workflowTask'));
            }
        }
        if (0 < count($this->clinicalVenue)) {
            foreach($this->clinicalVenue as $clinicalVenue) {
                $clinicalVenue->xmlSerialize(true, $sxe->addChild('clinicalVenue'));
            }
        }
        if (0 < count($this->jurisdiction)) {
            foreach($this->jurisdiction as $jurisdiction) {
                $jurisdiction->xmlSerialize(true, $sxe->addChild('jurisdiction'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}