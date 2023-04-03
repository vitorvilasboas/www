<?php

/**
* @copyright	Copyright (C) 2016 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;
jimport('joomla.filesystem.folder');

class mod_joomspirit_sliderHelper{

	public static function animLetters(&$params){
		
		$animL = 'false'; 
		$i = 1;
		
		while($i < 23) :
		
			if ( $params->get('anim_text'.$i) == 'anim-js-rotate-letters anim-js-text' || $params->get('anim_text') == 'anim-js-rotate-letters anim-js-text' ) { $animL = 'true'; }
			$i++;
		
		endwhile;
		
		return $animL;
		
	}
	
	
	public static function getImages(&$params, $module_id){
		
		$imgsAndCaps = array(); 
		$i = 1;
		
		while($i < 23) :
		
			
			if ( $params->get('position_text'.$i) != 'default' ) { $position_text = $params->get('position_text'.$i); } else { $position_text = $params->get('position_text'); }
			if ( $params->get('color_text'.$i) ) { $color_text = $params->get('color_text'.$i); } else { $color_text = $params->get('color_text'); }
			if ( $params->get('color_title'.$i) ) { $color_title = $params->get('color_title'.$i); } else { $color_title = $params->get('color_title'); }
			if ( $params->get('font_size_text'.$i) ) { $font_size_text = $params->get('font_size_text'.$i); } else { $font_size_text = $params->get('font_size_text'); }
			if ( $params->get('font_size_title'.$i) ) { $font_size_title = $params->get('font_size_title'.$i); } else { $font_size_title = $params->get('font_size_title'); }
			if ( $params->get('text_shadow'.$i) != 'default' ) { $text_shadow = $params->get('text_shadow'.$i); } else { $text_shadow = $params->get('text_shadow'); }
			if ( $params->get('color_read_more'.$i) ) { $color_read_more = $params->get('color_read_more'.$i); } else { $color_read_more = $params->get('color_read_more'); }
			if ( $params->get('bg_text'.$i) == 'transparent' ) { $bg_text = 'bg-transparent'; } else { $bg_text = 'bg-default'; }
			if ( $params->get('bg_caption_shadow'.$i) == 'default' ) { $bg_caption_shadow = $params->get('bg_caption_shadow') ; } else { $bg_caption_shadow = $params->get('bg_caption_shadow'.$i); }
			if ( $params->get('max_width'.$i) ) { $max_width = $params->get('max_width'.$i); } else { $max_width = $params->get('max_width'); }
			if ( $params->get('anim_text'.$i) != 'default' ) { $anim_text = $params->get('anim_text'.$i); } else { $anim_text = $params->get('anim_text'); }
			
			if( $params->get('fade_text_on_scroll') == 'fade-text-on-scroll' ) {
			
				if ( ($params->get('transparency_bg_text') == '0' || $params->get('bg_text'.$i) == 'transparent') && $text_shadow == 'no' ) {
					$fadeText ="data-0-top='text-shadow: 0px 0px 0px rgba(0,0,0,1);-webkit-transform: translateY(0px) rotateX(0deg);-ms-transform: translateY(0px) rotateX(0deg);transform: translateY(0px) rotateX(0deg);opacity:1;' data--180-top='text-shadow: 55px 70px 8px rgba(0, 0, 0, 1);-webkit-transform: translateY(-60px) rotateX(20deg);-ms-transform: translateY(-60px) rotateX(20deg);transform: translateY(-60px) rotateX(20deg);opacity:0;' data-anchor-target='#flexslider-".$module_id."'" ;
					} else if ( ($params->get('transparency_bg_text') == '0' || $params->get('bg_text'.$i) == 'transparent') && $text_shadow == 'light' ) {
					$fadeText ="data-0-top='text-shadow: 1px 1px 3px rgba(0,0,0,0.4);-webkit-transform: translateY(0px) rotateX(0deg);-ms-transform: translateY(0px) rotateX(0deg);transform: translateY(0px) rotateX(0deg);opacity:1;' data--180-top='text-shadow: 55px 70px 8px rgba(0, 0, 0, 1);-webkit-transform: translateY(-60px) rotateX(20deg);-ms-transform: translateY(-60px) rotateX(20deg);transform: translateY(-60px) rotateX(20deg);opacity:0;' data-anchor-target='#flexslider-".$module_id."'" ;
					} else if ( ($params->get('transparency_bg_text') == '0' || $params->get('bg_text'.$i) == 'transparent') && $text_shadow == 'dark' ) {
					$fadeText ="data-0-top='text-shadow: 2px 2px 5px rgba(0,0,0,0.8);-webkit-transform: translateY(0px) rotateX(0deg);-ms-transform: translateY(0px) rotateX(0deg);transform: translateY(0px) rotateX(0deg);opacity:1;' data--180-top='text-shadow: 55px 70px 8px rgba(0, 0, 0, 1);-webkit-transform: translateY(-60px) rotateX(20deg);-ms-transform: translateY(-60px) rotateX(20deg);transform: translateY(-60px) rotateX(20deg);opacity:0;' data-anchor-target='#flexslider-".$module_id."'" ;
					} else {
					$fadeText ="data-0-top='box-shadow: 0px 0px 0px 0px rgba(0,0,0,1);-webkit-transform: translateY(0px) rotateX(0deg);-ms-transform: translateY(0px) rotateX(0deg);transform: translateY(0px) rotateX(0deg);opacity:1;' data--180-top='box-shadow: 40px 50px 15px 5px rgba(0,0,0,1);-webkit-transform: translateY(-60px) rotateX(20deg);-ms-transform: translateY(-60px) rotateX(20deg);transform: translateY(-60px) rotateX(20deg);opacity:0;' data-anchor-target='#flexslider-".$module_id."'" ;
					}
			} else { $fadeText = "";}
			
			if ( $params->get('image'.$i.'customlink') && $params->get('type_link') != 'link_image' ) { $link = "<span class='read-more-slider'><a target='".$params->get('target')."' href='".$params->get('image'.$i.'customlink')."' style='color:".$color_read_more.";'>".$params->get('read_more')."</a></span>" ;} else { $link = "" ;}
			if ( $params->get('image'.$i.'customlink') && $params->get('type_link') != 'link_text' ) { $link_image_before = "<a target='".$params->get('target')."' href='".$params->get('image'.$i.'customlink')."' >"; $link_image_after = "</a>"; } else { $link_image_before = "" ; $link_image_after = "" ;}
			

			// if image + caption + no title
			if ( ($params->get('image'.$i)) && ($params->get('image'.$i.'cap')) && ($params->get('image'.$i.'title') == null) ) {
				
					$listitem = "<li class='".$text_shadow."-text-shadow'><div class='jslider-image'>".$link_image_before."<img title='' alt='".$params->get('image'.$i.'alt')."' src='".JURI::root().$params->get('image'.$i)."' /><span class='image-height-fixed' style='background-image: url(".JURI::root().$params->get('image'.$i).");'></span>".$link_image_after."</div><div class='slide-desc-box ".$position_text." ".$bg_caption_shadow."-shadow ".$anim_text."' ><div ".$fadeText."><div class='".$bg_text."' ><div class='slide-desc' style='max-width:".$max_width."px;color:".$color_text.";font-size:".$font_size_text.";'><span>".$params->get('image'.$i.'cap')."</span>".$link."</div></div></div></div></li>";
					array_push($imgsAndCaps, $listitem);
				
			
			// if image + caption + title
			} else if ( ($params->get('image'.$i)) && ($params->get('image'.$i.'cap')) && ($params->get('image'.$i.'title')) ) {
				
					$listitem = "<li class='".$text_shadow."-text-shadow'><div class='jslider-image'>".$link_image_before."<img title='' alt='".$params->get('image'.$i.'alt')."' src='".JURI::root().$params->get('image'.$i)."' /><span class='image-height-fixed' style='background-image: url(".JURI::root().$params->get('image'.$i).");'></span>".$link_image_after."</div><div class='slide-desc-box ".$position_text." ".$bg_caption_shadow."-shadow ".$anim_text."' ><div ".$fadeText."><div class='".$bg_text."' ><div class='slide-title'  style='max-width:".$max_width."px;color:".$color_title.";font-size:".$font_size_title.";'><span class='span-js-title'>".$params->get('image'.$i.'title')."</span></div><div class='slide-desc' style='max-width:".$max_width."px;color:".$color_text.";font-size:".$font_size_text.";'><span>".$params->get('image'.$i.'cap')."</span>".$link."</div></div></div></div></li>";
					array_push($imgsAndCaps, $listitem);	
			
			
			// if image + no caption + no title
			} else if ( ($params->get('image'.$i)) && ($params->get('image'.$i.'cap') == null) && ($params->get('image'.$i.'title') == null) ) {
				
					$listitem = "<li class='".$text_shadow."-text-shadow'><div class='jslider-image'>".$link_image_before."<img title='' alt='".$params->get('image'.$i.'alt')."' src='".JURI::root().$params->get('image'.$i)."' /><span class='image-height-fixed' style='background-image: url(".JURI::root().$params->get('image'.$i).");'></span>".$link_image_after."</div></li>";
					array_push($imgsAndCaps, $listitem);

			
			// if image + no caption + title
			} else if ( ($params->get('image'.$i)) && ($params->get('image'.$i.'cap') == null) && ($params->get('image'.$i.'title')) ) {
				
					$listitem = "<li class='".$text_shadow."-text-shadow'><div class='jslider-image'>".$link_image_before."<img title='' alt='".$params->get('image'.$i.'alt')."' src='".JURI::root().$params->get('image'.$i)."' /><span class='image-height-fixed' style='background-image: url(".JURI::root().$params->get('image'.$i).");'></span>".$link_image_after."</div><div class='slide-desc-box ".$position_text." ".$bg_caption_shadow."-shadow ".$anim_text."' ><div ".$fadeText."><div class='".$bg_text."' ><div class='slide-title' style='max-width:".$max_width."px;color:".$color_title.";font-size:".$font_size_title.";'><span class='span-js-title'>".$params->get('image'.$i.'title')."</span></div>".$link."</div></div></div></li>";
					array_push($imgsAndCaps, $listitem);
			}
		
		$i++;
		
		endwhile;
		
		return $imgsAndCaps;
		
	}
	
	public static function getImagesFromFolder(&$params) { 
		$imgsAndCaps = array(); 
		$i=0;
		$imageFolder = JPATH_BASE.'/images/'.$params->get('imagefolder');

		$filesFromFolder = JFolder::files($imageFolder, '.', false, false, array('.db','.svn', 'CVS','.DS_Store','__MACOSX','index.html'));
		
		foreach ($filesFromFolder as $image) { 
			$i++;
			$imgpath = JURI::root().'images/'.$params->get('imagefolder').'/'.$image;
					
			$listitem = "<li><div class='jslider-image'><img alt='' src='".$imgpath."' /><span class='image-height-fixed' style='background-image: url(".$imgpath.");'></span></div></li>";
			array_push($imgsAndCaps, $listitem);
						
		}
		
		return $imgsAndCaps;
	}
	
	public static function load_jquery(&$params){
		$doc = JFactory::getDocument();
		
		if ($params->get('load_jquery')) {
			$doc->addScript(JURI::root(true).'/modules/mod_joomspirit_slider/assets/js/jquery-1110.js');
			$doc->addScript(JURI::root(true).'/modules/mod_joomspirit_slider/assets/js/noconflict.js');
		}		
					
	}
	
}