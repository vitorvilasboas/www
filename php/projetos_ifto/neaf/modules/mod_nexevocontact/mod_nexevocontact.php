<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/

if (isset($GLOBALS["nexevocontact_mid_" . $module->id])) return;
else $GLOBALS["nexevocontact_mid_" . $module->id] = true;

$cache = JFactory::getCache("com_modules", "");
$cache->setCaching(false);


$cache = @JFactory::getCache("com_content", "view");
$cache->setCaching(false);
$assetDir = dirname(__FILE__) .DIRECTORY_SEPARATOR. 'helpers' .DIRECTORY_SEPARATOR;
$GLOBALS["ext_name"] = basename(__FILE__);
$GLOBALS["com_name"] = realpath(dirname(__FILE__) . "/../../components");
$GLOBALS["mod_name"] = dirname(__FILE__);
$GLOBALS["EXT_NAME"] = strtoupper($GLOBALS["ext_name"]);
$GLOBALS["COM_NAME"] = strtoupper($GLOBALS["com_name"]);
$GLOBALS["MOD_NAME"] = strtoupper($GLOBALS["mod_name"]);
$GLOBALS["left"] = false;
require_once( $assetDir . 'dateSelect.php' );
$GLOBALS["right"] = true;
$app->owner = "module";
$app->oid = $module->id;
$app->cid = 0;
$app->mid = $module->id;
$app->submitted = (bool)count($_POST) && isset($_POST["mid_$app->mid"]);
$me = basename(__FILE__);
$name = substr($me, 0, strrpos($me, '.'));
include(realpath(dirname(__FILE__) . "/" . $name . ".inc"));

$helpdir = JPATH_BASE . "/components/com_nexevocontact/helpers/";
require_once($helpdir . 'fieldsbuilder.php');
include_once($helpdir . 'nsubmitter.php');
include_once($helpdir . 'najaxuploader.php');
include_once($helpdir . 'nuploader.php');
include_once($helpdir . 'ncaptcha.php');
include_once($helpdir . 'nantispam.php');
require_once($helpdir . "messageboard.php");
require_once($helpdir . "document.php");


$dispatchers_dir = $helpdir . "dispatchers/";

require_once $dispatchers_dir . "nadminmailer.php";
require_once $dispatchers_dir . "nsubmittermailer.php";
require_once $dispatchers_dir . "njmessenger.php";
require_once $dispatchers_dir . "database.php";

$libsdir = JPATH_BASE . "/components/com_nexevocontact/lib/";
include_once($libsdir . 'functions.php');

if ($scope == "com_content") echo("<!--{emailcloak=off}-->");

$nexevoDocument = NexevoDocument::getInstance();

$nexevoDocument->addResource(array("root" => "media", "filename" => "chosen", "type" => "css"));
$nexevoDocument->addResource(array("root" => "media", "filename" => "bootstrap", "type" => "css"));

$stylesheet = $params->get("css", "bootstrap.css");
$stylesheet = preg_replace("/\\.[^.\\s]{3,4}$/", "", $stylesheet);
$nexevoDocument->addResource(array("root" => "components", "filename" => $stylesheet, "type" => "css"));

$action = JFactory::getApplication()->input->server->get("REQUEST_URI", "", "string") . "#mid_" . $module->id;

$language = JFactory::getLanguage();
$language->load($GLOBALS["com_name"], JPATH_SITE, $language->getDefault(), true);
$language->load($GLOBALS["com_name"], JPATH_SITE, null, true);

$body = JResponse::getBody();

if (!empty($body))
{

	echo
		JText::_("COM_NEXEVOCONTACT_ADDITIONAL_SETTINGS_REQUIRED") .
		' <a href="http://www.nexevo.in">' .
		JText::_("COM_NEXEVOCONTACT_SEE_DOCUMENTATION") .
		"</a>";
	return;
}

$page_subheading = $params->get("page_subheading", "");

$xml = JFactory::getXML(JPATH_SITE . '/modules/' . $app->scope . "/" . $app->scope . '.xml');

$messageboard = new NexevoMessageBoard();
$submitter = new NSubmitter($params, $messageboard);
$fieldsBuilder = new FieldsBuilder($params, $messageboard);
$ajax_uploader = new NAjaxUploader($params, $messageboard);
$uploader = new NUploader($params, $messageboard);
$ncaptcha = new NCaptcha($params, $messageboard);
$antispam = new NAntispam($params, $messageboard, $fieldsBuilder);
$jMessenger = new NJMessenger($params, $messageboard, $fieldsBuilder);
$DatabaseDispatcher = new DatabaseDispatcher($params, $messageboard, $fieldsBuilder);

$adminMailer = new NAdminMailer($params, $messageboard, $fieldsBuilder);
$submitterMailer = new NSubmitterMailer($params, $messageboard, $fieldsBuilder);

$form_text = "";
$form_text .= $fieldsBuilder->Show();
$form_text .= $ajax_uploader->Show();
$form_text .= $ncaptcha->Show();
$form_text .= $antispam->Show();
$form_text .= $submitter->Show();

switch (0)
{
	case $submitter->IsValid():
		break;
	case $fieldsBuilder->IsValid():
		break;
	case $ajax_uploader->IsValid():
		break;
	case $uploader->IsValid():
		break;
	case $ncaptcha->IsValid():
		break;
	case $antispam->IsValid():
		break;
	case $jMessenger->Process():
		break;
	case $DatabaseDispatcher->Process():
		break;
	case $adminMailer->Process():
		break;
	case $submitterMailer->Process():
		break;
	default: 
		$form_text = "";

		$jsession = JFactory::getSession();
		$namespace = "nexevocontact_module_" . $module->id;
		$jsession->clear("captcha_answer", $namespace);

		HeaderRedirect($params);
}

require(JModuleHelper::getLayoutPath($app->scope, $params->get('layout', 'default')));
