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

class JFormFieldPwebAccordionGroupBegin extends JFormField
{
    protected $type = 'PwebAccordionGroupBegin';

    /**
     * Method to get the field input markup.
     *
     * @return	string	The field input markup.
     * @since	1.6
     */
    protected function getInput()
    {  
        static $instance_count = 1;
        
        $doc = JFactory::getDocument();
        
        // Add admin styles and script
        $doc->addScript(JURI::root(true) . '/media/mod_pwebbox/js/admin.js');
        $doc->addStyleSheet(JURI::root(true) . '/media/mod_pwebbox/css/admin.css');
        
        // Get plugin field, to check if plugin content options should be displayed.
        $plugin = $this->form->getValue('plugin', 'params');
        
        // Get accordion classes.
        $class_collapsed = $this->element['pweb_class_collapsed'];
        $class_in = $this->element['pweb_class_in'];        
        
        // Check if accordion group is main or subordinate - main group will be revealed.
        if ($plugin && !empty($this->element['pweb_group_ajax'])) 
        {
            if ($this->element['pweb_group_ajax'] == 'main') 
            {
                $class_collapsed = '';
                $class_in = 'in';
            }
        }
            
        $icon = '';
        // For J!2.5 integration.
        if (is_file(JPATH_ROOT.'/media/jui/css/icomoon.css'))
        {
            $icon = '<i class="icon-chevron-up"></i><i class="icon-chevron-down"></i>';
        }
        
        // Hide plugin/content accordion-group when plugin isn't selected and get plugin name when it is seleceted.
        $hide_class = '';
        $content_group_id = '';
        $plugin_name = '';
        $theme_name = '';
        if ($instance_count == 1)
        {
            $content_group_id = 'id="pweb_content_acc_group"';
            $plugin_name = '<span id="pweb_acc_content_name">';
            
            if (!$plugin)
            {
                $hide_class = 'pweb-hidden';
            }
            else
            {
                    $db = JFactory::getDbo();

                    // Get plugin name.
                    $query = $db->getQuery(true);

                    $conditions = array(
                                        $db->quoteName('type') . ' = ' . $db->quote('plugin'),
                                        $db->quoteName('folder') . ' = ' . $db->quote('everything_in_everyway'),
                                        $db->quoteName('element') . ' = ' . $db->quote($plugin)
                                    );

                    $query->select($db->quoteName('name'))
                            ->from('#__extensions')
                            ->where($conditions);

                    $db->setQuery($query);

                    try 
                    {
                            $plugin_name .= (string) $db->loadResult();
                    } 
                    catch (Exception $e) {}
            }
            
            $plugin_name .= '</span>: ';
        }
        else if ($instance_count == 2)
        {
            $content_group_id = 'id="pweb_content_btns_acc_group"';            
        }        
        else if ($instance_count == 6)
        {
            $content_group_id = 'id="pweb_theme_acc_group"';
            $theme = $this->form->getValue('theme', 'params');
            $theme_name = '<span id="pweb_acc_theme_name">';
            if (!$theme)
            {
                $hide_class = 'pweb-hidden';
            }
            else
            {
                $theme_name .= JText::_('MOD_PWEBBOX_THEME_' . strtoupper($theme) . '_LABEL');  
            }
            $theme_name .= '</span>: ';
        }
               
        $html = '<div ' . $content_group_id . ' class="accordion-group ' . $hide_class . '">
                    <div class="accordion-heading">
                        <a 
                            href="#accordion-document-' . $instance_count . '" '
                            . 'data-toggle="collapse" '
                            . 'class="accordion-toggle ' . $class_collapsed . '" '
                            . 'data-parent="#' . $this->element['pweb_parent_id'] . '">'
                            . $icon .
                            $plugin_name . $theme_name . JText::_($this->element['label']) .
                        '</a>
                    </div>
                    <div class="accordion-body collapse ' . $class_in . '" id="accordion-document-' . $instance_count . '">
                        <div class="accordion-inner">
                            <div class="row-fluid">
                                <div class="span12">';
        
        $instance_count++;
        
        return $html;
    }

}
