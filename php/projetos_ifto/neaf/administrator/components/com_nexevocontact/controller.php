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
	function display($cachable = false, $urlparams = array())
	{
		JRequest::setVar("view", JFactory::getApplication()->input->get("view", "Dashboard"));
		parent::display($cachable, $urlparams);
	}
}
