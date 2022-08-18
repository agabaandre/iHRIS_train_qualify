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
 * A record of a medication that is being consumed by a patient.   A MedicationStatement may indicate that the patient may be taking the medication now, or has taken the medication in the past or will be taking the medication in the future.  The source of this information can be the patient, significant other (such as a family member or spouse), or a clinician.  A common scenario where this information is captured is during the history taking process during a patient visit or stay.   The medication information may come from e.g. the patient's memory, from a prescription bottle,  or from a list of medications the patient, clinician or other party maintains 

The primary difference between a medication statement and a medication administration is that the medication administration has complete administration information and is based on actual administration information from the person who administered the medication.  A medication statement is often, if not always, less specific.  There is no required date/time when the medication was administered, in fact we only know that a source has reported the patient is taking this medication, where details such as time, quantity, or rate or even medication product may be incomplete or missing or less precise.  As stated earlier, the medication statement information may come from the patient's memory, from a prescription bottle or from a list of medications the patient, clinician or other party maintains.  Medication administration is more formal and is not missing detailed information.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRMedicationStatement extends FHIRDomainResource implements JsonSerializable
{
    /**
     * External identifier - FHIR will generate its own internal identifiers (probably URLs) which do not need to be explicitly managed by the resource.  The identifier here is one that would be used by another non-FHIR system - for example an automated medication pump would provide a record each time it operated; an administration while the patient was off the ward might be made with a different system and entered after the event.  Particularly important if these records have to be updated.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * A code representing the patient or other source's judgment about the state of the medication used that this statement is about.  Generally this will be active or completed.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRMedicationStatementStatus
     */
    public $status = null;

    /**
     * Identifies the medication being administered. This is either a link to a resource representing the details of the medication or a simple attribute carrying a code that identifies the medication from a known list of medications. (choose any one of medication*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $medicationCodeableConcept = null;

    /**
     * Identifies the medication being administered. This is either a link to a resource representing the details of the medication or a simple attribute carrying a code that identifies the medication from a known list of medications. (choose any one of medication*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $medicationReference = null;

    /**
     * The person or animal who is/was taking the medication.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $patient = null;

    /**
     * The interval of time during which it is being asserted that the patient was taking the medication (or was not taking, when the wasNotGiven element is true). (choose any one of effective*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $effectiveDateTime = null;

    /**
     * The interval of time during which it is being asserted that the patient was taking the medication (or was not taking, when the wasNotGiven element is true). (choose any one of effective*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public $effectivePeriod = null;

    /**
     * The person who provided the information about the taking of this medication.  Note:  A MedicationStatement may be derived from supportingInformation e.g claims or medicationOrder.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $informationSource = null;

    /**
     * Allows linking the MedicationStatement to the underlying MedicationOrder, or to other information that supports or is used to derive the MedicationStatement.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $supportingInformation = array();

    /**
     * The date when the medication statement was asserted by the information source.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $dateAsserted = null;

    /**
     * Set this to true if the record is saying that the medication was NOT taken.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public $notTaken = null;

    /**
     * A code indicating why the medication was not taken.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $reasonNotTaken = array();

    /**
     * A reason for why the medication is being/was taken.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $reasonForUseCode = array();

    /**
     * Condition that supports why the medication is being/was taken.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $reasonForUseReference = array();

    /**
     * Provides extra information about the medication statement that is not conveyed by the other attributes.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRAnnotation[]
     */
    public $note = array();

    /**
     * Indicates where type of medication statement and where the medication is expected to be consumed or administered.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRMedicationStatementCategory
     */
    public $category = null;

    /**
     * Indicates how the medication is/was used by the patient.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRMedicationStatement\FHIRMedicationStatementDosage[]
     */
    public $dosage = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'MedicationStatement';

    /**
     * External identifier - FHIR will generate its own internal identifiers (probably URLs) which do not need to be explicitly managed by the resource.  The identifier here is one that would be used by another non-FHIR system - for example an automated medication pump would provide a record each time it operated; an administration while the patient was off the ward might be made with a different system and entered after the event.  Particularly important if these records have to be updated.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * External identifier - FHIR will generate its own internal identifiers (probably URLs) which do not need to be explicitly managed by the resource.  The identifier here is one that would be used by another non-FHIR system - for example an automated medication pump would provide a record each time it operated; an administration while the patient was off the ward might be made with a different system and entered after the event.  Particularly important if these records have to be updated.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * A code representing the patient or other source's judgment about the state of the medication used that this statement is about.  Generally this will be active or completed.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRMedicationStatementStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * A code representing the patient or other source's judgment about the state of the medication used that this statement is about.  Generally this will be active or completed.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRMedicationStatementStatus $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Identifies the medication being administered. This is either a link to a resource representing the details of the medication or a simple attribute carrying a code that identifies the medication from a known list of medications. (choose any one of medication*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getMedicationCodeableConcept()
    {
        return $this->medicationCodeableConcept;
    }

    /**
     * Identifies the medication being administered. This is either a link to a resource representing the details of the medication or a simple attribute carrying a code that identifies the medication from a known list of medications. (choose any one of medication*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $medicationCodeableConcept
     * @return $this
     */
    public function setMedicationCodeableConcept($medicationCodeableConcept)
    {
        $this->medicationCodeableConcept = $medicationCodeableConcept;
        return $this;
    }

    /**
     * Identifies the medication being administered. This is either a link to a resource representing the details of the medication or a simple attribute carrying a code that identifies the medication from a known list of medications. (choose any one of medication*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getMedicationReference()
    {
        return $this->medicationReference;
    }

    /**
     * Identifies the medication being administered. This is either a link to a resource representing the details of the medication or a simple attribute carrying a code that identifies the medication from a known list of medications. (choose any one of medication*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $medicationReference
     * @return $this
     */
    public function setMedicationReference($medicationReference)
    {
        $this->medicationReference = $medicationReference;
        return $this;
    }

    /**
     * The person or animal who is/was taking the medication.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * The person or animal who is/was taking the medication.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $patient
     * @return $this
     */
    public function setPatient($patient)
    {
        $this->patient = $patient;
        return $this;
    }

    /**
     * The interval of time during which it is being asserted that the patient was taking the medication (or was not taking, when the wasNotGiven element is true). (choose any one of effective*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getEffectiveDateTime()
    {
        return $this->effectiveDateTime;
    }

    /**
     * The interval of time during which it is being asserted that the patient was taking the medication (or was not taking, when the wasNotGiven element is true). (choose any one of effective*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $effectiveDateTime
     * @return $this
     */
    public function setEffectiveDateTime($effectiveDateTime)
    {
        $this->effectiveDateTime = $effectiveDateTime;
        return $this;
    }

    /**
     * The interval of time during which it is being asserted that the patient was taking the medication (or was not taking, when the wasNotGiven element is true). (choose any one of effective*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public function getEffectivePeriod()
    {
        return $this->effectivePeriod;
    }

    /**
     * The interval of time during which it is being asserted that the patient was taking the medication (or was not taking, when the wasNotGiven element is true). (choose any one of effective*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPeriod $effectivePeriod
     * @return $this
     */
    public function setEffectivePeriod($effectivePeriod)
    {
        $this->effectivePeriod = $effectivePeriod;
        return $this;
    }

    /**
     * The person who provided the information about the taking of this medication.  Note:  A MedicationStatement may be derived from supportingInformation e.g claims or medicationOrder.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getInformationSource()
    {
        return $this->informationSource;
    }

    /**
     * The person who provided the information about the taking of this medication.  Note:  A MedicationStatement may be derived from supportingInformation e.g claims or medicationOrder.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $informationSource
     * @return $this
     */
    public function setInformationSource($informationSource)
    {
        $this->informationSource = $informationSource;
        return $this;
    }

    /**
     * Allows linking the MedicationStatement to the underlying MedicationOrder, or to other information that supports or is used to derive the MedicationStatement.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getSupportingInformation()
    {
        return $this->supportingInformation;
    }

    /**
     * Allows linking the MedicationStatement to the underlying MedicationOrder, or to other information that supports or is used to derive the MedicationStatement.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $supportingInformation
     * @return $this
     */
    public function addSupportingInformation($supportingInformation)
    {
        $this->supportingInformation[] = $supportingInformation;
        return $this;
    }

    /**
     * The date when the medication statement was asserted by the information source.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getDateAsserted()
    {
        return $this->dateAsserted;
    }

    /**
     * The date when the medication statement was asserted by the information source.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $dateAsserted
     * @return $this
     */
    public function setDateAsserted($dateAsserted)
    {
        $this->dateAsserted = $dateAsserted;
        return $this;
    }

    /**
     * Set this to true if the record is saying that the medication was NOT taken.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public function getNotTaken()
    {
        return $this->notTaken;
    }

    /**
     * Set this to true if the record is saying that the medication was NOT taken.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBoolean $notTaken
     * @return $this
     */
    public function setNotTaken($notTaken)
    {
        $this->notTaken = $notTaken;
        return $this;
    }

    /**
     * A code indicating why the medication was not taken.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getReasonNotTaken()
    {
        return $this->reasonNotTaken;
    }

    /**
     * A code indicating why the medication was not taken.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $reasonNotTaken
     * @return $this
     */
    public function addReasonNotTaken($reasonNotTaken)
    {
        $this->reasonNotTaken[] = $reasonNotTaken;
        return $this;
    }

    /**
     * A reason for why the medication is being/was taken.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getReasonForUseCode()
    {
        return $this->reasonForUseCode;
    }

    /**
     * A reason for why the medication is being/was taken.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $reasonForUseCode
     * @return $this
     */
    public function addReasonForUseCode($reasonForUseCode)
    {
        $this->reasonForUseCode[] = $reasonForUseCode;
        return $this;
    }

    /**
     * Condition that supports why the medication is being/was taken.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getReasonForUseReference()
    {
        return $this->reasonForUseReference;
    }

    /**
     * Condition that supports why the medication is being/was taken.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $reasonForUseReference
     * @return $this
     */
    public function addReasonForUseReference($reasonForUseReference)
    {
        $this->reasonForUseReference[] = $reasonForUseReference;
        return $this;
    }

    /**
     * Provides extra information about the medication statement that is not conveyed by the other attributes.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRAnnotation[]
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Provides extra information about the medication statement that is not conveyed by the other attributes.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRAnnotation[] $note
     * @return $this
     */
    public function addNote($note)
    {
        $this->note[] = $note;
        return $this;
    }

    /**
     * Indicates where type of medication statement and where the medication is expected to be consumed or administered.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRMedicationStatementCategory
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Indicates where type of medication statement and where the medication is expected to be consumed or administered.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRMedicationStatementCategory $category
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Indicates how the medication is/was used by the patient.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRMedicationStatement\FHIRMedicationStatementDosage[]
     */
    public function getDosage()
    {
        return $this->dosage;
    }

    /**
     * Indicates how the medication is/was used by the patient.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRMedicationStatement\FHIRMedicationStatementDosage[] $dosage
     * @return $this
     */
    public function addDosage($dosage)
    {
        $this->dosage[] = $dosage;
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
        if (null !== $this->medicationCodeableConcept) $json['medicationCodeableConcept'] = $this->medicationCodeableConcept->jsonSerialize();
        if (null !== $this->medicationReference) $json['medicationReference'] = $this->medicationReference->jsonSerialize();
        if (null !== $this->patient) $json['patient'] = $this->patient->jsonSerialize();
        if (null !== $this->effectiveDateTime) $json['effectiveDateTime'] = $this->effectiveDateTime->jsonSerialize();
        if (null !== $this->effectivePeriod) $json['effectivePeriod'] = $this->effectivePeriod->jsonSerialize();
        if (null !== $this->informationSource) $json['informationSource'] = $this->informationSource->jsonSerialize();
        if (0 < count($this->supportingInformation)) {
            $json['supportingInformation'] = array();
            foreach($this->supportingInformation as $supportingInformation) {
                $json['supportingInformation'][] = $supportingInformation->jsonSerialize();
            }
        }
        if (null !== $this->dateAsserted) $json['dateAsserted'] = $this->dateAsserted->jsonSerialize();
        if (null !== $this->notTaken) $json['notTaken'] = $this->notTaken->jsonSerialize();
        if (0 < count($this->reasonNotTaken)) {
            $json['reasonNotTaken'] = array();
            foreach($this->reasonNotTaken as $reasonNotTaken) {
                $json['reasonNotTaken'][] = $reasonNotTaken->jsonSerialize();
            }
        }
        if (0 < count($this->reasonForUseCode)) {
            $json['reasonForUseCode'] = array();
            foreach($this->reasonForUseCode as $reasonForUseCode) {
                $json['reasonForUseCode'][] = $reasonForUseCode->jsonSerialize();
            }
        }
        if (0 < count($this->reasonForUseReference)) {
            $json['reasonForUseReference'] = array();
            foreach($this->reasonForUseReference as $reasonForUseReference) {
                $json['reasonForUseReference'][] = $reasonForUseReference->jsonSerialize();
            }
        }
        if (0 < count($this->note)) {
            $json['note'] = array();
            foreach($this->note as $note) {
                $json['note'][] = $note->jsonSerialize();
            }
        }
        if (null !== $this->category) $json['category'] = $this->category->jsonSerialize();
        if (0 < count($this->dosage)) {
            $json['dosage'] = array();
            foreach($this->dosage as $dosage) {
                $json['dosage'][] = $dosage->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<MedicationStatement xmlns="http://hl7.org/fhir"></MedicationStatement>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (null !== $this->medicationCodeableConcept) $this->medicationCodeableConcept->xmlSerialize(true, $sxe->addChild('medicationCodeableConcept'));
        if (null !== $this->medicationReference) $this->medicationReference->xmlSerialize(true, $sxe->addChild('medicationReference'));
        if (null !== $this->patient) $this->patient->xmlSerialize(true, $sxe->addChild('patient'));
        if (null !== $this->effectiveDateTime) $this->effectiveDateTime->xmlSerialize(true, $sxe->addChild('effectiveDateTime'));
        if (null !== $this->effectivePeriod) $this->effectivePeriod->xmlSerialize(true, $sxe->addChild('effectivePeriod'));
        if (null !== $this->informationSource) $this->informationSource->xmlSerialize(true, $sxe->addChild('informationSource'));
        if (0 < count($this->supportingInformation)) {
            foreach($this->supportingInformation as $supportingInformation) {
                $supportingInformation->xmlSerialize(true, $sxe->addChild('supportingInformation'));
            }
        }
        if (null !== $this->dateAsserted) $this->dateAsserted->xmlSerialize(true, $sxe->addChild('dateAsserted'));
        if (null !== $this->notTaken) $this->notTaken->xmlSerialize(true, $sxe->addChild('notTaken'));
        if (0 < count($this->reasonNotTaken)) {
            foreach($this->reasonNotTaken as $reasonNotTaken) {
                $reasonNotTaken->xmlSerialize(true, $sxe->addChild('reasonNotTaken'));
            }
        }
        if (0 < count($this->reasonForUseCode)) {
            foreach($this->reasonForUseCode as $reasonForUseCode) {
                $reasonForUseCode->xmlSerialize(true, $sxe->addChild('reasonForUseCode'));
            }
        }
        if (0 < count($this->reasonForUseReference)) {
            foreach($this->reasonForUseReference as $reasonForUseReference) {
                $reasonForUseReference->xmlSerialize(true, $sxe->addChild('reasonForUseReference'));
            }
        }
        if (0 < count($this->note)) {
            foreach($this->note as $note) {
                $note->xmlSerialize(true, $sxe->addChild('note'));
            }
        }
        if (null !== $this->category) $this->category->xmlSerialize(true, $sxe->addChild('category'));
        if (0 < count($this->dosage)) {
            foreach($this->dosage as $dosage) {
                $dosage->xmlSerialize(true, $sxe->addChild('dosage'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}