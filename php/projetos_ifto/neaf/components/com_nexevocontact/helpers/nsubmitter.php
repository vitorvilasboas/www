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

class NSubmitter extends NDataPump
{

	public function __construct(&$params, NexevoMessageBoard &$messageboard)
	{
		parent::__construct($params, $messageboard);

		$this->Name = "NSubmitter";
		$this->isvalid = (count($_POST) > 1 && isset($_POST[$this->GetId()]));
	}


	public function Show()
	{
		$result = "";

		$field = array();
		if ($this->Params->get("copy_to_submitter", 0) == 2 && 
			(bool)$this->Params->get("sender1display", 0)
		)
		{
			
			$field["Display"] = 1;
			$field["Type"] = "checkbox";
			$field["Name"] = JText::_($GLOBALS["COM_NAME"] . "_SEND_ME_A_COPY");
			$field["PostName"] = $this->SafeName("copy_to_submitter" . $this->GetId());
			$field["Value"] = $this->JInput->post->get($field["PostName"], NULL, "int");
			$field["IsValid"] = true;
			$result .= $this->BuildCheckboxField("", $field);
		}

		$this->CreateSpacerLabel();
		$result .= '<div class="control-group">' . PHP_EOL .
			$this->LabelHtmlCode . PHP_EOL .
			'<div class="controls">' . PHP_EOL;

		$result .= '<input type="hidden" name="' . $this->GetId() . '" value="">' . PHP_EOL;

		switch ($this->Params->get("submittype"))
		{
			case 1:
				$result .= '<input class="btn btn-success" type="submit" style="margin-' . $GLOBALS["right"] . ':32px;" value="' . $this->Params->get("submittext") . '"/>' . PHP_EOL;
				break;

			default:
				$icon = $this->Params->get("submiticon");
				$result .= '<button class="btn btn-success" type="submit" style="margin-' . $GLOBALS["right"] . ':32px;">' . PHP_EOL .
					'<span ';
				if ($icon != "-1") $result .= 'style="" ';
				$result .= '>' .
					$this->Params->get("submittext") .
					'</span>' . PHP_EOL .
					'</button>' . PHP_EOL;
		}

		if ($this->Params->get("resetbutton"))
		{
			switch ($this->Params->get("resettype"))
			{
				case 1:
					$result .= '<input class="btn btn-danger" type="reset" onClick="ResetNexevoControls();" value="' . $this->Params->get("resettext") . '">' . PHP_EOL;
					break;

				default:
					$reseticon = $this->Params->get("reseticon");
					$result .= '<button class="btn btn-danger" type="reset" onClick="ResetNexevoControls();">' . PHP_EOL .
						'<span ';
					if ($reseticon != "-1") $result .= 'style="" ';
					$result .= '>' .
						$this->Params->get("resettext") .
						'</span>' . PHP_EOL .
						'</button>' . PHP_EOL;
			}
		}
		$result .=
			'</div>' .
			'</div>' . PHP_EOL . 
			PHP_EOL;

		return $result;
	}


	protected function LoadFields()
	{
	}

	private function BuildCheckboxField($key, &$field)
	{
		if ($field['Value'] == JText::_('JYES')) $checked = 'checked=""';
		else $checked = "";

		$this->CreateSpacerLabel();

		$result = '<div class="control-group nexevo_copy_to_sender">' . PHP_EOL .
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
			$field['Name'] .
			'</label>' .
			'</div>' . PHP_EOL .
			'</div>' . PHP_EOL .
			PHP_EOL;

		return $result;
	}

}