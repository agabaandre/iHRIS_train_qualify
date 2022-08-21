<?php
/**
 * @copyright © 2014 Intrahealth International, Inc.
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
    * @author Carl Leitner <litlfred@ibiblio.org>
    * @author Luke Duncan <lduncan@intrahealth.org>
    * @since v4.1.10
    * @version v4.1.10
    */
/**
 * Class for defining the binary file field used by a {@link I2CE_Form} object.
 * @package I2CE
 * @access public
 */
abstract class I2CE_FormField_STORE_BINARY_FILE extends I2CE_FormField_DB_BLOB {


    /**
     * Get the file name associated with this binary field.  
     * If none, it will generate one based on the form and field.
     * @return string
     */
    abstract public function getFileName();

    /**
     * Return the last modification time of this field or false if unknown.
     * @return mixed
     */
    abstract public function getModTime();

    /**
     * Store the data in a temporary location.
     * This to call the specific storage used.
     */
    public function storeInTemporaryLocation() {
        $this->storeInTemporaryTable();
    }

    /**
     * Load the value from the temporary location.
     * This to call the specific storage used.
     */
    public function setFromTemporaryLocation() {
        $this->setFromTemporaryTable();
    }

    /**
     * Set the data from post for a file upload
     * @param string $file
     * @param intenger $size
     * @param string $name
     * @param string $type
     * @return boolean;
     */
    protected function setFromPostUpload( $file, $size, $name, $type ) {
        $data = file_get_contents( $file );
        if ( strlen( $data ) != $size ) {
            // an error occurred somehow
            I2CE::raiseError( "Unable to read uploaded file $name\n" . strlen($data) . " != $size" );
            $data = null;
            return false;
        }
        $this->setFromData( $data, $name, $type );
        return true;
    }


    protected function setValueFromTempFile() {
        if ( !$this->temp_file || !file_exists( $this->temp_file ) ) {
            I2CE::raiseError( "Failed to load binary file from missing temp file!");
            return false;
        }
        parent::setFromDB( file_get_contents( $this->temp_file ) );
    }

    /**
     * Gets the length of the conten
     * @returns int
     */
    public function getContentLength() {
        return strlen($this->value);
    }

    /**
     * Set's the  key used for the temporary upload table
     * @praram string
     */
    public function setTempKey($key) {
        $this->tmp_key = $key;
    }


    /**
     * @var protected string $tmp_key
     */
    protected $tmp_key;

 
    protected static $setStmt;
    protected static $storeStmt;
    /**
     * Load this value from the temporary upload table
     * @param $key;
     */
    public function setFromTemporaryTable() {
        if (!$this->tmp_key) {
            return false;
        }
        if (! self::$setStmt) {
            $db = MDB2::singleton();       
            $stmt = $db->prepare("SELECT `value` FROM `temp_upload` WHERE `key` = ?",  array( 'text' ), MDB2_PREPARE_RESULT );            
            if (I2CE::pearError($stmt, "Error creating temp_upload read stement")) {
                return false;
            }
            self::$setStmt = $stmt;
        }
        $res = self::$setStmt->execute($this->tmp_key);
        if (I2CE::pearError($res,"Error reading from tmp_upload temporary ")) {
            return false;
        }
        if ( !($row = $res->fetchRow() ) || !$row->value) {
            I2CE::raiseError("No data read");
            return ;
        }
        $this->setFromDB($row->value);
        //$this->tmp_key = false;
    }

    /**
     * Load this value from the temporary upload table
     * @param $key;
     */
    public function storeInTemporaryTable() {
        if (!$this->tmp_key) {
            return false;
        }
        if (! self::$storeStmt) {
            $db = MDB2::singleton();
            $stmt = $db->prepare( "REPLACE INTO `temp_upload` (`key`,`value`) VALUES (?,?)",  array( 'text', 'blob' ), MDB2_PREPARE_MANIP );            
            if (I2CE::pearError($stmt,"Error creating store stement")) {
                return false;
            }
            self::$storeStmt = $stmt;
        }
        $res = self::$storeStmt->execute(array($this->tmp_key,$this->getDBValue()));
        if (I2CE::pearError($res, "Could not store into temp_upload")) {
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
