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
 * A record of a clinical assessment performed to determine what problem(s) may affect the patient and before planning the treatments or management strategies that are best to manage a patient's condition. Assessments are often 1:1 with a clinical consultation / encounter,  but this varies greatly depending on the clinical workflow. This resource is called "ClinicalImpression" rather than "ClinicalAssessment" to avoid confusion with the recording of assessment tools such as Apgar score.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRClinicalImpression extends FHIRDomainResource implements JsonSerializable
{
    /**
     * A unique identifier assigned to the clinical impression that remains consistent regardless of what server the impression is stored on.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * Identifies the workflow status of the assessment.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRClinicalImpressionStatus
     */
    public $status = null;

    /**
     * Categorizes the type of clinical impression performed.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $code = null;

    /**
     * A summary of the context and/or cause of the assessment - why / where was it peformed, and what patient events/status prompted it.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $description = null;

    /**
     * The patient or group of individuals assessed as part of this record.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $subject = null;

    /**
     * The clinician performing the assessment.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $assessor = null;

    /**
     * Indicates when the documentation of the assessment was complete.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $date = null;

    /**
     * The point in time or period over which the subject was assessed. (choose any one of effective*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $effectiveDateTime = null;

    /**
     * The point in time or period over which the subject was assessed. (choose any one of effective*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public $effectivePeriod = null;

    /**
     * The encounter or episode of care this impression was created as part of.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $context = null;

    /**
     * A reference to the last assesment that was conducted bon this patient. Assessments are often/usually ongoing in nature; a care provider (practitioner or team) will make new assessments on an ongoing basis as new data arises or the patient's conditions changes.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $previous = null;

    /**
     * This a list of the relevant problems/conditions for a patient.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $problem = array();

    /**
     * One or more sets of investigations (signs, symptions, etc.). The actual grouping of investigations vary greatly depending on the type and context of the assessment. These investigations may include data generated during the assessment process, or data previously generated and recorded that is pertinent to the outcomes.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRClinicalImpression\FHIRClinicalImpressionInvestigations[]
     */
    public $investigations = array();

    /**
     * Reference to a specific published clinical protocol that was followed during this assessment, and/or that provides evidence in support of the diagnosis.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRUri[]
     */
    public $protocol = array();

    /**
     * A text summary of the investigations and the diagnosis.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $summary = null;

    /**
     * Specific findings or diagnoses that was considered likely or relevant to ongoing treatment.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRClinicalImpression\FHIRClinicalImpressionFinding[]
     */
    public $finding = array();

    /**
     * Estimate of likely outcome.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $prognosisCodeableConcept = array();

    /**
     * RiskAssessment expressing likely outcome.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $prognosisReference = array();

    /**
     * Plan of action after assessment.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $plan = array();

    /**
     * Actions taken during assessment.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $action = array();

    /**
     * Commentary about the impression, typically recorded after the impression itself was made, though supplemental notes by the original author could also appear.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRAnnotation[]
     */
    public $note = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'ClinicalImpression';

    /**
     * A unique identifier assigned to the clinical impression that remains consistent regardless of what server the impression is stored on.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * A unique identifier assigned to the clinical impression that remains consistent regardless of what server the impression is stored on.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * Identifies the workflow status of the assessment.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRClinicalImpressionStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Identifies the workflow status of the assessment.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRClinicalImpressionStatus $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Categorizes the type of clinical impression performed.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Categorizes the type of clinical impression performed.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * A summary of the context and/or cause of the assessment - why / where was it peformed, and what patient events/status prompted it.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * A summary of the context and/or cause of the assessment - why / where was it peformed, and what patient events/status prompted it.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * The patient or group of individuals assessed as part of this record.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * The patient or group of individuals assessed as part of this record.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * The clinician performing the assessment.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getAssessor()
    {
        return $this->assessor;
    }

    /**
     * The clinician performing the assessment.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $assessor
     * @return $this
     */
    public function setAssessor($assessor)
    {
        $this->assessor = $assessor;
        return $this;
    }

    /**
     * Indicates when the documentation of the assessment was complete.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Indicates when the documentation of the assessment was complete.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * The point in time or period over which the subject was assessed. (choose any one of effective*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getEffectiveDateTime()
    {
        return $this->effectiveDateTime;
    }

    /**
     * The point in time or period over which the subject was assessed. (choose any one of effective*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $effectiveDateTime
     * @return $this
     */
    public function setEffectiveDateTime($effectiveDateTime)
    {
        $this->effectiveDateTime = $effectiveDateTime;
        return $this;
    }

    /**
     * The point in time or period over which the subject was assessed. (choose any one of effective*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public function getEffectivePeriod()
    {
        return $this->effectivePeriod;
    }

    /**
     * The point in time or period over which the subject was assessed. (choose any one of effective*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPeriod $effectivePeriod
     * @return $this
     */
    public function setEffectivePeriod($effectivePeriod)
    {
        $this->effectivePeriod = $effectivePeriod;
        return $this;
    }

    /**
     * The encounter or episode of care this impression was created as part of.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * The encounter or episode of care this impression was created as part of.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $context
     * @return $this
     */
    public function setContext($context)
    {
        $this->context = $context;
        return $this;
    }

    /**
     * A reference to the last assesment that was conducted bon this patient. Assessments are often/usually ongoing in nature; a care provider (practitioner or team) will make new assessments on an ongoing basis as new data arises or the patient's conditions changes.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getPrevious()
    {
        return $this->previous;
    }

    /**
     * A reference to the last assesment that was conducted bon this patient. Assessments are often/usually ongoing in nature; a care provider (practitioner or team) will make new assessments on an ongoing basis as new data arises or the patient's conditions changes.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $previous
     * @return $this
     */
    public function setPrevious($previous)
    {
        $this->previous = $previous;
        return $this;
    }

    /**
     * This a list of the relevant problems/conditions for a patient.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getProblem()
    {
        return $this->problem;
    }

    /**
     * This a list of the relevant problems/conditions for a patient.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $problem
     * @return $this
     */
    public function addProblem($problem)
    {
        $this->problem[] = $problem;
        return $this;
    }

    /**
     * One or more sets of investigations (signs, symptions, etc.). The actual grouping of investigations vary greatly depending on the type and context of the assessment. These investigations may include data generated during the assessment process, or data previously generated and recorded that is pertinent to the outcomes.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRClinicalImpression\FHIRClinicalImpressionInvestigations[]
     */
    public function getInvestigations()
    {
        return $this->investigations;
    }

    /**
     * One or more sets of investigations (signs, symptions, etc.). The actual grouping of investigations vary greatly depending on the type and context of the assessment. These investigations may include data generated during the assessment process, or data previously generated and recorded that is pertinent to the outcomes.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRClinicalImpression\FHIRClinicalImpressionInvestigations[] $investigations
     * @return $this
     */
    public function addInvestigations($investigations)
    {
        $this->investigations[] = $investigations;
        return $this;
    }

    /**
     * Reference to a specific published clinical protocol that was followed during this assessment, and/or that provides evidence in support of the diagnosis.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRUri[]
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * Reference to a specific published clinical protocol that was followed during this assessment, and/or that provides evidence in support of the diagnosis.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRUri[] $protocol
     * @return $this
     */
    public function addProtocol($protocol)
    {
        $this->protocol[] = $protocol;
        return $this;
    }

    /**
     * A text summary of the investigations and the diagnosis.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * A text summary of the investigations and the diagnosis.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $summary
     * @return $this
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * Specific findings or diagnoses that was considered likely or relevant to ongoing treatment.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRClinicalImpression\FHIRClinicalImpressionFinding[]
     */
    public function getFinding()
    {
        return $this->finding;
    }

    /**
     * Specific findings or diagnoses that was considered likely or relevant to ongoing treatment.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRClinicalImpression\FHIRClinicalImpressionFinding[] $finding
     * @return $this
     */
    public function addFinding($finding)
    {
        $this->finding[] = $finding;
        return $this;
    }

    /**
     * Estimate of likely outcome.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getPrognosisCodeableConcept()
    {
        return $this->prognosisCodeableConcept;
    }

    /**
     * Estimate of likely outcome.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $prognosisCodeableConcept
     * @return $this
     */
    public function addPrognosisCodeableConcept($prognosisCodeableConcept)
    {
        $this->prognosisCodeableConcept[] = $prognosisCodeableConcept;
        return $this;
    }

    /**
     * RiskAssessment expressing likely outcome.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getPrognosisReference()
    {
        return $this->prognosisReference;
    }

    /**
     * RiskAssessment expressing likely outcome.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $prognosisReference
     * @return $this
     */
    public function addPrognosisReference($prognosisReference)
    {
        $this->prognosisReference[] = $prognosisReference;
        return $this;
    }

    /**
     * Plan of action after assessment.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * Plan of action after assessment.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $plan
     * @return $this
     */
    public function addPlan($plan)
    {
        $this->plan[] = $plan;
        return $this;
    }

    /**
     * Actions taken during assessment.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Actions taken during assessment.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $action
     * @return $this
     */
    public function addAction($action)
    {
        $this->action[] = $action;
        return $this;
    }

    /**
     * Commentary about the impression, typically recorded after the impression itself was made, though supplemental notes by the original author could also appear.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRAnnotation[]
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Commentary about the impression, typically recorded after the impression itself was made, though supplemental notes by the original author could also appear.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRAnnotation[] $note
     * @return $this
     */
    public function addNote($note)
    {
        $this->note[] = $note;
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
        if (null !== $this->code) $json['code'] = $this->code->jsonSerialize();
        if (null !== $this->description) $json['description'] = $this->description->jsonSerialize();
        if (null !== $this->subject) $json['subject'] = $this->subject->jsonSerialize();
        if (null !== $this->assessor) $json['assessor'] = $this->assessor->jsonSerialize();
        if (null !== $this->date) $json['date'] = $this->date->jsonSerialize();
        if (null !== $this->effectiveDateTime) $json['effectiveDateTime'] = $this->effectiveDateTime->jsonSerialize();
        if (null !== $this->effectivePeriod) $json['effectivePeriod'] = $this->effectivePeriod->jsonSerialize();
        if (null !== $this->context) $json['context'] = $this->context->jsonSerialize();
        if (null !== $this->previous) $json['previous'] = $this->previous->jsonSerialize();
        if (0 < count($this->problem)) {
            $json['problem'] = array();
            foreach($this->problem as $problem) {
                $json['problem'][] = $problem->jsonSerialize();
            }
        }
        if (0 < count($this->investigations)) {
            $json['investigations'] = array();
            foreach($this->investigations as $investigations) {
                $json['investigations'][] = $investigations->jsonSerialize();
            }
        }
        if (0 < count($this->protocol)) {
            $json['protocol'] = array();
            foreach($this->protocol as $protocol) {
                $json['protocol'][] = $protocol->jsonSerialize();
            }
        }
        if (null !== $this->summary) $json['summary'] = $this->summary->jsonSerialize();
        if (0 < count($this->finding)) {
            $json['finding'] = array();
            foreach($this->finding as $finding) {
                $json['finding'][] = $finding->jsonSerialize();
            }
        }
        if (0 < count($this->prognosisCodeableConcept)) {
            $json['prognosisCodeableConcept'] = array();
            foreach($this->prognosisCodeableConcept as $prognosisCodeableConcept) {
                $json['prognosisCodeableConcept'][] = $prognosisCodeableConcept->jsonSerialize();
            }
        }
        if (0 < count($this->prognosisReference)) {
            $json['prognosisReference'] = array();
            foreach($this->prognosisReference as $prognosisReference) {
                $json['prognosisReference'][] = $prognosisReference->jsonSerialize();
            }
        }
        if (0 < count($this->plan)) {
            $json['plan'] = array();
            foreach($this->plan as $plan) {
                $json['plan'][] = $plan->jsonSerialize();
            }
        }
        if (0 < count($this->action)) {
            $json['action'] = array();
            foreach($this->action as $action) {
                $json['action'][] = $action->jsonSerialize();
            }
        }
        if (0 < count($this->note)) {
            $json['note'] = array();
            foreach($this->note as $note) {
                $json['note'][] = $note->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ClinicalImpression xmlns="http://hl7.org/fhir"></ClinicalImpression>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (null !== $this->code) $this->code->xmlSerialize(true, $sxe->addChild('code'));
        if (null !== $this->description) $this->description->xmlSerialize(true, $sxe->addChild('description'));
        if (null !== $this->subject) $this->subject->xmlSerialize(true, $sxe->addChild('subject'));
        if (null !== $this->assessor) $this->assessor->xmlSerialize(true, $sxe->addChild('assessor'));
        if (null !== $this->date) $this->date->xmlSerialize(true, $sxe->addChild('date'));
        if (null !== $this->effectiveDateTime) $this->effectiveDateTime->xmlSerialize(true, $sxe->addChild('effectiveDateTime'));
        if (null !== $this->effectivePeriod) $this->effectivePeriod->xmlSerialize(true, $sxe->addChild('effectivePeriod'));
        if (null !== $this->context) $this->context->xmlSerialize(true, $sxe->addChild('context'));
        if (null !== $this->previous) $this->previous->xmlSerialize(true, $sxe->addChild('previous'));
        if (0 < count($this->problem)) {
            foreach($this->problem as $problem) {
                $problem->xmlSerialize(true, $sxe->addChild('problem'));
            }
        }
        if (0 < count($this->investigations)) {
            foreach($this->investigations as $investigations) {
                $investigations->xmlSerialize(true, $sxe->addChild('investigations'));
            }
        }
        if (0 < count($this->protocol)) {
            foreach($this->protocol as $protocol) {
                $protocol->xmlSerialize(true, $sxe->addChild('protocol'));
            }
        }
        if (null !== $this->summary) $this->summary->xmlSerialize(true, $sxe->addChild('summary'));
        if (0 < count($this->finding)) {
            foreach($this->finding as $finding) {
                $finding->xmlSerialize(true, $sxe->addChild('finding'));
            }
        }
        if (0 < count($this->prognosisCodeableConcept)) {
            foreach($this->prognosisCodeableConcept as $prognosisCodeableConcept) {
                $prognosisCodeableConcept->xmlSerialize(true, $sxe->addChild('prognosisCodeableConcept'));
            }
        }
        if (0 < count($this->prognosisReference)) {
            foreach($this->prognosisReference as $prognosisReference) {
                $prognosisReference->xmlSerialize(true, $sxe->addChild('prognosisReference'));
            }
        }
        if (0 < count($this->plan)) {
            foreach($this->plan as $plan) {
                $plan->xmlSerialize(true, $sxe->addChild('plan'));
            }
        }
        if (0 < count($this->action)) {
            foreach($this->action as $action) {
                $action->xmlSerialize(true, $sxe->addChild('action'));
            }
        }
        if (0 < count($this->note)) {
            foreach($this->note as $note) {
                $note->xmlSerialize(true, $sxe->addChild('note'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}