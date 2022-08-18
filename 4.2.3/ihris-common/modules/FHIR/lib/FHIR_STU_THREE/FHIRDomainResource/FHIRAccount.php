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
 * A financial tool for tracking value accrued for a particular purpose.  In the healthcare field, used to track charges for a patient, cost centres, etc.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRAccount extends FHIRDomainResource implements JsonSerializable
{
    /**
     * Unique identifier used to reference the account.  May or may not be intended for human use (e.g. credit card number).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * Name used for the account when displaying it to humans in reports, etc.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $name = null;

    /**
     * Categorizes the account for reporting and searching purposes.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $type = null;

    /**
     * Indicates whether the account is presently used/useable or not.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRAccountStatus
     */
    public $status = null;

    /**
     * Indicates the period of time over which the account is allowed to have transactions posted to it.
This period may be different to the coveragePeriod which is the duration of time that services may occur.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public $active = null;

    /**
     * Identifies the currency to which transactions must be converted when crediting or debiting the account.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $currency = null;

    /**
     * Represents the sum of all credits less all debits associated with the account.  Might be positive, zero or negative.
     * @var \FHIR_STU_THREE\FHIRMoney
     */
    public $balance = null;

    /**
     * The party(s) that are responsible for payment (or part of) of charges applied to this account (including self-pay).

A coverage may only be resposible for specific types of charges, and the sequence of the coverages in the account could be important when processing billing.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $coverage = array();

    /**
     * Identifies the period of time the account applies to; e.g. accounts created per fiscal year, quarter, etc.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public $coveragePeriod = null;

    /**
     * Identifies the patient, device, practitioner, location or other object the account is associated with.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $subject = null;

    /**
     * Indicates the organization, department, etc. with responsibility for the account.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $owner = null;

    /**
     * Provides additional information about what the account tracks and how it is used.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $description = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'Account';

    /**
     * Unique identifier used to reference the account.  May or may not be intended for human use (e.g. credit card number).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Unique identifier used to reference the account.  May or may not be intended for human use (e.g. credit card number).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * Name used for the account when displaying it to humans in reports, etc.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Name used for the account when displaying it to humans in reports, etc.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Categorizes the account for reporting and searching purposes.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Categorizes the account for reporting and searching purposes.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Indicates whether the account is presently used/useable or not.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRAccountStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Indicates whether the account is presently used/useable or not.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRAccountStatus $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Indicates the period of time over which the account is allowed to have transactions posted to it.
This period may be different to the coveragePeriod which is the duration of time that services may occur.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Indicates the period of time over which the account is allowed to have transactions posted to it.
This period may be different to the coveragePeriod which is the duration of time that services may occur.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPeriod $active
     * @return $this
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * Identifies the currency to which transactions must be converted when crediting or debiting the account.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Identifies the currency to which transactions must be converted when crediting or debiting the account.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $currency
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * Represents the sum of all credits less all debits associated with the account.  Might be positive, zero or negative.
     * @return \FHIR_STU_THREE\FHIRMoney
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Represents the sum of all credits less all debits associated with the account.  Might be positive, zero or negative.
     * @param \FHIR_STU_THREE\FHIRMoney $balance
     * @return $this
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
        return $this;
    }

    /**
     * The party(s) that are responsible for payment (or part of) of charges applied to this account (including self-pay).

A coverage may only be resposible for specific types of charges, and the sequence of the coverages in the account could be important when processing billing.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getCoverage()
    {
        return $this->coverage;
    }

    /**
     * The party(s) that are responsible for payment (or part of) of charges applied to this account (including self-pay).

A coverage may only be resposible for specific types of charges, and the sequence of the coverages in the account could be important when processing billing.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $coverage
     * @return $this
     */
    public function addCoverage($coverage)
    {
        $this->coverage[] = $coverage;
        return $this;
    }

    /**
     * Identifies the period of time the account applies to; e.g. accounts created per fiscal year, quarter, etc.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRPeriod
     */
    public function getCoveragePeriod()
    {
        return $this->coveragePeriod;
    }

    /**
     * Identifies the period of time the account applies to; e.g. accounts created per fiscal year, quarter, etc.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRPeriod $coveragePeriod
     * @return $this
     */
    public function setCoveragePeriod($coveragePeriod)
    {
        $this->coveragePeriod = $coveragePeriod;
        return $this;
    }

    /**
     * Identifies the patient, device, practitioner, location or other object the account is associated with.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Identifies the patient, device, practitioner, location or other object the account is associated with.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * Indicates the organization, department, etc. with responsibility for the account.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Indicates the organization, department, etc. with responsibility for the account.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $owner
     * @return $this
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
        return $this;
    }

    /**
     * Provides additional information about what the account tracks and how it is used.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Provides additional information about what the account tracks and how it is used.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
        if (null !== $this->name) $json['name'] = $this->name->jsonSerialize();
        if (null !== $this->type) $json['type'] = $this->type->jsonSerialize();
        if (null !== $this->status) $json['status'] = $this->status->jsonSerialize();
        if (null !== $this->active) $json['active'] = $this->active->jsonSerialize();
        if (null !== $this->currency) $json['currency'] = $this->currency->jsonSerialize();
        if (null !== $this->balance) $json['balance'] = $this->balance->jsonSerialize();
        if (0 < count($this->coverage)) {
            $json['coverage'] = array();
            foreach($this->coverage as $coverage) {
                $json['coverage'][] = $coverage->jsonSerialize();
            }
        }
        if (null !== $this->coveragePeriod) $json['coveragePeriod'] = $this->coveragePeriod->jsonSerialize();
        if (null !== $this->subject) $json['subject'] = $this->subject->jsonSerialize();
        if (null !== $this->owner) $json['owner'] = $this->owner->jsonSerialize();
        if (null !== $this->description) $json['description'] = $this->description->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<Account xmlns="http://hl7.org/fhir"></Account>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (null !== $this->name) $this->name->xmlSerialize(true, $sxe->addChild('name'));
        if (null !== $this->type) $this->type->xmlSerialize(true, $sxe->addChild('type'));
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (null !== $this->active) $this->active->xmlSerialize(true, $sxe->addChild('active'));
        if (null !== $this->currency) $this->currency->xmlSerialize(true, $sxe->addChild('currency'));
        if (null !== $this->balance) $this->balance->xmlSerialize(true, $sxe->addChild('balance'));
        if (0 < count($this->coverage)) {
            foreach($this->coverage as $coverage) {
                $coverage->xmlSerialize(true, $sxe->addChild('coverage'));
            }
        }
        if (null !== $this->coveragePeriod) $this->coveragePeriod->xmlSerialize(true, $sxe->addChild('coveragePeriod'));
        if (null !== $this->subject) $this->subject->xmlSerialize(true, $sxe->addChild('subject'));
        if (null !== $this->owner) $this->owner->xmlSerialize(true, $sxe->addChild('owner'));
        if (null !== $this->description) $this->description->xmlSerialize(true, $sxe->addChild('description'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}