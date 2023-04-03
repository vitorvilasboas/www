<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
jimport("joomla.form.formfield");

JFormHelper::loadFieldClass("list");

class JFormFieldNexevoEmailChooser extends JFormFieldList
{
	protected $type = "NexevoEmailChooser";


	public function __construct($form = null)
	{
		parent::__construct($form);

		static $resources = true;
		if ($resources)
		{
			$resources = false;
			$com_name = basename(realpath(__DIR__ . "/../.."));
			$document = JFactory::getDocument();

			$type = strtolower($this->type);
			if (file_exists(JPATH_ADMINISTRATOR . "/components/" . $com_name . "/js/" . $type . ".js"))
			{
				$document->addScript(JUri::base(true) . "/components/" . $com_name . "/js/" . $type . ".js");
			}

			if (file_exists(JPATH_ADMINISTRATOR . "/components/" . $com_name . "/css/" . $type . ".css"))
			{
				$document->addStyleSheet(JUri::base(true) . "/components/" . $com_name . "/css/" . $type . ".css");
			}
		}
	}


	protected function getInput()
	{
		$html = array();
		$options = (array)$this->getOptions();

		$html[] = '<select onchange="EmailChooserChange(this);" onkeyup="EmailChooserChange(this);" name="' . $this->name . '[select]" id="jform_' . $this->fieldname . '" class="nexevoemailchooser">';
		foreach ($options as $option)
		{
			$selected = ($option->value == $this->value["select"]) ? ' selected="selected"' : "";
			$html[] = '<option value="' . $option->value . '" class="' . $option->class . '"' . $selected . '>' . $option->text . '</option>';
		}
		$html[] = '</select>';

		$html[] = '<fieldset class="panelform" id="' . $this->id . '_children">';
		$html[] = '<label for="jform_nexevoemailchooser_name" aria-invalid="false">' . JText::_("COM_NEXEVOCONTACT_NAME") . '</label>';
		$html[] = '<input type="text" name="' . $this->name . "[name]" . '" id="' . $this->id . '_name' . '"' . ' value="'
			. htmlspecialchars(empty($this->value["name"]) ? "" : $this->value["name"], ENT_COMPAT, 'UTF-8') . '"' . '/>';
		$html[] = '<label for="jform_nexevoemailchooser_email" aria-invalid="false">' . JText::_("COM_NEXEVOCONTACT_EMAIL_ADDRESS") . '</label>';
		$html[] = '<input type="text" name="' . $this->name . "[email]" . '" class="validate-email" id="' . $this->id . '_email' . '"' . ' value="'
			. htmlspecialchars(empty($this->value["email"]) ? "" : $this->value["email"], ENT_COMPAT, 'UTF-8') . '"' . '/>';
		$html[] = "</fieldset>";

		return implode($html);
	}

}
