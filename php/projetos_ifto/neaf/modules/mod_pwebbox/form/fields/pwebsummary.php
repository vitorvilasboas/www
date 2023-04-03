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

class JFormFieldPwebSummary extends JFormField
{
    protected $type = 'PwebSummary';

    /**
     * Method to get the field input markup.
     *
     * @return	string	The field input markup.
     * @since	1.6
     */
    protected function getInput()
    {
        JText::script('MOD_PWEBBOX_SOME_PROBLEMS');
        JText::script('MOD_PWEBBOX_OK');
        JText::script('MOD_PWEBBOX_VALUE_BUTTON');
        JText::script('MOD_PWEBBOX_VALUE_TAB');
        JText::script('MOD_PWEBBOX_VALUE_STATIC');
        JText::script('MOD_PWEBBOX_VALUE_HIDDEN');
        JText::script('MOD_PWEBBOX_VALUE_SLIDEBOX_SLIDE_IN');
        JText::script('MOD_PWEBBOX_VALUE_SLIDEBOX_SLIDE_IN_FULL');
        JText::script('MOD_PWEBBOX_VALUE_MODAL_FADE');
        JText::script('MOD_PWEBBOX_VALUE_MODAL_ROTATE');
        JText::script('MOD_PWEBBOX_VALUE_MODAL_SQUARE');
        JText::script('MOD_PWEBBOX_VALUE_MODAL_SMOOTH');
        JText::script('MOD_PWEBBOX_VALUE_ACCORDION_SLIDE_DOWN');
        JText::script('MOD_PWEBBOX_VALUE_ACCORDION_STATIC_NONE');
        // Themes names.
        JText::script('MOD_PWEBBOX_THEME_ANTIQUE-LETTER_LABEL');
        JText::script('MOD_PWEBBOX_THEME_BEEZ3_LABEL');
        JText::script('MOD_PWEBBOX_THEME_EASTER_LABEL');
        JText::script('MOD_PWEBBOX_THEME_ELASTICA_LABEL');
        JText::script('MOD_PWEBBOX_THEME_FREE_LABEL');
        JText::script('MOD_PWEBBOX_THEME_FBNAVY_LABEL');
        JText::script('MOD_PWEBBOX_THEME_GAVICKMUSIC_LABEL');
        JText::script('MOD_PWEBBOX_THEME_GREY_LABEL');
        JText::script('MOD_PWEBBOX_THEME_MAGAZINE_LABEL');
        JText::script('MOD_PWEBBOX_THEME_NIGHT_LABEL');
        JText::script('MOD_PWEBBOX_THEME_NOTE_LABEL');
        JText::script('MOD_PWEBBOX_THEME_NOTEBOOK_LABEL');
        JText::script('MOD_PWEBBOX_THEME_PROTOSTAR_LABEL');
        JText::script('MOD_PWEBBOX_THEME_RIBBON_LABEL');
        JText::script('MOD_PWEBBOX_THEME_TRANSPARENCY_LABEL');
        JText::script('MOD_PWEBBOX_THEME_GOOGLEMATERIAL_LABEL');
        JText::script('MOD_PWEBBOX_THEME_TWITTER_LABEL');
        JText::script('MOD_PWEBBOX_THEME__LABEL');
        
        $html = '<div id="pweb_summary_container">';
        $html .= '<h4>' . JText::_('MOD_PWEBBOX_SUMMARY') . '</h4>';
        
        // Location & Effects summary.
        $html .= '<div class="pweb-summary-wrapper">';
        $html .= '<h5>' . JText::_('COM_MODULES_MOD_PWEBBOX_LOCATION_AND_EFFECTS_FIELDSET_LABEL') . '</h5>';
        
        // Handler info (before opening).
        $handler = $this->form->getValue('handler', 'params');
        
        $handler_name = JText::_('MOD_PWEBBOX_VALUE_BUTTON');
        
        switch ($handler) {
            case 'button':
                $handler_name = JText::_('MOD_PWEBBOX_VALUE_BUTTON');
                break;
            case 'tab':
                $handler_name = JText::_('MOD_PWEBBOX_VALUE_TAB');
                break;
            case 'static':
                $handler_name = JText::_('MOD_PWEBBOX_VALUE_STATIC');
                break;
            case 'hidden':
                $handler_name = JText::_('MOD_PWEBBOX_VALUE_HIDDEN');
                break;
            default:
                break;
        }
        
        $html .= '<div id="pweb_summary_handler">' . JText::_('MOD_PWEBBOX_GROUP_LOCATION_BEFORE_OPENING_LABEL') . ': <span>' . $handler_name . '</span></div>';
        
        // Effect info (after opening).
        $effect = $this->form->getValue('effect', 'params');
        
        $effect_name = JText::_('MOD_PWEBBOX_VALUE_MODAL_FADE');
        
        switch ($effect) {
            case 'slidebox:slide_in':
                $effect_name = JText::_('MOD_PWEBBOX_VALUE_SLIDEBOX_SLIDE_IN');
                break;
            case 'slidebox:slide_in_full':
                $effect_name = JText::_('MOD_PWEBBOX_VALUE_SLIDEBOX_SLIDE_IN_FULL');
                break;
            case 'modal:fade':
                $effect_name = JText::_('MOD_PWEBBOX_VALUE_MODAL_FADE');
                break;
            case 'modal:rotate':
                $effect_name = JText::_('MOD_PWEBBOX_VALUE_MODAL_ROTATE');
                break;
            case 'modal:square':
                $effect_name = JText::_('MOD_PWEBBOX_VALUE_MODAL_SQUARE');
                break;
            case 'modal:smooth':
                $effect_name = JText::_('MOD_PWEBBOX_VALUE_MODAL_SMOOTH');
                break;
            case 'accordion:slide_down':
                $effect_name = JText::_('MOD_PWEBBOX_VALUE_ACCORDION_SLIDE_DOWN');
                break;
            case 'static:none':
                $effect_name = JText::_('MOD_PWEBBOX_VALUE_ACCORDION_STATIC_NONE');
                break;
            default:
                break;
        }        
        
        $html .= '<div id="pweb_summary_effect">' . JText::_('MOD_PWEBBOX_GROUP_LOCATION_AFTER_OPENING_LABEL') . ': <span>' . $effect_name . '</span></div>';
        
        $loacation_target = 'attrib-mod_pwebbox_location_and_effects';
        if (version_compare(JVERSION, '3.0.0') == -1) 
        {
            $loacation_target = 'mod_pwebbox_location_and_effects-options';
        }
        
        $html .= '<button type="button" class="btn btn-info" data-target="#' . $loacation_target . '">' . JText::_('MOD_PWEBBOX_CHANGE_THIS') . '</button>';
        $html .= '</div>';
        
        // Content summary.
        $html .= '<div class="pweb-summary-wrapper">';
        $html .= '<h5>' . JText::_('COM_MODULES_MOD_PWEBBOX_CONTENT_FIELDSET_LABEL') . '</h5>';
        
        // Content/plugin info.
        $plugin = $this->form->getValue('plugin', 'params');
        
        $plugin_name = '';
        
        switch ($plugin) {
            case 'youtube':
                $plugin_name = JText::_('MOD_PWEBBOX_BUTTON_CONTENT_YOUTUBE_LABEL');
                break;
            case 'vimeo':
                $plugin_name = JText::_('MOD_PWEBBOX_BUTTON_CONTENT_VIMEO_LABEL');
                break;
            case 'googlemaps':
                $plugin_name = JText::_('MOD_PWEBBOX_BUTTON_CONTENT_GOOGLEMAPS_LABEL');
                break;
            case 'bingmaps':
                $plugin_name = JText::_('MOD_PWEBBOX_BUTTON_CONTENT_BINGMAPS_LABEL');
                break;
            case 'article':
                $plugin_name = JText::_('MOD_PWEBBOX_BUTTON_CONTENT_ARTICLE_LABEL');
                break;
            case 'flexicontent':
                $plugin_name = JText::_('MOD_PWEBBOX_BUTTON_CONTENT_FLEXICONTENT_LABEL');
                break;
            case 'k2':
                $plugin_name = JText::_('MOD_PWEBBOX_BUTTON_CONTENT_K2_LABEL');
                break;
            case 'zoo':
                $plugin_name = JText::_('MOD_PWEBBOX_BUTTON_CONTENT_ZOO_LABEL');
                break;
            case 'seblod':
                $plugin_name = JText::_('MOD_PWEBBOX_BUTTON_CONTENT_SEBLOD_LABEL');
                break;
            case 'customhtml':
                $plugin_name = JText::_('MOD_PWEBBOX_BUTTON_CONTENT_CUSTOMHTML_LABEL');
                break;
            case 'iframe':
                $plugin_name = JText::_('MOD_PWEBBOX_BUTTON_CONTENT_IFRAME_LABEL');
                break;
            case 'module':
                $plugin_name = JText::_('MOD_PWEBBOX_BUTTON_CONTENT_MODULE_LABEL');
                break;
            case 'url':
                $plugin_name = JText::_('MOD_PWEBBOX_BUTTON_CONTENT_URL_LABEL');
                break;
            default:
                break;
        }         
        
        $html .= '<div id="pweb_summary_content">' . JText::_('MOD_PWEBBOX_SUMMARY_CHOSEN_CONTENT') . ': <span>' . $plugin_name . '</span></div>';
        
        $content_target = 'attrib-mod_pwebbox_content';
        if (version_compare(JVERSION, '3.0.0') == -1) 
        {
            $content_target = 'mod_pwebbox_content-options';
        }
        
        $html .= '<button type="button" class="btn btn-info" data-target="#' . $content_target . '">' . JText::_('MOD_PWEBBOX_CHANGE_THIS') . '</button>';        
        $html .= '</div>';
        
        // Layout/theme summary.
        $html .= '<div class="pweb-summary-wrapper">';
        $html .= '<h5>' . JText::_('COM_MODULES_MOD_PWEBBOX_LAYOUT_FIELDSET_LABEL') . '</h5>';
        
        // Layout/theme info.
        $theme = $this->form->getValue('theme', 'params');
        
        $theme_name = JText::_('MOD_PWEBBOX_THEME_' . strtoupper($theme) . '_LABEL');
        
        $html .= '<div id="pweb_summary_layout">' . JText::_('MOD_PWEBBOX_SUMMARY_CHOSEN_LAYOUT') . ': <span>' . $theme_name . '</span></div>';   
        
        $layout_target = 'attrib-mod_pwebbox_layout';
        if (version_compare(JVERSION, '3.0.0') == -1) 
        {
            $layout_target = 'mod_pwebbox_layout-options';
        }
        
        $html .= '<button type="button" class="btn btn-info" data-target="#' . $layout_target . '">' . JText::_('MOD_PWEBBOX_CHANGE_THIS') . '</button>';         
        $html .= '</div>';
        
        // Configuration check summary.
        $html .= '<div class="pweb-summary-wrapper">';
        $html .= '<h5>' . JText::_('COM_MODULES_MOD_PWEBBOX_CONFIGURATION_CHECK_FIELDSET_LABEL') . '</h5>';
        
        // Configuration check info.
        $status = 'OK';        
        
        $html .= '<div id="pweb_summary_config_check">' . JText::_('MOD_PWEBBOX_SUMMARY_CONFIG_CHECK') . ': <span>' . $status . '</span></div>';   
        
        $check_target = 'attrib-mod_pwebbox_configuration_check';
        if (version_compare(JVERSION, '3.0.0') == -1) 
        {
            $check_target = 'mod_pwebbox_configuration_check-options';
        }
        
        $html .= '<button type="button" class="btn btn-info" data-target="#' . $check_target . '">' . JText::_('MOD_PWEBBOX_SEE_FULL_DETAILS') . '</button>';          
        $html .= '</div>';
        
        $html .= '</div>';
        
        return $html;
    }

}
