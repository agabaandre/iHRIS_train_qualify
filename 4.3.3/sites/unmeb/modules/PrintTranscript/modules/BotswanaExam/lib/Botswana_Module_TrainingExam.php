<?php
/**
* © Copyright 2012 IntraHealth International, Inc.
* 
* This File is part of I2CE 
* 
* I2CE is free software; you can redistribute it and/or modify 
* it under the terms of the GNU General Public License as published by 
* the Free Software Foundation; either version 3 of the License, or
* (at your option) any later version.
* 
* This program is distributed in the hope that it will be useful, 
* but WITHOUT ANY WARRANTY; without even the implied warranty of 
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the 
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License 
* along with this program.  If not, see <http://www.gnu.org/licenses/>.
* @package Botswana
* @subpackage 
* @author Ally Shaban <allyshaban5@yahoo.com>
* @version v4.1.4.1
* @since v4.1.4.1
* @filesource 
*/ 
/** 
* Class Botswana_Modules_TrainingExam
* 
* @access public
*/


class Botswana_Module_TrainingExam  extends I2CE_Module {

    public static function getHooks() {
      return array(
        'validate_form_training_course_exam' => 'validate_form_training_course_exam',
                   );
    }
 
    /**
     * Validate the $form form.
     * @param I2CE_Form $form
     */


}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
