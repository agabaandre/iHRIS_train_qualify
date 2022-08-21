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
class FHIRSequenceVariant extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * Start position (inclusive) of the variant on the  reference sequence.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public $start = null;

    /**
     * End position (exclusive) of the variant on the reference sequence.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public $end = null;

    /**
     * An allele is one of a set of coexisting sequence variants of a gene ([SO:0001023](http://www.sequenceontology.org/browser/current_svn/term/SO:0001023)). Nucleotide(s)/amino acids from start position of sequence to stop position of sequence on the positive (+) strand of the observed sequence. When the sequence  type is DNA, it should be the sequence on the positive (+) strand.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $observedAllele = null;

    /**
     * An allele is one of a set of coexisting sequence variants of a gene ([SO:0001023](http://www.sequenceontology.org/browser/current_svn/term/SO:0001023)). Nucleotide(s)/amino acids from start position of sequence to stop position of sequence on the positive (+) strand of the reference sequence. When the sequence  type is DNA, it should be the sequence on the positive (+) strand.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $referenceAllele = null;

    /**
     * Extended CIGAR string for aligning the sequence with reference bases. See detailed documentation [here](http://support.illumina.com/help/SequencingAnalysisWorkflow/Content/Vault/Informatics/Sequencing_Analysis/CASAVA/swSEQ_mCA_ExtendedCIGARFormat.htm).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $cigar = null;

    /**
     * A pointer to an Observation containing variant information.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $variantPointer = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'Sequence.Variant';

    /**
     * Start position (inclusive) of the variant on the  reference sequence.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Start position (inclusive) of the variant on the  reference sequence.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRInteger $start
     * @return $this
     */
    public function setStart($start)
    {
        $this->start = $start;
        return $this;
    }

    /**
     * End position (exclusive) of the variant on the reference sequence.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * End position (exclusive) of the variant on the reference sequence.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRInteger $end
     * @return $this
     */
    public function setEnd($end)
    {
        $this->end = $end;
        return $this;
    }

    /**
     * An allele is one of a set of coexisting sequence variants of a gene ([SO:0001023](http://www.sequenceontology.org/browser/current_svn/term/SO:0001023)). Nucleotide(s)/amino acids from start position of sequence to stop position of sequence on the positive (+) strand of the observed sequence. When the sequence  type is DNA, it should be the sequence on the positive (+) strand.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getObservedAllele()
    {
        return $this->observedAllele;
    }

    /**
     * An allele is one of a set of coexisting sequence variants of a gene ([SO:0001023](http://www.sequenceontology.org/browser/current_svn/term/SO:0001023)). Nucleotide(s)/amino acids from start position of sequence to stop position of sequence on the positive (+) strand of the observed sequence. When the sequence  type is DNA, it should be the sequence on the positive (+) strand.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $observedAllele
     * @return $this
     */
    public function setObservedAllele($observedAllele)
    {
        $this->observedAllele = $observedAllele;
        return $this;
    }

    /**
     * An allele is one of a set of coexisting sequence variants of a gene ([SO:0001023](http://www.sequenceontology.org/browser/current_svn/term/SO:0001023)). Nucleotide(s)/amino acids from start position of sequence to stop position of sequence on the positive (+) strand of the reference sequence. When the sequence  type is DNA, it should be the sequence on the positive (+) strand.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getReferenceAllele()
    {
        return $this->referenceAllele;
    }

    /**
     * An allele is one of a set of coexisting sequence variants of a gene ([SO:0001023](http://www.sequenceontology.org/browser/current_svn/term/SO:0001023)). Nucleotide(s)/amino acids from start position of sequence to stop position of sequence on the positive (+) strand of the reference sequence. When the sequence  type is DNA, it should be the sequence on the positive (+) strand.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $referenceAllele
     * @return $this
     */
    public function setReferenceAllele($referenceAllele)
    {
        $this->referenceAllele = $referenceAllele;
        return $this;
    }

    /**
     * Extended CIGAR string for aligning the sequence with reference bases. See detailed documentation [here](http://support.illumina.com/help/SequencingAnalysisWorkflow/Content/Vault/Informatics/Sequencing_Analysis/CASAVA/swSEQ_mCA_ExtendedCIGARFormat.htm).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getCigar()
    {
        return $this->cigar;
    }

    /**
     * Extended CIGAR string for aligning the sequence with reference bases. See detailed documentation [here](http://support.illumina.com/help/SequencingAnalysisWorkflow/Content/Vault/Informatics/Sequencing_Analysis/CASAVA/swSEQ_mCA_ExtendedCIGARFormat.htm).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $cigar
     * @return $this
     */
    public function setCigar($cigar)
    {
        $this->cigar = $cigar;
        return $this;
    }

    /**
     * A pointer to an Observation containing variant information.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getVariantPointer()
    {
        return $this->variantPointer;
    }

    /**
     * A pointer to an Observation containing variant information.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $variantPointer
     * @return $this
     */
    public function setVariantPointer($variantPointer)
    {
        $this->variantPointer = $variantPointer;
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
        if (null !== $this->start) $json['start'] = $this->start->jsonSerialize();
        if (null !== $this->end) $json['end'] = $this->end->jsonSerialize();
        if (null !== $this->observedAllele) $json['observedAllele'] = $this->observedAllele->jsonSerialize();
        if (null !== $this->referenceAllele) $json['referenceAllele'] = $this->referenceAllele->jsonSerialize();
        if (null !== $this->cigar) $json['cigar'] = $this->cigar->jsonSerialize();
        if (null !== $this->variantPointer) $json['variantPointer'] = $this->variantPointer->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<SequenceVariant xmlns="http://hl7.org/fhir"></SequenceVariant>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->start) $this->start->xmlSerialize(true, $sxe->addChild('start'));
        if (null !== $this->end) $this->end->xmlSerialize(true, $sxe->addChild('end'));
        if (null !== $this->observedAllele) $this->observedAllele->xmlSerialize(true, $sxe->addChild('observedAllele'));
        if (null !== $this->referenceAllele) $this->referenceAllele->xmlSerialize(true, $sxe->addChild('referenceAllele'));
        if (null !== $this->cigar) $this->cigar->xmlSerialize(true, $sxe->addChild('cigar'));
        if (null !== $this->variantPointer) $this->variantPointer->xmlSerialize(true, $sxe->addChild('variantPointer'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}