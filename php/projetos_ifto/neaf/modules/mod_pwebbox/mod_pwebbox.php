<?php
/**
 * @package     pwebbox
 * @version 	2.0.0
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

$plugin = $params->get('plugin');
if (empty($plugin))
{
    return '';
}
    
require_once dirname(__FILE__) . '/helper.php';

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$cfg = JFactory::getConfig();

// Check J! version and get dispatcher from correct class.
if (version_compare(JVERSION, '3.0.0') == -1)
{
    $dispatcher = JDispatcher::getInstance();
}
else
{
    $dispatcher = JEventDispatcher::getInstance();
}

$params->def('id', $module->id);
$params->def('module_title', $module->title);

// Debug.
if ($cfg->get('debug') OR $app->input->getInt('debug'))
{
    $params->set('debug', 1);
}

// Set media path
$media_path = JPATH_ROOT . '/media/mod_pwebbox/';
$params->set('media_path', $media_path);
$media_url = JURI::base(true) . '/media/mod_pwebbox/';
$params->set('media_url', $media_url);

// Initialize module.
ModPwebboxHelper::initBox($params);

// Load plugin.
JPluginHelper::importPlugin('everything_in_everyway', $plugin);

// Initialize plugin.
$dispatcher->trigger('onInit', array('everything_in_everyway.'.$plugin, $module->id, $params));

// Get plugin HTML output.
$html = $dispatcher->trigger('onDisplay', array('everything_in_everyway.'.$plugin, $module->id, $params));
$html = implode("\r\n", $html);

// Display module.
$cookie_name = 'pwebbox'.$params->get('id').'_notification';
if(!isset($_COOKIE[$cookie_name]) || isset($_COOKIE[$cookie_name]) != 'closed') {
    ModPwebboxHelper::displayBox($params, $html);
}