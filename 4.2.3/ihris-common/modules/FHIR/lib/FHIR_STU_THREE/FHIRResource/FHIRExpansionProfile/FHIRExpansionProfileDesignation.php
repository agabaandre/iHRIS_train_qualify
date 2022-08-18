<?php namespace FHIR_STU_THREE\FHIRResource\FHIRExpansionProfile;

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
 * Resource to define constraints on the Expansion of a FHIR ValueSet.
 */
class FHIRExpansionProfileDesignation extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * Designations to be included.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRExpansionProfile\FHIRExpansionProfileInclude1
     */
    public $include = null;

    /**
     * Designations to be excluded.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRExpansionProfile\FHIRExpansionProfileExclude1
     */
    public $exclude = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'ExpansionProfile.Designation';

    /**
     * Designations to be included.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRExpansionProfile\FHIRExpansionProfileInclude1
     */
    public function getInclude()
    {
        return $this->include;
    }

    /**
     * Designations to be included.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRExpansionProfile\FHIRExpansionProfileInclude1 $include
     * @return $this
     */
    public function setInclude($include)
    {
        $this->include = $include;
        return $this;
    }

    /**
     * Designations to be excluded.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRExpansionProfile\FHIRExpansionProfileExclude1
     */
    public function getExclude()
    {
        return $this->exclude;
    }

    /**
     * Designations to be excluded.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRExpansionProfile\FHIRExpansionProfileExclude1 $exclude
     * @return $this
     */
    public function setExclude($exclude)
    {
        $this->exclude = $exclude;
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
        if (null !== $this->include) $json['include'] = $this->include->jsonSerialize();
        if (null !== $this->exclude) $json['exclude'] = $this->exclude->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ExpansionProfileDesignation xmlns="http://hl7.org/fhir"></ExpansionProfileDesignation>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->include) $this->include->xmlSerialize(true, $sxe->addChild('include'));
        if (null !== $this->exclude) $this->exclude->xmlSerialize(true, $sxe->addChild('exclude'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}