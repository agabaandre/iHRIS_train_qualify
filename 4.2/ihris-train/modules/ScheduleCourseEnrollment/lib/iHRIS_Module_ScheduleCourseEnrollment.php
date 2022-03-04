<?php
/**
* © Copyright 2009 IntraHealth International, Inc.
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
* @package iHRIS
* @author Ally Shaban <allyshaban5@gmail.com>
* @version v3.2.2
* @since v3.2.2
* @filesource 
*/ 
/** 
* Class iHRIS_Module_ScheduleCourseEnrollment
* 
* @access public
*/


class iHRIS_Module_ScheduleCourseEnrollment extends I2CE_Module {
    
    public static function getHooks() {
        return array(
'validate_form_schedule_course_enrollment'=>'validate_form_schedule_course_enrollment'
                );
    }
    
    public function validate_form_schedule_course_enrollment($form)
    {
       if ( $form->end_date->before( $form->start_date ) ) {
            $form->setInvalidMessage('end_date','End Date Should Be After Start Date');
            $form->setInvalidMessage('start_date','Start Date Should Be Before End Date');
        }    	
    }
}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
