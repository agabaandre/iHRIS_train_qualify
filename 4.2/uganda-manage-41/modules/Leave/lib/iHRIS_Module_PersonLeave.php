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
*
* @package ihris-common
* @author Sovello Hildebrand <sovellohpmgani@gmail.com>
* @version v3.2
* @since v3.2
* @filesource
*/
/**
* Class iHRIS_Module_PersonDemographic
*
* @access public
*/


class iHRIS_Module_PersonLeave extends I2CE_Module {
  
    public static function getMethods() {
        return array(
            'iHRIS_PageView->action_personleave' => 'action_personleave'
            );
    }
	/**
     * Return the array of hooks available in this module.
     * @return array
     */
    public static function getHooks() {
        return array(
                'validate_form_personleave' => 'validate_form_personleave',
               // 'form_post_save_personleave' => 'personleave_saved',
                );
    }
    

    public function action_personleave($page) {
        if (!$page instanceof iHRIS_PageView) {
            return false;
        }
        
        $person = $page->getPerson();
        if (!$person instanceof iHRIS_Person) {
            return false;
        }
        $template=$page->getTemplate();
        if (  ($lastLeave = $this->getLastLeave($person)) instanceof iHRIS_PersonLeave) {
            $person->addChildForm($lastLeave);
            $page->appendChildTemplate('personleave','siteContent');
        } else {
            $page->addLastChildForm('personleave','start_date', 'siteContent');
        }
        if (!array_key_exists('personleave',$person->children) || !is_array($person->children['personleave']) 
            || count($person->children['personleave']) != 1) {
            return true;
        }
        reset($person->children['personleave']);        
        $pers_leave = current($person->children['personleave']);        
        if ( !$pers_leave instanceof iHRIS_PersonLeave)  {
            return true;
        }
        
        
        //return $page->addChildForms('personleave', 'siteContent');
    }
    
    /**
     * Find and return the most recent leave taken by this person.
     * 
     * @return I2CE_Form or null
     */
    public function getLastLeave($person) {
        if (!$person instanceof iHRIS_Person) {
            return null;
        }
        $where = array(
            'operator'=>'FIELD_LIMIT',
            'field'=>'end_date',
            'style'=>'greaterthan_now',
			'data'=>array()
            );
        $per_leave_id = I2CE_FormStorage::search('personleave', $person->getNameId(),$where,'-start_date',1);
        if (!$per_leave_id) {
            return null;
        }
        $leave = I2CE_FormFactory::instance()->createContainer('personleave'.'|'.$per_leave_id);
        if (!$leave instanceof iHRIS_PersonLeave) {
            return null;
        }
        $leave->populate();
        return $leave;
    }
    
    
    
    /**
     * get the number of leave days taken for this specific leave
     * 
     */
    
    public function getLeaveLength( $leaveType ){
        $ff = I2CE_FormFactory::instance();
        $leaveTypeObj = $ff->createContainer($leaveType);
        $leaveTypeObj->populate();
        return $leaveTypeObj->getField('length')->getDBValue();
      }
    
    /**
     * Find and return the most recent position held by this person.
     * 
     * @return I2CE_Form or null
     */
    public function getFirstAppointmentDate($personId) {
        $where = array(
            'operator'=>'FIELD_LIMIT',
            'field'=>'parent',
            'style'=>'equals',
            'data'=>array(
                    'value' => $personId
                )
            );
            
        $start_dates = I2CE_FormStorage::listFields('person_position', array('start_date') ,$where,'start_date',1);
        if (!$start_dates) {
          return null;
        }
        $date = current($start_dates);
        return $date['start_date']; //1970-01-01 00:00:00
    }


    /**
     * retrieve all leaves taken by this person before
     */
    public function leaveDaysAlreadyTaken( $leaveType, $form ){
        $date = $this->getFirstAppointmentDate($form);
        //$timestamp = 
        $lastYear = date('Y') - 1;
        $leaveCycleStarts = $lastYear.'-'.substr($date,strpos($date,'-')+1,5).' 00:00:00'; //00-00, month-day
        $today = I2CE_Date::now();
        I2CE::raiseError($leaveCycleStarts);
        $leavetype = implode('|', $leaveType);
        $where = array(
            'operator'=>'AND',
              'operand'=>array(
                  0=>array(
                      'operator'=>'FIELD_LIMIT',
                      'field'=>'parent',
                      'style'=>'equals',
                      'data'=>array(
                          'value'=>$form
                          )
                      ),
                  1=>array(
                      'operator'=>'FIELD_LIMIT',
                      'field'=>'start_date',
                      'style'=>'greaterthan_equals',
                      'data'=>array(
                          'value'=> $leaveCycleStarts
                          )
                      ),
                  2=>array(
                        'operator'=>'FIELD_LIMIT',
                        'field'=>'person_leave_type',
                        'style'=>'equals',
                        'data'=>array(
                            'value' => $leavetype
                          )                            
                      )
                  )
            );
        
        $leavesTaken = I2CE_FormStorage::listFields('personleave', array('days_requested'), false, $where );
        return $leavesTaken;
      }
    
