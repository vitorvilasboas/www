<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
class NexevoView extends JViewLegacy
{
	public function display($tpl = null)
	{
		JFactory::getDocument()->addStyleSheet(JUri::base(true) . "/components/com_nexevocontact/css/component.css");
		parent::display($tpl);
	}

	public function addSubmenu($vName)
	{

	}

}
