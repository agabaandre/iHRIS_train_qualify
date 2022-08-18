<?php namespace FHIR_STU_THREE\FHIRResource\FHIRProtocol;

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
 * A definition of behaviors to be taken in particular circumstances, often including conditions, options and other decision points.
 */
class FHIRProtocolStep extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * Label for step.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $name = null;

    /**
     * Human description of activity.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $description = null;

    /**
     * How long does step last?
     * @var \FHIR_STU_THREE\FHIRDuration
     */
    public $duration = null;

    /**
     * Rules prior to execution.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRProtocol\FHIRProtocolPrecondition
     */
    public $precondition = null;

    /**
     * Indicates the conditions that must be met for activities that are part of this time point to terminate.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRProtocol\FHIRProtocolPrecondition
     */
    public $exit = null;

    /**
     * First activity within timepoint.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRUri
     */
    public $firstActivity = null;

    /**
     * Activities that occur within timepoint.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRProtocol\FHIRProtocolActivity[]
     */
    public $activity = array();

    /**
     * What happens next?
     * @var \FHIR_STU_THREE\FHIRResource\FHIRProtocol\FHIRProtocolNext[]
     */
    public $next = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'Protocol.Step';

    /**
     * Label for step.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Label for step.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Human description of activity.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Human description of activity.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * How long does step last?
     * @return \FHIR_STU_THREE\FHIRDuration
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * How long does step last?
     * @param \FHIR_STU_THREE\FHIRDuration $duration
     * @return $this
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * Rules prior to execution.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRProtocol\FHIRProtocolPrecondition
     */
    public function getPrecondition()
    {
        return $this->precondition;
    }

    /**
     * Rules prior to execution.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRProtocol\FHIRProtocolPrecondition $precondition
     * @return $this
     */
    public function setPrecondition($precondition)
    {
        $this->precondition = $precondition;
        return $this;
    }

    /**
     * Indicates the conditions that must be met for activities that are part of this time point to terminate.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRProtocol\FHIRProtocolPrecondition
     */
    public function getExit()
    {
        return $this->exit;
    }

    /**
     * Indicates the conditions that must be met for activities that are part of this time point to terminate.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRProtocol\FHIRProtocolPrecondition $exit
     * @return $this
     */
    public function setExit($exit)
    {
        $this->exit = $exit;
        return $this;
    }

    /**
     * First activity within timepoint.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRUri
     */
    public function getFirstActivity()
    {
        return $this->firstActivity;
    }

    /**
     * First activity within timepoint.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRUri $firstActivity
     * @return $this
     */
    public function setFirstActivity($firstActivity)
    {
        $this->firstActivity = $firstActivity;
        return $this;
    }

    /**
     * Activities that occur within timepoint.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRProtocol\FHIRProtocolActivity[]
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * Activities that occur within timepoint.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRProtocol\FHIRProtocolActivity[] $activity
     * @return $this
     */
    public function addActivity($activity)
    {
        $this->activity[] = $activity;
        return $this;
    }

    /**
     * What happens next?
     * @return \FHIR_STU_THREE\FHIRResource\FHIRProtocol\FHIRProtocolNext[]
     */
    public function getNext()
    {
        return $this->next;
    }

    /**
     * What happens next?
     * @param \FHIR_STU_THREE\FHIRResource\FHIRProtocol\FHIRProtocolNext[] $next
     * @return $this
     */
    public function addNext($next)
    {
        $this->next[] = $next;
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
        if (null !== $this->name) $json['name'] = $this->name->jsonSerialize();
        if (null !== $this->description) $json['description'] = $this->description->jsonSerialize();
        if (null !== $this->duration) $json['duration'] = $this->duration->jsonSerialize();
        if (null !== $this->precondition) $json['precondition'] = $this->precondition->jsonSerialize();
        if (null !== $this->exit) $json['exit'] = $this->exit->jsonSerialize();
        if (null !== $this->firstActivity) $json['firstActivity'] = $this->firstActivity->jsonSerialize();
        if (0 < count($this->activity)) {
            $json['activity'] = array();
            foreach($this->activity as $activity) {
                $json['activity'][] = $activity->jsonSerialize();
            }
        }
        if (0 < count($this->next)) {
            $json['next'] = array();
            foreach($this->next as $next) {
                $json['next'][] = $next->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ProtocolStep xmlns="http://hl7.org/fhir"></ProtocolStep>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->name) $this->name->xmlSerialize(true, $sxe->addChild('name'));
        if (null !== $this->description) $this->description->xmlSerialize(true, $sxe->addChild('description'));
        if (null !== $this->duration) $this->duration->xmlSerialize(true, $sxe->addChild('duration'));
        if (null !== $this->precondition) $this->precondition->xmlSerialize(true, $sxe->addChild('precondition'));
        if (null !== $this->exit) $this->exit->xmlSerialize(true, $sxe->addChild('exit'));
        if (null !== $this->firstActivity) $this->firstActivity->xmlSerialize(true, $sxe->addChild('firstActivity'));
        if (0 < count($this->activity)) {
            foreach($this->activity as $activity) {
                $activity->xmlSerialize(true, $sxe->addChild('activity'));
            }
        }
        if (0 < count($this->next)) {
            foreach($this->next as $next) {
                $next->xmlSerialize(true, $sxe->addChild('next'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}