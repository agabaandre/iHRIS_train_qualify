<?php namespace FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition;

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
 * The ModuleDefinition resource defines the data requirements for a quality artifact.
 */
class FHIRModuleDefinitionData extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * The type of the required data, specified as the type name of a resource. For profiles, this value is set to the type of the base resource of the profile.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCode
     */
    public $type = null;

    /**
     * The profile of the required data, specified as the uri of the profile definition.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $profile = null;

    /**
     * Indicates that specific elements of the type are referenced by the knowledge module and must be supported by the consumer in order to obtain an effective evaluation. This does not mean that a value is required for this element, only that the consuming system must understand the element and be able to provide values for it if they are available.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString[]
     */
    public $mustSupport = array();

    /**
     * Code filters for the required data, if any.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition\FHIRModuleDefinitionCodeFilter[]
     */
    public $codeFilter = array();

    /**
     * Date filters for the required data, if any.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition\FHIRModuleDefinitionDateFilter[]
     */
    public $dateFilter = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'ModuleDefinition.Data';

    /**
     * The type of the required data, specified as the type name of a resource. For profiles, this value is set to the type of the base resource of the profile.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCode
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * The type of the required data, specified as the type name of a resource. For profiles, this value is set to the type of the base resource of the profile.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCode $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * The profile of the required data, specified as the uri of the profile definition.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * The profile of the required data, specified as the uri of the profile definition.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $profile
     * @return $this
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
        return $this;
    }

    /**
     * Indicates that specific elements of the type are referenced by the knowledge module and must be supported by the consumer in order to obtain an effective evaluation. This does not mean that a value is required for this element, only that the consuming system must understand the element and be able to provide values for it if they are available.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString[]
     */
    public function getMustSupport()
    {
        return $this->mustSupport;
    }

    /**
     * Indicates that specific elements of the type are referenced by the knowledge module and must be supported by the consumer in order to obtain an effective evaluation. This does not mean that a value is required for this element, only that the consuming system must understand the element and be able to provide values for it if they are available.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString[] $mustSupport
     * @return $this
     */
    public function addMustSupport($mustSupport)
    {
        $this->mustSupport[] = $mustSupport;
        return $this;
    }

    /**
     * Code filters for the required data, if any.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition\FHIRModuleDefinitionCodeFilter[]
     */
    public function getCodeFilter()
    {
        return $this->codeFilter;
    }

    /**
     * Code filters for the required data, if any.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition\FHIRModuleDefinitionCodeFilter[] $codeFilter
     * @return $this
     */
    public function addCodeFilter($codeFilter)
    {
        $this->codeFilter[] = $codeFilter;
        return $this;
    }

    /**
     * Date filters for the required data, if any.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition\FHIRModuleDefinitionDateFilter[]
     */
    public function getDateFilter()
    {
        return $this->dateFilter;
    }

    /**
     * Date filters for the required data, if any.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition\FHIRModuleDefinitionDateFilter[] $dateFilter
     * @return $this
     */
    public function addDateFilter($dateFilter)
    {
        $this->dateFilter[] = $dateFilter;
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
        if (null !== $this->profile) $json['profile'] = $this->profile->jsonSerialize();
        if (0 < count($this->mustSupport)) {
            $json['mustSupport'] = array();
            foreach($this->mustSupport as $mustSupport) {
                $json['mustSupport'][] = $mustSupport->jsonSerialize();
            }
        }
        if (0 < count($this->codeFilter)) {
            $json['codeFilter'] = array();
            foreach($this->codeFilter as $codeFilter) {
                $json['codeFilter'][] = $codeFilter->jsonSerialize();
            }
        }
        if (0 < count($this->dateFilter)) {
            $json['dateFilter'] = array();
            foreach($this->dateFilter as $dateFilter) {
                $json['dateFilter'][] = $dateFilter->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ModuleDefinitionData xmlns="http://hl7.org/fhir"></ModuleDefinitionData>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->type) $this->type->xmlSerialize(true, $sxe->addChild('type'));
        if (null !== $this->profile) $this->profile->xmlSerialize(true, $sxe->addChild('profile'));
        if (0 < count($this->mustSupport)) {
            foreach($this->mustSupport as $mustSupport) {
                $mustSupport->xmlSerialize(true, $sxe->addChild('mustSupport'));
            }
        }
        if (0 < count($this->codeFilter)) {
            foreach($this->codeFilter as $codeFilter) {
                $codeFilter->xmlSerialize(true, $sxe->addChild('codeFilter'));
            }
        }
        if (0 < count($this->dateFilter)) {
            foreach($this->dateFilter as $dateFilter) {
                $dateFilter->xmlSerialize(true, $sxe->addChild('dateFilter'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}