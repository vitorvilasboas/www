<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_gs_rssfeed
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Helper for mod_gs_rssfeed
 */
class ModFeedHelper
{
	/**
	 * Retrieve feed information
	 *
	 * @param   \Joomla\Registry\Registry  $params  module parameters
	 *
	 * @return  JFeedReader|string
	 */
	public static function getFeed($params)
	{
		// Module params
		$rssurl	= $params->get('rssurl', '');

		// Get RSS parsed object
		try
		{
			$feed	= new JFeedFactory;
			$rssDoc = $feed->getFeed($rssurl);
		}
		catch (InvalidArgumentException $e)
		{
			return JText::_('MOD_GS_RSSFEED_ERR_FEED_NOT_RETRIEVED');
		}
		catch (RunTimeException $e)
		{
			return JText::_('MOD_GS_RSSFEED_ERR_FEED_NOT_RETRIEVED');
		}
		catch (LogicException $e)
		{
			return JText::_('MOD_GS_RSSFEED_ERR_FEED_NOT_RETRIEVED');
		}

		if (empty($rssDoc))
		{
			return JText::_('MOD_GS_RSSFEED_ERR_FEED_NOT_RETRIEVED');
		}

		if ($rssDoc)
		{
			return $rssDoc;
		}
	}
}
