<?php
/**
 * @package     pwebbox
 * @version 	2.0.0
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die('Restricted access');

JFormHelper::loadFieldClass('Radio');

class JFormFieldPwebPlugin extends JFormFieldRadio
{
    protected $type = 'PwebPlugin';

    /**
     * Method to get the field input markup.
     *
     * @return	string	The field input markup.
     * @since	1.6
     */
    protected function getInput()
    {
        $plugin = $this->form->getValue('plugin', 'params');
        
        if ($plugin && !empty($this->value) && is_array($this->value)) {
            $doc = JFactory::getDocument();
            
            // Make code safe for display.
	        if (in_array($plugin, array('custom_html', 'google_maps', 'bing_maps', 'acymailing', 'freshmail', 'mailchimp')))
            {
                // Make safe only html code - wasn't working well.
                //$this->value['params']['html_code'] = str_replace("'", '"', $this->value['params']['html_code']);
                //$this->value['params']['html_code'] = $this->makeStringSafe($this->value['params']['html_code']);
                
                // Make safe all parameters after json encode.
                $jsonValue = $this->makeStringSafe(json_encode($this->value));
            }
            else if ($plugin == 'instagram_embedded_post')
            {
                $jsonValue = $this->makeStringSafe(json_encode($this->value));
            }
            else
            {
                $jsonValue = json_encode($this->value, JSON_HEX_APOS);
            }
            
            $doc->addScriptDeclaration('
                jQuery(document).ready(function ($) {
                    if (typeof getPluginFormWithValues !== "undefined" && $.isFunction(getPluginFormWithValues)) {
                        getPluginFormWithValues(\'' . $plugin . '\', \'' . $jsonValue . '\');
                    }
                });
            ');
        }
        
        return parent::getInput();
    }

    /**
     * Method mimic mysql_real_escape_string/mysqli_real_escape_string functionality without db connection.
     */
    protected function makeStringSafe($inp) { 
        if(is_array($inp)) 
        {
            return array_map(__METHOD__, $inp); 
        }

        if(!empty($inp) && is_string($inp)) 
        { 
            return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\'", '\"', '\\Z'), $inp); 
        } 

        return $inp; 
    }

	/**
	 * Override for notice :(
	 * @return array
	 */
	protected function getLayoutData()
	{
		// parent tried to cast $this->value to string, but we store there params of this fields,
		// so we need to remove it in old school way, fast and easy to understand ; )
		$data = @parent::getLayoutData();

		return $data;
	}
}
