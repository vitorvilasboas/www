<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_gs_rssfeed
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<div class="newsfeed<?php echo $params->get('moduleclass_sfx') ?>">
<?php

if (!empty($feed) && is_string($feed))
{
	echo '<div class="alert alert-danger">';
	echo $feed;
	echo '</div>';
}
elseif (!empty($feed))
{
	for ($i = 0; $i < $params->get('rssitems', 5); $i++)
	{
		if (!$feed->offsetExists($i)) break;
		
		// uri
		$uri  = (!empty($feed[$i]->uri) || !is_null($feed[$i]->uri)) ? $feed[$i]->uri : $feed[$i]->guid;
		$uri  = substr($uri, 0, 4) != 'http' ? $params->get('rsslink') : $uri;
		
		// title
		if (!empty($uri))
		{
			$title = '<a href="' . htmlspecialchars($uri) . '" target="_blank">' . $feed[$i]->title . '</a>';
		}
		else
		{
			$title = $feed[$i]->title;
		}
		
		// content
		$text	= '';
		$text	= !empty($feed[$i]->content) || !is_null($feed[$i]->content) ? $feed[$i]->content : $feed[$i]->description;
		if (!empty($text))
		{
			$text	= JFilterOutput::stripImages($text); // Strip the images
			$text	= JHtml::_('string.truncate', $text, $params->get('countitem'), true, false);
			$text	= str_replace('&apos;', "'", $text);
		}
		
		// author
		$author_name	= (isset($feed[$i]->author->name)) ? $feed[$i]->author->name : '';
		$author_email	= (isset($feed[$i]->author->email)) ? $feed[$i]->author->email : '';
				
		// date
		$day	= JHtml::date($feed[$i]->updatedDate, 'd');
		$month	= JHtml::date($feed[$i]->updatedDate, 'M');
		$year	= JHtml::date($feed[$i]->updatedDate, 'Y');
		
		// Замена пользовательских тегов
		$tagText  = array('{title}', '{text}', '{author_name}', '{author_email}', '{date_day}', '{date_month}', '{date_year}');
		$codeText = array($title, $text, $author_name, $author_email, $day, $month, $year);
		
		echo str_replace($tagText, $codeText, $custom_template);
	}
}

?>
</div>