<?php

/**
 * The best way to run this is:
 * php importCSV.php 2> convert.log
 * There's lots of notice messages you probably want to ignore for the most
 * part.
 * You'll need to change the include file to find the right config file
 * as well as the path to I2CE which may not work right using the one
 * from the config file.
 * The ID for the User object should be valid in your user table.
 * The $forms array is an associative array with the value being
 * an array of forms that are required for the given form to work e.g. 
 * region needs country first since it uses country as a map for a field.
 *
 * 
 *
 */

global $dictionary;
$dictionary = array();

$dictionary['gender'] = array( 'M' => 'Male', 'F' => 'Female' );

define( 'iHRIS_DEFAULT_COUNTRY', 'Uganda' );

define( 'iHRIS_NAME', 0 );
define( 'iHRIS_GENDER', 1 );
define( 'iHRIS_DATE_OF_BIRTH', 2 );
define( 'iHRIS_FACILITY', 3 );
define( 'iHRIS_FACILITY_TYPE', 4 );
define( 'iHRIS_FACILITY_OWNERSHIP', 5 );
define( 'iHRIS_FACILITY_PARISH', 6 );
define( 'iHRIS_FACILITY_DISTRICT', 8 );
//define( 'iHRIS_JOB', 4 );
//define( 'iHRIS_DATE_OF_APPT', 5 );
define( 'iHRIS_QUALIFICATION', 9 );
define( 'iHRIS_ACADEMIC_LEVEL', 10 );
//define( 'iHRIS_INSTITUTION', 7 );
//define( 'iHRIS_INSTITUTION_YEAR', 8 );
//define( 'iHRIS_ADDRESS', 9 );
//define( 'iHRIS_PHONE', 10);
//define( 'iHRIS_EMERGENCY_NAME', 11 );
//define( 'iHRIS_EMERGENCY_PHONE', 12 );
//define( 'iHRIS_MARITAL_STATUS', 13);
define( 'iHRIS_REG_INX_NO','');

$person_id_types = array( iHRIS_REG_INX_NO => 'Student Registration Number');

$i2ce_site_user_access_init = null;
$script = array_shift( $argv );
if (file_exists(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'pages/local' . DIRECTORY_SEPARATOR . 'config.values.php')) {
	require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'pages/local' . DIRECTORY_SEPARATOR . 'config.values.php');
} else {
	require_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'pages/config.values.php');
}

$i2ce_site_i2ce_path = "/var/lib/iHRIS/4.1.6.1/I2CE";

require_once ($i2ce_site_i2ce_path . DIRECTORY_SEPARATOR . 'I2CE_config.inc.php');

@I2CE::initializeDSN($i2ce_site_dsn,   $i2ce_site_user_access_init,    $i2ce_site_module_config);

unset($i2ce_site_user_access_init);
unset($i2ce_site_dsn);
unset($i2ce_site_i2ce_path);
unset($i2ce_site_module_config);


global $user;

$user = new I2CE_User(1, false, false, false);
$db = MDB2::singleton();
if ( PEAR::isError( $db ) ) {
	die( $db->getMessage() );
}
$form_factory = I2CE_FormFactory::instance();

echo "Memory Limit: " . ini_get( "memory_limit" ) . "\n";
echo "Execution Time: " . ini_get( "max_execution_time" ) . "\n";

if ( $argv[0] == "erase" ) {
    echo "Erasing all records and entries...";
    $db->query( "TRUNCATE TABLE record" );
    $db->query( "TRUNCATE TABLE entry" );
    $db->query( "TRUNCATE TABLE last_entry" );
    echo "Done\n";
    $tmp = array_shift( $argv );
}

function dotrim(&$value){
  $value = trim($value);
}

$fh = fopen( $argv[0], "r" );
if ( $fh === false ) {
    die( "Couldn't update file: $argv[0].  Syntax: importCSV.php [erase] file.csv\n" );
}

function find_district( $value ) {
    global $cache;
    if ( array_key_exists( 'district', $cache ) ) {
        foreach( $cache['district'] as $district => $id ) {
            if ( substr( $district, 0, strlen( $value )+1 ) == strtoupper( $value ) . ',' ) {
                return "district|$id";
            }
        }
    }
    return "";
}

