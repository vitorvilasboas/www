<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/

JFormHelper::loadFieldClass("groupedlist");

class JFormFieldFormList extends JFormFieldGroupedList
{
	
	public $type = "FormList";
	protected function getGroups()
	{
		$db = JFactory::getDbo();

		$query = $db->getQuery(true);
		$query->select("id as value, title as text");
		$query->from("#__menu");
		$query->where("link LIKE " . $db->quote("%option=com_nexevocontact&view=nexevocontact%"));
		$db->setQuery($query);
		$components = $db->loadObjectList();
		$query->clear();
		$query->select("-id as value, title as text");
		$query->from("#__modules");
		$query->where("module = " . $db->quote("mod_nexevocontact"));

		$db->setQuery($query);
		$modules = $db->loadObjectList();

		return array(
			JText::_("COM_NEXEVOCONTACT_MENU_ITEMS") => $components,
			JText::_("COM_NEXEVOCONTACT_MODULES") => $modules
		);
	}
}