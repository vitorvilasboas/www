<?php

/**
* @copyright	Copyright (C) 2016 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die; ?>

<?php
	
	//	Background color
	
	if (!function_exists('hex2rgb_js')) {
		function hex2rgb_js($hex) {
		   $hex = str_replace("#", "", $hex);
		
		   if(strlen($hex) == 3) {
			  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
			  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
			  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
		   } else {
			  $r = hexdec(substr($hex,0,2));
			  $g = hexdec(substr($hex,2,2));
			  $b = hexdec(substr($hex,4,2));
		   }
		   $rgb = array($r, $g, $b);
		   //return implode(",", $rgb); // returns the rgb values separated by commas
		   return $rgb; // returns an array with the rgb values
		}
	}
	
	$rgb_text = hex2rgb_js($bg_color_text);
	$rgba_text = 'rgba('.$rgb_text[0].','.$rgb_text[1].','.$rgb_text[2].','.$transparency_bg_text.')' ;
	if ( $transparency_bg_text == '0' ) { $rgba_text = 'transparent' ; }

	//		Google font
	$space_font_name   = array("+");
	if ( $custom_font_title != '' ) { $font_title =  $custom_font_title ; }
	if ( $custom_font_text != '' ) { $font_text =  $custom_font_text ; }

	// 		find the position of the caracter ":"
	
	if (!function_exists('sep_font_js')) {
		function sep_font_js($font)
		{
			$pos1=strpos($font, ":");
			$pos2=strpos($font, "&");
				
			$length=strlen($font);
			if ( ($pos1 !== false) & ($pos2 !== false) ) { return min( $pos1, $pos2) ; }
			elseif ($pos1 !== false)  { return $pos1 ; }
			elseif ($pos2 !== false)  { return $pos2 ; }
			else { return $length ; }
		}
	}
	
	// load all non standard fonts from Google
	$defaultFonts = array('Arial', 'Verdana', 'Trebuchet ms', 'Helvetica', 'Georgia', 'Times new roman');
	$allFonts = array($font_title, $font_text);
	$googleFonts = array_unique (array_diff($allFonts, $defaultFonts));
	
	$i = 0;
	$googlecode = '';
	
	foreach ($googleFonts as $loadFont) {
		if ($i > 0) {$googlecode .= '|';}
		$googlecode .= $loadFont;
		$i++;
	}	
	
	$doc->addStyleSheet('https://fonts.googleapis.com/css?family=' .$googlecode, 'text/css', 'all');

?>


<style scoped type="text/css">
	
	#flexslider-<?php echo $module_id; ?> {
	background-color : <?php echo $bg_color ; ?>;
	}
	
	#flexslider-<?php echo $module_id; ?> .flex-control-paging li a.flex-active {
	background-color: <?php echo $colorNavActive ; ?>; 
	}
	
	#flexslider-<?php echo $module_id; ?> .slide-desc-box > div > div {
	background : <?php if ( $bg_color_text_ie =='' ) { echo $bg_color_text ;} else { echo $bg_color_text_ie ; } ?>;
	background : <?php echo $rgba_text ; ?>;
	}
	
	#flexslider-<?php echo $module_id; ?> .slide-desc {
	font-family: '<?php echo str_replace($space_font_name," ",substr($font_text,0,sep_font_js($font_text)) ) ; ?>', sans-serif;
	}
	
	#flexslider-<?php echo $module_id; ?> .slide-desc-box .slide-title {
	font-family: '<?php echo str_replace($space_font_name," ",substr($font_title,0,sep_font_js($font_title)) ) ; ?>', sans-serif;
	}
	
	<?php if ( $shadow_top_image != 'no' ) : ?>
	#flexslider-<?php echo $module_id; ?> .shadow-top-image {
	position:absolute;
	top:0;
	left:0;
	right:0;
	height:20px;
	background: url(modules/mod_joomspirit_slider/assets/css/images/shadow-top-<?php echo $shadow_top_image ; ?>.png) 50% 0 repeat-x;
	z-index:7;
	}
	<?php endif; ?>
	
	<?php if ( $shadow_bottom_image != 'no' ) : ?>
	#flexslider-<?php echo $module_id; ?> .shadow-bottom-image {
	position:absolute;
	bottom:0;
	left:0;
	right:0;
	height:20px;
	background: url(modules/mod_joomspirit_slider/assets/css/images/shadow-bottom-<?php echo $shadow_bottom_image ; ?>.png) 50% 0 repeat-x;
	z-index:7;
	}
	<?php endif; ?>
	
	
	<?php if( $height_slideshow_desktop == 'fixed-viewport') : ?>
	@media screen and (min-width: 980px) {
		#flexslider-<?php echo $module_id; ?>, #flexslider-<?php echo $module_id; ?> li .jslider-image {
		height: <?php echo $height_slideshow_desktop_percentage ; ?>vh;
		overflow:hidden !important;
		}
		
		#flexslider-<?php echo $module_id; ?> .slides img {
		display:none
		}
		#flexslider-<?php echo $module_id; ?> span.image-height-fixed {
		display:block;
		}
		
	}
	<?php endif; ?>
	
	<?php if( $height_slideshow_desktop == 'fixed-px') : ?>
	@media screen and (min-width: 980px) {
		#flexslider-<?php echo $module_id; ?>, #flexslider-<?php echo $module_id; ?> li .jslider-image {
		height: <?php echo $height_slideshow_desktop_px ; ?>px;
		overflow:hidden !important;
		}
		
		#flexslider-<?php echo $module_id; ?> .slides img {
		display:none
		}
		#flexslider-<?php echo $module_id; ?> span.image-height-fixed {
		display:block;
		}
		
	}
	<?php endif; ?>
	
	<?php if( $height_slideshow_desktop == 'fluid') : ?>
	@media screen and (min-width: 980px) {
	
		#flexslider-<?php echo $module_id; ?> ul.slides {
		margin:0;
		}
		
	}
	<?php endif; ?>
	
	<?php if( $height_slideshow_tablet == 'fixed-viewport') : ?>
	@media screen and (max-width: 979px) and (min-width: 768px) {
		#flexslider-<?php echo $module_id; ?>, #flexslider-<?php echo $module_id; ?> li .jslider-image {
		height: <?php echo $height_slideshow_tablet_percentage ; ?>vh;
		overflow:hidden !important;
		}
		
		#flexslider-<?php echo $module_id; ?> .slides img {
		display:none
		}
		#flexslider-<?php echo $module_id; ?> span.image-height-fixed {
		display:block;
		}
		
	}	
	<?php endif; ?>
	
	<?php if( $height_slideshow_tablet == 'fixed-px') : ?>
	@media screen and (max-width: 979px) and (min-width: 768px) {
		#flexslider-<?php echo $module_id; ?>, #flexslider-<?php echo $module_id; ?> li .jslider-image {
		height: <?php echo $height_slideshow_tablet_px ; ?>px;
		overflow:hidden !important;
		}
		
		#flexslider-<?php echo $module_id; ?> .slides img {
		display:none
		}
		#flexslider-<?php echo $module_id; ?> span.image-height-fixed {
		display:block;
		}
		
    }
	<?php endif; ?>
	
	<?php if( $height_slideshow_tablet == 'fluid') : ?>
	@media screen and (max-width: 979px) and (min-width: 768px) {
		
		#flexslider-<?php echo $module_id; ?> ul.slides {
		margin:0;
		}
		
	}
	<?php endif; ?>
	
	<?php if( $height_slideshow_phone == 'fixed-viewport') : ?>
	@media screen and (max-width: 767px) {
		#flexslider-<?php echo $module_id; ?>, #flexslider-<?php echo $module_id; ?> li .jslider-image {
		height: <?php echo $height_slideshow_phone_percentage ; ?>vh;
		overflow:hidden !important;
		}
		
		#flexslider-<?php echo $module_id; ?> .slides img {
		display:none
		}
		#flexslider-<?php echo $module_id; ?> span.image-height-fixed {
		display:block;
		}
		
    }
	<?php endif; ?>
	
	<?php if( $height_slideshow_phone == 'fixed-px') : ?>
	@media screen and (max-width: 767px) {
		#flexslider-<?php echo $module_id; ?>, #flexslider-<?php echo $module_id; ?> li .jslider-image {
		height: <?php echo $height_slideshow_phone_px ; ?>px;
		overflow:hidden !important;
		}
		
		#flexslider-<?php echo $module_id; ?> .slides img {
		display:none
		}
		#flexslider-<?php echo $module_id; ?> span.image-height-fixed {
		display:block;
		}
		
    }
	<?php endif; ?>
	
	<?php if( $height_slideshow_phone == 'fluid') : ?>
	@media screen and (max-width: 767px) {
		
		#flexslider-<?php echo $module_id; ?> ul.slides {
		margin:0;
		}
		
	}
	<?php endif; ?>
	
	/***************		Text and buttons in small screen 		***********************/
	
	<?php if ( $text_under_slideshow != 'never' ) : ?>
	@media screen and (max-width: <?php echo $text_under_slideshow ; ?>px) {
		
		#flexslider-<?php echo $module_id; ?>, #flexslider-<?php echo $module_id; ?> .slides li {
		height: auto;
		overflow:hidden !important;
		}
		
		#flexslider-<?php echo $module_id; ?> .slides, #flexslider-<?php echo $module_id; ?> .slides li {
		background: <?php echo $bg_color_text_small_screen ; ?> !important;
		}
		
		#flexslider-<?php echo $module_id; ?> .slide-desc-box {
		position:relative;
		top:inherit !important;
		bottom:inherit !important;
		transform:none !important;
		}
		
		#flexslider-<?php echo $module_id; ?> .slide-desc-box > div {
		display:block;
		transform: none !important;
		text-shadow: none !important;
		box-shadow: none !important;
		opacity:1 !important;
		}
		
		#flexslider-<?php echo $module_id; ?> .slide-desc-box > div > div {
		display:block;
		max-width:none !important;
		background: <?php echo $bg_color_text_small_screen ; ?>;
		-webkit-animation : none !important;
		animation : none !important;
		padding: 12px 2 0px 22px;
		text-align:center !important;
		}
		
		.flex-active-slide .anim-js-rotate-letters .slide-title span {
		-webkit-animation : none !important;
		animation : none !important;
		}
		
		#flexslider-<?php echo $module_id; ?> .slide-desc-box .slide-title {
		text-shadow: none !important;
		color: <?php echo $color_text_small_screen ; ?> !important;;
		font-size: <?php echo $fontsize_title_small_screen ; ?>px !important;
		-webkit-animation : anim-js-simple-fade 1s ease !important;
		animation : anim-js-simple-fade 1s ease !important;
		}
		
		#flexslider-<?php echo $module_id; ?> .slide-desc-box .slide-title span {
		color: <?php echo $color_text_small_screen ; ?> !important;;
		font-size: <?php echo $fontsize_title_small_screen ; ?>px !important;
		min-width:0 !important;
		}
		
		#flexslider-<?php echo $module_id; ?> .slide-desc-box .slide-desc {
		text-shadow: none !important;
		color: <?php echo $color_text_small_screen ; ?> !important;
		font-size: <?php echo $fontsize_text_small_screen ; ?>px !important;
		-webkit-animation : anim-js-simple-fade 1s ease !important;
		animation : anim-js-simple-fade 1s ease !important;
		}
		
		#flexslider-<?php echo $module_id; ?> .slide-desc-box .slide-desc span {
		color: <?php echo $color_text_small_screen ; ?> !important;
		font-size: <?php echo $fontsize_text_small_screen ; ?>px !important;
		}
				
		#flexslider-<?php echo $module_id; ?>.position-nav-bottom .flex-control-nav {
		top:9px;
		bottom:inherit;
		}
		
		/**		disable kenburns effect  	**/
		
		#flexslider-<?php echo $module_id; ?> .slides.kenburns img {
		-webkit-animation : none !important;
		animation : none !important;
		}
				
	}
	<?php endif; ?>

	<?php if ( $hide_text != 'never' ) : ?>
	@media screen and (max-width: <?php echo $hide_text ; ?>px) {
	
		#flexslider-<?php echo $module_id; ?> .slide-desc-box {
		display:none !important;
		}
		
	}
	<?php endif; ?>
	
	<?php if ( $hide_buttons != 'never' ) : ?>
	@media screen and (max-width: <?php echo $hide_buttons ; ?>px) {
	
		#flexslider-<?php echo $module_id; ?> .flex-control-nav, #flexslider-<?php echo $module_id; ?> .flex-direction-nav {
		display:none !important;
		}
		
		#flexslider-<?php echo $module_id; ?> .slide-desc-box {
		padding:0 15px;
		}
		
	}
	<?php endif; ?>
	
	
