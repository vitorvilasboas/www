<?php
/**
 * @package     pwebbox
 * @version 	2.0.0
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die( 'Restricted access' );

/**
 * Joomla 2.5 and 3.2 Legacy
 */
class JFormFieldPwebLegacy extends JFormField
{
	protected $type = 'PwebLegacy';
	
	
	protected function getInput()
	{
                $app = JFactory::getApplication();
                $doc = JFactory::getDocument();            
		if (version_compare(JVERSION, '3.0.0') == -1) 
		{
			if (version_compare(PHP_VERSION, '5.3') == -1) 
			{
				$app->enqueueMessage(JText::sprintf('MOD_PWEBBOX_CONFIG_MSG_PHP_VERSION', '5.3'), 'error');
			} 
			
			// jQuery and Bootstrap in Joomla 2.5
			if (!class_exists('JHtmlJquery'))
			{   
				$error = null;
				if (!is_file(JPATH_PLUGINS.'/system/pwebj3ui/pwebj3ui.php'))
				{
					$error = JText::sprintf('MOD_PWEBBOX_CONFIG_INSTALL_PWEBLEGACY', 
								'<a href="http://www.perfect-web.co/blog/joomla/62-jquery-bootstrap-in-joomla-25" target="_blank">', '</a>');
				}
				elseif (!JPluginHelper::isEnabled('system', 'pwebj3ui')) 
				{
					$error = JText::sprintf('MOD_PWEBBOX_CONFIG_ENABLE_PWEBLEGACY', 
								'<a href="index.php?option=com_plugins&amp;view=plugins&amp;filter_search='.urlencode('Perfect Joomla! 3 User Interface').'" target="_blank">', '</a>');
				}
				else 
				{
					JLoader::import('cms.html.jquery', JPATH_PLUGINS.DIRECTORY_SEPARATOR.'system'.DIRECTORY_SEPARATOR.'pwebj3ui'.DIRECTORY_SEPARATOR.'libraries');
				}
				
				if ($error) {
					$app->enqueueMessage($error, 'error');
					$doc->addScriptDeclaration(
						'window.addEvent("domready", function(){'
							.'new Element("div", {class: "pweb-fields-tip", html: \'<span class="badge badge-important">'.$error.'</span>\'}).inject(document.id("jform_params_fields"),"top");'
						.'});'
					);
				}
			}
                        
                        // Additional main admin style for J!2.5.
                        $doc->addStyleSheet(JURI::root(true) . '/media/mod_pwebbox/css/admin_j25.css');   

                        // Prepare function for initialize colorpicker fields after ajax call.
                        $doc->addScriptDeclaration('
                            window.initColorPickersJ25 = function() {
                                var nativeColorUi = false;
                                if (Browser.opera && (Browser.version >= 11.5)) {
                                        nativeColorUi = true;
                                }
                                $$(".content-ajax .input-colorpicker").each(function(item){
                                        if (nativeColorUi) {
                                                item.type = "color";
                                        } else {
                                                new MooRainbow(item, {
                                                        id: item.id,
                                                        imgPath: "' . JURI::root(true) . '/media/system/images/mooRainbow/",
                                                        onComplete: function(color) {
                                                                this.element.value = color.hex;
                                                        },
                                                        startColor: item.value.hexToRgb(true) ? item.value.hexToRgb(true) : [0, 0, 0]
                                                });
                                        }
                                });
                            };            
                        ');

                        // Prepare function for initialize tip fields after ajax call.
                        $doc->addScriptDeclaration('
                            window.initTooltipsJ25 = function() {
                                    $$(".hasTip").each(function(el) {
                                            var title = el.get("title");
                                            if (title) {
                                                    var parts = title.split("::", 2);
                                                    el.store("tip:title", parts[0]);
                                                    el.store("tip:text", parts[1]);
                                            }
                                    });
                                    var JTooltips = new Tips($$(".hasTip"), { maxTitleChars: 50, fixed: false});
                            }           
                        ');

                        // Initialize fields in J!2.5.
                        $doc->addScript(JURI::root(true) . '/media/mod_pwebbox/js/admin_j25.js');

                        // For some reason it was neccessary in J!2.5.
                        if (JFile::exists(JPATH_ROOT . '/media/plg_everything_in_everyway_zoo_article/js/admin.js')) {
                            //$doc->addScript(JURI::root(true) . '/media/plg_everything_in_everyway_zoo_article/js/admin.js'); 
                        }

                        if (JFile::exists(JPATH_ROOT . '/media/jui/js/bootstrap.min.js')) {
                            $doc->addScript(JURI::root(true) . '/media/jui/js/bootstrap.min.js');
                        } 
		}
                
                if (version_compare(JVERSION, '3.2.0') == -1)
                {
                    // Check if com_ajax is installed and enabled.
                    if(!is_file(JPATH_ROOT.'/components/com_ajax/ajax.php'))
                    {
                            $app->enqueueMessage(JText::sprintf('MOD_PWEBBOX_CONFIG_INSTALL_COM_AJAX', 
                                    '<a href="https://www.perfect-web.co/downloads/joomla-3-ui-libraries-for-joomla-25/latest/com_ajax-zip?format=raw" target="_blank">', '</a>'), 'error');                    
                    } 
                }
		
		return null;
	}
	
	
	protected function getLabel()
	{
		return null;
	}
}