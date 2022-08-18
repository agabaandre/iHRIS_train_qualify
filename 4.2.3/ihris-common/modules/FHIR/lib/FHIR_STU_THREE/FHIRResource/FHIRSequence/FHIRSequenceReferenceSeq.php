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
class FHIRSequenceReferenceSeq extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * Structural unit composed of a nucleic acid molecule which controls its own replication through the interaction of specific proteins at one or more origins of replication ([SO:0000340](http://www.sequenceontology.org/browser/current_svn/term/SO:0000340)).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $chromosome = null;

    /**
     * The Genome Build used for reference, following GRCh build versions e.g. 'GRCh 37'.  Version number must be included if a versioned release of a primary build was used.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $genomeBuild = null;

    /**
     * Reference identifier of reference sequence submitted to NCBI. It must match the type in the Sequence.type field. For example, the prefix, “NG_” identifies reference sequence for genes, “NM_” for messenger RNA transcripts, and “NP_” for amino acid sequences.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $referenceSeqId = null;

    /**
     * A Pointer to another Sequence entity as refence sequence.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $referenceSeqPointer = null;

    /**
     * A Reference Sequence string.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $referenceSeqString = null;

    /**
     * Strand of DNA. Available values are "1" for the plus strand and "-1" for the minus strand.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public $strand = null;

    /**
     * Start position (inclusive) of the window on the reference sequence.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public $windowStart = null;

    /**
     * End position (exclusive) of the window on the reference sequence.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public $windowEnd = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'Sequence.ReferenceSeq';

    /**
     * Structural unit composed of a nucleic acid molecule which controls its own replication through the interaction of specific proteins at one or more origins of replication ([SO:0000340](http://www.sequenceontology.org/browser/current_svn/term/SO:0000340)).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getChromosome()
    {
        return $this->chromosome;
    }

    /**
     * Structural unit composed of a nucleic acid molecule which controls its own replication through the interaction of specific proteins at one or more origins of replication ([SO:0000340](http://www.sequenceontology.org/browser/current_svn/term/SO:0000340)).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $chromosome
     * @return $this
     */
    public function setChromosome($chromosome)
    {
        $this->chromosome = $chromosome;
        return $this;
    }

    /**
     * The Genome Build used for reference, following GRCh build versions e.g. 'GRCh 37'.  Version number must be included if a versioned release of a primary build was used.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getGenomeBuild()
    {
        return $this->genomeBuild;
    }

    /**
     * The Genome Build used for reference, following GRCh build versions e.g. 'GRCh 37'.  Version number must be included if a versioned release of a primary build was used.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $genomeBuild
     * @return $this
     */
    public function setGenomeBuild($genomeBuild)
    {
        $this->genomeBuild = $genomeBuild;
        return $this;
    }

    /**
     * Reference identifier of reference sequence submitted to NCBI. It must match the type in the Sequence.type field. For example, the prefix, “NG_” identifies reference sequence for genes, “NM_” for messenger RNA transcripts, and “NP_” for amino acid sequences.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getReferenceSeqId()
    {
        return $this->referenceSeqId;
    }

    /**
     * Reference identifier of reference sequence submitted to NCBI. It must match the type in the Sequence.type field. For example, the prefix, “NG_” identifies reference sequence for genes, “NM_” for messenger RNA transcripts, and “NP_” for amino acid sequences.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $referenceSeqId
     * @return $this
     */
    public function setReferenceSeqId($referenceSeqId)
    {
        $this->referenceSeqId = $referenceSeqId;
        return $this;
    }

    /**
     * A Pointer to another Sequence entity as refence sequence.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getReferenceSeqPointer()
    {
        return $this->referenceSeqPointer;
    }

    /**
     * A Pointer to another Sequence entity as refence sequence.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $referenceSeqPointer
     * @return $this
     */
    public function setReferenceSeqPointer($referenceSeqPointer)
    {
        $this->referenceSeqPointer = $referenceSeqPointer;
        return $this;
    }

    /**
     * A Reference Sequence string.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getReferenceSeqString()
    {
        return $this->referenceSeqString;
    }

    /**
     * A Reference Sequence string.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $referenceSeqString
     * @return $this
     */
    public function setReferenceSeqString($referenceSeqString)
    {
        $this->referenceSeqString = $referenceSeqString;
        return $this;
    }

    /**
     * Strand of DNA. Available values are "1" for the plus strand and "-1" for the minus strand.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public function getStrand()
    {
        return $this->strand;
    }

    /**
     * Strand of DNA. Available values are "1" for the plus strand and "-1" for the minus strand.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRInteger $strand
     * @return $this
     */
    public function setStrand($strand)
    {
        $this->strand = $strand;
        return $this;
    }

    /**
     * Start position (inclusive) of the window on the reference sequence.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public function getWindowStart()
    {
        return $this->windowStart;
    }

    /**
     * Start position (inclusive) of the window on the reference sequence.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRInteger $windowStart
     * @return $this
     */
    public function setWindowStart($windowStart)
    {
        $this->windowStart = $windowStart;
        return $this;
    }

    /**
     * End position (exclusive) of the window on the reference sequence.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public function getWindowEnd()
    {
        return $this->windowEnd;
    }

    /**
     * End position (exclusive) of the window on the reference sequence.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRInteger $windowEnd
     * @return $this
     */
    public function setWindowEnd($windowEnd)
    {
        $this->windowEnd = $windowEnd;
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
        if (null !== $this->chromosome) $json['chromosome'] = $this->chromosome->jsonSerialize();
        if (null !== $this->genomeBuild) $json['genomeBuild'] = $this->genomeBuild->jsonSerialize();
        if (null !== $this->referenceSeqId) $json['referenceSeqId'] = $this->referenceSeqId->jsonSerialize();
        if (null !== $this->referenceSeqPointer) $json['referenceSeqPointer'] = $this->referenceSeqPointer->jsonSerialize();
        if (null !== $this->referenceSeqString) $json['referenceSeqString'] = $this->referenceSeqString->jsonSerialize();
        if (null !== $this->strand) $json['strand'] = $this->strand->jsonSerialize();
        if (null !== $this->windowStart) $json['windowStart'] = $this->windowStart->jsonSerialize();
        if (null !== $this->windowEnd) $json['windowEnd'] = $this->windowEnd->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<SequenceReferenceSeq xmlns="http://hl7.org/fhir"></SequenceReferenceSeq>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->chromosome) $this->chromosome->xmlSerialize(true, $sxe->addChild('chromosome'));
        if (null !== $this->genomeBuild) $this->genomeBuild->xmlSerialize(true, $sxe->addChild('genomeBuild'));
        if (null !== $this->referenceSeqId) $this->referenceSeqId->xmlSerialize(true, $sxe->addChild('referenceSeqId'));
        if (null !== $this->referenceSeqPointer) $this->referenceSeqPointer->xmlSerialize(true, $sxe->addChild('referenceSeqPointer'));
        if (null !== $this->referenceSeqString) $this->referenceSeqString->xmlSerialize(true, $sxe->addChild('referenceSeqString'));
        if (null !== $this->strand) $this->strand->xmlSerialize(true, $sxe->addChild('strand'));
        if (null !== $this->windowStart) $this->windowStart->xmlSerialize(true, $sxe->addChild('windowStart'));
        if (null !== $this->windowEnd) $this->windowEnd->xmlSerialize(true, $sxe->addChild('windowEnd'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}