</style>

<script src="modules/mod_joomspirit_slider/assets/js/jquery.flexslider-min.js" type="text/javascript"></script>

<!-- Buggyfill script to improve the compatibility of modern viewport units	-->
<?php if( $height_slideshow_desktop == 'fixed-viewport' || $height_slideshow_tablet == 'fixed-viewport' || $height_slideshow_phone == 'fixed-viewport') : ?>

	<script src="modules/mod_joomspirit_slider/assets/js/viewport-units-buggyfill.js"></script>
	<script src="modules/mod_joomspirit_slider/assets/js/viewport-units-buggyfill.hacks.js"></script>
	<script>window.viewportUnitsBuggyfill.init({
	
		// milliseconds to delay between updates of viewport-units
		// caused by orientationchange, pageshow, resize events
		refreshDebounceWait: 250,
	
		// provide hacks plugin to make the contentHack property work correctly.
		hacks: window.viewportUnitsBuggyfillHacks
	
	});</script>
<?php endif; ?>

	
<?php if( $rotate_on_scroll == 'rotate-on-scroll' ) : ?>
<div style="perspective:500px;">
<?php endif; ?>

	<div id="flexslider-<?php echo $module_id; ?>" <?php if( $rotate_on_scroll == 'rotate-on-scroll' ) : ?>data-0-top='-webkit-transform-origin:100% 100%;-ms-transform-origin:100% 100%;transform-origin:100% 100%;-webkit-transform: rotateX(0deg);-ms-transform: rotateX(0deg);transform: rotateX(0deg);opacity:1;' data--350-top='transform-origin:100% 100%;transform: rotateX(90deg);-webkit-transform-origin:100% 100%;-webkit-transform: rotateX(90deg);-ms-transform-origin:100% 100%;-ms-transform: rotateX(90deg);opacity:0;' data-anchor-target='#flexslider-<?php echo $module_id; ?>'<?php endif; ?> class="flexslider <?php if ( $slide_theme == 'false' ) : ?> <?php echo $theme_shadow ; ?> theme-border-<?php echo $theme_border ; ?> theme-border-radius-<?php echo $theme_border_radius ; ?> <?php else : ?>flex-slide-theme-<?php echo $direction; ?><?php endif ; ?> <?php echo $directionNav ; ?> <?php if ($controlNav == 'true') : ?>position-nav-<?php echo $positionNav ; ?><?php endif ; ?> color-nav-<?php echo $colorNav ; ?> <?php echo $transition ; ?>-<?php echo $direction ; ?> <?php echo $text_shadow ; ?>_text_shadow" >
	 
		<ul class="slides <?php echo $kenburns ; ?>" >
			<?php
				foreach($listofimages as $item){
					echo $item; 
				}
			?> 
		</ul>
		  
		<?php if ( $shadow_top_image != 'no' ) : ?>
		<div class="shadow-top-image"></div>
		<?php endif; ?>
		
		<?php if ( $shadow_bottom_image != 'no' ) : ?>
		<div class="shadow-bottom-image"></div>
		<?php endif; ?>
	  
	</div>
	
	<?php if ( $slide_theme == 'true' ) : ?>
	<span class="slide-theme flex-slide-theme-<?php echo $direction; ?>">
		<span class="slide-theme-side slide-top-left"></span>
		<span class="slide-theme-side slide-top-right"></span>
		<span class="slide-theme-side slide-bottom-left"></span>
		<span class="slide-theme-side slide-bottom-right"></span>
	</span>
	<?php endif; ?>
	
