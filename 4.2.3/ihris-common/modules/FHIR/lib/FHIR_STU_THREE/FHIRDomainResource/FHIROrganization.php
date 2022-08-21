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
 * A formally or informally recognized grouping of people or organizations formed for the purpose of achieving some form of collective action.  Includes companies, institutions, corporations, departments, community groups, healthcare practice groups, etc.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIROrganization extends FHIRDomainResource implements JsonSerializable
{
    /**
     * Identifier for the organization that is used to identify the organization across multiple disparate systems.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * Whether the organization's record is still in active use.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public $active = null;

    /**
     * The kind of organization that this is.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $type = null;

    /**
     * A name associated with the organization.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $name = null;

    /**
     * A list of alternate names that the organization is known as, or was known as in the past.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString[]
     */
    public $alias = array();

    /**
     * A contact detail for the organization.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRContactPoint[]
     */
    public $telecom = array();

    /**
     * An address for the organization.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRAddress[]
     */
    public $address = array();

    /**
     * The organization of which this organization forms a part.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $partOf = null;

    /**
     * Contact for the organization for a certain purpose.
     * @var \FHIR_STU_THREE\FHIRResource\FHIROrganization\FHIROrganizationContact[]
     */
    public $contact = array();

    /**
     * Technical endpoints providing access to services operated for the organization.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $endpoint = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'Organization';

    /**
     * Identifier for the organization that is used to identify the organization across multiple disparate systems.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Identifier for the organization that is used to identify the organization across multiple disparate systems.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * Whether the organization's record is still in active use.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Whether the organization's record is still in active use.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBoolean $active
     * @return $this
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * The kind of organization that this is.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * The kind of organization that this is.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * A name associated with the organization.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * A name associated with the organization.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * A list of alternate names that the organization is known as, or was known as in the past.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString[]
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * A list of alternate names that the organization is known as, or was known as in the past.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString[] $alias
     * @return $this
     */
    public function addAlias($alias)
    {
        $this->alias[] = $alias;
        return $this;
    }

    /**
     * A contact detail for the organization.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRContactPoint[]
     */
    public function getTelecom()
    {
        return $this->telecom;
    }

    /**
     * A contact detail for the organization.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRContactPoint[] $telecom
     * @return $this
     */
    public function addTelecom($telecom)
    {
        $this->telecom[] = $telecom;
        return $this;
    }

    /**
     * An address for the organization.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRAddress[]
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * An address for the organization.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRAddress[] $address
     * @return $this
     */
    public function addAddress($address)
    {
        $this->address[] = $address;
        return $this;
    }

    /**
     * The organization of which this organization forms a part.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getPartOf()
    {
        return $this->partOf;
    }

    /**
     * The organization of which this organization forms a part.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $partOf
     * @return $this
     */
    public function setPartOf($partOf)
    {
        $this->partOf = $partOf;
        return $this;
    }

    /**
     * Contact for the organization for a certain purpose.
     * @return \FHIR_STU_THREE\FHIRResource\FHIROrganization\FHIROrganizationContact[]
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Contact for the organization for a certain purpose.
     * @param \FHIR_STU_THREE\FHIRResource\FHIROrganization\FHIROrganizationContact[] $contact
     * @return $this
     */
    public function addContact($contact)
    {
        $this->contact[] = $contact;
        return $this;
    }

    /**
     * Technical endpoints providing access to services operated for the organization.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * Technical endpoints providing access to services operated for the organization.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $endpoint
     * @return $this
     */
    public function addEndpoint($endpoint)
    {
        $this->endpoint[] = $endpoint;
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
        if (null !== $this->active) $json['active'] = $this->active->jsonSerialize();
        if (null !== $this->type) $json['type'] = $this->type->jsonSerialize();
        if (null !== $this->name) $json['name'] = $this->name->jsonSerialize();
        if (0 < count($this->alias)) {
            $json['alias'] = array();
            foreach($this->alias as $alias) {
                $json['alias'][] = $alias->jsonSerialize();
            }
        }
        if (0 < count($this->telecom)) {
            $json['telecom'] = array();
            foreach($this->telecom as $telecom) {
                $json['telecom'][] = $telecom->jsonSerialize();
            }
        }
        if (0 < count($this->address)) {
            $json['address'] = array();
            foreach($this->address as $address) {
                $json['address'][] = $address->jsonSerialize();
            }
        }
        if (null !== $this->partOf) $json['partOf'] = $this->partOf->jsonSerialize();
        if (0 < count($this->contact)) {
            $json['contact'] = array();
            foreach($this->contact as $contact) {
                $json['contact'][] = $contact->jsonSerialize();
            }
        }
        if (0 < count($this->endpoint)) {
            $json['endpoint'] = array();
            foreach($this->endpoint as $endpoint) {
                $json['endpoint'][] = $endpoint->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<Organization xmlns="http://hl7.org/fhir"></Organization>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (null !== $this->active) $this->active->xmlSerialize(true, $sxe->addChild('active'));
        if (null !== $this->type) $this->type->xmlSerialize(true, $sxe->addChild('type'));
        if (null !== $this->name) $this->name->xmlSerialize(true, $sxe->addChild('name'));
        if (0 < count($this->alias)) {
            foreach($this->alias as $alias) {
                $alias->xmlSerialize(true, $sxe->addChild('alias'));
            }
        }
        if (0 < count($this->telecom)) {
            foreach($this->telecom as $telecom) {
                $telecom->xmlSerialize(true, $sxe->addChild('telecom'));
            }
        }
        if (0 < count($this->address)) {
            foreach($this->address as $address) {
                $address->xmlSerialize(true, $sxe->addChild('address'));
            }
        }
        if (null !== $this->partOf) $this->partOf->xmlSerialize(true, $sxe->addChild('partOf'));
        if (0 < count($this->contact)) {
            foreach($this->contact as $contact) {
                $contact->xmlSerialize(true, $sxe->addChild('contact'));
            }
        }
        if (0 < count($this->endpoint)) {
            foreach($this->endpoint as $endpoint) {
                $endpoint->xmlSerialize(true, $sxe->addChild('endpoint'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}