<?php

/**
* @copyright	Copyright (C) 2016 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;


//add stylesheet

$doc = JFactory::getDocument();


//include the class of the syndicate functions only once

require_once(dirname(__FILE__).'/helper.php');

$module_id	= $module->id;

//keeps module class suffix even if templateer tries to stop it

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

$listofimages = mod_joomspirit_sliderHelper::getImages($params, $module_id);
$titleLetters = mod_joomspirit_sliderHelper::animLetters($params);

if ($params->get('imagefolder') != '-1' ) {
	$folderimages = mod_joomspirit_sliderHelper::getImagesFromFolder($params);
	
	foreach ($folderimages as $img)
		array_push($listofimages , $img);
}

mod_joomspirit_sliderHelper::load_jquery($params);

$doc->addStyleSheet(JURI::base(true) . '/modules/mod_joomspirit_slider/assets/css/style.css', 'text/css' );			// CSS styles



// Get basic parameters
$slide_theme					= $params->get('slide_theme');
$kenburns						= $params->get('kenburns');

$rotate_on_scroll				= $params->get('rotate_on_scroll');
$fade_text_on_scroll			= $params->get('fade_text_on_scroll');
$load_skrollr					= $params->get('load_skrollr');

$height_slideshow_desktop				= $params->get('height_slideshow_desktop');
$height_slideshow_desktop_percentage	= $params->get('height_slideshow_desktop_percentage');
$height_slideshow_desktop_px			= $params->get('height_slideshow_desktop_px');
$height_slideshow_tablet				= $params->get('height_slideshow_tablet');
$height_slideshow_tablet_percentage		= $params->get('height_slideshow_tablet_percentage');
$height_slideshow_tablet_px				= $params->get('height_slideshow_tablet_px');
$height_slideshow_phone					= $params->get('height_slideshow_phone');
$height_slideshow_phone_percentage		= $params->get('height_slideshow_phone_percentage');
$height_slideshow_phone_px				= $params->get('height_slideshow_phone_px');


$bg_color						= $params->get('bg_color');
$shadow_top_image				= $params->get('shadow_top_image');
$shadow_bottom_image			= $params->get('shadow_bottom_image');
$theme_shadow					= $params->get('theme_shadow');
$theme_border					= $params->get('theme_border');
$theme_border_radius			= $params->get('theme_border_radius');

$transition						= $params->get('transition');
$direction						= $params->get('direction');

$animSpeed						= intval($params->get('animSpeed'));
$pauseTime						= intval($params->get('pauseTime'));

$controlNav						= $params->get('controlNav');
$positionNav					= $params->get('positionNav');
$colorNav						= $params->get('colorNav');
$colorNavActive					= $params->get('colorNavActive');
$hide_buttons					= $params->get('hide_buttons');

$directionNav					= $params->get('directionNav');

$pauseOnHover					= $params->get('pauseOnHover');
$initDelay						= $params->get('initDelay');
$randomize						= $params->get('randomize');

$text_under_slideshow 			= trim( $params->get( 'text_under_slideshow' ) );
$hide_text 						= trim( $params->get( 'hide_text' ) );
$bg_color_text_small_screen		= trim( $params->get( 'bg_color_text_small_screen' ) );
$color_text_small_screen		= trim( $params->get( 'color_text_small_screen' ) );
$fontsize_title_small_screen	= trim( $params->get( 'fontsize_title_small_screen' ) );
$fontsize_text_small_screen		= trim( $params->get( 'fontsize_text_small_screen' ) );



$anim_text 						= trim( $params->get( 'anim_text' ) );
$bg_color_text 					= trim( $params->get( 'bg_color_text' ) );
$transparency_bg_text 			= trim( $params->get( 'transparency_bg_text' ) );
$bg_color_text_ie 				= trim( $params->get( 'bg_color_text_ie' ) );
$bg_caption_shadow 				= trim( $params->get( 'bg_caption_shadow' ) );
$position_text 					= trim( $params->get( 'position_text' ) );
$max_width 						= trim( $params->get( 'max_width' ) );
$font_size_title 				= trim( $params->get( 'font_size_title' ) );
$color_title 					= trim( $params->get( 'color_title' ) );
$font_size_text					= trim( $params->get( 'font_size_text' ) );
$color_text 					= trim( $params->get( 'color_text' ) );
$type_link 						= trim( $params->get( 'type_link' ) );
$read_more 						= trim( $params->get( 'read_more' ) );
$color_read_more 				= trim( $params->get( 'color_read_more' ) );
$text_shadow 					= trim( $params->get( 'text_shadow' ) );

$font_title 					= trim( $params->get( 'font_title' ) );
$custom_font_title 				= trim( $params->get( 'custom_font_title' ) );
$font_text 						= trim( $params->get( 'font_text' ) );
$custom_font_text 				= trim( $params->get( 'custom_font_text' ) );


require(JModuleHelper::getLayoutPath('mod_joomspirit_slider'));