<?php if( $rotate_on_scroll == 'rotate-on-scroll' ) : ?>
</div>
<?php endif; ?>

<script type="text/javascript">
  jQuery(window).load(function() {
    jQuery('#flexslider-<?php echo $module_id; ?>').flexslider({
        animation: "<?php echo $transition; ?>",
        easing:"linear",								// I disable this option because there was a bug with Jquery easing and Joomla 3.X
 		direction: "<?php echo $direction; ?>",        //String: Select the sliding direction, "horizontal" or "vertical"
		slideshowSpeed: <?php echo $pauseTime; ?>, 			// How long each slide will show
		animationSpeed: <?php echo $animSpeed; ?>, 			// Slide transition speed
    	directionNav: <?php if ($directionNav == 'false') { echo "false" ;} else { echo "true" ;} ?>, 
    	prevText: "<",
		nextText: ">",
    	controlNav: <?php echo $controlNav ; ?>,    
    	pauseOnHover: <?php echo $pauseOnHover; ?>,
    	initDelay: <?php echo $initDelay; ?>,
    	randomize: <?php echo $randomize; ?>,
    	smoothHeight: false,
    	touch: false,
    	keyboardNav: true
    	
    });
  });
</script>

<?php if( ($rotate_on_scroll == 'rotate-on-scroll' || $fade_text_on_scroll == 'fade-text-on-scroll') && $load_skrollr == 'true' ): ?>
	<script src="modules/mod_joomspirit_slider/assets/js/skrollr.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		
		var s = skrollr.init({
		   	smoothScrolling: true
    	});
    		
    	if( (/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera)){
    		skrollr.init().destroy();
		}
		
	</script>
<?php endif; ?>

<?php if( $titleLetters == 'true' ) : ?>
<script type="text/javascript">
jQuery(window).load(function() {

	jQuery('.anim-js-rotate-letters .slide-title').each(function (index) {
		var characters = jQuery(this).text().split("");
		
		jQuerythis = jQuery(this);
		jQuerythis.empty();
		jQuery.each(characters, function (i, el) {
		jQuerythis.append("<span>" + el + "</span");
		});
	
	});
 });
</script>
<?php endif; ?>