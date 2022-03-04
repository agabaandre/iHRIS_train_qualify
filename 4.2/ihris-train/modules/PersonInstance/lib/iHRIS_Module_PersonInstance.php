<?php
class iHRIS_Module_PersonInstance extends I2CE_Module {
    public static function getMethods() {
        return array(
            'iHRIS_PageView->action_person_instance' => 'action_person_instance'

            );
    }
    public function action_person_instance($obj) {
        if (!$obj instanceof iHRIS_PageView) {
            return;
        }

        $person = $obj->getPerson();

        $where = array (
                            'operator' => 'FIELD_LIMIT',
                            'field' => 'attending',
                            'style' => 'yes',
                   );

        $person->populateChild('person_instance',null,$where);

        foreach( $person->children['person_instance'] as $key => $child ) {

            $provider_instance = $child->getField('provider_instance')->getMappedFormObject();

            if ( $provider_instance->end_date instanceof I2CE_Date && $provider_instance->end_date->before( I2CE_Date::now() ) ) {

                unset( $person->children['person_instance'][$key] );

            }

        }

        return $obj->appendChildTemplate('person_instance');

    }

}
 
?>
