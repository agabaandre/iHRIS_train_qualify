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
 * An occurrence of information being transmitted; e.g. an alert that was sent to a responsible provider, a public health agency was notified about a reportable condition.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRCommunication extends FHIRDomainResource implements JsonSerializable
{
    /**
     * Identifiers associated with this Communication that are defined by business processes and/ or used to refer to it when a direct URL reference to the resource itself is not appropriate (e.g. in CDA documents, or in written / printed documentation).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * An order, proposal or plan fulfilled in whole or in part by this Communication.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $basedOn = array();

    /**
     * Part of this action.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $parent = array();

    /**
     * The status of the transmission.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCommunicationStatus
     */
    public $status = null;

    /**
     * The type of message conveyed such as alert, notification, reminder, instruction, etc.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $category = null;

    /**
     * A channel that was used for this communication (e.g. email, fax).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $medium = array();

    /**
     * The patient who was the focus of this communication.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $subject = null;

    /**
     * The resources which were responsible for or related to producing this communication.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $topic = array();

    /**
     * The encounter within which the communication was sent.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $context = null;

    /**
     * The time when this communication was sent.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $sent = null;

    /**
     * The time when this communication arrived at the destination.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $received = null;

    /**
     * The entity (e.g. person, organization, clinical information system, or device) which was the source of the communication.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $sender = null;

    /**
     * The entity (e.g. person, organization, clinical information system, or device) which was the target of the communication. If receipts need to be tracked by individual, a separate resource instance will need to be created for each recipient.  Multiple recipient communications are intended where either a receipt(s) is not tracked (e.g. a mass mail-out) or is captured in aggregate (all emails confirmed received by a particular time).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $recipient = array();

    /**
     * The reason or justification for the communication.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $reason = array();

    /**
     * Text, attachment(s), or resource(s) that was communicated to the recipient.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRCommunication\FHIRCommunicationPayload[]
     */
    public $payload = array();

    /**
     * Additional notes or commentary about the communication by the sender, receiver or other interested parties.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRAnnotation[]
     */
    public $note = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'Communication';

    /**
     * Identifiers associated with this Communication that are defined by business processes and/ or used to refer to it when a direct URL reference to the resource itself is not appropriate (e.g. in CDA documents, or in written / printed documentation).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Identifiers associated with this Communication that are defined by business processes and/ or used to refer to it when a direct URL reference to the resource itself is not appropriate (e.g. in CDA documents, or in written / printed documentation).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * An order, proposal or plan fulfilled in whole or in part by this Communication.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getBasedOn()
    {
        return $this->basedOn;
    }

    /**
     * An order, proposal or plan fulfilled in whole or in part by this Communication.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $basedOn
     * @return $this
     */
    public function addBasedOn($basedOn)
    {
        $this->basedOn[] = $basedOn;
        return $this;
    }

    /**
     * Part of this action.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Part of this action.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $parent
     * @return $this
     */
    public function addParent($parent)
    {
        $this->parent[] = $parent;
        return $this;
    }

    /**
     * The status of the transmission.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCommunicationStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status of the transmission.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCommunicationStatus $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * The type of message conveyed such as alert, notification, reminder, instruction, etc.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * The type of message conveyed such as alert, notification, reminder, instruction, etc.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $category
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * A channel that was used for this communication (e.g. email, fax).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getMedium()
    {
        return $this->medium;
    }

    /**
     * A channel that was used for this communication (e.g. email, fax).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $medium
     * @return $this
     */
    public function addMedium($medium)
    {
        $this->medium[] = $medium;
        return $this;
    }

    /**
     * The patient who was the focus of this communication.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * The patient who was the focus of this communication.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * The resources which were responsible for or related to producing this communication.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * The resources which were responsible for or related to producing this communication.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $topic
     * @return $this
     */
    public function addTopic($topic)
    {
        $this->topic[] = $topic;
        return $this;
    }

    /**
     * The encounter within which the communication was sent.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * The encounter within which the communication was sent.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $context
     * @return $this
     */
    public function setContext($context)
    {
        $this->context = $context;
        return $this;
    }

    /**
     * The time when this communication was sent.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getSent()
    {
        return $this->sent;
    }

    /**
     * The time when this communication was sent.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $sent
     * @return $this
     */
    public function setSent($sent)
    {
        $this->sent = $sent;
        return $this;
    }

    /**
     * The time when this communication arrived at the destination.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getReceived()
    {
        return $this->received;
    }

    /**
     * The time when this communication arrived at the destination.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $received
     * @return $this
     */
    public function setReceived($received)
    {
        $this->received = $received;
        return $this;
    }

    /**
     * The entity (e.g. person, organization, clinical information system, or device) which was the source of the communication.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * The entity (e.g. person, organization, clinical information system, or device) which was the source of the communication.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $sender
     * @return $this
     */
    public function setSender($sender)
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * The entity (e.g. person, organization, clinical information system, or device) which was the target of the communication. If receipts need to be tracked by individual, a separate resource instance will need to be created for each recipient.  Multiple recipient communications are intended where either a receipt(s) is not tracked (e.g. a mass mail-out) or is captured in aggregate (all emails confirmed received by a particular time).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * The entity (e.g. person, organization, clinical information system, or device) which was the target of the communication. If receipts need to be tracked by individual, a separate resource instance will need to be created for each recipient.  Multiple recipient communications are intended where either a receipt(s) is not tracked (e.g. a mass mail-out) or is captured in aggregate (all emails confirmed received by a particular time).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $recipient
     * @return $this
     */
    public function addRecipient($recipient)
    {
        $this->recipient[] = $recipient;
        return $this;
    }

    /**
     * The reason or justification for the communication.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * The reason or justification for the communication.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $reason
     * @return $this
     */
    public function addReason($reason)
    {
        $this->reason[] = $reason;
        return $this;
    }

    /**
     * Text, attachment(s), or resource(s) that was communicated to the recipient.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRCommunication\FHIRCommunicationPayload[]
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * Text, attachment(s), or resource(s) that was communicated to the recipient.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRCommunication\FHIRCommunicationPayload[] $payload
     * @return $this
     */
    public function addPayload($payload)
    {
        $this->payload[] = $payload;
        return $this;
    }

    /**
     * Additional notes or commentary about the communication by the sender, receiver or other interested parties.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRAnnotation[]
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Additional notes or commentary about the communication by the sender, receiver or other interested parties.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRAnnotation[] $note
     * @return $this
     */
    public function addNote($note)
    {
        $this->note[] = $note;
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
        if (0 < count($this->basedOn)) {
            $json['basedOn'] = array();
            foreach($this->basedOn as $basedOn) {
                $json['basedOn'][] = $basedOn->jsonSerialize();
            }
        }
        if (0 < count($this->parent)) {
            $json['parent'] = array();
            foreach($this->parent as $parent) {
                $json['parent'][] = $parent->jsonSerialize();
            }
        }
        if (null !== $this->status) $json['status'] = $this->status->jsonSerialize();
        if (null !== $this->category) $json['category'] = $this->category->jsonSerialize();
        if (0 < count($this->medium)) {
            $json['medium'] = array();
            foreach($this->medium as $medium) {
                $json['medium'][] = $medium->jsonSerialize();
            }
        }
        if (null !== $this->subject) $json['subject'] = $this->subject->jsonSerialize();
        if (0 < count($this->topic)) {
            $json['topic'] = array();
            foreach($this->topic as $topic) {
                $json['topic'][] = $topic->jsonSerialize();
            }
        }
        if (null !== $this->context) $json['context'] = $this->context->jsonSerialize();
        if (null !== $this->sent) $json['sent'] = $this->sent->jsonSerialize();
        if (null !== $this->received) $json['received'] = $this->received->jsonSerialize();
        if (null !== $this->sender) $json['sender'] = $this->sender->jsonSerialize();
        if (0 < count($this->recipient)) {
            $json['recipient'] = array();
            foreach($this->recipient as $recipient) {
                $json['recipient'][] = $recipient->jsonSerialize();
            }
        }
        if (0 < count($this->reason)) {
            $json['reason'] = array();
            foreach($this->reason as $reason) {
                $json['reason'][] = $reason->jsonSerialize();
            }
        }
        if (0 < count($this->payload)) {
            $json['payload'] = array();
            foreach($this->payload as $payload) {
                $json['payload'][] = $payload->jsonSerialize();
            }
        }
        if (0 < count($this->note)) {
            $json['note'] = array();
            foreach($this->note as $note) {
                $json['note'][] = $note->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<Communication xmlns="http://hl7.org/fhir"></Communication>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (0 < count($this->basedOn)) {
            foreach($this->basedOn as $basedOn) {
                $basedOn->xmlSerialize(true, $sxe->addChild('basedOn'));
            }
        }
        if (0 < count($this->parent)) {
            foreach($this->parent as $parent) {
                $parent->xmlSerialize(true, $sxe->addChild('parent'));
            }
        }
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (null !== $this->category) $this->category->xmlSerialize(true, $sxe->addChild('category'));
        if (0 < count($this->medium)) {
            foreach($this->medium as $medium) {
                $medium->xmlSerialize(true, $sxe->addChild('medium'));
            }
        }
        if (null !== $this->subject) $this->subject->xmlSerialize(true, $sxe->addChild('subject'));
        if (0 < count($this->topic)) {
            foreach($this->topic as $topic) {
                $topic->xmlSerialize(true, $sxe->addChild('topic'));
            }
        }
        if (null !== $this->context) $this->context->xmlSerialize(true, $sxe->addChild('context'));
        if (null !== $this->sent) $this->sent->xmlSerialize(true, $sxe->addChild('sent'));
        if (null !== $this->received) $this->received->xmlSerialize(true, $sxe->addChild('received'));
        if (null !== $this->sender) $this->sender->xmlSerialize(true, $sxe->addChild('sender'));
        if (0 < count($this->recipient)) {
            foreach($this->recipient as $recipient) {
                $recipient->xmlSerialize(true, $sxe->addChild('recipient'));
            }
        }
        if (0 < count($this->reason)) {
            foreach($this->reason as $reason) {
                $reason->xmlSerialize(true, $sxe->addChild('reason'));
            }
        }
        if (0 < count($this->payload)) {
            foreach($this->payload as $payload) {
                $payload->xmlSerialize(true, $sxe->addChild('payload'));
            }
        }
        if (0 < count($this->note)) {
            foreach($this->note as $note) {
                $note->xmlSerialize(true, $sxe->addChild('note'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}