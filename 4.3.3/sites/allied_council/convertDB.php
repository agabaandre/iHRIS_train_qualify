<?php

/**
 * The best way to run this is:
 * php convertDB.php 2> convert.log
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
 * Country needs to load from country.csv in the current directory.  The format is:
 * "Country Name", "Alpha Two Code", "Country ISO Code", "Flag for Primary Country", "Flag for Location Country"
 *
 * District will be loaded from the import table and be assigned to the country with ISO code 800 (Uganda);
 * Regions and Districts (and Counties) can be preloaded by CSV with a few changes if the files exist.
 *
 * The import table should have the following fields.  Some can be optional or not there.  The part on the right
 * is the form and field where that data will be saved.  Once saved to the database, other form fields may refer to 
 * the new form id internally.
 * 
 *
 */

$script = array_shift( $argv );
if (file_exists(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'pages/local' . DIRECTORY_SEPARATOR . 'config.values.php')) {
	require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'pages/local' . DIRECTORY_SEPARATOR . 'config.values.php');
} else {
	require_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'pages/config.values.php');
}

$i2ce_site_i2ce_path = "/var/lib/iHRIS/4.0.8/sites/AHPC/modules/I2CE";

require_once ($i2ce_site_i2ce_path . DIRECTORY_SEPARATOR . 'I2CE_config.inc.php');

$i2ce_site_database_user = 'qualify';
$i2ce_site_database_password = 'qualify';
$i2ce_site_database = '408_AHPCQualify';
$i2ce_site_user_database = '';
$i2ce_site_module_config = '/var/lib/iHRIS/4.0.8/sites/AHPC/iHRIS-Qualify-Demo.xml';	

I2CE::initialize(
	$i2ce_site_database_user,
	$i2ce_site_database_password,
	$i2ce_site_database,
	$i2ce_site_user_database,
	$i2ce_site_module_config		      
);

global $convert_db, $maps, $forms, $user, $db, $form_factory, $import_table, $default_country_code;

$import_table = "import";
$default_country_code = 800;

$maps = array();
$user = new I2CE_User(1, false, false, false);
$db = MDB2::singleton();
if ( PEAR::isError( $db ) ) {
	die( $db->getMessage() );
}
$form_factory = I2CE_FormFactory::instance();

$forms = array(
    "country" => array(),
    "district" => array( "country" ),
    "currency" => array( "country" ),
    "staff" => array( "district"),
);

echo "Memory Limit: " . ini_get( "memory_limit" ) . "\n";
echo "Execution Time: " . ini_get( "max_execution_time" ) . "\n";

$cache_filename = "convert_maps.save";

if ( file_exists( $cache_filename ) ) {
    echo "Reading saved maps file...";
    $cache_file = fopen( $cache_filename, "r" );
    $cache_content = fread( $cache_file, filesize( $cache_filename ) );
    fclose( $cache_file );

    $maps = unserialize( $cache_content );
    echo "Done.\n";
}

if ( $argv[0] == "erase" ) {
    echo "Erasing all records and entries and map cache...";
    $db->query( "TRUNCATE TABLE record" );
    $db->query( "TRUNCATE TABLE entry" );
    $db->query( "TRUNCATE TABLE last_entry" );
    echo "Done\n";
    echo "Erasing formsData from Magic Data...";
    foreach( array("country", "region", "district",
                "training_institution","training_program", "facility_agent",
                "qualification","cadre", "facility_status", "facility_type","health_facility" ) as $form ) {
        echo "$form...";
        // This is the "correct" way to do this, but very slow...
    	  //I2CE::getConfig()->I2CE->formsData->forms->$form->eraseChildren();
        // This is the faster more dangerous way to do this...
        // You must make sure to erase the APC user data or you 
        // will get very strange results when accessing the site after
        // running this script.
        
        
        $db->query( "DELETE FROM config_alt WHERE path_hash LIKE md5('config:I2CE/formsData/forms/$form)" );
        
        
    }
    echo "Done\n";
    $maps = array();
    $tmp = array_shift( $argv );
}

if ( $argv[0] == "all" ) {
    $form_list = array_keys( $forms );
} else {
    $form_list = $argv;
}

foreach( $form_list as $form ) {
    do_convert( $form );
}

