<?php
/**
 * @package     pwebbox
 * @version 	2.0.1
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die;

require_once __DIR__ . '/helper.php';
/**
 * Facebook Likebox Plugin.
 */
class PlgEverything_in_everywayFacebook_page_plugin extends JPlugin
{

    /**
     * Constructor
     *
     * @param   object  &$subject  The object to observe
     * @param   array   $config    An optional associative array of configuration settings.
     *                             Recognized key values include 'name', 'group', 'params', 'language'
     *                             (this list is not meant to be comprehensive).
     *
     * @since   1.5
     */
    public function __construct(&$subject, $config = array())
    {
        parent::__construct($subject, $config);

        // Load the language file on instantiation.
        $this->loadLanguage('plg_' . $this->_type . '_' . $this->_name . '.site');
    }

    /**
     * Initialise plugin. Load all required JS, CSS and other dependences
     *
     * @param   integer $id  		The id of module instance.
     * @param	object	$params 	The JRegistry object with module instance options
     *
     * @return  boolean	True on success, false otherwise
     */
    public function onInit($context, $id, $params)
    {
        if ($context === $this->_type . '.' . $this->_name)
        { 
            // For tab and button with link only.
            if (($params->get('handler') == 'tab' || $params->get('handler') == 'button') && $params->get('effect') == 'static:none')
            {
                return null;
            }
            
            $doc = JFactory::getDocument();
            
            $plugin_params = new JRegistry($params->get('plugin_config')->params);              
            
            //TODO move to CSS file and width of element with ID as inline style
            $doc->addStyleDeclaration(
                    '.pwebbox-facebook-pageplugin-container, .pwebbox-facebook-pageplugin-container-in, .pwebbox-facebook-pageplugin-container-in .fb-page {max-width: 100%;}
                     #pwebbox_facebook_pageplugin_' . $id . ' {width: ' . $plugin_params->get('width') . 'px;}
                     .pwebbox-facebook-pageplugin-container .fb_iframe_widget, .pwebbox-facebook-pageplugin-container .fb_iframe_widget span, .pwebbox-facebook-pageplugin-container .fb_iframe_widget span iframe[style] {width: 100% !important; min-width: 180px}
                     .pwebbox-facebook-pageplugin-pretext {margin-bottom:5px;}'
            );
            
            // Center content for accordion effect.
            if ($params->get('effect') == 'accordion:slide_down')
            {
                //TODO move to CSS file and use CSS selector based on classes only
                $doc->addStyleDeclaration(
                        '#pwebbox' . $id . ' .pwebbox-box.pweb-accordion {margin: 0 auto !important;}'
                );                
            }            
            
            plgFBPagePluginHelper::setParams($plugin_params);
            
            if ($plugin_params->get('box_type', 'html5') != 'iframe')
            {
                $doc->addScriptDeclaration('jQuery(document).ready(function($){'
                        . '$("#pwebbox' . $id . '").on("onOpen",function(e){'
                        . 'FB.XFBML.parse(document.getElementById("pwebbox_facebook_pageplugin_' . $id . '"));'
                        . plgFBPagePluginHelper::getTrackSocialOnClick()
                        . '})'
                        . '});'
                );
            }
            else
            {
                //TODO move to CSS file and use CSS selector based on classes only
                $doc->addStyleDeclaration(
                        '.pwebbox-facebook-pageplugin-container, #pwebbox_fbpageplugin' . $id . '_iframe {max-width: 100% !important;}'
                );                
            }
            
            return true;
        }
        return null;
    }

    /**
     * Gets the output HTML
     *
     * @param   integer $id  		The id of module instance.
     * @param	object	$params 	The JRegistry object with module instance options
     *
     * @return  string  The HTML to be embedded in popup.
     */
    public function onDisplay($context, $id, $params)
    {
        $html = '';
  
        if ($context === $this->_type . '.' . $this->_name)
        {
            // For tab and button with link only.
            if (($params->get('handler') == 'tab' || $params->get('handler') == 'button') && $params->get('effect') == 'static:none')
            {
                return $html;
            }  
            
            // Collect plugin configuration values from module params.
            $plugin_params = new JRegistry($params->get('plugin_config')->params);  
            
            // Get the path for the layout file
            if (version_compare(JVERSION, '3.0.0') == -1)
            {
                // J!2.5
                $path = dirname(__FILE__) . '/tmpl/default.php';
            }
            else
            {
                // J!3.0
                $path = JPluginHelper::getLayoutPath($this->_type, $this->_name, 'default');
            }  
            
            $plugin_params->def('id', $id);
            $plugin_params->def('bg_padding_position', $params->get('bg_padding_position'));
            $plugin_params->def('bg_padding', $params->get('bg_padding'));
            $plugin_params->def('theme', $params->get('theme'));
            $plugin_params->def('toggler_vertical', $params->get('toggler_vertical'));
            $plugin_params->def('toggler_slide', $params->get('toggler_slide'));
            $plugin_params->def('debug', $params->get('debug'));
            
            plgFBPagePluginHelper::setParams($plugin_params);
           
            $like_box = plgFBPagePluginHelper::displayLikeBox();
            
            $track_script = plgFBPagePluginHelper::getTrackSocialScript();
            
            $pretext = $plugin_params->get('pretext');
            
            // Render the layout
            ob_start();
            include $path;
            $html .= ob_get_clean();
        }

        return $html;
    }

    /**
     * Generate response for Joomla Ajax Interface.
     *
     * @return  string  The HTML representing form.
     */    
    public function onAjaxFacebook_page_plugin()
    {
        $jinput = JFactory::getApplication()->input;
        
        require_once JPATH_ROOT.'/modules/mod_pwebbox/pluginhelper.php';       
        
        // Check if method is called in context of Pweb server communication.
        if ($jinput->get('pwebServerCommunication', false))
        {
            return modPwebboxPluginHelper::setServerResponse($jinput->get('data', '', 'array')); 
        }
        
        return modPwebboxPluginHelper::getParams($this, $this->_type, $this->_name); 
    }      
}
