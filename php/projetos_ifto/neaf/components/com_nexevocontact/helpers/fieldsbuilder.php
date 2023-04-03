<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
$inc_dir = realpath(dirname(__FILE__));
require_once($inc_dir . '/ndatapump.php');
require_once($inc_dir . '/conflicting.php');
require_once($inc_dir . '/nlogger.php');

class FieldsBuilder extends NDataPump
{
	public function __construct(&$params, NexevoMessageBoard &$messageboard)
	{
		parent::__construct($params, $messageboard);

		$this->ValidateEmail(); 

		if (!isset($GLOBALS[$GLOBALS["ext_name"] . '_js_loaded']))
		{

			JHtml::_("jquery.framework");

			$nexevoDocument = NexevoDocument::getInstance();

			$min = JFactory::getConfig()->get("debug") ? "" : ".min";
			$nexevoDocument->addResource(array("root" => "components", "filename" => "nexevotext", "type" => "js"));
			$nexevoDocument->addScript(JUri::base(true) . "/components/" . $GLOBALS["com_name"] . "/js/fileuploader" . $min . ".js");

			$document = JFactory::getDocument();

		
			$uncompressed = JFactory::getConfig()->get("debug") ? "-uncompressed" : "";
			$document->addScript(JUri::base(true) . "/media/system/js/core" . $uncompressed . ".js");
			$document->addScript(JUri::base(true) . "/media/jui/js/chosen.jquery" . $min . ".js");

			$GLOBALS[$GLOBALS["ext_name"] . '_js_loaded'] = true;
		}

		$this->isvalid = intval($this->ValidateForm()); 


		$conflict = new NexevoConflicting();
		if ($conflict->HasMessages())
		{
			$messageboard->Append($conflict->GetMessages(), NexevoMessageBoard::warning);
		}

	}


	public function count_fields(&$fields, $type)
	{

		$result = 0;
		$type_len = strlen($type);
		foreach ($fields as $fname => $fvalue)
		{
			if (
				substr($fname, 0, $type_len) == $type && 
				substr($fname, strlen($fname) - 7) == "display" 
			)
				++$result;
		}
		return $result;
	}


	public function Show()
	{
		$result = "";
		uasort($this->Fields, "sort_fields");

		foreach ($this->Fields as $key => $field)
		{
			switch ($field['Type'])
			{
				case 'customhtml':
					$result .= $this->BuildCustomHtmlField($key, $field);
					break;
				case 'sender':
				case 'text':
					$result .= $this->BuildTextField($key, $field); 
					break;
				case 'dropdown':
					$result .= $this->BuildDropdownField($key, $field);
					break;
				case 'textarea':
					$result .= $this->BuildTextareaField($key, $field); 
					break;
				case 'checkbox':
					$result .= $this->BuildCheckboxField($key, $field); 
					break;
			}

			if (!$field["IsValid"]) $this->MessageBoard->Add(JText::sprintf($GLOBALS["COM_NAME"] . '_ERR_INVALID_VALUE', $field["Name"]), NexevoMessageBoard::error);
		}

		return $result;
	}


	protected function LoadFields()
	{
		$fields = $this->Params->toArray();
		$text_count = $this->count_fields($fields, "text");
		$dropdown_count = $this->count_fields($fields, "dropdown");
		$textarea_count = $this->count_fields($fields, "textarea");
		$checkbox_count = $this->count_fields($fields, "checkbox");
		$this->LoadField("labels", "");
		$this->LoadField("customhtml", 0);
		for ($n = 0; $n < 2; ++$n) $this->LoadField("sender", $n);
		for ($n = 0; $n < $text_count; ++$n) $this->LoadField("text", $n);
		for ($n = 0; $n < $dropdown_count; ++$n) $this->LoadField("dropdown", $n);
		for ($n = 0; $n < $textarea_count; ++$n) $this->LoadField("textarea", $n);
		for ($n = 0; $n < $checkbox_count; ++$n) $this->LoadField("checkbox", $n);
		$this->LoadField("customhtml", 1);
	}


	protected function LoadField($type, $number) 
	{
		$name = $type . (string)$number; 
		if (!parent::LoadField($type, $name)) return false;
		$this->Fields[$name]['Value'] = $this->JInput->post->get($this->Fields[$name]['PostName'], NULL, "string");
		if ($this->Fields[$name]['Value'] == $this->Fields[$name]['Name']) 
		{
			$this->Fields[$name]['Value'] = "";
		}
		$this->Fields[$name]['IsValid'] = intval($this->ValidateField($this->Fields[$name]['Value'], $this->Fields[$name]['Display']));
		if ($type == "checkbox" && $this->Fields[$name]['Value'] == "") $this->Fields[$name]['Value'] = JText::_('JNO');

		return true;
	}


