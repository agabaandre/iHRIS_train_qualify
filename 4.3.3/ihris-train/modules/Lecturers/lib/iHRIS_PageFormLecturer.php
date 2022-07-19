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
 * @author Ally Shaban <allyshaban5@gmail.com>
 * @since v4.1.0
 * @version v4.1.0
 */
/**
 * iHRIS_Person class for the person form.
 *
 * @package iHRIS
 * @subpackage ihris-train
 */
class iHRIS_PageFormLecturer extends I2CE_PageForm {
protected function loadObjects() {
	if(!$this->hasPermission("task(can_add_lecturer)")) {
		$this->userMessage("You do not have permission to add lecturers");
		return false;
		}

	if ($this->isPost()) {
		$lecturer=$this->factory->createContainer("lecturer");
		$lecturer->populate();	
		$lecturer->load($this->post);
	}
	
	else {
		if($this->request_exists("id")) {
			$id=$this->request("id");
			}
		else
		$id="lecturer|0";
		$lecturer=$this->factory->createContainer($id);
		$lecturer->populate();
		$lecturer->load($this->request);	
		}
	$this->setObject($lecturer);
	$this->applyLimits($lecturer);
		}
		
	protected function applyLimits($lecturer){
		$username=$this->getUser()->username;
		$user_info=self::fetch_user_info($username);
		$inst_id=$user_info["training_institution"];
		$where=array(	"operator"=>"FIELD_LIMIT",
							"field"=>"training_institution",
							"style"=>"equals",
							"data"=>array("value"=>$inst_id)
						 );
		$dep_field=$lecturer->getField("department");		
		$dep_field->setOption(array("meta","limits","default","department"),$where);
	
		$array=array("Registrar","Lecturer","Head Of Department","Principal","Deputy Principal","Level Coordinator","Academic Administrator");
		$where=array(
							"operator"=>"FIELD_LIMIT",
							"field"=>"name",
							"style"=>"in",
							"data"=>array("value"=>$array)
						 );
		$role_field=$lecturer->getField("role");		
		$role_field->setOption(array("meta","limits","default","role"),$where);	
		if($this->getUser()->role!="admin"){
			list($inst_form,$inst_id)=explode("|",$user_info["training_institution"],2);
			$where=array(
							"operator"=>"FIELD_LIMIT",
							"field"=>"id",
							"style"=>"equals",
							"data"=>array("value"=>$inst_id)
							 );
			$inst_field=$lecturer->getField("training_institution");
			$inst_field->setOption(array("meta","limits","default","training_institution"),$where);
			}
		}
   
   static function fetch_institution($username){
		$where_users=array(
							"operator"=>"FIELD_LIMIT",
							"field"=>"identification_number",
							"style"=>"equals",
							"data"=>array("value"=>$username)
							    );
		$insts=I2CE_FormStorage::listFields("lecturer",array("training_institution"),false,$where_users);
		foreach ($insts as $inst)
		$inst_id=$inst["training_institution"];
		return $inst_id;
		}

	static function fetch_user_info($username) {
		$where=array(
							"operator"=>"FIELD_LIMIT",
							"field"=>"identification_number",
							"style"=>"equals",
							"data"=>array("value"=>$username)
							    );
		$info_array=I2CE_FormStorage::listFields("lecturer",array("training_institution","department"),false,$where);
		foreach ($info_array as $info) {
			$lecturer_info=array("department"=>$info["department"],"training_institution"=>$info["training_institution"]);
			}
		return $lecturer_info;
		}
		
	protected function save() {
		$lecturer=$this->factory->createContainer("lecturer");
		$lecturer->populate();
		$lecturer->load($this->post);
		$id=$lecturer->getField("identification_number")->getDBValue();
		$userObj = $this->factory->createContainer( "user".'|'.$id);
		$userObj->getField("username")->setFromPost($id);
		$userObj->getField("firstname")->setFromPost($lecturer->getField("first_name")->getDBValue());
		$userObj->getField("lastname")->setFromPost($lecturer->getField("surname")->getDBValue());
		$userObj->getField("role")->setFromDB($lecturer->getField("role")->getDBValue());
		$userObj->getField("password")->setFromPost($lecturer->getField("surname")->getDBValue());
		$userObj->save($this->user);
		parent::save();
		$this->userMessage("Lecturer Added Successfully!!!");
		$this->setRedirect("add_lecturer");
		}
	}