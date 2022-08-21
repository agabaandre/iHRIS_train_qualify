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
 * An assessment of the likely outcome(s) for a patient or other subject as well as the likelihood of each outcome.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRRiskAssessment extends FHIRDomainResource implements JsonSerializable
{
    /**
     * Business identifier assigned to the risk assessment.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $identifier = null;

    /**
     * A reference to the request that is fulfilled by this risk assessment.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $basedOn = null;

    /**
     * A reference to a resource that this risk assessment is part of, such as a Procedure.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $parent = null;

    /**
     * The status of the RiskAssessment, using the same statuses as an Observation.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCode
     */
    public $status = null;

    /**
     * The type of the risk assessment performed.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $code = null;

    /**
     * The patient or group the risk assessment applies to.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $subject = null;

    /**
     * The encounter where the assessment was performed.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $context = null;

    /**
     * The date (and possibly time) the risk assessment was performed. (choose any one of occurrence*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $occurrenceDateTime = null;

    /**
     * The date (and possibly time) the risk assessment was performed. (choose any one of occurrence*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public $occurrencePeriod = null;

    /**
     * For assessments or prognosis specific to a particular condition, indicates the condition being assessed.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $condition = null;

    /**
     * The provider or software application that performed the assessment.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $performer = null;

    /**
     * The reason the risk assessment was performed. (choose any one of reason*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $reasonCodeableConcept = null;

    /**
     * The reason the risk assessment was performed. (choose any one of reason*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $reasonReference = null;

    /**
     * The algorithm, process or mechanism used to evaluate the risk.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $method = null;

    /**
     * Indicates the source data considered as part of the assessment (FamilyHistory, Observations, Procedures, Conditions, etc.).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $basis = array();

    /**
     * Describes the expected outcome for the subject.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRRiskAssessment\FHIRRiskAssessmentPrediction[]
     */
    public $prediction = array();

    /**
     * A description of the steps that might be taken to reduce the identified risk(s).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $mitigation = null;

    /**
     * Additional comments about the risk assessment.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRAnnotation
     */
    public $note = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'RiskAssessment';

    /**
     * Business identifier assigned to the risk assessment.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Business identifier assigned to the risk assessment.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $identifier
     * @return $this
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
        return $this;
    }

    /**
     * A reference to the request that is fulfilled by this risk assessment.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getBasedOn()
    {
        return $this->basedOn;
    }

    /**
     * A reference to the request that is fulfilled by this risk assessment.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $basedOn
     * @return $this
     */
    public function setBasedOn($basedOn)
    {
        $this->basedOn = $basedOn;
        return $this;
    }

    /**
     * A reference to a resource that this risk assessment is part of, such as a Procedure.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * A reference to a resource that this risk assessment is part of, such as a Procedure.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $parent
     * @return $this
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * The status of the RiskAssessment, using the same statuses as an Observation.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCode
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status of the RiskAssessment, using the same statuses as an Observation.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCode $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * The type of the risk assessment performed.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * The type of the risk assessment performed.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * The patient or group the risk assessment applies to.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * The patient or group the risk assessment applies to.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * The encounter where the assessment was performed.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * The encounter where the assessment was performed.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $context
     * @return $this
     */
    public function setContext($context)
    {
        $this->context = $context;
        return $this;
    }

    /**
     * The date (and possibly time) the risk assessment was performed. (choose any one of occurrence*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getOccurrenceDateTime()
    {
        return $this->occurrenceDateTime;
    }

    /**
     * The date (and possibly time) the risk assessment was performed. (choose any one of occurrence*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $occurrenceDateTime
     * @return $this
     */
    public function setOccurrenceDateTime($occurrenceDateTime)
    {
        $this->occurrenceDateTime = $occurrenceDateTime;
        return $this;
    }

    /**
     * The date (and possibly time) the risk assessment was performed. (choose any one of occurrence*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public function getOccurrencePeriod()
    {
        return $this->occurrencePeriod;
    }

    /**
     * The date (and possibly time) the risk assessment was performed. (choose any one of occurrence*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPeriod $occurrencePeriod
     * @return $this
     */
    public function setOccurrencePeriod($occurrencePeriod)
    {
        $this->occurrencePeriod = $occurrencePeriod;
        return $this;
    }

    /**
     * For assessments or prognosis specific to a particular condition, indicates the condition being assessed.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * For assessments or prognosis specific to a particular condition, indicates the condition being assessed.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $condition
     * @return $this
     */
    public function setCondition($condition)
    {
        $this->condition = $condition;
        return $this;
    }

    /**
     * The provider or software application that performed the assessment.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getPerformer()
    {
        return $this->performer;
    }

    /**
     * The provider or software application that performed the assessment.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $performer
     * @return $this
     */
    public function setPerformer($performer)
    {
        $this->performer = $performer;
        return $this;
    }

    /**
     * The reason the risk assessment was performed. (choose any one of reason*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getReasonCodeableConcept()
    {
        return $this->reasonCodeableConcept;
    }

    /**
     * The reason the risk assessment was performed. (choose any one of reason*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $reasonCodeableConcept
     * @return $this
     */
    public function setReasonCodeableConcept($reasonCodeableConcept)
    {
        $this->reasonCodeableConcept = $reasonCodeableConcept;
        return $this;
    }

    /**
     * The reason the risk assessment was performed. (choose any one of reason*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getReasonReference()
    {
        return $this->reasonReference;
    }

    /**
     * The reason the risk assessment was performed. (choose any one of reason*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $reasonReference
     * @return $this
     */
    public function setReasonReference($reasonReference)
    {
        $this->reasonReference = $reasonReference;
        return $this;
    }

    /**
     * The algorithm, process or mechanism used to evaluate the risk.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * The algorithm, process or mechanism used to evaluate the risk.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $method
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * Indicates the source data considered as part of the assessment (FamilyHistory, Observations, Procedures, Conditions, etc.).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getBasis()
    {
        return $this->basis;
    }

    /**
     * Indicates the source data considered as part of the assessment (FamilyHistory, Observations, Procedures, Conditions, etc.).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $basis
     * @return $this
     */
    public function addBasis($basis)
    {
        $this->basis[] = $basis;
        return $this;
    }

    /**
     * Describes the expected outcome for the subject.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRRiskAssessment\FHIRRiskAssessmentPrediction[]
     */
    public function getPrediction()
    {
        return $this->prediction;
    }

    /**
     * Describes the expected outcome for the subject.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRRiskAssessment\FHIRRiskAssessmentPrediction[] $prediction
     * @return $this
     */
    public function addPrediction($prediction)
    {
        $this->prediction[] = $prediction;
        return $this;
    }

    /**
     * A description of the steps that might be taken to reduce the identified risk(s).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getMitigation()
    {
        return $this->mitigation;
    }

    /**
     * A description of the steps that might be taken to reduce the identified risk(s).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $mitigation
     * @return $this
     */
    public function setMitigation($mitigation)
    {
        $this->mitigation = $mitigation;
        return $this;
    }

    /**
     * Additional comments about the risk assessment.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRAnnotation
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Additional comments about the risk assessment.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRAnnotation $note
     * @return $this
     */
    public function setNote($note)
    {
        $this->note = $note;
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
        if (null !== $this->basedOn) $json['basedOn'] = $this->basedOn->jsonSerialize();
        if (null !== $this->parent) $json['parent'] = $this->parent->jsonSerialize();
        if (null !== $this->status) $json['status'] = $this->status->jsonSerialize();
        if (null !== $this->code) $json['code'] = $this->code->jsonSerialize();
        if (null !== $this->subject) $json['subject'] = $this->subject->jsonSerialize();
        if (null !== $this->context) $json['context'] = $this->context->jsonSerialize();
        if (null !== $this->occurrenceDateTime) $json['occurrenceDateTime'] = $this->occurrenceDateTime->jsonSerialize();
        if (null !== $this->occurrencePeriod) $json['occurrencePeriod'] = $this->occurrencePeriod->jsonSerialize();
        if (null !== $this->condition) $json['condition'] = $this->condition->jsonSerialize();
        if (null !== $this->performer) $json['performer'] = $this->performer->jsonSerialize();
        if (null !== $this->reasonCodeableConcept) $json['reasonCodeableConcept'] = $this->reasonCodeableConcept->jsonSerialize();
        if (null !== $this->reasonReference) $json['reasonReference'] = $this->reasonReference->jsonSerialize();
        if (null !== $this->method) $json['method'] = $this->method->jsonSerialize();
        if (0 < count($this->basis)) {
            $json['basis'] = array();
            foreach($this->basis as $basis) {
                $json['basis'][] = $basis->jsonSerialize();
            }
        }
        if (0 < count($this->prediction)) {
            $json['prediction'] = array();
            foreach($this->prediction as $prediction) {
                $json['prediction'][] = $prediction->jsonSerialize();
            }
        }
        if (null !== $this->mitigation) $json['mitigation'] = $this->mitigation->jsonSerialize();
        if (null !== $this->note) $json['note'] = $this->note->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<RiskAssessment xmlns="http://hl7.org/fhir"></RiskAssessment>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->identifier) $this->identifier->xmlSerialize(true, $sxe->addChild('identifier'));
        if (null !== $this->basedOn) $this->basedOn->xmlSerialize(true, $sxe->addChild('basedOn'));
        if (null !== $this->parent) $this->parent->xmlSerialize(true, $sxe->addChild('parent'));
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (null !== $this->code) $this->code->xmlSerialize(true, $sxe->addChild('code'));
        if (null !== $this->subject) $this->subject->xmlSerialize(true, $sxe->addChild('subject'));
        if (null !== $this->context) $this->context->xmlSerialize(true, $sxe->addChild('context'));
        if (null !== $this->occurrenceDateTime) $this->occurrenceDateTime->xmlSerialize(true, $sxe->addChild('occurrenceDateTime'));
        if (null !== $this->occurrencePeriod) $this->occurrencePeriod->xmlSerialize(true, $sxe->addChild('occurrencePeriod'));
        if (null !== $this->condition) $this->condition->xmlSerialize(true, $sxe->addChild('condition'));
        if (null !== $this->performer) $this->performer->xmlSerialize(true, $sxe->addChild('performer'));
        if (null !== $this->reasonCodeableConcept) $this->reasonCodeableConcept->xmlSerialize(true, $sxe->addChild('reasonCodeableConcept'));
        if (null !== $this->reasonReference) $this->reasonReference->xmlSerialize(true, $sxe->addChild('reasonReference'));
        if (null !== $this->method) $this->method->xmlSerialize(true, $sxe->addChild('method'));
        if (0 < count($this->basis)) {
            foreach($this->basis as $basis) {
                $basis->xmlSerialize(true, $sxe->addChild('basis'));
            }
        }
        if (0 < count($this->prediction)) {
            foreach($this->prediction as $prediction) {
                $prediction->xmlSerialize(true, $sxe->addChild('prediction'));
            }
        }
        if (null !== $this->mitigation) $this->mitigation->xmlSerialize(true, $sxe->addChild('mitigation'));
        if (null !== $this->note) $this->note->xmlSerialize(true, $sxe->addChild('note'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}