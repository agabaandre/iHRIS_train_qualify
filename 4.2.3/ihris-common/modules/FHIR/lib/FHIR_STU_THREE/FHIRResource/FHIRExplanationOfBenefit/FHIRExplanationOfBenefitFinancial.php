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
class FHIRExplanationOfBenefitFinancial extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * Deductable, visits, benefit amount.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $type = null;

    /**
     * Benefits allowed. (choose any one of benefit*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRUnsignedInt
     */
    public $benefitUnsignedInt = null;

    /**
     * Benefits allowed. (choose any one of benefit*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $benefitString = null;

    /**
     * Benefits allowed. (choose any one of benefit*, but only one)
     * @var \FHIR_STU_THREE\FHIRMoney
     */
    public $benefitMoney = null;

    /**
     * Benefits used. (choose any one of benefitUsed*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRUnsignedInt
     */
    public $benefitUsedUnsignedInt = null;

    /**
     * Benefits used. (choose any one of benefitUsed*, but only one)
     * @var \FHIR_STU_THREE\FHIRMoney
     */
    public $benefitUsedMoney = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'ExplanationOfBenefit.Financial';

    /**
     * Deductable, visits, benefit amount.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Deductable, visits, benefit amount.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Benefits allowed. (choose any one of benefit*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRUnsignedInt
     */
    public function getBenefitUnsignedInt()
    {
        return $this->benefitUnsignedInt;
    }

    /**
     * Benefits allowed. (choose any one of benefit*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRUnsignedInt $benefitUnsignedInt
     * @return $this
     */
    public function setBenefitUnsignedInt($benefitUnsignedInt)
    {
        $this->benefitUnsignedInt = $benefitUnsignedInt;
        return $this;
    }

    /**
     * Benefits allowed. (choose any one of benefit*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getBenefitString()
    {
        return $this->benefitString;
    }

    /**
     * Benefits allowed. (choose any one of benefit*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $benefitString
     * @return $this
     */
    public function setBenefitString($benefitString)
    {
        $this->benefitString = $benefitString;
        return $this;
    }

    /**
     * Benefits allowed. (choose any one of benefit*, but only one)
     * @return \FHIR_STU_THREE\FHIRMoney
     */
    public function getBenefitMoney()
    {
        return $this->benefitMoney;
    }

    /**
     * Benefits allowed. (choose any one of benefit*, but only one)
     * @param \FHIR_STU_THREE\FHIRMoney $benefitMoney
     * @return $this
     */
    public function setBenefitMoney($benefitMoney)
    {
        $this->benefitMoney = $benefitMoney;
        return $this;
    }

    /**
     * Benefits used. (choose any one of benefitUsed*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRUnsignedInt
     */
    public function getBenefitUsedUnsignedInt()
    {
        return $this->benefitUsedUnsignedInt;
    }

    /**
     * Benefits used. (choose any one of benefitUsed*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRUnsignedInt $benefitUsedUnsignedInt
     * @return $this
     */
    public function setBenefitUsedUnsignedInt($benefitUsedUnsignedInt)
    {
        $this->benefitUsedUnsignedInt = $benefitUsedUnsignedInt;
        return $this;
    }

    /**
     * Benefits used. (choose any one of benefitUsed*, but only one)
     * @return \FHIR_STU_THREE\FHIRMoney
     */
    public function getBenefitUsedMoney()
    {
        return $this->benefitUsedMoney;
    }

    /**
     * Benefits used. (choose any one of benefitUsed*, but only one)
     * @param \FHIR_STU_THREE\FHIRMoney $benefitUsedMoney
     * @return $this
     */
    public function setBenefitUsedMoney($benefitUsedMoney)
    {
        $this->benefitUsedMoney = $benefitUsedMoney;
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
        if (null !== $this->type) $json['type'] = $this->type->jsonSerialize();
        if (null !== $this->benefitUnsignedInt) $json['benefitUnsignedInt'] = $this->benefitUnsignedInt->jsonSerialize();
        if (null !== $this->benefitString) $json['benefitString'] = $this->benefitString->jsonSerialize();
        if (null !== $this->benefitMoney) $json['benefitMoney'] = $this->benefitMoney->jsonSerialize();
        if (null !== $this->benefitUsedUnsignedInt) $json['benefitUsedUnsignedInt'] = $this->benefitUsedUnsignedInt->jsonSerialize();
        if (null !== $this->benefitUsedMoney) $json['benefitUsedMoney'] = $this->benefitUsedMoney->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ExplanationOfBenefitFinancial xmlns="http://hl7.org/fhir"></ExplanationOfBenefitFinancial>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->type) $this->type->xmlSerialize(true, $sxe->addChild('type'));
        if (null !== $this->benefitUnsignedInt) $this->benefitUnsignedInt->xmlSerialize(true, $sxe->addChild('benefitUnsignedInt'));
        if (null !== $this->benefitString) $this->benefitString->xmlSerialize(true, $sxe->addChild('benefitString'));
        if (null !== $this->benefitMoney) $this->benefitMoney->xmlSerialize(true, $sxe->addChild('benefitMoney'));
        if (null !== $this->benefitUsedUnsignedInt) $this->benefitUsedUnsignedInt->xmlSerialize(true, $sxe->addChild('benefitUsedUnsignedInt'));
        if (null !== $this->benefitUsedMoney) $this->benefitUsedMoney->xmlSerialize(true, $sxe->addChild('benefitUsedMoney'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}