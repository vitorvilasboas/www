<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
jimport('joomla.form.formfield');

class JFormFieldNTranschecker extends JFormField
	{
	protected $type = 'NTranschecker';

	protected function getInput()
		{
		return "";
		}

	protected function getLabel()
		{
		$lang = JFactory::getLanguage();

		$cn = basename(realpath(dirname(__FILE__) . '/../..'));
		$direction = intval($lang->get('rtl', 0));
		$left  = $direction ? "right" : "left";
		$right = $direction ? "left" : "right";
		$image = '<img style="margin:0; float:' . $left . ';" src="' . JUri::base() . '../media/' . $cn . '/images/translations.png' . '">';
		$style = 'background:#f4f4f4; border:1px solid silver; padding:5px; margin:5px 0;';
		$msg_skel =
			'<div style="' . $style . '">' .
			$image .
			'<span style="padding-' . $left . ':5px; line-height:16px;">' .
			'Admin side translation for %s language is still %s. Please consider to contribute by writing and sharing your own translation. <a href="http://www.nexevo.in" target="_blank">Learn more.</a>' .
			'</span>' .
			'</div>';


		if (intval(JText::_(strtoupper($cn) . '_PARTIAL')))
			{
			return sprintf($msg_skel, $lang->get("name"), "incomplete");
			}

		if (!file_exists(JPATH_ADMINISTRATOR . "/language/" . $lang->get("tag") . "/" . $lang->get("tag") . "." . $cn . ".ini"))
			{
			return sprintf($msg_skel, $lang->get("name"), "missing");
			}

		return "";
		}
	}