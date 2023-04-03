<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
function HeaderRedirect(&$params)
{
	$redirect = $params->get('email_sent_action', 0);
	if (!$redirect)
	{
		return;
	}
	
	$link = NGetLink(intval($params->get('email_sent_page', 0)));
	if (!$link)
	{
		return;
	}
	
	switch ($redirect)
	{
		case 1:
			header('Location: ' . $link);
			break;
		case 2:
			header('refresh:5;url=' . $link);
	}

}
function NGetLink($menu_id = NULL, $anchor = NULL)
{
	global $app;
	$wholemenu = $app->getMenu();
	if ($menu_id)
	{
		$targetmenu = $wholemenu->getItem($menu_id);
	}
	else
	{
		$targetmenu = $wholemenu->getActive();
	}
	
	if (!is_object($targetmenu))
	{
		return NULL;
	}
	
	$link = $targetmenu->link;
	$router = JSite::getRouter();
	if ($router->getMode() == JROUTER_MODE_SEF)
	{
		$link = 'index.php?Itemid=' . $targetmenu->id;
	}
	else
	{
		$link .= '&Itemid=' . $targetmenu->id;
	}
	
	$link .= $anchor;
	return JRoute::_($link);
}
function GetHelpLink($msg)
{
	$link = array();
	$lang = JFactory::getLanguage();
	$lang->load('com_nexevocontact.sys', JPATH_ADMINISTRATOR);
	$link[JText::_('PHPMAILER_INSTANTIATE')] = '13-submissions-via-email/443-could-not-instantiate-mail-function.html';
	$link[JText::_('PHPMAILER_AUTHENTICATE')] = '13-submissions-via-email.html';
	$link[JText::_('PHPMAILER_CONNECT_HOST')] = '13-submissions-via-email.html';
	$link[JText::_('JLIB_MAIL_FUNCTION_DISABLED')] = '13-submissions-via-email.html';
	$baseurl = 'http://www.nexevo.in/';
	$index = isset($link[$msg]) ? $link[$msg] : '2-documentation.html';
	return '<a href="' . $baseurl . $index . '" target="_blank">' . $lang->_('COM_NEXEVOCONTACT_DOCUMENTATION') . '</a>';
}
function HumanReadable($bytes, $decimals = 'auto')
{
	for ($i = 0; $bytes >= 1000; ++$i)
	{
		$bytes /= 1024;
	}
	
	if ($decimals === 'auto')
	{
		$decimals = 3 - strlen((string) floor($bytes));
	}
	
	static $symbols = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
	return sprintf('%.' . $decimals . 'f ' . $symbols[$i], $bytes);
}
?>