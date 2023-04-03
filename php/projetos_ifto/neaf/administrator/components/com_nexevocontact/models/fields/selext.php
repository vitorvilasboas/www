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
class JFormFieldSelext extends JFormFieldList
{
	protected $type = "Selext";


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

		switch (gettype($this->value))
		{
			case "string":
			$this->value = explode("|", $this->value);
			$this->value["text"] = $this->value[0];
			$this->value["select"] = $this->value[1];
				break;
			case "object":
				$this->value = get_object_vars($this->value);
				break;
		}

		$size = $this->element["size"] ? 'size="' . (int)$this->element["size"] . '" ' : '';

		$html =
			'<input ' .
			'type="text" ' .
			'name="' . $this->name . '[text]" ' .
			'id="' . $this->id . '_text" ' .
			'value="' . htmlspecialchars($this->value["text"], ENT_COMPAT, 'UTF-8') . '" ' .
			$size .
			'class="selext" />';

		$html .=
			'<select ' .
			'onchange="SelextSelectChange(this, \'' . $this->id . '\');" onkeyup="SelextSelectChange(this, \'' . $this->id . '\');" ' .
			'name="' . $this->name . '[select]" ' .
			'id="' . $this->id . '_select" ' .
			'class="selext">';
		$options = (array)$this->getOptions();
		foreach ($options as $option)
		{
			$selected = ($option->value == $this->value["select"]) ? $selected = 'selected="selected"' : "";
			$html .= '<option value="' . $option->value . '" class="' . $option->class . '" ' . $selected . '>' . $option->text . '</option>';
		}

		$html .= '</select>';

		return $html;
	}

}
