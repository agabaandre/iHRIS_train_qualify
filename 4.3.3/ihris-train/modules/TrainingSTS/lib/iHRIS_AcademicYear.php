<?php
/*
 * © Copyright 2006, 2007, 2008, 2009 IntraHealth International, Inc.
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
 */
/**
 * @package iHRIS
 * @subpackage Common
 * @author Ally Shaban <allyshaban5@gmail.com>
 * @since v4.1.0
 * @version v4.1.0
 */
/**
 * iHRIS_Person class for the person form.
 *
 * @package iHRIS
 * @subpackage Common
 */
class iHRIS_AcademicYear extends I2CE_List {

	static function ensureAcademicYear(){
			$academic_year=self::currentAcademicYear();
			$academic_years=I2CE_FormStorage::ListFields("academic_year",array("name"));
			$latest=false;
			
			//check to see if the academic_year in the DB is latest
			foreach ($academic_years as $db_academic_year){				
				if($db_academic_year["name"]==$academic_year)
				$latest=true;
				}
			//if not latest,add latest
			if($latest==false){
				$accObj=I2CE_FormFactory::instance()->createContainer("academic_year");
				$accObj->getField("name")->setFromPost($academic_year);
				$user=new I2CE_User;
				$accObj->save($user);
				}
	
		}

	static function currentAcademicYear(){
		//this function assumes that the new academic year begins in July
		$year=date("Y");
		$month=date("m");
		if($month<6){
			$year1=$year-1;
			$academic_year=$year1."/".$year;
			}
		else{	
			$year1=$year+1;
			$academic_year=$year."/".$year1;
			}
		return $academic_year;
		}

	static function academicYearId($academic_year){
		$where=array( "operator"=>"FIELD_LIMIT",
							"field"=>"name",
							"style"=>"equals",
							"data"=>array("value"=>$academic_year)
						 );					 
		$academic_year_array=I2CE_FormStorage::Search("academic_year",false,$where);	
		foreach($academic_year_array as $academic_year_id)
		return $academic_year_id;
		}
}

# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
