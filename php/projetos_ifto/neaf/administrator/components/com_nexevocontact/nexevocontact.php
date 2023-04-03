<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
if (!JFactory::getUser()->authorise("core.manage", "com_nexevocontact"))
{
	JFactory::getApplication()->enqueueMessage(JText::_("JERROR_ALERTNOAUTHOR"), "error");
	return;
}

$language = JFactory::getLanguage();

if ($language->get("tag") != $language->getDefault())
{

    $GLOBALS["com_name"] = basename(dirname(__FILE__));

    $language->load($GLOBALS["com_name"], JPATH_ADMINISTRATOR, $language->getDefault(), true);

    $language->load($GLOBALS["com_name"], JPATH_ADMINISTRATOR, null, true);
}
jimport('joomla.application.component.controller');
$controller = JControllerLegacy::getInstance("NexevoContact");
$controller->execute(JFactory::getApplication()->input->get("task", "display"));
$controller->redirect();
