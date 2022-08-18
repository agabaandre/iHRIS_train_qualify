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
 * Indicates that a medication product is to be or has been dispensed for a named person/patient.  This includes a description of the medication product (supply) provided and the instructions for administering the medication.  The medication dispense is the result of a pharmacy system responding to a medication order.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRMedicationDispense extends FHIRDomainResource implements JsonSerializable
{
    /**
     * Identifier assigned by the dispensing facility - this is an identifier assigned outside FHIR.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $identifier = null;

    /**
     * A code specifying the state of the set of dispense events.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRMedicationDispenseStatus
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
     * A link to a resource representing the person to whom the medication will be given.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $patient = null;

    /**
     * The individual responsible for dispensing the medication.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $dispenser = null;

    /**
     * The organizaation responsible for the dispense of the medication.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $dispensingOrganization = null;

    /**
     * Indicates the medication order that is being dispensed against.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $authorizingPrescription = array();

    /**
     * Indicates the type of dispensing event that is performed. For example, Trial Fill, Completion of Trial, Partial Fill, Emergency Fill, Samples, etc.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $type = null;

    /**
     * The amount of medication that has been dispensed. Includes unit of measure.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRQuantity
     */
    public $quantity = null;

    /**
     * The amount of medication expressed as a timing amount.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRQuantity
     */
    public $daysSupply = null;

    /**
     * The time when the dispensed product was packaged and reviewed.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $whenPrepared = null;

    /**
     * The time the dispensed product was provided to the patient or their representative.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $whenHandedOver = null;

    /**
     * Identification of the facility/location where the medication was shipped to, as part of the dispense event.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $destination = null;

    /**
     * Identifies the person who picked up the medication.  This will usually be a patient or their caregiver, but some cases exist where it can be a healthcare professional.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $receiver = array();

    /**
     * Extra information about the dispense that could not be conveyed in the other attributes.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRAnnotation[]
     */
    public $note = array();

    /**
     * Indicates how the medication is to be used by the patient.  The pharmacist reviews the medication order prior to dispense and updates the dosageInstruction based on the actual product being dispensed.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRMedicationDispense\FHIRMedicationDispenseDosageInstruction[]
     */
    public $dosageInstruction = array();

    /**
     * Indicates whether or not substitution was made as part of the dispense.  In some cases substitution will be expected but does not happen, in other cases substitution is not expected but does happen.  This block explains what substitution did or did not happen and why.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRMedicationDispense\FHIRMedicationDispenseSubstitution
     */
    public $substitution = null;

    /**
     * A summary of the events of interest that have occurred, such as when the dispense was verified.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRMedicationDispense\FHIRMedicationDispenseEventHistory[]
     */
    public $eventHistory = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'MedicationDispense';

    /**
     * Identifier assigned by the dispensing facility - this is an identifier assigned outside FHIR.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Identifier assigned by the dispensing facility - this is an identifier assigned outside FHIR.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $identifier
     * @return $this
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
        return $this;
    }

    /**
     * A code specifying the state of the set of dispense events.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRMedicationDispenseStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * A code specifying the state of the set of dispense events.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRMedicationDispenseStatus $status
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
     * The individual responsible for dispensing the medication.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getDispenser()
    {
        return $this->dispenser;
    }

    /**
     * The individual responsible for dispensing the medication.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $dispenser
     * @return $this
     */
    public function setDispenser($dispenser)
    {
        $this->dispenser = $dispenser;
        return $this;
    }

    /**
     * The organizaation responsible for the dispense of the medication.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getDispensingOrganization()
    {
        return $this->dispensingOrganization;
    }

    /**
     * The organizaation responsible for the dispense of the medication.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $dispensingOrganization
     * @return $this
     */
    public function setDispensingOrganization($dispensingOrganization)
    {
        $this->dispensingOrganization = $dispensingOrganization;
        return $this;
    }

    /**
     * Indicates the medication order that is being dispensed against.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getAuthorizingPrescription()
    {
        return $this->authorizingPrescription;
    }

    /**
     * Indicates the medication order that is being dispensed against.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $authorizingPrescription
     * @return $this
     */
    public function addAuthorizingPrescription($authorizingPrescription)
    {
        $this->authorizingPrescription[] = $authorizingPrescription;
        return $this;
    }

    /**
     * Indicates the type of dispensing event that is performed. For example, Trial Fill, Completion of Trial, Partial Fill, Emergency Fill, Samples, etc.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Indicates the type of dispensing event that is performed. For example, Trial Fill, Completion of Trial, Partial Fill, Emergency Fill, Samples, etc.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * The amount of medication that has been dispensed. Includes unit of measure.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRQuantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * The amount of medication that has been dispensed. Includes unit of measure.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRQuantity $quantity
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * The amount of medication expressed as a timing amount.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRQuantity
     */
    public function getDaysSupply()
    {
        return $this->daysSupply;
    }

    /**
     * The amount of medication expressed as a timing amount.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRQuantity $daysSupply
     * @return $this
     */
    public function setDaysSupply($daysSupply)
    {
        $this->daysSupply = $daysSupply;
        return $this;
    }

    /**
     * The time when the dispensed product was packaged and reviewed.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getWhenPrepared()
    {
        return $this->whenPrepared;
    }

    /**
     * The time when the dispensed product was packaged and reviewed.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $whenPrepared
     * @return $this
     */
    public function setWhenPrepared($whenPrepared)
    {
        $this->whenPrepared = $whenPrepared;
        return $this;
    }

    /**
     * The time the dispensed product was provided to the patient or their representative.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getWhenHandedOver()
    {
        return $this->whenHandedOver;
    }

    /**
     * The time the dispensed product was provided to the patient or their representative.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $whenHandedOver
     * @return $this
     */
    public function setWhenHandedOver($whenHandedOver)
    {
        $this->whenHandedOver = $whenHandedOver;
        return $this;
    }

    /**
     * Identification of the facility/location where the medication was shipped to, as part of the dispense event.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Identification of the facility/location where the medication was shipped to, as part of the dispense event.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $destination
     * @return $this
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
        return $this;
    }

    /**
     * Identifies the person who picked up the medication.  This will usually be a patient or their caregiver, but some cases exist where it can be a healthcare professional.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * Identifies the person who picked up the medication.  This will usually be a patient or their caregiver, but some cases exist where it can be a healthcare professional.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $receiver
     * @return $this
     */
    public function addReceiver($receiver)
    {
        $this->receiver[] = $receiver;
        return $this;
    }

    /**
     * Extra information about the dispense that could not be conveyed in the other attributes.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRAnnotation[]
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Extra information about the dispense that could not be conveyed in the other attributes.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRAnnotation[] $note
     * @return $this
     */
    public function addNote($note)
    {
        $this->note[] = $note;
        return $this;
    }

    /**
     * Indicates how the medication is to be used by the patient.  The pharmacist reviews the medication order prior to dispense and updates the dosageInstruction based on the actual product being dispensed.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRMedicationDispense\FHIRMedicationDispenseDosageInstruction[]
     */
    public function getDosageInstruction()
    {
        return $this->dosageInstruction;
    }

    /**
     * Indicates how the medication is to be used by the patient.  The pharmacist reviews the medication order prior to dispense and updates the dosageInstruction based on the actual product being dispensed.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRMedicationDispense\FHIRMedicationDispenseDosageInstruction[] $dosageInstruction
     * @return $this
     */
    public function addDosageInstruction($dosageInstruction)
    {
        $this->dosageInstruction[] = $dosageInstruction;
        return $this;
    }

    /**
     * Indicates whether or not substitution was made as part of the dispense.  In some cases substitution will be expected but does not happen, in other cases substitution is not expected but does happen.  This block explains what substitution did or did not happen and why.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRMedicationDispense\FHIRMedicationDispenseSubstitution
     */
    public function getSubstitution()
    {
        return $this->substitution;
    }

    /**
     * Indicates whether or not substitution was made as part of the dispense.  In some cases substitution will be expected but does not happen, in other cases substitution is not expected but does happen.  This block explains what substitution did or did not happen and why.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRMedicationDispense\FHIRMedicationDispenseSubstitution $substitution
     * @return $this
     */
    public function setSubstitution($substitution)
    {
        $this->substitution = $substitution;
        return $this;
    }

    /**
     * A summary of the events of interest that have occurred, such as when the dispense was verified.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRMedicationDispense\FHIRMedicationDispenseEventHistory[]
     */
    public function getEventHistory()
    {
        return $this->eventHistory;
    }

    /**
     * A summary of the events of interest that have occurred, such as when the dispense was verified.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRMedicationDispense\FHIRMedicationDispenseEventHistory[] $eventHistory
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
        if (null !== $this->identifier) $json['identifier'] = $this->identifier->jsonSerialize();
        if (null !== $this->status) $json['status'] = $this->status->jsonSerialize();
        if (null !== $this->medicationCodeableConcept) $json['medicationCodeableConcept'] = $this->medicationCodeableConcept->jsonSerialize();
        if (null !== $this->medicationReference) $json['medicationReference'] = $this->medicationReference->jsonSerialize();
        if (null !== $this->patient) $json['patient'] = $this->patient->jsonSerialize();
        if (null !== $this->dispenser) $json['dispenser'] = $this->dispenser->jsonSerialize();
        if (null !== $this->dispensingOrganization) $json['dispensingOrganization'] = $this->dispensingOrganization->jsonSerialize();
        if (0 < count($this->authorizingPrescription)) {
            $json['authorizingPrescription'] = array();
            foreach($this->authorizingPrescription as $authorizingPrescription) {
                $json['authorizingPrescription'][] = $authorizingPrescription->jsonSerialize();
            }
        }
        if (null !== $this->type) $json['type'] = $this->type->jsonSerialize();
        if (null !== $this->quantity) $json['quantity'] = $this->quantity->jsonSerialize();
        if (null !== $this->daysSupply) $json['daysSupply'] = $this->daysSupply->jsonSerialize();
        if (null !== $this->whenPrepared) $json['whenPrepared'] = $this->whenPrepared->jsonSerialize();
        if (null !== $this->whenHandedOver) $json['whenHandedOver'] = $this->whenHandedOver->jsonSerialize();
        if (null !== $this->destination) $json['destination'] = $this->destination->jsonSerialize();
        if (0 < count($this->receiver)) {
            $json['receiver'] = array();
            foreach($this->receiver as $receiver) {
                $json['receiver'][] = $receiver->jsonSerialize();
            }
        }
        if (0 < count($this->note)) {
            $json['note'] = array();
            foreach($this->note as $note) {
                $json['note'][] = $note->jsonSerialize();
            }
        }
        if (0 < count($this->dosageInstruction)) {
            $json['dosageInstruction'] = array();
            foreach($this->dosageInstruction as $dosageInstruction) {
                $json['dosageInstruction'][] = $dosageInstruction->jsonSerialize();
            }
        }
        if (null !== $this->substitution) $json['substitution'] = $this->substitution->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<MedicationDispense xmlns="http://hl7.org/fhir"></MedicationDispense>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->identifier) $this->identifier->xmlSerialize(true, $sxe->addChild('identifier'));
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (null !== $this->medicationCodeableConcept) $this->medicationCodeableConcept->xmlSerialize(true, $sxe->addChild('medicationCodeableConcept'));
        if (null !== $this->medicationReference) $this->medicationReference->xmlSerialize(true, $sxe->addChild('medicationReference'));
        if (null !== $this->patient) $this->patient->xmlSerialize(true, $sxe->addChild('patient'));
        if (null !== $this->dispenser) $this->dispenser->xmlSerialize(true, $sxe->addChild('dispenser'));
        if (null !== $this->dispensingOrganization) $this->dispensingOrganization->xmlSerialize(true, $sxe->addChild('dispensingOrganization'));
        if (0 < count($this->authorizingPrescription)) {
            foreach($this->authorizingPrescription as $authorizingPrescription) {
                $authorizingPrescription->xmlSerialize(true, $sxe->addChild('authorizingPrescription'));
            }
        }
        if (null !== $this->type) $this->type->xmlSerialize(true, $sxe->addChild('type'));
        if (null !== $this->quantity) $this->quantity->xmlSerialize(true, $sxe->addChild('quantity'));
        if (null !== $this->daysSupply) $this->daysSupply->xmlSerialize(true, $sxe->addChild('daysSupply'));
        if (null !== $this->whenPrepared) $this->whenPrepared->xmlSerialize(true, $sxe->addChild('whenPrepared'));
        if (null !== $this->whenHandedOver) $this->whenHandedOver->xmlSerialize(true, $sxe->addChild('whenHandedOver'));
        if (null !== $this->destination) $this->destination->xmlSerialize(true, $sxe->addChild('destination'));
        if (0 < count($this->receiver)) {
            foreach($this->receiver as $receiver) {
                $receiver->xmlSerialize(true, $sxe->addChild('receiver'));
            }
        }
        if (0 < count($this->note)) {
            foreach($this->note as $note) {
                $note->xmlSerialize(true, $sxe->addChild('note'));
            }
        }
        if (0 < count($this->dosageInstruction)) {
            foreach($this->dosageInstruction as $dosageInstruction) {
                $dosageInstruction->xmlSerialize(true, $sxe->addChild('dosageInstruction'));
            }
        }
        if (null !== $this->substitution) $this->substitution->xmlSerialize(true, $sxe->addChild('substitution'));
        if (0 < count($this->eventHistory)) {
            foreach($this->eventHistory as $eventHistory) {
                $eventHistory->xmlSerialize(true, $sxe->addChild('eventHistory'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}