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
 * A description of a triggering event.
 * If the element is present, it must have a value for at least one of the defined elements, an @id referenced from the Narrative, or extensions
 */
class FHIRTriggerDefinition extends FHIRElement implements JsonSerializable
{
    /**
     * The type of triggering event.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRTriggerType
     */
    public $type = null;

    /**
     * The name of the event (if this is a named-event trigger).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $eventName = null;

    /**
     * The timing of the event (if this is a period trigger). (choose any one of eventTiming*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRTiming
     */
    public $eventTimingTiming = null;

    /**
     * The timing of the event (if this is a period trigger). (choose any one of eventTiming*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $eventTimingReference = null;

    /**
     * The timing of the event (if this is a period trigger). (choose any one of eventTiming*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDate
     */
    public $eventTimingDate = null;

    /**
     * The timing of the event (if this is a period trigger). (choose any one of eventTiming*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $eventTimingDateTime = null;

    /**
     * The triggering data of the event (if this is a data trigger).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDataRequirement
     */
    public $eventData = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'TriggerDefinition';

    /**
     * The type of triggering event.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRTriggerType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * The type of triggering event.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRTriggerType $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * The name of the event (if this is a named-event trigger).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getEventName()
    {
        return $this->eventName;
    }

    /**
     * The name of the event (if this is a named-event trigger).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $eventName
     * @return $this
     */
    public function setEventName($eventName)
    {
        $this->eventName = $eventName;
        return $this;
    }

    /**
     * The timing of the event (if this is a period trigger). (choose any one of eventTiming*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRTiming
     */
    public function getEventTimingTiming()
    {
        return $this->eventTimingTiming;
    }

    /**
     * The timing of the event (if this is a period trigger). (choose any one of eventTiming*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRTiming $eventTimingTiming
     * @return $this
     */
    public function setEventTimingTiming($eventTimingTiming)
    {
        $this->eventTimingTiming = $eventTimingTiming;
        return $this;
    }

    /**
     * The timing of the event (if this is a period trigger). (choose any one of eventTiming*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getEventTimingReference()
    {
        return $this->eventTimingReference;
    }

    /**
     * The timing of the event (if this is a period trigger). (choose any one of eventTiming*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $eventTimingReference
     * @return $this
     */
    public function setEventTimingReference($eventTimingReference)
    {
        $this->eventTimingReference = $eventTimingReference;
        return $this;
    }

    /**
     * The timing of the event (if this is a period trigger). (choose any one of eventTiming*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDate
     */
    public function getEventTimingDate()
    {
        return $this->eventTimingDate;
    }

    /**
     * The timing of the event (if this is a period trigger). (choose any one of eventTiming*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDate $eventTimingDate
     * @return $this
     */
    public function setEventTimingDate($eventTimingDate)
    {
        $this->eventTimingDate = $eventTimingDate;
        return $this;
    }

    /**
     * The timing of the event (if this is a period trigger). (choose any one of eventTiming*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getEventTimingDateTime()
    {
        return $this->eventTimingDateTime;
    }

    /**
     * The timing of the event (if this is a period trigger). (choose any one of eventTiming*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $eventTimingDateTime
     * @return $this
     */
    public function setEventTimingDateTime($eventTimingDateTime)
    {
        $this->eventTimingDateTime = $eventTimingDateTime;
        return $this;
    }

    /**
     * The triggering data of the event (if this is a data trigger).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDataRequirement
     */
    public function getEventData()
    {
        return $this->eventData;
    }

    /**
     * The triggering data of the event (if this is a data trigger).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDataRequirement $eventData
     * @return $this
     */
    public function setEventData($eventData)
    {
        $this->eventData = $eventData;
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
        if (null !== $this->type) $json['type'] = $this->type->jsonSerialize();
        if (null !== $this->eventName) $json['eventName'] = $this->eventName->jsonSerialize();
        if (null !== $this->eventTimingTiming) $json['eventTimingTiming'] = $this->eventTimingTiming->jsonSerialize();
        if (null !== $this->eventTimingReference) $json['eventTimingReference'] = $this->eventTimingReference->jsonSerialize();
        if (null !== $this->eventTimingDate) $json['eventTimingDate'] = $this->eventTimingDate->jsonSerialize();
        if (null !== $this->eventTimingDateTime) $json['eventTimingDateTime'] = $this->eventTimingDateTime->jsonSerialize();
        if (null !== $this->eventData) $json['eventData'] = $this->eventData->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<TriggerDefinition xmlns="http://hl7.org/fhir"></TriggerDefinition>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->type) $this->type->xmlSerialize(true, $sxe->addChild('type'));
        if (null !== $this->eventName) $this->eventName->xmlSerialize(true, $sxe->addChild('eventName'));
        if (null !== $this->eventTimingTiming) $this->eventTimingTiming->xmlSerialize(true, $sxe->addChild('eventTimingTiming'));
        if (null !== $this->eventTimingReference) $this->eventTimingReference->xmlSerialize(true, $sxe->addChild('eventTimingReference'));
        if (null !== $this->eventTimingDate) $this->eventTimingDate->xmlSerialize(true, $sxe->addChild('eventTimingDate'));
        if (null !== $this->eventTimingDateTime) $this->eventTimingDateTime->xmlSerialize(true, $sxe->addChild('eventTimingDateTime'));
        if (null !== $this->eventData) $this->eventData->xmlSerialize(true, $sxe->addChild('eventData'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}