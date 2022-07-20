<?php namespace FHIR_DSTU_TWO\FHIRDomainResource;

/*!
 * This class was generated with the PHPFHIR library (https://github.com/dcarbone/php-fhir) using
 * class definitions from HL7 FHIR (https://www.hl7.org/fhir/)
 * 
 * Class creation date: May 13th, 2016
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
 *   Generated on Sat, Oct 24, 2015 07:41+1100 for FHIR v1.0.2
 * 
 *   Note: the schemas & schematrons do not contain all of the rules about what makes resources
 *   valid. Implementers will still need to be familiar with the content of the specification and with
 *   any profiles that apply to the resources in order to make a conformant implementation.
 * 
 */

use FHIR_DSTU_TWO\FHIRResource\FHIRDomainResource;
use FHIR_DSTU_TWO\JsonSerializable;

/**
 * A definition of a condition.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRConditionDefinition extends FHIRDomainResource implements JsonSerializable
{
    /**
     * An absolute URL that is used to identify this condition definition. This SHALL be a URL, SHOULD be globally unique, and SHOULD be an address at which this condition definition is (or will be) published.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRUri
     */
    public $url = null;

    /**
     * Formal identifier that is used to identify this condition definition when it is represented in other formats, or referenced in a specification, model, design or an instance.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * The identifier that is used to identify this version of the condition definition when it is referenced in a StructureDefinition, Questionnaire or instance. This is an arbitrary value managed by the definition author manually.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $version = null;

    /**
     * The term used by humans to refer to the condition definition.  Should ideally be unique within the context in which the condition definition is expected to be used.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $name = null;

    /**
     * The status of the condition definition.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCode
     */
    public $status = null;

    /**
     * A flag to indicate that this search data elemnt definition is authored for testing purposes (or education/evaluation/marketing), and is not intended to be used for genuine usage.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean
     */
    public $experimental = null;

    /**
     * The name of the individual or organization that published the condition definition.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $publisher = null;

    /**
     * Contacts to assist a user in finding and communicating with the publisher.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRConditionDefinition\FHIRConditionDefinitionContact[]
     */
    public $contact = array();

    /**
     * The date that this version of the Condition Definition was published. The date must change when the business version changes, if it does, and it must change if the status code changes. in addition, it should change when the substantiative content of the condition definition  changes.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime
     */
    public $date = null;

    /**
     * The content was developed with a focus and intent of supporting the contexts that are listed. These terms may be used to assist with indexing and searching of condition definition definitions.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[]
     */
    public $useContext = array();

    /**
     * A copyright statement relating to the definition of the condition definition. Copyright statements are generally legal restrictions on the use and publishing of the details of the definition of the condition definition.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $copyright = null;

    /**
     * The seriousness of the condition.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public $severity = null;

    /**
     * The temporal Occurance of this condition.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[]
     */
    public $occurance = array();

    /**
     * Where on the body condition arises.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference[]
     */
    public $findingSite = array();

    /**
     * Common morphological consequences of the condition.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference[]
     */
    public $morphology = array();

    /**
     * Common causes of this condition, whether other conditions, substances, medications etc (still do the etc).
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference[]
     */
    public $causedBy = array();

    /**
     * Common co-morbidities of this condition.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference[]
     */
    public $associated = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'ConditionDefinition';

    /**
     * An absolute URL that is used to identify this condition definition. This SHALL be a URL, SHOULD be globally unique, and SHOULD be an address at which this condition definition is (or will be) published.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRUri
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * An absolute URL that is used to identify this condition definition. This SHALL be a URL, SHOULD be globally unique, and SHOULD be an address at which this condition definition is (or will be) published.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRUri $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Formal identifier that is used to identify this condition definition when it is represented in other formats, or referenced in a specification, model, design or an instance.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Formal identifier that is used to identify this condition definition when it is represented in other formats, or referenced in a specification, model, design or an instance.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * The identifier that is used to identify this version of the condition definition when it is referenced in a StructureDefinition, Questionnaire or instance. This is an arbitrary value managed by the definition author manually.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * The identifier that is used to identify this version of the condition definition when it is referenced in a StructureDefinition, Questionnaire or instance. This is an arbitrary value managed by the definition author manually.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * The term used by humans to refer to the condition definition.  Should ideally be unique within the context in which the condition definition is expected to be used.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * The term used by humans to refer to the condition definition.  Should ideally be unique within the context in which the condition definition is expected to be used.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * The status of the condition definition.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCode
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status of the condition definition.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCode $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * A flag to indicate that this search data elemnt definition is authored for testing purposes (or education/evaluation/marketing), and is not intended to be used for genuine usage.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean
     */
    public function getExperimental()
    {
        return $this->experimental;
    }

    /**
     * A flag to indicate that this search data elemnt definition is authored for testing purposes (or education/evaluation/marketing), and is not intended to be used for genuine usage.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean $experimental
     * @return $this
     */
    public function setExperimental($experimental)
    {
        $this->experimental = $experimental;
        return $this;
    }

    /**
     * The name of the individual or organization that published the condition definition.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * The name of the individual or organization that published the condition definition.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $publisher
     * @return $this
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
        return $this;
    }

    /**
     * Contacts to assist a user in finding and communicating with the publisher.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRConditionDefinition\FHIRConditionDefinitionContact[]
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Contacts to assist a user in finding and communicating with the publisher.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRConditionDefinition\FHIRConditionDefinitionContact[] $contact
     * @return $this
     */
    public function addContact($contact)
    {
        $this->contact[] = $contact;
        return $this;
    }

    /**
     * The date that this version of the Condition Definition was published. The date must change when the business version changes, if it does, and it must change if the status code changes. in addition, it should change when the substantiative content of the condition definition  changes.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * The date that this version of the Condition Definition was published. The date must change when the business version changes, if it does, and it must change if the status code changes. in addition, it should change when the substantiative content of the condition definition  changes.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * The content was developed with a focus and intent of supporting the contexts that are listed. These terms may be used to assist with indexing and searching of condition definition definitions.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[]
     */
    public function getUseContext()
    {
        return $this->useContext;
    }

    /**
     * The content was developed with a focus and intent of supporting the contexts that are listed. These terms may be used to assist with indexing and searching of condition definition definitions.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[] $useContext
     * @return $this
     */
    public function addUseContext($useContext)
    {
        $this->useContext[] = $useContext;
        return $this;
    }

    /**
     * A copyright statement relating to the definition of the condition definition. Copyright statements are generally legal restrictions on the use and publishing of the details of the definition of the condition definition.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getCopyright()
    {
        return $this->copyright;
    }

    /**
     * A copyright statement relating to the definition of the condition definition. Copyright statements are generally legal restrictions on the use and publishing of the details of the definition of the condition definition.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $copyright
     * @return $this
     */
    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;
        return $this;
    }

    /**
     * The seriousness of the condition.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public function getSeverity()
    {
        return $this->severity;
    }

    /**
     * The seriousness of the condition.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept $severity
     * @return $this
     */
    public function setSeverity($severity)
    {
        $this->severity = $severity;
        return $this;
    }

    /**
     * The temporal Occurance of this condition.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[]
     */
    public function getOccurance()
    {
        return $this->occurance;
    }

    /**
     * The temporal Occurance of this condition.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[] $occurance
     * @return $this
     */
    public function addOccurance($occurance)
    {
        $this->occurance[] = $occurance;
        return $this;
    }

    /**
     * Where on the body condition arises.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference[]
     */
    public function getFindingSite()
    {
        return $this->findingSite;
    }

    /**
     * Where on the body condition arises.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference[] $findingSite
     * @return $this
     */
    public function addFindingSite($findingSite)
    {
        $this->findingSite[] = $findingSite;
        return $this;
    }

    /**
     * Common morphological consequences of the condition.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference[]
     */
    public function getMorphology()
    {
        return $this->morphology;
    }

    /**
     * Common morphological consequences of the condition.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference[] $morphology
     * @return $this
     */
    public function addMorphology($morphology)
    {
        $this->morphology[] = $morphology;
        return $this;
    }

    /**
     * Common causes of this condition, whether other conditions, substances, medications etc (still do the etc).
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference[]
     */
    public function getCausedBy()
    {
        return $this->causedBy;
    }

    /**
     * Common causes of this condition, whether other conditions, substances, medications etc (still do the etc).
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference[] $causedBy
     * @return $this
     */
    public function addCausedBy($causedBy)
    {
        $this->causedBy[] = $causedBy;
        return $this;
    }

    /**
     * Common co-morbidities of this condition.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference[]
     */
    public function getAssociated()
    {
        return $this->associated;
    }

    /**
     * Common co-morbidities of this condition.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference[] $associated
     * @return $this
     */
    public function addAssociated($associated)
    {
        $this->associated[] = $associated;
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
        if (0 < count($this->useContext)) {
            $json['useContext'] = array();
            foreach($this->useContext as $useContext) {
                $json['useContext'][] = $useContext->jsonSerialize();
            }
        }
        if (null !== $this->copyright) $json['copyright'] = $this->copyright->jsonSerialize();
        if (null !== $this->severity) $json['severity'] = $this->severity->jsonSerialize();
        if (0 < count($this->occurance)) {
            $json['occurance'] = array();
            foreach($this->occurance as $occurance) {
                $json['occurance'][] = $occurance->jsonSerialize();
            }
        }
        if (0 < count($this->findingSite)) {
            $json['findingSite'] = array();
            foreach($this->findingSite as $findingSite) {
                $json['findingSite'][] = $findingSite->jsonSerialize();
            }
        }
        if (0 < count($this->morphology)) {
            $json['morphology'] = array();
            foreach($this->morphology as $morphology) {
                $json['morphology'][] = $morphology->jsonSerialize();
            }
        }
        if (0 < count($this->causedBy)) {
            $json['causedBy'] = array();
            foreach($this->causedBy as $causedBy) {
                $json['causedBy'][] = $causedBy->jsonSerialize();
            }
        }
        if (0 < count($this->associated)) {
            $json['associated'] = array();
            foreach($this->associated as $associated) {
                $json['associated'][] = $associated->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ConditionDefinition xmlns="http://hl7.org/fhir"></ConditionDefinition>');
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
        if (0 < count($this->useContext)) {
            foreach($this->useContext as $useContext) {
                $useContext->xmlSerialize(true, $sxe->addChild('useContext'));
            }
        }
        if (null !== $this->copyright) $this->copyright->xmlSerialize(true, $sxe->addChild('copyright'));
        if (null !== $this->severity) $this->severity->xmlSerialize(true, $sxe->addChild('severity'));
        if (0 < count($this->occurance)) {
            foreach($this->occurance as $occurance) {
                $occurance->xmlSerialize(true, $sxe->addChild('occurance'));
            }
        }
        if (0 < count($this->findingSite)) {
            foreach($this->findingSite as $findingSite) {
                $findingSite->xmlSerialize(true, $sxe->addChild('findingSite'));
            }
        }
        if (0 < count($this->morphology)) {
            foreach($this->morphology as $morphology) {
                $morphology->xmlSerialize(true, $sxe->addChild('morphology'));
            }
        }
        if (0 < count($this->causedBy)) {
            foreach($this->causedBy as $causedBy) {
                $causedBy->xmlSerialize(true, $sxe->addChild('causedBy'));
            }
        }
        if (0 < count($this->associated)) {
            foreach($this->associated as $associated) {
                $associated->xmlSerialize(true, $sxe->addChild('associated'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}