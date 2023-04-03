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

class NSubmitterMailer extends NDispatcher
{
	public function Process()
	{
		$application = JFactory::getApplication();
		$copy_to_submitter =
			$application->input->post->get($this->SafeName("copy_to_submitter" . $this->GetId()), false, "bool") || 
			($this->Params->get("copy_to_submitter", null) == 1); 

		if (!$copy_to_submitter || !isset($this->FieldsBuilder->Fields['sender1']) || empty($this->FieldsBuilder->Fields['sender1']['Value']))
		{
			$jsession = JFactory::getSession();
			$namespace = "nexevocontact_" . $application->owner . "_" . $application->oid;
			$jsession->clear("filelist", $namespace);

			
			return true;
		}

		$mail = JFactory::getMailer();

		$this->set_from($mail);
		$this->set_to($mail);
		$mail->setSubject(JMailHelper::cleanSubject($this->Params->get("email_copy_subject", "")));
		$body = $this->Params->get("email_copy_text", "") . PHP_EOL;
		$body .= PHP_EOL;

		if ($this->Params->get("email_copy_summary", null))
		{
			$body .= $this->body();
			$body .= $this->attachments();
			$body .= PHP_EOL;
		}
		$body .= "------" . PHP_EOL . JFactory::getConfig()->get("sitename") . PHP_EOL;
		$body = JMailHelper::cleanBody($body);
		$mail->setBody($body);
		$jsession = JFactory::getSession();
		$namespace = "nexevocontact_" . $application->owner . "_" . $application->oid;
		$jsession->clear("filelist", $namespace);
		$sent = $this->send($mail);
		if ($sent)
		{
			$this->Logger->Write("Copy email sent.");
		}
		return $sent;
	}
	private function set_from(&$mail)
	{
		$emailhelper = new NexevoEmailHelper($this->Params);
		$config = JComponentHelper::getParams("com_nexevocontact");
		$submitteremailfrom = $config->get("submitteremailfrom");
		$from = $emailhelper->convert($submitteremailfrom);
		$mail->setSender($from);
		$submitteremailreplyto = $config->get("submitteremailreplyto");
		$replyto = $emailhelper->convert($submitteremailreplyto);
		$mail->ClearReplyTos();
		$mail->addReplyTo($replyto[0], $replyto[1]);
	}
	private function set_to(&$mail)
	{
		$addr = $this->FieldsBuilder->Fields['sender1']['Value'];
		$mail->addRecipient(JMailHelper::cleanAddress($addr));
	}
	protected function attachments()
	{
		$result = "";

		if (count($this->FileList))
		{
			$result .= JText::_($GLOBALS["COM_NAME"] . "_ATTACHMENTS") . PHP_EOL;
		}

		foreach ($this->FileList as $file)
		{
			$result .= $file["realname"] . PHP_EOL;
		}

		return $result;
	}

}
