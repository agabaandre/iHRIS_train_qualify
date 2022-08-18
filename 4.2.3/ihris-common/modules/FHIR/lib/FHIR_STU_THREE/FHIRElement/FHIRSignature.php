<?php namespace FHIR_STU_THREE\FHIRElement;

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

use FHIR_STU_THREE\FHIRElement;
use FHIR_STU_THREE\JsonSerializable;

/**
 * A digital signature along with supporting context. The signature may be electronic/cryptographic in nature, or a graphical image representing a hand-written signature, or a signature process. Different Signature approaches have different utilities.
 * If the element is present, it must have a value for at least one of the defined elements, an @id referenced from the Narrative, or extensions
 */
class FHIRSignature extends FHIRElement implements JsonSerializable
{
    /**
     * An indication of the reason that the entity signed this document. This may be explicitly included as part of the signature information and can be used when determining accountability for various actions concerning the document.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding[]
     */
    public $type = array();

    /**
     * When the digital signature was signed.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRInstant
     */
    public $when = null;

    /**
     * A reference to an application-usable description of the identity that signed  (e.g. the signature used their private key). (choose any one of who*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRUri
     */
    public $whoUri = null;

    /**
     * A reference to an application-usable description of the identity that signed  (e.g. the signature used their private key). (choose any one of who*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $whoReference = null;

    /**
     * A reference to an application-usable description of the identity that is represented by the signature. (choose any one of onBehalfOf*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRUri
     */
    public $onBehalfOfUri = null;

    /**
     * A reference to an application-usable description of the identity that is represented by the signature. (choose any one of onBehalfOf*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $onBehalfOfReference = null;

    /**
     * A mime type that indicates the technical format of the signature. Important mime types are application/signature+xml for X ML DigSig, application/jwt for JWT, and image/* for a graphical image of a signature, etc.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCode
     */
    public $contentType = null;

    /**
     * The base64 encoding of the Signature content. When signature is not recorded electronically this element would be empty.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBase64Binary
     */
    public $blob = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'Signature';

    /**
     * An indication of the reason that the entity signed this document. This may be explicitly included as part of the signature information and can be used when determining accountability for various actions concerning the document.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding[]
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * An indication of the reason that the entity signed this document. This may be explicitly included as part of the signature information and can be used when determining accountability for various actions concerning the document.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding[] $type
     * @return $this
     */
    public function addType($type)
    {
        $this->type[] = $type;
        return $this;
    }

    /**
     * When the digital signature was signed.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRInstant
     */
    public function getWhen()
    {
        return $this->when;
    }

    /**
     * When the digital signature was signed.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRInstant $when
     * @return $this
     */
    public function setWhen($when)
    {
        $this->when = $when;
        return $this;
    }

    /**
     * A reference to an application-usable description of the identity that signed  (e.g. the signature used their private key). (choose any one of who*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRUri
     */
    public function getWhoUri()
    {
        return $this->whoUri;
    }

    /**
     * A reference to an application-usable description of the identity that signed  (e.g. the signature used their private key). (choose any one of who*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRUri $whoUri
     * @return $this
     */
    public function setWhoUri($whoUri)
    {
        $this->whoUri = $whoUri;
        return $this;
    }

    /**
     * A reference to an application-usable description of the identity that signed  (e.g. the signature used their private key). (choose any one of who*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getWhoReference()
    {
        return $this->whoReference;
    }

    /**
     * A reference to an application-usable description of the identity that signed  (e.g. the signature used their private key). (choose any one of who*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $whoReference
     * @return $this
     */
    public function setWhoReference($whoReference)
    {
        $this->whoReference = $whoReference;
        return $this;
    }

    /**
     * A reference to an application-usable description of the identity that is represented by the signature. (choose any one of onBehalfOf*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRUri
     */
    public function getOnBehalfOfUri()
    {
        return $this->onBehalfOfUri;
    }

    /**
     * A reference to an application-usable description of the identity that is represented by the signature. (choose any one of onBehalfOf*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRUri $onBehalfOfUri
     * @return $this
     */
    public function setOnBehalfOfUri($onBehalfOfUri)
    {
        $this->onBehalfOfUri = $onBehalfOfUri;
        return $this;
    }

    /**
     * A reference to an application-usable description of the identity that is represented by the signature. (choose any one of onBehalfOf*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getOnBehalfOfReference()
    {
        return $this->onBehalfOfReference;
    }

    /**
     * A reference to an application-usable description of the identity that is represented by the signature. (choose any one of onBehalfOf*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $onBehalfOfReference
     * @return $this
     */
    public function setOnBehalfOfReference($onBehalfOfReference)
    {
        $this->onBehalfOfReference = $onBehalfOfReference;
        return $this;
    }

    /**
     * A mime type that indicates the technical format of the signature. Important mime types are application/signature+xml for X ML DigSig, application/jwt for JWT, and image/* for a graphical image of a signature, etc.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCode
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * A mime type that indicates the technical format of the signature. Important mime types are application/signature+xml for X ML DigSig, application/jwt for JWT, and image/* for a graphical image of a signature, etc.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCode $contentType
     * @return $this
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
        return $this;
    }

    /**
     * The base64 encoding of the Signature content. When signature is not recorded electronically this element would be empty.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBase64Binary
     */
    public function getBlob()
    {
        return $this->blob;
    }

    /**
     * The base64 encoding of the Signature content. When signature is not recorded electronically this element would be empty.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBase64Binary $blob
     * @return $this
     */
    public function setBlob($blob)
    {
        $this->blob = $blob;
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
        if (0 < count($this->type)) {
            $json['type'] = array();
            foreach($this->type as $type) {
                $json['type'][] = $type->jsonSerialize();
            }
        }
        if (null !== $this->when) $json['when'] = $this->when->jsonSerialize();
        if (null !== $this->whoUri) $json['whoUri'] = $this->whoUri->jsonSerialize();
        if (null !== $this->whoReference) $json['whoReference'] = $this->whoReference->jsonSerialize();
        if (null !== $this->onBehalfOfUri) $json['onBehalfOfUri'] = $this->onBehalfOfUri->jsonSerialize();
        if (null !== $this->onBehalfOfReference) $json['onBehalfOfReference'] = $this->onBehalfOfReference->jsonSerialize();
        if (null !== $this->contentType) $json['contentType'] = $this->contentType->jsonSerialize();
        if (null !== $this->blob) $json['blob'] = $this->blob->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<Signature xmlns="http://hl7.org/fhir"></Signature>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->type)) {
            foreach($this->type as $type) {
                $type->xmlSerialize(true, $sxe->addChild('type'));
            }
        }
        if (null !== $this->when) $this->when->xmlSerialize(true, $sxe->addChild('when'));
        if (null !== $this->whoUri) $this->whoUri->xmlSerialize(true, $sxe->addChild('whoUri'));
        if (null !== $this->whoReference) $this->whoReference->xmlSerialize(true, $sxe->addChild('whoReference'));
        if (null !== $this->onBehalfOfUri) $this->onBehalfOfUri->xmlSerialize(true, $sxe->addChild('onBehalfOfUri'));
        if (null !== $this->onBehalfOfReference) $this->onBehalfOfReference->xmlSerialize(true, $sxe->addChild('onBehalfOfReference'));
        if (null !== $this->contentType) $this->contentType->xmlSerialize(true, $sxe->addChild('contentType'));
        if (null !== $this->blob) $this->blob->xmlSerialize(true, $sxe->addChild('blob'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}