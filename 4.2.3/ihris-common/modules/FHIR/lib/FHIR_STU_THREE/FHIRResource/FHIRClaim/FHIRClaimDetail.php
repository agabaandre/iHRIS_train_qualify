<?php namespace FHIR_STU_THREE\FHIRResource\FHIRClaim;

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
 * A provider issued list of services and products provided, or to be provided, to a patient which is provided to an insurer for payment recovery.
 */
class FHIRClaimDetail extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * A service line number.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPositiveInt
     */
    public $sequence = null;

    /**
     * The type of reveneu or cost center providing the product and/or service.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $revenue = null;

    /**
     * Health Care Service Type Codes  to identify the classification of service or benefits.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $category = null;

    /**
     * If this is an actual service or product line, ie. not a Group, then use code to indicate the Professional Service or Product supplied (eg. CTP, HCPCS,USCLS,ICD10, NCPDP,DIN,ACHI,CCI). If a grouping item then use a group code to indicate the type of thing being grouped eg. 'glasses' or 'compound'.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $service = null;

    /**
     * Item typification or modifiers codes, eg for Oral whether the treatment is cosmetic or associated with TMJ, or for medical whether the treatment was outside the clinic or out of office hours.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding[]
     */
    public $modifier = array();

    /**
     * For programs which require reson codes for the inclusion, covering, of this billed item under the program or sub-program.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding[]
     */
    public $programCode = array();

    /**
     * The number of repetitions of a service or product.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRQuantity
     */
    public $quantity = null;

    /**
     * If the item is a node then this is the fee for the product or service, otherwise this is the total of the fees for the children of the group.
     * @var \FHIR_STU_THREE\FHIRMoney
     */
    public $unitPrice = null;

    /**
     * A real number that represents a multiplier used in determining the overall value of services delivered and/or goods received. The concept of a Factor allows for a discount or surcharge multiplier to be applied to a monetary amount.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDecimal
     */
    public $factor = null;

    /**
     * An amount that expresses the weighting (based on difficulty, cost and/or resource intensiveness) associated with the good or service delivered. The concept of Points allows for assignment of point values for services and/or goods, such that a monetary amount can be assigned to each point.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDecimal
     */
    public $points = null;

    /**
     * The quantity times the unit price for an addittional service or product or charge. For example, the formula: unit Quantity * unit Price (Cost per Point) * factor Number  * points = net Amount. Quantity, factor and points are assumed to be 1 if not supplied.
     * @var \FHIR_STU_THREE\FHIRMoney
     */
    public $net = null;

    /**
     * List of Unique Device Identifiers associated with this line item.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $udi = array();

    /**
     * Third tier of goods and services.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRClaim\FHIRClaimSubDetail[]
     */
    public $subDetail = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'Claim.Detail';

    /**
     * A service line number.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPositiveInt
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * A service line number.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPositiveInt $sequence
     * @return $this
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;
        return $this;
    }

    /**
     * The type of reveneu or cost center providing the product and/or service.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getRevenue()
    {
        return $this->revenue;
    }

    /**
     * The type of reveneu or cost center providing the product and/or service.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $revenue
     * @return $this
     */
    public function setRevenue($revenue)
    {
        $this->revenue = $revenue;
        return $this;
    }

    /**
     * Health Care Service Type Codes  to identify the classification of service or benefits.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Health Care Service Type Codes  to identify the classification of service or benefits.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $category
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * If this is an actual service or product line, ie. not a Group, then use code to indicate the Professional Service or Product supplied (eg. CTP, HCPCS,USCLS,ICD10, NCPDP,DIN,ACHI,CCI). If a grouping item then use a group code to indicate the type of thing being grouped eg. 'glasses' or 'compound'.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * If this is an actual service or product line, ie. not a Group, then use code to indicate the Professional Service or Product supplied (eg. CTP, HCPCS,USCLS,ICD10, NCPDP,DIN,ACHI,CCI). If a grouping item then use a group code to indicate the type of thing being grouped eg. 'glasses' or 'compound'.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $service
     * @return $this
     */
    public function setService($service)
    {
        $this->service = $service;
        return $this;
    }

    /**
     * Item typification or modifiers codes, eg for Oral whether the treatment is cosmetic or associated with TMJ, or for medical whether the treatment was outside the clinic or out of office hours.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding[]
     */
    public function getModifier()
    {
        return $this->modifier;
    }

    /**
     * Item typification or modifiers codes, eg for Oral whether the treatment is cosmetic or associated with TMJ, or for medical whether the treatment was outside the clinic or out of office hours.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding[] $modifier
     * @return $this
     */
    public function addModifier($modifier)
    {
        $this->modifier[] = $modifier;
        return $this;
    }

    /**
     * For programs which require reson codes for the inclusion, covering, of this billed item under the program or sub-program.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding[]
     */
    public function getProgramCode()
    {
        return $this->programCode;
    }

    /**
     * For programs which require reson codes for the inclusion, covering, of this billed item under the program or sub-program.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding[] $programCode
     * @return $this
     */
    public function addProgramCode($programCode)
    {
        $this->programCode[] = $programCode;
        return $this;
    }

    /**
     * The number of repetitions of a service or product.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRQuantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * The number of repetitions of a service or product.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRQuantity $quantity
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * If the item is a node then this is the fee for the product or service, otherwise this is the total of the fees for the children of the group.
     * @return \FHIR_STU_THREE\FHIRMoney
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * If the item is a node then this is the fee for the product or service, otherwise this is the total of the fees for the children of the group.
     * @param \FHIR_STU_THREE\FHIRMoney $unitPrice
     * @return $this
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }

    /**
     * A real number that represents a multiplier used in determining the overall value of services delivered and/or goods received. The concept of a Factor allows for a discount or surcharge multiplier to be applied to a monetary amount.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDecimal
     */
    public function getFactor()
    {
        return $this->factor;
    }

    /**
     * A real number that represents a multiplier used in determining the overall value of services delivered and/or goods received. The concept of a Factor allows for a discount or surcharge multiplier to be applied to a monetary amount.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDecimal $factor
     * @return $this
     */
    public function setFactor($factor)
    {
        $this->factor = $factor;
        return $this;
    }

    /**
     * An amount that expresses the weighting (based on difficulty, cost and/or resource intensiveness) associated with the good or service delivered. The concept of Points allows for assignment of point values for services and/or goods, such that a monetary amount can be assigned to each point.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDecimal
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * An amount that expresses the weighting (based on difficulty, cost and/or resource intensiveness) associated with the good or service delivered. The concept of Points allows for assignment of point values for services and/or goods, such that a monetary amount can be assigned to each point.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDecimal $points
     * @return $this
     */
    public function setPoints($points)
    {
        $this->points = $points;
        return $this;
    }

    /**
     * The quantity times the unit price for an addittional service or product or charge. For example, the formula: unit Quantity * unit Price (Cost per Point) * factor Number  * points = net Amount. Quantity, factor and points are assumed to be 1 if not supplied.
     * @return \FHIR_STU_THREE\FHIRMoney
     */
    public function getNet()
    {
        return $this->net;
    }

    /**
     * The quantity times the unit price for an addittional service or product or charge. For example, the formula: unit Quantity * unit Price (Cost per Point) * factor Number  * points = net Amount. Quantity, factor and points are assumed to be 1 if not supplied.
     * @param \FHIR_STU_THREE\FHIRMoney $net
     * @return $this
     */
    public function setNet($net)
    {
        $this->net = $net;
        return $this;
    }

    /**
     * List of Unique Device Identifiers associated with this line item.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getUdi()
    {
        return $this->udi;
    }

    /**
     * List of Unique Device Identifiers associated with this line item.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $udi
     * @return $this
     */
    public function addUdi($udi)
    {
        $this->udi[] = $udi;
        return $this;
    }

    /**
     * Third tier of goods and services.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRClaim\FHIRClaimSubDetail[]
     */
    public function getSubDetail()
    {
        return $this->subDetail;
    }

    /**
     * Third tier of goods and services.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRClaim\FHIRClaimSubDetail[] $subDetail
     * @return $this
     */
    public function addSubDetail($subDetail)
    {
        $this->subDetail[] = $subDetail;
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
        if (null !== $this->revenue) $json['revenue'] = $this->revenue->jsonSerialize();
        if (null !== $this->category) $json['category'] = $this->category->jsonSerialize();
        if (null !== $this->service) $json['service'] = $this->service->jsonSerialize();
        if (0 < count($this->modifier)) {
            $json['modifier'] = array();
            foreach($this->modifier as $modifier) {
                $json['modifier'][] = $modifier->jsonSerialize();
            }
        }
        if (0 < count($this->programCode)) {
            $json['programCode'] = array();
            foreach($this->programCode as $programCode) {
                $json['programCode'][] = $programCode->jsonSerialize();
            }
        }
        if (null !== $this->quantity) $json['quantity'] = $this->quantity->jsonSerialize();
        if (null !== $this->unitPrice) $json['unitPrice'] = $this->unitPrice->jsonSerialize();
        if (null !== $this->factor) $json['factor'] = $this->factor->jsonSerialize();
        if (null !== $this->points) $json['points'] = $this->points->jsonSerialize();
        if (null !== $this->net) $json['net'] = $this->net->jsonSerialize();
        if (0 < count($this->udi)) {
            $json['udi'] = array();
            foreach($this->udi as $udi) {
                $json['udi'][] = $udi->jsonSerialize();
            }
        }
        if (0 < count($this->subDetail)) {
            $json['subDetail'] = array();
            foreach($this->subDetail as $subDetail) {
                $json['subDetail'][] = $subDetail->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ClaimDetail xmlns="http://hl7.org/fhir"></ClaimDetail>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->sequence) $this->sequence->xmlSerialize(true, $sxe->addChild('sequence'));
        if (null !== $this->revenue) $this->revenue->xmlSerialize(true, $sxe->addChild('revenue'));
        if (null !== $this->category) $this->category->xmlSerialize(true, $sxe->addChild('category'));
        if (null !== $this->service) $this->service->xmlSerialize(true, $sxe->addChild('service'));
        if (0 < count($this->modifier)) {
            foreach($this->modifier as $modifier) {
                $modifier->xmlSerialize(true, $sxe->addChild('modifier'));
            }
        }
        if (0 < count($this->programCode)) {
            foreach($this->programCode as $programCode) {
                $programCode->xmlSerialize(true, $sxe->addChild('programCode'));
            }
        }
        if (null !== $this->quantity) $this->quantity->xmlSerialize(true, $sxe->addChild('quantity'));
        if (null !== $this->unitPrice) $this->unitPrice->xmlSerialize(true, $sxe->addChild('unitPrice'));
        if (null !== $this->factor) $this->factor->xmlSerialize(true, $sxe->addChild('factor'));
        if (null !== $this->points) $this->points->xmlSerialize(true, $sxe->addChild('points'));
        if (null !== $this->net) $this->net->xmlSerialize(true, $sxe->addChild('net'));
        if (0 < count($this->udi)) {
            foreach($this->udi as $udi) {
                $udi->xmlSerialize(true, $sxe->addChild('udi'));
            }
        }
        if (0 < count($this->subDetail)) {
            foreach($this->subDetail as $subDetail) {
                $subDetail->xmlSerialize(true, $sxe->addChild('subDetail'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}