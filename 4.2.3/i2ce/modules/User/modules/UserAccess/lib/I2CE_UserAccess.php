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
* @package I2CE
* @subpackage User
* @author Carl Leitner <litlfred@ibiblio.org>
* @version v4.0.3
* @since v4.0.3
* @filesource 
*/ 
/** 
* Class I2CE_UserAccess_Internal
* A user access control mechansim where username and the user details are stored in one table
* and access is in another table and the tables are joined on a userid.
* @access public
*/


class I2CE_UserAccess extends I2CE_UserAccess_Mechanism {
    

    /**
     * Encrypts the password
     * @param string $passwd
     * @returns string
     */
    protected function encryptPassword($password) {
        return md5($password);
    }
     
    /**
     * Whether or not this acccess mechansim can create ne users
     * @returns boolean
     */
    public function canCreateNewUser() {
        return true;
    }
     
    /**
     * Whether or not this acccess mechansim can create edit details of existing users
     * @returns boolean
     */
    public function canEditUserDetails() {
        return true;
    }



    /**
     * Gets an array of the allowed details
     * @returns array
     */
    public function getAllowedDetails() {
        return array_intersect(array_keys($this->getDetailColumns()), array_keys($this->getDetailColumnTypes())) ;
    }




    /**
     * An array of the details and their associated columns
     */
    protected function getDetailColumns() {
        return
            array(
                'firstname'=>'firstname',
                'lastname'=>'lastname',
                'email'=>'email',
                'creator'=>'creator',
                'email'=>'email'
                );
    }
    
    /**
     * An array of the details and their associated mdb2 types
     */
    protected function getDetailColumnTypes()  {
        return
            array(
                'firstname'=>'text',
                'lastname'=>'text',
                'email'=>'text',
                'creator'=>'integer',
                'email'=>'text'
                );
    }

     /**
      * Returns the display name of the given detail
      * @param string $detail
      * @returns string
      */
    public function getDetailName($detail) {
        switch($detail) {
        case 'firstname':
            return 'Given name';
        case 'lastname':
            return 'Surname';
        case 'email':
            return 'E-mail';
        case 'creator':
            return 'Creator';
        default:
            return null;
        }
    }


    /**
     * ensrure default options are set
     * @param array $options
     * @returns array 
     */
    public  function ensureDefaultOptions($options) {
        return I2CE_Module_UserAccess::ensureDefaultOptions($options);
    }

    /**
     * Create a new instance of a default I2CE  table user access mechanism
     */
    public function __construct( ) {
        parent::__construct();
        $this->db = MDB2::singleton();
        $this->accessTable = $this->options['accessTable'];
        $this->logTable = $this->options['logTable'];
        $this->detailTable = $this->options['detailTable'];
    }
    /**
     *@var protected string $userTable the user detail table.
     *
     */
    protected $detailTable;
    /**
     *@var protected string $accessTable the user access table.
     *
     */
    protected $accessTable;


    /**
     *@var protected string $logTable the user acitivity log table.
     *
     */
    protected $logTable;






    
    /**
     * Gets the role assigned to a user
     * @param string $username
     * @param mixed $setRole.  Defaulst to false.  If a string, it is the role to assign to the user
     * @param string 
     * @returns boolean. true on success
     */
    public function _setUserInfo($username, $setRole = false, $details = array()) {
        if ($setRole !== false) {
            if ( $setRole == '' ) { 
                $qry = "DELETE FROM " . $this->accessTable . " WHERE user = (SELECT id FROM " . $this->detailTable . " WHERE username = ? )";
                $params = array( $username );
                $types = array( 'text' );
            } else {
                $qry = "INSERT INTO " . $this->accessTable . " (role,user) SELECT ? as role, u.id as user  FROM " . $this->detailTable . 
                    " AS u LEFT JOIN " . $this->accessTable ." AS a ON u.id = a .user  WHERE  u.username = ?  ON DUPLICATE KEY UPDATE role = ?";
                $params = array($setRole,$username, $setRole);
                $types = array( 'text', 'text', 'text' );
            }
            if (I2CE::pearError($this->db->execParam($qry, $params, $types), "Cannot update user role")) {
                return false;
            }
        }         
        if (count($details) > 0) {
            $colTypes = $this->getDetailColumnTypes();
            $cols = $this->getDetailColumns();
            $types = array();
            $params = array();
            $sets = array();
            foreach ($details as  $detail=>$value) {
                $types[] = $colTypes[$detail];
                if ($detail == 'creator' && $colTypes['creator'] == 'integer' ) {
                    $params[] = $this->getUserId($value);
                } else {
                    $params[] = $value;
                }
                $sets[] = ' `' . $cols[$detail] . '` = ? ' ;
            }
            $types[] = 'text';
            $params[] = $username;
            $qry = 'UPDATE ' . $this->detailTable . "  SET " . implode(',',$sets)
                . ' WHERE username = ?';
            if (I2CE::pearError($this->db->execParam($qry, $params,$types), "Cannot update user details")) {
                return false;
            }
        }
        return true;
    }



