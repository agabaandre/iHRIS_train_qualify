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
 * Representation of the content produced in a DICOM imaging study. A study comprises a set of series, each of which includes a set of Service-Object Pair Instances (SOP Instances - images or other data) acquired or produced in a common context.  A series is of only one modality (e.g. X-ray, CT, MR, ultrasound), but a study may have multiple series of different modalities.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRImagingStudy extends FHIRDomainResource implements JsonSerializable
{
    /**
     * Formal identifier for the study.
     * @var \FHIR_STU_THREE\FHIRElement\FHIROid
     */
    public $uid = null;

    /**
     * Accession Number is an identifier related to some aspect of imaging workflow and data management. Usage may vary across different institutions.  See for instance [IHE Radiology Technical Framework Volume 1 Appendix A](http://www.ihe.net/uploadedFiles/Documents/Radiology/IHE_RAD_TF_Rev13.0_Vol1_FT_2014-07-30.pdf).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public $accession = null;

    /**
     * Other identifiers for the study.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * Availability of study (online, offline or nearline).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRInstanceAvailability
     */
    public $availability = null;

    /**
     * A list of all the Series.ImageModality values that are actual acquisition modalities, i.e. those in the DICOM Context Group 29 (value set OID 1.2.840.10008.6.1.19).
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCoding[]
     */
    public $modalityList = array();

    /**
     * The patient imaged in the study.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $patient = null;

    /**
     * The encounter at which the request is initiated.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $context = null;

    /**
     * Date and Time the study started.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public $started = null;

    /**
     * A list of the diagnostic requests that resulted in this imaging study being performed.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $basedOn = array();

    /**
     * The requesting/referring physician.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $referrer = null;

    /**
     * Who read the study and interpreted the images or other content.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $interpreter = null;

    /**
     * Methods of accessing  (e.g., retrieving, viewing) the study.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRImagingStudy\FHIRImagingStudyBaseLocation[]
     */
    public $baseLocation = array();

    /**
     * Number of Series in Study.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRUnsignedInt
     */
    public $numberOfSeries = null;

    /**
     * Number of SOP Instances in Study.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRUnsignedInt
     */
    public $numberOfInstances = null;

    /**
     * Type of procedure performed.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public $procedure = array();

    /**
     * Description of clinical codition indicating why the ImagingStudy was requested.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public $reason = null;

    /**
     * Institution-generated description or classification of the Study performed.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $description = null;

    /**
     * Each study has one or more series of images or other content.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRImagingStudy\FHIRImagingStudySeries[]
     */
    public $series = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'ImagingStudy';

    /**
     * Formal identifier for the study.
     * @return \FHIR_STU_THREE\FHIRElement\FHIROid
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Formal identifier for the study.
     * @param \FHIR_STU_THREE\FHIRElement\FHIROid $uid
     * @return $this
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * Accession Number is an identifier related to some aspect of imaging workflow and data management. Usage may vary across different institutions.  See for instance [IHE Radiology Technical Framework Volume 1 Appendix A](http://www.ihe.net/uploadedFiles/Documents/Radiology/IHE_RAD_TF_Rev13.0_Vol1_FT_2014-07-30.pdf).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier
     */
    public function getAccession()
    {
        return $this->accession;
    }

    /**
     * Accession Number is an identifier related to some aspect of imaging workflow and data management. Usage may vary across different institutions.  See for instance [IHE Radiology Technical Framework Volume 1 Appendix A](http://www.ihe.net/uploadedFiles/Documents/Radiology/IHE_RAD_TF_Rev13.0_Vol1_FT_2014-07-30.pdf).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier $accession
     * @return $this
     */
    public function setAccession($accession)
    {
        $this->accession = $accession;
        return $this;
    }

    /**
     * Other identifiers for the study.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Other identifiers for the study.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * Availability of study (online, offline or nearline).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRInstanceAvailability
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * Availability of study (online, offline or nearline).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRInstanceAvailability $availability
     * @return $this
     */
    public function setAvailability($availability)
    {
        $this->availability = $availability;
        return $this;
    }

    /**
     * A list of all the Series.ImageModality values that are actual acquisition modalities, i.e. those in the DICOM Context Group 29 (value set OID 1.2.840.10008.6.1.19).
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCoding[]
     */
    public function getModalityList()
    {
        return $this->modalityList;
    }

    /**
     * A list of all the Series.ImageModality values that are actual acquisition modalities, i.e. those in the DICOM Context Group 29 (value set OID 1.2.840.10008.6.1.19).
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCoding[] $modalityList
     * @return $this
     */
    public function addModalityList($modalityList)
    {
        $this->modalityList[] = $modalityList;
        return $this;
    }

    /**
     * The patient imaged in the study.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * The patient imaged in the study.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $patient
     * @return $this
     */
    public function setPatient($patient)
    {
        $this->patient = $patient;
        return $this;
    }

    /**
     * The encounter at which the request is initiated.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * The encounter at which the request is initiated.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $context
     * @return $this
     */
    public function setContext($context)
    {
        $this->context = $context;
        return $this;
    }

    /**
     * Date and Time the study started.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRDateTime
     */
    public function getStarted()
    {
        return $this->started;
    }

    /**
     * Date and Time the study started.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRDateTime $started
     * @return $this
     */
    public function setStarted($started)
    {
        $this->started = $started;
        return $this;
    }

    /**
     * A list of the diagnostic requests that resulted in this imaging study being performed.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getBasedOn()
    {
        return $this->basedOn;
    }

    /**
     * A list of the diagnostic requests that resulted in this imaging study being performed.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $basedOn
     * @return $this
     */
    public function addBasedOn($basedOn)
    {
        $this->basedOn[] = $basedOn;
        return $this;
    }

    /**
     * The requesting/referring physician.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getReferrer()
    {
        return $this->referrer;
    }

    /**
     * The requesting/referring physician.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $referrer
     * @return $this
     */
    public function setReferrer($referrer)
    {
        $this->referrer = $referrer;
        return $this;
    }

    /**
     * Who read the study and interpreted the images or other content.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getInterpreter()
    {
        return $this->interpreter;
    }

    /**
     * Who read the study and interpreted the images or other content.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $interpreter
     * @return $this
     */
    public function setInterpreter($interpreter)
    {
        $this->interpreter = $interpreter;
        return $this;
    }

    /**
     * Methods of accessing  (e.g., retrieving, viewing) the study.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRImagingStudy\FHIRImagingStudyBaseLocation[]
     */
    public function getBaseLocation()
    {
        return $this->baseLocation;
    }

    /**
     * Methods of accessing  (e.g., retrieving, viewing) the study.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRImagingStudy\FHIRImagingStudyBaseLocation[] $baseLocation
     * @return $this
     */
    public function addBaseLocation($baseLocation)
    {
        $this->baseLocation[] = $baseLocation;
        return $this;
    }

    /**
     * Number of Series in Study.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRUnsignedInt
     */
    public function getNumberOfSeries()
    {
        return $this->numberOfSeries;
    }

    /**
     * Number of Series in Study.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRUnsignedInt $numberOfSeries
     * @return $this
     */
    public function setNumberOfSeries($numberOfSeries)
    {
        $this->numberOfSeries = $numberOfSeries;
        return $this;
    }

    /**
     * Number of SOP Instances in Study.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRUnsignedInt
     */
    public function getNumberOfInstances()
    {
        return $this->numberOfInstances;
    }

    /**
     * Number of SOP Instances in Study.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRUnsignedInt $numberOfInstances
     * @return $this
     */
    public function setNumberOfInstances($numberOfInstances)
    {
        $this->numberOfInstances = $numberOfInstances;
        return $this;
    }

    /**
     * Type of procedure performed.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference[]
     */
    public function getProcedure()
    {
        return $this->procedure;
    }

    /**
     * Type of procedure performed.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference[] $procedure
     * @return $this
     */
    public function addProcedure($procedure)
    {
        $this->procedure[] = $procedure;
        return $this;
    }

    /**
     * Description of clinical codition indicating why the ImagingStudy was requested.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Description of clinical codition indicating why the ImagingStudy was requested.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRCodeableConcept $reason
     * @return $this
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
        return $this;
    }

    /**
     * Institution-generated description or classification of the Study performed.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Institution-generated description or classification of the Study performed.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Each study has one or more series of images or other content.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRImagingStudy\FHIRImagingStudySeries[]
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Each study has one or more series of images or other content.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRImagingStudy\FHIRImagingStudySeries[] $series
     * @return $this
     */
    public function addSeries($series)
    {
        $this->series[] = $series;
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
        if (null !== $this->uid) $json['uid'] = $this->uid->jsonSerialize();
        if (null !== $this->accession) $json['accession'] = $this->accession->jsonSerialize();
        if (0 < count($this->identifier)) {
            $json['identifier'] = array();
            foreach($this->identifier as $identifier) {
                $json['identifier'][] = $identifier->jsonSerialize();
            }
        }
        if (null !== $this->availability) $json['availability'] = $this->availability->jsonSerialize();
        if (0 < count($this->modalityList)) {
            $json['modalityList'] = array();
            foreach($this->modalityList as $modalityList) {
                $json['modalityList'][] = $modalityList->jsonSerialize();
            }
        }
        if (null !== $this->patient) $json['patient'] = $this->patient->jsonSerialize();
        if (null !== $this->context) $json['context'] = $this->context->jsonSerialize();
        if (null !== $this->started) $json['started'] = $this->started->jsonSerialize();
        if (0 < count($this->basedOn)) {
            $json['basedOn'] = array();
            foreach($this->basedOn as $basedOn) {
                $json['basedOn'][] = $basedOn->jsonSerialize();
            }
        }
        if (null !== $this->referrer) $json['referrer'] = $this->referrer->jsonSerialize();
        if (null !== $this->interpreter) $json['interpreter'] = $this->interpreter->jsonSerialize();
        if (0 < count($this->baseLocation)) {
            $json['baseLocation'] = array();
            foreach($this->baseLocation as $baseLocation) {
                $json['baseLocation'][] = $baseLocation->jsonSerialize();
            }
        }
        if (null !== $this->numberOfSeries) $json['numberOfSeries'] = $this->numberOfSeries->jsonSerialize();
        if (null !== $this->numberOfInstances) $json['numberOfInstances'] = $this->numberOfInstances->jsonSerialize();
        if (0 < count($this->procedure)) {
            $json['procedure'] = array();
            foreach($this->procedure as $procedure) {
                $json['procedure'][] = $procedure->jsonSerialize();
            }
        }
        if (null !== $this->reason) $json['reason'] = $this->reason->jsonSerialize();
        if (null !== $this->description) $json['description'] = $this->description->jsonSerialize();
        if (0 < count($this->series)) {
            $json['series'] = array();
            foreach($this->series as $series) {
                $json['series'][] = $series->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ImagingStudy xmlns="http://hl7.org/fhir"></ImagingStudy>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->uid) $this->uid->xmlSerialize(true, $sxe->addChild('uid'));
        if (null !== $this->accession) $this->accession->xmlSerialize(true, $sxe->addChild('accession'));
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (null !== $this->availability) $this->availability->xmlSerialize(true, $sxe->addChild('availability'));
        if (0 < count($this->modalityList)) {
            foreach($this->modalityList as $modalityList) {
                $modalityList->xmlSerialize(true, $sxe->addChild('modalityList'));
            }
        }
        if (null !== $this->patient) $this->patient->xmlSerialize(true, $sxe->addChild('patient'));
        if (null !== $this->context) $this->context->xmlSerialize(true, $sxe->addChild('context'));
        if (null !== $this->started) $this->started->xmlSerialize(true, $sxe->addChild('started'));
        if (0 < count($this->basedOn)) {
            foreach($this->basedOn as $basedOn) {
                $basedOn->xmlSerialize(true, $sxe->addChild('basedOn'));
            }
        }
        if (null !== $this->referrer) $this->referrer->xmlSerialize(true, $sxe->addChild('referrer'));
        if (null !== $this->interpreter) $this->interpreter->xmlSerialize(true, $sxe->addChild('interpreter'));
        if (0 < count($this->baseLocation)) {
            foreach($this->baseLocation as $baseLocation) {
                $baseLocation->xmlSerialize(true, $sxe->addChild('baseLocation'));
            }
        }
        if (null !== $this->numberOfSeries) $this->numberOfSeries->xmlSerialize(true, $sxe->addChild('numberOfSeries'));
        if (null !== $this->numberOfInstances) $this->numberOfInstances->xmlSerialize(true, $sxe->addChild('numberOfInstances'));
        if (0 < count($this->procedure)) {
            foreach($this->procedure as $procedure) {
                $procedure->xmlSerialize(true, $sxe->addChild('procedure'));
            }
        }
        if (null !== $this->reason) $this->reason->xmlSerialize(true, $sxe->addChild('reason'));
        if (null !== $this->description) $this->description->xmlSerialize(true, $sxe->addChild('description'));
        if (0 < count($this->series)) {
            foreach($this->series as $series) {
                $series->xmlSerialize(true, $sxe->addChild('series'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}