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
 * Resource to define constraints on the Expansion of a FHIR ValueSet.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRExpansionProfile extends FHIRDomainResource implements JsonSerializable
{
    /**
     * An absolute URL that is used to identify this expansion profile when it is referenced in a specification, model, design or an instance. This SHALL be a URL, SHOULD be globally unique, and SHOULD be an address at which this expansion profile is (or will be) published.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRUri
     */
    public $url = null;

    /**
     * Formal identifier that is used to identify this expansion profile when it is represented in other formats, or referenced in a specification, model, design or an instance.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $identifier = null;

    /**
     * Used to identify this version of the expansion profile when it is referenced in a specification, model, design or instance.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $version = null;

    /**
     * A free text natural language name for the expansion profile.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $name = null;

    /**
     * The status of the expansion profile.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRConformanceResourceStatus
     */
    public $status = null;

    /**
     * This expansion profile was authored for testing purposes (or education/evaluation/marketing), and is not intended for genuine production usage.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public $experimental = null;

    /**
     * The name of the individual or organization that published the expansion profile.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $publisher = null;

    /**
     * Contacts to assist a user in finding and communicating with the publisher.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRExpansionProfile\FHIRExpansionProfileContact[]
     */
    public $contact = array();

    /**
     * The date that the expansion profile status was last changed. The date must change when the business version changes, if it does, and it must change if the status code changes.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $date = null;

    /**
     * A free text natural language description of the use of the expansion profile - reason for definition,  conditions of use, etc. The description may include a list of expected usages for the expansion profile and can also describe the approach taken to build the expansion profile.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRMarkdown
     */
    public $description = null;

    /**
     * A set of criteria that provide the constraints imposed on the value set expansion by including or excluding codes from specific code systems (or versions).
     * @var \FHIR_STU_THREE\FHIRResource\FHIRExpansionProfile\FHIRExpansionProfileCodeSystem
     */
    public $codeSystem = null;

    /**
     * Controls whether concept designations are to be included or excluded in value set expansions.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public $includeDesignations = null;

    /**
     * A set of criteria that provide the constraints imposed on the value set expansion by including or excluding designations.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRExpansionProfile\FHIRExpansionProfileDesignation
     */
    public $designation = null;

    /**
     * Controls whether the value set definition is included or excluded in value set expansions.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public $includeDefinition = null;

    /**
     * Controls whether inactive concepts are included or excluded in value set expansions.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public $includeInactive = null;

    /**
     * Controls whether or not the value set expansion includes nested codes (i.e. ValueSet.expansion.contains.contains).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public $excludeNested = null;

    /**
     * Controls whether or not the value set expansion includes codes which cannot be displayed in user interfaces.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public $excludeNotForUI = null;

    /**
     * Controls whether or not the value set expansion includes post coordinated codes.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public $excludePostCoordinated = null;

    /**
     * Specifies the language to be used for description in the expansions i.e. the language to be used for ValueSet.expansion.contains.display.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCode
     */
    public $displayLanguage = null;

    /**
     * If the value set being expanded is incomplete (because it is too big to expand), return a limited expansion (a subset) with an indicator that expansion is incomplete.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public $limitedExpansion = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'ExpansionProfile';

    /**
     * An absolute URL that is used to identify this expansion profile when it is referenced in a specification, model, design or an instance. This SHALL be a URL, SHOULD be globally unique, and SHOULD be an address at which this expansion profile is (or will be) published.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRUri
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * An absolute URL that is used to identify this expansion profile when it is referenced in a specification, model, design or an instance. This SHALL be a URL, SHOULD be globally unique, and SHOULD be an address at which this expansion profile is (or will be) published.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRUri $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Formal identifier that is used to identify this expansion profile when it is represented in other formats, or referenced in a specification, model, design or an instance.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Formal identifier that is used to identify this expansion profile when it is represented in other formats, or referenced in a specification, model, design or an instance.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $identifier
     * @return $this
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
        return $this;
    }

    /**
     * Used to identify this version of the expansion profile when it is referenced in a specification, model, design or instance.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Used to identify this version of the expansion profile when it is referenced in a specification, model, design or instance.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * A free text natural language name for the expansion profile.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * A free text natural language name for the expansion profile.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * The status of the expansion profile.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRConformanceResourceStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status of the expansion profile.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRConformanceResourceStatus $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * This expansion profile was authored for testing purposes (or education/evaluation/marketing), and is not intended for genuine production usage.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public function getExperimental()
    {
        return $this->experimental;
    }

    /**
     * This expansion profile was authored for testing purposes (or education/evaluation/marketing), and is not intended for genuine production usage.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBoolean $experimental
     * @return $this
     */
    public function setExperimental($experimental)
    {
        $this->experimental = $experimental;
        return $this;
    }

    /**
     * The name of the individual or organization that published the expansion profile.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * The name of the individual or organization that published the expansion profile.
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
     * @return \FHIR_STU_THREE\FHIRResource\FHIRExpansionProfile\FHIRExpansionProfileContact[]
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Contacts to assist a user in finding and communicating with the publisher.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRExpansionProfile\FHIRExpansionProfileContact[] $contact
     * @return $this
     */
    public function addContact($contact)
    {
        $this->contact[] = $contact;
        return $this;
    }

    /**
     * The date that the expansion profile status was last changed. The date must change when the business version changes, if it does, and it must change if the status code changes.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * The date that the expansion profile status was last changed. The date must change when the business version changes, if it does, and it must change if the status code changes.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * A free text natural language description of the use of the expansion profile - reason for definition,  conditions of use, etc. The description may include a list of expected usages for the expansion profile and can also describe the approach taken to build the expansion profile.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRMarkdown
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * A free text natural language description of the use of the expansion profile - reason for definition,  conditions of use, etc. The description may include a list of expected usages for the expansion profile and can also describe the approach taken to build the expansion profile.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRMarkdown $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * A set of criteria that provide the constraints imposed on the value set expansion by including or excluding codes from specific code systems (or versions).
     * @return \FHIR_STU_THREE\FHIRResource\FHIRExpansionProfile\FHIRExpansionProfileCodeSystem
     */
    public function getCodeSystem()
    {
        return $this->codeSystem;
    }

    /**
     * A set of criteria that provide the constraints imposed on the value set expansion by including or excluding codes from specific code systems (or versions).
     * @param \FHIR_STU_THREE\FHIRResource\FHIRExpansionProfile\FHIRExpansionProfileCodeSystem $codeSystem
     * @return $this
     */
    public function setCodeSystem($codeSystem)
    {
        $this->codeSystem = $codeSystem;
        return $this;
    }

    /**
     * Controls whether concept designations are to be included or excluded in value set expansions.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public function getIncludeDesignations()
    {
        return $this->includeDesignations;
    }

    /**
     * Controls whether concept designations are to be included or excluded in value set expansions.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBoolean $includeDesignations
     * @return $this
     */
    public function setIncludeDesignations($includeDesignations)
    {
        $this->includeDesignations = $includeDesignations;
        return $this;
    }

    /**
     * A set of criteria that provide the constraints imposed on the value set expansion by including or excluding designations.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRExpansionProfile\FHIRExpansionProfileDesignation
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * A set of criteria that provide the constraints imposed on the value set expansion by including or excluding designations.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRExpansionProfile\FHIRExpansionProfileDesignation $designation
     * @return $this
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;
        return $this;
    }

    /**
     * Controls whether the value set definition is included or excluded in value set expansions.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public function getIncludeDefinition()
    {
        return $this->includeDefinition;
    }

    /**
     * Controls whether the value set definition is included or excluded in value set expansions.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBoolean $includeDefinition
     * @return $this
     */
    public function setIncludeDefinition($includeDefinition)
    {
        $this->includeDefinition = $includeDefinition;
        return $this;
    }

    /**
     * Controls whether inactive concepts are included or excluded in value set expansions.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public function getIncludeInactive()
    {
        return $this->includeInactive;
    }

    /**
     * Controls whether inactive concepts are included or excluded in value set expansions.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBoolean $includeInactive
     * @return $this
     */
    public function setIncludeInactive($includeInactive)
    {
        $this->includeInactive = $includeInactive;
        return $this;
    }

    /**
     * Controls whether or not the value set expansion includes nested codes (i.e. ValueSet.expansion.contains.contains).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public function getExcludeNested()
    {
        return $this->excludeNested;
    }

    /**
     * Controls whether or not the value set expansion includes nested codes (i.e. ValueSet.expansion.contains.contains).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBoolean $excludeNested
     * @return $this
     */
    public function setExcludeNested($excludeNested)
    {
        $this->excludeNested = $excludeNested;
        return $this;
    }

    /**
     * Controls whether or not the value set expansion includes codes which cannot be displayed in user interfaces.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public function getExcludeNotForUI()
    {
        return $this->excludeNotForUI;
    }

    /**
     * Controls whether or not the value set expansion includes codes which cannot be displayed in user interfaces.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBoolean $excludeNotForUI
     * @return $this
     */
    public function setExcludeNotForUI($excludeNotForUI)
    {
        $this->excludeNotForUI = $excludeNotForUI;
        return $this;
    }

    /**
     * Controls whether or not the value set expansion includes post coordinated codes.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public function getExcludePostCoordinated()
    {
        return $this->excludePostCoordinated;
    }

    /**
     * Controls whether or not the value set expansion includes post coordinated codes.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBoolean $excludePostCoordinated
     * @return $this
     */
    public function setExcludePostCoordinated($excludePostCoordinated)
    {
        $this->excludePostCoordinated = $excludePostCoordinated;
        return $this;
    }

    /**
     * Specifies the language to be used for description in the expansions i.e. the language to be used for ValueSet.expansion.contains.display.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCode
     */
    public function getDisplayLanguage()
    {
        return $this->displayLanguage;
    }

    /**
     * Specifies the language to be used for description in the expansions i.e. the language to be used for ValueSet.expansion.contains.display.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCode $displayLanguage
     * @return $this
     */
    public function setDisplayLanguage($displayLanguage)
    {
        $this->displayLanguage = $displayLanguage;
        return $this;
    }

    /**
     * If the value set being expanded is incomplete (because it is too big to expand), return a limited expansion (a subset) with an indicator that expansion is incomplete.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public function getLimitedExpansion()
    {
        return $this->limitedExpansion;
    }

    /**
     * If the value set being expanded is incomplete (because it is too big to expand), return a limited expansion (a subset) with an indicator that expansion is incomplete.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBoolean $limitedExpansion
     * @return $this
     */
    public function setLimitedExpansion($limitedExpansion)
    {
        $this->limitedExpansion = $limitedExpansion;
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
        if (null !== $this->codeSystem) $json['codeSystem'] = $this->codeSystem->jsonSerialize();
        if (null !== $this->includeDesignations) $json['includeDesignations'] = $this->includeDesignations->jsonSerialize();
        if (null !== $this->designation) $json['designation'] = $this->designation->jsonSerialize();
        if (null !== $this->includeDefinition) $json['includeDefinition'] = $this->includeDefinition->jsonSerialize();
        if (null !== $this->includeInactive) $json['includeInactive'] = $this->includeInactive->jsonSerialize();
        if (null !== $this->excludeNested) $json['excludeNested'] = $this->excludeNested->jsonSerialize();
        if (null !== $this->excludeNotForUI) $json['excludeNotForUI'] = $this->excludeNotForUI->jsonSerialize();
        if (null !== $this->excludePostCoordinated) $json['excludePostCoordinated'] = $this->excludePostCoordinated->jsonSerialize();
        if (null !== $this->displayLanguage) $json['displayLanguage'] = $this->displayLanguage->jsonSerialize();
        if (null !== $this->limitedExpansion) $json['limitedExpansion'] = $this->limitedExpansion->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ExpansionProfile xmlns="http://hl7.org/fhir"></ExpansionProfile>');
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
        if (null !== $this->codeSystem) $this->codeSystem->xmlSerialize(true, $sxe->addChild('codeSystem'));
        if (null !== $this->includeDesignations) $this->includeDesignations->xmlSerialize(true, $sxe->addChild('includeDesignations'));
        if (null !== $this->designation) $this->designation->xmlSerialize(true, $sxe->addChild('designation'));
        if (null !== $this->includeDefinition) $this->includeDefinition->xmlSerialize(true, $sxe->addChild('includeDefinition'));
        if (null !== $this->includeInactive) $this->includeInactive->xmlSerialize(true, $sxe->addChild('includeInactive'));
        if (null !== $this->excludeNested) $this->excludeNested->xmlSerialize(true, $sxe->addChild('excludeNested'));
        if (null !== $this->excludeNotForUI) $this->excludeNotForUI->xmlSerialize(true, $sxe->addChild('excludeNotForUI'));
        if (null !== $this->excludePostCoordinated) $this->excludePostCoordinated->xmlSerialize(true, $sxe->addChild('excludePostCoordinated'));
        if (null !== $this->displayLanguage) $this->displayLanguage->xmlSerialize(true, $sxe->addChild('displayLanguage'));
        if (null !== $this->limitedExpansion) $this->limitedExpansion->xmlSerialize(true, $sxe->addChild('limitedExpansion'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}