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
 * A person who is directly or indirectly involved in the provisioning of healthcare.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRPractitioner extends FHIRDomainResource implements JsonSerializable
{
    /**
     * An identifier that applies to this person in this role.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * Whether this practitioner's record is in active use.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public $active = null;

    /**
     * The name(s) associated with the practitioner.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRHumanName[]
     */
    public $name = array();

    /**
     * A contact detail for the practitioner, e.g. a telephone number or an email address.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRContactPoint[]
     */
    public $telecom = array();

    /**
     * Address(es) of the practitioner that are not role specific (typically home address). 
Work addresses are not typically entered in this property as they are usually role dependent.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRAddress[]
     */
    public $address = array();

    /**
     * Administrative Gender - the gender that the person is considered to have for administration and record keeping purposes.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRAdministrativeGender
     */
    public $gender = null;

    /**
     * The date of birth for the practitioner.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDate
     */
    public $birthDate = null;

    /**
     * Image of the person.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRAttachment[]
     */
    public $photo = array();

    /**
     * The list of roles/organizations that the practitioner is associated with.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRPractitioner\FHIRPractitionerRole[]
     */
    public $role = array();

    /**
     * Qualifications obtained by training and certification.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRPractitioner\FHIRPractitionerQualification[]
     */
    public $qualification = array();

    /**
     * A language the practitioner is able to use in patient communication.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public $communication = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'Practitioner';

    /**
     * An identifier that applies to this person in this role.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * An identifier that applies to this person in this role.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * Whether this practitioner's record is in active use.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Whether this practitioner's record is in active use.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBoolean $active
     * @return $this
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * The name(s) associated with the practitioner.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRHumanName[]
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * The name(s) associated with the practitioner.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRHumanName[] $name
     * @return $this
     */
    public function addName($name)
    {
        $this->name[] = $name;
        return $this;
    }

    /**
     * A contact detail for the practitioner, e.g. a telephone number or an email address.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRContactPoint[]
     */
    public function getTelecom()
    {
        return $this->telecom;
    }

    /**
     * A contact detail for the practitioner, e.g. a telephone number or an email address.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRContactPoint[] $telecom
     * @return $this
     */
    public function addTelecom($telecom)
    {
        $this->telecom[] = $telecom;
        return $this;
    }

    /**
     * Address(es) of the practitioner that are not role specific (typically home address). 
Work addresses are not typically entered in this property as they are usually role dependent.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRAddress[]
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Address(es) of the practitioner that are not role specific (typically home address). 
Work addresses are not typically entered in this property as they are usually role dependent.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRAddress[] $address
     * @return $this
     */
    public function addAddress($address)
    {
        $this->address[] = $address;
        return $this;
    }

    /**
     * Administrative Gender - the gender that the person is considered to have for administration and record keeping purposes.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRAdministrativeGender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Administrative Gender - the gender that the person is considered to have for administration and record keeping purposes.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRAdministrativeGender $gender
     * @return $this
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * The date of birth for the practitioner.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDate
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * The date of birth for the practitioner.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDate $birthDate
     * @return $this
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    /**
     * Image of the person.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRAttachment[]
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Image of the person.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRAttachment[] $photo
     * @return $this
     */
    public function addPhoto($photo)
    {
        $this->photo[] = $photo;
        return $this;
    }

    /**
     * The list of roles/organizations that the practitioner is associated with.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRPractitioner\FHIRPractitionerRole[]
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * The list of roles/organizations that the practitioner is associated with.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRPractitioner\FHIRPractitionerRole[] $role
     * @return $this
     */
    public function addRole($role)
    {
        $this->role[] = $role;
        return $this;
    }

    /**
     * Qualifications obtained by training and certification.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRPractitioner\FHIRPractitionerQualification[]
     */
    public function getQualification()
    {
        return $this->qualification;
    }

    /**
     * Qualifications obtained by training and certification.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRPractitioner\FHIRPractitionerQualification[] $qualification
     * @return $this
     */
    public function addQualification($qualification)
    {
        $this->qualification[] = $qualification;
        return $this;
    }

    /**
     * A language the practitioner is able to use in patient communication.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[]
     */
    public function getCommunication()
    {
        return $this->communication;
    }

    /**
     * A language the practitioner is able to use in patient communication.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept[] $communication
     * @return $this
     */
    public function addCommunication($communication)
    {
        $this->communication[] = $communication;
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
        if (0 < count($this->name)) {
            $json['name'] = array();
            foreach($this->name as $name) {
                $json['name'][] = $name->jsonSerialize();
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
        if (null !== $this->gender) $json['gender'] = $this->gender->jsonSerialize();
        if (null !== $this->birthDate) $json['birthDate'] = $this->birthDate->jsonSerialize();
        if (0 < count($this->photo)) {
            $json['photo'] = array();
            foreach($this->photo as $photo) {
                $json['photo'][] = $photo->jsonSerialize();
            }
        }
        if (0 < count($this->role)) {
            $json['role'] = array();
            foreach($this->role as $role) {
                $json['role'][] = $role->jsonSerialize();
            }
        }
        if (0 < count($this->qualification)) {
            $json['qualification'] = array();
            foreach($this->qualification as $qualification) {
                $json['qualification'][] = $qualification->jsonSerialize();
            }
        }
        if (0 < count($this->communication)) {
            $json['communication'] = array();
            foreach($this->communication as $communication) {
                $json['communication'][] = $communication->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<Practitioner xmlns="http://hl7.org/fhir"></Practitioner>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (null !== $this->active) $this->active->xmlSerialize(true, $sxe->addChild('active'));
        if (0 < count($this->name)) {
            foreach($this->name as $name) {
                $name->xmlSerialize(true, $sxe->addChild('name'));
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
        if (null !== $this->gender) $this->gender->xmlSerialize(true, $sxe->addChild('gender'));
        if (null !== $this->birthDate) $this->birthDate->xmlSerialize(true, $sxe->addChild('birthDate'));
        if (0 < count($this->photo)) {
            foreach($this->photo as $photo) {
                $photo->xmlSerialize(true, $sxe->addChild('photo'));
            }
        }
        if (0 < count($this->role)) {
            foreach($this->role as $role) {
                $role->xmlSerialize(true, $sxe->addChild('role'));
            }
        }
        if (0 < count($this->qualification)) {
            foreach($this->qualification as $qualification) {
                $qualification->xmlSerialize(true, $sxe->addChild('qualification'));
            }
        }
        if (0 < count($this->communication)) {
            foreach($this->communication as $communication) {
                $communication->xmlSerialize(true, $sxe->addChild('communication'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}