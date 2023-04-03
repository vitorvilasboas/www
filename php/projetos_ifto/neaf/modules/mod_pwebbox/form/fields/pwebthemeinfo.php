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

class JFormFieldPwebThemeInfo extends JFormField
{
    protected $type = 'PwebThemeInfo';

    /**
     * Method to get the field input markup.
     *
     * @return	string	The field input markup.
     * @since	1.6
     */
    protected function getInput()
    {
        $doc = JFactory::getDocument();
        
        // Main admin js script.
        $doc->addScript(JURI::root(true) . '/media/mod_pwebbox/js/admin.js'); 
        
        $themes_path = JPATH_ROOT . '/media/mod_pwebbox/themes/';
        $themes_url = JURI::root(true) . '/media/mod_pwebbox/themes/';

        $active_theme = $this->form->getValue('theme', 'params');     
        
        $html = '';
        // Get active theme json file mod_pwebbox/themes folder.
        $theme_object = $this->getThemeObject($active_theme . '.json', $themes_path, $themes_url);

        $theme_image = '<img width="250px" src="' . $theme_object->image . '" alt="' . $theme_object->title . '">';

        $html =     '<div class="pweb-active-theme-info pweb-margin-t-10">'
            .           '<div class="pweb-theme-active-info-image" style="width:250px;min-height:100px;" data-url="' . $themes_url . '">'
            .               $theme_image
            .           '</div>'
            .           '<div class="pweb-theme-active-info-caption">'
            .               '<h3>' . $theme_object->title . '</h3>'
            .               '<p>' . $theme_object->description . '</p>'
            .           '</div>'
            .       '</div>';
        
        return $html;
    }

    protected function getThemeObject($theme_file, $themes_path, $themes_url)
    {
        
        $theme = new stdClass();
        
        if (JFile::exists($themes_path . $theme_file))
        {
            $file_content = file_get_contents($themes_path . $theme_file);
            $theme_settings = json_decode($file_content);
            $file_basename = JFile::stripExt($theme_file);
            
            $has_image = JFile::exists($themes_path . $file_basename . '.jpg');

            $theme->title = isset($theme_settings->title) ? $theme_settings->title : ucfirst($file_basename);
            $theme->name = $file_basename;
            $theme->description = isset($theme_settings->description) ? $theme_settings->description : '';
            $theme->image = $has_image ? $themes_url . $file_basename . '.jpg' : '';
            $theme->settings = isset($theme_settings->params) ? json_encode($theme_settings->params) : '{}';              
        }
        else
        {
            $theme->title = '';
            $theme->name = '';
            $theme->description = '';
            $theme->image = '';
            $theme->settings = '';              
        }
        
        return $theme;
    }
}
