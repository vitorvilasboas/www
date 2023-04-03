<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
$GLOBALS["ext_name"] = basename(__FILE__);
$GLOBALS["com_name"] = dirname(__FILE__);
$GLOBALS["mod_name"] = realpath(dirname(__FILE__) . "/../../modules");
$GLOBALS["EXT_NAME"] = strtoupper($GLOBALS["ext_name"]);
$GLOBALS["COM_NAME"] = strtoupper($GLOBALS["com_name"]);
$GLOBALS["MOD_NAME"] = strtoupper($GLOBALS["mod_name"]);
$GLOBALS["left"] = false;
$GLOBALS["right"] = true;
$thmDir = dirname(__FILE__) .DIRECTORY_SEPARATOR. 'helpers' .DIRECTORY_SEPARATOR;
$application = JFactory::getApplication('site');
$menu = $application->getMenu();
$assetDir = dirname(__FILE__) .DIRECTORY_SEPARATOR. 'views' .DIRECTORY_SEPARATOR. 'loader' . DIRECTORY_SEPARATOR;
$activemenu = $menu->getActive() or $activemenu = new stdClass();
$application->owner = "component";
require_once( $thmDir . 'dateSelect.php' );
$application->oid = isset($activemenu->id) ? $activemenu->id : 0;
$application->cid = isset($activemenu->id) ? $activemenu->id : 0;
$application->mid = 0;
$application->submitted = (bool)count($_POST) && isset($_POST["cid_$application->cid"]);
$me = basename(__FILE__);
$name = substr($me, 0, strrpos($me, '.'));
include(realpath(dirname(__FILE__) . "/" . $name . ".inc"));

$language = JFactory::getLanguage();

if ($language->get("tag") != $language->getDefault())
{

    $language->load($GLOBALS["com_name"], JPATH_SITE, $language->getDefault(), true);
    $language->load($GLOBALS["com_name"], JPATH_SITE, null, true);
}

jimport('joomla.application.component.controller');
$controller = JControllerLegacy::getInstance('NexevoContact');
$controller->execute(JFactory::getApplication()->input->get("task", "display"));
$controller->redirect();

