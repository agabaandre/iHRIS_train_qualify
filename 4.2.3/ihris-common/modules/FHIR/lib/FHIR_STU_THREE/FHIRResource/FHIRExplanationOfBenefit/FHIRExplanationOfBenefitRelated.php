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
class FHIRExplanationOfBenefitRelated extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * Other claims which are related to this claim such as prior claim versions or for related services. (choose any one of claim*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $claimIdentifier = null;

    /**
     * Other claims which are related to this claim such as prior claim versions or for related services. (choose any one of claim*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $claimReference = null;

    /**
     * For example prior or umbrella.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $relationship = null;

    /**
     * An alternate organizational reference to the case or file to which this particular claim pertains - eg Property/Casualy insurer claim # or Workers Compensation case # .
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $reference = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'ExplanationOfBenefit.Related';

    /**
     * Other claims which are related to this claim such as prior claim versions or for related services. (choose any one of claim*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getClaimIdentifier()
    {
        return $this->claimIdentifier;
    }

    /**
     * Other claims which are related to this claim such as prior claim versions or for related services. (choose any one of claim*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $claimIdentifier
     * @return $this
     */
    public function setClaimIdentifier($claimIdentifier)
    {
        $this->claimIdentifier = $claimIdentifier;
        return $this;
    }

    /**
     * Other claims which are related to this claim such as prior claim versions or for related services. (choose any one of claim*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getClaimReference()
    {
        return $this->claimReference;
    }

    /**
     * Other claims which are related to this claim such as prior claim versions or for related services. (choose any one of claim*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $claimReference
     * @return $this
     */
    public function setClaimReference($claimReference)
    {
        $this->claimReference = $claimReference;
        return $this;
    }

    /**
     * For example prior or umbrella.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getRelationship()
    {
        return $this->relationship;
    }

    /**
     * For example prior or umbrella.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $relationship
     * @return $this
     */
    public function setRelationship($relationship)
    {
        $this->relationship = $relationship;
        return $this;
    }

    /**
     * An alternate organizational reference to the case or file to which this particular claim pertains - eg Property/Casualy insurer claim # or Workers Compensation case # .
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * An alternate organizational reference to the case or file to which this particular claim pertains - eg Property/Casualy insurer claim # or Workers Compensation case # .
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $reference
     * @return $this
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
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
        if (null !== $this->claimIdentifier) $json['claimIdentifier'] = $this->claimIdentifier->jsonSerialize();
        if (null !== $this->claimReference) $json['claimReference'] = $this->claimReference->jsonSerialize();
        if (null !== $this->relationship) $json['relationship'] = $this->relationship->jsonSerialize();
        if (null !== $this->reference) $json['reference'] = $this->reference->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ExplanationOfBenefitRelated xmlns="http://hl7.org/fhir"></ExplanationOfBenefitRelated>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->claimIdentifier) $this->claimIdentifier->xmlSerialize(true, $sxe->addChild('claimIdentifier'));
        if (null !== $this->claimReference) $this->claimReference->xmlSerialize(true, $sxe->addChild('claimReference'));
        if (null !== $this->relationship) $this->relationship->xmlSerialize(true, $sxe->addChild('relationship'));
        if (null !== $this->reference) $this->reference->xmlSerialize(true, $sxe->addChild('reference'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}