function find_or_create( $value, $form, $fields=false, $do_create=false, $validate=false ) {
    global $user, $cache, $dictionary;
    if ( $value == "" ) return "";
    if ( array_key_exists( $form, $dictionary ) && array_key_exists( $value, $dictionary[$form] ) ) {
        $value = $dictionary[$form][$value];
    }
    if ( !array_key_exists( $form, $cache ) ) {
        $cache[$form] = array();
    }
    
    $is_valid = true;
    if ( !array_key_exists( $value, $cache[$form] ) ) {
        if ( $do_create ) {
            $obj = I2CE_FormFactory::instance()->createContainer( $form );
            if ( !$fields ) {
                $fields = array( 'name' => $value );
            } 
            foreach( $fields as $key => $val ) {
                $obj->getField($key)->setFromDB($val);
            }
            $obj->save( $user );
            echo "Creating new form ($form) " . $obj->getId() . " ";
            print_r( $fields );
            $cache[$form][$value] = $obj->getId();
            $obj->cleanup();
            unset( $obj );
        } else {
            if ( $validate ) {
                $is_valid = false;
            } else {
                die( "Invalid value for form: $form, value: $value.  Can't continue." );
            }
        }
    }
    if ( $validate ) {
        return $is_valid;
    } else {
        return $form . '|' . $cache[$form][$value];
    }
}

function arrange_date( $date ) {
    list( $day, $month, $year ) = explode( '/', $date );
    return sprintf( "%04d-%02d-%02d", $year, $month, $day );
}

function arrange_date2( $date ) {
    list( $year ) = explode( '/', $date );
    return sprintf( "%04d", $year);
}

function validate_date( $date ) {
    $date_arr = explode( '/', $date, 3 );
    if ( count($date_arr) == 3 ) {
        return checkdate( (int)$date_arr[1], (int)$date_arr[0], (int)$date_arr[2] );
    } else {
        return false;
    }
}
function arrange_date3( $day, $month, $year ) {
    if ( $year <= 20 ) $year += 2000;
    elseif ( $year <= 99 ) $year += 1900;
    return sprintf( "%04d-%02d-%02d", $year, $month, $day );
}

function rearrange($arr1){
    $arr2 = array();
    foreach(array_keys($arr1) as $k) {
        $id = explode( '|', $arr1[$k]['value'], 2 );
        $id2 = ($id[1]);
        $arr2[$id2] = &$arr1[$k]['display'];
    }
    return $arr2;
}


$cache = array();
//$cache['id_type'] = array_flip( rearrange(I2CE_List::listOptions( "id_type" )) );
$cache['gender'] = array_flip( rearrange(I2CE_List::listOptions( "gender" ) ));
$cache['district'] = array_flip( rearrange(I2CE_List::listOptions( "district" ) ));
$cache['health_facility'] = array_flip( rearrange(I2CE_List::listOptions( "health_facility" )) );
$cache['facility_type'] = array_flip( rearrange(I2CE_List::listOptions( "facility_type" )) );
$cache['facility_owner'] = array_flip( rearrange(I2CE_List::listOptions( "facility_owner" )) );
$cache['facility_type'] = array_flip( rearrange(I2CE_List::listOptions( "facility_type" )) );
//$cache['job'] = array_flip( rearrange(I2CE_List::listOptions( "job" ) ));
$cache['qualification'] = array_flip( rearrange(I2CE_List::listOptions( "qualification" )) );
$cache['academic_level'] = array_flip( rearrange(I2CE_List::listOptions( "academic_level" )) );

