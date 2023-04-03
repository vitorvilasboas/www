<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_gs_rssfeed
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';

$rssurl	= $params->get('rssurl', ''); // URL ленты новостей
$custom_template = $params->get('custom_template'); // Пользовательский шаблон
$author	= $params->get('author'); // Автор

// Check if feed URL has been set
if (empty($rssurl))
{
	echo '<div class="alert alert-danger">';
	echo JText::_('MOD_GS_RSSFEED_ERR_NO_URL');
	echo '</div>';

	return;
}

$feed = ModFeedHelper::getFeed($params);

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_gs_rssfeed', $params->get('layout', 'default'));
