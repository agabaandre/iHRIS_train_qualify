<?php namespace FHIR_STU_THREE\FHIRResource\FHIRClaim;

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
 * A provider issued list of services and products provided, or to be provided, to a patient which is provided to an insurer for payment recovery.
 */
class FHIRClaimCareTeam extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * Member of the team who provided the overall service. (choose any one of provider*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $providerIdentifier = null;

    /**
     * Member of the team who provided the overall service. (choose any one of provider*, but only one)
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $providerReference = null;

    /**
     * The party who is billing and responsible for the claimed good or service rendered to the patient.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public $responsible = null;

    /**
     * The lead, assisting or supervising practitioner and their discipline if a multidisiplinary team.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $role = null;

    /**
     * The qualification which is applicable for this service.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public $qualification = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'Claim.CareTeam';

    /**
     * Member of the team who provided the overall service. (choose any one of provider*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getProviderIdentifier()
    {
        return $this->providerIdentifier;
    }

    /**
     * Member of the team who provided the overall service. (choose any one of provider*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $providerIdentifier
     * @return $this
     */
    public function setProviderIdentifier($providerIdentifier)
    {
        $this->providerIdentifier = $providerIdentifier;
        return $this;
    }

    /**
     * Member of the team who provided the overall service. (choose any one of provider*, but only one)
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getProviderReference()
    {
        return $this->providerReference;
    }

    /**
     * Member of the team who provided the overall service. (choose any one of provider*, but only one)
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $providerReference
     * @return $this
     */
    public function setProviderReference($providerReference)
    {
        $this->providerReference = $providerReference;
        return $this;
    }

    /**
     * The party who is billing and responsible for the claimed good or service rendered to the patient.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRBoolean
     */
    public function getResponsible()
    {
        return $this->responsible;
    }

    /**
     * The party who is billing and responsible for the claimed good or service rendered to the patient.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRBoolean $responsible
     * @return $this
     */
    public function setResponsible($responsible)
    {
        $this->responsible = $responsible;
        return $this;
    }

    /**
     * The lead, assisting or supervising practitioner and their discipline if a multidisiplinary team.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * The lead, assisting or supervising practitioner and their discipline if a multidisiplinary team.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $role
     * @return $this
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    /**
     * The qualification which is applicable for this service.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding
     */
    public function getQualification()
    {
        return $this->qualification;
    }

    /**
     * The qualification which is applicable for this service.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding $qualification
     * @return $this
     */
    public function setQualification($qualification)
    {
        $this->qualification = $qualification;
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
        if (null !== $this->providerIdentifier) $json['providerIdentifier'] = $this->providerIdentifier->jsonSerialize();
        if (null !== $this->providerReference) $json['providerReference'] = $this->providerReference->jsonSerialize();
        if (null !== $this->responsible) $json['responsible'] = $this->responsible->jsonSerialize();
        if (null !== $this->role) $json['role'] = $this->role->jsonSerialize();
        if (null !== $this->qualification) $json['qualification'] = $this->qualification->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ClaimCareTeam xmlns="http://hl7.org/fhir"></ClaimCareTeam>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->providerIdentifier) $this->providerIdentifier->xmlSerialize(true, $sxe->addChild('providerIdentifier'));
        if (null !== $this->providerReference) $this->providerReference->xmlSerialize(true, $sxe->addChild('providerReference'));
        if (null !== $this->responsible) $this->responsible->xmlSerialize(true, $sxe->addChild('responsible'));
        if (null !== $this->role) $this->role->xmlSerialize(true, $sxe->addChild('role'));
        if (null !== $this->qualification) $this->qualification->xmlSerialize(true, $sxe->addChild('qualification'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}