<?php
/**
* © Copyright 2011 IntraHealth International, Inc.
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
* @package iHRIS
* @subpackage Manage
* @author Ally Shaban <allyshaban5@gmail.org>
* @version v4.1.0
* @since v4.1.0
* @filesource 
*/ 
/** 
* Class iHRIS_Module_TrainAccessInstitution
* 
* @access public
*/


class iHRIS_Module_TrainAccessInstitution extends I2CE_ModuleAccess {

    /**
     * @var array A cached list of facility_access for a username
     */
    protected static $user_access_institution;

    /**
     * @var array A list of limit options for this module.
     */
    protected static $report_limit_options;

    /**
     * Retrn the array of hooks available in this module.
     * @return array
     */
    public static function getHooks() {
        return array(
                'get_report_module_limit_options' => 'get_report_limit_options',
                );
    }

    /**
     * Return the array of details for report limit options for this
     * module.
     * @return array
     */
    public function get_report_limit_options() {
        if ( !self::$report_limit_options 
                && !is_array( self::$report_limit_options ) ) {
            $factory = I2CE_FormFactory::instance();
            $instAccess = $factory->createContainer( "access_institution" );
            $forms = $instAccess->getField('training_institution')->getSelectableForms();
            $fields = array();
            foreach( $forms as $form ) {
                $formObj = $factory->createContainer( $form );
                if ( $formObj instanceof I2CE_Form ) {
                    $fields[$form] = $formObj->getDisplayName();
                }
                $formObj->cleanup();
                unset( $formObj );
            }
            $instAccess->cleanup();
            unset( $instAccess );
            self::$report_limit_options = array(
                    'module' => "TrainAccessInstitution",
                    'fields' => $fields,
                    );
        }
        return self::$report_limit_options;
    }

    /**
     * Static helper method to remove the given form name from
     * an id.
     * @param string &$item An entry in an array.
     * @param mixed $key The array key for this item.
     * @param string $form The form name to remove.
     */
    protected static function removeFormName( &$item, $key, $form ) {
        $item = substr( $item, strlen( $form ) + 1 );
    }

    /**
     * Return an array of limit_add options to add
     * for this user to limit fields.
     * @param I2CE_Form $formObj
     * @param array $args
     * @return array
     */
    public function getLimitAdd( $formObj, $args ) {
        $institutions = self::getAccessInstitution( $this->user );
        $limit_add = array();
        foreach( $institutions as $form => $data ) {
            $limit_add[$form] = array( 'operator' => 'FIELD_LIMIT',
                    'field' => 'id' );
            $id_data = $data;
            array_walk( $id_data, array( "self", "removeFormName" ),
                    $form );
            if ( count( $id_data ) == 1 ) {
                $limit_add[$form]['style'] = 'equals';
                $limit_add[$form]['data']['value'] = $id_data[0];
            } else {
                $limit_add[$form]['style'] = 'in';
                $limit_add[$form]['data']['value'] = $id_data;
            }
        }
        return $limit_add;
    }

    /**
     * Return the list of allowed id values for the given form
     * assigned to the current user.  If the form isn't 
     * given directly by this user then return an empty array.
     * Return true if there is no limits at all for this
     * user.
     * @param string $form
     * @return mixed
     */
    public function getLimitsByForm( $form ) {
        $institutions = self::getAccessInstitution( $this->user );
        if ( count( $institutions ) == 0 ) {
            return true;
        } elseif ( array_key_exists( $form, $institutions ) ) {
            return $institutions[$form];
        } else {
            return array();
        }
    }

    /**
     * Return a list of locations the user is allowed to access.
     * @param I2CE_User $user
     * @return array with keys form name, and values and array containing formids form that form
     */
    public static function getAccessInstitution( $user ) {
        if ( !$user instanceof I2CE_User ) {
            return array();
        }
        $username = $user->username;
        if ( !$username ) {
            return array();
        }
        if ( !is_array( self::$user_access_institution ) ) {
            self::$user_access_institution = array();
        }
        if ( !isset( self::$user_access_institution[$username] ) ) {
            self::$user_access_institution[$username] = array();
            $user = I2CE_FormFactory::instance()->createContainer( "user|$username" );
            $user->populateChildren( "access_institution" );
            if ( array_key_exists( 'access_institution', $user->children ) 
                    && is_array( $user->children['access_institution'] ) ) {
                foreach( $user->children['access_institution'] as $child ) {
                    $ff = $child->getField("training_institution");
                    self::$user_access_institution[$username]["training_institution"][] =
                        $ff->getDBValue();
                }
            }
        }
        return self::$user_access_institution[$username];
    }
    

    /**
     * Template function to see if person_can_view_child_forms
     *  @param DOMNode $node
     * @param I2CE_Template $template
     * @param string $link
     */
    public function userAccessInstitution($node,$template) {
        // This should only work for the facility_manager role so ignore any others.
        if ( $template->getUser()->getRole() == "admin" ) {
            return false;
        }
        if ( !$template instanceof I2CE_Template) {
            return false;
        }
        if (!$node instanceof DOMNode) {
            $node = null;
        }
        if ( ! ($person = $template->getForm('person',$node)) instanceof iHRIS_Person) {
            //No person associated with this node.  so this user can have permission
            return true;
        }

        $access = self::getAccessInstitution( $template->getUser() ); // a list of locations a user is allowed to access
        
        if ( count( $access ) == 0 ) {
            return false;
        }
		  
		  $person->populateChildren("registration");
        foreach( $person->getChildren('registration') as $registration ) {
        	$training_institution=$registration->getField("training_institution")->getDBValue();
        	}
        	
        	//if the instituion of the user differs the institution of the student then deny access
        if($access["training_institution"][0] != $training_institution) {
        	$this->userMessage("You dont have permission to access students from other institutions");
	     	//$this->setRedirect(  "home" );
	     	header("Location:home");
	     	return false;
        	}
    }
}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
