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


define( 'iHRIS_TRAINING_SCHOOL', 0 );
define( 'iHRIS_OWNERSHIP', 2 );
define( 'iHRIS_ADDRESS', 3 );
define( 'iHRIS_TRAINING', 5 );
define( 'iHRIS_CODE', 4 );
//define( 'iHRIS_LEVEL', 3 );
define( 'iHRIS_START_DATE', 6 );
define( 'iHRIS_END_DATE', 7);

$i2ce_site_user_access_init = null;
$script = array_shift( $argv );
if (file_exists(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'pages/local' . DIRECTORY_SEPARATOR . 'config.values.php')) {
	require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'pages/local' . DIRECTORY_SEPARATOR . 'config.values.php');
} else {
	require_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'pages/config.values.php');
}

$i2ce_site_i2ce_path = "/var/lib/iHRIS/4.1.6.2/I2CE";

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
$cache['training_type'] = array_flip( rearrange(I2CE_List::listOptions( "training_type" ) ));
$cache['training'] = array_flip( rearrange(I2CE_List::listOptions( "training" )) );
$cache['ownership'] = array_flip( rearrange(I2CE_List::listOptions( "ownership" )) );
//$cache['provider_instance'] = array_flip( rearrange(I2CE_List::listOptions( "provider_instance" )) );
$cache['providertraining'] = array_flip( rearrange(I2CE_List::listOptions( "providertraining" )) );
$cache['trainingprovider'] = array_flip( rearrange(I2CE_List::listOptions( "trainingprovider" )) );
//print_r($cache['trainingprovider']);
//print_r($cache['providertraining']);
//print_r($cache['training']);

$row = 0;
$errors = 0;
while ( ( $data = fgetcsv( $fh ) ) !== false ) {

    array_walk( $data, "dotrim" );
    $row++;
	
    if ( $data[iHRIS_START_DATE] && !validate_date( $data[iHRIS_START_DATE] ) ) {
        echo "Row $row: START DATE is invalid: '" . $data[iHRIS_START_DATE] . "'\n";
        $errors++;
    }
    if ( $data[iHRIS_END_DATE] && !validate_date( $data[iHRIS_END_DATE] ) ) {
        echo "Row $row: END DATE is invalid: '" . $data[iHRIS_END_DATE] . "'\n";
        $errors++;
    }

}
fclose($fh);

if ( $errors > 0 ) {
    die( "There were errors in the import file.  Please add additional entries to the data dictionary or correct the data!" );
}


//$person->getId()
		
$fh = fopen( $argv[0], "r" );
if ( $fh === false ) {
    die( "Couldn't update file: $argv[0].  Syntax: importCSV.php file.csv\n" );
}
$row = 0;
$skip_no_post = 0;
while ( ( $data = fgetcsv( $fh ) ) !== false ) {

    array_walk( $data, "dotrim" );
    $row++;
    if( $data[iHRIS_TRAINING] == "" ) {
        echo "Couldn't do anything because there is no COURSE!\n";
        $skip_no_post++;
        continue;
    }


	if ( $data[iHRIS_TRAINING] != "" && $data[iHRIS_TRAINING_SCHOOL] != "" ){
		  if(!array_key_exists( ucwords(strtolower($data[iHRIS_TRAINING_SCHOOL])), $cache['trainingprovider'] ) )
				{
				$ownership_id = find_or_create((($data[iHRIS_OWNERSHIP]))), "ownership",false,true);
			    $trainingprovider_id = find_or_create($data[iHRIS_TRAINING_SCHOOL]), "trainingprovider",array(
                            "name" => $data[iHRIS_TRAINING_SCHOOL]),
                            "trainingprovider_type" => "trainingprovider_type|training_institution",
                            "ownership" => $ownership_id,
                            "address" => $data[iHRIS_ADDRESS] ), true );
			}else{
				$trainingprovider_id = find_or_create(ucwords(strtolower($data[iHRIS_TRAINING_SCHOOL])), "trainingprovider");
				}
				
		  if(!array_key_exists( "".ucwords(strtolower($data[iHRIS_TRAINING])), $cache['training'] ) )
		     {	//$academic_level_id = find_or_create(("".ucwords(strtolower($data[iHRIS_LEVEL]))), "academic_level",false,true);
			    $training_id = find_or_create("".ucwords(strtolower($data[iHRIS_TRAINING])), "training",array(
                            "name" => ucwords(strtolower($data[iHRIS_TRAINING])),
                            //"academic_level" => $academic_level_id,
                            "code" => $data[iHRIS_CODE],
                            "training_type" => "training_type|pre_service" ), true );
			}else{
				$training_id = find_or_create(("".ucwords(strtolower($data[iHRIS_TRAINING]))), "training");
				}
				
				if(!array_key_exists( ($data[iHRIS_TRAINING_SCHOOL]." - ".ucwords(strtolower($data[iHRIS_TRAINING]))), $cache['providertraining'] ) )
					{
			    $providertraining_id = find_or_create(($data[iHRIS_TRAINING_SCHOOL]." - ".ucwords(strtolower($data[iHRIS_TRAINING]))), "providertraining",array(
                            "trainingprovider" => $trainingprovider_id,
                            "training" => $training_id ), true );
			}else{
				$providertraining_id = find_or_create(($data[iHRIS_TRAINING_SCHOOL]." - ".ucwords(strtolower($data[iHRIS_TRAINING]))), "providertraining");
				}
		}
	/*	
	if ( $data[iHRIS_SPONSOR] != "" ){
			if(!array_key_exists( "".ucwords(strtolower($data[iHRIS_SPONSOR])), $cache['funder'] ) ){
			 $funder_id = find_or_create("".ucwords(strtolower($data[iHRIS_SPONSOR])), "funder",false, true );
		}else{
			$funder_id = find_or_create("".ucwords(strtolower($data[iHRIS_SPONSOR])), "funder");
		}
	}*/
	$trainingprovider = $form_factory->createContainer( $trainingprovider_id );
	$trainingprovider->populate();
	$trainingprovider->save($user);
	
	if ( $data[iHRIS_TRAINING] != ""){
		
    $start_date = arrange_date( $data[iHRIS_START_DATE] );
    $end_date = arrange_date( $data[iHRIS_END_DATE] );
    
    $provider_instance = $form_factory->createContainer( "provider_instance" );
    $provider_instance->setParent( $trainingprovider->getNameId() );
    $provider_instance->getField("providertraining")->setFromDB($providertraining_id );
    $provider_instance->getField("start_date")->setFromDB( $start_date );
    $provider_instance->getField("end_date")->setFromDB( $end_date );
   // $provider_instance->set = $data[iHRIS_SET];
    $provider_instance->location = $data[iHRIS_TRAINING_SCHOOL]);
    $provider_instance->save( $user );
    
    echo "Row $row; created " . $provider_instance->getId() . "\n";
    
    $provider_instance->cleanup();
    unset( $provider_instance );
    }
    
}
fclose($fh);
echo "Skipped $skip_no_post people because of no position title.\n";

$trainingprovider->cleanup();
unset( $trainingprovider );

?>
