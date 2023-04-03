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

class JFormFieldPwebButton extends JFormField
{
    protected $type = 'PwebButton';

    /**
     * Method to get the field input markup.
     *
     * @return	string	The field input markup.
     * @since	1.6
     */
    protected function getInput()
    {        
        // Get mod_pwebbox id from extensions table.
        $db = JFactory::getDbo();

        $query = $db->getQuery(true);

        $query
                ->select($db->quoteName('extension_id'))
                ->from($db->quoteName('#__extensions'))
                ->where($db->quoteName('element') . ' = ' . $db->quote('mod_pwebbox'));

        $db->setQuery($query);

        try 
        {
                $result = $db->loadResult();
        } 
        catch (Exception $e) 
        {
                echo $e->getMessage();
        }  
                    
        $icon = '';
        // For J!2.5 integration.
        if (is_file(JPATH_ROOT.'/media/jui/css/icomoon.css'))
        {
            $icon = '<i class="icon-plus icon-white"></i> ';
        }        
            
        $html = '';
        if (!empty($result))
        {
            $onclick = 'onclick="location.href=\'index.php?option=com_modules&task=module.add&eid=' . $result . '#plugin-facebook_page_plugin\'"';
            
            $html   = '<button ' . $onclick . ' type="button" class="btn btn-success hasTooltip" id="pweb_plugin_create_instance" title="' . JText::_('PLG_PWEBBOX_CREATE_INSTANCE_DESC') . '">' 
                        . $icon . JText::_('PLG_PWEBBOX_CREATE_INSTANCE_LABEL') 
                    . '</button>';            
        }
        else
        {
            $app = JFactory::getApplication();
            
            $app->enqueueMessage(JText::_('PLG_PWEBBOX_MODULE_NOT_INSTALLED'), 'warning');
        }
        
        return $html;
    }

}
