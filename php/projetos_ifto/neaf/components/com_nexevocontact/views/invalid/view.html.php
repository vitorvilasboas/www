<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/


require_once JPATH_COMPONENT . "/lib/functions.php";

class NexevoContactViewInvalid extends JViewLegacy
{
	
	public function display($tpl = null)
	{
		echo '<h2>' . JText::_('COM_NEXEVOCONTACT_ERR_PROVIDE_VALID_URL') . '</h2>';
		$application = JFactory::getApplication('site');
		$menu = $application->getMenu();
		$valid_items = $menu->getItems('component', 'com_nexevocontact');
		echo '<ul>';
		foreach ($valid_items as $valid_item)
		{
			echo '<li><a href="' . NGetLink($valid_item->id) . '">' . $valid_item->title . '</a></li>';
		}
		
		echo '</ul>';
		JFactory::getLanguage()->load('com_nexevocontact', JPATH_ADMINISTRATOR);
		echo '<p><a href="http://www.nexevo.in">' . JText::_('COM_NEXEVOCONTACT_DOCUMENTATION') . '</a></p>';
	}

}