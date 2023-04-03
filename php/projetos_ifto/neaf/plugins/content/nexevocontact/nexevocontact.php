<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/

class plgContentnexevocontact extends JPlugin
{
	function onContentPrepareForm($form, $data)
	{

		$is_module = is_object($data) && isset($data->module) && $data->module == "mod_nexevocontact";
		$is_menu_item = is_array($data) && isset($data["request"]["option"]) && $data["request"]["option"] == "com_nexevocontact";

		$language = JFactory::getLanguage();
		$enGB = $language->get("tag") == $language->getDefault();

		if ($is_module || ($is_menu_item && !$enGB))
		{

			$component_name = "com_" . basename(realpath(dirname(__FILE__)));

			$language->load($component_name, JPATH_ADMINISTRATOR, $language->getDefault(), true);
			$language->load($component_name, JPATH_ADMINISTRATOR, null, true);
		}

		return true;
	}
}
