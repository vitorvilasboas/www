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
require_once($inc_dir . '/nlogger.php');

class NAntispam extends NDataPump
{
	protected $FieldsBuilder;


	public function __construct(&$params, NexevoMessageBoard &$messageboard, $fieldsbuilder)
	{
		parent::__construct($params, $messageboard);

		$this->Name = "NAntispam";
		$this->FieldsBuilder = $fieldsbuilder;
		$this->isvalid = intval($this->ValidateForSpam($fieldsbuilder));
	}


	public function Show()
	{
		if (!$this->isvalid)
		{
			$this->MessageBoard->Add($this->Params->get("spam_detected_text"), NexevoMessageBoard::warning);
		}
		return "";
	}


	protected function LoadFields()
	{
	}


	protected function ValidateForSpam(&$fieldsbuilder)
	{
		
		$message = "";
	
		foreach ($fieldsbuilder->Fields as $key => $field)
		{
			if (strpos($field['Type'], "textarea") !== 0) continue;
			$message .= $field['Value'];
		}
		
		$spam_words = $this->Params->get("spam_words", "");

		
		if (!(bool)($this->Params->get("spam_check", 0)) && !(bool)($this->Params->get("copy_to_submitter", 0))) return true;

		
		if (empty($spam_words)) return true;

		$arr_spam_words = explode(",", $spam_words);
		foreach ($arr_spam_words as $word)
		{
			if (stripos($message, $word) !== false)
			{
				$logger = new NLogger();
				$logger->Write("Spam attempt blocked:" . PHP_EOL . print_r($fieldsbuilder->Fields, true) . "-----------------------------------------");
				
				return false;
			}
		}

		return true;
	}
}

?>
