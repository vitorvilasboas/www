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
$class = $item->anchor_css ? 'class="'.$item->anchor_css.'" ' : '';
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

switch ($item->browserNav) :
	default:
	case 0:  
		echo '<a ' . $class . ' href="' . $item->flink . '" ' . $title . '>' . $linktype . '</a>'; 
		break;
	case 1:
		echo '<a ' . $class . ' href="' . $item->flink . '" target="_blank" ' . $title . '>' . $linktype . '</a>';
		break;
	case 2:
		echo '<a ' . $class . ' href="' . $item->flink . '" onclick="window.open(this.href,\'targetWindow\',\'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes\');return false;"' .  $title . '>' . $linktype . '</a>';
		break;
endswitch;
