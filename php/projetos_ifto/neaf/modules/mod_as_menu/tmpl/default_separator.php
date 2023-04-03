<?php
/*******************************************************************************************/
/*
/*        Web: http://www.asdesigning.com
/*        Web: http://www.astemplates.com
/*        License: GNU/GPL
/*
/*******************************************************************************************/

// No direct access.
defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
$title = $item->anchor_title ? 'title="'.$item->anchor_title.'" ' : '';
if ($item->menu_image) 
{
	$item->params->get('menu_text', 1 ) ?
	$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" /><span class="image-title">'.$item->title.'</span> ' :
	$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" />';
}
else 
{ 
	$linktype = $item->title;
}
?>

<span class="separator"><?php echo $title . ' ' . $linktype; ?></span>
