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

class JFormFieldNHeader extends JFormField
	{
	protected $type = 'NHeader';

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

		echo '<div class="clr"></div>';
		$image = '';
		$icon	= (string)$this->element['icon'];
		if (!empty($icon))
			{
			$image .= '<img style="margin:0; float:' . $left . ';" src="' . JUri::base() . '../media/' . $cn . '/images/' . $icon . '">';
			}

		$helpurl	= (string)$this->element['helpurl'];
		if (!empty($helpurl))
			{
			$image .= '<a href="' . $helpurl . '" target="_blank"><img style="margin:0; float:' . $right . ';" src="' . JUri::base() . '../media/' . $cn . '/images/question-button-16.png"></a>';
			}

		$style = 'background:#011f60; color:#ffcb08; border:1px solid silver; padding:5px; margin:5px 0;';
		if ($this->element['default'])
			{
			return '<div style="' . $style . '">' .
			$image .
			'<span style="padding-' . $left . ':5px; font-weight:bold; line-height:16px;">' .
			JText::_($this->element['default']) .
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
