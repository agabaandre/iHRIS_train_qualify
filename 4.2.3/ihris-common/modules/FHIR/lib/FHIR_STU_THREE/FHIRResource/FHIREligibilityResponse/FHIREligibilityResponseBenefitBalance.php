<?php namespace FHIR_STU_THREE\FHIRResource\FHIREligibilityResponse;

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
 * This resource provides eligibility and plan details from the processing of an Eligibility resource.
 */
class FHIREligibilityResponseBenefitBalance extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * Dental, Vision, Medical, Pharmacy, Rehab etc.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $category = null;

    /**
     * Dental: basic, major, ortho; Vision exam, glasses, contacts; etc.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $subCategory = null;

    /**
     * A short name or tag for the benefit, for example MED01, or DENT2.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $name = null;

    /**
     * A richer description of the benefit, for example 'DENT2 covers 100% of basic, 50% of major but exclused Ortho, Implants and Costmetic services'.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $description = null;

    /**
     * Network designation.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $network = null;

    /**
     * Unit designation: individual or family.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $unit = null;

    /**
     * The term or period of the values such as 'maximum lifetime benefit' or 'maximum annual vistis'.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $term = null;

    /**
     * Benefits Used to date.
     * @var \FHIR_STU_THREE\FHIRResource\FHIREligibilityResponse\FHIREligibilityResponseFinancial[]
     */
    public $financial = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'EligibilityResponse.BenefitBalance';

    /**
     * Dental, Vision, Medical, Pharmacy, Rehab etc.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Dental, Vision, Medical, Pharmacy, Rehab etc.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $category
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Dental: basic, major, ortho; Vision exam, glasses, contacts; etc.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getSubCategory()
    {
        return $this->subCategory;
    }

    /**
     * Dental: basic, major, ortho; Vision exam, glasses, contacts; etc.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $subCategory
     * @return $this
     */
    public function setSubCategory($subCategory)
    {
        $this->subCategory = $subCategory;
        return $this;
    }

    /**
     * A short name or tag for the benefit, for example MED01, or DENT2.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * A short name or tag for the benefit, for example MED01, or DENT2.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * A richer description of the benefit, for example 'DENT2 covers 100% of basic, 50% of major but exclused Ortho, Implants and Costmetic services'.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * A richer description of the benefit, for example 'DENT2 covers 100% of basic, 50% of major but exclused Ortho, Implants and Costmetic services'.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Network designation.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getNetwork()
    {
        return $this->network;
    }

    /**
     * Network designation.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $network
     * @return $this
     */
    public function setNetwork($network)
    {
        $this->network = $network;
        return $this;
    }

    /**
     * Unit designation: individual or family.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Unit designation: individual or family.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $unit
     * @return $this
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
        return $this;
    }

    /**
     * The term or period of the values such as 'maximum lifetime benefit' or 'maximum annual vistis'.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getTerm()
    {
        return $this->term;
    }

    /**
     * The term or period of the values such as 'maximum lifetime benefit' or 'maximum annual vistis'.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $term
     * @return $this
     */
    public function setTerm($term)
    {
        $this->term = $term;
        return $this;
    }

    /**
     * Benefits Used to date.
     * @return \FHIR_STU_THREE\FHIRResource\FHIREligibilityResponse\FHIREligibilityResponseFinancial[]
     */
    public function getFinancial()
    {
        return $this->financial;
    }

    /**
     * Benefits Used to date.
     * @param \FHIR_STU_THREE\FHIRResource\FHIREligibilityResponse\FHIREligibilityResponseFinancial[] $financial
     * @return $this
     */
    public function addFinancial($financial)
    {
        $this->financial[] = $financial;
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
        if (null !== $this->category) $json['category'] = $this->category->jsonSerialize();
        if (null !== $this->subCategory) $json['subCategory'] = $this->subCategory->jsonSerialize();
        if (null !== $this->name) $json['name'] = $this->name->jsonSerialize();
        if (null !== $this->description) $json['description'] = $this->description->jsonSerialize();
        if (null !== $this->network) $json['network'] = $this->network->jsonSerialize();
        if (null !== $this->unit) $json['unit'] = $this->unit->jsonSerialize();
        if (null !== $this->term) $json['term'] = $this->term->jsonSerialize();
        if (0 < count($this->financial)) {
            $json['financial'] = array();
            foreach($this->financial as $financial) {
                $json['financial'][] = $financial->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<EligibilityResponseBenefitBalance xmlns="http://hl7.org/fhir"></EligibilityResponseBenefitBalance>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->category) $this->category->xmlSerialize(true, $sxe->addChild('category'));
        if (null !== $this->subCategory) $this->subCategory->xmlSerialize(true, $sxe->addChild('subCategory'));
        if (null !== $this->name) $this->name->xmlSerialize(true, $sxe->addChild('name'));
        if (null !== $this->description) $this->description->xmlSerialize(true, $sxe->addChild('description'));
        if (null !== $this->network) $this->network->xmlSerialize(true, $sxe->addChild('network'));
        if (null !== $this->unit) $this->unit->xmlSerialize(true, $sxe->addChild('unit'));
        if (null !== $this->term) $this->term->xmlSerialize(true, $sxe->addChild('term'));
        if (0 < count($this->financial)) {
            foreach($this->financial as $financial) {
                $financial->xmlSerialize(true, $sxe->addChild('financial'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}