	private function BuildCustomHtmlField($key, &$field)
	{
		if (empty($field['Name'])) return "";

		$result = '<div class="control-group">' .
			'<div class="controls">' .
			'<div>' . PHP_EOL .
			$field['Name'] . PHP_EOL .
			"</div>" .
			"</div>" .
			"</div>" . PHP_EOL .
			PHP_EOL;

		return $result;
	}
	private function BuildTextField($key, &$field)
	{
		

		$this->CreateStandardLabel($field);

		$result = '<div class="control-group' . $this->TextStyleByValidation($field) . '">' . PHP_EOL .
			$this->LabelHtmlCode . PHP_EOL .
			'<div class="controls">' .
			'<input ' .
			'type="text" ' .
			'value="' . $this->FieldValue . '" ' .
			'title="' . $field['Name'] . '" ' .
			'name="' . $field['PostName'] . '" ' .
			$this->JSCode .
			'/>' .
			$this->DescriptionByValidation($field) . 
			'</div>' . PHP_EOL . 
			'</div>' . PHP_EOL . 
			PHP_EOL;

		return $result;
	}

	private function BuildDropdownField($key, &$field)
	{
		$this->CreateStandardLabel($field);

		$placeholder = $this->Params->get("labelsdisplay") ? " " : $field['Name'];
		$result = '<div class="control-group' . $this->TextStyleByValidation($field) . '">' . PHP_EOL .
			$this->LabelHtmlCode . PHP_EOL .
			'<div class="controls">' .
			'<select ' .
			'class="nexevo_select" ' .
			'data-placeholder="' . $placeholder . '"' .
			'name="' . $field['PostName'] . '" ' .
			'>' . PHP_EOL;
		$result .= '<option value=""></option>';
		$options = explode(",", $field['Values']);
		foreach ($options as $option)
		{
			$result .= "<option value=\"" . $option . "\"";
			if ($field['Value'] === $option && !empty($option))
			{
				$result .= " selected ";
			}
			$result .= ">" . $option . "</option>";
		}
		$result .= PHP_EOL . "</select>" .
			$this->DescriptionByValidation($field) .
			'</div>' . PHP_EOL .
			"</div>" . PHP_EOL . 
			PHP_EOL;

		return $result;
	}
	private function BuildCheckboxField($key, &$field)
	{
		if ($field['Value'] == JText::_('JYES')) $checked = 'checked=""';
		else $checked = "";

		$this->CreateSpacerLabel();

		$result = '<div class="control-group' . $this->TextStyleByValidation($field) . '">' . PHP_EOL .
			$this->LabelHtmlCode . PHP_EOL .
			'<div class="controls">' .
			'<label class="checkbox">' .
			'<input ' .
			'type="checkbox" ' .
			"value=\"" . JText::_('JYES') . "\" " .
			$checked .
			'name="' . $field['PostName'] . '" ' .
			'id="c' . $field['PostName'] . '" ' .
			'/>' .
			$this->AdditionalDescription($field['Display']) . 
			$field['Name'] .
			$this->DescriptionByValidation($field) .
			'</label>' .
			'</div>' . PHP_EOL .
			'</div>' . PHP_EOL .
			PHP_EOL;

		return $result;
	}
	private function BuildTextareaField($key, &$field)
	{
		$this->CreateStandardLabel($field);

		$result = '<div class="control-group' . $this->TextStyleByValidation($field) . '">' . PHP_EOL .
			$this->LabelHtmlCode . PHP_EOL .
			'<div class="controls">' .
			"<textarea " .
			'rows="10" ' .
			'cols="30" ' .
			'name="' . $field['PostName'] . '" ' .
			'title="' . $field['Name'] . '" ' .
			$this->JSCode .
			">" .
			$this->FieldValue . 
			"</textarea>" .
			$this->DescriptionByValidation($field) .
			'</div>' . PHP_EOL . 
			'</div>' . PHP_EOL .
			PHP_EOL;

		return $result;

	}
	function DescriptionByValidation(&$field)
	{
		return $field['IsValid'] ? "" : (" <span class=\"asterisk\"></span>");
	}
	function CheckboxStyleByValidation(&$field)
	{
		if (!$this->Submitted) return "nexevocheckbox";
		return $field['IsValid'] ? "validcheckbox" : "invalidcheckbox";
	}
	protected function TextStyleByValidation(&$field)
	{
		if (!$this->Submitted) return "";
		return $field['IsValid'] ? " success" : " error";
	}


