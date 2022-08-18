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
 * This resource allows for the definition of some activity to be performed, independent of a particular patient, practitioner, or other performance context.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRActivityDefinition extends FHIRDomainResource implements JsonSerializable
{
    /**
     * An absolute URL that is used to identify this asset when it is referenced. This SHALL be a URL, SHOULD be globally unique, and SHOULD be an address at which this asset is (or will be) published.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRUri
     */
    public $url = null;

    /**
     * A logical identifier for the asset such as the CMS or NQF identifiers for a measure. Note that at least one identifier is required for non-experimental active assets.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * The version of the asset, if any. To provide a version consistent with the Decision Support Service specification, use the format Major.Minor.Revision (e.g. 1.0.0). For more information on versioning knowledge assets, refer to the Decision Support Service specification. Note that a version is required for non-experimental active assets.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $version = null;

    /**
     * A machine-friendly name for the asset. This name should be usable as an identifier for the asset by machine processing applications such as code generation.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $name = null;

    /**
     * A short, descriptive, user-friendly title for the asset.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $title = null;

    /**
     * The status of the asset.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCode
     */
    public $status = null;

    /**
     * Determines whether the asset was developed for testing purposes (or education/evaluation/marketing), and is not intended to be used in production environments.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public $experimental = null;

    /**
     * A free text natural language description of the asset from the consumer's perspective.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $description = null;

    /**
     * A brief description of the purpose of the asset.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $purpose = null;

    /**
     * A detailed description of how the asset is used from a clinical perspective.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $usage = null;

    /**
     * The date on which the asset was published.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDate
     */
    public $publicationDate = null;

    /**
     * The date on which the asset content was last reviewed.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDate
     */
    public $lastReviewDate = null;

    /**
     * The period during which the asset content is effective.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public $effectivePeriod = null;

    /**
     * Specifies various attributes of the patient population for whom and/or environment of care in which, the knowledge asset is applicable.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRUsageContext[]
     */
    public $coverage = array();

    /**
     * Clinical topics related to the content of the asset.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $topic = array();

    /**
     * A contributor to the content of the asset, including authors, editors, reviewers, and endorsers.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRContributor[]
     */
    public $contributor = array();

    /**
     * The name of the individual or organization that published the asset (also known as the steward for the asset). This information is required for non-experimental active artifacts.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $publisher = null;

    /**
     * Contact details to assist a user in finding and communicating with the publisher.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRContactDetail[]
     */
    public $contact = array();

    /**
     * A copyright statement relating to the asset and/or its contents. Copyright statements are generally legal restrictions on the use and publishing of the asset.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $copyright = null;

    /**
     * Related resources such as additional documentation, justification, or bibliographic references.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRRelatedResource[]
     */
    public $relatedResource = array();

    /**
     * A reference to a Library resource containing any formal logic used by the asset.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $library = array();

    /**
     * High-level categorization of the type of activity.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRActivityDefinitionCategory
     */
    public $category = null;

    /**
     * Detailed description of the type of activity; e.g. What lab test, what procedure, what kind of encounter.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $code = null;

    /**
     * The period, timing or frequency upon which the described activity is to occur. (choose any one of timing*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $timingCodeableConcept = null;

    /**
     * The period, timing or frequency upon which the described activity is to occur. (choose any one of timing*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRTiming
     */
    public $timingTiming = null;

    /**
     * Identifies the facility where the activity will occur; e.g. home, hospital, specific clinic, etc.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $location = null;

    /**
     * The type of participant in the action.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCode[]
     */
    public $participantType = array();

    /**
     * Identifies the food, drug or other product being consumed or supplied in the activity. (choose any one of product*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $productReference = null;

    /**
     * Identifies the food, drug or other product being consumed or supplied in the activity. (choose any one of product*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $productCodeableConcept = null;

    /**
     * Identifies the quantity expected to be consumed at once (per dose, per meal, etc.).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRQuantity
     */
    public $quantity = null;

    /**
     * A reference to a StructureMap resource that defines a transform that can be executed to produce the intent resource using the ActivityDefinition instance as the input.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $transform = null;

    /**
     * Dynamic values that will be evaluated to produce values for elements of the resulting resource. For example, if the dosage of a medication must be computed based on the patient's weight, a dynamic value would be used to specify an expression that calculated the weight, and the path on the intent resource that would contain the result.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRActivityDefinition\FHIRActivityDefinitionDynamicValue[]
     */
    public $dynamicValue = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'ActivityDefinition';

    /**
     * An absolute URL that is used to identify this asset when it is referenced. This SHALL be a URL, SHOULD be globally unique, and SHOULD be an address at which this asset is (or will be) published.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRUri
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * An absolute URL that is used to identify this asset when it is referenced. This SHALL be a URL, SHOULD be globally unique, and SHOULD be an address at which this asset is (or will be) published.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRUri $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * A logical identifier for the asset such as the CMS or NQF identifiers for a measure. Note that at least one identifier is required for non-experimental active assets.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * A logical identifier for the asset such as the CMS or NQF identifiers for a measure. Note that at least one identifier is required for non-experimental active assets.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * The version of the asset, if any. To provide a version consistent with the Decision Support Service specification, use the format Major.Minor.Revision (e.g. 1.0.0). For more information on versioning knowledge assets, refer to the Decision Support Service specification. Note that a version is required for non-experimental active assets.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * The version of the asset, if any. To provide a version consistent with the Decision Support Service specification, use the format Major.Minor.Revision (e.g. 1.0.0). For more information on versioning knowledge assets, refer to the Decision Support Service specification. Note that a version is required for non-experimental active assets.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * A machine-friendly name for the asset. This name should be usable as an identifier for the asset by machine processing applications such as code generation.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * A machine-friendly name for the asset. This name should be usable as an identifier for the asset by machine processing applications such as code generation.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * A short, descriptive, user-friendly title for the asset.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * A short, descriptive, user-friendly title for the asset.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * The status of the asset.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCode
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status of the asset.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCode $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Determines whether the asset was developed for testing purposes (or education/evaluation/marketing), and is not intended to be used in production environments.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public function getExperimental()
    {
        return $this->experimental;
    }

    /**
     * Determines whether the asset was developed for testing purposes (or education/evaluation/marketing), and is not intended to be used in production environments.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBoolean $experimental
     * @return $this
     */
    public function setExperimental($experimental)
    {
        $this->experimental = $experimental;
        return $this;
    }

    /**
     * A free text natural language description of the asset from the consumer's perspective.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * A free text natural language description of the asset from the consumer's perspective.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * A brief description of the purpose of the asset.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getPurpose()
    {
        return $this->purpose;
    }

    /**
     * A brief description of the purpose of the asset.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $purpose
     * @return $this
     */
    public function setPurpose($purpose)
    {
        $this->purpose = $purpose;
        return $this;
    }

    /**
     * A detailed description of how the asset is used from a clinical perspective.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getUsage()
    {
        return $this->usage;
    }

    /**
     * A detailed description of how the asset is used from a clinical perspective.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $usage
     * @return $this
     */
    public function setUsage($usage)
    {
        $this->usage = $usage;
        return $this;
    }

    /**
     * The date on which the asset was published.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDate
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * The date on which the asset was published.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDate $publicationDate
     * @return $this
     */
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;
        return $this;
    }

    /**
     * The date on which the asset content was last reviewed.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDate
     */
    public function getLastReviewDate()
    {
        return $this->lastReviewDate;
    }

    /**
     * The date on which the asset content was last reviewed.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDate $lastReviewDate
     * @return $this
     */
    public function setLastReviewDate($lastReviewDate)
    {
        $this->lastReviewDate = $lastReviewDate;
        return $this;
    }

    /**
     * The period during which the asset content is effective.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public function getEffectivePeriod()
    {
        return $this->effectivePeriod;
    }

    /**
     * The period during which the asset content is effective.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPeriod $effectivePeriod
     * @return $this
     */
    public function setEffectivePeriod($effectivePeriod)
    {
        $this->effectivePeriod = $effectivePeriod;
        return $this;
    }

    /**
     * Specifies various attributes of the patient population for whom and/or environment of care in which, the knowledge asset is applicable.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRUsageContext[]
     */
    public function getCoverage()
    {
        return $this->coverage;
    }

    /**
     * Specifies various attributes of the patient population for whom and/or environment of care in which, the knowledge asset is applicable.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRUsageContext[] $coverage
     * @return $this
     */
    public function addCoverage($coverage)
    {
        $this->coverage[] = $coverage;
        return $this;
    }

    /**
     * Clinical topics related to the content of the asset.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Clinical topics related to the content of the asset.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $topic
     * @return $this
     */
    public function addTopic($topic)
    {
        $this->topic[] = $topic;
        return $this;
    }

    /**
     * A contributor to the content of the asset, including authors, editors, reviewers, and endorsers.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRContributor[]
     */
    public function getContributor()
    {
        return $this->contributor;
    }

    /**
     * A contributor to the content of the asset, including authors, editors, reviewers, and endorsers.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRContributor[] $contributor
     * @return $this
     */
    public function addContributor($contributor)
    {
        $this->contributor[] = $contributor;
        return $this;
    }

    /**
     * The name of the individual or organization that published the asset (also known as the steward for the asset). This information is required for non-experimental active artifacts.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * The name of the individual or organization that published the asset (also known as the steward for the asset). This information is required for non-experimental active artifacts.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $publisher
     * @return $this
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
        return $this;
    }

    /**
     * Contact details to assist a user in finding and communicating with the publisher.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRContactDetail[]
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Contact details to assist a user in finding and communicating with the publisher.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRContactDetail[] $contact
     * @return $this
     */
    public function addContact($contact)
    {
        $this->contact[] = $contact;
        return $this;
    }

    /**
     * A copyright statement relating to the asset and/or its contents. Copyright statements are generally legal restrictions on the use and publishing of the asset.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getCopyright()
    {
        return $this->copyright;
    }

    /**
     * A copyright statement relating to the asset and/or its contents. Copyright statements are generally legal restrictions on the use and publishing of the asset.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $copyright
     * @return $this
     */
    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;
        return $this;
    }

    /**
     * Related resources such as additional documentation, justification, or bibliographic references.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRRelatedResource[]
     */
    public function getRelatedResource()
    {
        return $this->relatedResource;
    }

    /**
     * Related resources such as additional documentation, justification, or bibliographic references.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRRelatedResource[] $relatedResource
     * @return $this
     */
    public function addRelatedResource($relatedResource)
    {
        $this->relatedResource[] = $relatedResource;
        return $this;
    }

    /**
     * A reference to a Library resource containing any formal logic used by the asset.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getLibrary()
    {
        return $this->library;
    }

    /**
     * A reference to a Library resource containing any formal logic used by the asset.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $library
     * @return $this
     */
    public function addLibrary($library)
    {
        $this->library[] = $library;
        return $this;
    }

    /**
     * High-level categorization of the type of activity.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRActivityDefinitionCategory
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * High-level categorization of the type of activity.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRActivityDefinitionCategory $category
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Detailed description of the type of activity; e.g. What lab test, what procedure, what kind of encounter.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Detailed description of the type of activity; e.g. What lab test, what procedure, what kind of encounter.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * The period, timing or frequency upon which the described activity is to occur. (choose any one of timing*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getTimingCodeableConcept()
    {
        return $this->timingCodeableConcept;
    }

    /**
     * The period, timing or frequency upon which the described activity is to occur. (choose any one of timing*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $timingCodeableConcept
     * @return $this
     */
    public function setTimingCodeableConcept($timingCodeableConcept)
    {
        $this->timingCodeableConcept = $timingCodeableConcept;
        return $this;
    }

    /**
     * The period, timing or frequency upon which the described activity is to occur. (choose any one of timing*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRTiming
     */
    public function getTimingTiming()
    {
        return $this->timingTiming;
    }

    /**
     * The period, timing or frequency upon which the described activity is to occur. (choose any one of timing*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRTiming $timingTiming
     * @return $this
     */
    public function setTimingTiming($timingTiming)
    {
        $this->timingTiming = $timingTiming;
        return $this;
    }

    /**
     * Identifies the facility where the activity will occur; e.g. home, hospital, specific clinic, etc.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Identifies the facility where the activity will occur; e.g. home, hospital, specific clinic, etc.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $location
     * @return $this
     */
    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * The type of participant in the action.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCode[]
     */
    public function getParticipantType()
    {
        return $this->participantType;
    }

    /**
     * The type of participant in the action.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCode[] $participantType
     * @return $this
     */
    public function addParticipantType($participantType)
    {
        $this->participantType[] = $participantType;
        return $this;
    }

    /**
     * Identifies the food, drug or other product being consumed or supplied in the activity. (choose any one of product*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getProductReference()
    {
        return $this->productReference;
    }

    /**
     * Identifies the food, drug or other product being consumed or supplied in the activity. (choose any one of product*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $productReference
     * @return $this
     */
    public function setProductReference($productReference)
    {
        $this->productReference = $productReference;
        return $this;
    }

    /**
     * Identifies the food, drug or other product being consumed or supplied in the activity. (choose any one of product*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getProductCodeableConcept()
    {
        return $this->productCodeableConcept;
    }

    /**
     * Identifies the food, drug or other product being consumed or supplied in the activity. (choose any one of product*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $productCodeableConcept
     * @return $this
     */
    public function setProductCodeableConcept($productCodeableConcept)
    {
        $this->productCodeableConcept = $productCodeableConcept;
        return $this;
    }

    /**
     * Identifies the quantity expected to be consumed at once (per dose, per meal, etc.).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRQuantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Identifies the quantity expected to be consumed at once (per dose, per meal, etc.).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRQuantity $quantity
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * A reference to a StructureMap resource that defines a transform that can be executed to produce the intent resource using the ActivityDefinition instance as the input.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getTransform()
    {
        return $this->transform;
    }

    /**
     * A reference to a StructureMap resource that defines a transform that can be executed to produce the intent resource using the ActivityDefinition instance as the input.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $transform
     * @return $this
     */
    public function setTransform($transform)
    {
        $this->transform = $transform;
        return $this;
    }

    /**
     * Dynamic values that will be evaluated to produce values for elements of the resulting resource. For example, if the dosage of a medication must be computed based on the patient's weight, a dynamic value would be used to specify an expression that calculated the weight, and the path on the intent resource that would contain the result.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRActivityDefinition\FHIRActivityDefinitionDynamicValue[]
     */
    public function getDynamicValue()
    {
        return $this->dynamicValue;
    }

    /**
     * Dynamic values that will be evaluated to produce values for elements of the resulting resource. For example, if the dosage of a medication must be computed based on the patient's weight, a dynamic value would be used to specify an expression that calculated the weight, and the path on the intent resource that would contain the result.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRActivityDefinition\FHIRActivityDefinitionDynamicValue[] $dynamicValue
     * @return $this
     */
    public function addDynamicValue($dynamicValue)
    {
        $this->dynamicValue[] = $dynamicValue;
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
        if (null !== $this->title) $json['title'] = $this->title->jsonSerialize();
        if (null !== $this->status) $json['status'] = $this->status->jsonSerialize();
        if (null !== $this->experimental) $json['experimental'] = $this->experimental->jsonSerialize();
        if (null !== $this->description) $json['description'] = $this->description->jsonSerialize();
        if (null !== $this->purpose) $json['purpose'] = $this->purpose->jsonSerialize();
        if (null !== $this->usage) $json['usage'] = $this->usage->jsonSerialize();
        if (null !== $this->publicationDate) $json['publicationDate'] = $this->publicationDate->jsonSerialize();
        if (null !== $this->lastReviewDate) $json['lastReviewDate'] = $this->lastReviewDate->jsonSerialize();
        if (null !== $this->effectivePeriod) $json['effectivePeriod'] = $this->effectivePeriod->jsonSerialize();
        if (0 < count($this->coverage)) {
            $json['coverage'] = array();
            foreach($this->coverage as $coverage) {
                $json['coverage'][] = $coverage->jsonSerialize();
            }
        }
        if (0 < count($this->topic)) {
            $json['topic'] = array();
            foreach($this->topic as $topic) {
                $json['topic'][] = $topic->jsonSerialize();
            }
        }
        if (0 < count($this->contributor)) {
            $json['contributor'] = array();
            foreach($this->contributor as $contributor) {
                $json['contributor'][] = $contributor->jsonSerialize();
            }
        }
        if (null !== $this->publisher) $json['publisher'] = $this->publisher->jsonSerialize();
        if (0 < count($this->contact)) {
            $json['contact'] = array();
            foreach($this->contact as $contact) {
                $json['contact'][] = $contact->jsonSerialize();
            }
        }
        if (null !== $this->copyright) $json['copyright'] = $this->copyright->jsonSerialize();
        if (0 < count($this->relatedResource)) {
            $json['relatedResource'] = array();
            foreach($this->relatedResource as $relatedResource) {
                $json['relatedResource'][] = $relatedResource->jsonSerialize();
            }
        }
        if (0 < count($this->library)) {
            $json['library'] = array();
            foreach($this->library as $library) {
                $json['library'][] = $library->jsonSerialize();
            }
        }
        if (null !== $this->category) $json['category'] = $this->category->jsonSerialize();
        if (null !== $this->code) $json['code'] = $this->code->jsonSerialize();
        if (null !== $this->timingCodeableConcept) $json['timingCodeableConcept'] = $this->timingCodeableConcept->jsonSerialize();
        if (null !== $this->timingTiming) $json['timingTiming'] = $this->timingTiming->jsonSerialize();
        if (null !== $this->location) $json['location'] = $this->location->jsonSerialize();
        if (0 < count($this->participantType)) {
            $json['participantType'] = array();
            foreach($this->participantType as $participantType) {
                $json['participantType'][] = $participantType->jsonSerialize();
            }
        }
        if (null !== $this->productReference) $json['productReference'] = $this->productReference->jsonSerialize();
        if (null !== $this->productCodeableConcept) $json['productCodeableConcept'] = $this->productCodeableConcept->jsonSerialize();
        if (null !== $this->quantity) $json['quantity'] = $this->quantity->jsonSerialize();
        if (null !== $this->transform) $json['transform'] = $this->transform->jsonSerialize();
        if (0 < count($this->dynamicValue)) {
            $json['dynamicValue'] = array();
            foreach($this->dynamicValue as $dynamicValue) {
                $json['dynamicValue'][] = $dynamicValue->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ActivityDefinition xmlns="http://hl7.org/fhir"></ActivityDefinition>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->url) $this->url->xmlSerialize(true, $sxe->addChild('url'));
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (null !== $this->version) $this->version->xmlSerialize(true, $sxe->addChild('version'));
        if (null !== $this->name) $this->name->xmlSerialize(true, $sxe->addChild('name'));
        if (null !== $this->title) $this->title->xmlSerialize(true, $sxe->addChild('title'));
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (null !== $this->experimental) $this->experimental->xmlSerialize(true, $sxe->addChild('experimental'));
        if (null !== $this->description) $this->description->xmlSerialize(true, $sxe->addChild('description'));
        if (null !== $this->purpose) $this->purpose->xmlSerialize(true, $sxe->addChild('purpose'));
        if (null !== $this->usage) $this->usage->xmlSerialize(true, $sxe->addChild('usage'));
        if (null !== $this->publicationDate) $this->publicationDate->xmlSerialize(true, $sxe->addChild('publicationDate'));
        if (null !== $this->lastReviewDate) $this->lastReviewDate->xmlSerialize(true, $sxe->addChild('lastReviewDate'));
        if (null !== $this->effectivePeriod) $this->effectivePeriod->xmlSerialize(true, $sxe->addChild('effectivePeriod'));
        if (0 < count($this->coverage)) {
            foreach($this->coverage as $coverage) {
                $coverage->xmlSerialize(true, $sxe->addChild('coverage'));
            }
        }
        if (0 < count($this->topic)) {
            foreach($this->topic as $topic) {
                $topic->xmlSerialize(true, $sxe->addChild('topic'));
            }
        }
        if (0 < count($this->contributor)) {
            foreach($this->contributor as $contributor) {
                $contributor->xmlSerialize(true, $sxe->addChild('contributor'));
            }
        }
        if (null !== $this->publisher) $this->publisher->xmlSerialize(true, $sxe->addChild('publisher'));
        if (0 < count($this->contact)) {
            foreach($this->contact as $contact) {
                $contact->xmlSerialize(true, $sxe->addChild('contact'));
            }
        }
        if (null !== $this->copyright) $this->copyright->xmlSerialize(true, $sxe->addChild('copyright'));
        if (0 < count($this->relatedResource)) {
            foreach($this->relatedResource as $relatedResource) {
                $relatedResource->xmlSerialize(true, $sxe->addChild('relatedResource'));
            }
        }
        if (0 < count($this->library)) {
            foreach($this->library as $library) {
                $library->xmlSerialize(true, $sxe->addChild('library'));
            }
        }
        if (null !== $this->category) $this->category->xmlSerialize(true, $sxe->addChild('category'));
        if (null !== $this->code) $this->code->xmlSerialize(true, $sxe->addChild('code'));
        if (null !== $this->timingCodeableConcept) $this->timingCodeableConcept->xmlSerialize(true, $sxe->addChild('timingCodeableConcept'));
        if (null !== $this->timingTiming) $this->timingTiming->xmlSerialize(true, $sxe->addChild('timingTiming'));
        if (null !== $this->location) $this->location->xmlSerialize(true, $sxe->addChild('location'));
        if (0 < count($this->participantType)) {
            foreach($this->participantType as $participantType) {
                $participantType->xmlSerialize(true, $sxe->addChild('participantType'));
            }
        }
        if (null !== $this->productReference) $this->productReference->xmlSerialize(true, $sxe->addChild('productReference'));
        if (null !== $this->productCodeableConcept) $this->productCodeableConcept->xmlSerialize(true, $sxe->addChild('productCodeableConcept'));
        if (null !== $this->quantity) $this->quantity->xmlSerialize(true, $sxe->addChild('quantity'));
        if (null !== $this->transform) $this->transform->xmlSerialize(true, $sxe->addChild('transform'));
        if (0 < count($this->dynamicValue)) {
            foreach($this->dynamicValue as $dynamicValue) {
                $dynamicValue->xmlSerialize(true, $sxe->addChild('dynamicValue'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}