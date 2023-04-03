<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
class NLangHandler
	{
	protected $lang;
	protected $messages = array();

	function __construct()
		{
		$this->lang = JFactory::getLanguage();

		$this->check_partial();
		$this->check_missing();
		}


	public function HasMessages()
		{
		return (bool)count($this->messages);
		}


	public function GetMessages()
		{
		return $this->messages;
		}


	protected function check_partial()
		{
		if (intval(JText::_($GLOBALS["COM_NAME"] . '_PARTIAL')))
			{
		
			$this->messages[] = $this->lang->get("name") . " translation is still incomplete. Please consider to contribute by completing and sharing your own translation. <a href=\"http://www.nexevo.in\">Learn more</a>.";
			}
		}


	protected function check_missing()
		{
		$filename = JPATH_SITE . "/language/" . $this->lang->get("tag") . "/" . $this->lang->get("tag") . "." . $GLOBALS["com_name"] . ".ini";
		if (!file_exists($filename))
			{
			$this->messages[] = $this->lang->get("name") . " translation is still missing. Please consider to contribute by writing and sharing your own translation. <a href=\"http://www.nexevo.in\">Learn more</a>.";
			$this->check_availability();
			}
		}


	private function check_availability()
		{
		$filename = JPATH_ADMINISTRATOR . '/components/' . $GLOBALS["com_name"] . "/" . $GLOBALS["ext_name"] . '.xml';
		$xml = JFactory::getXML($filename);

		if (!$xml)
			{

			}
		else
			{
			foreach ($xml->languages->language as $l)
				{
				if (strpos((string)$l, $this->lang->get("tag")) === 0)
					{
					$this->messages = array();
					$this->messages[] = $this->lang->get("name") . " translation has not been installed, but <strong>is available</strong>. To fix this problem simply install this extension once again, without uninstalling it. <a href=\"http://www.nexevo.in\">Learn more</a>.";
					break;
					}
				}
			}

		}

	}
