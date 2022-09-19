<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
/*
 * © Copyright 2012 IntraHealth International, Inc.
 * 
 * This File is part of iHRIS
 * 
 * iHRIS is free software; you can redistribute it and/or modify
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
 */

class iHRIS_PageFormUpload_Csv extends I2CE_PageFormCSV
{

    protected function validate()
    {
        if (!$this->checked_validation) {
            if (!$this->processHeaderRow('upload_csv')) {
                $this->userMessage("Unable to read headers from CSV file.");
                $this->invalid = true;
                return false;
            }
            //$required_headers = array( 'ID Number', 'Status', 'Date/Time', 'VerifyCode', 'CardNo' );
            //$required_headers = array( 'Surname', 'Firstname','Othername','Gender','Birth Date','Marital Status','Position','Facility','Residence District','Home District','File Number','Employee/IPPS Number','Date of Current Appointment','Date of First Appointment','DSC Minute','Current Salary','Facility Office','Terms of Employment','Telephone Number', 'Email Address' );
            $required_headers = array('National ID', 'Religion', 'Surname', 'Firstname', 'Othername', 'Gender', 'Birth Date', 'Marital Status', 'Position', 'Facility', 'Residence District', 'Home District', 'Date of Current Appointment', 'Date of First Appointment',  'Current Salary',  'Terms of Employment', 'Mobile Number', 'Telephone Number');
            $invalid_headers = array();
            foreach ($required_headers as $header) {
                if (!in_array($header, $this->current['upload_csv']['header'])) {
                    $invalid_headers[] = $header;
                }
            }
            if (count($invalid_headers) > 0) {
                $this->userMessage("There are missing headers in the CSV file:  " . implode(', ', $invalid_headers));
                $this->invalid = true;
                return false;
            }
            $this->checked_validation = true;
        }
        return true;
    }

    protected function validateRow($key)
    {
        // Don't perform any row level validation for now.
        return true;
    }


    protected function save()
    {
        if (parent::save()) {
            $this->userMessage("The CSV file has been uploaded.");
        } else {
            $this->userMessage("An error occurred trying to upload your file.");
        }
        $this->setRedirect("configure");
        return true;
    }

    protected function arrange_date($date)
    {
        //list( $date, $time ) = explode( ' ', $date_time );
        list($day, $month, $year) = explode('/', $date);
        return sprintf("%04d-%02d-%02d", $year, $month, $day);
    }


