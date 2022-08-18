<?php
/**
* © Copyright 2013 IntraHealth International, Inc.
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
* @subpackage Train
* @author Luke Duncan <lduncan@intrahealth.org>
* @version v4.1.6
* @since v4.1.6
* @filesource 
*/ 
/** 
* Class iHRIS_Module_TrainAccessProvider
* 
* @access public
*/


class iHRIS_Module_TrainAccessProvider extends I2CE_ModuleAccess {

    /**
     * @var array A cached list of provider_access for a username
     */
    protected static $user_access_provider;

    /**
     * @var array A list of limit options for this module.
     */
    protected static $report_limit_options;

    /**
     * Return the list of fuzzy methods handled by this module.
     * @return array
     */
    public static function getMethods() {
        return array(
                'iHRIS_PageViewUser->action_access_provider' => 'action_access_provider',
                );
    }

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
            $provAccess = $factory->createContainer( "access_provider" );
            $forms = $provAccess->getField('provider')->getSelectableForms();
            $fields = array();
            foreach( $forms as $form ) {
                $formObj = $factory->createContainer( $form );
                if ( $formObj instanceof I2CE_Form ) {
                    $fields[$form] = $formObj->getDisplayName();
                }
                $formObj->cleanup();
                unset( $formObj );
            }
            $provAccess->cleanup();
            unset( $provAccess );
            self::$report_limit_options = array(
                    'module' => "TrainAccessProvider",
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
        $providers = self::getAccessProvider( $this->user );
        $limit_add = array();
        $form = "provider_instance";
        foreach( $providers as $user => $data ) {
            $limit_add[$form] = array( 'operator' => 'FIELD_LIMIT',
                    'field' => 'parent' );
            $id_data = (is_array($data) ? $data : array( $data ));
            //array_walk( $id_data, array( "self", "removeFormName" ),
                    //$form );
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
        $providers = self::getAccessProvider( $this->user );
        if ( count( $providers ) == 0 ) {
            return true;
        } elseif ( array_key_exists( $form, $providers ) ) {
            return $providers[$form];
        } else {
            return array();
        }
    }


    /**
     * Handle the display for the access_provider form on the view user page.
     * @return boolean
     */
    public function action_access_provider( $page ) {
        if ( !$page instanceof iHRIS_PageViewUser ) {
            return;
        }
        $template = $page->getTemplate();
        $template->appendFileById( "user_view_link_access_provider.html", "li", "user_edit_links" );

        $view_user = $page->getViewUser();
        $view_user->populateChildren("access_provider");
        if ( array_key_exists( 'access_provider', $view_user->children ) 
                && is_array( $view_user->children['access_provider'] ) ) {
            $node = $template->appendFileById( "user_view_access_provider_top.html", "div", "user_child_forms" );
            foreach( $view_user->children['access_provider'] as $child ) {
                $node = $template->appendFileById( "user_view_access_provider.html", "div", "access_provider" );
                if ( !$node instanceof DOMNode ) {
                    I2CE::raiseError( "Could not find template user_view_access_provider.html" );
                    return false;
                }
                $template->setForm( $child, $node );
            }
        }
        return true;
    }

    /**
     * Return a list of providers the user is allowed to access.
     * @param I2CE_User $user
     * @return array with keys form name, and values and array containing formids form that form
     */
    public static function getAccessProvider( $user ) {
        if ( !$user instanceof I2CE_User ) {
            return array();
        }
        $username = $user->username;
        if ( !$username ) {
            return array();
        }
        if ( !is_array( self::$user_access_provider ) ) {
            self::$user_access_provider = array();
        }
        if ( !isset( self::$user_access_provider[$username] ) ) {
            self::$user_access_provider[$username] = array();
            $user = I2CE_FormFactory::instance()->createContainer( "user|$username" );
            $user->populateChildren( "access_provider" );
            if ( array_key_exists( 'access_provider', $user->children ) 
                    && is_array( $user->children['access_provider'] ) ) {
                foreach( $user->children['access_provider'] as $child ) {
                    $ff = $child->getField("provider");
                    self::$user_access_provider[$username][] =
                        $ff->getDBValue();
                }
            }
        }
        return self::$user_access_provider[$username];
    }
    

    /**
     * See if the person is allowed to view this node based on the provider
     *  @param DOMNode $node
     * @param I2CE_Template $template
     * @param string $link
     */
    public function userAccessProvider($node,$template) {
        // This should only work for the training_provider role so ignore any others.
        if ( $template->getUser()->getRole() != "training_provider" ) {
            return false;
        }
        if ( !$template instanceof I2CE_Template) {
            return false;
        }
        if (!$node instanceof DOMNode) {
            $node = null;
        }
        if ( ! ($provider = $template->getForm('trainingprovider',$node)) instanceof iHRIS_TrainingProvider) {
            //No provider associated with this node.  so this user can't have permission
            return false;
        }

        $access = self::getAccessProvider( $template->getUser() ); // a list of providers a user is allowed to access
        if ( count( $access ) == 0 ) {
            return false;
        }
        if ( in_array( $provider->getNameId(), $access ) ) {
            return true;
        }
        return false;
        
    }


    /**
     * Template function to link to the provider associated with this person.
     * @param DOMNode $node
     * @param I2CE_Template $template
     * @param string $link
     */
    public function linkToProvider( $node, $template, $link ) {
        if ( !$node instanceof DOMNOde || !$template instanceof I2CE_Template ||
                !$node->parentNode instanceof DOMNode || $template->getUser()->getRole() != "training_provider" ) {
            $template->removeNode( $node );
            return;
        }
        $access = self::getAccessProvider( $template->getUser() );
        if ( count($access) > 0 ) {
            $a = $template->createElement( 'a', array( 'href' => $link . $access[0] ) );
            $node->parentNode->replaceChild( $a, $node );
            while( $node->firstChild instanceof DOMNode ) {
                $a->appendChild( $node->firstChild );
            }
            return;
        }
        $template->removeNode( $node );
    }

}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
