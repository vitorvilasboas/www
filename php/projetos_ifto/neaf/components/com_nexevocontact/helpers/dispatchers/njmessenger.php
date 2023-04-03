<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
require_once "ndispatcher.php";

class NJMessenger extends NDispatcher
{
	public function Process()
	{
		$uid = $this->Params->get("jmessenger_user", NULL);
		if (!$uid)
		{
			
			return true;
		}

		$body = $this->body();
		$body .= $this->attachments();
		$body .= PHP_EOL;
		$body .= JFactory::getConfig()->get("sitename") . " - " . $this->CurrentURL() . PHP_EOL;
		$body .= "Client: " . $this->ClientIPaddress() . " - " . $_SERVER['HTTP_USER_AGENT'] . PHP_EOL;
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->insert($db->quoteName("#__messages"));
		$query->set($db->quoteName("user_id_from") . "=" . $db->quote($uid));
		$query->set($db->quoteName("user_id_to") . "=" . $db->quote($uid));
		$query->set($db->quoteName("date_time") . "=" . $db->quote(JFactory::getDate()->toSql()));
		$query->set($db->quoteName("subject") . "=" . $db->quote($this->submittername() . " (" . $this->submitteraddress() . ")"));
		$query->set($db->quoteName("message") . "=" . $db->quote(JMailHelper::cleanBody($body)));
		$db->setQuery((string)$query);
		try
		{
			$db->execute();
		}
		catch (RuntimeException $e)
		{
			$this->MessageBoard->Add(JText::_("COM_NEXEVOCONTACT_ERR_SENDING_MESSAGE"), NexevoMessageBoard::error);
			$this->Logger->Write($e->getMessage());
			return false;
		}
		$this->Logger->Write("Private message sent to Joomla messenger.");
		return true;

	}
	protected function attachments()
	{
		$result = "";
		if (count($this->FileList)) $result .= JText::_($GLOBALS["COM_NAME"] . "_ATTACHMENTS") . PHP_EOL;
		foreach ($this->FileList as &$file)
		{
			$result .= JUri::base() . 'components/' . $GLOBALS["com_name"] . '/uploads/' . $file . PHP_EOL;
		}

		return $result;
	}

}
