<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
jimport('joomla.application.component.controller');

class NexevoContactController extends JControllerLegacy
{
	public function display($cachable = false, $urlparams = false)
	{
		$application = JFactory::getApplication("site");
		$menu = $application->getMenu();
		$activemenu = $menu->getActive();
		$view = $application->input->get("view", $this->default_view);
		if ($view == "nexevocontact" && !$activemenu)
		{
			JFactory::getApplication()->redirect(JRoute::_("index.php?option=com_nexevocontact&view=invalid"));
		}

		return parent::display($cachable, $urlparams);
	}
}
