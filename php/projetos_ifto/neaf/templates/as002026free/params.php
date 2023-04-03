<?php 

/*******************************************************************************************/
/*
/*		Designed by 'AS Designing'
/*		Web: http://www.asdesigning.com
/*		Web: http://www.astemplates.com
/*		License: GNU/GPL
/*
/*******************************************************************************************/

include 'fonts.php';

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// General Configuration Parameters

$tmpl_style		= $this->params->get('tmpl_style');  // Template styles

$body_font_family 		= $this->params->get('body_font_family');
$bodyfont_arr			= array('fontlink'=>false, 'fontfamily'=>false);
$bodyfont_arr			= fontChooser($body_font_family);
$body_font_family 		= $bodyfont_arr['fontfamily'];

$hfont_family 			= $this->params->get('hfont_family');
$hfont_arr				= array('fontlink'=>false, 'fontfamily'=>false);
$hfont_arr				= fontChooser($hfont_family);
$hfont_family 			= $hfont_arr['fontfamily'];

$body_font_size 		= 'font-size: ' . $this->params->get('body_font_size') . 'px;';

$body_font_color		= '';
if($this->params->get('body_font_color'))
	$body_font_color 	= 'color: #' . $this->params->get('body_font_color') . ';';

$link_font_color 		= '';
if($this->params->get('link_font_color'))
	$link_font_color 	= 'color: #' . $this->params->get('link_font_color') . ';';

$hlink_font_color 		= '';
if($this->params->get('hlink_font_color'))
	$hlink_font_color 		= 'color: #' . $this->params->get('hlink_font_color') . ';';

$h1_font_size			= '';
$h1_line_height			= '';
if($this->params->get('h1_font_size'))
{
	$h1_font_size 			= 'font-size: ' . $this->params->get('h1_font_size') . 'px;';
	$h1_line_height			= 'line-height: ' . $this->params->get('h1_font_size') . 'px;';
}

$h2_font_size			= '';
$h2_line_height			= '';
if($this->params->get('h2_font_size'))
{
	$h2_font_size 			= 'font-size: ' . $this->params->get('h2_font_size') . 'px;';
	$h2_line_height			= 'line-height: ' . $this->params->get('h2_font_size')+30 . 'px;';
}

$h3_font_size			= '';
$h3_line_height			= '';
if($this->params->get('h3_font_size'))
{
	$h3_font_size 			= 'font-size: ' . $this->params->get('h3_font_size') . 'px;';
	$h3_line_height			= 'line-height: ' . $this->params->get('h3_font_size')+5 . 'px;';
}

$h4_font_size			= '';
$h4_line_height			= '';
if($this->params->get('h4_font_size'))
{
	$h4_font_size 			= 'font-size: ' . $this->params->get('h4_font_size') . 'px;';
	$h4_line_height			= 'line-height: ' . $this->params->get('h4_font_size')+5 . 'px;';
}

$h5_font_size			= '';
$h5_line_height			= '';
if($this->params->get('h5_font_size'))
{
	$h5_font_size 			= 'font-size: ' . $this->params->get('h5_font_size') . 'px;';
	$h5_line_height			= 'line-height: ' . $this->params->get('h5_font_size')+5 . 'px;';
}

	
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// Logo Configuration Parameters

$logo_type 			= $this->params->get('logo_type');

$logo_txt 			= '';
if($this->params->get('logo_txt'))
	$logo_txt 		= $this->params->get('logo_txt');
	
$logo_font_family 		= $this->params->get('logo_font_family');
$logo_font_arr			= array('fontlink'=>false, 'fontfamily'=>false);
$logo_font_arr			= fontChooser($logo_font_family);
$logo_font_family		= $logo_font_arr['fontfamily'];

$logo_font_size		= '';
if($this->params->get('logo_font_size'))
	$logo_font_size		= 'font-size: ' . $this->params->get('logo_font_size') . 'px;';

$logo_font_style	= '';
if($this->params->get('logo_font_style'))
	$logo_font_style		= 'font-style: ' . $this->params->get('logo_font_style') . ';';
	
$logo_font_weight	= '';
if($this->params->get('logo_font_weight'))
	$logo_font_weight		= 'font-weight: ' . $this->params->get('logo_font_weight') . ';';
	
$logo_font_color	= '';
if($this->params->get('logo_font_color'))
	$logo_font_color		= 'color: #' . $this->params->get('logo_font_color') . ';';

$slogan_font_family 		= $this->params->get('slogan_font_family');
$slogan_font_arr			= array('fontlink'=>false, 'fontfamily'=>false);
$slogan_font_arr			= fontChooser($slogan_font_family);
$slogan_font_family			= $slogan_font_arr['fontfamily'];

$slogan_font_size		= '';
if($this->params->get('slogan_font_size'))
	$slogan_font_size		= 'font-size: ' . $this->params->get('slogan_font_size') . 'px;';

$slogan_font_style	= '';
if($this->params->get('slogan_font_style'))
	$slogan_font_style		= 'font-style: ' . $this->params->get('slogan_font_style') . ';';
	
$slogan_font_weight	= '';
if($this->params->get('slogan_font_weight'))
	$slogan_font_weight		= 'font-weight: ' . $this->params->get('slogan_font_weight') . ';';
	
$slogan_font_color	= '';
if($this->params->get('slogan_font_color'))
	$slogan_font_color		= 'color: #' . $this->params->get('slogan_font_color') . ';';
	
?>