//$cache['marital_status'] = array_flip( rearrange(I2CE_List::listOptions( "marital_status" )) );
print_r($cache['health_facility']);
//exit;
$row = 0;
$errors = 0;
while ( ( $data = fgetcsv( $fh ) ) !== false ) {

    array_walk( $data, "dotrim" );
    $row++;
	/*
    if ( !find_or_create( $data[iHRIS_FACILITY], "health_facility", false, false, true ) ) {
        echo "Row $row: Facility is invalid: '" . $data[iHRIS_FACILITY] . "'\n";
        $errors++;
    }
    if ( !find_or_create( $data[iHRIS_JOB], "job", false, false, true ) ) {
        echo "Row $row: Job is invalid: '" . $data[iHRIS_JOB] . "'\n";
        $errors++;
    }*/
    if ( $data[iHRIS_GENDER] && !find_or_create( $data[iHRIS_GENDER], "gender", false, false, true ) ) {
        echo "Row $row: Gender is invalid: '" . $data[iHRIS_GENDER] . "'\n";
        $errors++;
    }
    /*if ( $data[iHRIS_QUALIFICATION] && !find_or_create( $data[iHRIS_QUALIFICATION], "qualification", false, false, true ) ) {
        echo "Row $row: Qualification is invalid: '" . $data[iHRIS_QUALIFICATION] . "'\n";
        $errors++;
    }*/
    if ( $data[iHRIS_DATE_OF_BIRTH] && !validate_date( $data[iHRIS_DATE_OF_BIRTH] ) ) {
        echo "Row $row: Date of bith is invalid: '" . $data[iHRIS_DATE_OF_BIRTH] . "'\n";
        $errors++;
    }/*
    if ( $data[iHRIS_DATE_OF_APPT] && !validate_date( $data[iHRIS_DATE_OF_APPT] ) ) {
        echo "Row $row: Date of appointment is invalid: '" . $data[iHRIS_DATE_OF_APPT] . "'\n";
        $errors++;
    }*/

}
fclose($fh);

if ( $errors > 0 ) {
    die( "There were errors in the import file.  Please add additional entries to the data dictionary or correct the data!" );
}



