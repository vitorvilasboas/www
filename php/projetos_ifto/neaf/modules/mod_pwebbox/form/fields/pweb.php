<?php
/**
 * @package     pwebbox
 * @version 	2.0.0
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die('Restricted access');

JFormHelper::loadFieldClass('Text');

class JFormFieldPweb extends JFormFieldText
{

    /**
     * Method to get the field input markup.
     *
     * @return	string	The field input markup.
     * @since	1.6
     */
    protected function getInput()
    {
        $app = JFactory::getApplication();
        $doc = JFactory::getDocument();
        
        if (version_compare(JVERSION, '2.5.5') == -1) 
        {
            // Joomla minimal version
            $app->enqueueMessage(
                    JText::sprintf('MOD_PWEBBOX_CONFIG_MSG_JOOMLA_VERSION', 
                            '2.5.5', 
                            '<a href="index.php?option=com_joomlaupdate" target="_blank">', '</a>'
                    ), 'error');
        }   
        else
        {
            // Module ID
            $module_id = $app->input->getInt('id', 0);  
            
            // check module configuration
            if ($module_id > 0) 
            {         
                // get params
                require_once JPATH_ROOT.'/modules/mod_pwebbox/helper.php';
                $params = ModPwebboxHelper::getParams($module_id);                
                
                if ($params->get('rtl', 2) == 2) {
                        // warn about auto RTL
                        $langs = JLanguage::getKnownLanguages(JPATH_ROOT);
                        foreach ($langs as $lang) {
                                if ((bool)$lang['rtl']) {
                                        $app->enqueueMessage(JText::_('MOD_PWEBBOX_CONFIG_RTL_TIP'), 'notice');
                                        break;
                                }
                        }
                }
                                
                // check if debug mode is enabled
                if ($params->get('debug', 0)) {
                        $app->enqueueMessage(JText::_('MOD_PWEBBOX_CONFIG_MSG_DISABLE_DEBUG'), 'notice');
                }  
                
                // check module details configuration
                $this->checkModuleDetails($module_id);                
            }
            
            // check if Ajax Interface is installed and enabled
            $this->checkAjaxComponent();

            // check if Bootstrap is updated to version 2.3.1
            if (version_compare(JVERSION, '3.1.4') == -1) 
            {
                    $this->checkBootstrap();
            }

            // check functions for image creation
            $this->checkImageTextCreation();

            // check if cache directory is writable
            // check if direct access to files in cache directory is allowed
            $this->checkCacheDir();          
        }
        
        // Copy button near FB Pixel

        JText::script('MOD_PWEBBOX_COPY_BUTTON');

        // add documentation toolbar button
        if (version_compare(JVERSION, '3.0.0') == -1)
        {
            $button = '<a href="' . $this->element['documentation_url'] . '" style="font-weight:bold;border-color:#025A8D;background-color:#DBE4E9;" target="_blank"><span class="icon-32-help"> </span> ' . JText::_('MOD_PWEBBOX_DOCUMENTATION') . '</a>';

            // Joomla! 2.5 - short labels for radio group
            $doc->addStyleDeclaration(
                    'fieldset.panelform fieldset.radio label{min-width:30px}'
            );
        }
        else
        {
            $button = '<a href="' . $this->element['documentation_url'] . '" class="btn btn-small btn-info" target="_blank"><i class="icon-support"> </i> ' . JText::_('MOD_PWEBBOX_DOCUMENTATION') . '</a>';
        }

        $bar = JToolBar::getInstance();
        $bar->appendButton('Custom', $button, $this->element['extension'] . '-docs');
        
        return null;          
    }





    
    private function checkModuleDetails($module_id = 0)
    {
            $app = JFactory::getApplication();
            $before_open = $this->form->getValue('handler', 'params');

            // check if module has been assigned to menu items
            $db = JFactory::getDBO();
            $query = $db->getQuery(true);
            $query->select('menuid')
                      ->from('#__modules_menu')
                      ->where('moduleid = '.(int)$module_id)
                      ;
            $db->setQuery($query, 0, 1);
            $result = $db->loadResult();
            if ($result === null) 
            {
                    $app->enqueueMessage(JText::_('MOD_PWEBBOX_CONFIG_MSG_ASSIGN_MENUITEMS'), 'notice');
            }

            // check module settings
            $query->clear();
            $query->select('position, published, showtitle')
                      ->from('#__modules')
                      ->where('id = '.(int)$module_id)
                      ;
            $db->setQuery($query);
            $module = $db->loadObject();

            // check module position
            if (!$module->position) {
                    $app->enqueueMessage(JText::_('MOD_PWEBBOX_CONFIG_MSG_POSITION'), 'notice');
            }
            // check if module is published
            if ($module->published != 1) {
                    $app->enqueueMessage(JText::_('MOD_PWEBBOX_CONFIG_MSG_PUBLISH'), 'notice');
            }
            // check if title is hidden
            if ($module->showtitle AND $before_open != 'static') {
                    $app->enqueueMessage(JText::_('MOD_PWEBBOX_CONFIG_MSG_HIDE_TITLE'), 'notice');
            }
    }    
    
    private function checkAjaxComponent()
    {
            if (version_compare(JVERSION, '3.2.0') == -1 AND !is_file(JPATH_ROOT.'/components/com_ajax/ajax.php')) 
            {
                return null;
            }

            $app = JFactory::getApplication();
            $db  = JFactory::getDBO();

            $query = $db->getQuery(true);
            $query->select('enabled, manifest_cache')
                      ->from($db->quoteName('#__extensions'))
                      ->where($db->quoteName('element').' = '.$db->quote('com_ajax'))
                      ;
            $db->setQuery($query);
            
            try 
            {
                    $ext = $db->loadObject();
            } catch (Exception $e) {
                    $ext = null;
            } 
            
            // For J! older than 3.4 com_ajax isn't working well with module - so it need's to be updated.
            if (version_compare(JVERSION, '3.4.0') == -1 AND !empty($ext->manifest_cache))
            {
                $manifest = json_decode($ext->manifest_cache);
                
                if (stripos($manifest->author, "Perfect Web") === false)
                {
                    
                    $app->enqueueMessage(JText::sprintf('MOD_PWEBBOX_CONFIG_MSG_J32_AJAX_INTERFACE_UPDATE', 
                            '<a href="https://www.perfect-web.co/downloads/joomla-3-ui-libraries-for-joomla-25/latest/com_ajax-zip?format=raw" target="_blank">', '</a>'), 'error'); 
                    
                    return false;                    
                }
            }

            if (empty($ext->enabled))
            {
                    if (is_file(JPATH_ROOT.'/components/com_ajax/ajax.php'))
                    {
                            $app->enqueueMessage(JText::sprintf('MOD_PWEBBOX_CONFIG_MSG_J32_AJAX_INTERFACE_DISCOVER',
                                    '<a href="index.php?option=com_installer&amp;view=discover&amp;task=discover.refresh" target="_blank">', '</a>'), 'warning');
                            return false;
                    } 
                    else 
                    {
                            $app->enqueueMessage(JText::_('MOD_PWEBBOX_CONFIG_MSG_J32_AJAX_INTERFACE_ERROR'), 'error');
                            return false;
                    }
            }
            elseif ($ext->enabled === '0' OR $ext->enabled === 0)  
            {
                    $app->enqueueMessage(JText::sprintf('MOD_PWEBBOX_CONFIG_MSG_J32_AJAX_INTERFACE_ENABLE',
                            '<a href="index.php?option=com_installer&amp;view=manage&amp;filter_search=ajax" target="_blank">', '</a>'
                    ), 'warning');
                    return false;
            }

            return true;
    }  
    
    private function checkBootstrap()
    {
            $path = JPATH_ROOT.'/media/jui/js/bootstrap.js';

            if (is_file($path)) 
            {
                    $contents = file_get_contents($path);
                    if ($contents AND preg_match('/bootstrap-\w+\.js v2\.1\.0/i', $contents))
                    {
                            $app = JFactory::getApplication();
                            $app->enqueueMessage(JText::sprintf('MOD_PWEBBOX_CONFIG_MSG_J3_BOOTSTRAP_210_UPDATE',
                                    '<a href="http://www.perfect-web.co/blog/joomla/62-jquery-bootstrap-in-joomla-25" target="_blank">', '</a>'
                            ), 'warning');
                    }
            }
    }  
    
    private function checkImageTextCreation()
    {
            $functions = array(
                    'imagecreatetruecolor',
                    'imagecolorallocate',
                    'imagecolorallocatealpha',
                    'imagesavealpha',
                    'imagealphablending',
                    'imagefill',
                    'imagettftext',
                    'imagepng',
                    'imagedestroy'
            );
            $disabled_functions = array();
            foreach ($functions as $function)
            {
                    if (!(function_exists($function) && is_callable($function))) $disabled_functions[] = $function;
            }
            
            if (count($disabled_functions)) 
            {
                    $app = JFactory::getApplication();
                    $doc = JFactory::getDocument();

                    $app->enqueueMessage(
                            JText::sprintf('MOD_PWEBBOX_CONFIG_MSG_FUNCTIONS_DSIABLED', 
                                    implode(', ', $disabled_functions)
                            ), 'warning');
                    
                    // disable toggler tab options
                    $doc->addScriptDeclaration(
                            'jQuery(document).ready(function($){'.
                                    '$("#'.$this->formControl.'_'.$this->group.'_toggler_vertical0").click();'.
                                    '$("#'.$this->formControl.'_'.$this->group.'_toggler_vertical1").each(function(){'.
                                            '$("label[for="+$(this).attr("id")+"]").addClass("disabled").unbind("click");'.
                                    '}).prop("disabled", "disabled");'.
                            '});'
                    );               

                    return false;
            }

            return true;
    }    
    
    private function checkCacheDir()
    {
            $app = JFactory::getApplication();
            $path = JPATH_ROOT.'/media/mod_pwebbox/cache';

            // check if cache directory is writable
            if (!is_writable($path)) {
                    $app->enqueueMessage(JText::_('MOD_PWEBBOX_CONFIG_MSG_CACHE_DIR'), 'warning');
                    return false;
            }

            return true;
    }    
}
