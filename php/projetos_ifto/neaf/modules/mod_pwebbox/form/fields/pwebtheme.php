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
jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');

class JFormFieldPwebTheme extends JFormField
{
    protected $type = 'PwebTheme';

    /**
     * Method to get the field input markup.
     *
     * @return	string	The field input markup.
     * @since	1.6
     */
    protected function getInput()
    {
        JText::script('MOD_PWEBBOX_THEME_BUY_LABEL');
        JText::script('MOD_PWEBBOX_BUTTON_LOAD_THEME_AND_SAVE_FORM_LABEL');
        JText::script('MOD_PWEBBOX_THEME_GET_LABEL');
        
        $doc = JFactory::getDocument();
          
        // Flipster jQuery plugin - for creating responsive 'cover flow' style image carousels.
        $doc->addStyleSheet(JURI::root(true) . '/media/mod_pwebbox/css/jquery.flipster.min.css');
        $doc->addScript(JURI::root(true) . '/media/mod_pwebbox/js/jquery.flipster.min.js');
        // Main admin js script.
        $doc->addScript(JURI::root(true) . '/media/mod_pwebbox/js/admin.js'); 
        
        $themes_path = JPATH_ROOT . '/media/mod_pwebbox/themes/';
        $themes_url = JURI::root(true) . '/media/mod_pwebbox/themes/';
        
        // Collect info from mod_pwebbox_response.json file on local site to get price and url for themes.
        $info_file_client_path = JPATH_ROOT . '/cache/mod_everything_in_everyway/mod_pwebbox_response.json'; 

        $themes_info = '';
        if (JFile::exists($info_file_client_path))
        {
            $info_file_client = file_get_contents($info_file_client_path);

            $info_client = json_decode($info_file_client);

            $themes_server_price = isset($info_client->response->theme->price) ? $info_client->response->theme->price : JText::_('MOD_PWEBBOX_THEME_BUY_LABEL');
            $themes_server_url = isset($info_client->response->theme->url) ? $info_client->response->theme->url : 'https://www.perfect-web.co';

            $themes_info = '<input type="hidden" id="pweb_themes_price" value="' . $themes_server_price . '"><input type="hidden" id="pweb_themes_url" value="' . $themes_server_url . '">';
        }         
        
        $themes_list = '';
        $default_settings = '';
        // Generate list of themes.
        if (JFolder::exists($themes_path)) 
        {            
            // Get all json files from mo_pwebbox/themes folder.
            $themes = JFolder::files($themes_path, '.jpg');
            
            $active_theme = $this->form->getValue('theme', 'params');
            
            $themes_list = '<ul>';
            foreach ($themes as $theme) 
            {
                $theme_object = $this->getThemeObject($active_theme, $theme, $themes_path, $themes_url);
                
                $theme_image = '<img src="' . $theme_object->image . '" alt="' . $theme_object->title . '">';
                
                $active = '';
                
                if ($theme_object->is_active === true)
                {
                    $active = 'class="pweb-active-theme"';
                    $default_settings = $theme_object->settings;
                }
                
                $data_settings = '';
                $class_json = 'pweb-theme-no-json';
                if ($theme_object->has_json === true)
                {
                    $data_settings = 'data-settings=\'' . $theme_object->settings . '\'';
                    $class_json = 'pweb-theme-json';
                }
                
                $mark = '';
                if ($theme_object->free)
                {
                    $mark = '<div class="pweb-theme-badge-free">' . JText::_('MOD_PWEBBOX_FREE_LABEL') . '</div>';
                }
                
                $themes_list .=    '<li ' . $active . '>' 
                              .         '<div class="pweb-theme ' . $class_json . '" data-name="' . $theme_object->name . '" ' . $data_settings . '>'
                              .             '<div class="pweb-theme-image">'
                              .                 $mark
                              .                 $theme_image
                              .             '</div>'
                              .             '<div class="pweb-theme-caption">'
                              .                 '<h3>' . $theme_object->title . '</h3>'
                              .                 '<p>' . $theme_object->description . '</p>'
                              .             '</div>'
                              .         '</div>'
                              .     '</li>';
            }
            $themes_list .= '</ul>';
        }
        
        $html =     '<div class="flipster" id="pweb-themes-coverflow">'
                .       $themes_list
                .   '</div>';
        
        $icon1 = '';
        $icon2 = '';
        $icon3 = '';
        // For J!2.5 integration.
        if (is_file(JPATH_ROOT.'/media/jui/css/icomoon.css'))
        {
            $icon1 = '<i class="icon-chevron-left"></i> ';
            $icon2 = '<i class="icon-upload"></i> ';
            $icon3 = '<i class="icon-chevron-right"></i> ';
        }        
        
        // Generate control panel for themes.
        $html .=    '<div id="pweb-themes-coverflow-controls" class="text-center pweb-margin-b-10" data-settings=\'' . $default_settings . '\'>'
                 .      '<button id="pweb-themes-coverflow-control-prev" class="btn" type="button">'
                 .           $icon1 . JText::_('MOD_PWEBBOX_PREVIOUS')
                 .      '</button>'
                 .      '<button id="pweb-themes-coverflow-control-load" class="btn btn-large btn-info pweb-margin-l-r-5 hasTooltip" type="button" title="' . JText::_('MOD_PWEBBOX_BUTTON_LOAD_THEME_AND_SAVE_FORM_DESC') . '">'
                 .           $icon2 . '<span>' . JText::_('MOD_PWEBBOX_BUTTON_LOAD_THEME_AND_SAVE_FORM_LABEL') . '</span>'
                 .      '</button>'
                 .      '<button id="pweb-themes-coverflow-control-next" class="btn" type="button">'
                 .           $icon3 . JText::_('MOD_PWEBBOX_NEXT')
                 .      '</button>'
                 .      $themes_info
                 .  '</div>';
        
        
        return $html;
    }

    protected function getThemeObject($active_theme, $theme_file, $themes_path, $themes_url)
    {
        
        $theme = new stdClass();
        
        $file_basename = JFile::stripExt($theme_file);
        $theme->name = $file_basename;  
        $theme->image = $themes_url . $theme_file;  
        $theme->is_active = ($active_theme === $file_basename);       
        
        $json_file = $themes_path . $file_basename . '.json';
        if (JFile::exists($json_file))
        {
            $file_content = file_get_contents($json_file);
            $theme_settings = json_decode($file_content);

            $theme->title = isset($theme_settings->title) ? $theme_settings->title : ucfirst($file_basename);
            $theme->description = isset($theme_settings->description) ? $theme_settings->description : '';
            $theme->settings = isset($theme_settings->params) ? json_encode($theme_settings->params) : '{}';
            $theme->has_json = true;
        }
        else
        {
            $theme->title = ucfirst(str_replace(array('-', '_'), ' ', $file_basename));  
            $theme->description = '';
            $theme->has_json = false;
            $theme->settings = '{}';
        }
        
        $theme->free = false;
        if (isset($theme_settings->params))
        {
            $theme->free = empty($theme_settings->params->free) ? false : true;
        }
        
        return $theme;
    }
}
