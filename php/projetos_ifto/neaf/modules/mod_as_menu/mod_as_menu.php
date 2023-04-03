<?php
/*******************************************************************************************/
/*
/*		Web: http://www.asdesigning.com
/*		Web: http://www.astemplates.com
/*		License: GNU/GPL
/*
/*******************************************************************************************/

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';

$app	  	= JFactory::getApplication();
$document 	= JFactory::getDocument();
$module_id 	= $params->get('module_id');

$document->addScript(JURI::base() . 'modules/mod_as_menu/js/script.js');
$document->addScript(JURI::base() . 'modules/mod_as_menu/js/jquery.mobilemenu.js');
$document->addScript(JURI::base() . 'modules/mod_as_menu/js/jquery.hovermenu.js');

$document->addStyleSheet(JURI::base() . 'modules/mod_as_menu/css/ext.default.css');

$list	= modASMenuHelper::getList($params);

$menu	= $app->getMenu();
$active	= $menu->getActive();
$active_id = isset($active) ? $active->id : $menu->getDefault()->id;
$path	= isset($active) ? $active->tree : array();

if(count($list)) {
	require JModuleHelper::getLayoutPath('mod_as_menu', $params->get('layout', 'default'));
}
