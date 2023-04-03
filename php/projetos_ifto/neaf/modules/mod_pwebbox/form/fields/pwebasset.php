<?php
/**
 * @package     pwebbox
 * @version 	2.0.0
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');
jimport('joomla.filesystem.file');

class JFormFieldPwebAsset extends JFormField
{
    protected $type = 'PwebAsset';

    /**
     * Method to get the field input markup.
     *
     * @return	string	The field input markup.
     * @since	1.6
     */
    protected function getInput()
    {
        
        $doc = JFactory::getDocument();
        
        if (class_exists('JHtmlJquery')) 
        {        
            JHtml::_('jquery.framework');
        }
        else
        {
            $doc->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');
        }            
        
        // Main admin js script.
        $doc->addScript(JURI::root(true) . '/media/mod_pwebbox/js/admin.js');
        // Main admin style.
        $doc->addStyleSheet(JURI::root(true) . '/media/mod_pwebbox/css/admin.css');
        
        // Statically add  asset for minicolors.
        if (JFile::exists(JPATH_ROOT . '/media/jui/css/jquery.minicolors.css')) {
            $doc->addStyleSheet(JURI::root(true) . '/media/jui/css/jquery.minicolors.css');
        }
        if (JFile::exists(JPATH_ROOT . '/media/jui/js/jquery.minicolors.min.js')) {
            $doc->addScript(JURI::root(true) . '/media/jui/js/jquery.minicolors.min.js');
        }
        
        // Statically add  asset for modal boxes.
        if (JFile::exists(JPATH_ROOT . '/media/system/css/modal.css')) {
            $doc->addStyleSheet(JURI::root(true) . '/media/system/css/modal.css');
        }
        if (JFile::exists(JPATH_ROOT . '/media/system/js/mootools-core.js')) {
            $doc->addScript(JURI::root(true) . '/media/system/js/mootools-core.js');   
        }
        if (JFile::exists(JPATH_ROOT . '/media/system/js/mootools-more.js')) {
            $doc->addScript(JURI::root(true) . '/media/system/js/mootools-more.js');   
        }
        if (JFile::exists(JPATH_ROOT . '/media/system/js/modal.js')) {
            $doc->addScript(JURI::root(true) . '/media/system/js/modal.js');     
        }
        
        // Statically add ZOO Application asset.
        if (JFile::exists(JPATH_ADMINISTRATOR . '/components/com_zoo/helpers/fields/zooapplication.css')) {
            $doc->addStyleSheet(JURI::root(true) . '/administrator/components/com_zoo/helpers/fields/zooapplication.css'); //?ver=20150306
        }
        
        // Script wasn't working for J!2.5.
        //if (version_compare(JVERSION, '3.0.0') == -1)
        {        
            if (JFile::exists(JPATH_ADMINISTRATOR . '/components/com_zoo/helpers/fields/zooapplication.js')) {
                $doc->addScript(JURI::root(true) . '/administrator/components/com_zoo/helpers/fields/zooapplication.js'); //?ver=20150306
            }
        }
        
        // Add the Google Maps API JavaScript only if googlemaps plugin js exist.
        if (JFile::exists(JPATH_ROOT . '/media/plg_everything_in_everyway_google_maps/js/admin.js')) {
            $plugin = $this->form->getValue('plugin', 'params');
            $gm_api_key_param = '';
            if ($plugin == 'google_maps') {
                $plugin_config = new JRegistry($this->form->getValue('plugin_config', 'params'));
                $plugin_params = new JRegistry($plugin_config->get('params'));
                $gm_api_key    = $plugin_params->get('api_key');
                if ($gm_api_key) {
                    $gm_api_key_param .= '&key=' . $gm_api_key;
                }
            }

            $doc->addScript('//maps.googleapis.com/maps/api/js?v=3.exp'.$gm_api_key_param);
        } 
        
        // Add the Bing Maps API JavaScript only if bing_maps plugin js exist.
        if (JFile::exists(JPATH_ROOT . '/media/plg_everything_in_everyway_bing_maps/js/admin.js')) {
            $ssl = ''; // s parameter for ssl
            if (strpos(JUri::root(false), 'https://') !== false)
            {
                $ssl = '&s=1';
            }           
            $doc->addScript('//ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0' . $ssl);          
        } 
        
        return null;
    }

}
