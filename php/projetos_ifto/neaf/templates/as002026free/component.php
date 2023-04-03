<?php

/*******************************************************************************************/
/*
/*		Designed by 'AS Designing'
/*		Web: http://www.asdesigning.com
/*		Web: http://www.astemplates.com
/*		License: GNU/GPL
/*
/*******************************************************************************************/

defined('_JEXEC') or die;
include ('includes/includes.php');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
  <head>

	<?php
		$doc->addStyleSheet('templates/'.$this->template.'/css/bootstrap.css'); 
		$doc->addStyleSheet('templates/'.$this->template.'/css/bootstrap.responsive.css'); 
		$doc->addStyleSheet('templates/'.$this->template.'/css/style.default.css'); 	
		$doc->addStyleSheet('templates/'.$this->template.'/css/tmpl.default.css');
		$doc->addStyleSheet('templates/'.$this->template.'/css/media.1200.css');
		$doc->addStyleSheet('templates/'.$this->template.'/css/media.980.css');
		$doc->addStyleSheet('templates/'.$this->template.'/css/media.768.css');
		$doc->addStyleSheet('templates/'.$this->template.'/css/media.480.css');
    ?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>            
    <jdoc:include type="head" />
    
    <?php
		include 'params.php';
		
		echo $bodyfont_arr['fontlink'];
		if($hfont_arr['fontlink'] != $bodyfont_arr['fontlink'])
		{
			echo $hfont_arr['fontlink'];
		}
		if(($logo_font_arr['fontlink'] != $hfont_arr['fontlink']) && 
		   ($logo_font_arr['fontlink'] != $bodyfont_arr['fontlink']))
		{
			echo $logo_font_arr['fontlink'];
		}
		if(($slogan_font_arr['fontlink'] != $logo_font_arr['fontlink']) && 
		   ($slogan_font_arr['fontlink'] != $hfont_arr['fontlink']) && 
		   ($slogan_font_arr['fontlink'] != $bodyfont_arr['fontlink']))
		{
			echo $slogan_font_arr['fontlink'];
		}
					
		$doc->addStyleSheet('templates/'.$this->template.'/css/'.$tmpl_style);		
		include 'styles.php';
    ?>
            
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/tmpl.default.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/style.custom.css" type="text/css" />    
</head>

<body class="contentpane modal">
	<div class="wrapper">
        <jdoc:include type="message" />
        <jdoc:include type="component" />
    </div>
</body>

</html>
