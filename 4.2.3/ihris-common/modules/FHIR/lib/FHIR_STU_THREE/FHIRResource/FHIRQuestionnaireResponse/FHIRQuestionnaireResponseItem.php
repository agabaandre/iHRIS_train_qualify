<?php namespace FHIR_STU_THREE\FHIRResource\FHIRQuestionnaireResponse;

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
 * A structured set of questions and their answers. The questions are ordered and grouped into coherent subsets, corresponding to the structure of the grouping of the underlying questions.
 */
class FHIRQuestionnaireResponseItem extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * Identifies the item from the Questionnaire that corresponds to this item in the QuestionnaireResponse resource.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $linkId = null;

    /**
     * Text that is displayed above the contents of the group or as the text of the question being answered.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public $text = null;

    /**
     * More specific subject this section's answers are about, details the subject given in QuestionnaireResponse.
     * @var \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public $subject = null;

    /**
     * The respondent's answer(s) to the question.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRQuestionnaireResponse\FHIRQuestionnaireResponseAnswer[]
     */
    public $answer = array();

    /**
     * Questions or sub-groups nested beneath a question or group.
     * @var \FHIR_STU_THREE\FHIRResource\FHIRQuestionnaireResponse\FHIRQuestionnaireResponseItem[]
     */
    public $item = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'QuestionnaireResponse.Item';

    /**
     * Identifies the item from the Questionnaire that corresponds to this item in the QuestionnaireResponse resource.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getLinkId()
    {
        return $this->linkId;
    }

    /**
     * Identifies the item from the Questionnaire that corresponds to this item in the QuestionnaireResponse resource.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $linkId
     * @return $this
     */
    public function setLinkId($linkId)
    {
        $this->linkId = $linkId;
        return $this;
    }

    /**
     * Text that is displayed above the contents of the group or as the text of the question being answered.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRString
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Text that is displayed above the contents of the group or as the text of the question being answered.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRString $text
     * @return $this
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * More specific subject this section's answers are about, details the subject given in QuestionnaireResponse.
     * @return \FHIR_STU_THREE\FHIRElement\FHIRReference
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * More specific subject this section's answers are about, details the subject given in QuestionnaireResponse.
     * @param \FHIR_STU_THREE\FHIRElement\FHIRReference $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * The respondent's answer(s) to the question.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRQuestionnaireResponse\FHIRQuestionnaireResponseAnswer[]
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * The respondent's answer(s) to the question.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRQuestionnaireResponse\FHIRQuestionnaireResponseAnswer[] $answer
     * @return $this
     */
    public function addAnswer($answer)
    {
        $this->answer[] = $answer;
        return $this;
    }

    /**
     * Questions or sub-groups nested beneath a question or group.
     * @return \FHIR_STU_THREE\FHIRResource\FHIRQuestionnaireResponse\FHIRQuestionnaireResponseItem[]
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Questions or sub-groups nested beneath a question or group.
     * @param \FHIR_STU_THREE\FHIRResource\FHIRQuestionnaireResponse\FHIRQuestionnaireResponseItem[] $item
     * @return $this
     */
    public function addItem($item)
    {
        $this->item[] = $item;
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
        if (null !== $this->linkId) $json['linkId'] = $this->linkId->jsonSerialize();
        if (null !== $this->text) $json['text'] = $this->text->jsonSerialize();
        if (null !== $this->subject) $json['subject'] = $this->subject->jsonSerialize();
        if (0 < count($this->answer)) {
            $json['answer'] = array();
            foreach($this->answer as $answer) {
                $json['answer'][] = $answer->jsonSerialize();
            }
        }
        if (0 < count($this->item)) {
            $json['item'] = array();
            foreach($this->item as $item) {
                $json['item'][] = $item->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<QuestionnaireResponseItem xmlns="http://hl7.org/fhir"></QuestionnaireResponseItem>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->linkId) $this->linkId->xmlSerialize(true, $sxe->addChild('linkId'));
        if (null !== $this->text) $this->text->xmlSerialize(true, $sxe->addChild('text'));
        if (null !== $this->subject) $this->subject->xmlSerialize(true, $sxe->addChild('subject'));
        if (0 < count($this->answer)) {
            foreach($this->answer as $answer) {
                $answer->xmlSerialize(true, $sxe->addChild('answer'));
            }
        }
        if (0 < count($this->item)) {
            foreach($this->item as $item) {
                $item->xmlSerialize(true, $sxe->addChild('item'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}