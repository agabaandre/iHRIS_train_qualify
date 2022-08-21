<?php namespace FHIR_STU_THREE\FHIRResource\FHIRTiming;

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
 * Specifies an event that may occur multiple times. Timing schedules are used to record when things are expected or requested to occur. The most common usage is in dosage instructions for medications. They are also used when planning care of various kinds.
 * If the element is present, it must have a value for at least one of the defined elements, an @id referenced from the Narrative, or extensions
 */
class FHIRTimingRepeat extends FHIRElement implements JsonSerializable
{
    /**
     * Either a duration for the length of the timing schedule, a range of possible length, or outer bounds for start and/or end limits of the timing schedule. (choose any one of bounds*, but only one)
     * @var \FHIR_STU_THREE\FHIRDuration
     */
    public $boundsDuration = null;

    /**
     * Either a duration for the length of the timing schedule, a range of possible length, or outer bounds for start and/or end limits of the timing schedule. (choose any one of bounds*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRRange
     */
    public $boundsRange = null;

    /**
     * Either a duration for the length of the timing schedule, a range of possible length, or outer bounds for start and/or end limits of the timing schedule. (choose any one of bounds*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public $boundsPeriod = null;

    /**
     * A total count of the desired number of repetitions.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public $count = null;

    /**
     * A maximum value for the count of the desired repetitions (e.g. do something 6-8 times).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public $countMax = null;

    /**
     * How long this thing happens for when it happens.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDecimal
     */
    public $duration = null;

    /**
     * The upper limit of how long this thing happens for when it happens.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDecimal
     */
    public $durationMax = null;

    /**
     * The units of time for the duration, in UCUM units.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRUnitsOfTime
     */
    public $durationUnit = null;

    /**
     * The number of times to repeat the action within the specified period / period range (i.e. both period and periodMax provided).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public $frequency = null;

    /**
     * If present, indicates that the frequency is a range - so repeat between [frequency] and [frequencyMax] times within the period or period range.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public $frequencyMax = null;

    /**
     * Indicates the duration of time over which repetitions are to occur; e.g. to express "3 times per day", 3 would be the frequency and "1 day" would be the period.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDecimal
     */
    public $period = null;

    /**
     * If present, indicates that the period is a range from [period] to [periodMax], allowing expressing concepts such as "do this once every 3-5 days.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDecimal
     */
    public $periodMax = null;

    /**
     * The units of time for the period in UCUM units.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRUnitsOfTime
     */
    public $periodUnit = null;

    /**
     * A real world event that the occurrence of the event should be tied to.
     * @var \FHIR_STU_THREE\FHIRElement\FHIREventTiming
     */
    public $when = null;

    /**
     * The number of minutes from the event. If the event code does not indicate whether the minutes is before or after the event, then the offset is assumed to be after the event.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRUnsignedInt
     */
    public $offset = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'Timing.Repeat';

    /**
     * Either a duration for the length of the timing schedule, a range of possible length, or outer bounds for start and/or end limits of the timing schedule. (choose any one of bounds*, but only one)
     * @return \FHIR_STU_THREE\FHIRDuration
     */
    public function getBoundsDuration()
    {
        return $this->boundsDuration;
    }

    /**
     * Either a duration for the length of the timing schedule, a range of possible length, or outer bounds for start and/or end limits of the timing schedule. (choose any one of bounds*, but only one)
     * @param \FHIR_STU_THREE\FHIRDuration $boundsDuration
     * @return $this
     */
    public function setBoundsDuration($boundsDuration)
    {
        $this->boundsDuration = $boundsDuration;
        return $this;
    }

    /**
     * Either a duration for the length of the timing schedule, a range of possible length, or outer bounds for start and/or end limits of the timing schedule. (choose any one of bounds*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRRange
     */
    public function getBoundsRange()
    {
        return $this->boundsRange;
    }

    /**
     * Either a duration for the length of the timing schedule, a range of possible length, or outer bounds for start and/or end limits of the timing schedule. (choose any one of bounds*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRRange $boundsRange
     * @return $this
     */
    public function setBoundsRange($boundsRange)
    {
        $this->boundsRange = $boundsRange;
        return $this;
    }

