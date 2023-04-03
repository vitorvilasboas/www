<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/

jimport('joomla.form.formfield');


class JFormFieldNSpacer extends JFormField
{

	protected $type = 'NSpacer';

	protected function getInput()
	{
		return ' ';
	}

	protected function getLabel()
	{
		$html = array();
		$class = $this->element['class'] ? (string) $this->element['class'] : '';

		$html[] = '<span class="spacer">';
		$html[] = '<span class="before"></span>';
		$html[] = '<span class="'.$class.'">';
		if ((string) $this->element['hr'] == 'true') {
			$html[] = '<hr class="'.$class.'" />';
		}
		else {
			$label = '';
			$text = $this->element['label'] ? (string) $this->element['label'] : (string) $this->element['name'];
			$text = $this->translateLabel ? JText::_($text) : $text;
			$class = !empty($this->description) ? 'hasTip' : '';
			$class = $this->required == true ? $class.' required' : $class;

			$url = (string)$this->element['url'];
			if (!empty($url))
				{
				$label .= '<a target="_blank" href="' . $this->element['url'] . '">';
				}
			$label .= '<span class="'.$class.'"';
			if (!empty($this->description)) {
				$label .= ' title="'.htmlspecialchars(trim($text, ':').'::' .
							($this->translateDescription ? JText::_($this->description) : $this->description), ENT_COMPAT, 'UTF-8').'"';
			}
			$label .= '>'.$text.'</span>';

			if (!empty($url)) $label .= '</a>';

			$html[] = $label;
		}
		$html[] = '</span>';
		$html[] = '<span class="after"></span>';
		$html[] = '</span>';
		return implode('',$html);
	}

	protected function getTitle()
	{
		return $this->getLabel();
	}
}
