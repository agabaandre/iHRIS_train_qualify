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
 * Related resources such as additional documentation, justification, or bibliographic references.
 * If the element is present, it must have a value for at least one of the defined elements, an @id referenced from the Narrative, or extensions
 */
class FHIRRelatedResource extends FHIRElement implements JsonSerializable
{
    /**
     * The type of related resource.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRRelatedResourceType
     */
    public $type = null;

    /**
     * A brief description of the document or resource being referenced, suitable for display to a consumer.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $display = null;

    /**
     * A bibliographic citation for the related resource. This text SHOULD be formatted according to an accepted citation format.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $citation = null;

    /**
     * A url for the resource that can be followed to access the actual content.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRUri
     */
    public $url = null;

    /**
     * The document being referenced, represented as an attachment. This is exclusive with the resource element.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRAttachment
     */
    public $document = null;

    /**
     * The related resource, such as a library, value set, profile, or other module.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $resource = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'RelatedResource';

    /**
     * The type of related resource.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRRelatedResourceType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * The type of related resource.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRRelatedResourceType $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * A brief description of the document or resource being referenced, suitable for display to a consumer.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getDisplay()
    {
        return $this->display;
    }

    /**
     * A brief description of the document or resource being referenced, suitable for display to a consumer.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $display
     * @return $this
     */
    public function setDisplay($display)
    {
        $this->display = $display;
        return $this;
    }

    /**
     * A bibliographic citation for the related resource. This text SHOULD be formatted according to an accepted citation format.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getCitation()
    {
        return $this->citation;
    }

    /**
     * A bibliographic citation for the related resource. This text SHOULD be formatted according to an accepted citation format.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $citation
     * @return $this
     */
    public function setCitation($citation)
    {
        $this->citation = $citation;
        return $this;
    }

    /**
     * A url for the resource that can be followed to access the actual content.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRUri
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * A url for the resource that can be followed to access the actual content.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRUri $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * The document being referenced, represented as an attachment. This is exclusive with the resource element.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRAttachment
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * The document being referenced, represented as an attachment. This is exclusive with the resource element.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRAttachment $document
     * @return $this
     */
    public function setDocument($document)
    {
        $this->document = $document;
        return $this;
    }

    /**
     * The related resource, such as a library, value set, profile, or other module.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * The related resource, such as a library, value set, profile, or other module.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $resource
     * @return $this
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
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
        if (null !== $this->display) $json['display'] = $this->display->jsonSerialize();
        if (null !== $this->citation) $json['citation'] = $this->citation->jsonSerialize();
        if (null !== $this->url) $json['url'] = $this->url->jsonSerialize();
        if (null !== $this->document) $json['document'] = $this->document->jsonSerialize();
        if (null !== $this->resource) $json['resource'] = $this->resource->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<RelatedResource xmlns="http://hl7.org/fhir"></RelatedResource>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->type) $this->type->xmlSerialize(true, $sxe->addChild('type'));
        if (null !== $this->display) $this->display->xmlSerialize(true, $sxe->addChild('display'));
        if (null !== $this->citation) $this->citation->xmlSerialize(true, $sxe->addChild('citation'));
        if (null !== $this->url) $this->url->xmlSerialize(true, $sxe->addChild('url'));
        if (null !== $this->document) $this->document->xmlSerialize(true, $sxe->addChild('document'));
        if (null !== $this->resource) $this->resource->xmlSerialize(true, $sxe->addChild('resource'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}