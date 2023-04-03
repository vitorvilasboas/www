<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
$inc_dir = realpath(__DIR__ . "/..");
require_once($inc_dir . "/ndatapump.php");
require_once($inc_dir . "/nlogger.php");
require_once($inc_dir . "/emailhelper.php");


jimport("joomla.mail.helper");

abstract class NDispatcher extends NDataPump
{
	protected $FieldsBuilder;
	protected $FileList;


	abstract public function Process();


	protected function LoadFields()
	{
	}


	public function __construct(&$params, NexevoMessageBoard &$messageboard, &$fieldsbuilder)
	{


		parent::__construct($params, $messageboard);

		$this->FieldsBuilder = $fieldsbuilder;
		$this->Logger = new NLogger();


		$jsession = JFactory::getSession();
		$namespace = "nexevocontact_" . JFactory::getApplication()->owner . "_" . JFactory::getApplication()->oid;
		$this->FileList = $jsession->get("filelist", array(), $namespace);
	}


	protected function submittername()
	{
		return
			isset($this->FieldsBuilder->Fields['sender0']) ?
				$this->FieldsBuilder->Fields['sender0']['Value'] :
				JFactory::getConfig()->get("fromname");
	}
	protected function submitteraddress()
	{

		$addr =
			isset($this->FieldsBuilder->Fields['sender1']['Value']) &&
				!empty($this->FieldsBuilder->Fields['sender1']['Value']) ?
				$this->FieldsBuilder->Fields['sender1']['Value'] :
				JFactory::getConfig()->get("mailfrom");

		return JMailHelper::cleanAddress($addr);
	}
	protected function body()
	{
		$result = "";
		foreach ($this->FieldsBuilder->Fields as $key => $field)
		{
			switch ($field['Type'])
			{
				case 'sender':
				case 'text':
				case 'textarea':
				case 'dropdown':
				case 'checkbox':
					$result .= $this->AddToBody($field);
			}
		}
		$result .= PHP_EOL;
		return $result;
	}
	protected function AddToBody(&$field)
	{
		if (!$field['Display']) return "";
		return "*" . JFilterInput::getInstance()->clean($field["Name"], "") . "*" . PHP_EOL . JFilterInput::getInstance()->clean($field["Value"], "") . PHP_EOL . PHP_EOL;
	}
	protected function CurrentURL()
	{
		$url = 'http';
		if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") $url .= "s";
		$url .= "://";
		$url .= $_SERVER["SERVER_NAME"];
		if ($_SERVER["SERVER_PORT"] != "80") $url .= ":" . $_SERVER["SERVER_PORT"];
		$url .= $_SERVER["REQUEST_URI"];
		return $url;
	}
	protected function ClientIPaddress()
	{
		if (isset($_SERVER["REMOTE_ADDR"])) return $_SERVER["REMOTE_ADDR"];
		if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) return $_SERVER["HTTP_X_FORWARDED_FOR"];
		if (isset($_SERVER["HTTP_CLIENT_IP"])) return $_SERVER["HTTP_CLIENT_IP"];
		return "?";
	}
	protected function send(&$mail)
	{
		if (($error = $mail->Send()) !== true)
		{
			if (is_object($error))
			{
				
				$info = $error->getMessage();
			}
			else if (!empty($mail->ErrorInfo))
			{
				
				$info = $mail->ErrorInfo;
			}
			else
			{
				
				$info= JText::_("JLIB_MAIL_FUNCTION_OFFLINE");
			}

			$msg = JText::_($GLOBALS["COM_NAME"] . "_ERR_SENDING_MAIL") . ". " . $info;
			$this->MessageBoard->Add($msg, NexevoMessageBoard::error);
			$this->Logger->Write($msg);

			return false;
		}

		
		return true;
	}
}
