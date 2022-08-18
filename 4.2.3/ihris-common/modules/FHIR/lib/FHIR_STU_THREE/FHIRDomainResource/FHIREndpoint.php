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
 * The technical details of an endpoint that can be used for electronic services, such as for web services providing XDS.b or a REST endpoint for another FHIR server. This may include any security context information.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIREndpoint extends FHIRDomainResource implements JsonSerializable
{
    /**
     * Identifier for the organization that is used to identify the endpoint across multiple disparate systems.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * active | suspended | error | off.
     * @var \FHIR_STU_THREE\FHIRElement\FHIREndpointStatus
     */
    public $status = null;

    /**
     * A friendly name that this endpoint can be referred to with.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $name = null;

    /**
     * The organization that manages this endpoint (even if technically another organisation is hosting this in the cloud, it is the organisation associated with the data).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $managingOrganization = null;

    /**
     * Contact details for a human to contact about the subscription. The primary use of this for system administrator troubleshooting.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRContactPoint[]
     */
    public $contact = array();

    /**
     * The type of channel to send notifications on.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $connectionType = null;

    /**
     * The http verb to be used when calling this endpoint.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding[]
     */
    public $method = array();

    /**
     * The interval during which the managing organization assumes the defined responsibility.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public $period = null;

    /**
     * The uri that describes the actual end-point to send messages to.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRUri
     */
    public $address = null;

    /**
     * The mime type to send the payload in - either application/fhir+xml, or application/fhir+json. If the mime type is blank, then there is no payload in the notification, just a notification.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $payloadFormat = null;

    /**
     * The payload type describes the acceptable content that can be communicated on the endpoint.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $payloadType = array();

    /**
     * Additional headers / information to send as part of the notification.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString[]
     */
    public $header = array();

    /**
     * The public part of the 'keys' allocated to an Organization by an accredited body to support secure exchange of data over the internet. To be provided by the Organization, where available.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $publicKey = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'Endpoint';

    /**
     * Identifier for the organization that is used to identify the endpoint across multiple disparate systems.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Identifier for the organization that is used to identify the endpoint across multiple disparate systems.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * active | suspended | error | off.
     * @return \FHIR_STU_THREE\FHIRElement\FHIREndpointStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * active | suspended | error | off.
     * @param \FHIR_STU_THREE\FHIRElement\FHIREndpointStatus $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * A friendly name that this endpoint can be referred to with.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * A friendly name that this endpoint can be referred to with.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * The organization that manages this endpoint (even if technically another organisation is hosting this in the cloud, it is the organisation associated with the data).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getManagingOrganization()
    {
        return $this->managingOrganization;
    }

    /**
     * The organization that manages this endpoint (even if technically another organisation is hosting this in the cloud, it is the organisation associated with the data).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $managingOrganization
     * @return $this
     */
    public function setManagingOrganization($managingOrganization)
    {
        $this->managingOrganization = $managingOrganization;
        return $this;
    }

    /**
     * Contact details for a human to contact about the subscription. The primary use of this for system administrator troubleshooting.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRContactPoint[]
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Contact details for a human to contact about the subscription. The primary use of this for system administrator troubleshooting.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRContactPoint[] $contact
     * @return $this
     */
    public function addContact($contact)
    {
        $this->contact[] = $contact;
        return $this;
    }

    /**
     * The type of channel to send notifications on.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getConnectionType()
    {
        return $this->connectionType;
    }

    /**
     * The type of channel to send notifications on.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $connectionType
     * @return $this
     */
    public function setConnectionType($connectionType)
    {
        $this->connectionType = $connectionType;
        return $this;
    }

    /**
     * The http verb to be used when calling this endpoint.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding[]
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * The http verb to be used when calling this endpoint.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding[] $method
     * @return $this
     */
    public function addMethod($method)
    {
        $this->method[] = $method;
        return $this;
    }

    /**
     * The interval during which the managing organization assumes the defined responsibility.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * The interval during which the managing organization assumes the defined responsibility.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPeriod $period
     * @return $this
     */
    public function setPeriod($period)
    {
        $this->period = $period;
        return $this;
    }

    /**
     * The uri that describes the actual end-point to send messages to.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRUri
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * The uri that describes the actual end-point to send messages to.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRUri $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * The mime type to send the payload in - either application/fhir+xml, or application/fhir+json. If the mime type is blank, then there is no payload in the notification, just a notification.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getPayloadFormat()
    {
        return $this->payloadFormat;
    }

    /**
     * The mime type to send the payload in - either application/fhir+xml, or application/fhir+json. If the mime type is blank, then there is no payload in the notification, just a notification.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $payloadFormat
     * @return $this
     */
    public function setPayloadFormat($payloadFormat)
    {
        $this->payloadFormat = $payloadFormat;
        return $this;
    }

    /**
     * The payload type describes the acceptable content that can be communicated on the endpoint.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getPayloadType()
    {
        return $this->payloadType;
    }

    /**
     * The payload type describes the acceptable content that can be communicated on the endpoint.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $payloadType
     * @return $this
     */
    public function addPayloadType($payloadType)
    {
        $this->payloadType[] = $payloadType;
        return $this;
    }

    /**
     * Additional headers / information to send as part of the notification.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString[]
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * Additional headers / information to send as part of the notification.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString[] $header
     * @return $this
     */
    public function addHeader($header)
    {
        $this->header[] = $header;
        return $this;
    }

    /**
     * The public part of the 'keys' allocated to an Organization by an accredited body to support secure exchange of data over the internet. To be provided by the Organization, where available.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }

    /**
     * The public part of the 'keys' allocated to an Organization by an accredited body to support secure exchange of data over the internet. To be provided by the Organization, where available.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $publicKey
     * @return $this
     */
    public function setPublicKey($publicKey)
    {
        $this->publicKey = $publicKey;
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
        if (null !== $this->status) $json['status'] = $this->status->jsonSerialize();
        if (null !== $this->name) $json['name'] = $this->name->jsonSerialize();
        if (null !== $this->managingOrganization) $json['managingOrganization'] = $this->managingOrganization->jsonSerialize();
        if (0 < count($this->contact)) {
            $json['contact'] = array();
            foreach($this->contact as $contact) {
                $json['contact'][] = $contact->jsonSerialize();
            }
        }
        if (null !== $this->connectionType) $json['connectionType'] = $this->connectionType->jsonSerialize();
        if (0 < count($this->method)) {
            $json['method'] = array();
            foreach($this->method as $method) {
                $json['method'][] = $method->jsonSerialize();
            }
        }
        if (null !== $this->period) $json['period'] = $this->period->jsonSerialize();
        if (null !== $this->address) $json['address'] = $this->address->jsonSerialize();
        if (null !== $this->payloadFormat) $json['payloadFormat'] = $this->payloadFormat->jsonSerialize();
        if (0 < count($this->payloadType)) {
            $json['payloadType'] = array();
            foreach($this->payloadType as $payloadType) {
                $json['payloadType'][] = $payloadType->jsonSerialize();
            }
        }
        if (0 < count($this->header)) {
            $json['header'] = array();
            foreach($this->header as $header) {
                $json['header'][] = $header->jsonSerialize();
            }
        }
        if (null !== $this->publicKey) $json['publicKey'] = $this->publicKey->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<Endpoint xmlns="http://hl7.org/fhir"></Endpoint>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (null !== $this->name) $this->name->xmlSerialize(true, $sxe->addChild('name'));
        if (null !== $this->managingOrganization) $this->managingOrganization->xmlSerialize(true, $sxe->addChild('managingOrganization'));
        if (0 < count($this->contact)) {
            foreach($this->contact as $contact) {
                $contact->xmlSerialize(true, $sxe->addChild('contact'));
            }
        }
        if (null !== $this->connectionType) $this->connectionType->xmlSerialize(true, $sxe->addChild('connectionType'));
        if (0 < count($this->method)) {
            foreach($this->method as $method) {
                $method->xmlSerialize(true, $sxe->addChild('method'));
            }
        }
        if (null !== $this->period) $this->period->xmlSerialize(true, $sxe->addChild('period'));
        if (null !== $this->address) $this->address->xmlSerialize(true, $sxe->addChild('address'));
        if (null !== $this->payloadFormat) $this->payloadFormat->xmlSerialize(true, $sxe->addChild('payloadFormat'));
        if (0 < count($this->payloadType)) {
            foreach($this->payloadType as $payloadType) {
                $payloadType->xmlSerialize(true, $sxe->addChild('payloadType'));
            }
        }
        if (0 < count($this->header)) {
            foreach($this->header as $header) {
                $header->xmlSerialize(true, $sxe->addChild('header'));
            }
        }
        if (null !== $this->publicKey) $this->publicKey->xmlSerialize(true, $sxe->addChild('publicKey'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}