	function ValidateForm()
	{
		$result = true;
		$result &= $this->ValidateGroup("sender");
		$result &= $this->ValidateGroup("text");
		$result &= $this->ValidateGroup("dropdown");
		$result &= $this->ValidateGroup("checkbox");
		$result &= $this->ValidateGroup("textarea");

		return $result;
	}
	function ValidateGroup($family)
	{
		$result = true;

		for ($l = 0; $l < 10; ++$l)
		{
			if (isset($this->Fields[$family . $l]) && $this->Fields[$family . $l]['Display'])
			{
				$result &= $this->Fields[$family . $l]['IsValid'];
			}
		}

		return $result;
	}
	function ValidateField($fieldvalue, $fieldtype)
	{

		return !($this->Submitted && ($fieldtype == 2) && empty($fieldvalue));
	}


	function ValidateEmail()
	{
		if (!isset($_POST[$this->GetId()])) return;
		if (!isset($this->Fields['sender1'])) return;
		if (empty($this->Fields['sender1']['Value']) && $this->Fields['sender1']['Display'] == 1) return;
		if (!isset($this->Fields['sender1']['Value'])) return;
		$this->Fields['sender1']['IsValid'] &= (preg_match('/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/', strtolower($this->Fields['sender1']['Value'])) == 1);
		$config = JComponentHelper::getParams("com_nexevocontact");
		$mode = $config->get("use_dns", "disabled");
		if (method_exists("FieldsBuilder", $mode))
		{
			$this->$mode();
		}
	}


	function dns_check()
	{
		if (empty($this->Fields['sender1']['Value'])) return;

		$parts = explode("@", $this->Fields['sender1']['Value']);
		$domain = array_pop($parts);
		if (!empty($domain))
			$this->Fields['sender1']['IsValid'] &= checkdnsrr($domain, "MX");
	}
}


function sort_fields($a, $b)
{
	return $a["Order"] - $b["Order"];
}


class fieldsbuilderCheckEnvironment
{
	protected $InstallLog;


	public function __construct()
	{
		$this->InstallLog = new NLogger("fieldsbuilder", "install");
		$params = JComponentHelper::getParams("com_nexevocontact")->toObject();
		$this->test_addresses($params);
		$this->test_dns($params);
		$table = JTable::getInstance("extension");
		$table->load(array("element" => "com_nexevocontact", "client_id" => 1));
		$table->bind(array("params" => json_encode($params)));
		$result = $table->check() && $table->store();

		return $result;
	}


	private function test_dns($params)
	{
		$this->InstallLog->Write("--- Determining if this system is able to query DNS records ---");

		if (!function_exists("checkdnsrr"))
		{
			$this->InstallLog->Write("checkdnsrr function doesn't exist.");
			$params->use_dns = "0";
			return;
		}
		$this->InstallLog->Write("checkdnsrr function found. Let's see if it works.");
		$record_found = checkdnsrr("nexevo.in", "MX");
		$this->InstallLog->Write("testing function [checkdnsrr]... [" . intval($record_found) . "]");
		$result = $record_found ? "dns_check" : "0";
		$this->InstallLog->Write("--- Method choosen to query DNS records is [$result] ---");

		$params->use_dns = $result;
	}


	private function test_addresses(&$params)
	{
		isset($params->adminemailfrom) or $params->adminemailfrom = new stdClass();
		isset($params->adminemailreplyto) or $params->adminemailreplyto = new stdClass();
		isset($params->submitteremailfrom) or $params->submitteremailfrom = new stdClass();
		isset($params->submitteremailreplyto) or $params->submitteremailreplyto = new stdClass();
		$params->adminemailfrom->select = "admin";
		$params->adminemailreplyto->select = "submitter";
		$params->submitteremailfrom->select = "admin";
		$params->submitteremailreplyto->select = "admin";
		$application = JFactory::getApplication();
		if ($application->getCfg("mailer") == "smtp" && (bool)$application->getCfg("smtpauth") && strpos($application->getCfg("smtpuser"), "@") !== false)
		{
			$params->adminemailfrom->select = "custom";
			$params->adminemailfrom->name = $application->getCfg("fromname");
			$params->adminemailfrom->email = $application->getCfg("smtpuser");

			$params->submitteremailfrom->select = "custom";
			$params->submitteremailfrom->name = $application->getCfg("fromname");
			$params->submitteremailfrom->email = $application->getCfg("smtpuser");
		}
	}

}
