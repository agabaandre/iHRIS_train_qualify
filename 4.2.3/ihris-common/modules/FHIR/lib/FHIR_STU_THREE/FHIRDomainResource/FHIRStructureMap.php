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
 * A Map of relationships between 2 structures that can be used to transform data.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRStructureMap extends FHIRDomainResource implements JsonSerializable
{
    /**
     * An absolute URL that is used to identify this structure map when it is referenced in a specification, model, design or an instance. This SHALL be a URL, SHOULD be globally unique, and SHOULD be an address at which this structure map is (or will be) published.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRUri
     */
    public $url = null;

    /**
     * Formal identifier that is used to identify this StructureMap when it is represented in other formats, or referenced in a specification, model, design or an instance  (should be globally unique OID, UUID, or URI), (if it's not possible to use the literal URI).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * The identifier that is used to identify this version of the StructureMap when it is referenced in a specification, model, design or instance. This is an arbitrary value managed by the StructureMap author manually.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $version = null;

    /**
     * A free text natural language name identifying the StructureMap.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $name = null;

    /**
     * The status of the StructureMap.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRConformanceResourceStatus
     */
    public $status = null;

    /**
     * This StructureMap was authored for testing purposes (or education/evaluation/marketing), and is not intended to be used for genuine usage.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public $experimental = null;

    /**
     * The name of the individual or organization that published the structure map.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $publisher = null;

    /**
     * Contacts to assist a user in finding and communicating with the publisher.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRStructureMap\FHIRStructureMapContact[]
     */
    public $contact = array();

    /**
     * The date this version of the structure map was published. The date must change when the business version changes, if it does, and it must change if the status code changes. In addition, it should change when the substantive content of the structure map changes.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $date = null;

    /**
     * A free text natural language description of the StructureMap and its use.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRMarkdown
     */
    public $description = null;

    /**
     * The content was developed with a focus and intent of supporting the contexts that are listed. These terms may be used to assist with indexing and searching of structure maps.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $useContext = array();

    /**
     * Explains why this structure map is needed and why it's been designed as it has.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRMarkdown
     */
    public $requirements = null;

    /**
     * A copyright statement relating to the structure map and/or its contents. Copyright statements are generally legal restrictions on the use and publishing of the details of the constraints and mappings.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $copyright = null;

    /**
     * A structure definition used by this map. The structure definition may describe instances that are converted, or the instances that are produced.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRStructureMap\FHIRStructureMapStructure[]
     */
    public $structure = array();

    /**
     * Other maps used by this map (canonical URLs).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRUri[]
     */
    public $import = array();

    /**
     * Named sections for reader convenience.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRStructureMap\FHIRStructureMapGroup[]
     */
    public $group = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'StructureMap';

    /**
     * An absolute URL that is used to identify this structure map when it is referenced in a specification, model, design or an instance. This SHALL be a URL, SHOULD be globally unique, and SHOULD be an address at which this structure map is (or will be) published.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRUri
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * An absolute URL that is used to identify this structure map when it is referenced in a specification, model, design or an instance. This SHALL be a URL, SHOULD be globally unique, and SHOULD be an address at which this structure map is (or will be) published.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRUri $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Formal identifier that is used to identify this StructureMap when it is represented in other formats, or referenced in a specification, model, design or an instance  (should be globally unique OID, UUID, or URI), (if it's not possible to use the literal URI).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Formal identifier that is used to identify this StructureMap when it is represented in other formats, or referenced in a specification, model, design or an instance  (should be globally unique OID, UUID, or URI), (if it's not possible to use the literal URI).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * The identifier that is used to identify this version of the StructureMap when it is referenced in a specification, model, design or instance. This is an arbitrary value managed by the StructureMap author manually.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * The identifier that is used to identify this version of the StructureMap when it is referenced in a specification, model, design or instance. This is an arbitrary value managed by the StructureMap author manually.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * A free text natural language name identifying the StructureMap.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * A free text natural language name identifying the StructureMap.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * The status of the StructureMap.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRConformanceResourceStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status of the StructureMap.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRConformanceResourceStatus $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * This StructureMap was authored for testing purposes (or education/evaluation/marketing), and is not intended to be used for genuine usage.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public function getExperimental()
    {
        return $this->experimental;
    }

    /**
     * This StructureMap was authored for testing purposes (or education/evaluation/marketing), and is not intended to be used for genuine usage.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBoolean $experimental
     * @return $this
     */
    public function setExperimental($experimental)
    {
        $this->experimental = $experimental;
        return $this;
    }

    /**
     * The name of the individual or organization that published the structure map.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * The name of the individual or organization that published the structure map.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $publisher
     * @return $this
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
        return $this;
    }

    /**
     * Contacts to assist a user in finding and communicating with the publisher.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRStructureMap\FHIRStructureMapContact[]
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Contacts to assist a user in finding and communicating with the publisher.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRStructureMap\FHIRStructureMapContact[] $contact
     * @return $this
     */
    public function addContact($contact)
    {
        $this->contact[] = $contact;
        return $this;
    }

    /**
     * The date this version of the structure map was published. The date must change when the business version changes, if it does, and it must change if the status code changes. In addition, it should change when the substantive content of the structure map changes.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * The date this version of the structure map was published. The date must change when the business version changes, if it does, and it must change if the status code changes. In addition, it should change when the substantive content of the structure map changes.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * A free text natural language description of the StructureMap and its use.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRMarkdown
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * A free text natural language description of the StructureMap and its use.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRMarkdown $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * The content was developed with a focus and intent of supporting the contexts that are listed. These terms may be used to assist with indexing and searching of structure maps.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getUseContext()
    {
        return $this->useContext;
    }

    /**
     * The content was developed with a focus and intent of supporting the contexts that are listed. These terms may be used to assist with indexing and searching of structure maps.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $useContext
     * @return $this
     */
    public function addUseContext($useContext)
    {
        $this->useContext[] = $useContext;
        return $this;
    }

    /**
     * Explains why this structure map is needed and why it's been designed as it has.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRMarkdown
     */
    public function getRequirements()
    {
        return $this->requirements;
    }

    /**
     * Explains why this structure map is needed and why it's been designed as it has.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRMarkdown $requirements
     * @return $this
     */
    public function setRequirements($requirements)
    {
        $this->requirements = $requirements;
        return $this;
    }

    /**
     * A copyright statement relating to the structure map and/or its contents. Copyright statements are generally legal restrictions on the use and publishing of the details of the constraints and mappings.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getCopyright()
    {
        return $this->copyright;
    }

    /**
     * A copyright statement relating to the structure map and/or its contents. Copyright statements are generally legal restrictions on the use and publishing of the details of the constraints and mappings.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $copyright
     * @return $this
     */
    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;
        return $this;
    }

    /**
     * A structure definition used by this map. The structure definition may describe instances that are converted, or the instances that are produced.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRStructureMap\FHIRStructureMapStructure[]
     */
    public function getStructure()
    {
        return $this->structure;
    }

    /**
     * A structure definition used by this map. The structure definition may describe instances that are converted, or the instances that are produced.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRStructureMap\FHIRStructureMapStructure[] $structure
     * @return $this
     */
    public function addStructure($structure)
    {
        $this->structure[] = $structure;
        return $this;
    }

    /**
     * Other maps used by this map (canonical URLs).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRUri[]
     */
    public function getImport()
    {
        return $this->import;
    }

    /**
     * Other maps used by this map (canonical URLs).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRUri[] $import
     * @return $this
     */
    public function addImport($import)
    {
        $this->import[] = $import;
        return $this;
    }

    /**
     * Named sections for reader convenience.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRStructureMap\FHIRStructureMapGroup[]
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Named sections for reader convenience.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRStructureMap\FHIRStructureMapGroup[] $group
     * @return $this
     */
    public function addGroup($group)
    {
        $this->group[] = $group;
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
        if (null !== $this->url) $json['url'] = $this->url->jsonSerialize();
        if (0 < count($this->identifier)) {
            $json['identifier'] = array();
            foreach($this->identifier as $identifier) {
                $json['identifier'][] = $identifier->jsonSerialize();
            }
        }
        if (null !== $this->version) $json['version'] = $this->version->jsonSerialize();
        if (null !== $this->name) $json['name'] = $this->name->jsonSerialize();
        if (null !== $this->status) $json['status'] = $this->status->jsonSerialize();
        if (null !== $this->experimental) $json['experimental'] = $this->experimental->jsonSerialize();
        if (null !== $this->publisher) $json['publisher'] = $this->publisher->jsonSerialize();
        if (0 < count($this->contact)) {
            $json['contact'] = array();
            foreach($this->contact as $contact) {
                $json['contact'][] = $contact->jsonSerialize();
            }
        }
        if (null !== $this->date) $json['date'] = $this->date->jsonSerialize();
        if (null !== $this->description) $json['description'] = $this->description->jsonSerialize();
        if (0 < count($this->useContext)) {
            $json['useContext'] = array();
            foreach($this->useContext as $useContext) {
                $json['useContext'][] = $useContext->jsonSerialize();
            }
        }
        if (null !== $this->requirements) $json['requirements'] = $this->requirements->jsonSerialize();
        if (null !== $this->copyright) $json['copyright'] = $this->copyright->jsonSerialize();
        if (0 < count($this->structure)) {
            $json['structure'] = array();
            foreach($this->structure as $structure) {
                $json['structure'][] = $structure->jsonSerialize();
            }
        }
        if (0 < count($this->import)) {
            $json['import'] = array();
            foreach($this->import as $import) {
                $json['import'][] = $import->jsonSerialize();
            }
        }
        if (0 < count($this->group)) {
            $json['group'] = array();
            foreach($this->group as $group) {
                $json['group'][] = $group->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<StructureMap xmlns="http://hl7.org/fhir"></StructureMap>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->url) $this->url->xmlSerialize(true, $sxe->addChild('url'));
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (null !== $this->version) $this->version->xmlSerialize(true, $sxe->addChild('version'));
        if (null !== $this->name) $this->name->xmlSerialize(true, $sxe->addChild('name'));
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (null !== $this->experimental) $this->experimental->xmlSerialize(true, $sxe->addChild('experimental'));
        if (null !== $this->publisher) $this->publisher->xmlSerialize(true, $sxe->addChild('publisher'));
        if (0 < count($this->contact)) {
            foreach($this->contact as $contact) {
                $contact->xmlSerialize(true, $sxe->addChild('contact'));
            }
        }
        if (null !== $this->date) $this->date->xmlSerialize(true, $sxe->addChild('date'));
        if (null !== $this->description) $this->description->xmlSerialize(true, $sxe->addChild('description'));
        if (0 < count($this->useContext)) {
            foreach($this->useContext as $useContext) {
                $useContext->xmlSerialize(true, $sxe->addChild('useContext'));
            }
        }
        if (null !== $this->requirements) $this->requirements->xmlSerialize(true, $sxe->addChild('requirements'));
        if (null !== $this->copyright) $this->copyright->xmlSerialize(true, $sxe->addChild('copyright'));
        if (0 < count($this->structure)) {
            foreach($this->structure as $structure) {
                $structure->xmlSerialize(true, $sxe->addChild('structure'));
            }
        }
        if (0 < count($this->import)) {
            foreach($this->import as $import) {
                $import->xmlSerialize(true, $sxe->addChild('import'));
            }
        }
        if (0 < count($this->group)) {
            foreach($this->group as $group) {
                $group->xmlSerialize(true, $sxe->addChild('group'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}