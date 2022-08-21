<?php namespace FHIR_STU_THREE\FHIRResource\FHIRExplanationOfBenefit;

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
 * This resource provides: the claim details; adjudication details from the processing of a Claim; and optionally account balance information, for informing the subscriber of the benefits provided.
 */
class FHIRExplanationOfBenefitDiagnosis extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * Sequence of diagnosis which serves to order and provide a link.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPositiveInt
     */
    public $sequence = null;

    /**
     * The diagnosis.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $diagnosis = null;

    /**
     * The type of the Diagnosis, for example: admitting,.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding[]
     */
    public $type = array();

    /**
     * The Diagnosis Related Group (DRG) code based on the assigned grouping code system.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $drg = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'ExplanationOfBenefit.Diagnosis';

    /**
     * Sequence of diagnosis which serves to order and provide a link.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPositiveInt
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * Sequence of diagnosis which serves to order and provide a link.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPositiveInt $sequence
     * @return $this
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;
        return $this;
    }

    /**
     * The diagnosis.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getDiagnosis()
    {
        return $this->diagnosis;
    }

    /**
     * The diagnosis.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $diagnosis
     * @return $this
     */
    public function setDiagnosis($diagnosis)
    {
        $this->diagnosis = $diagnosis;
        return $this;
    }

    /**
     * The type of the Diagnosis, for example: admitting,.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding[]
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * The type of the Diagnosis, for example: admitting,.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding[] $type
     * @return $this
     */
    public function addType($type)
    {
        $this->type[] = $type;
        return $this;
    }

    /**
     * The Diagnosis Related Group (DRG) code based on the assigned grouping code system.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getDrg()
    {
        return $this->drg;
    }

    /**
     * The Diagnosis Related Group (DRG) code based on the assigned grouping code system.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $drg
     * @return $this
     */
    public function setDrg($drg)
    {
        $this->drg = $drg;
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
        if (null !== $this->sequence) $json['sequence'] = $this->sequence->jsonSerialize();
        if (null !== $this->diagnosis) $json['diagnosis'] = $this->diagnosis->jsonSerialize();
        if (0 < count($this->type)) {
            $json['type'] = array();
            foreach($this->type as $type) {
                $json['type'][] = $type->jsonSerialize();
            }
        }
        if (null !== $this->drg) $json['drg'] = $this->drg->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ExplanationOfBenefitDiagnosis xmlns="http://hl7.org/fhir"></ExplanationOfBenefitDiagnosis>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->sequence) $this->sequence->xmlSerialize(true, $sxe->addChild('sequence'));
        if (null !== $this->diagnosis) $this->diagnosis->xmlSerialize(true, $sxe->addChild('diagnosis'));
        if (0 < count($this->type)) {
            foreach($this->type as $type) {
                $type->xmlSerialize(true, $sxe->addChild('type'));
            }
        }
        if (null !== $this->drg) $this->drg->xmlSerialize(true, $sxe->addChild('drg'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}