    /**
     * Checks to make sure the end date is after the start date for the person position.
     * @param I2CE_Form $form
     */
    public function validate_form_personleave( $form ) {
        if ( $form->start_date->isValid() && $form->end_date->isValid() ) {
            if ( $form->start_date->compare( $form->end_date ) < 1 ) {
                $form->setInvalidMessage('end_date','End date must be after start date');
            }
        }
        $this->getFirstAppointmentDate($form->getParent());
        $days = array();
        $days = $this->leaveDaysAlreadyTaken( $form->person_leave_type, $form->getParent() );
        $totalDays = 0;
        foreach($days as $id => $data){
            $totalDays += $data['days_requested'];
        }
        if ( I2CE_Validate::checkMap( $form->person_leave_type ) ) {
            $daysLeft = $this->getLeaveLength($form->getField("person_leave_type")->getDBValue()) - $totalDays;
           // I2CE::raiseError($daysLeft);
            if( ($form->days_requested) > ($daysLeft) ){
                $form->setInvalidMessage('days_requested', 'You only have '.$daysLeft.' days');
            }else{

	    $form->remaining_days = $daysLeft - $form->days_requested;

	    }
        }
    }
    
     /*/**
     * Call a alert after a form is saved.
     * @param array $form
     
    public function personleave_saved( $data ) {
		
		$form = $data['form'];
		$user = $data['user'];		
        $person = $form->getParent();
        
        $person_form = I2CE_FormFactory::instance();
        $personObj = $person_form->createContainer($person);
        $personObj->populate();
                  
        $message = $personObj->firstname . " " . $personObj->surname . " Requested leave. ";
        $link = 'http://localhost/iHRIS/nms/personleave?id=' . $form->getNameId().'&parent='. $person ;
        
        if ($form->getField("hod_recomm")->getDBValue() != 1 ){
        //Trying to get the id fo this person's position
        $where = array(
            'operator'=>'AND',
              'operand'=>array(
                  0=>array(
                      'operator'=>'FIELD_LIMIT',
                      'field'=>'parent',
                      'style'=>'equals',
                      'data'=>array(
                          'value'=>$person
                          )
                      ),
                  1=>array(
					  'operator'=>'OR',
					    'operand'=>array(
					       0=>array(
					       'operator'=>'FIELD_LIMIT',
						   'field'=>'end_date',
						   'style'=>'greaterthan_now'
							  ),
						  1=>array(
						  	'operator'=>'FIELD_LIMIT',
						  	'field'=>'end_date',
							'style'=>'null'
								  )
							)
					  )
			     )

            );
        $pers_pos =I2CE_FormStorage::search('person_position',$person,$where,array('-start_date'),1);
        //$pos_id = I2CE_FormStorage::listFields('person_position',array('position'),$where,array('-start_date'),1);
        
        $person_position_form = I2CE_FormFactory::instance();
        $person_positionObj = $person_position_form->createContainer("person_position|".$pers_pos);
        $person_positionObj->populate();
        $pos_id = $person_positionObj->getField("position")->getDBValue();
        
         //Trying to get the id of the person's department        
		$position_form = I2CE_FormFactory::instance();
        $positionObj = $position_form->createContainer($pos_id);
        $positionObj->populate();
        $department_id = $positionObj->getField("department")->getDBValue();
		
		
        /* need to get user with role|department_manager and access to thisparticular $department_id
        *  so that i send them an alert
        *  then after they have approved, i send an alert to the Head Of HR, and when he/she is done.
        *  i send a alert to Executive Director
        *
		$user_dep_where =
 			array(
 				'operator'=>'FIELD_LIMIT',
 				'field'=>'department',
 				'style'=>'equals',
 				'data'=>array(
 					'value'=> $department_id
 					)
 				);
 		$results  =  I2CE_FormStorage::listFields('access_department',array('parent'),false, $user_dep_where);
 		if( count($results) == 1 ) {
 		foreach ($results as $id=>&$data) {
                    $data = implode(', ', $data);
                    list( $fform, $username )= explode('|',$data);
                }
         }    
	} else If ($form->getField("hr_recomm")->getDBValue() != '1' && $form->getField("hod_recomm")->getDBValue() == '1' ){
			$hr_role_where =
 			array(
 				'operator'=>'FIELD_LIMIT',
 				'field'=>'role',
 				'style'=>'equals',
 				'data'=>array(
 					'value'=> 'role|hr_admin'
 					)
 				);
 		
 		$results =I2CE_FormStorage::listFields('user',array('username'),false,$hr_role_where);
        foreach ($results as $id=>&$data) {
                    $data = implode(', ', $data);
                    $username = $data;
                }
		} else if ( $form->getField("approval")->getDBValue() != '1' && $form->getField("hr_recomm")->getDBValue() == '1' ){
			$exec_role_where =
 			array(
 				'operator'=>'FIELD_LIMIT',
 				'field'=>'role',
 				'style'=>'equals',
 				'data'=>array(
 					'value'=> 'role|exec_director'
 					)
 				);
 		
 		$results =I2CE_FormStorage::listFields('user',array('username'),false,$exec_role_where);
 		foreach ($results as $id=>&$data) {
                    $data = implode(', ', $data);
                    $username = $data;
                }
		}

        $module_factory = I2CE_ModuleFactory::instance();
		if ( $module_factory->isEnabled("UserAlerts") ) {
			$alerts = $module_factory->getClass("UserAlerts");
			$alerts->sendUserAlert($username, 'notice',$message, $link, 'Leave request');
		} else {
			// Do something else since the module isn't enabled,or possibly just log it
			I2CE::raiseError( "Tried to send user alert, but the module isn't enabled.");
		}
    }*/

}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