    /**
     * Either a duration for the length of the timing schedule, a range of possible length, or outer bounds for start and/or end limits of the timing schedule. (choose any one of bounds*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public function getBoundsPeriod()
    {
        return $this->boundsPeriod;
    }

    /**
     * Either a duration for the length of the timing schedule, a range of possible length, or outer bounds for start and/or end limits of the timing schedule. (choose any one of bounds*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPeriod $boundsPeriod
     * @return $this
     */
    public function setBoundsPeriod($boundsPeriod)
    {
        $this->boundsPeriod = $boundsPeriod;
        return $this;
    }

    /**
     * A total count of the desired number of repetitions.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * A total count of the desired number of repetitions.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRInteger $count
     * @return $this
     */
    public function setCount($count)
    {
        $this->count = $count;
        return $this;
    }

    /**
     * A maximum value for the count of the desired repetitions (e.g. do something 6-8 times).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public function getCountMax()
    {
        return $this->countMax;
    }

    /**
     * A maximum value for the count of the desired repetitions (e.g. do something 6-8 times).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRInteger $countMax
     * @return $this
     */
    public function setCountMax($countMax)
    {
        $this->countMax = $countMax;
        return $this;
    }

    /**
     * How long this thing happens for when it happens.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDecimal
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * How long this thing happens for when it happens.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDecimal $duration
     * @return $this
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * The upper limit of how long this thing happens for when it happens.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDecimal
     */
    public function getDurationMax()
    {
        return $this->durationMax;
    }

    /**
     * The upper limit of how long this thing happens for when it happens.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDecimal $durationMax
     * @return $this
     */
    public function setDurationMax($durationMax)
    {
        $this->durationMax = $durationMax;
        return $this;
    }

    /**
     * The units of time for the duration, in UCUM units.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRUnitsOfTime
     */
    public function getDurationUnit()
    {
        return $this->durationUnit;
    }

    /**
     * The units of time for the duration, in UCUM units.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRUnitsOfTime $durationUnit
     * @return $this
     */
    public function setDurationUnit($durationUnit)
    {
        $this->durationUnit = $durationUnit;
        return $this;
    }

    /**
     * The number of times to repeat the action within the specified period / period range (i.e. both period and periodMax provided).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * The number of times to repeat the action within the specified period / period range (i.e. both period and periodMax provided).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRInteger $frequency
     * @return $this
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;
        return $this;
    }

    /**
     * If present, indicates that the frequency is a range - so repeat between [frequency] and [frequencyMax] times within the period or period range.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public function getFrequencyMax()
    {
        return $this->frequencyMax;
    }

    /**
     * If present, indicates that the frequency is a range - so repeat between [frequency] and [frequencyMax] times within the period or period range.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRInteger $frequencyMax
     * @return $this
     */
    public function setFrequencyMax($frequencyMax)
    {
        $this->frequencyMax = $frequencyMax;
        return $this;
    }

    /**
     * Indicates the duration of time over which repetitions are to occur; e.g. to express "3 times per day", 3 would be the frequency and "1 day" would be the period.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDecimal
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Indicates the duration of time over which repetitions are to occur; e.g. to express "3 times per day", 3 would be the frequency and "1 day" would be the period.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDecimal $period
     * @return $this
     */
    public function setPeriod($period)
    {
        $this->period = $period;
        return $this;
    }

    /**
     * If present, indicates that the period is a range from [period] to [periodMax], allowing expressing concepts such as "do this once every 3-5 days.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDecimal
     */
    public function getPeriodMax()
    {
        return $this->periodMax;
    }

    /**
     * If present, indicates that the period is a range from [period] to [periodMax], allowing expressing concepts such as "do this once every 3-5 days.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDecimal $periodMax
     * @return $this
     */
    public function setPeriodMax($periodMax)
    {
        $this->periodMax = $periodMax;
        return $this;
    }

    /**
     * The units of time for the period in UCUM units.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRUnitsOfTime
     */
    public function getPeriodUnit()
    {
        return $this->periodUnit;
    }

    /**
     * The units of time for the period in UCUM units.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRUnitsOfTime $periodUnit
     * @return $this
     */
    public function setPeriodUnit($periodUnit)
    {
        $this->periodUnit = $periodUnit;
        return $this;
    }

