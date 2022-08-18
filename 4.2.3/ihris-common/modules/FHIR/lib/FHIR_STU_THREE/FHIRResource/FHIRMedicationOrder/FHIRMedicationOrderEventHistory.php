<?php namespace FHIR_STU_THREE\FHIRResource\FHIRMedicationOrder;

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

use FHIR_STU_THREE\FHIRElement\FHIRBackboneElement;
use FHIR_STU_THREE\JsonSerializable;

/**
 * An order for both supply of the medication and the instructions for administration of the medication to a patient. The resource is called "MedicationOrder" rather than "MedicationPrescription" to generalize the use across inpatient and outpatient settings as well as for care plans, etc.
 */
class FHIRMedicationOrderEventHistory extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * The status for the event.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRMedicationOrderStatus
     */
    public $status = null;

    /**
     * The action that was taken (e.g. verify, discontinue).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $action = null;

    /**
     * The date/time at which the event occurred.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $dateTime = null;

    /**
     * The person responsible for taking the action.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $actor = null;

    /**
     * The reason why the action was taken.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $reason = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'MedicationOrder.EventHistory';

    /**
     * The status for the event.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRMedicationOrderStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status for the event.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRMedicationOrderStatus $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * The action that was taken (e.g. verify, discontinue).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * The action that was taken (e.g. verify, discontinue).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $action
     * @return $this
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * The date/time at which the event occurred.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * The date/time at which the event occurred.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $dateTime
     * @return $this
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
        return $this;
    }

    /**
     * The person responsible for taking the action.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getActor()
    {
        return $this->actor;
    }

    /**
     * The person responsible for taking the action.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $actor
     * @return $this
     */
    public function setActor($actor)
    {
        $this->actor = $actor;
        return $this;
    }

    /**
     * The reason why the action was taken.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * The reason why the action was taken.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $reason
     * @return $this
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
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
        if (null !== $this->status) $json['status'] = $this->status->jsonSerialize();
        if (null !== $this->action) $json['action'] = $this->action->jsonSerialize();
        if (null !== $this->dateTime) $json['dateTime'] = $this->dateTime->jsonSerialize();
        if (null !== $this->actor) $json['actor'] = $this->actor->jsonSerialize();
        if (null !== $this->reason) $json['reason'] = $this->reason->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<MedicationOrderEventHistory xmlns="http://hl7.org/fhir"></MedicationOrderEventHistory>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (null !== $this->action) $this->action->xmlSerialize(true, $sxe->addChild('action'));
        if (null !== $this->dateTime) $this->dateTime->xmlSerialize(true, $sxe->addChild('dateTime'));
        if (null !== $this->actor) $this->actor->xmlSerialize(true, $sxe->addChild('actor'));
        if (null !== $this->reason) $this->reason->xmlSerialize(true, $sxe->addChild('reason'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}