$cache_file = fopen( $cache_filename, "w" );
fwrite( $cache_file, serialize( $maps ) );
fclose( $cache_file );

function dotrim(&$value){
  $value = trim($value);
}


function do_convert( $form ) {
    global $maps, $forms, $user, $db, $form_factory;
    if ( array_key_exists( $form, $maps ) ) {
        echo "Ignoring $form.  Already cached.\n";
    } else {
        if ( array_key_exists( $form, $forms ) ) {
            $required = $forms[$form];
            foreach( $required as $req_form ) {
                if ( !array_key_exists( $req_form, $maps ) )
                    do_convert( $req_form );
            }
        }
        convert( $form );
    }
}


function updateEntryDate( $entry_date, $record ) {
    global $maps, $forms, $user, $db, $form_factory;
    $db->query( "UPDATE entry SET date = '" . $entry_date . "' WHERE record = " . $record . " AND date > DATE_SUB(NOW(), INTERVAL 1 DAY )" );
    $db->query( "UPDATE last_entry SET date = '" . $entry_date . "' WHERE record = " . $record );
    $db->query( "UPDATE record SET last_modified = '" . $entry_date . "' WHERE id = " . $record );
}

function convert( $form ) 
	{
		global $convert_db, $maps, $forms, $user, $db, $form_factory, $import_table, $default_country_code;
		$row_count = 0;
		$row_print = 10;
		$p_code = 0;
		switch ( $form ) 
		{
			case "country" :
            $fh = fopen( "country.csv", "r" );
            if ( $fh === false ) 
			{
                die( "Trying to load countries with no country.csv file present!\n" );
            }
            while( ( $data = fgetcsv( $fh, 1000 ) ) !== false )
			{
                if ( ++$row_count % $row_print == 0 ) echo "Running $form: $row_count\r";
                $obj = $form_factory->createForm( "country" );
                $obj->name = $data[0];
                $obj->alpha_two = $data[1];
                $obj->code = $data[2];
                if ( $data[3] == "1" )
				{
                    $obj->primary = true;
                }
                if ( $data[4] == "1" ) 
				{
                    $obj->location = true;
                }
                $obj->save($user);
                $maps['country'][ $data[2] ] = $obj->getFormId();
                $maps['country_name'][ strtolower( $data[0] ) ] = $obj->getFormId();
                $obj->cleanup();
                unset( $obj );
            }
            echo "Finished with Country: " . memory_get_usage() . "\n";
            break;
				
			case "region" :
				echo "Nothing to do for region.  The district CSV has it!\n";
				echo "Finished with Region: " . memory_get_usage() . "\n";
				break;
				
			case "district" :
            $fh = fopen( "district.csv", "r" );
            if ( $fh === false ) 
			{
                die( "Trying to load district with no district.csv file present!\n" );
            }
            while( ( $data = fgetcsv( $fh, 1000 ) ) !== false ) 
			{
                if ( ++$row_count % $row_print == 0 ) echo "Running $form: $row_count\r";

                $data[0] = ucfirst( strtolower( $data[0] ) );
                $data[0] = preg_replace( '/(\s\w)/e', "strtoupper('\\1')", $data[0] );
                $data[1] = ucfirst( strtolower( $data[1] ) );
                $data[1] = preg_replace( '/([ -]\w)/e', "strtoupper('\\1')", $data[1] );

               if ( !array_key_exists( 'region', $maps ) ) $maps['region'] = array();
					if ( !array_key_exists( strtolower( $data[0] ), $maps['region'] ) ) 
					{
						$obj = $form_factory->createForm( "region" );
						$obj->name = $data[0];
						$obj->getField('country')->setFromDB($maps['country'][$default_country_code]);
						$obj->save( $user );
						$maps['region'][ strtolower( $data[0] ) ] = $obj->getFormId();
						$obj->cleanup();
						unset( $obj );
					}
                $obj = $form_factory->createForm( "district" );
                $obj->name = $data[1];
                $obj->getField('region')->setFromDB($maps['region'][ strtolower( $data[0] ) ]);
                $obj->code = $data[2];
				$obj->setId($data[2]);
				$obj->save($user);
				$maps['district'][ strtolower( $data[1] ) ] = $obj->getFormId();
				$maps['district_code'][ $data[2] ] = $obj->getFormId();
                $obj->cleanup();
                unset( $obj );
               
           }
            echo "Finished with District,region and Sub-county: " . memory_get_usage() . "\n";
            break;
				
			
			case "staff" :
				$sth = $db->query( "SELECT * FROM $import_table" );
				if( PEAR::isError( $sth ) ) { 
					die( $sth->getMessage() );
				}
				while( $row = $sth->fetchRow() ) 
				{
					$row_count++;
					echo "Running $form: $row_count\r";

					if ( $row->res_district != "" && !array_key_exists( strtolower( $row->res_district ), $maps['district'] ) ) {
						echo "res District " . $row->res_district . " does not exist!!! Can't continue.\n";
					}

					if ( $row->home_district != "" && !array_key_exists( strtolower( $row->home_district ) , $maps['district'] ) ) {
						echo "Home District " . $row->home_district . " does not exist!!! Can't continue.\n";
					}
					
					if ( !array_key_exists( 'cadre', $maps ) ) $maps['cadre'] = array();
					if ( $row->cadre != "" && !array_key_exists( strtolower( $row->cadre ), $maps['cadre'] ) ) 
					{
						$cadre = $form_factory->createForm( "cadre" );
						$cadre->name = $row->cadre;
						$cadre->save( $user );
						$maps['cadre'][ strtolower( $row->cadre ) ] = $cadre->getFormId();
						$cadre->cleanup();
						unset( $cadre );
					}
					if ( !array_key_exists( 'qualification', $maps ) ) $maps['qualification'] = array();
					if ( $row->training_program != "" && !array_key_exists( strtolower( $row->training_program ), $maps['qualification'] ) ) 
					{
						$qualification = $form_factory->createForm( "qualification" );
						$qualification->name = $row->training_program;
						$qualification->save( $user );
						$maps['qualification'][ strtolower( $row->training_program ) ] = $qualification->getFormId();
						$qualification->cleanup();
						unset( $qualification );
					}
				    if ( !array_key_exists( 'facility_agent', $maps ) ) $maps['facility_agent'] = array();
					if ( $row->facility_agent != "" && !array_key_exists( strtolower( $row->facility_agent ), $maps['facility_agent'] ) ) 
					{                    
						$obj = $form_factory->createForm( "facility_agent" );
						$obj->name = $row->facility_agent;
						$obj->save($user);
						$maps['facility_agent'][ strtolower($row->facility_agent) ] = $obj->getFormId();
						$obj->cleanup();
						unset( $obj );
					}
					
					if ( !array_key_exists( 'facility_type', $maps ) ) $maps['facility_type'] = array();
					if ( $row->ftype != "" && !array_key_exists( strtolower( $row->ftype ), $maps['facility_type'] ) ) 
					{
						$facility_type = $form_factory->createForm( "facility_type" );
						$facility_type->name = $row->ftype;
						$facility_type->save( $user );
						$maps['facility_type'][ strtolower( $row->ftype ) ] = $facility_type->getFormId();
						$facility_type->cleanup();
						unset( $facility_type );
					}
					
					if ( !array_key_exists( 'facility_status', $maps ) ) $maps['facility_status'] = array();
					if ( $row->facility_status != "" && !array_key_exists( strtolower( $row->facility_status ), $maps['facility_status'] ) ) 
					{
						$facility_status = $form_factory->createForm( "facility_status" );
						$facility_status->name = $row->facility_status;
						$facility_status->save( $user );
						$maps['facility_status'][ strtolower( $row->facility_status ) ] = $facility_status->getFormId();
						$facility_status->cleanup();
						unset( $facility_status );
					}
					
					if ( !array_key_exists( 'health_facility', $maps ) ) $maps['health_facility'] = array();
					if ( $row->facility != "" && !array_key_exists( strtolower( $row->facility ), $maps['health_facility'] ) ) 
					{
						$health_facility = $form_factory->createForm( "health_facility" );
						$health_facility->name = $row->facility;
						$health_facility->getField("facility_agent")->setFromDB($maps['facility_agent'][ strtolower( $row->facility_agent ) ]);
						$health_facility->getField("facility_status")->setFromDB($maps['facility_status'][ strtolower( $row->facility_status ) ]);
						$health_facility->getField("facility_type")->setFromDB($maps['facility_type'][ strtolower( $row->facility_type ) ]);
						$health_facility->getField("location")->setFromDB($maps['district'][ strtolower( $row->home_district ) ]);
						$health_facility->save( $user );
						$maps['health_facility'][ strtolower( $row->facility ) ] = $health_facility->getFormId();
						$health_facility->cleanup();
						unset( $health_facility );
					}
					
					
					
											
						
					if( $row->training_program!= "" && $row->training_institution!= ""){
						if ( !array_key_exists( 'training_institution', $maps ) ) $maps['training_institution'] = array();
						if(!array_key_exists( strtolower( $row->training_institution ), $maps['training_institution'] )){
							$training_institution = $form_factory->createForm( "training_institution" );
							$training_institution->name = $row->training_institution;
							$training_institution->getField("facility_status")->setFromDB($maps['facility_status'][ strtolower( $row->facility_status ) ]);
							$training_institution->getField("facility_agent")->setFromDB($maps['facility_agent'][ strtolower( $row->facility_agent ) ]);
							$training_institution->getField("location")->setFromDB($maps['district'][ strtolower( $row->home_district ) ]);
							$training_institution->save( $user );
							$maps['training_institution'][ strtolower( $row->training_institution) ] = $training_institution->getFormId();
							$training_institution->cleanup();
						    unset( $training_institution );	
						
							if ( !array_key_exists( 'training_program', $maps ) ) $maps['training_program'] = array();
							$demo = $form_factory->createForm( "training_program" );
							//$demo->setParent( $training_institution->getFormId() );
							$demo->getField("training_institution")->setFromDB($maps['training_institution'][ strtolower( $row->training_institution ) ]);
							//$demo->training_institution = $maps['training_institution'][ strtolower( $row->training_institution ) ];	
							$demo->getField("cadre")->setFromDB($maps['cadre'][ strtolower( $row->cadre ) ]);
							$demo->save( $user );
							$maps['training_program'][ strtolower( $row->cadre) ] = $demo->getFormId();
							$demo->cleanup();
							unset( $demo );
							
						}
						/*else{
							if ( !array_key_exists( 'training_program', $maps ) ) $maps['training_program'] = array();
								if (!array_key_exists( strtolower( $row->training_program ), $maps['training_program']  ) ){
									$demo = $form_factory->createForm( "training_program" );
									$demo->setParent( $training_institution->getFormId() );
									$demo->getField("training_institution")->setFromDB($maps['training_institution'][ strtolower( $row->training_institution ) ]);
									//$demo->training_institution = $maps['training_institution'][ strtolower( $row->training_institution ) ];	
									$demo->getField("cadre")->setFromDB($maps['cadre'][ strtolower( $row->cadre ) ]);
									$demo->save( $user );
									$maps['training_program'][ strtolower( $row->training_program) ] = $demo->getFormId();
									$demo->cleanup();
									unset( $demo );
								}
							}*/
						
					}
					
					
					
					if ( $row->surname != "" ) 
					{
	 
						$person = $form_factory->createForm( "person" );
						$person->surname = $row->surname;
						$person->firstname = $row->firstname;
						$person->othername = $row->othername;
						$person->getField('nationality')->setFromDB($maps['country_name'][strtolower($row->nationality)]);
						$person->getField('residence')->setFromDB($maps['district'][strtolower( $row->res_district ) ]);
						$person->getField('home')->setFromDB($maps['district'][strtolower( $row->home_district ) ]);
						$person->surname_ignore = true;
						$person->save( $user );

						if ( $row->gender != "" || $row->dob != "" || $row->marital_status != "" ) 
						{
							$demo = $form_factory->createForm( "demographic" );
							$demo->setParent( $person->getFormId() );
							
							if ( !array_key_exists( 'marital_status', $maps ) ) $maps['marital_status'] = array();
							if ( $row->marital_status != "" && !array_key_exists( strtolower( $row->marital_status ), $maps['marital_status'] ) )
							{
								$marital_status = $form_factory->createForm( "marital_status" );
								$marital_status->name = $row->marital_status;
								$marital_status->save( $user );
								$maps['marital_status'][ strtolower( $row->marital_status ) ] = $marital_status->getFormId();
								$marital_status->cleanup();
								unset( $marital_status );
							}
													
							if ( $row->gender != "" ) 
							{
								if ( $row->gender == "FEMALE" || $row->gender == "f" )
								{
									$demo->getField("gender")->setFromDB("gender|F");
								} elseif ( $row->gender == "MALE" || $row->gender == "m" ) 
								{
									$demo->getField("gender")->setFromDB("gender|M");
								}
							} 
							if ( $row->dob != "" ) {
								$dob = explode( '.', $row->dob );
								if ( count( $dob ) != 3 ) {
									$dob = explode( '/', $row->dob );
								}
								if ( count( $dob ) == 3 ) {
									if ( strlen( $dob[2] ) == 2 ) {
										if ( $dob[2] < 10 ) $dob[2] = "20" . $dob[2];
										else $dob[2] = "19" . $dob[2];
									}
									$demo->birth_date = I2CE_Date::getDate( $dob[0], $dob[1], $dob[2] );
								} elseif( count( $dob ) == 1 ) {
									if ( strlen( $dob[0] ) == 2 ) {
										if ( $dob[0] < 10 ) $dob[0] = "20" . $dob[0];
										else $dob[0] = "19" . $dob[0];
									}
									$demo->birth_date = I2CE_Date::getDate( 1, 1, $dob[0] );
								}
								
								$demo->birth_country = $maps['country'][$default_country_code];
								$demo->birth_district = $maps['district'][ strtolower( $row->home_district ) ];
								$demo->save( $user );
								$demo->cleanup();
								unset( $demo );
							}
						}
							if($row->person_address != "" || $row->person_phone != "" )
							{
								$contact = $form_factory->createForm("person_contact_personal");
								$contact->setParent( $person->getFormId() );
								$contact->address = $row->person_address;
								$contact->telephone = $row->person_phone;
								$contact->save( $user );
								$contact->cleanup();
								unset( $contact );
							}
					if($row->cadre != "" )
							{
								$training = $form_factory->createForm("training");
								$training->setParent( $person->getFormId() );
								$training->index_num = $row->id;
								
								if ($row->intake_date !="" && $row->completion_date !="")
								{
								$intake_date = explode( '.', $row->intake_date );
								if ( count( $intake_date ) != 3 ) {
									$intake_date = explode( '/', $row->intake_date );
								}
								if ( count( $intake_date ) == 3 ) {
									if ( strlen( $intake_date[2] ) == 2 ) {
										if ( $intake_date[2] < 10 ) $intake_date[2] = "20" . $intake_date[2];
										else $intake_date[2] = "19" . $intake_date[2];
									}
									$training->intake_date = I2CE_Date::getDate( $intake_date[0], $intake_date[1], $intake_date[2] );
								} elseif( count( $intake_date ) == 1 ) {
									if ( strlen( $intake_date[0] ) == 2 ) {
										if ( $intake_date[0] < 10 ) $intake_date[0] = "20" . $intake_date[0];
										else $intake_date[0] = "19" . $intake_date[0];
									}
									$training->intake_date = I2CE_Date::getDate( 1, 1, $intake_date[0] );
								}
								
								$graduation_date = explode( '.', $row->completion_date );
								if ( count( $graduation_date ) != 3 ) {
									$graduation_date = explode( '/', $row->completion_date );
								}
								if ( count( $graduation_date ) == 3 ) {
									if ( strlen( $graduation_date[2] ) == 2 ) {
										if ( $graduation_date[2] < 10 ) $graduation_date[2] = "20" . $graduation_date[2];
										else $graduation_date[2] = "19" . $graduation_date[2];
									}
									$training->graduation = I2CE_Date::getDate( $graduation_date[0], $graduation_date[1], $graduation_date[2] );
								} elseif( count( $graduation_date ) == 1 ) {
									if ( strlen( $graduation_date[0] ) == 2 ) {
										if ( $graduation_date[0] < 10 ) $graduation_date[0] = "20" . $graduation_date[0];
										else $graduation_date[0] = "19" . $graduation_date[0];
									}
									$training->graduation = I2CE_Date::getDate( 1, 1, $graduation_date[0] );
								}
								
						
							}
								//$training->intake_date = $row->intake_date;
								//$training->graduation_date_date = $row->completion_date;
								$training->getField('training_program')->setFromDB($maps['training_program'][strtolower( $row->cadre ) ]);
								$training->save( $user );
								
							
					if($row->registration_number != ""  )
							{
								$registration = $form_factory->createForm("registration");
								$registration->setParent( $training->getFormId() );
								$registration->registration_number = $row->registration_number;
								//$registration->getField('qualification')->setFromDB($maps['qualification'][strtolower( $row->qualification ) ]);
								if ($row->registration_date !="")
								{
								$registration_date = explode( '.', $row->registration_date );
								if ( count( $registration_date ) != 3 ) {
									$registration_date = explode( '/', $row->registration_date );
								}
								if ( count( $registration_date ) == 3 ) {
									if ( strlen( $registration_date[2] ) == 2 ) {
										if ( $registration_date[2] < 10 ) $registration_date[2] = "20" . $registration_date[2];
										else $registration_date[2] = "19" . $registration_date[2];
									}
									$registration->registration_date = I2CE_Date::getDate( $registration_date[0], $registration_date[1], $registration_date[2] );
								} elseif( count( $registration_date ) == 1 ) {
									if ( strlen( $registration_date[0] ) == 2 ) {
										if ( $registration_date[0] < 10 ) $registration_date[0] = "20" . $registration_date[0];
										else $registration_date[0] = "19" . $registration_date[0];
									}
									$registration->registration_date = I2CE_Date::getDate( 1, 1, $registration_date[0] );
								}
							}
								$registration->save( $user );
								$registration->cleanup();
								unset( $registration );
							}
							if($row->license_start_date != ""  )
							{
								$license = $form_factory->createForm("license");
								$license->setParent( $training->getFormId() );
								$license->license_number = $row->registration_number;
								 if ($row->license_start_date !="" && $row->license_end_date !="")
								{
								$license_start_date = explode( '.', $row->license_start_date );
								if ( count( $license_start_date ) != 3 ) {
									$license_start_date = explode( '/', $row->license_start_date );
								}
								if ( count( $license_start_date ) == 3 ) {
									if ( strlen( $license_start_date[2] ) == 2 ) {
										if ( $license_start_date[2] < 10 ) $license_start_date[2] = "20" . $license_start_date[2];
										else $license_start_date[2] = "19" . $license_start_date[2];
									}
									$license->start_date = I2CE_Date::getDate( $license_start_date[0], $license_start_date[1], $license_start_date[2] );
								} elseif( count( $license_start_date ) == 1 ) {
									if ( strlen( $license_start_date[0] ) == 2 ) {
										if ( $license_start_date[0] < 10 ) $license_start_date[0] = "20" . $license_start_date[0];
										else $license_start_date[0] = "19" . $license_start_date[0];
									}
									$license->start_date = I2CE_Date::getDate( 1, 1, $license_start_date[0] );
								}
							
								$license_end_date = explode( '.', $row->license_end_date );
								if ( count( $license_end_date ) != 3 ) {
									$license_end_date = explode( '/', $row->license_end_date );
								}
								if ( count( $license_end_date ) == 3 ) {
									if ( strlen( $license_end_date[2] ) == 2 ) {
										if ( $license_end_date[2] < 10 ) $license_end_date[2] = "20" . $license_end_date[2];
										else $license_end_date[2] = "19" . $license_end_date[2];
									}
									$license->end_date = I2CE_Date::getDate( $license_end_date[0], $license_end_date[1], $license_end_date[2] );
								} elseif( count( $license_end_date ) == 1 ) {
									if ( strlen( $license_end_date[0] ) == 2 ) {
										if ( $license_end_date[0] < 10 ) $license_end_date[0] = "20" . $license_end_date[0];
										else $license_end_date[0] = "19" . $license_end_date[0];
									}
									$license->end_date = I2CE_Date::getDate( 1, 1, $license_end_date[0] );
								}
								
						
							}
								$license->save( $user );
								$license->cleanup();
								unset( $license );
							}
							$training->cleanup();
							unset( $training );
					}
					}
				}
				echo "Finished with Staff: " . memory_get_usage() . "\n";
				break;
				
		    default:
				echo "No conversion written for $form yet.\n";
			break;
		}
	}
?>
