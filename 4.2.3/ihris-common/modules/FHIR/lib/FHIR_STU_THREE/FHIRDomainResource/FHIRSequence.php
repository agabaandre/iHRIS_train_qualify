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
 * Raw data describing a biological sequence.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRSequence extends FHIRDomainResource implements JsonSerializable
{
    /**
     * A unique identifier for this particular sequence instance.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * Amino acid / cDNA transcript / RNA variant.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRSequenceType
     */
    public $type = null;

    /**
     * Whether the sequence is numbered starting at 0 (0-based numbering or coordinates) or starting at 1 (1-based numbering). Values are "0" for 0-based numbering and "1" for one-based.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public $coordinateSystem = null;

    /**
     * The patient whose sequencing results are described by this resource.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $patient = null;

    /**
     * Specimen used for sequencing.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $specimen = null;

    /**
     * The method for sequencing, for example, chip information.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $device = null;

    /**
     * Quantity of the sequence.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRQuantity
     */
    public $quantity = null;

    /**
     * A reference sequence is a sequence that is used to represent an allele or variant.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRSequence\FHIRSequenceReferenceSeq
     */
    public $referenceSeq = null;

    /**
     * A' is a variant (mutation) of A = definition every instance of A' is either an immediate mutation of some instance of A, or there is a chain of immediate mutation processes linking A' to some instance of A ([variant_of](http://www.sequenceontology.org/browser/current_svn/term/variant_of)).
     * @var \FHIR_STU_THREE\FHIRResource\FHIRSequence\FHIRSequenceVariant[]
     */
    public $variant = array();

    /**
     * Sequence that was observed.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $observedSeq = null;

    /**
     * An experimental feature attribute that defines the quality of the feature in a quantitative way, such as a phred quality score ([SO:0001686](http://www.sequenceontology.org/browser/current_svn/term/SO:0001686)).
     * @var \FHIR_STU_THREE\FHIRResource\FHIRSequence\FHIRSequenceQuality[]
     */
    public $quality = array();

    /**
     * Coverage (read depth or depth) is the average number of reads representing a given nucleotide in the reconstructed sequence.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public $readCoverage = null;

    /**
     * Configurations of the external repository.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRSequence\FHIRSequenceRepository[]
     */
    public $repository = array();

    /**
     * Pointer to next atomic sequence which at most contains one variant.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $pointer = array();

    /**
     * Structural variant.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRSequence\FHIRSequenceStructureVariant[]
     */
    public $structureVariant = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'Sequence';

    /**
     * A unique identifier for this particular sequence instance.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * A unique identifier for this particular sequence instance.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * Amino acid / cDNA transcript / RNA variant.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRSequenceType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Amino acid / cDNA transcript / RNA variant.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRSequenceType $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Whether the sequence is numbered starting at 0 (0-based numbering or coordinates) or starting at 1 (1-based numbering). Values are "0" for 0-based numbering and "1" for one-based.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public function getCoordinateSystem()
    {
        return $this->coordinateSystem;
    }

    /**
     * Whether the sequence is numbered starting at 0 (0-based numbering or coordinates) or starting at 1 (1-based numbering). Values are "0" for 0-based numbering and "1" for one-based.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRInteger $coordinateSystem
     * @return $this
     */
    public function setCoordinateSystem($coordinateSystem)
    {
        $this->coordinateSystem = $coordinateSystem;
        return $this;
    }

    /**
     * The patient whose sequencing results are described by this resource.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * The patient whose sequencing results are described by this resource.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $patient
     * @return $this
     */
    public function setPatient($patient)
    {
        $this->patient = $patient;
        return $this;
    }

    /**
     * Specimen used for sequencing.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getSpecimen()
    {
        return $this->specimen;
    }

    /**
     * Specimen used for sequencing.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $specimen
     * @return $this
     */
    public function setSpecimen($specimen)
    {
        $this->specimen = $specimen;
        return $this;
    }

    /**
     * The method for sequencing, for example, chip information.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getDevice()
    {
        return $this->device;
    }

    /**
     * The method for sequencing, for example, chip information.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $device
     * @return $this
     */
    public function setDevice($device)
    {
        $this->device = $device;
        return $this;
    }

    /**
     * Quantity of the sequence.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRQuantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Quantity of the sequence.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRQuantity $quantity
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * A reference sequence is a sequence that is used to represent an allele or variant.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRSequence\FHIRSequenceReferenceSeq
     */
    public function getReferenceSeq()
    {
        return $this->referenceSeq;
    }

    /**
     * A reference sequence is a sequence that is used to represent an allele or variant.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRSequence\FHIRSequenceReferenceSeq $referenceSeq
     * @return $this
     */
    public function setReferenceSeq($referenceSeq)
    {
        $this->referenceSeq = $referenceSeq;
        return $this;
    }

    /**
     * A' is a variant (mutation) of A = definition every instance of A' is either an immediate mutation of some instance of A, or there is a chain of immediate mutation processes linking A' to some instance of A ([variant_of](http://www.sequenceontology.org/browser/current_svn/term/variant_of)).
     * @return \FHIR_STU_THREE\FHIRResource\FHIRSequence\FHIRSequenceVariant[]
     */
    public function getVariant()
    {
        return $this->variant;
    }

    /**
     * A' is a variant (mutation) of A = definition every instance of A' is either an immediate mutation of some instance of A, or there is a chain of immediate mutation processes linking A' to some instance of A ([variant_of](http://www.sequenceontology.org/browser/current_svn/term/variant_of)).
     * @param \FHIR_STU_THREE\FHIRResource\FHIRSequence\FHIRSequenceVariant[] $variant
     * @return $this
     */
    public function addVariant($variant)
    {
        $this->variant[] = $variant;
        return $this;
    }

    /**
     * Sequence that was observed.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getObservedSeq()
    {
        return $this->observedSeq;
    }

    /**
     * Sequence that was observed.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $observedSeq
     * @return $this
     */
    public function setObservedSeq($observedSeq)
    {
        $this->observedSeq = $observedSeq;
        return $this;
    }

    /**
     * An experimental feature attribute that defines the quality of the feature in a quantitative way, such as a phred quality score ([SO:0001686](http://www.sequenceontology.org/browser/current_svn/term/SO:0001686)).
     * @return \FHIR_STU_THREE\FHIRResource\FHIRSequence\FHIRSequenceQuality[]
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * An experimental feature attribute that defines the quality of the feature in a quantitative way, such as a phred quality score ([SO:0001686](http://www.sequenceontology.org/browser/current_svn/term/SO:0001686)).
     * @param \FHIR_STU_THREE\FHIRResource\FHIRSequence\FHIRSequenceQuality[] $quality
     * @return $this
     */
    public function addQuality($quality)
    {
        $this->quality[] = $quality;
        return $this;
    }

    /**
     * Coverage (read depth or depth) is the average number of reads representing a given nucleotide in the reconstructed sequence.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRInteger
     */
    public function getReadCoverage()
    {
        return $this->readCoverage;
    }

    /**
     * Coverage (read depth or depth) is the average number of reads representing a given nucleotide in the reconstructed sequence.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRInteger $readCoverage
     * @return $this
     */
    public function setReadCoverage($readCoverage)
    {
        $this->readCoverage = $readCoverage;
        return $this;
    }

    /**
     * Configurations of the external repository.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRSequence\FHIRSequenceRepository[]
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * Configurations of the external repository.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRSequence\FHIRSequenceRepository[] $repository
     * @return $this
     */
    public function addRepository($repository)
    {
        $this->repository[] = $repository;
        return $this;
    }

    /**
     * Pointer to next atomic sequence which at most contains one variant.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getPointer()
    {
        return $this->pointer;
    }

    /**
     * Pointer to next atomic sequence which at most contains one variant.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $pointer
     * @return $this
     */
    public function addPointer($pointer)
    {
        $this->pointer[] = $pointer;
        return $this;
    }

    /**
     * Structural variant.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRSequence\FHIRSequenceStructureVariant[]
     */
    public function getStructureVariant()
    {
        return $this->structureVariant;
    }

    /**
     * Structural variant.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRSequence\FHIRSequenceStructureVariant[] $structureVariant
     * @return $this
     */
    public function addStructureVariant($structureVariant)
    {
        $this->structureVariant[] = $structureVariant;
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
        if (null !== $this->type) $json['type'] = $this->type->jsonSerialize();
        if (null !== $this->coordinateSystem) $json['coordinateSystem'] = $this->coordinateSystem->jsonSerialize();
        if (null !== $this->patient) $json['patient'] = $this->patient->jsonSerialize();
        if (null !== $this->specimen) $json['specimen'] = $this->specimen->jsonSerialize();
        if (null !== $this->device) $json['device'] = $this->device->jsonSerialize();
        if (null !== $this->quantity) $json['quantity'] = $this->quantity->jsonSerialize();
        if (null !== $this->referenceSeq) $json['referenceSeq'] = $this->referenceSeq->jsonSerialize();
        if (0 < count($this->variant)) {
            $json['variant'] = array();
            foreach($this->variant as $variant) {
                $json['variant'][] = $variant->jsonSerialize();
            }
        }
        if (null !== $this->observedSeq) $json['observedSeq'] = $this->observedSeq->jsonSerialize();
        if (0 < count($this->quality)) {
            $json['quality'] = array();
            foreach($this->quality as $quality) {
                $json['quality'][] = $quality->jsonSerialize();
            }
        }
        if (null !== $this->readCoverage) $json['readCoverage'] = $this->readCoverage->jsonSerialize();
        if (0 < count($this->repository)) {
            $json['repository'] = array();
            foreach($this->repository as $repository) {
                $json['repository'][] = $repository->jsonSerialize();
            }
        }
        if (0 < count($this->pointer)) {
            $json['pointer'] = array();
            foreach($this->pointer as $pointer) {
                $json['pointer'][] = $pointer->jsonSerialize();
            }
        }
        if (0 < count($this->structureVariant)) {
            $json['structureVariant'] = array();
            foreach($this->structureVariant as $structureVariant) {
                $json['structureVariant'][] = $structureVariant->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<Sequence xmlns="http://hl7.org/fhir"></Sequence>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (null !== $this->type) $this->type->xmlSerialize(true, $sxe->addChild('type'));
        if (null !== $this->coordinateSystem) $this->coordinateSystem->xmlSerialize(true, $sxe->addChild('coordinateSystem'));
        if (null !== $this->patient) $this->patient->xmlSerialize(true, $sxe->addChild('patient'));
        if (null !== $this->specimen) $this->specimen->xmlSerialize(true, $sxe->addChild('specimen'));
        if (null !== $this->device) $this->device->xmlSerialize(true, $sxe->addChild('device'));
        if (null !== $this->quantity) $this->quantity->xmlSerialize(true, $sxe->addChild('quantity'));
        if (null !== $this->referenceSeq) $this->referenceSeq->xmlSerialize(true, $sxe->addChild('referenceSeq'));
        if (0 < count($this->variant)) {
            foreach($this->variant as $variant) {
                $variant->xmlSerialize(true, $sxe->addChild('variant'));
            }
        }
        if (null !== $this->observedSeq) $this->observedSeq->xmlSerialize(true, $sxe->addChild('observedSeq'));
        if (0 < count($this->quality)) {
            foreach($this->quality as $quality) {
                $quality->xmlSerialize(true, $sxe->addChild('quality'));
            }
        }
        if (null !== $this->readCoverage) $this->readCoverage->xmlSerialize(true, $sxe->addChild('readCoverage'));
        if (0 < count($this->repository)) {
            foreach($this->repository as $repository) {
                $repository->xmlSerialize(true, $sxe->addChild('repository'));
            }
        }
        if (0 < count($this->pointer)) {
            foreach($this->pointer as $pointer) {
                $pointer->xmlSerialize(true, $sxe->addChild('pointer'));
            }
        }
        if (0 < count($this->structureVariant)) {
            foreach($this->structureVariant as $structureVariant) {
                $structureVariant->xmlSerialize(true, $sxe->addChild('structureVariant'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}