$fh = fopen( $argv[0], "r" );
if ( $fh === false ) {
    die( "Couldn't update file: $argv[0].  Syntax: importCSV.php [erase] file.csv\n" );
}
$row = 0;
$skip_no_post = 0;
while ( ( $data = fgetcsv( $fh ) ) !== false ) {

    array_walk( $data, "dotrim" );
    $row++;
    if( $data[iHRIS_NAME] == "" ) {
        echo "Couldn't do anything because there is no NAME!\n";
        $skip_no_post++;
        continue;
    }


    /* 
     * Create the person form and save it.
     */
    $person = $form_factory->createContainer( "person" );

    $names = split( ' ', $data[iHRIS_NAME], 3 );

    if (count($names) == 3 ) {

        $person->firstname = ucwords(strtolower($names[1]));
        $person->surname = ucwords(strtolower($names[0]));
        $person->othername = ucwords(strtolower($names[2]));

    } elseif (count($names) == 2 ) {

        $person->surname = ucwords(strtolower($names[0]));
        $person->firstname = ucwords(strtolower($names[1]));

        }else {
        $person->surname = ucwords(strtolower($names[0]));
    }
    
    $nationality_id = find_or_create( $data[iHRIS_DEFAULT_COUNTRY], "country" );

	$person->getField('nationality')->setFromDB($nationality_id);

	//$residence_district_id = find_district( $data[iHRIS_RESIDENCE_DISTRICT] );
	//$person->getField('residence')->setFromDB($residence_district_id);
    $person->save( $user );
    echo "Row $row; created " . $person->getId() . "\n";


    /*
     * Create the person id forms and save them.
    
     
    foreach ( $person_id_types as $csv_idx => $id_type ) {
        if( $data[$csv_idx] == '' ) {
            continue;
        }
        $id_type_id = find_or_create( $id_type, "id_type" );
        $person_id = $form_factory->createContainer( "person_id" );
        $person_id->setParent( $person->getNameId() );

        $person_id->getField( 'id_type' )->setFromDB( $id_type_id );
        $person_id->id_num = $data[ $csv_idx ];
        $person_id->save( $user );

        $person_id->cleanup();
        unset( $person_id );
    }*/


    /*
     * Create the demographic form and save it.
     */
    $demographic = $form_factory->createContainer( "demographic" );
    $demographic->setParent( $person->getNameId() );

    if ( $data[iHRIS_DATE_OF_BIRTH] ) {
        $demographic->getField('birth_date')->setFromDB( arrange_date( 
                    $data[iHRIS_DATE_OF_BIRTH] ) );
    }
    if ( $data[iHRIS_GENDER] ) {
        $gender_id = find_or_create( $data[iHRIS_GENDER], "gender" );
        $demographic->getField('gender')->setFromDB( $gender_id );
    }
    if ( $data[iHRIS_MARITAL_STATUS] ) {
        $marital_status_id = find_or_create( $data[iHRIS_MARITAL_STATUS], "marital_status" ,false, true);
        $demographic->getField('marital_status')->setFromDB( $marital_status_id );
    }
   
    $demographic->save( $user );
    $demographic->cleanup();
    unset( $demographic );

	if ( $data[iHRIS_FACILITY] != "" ){
		  if(!array_key_exists( "".ucwords(strtolower($data[iHRIS_FACILITY])), $cache['health_facility'] ) )
		     {
			    $facility_type_id = find_or_create( $data[iHRIS_FACILITY_TYPE], "facility_type", false, true );
			    $facility_owner_id = find_or_create( $data[iHRIS_FACILITY_OWNERSHIP], "facility_owner");
			    $district_id = find_district( $data[iHRIS_FACILITY_DISTRICT], "district" );
                $facility_id = find_or_create(("".ucwords(strtolower($data[iHRIS_FACILITY]))), "health_facility", array(
                            "name" => ucwords(strtolower($data[iHRIS_FACILITY])),
                            "facility_type" => $facility_type_id,
                            "location" => $district_id,
                            "facility_owner" => $facility_owner_id ), true );
			}else{
				$facility_id = find_or_create(("".ucwords(strtolower($data[iHRIS_FACILITY]))), "health_facility");
				}
		}
    //if ( $data[iHRIS_JOB] != "" || $data[iHRIS_FACILITY] != "" ) {
		if ($data[iHRIS_FACILITY] != "" ) {
    //$facility_id = find_or_create( $data[iHRIS_FACILITY], "health_facility" );
    //$job_id = find_or_create( $data[iHRIS_JOB], "job" );
    
    $position = $form_factory->createContainer( "train_position" );
    $position->setParent( $person->getNameId() );
    $position->getField("health_facility")->setFromDB($facility_id );
    //$position->getField("job")->setFromDB($job_id );
    //$start_date = arrange_date( $data[iHRIS_DATE_OF_APPT] );
    //$person_position->getField("start_date")->setFromDB( $start_date );
    $position->save( $user );
    $position->cleanup();
    unset( $position );
	}
	
    //setup the qualification for this person.
    //if ( $data[iHRIS_ACADEMIC_LEVEL] != "" || $data[iHRIS_QUALIFICATION] != "" ) {
		if ( $data[iHRIS_ACADEMIC_LEVEL] != "" || $data[iHRIS_QUALIFICATION] != "" ) {
        $academic_level_id = find_or_create( $data[iHRIS_ACADEMIC_LEVEL], "academic_level", false, true );
		$qualification_id = find_or_create( $data[iHRIS_QUALIFICATION], "qualification",false, true );
        $education = $form_factory->createContainer( "education");
        $education->setParent( $person->getNameId());
        //$education->school = ($data[iHRIS_INSTITUTION] ) ;
        $education->getField("academic_level")->setFromDB( $academic_level_id );
        $education->getField("qualification")->setFromDB( $qualification_id );
        //$education->getField("year")->setFromDB( arrange_date2($data[iHRIS_QUALIFICATION_YEAR]) );
        $education->save($user);        
        $education->cleanup();
        unset( $education );
        
    }
  
  //importing contact information
	if($data[iHRIS_ADDRESS] != "" || $data[iHRIS_PHONE] != "" )
		{
			$contact = $form_factory->createContainer("person_contact_personal");
			$contact->setParent( $person->getNameId() );
			$contact->address = ($data[iHRIS_ADDRESS] );
			$contact->telephone = ($data[iHRIS_PHONE] );
			$contact->save( $user );
			$contact->cleanup();
			unset( $contact );
		}
		
	//importing contact information
	if($data[iHRIS_EMERGENCY_NAME] != "" || $data[iHRIS_EMERGENCY_PHONE] != "" )
		{
			$contact = $form_factory->createContainer("person_contact_emergency");
			$contact->setParent( $person->getNameId() );
			$contact->name = ($data[iHRIS_NAME] );
			$contact->telephone = ($data[iHRIS_EMERGENCY_PHONE] );
			$contact->save( $user );
			$contact->cleanup();
			unset( $contact );
		}
		
    $person->cleanup();
    unset( $person );

}
fclose($fh);
echo "Skipped $skip_no_post people because of no position title.\n";

?>