    /**
     * Gets the indicated user details as well the  role
     * 
     * @param string $username;
     * @oaram boolean $getRole Defaults to false
     * @returns array. associative array of user info (role, email and other details)
     */
    public function _getUserInfo($username,$getRole = false,$details = array()) {
        $details = array_intersect($details , $this->getAllowedDetails());
        $detail_columns = $this->getDetailColumns();
        $details_access = array();
        foreach ($details as $detail) {
            $details_access[] = 'u.`' . $detail_columns[$detail] . "` AS `$detail`";
        }
        if ($getRole) {
            $details_access[] =  'a.role AS role ';
        }
        $qry = 'SELECT ' .
            implode (',', $details_access) 
            . ' FROM ' . $this->detailTable . ' u'
            . ' LEFT JOIN ' . $this->accessTable  .' a ON a.user = u.id '
            . ' WHERE u.username = ?';
        $row = $this->db->getRow( $qry,  null, array( $username ), array('text') );                
        if (  I2CE::pearError($row,  "Cannot get user info for $username"  ) || !$row) {
            return array();
        }
        $results = array();
        if ($getRole) {
            $results['role'] = $row->role;
        }
        foreach ($details as $detail) {
            if ($detail == 'creator') {
                $results[$detail] = $this->getUsernameFromId($row->$detail);
            } else {
                $results[$detail] = $row->$detail;
            }
        }
        return  $results;
    }



    /**
     * Gets the userss by the indicated  details as well as the  role. worker method
     * @oaram boolean $role Defaults to false
     * @param array $details of string.  The details we wish on the user.  Defaults to empty array
     * @returns array of usernames which mathc the give input
     */
    public function _getUsersByInfo($role = false, $details=array()) {
        $qry = "SELECT username "
            . " FROM " . $this->detailTable . " AS u ";
        $colTypes = $this->getDetailColumnTypes();
        $cols = $this->getDetailColumns();
        $types = array();
        $params = array();
        $limits = array();
        foreach ($details as  $detail=>$value) {
            $types[] = $colTypes[$detail];
            if ($detail == 'creator' && $colTypes['creator'] == 'integer' ) {
                $params[] = $this->getUserId($username);
            } else {
                $params[] = $value;
            }
            $limits[] = ' u.`' . $cols[$detail] . '` = ? ' ;
        }            
        if ($role) {
            $qry .= ' LEFT JOIN ' . $this->accessTable  .' a ON a.user = u.id ';
            $types[] = 'text';
            $params[] = $role;
            $limits[] = ' a.role = ?  ' ;
        }
        if (count($limits) > 0) {
            $qry .= ' WHERE (' . implode(" AND " , $limits) . ')';
        }
        $qry .= ' ORDER BY u.lastname, u.firstname';
        $stmt = $this->db->prepare($qry,$types);
        if (I2CE::pearError($stmt, "Cannot query users")) {
            return array();
        }
        $result = $stmt->execute( $params);
        if (I2CE::pearError($result, "Cannot query users")) {
            return array();
        }
        $usernames = array();
        while( $row = $result->fetchRow() ) {
            $usernames[] = $row->username;
        }
        return $usernames;
    }




    /**
     * Whether or not this acccess mechansim can change a user's password
     * @returns boolean
     */
    public function canChangePassword() {
        return true;
    }



    /**
     * See if a user is in the system
     * @param string $username
     * @param boolean $has_role.  If true we verify that they have a role set.
     * @returns boolean.
     */
    public function _userExists($username, $has_role) {
        if ($has_role) {
            $qry = "SELECT count(*) AS num "
                . ' FROM ' . $this->detailTable . ' u'
                . ' LEFT JOIN ' . $this->accessTable  .' a ON a.user = u.id '
                . ' WHERE u.username  = ? AND a.role IS NOT NULL AND LENGTH(a.role) > 0 ';
            $row = $this->db->getRow( $qry, null, array( $username ), array('text') );
            if (  I2CE::pearError($row,  "Cannot get user for $username"  ) ) {
                return false;
            }            
            if (!$row instanceof MDB2_ROW || !$row->num) {
                return false;
            }
            return ($row->num > 0);
        } else {
            return $this->getUserId($username) !== false;
        }
    }


