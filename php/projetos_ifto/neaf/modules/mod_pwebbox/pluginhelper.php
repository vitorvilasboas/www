<?php
/**
 * @package     pwebbox
 * @version 	2.0.0
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

jimport('joomla.form.form');
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

class modPwebboxPluginHelper
{
    public static function getParams($plugin, $plugin_type, $plugin_name, $asset = null)
    {
        $jinput  = JFactory::getApplication()->input;
        $data = json_decode($jinput->get('data', null, 'raw'));
        // Load the language file on instantiation.
        $plugin->loadLanguage('plg_' . $plugin_type . '_' . $plugin_name); 
        
        JForm::addFormPath(JPATH_PLUGINS . '/everything_in_everyway/' . $plugin_name);
        //JForm::addFieldPath(JPATH_PLUGINS . '/pwebbox/' . $plugin . '/fields');
        $plugin_form = JForm::getInstance('mod_pwebbox.' . $plugin_name, 'instance_config', array('control' => 'jform[params][plugin_config]'));
        if (is_object($data) || is_array($data)) {
            $plugin_form->bind($data);
        }
        
        $params = '';
        
        if (version_compare(JVERSION, '3.2.4') == -1)
        {
		$fields = $plugin_form->getFieldset('module');
		$html = array();

		foreach ($fields as $field)
		{
			//$html[] = $field->renderField();
                        $html[] = '<div class="control-group">';
                        $html[] =   '<div class="control-label">';
			$html[] =       $field->label;
                        $html[] =   '</div>';
                        $html[] =   '<div class="controls">';
                        $html[] =       $field->input;
                        $html[] =   '</div>';
                        $html[] = '</div>';
		}

		$params = implode('', $html);            
        }   
        else
        {
            $params = $plugin_form->renderFieldset('module');
        }
        
        $response = array(
            'params'    => $params,
            'asset'     => $asset,
            'plugin'    => $plugin_name,
            'data'      => $data,
        );
        
        return $response;
    }
    
    public static function setServerResponse($data)
    {
        $newResponseDataArray = array();
        
        $currentDt = new DateTime();

        $cache_folder = JPATH_ROOT . '/cache/mod_everything_in_everyway/';
        if (!JFolder::exists($cache_folder))
        {
            JFolder::create($cache_folder);
        }
        $response_file = $cache_folder . 'mod_pwebbox_response.json';        
        
        $newResponseDataArray['request_date'] = $currentDt->format('Y-m-d H:i:s');
        
        // If only request_date will be updated (we know that file exists from js).
        /*if (!empty($data['update_only_request_date']))
        {
            $info_file_local = file_get_contents($response_file);
            $info_local = json_decode($info_file_local);
            $info_local->request_date = $newResponseDataArray['request_date'];
            $new_info_local = json_encode($info_local);
            
            JFile::write($response_file, $new_info_local);
            
            return true;
        }*/
        
        $newResponseDataArray['response'] = $data;
        
        $newResponseData = json_encode($newResponseDataArray);
        
        $media_path = JPATH_ROOT . '/media/mod_pwebbox/images/admin/content_btns/';
        
        // Collect info from mod_pwebbox_response.json file on local site.
        if (JFile::exists($response_file))
        {
            $info_file_local = file_get_contents($response_file);
            
            // Save server response to local file.
            JFile::write($response_file, $newResponseData);
        }
        else
        {
            JFile::write($response_file, $newResponseData);
        }
        
        // Make operations on images only ifmedia folder is writable.
        $plugins_all = array();
        if (is_writable($media_path))
        {
            // Collect info about plugins from mod_pwebbox_response.json local file.
            if (!empty($info_file_local))
            {
                $info_file_local = file_get_contents($response_file);

                $info_local = json_decode($info_file_local);

                // Reorder plugins from local json file to have easy access to it in next froeach loop.
                $local_plugins = array();
                foreach ($info_local->response->plugins as $local_plugin)
                {
                    $local_plugins[$local_plugin->name] = $local_plugin;
                }
            }
            
            // Collect info about instaled plugins.
            $db = JFactory::getDbo();
            // Collect info about installed plugins.
            $query = $db->getQuery(true);

            $conditions = array(
                                $db->quoteName('type') . ' = ' . $db->quote('plugin'),
                                $db->quoteName('folder') . ' = ' . $db->quote('everything_in_everyway')
                            );

            $query->select($db->quoteName('name'))
                    ->from('#__extensions')
                    ->where($conditions);

            $db->setQuery($query);

            try 
            {
                    $plugins_installed = $db->loadColumn();
            } catch (Exception $e) {
                    $plugins_installed = null;
            }            
           
            // For each plugin from $data (server response) check availability of new image.
            foreach ($data['plugins'] as $data_plugin)
            {
                // If plugin not installed then update/copy image (for installed plugins we don't need new image or update it).
                if (!in_array($data_plugin['name'], $plugins_installed))
                {
                    $ext = JFile::getExt($data_plugin['image']);
                    $img_path = $media_path . strtolower(str_replace(' ', '_', trim($data_plugin['name']))) . '.' . $ext;

                    // If there is img already on local server.
                    if (JFile::exists($img_path))
                    {
                        // If there is info from local json file about plugins.
                        if (!empty($local_plugins))
                        {
                            // If update dates from server and local file are different - save img to local server.
                            if (!empty($local_plugins[$data_plugin['name']]) && ($data_plugin['updated'] != $local_plugins[$data_plugin['name']]->updated))
                            {
                                //JFile::copy('https:' . $data_plugin['image'], $img_path); // return false, because src is not readable.
                                $img_src = strpos('https:', $data_plugin['image']) ? $data_plugin['image'] : 'https:' . $data_plugin['image'];
                                @copy($img_src, $img_path);
                            }
                        }
                    }
                    // If img doesn't exists save it on local server.
                    else
                    {
                        //JFile::copy('https:' . $data_plugin['image'], $img_path); // return false, because src is not readable.
                        $img_src = strpos('https:', $data_plugin['image']) ? $data_plugin['image'] : 'https:' . $data_plugin['image'];
                        @copy($img_src, $img_path);                    
                    }
                }
            }            
        }        
        
        return true;
    }
}
