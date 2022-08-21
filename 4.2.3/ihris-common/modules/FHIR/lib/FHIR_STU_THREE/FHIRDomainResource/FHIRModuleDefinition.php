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
 * The ModuleDefinition resource defines the data requirements for a quality artifact.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRModuleDefinition extends FHIRDomainResource implements JsonSerializable
{
    /**
     * A logical identifier for the module such as the CMS or NQF identifiers for a measure artifact.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * The version of the module, if any. To provide a version consistent with the Decision Support Service specification, use the format Major.Minor.Revision (e.g. 1.0.0). For more information on versioning knowledge modules, refer to the Decision Support Service specification.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $version = null;

    /**
     * A model reference used by the content.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition\FHIRModuleDefinitionModel[]
     */
    public $model = array();

    /**
     * A library referenced by the module. The reference must consist of either an id, or a document reference.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition\FHIRModuleDefinitionLibrary[]
     */
    public $library = array();

    /**
     * A code system definition used within the knowledge module.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition\FHIRModuleDefinitionCodeSystem[]
     */
    public $codeSystem = array();

    /**
     * A value set definition used by the knowledge module.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition\FHIRModuleDefinitionValueSet[]
     */
    public $valueSet = array();

    /**
     * Parameters to the module.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition\FHIRModuleDefinitionParameter[]
     */
    public $parameter = array();

    /**
     * Describes a required data item for evaluation in terms of the type of data, and optional code- or date-based filters of the data.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition\FHIRModuleDefinitionData[]
     */
    public $data = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'ModuleDefinition';

    /**
     * A logical identifier for the module such as the CMS or NQF identifiers for a measure artifact.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * A logical identifier for the module such as the CMS or NQF identifiers for a measure artifact.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * The version of the module, if any. To provide a version consistent with the Decision Support Service specification, use the format Major.Minor.Revision (e.g. 1.0.0). For more information on versioning knowledge modules, refer to the Decision Support Service specification.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * The version of the module, if any. To provide a version consistent with the Decision Support Service specification, use the format Major.Minor.Revision (e.g. 1.0.0). For more information on versioning knowledge modules, refer to the Decision Support Service specification.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * A model reference used by the content.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition\FHIRModuleDefinitionModel[]
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * A model reference used by the content.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition\FHIRModuleDefinitionModel[] $model
     * @return $this
     */
    public function addModel($model)
    {
        $this->model[] = $model;
        return $this;
    }

    /**
     * A library referenced by the module. The reference must consist of either an id, or a document reference.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition\FHIRModuleDefinitionLibrary[]
     */
    public function getLibrary()
    {
        return $this->library;
    }

    /**
     * A library referenced by the module. The reference must consist of either an id, or a document reference.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition\FHIRModuleDefinitionLibrary[] $library
     * @return $this
     */
    public function addLibrary($library)
    {
        $this->library[] = $library;
        return $this;
    }

    /**
     * A code system definition used within the knowledge module.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition\FHIRModuleDefinitionCodeSystem[]
     */
    public function getCodeSystem()
    {
        return $this->codeSystem;
    }

    /**
     * A code system definition used within the knowledge module.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition\FHIRModuleDefinitionCodeSystem[] $codeSystem
     * @return $this
     */
    public function addCodeSystem($codeSystem)
    {
        $this->codeSystem[] = $codeSystem;
        return $this;
    }

    /**
     * A value set definition used by the knowledge module.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition\FHIRModuleDefinitionValueSet[]
     */
    public function getValueSet()
    {
        return $this->valueSet;
    }

    /**
     * A value set definition used by the knowledge module.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition\FHIRModuleDefinitionValueSet[] $valueSet
     * @return $this
     */
    public function addValueSet($valueSet)
    {
        $this->valueSet[] = $valueSet;
        return $this;
    }

    /**
     * Parameters to the module.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition\FHIRModuleDefinitionParameter[]
     */
    public function getParameter()
    {
        return $this->parameter;
    }

    /**
     * Parameters to the module.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition\FHIRModuleDefinitionParameter[] $parameter
     * @return $this
     */
    public function addParameter($parameter)
    {
        $this->parameter[] = $parameter;
        return $this;
    }

    /**
     * Describes a required data item for evaluation in terms of the type of data, and optional code- or date-based filters of the data.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition\FHIRModuleDefinitionData[]
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Describes a required data item for evaluation in terms of the type of data, and optional code- or date-based filters of the data.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRModuleDefinition\FHIRModuleDefinitionData[] $data
     * @return $this
     */
    public function addData($data)
    {
        $this->data[] = $data;
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
        if (null !== $this->version) $json['version'] = $this->version->jsonSerialize();
        if (0 < count($this->model)) {
            $json['model'] = array();
            foreach($this->model as $model) {
                $json['model'][] = $model->jsonSerialize();
            }
        }
        if (0 < count($this->library)) {
            $json['library'] = array();
            foreach($this->library as $library) {
                $json['library'][] = $library->jsonSerialize();
            }
        }
        if (0 < count($this->codeSystem)) {
            $json['codeSystem'] = array();
            foreach($this->codeSystem as $codeSystem) {
                $json['codeSystem'][] = $codeSystem->jsonSerialize();
            }
        }
        if (0 < count($this->valueSet)) {
            $json['valueSet'] = array();
            foreach($this->valueSet as $valueSet) {
                $json['valueSet'][] = $valueSet->jsonSerialize();
            }
        }
        if (0 < count($this->parameter)) {
            $json['parameter'] = array();
            foreach($this->parameter as $parameter) {
                $json['parameter'][] = $parameter->jsonSerialize();
            }
        }
        if (0 < count($this->data)) {
            $json['data'] = array();
            foreach($this->data as $data) {
                $json['data'][] = $data->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ModuleDefinition xmlns="http://hl7.org/fhir"></ModuleDefinition>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (null !== $this->version) $this->version->xmlSerialize(true, $sxe->addChild('version'));
        if (0 < count($this->model)) {
            foreach($this->model as $model) {
                $model->xmlSerialize(true, $sxe->addChild('model'));
            }
        }
        if (0 < count($this->library)) {
            foreach($this->library as $library) {
                $library->xmlSerialize(true, $sxe->addChild('library'));
            }
        }
        if (0 < count($this->codeSystem)) {
            foreach($this->codeSystem as $codeSystem) {
                $codeSystem->xmlSerialize(true, $sxe->addChild('codeSystem'));
            }
        }
        if (0 < count($this->valueSet)) {
            foreach($this->valueSet as $valueSet) {
                $valueSet->xmlSerialize(true, $sxe->addChild('valueSet'));
            }
        }
        if (0 < count($this->parameter)) {
            foreach($this->parameter as $parameter) {
                $parameter->xmlSerialize(true, $sxe->addChild('parameter'));
            }
        }
        if (0 < count($this->data)) {
            foreach($this->data as $data) {
                $data->xmlSerialize(true, $sxe->addChild('data'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}