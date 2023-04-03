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

class JFormFieldPwebContent extends JFormField
{
    protected $type = 'PwebContent';

    /**
     * Method to get the field input markup.
     *
     * @return	string	The field input markup.
     * @since	1.6
     */
    protected function getInput()
    {
        // Add lang variables to js script.
        JText::script('MOD_PWEBBOX_BUTTON_LINK_DOWNLOAD_GROUP_LABEL');
        JText::script('MOD_PWEBBOX_BUTTON_LINK_UPDATE_LABEL');
        JText::script('MOD_PWEBBOX_NEW_LABEL');
        JText::script('MOD_PWEBBOX_NEW_LETTER_LABEL');
        JText::script('MOD_PWEBBOX_POPULAR_LABEL');
        JText::script('MOD_PWEBBOX_POPULAR_LETTER_LABEL');
        JText::script('MOD_PWEBBOX_COMMING_SOON_LABEL');
        JText::script('MOD_PWEBBOX_PLUGIN_NOT_ENABLED');
        
        $doc = JFactory::getDocument();
        $db = JFactory::getDbo();
        
        // Collect info from mod_pwebbox_response.json file on local site.
        $info_file_client_path = JPATH_ROOT . '/cache/mod_everything_in_everyway/mod_pwebbox_response.json';
        $plugins_all = array();
        if (JFile::exists($info_file_client_path))
        {
            $info_file_client = file_get_contents($info_file_client_path);
            
            $info_client = json_decode($info_file_client);
            
            // Use of array('plugin_name') to force order from everyway_info.json file.
            foreach ($info_client->response->plugins as $info_client_plugin)
            {
                $plugins_all[$info_client_plugin->name] = $info_client_plugin;
                $plugins_all[$info_client_plugin->name]->installed = false;
                $plugins_all[$info_client_plugin->name]->active = false;
                $plugins_all[$info_client_plugin->name]->element = null;
                $plugins_all[$info_client_plugin->name]->manifest_cache = null;
                $plugins_all[$info_client_plugin->name]->enabled = false;
            }
        }
        
        // Collect info about installed plugins.
	$query = $db->getQuery(true);
        
        $conditions = array(
                            $db->quoteName('type') . ' = ' . $db->quote('plugin'),
                            $db->quoteName('folder') . ' = ' . $db->quote('everything_in_everyway')
                        );
        
        $query->select(array('name', 'element', 'enabled', 'manifest_cache'))
                ->from('#__extensions')
                ->where($conditions);

        $db->setQuery($query);

        try 
        {
                $plugins_installed = $db->loadObjectList();
        } catch (Exception $e) {
                $plugins_installed = null;
        }
        
        $active_plugin = $this->form->getValue('plugin', 'params');  
        
        $plugin_for_ajax_call = '';
        
        // Iterate over all installed plugins to gather its info.
        foreach ($plugins_installed as $plugin_installed)
        {                             
            // If plugin wasn't in everyway_info.json file on client site.
            if (!array_key_exists($plugin_installed->name, $plugins_all))
            {
                $plugins_all[$plugin_installed->name] = new stdClass();
                $plugins_all[$plugin_installed->name]->name = $plugin_installed->name;
                $plugins_all[$plugin_installed->name]->image = null;
                $plugins_all[$plugin_installed->name]->active = false;
                $plugins_all[$plugin_installed->name]->version = null;
                $plugins_all[$plugin_installed->name]->new = false;
                $plugins_all[$plugin_installed->name]->popular = false;
            }
            
            $plugins_all[$plugin_installed->name]->installed = true;
            
            // Set plugin as active if it is chosen in module.
            if ($active_plugin == $plugin_installed->element)
            {
                $plugins_all[$plugin_installed->name]->active = true;
            }               
            
            $plugins_all[$plugin_installed->name]->element = $plugin_installed->element;
            $plugins_all[$plugin_installed->name]->manifest_cache = json_decode($plugin_installed->manifest_cache);  
            $plugins_all[$plugin_installed->name]->enabled = $plugin_installed->enabled;  
            
            // Get enabled plugin for ajax call.
            if (!$plugin_for_ajax_call && $plugin_installed->enabled)
            {
                $plugin_for_ajax_call = $plugin_installed->element;
            }
        }
        
        $media_path = JPATH_ROOT . '/media/mod_pwebbox/';
        $media_url = JURI::root(true) . '/media/mod_pwebbox/';        
        
        $html = ''; 
        
        foreach ($plugins_all as $plugin)
        {
            // For J!2.5
            if ($plugin->name == 'instance_config')
            {
                continue;
            }
            
            $additional_info = '';
            $disabled = '';
            $mark = '';
            $active_class = '';

            if ($plugin->active)
            {
                $active_class = 'active';
            }            
            
            // Get plugin image.
            
            // First from pweb server.
            $image_src = $plugin->image;
            
            // If file exists on client server get it instead.
            $image_name = strtolower(str_replace(' ', '_', trim($plugin->name)));
            // If plugin installed get img for its media folder.
            if ($plugin->installed)
            {            
                $plg_media_path = JPATH_ROOT . '/media/plg_everything_in_everyway_' . $plugin->element . '/';
                $plg_media_url = JURI::root(true) . '/media/plg_everything_in_everyway_' . $plugin->element . '/';   
                
                $image_exist = false;
                
                if (JFile::exists($plg_media_path . 'images/' . $image_name . '.jpg')) 
                {
                    $image_src = $plg_media_url . 'images/' . $image_name . '.jpg';
                    $image_exist = true;
                }
                else if (JFile::exists($plg_media_path . 'images/' . $image_name . '.png')) 
                {
                    $image_src = $plg_media_url . 'images/' . $image_name . '.png';
                    $image_exist = true;
                } 
                
                // If image exist in plugin media folder, then remove plugin image from module media folder.
                if ($image_exist) 
                {
                    if (JFile::exists($media_path . 'images/admin/content_btns/' . $image_name . '.png')) 
                    {
                        JFile::delete($media_path . 'images/admin/content_btns/' . $image_name . '.png');
                    }
                    else if (JFile::exists($media_path . 'images/admin/content_btns/' . $image_name . '.jpg')) 
                    {
                        JFile::delete($media_path . 'images/admin/content_btns/' . $image_name . '.jpg');
                    }                 
                }
            }
            else
            {
                if (JFile::exists($media_path . 'images/admin/content_btns/' . $image_name . '.jpg')) 
                {
                    $image_src = $media_url . 'images/admin/content_btns/' . $image_name . '.jpg';
                } 
                else if (JFile::exists($media_path . 'images/admin/content_btns/' . $image_name . '.png')) 
                {
                    $image_src = $media_url . 'images/admin/content_btns/' . $image_name . '.png';
                }               
            }
            
            $image = '<img src="' . $image_src . '" alt="' . $plugin->name . '" title="' . $plugin->name . '">';
            
            $info_class = '';
                        
            if ($plugin->installed)
            {
                // If plugin is installed check if it is newest version.
                if (version_compare($plugin->manifest_cache->version, $plugin->version) == -1)
                {
                    $additional_info = '<a href="index.php?option=com_installer&view=update" class="btn btn-warning pweb-btn-update pweb-cant-override-update" target="_blank">' . JText::_('MOD_PWEBBOX_BUTTON_LINK_UPDATE_LABEL') . '</a>';
                }
                elseif (!$plugin->enabled)
                {
                    $info_class = 'not-selectable';
                    $disabled = 'disabled';
                    $additional_info = '<a href="index.php?option=com_plugins&view=plugins&filter_folder=everything_in_everyway" class="btn btn-danger" target="_blank">' . JText::_('MOD_PWEBBOX_BUTTON_LINK_ENABLE_LABEL') . '</a>';
                }
            }
            else
            {
                $info_class = 'not-selectable';
                $disabled = 'disabled';
                // If plugin is not installed then add button to buy or download (for free plugins).

                // Link to buy plugin.
                if ($plugin->price) 
                {
                    $additional_info = '<a href="' . $plugin->url . '" class="btn btn-warning pweb-cant-override-update" target="_blank">' . $plugin->price . '</a>';
                }
                // Button to download plugin.
                else
                {
                    if ($plugin->url)
                    {
                        $additional_info = '<button type="button" data-url="' . $plugin->url . '" data-token="' . JSession::getFormToken() . '" class="btn btn-success pweb-btn-install-content pweb-cant-override-update" >' . JText::_('MOD_PWEBBOX_BUTTON_LINK_DOWNLOAD_GROUP_LABEL') . '</button>';
                    }
                    else
                    {
                        $additional_info = JText::_('MOD_PWEBBOX_COMMING_SOON_LABEL');
                    }
                }
                
                // Set mark for not installed plugins.
                if ($plugin->new)
                {
                    $mark = '<div class="mark-wrapper"><span class="mark mark-new">' . JText::_('MOD_PWEBBOX_NEW_LABEL') . ' <span>' .  JText::_('MOD_PWEBBOX_NEW_LETTER_LABEL') . '</span></span></div>';
                }
                elseif ($plugin->popular)
                {
                    $mark = '<div class="mark-wrapper"><span class="mark mark-popular">' . JText::_('MOD_PWEBBOX_POPULAR_LABEL') . ' <span>' .  JText::_('MOD_PWEBBOX_POPULAR_LETTER_LABEL') . '</span></span></div>';
                }                
            }  
            
            $plg_version = '';
            
            // Take plg version first from db (for installed plugins), second from json cache.
            if (empty($plugin->manifest_cache->version) && !empty($plugin->version)) 
            {
                $plg_version = $plugin->version;
            }
            else {
                $plg_version = $plugin->manifest_cache->version;                
            }
            
            $default_config = '';
            if ($plugin->installed)
            {
                $default_config_file = JPATH_ROOT . '/media/plg_everything_in_everyway_' . $plugin->element . '/default_config.json';
                
                if (JFile::exists($default_config_file))
                {
                    $default_config_file_data = json_decode(file_get_contents($default_config_file));
                    $default_config = 'data-default-config=\'' . json_encode($default_config_file_data) . '\'';
                }
            }
            
            $html   .=  '<div class="pweb-btn-content-wrapper ' . $active_class . ' ' . $info_class . '">'
                    .       $mark
                    .       '<div class="pweb-btn-content-wrapper-in">'
                    .           '<button id="pweb_btn_content_' . $plugin->element . '" type="button" class="pweb-btn-large  pweb-button-content" data-name="' . $plugin->name . '" data-version="' . $plg_version . '" data-content="' . $plugin->element . '" ' . $default_config . ' ' . $disabled . '>'
                    .               $image
                    .           '</button>'
                    .       '</div>'
                    .       '<div class="text-center">' . $additional_info . '</div>'
                    .   '</div>';
        }
        
        //$plugins_info = json_encode($plugins_all);  
        
        // Communicate with pweb serwer only if mod_pwebbox_response.json doesn't exists or its request_date is older than one day.
        if (empty($info_client->request_date) || strtotime($info_client->request_date) <= strtotime('-1 day')) 
        {
            $request_date = empty($info_client->request_date) ? null : $info_client->request_date;
            
            $doc->addScriptDeclaration('
                        jQuery(document).ready(function ($) {
                            if (typeof pwebServerCommunication !== "undefined" && $.isFunction(pwebServerCommunication)) {
                                pwebServerCommunication(\'' . $request_date . '\', \'' . JVERSION . '\', \'' . $plugin_for_ajax_call . '\');
                            }
                        });
                    ');
        }
        
        $html .= '<input id="pwebFormToken" type="hidden" value="' . JSession::getFormToken() . '">';
        
        // Add "Buy all plugins!"
        $buy_all_btn_text = JText::_('MOD_PWEBBOX_BUTTON_LINK_PRICE_ALL_LABEL');
        $buy_all_url = '';
        if (isset($info_client->response->bundle))
        {
            $buy_all_btn_text = isset($info_client->response->bundle->price) ? $info_client->response->bundle->price : JText::_('MOD_PWEBBOX_BUTTON_LINK_PRICE_ALL_LABEL');
            $buy_all_url = isset($info_client->response->bundle->url) ? $info_client->response->bundle->url : '';
        }
        $html .= '<div class="pweb-container row-fluid pweb-container-buy-all">'
                .   '<div class="pweb-container span12">'
                .       '<a id="buy_all_plugins" href="' . $buy_all_url . '" class="btn btn-warning btn-block pweb-btn-medium" target="_blank">'
                .           $buy_all_btn_text
                .       '</a>'
                .   '</div>'
                .'</div>';
        
        // For J!3.2.x and J!3.3.x version info.
        if (version_compare(JVERSION, '3.2.0') >= 0 && version_compare(JVERSION, '3.4.0') == -1)
        {
            $html .= '<div id="com_ajax_update_error" class="pweb-hidden" style="display: none">' . JText::sprintf('MOD_PWEBBOX_PLUGIN_NOT_ENABLED_UPDATE_COM_AJAX', 
                            '<a href="https://www.perfect-web.co/downloads/joomla-3-ui-libraries-for-joomla-25/latest/com_ajax-zip?format=raw" target="_blank">', '</a>') . '</div>';
        }
        
        return $html;
    }

}
