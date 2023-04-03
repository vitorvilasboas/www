<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
$inc_dir = realpath(dirname(__FILE__));
require_once($inc_dir . '/ndispatcher.php');

class NAdminMailer extends NDispatcher
{
	public function Process()
	{
		$mail = JFactory::getMailer();

		$this->set_from($mail);
		$this->set_to($mail, "to_address", "addRecipient");
		$this->set_to($mail, "cc_address", "addCC");
		$this->set_to($mail, "bcc_address", "addBCC");

		$mail->setSubject(JMailHelper::cleanSubject($this->Params->get("email_subject", "")));

		$body = $this->body();
		$body .= $this->attachments($mail);
		$body .= PHP_EOL;
		$body .= JFactory::getConfig()->get("sitename") . " - " . $this->CurrentURL() . PHP_EOL;
		$body .= "Client: " . $this->ClientIPaddress() . " - " . $_SERVER['HTTP_USER_AGENT'] . PHP_EOL;

		$body = JMailHelper::cleanBody($body);
		$mail->setBody($body);

		$sent = $this->send($mail);
		if ($sent)
		{
			$this->MessageBoard->Add($this->Params->get("email_sent_text"), NexevoMessageBoard::success);
			$this->Logger->Write("Notification email sent.");
		}

		return $sent;
	}


	private function set_from(&$mail)
	{
		$emailhelper = new NexevoEmailHelper($this->Params);
		$config = JComponentHelper::getParams("com_nexevocontact");

		$adminemailfrom = $config->get("adminemailfrom");
		$from = $emailhelper->convert($adminemailfrom);
		$mail->setSender($from);

		$adminemailreplyto = $config->get("adminemailreplyto");
		$replyto = $emailhelper->convert($adminemailreplyto);
		$mail->ClearReplyTos();
		$mail->addReplyTo($replyto[0], $replyto[1]);
	}


	private function set_to(&$mail, $param_name, $method)
	{
		if ($this->Params->get($param_name, null))
			$recipients = explode(",", $this->Params->get($param_name, ""));
		else
			$recipients = array();

		foreach ($recipients as $recipient)
		{
			if (empty($recipient)) continue;
			$mail->$method($recipient);
		}
	}


	protected function attachments(&$mail)
	{
		$result = "";

		$uploadmethod = intval($this->Params->get("uploadmethod", "1")); 

		if (count($this->FileList) && ($uploadmethod & 1))
		{
			$result .= JText::_($GLOBALS["COM_NAME"] . "_ATTACHMENTS") . PHP_EOL;
		}

		foreach ($this->FileList as $file)
		{

			$filename = 'components/' . $GLOBALS["com_name"] . '/uploads/' . $file["filename"];
			if ($uploadmethod & 1) $result .= JUri::base() . $filename . PHP_EOL;
			if ($uploadmethod & 2) $mail->addAttachment(JPATH_SITE . "/" . $filename);
		}

		return $result;
	}

}