    /**
     * Gets the user id from the user name
     * @param string $username
     * @returns int or false on failure
     */
    public function _getUserId($username) {
        $qry = "SELECT id "
            . ' FROM ' . $this->detailTable . ' u'
            . ' WHERE u.username  = ? ';
        $row = $this->db->getRow( $qry, null, array( $username ), array('text') );
        if (  I2CE::pearError($row,  "Cannot get user id for $username"  ) ) {
            return false;
        }
        if (!$row instanceof MDB2_ROW || !$row->id) {
            return false;
        }
        return $row->id;
    }


    /**
     * Gets the user id 
     * @returns array of ids
     */
    public function _getUserIds() {
        $qry = "SELECT id  FROM " . $this->detailTable ;        
        $sth = $this->db->prepare($qry, array(), MDB2_PREPARE_RESULT );
        if (I2CE::pearError( $sth, "Error preparing to populate history:" ) ) {
            return array();
        }
        $result = $sth->execute( array());
        if ( I2CE::pearError( $result, "Error getting userids: " ) ) {
            return array();
        }
        $userIds= array();
        while ( $data = $result->fetchRow() ) {
            $userIds[] = $data->id;
        }
        $result->free();
        $sth->free();
        return $userIds;
    }


    /**
     * Gets the user id from the username
     * @param int $userid
     * @returns string or false on failure
     */
    public function _getUserNameFromId($userid) {
        $qry = "SELECT username "
            . ' FROM ' . $this->detailTable . ' u'
            . ' WHERE u.id  = ? ';
        $row = $this->db->getRow( $qry, null, array( $userid ), array('integer') );
        if (  I2CE::pearError($row,  "Cannot get username for id for $userid"  ) ) {
            return false;
        }
        if (!$row instanceof MDB2_ROW || !$row->username || $row->username=='0') {
            return false;
        }
        return $row->username;
        
    }


    /**
     * Change the password for this user. Worker method
     * 
     * This will update a user's record to change the password in the database.  It checks to make sure the
     * new password matches the confirmation.
     * 
     * @param string $username
     * @param string $old_password
     * @param string $new_password
     * @returns boolean
     */
    public function _changePassword( $username, $old_password,$new_password ) {
        if ($old_password === false) {
            $qry = "UPDATE " . $this->detailTable . ' SET password = ?, default_password = ? WHERE  username = ? ';
            $params = array(
                $this->encryptPassword($new_password),
                1,
                $username
                );
            $result = $this->db->execParam($qry,  $params,array('text', 'integer', 'text') );
            return !I2CE::pearError($result, "Cannot update password") && $result == 1;
        } else {
            $qry = "UPDATE " . $this->detailTable . ' SET password = ?, default_password = ? WHERE ( ' . 
                'username = ? AND ' .
                'password = ? )' ;
            $params = array(
                $this->encryptPassword($new_password),
                0,
                $username,
                $this->encryptPassword($old_password)
                );
            $result = $this->db->execParam($qry, $params,array('text', 'integer', 'text', 'text') );
            return !I2CE::pearError($result, "Cannot update password") && $result == 1;
        }
    }


     /**
      * verifies that the specified user has the specified password
      * @param string $username
      * @param string $password
      * @returns boolean
      */
    public function _userHasPassword($username,$password) {
        if ( $password === false ) {
            $qry = "SELECT COUNT(*) as num FROM  " . $this->detailTable . ' WHERE ( ' . 
                'username = ? ) ';
            $params = array ( $username );
            $types = array( 'text' );
        } else {
            $qry = "SELECT COUNT(*) as num FROM  " . $this->detailTable . ' WHERE ( ' . 
                'username = ? AND ' .
                'password = ? )' ;
            $params = array( $username, $this->encryptPassword($password) );
            $types = array( 'text', 'text' );
        }
        $row = $this->db->getRow( $qry,  null, $params, $types );                
        if (  I2CE::pearError($row,  "Cannot check password  for $username"  ) ) {
            return false;
        }
        if (!$row instanceof MDB2_ROW) {
            return false;
        }
        return ($row->num == 1);        
    }


     /**
      * checks to see if the user has a default password (one set by administrator)
      * @param string $username
      * @param string $password
      * @returns boolean
      */
    public function _userHasDefaultPassword($username) {
      if( $username != 'i2ce_admin'){
          $qry = "SELECT default_password FROM  " . $this->detailTable . ' WHERE ( ' . 
              'username = ? )' ;
          $params = array( $username );
          $types = array( 'text' );

          $row = $this->db->getRow( $qry,  null, $params, $types );                
          if (  I2CE::pearError($row,  "Cannot check default password status  for $username"  ) ) {
              return false;
          }
          if (!$row instanceof MDB2_ROW) {
              return false;
          }
          return ($row->default_password == 1);        
        }
      else {
        return true;
      }
    }


