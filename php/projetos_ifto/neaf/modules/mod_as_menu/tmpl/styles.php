<?php

/*******************************************************************************************/
/*
/*		Web: http://www.asdesigning.com
/*		Web: http://www.astemplates.com
/*		License: GNU/GPL
/*
/*******************************************************************************************/

require_once __DIR__ . '/fonts.php';

$id  						= '#menu_' . $params->get('module_id');

$bg_color	 				= '#' . $params->get('bg_color');
$gradient_topcolor			= $params->get('gradient_topcolor');
$gradient_btmcolor			= $params->get('gradient_btmcolor');

$font_color	 				= '#' . $params->get('font_color');
$hfont_color 				= '#' . $params->get('hfont_color');

$font_size1	 				= $params->get('font_size1');
if($font_size1)
	$line_height1			= 'line-height: ' . $font_size1 + 2 . 'px;';

$font_size2	 				= $params->get('font_size2');
if($font_size2)
	$line_height2			= 'line-height: ' . $font_size2 + 2 . 'px;';

$submenu_width				= $params->get('submenu_width');

$border_radius				= $params->get('border_radius');
if(!is_numeric($border_radius))
{
	$border_radius = 0;
}

$font_family 				= $params->get('font_family');
$google_font 				= array('fontlink'=>false, 'fontfamily'=>false);
$google_font 				= googleFontChooser($font_family);

$font_family 				= $google_font['fontfamily'];

?>

<style type="text/css">

#as-menu <?php echo $id ?>,
#as-menu ul<?php echo $id ?>.as-menu ul
{
	background-color: <?php echo $bg_color ?>;
	border-radius: <?php echo $border_radius ?>px;
	
	<?php  if($gradient_topcolor && $gradient_btmcolor): ?>
	background-image: -moz-linear-gradient(top, #<?php echo $gradient_topcolor . ', #' . $gradient_btmcolor ?>);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#<?php echo $gradient_topcolor ?>), to(#<?php echo $gradient_btmcolor ?>));
	background-image: -webkit-linear-gradient(top, #<?php echo $gradient_topcolor . ', #' . $gradient_btmcolor ?>);
	background-image: -o-linear-gradient(top, #<?php echo $gradient_topcolor . ', #' . $gradient_btmcolor ?>);
	background-image: linear-gradient(to bottom, #<?php echo $gradient_topcolor . ', #' . $gradient_btmcolor ?>);
	<?php endif; ?>
}

#as-menu ul<?php echo $id ?>.as-menu > li > a,
#as-menu ul<?php echo $id ?>.as-menu > li > span
{
	font-size: <?php echo $font_size1 ?>px;
	<?php echo $line_height1 ?>
	<?php echo $google_font['fontfamily']; ?>
	color: <?php echo $font_color ?>;
}

#as-menu ul<?php echo $id ?>.as-menu > li.active > a,
#as-menu ul<?php echo $id ?>.as-menu > li.asHover > a,
#as-menu ul<?php echo $id ?>.as-menu > li.current > a,
#as-menu ul<?php echo $id ?>.as-menu > li.active > span,
#as-menu ul<?php echo $id ?>.as-menu > li.asHover > span,
#as-menu ul<?php echo $id ?>.as-menu > li.current > span,
#as-menu ul<?php echo $id ?>.as-menu > li > a:hover,
#as-menu ul<?php echo $id ?>.as-menu > li > span:hover,
#as-menu ul<?php echo $id ?>.as-menu ul li a:hover,
#as-menu ul<?php echo $id ?>.as-menu ul li span:hover,
#as-menu ul<?php echo $id ?>.as-menu ul li.active > a,
#as-menu ul<?php echo $id ?>.as-menu ul li.asHover > a,
#as-menu ul<?php echo $id ?>.as-menu ul li.active > span,
#as-menu ul<?php echo $id ?>.as-menu ul li.asHover > span
{
	color: <?php echo $hfont_color ?>;
}

#as-menu ul<?php echo $id ?>.as-menu ul
{
	width: <?php echo $submenu_width ?>px;
	-webkit-border-radius: 0px;
	-moz-border-radius: 0px;
	border-radius: 0px;	
	-webkit-border-bottom-right-radius: <?php echo $border_radius ?>px;
	-moz-border-radius-bottomright: <?php echo $border_radius ?>px;
	border-bottom-right-radius: <?php echo $border_radius ?>px;
	-webkit-border-bottom-left-radius: <?php echo $border_radius ?>px;
	-moz-border-radius-bottomleft: <?php echo $border_radius ?>px;
	border-bottom-left-radius: <?php echo $border_radius ?>px;
}

#as-menu ul<?php echo $id ?>.as-menu ul li a,
#as-menu ul<?php echo $id ?>.as-menu ul li span
{
	font-size: <?php echo $font_size2 ?>px;
	<?php echo $line_height2 ?>
	<?php echo $google_font['fontfamily']; ?>
	color: <?php echo $font_color ?>;
}

#as-menu ul<?php echo $id ?>.as-menu li li:hover ul,
#as-menu ul<?php echo $id ?>.as-menu li li.asHover ul,
#as-menu ul<?php echo $id ?>.as-menu li li li:hover ul,
#as-menu ul<?php echo $id ?> .as-menu li li li.asHover ul
{
	left: <?php echo $submenu_width ?>px;
}


</style>