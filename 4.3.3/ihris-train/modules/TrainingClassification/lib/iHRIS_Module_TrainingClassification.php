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
*
* @package ihris-common
* @author Carl Leitner <litlfred@ibiblio.org>
* @version v3.2
* @since v3.2
* @filesource
*/
/**
* Class iHRIS_Module_TrainingClassification
*
* @access public
*/


class iHRIS_Module_TrainingClassification extends I2CE_Module {

  
    public static function getMethods() {
        return array(
            'iHRIS_PageView->action_training_classification' => 'action_training_classification'
            );
    }


    public function action_training_classification($obj) {
        if (!$obj instanceof iHRIS_PageView) {
            return;
        }
        return $obj->addChildForms('training_classification', 'siteContent');
    }
    

    /**
     * @var boolean a flag to determine if migrate needs to be called during the upgrade method.
     */
    protected $do_migrate;

    /**
     * Perform any pre migrate actions for this module.
     * This is for going from pre 4.1.8 versions where classifications were saved to entry storage.
     * @return boolean
     */
    protected function pre_migrate() {
        $migrate_path = "/I2CE/formsData/migrate_data/4.1.8";
        I2CE_FormStorage::storeMigrateData( array( "training" => array( "training_classification" ) ), $migrate_path );
        $this->do_migrate = true;
        return true;
    }

    /**
     * Perform the migrate actions for this module.
     * @return boolean
     */
    protected function migrate() {
        $user = new I2CE_User( 1, false, false, false );
        $class_config = I2CE::getConfig()->modules->forms->formClasses;
        $migrate_path = "/I2CE/formsData/migrate_data/4.1.8";
        if ( !I2CE_FormStorage::migrateForm( "training_classification", "entry", $user, $migrate_path ) ) {
            return false;
        }
        if ( I2CE_ModuleFactory::instance()->isEnabled("CachedForms") ) {
            $cachedForm = new I2CE_CachedForm( "training_classification" );
            $cachedForm->dropTable();
        }
        if ( !I2CE_FormStorage::migrateField( "training", array( "training_classification" => "training_classification" ),
                    $migrate_path, $user ) ) {
            return false;
        }
        return true;
    }

    /**
     * Run the pre upgrade for this module.  This can use the old config data before it has 
     * been changed from the config
     * @param string $old_vers
     * @param string $new_vers
     * @param I2CE_MagicDataNode $new_storage
     * @return boolean
     */
    public function pre_upgrade( $old_vers, $new_vers, $new_storage ) {
        if ( I2CE_Validate::checkVersion( $old_vers, '<', '4.1.8.0' ) ) {
            if ( !$this->pre_migrate() ) {
                return false;
            }
        }
        return parent::pre_upgrade( $old_vers, $new_vers, $new_storage );
    }

    /**
     * Upgrade this module if necessary
     * @param string $old_vers
     * @param string $new_vers
     * @return boolean
     */
    public function post_update( $old_vers, $new_vers ) {
        /*
         * In 4.1.8 the training_classification form was moved to magicdata storage 
         * instead of entry
         */
        if ( $this->do_migrate ) {
            if ( !$this->migrate() ) {
                return false;
            }
        }
        return parent::post_update( $old_vers, $new_vers );
    }



}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
