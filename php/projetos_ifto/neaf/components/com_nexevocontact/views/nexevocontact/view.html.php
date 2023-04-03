<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/

$helpdir = JPATH_BASE . "/components/com_nexevocontact/helpers/";

require_once($helpdir . "nsubmitter.php");
require_once($helpdir . "fieldsbuilder.php");
require_once($helpdir . "najaxuploader.php");
require_once($helpdir . "nuploader.php");
require_once($helpdir . "nantispam.php");
require_once($helpdir . "ncaptcha.php");
require_once($helpdir . "messageboard.php");
require_once($helpdir . "document.php");
$dispatchers_dir = $helpdir . 'dispatchers/';

require_once $dispatchers_dir . "nadminmailer.php";
require_once $dispatchers_dir . "nsubmittermailer.php";
require_once $dispatchers_dir . "njmessenger.php";
require_once $dispatchers_dir . "database.php";
require_once JPATH_COMPONENT . "/lib/functions.php";

class NexevoContactViewNexevocontact extends JViewLegacy
{
	public $document;
	protected $Application;
	protected $cparams;
	protected $Submitter;
	protected $FieldsBuilder;
	protected $AjaxUploader;
	protected $Uploader;
	protected $Antispam;
	protected $JMessenger;
	protected $DatabaseDispatcher;
	protected $AdminMailer;
	protected $SubmitterMailer;
	protected $NexevoCaptcha;
	protected $MessageBoard;
	protected $menu_id;
	protected $page_subheading;
	protected $xml;

	public $FormText = "";


	// Overwriting JView display method
	function display($tpl = null)
	{
		$this->Application = JFactory::getApplication();

		$this->cparams = $this->Application->getMenu()->getActive()->params;
		if ($description = $this->cparams->get('menu-meta_description'))
		{
			$this->document->setDescription($description);
		}
		
		if ($keywords = $this->cparams->get('menu-meta_keywords'))
		{
			$this->document->setMetadata('keywords', $keywords);
		}
		
		if ($robots = $this->cparams->get('robots'))
		{
			$this->document->setMetadata('robots', $robots);
		}
		$nexevoDocument = NexevoDocument::getInstance();


		$nexevoDocument->addResource(array("root" => "media", "filename" => "chosen", "type" => "css"));
		$nexevoDocument->addResource(array("root" => "media", "filename" => "bootstrap", "type" => "css"));


		$stylesheet = $this->cparams->get("css", "bootstrap.css");

		$stylesheet = preg_replace("/\\.[^.\\s]{3,4}$/", "", $stylesheet);
		$nexevoDocument->addResource(array("root" => "components", "filename" => $stylesheet, "type" => "css"));

		$this->MessageBoard = new NexevoMessageBoard();
		$this->Submitter = new NSubmitter($this->cparams, $this->MessageBoard);
		$this->FieldsBuilder = new FieldsBuilder($this->cparams, $this->MessageBoard);
		$this->AjaxUploader = new NAjaxUploader($this->cparams, $this->MessageBoard);
		$this->Uploader = new NUploader($this->cparams, $this->MessageBoard);
		$this->NexevoCaptcha = new NCaptcha($this->cparams, $this->MessageBoard);
		$this->JMessenger = new NJMessenger($this->cparams, $this->MessageBoard, $this->FieldsBuilder);
		$this->DatabaseDispatcher = new DatabaseDispatcher($this->cparams, $this->MessageBoard, $this->FieldsBuilder);
		$this->Antispam = new NAntispam($this->cparams, $this->MessageBoard, $this->FieldsBuilder);
		$this->AdminMailer = new NAdminMailer($this->cparams, $this->MessageBoard, $this->FieldsBuilder);
		$this->SubmitterMailer = new NSubmitterMailer($this->cparams, $this->MessageBoard, $this->FieldsBuilder);

		$this->FormText .= $this->FieldsBuilder->Show();
		$this->FormText .= $this->AjaxUploader->Show();
		$this->FormText .= $this->NexevoCaptcha->Show();
		$this->FormText .= $this->Antispam->Show();
		$this->FormText .= $this->Submitter->Show();

		switch (0)
		{
			case $this->Submitter->IsValid():
				break;
			case $this->FieldsBuilder->IsValid():
				break;
			case $this->AjaxUploader->IsValid():
				break;
			case $this->Uploader->IsValid():
				break;
			case $this->NexevoCaptcha->IsValid():
				break;
			case $this->Antispam->IsValid():
				break;
			case $this->JMessenger->Process():
				break;
			case $this->DatabaseDispatcher->Process():
				break;
			case $this->AdminMailer->Process():
				break;
			case $this->SubmitterMailer->Process():
				break;
			default: 

				$this->FormText = '';


				$jsession = JFactory::getSession();
				$namespace = "nexevocontact_component_" . $this->Application->cid;
				$jsession->clear("captcha_answer", $namespace);

				HeaderRedirect($this->cparams);
		}
		$this->menu_id = $this->Application->getMenu()->getActive()->id;
		$this->page_subheading = $this->cparams->get('page_subheading', '');
		$this->xml = new SimpleXMLElement(JPATH_ADMINISTRATOR . '/components/com_nexevocontact/nexevocontact.xml', 0, true);
		parent::display($tpl);
	}
}