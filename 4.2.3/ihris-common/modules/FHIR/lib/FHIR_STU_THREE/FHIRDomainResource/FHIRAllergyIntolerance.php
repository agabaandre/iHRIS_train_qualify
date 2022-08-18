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
 * Risk of harmful or undesirable, physiological response which is unique to an individual and associated with exposure to a substance.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRAllergyIntolerance extends FHIRDomainResource implements JsonSerializable
{
    /**
     * This records identifiers associated with this allergy/intolerance concern that are defined by business processes and/or used to refer to it when a direct URL reference to the resource itself is not appropriate (e.g. in CDA documents, or in written / printed documentation).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * Assertion about certainty associated with the propensity, or potential risk, of a reaction to the identified substance (including pharmaceutical product).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRAllergyIntoleranceStatus
     */
    public $status = null;

    /**
     * Identification of the underlying physiological mechanism for the reaction risk.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRAllergyIntoleranceType
     */
    public $type = null;

    /**
     * Category of the identified substance.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRAllergyIntoleranceCategory
     */
    public $category = null;

    /**
     * Estimate of the potential clinical harm, or seriousness, of the reaction to the identified substance.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRAllergyIntoleranceCriticality
     */
    public $criticality = null;

    /**
     * Code for an allergy or intolerance statement (either a positive or a negated/excluded statement).  This may be a code for a substance or pharmaceutical product that is considered to be responsible for the adverse reaction risk (e.g., "Latex"), an allergy or intolerance condition (e.g., "Latex allergy"), or a negated/excluded code for a specific substance or class (e.g., "No latex allergy") or a general or categorical negated statement (e.g.,  "No known allergy", "No known drug allergies").
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $code = null;

    /**
     * The patient who has the allergy or intolerance.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $patient = null;

    /**
     * Indicates the most recent date on which the recorder has asserted that the information represented by this AllergyIntolerance record is accurate.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $attestedDate = null;

    /**
     * Individual who recorded the record and takes responsibility for its content.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $recorder = null;

    /**
     * The source of the information about the allergy that is recorded.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $reporter = null;

    /**
     * Record of the date and/or time of the onset of the Allergy or Intolerance.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $onset = null;

    /**
     * Represents the date and/or time of the last known occurrence of a reaction event.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $lastOccurrence = null;

    /**
     * Additional narrative about the propensity for the Adverse Reaction, not captured in other fields.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRAnnotation[]
     */
    public $note = array();

    /**
     * Details about each adverse reaction event linked to exposure to the identified substance.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRAllergyIntolerance\FHIRAllergyIntoleranceReaction[]
     */
    public $reaction = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'AllergyIntolerance';

    /**
     * This records identifiers associated with this allergy/intolerance concern that are defined by business processes and/or used to refer to it when a direct URL reference to the resource itself is not appropriate (e.g. in CDA documents, or in written / printed documentation).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * This records identifiers associated with this allergy/intolerance concern that are defined by business processes and/or used to refer to it when a direct URL reference to the resource itself is not appropriate (e.g. in CDA documents, or in written / printed documentation).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * Assertion about certainty associated with the propensity, or potential risk, of a reaction to the identified substance (including pharmaceutical product).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRAllergyIntoleranceStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Assertion about certainty associated with the propensity, or potential risk, of a reaction to the identified substance (including pharmaceutical product).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRAllergyIntoleranceStatus $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Identification of the underlying physiological mechanism for the reaction risk.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRAllergyIntoleranceType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Identification of the underlying physiological mechanism for the reaction risk.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRAllergyIntoleranceType $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Category of the identified substance.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRAllergyIntoleranceCategory
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Category of the identified substance.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRAllergyIntoleranceCategory $category
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Estimate of the potential clinical harm, or seriousness, of the reaction to the identified substance.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRAllergyIntoleranceCriticality
     */
    public function getCriticality()
    {
        return $this->criticality;
    }

    /**
     * Estimate of the potential clinical harm, or seriousness, of the reaction to the identified substance.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRAllergyIntoleranceCriticality $criticality
     * @return $this
     */
    public function setCriticality($criticality)
    {
        $this->criticality = $criticality;
        return $this;
    }

    /**
     * Code for an allergy or intolerance statement (either a positive or a negated/excluded statement).  This may be a code for a substance or pharmaceutical product that is considered to be responsible for the adverse reaction risk (e.g., "Latex"), an allergy or intolerance condition (e.g., "Latex allergy"), or a negated/excluded code for a specific substance or class (e.g., "No latex allergy") or a general or categorical negated statement (e.g.,  "No known allergy", "No known drug allergies").
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Code for an allergy or intolerance statement (either a positive or a negated/excluded statement).  This may be a code for a substance or pharmaceutical product that is considered to be responsible for the adverse reaction risk (e.g., "Latex"), an allergy or intolerance condition (e.g., "Latex allergy"), or a negated/excluded code for a specific substance or class (e.g., "No latex allergy") or a general or categorical negated statement (e.g.,  "No known allergy", "No known drug allergies").
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * The patient who has the allergy or intolerance.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * The patient who has the allergy or intolerance.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $patient
     * @return $this
     */
    public function setPatient($patient)
    {
        $this->patient = $patient;
        return $this;
    }

    /**
     * Indicates the most recent date on which the recorder has asserted that the information represented by this AllergyIntolerance record is accurate.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getAttestedDate()
    {
        return $this->attestedDate;
    }

    /**
     * Indicates the most recent date on which the recorder has asserted that the information represented by this AllergyIntolerance record is accurate.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $attestedDate
     * @return $this
     */
    public function setAttestedDate($attestedDate)
    {
        $this->attestedDate = $attestedDate;
        return $this;
    }

    /**
     * Individual who recorded the record and takes responsibility for its content.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getRecorder()
    {
        return $this->recorder;
    }

    /**
     * Individual who recorded the record and takes responsibility for its content.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $recorder
     * @return $this
     */
    public function setRecorder($recorder)
    {
        $this->recorder = $recorder;
        return $this;
    }

    /**
     * The source of the information about the allergy that is recorded.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getReporter()
    {
        return $this->reporter;
    }

    /**
     * The source of the information about the allergy that is recorded.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $reporter
     * @return $this
     */
    public function setReporter($reporter)
    {
        $this->reporter = $reporter;
        return $this;
    }

    /**
     * Record of the date and/or time of the onset of the Allergy or Intolerance.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getOnset()
    {
        return $this->onset;
    }

    /**
     * Record of the date and/or time of the onset of the Allergy or Intolerance.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $onset
     * @return $this
     */
    public function setOnset($onset)
    {
        $this->onset = $onset;
        return $this;
    }

    /**
     * Represents the date and/or time of the last known occurrence of a reaction event.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getLastOccurrence()
    {
        return $this->lastOccurrence;
    }

    /**
     * Represents the date and/or time of the last known occurrence of a reaction event.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $lastOccurrence
     * @return $this
     */
    public function setLastOccurrence($lastOccurrence)
    {
        $this->lastOccurrence = $lastOccurrence;
        return $this;
    }

    /**
     * Additional narrative about the propensity for the Adverse Reaction, not captured in other fields.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRAnnotation[]
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Additional narrative about the propensity for the Adverse Reaction, not captured in other fields.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRAnnotation[] $note
     * @return $this
     */
    public function addNote($note)
    {
        $this->note[] = $note;
        return $this;
    }

    /**
     * Details about each adverse reaction event linked to exposure to the identified substance.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRAllergyIntolerance\FHIRAllergyIntoleranceReaction[]
     */
    public function getReaction()
    {
        return $this->reaction;
    }

    /**
     * Details about each adverse reaction event linked to exposure to the identified substance.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRAllergyIntolerance\FHIRAllergyIntoleranceReaction[] $reaction
     * @return $this
     */
    public function addReaction($reaction)
    {
        $this->reaction[] = $reaction;
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
        if (null !== $this->type) $json['type'] = $this->type->jsonSerialize();
        if (null !== $this->category) $json['category'] = $this->category->jsonSerialize();
        if (null !== $this->criticality) $json['criticality'] = $this->criticality->jsonSerialize();
        if (null !== $this->code) $json['code'] = $this->code->jsonSerialize();
        if (null !== $this->patient) $json['patient'] = $this->patient->jsonSerialize();
        if (null !== $this->attestedDate) $json['attestedDate'] = $this->attestedDate->jsonSerialize();
        if (null !== $this->recorder) $json['recorder'] = $this->recorder->jsonSerialize();
        if (null !== $this->reporter) $json['reporter'] = $this->reporter->jsonSerialize();
        if (null !== $this->onset) $json['onset'] = $this->onset->jsonSerialize();
        if (null !== $this->lastOccurrence) $json['lastOccurrence'] = $this->lastOccurrence->jsonSerialize();
        if (0 < count($this->note)) {
            $json['note'] = array();
            foreach($this->note as $note) {
                $json['note'][] = $note->jsonSerialize();
            }
        }
        if (0 < count($this->reaction)) {
            $json['reaction'] = array();
            foreach($this->reaction as $reaction) {
                $json['reaction'][] = $reaction->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<AllergyIntolerance xmlns="http://hl7.org/fhir"></AllergyIntolerance>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (null !== $this->type) $this->type->xmlSerialize(true, $sxe->addChild('type'));
        if (null !== $this->category) $this->category->xmlSerialize(true, $sxe->addChild('category'));
        if (null !== $this->criticality) $this->criticality->xmlSerialize(true, $sxe->addChild('criticality'));
        if (null !== $this->code) $this->code->xmlSerialize(true, $sxe->addChild('code'));
        if (null !== $this->patient) $this->patient->xmlSerialize(true, $sxe->addChild('patient'));
        if (null !== $this->attestedDate) $this->attestedDate->xmlSerialize(true, $sxe->addChild('attestedDate'));
        if (null !== $this->recorder) $this->recorder->xmlSerialize(true, $sxe->addChild('recorder'));
        if (null !== $this->reporter) $this->reporter->xmlSerialize(true, $sxe->addChild('reporter'));
        if (null !== $this->onset) $this->onset->xmlSerialize(true, $sxe->addChild('onset'));
        if (null !== $this->lastOccurrence) $this->lastOccurrence->xmlSerialize(true, $sxe->addChild('lastOccurrence'));
        if (0 < count($this->note)) {
            foreach($this->note as $note) {
                $note->xmlSerialize(true, $sxe->addChild('note'));
            }
        }
        if (0 < count($this->reaction)) {
            foreach($this->reaction as $reaction) {
                $reaction->xmlSerialize(true, $sxe->addChild('reaction'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}