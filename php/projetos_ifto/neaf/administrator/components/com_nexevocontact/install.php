<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/

require_once(realpath(dirname(__FILE__) . '/nexevoinstall.php'));

class com_nexevocontactInstallerScript extends NexevoInstaller
{
	function update($parent)
	{
		@unlink(JPATH_ROOT . '/components/' . $parent->get('element') . '/helpers/nsession.php');
		parent::install($parent);
	}
}