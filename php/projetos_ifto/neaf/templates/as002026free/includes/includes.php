<?php 
defined('_JEXEC') or die;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$user = JFactory::getUser();		// Add current user information

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');
$template = $app->getTemplate();

$contentParams = $app->getParams('com_content');
$pageClass = $contentParams->get('pageclass_sfx');

// Logo file
if ($this->params->get('logo_img'))
{
	$logo_img = JURI::root() . $this->params->get('logo_img');
}
else
{
	$logo_img = $this->baseurl . "/templates/" . $this->template . "/images/logo.png";
}

// Site title
$slogan_txt = htmlspecialchars($this->params->get('slogan_txt'));


//Hide module as-positions 
	//By View (article, login, registration, search, profile, reset, remind etc)
	$hideByView = false;
	switch($view){
		case 'article':
		case 'login':
		case 'search':
		case 'profile':
		case 'registration':
		case 'reset':
		case 'remind':
		case 'contact':
		case 'form':
			$hideByView = true;
			break;
	}

	//By Component
	$hideByOption = false;
	switch($option){
		case 'com_users':
		case 'com_search':
		case 'com_contact':
			$hideByOption = true;
			break;
	}



//Get main content width

	//Get Left column grid width
	if(($this->countModules('as-position-10') || $this->countModules('as-position-11'))&& $hideByOption == false && $view !== 'form'){ 
		$aside_left_width = $this->params->get('aside_left_width');
	} else {
		$aside_left_width = "";
	}

	//Get Right column grid width
	if(($this->countModules('as-position-15') || $this->countModules('as-position-16')) && $hideByOption == false && $view !== 'form'){ 
		$aside_right_width = $this->params->get('aside_right_width');
	} else {
		$aside_right_width = "";
	}

$mainContentWidth = 12 - ($aside_left_width + $aside_right_width);