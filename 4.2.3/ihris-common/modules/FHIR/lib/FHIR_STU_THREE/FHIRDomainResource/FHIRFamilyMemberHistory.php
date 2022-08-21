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
 * Significant health events and conditions for a person related to the patient relevant in the context of care for the patient.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRFamilyMemberHistory extends FHIRDomainResource implements JsonSerializable
{
    /**
     * This records identifiers associated with this family member history record that are defined by business processes and/ or used to refer to it when a direct URL reference to the resource itself is not appropriate (e.g. in CDA documents, or in written / printed documentation).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * The person who this history concerns.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $patient = null;

    /**
     * The date (and possibly time) when the family member history was taken.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $date = null;

    /**
     * A code specifying the status of the record of the family history of a specific family member.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRFamilyHistoryStatus
     */
    public $status = null;

    /**
     * This will either be a name or a description; e.g. "Aunt Susan", "my cousin with the red hair".
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $name = null;

    /**
     * The type of relationship this person has to the patient (father, mother, brother etc.).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $relationship = null;

    /**
     * Administrative Gender - the gender that the relative is considered to have for administration and record keeping purposes.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRAdministrativeGender
     */
    public $gender = null;

    /**
     * The actual or approximate date of birth of the relative. (choose any one of born*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public $bornPeriod = null;

    /**
     * The actual or approximate date of birth of the relative. (choose any one of born*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDate
     */
    public $bornDate = null;

    /**
     * The actual or approximate date of birth of the relative. (choose any one of born*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $bornString = null;

    /**
     * The age of the relative at the time the family member history is recorded. (choose any one of age*, but only one)
     * @var \FHIR_STU_THREE\FHIRAge
     */
    public $ageAge = null;

    /**
     * The age of the relative at the time the family member history is recorded. (choose any one of age*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRRange
     */
    public $ageRange = null;

    /**
     * The age of the relative at the time the family member history is recorded. (choose any one of age*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $ageString = null;

    /**
     * If true, indicates that the age value specified is an estimated value.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public $estimatedAge = null;

    /**
     * Deceased flag or the actual or approximate age of the relative at the time of death for the family member history record. (choose any one of deceased*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public $deceasedBoolean = null;

    /**
     * Deceased flag or the actual or approximate age of the relative at the time of death for the family member history record. (choose any one of deceased*, but only one)
     * @var \FHIR_STU_THREE\FHIRAge
     */
    public $deceasedAge = null;

    /**
     * Deceased flag or the actual or approximate age of the relative at the time of death for the family member history record. (choose any one of deceased*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRRange
     */
    public $deceasedRange = null;

    /**
     * Deceased flag or the actual or approximate age of the relative at the time of death for the family member history record. (choose any one of deceased*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDate
     */
    public $deceasedDate = null;

    /**
     * Deceased flag or the actual or approximate age of the relative at the time of death for the family member history record. (choose any one of deceased*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $deceasedString = null;

    /**
     * This property allows a non condition-specific note to the made about the related person. Ideally, the note would be in the condition property, but this is not always possible.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRAnnotation
     */
    public $note = null;

    /**
     * The significant Conditions (or condition) that the family member had. This is a repeating section to allow a system to represent more than one condition per resource, though there is nothing stopping multiple resources - one per condition.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRFamilyMemberHistory\FHIRFamilyMemberHistoryCondition[]
     */
    public $condition = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'FamilyMemberHistory';

    /**
     * This records identifiers associated with this family member history record that are defined by business processes and/ or used to refer to it when a direct URL reference to the resource itself is not appropriate (e.g. in CDA documents, or in written / printed documentation).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * This records identifiers associated with this family member history record that are defined by business processes and/ or used to refer to it when a direct URL reference to the resource itself is not appropriate (e.g. in CDA documents, or in written / printed documentation).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * The person who this history concerns.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * The person who this history concerns.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $patient
     * @return $this
     */
    public function setPatient($patient)
    {
        $this->patient = $patient;
        return $this;
    }

    /**
     * The date (and possibly time) when the family member history was taken.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * The date (and possibly time) when the family member history was taken.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * A code specifying the status of the record of the family history of a specific family member.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRFamilyHistoryStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * A code specifying the status of the record of the family history of a specific family member.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRFamilyHistoryStatus $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * This will either be a name or a description; e.g. "Aunt Susan", "my cousin with the red hair".
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * This will either be a name or a description; e.g. "Aunt Susan", "my cousin with the red hair".
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * The type of relationship this person has to the patient (father, mother, brother etc.).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getRelationship()
    {
        return $this->relationship;
    }

    /**
     * The type of relationship this person has to the patient (father, mother, brother etc.).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $relationship
     * @return $this
     */
    public function setRelationship($relationship)
    {
        $this->relationship = $relationship;
        return $this;
    }

    /**
     * Administrative Gender - the gender that the relative is considered to have for administration and record keeping purposes.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRAdministrativeGender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Administrative Gender - the gender that the relative is considered to have for administration and record keeping purposes.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRAdministrativeGender $gender
     * @return $this
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * The actual or approximate date of birth of the relative. (choose any one of born*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public function getBornPeriod()
    {
        return $this->bornPeriod;
    }

    /**
     * The actual or approximate date of birth of the relative. (choose any one of born*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPeriod $bornPeriod
     * @return $this
     */
    public function setBornPeriod($bornPeriod)
    {
        $this->bornPeriod = $bornPeriod;
        return $this;
    }

    /**
     * The actual or approximate date of birth of the relative. (choose any one of born*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDate
     */
    public function getBornDate()
    {
        return $this->bornDate;
    }

    /**
     * The actual or approximate date of birth of the relative. (choose any one of born*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDate $bornDate
     * @return $this
     */
    public function setBornDate($bornDate)
    {
        $this->bornDate = $bornDate;
        return $this;
    }

    /**
     * The actual or approximate date of birth of the relative. (choose any one of born*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getBornString()
    {
        return $this->bornString;
    }

    /**
     * The actual or approximate date of birth of the relative. (choose any one of born*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $bornString
     * @return $this
     */
    public function setBornString($bornString)
    {
        $this->bornString = $bornString;
        return $this;
    }

    /**
     * The age of the relative at the time the family member history is recorded. (choose any one of age*, but only one)
     * @return \FHIR_STU_THREE\FHIRAge
     */
    public function getAgeAge()
    {
        return $this->ageAge;
    }

    /**
     * The age of the relative at the time the family member history is recorded. (choose any one of age*, but only one)
     * @param \FHIR_STU_THREE\FHIRAge $ageAge
     * @return $this
     */
    public function setAgeAge($ageAge)
    {
        $this->ageAge = $ageAge;
        return $this;
    }

    /**
     * The age of the relative at the time the family member history is recorded. (choose any one of age*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRRange
     */
    public function getAgeRange()
    {
        return $this->ageRange;
    }

    /**
     * The age of the relative at the time the family member history is recorded. (choose any one of age*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRRange $ageRange
     * @return $this
     */
    public function setAgeRange($ageRange)
    {
        $this->ageRange = $ageRange;
        return $this;
    }

    /**
     * The age of the relative at the time the family member history is recorded. (choose any one of age*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getAgeString()
    {
        return $this->ageString;
    }

    /**
     * The age of the relative at the time the family member history is recorded. (choose any one of age*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $ageString
     * @return $this
     */
    public function setAgeString($ageString)
    {
        $this->ageString = $ageString;
        return $this;
    }

    /**
     * If true, indicates that the age value specified is an estimated value.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public function getEstimatedAge()
    {
        return $this->estimatedAge;
    }

    /**
     * If true, indicates that the age value specified is an estimated value.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBoolean $estimatedAge
     * @return $this
     */
    public function setEstimatedAge($estimatedAge)
    {
        $this->estimatedAge = $estimatedAge;
        return $this;
    }

    /**
     * Deceased flag or the actual or approximate age of the relative at the time of death for the family member history record. (choose any one of deceased*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public function getDeceasedBoolean()
    {
        return $this->deceasedBoolean;
    }

    /**
     * Deceased flag or the actual or approximate age of the relative at the time of death for the family member history record. (choose any one of deceased*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBoolean $deceasedBoolean
     * @return $this
     */
    public function setDeceasedBoolean($deceasedBoolean)
    {
        $this->deceasedBoolean = $deceasedBoolean;
        return $this;
    }

    /**
     * Deceased flag or the actual or approximate age of the relative at the time of death for the family member history record. (choose any one of deceased*, but only one)
     * @return \FHIR_STU_THREE\FHIRAge
     */
    public function getDeceasedAge()
    {
        return $this->deceasedAge;
    }

    /**
     * Deceased flag or the actual or approximate age of the relative at the time of death for the family member history record. (choose any one of deceased*, but only one)
     * @param \FHIR_STU_THREE\FHIRAge $deceasedAge
     * @return $this
     */
    public function setDeceasedAge($deceasedAge)
    {
        $this->deceasedAge = $deceasedAge;
        return $this;
    }

    /**
     * Deceased flag or the actual or approximate age of the relative at the time of death for the family member history record. (choose any one of deceased*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRRange
     */
    public function getDeceasedRange()
    {
        return $this->deceasedRange;
    }

    /**
     * Deceased flag or the actual or approximate age of the relative at the time of death for the family member history record. (choose any one of deceased*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRRange $deceasedRange
     * @return $this
     */
    public function setDeceasedRange($deceasedRange)
    {
        $this->deceasedRange = $deceasedRange;
        return $this;
    }

    /**
     * Deceased flag or the actual or approximate age of the relative at the time of death for the family member history record. (choose any one of deceased*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDate
     */
    public function getDeceasedDate()
    {
        return $this->deceasedDate;
    }

    /**
     * Deceased flag or the actual or approximate age of the relative at the time of death for the family member history record. (choose any one of deceased*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDate $deceasedDate
     * @return $this
     */
    public function setDeceasedDate($deceasedDate)
    {
        $this->deceasedDate = $deceasedDate;
        return $this;
    }

    /**
     * Deceased flag or the actual or approximate age of the relative at the time of death for the family member history record. (choose any one of deceased*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getDeceasedString()
    {
        return $this->deceasedString;
    }

    /**
     * Deceased flag or the actual or approximate age of the relative at the time of death for the family member history record. (choose any one of deceased*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $deceasedString
     * @return $this
     */
    public function setDeceasedString($deceasedString)
    {
        $this->deceasedString = $deceasedString;
        return $this;
    }

    /**
     * This property allows a non condition-specific note to the made about the related person. Ideally, the note would be in the condition property, but this is not always possible.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRAnnotation
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * This property allows a non condition-specific note to the made about the related person. Ideally, the note would be in the condition property, but this is not always possible.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRAnnotation $note
     * @return $this
     */
    public function setNote($note)
    {
        $this->note = $note;
        return $this;
    }

    /**
     * The significant Conditions (or condition) that the family member had. This is a repeating section to allow a system to represent more than one condition per resource, though there is nothing stopping multiple resources - one per condition.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRFamilyMemberHistory\FHIRFamilyMemberHistoryCondition[]
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * The significant Conditions (or condition) that the family member had. This is a repeating section to allow a system to represent more than one condition per resource, though there is nothing stopping multiple resources - one per condition.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRFamilyMemberHistory\FHIRFamilyMemberHistoryCondition[] $condition
     * @return $this
     */
    public function addCondition($condition)
    {
        $this->condition[] = $condition;
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
        if (null !== $this->patient) $json['patient'] = $this->patient->jsonSerialize();
        if (null !== $this->date) $json['date'] = $this->date->jsonSerialize();
        if (null !== $this->status) $json['status'] = $this->status->jsonSerialize();
        if (null !== $this->name) $json['name'] = $this->name->jsonSerialize();
        if (null !== $this->relationship) $json['relationship'] = $this->relationship->jsonSerialize();
        if (null !== $this->gender) $json['gender'] = $this->gender->jsonSerialize();
        if (null !== $this->bornPeriod) $json['bornPeriod'] = $this->bornPeriod->jsonSerialize();
        if (null !== $this->bornDate) $json['bornDate'] = $this->bornDate->jsonSerialize();
        if (null !== $this->bornString) $json['bornString'] = $this->bornString->jsonSerialize();
        if (null !== $this->ageAge) $json['ageAge'] = $this->ageAge->jsonSerialize();
        if (null !== $this->ageRange) $json['ageRange'] = $this->ageRange->jsonSerialize();
        if (null !== $this->ageString) $json['ageString'] = $this->ageString->jsonSerialize();
        if (null !== $this->estimatedAge) $json['estimatedAge'] = $this->estimatedAge->jsonSerialize();
        if (null !== $this->deceasedBoolean) $json['deceasedBoolean'] = $this->deceasedBoolean->jsonSerialize();
        if (null !== $this->deceasedAge) $json['deceasedAge'] = $this->deceasedAge->jsonSerialize();
        if (null !== $this->deceasedRange) $json['deceasedRange'] = $this->deceasedRange->jsonSerialize();
        if (null !== $this->deceasedDate) $json['deceasedDate'] = $this->deceasedDate->jsonSerialize();
        if (null !== $this->deceasedString) $json['deceasedString'] = $this->deceasedString->jsonSerialize();
        if (null !== $this->note) $json['note'] = $this->note->jsonSerialize();
        if (0 < count($this->condition)) {
            $json['condition'] = array();
            foreach($this->condition as $condition) {
                $json['condition'][] = $condition->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<FamilyMemberHistory xmlns="http://hl7.org/fhir"></FamilyMemberHistory>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (null !== $this->patient) $this->patient->xmlSerialize(true, $sxe->addChild('patient'));
        if (null !== $this->date) $this->date->xmlSerialize(true, $sxe->addChild('date'));
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (null !== $this->name) $this->name->xmlSerialize(true, $sxe->addChild('name'));
        if (null !== $this->relationship) $this->relationship->xmlSerialize(true, $sxe->addChild('relationship'));
        if (null !== $this->gender) $this->gender->xmlSerialize(true, $sxe->addChild('gender'));
        if (null !== $this->bornPeriod) $this->bornPeriod->xmlSerialize(true, $sxe->addChild('bornPeriod'));
        if (null !== $this->bornDate) $this->bornDate->xmlSerialize(true, $sxe->addChild('bornDate'));
        if (null !== $this->bornString) $this->bornString->xmlSerialize(true, $sxe->addChild('bornString'));
        if (null !== $this->ageAge) $this->ageAge->xmlSerialize(true, $sxe->addChild('ageAge'));
        if (null !== $this->ageRange) $this->ageRange->xmlSerialize(true, $sxe->addChild('ageRange'));
        if (null !== $this->ageString) $this->ageString->xmlSerialize(true, $sxe->addChild('ageString'));
        if (null !== $this->estimatedAge) $this->estimatedAge->xmlSerialize(true, $sxe->addChild('estimatedAge'));
        if (null !== $this->deceasedBoolean) $this->deceasedBoolean->xmlSerialize(true, $sxe->addChild('deceasedBoolean'));
        if (null !== $this->deceasedAge) $this->deceasedAge->xmlSerialize(true, $sxe->addChild('deceasedAge'));
        if (null !== $this->deceasedRange) $this->deceasedRange->xmlSerialize(true, $sxe->addChild('deceasedRange'));
        if (null !== $this->deceasedDate) $this->deceasedDate->xmlSerialize(true, $sxe->addChild('deceasedDate'));
        if (null !== $this->deceasedString) $this->deceasedString->xmlSerialize(true, $sxe->addChild('deceasedString'));
        if (null !== $this->note) $this->note->xmlSerialize(true, $sxe->addChild('note'));
        if (0 < count($this->condition)) {
            foreach($this->condition as $condition) {
                $condition->xmlSerialize(true, $sxe->addChild('condition'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}