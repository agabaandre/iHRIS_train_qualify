<?php
/*
 * © Copyright 2007, 2008 IntraHealth International, Inc.
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
 */
/**
 * View a person's record.
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 * @author Luke Duncan <lduncan@intrahealth.org>
 * @copyright Copyright &copy; 2007, 2008 IntraHealth International, Inc. 
 * @since v2.0.0
 * @version v2.0.0
 */

/**
 * The page class for displaying the a person's record.
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 */
class iHRIS_PageViewTab extends iHRIS_PageView{ 

    /**
     * Load the  template (HTML or XML) files to the template object.
     *  
     * 
     */  
    protected function loadHTMLTemplates() {
        parent::loadHTMLTemplates();
        $this->template->addHeaderLink("I2CE_AjaxTabPanel.js");
        $this->template->addHeaderLink('tabs.css');
    }
    
    protected function action() {
    
	    $selected = "Individual";
	    
	    if ($this->request_exists('selected_tab') 
                && is_scalar($this->request('selected_tab'))) {
            $selected = $this->request('selected_tab');
        }else{
            I2CE::raiseError("could not find 'select_tab' " . $selected);
        }
        I2CE::raiseError("'select_tab' before " . $selected);
        $selected = preg_replace('/[^a-zA-Z0-9_\,]/s','',$selected);
        I2CE::raiseError("'select_tab' is " . $selected);
        $js = 'document.addEvent("domready", function() {
                var tab = new I2CE_AjaxTabPanel("tab_panel");
                if (tab) { tab.showTab("' . addslashes($selected) . '");}});';
        $this->template->addHeaderText($js,'script','create_tabs');
	    return parent::action();
       }
       
    
  }



# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
