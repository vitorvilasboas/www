<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/

jimport('joomla.html.html');
jimport('joomla.form.formfield');

class JFormFieldNConditionalWarningLabel extends JFormField
	{
	protected $type = 'NConditionalWarningLabel';

	protected function getInput()
		{
		return '';
		}

	protected function getLabel()
		{
		$cn = basename(realpath(dirname(__FILE__) . '/../..'));

		$direction = intval(JFactory::getLanguage()->get('rtl', 0));
		$left  = $direction ? "right" : "left";
		$right = $direction ? "left" : "right";

		$db = JFactory::getDBO();
		$sql = "SELECT value FROM #__" . substr($cn, 4) . "_settings WHERE name = '" . $this->element['triggerkey'] . "';";
		$db->setQuery($sql);
		$method = $db->loadResult();

		if (!$method)
			{
			$style = 'clear:both; background:#f4f4f4; border:1px solid silver; padding:5px; margin:5px 0;';
			$image = '<img style="margin:0; float:' . $left . ';" src="' . JUri::base() . '../media/' . $cn . '/images/exclamation-16.png">';
			return
				'<div style="' . $style . '">' .
				$image .
				'<span style="padding-' . $left . ':5px; line-height:16px;">' .
				JText::_(strtoupper($cn) . '_ERR_DATABASE_PROBLEMS') .
				' <a href="http://www.nexevo.in" target="_blank">' .
				JText::_(strtoupper($cn) . '_DOCUMENTATION') .
				'</a>.' .
				'</span>' .
				'</div>';
			}

		if ($method != $this->element['triggervalue'])
			{
			return "";
			}

		echo '<div class="clr"></div>';
		$image = '';
		$icon	= (string)$this->element['icon'];
		if (!empty($icon))
			{
			$image .= '<img style="margin:0; float:' . $left . ';" src="' . JUri::base() . '../media/' . $cn . '/images/' . $icon . '">';
			}

		$style = 'background:#f4f4f4; border:1px solid silver; padding:5px; margin:5px 0;';
		if ($this->element['default'])
			{
			return '<div style="' . $style . '">' .
				$image .
				'<span style="padding-' . $left . ':5px; line-height:16px;">' .
				JText::_($this->element['default']) .
				'. <a href="' . $this->element['triggerdata'] . '" target="_blank">' .
				JText::_(strtoupper($cn) . '_DOCUMENTATION') .
				'</a>.' .
				'</span>' .
				'</div>';
			}
		else
			{
			return parent::getLabel();
			}

		echo '<div class="clr"></div>';
		}
	}
?>