    protected function saveRow($key)
    {
        if (!$this->current[$key]['row']['Firstname'] && !$this->current[$key]['row']['Surname'] && !$this->current[$key]['row']['Position']) {
            $this->userMessage("Unable to add people without names and positions.");
            return false;
        }

        // First lookup the Position that was given.
        $job = $this->lookupList("job", $this->current[$key]['row']['Position'], 'title');

        if (!$job) {
            $this->userMessage("Unable to load row for: " . $this->current[$key]['row']['Position'] . " at "
                . $this->current[$key]['row']['Firstname'] . " " . $this->current[$key]['row']['Surname']);
            // Don't try to load this one, but continue.
            return true;
        }
        // Lookup the facility given.
        $facility = $this->lookupList("facility", $this->current[$key]['row']['Facility'], 'name');

        if (!$facility) {
            $this->userMessage("Unable to load row for: " . $this->current[$key]['row']['Facility'] . " at "
                . $this->current[$key]['row']['Firstname'] . " " . $this->current[$key]['row']['Surname']);
            // Don't try to load this one, but continue.
            return true;
        }


        //if (UGX is in string Current salary){

        //Split Current Salary remove UGX/-
        //Assign new value to $Current_Salary

        $Current_Salary = $this->current[$key]['row']['Current Salary'];

        if (strpos($Current_Salary, 'UGX') !== false) {
            $Current_Salary = substr($Current_Salary, 6);
        } else {
            // else{

            //Assign original Current Salary
            $Current_Salary = $this->current[$key]['row']['Current Salary'];
        }
        //Convert Date from 25 July 1975 to 25/06/1975 

        /*        
        $b_date = $this->current[$key]['row']['Birth Date'];
        if ( !$b_date && (strpos($b_date, '/') === false)){
        $b_date= date('d/m/Y',strtotime($b_date));     
        }  
	    
        $s_date = $this->current[$key]['row']['Date of Current Appointment'];
        if ( !$s_date && (strpos($s_date, '/') === false)){
        $s_date= date('d/m/Y',strtotime($s_date));
         }
     
        $d_date = $this->current[$key]['row']['Date of First Appointment'];
        if (!$d_date &&  (strpos($d_date, '/') === false)){
	    $d_date= date('d/m/Y',strtotime($d_date));
         }
        */

        $b_date = $this->current[$key]['row']['Birth Date'];
        $b_date = date('d/m/Y', strtotime($b_date));

        $s_date = $this->current[$key]['row']['Date of Current Appointment'];
        $s_date = date('d/m/Y', strtotime($s_date));

        $d_date = $this->current[$key]['row']['Date of First Appointment'];
        $d_date = date('d/m/Y', strtotime($d_date));

        $birth_date = $this->arrange_date($b_date);
        $start_date = $this->arrange_date($s_date);
        $dofa_date = $this->arrange_date($d_date);
        $district = $this->lookupList("district", $this->current[$key]['row']['Residence District'], 'name');
        $home_district = $this->lookupList("district", $this->current[$key]['row']['Home District'], 'name');
        $job = $this->lookupList("job", $this->current[$key]['row']['Position'], 'title');
        $facility = $this->lookupList("facility", $this->current[$key]['row']['Facility'], 'name');
        $employment_terms = $this->lookupList("employment_terms", $this->current[$key]['row']['Terms of Employment']);
        //$facility_office = $this->lookupList("facility_office", $this->current[$key]['row']['Facility Office']);
        $marital_status = $this->lookupList("marital_status", $this->current[$key]['row']['Marital Status']);
        $religion = $this->lookupList("religion", $this->current[$key]['row']['Relgion']);


        $gender = false;
        if (strtolower($this->current[$key]['row']['Gender'][0]) == 'm') {
            $gender = "gender|M";
        } elseif (strtolower($this->current[$key]['row']['Gender'][0]) == 'f') {
            $gender = "gender|F";
        }
        $created = false;
        $person_id = false;
        $demographic_id = false;




        if (!$person_id) {
            $find_pers = array(
                'operator' => 'AND',
                'operand' => array(

                    0 => array(
                        'operator' => 'FIELD_LIMIT',
                        'style' => 'lowerequals',
                        'field' => 'national_id',
                        'data' => array(
                            'value' => $this->current[$key]['row']['National ID'],
                        ),
                    ),
                ),
            );
            $person_id = I2CE_FormStorage::search("person", false, $find_pers, array(), true);
        }

        if ($person_id) {
            $person_id = "person|" . $person_id;
            $person = $this->factory->createContainer($person_id);
            $person->populate();

            $person->getField("residence")->setFromDB($district);
            $person->getField("home_district")->setFromDB($home_district);
            $person->getField("religion")->setFromDB($religion);
            $person->getField("religion")->setFromDB($gender);
            $person->getField("marital_status")->setFromDB($marital_status);
            $person->getField("mobile_phone")->setFromDB($this->current[$key]['row']['Mobile Number']);
            $person->getField("alt_telephone")->setFromDB($this->current[$key]['row']['Telephone Number']);


            $person->save($this->user);
            $person->cleanup();
            unset($person);
            //Terms of Employment
            if ($this->current[$key]['row']['Position']) {

                $where = array(
                    'operator' => 'AND',
                    'operand' => array(

                        0 => array(
                            'operator' => 'FIELD_LIMIT',
                            'style' => 'equals',
                            'field' => 'parent',
                            'data' => array(
                                'value' => $person_id,
                            ),
                        ),
                        1 => array(
                            'operator' => 'FIELD_LIMIT',
                            'field' => 'end_date',
                            'style' => 'null',
                            'data' => array()
                        ),

                    )
                );

                $person_position_form = $person->getChildIds('person_position', 'last_modified', $where, true);

                $person_position_id = $person_position_form[0];

                if ($person_position_id) {
                    //get position from person_position

                    $person_position = $this->factory->createContainer('person_position|' . $person_position_id);
                    $person_position->populate();

                    $existing_position = $person_position->getField('position')->getDBValue();
                    $existing_dofa_date = $person_position->getField('dofa_date')->getDBValue();
                    $existing_employment_terms = $person_position->getField('employment_terms')->getDBValue();
                    $existing_start_date = $person_position->getField('start_date')->getDBValue();

                    $position = $this->factory->createContainer($existing_position);
                    $position->populate();

                    $existing_job = $position->getField('job')->getDBValue();
                    $existing_title = $position->getField('title')->getDBValue();
                    $existing_facility = $position->getField('facility')->getDBValue();
                    // $existing_facility_office = $position->getField('facility_office')->getDBValue();
                    $existing_status = $position->getField('status')->getDBValue();


                    //compare job and facility with the ones under position

                    if ($existing_job == $job && $existing_facility == $facility) {

                        //if same
                        //update Date of First Appointment,Date of Current Appointment,Minute,Current Salary,Employement Terms

                        $person_position->getField('employment_terms')->setFromDB($employment_terms);
                        $person_position->getField('dofa_date')->setFromDB($dofa_date);
                        $person_position->getField('start_date')->setFromDB($start_date);

                        $person_position->save($this->user);
                        if ($Current_Salary) {
                            $where = array(
                                'operator' => 'AND',
                                'operand' => array(

                                    0 => array(
                                        'operator' => 'FIELD_LIMIT',
                                        'style' => 'equals',
                                        'field' => 'parent',
                                        'data' => array(
                                            'value' => $person_position->getNameID(),
                                        ),
                                    ),
                                )
                            );

                            $salary_form = $person_position->getChildIds('salary', 'last_modified', $where, true);
                            $salary_id = $salary_form[0];
                            if ($salary_id) {
                                $salary = $this->factory->createContainer("salary|" . $salary_id);
                                $salary->populate();
                            } else {
                                $salary = $this->factory->createContainer("salary");
                                $salary->setParent($person_position->getNameID());
                            }
                            $salary->getField('start_date')->setFromDB($start_date);
                            $salary->getField('salary')->setFromDB('currency|UGX=' . $Current_Salary);
                            $salary->save($this->user);
                            $salary->cleanup();
                            unset($salary);
                        }
                        $person_position->cleanup();
                        unset($person_position);
                    } else if ($existing_start_date > $start_date) {
                        //else if(import Date of Current Appointment < existing Date of Current Appointment)
                        //update job,department and facility for position

                        $position->getField('job')->setFromDB($job);
                        $position->title = $this->current[$key]['row']['Position'];
                        // $position->getField('facility_office')->setFromDB($facility_office);
                        $position->getField('facility')->setFromDB($facility);

                        $position->save($this->user);



                        //update DOFA,Date of Current Appointment,DSC Minute,Current Salary,Employement Terms for person position	
                        $person_position->getField('employment_terms')->setFromDB($employment_terms);

                        $person_position->getField('dofa_date')->setFromDB($dofa_date);
                        $person_position->getField('start_date')->setFromDB($start_date);

                        $person_position->save($this->user);
                        if ($Current_Salary) {
                            $where = array(
                                'operator' => 'AND',
                                'operand' => array(

                                    0 => array(
                                        'operator' => 'FIELD_LIMIT',
                                        'style' => 'equals',
                                        'field' => 'parent',
                                        'data' => array(
                                            'value' => $person_position->getNameID(),
                                        ),
                                    ),
                                )
                            );

                            $salary_form = $person_position->getChildIds('salary', 'last_modified', $where, true);
                            $salary_id = $salary_form[0];
                            if ($salary_id) {
                                $salary = $this->factory->createContainer("salary|" . $salary_id);
                                $salary->populate();
                            } else {
                                $salary = $this->factory->createContainer("salary");
                                $salary->setParent($person_position->getNameID());
                            }
                            $salary->getField('start_date')->setFromDB($start_date);
                            $salary->getField('salary')->setFromDB('currency|UGX=' . $Current_Salary);
                            $salary->save($this->user);
                            $salary->cleanup();
                            unset($salary);
                        }
                        $person_position->cleanup();
                        unset($person_position);

                        $position->cleanup();
                        unset($position);
                    } else {




                        //assign end date to person_position(one day less than import Date of Current Appointment)
                        $start_date = new DateTime($start_date);

                        $start_date = $start_date->format('Y-m-d');

                        $end_date = date('Y-m-d', strtotime($start_date . ' - 1 days'));



                        list($year, $month, $day) = explode('-', $end_date);

                        $new_end_date = sprintf("%04d-%02d-%02d", $year, $month, $day);

                        //$this->userMessage($new_end_date );

                        $person_position->getField('end_date')->setFromDB($new_end_date);

                        $person_position->save($this->user);

                        //discontinue current position (Status = discontinued)
                        $position->getField('status')->setFromDB('position_status|discontinued');
                        $position->save($this->user);

                        $person_position->cleanup();
                        unset($person_position);

                        $position->cleanup();
                        unset($position);


                        //Create new position and assign it
                        // Now we create the position.
                        $position = $this->factory->createContainer("position");

                        $position->getField('job')->setFromDB($job);
                        $position->title = $this->current[$key]['row']['Position'];
                        $position->getField('facility')->setFromDB($facility);
                        //$position->getField('facility_office')->setFromDB($facility_office);
                        // $position->getField('salary_grade')->setFromDB( $salary_grade_id );
                        $position->getField('status')->setFromDB('position_status|closed');

                        $position->save($this->user);
                        $person_position = $this->factory->createContainer("person_position");
                        $person_position->setParent($person_id);
                        $person_position->getField("position")->setFromDB($position->getNameId());
                        $person_position->getField("start_date")->setFromDB($start_date);
                        $person_position->getField("dofa_date")->setFromDB($dofa_date);
                        if ($employment_terms) {
                            $person_position->getField("employment_terms")->setFromDB($employment_terms);
                        }


                        $person_position->save($this->user);
                        if ($start_date) {
                            $salary = $this->factory->createContainer("salary");
                            $salary->setParent($person_position->getNameId());
                            $salary->getField('start_date')->setFromDB($start_date);
                            $salary->getField('salary')->setFromDB('currency|UGX=' . $Current_Salary);
                            $salary->save($this->user);
                            $salary->cleanup();
                            unset($salary);
                        }

                        $person_position->cleanup();
                        unset($person_position);

                        $position->cleanup();
                        unset($position);
                    }
                }
            }
        } else {
            $created = true;
            $person = $this->factory->createContainer("person");
            $person->getfield('national_id')->setFromDB($this->current[$key]['row']['National ID']);
            $person->getfield('surname')->setFromDB($this->current[$key]['row']['Surname']);
            $person->getfield('firstname')->setFromDB($this->current[$key]['row']['Firstname']);
            $person->getfield('othername')->setFromDB($this->current[$key]['row']['Othername']);
            $person->getField('birth_date')->setFromDB($b_date);
            $person->getField('residence')->setFromDB($district);
            $person->getField('home_district')->setFromDB($home_district);
            $person->getField("gender")->setFromDB($gender);
            $person->getField("marital_status")->setFromDB($marital_status);
            $person->getField("religion")->setFromDB($religion);
            $person->getField("mobile_phone")->setFromDB($this->current[$key]['row']['Mobile Number']);
            $person->getField("alt_telephone")->setFromDB($this->current[$key]['row']['Telephone Number']);
            $person->getField("birth_date")->setFromDB($birth_date);
            // print_r($person);
            // $person->setParent($person_id);
            $person->save($this->user);

            $person->cleanup();
            unset($person);
        }

        // Now we create the position.
        $position = $this->factory->createContainer("position");
        print_r($position);
        die;
        // $position->getField('job')->setFromDB($job);
        // $position->title = $this->current[$key]['row']['Position'];
        $position->getField('facility')->setFromDB($facility);
        // // $position->getField('facility_office')->setFromDB($facility_office);
        // // $position->getField('salary_grade')->setFromDB( $salary_grade_id );
        $position->getField('status')->setFromDB('position_status|closed');

        $position->save($this->user);
        $person_position = $this->factory->createContainer("person_position");
        $person_position->setParent($person_id);
        $person_position->getField("position")->setFromDB($position->getNameId());
        $person_position->getField("start_date")->setFromDB($start_date);
        $person_position->getField("dofa_date")->setFromDB($dofa_date);
        if ($employment_terms) {
            $person_position->getField("employment_terms")->setFromDB($employment_terms);
        }


        $person_position->save($this->user);
        if ($start_date) {
            $salary = $this->factory->createContainer("salary");
            $salary->setParent($person_position->getNameId());
            $salary->getField('start_date')->setFromDB($start_date);
            $salary->getField('salary')->setFromDB('currency|UGX=' . $Current_Salary);
            $salary->save($this->user);
            $salary->cleanup();
            unset($salary);
        }

        $person_position->cleanup();
        unset($person_position);

        $position->cleanup();
        unset($position);


        return true;
    }
}

# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
