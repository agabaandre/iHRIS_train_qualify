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
 * The MeasureReport resource contains the results of evaluating a measure.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRMeasureReport extends FHIRDomainResource implements JsonSerializable
{
    /**
     * A reference to the Measure that was evaluated to produce this report.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $measure = null;

    /**
     * The type of measure report. This may be an individual report, which provides a single patient's score for the measure, a patient listing, which returns the list of patients that meet the various criteria in the measure, or a summary report, which returns a population count for each criteria in the measure.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRMeasureReportType
     */
    public $type = null;

    /**
     * Optional Patient if the report was requested for a single patient.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $patient = null;

    /**
     * The reporting period for which the report was calculated.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public $period = null;

    /**
     * The report status. No data will be available until the report status is complete.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRMeasureReportStatus
     */
    public $status = null;

    /**
     * The date this measure report was generated.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $date = null;

    /**
     * Reporting Organization.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $reportingOrganization = null;

    /**
     * The results of the calculation, one for each population group in the measure.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRMeasureReport\FHIRMeasureReportGroup[]
     */
    public $group = array();

    /**
     * A reference to a Bundle containing the Resources that were used in the evaluation of this report.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $evaluatedResources = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'MeasureReport';

    /**
     * A reference to the Measure that was evaluated to produce this report.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getMeasure()
    {
        return $this->measure;
    }

    /**
     * A reference to the Measure that was evaluated to produce this report.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $measure
     * @return $this
     */
    public function setMeasure($measure)
    {
        $this->measure = $measure;
        return $this;
    }

    /**
     * The type of measure report. This may be an individual report, which provides a single patient's score for the measure, a patient listing, which returns the list of patients that meet the various criteria in the measure, or a summary report, which returns a population count for each criteria in the measure.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRMeasureReportType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * The type of measure report. This may be an individual report, which provides a single patient's score for the measure, a patient listing, which returns the list of patients that meet the various criteria in the measure, or a summary report, which returns a population count for each criteria in the measure.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRMeasureReportType $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Optional Patient if the report was requested for a single patient.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * Optional Patient if the report was requested for a single patient.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $patient
     * @return $this
     */
    public function setPatient($patient)
    {
        $this->patient = $patient;
        return $this;
    }

    /**
     * The reporting period for which the report was calculated.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * The reporting period for which the report was calculated.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPeriod $period
     * @return $this
     */
    public function setPeriod($period)
    {
        $this->period = $period;
        return $this;
    }

    /**
     * The report status. No data will be available until the report status is complete.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRMeasureReportStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The report status. No data will be available until the report status is complete.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRMeasureReportStatus $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * The date this measure report was generated.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * The date this measure report was generated.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Reporting Organization.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getReportingOrganization()
    {
        return $this->reportingOrganization;
    }

    /**
     * Reporting Organization.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $reportingOrganization
     * @return $this
     */
    public function setReportingOrganization($reportingOrganization)
    {
        $this->reportingOrganization = $reportingOrganization;
        return $this;
    }

    /**
     * The results of the calculation, one for each population group in the measure.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRMeasureReport\FHIRMeasureReportGroup[]
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * The results of the calculation, one for each population group in the measure.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRMeasureReport\FHIRMeasureReportGroup[] $group
     * @return $this
     */
    public function addGroup($group)
    {
        $this->group[] = $group;
        return $this;
    }

    /**
     * A reference to a Bundle containing the Resources that were used in the evaluation of this report.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getEvaluatedResources()
    {
        return $this->evaluatedResources;
    }

    /**
     * A reference to a Bundle containing the Resources that were used in the evaluation of this report.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $evaluatedResources
     * @return $this
     */
    public function setEvaluatedResources($evaluatedResources)
    {
        $this->evaluatedResources = $evaluatedResources;
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
        if (null !== $this->measure) $json['measure'] = $this->measure->jsonSerialize();
        if (null !== $this->type) $json['type'] = $this->type->jsonSerialize();
        if (null !== $this->patient) $json['patient'] = $this->patient->jsonSerialize();
        if (null !== $this->period) $json['period'] = $this->period->jsonSerialize();
        if (null !== $this->status) $json['status'] = $this->status->jsonSerialize();
        if (null !== $this->date) $json['date'] = $this->date->jsonSerialize();
        if (null !== $this->reportingOrganization) $json['reportingOrganization'] = $this->reportingOrganization->jsonSerialize();
        if (0 < count($this->group)) {
            $json['group'] = array();
            foreach($this->group as $group) {
                $json['group'][] = $group->jsonSerialize();
            }
        }
        if (null !== $this->evaluatedResources) $json['evaluatedResources'] = $this->evaluatedResources->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<MeasureReport xmlns="http://hl7.org/fhir"></MeasureReport>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->measure) $this->measure->xmlSerialize(true, $sxe->addChild('measure'));
        if (null !== $this->type) $this->type->xmlSerialize(true, $sxe->addChild('type'));
        if (null !== $this->patient) $this->patient->xmlSerialize(true, $sxe->addChild('patient'));
        if (null !== $this->period) $this->period->xmlSerialize(true, $sxe->addChild('period'));
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (null !== $this->date) $this->date->xmlSerialize(true, $sxe->addChild('date'));
        if (null !== $this->reportingOrganization) $this->reportingOrganization->xmlSerialize(true, $sxe->addChild('reportingOrganization'));
        if (0 < count($this->group)) {
            foreach($this->group as $group) {
                $group->xmlSerialize(true, $sxe->addChild('group'));
            }
        }
        if (null !== $this->evaluatedResources) $this->evaluatedResources->xmlSerialize(true, $sxe->addChild('evaluatedResources'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}