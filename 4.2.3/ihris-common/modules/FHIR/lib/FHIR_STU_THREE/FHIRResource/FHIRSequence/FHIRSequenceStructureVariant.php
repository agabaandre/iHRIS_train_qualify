<?php namespace FHIR_STU_THREE\FHIRResource\FHIRSequence;

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
 * Raw data describing a biological sequence.
 */
class FHIRSequenceStructureVariant extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * Precision of boundaries.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $precisionOfBoundaries = null;

    /**
     * Structural Variant reported aCGH ratio.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDecimal
     */
    public $reportedaCGHRatio = null;

    /**
     * Structural Variant Length.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public $length = null;

    /**
     * Structural variant outer.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRSequence\FHIRSequenceOuter
     */
    public $outer = null;

    /**
     * Structural variant inner.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRSequence\FHIRSequenceInner
     */
    public $inner = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'Sequence.StructureVariant';

    /**
     * Precision of boundaries.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getPrecisionOfBoundaries()
    {
        return $this->precisionOfBoundaries;
    }

    /**
     * Precision of boundaries.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $precisionOfBoundaries
     * @return $this
     */
    public function setPrecisionOfBoundaries($precisionOfBoundaries)
    {
        $this->precisionOfBoundaries = $precisionOfBoundaries;
        return $this;
    }

    /**
     * Structural Variant reported aCGH ratio.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDecimal
     */
    public function getReportedaCGHRatio()
    {
        return $this->reportedaCGHRatio;
    }

    /**
     * Structural Variant reported aCGH ratio.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDecimal $reportedaCGHRatio
     * @return $this
     */
    public function setReportedaCGHRatio($reportedaCGHRatio)
    {
        $this->reportedaCGHRatio = $reportedaCGHRatio;
        return $this;
    }

    /**
     * Structural Variant Length.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Structural Variant Length.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRInteger $length
     * @return $this
     */
    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

    /**
     * Structural variant outer.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRSequence\FHIRSequenceOuter
     */
    public function getOuter()
    {
        return $this->outer;
    }

    /**
     * Structural variant outer.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRSequence\FHIRSequenceOuter $outer
     * @return $this
     */
    public function setOuter($outer)
    {
        $this->outer = $outer;
        return $this;
    }

    /**
     * Structural variant inner.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRSequence\FHIRSequenceInner
     */
    public function getInner()
    {
        return $this->inner;
    }

    /**
     * Structural variant inner.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRSequence\FHIRSequenceInner $inner
     * @return $this
     */
    public function setInner($inner)
    {
        $this->inner = $inner;
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
        if (null !== $this->precisionOfBoundaries) $json['precisionOfBoundaries'] = $this->precisionOfBoundaries->jsonSerialize();
        if (null !== $this->reportedaCGHRatio) $json['reportedaCGHRatio'] = $this->reportedaCGHRatio->jsonSerialize();
        if (null !== $this->length) $json['length'] = $this->length->jsonSerialize();
        if (null !== $this->outer) $json['outer'] = $this->outer->jsonSerialize();
        if (null !== $this->inner) $json['inner'] = $this->inner->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<SequenceStructureVariant xmlns="http://hl7.org/fhir"></SequenceStructureVariant>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->precisionOfBoundaries) $this->precisionOfBoundaries->xmlSerialize(true, $sxe->addChild('precisionOfBoundaries'));
        if (null !== $this->reportedaCGHRatio) $this->reportedaCGHRatio->xmlSerialize(true, $sxe->addChild('reportedaCGHRatio'));
        if (null !== $this->length) $this->length->xmlSerialize(true, $sxe->addChild('length'));
        if (null !== $this->outer) $this->outer->xmlSerialize(true, $sxe->addChild('outer'));
        if (null !== $this->inner) $this->inner->xmlSerialize(true, $sxe->addChild('inner'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}