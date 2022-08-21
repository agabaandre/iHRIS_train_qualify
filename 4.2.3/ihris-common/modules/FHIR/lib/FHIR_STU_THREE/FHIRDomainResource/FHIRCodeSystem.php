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
 * A code system resource specifies a set of codes drawn from one or more code systems.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRCodeSystem extends FHIRDomainResource implements JsonSerializable
{
    /**
     * An absolute URL that is used to identify this code system when it is referenced in a specification, model, design or an instance. This SHALL be a URL, SHOULD be globally unique, and SHOULD be an address at which this code system is (or will be) published. This is used in [Coding]{datatypes.html#Coding}.system.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRUri
     */
    public $url = null;

    /**
     * Formal identifier that is used to identify this code system when it is represented in other formats, or referenced in a specification, model, design or an instance.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $identifier = null;

    /**
     * Used to identify this version of the code system when it is referenced in a specification, model, design or instance (e.g. Coding.version). This is an arbitrary value managed by the profile author manually and the value should be a timestamp. This is used in [Coding]{datatypes.html#Coding}.version.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $version = null;

    /**
     * A free text natural language name describing the code system.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $name = null;

    /**
     * The status of the code system.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRConformanceResourceStatus
     */
    public $status = null;

    /**
     * This CodeSystem was authored for testing purposes (or education/evaluation/marketing), and is not intended to be used for genuine usage.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public $experimental = null;

    /**
     * The name of the individual or organization that published the code system.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $publisher = null;

    /**
     * Contacts to assist a user in finding and communicating with the publisher.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRCodeSystem\FHIRCodeSystemContact[]
     */
    public $contact = array();

    /**
     * The date that the code system status was last changed. The date must change when the business version changes, if it does, and it must change if the status code changes. In addition, it should change when the substantive content of the implementation guide changes (e.g. the 'content logical definition').
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $date = null;

    /**
     * A free text natural language description of the use of the code system - reason for definition, "the semantic space" to be included in the code system, conditions of use, etc. The description may include a list of expected usages for the code system and can also describe the approach taken to build the code system.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRMarkdown
     */
    public $description = null;

    /**
     * The content was developed with a focus and intent of supporting the contexts that are listed. These terms may be used to assist with indexing and searching of code system definitions.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $useContext = array();

    /**
     * Explains why this code system is needed and why it has been constrained as it has.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRMarkdown
     */
    public $requirements = null;

    /**
     * A copyright statement relating to the code system and/or its contents. Copyright statements are generally legal restrictions on the use and publishing of the code system.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $copyright = null;

    /**
     * If code comparison is case sensitive when codes within this system are compared to each other.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public $caseSensitive = null;

    /**
     * Canonical URL of value set that contains the entire code system.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRUri
     */
    public $valueSet = null;

    /**
     * The meaning of the heirarchy of concepts.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeSystemHierarchyMeaning
     */
    public $hierarchyMeaning = null;

    /**
     * True If code system defines a post-composition grammar.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public $compositional = null;

    /**
     * This flag is used to signify that the code system has not (or does not) maintain the definitions, and a version must be specified when referencing this code system.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public $versionNeeded = null;

    /**
     * How much of the content of the code system - the concepts and codes it defines - are represented in this resource.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeSystemContentMode
     */
    public $content = null;

    /**
     * The total number of concepts defined by the code system. Where the code system has a compositional grammar, the count refers to the number of base (primitive) concepts.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRUnsignedInt
     */
    public $count = null;

    /**
     * A filter that can be used in a value set compose statement when selecting concepts using a filter.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRCodeSystem\FHIRCodeSystemFilter[]
     */
    public $filter = array();

    /**
     * A property defines an additional slot through which additional information can be provided about a concept.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRCodeSystem\FHIRCodeSystemProperty[]
     */
    public $property = array();

    /**
     * Concepts that are in the code system. The concept definitions are inherently hierarchical, but the definitions must be consulted to determine what the meaning of the hierarchical relationships are.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRCodeSystem\FHIRCodeSystemConcept[]
     */
    public $concept = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'CodeSystem';

    /**
     * An absolute URL that is used to identify this code system when it is referenced in a specification, model, design or an instance. This SHALL be a URL, SHOULD be globally unique, and SHOULD be an address at which this code system is (or will be) published. This is used in [Coding]{datatypes.html#Coding}.system.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRUri
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * An absolute URL that is used to identify this code system when it is referenced in a specification, model, design or an instance. This SHALL be a URL, SHOULD be globally unique, and SHOULD be an address at which this code system is (or will be) published. This is used in [Coding]{datatypes.html#Coding}.system.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRUri $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Formal identifier that is used to identify this code system when it is represented in other formats, or referenced in a specification, model, design or an instance.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Formal identifier that is used to identify this code system when it is represented in other formats, or referenced in a specification, model, design or an instance.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $identifier
     * @return $this
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
        return $this;
    }

    /**
     * Used to identify this version of the code system when it is referenced in a specification, model, design or instance (e.g. Coding.version). This is an arbitrary value managed by the profile author manually and the value should be a timestamp. This is used in [Coding]{datatypes.html#Coding}.version.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Used to identify this version of the code system when it is referenced in a specification, model, design or instance (e.g. Coding.version). This is an arbitrary value managed by the profile author manually and the value should be a timestamp. This is used in [Coding]{datatypes.html#Coding}.version.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * A free text natural language name describing the code system.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * A free text natural language name describing the code system.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * The status of the code system.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRConformanceResourceStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status of the code system.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRConformanceResourceStatus $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * This CodeSystem was authored for testing purposes (or education/evaluation/marketing), and is not intended to be used for genuine usage.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public function getExperimental()
    {
        return $this->experimental;
    }

    /**
     * This CodeSystem was authored for testing purposes (or education/evaluation/marketing), and is not intended to be used for genuine usage.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBoolean $experimental
     * @return $this
     */
    public function setExperimental($experimental)
    {
        $this->experimental = $experimental;
        return $this;
    }

    /**
     * The name of the individual or organization that published the code system.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * The name of the individual or organization that published the code system.
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
     * @return \FHIR_STU_THREE\FHIRResource\FHIRCodeSystem\FHIRCodeSystemContact[]
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Contacts to assist a user in finding and communicating with the publisher.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRCodeSystem\FHIRCodeSystemContact[] $contact
     * @return $this
     */
    public function addContact($contact)
    {
        $this->contact[] = $contact;
        return $this;
    }

    /**
     * The date that the code system status was last changed. The date must change when the business version changes, if it does, and it must change if the status code changes. In addition, it should change when the substantive content of the implementation guide changes (e.g. the 'content logical definition').
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * The date that the code system status was last changed. The date must change when the business version changes, if it does, and it must change if the status code changes. In addition, it should change when the substantive content of the implementation guide changes (e.g. the 'content logical definition').
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * A free text natural language description of the use of the code system - reason for definition, "the semantic space" to be included in the code system, conditions of use, etc. The description may include a list of expected usages for the code system and can also describe the approach taken to build the code system.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRMarkdown
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * A free text natural language description of the use of the code system - reason for definition, "the semantic space" to be included in the code system, conditions of use, etc. The description may include a list of expected usages for the code system and can also describe the approach taken to build the code system.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRMarkdown $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * The content was developed with a focus and intent of supporting the contexts that are listed. These terms may be used to assist with indexing and searching of code system definitions.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getUseContext()
    {
        return $this->useContext;
    }

    /**
     * The content was developed with a focus and intent of supporting the contexts that are listed. These terms may be used to assist with indexing and searching of code system definitions.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $useContext
     * @return $this
     */
    public function addUseContext($useContext)
    {
        $this->useContext[] = $useContext;
        return $this;
    }

    /**
     * Explains why this code system is needed and why it has been constrained as it has.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRMarkdown
     */
    public function getRequirements()
    {
        return $this->requirements;
    }

    /**
     * Explains why this code system is needed and why it has been constrained as it has.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRMarkdown $requirements
     * @return $this
     */
    public function setRequirements($requirements)
    {
        $this->requirements = $requirements;
        return $this;
    }

    /**
     * A copyright statement relating to the code system and/or its contents. Copyright statements are generally legal restrictions on the use and publishing of the code system.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getCopyright()
    {
        return $this->copyright;
    }

    /**
     * A copyright statement relating to the code system and/or its contents. Copyright statements are generally legal restrictions on the use and publishing of the code system.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $copyright
     * @return $this
     */
    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;
        return $this;
    }

    /**
     * If code comparison is case sensitive when codes within this system are compared to each other.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public function getCaseSensitive()
    {
        return $this->caseSensitive;
    }

    /**
     * If code comparison is case sensitive when codes within this system are compared to each other.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBoolean $caseSensitive
     * @return $this
     */
    public function setCaseSensitive($caseSensitive)
    {
        $this->caseSensitive = $caseSensitive;
        return $this;
    }

    /**
     * Canonical URL of value set that contains the entire code system.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRUri
     */
    public function getValueSet()
    {
        return $this->valueSet;
    }

    /**
     * Canonical URL of value set that contains the entire code system.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRUri $valueSet
     * @return $this
     */
    public function setValueSet($valueSet)
    {
        $this->valueSet = $valueSet;
        return $this;
    }

    /**
     * The meaning of the heirarchy of concepts.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeSystemHierarchyMeaning
     */
    public function getHierarchyMeaning()
    {
        return $this->hierarchyMeaning;
    }

    /**
     * The meaning of the heirarchy of concepts.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeSystemHierarchyMeaning $hierarchyMeaning
     * @return $this
     */
    public function setHierarchyMeaning($hierarchyMeaning)
    {
        $this->hierarchyMeaning = $hierarchyMeaning;
        return $this;
    }

    /**
     * True If code system defines a post-composition grammar.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public function getCompositional()
    {
        return $this->compositional;
    }

    /**
     * True If code system defines a post-composition grammar.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBoolean $compositional
     * @return $this
     */
    public function setCompositional($compositional)
    {
        $this->compositional = $compositional;
        return $this;
    }

    /**
     * This flag is used to signify that the code system has not (or does not) maintain the definitions, and a version must be specified when referencing this code system.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public function getVersionNeeded()
    {
        return $this->versionNeeded;
    }

    /**
     * This flag is used to signify that the code system has not (or does not) maintain the definitions, and a version must be specified when referencing this code system.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBoolean $versionNeeded
     * @return $this
     */
    public function setVersionNeeded($versionNeeded)
    {
        $this->versionNeeded = $versionNeeded;
        return $this;
    }

    /**
     * How much of the content of the code system - the concepts and codes it defines - are represented in this resource.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeSystemContentMode
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * How much of the content of the code system - the concepts and codes it defines - are represented in this resource.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeSystemContentMode $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * The total number of concepts defined by the code system. Where the code system has a compositional grammar, the count refers to the number of base (primitive) concepts.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRUnsignedInt
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * The total number of concepts defined by the code system. Where the code system has a compositional grammar, the count refers to the number of base (primitive) concepts.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRUnsignedInt $count
     * @return $this
     */
    public function setCount($count)
    {
        $this->count = $count;
        return $this;
    }

    /**
     * A filter that can be used in a value set compose statement when selecting concepts using a filter.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRCodeSystem\FHIRCodeSystemFilter[]
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * A filter that can be used in a value set compose statement when selecting concepts using a filter.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRCodeSystem\FHIRCodeSystemFilter[] $filter
     * @return $this
     */
    public function addFilter($filter)
    {
        $this->filter[] = $filter;
        return $this;
    }

    /**
     * A property defines an additional slot through which additional information can be provided about a concept.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRCodeSystem\FHIRCodeSystemProperty[]
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * A property defines an additional slot through which additional information can be provided about a concept.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRCodeSystem\FHIRCodeSystemProperty[] $property
     * @return $this
     */
    public function addProperty($property)
    {
        $this->property[] = $property;
        return $this;
    }

    /**
     * Concepts that are in the code system. The concept definitions are inherently hierarchical, but the definitions must be consulted to determine what the meaning of the hierarchical relationships are.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRCodeSystem\FHIRCodeSystemConcept[]
     */
    public function getConcept()
    {
        return $this->concept;
    }

    /**
     * Concepts that are in the code system. The concept definitions are inherently hierarchical, but the definitions must be consulted to determine what the meaning of the hierarchical relationships are.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRCodeSystem\FHIRCodeSystemConcept[] $concept
     * @return $this
     */
    public function addConcept($concept)
    {
        $this->concept[] = $concept;
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
        if (null !== $this->identifier) $json['identifier'] = $this->identifier->jsonSerialize();
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
        if (null !== $this->caseSensitive) $json['caseSensitive'] = $this->caseSensitive->jsonSerialize();
        if (null !== $this->valueSet) $json['valueSet'] = $this->valueSet->jsonSerialize();
        if (null !== $this->hierarchyMeaning) $json['hierarchyMeaning'] = $this->hierarchyMeaning->jsonSerialize();
        if (null !== $this->compositional) $json['compositional'] = $this->compositional->jsonSerialize();
        if (null !== $this->versionNeeded) $json['versionNeeded'] = $this->versionNeeded->jsonSerialize();
        if (null !== $this->content) $json['content'] = $this->content->jsonSerialize();
        if (null !== $this->count) $json['count'] = $this->count->jsonSerialize();
        if (0 < count($this->filter)) {
            $json['filter'] = array();
            foreach($this->filter as $filter) {
                $json['filter'][] = $filter->jsonSerialize();
            }
        }
        if (0 < count($this->property)) {
            $json['property'] = array();
            foreach($this->property as $property) {
                $json['property'][] = $property->jsonSerialize();
            }
        }
        if (0 < count($this->concept)) {
            $json['concept'] = array();
            foreach($this->concept as $concept) {
                $json['concept'][] = $concept->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<CodeSystem xmlns="http://hl7.org/fhir"></CodeSystem>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->url) $this->url->xmlSerialize(true, $sxe->addChild('url'));
        if (null !== $this->identifier) $this->identifier->xmlSerialize(true, $sxe->addChild('identifier'));
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
        if (null !== $this->caseSensitive) $this->caseSensitive->xmlSerialize(true, $sxe->addChild('caseSensitive'));
        if (null !== $this->valueSet) $this->valueSet->xmlSerialize(true, $sxe->addChild('valueSet'));
        if (null !== $this->hierarchyMeaning) $this->hierarchyMeaning->xmlSerialize(true, $sxe->addChild('hierarchyMeaning'));
        if (null !== $this->compositional) $this->compositional->xmlSerialize(true, $sxe->addChild('compositional'));
        if (null !== $this->versionNeeded) $this->versionNeeded->xmlSerialize(true, $sxe->addChild('versionNeeded'));
        if (null !== $this->content) $this->content->xmlSerialize(true, $sxe->addChild('content'));
        if (null !== $this->count) $this->count->xmlSerialize(true, $sxe->addChild('count'));
        if (0 < count($this->filter)) {
            foreach($this->filter as $filter) {
                $filter->xmlSerialize(true, $sxe->addChild('filter'));
            }
        }
        if (0 < count($this->property)) {
            foreach($this->property as $property) {
                $property->xmlSerialize(true, $sxe->addChild('property'));
            }
        }
        if (0 < count($this->concept)) {
            foreach($this->concept as $concept) {
                $concept->xmlSerialize(true, $sxe->addChild('concept'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}