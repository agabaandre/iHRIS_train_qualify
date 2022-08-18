<?php
/**
 * @copyright © 2007, 2008, 2009 Intrahealth International, Inc.
 * This File is part of I2CE
 *
 * I2CE is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by
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
 * @author Luke Duncan <lduncan@intrahealth.org>
 * @since v3.0.0
 * @version v3.0.0
 */

/**
 * Deps.
 */
require_once "I2CE_MagicDataStorage.php";
require_once "MDB2.php";

if (!class_exists('I2CE_MagicDataStorageDB',false)) {

/**
 * Configuration class to lookup and save configuration options.
 * @package I2CE 
 * @access public
 */
    class I2CE_MagicDataStorageDB extends I2CE_MagicDataStorage {

        /**
         * @var array An array of prepared statements for looking up stored magic data.
         */
        private $db_statements;


        /**
         *Renames a child node
         * @param I2CE_MagicDataNode $node
         *@param string $old
         *@param string $new
         *@returns boolean.  True on success, false on failure
         */        
        public function renameChild($node,$old,$new) {
            I2CE::raiseError("Not implemented");
            return false;
        }

        public function __construct($name) {
            parent::__construct($name);
            $this->setUpStatements();
        }

        /**
         * Set up a cache of prepared statements.
         * @return MDB2_Statement_Common
         */
        protected function setUpStatements() {
            $this->db_statements  = array();
            $db = MDB2::singleton();
            $this->db_statements['retrieve']
                =$db->prepare( "SELECT type,value,children FROM " . $this->name . " WHERE hash = ? LIMIT 1", 
                                 array( 'text' ), array( 'integer', 'text', 'text' ) );
            $this->db_statements['destroy']
                =$db->prepare( "DELETE  FROM " . $this->name . " WHERE hash = ? LIMIT 1", array('text'), MDB2_PREPARE_RESULT );
            $this->db_statements['store'] 
                = $db->prepare( "REPLACE INTO " . $this->name 
                                . " ( hash, path, type, value, children ) VALUES ( ?, ?, ?, ?, ? )", 
                                array( 'text', 'text', 'integer', 'text', 'text' ) );
            foreach ($this->db_statements as $type=>$db_stmt) {
                if ( PEAR::isError( $db_stmt ) ) {
                    unset($this->db_statements[$type]);
                }
            }
        }


        
        /**
         * Store the given I2CE_MagicDataNode into the database.
         * @param I2CE_MagicDataNode $node
         */
        public function store( $node ){
            $hash = $this->getHash( $node );
            $value = $node->getSaveValue();
            $children = $node->getKeys(null,true);
            if ( count( $children ) > 0 ) {
                $children_str = implode( ",", $children );
            } else {
                $children_str = null;
            }
            if($this->db_statements['store']->
               execute( array( $hash, $node->getPath(),
                               $node->getType(), $value, $children_str ) )) {
                return TRUE;
            }
            else {
                I2CE_MagicDataNode::raiseError( "Error saving to DB " . $node->getPath() .
                                                " Type: " . $node->getType() . 
                                                " Value: " . $value .
                                                " Children: " . implode(',',$children) );
                return FALSE;
            }
        }
        /**
         * Retrieve the given I2CE_MagicDataNode value and type.
         * @param I2CE_MagicDataNode $node
         * @return array
         */
        public function retrieve( $node ) {
            $hash = $this->getHash( $node );
            $result = $this->db_statements['retrieve']->execute( array( $hash ) );
            if (I2CE::pearError($result,"Cannot retrieve " . $node->getPath() . " from DB:")) {
                return false;
            }
            if ( $row = $result->fetchRow() ) {
                if ( $row->type !== null ) {
                    return array( "type" => $row->type, "value" => $row->value, 
                                  "children" => (strlen( $row->children ) > 0 ? explode( ",", $row->children ) : null ) );
                }
            }
            return false;
        }

        /**
         * Returns true if this storage mechanism is ready to be used.  false otherwise.
         */
        public function isAvailable() {
            $qry = 'SHOW TABLES LIKE "config"';
            $result = MDB2::singleton()->query($qry);
            if (I2CE::pearError($result,"Cannot access database")) {
                return false;
            }
            if ($result->numRows() == 0) {
                return false;
            }
            if (count($this->db_statements) < 3) {
                return false;
            }
            return true;
        }


        public function destroy($node) {
            $hash = $this->getHash( $node );
            $result = $this->db_statements['destroy']->execute( array( $hash ) );
            return !I2CE::pearError($result,"Cannot destroy " . $node->getPath() . " from DB:");
        }


        /**
         * Clear the all keys/values associated with this storage 
         * @return boolean
         */
        public function clear() {
            return !I2CE::pearError( MDB2::singleton()->exec("DELETE  FROM " . $this->name),"Unable to clear DB magic data table {$this->name}");
        }



    }

}
# Local Variables:
# mode: php
# c-default-style: bsd
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
