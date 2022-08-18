<?php namespace FHIR_STU_THREE\FHIRResource\FHIRClaimResponse;

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
 * This resource provides the adjudication details from the processing of a Claim resource.
 */
class FHIRClaimResponseCoverage extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * A service line item.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPositiveInt
     */
    public $sequence = null;

    /**
     * The instance number of the Coverage which is the focus for adjudication. The Coverage against which the claim is to be adjudicated.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public $focal = null;

    /**
     * Reference to the program or plan identification, underwriter or payor. (choose any one of coverage*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $coverageIdentifier = null;

    /**
     * Reference to the program or plan identification, underwriter or payor. (choose any one of coverage*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $coverageReference = null;

    /**
     * The contract number of a business agreement which describes the terms and conditions.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $businessArrangement = null;

    /**
     * A list of references from the Insurer to which these services pertain.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString[]
     */
    public $preAuthRef = array();

    /**
     * The Coverages adjudication details.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $claimResponse = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'ClaimResponse.Coverage';

    /**
     * A service line item.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPositiveInt
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * A service line item.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPositiveInt $sequence
     * @return $this
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;
        return $this;
    }

    /**
     * The instance number of the Coverage which is the focus for adjudication. The Coverage against which the claim is to be adjudicated.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public function getFocal()
    {
        return $this->focal;
    }

    /**
     * The instance number of the Coverage which is the focus for adjudication. The Coverage against which the claim is to be adjudicated.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBoolean $focal
     * @return $this
     */
    public function setFocal($focal)
    {
        $this->focal = $focal;
        return $this;
    }

    /**
     * Reference to the program or plan identification, underwriter or payor. (choose any one of coverage*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getCoverageIdentifier()
    {
        return $this->coverageIdentifier;
    }

    /**
     * Reference to the program or plan identification, underwriter or payor. (choose any one of coverage*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $coverageIdentifier
     * @return $this
     */
    public function setCoverageIdentifier($coverageIdentifier)
    {
        $this->coverageIdentifier = $coverageIdentifier;
        return $this;
    }

    /**
     * Reference to the program or plan identification, underwriter or payor. (choose any one of coverage*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getCoverageReference()
    {
        return $this->coverageReference;
    }

    /**
     * Reference to the program or plan identification, underwriter or payor. (choose any one of coverage*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $coverageReference
     * @return $this
     */
    public function setCoverageReference($coverageReference)
    {
        $this->coverageReference = $coverageReference;
        return $this;
    }

    /**
     * The contract number of a business agreement which describes the terms and conditions.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getBusinessArrangement()
    {
        return $this->businessArrangement;
    }

    /**
     * The contract number of a business agreement which describes the terms and conditions.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $businessArrangement
     * @return $this
     */
    public function setBusinessArrangement($businessArrangement)
    {
        $this->businessArrangement = $businessArrangement;
        return $this;
    }

    /**
     * A list of references from the Insurer to which these services pertain.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString[]
     */
    public function getPreAuthRef()
    {
        return $this->preAuthRef;
    }

    /**
     * A list of references from the Insurer to which these services pertain.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString[] $preAuthRef
     * @return $this
     */
    public function addPreAuthRef($preAuthRef)
    {
        $this->preAuthRef[] = $preAuthRef;
        return $this;
    }

    /**
     * The Coverages adjudication details.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getClaimResponse()
    {
        return $this->claimResponse;
    }

    /**
     * The Coverages adjudication details.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $claimResponse
     * @return $this
     */
    public function setClaimResponse($claimResponse)
    {
        $this->claimResponse = $claimResponse;
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
        if (null !== $this->focal) $json['focal'] = $this->focal->jsonSerialize();
        if (null !== $this->coverageIdentifier) $json['coverageIdentifier'] = $this->coverageIdentifier->jsonSerialize();
        if (null !== $this->coverageReference) $json['coverageReference'] = $this->coverageReference->jsonSerialize();
        if (null !== $this->businessArrangement) $json['businessArrangement'] = $this->businessArrangement->jsonSerialize();
        if (0 < count($this->preAuthRef)) {
            $json['preAuthRef'] = array();
            foreach($this->preAuthRef as $preAuthRef) {
                $json['preAuthRef'][] = $preAuthRef->jsonSerialize();
            }
        }
        if (null !== $this->claimResponse) $json['claimResponse'] = $this->claimResponse->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ClaimResponseCoverage xmlns="http://hl7.org/fhir"></ClaimResponseCoverage>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->sequence) $this->sequence->xmlSerialize(true, $sxe->addChild('sequence'));
        if (null !== $this->focal) $this->focal->xmlSerialize(true, $sxe->addChild('focal'));
        if (null !== $this->coverageIdentifier) $this->coverageIdentifier->xmlSerialize(true, $sxe->addChild('coverageIdentifier'));
        if (null !== $this->coverageReference) $this->coverageReference->xmlSerialize(true, $sxe->addChild('coverageReference'));
        if (null !== $this->businessArrangement) $this->businessArrangement->xmlSerialize(true, $sxe->addChild('businessArrangement'));
        if (0 < count($this->preAuthRef)) {
            foreach($this->preAuthRef as $preAuthRef) {
                $preAuthRef->xmlSerialize(true, $sxe->addChild('preAuthRef'));
            }
        }
        if (null !== $this->claimResponse) $this->claimResponse->xmlSerialize(true, $sxe->addChild('claimResponse'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}