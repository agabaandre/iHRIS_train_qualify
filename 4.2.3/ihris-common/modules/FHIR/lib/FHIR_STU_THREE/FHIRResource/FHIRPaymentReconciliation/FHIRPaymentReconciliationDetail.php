<?php namespace FHIR_STU_THREE\FHIRResource\FHIRPaymentReconciliation;

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
 * This resource provides payment details and claim references supporting a bulk payment.
 */
class FHIRPaymentReconciliationDetail extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * Code to indicate the nature of the payment, adjustment, funds advance, etc.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $type = null;

    /**
     * The claim or financial resource. (choose any one of request*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $requestIdentifier = null;

    /**
     * The claim or financial resource. (choose any one of request*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $requestReference = null;

    /**
     * The claim response resource. (choose any one of response*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $responseIdentifier = null;

    /**
     * The claim response resource. (choose any one of response*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $responseReference = null;

    /**
     * The Organization which submitted the invoice or financial transaction. (choose any one of submitter*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $submitterIdentifier = null;

    /**
     * The Organization which submitted the invoice or financial transaction. (choose any one of submitter*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $submitterReference = null;

    /**
     * The organization which is receiving the payment. (choose any one of payee*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $payeeIdentifier = null;

    /**
     * The organization which is receiving the payment. (choose any one of payee*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $payeeReference = null;

    /**
     * The date of the invoice or financial resource.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDate
     */
    public $date = null;

    /**
     * Amount paid for this detail.
     * @var \FHIR_STU_THREE\FHIRMoney
     */
    public $amount = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'PaymentReconciliation.Detail';

    /**
     * Code to indicate the nature of the payment, adjustment, funds advance, etc.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Code to indicate the nature of the payment, adjustment, funds advance, etc.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * The claim or financial resource. (choose any one of request*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getRequestIdentifier()
    {
        return $this->requestIdentifier;
    }

    /**
     * The claim or financial resource. (choose any one of request*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $requestIdentifier
     * @return $this
     */
    public function setRequestIdentifier($requestIdentifier)
    {
        $this->requestIdentifier = $requestIdentifier;
        return $this;
    }

    /**
     * The claim or financial resource. (choose any one of request*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getRequestReference()
    {
        return $this->requestReference;
    }

    /**
     * The claim or financial resource. (choose any one of request*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $requestReference
     * @return $this
     */
    public function setRequestReference($requestReference)
    {
        $this->requestReference = $requestReference;
        return $this;
    }

    /**
     * The claim response resource. (choose any one of response*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getResponseIdentifier()
    {
        return $this->responseIdentifier;
    }

    /**
     * The claim response resource. (choose any one of response*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $responseIdentifier
     * @return $this
     */
    public function setResponseIdentifier($responseIdentifier)
    {
        $this->responseIdentifier = $responseIdentifier;
        return $this;
    }

    /**
     * The claim response resource. (choose any one of response*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getResponseReference()
    {
        return $this->responseReference;
    }

    /**
     * The claim response resource. (choose any one of response*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $responseReference
     * @return $this
     */
    public function setResponseReference($responseReference)
    {
        $this->responseReference = $responseReference;
        return $this;
    }

    /**
     * The Organization which submitted the invoice or financial transaction. (choose any one of submitter*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getSubmitterIdentifier()
    {
        return $this->submitterIdentifier;
    }

    /**
     * The Organization which submitted the invoice or financial transaction. (choose any one of submitter*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $submitterIdentifier
     * @return $this
     */
    public function setSubmitterIdentifier($submitterIdentifier)
    {
        $this->submitterIdentifier = $submitterIdentifier;
        return $this;
    }

    /**
     * The Organization which submitted the invoice or financial transaction. (choose any one of submitter*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getSubmitterReference()
    {
        return $this->submitterReference;
    }

    /**
     * The Organization which submitted the invoice or financial transaction. (choose any one of submitter*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $submitterReference
     * @return $this
     */
    public function setSubmitterReference($submitterReference)
    {
        $this->submitterReference = $submitterReference;
        return $this;
    }

    /**
     * The organization which is receiving the payment. (choose any one of payee*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getPayeeIdentifier()
    {
        return $this->payeeIdentifier;
    }

    /**
     * The organization which is receiving the payment. (choose any one of payee*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $payeeIdentifier
     * @return $this
     */
    public function setPayeeIdentifier($payeeIdentifier)
    {
        $this->payeeIdentifier = $payeeIdentifier;
        return $this;
    }

    /**
     * The organization which is receiving the payment. (choose any one of payee*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getPayeeReference()
    {
        return $this->payeeReference;
    }

    /**
     * The organization which is receiving the payment. (choose any one of payee*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $payeeReference
     * @return $this
     */
    public function setPayeeReference($payeeReference)
    {
        $this->payeeReference = $payeeReference;
        return $this;
    }

    /**
     * The date of the invoice or financial resource.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDate
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * The date of the invoice or financial resource.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDate $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Amount paid for this detail.
     * @return \FHIR_STU_THREE\FHIRMoney
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Amount paid for this detail.
     * @param \FHIR_STU_THREE\FHIRMoney $amount
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
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
        if (null !== $this->requestIdentifier) $json['requestIdentifier'] = $this->requestIdentifier->jsonSerialize();
        if (null !== $this->requestReference) $json['requestReference'] = $this->requestReference->jsonSerialize();
        if (null !== $this->responseIdentifier) $json['responseIdentifier'] = $this->responseIdentifier->jsonSerialize();
        if (null !== $this->responseReference) $json['responseReference'] = $this->responseReference->jsonSerialize();
        if (null !== $this->submitterIdentifier) $json['submitterIdentifier'] = $this->submitterIdentifier->jsonSerialize();
        if (null !== $this->submitterReference) $json['submitterReference'] = $this->submitterReference->jsonSerialize();
        if (null !== $this->payeeIdentifier) $json['payeeIdentifier'] = $this->payeeIdentifier->jsonSerialize();
        if (null !== $this->payeeReference) $json['payeeReference'] = $this->payeeReference->jsonSerialize();
        if (null !== $this->date) $json['date'] = $this->date->jsonSerialize();
        if (null !== $this->amount) $json['amount'] = $this->amount->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<PaymentReconciliationDetail xmlns="http://hl7.org/fhir"></PaymentReconciliationDetail>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->type) $this->type->xmlSerialize(true, $sxe->addChild('type'));
        if (null !== $this->requestIdentifier) $this->requestIdentifier->xmlSerialize(true, $sxe->addChild('requestIdentifier'));
        if (null !== $this->requestReference) $this->requestReference->xmlSerialize(true, $sxe->addChild('requestReference'));
        if (null !== $this->responseIdentifier) $this->responseIdentifier->xmlSerialize(true, $sxe->addChild('responseIdentifier'));
        if (null !== $this->responseReference) $this->responseReference->xmlSerialize(true, $sxe->addChild('responseReference'));
        if (null !== $this->submitterIdentifier) $this->submitterIdentifier->xmlSerialize(true, $sxe->addChild('submitterIdentifier'));
        if (null !== $this->submitterReference) $this->submitterReference->xmlSerialize(true, $sxe->addChild('submitterReference'));
        if (null !== $this->payeeIdentifier) $this->payeeIdentifier->xmlSerialize(true, $sxe->addChild('payeeIdentifier'));
        if (null !== $this->payeeReference) $this->payeeReference->xmlSerialize(true, $sxe->addChild('payeeReference'));
        if (null !== $this->date) $this->date->xmlSerialize(true, $sxe->addChild('date'));
        if (null !== $this->amount) $this->amount->xmlSerialize(true, $sxe->addChild('amount'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}