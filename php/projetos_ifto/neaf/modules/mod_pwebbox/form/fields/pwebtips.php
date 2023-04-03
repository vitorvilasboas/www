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

class JFormFieldPwebTips extends JFormField
{
    protected $type = 'PwebTips';

    /**
     * Method to get the field input markup.
     *
     * @return	string	The field input markup.
     * @since	1.6
     */
    protected function getInput()
    {
        $mod_id = JFactory::getApplication()->input->get->get('id', 1);
        $html = '<div class="alert">' . JText::_('MOD_PWEBBOX_TIPS_ID_WARNING') . '</div>';
        
        $html .= '<div id="tips_container">';
        $html .= '<h3>' . JText::_('MOD_PWEBBOX_TIPS_OPEN_BOX_WITH_MENU_ITEM_HEADER') . '</h3>';
        $html .= '<div>' . JText::_('MOD_PWEBBOX_TIPS_OPEN_BOX_WITH_MENU_ITEM_INFO') . '</div>';
        $html .= '<div><code>#pwebbox' . $mod_id . '_toggler</code> <a href="index.php?option=com_menus&view=items" target="_blank">' . JText::_('MOD_PWEBBOX_GO_TO_MENUS') . '</a></div>';
        $html .= '<div class="pweb-text-danger">' . JText::_('MOD_PWEBBOX_TIPS_OPEN_BOX_WITH_MENU_ITEM_WARNING') . '</div>';
        $html .= '<div>' . JText::_('MOD_PWEBBOX_TIPS_OPEN_BOX_WITH_MENU_ITEM_ADDITIONAL_INFO') . '</div>';
        $html .= '<hr>';
        
        $html .= '<h3>' . JText::_('MOD_PWEBBOX_TIPS_OPEN_BOX_WITH_CUSTOM_HTML_HEADER') . '</h3>';
        $html .= '<div class="pweb-tip-group"><div>' . JText::_('MOD_PWEBBOX_TIPS_OPEN_BOX_WITH_CUSTOM_HTML_OPEN_BY_LINK') . '</div>';    
        $html .= '<div><code>&lt;a href="#" class="pwebbox' . $mod_id . '_toggler"&gt;Click here&lt;/a&gt;</code></div></div>';
        $html .= '<div class="pweb-tip-group"><div>' . JText::_('MOD_PWEBBOX_TIPS_OPEN_BOX_WITH_CUSTOM_HTML_OPEN_BY_IMG') . '</div>';    
        $html .= '<div><code>&lt;a href="#" class="pwebbox' . $mod_id . '_toggler"&gt;&lt;img src="..."&gt;&lt;/a&gt;</code></div></div>';
        $html .= '<div class="pweb-tip-group"><div>' . JText::_('MOD_PWEBBOX_TIPS_OPEN_BOX_WITH_CUSTOM_HTML_OPEN_ON_LOAD_BY_URL') . '</div>';    
        $html .= '<div><code>#pwebbox' . $mod_id . ':open</code></div></div>';
        $html .= '<hr>';
        
        $html .= '<h3>' . JText::_('MOD_PWEBBOX_TIPS_JS_METHODS_HEADER') . '</h3>';
        $html .= '<div class="pweb-tip-group"><div>' . JText::_('MOD_PWEBBOX_TIPS_JS_METHODS_TOGGLE_BOX') . '</div>';    
        $html .= '<div><code>pwebBox' . $mod_id . '.toggleBox();</code></div></div>';
        $html .= '<div class="pweb-tip-group"><div>' . JText::_('MOD_PWEBBOX_TIPS_JS_METHODS_OPEN_BOX') . '</div>';    
        $html .= '<div><code>pwebBox' . $mod_id . '.toggleBox(1);</code></div></div>';
        $html .= '<div class="pweb-tip-group"><div>' . JText::_('MOD_PWEBBOX_TIPS_JS_METHODS_CLOSE_BOX') . '</div>';    
        $html .= '<div><code>pwebBox' . $mod_id . '.toggleBox(0);</code></div></div>';
        $html .= '</div>';
        
        return $html;
    }

}
