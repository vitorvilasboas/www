<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
abstract class NDataPump
{

	public $Params;
	public $Application;
	public $Name;
	public $Fields = array();
	public $Style = array();
	protected $Submitted;


	protected $Logger;

	protected $isvalid;

	protected $MessageBoard;
	protected $JInput;
	protected $FieldValue;
	protected $LabelHtmlCode;
	protected $JSCode;


	abstract protected function LoadFields();


	public function __construct(&$params, NexevoMessageBoard &$messageboard)
	{
		$this->Params = & $params;
		$this->MessageBoard = & $messageboard;
		$this->Application = JFactory::getApplication();
		$this->Submitted = (bool)count($_POST) && isset($_POST[$this->GetId()]);
		$this->JInput = JFactory::getApplication()->input;
		$this->LoadFields();
	}


	public function IsValid()
	{
		return $this->isvalid;
	}


	protected function LoadField($type, $name)
	{
		$enabled = intval($this->Params->get($name . "display", "0"));
		if (!$enabled) return false;

		$this->Fields[$name]["Display"] = intval($this->Params->get($name . "display", "0"));
		$this->Fields[$name]["Type"] = $type;
		$this->Fields[$name]["Name"] = $this->Params->get($name, "");
		$this->Fields[$name]["PostName"] = $this->SafeName($this->Fields[$name]["Name"] . $this->Application->cid . $this->Application->mid);
		$this->Fields[$name]["Values"] = $this->Params->get($name . "values", "");
		$this->Fields[$name]["Width"] = intval($this->Params->get($type . "width", ""));
		$this->Fields[$name]["Height"] = intval($this->Params->get($type . "height", ""));
		$this->Fields[$name]["Unit"] = $this->Params->get($type . "unit", "");
		$this->Fields[$name]["Order"] = intval($this->Params->get($name . "order", 0));
		return true;
	}


	protected function MakeText($key)
	{
		$text = $this->Params->get($key, "");
		if (empty($text)) return "";
		return
			'<div class="nexevomessage" style="clear:both;">' .
			$text .
			'</div>';
	}


	protected function AdditionalDescription($display)
	{
		return ($display == 2) ? ("<span class=\"required\"></span>") : "";
	}


	protected function SafeName($name)
	{
		return "_" . md5($name);
	}


	protected function GetComponentId()
	{
		global $app;
		if (strpos($app->scope, "com_") !== 0) return 0;

		$wholemenu = $this->Application->getMenu();
		$targetmenu = $wholemenu->getActive();
		return $targetmenu->id;
	}


	protected function GetId($separator = "_")
	{
		$id = substr($this->Application->scope, 0, 1); 
		switch ($id)
		{
			case "c":
				$wholemenu = $this->Application->getMenu();
				$activemenu = $wholemenu->getActive();
				$id .= "id" . $separator . $activemenu->id;
				break;

			case "m":
				$id .= "id" . $separator . $this->Application->mid;
				break;

			default:
				$id = "";
		}

		return $id;
	}


	protected function CreateStandardLabel($field)
	{

		if ((bool)$this->Params->get("labelsdisplay"))
		{
			$this->FieldValue = $field["Value"];
			$this->LabelHtmlCode = '<label class="control-label">' . $field["Name"] . $this->AdditionalDescription($field["Display"]) . '</label>';
			$this->JSCode = "";
		}
		else
		{
		
			$this->FieldValue = $field["Value"] ? $field["Value"] : $field["Name"];
			$this->LabelHtmlCode = "";
			$this->JSCode = "onfocus=\"if(this.value==this.title) this.value='';\" onblur=\"if(this.value=='') this.value=this.title;\" ";
		}
	}


	protected function CreateSpacerLabel()
	{

		$layout = $this->Params->get("form_layout", "extended");

		if ((bool)$this->Params->get("labelsdisplay") && ($layout == "compact" || $layout == "extended"))
		{
			$this->LabelHtmlCode = '<label class="control-label">&nbsp;</label>';
		}
		else
		{
			$this->LabelHtmlCode = "";
		}

	}

}
