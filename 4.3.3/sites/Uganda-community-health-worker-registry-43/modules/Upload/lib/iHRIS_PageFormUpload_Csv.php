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
            $required_headers = array('National ID', 'Religion', 'Surname', 'Firstname', 'Othername', 'Gender', 'Birth Date', 'Marital Status', 'Position', 'Facility', 'Village Served', 'Recruitment Mechanism', 'Residence District', 'Home District', 'Date of Current Appointment', 'Date of First Appointment',  'Current Salary',  'Terms of Employment', 'Mobile Number', 'Telephone Number');
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
      

        $b_date = $this->current[$key]['row']['Birth Date'];
        $b_date = date('d/m/Y', strtotime($b_date));

        $us_date = $this->current[$key]['row']['Date of Current Appointment'];

        if (!empty($us_date)) {
            $us_date = $this->current[$key]['row']['Date of Current Appointment'];
        } else {
            $us_date = '01/01/2011';
        }


        $fs_date = date('d/m/Y', strtotime($us_date));


        $ud_date = $this->current[$key]['row']['Date of First Appointment'];
        if (!empty($ud_date)) {
            $ud_date = $this->current[$key]['row']['Date of First Appointment'];
        } else {
            $ud_date = '01/01/2011';
        }
        $fd_date = date('d/m/Y', strtotime($ud_date));
        $birth_date = $this->arrange_date($b_date);
        $start_date = $this->arrange_date($fs_date);
        $dofa_date = $this->arrange_date($fd_date);
        $district = $this->lookupList("district", $this->current[$key]['row']['Residence District'], 'name');
        $home_district = $this->lookupList("district", $this->current[$key]['row']['Home District'], 'name');
        $job = $this->lookupList("job", $this->current[$key]['row']['Position'], 'title');
        $facility = $this->lookupList("facility", $this->current[$key]['row']['Facility'], 'name');
        $village = $this->lookupList("village", $this->current[$key]['row']['Village Served'], 'name');
        $recruit_mech = $this->lookupList("recruit_mech", $this->current[$key]['row']['Recruitment Mechanism']);
        $employment_terms = $this->lookupList("employment_terms", $this->current[$key]['row']['Terms of Employment']);
        //$facility_office = $this->lookupList("facility_office", $this->current[$key]['row']['Facility Office']);
        $marital_status = $this->lookupList("marital_status", $this->current[$key]['row']['Marital Status']);
        $religion = $this->lookupList("religion", $this->current[$key]['row']['Religion']);


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
            $created = true;
            $person = $this->factory->createContainer("person");
            if ($this->current[$key]['row']['National ID']) {
                $person->getfield('national_id')->setFromDB($this->current[$key]['row']['National ID']);
            }
            $person->getfield('surname')->setFromDB($this->current[$key]['row']['Surname']);
            $person->getfield('firstname')->setFromDB($this->current[$key]['row']['Firstname']);
            $person->getfield('othername')->setFromDB($this->current[$key]['row']['Othername']);
            if (!empty($b_date)) :
                $person->getField('birth_date')->setFromDB($b_date);
            endif;
            $person->getField('residence')->setFromDB($district);
            $person->getField('home_district')->setFromDB($home_district);
            if (!empty($gender)) :
                $person->getField("gender")->setFromDB($gender);
            endif;
            if (!empty($marital_status)) {
                $person->getField("marital_status")->setFromDB('Single');
            } else {
                $person->getField("marital_status")->setFromDB($marital_status);
            }
            $person->getField("religion")->setFromDB($religion);
            $person->getField("mobile_phone")->setFromDB($this->current[$key]['row']['Mobile Number']);
            $person->getField("alt_telephone")->setFromDB($this->current[$key]['row']['Telephone Number']);
            $person->getField("birth_date")->setFromDB($birth_date);
             print_r($person);
            //$id$person->setParent($person_id);
            //$save = $person->save($this->user);

            // Now we create the position.
            $position = $this->factory->createContainer("position");
            $position->getField('job')->setFromDB($job);
            $position->getField('title')->setFromDB($this->current[$key]['row']['Position']);
            $position->getField('facility')->setFromDB($facility);
            $position->getField('status')->setFromDB('position_status|closed');
            $position->save($this->user);

            $person_position = $this->factory->createContainer("person_position");
            $person_position->setParent($person->getNameId());
            //$person_position->setParent($person_id);
            $person_position->getField("position")->setFromDB($position->getNameId());
            $person_position->getField("start_date")->setFromDB($start_date);
            $person_position->getField("dofa_date")->setFromDB($dofa_date);
            $person_position->getField("recruit_mech")->setFromDB($recruit_mech);
            if (!empty($employment_terms)) {
                $person_position->getField("employment_terms")->setFromDB($employment_terms);
            }
            $person_position->save($this->user);
            print_r($person_position);

            $person_position->save($this->user);
            if (!empty($start_date)) {
                $salary = $this->factory->createContainer("salary");
                $salary->setParent($person_position->getNameId());
                $salary->getField('start_date')->setFromDB($start_date);
                $salary->getField('salary')->setFromDB('currency|UGX=' . $Current_Salary);
                $salary->save($this->user);
            }

            $person_village = $this->factory->createContainer("person_village");
            //$person_position->setParent($person->getNameId());
            $person_village->setParent($person->getNameId());
            $person_village->getField("village")->setFromDB($village);
            $person_village->save($this->user);

            $person_money = $this->factory->createContainer("mobile_money");
            $person_position->setParent($person->getNameId());
            $person_money->setParent($person->getNameId());
            $person_money->getField("mobile_phone_type")->setFromDB('Feature (Non-Smart)');
            $person_money->getField("mobile_money_registration")->setFromDB($this->current[$key]['row']['Surname'] . ' ' . $this->current[$key]['row']['Firstname'] . $this->current[$key]['row']['Othername']);
            $person_money->getField("mobile_money_no")->setFromDB($this->current[$key]['row']['Mobile Number']);
            $person_money->save($this->user);


            // $person_money->cleanup();
            $person_village->cleanup();
            $position->cleanup();
            $salary->cleanup();
            $person->cleanup();
            unset($salary);
            unset($position);
            unset($person_village);
            unset($person_position);

            unset($person);
            return true;
        }
    }
}

# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
