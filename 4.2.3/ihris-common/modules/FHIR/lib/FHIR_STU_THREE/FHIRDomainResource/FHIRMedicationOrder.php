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
 * An order for both supply of the medication and the instructions for administration of the medication to a patient. The resource is called "MedicationOrder" rather than "MedicationPrescription" to generalize the use across inpatient and outpatient settings as well as for care plans, etc.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRMedicationOrder extends FHIRDomainResource implements JsonSerializable
{
    /**
     * External identifier - one that would be used by another non-FHIR system - for example a re-imbursement system might issue its own id for each prescription that is created.  This is particularly important where FHIR only provides part of an entire workflow process where records have to be tracked through an entire system.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * A code specifying the state of the order.  Generally this will be active or completed state.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRMedicationOrderStatus
     */
    public $status = null;

    /**
     * Identifies the medication being administered. This is a link to a resource that represents the medication which may be the details of the medication or simply an attribute carrying a code that identifies the medication from a known list of medications. (choose any one of medication*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $medicationCodeableConcept = null;

    /**
     * Identifies the medication being administered. This is a link to a resource that represents the medication which may be the details of the medication or simply an attribute carrying a code that identifies the medication from a known list of medications. (choose any one of medication*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $medicationReference = null;

    /**
     * A link to a resource representing the person to whom the medication will be given.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $patient = null;

    /**
     * A link to a resource that identifies the particular occurrence of contact between patient and health care provider.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $encounter = null;

    /**
     * The date (and perhaps time) when the prescription was initially written.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $dateWritten = null;

    /**
     * The healthcare professional responsible for authorizing the initial prescription.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $prescriber = null;

    /**
     * Can be the reason or the indication for writing the prescription.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $reasonCode = array();

    /**
     * Condition that supports why the prescription is being written.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $reasonReference = array();

    /**
     * Extra information about the prescription that could not be conveyed by the other attributes.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRAnnotation[]
     */
    public $note = array();

    /**
     * Indicates where type of medication order and where the medication is expected to be consumed or administered.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRMedicationOrderCategory
     */
    public $category = null;

    /**
     * Indicates how the medication is to be used by the patient.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRMedicationOrder\FHIRMedicationOrderDosageInstruction[]
     */
    public $dosageInstruction = array();

    /**
     * Indicates the specific details for the dispense or medication supply part of a medication order (also known as a Medication Prescription).  Note that this information is NOT always sent with the order.  There may be in some settings (e.g. hospitals) institutional or system support for completing the dispense details in the pharmacy department.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRMedicationOrder\FHIRMedicationOrderDispenseRequest
     */
    public $dispenseRequest = null;

    /**
     * Indicates whether or not substitution can or should be part of the dispense. In some cases substitution must happen, in other cases substitution must not happen, and in others it does not matter. This block explains the prescriber's intent. If nothing is specified substitution may be done.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRMedicationOrder\FHIRMedicationOrderSubstitution
     */
    public $substitution = null;

    /**
     * A link to a resource representing an earlier order related order or prescription.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $priorPrescription = null;

    /**
     * A summary of the events of interest that have occurred as the request is processed; e.g. when the order was verified or when it was completed.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRMedicationOrder\FHIRMedicationOrderEventHistory[]
     */
    public $eventHistory = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'MedicationOrder';

    /**
     * External identifier - one that would be used by another non-FHIR system - for example a re-imbursement system might issue its own id for each prescription that is created.  This is particularly important where FHIR only provides part of an entire workflow process where records have to be tracked through an entire system.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * External identifier - one that would be used by another non-FHIR system - for example a re-imbursement system might issue its own id for each prescription that is created.  This is particularly important where FHIR only provides part of an entire workflow process where records have to be tracked through an entire system.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * A code specifying the state of the order.  Generally this will be active or completed state.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRMedicationOrderStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * A code specifying the state of the order.  Generally this will be active or completed state.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRMedicationOrderStatus $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Identifies the medication being administered. This is a link to a resource that represents the medication which may be the details of the medication or simply an attribute carrying a code that identifies the medication from a known list of medications. (choose any one of medication*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getMedicationCodeableConcept()
    {
        return $this->medicationCodeableConcept;
    }

    /**
     * Identifies the medication being administered. This is a link to a resource that represents the medication which may be the details of the medication or simply an attribute carrying a code that identifies the medication from a known list of medications. (choose any one of medication*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $medicationCodeableConcept
     * @return $this
     */
    public function setMedicationCodeableConcept($medicationCodeableConcept)
    {
        $this->medicationCodeableConcept = $medicationCodeableConcept;
        return $this;
    }

    /**
     * Identifies the medication being administered. This is a link to a resource that represents the medication which may be the details of the medication or simply an attribute carrying a code that identifies the medication from a known list of medications. (choose any one of medication*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getMedicationReference()
    {
        return $this->medicationReference;
    }

    /**
     * Identifies the medication being administered. This is a link to a resource that represents the medication which may be the details of the medication or simply an attribute carrying a code that identifies the medication from a known list of medications. (choose any one of medication*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $medicationReference
     * @return $this
     */
    public function setMedicationReference($medicationReference)
    {
        $this->medicationReference = $medicationReference;
        return $this;
    }

    /**
     * A link to a resource representing the person to whom the medication will be given.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * A link to a resource representing the person to whom the medication will be given.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $patient
     * @return $this
     */
    public function setPatient($patient)
    {
        $this->patient = $patient;
        return $this;
    }

    /**
     * A link to a resource that identifies the particular occurrence of contact between patient and health care provider.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getEncounter()
    {
        return $this->encounter;
    }

    /**
     * A link to a resource that identifies the particular occurrence of contact between patient and health care provider.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $encounter
     * @return $this
     */
    public function setEncounter($encounter)
    {
        $this->encounter = $encounter;
        return $this;
    }

    /**
     * The date (and perhaps time) when the prescription was initially written.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getDateWritten()
    {
        return $this->dateWritten;
    }

    /**
     * The date (and perhaps time) when the prescription was initially written.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $dateWritten
     * @return $this
     */
    public function setDateWritten($dateWritten)
    {
        $this->dateWritten = $dateWritten;
        return $this;
    }

    /**
     * The healthcare professional responsible for authorizing the initial prescription.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getPrescriber()
    {
        return $this->prescriber;
    }

    /**
     * The healthcare professional responsible for authorizing the initial prescription.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $prescriber
     * @return $this
     */
    public function setPrescriber($prescriber)
    {
        $this->prescriber = $prescriber;
        return $this;
    }

    /**
     * Can be the reason or the indication for writing the prescription.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getReasonCode()
    {
        return $this->reasonCode;
    }

    /**
     * Can be the reason or the indication for writing the prescription.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $reasonCode
     * @return $this
     */
    public function addReasonCode($reasonCode)
    {
        $this->reasonCode[] = $reasonCode;
        return $this;
    }

    /**
     * Condition that supports why the prescription is being written.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getReasonReference()
    {
        return $this->reasonReference;
    }

    /**
     * Condition that supports why the prescription is being written.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $reasonReference
     * @return $this
     */
    public function addReasonReference($reasonReference)
    {
        $this->reasonReference[] = $reasonReference;
        return $this;
    }

    /**
     * Extra information about the prescription that could not be conveyed by the other attributes.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRAnnotation[]
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Extra information about the prescription that could not be conveyed by the other attributes.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRAnnotation[] $note
     * @return $this
     */
    public function addNote($note)
    {
        $this->note[] = $note;
        return $this;
    }

    /**
     * Indicates where type of medication order and where the medication is expected to be consumed or administered.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRMedicationOrderCategory
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Indicates where type of medication order and where the medication is expected to be consumed or administered.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRMedicationOrderCategory $category
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Indicates how the medication is to be used by the patient.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRMedicationOrder\FHIRMedicationOrderDosageInstruction[]
     */
    public function getDosageInstruction()
    {
        return $this->dosageInstruction;
    }

    /**
     * Indicates how the medication is to be used by the patient.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRMedicationOrder\FHIRMedicationOrderDosageInstruction[] $dosageInstruction
     * @return $this
     */
    public function addDosageInstruction($dosageInstruction)
    {
        $this->dosageInstruction[] = $dosageInstruction;
        return $this;
    }

    /**
     * Indicates the specific details for the dispense or medication supply part of a medication order (also known as a Medication Prescription).  Note that this information is NOT always sent with the order.  There may be in some settings (e.g. hospitals) institutional or system support for completing the dispense details in the pharmacy department.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRMedicationOrder\FHIRMedicationOrderDispenseRequest
     */
    public function getDispenseRequest()
    {
        return $this->dispenseRequest;
    }

    /**
     * Indicates the specific details for the dispense or medication supply part of a medication order (also known as a Medication Prescription).  Note that this information is NOT always sent with the order.  There may be in some settings (e.g. hospitals) institutional or system support for completing the dispense details in the pharmacy department.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRMedicationOrder\FHIRMedicationOrderDispenseRequest $dispenseRequest
     * @return $this
     */
    public function setDispenseRequest($dispenseRequest)
    {
        $this->dispenseRequest = $dispenseRequest;
        return $this;
    }

    /**
     * Indicates whether or not substitution can or should be part of the dispense. In some cases substitution must happen, in other cases substitution must not happen, and in others it does not matter. This block explains the prescriber's intent. If nothing is specified substitution may be done.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRMedicationOrder\FHIRMedicationOrderSubstitution
     */
    public function getSubstitution()
    {
        return $this->substitution;
    }

    /**
     * Indicates whether or not substitution can or should be part of the dispense. In some cases substitution must happen, in other cases substitution must not happen, and in others it does not matter. This block explains the prescriber's intent. If nothing is specified substitution may be done.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRMedicationOrder\FHIRMedicationOrderSubstitution $substitution
     * @return $this
     */
    public function setSubstitution($substitution)
    {
        $this->substitution = $substitution;
        return $this;
    }

    /**
     * A link to a resource representing an earlier order related order or prescription.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getPriorPrescription()
    {
        return $this->priorPrescription;
    }

    /**
     * A link to a resource representing an earlier order related order or prescription.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $priorPrescription
     * @return $this
     */
    public function setPriorPrescription($priorPrescription)
    {
        $this->priorPrescription = $priorPrescription;
        return $this;
    }

    /**
     * A summary of the events of interest that have occurred as the request is processed; e.g. when the order was verified or when it was completed.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRMedicationOrder\FHIRMedicationOrderEventHistory[]
     */
    public function getEventHistory()
    {
        return $this->eventHistory;
    }

    /**
     * A summary of the events of interest that have occurred as the request is processed; e.g. when the order was verified or when it was completed.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRMedicationOrder\FHIRMedicationOrderEventHistory[] $eventHistory
     * @return $this
     */
    public function addEventHistory($eventHistory)
    {
        $this->eventHistory[] = $eventHistory;
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
        if (null !== $this->encounter) $json['encounter'] = $this->encounter->jsonSerialize();
        if (null !== $this->dateWritten) $json['dateWritten'] = $this->dateWritten->jsonSerialize();
        if (null !== $this->prescriber) $json['prescriber'] = $this->prescriber->jsonSerialize();
        if (0 < count($this->reasonCode)) {
            $json['reasonCode'] = array();
            foreach($this->reasonCode as $reasonCode) {
                $json['reasonCode'][] = $reasonCode->jsonSerialize();
            }
        }
        if (0 < count($this->reasonReference)) {
            $json['reasonReference'] = array();
            foreach($this->reasonReference as $reasonReference) {
                $json['reasonReference'][] = $reasonReference->jsonSerialize();
            }
        }
        if (0 < count($this->note)) {
            $json['note'] = array();
            foreach($this->note as $note) {
                $json['note'][] = $note->jsonSerialize();
            }
        }
        if (null !== $this->category) $json['category'] = $this->category->jsonSerialize();
        if (0 < count($this->dosageInstruction)) {
            $json['dosageInstruction'] = array();
            foreach($this->dosageInstruction as $dosageInstruction) {
                $json['dosageInstruction'][] = $dosageInstruction->jsonSerialize();
            }
        }
        if (null !== $this->dispenseRequest) $json['dispenseRequest'] = $this->dispenseRequest->jsonSerialize();
        if (null !== $this->substitution) $json['substitution'] = $this->substitution->jsonSerialize();
        if (null !== $this->priorPrescription) $json['priorPrescription'] = $this->priorPrescription->jsonSerialize();
        if (0 < count($this->eventHistory)) {
            $json['eventHistory'] = array();
            foreach($this->eventHistory as $eventHistory) {
                $json['eventHistory'][] = $eventHistory->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<MedicationOrder xmlns="http://hl7.org/fhir"></MedicationOrder>');
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
        if (null !== $this->encounter) $this->encounter->xmlSerialize(true, $sxe->addChild('encounter'));
        if (null !== $this->dateWritten) $this->dateWritten->xmlSerialize(true, $sxe->addChild('dateWritten'));
        if (null !== $this->prescriber) $this->prescriber->xmlSerialize(true, $sxe->addChild('prescriber'));
        if (0 < count($this->reasonCode)) {
            foreach($this->reasonCode as $reasonCode) {
                $reasonCode->xmlSerialize(true, $sxe->addChild('reasonCode'));
            }
        }
        if (0 < count($this->reasonReference)) {
            foreach($this->reasonReference as $reasonReference) {
                $reasonReference->xmlSerialize(true, $sxe->addChild('reasonReference'));
            }
        }
        if (0 < count($this->note)) {
            foreach($this->note as $note) {
                $note->xmlSerialize(true, $sxe->addChild('note'));
            }
        }
        if (null !== $this->category) $this->category->xmlSerialize(true, $sxe->addChild('category'));
        if (0 < count($this->dosageInstruction)) {
            foreach($this->dosageInstruction as $dosageInstruction) {
                $dosageInstruction->xmlSerialize(true, $sxe->addChild('dosageInstruction'));
            }
        }
        if (null !== $this->dispenseRequest) $this->dispenseRequest->xmlSerialize(true, $sxe->addChild('dispenseRequest'));
        if (null !== $this->substitution) $this->substitution->xmlSerialize(true, $sxe->addChild('substitution'));
        if (null !== $this->priorPrescription) $this->priorPrescription->xmlSerialize(true, $sxe->addChild('priorPrescription'));
        if (0 < count($this->eventHistory)) {
            foreach($this->eventHistory as $eventHistory) {
                $eventHistory->xmlSerialize(true, $sxe->addChild('eventHistory'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}