     /**
      * Logs a user activiity
      * @param string $username
      * @param string $actitivty, such as login, logout, access.  Default is access
      * @param int $timesamp. Defaults to null, in which case it should be now
      */
    public function logActivity($username, $activity='access', $timestamp= null) {
        if ($timestamp === null) {
            $timestamp = time();
        }
        $check = $this->db->getRow( "SELECT * FROM " . $this->logTable 
                . " WHERE user = IFNULL((SELECT id FROM " . $this->detailTable . " WHERE username = ?),0) AND session_id = ? AND logout IS NULL",
                null, array( $username, session_id() ), array( 'text', 'text' ) );
        if ( !$check && !I2CE::pearError( $check, "Error finding entry in user_log table: ", E_USER_WARNING ) ) {
            $res = $this->db->execParam(
                    "INSERT INTO " . $this->logTable . " (user, login, session_id, activity ) VALUES ( IFNULL((SELECT id FROM " . $this->detailTable . " WHERE username = ?),0), NOW(), ?, NOW() )",
                    array( $username, session_id() ), array( 'text', 'text' ) );
            I2CE::pearError( $res, "Error adding login to the user log table: ", E_USER_WARNING );
        }
        switch ($activity) {
        case 'login':
        case 'access':
            $res = $this->db->execParam(
                    "UPDATE " . $this->logTable . " SET activity = NOW() WHERE user = IFNULL((SELECT id FROM " . $this->detailTable . " WHERE username = ?),0) AND session_id = ? AND logout IS NULL",
                    array( $username, session_id() ), array( 'text', 'text' ) );
            I2CE::pearError( $res, "Error updating activity to the user log table: ", E_USER_WARNING );
            break;
        case 'logout':
            $res = $this->db->execParam(
                    "UPDATE " . $this->logTable . " SET logout = NOW() WHERE user = IFNULL((SELECT id FROM " . $this->detailTable . " WHERE username = ?),0) AND session_id = ? AND logout IS NULL",
                    array( $username, session_id() ), array( 'text', 'text' ) );
            I2CE::pearError( $res, "Error updating logout to the user log table: ", E_USER_WARNING );

            break;
        default:
            //$this->logTable;
        }

    }

    /**
     * Check to see if this user has been logged out by other means.
     * @param string $username
     * @return boolean
     */
    public function hasBeenLoggedOut( $username ) {
        $userDetails = $this->db->getRow( "SELECT user FROM " . $this->logTable 
                . " WHERE user = IFNULL((SELECT id FROM " . $this->detailTable . " WHERE username = ?),0) AND session_id = ? AND logout IS NULL ", null, array( $username, session_id() ), array( 'text', 'text' ) );
        if(count($userDetails) == 0){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Logs out any previous existing sessions if single login option is set.
     * @param string $username
     * @return boolean
     */
    public function logOutPreviousSessions( $username ) {
        $single_login = false;
        I2CE::getConfig()->setIfISSet( $single_login, "/config/site/single_login" );
        if ( $single_login ) {
            $res = $this->db->execParam(
                    "UPDATE " . $this->logTable . " SET logout = NOW() WHERE user = IFNULL((SELECT id FROM " . $this->detailTable . " WHERE username = ?),0) AND logout IS NULL",
                    array( $username ), array( 'text' ) );
            if ( I2CE::pearError( $res, "Error auto logging out previous sessions to the user log table: ", E_USER_WARNING ) ) {
                return false;
            } else {
                return true;
            }
        }
        return true;
    }


     /**
      *  Create user worker method
      *  @param string $username
      * @param string $password
      * @param string $role
      * @param array $details.  Defatuls to empty array,
      * @returns boolean. true on success
      */
    public function _createUser($username, $password, $role = false, $details= array()) {
        $qry = "INSERT INTO " . $this->detailTable . " ( username, password, default_password) VALUES (?,?,?)";
        $params = array($username,$this->encryptPassword($password), 1);
        if (I2CE::pearError($this->db->execParam($qry, $params,array('text', 'text', 'integer') ), "Cannot create user $username")) {
            return false;
        }
        return $this->setUserInfo($username,$role,$details);            
    }
    


    /**
     * Gets the display name for the user     
     * @param string $username
     * @param array $user user details
     * @returns string
     */
    public function displayName($username, $user) {
        $details = "";
        if ( array_key_exists("firstname", $user) ) {
            $details = $user["firstname"] . " ";
        }
        if ( array_key_exists("lastname", $user) ) {
            $details .= $user["lastname"];
        }
        return $details;
    }

     /**
      * Checks to see if the indicated detail is required
      * $param string $detail
      * returns boolean
      */
     public  function isRequired($detail) {
         return $detail == 'lastname';
     }

  }
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
