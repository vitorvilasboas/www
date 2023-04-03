<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
jimport('joomla.form.formfield');

class JFormFieldNTextarea extends JFormField
{
	protected $type = 'NTextarea';

	protected function getInput()
	{
		$class		= $this->element['class'] ? ' class="'.(string) $this->element['class'].'"' : '';
		$disabled	= ((string) $this->element['disabled'] == 'true') ? ' disabled="disabled"' : '';
		$columns	= $this->element['cols'] ? ' cols="'.(int) $this->element['cols'].'"' : '';
		$rows		= $this->element['rows'] ? ' rows="'.(int) $this->element['rows'].'"' : '';
		$onchange	= $this->element['onchange'] ? ' onchange="'.(string) $this->element['onchange'].'"' : '';
		if (!(bool)$this->form->getValue('id')) $this->value = JText::_((string)$this->element['wizard']);
		return '<textarea name="'.$this->name.'" id="'.$this->id.'"' .
				$columns.$rows.$class.$disabled.$onchange.'>' .
				htmlspecialchars($this->value, ENT_COMPAT, 'UTF-8') .
				'</textarea>';
	}
}
