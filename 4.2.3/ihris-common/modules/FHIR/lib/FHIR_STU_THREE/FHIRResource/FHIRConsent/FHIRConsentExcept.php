<?php namespace FHIR_STU_THREE\FHIRResource\FHIRConsent;

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

use FHIR_STU_THREE\FHIRElement\FHIRBackboneElement;
use FHIR_STU_THREE\JsonSerializable;

/**
 * A record of a healthcare consumer’s policy choices, which permits or denies identified recipient(s) or recipient role(s) to perform one or more actions within a given policy context, for specific purposes and periods of time.
 */
class FHIRConsentExcept extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * Action  to take - permit or deny - when the exception conditions are met.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRConsentExceptType
     */
    public $type = null;

    /**
     * The timeframe in which data is controlled by this exception.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public $period = null;

    /**
     * Who or what is controlled by this Exception. Use group to identify a set of actors by some property they share (e.g. 'admitting officers').
     * @var \FHIR_STU_THREE\FHIRResource\FHIRConsent\FHIRConsentActor[]
     */
    public $actor = array();

    /**
     * Actions controlled by this Exception.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $action = array();

    /**
     * A set of security labels that define which resources are controlled by this exception. If more than one label is specified, all resources must have all the specified labels.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding[]
     */
    public $securityLabel = array();

    /**
     * The context of the activities a user is taking - why the user is accessing the data - that are controlled by this exception.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding[]
     */
    public $purpose = array();

    /**
     * The class of information covered by this exception. The type can be a FHIR resource type, a profile on a type, or a CDA document, or some other type that indicates what sort of information the consent relates to.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding[]
     */
    public $class = array();

    /**
     * If this code is found in an instance, then the exception applies. TODO: where do you not have to look? This is a problematic element.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding[]
     */
    public $code = array();

    /**
     * The resources controlled by this exception, if specific resources are referenced.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRConsent\FHIRConsentData[]
     */
    public $data = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'Consent.Except';

    /**
     * Action  to take - permit or deny - when the exception conditions are met.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRConsentExceptType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Action  to take - permit or deny - when the exception conditions are met.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRConsentExceptType $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * The timeframe in which data is controlled by this exception.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * The timeframe in which data is controlled by this exception.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPeriod $period
     * @return $this
     */
    public function setPeriod($period)
    {
        $this->period = $period;
        return $this;
    }

    /**
     * Who or what is controlled by this Exception. Use group to identify a set of actors by some property they share (e.g. 'admitting officers').
     * @return \FHIR_STU_THREE\FHIRResource\FHIRConsent\FHIRConsentActor[]
     */
    public function getActor()
    {
        return $this->actor;
    }

    /**
     * Who or what is controlled by this Exception. Use group to identify a set of actors by some property they share (e.g. 'admitting officers').
     * @param \FHIR_STU_THREE\FHIRResource\FHIRConsent\FHIRConsentActor[] $actor
     * @return $this
     */
    public function addActor($actor)
    {
        $this->actor[] = $actor;
        return $this;
    }

    /**
     * Actions controlled by this Exception.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Actions controlled by this Exception.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $action
     * @return $this
     */
    public function addAction($action)
    {
        $this->action[] = $action;
        return $this;
    }

    /**
     * A set of security labels that define which resources are controlled by this exception. If more than one label is specified, all resources must have all the specified labels.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding[]
     */
    public function getSecurityLabel()
    {
        return $this->securityLabel;
    }

    /**
     * A set of security labels that define which resources are controlled by this exception. If more than one label is specified, all resources must have all the specified labels.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding[] $securityLabel
     * @return $this
     */
    public function addSecurityLabel($securityLabel)
    {
        $this->securityLabel[] = $securityLabel;
        return $this;
    }

    /**
     * The context of the activities a user is taking - why the user is accessing the data - that are controlled by this exception.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding[]
     */
    public function getPurpose()
    {
        return $this->purpose;
    }

    /**
     * The context of the activities a user is taking - why the user is accessing the data - that are controlled by this exception.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding[] $purpose
     * @return $this
     */
    public function addPurpose($purpose)
    {
        $this->purpose[] = $purpose;
        return $this;
    }

    /**
     * The class of information covered by this exception. The type can be a FHIR resource type, a profile on a type, or a CDA document, or some other type that indicates what sort of information the consent relates to.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding[]
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * The class of information covered by this exception. The type can be a FHIR resource type, a profile on a type, or a CDA document, or some other type that indicates what sort of information the consent relates to.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding[] $class
     * @return $this
     */
    public function addClass($class)
    {
        $this->class[] = $class;
        return $this;
    }

    /**
     * If this code is found in an instance, then the exception applies. TODO: where do you not have to look? This is a problematic element.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding[]
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * If this code is found in an instance, then the exception applies. TODO: where do you not have to look? This is a problematic element.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding[] $code
     * @return $this
     */
    public function addCode($code)
    {
        $this->code[] = $code;
        return $this;
    }

    /**
     * The resources controlled by this exception, if specific resources are referenced.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRConsent\FHIRConsentData[]
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * The resources controlled by this exception, if specific resources are referenced.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRConsent\FHIRConsentData[] $data
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
        if (null !== $this->type) $json['type'] = $this->type->jsonSerialize();
        if (null !== $this->period) $json['period'] = $this->period->jsonSerialize();
        if (0 < count($this->actor)) {
            $json['actor'] = array();
            foreach($this->actor as $actor) {
                $json['actor'][] = $actor->jsonSerialize();
            }
        }
        if (0 < count($this->action)) {
            $json['action'] = array();
            foreach($this->action as $action) {
                $json['action'][] = $action->jsonSerialize();
            }
        }
        if (0 < count($this->securityLabel)) {
            $json['securityLabel'] = array();
            foreach($this->securityLabel as $securityLabel) {
                $json['securityLabel'][] = $securityLabel->jsonSerialize();
            }
        }
        if (0 < count($this->purpose)) {
            $json['purpose'] = array();
            foreach($this->purpose as $purpose) {
                $json['purpose'][] = $purpose->jsonSerialize();
            }
        }
        if (0 < count($this->class)) {
            $json['class'] = array();
            foreach($this->class as $class) {
                $json['class'][] = $class->jsonSerialize();
            }
        }
        if (0 < count($this->code)) {
            $json['code'] = array();
            foreach($this->code as $code) {
                $json['code'][] = $code->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ConsentExcept xmlns="http://hl7.org/fhir"></ConsentExcept>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->type) $this->type->xmlSerialize(true, $sxe->addChild('type'));
        if (null !== $this->period) $this->period->xmlSerialize(true, $sxe->addChild('period'));
        if (0 < count($this->actor)) {
            foreach($this->actor as $actor) {
                $actor->xmlSerialize(true, $sxe->addChild('actor'));
            }
        }
        if (0 < count($this->action)) {
            foreach($this->action as $action) {
                $action->xmlSerialize(true, $sxe->addChild('action'));
            }
        }
        if (0 < count($this->securityLabel)) {
            foreach($this->securityLabel as $securityLabel) {
                $securityLabel->xmlSerialize(true, $sxe->addChild('securityLabel'));
            }
        }
        if (0 < count($this->purpose)) {
            foreach($this->purpose as $purpose) {
                $purpose->xmlSerialize(true, $sxe->addChild('purpose'));
            }
        }
        if (0 < count($this->class)) {
            foreach($this->class as $class) {
                $class->xmlSerialize(true, $sxe->addChild('class'));
            }
        }
        if (0 < count($this->code)) {
            foreach($this->code as $code) {
                $code->xmlSerialize(true, $sxe->addChild('code'));
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