    /**
     * A real world event that the occurrence of the event should be tied to.
     * @return \FHIR_STU_THREE\FHIRElement\FHIREventTiming
     */
    public function getWhen()
    {
        return $this->when;
    }

    /**
     * A real world event that the occurrence of the event should be tied to.
     * @param \FHIR_STU_THREE\FHIRElement\FHIREventTiming $when
     * @return $this
     */
    public function setWhen($when)
    {
        $this->when = $when;
        return $this;
    }

    /**
     * The number of minutes from the event. If the event code does not indicate whether the minutes is before or after the event, then the offset is assumed to be after the event.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRUnsignedInt
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * The number of minutes from the event. If the event code does not indicate whether the minutes is before or after the event, then the offset is assumed to be after the event.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRUnsignedInt $offset
     * @return $this
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
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
        if (null !== $this->boundsDuration) $json['boundsDuration'] = $this->boundsDuration->jsonSerialize();
        if (null !== $this->boundsRange) $json['boundsRange'] = $this->boundsRange->jsonSerialize();
        if (null !== $this->boundsPeriod) $json['boundsPeriod'] = $this->boundsPeriod->jsonSerialize();
        if (null !== $this->count) $json['count'] = $this->count->jsonSerialize();
        if (null !== $this->countMax) $json['countMax'] = $this->countMax->jsonSerialize();
        if (null !== $this->duration) $json['duration'] = $this->duration->jsonSerialize();
        if (null !== $this->durationMax) $json['durationMax'] = $this->durationMax->jsonSerialize();
        if (null !== $this->durationUnit) $json['durationUnit'] = $this->durationUnit->jsonSerialize();
        if (null !== $this->frequency) $json['frequency'] = $this->frequency->jsonSerialize();
        if (null !== $this->frequencyMax) $json['frequencyMax'] = $this->frequencyMax->jsonSerialize();
        if (null !== $this->period) $json['period'] = $this->period->jsonSerialize();
        if (null !== $this->periodMax) $json['periodMax'] = $this->periodMax->jsonSerialize();
        if (null !== $this->periodUnit) $json['periodUnit'] = $this->periodUnit->jsonSerialize();
        if (null !== $this->when) $json['when'] = $this->when->jsonSerialize();
        if (null !== $this->offset) $json['offset'] = $this->offset->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<TimingRepeat xmlns="http://hl7.org/fhir"></TimingRepeat>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->boundsDuration) $this->boundsDuration->xmlSerialize(true, $sxe->addChild('boundsDuration'));
        if (null !== $this->boundsRange) $this->boundsRange->xmlSerialize(true, $sxe->addChild('boundsRange'));
        if (null !== $this->boundsPeriod) $this->boundsPeriod->xmlSerialize(true, $sxe->addChild('boundsPeriod'));
        if (null !== $this->count) $this->count->xmlSerialize(true, $sxe->addChild('count'));
        if (null !== $this->countMax) $this->countMax->xmlSerialize(true, $sxe->addChild('countMax'));
        if (null !== $this->duration) $this->duration->xmlSerialize(true, $sxe->addChild('duration'));
        if (null !== $this->durationMax) $this->durationMax->xmlSerialize(true, $sxe->addChild('durationMax'));
        if (null !== $this->durationUnit) $this->durationUnit->xmlSerialize(true, $sxe->addChild('durationUnit'));
        if (null !== $this->frequency) $this->frequency->xmlSerialize(true, $sxe->addChild('frequency'));
        if (null !== $this->frequencyMax) $this->frequencyMax->xmlSerialize(true, $sxe->addChild('frequencyMax'));
        if (null !== $this->period) $this->period->xmlSerialize(true, $sxe->addChild('period'));
        if (null !== $this->periodMax) $this->periodMax->xmlSerialize(true, $sxe->addChild('periodMax'));
        if (null !== $this->periodUnit) $this->periodUnit->xmlSerialize(true, $sxe->addChild('periodUnit'));
        if (null !== $this->when) $this->when->xmlSerialize(true, $sxe->addChild('when'));
        if (null !== $this->offset) $this->offset->xmlSerialize(true, $sxe->addChild('offset'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}