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

include 'includes/includes.php';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>

    
	<?php
		if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
		
		$feature_responsive = $this->params->get('feature_responsive');
		
		$doc->addStyleSheet('templates/'.$this->template.'/css/font-awesome.css');
		$doc->addStyleSheet('templates/'.$this->template.'/css/bootstrap.css');
		$doc->addStyleSheet('templates/'.$this->template.'/css/tmpl.default.css');
		$doc->addStyleSheet('templates/'.$this->template.'/css/media.1200.css');
		
		if($feature_responsive)
		{
			$doc->addStyleSheet('templates/'.$this->template.'/css/bootstrap.responsive.css'); 
			$doc->addStyleSheet('templates/'.$this->template.'/css/media.980.css');
			$doc->addStyleSheet('templates/'.$this->template.'/css/media.768.css');
			$doc->addStyleSheet('templates/'.$this->template.'/css/media.480.css');
		}
		else
		{
			echo '<meta name="HandheldFriendly" content="true">';
			echo '<meta name="apple-mobile-web-app-capable" content="yes">';
			echo '<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">';
			
			echo '<style type="text/css">.select-menu {display: none !important;} #as-menu .as-menu {display: block !important;}</style';
		}
    ?>
    
    <?php
	$doc = JFactory::getDocument();
	?>
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
    <jdoc:include type="head" />

	<?php
		if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
		
		$menu = $app->getMenu();
		$menu_active = $menu->getActive();
		
		$menu_id = 0;
		if (JRequest::getVar('view') != 'form')
		{
			$menu_id = $menu_active->id;
		}

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
		
		// if right-to-left
		if ($this->direction == 'rtl'){
			$doc->addStyleSheet('media/jui/css/bootstrap-rtl.css');
			$doc->addStyleSheet('templates/'.$this->template.'/css/rtl.css');
		}		
    ?>

    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ext.asmenu.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ext.artslider.css" type="text/css" />    
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/style.custom.css" type="text/css" />
  
</head>

<body class="<?php echo $option . " view-" . $view . " task-" . $task . " itemid-" . $itemid . " body-" . $pageClass;?>">
	<div class="main-wrapper">
    
    	<!-- HEADER ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  -->    
    	
    	<div id="header">
        	
            <div id="top-row" <?php if(!$this->countModules('as-position-5')) echo 'class="solid1"'; ?> >
                <div id="toprow-wrapper" >
                    <div class="container"> 
                    	<div class="row">                       
                            <div id="top-links">
                                 <jdoc:include type="modules" name="as-position-3" style="themeHtml5" />                        
                            </div> 
                        </div>                      
                    </div>
                </div>
            </div>
            
            <div id="header-row" class="scrollToFixed">
                <div id="header-wrapper" >
                
                	<div class="container">
                        <div class="row">                       
                            <div id="logo" class="span<?php echo $this->params->get('logo_size'); ?>">
                                <?php if($logo_type): ?>
                                <a href="<?php echo $this->baseurl; ?>">
                                    <img src="<?php echo $logo_img;?>" alt="<?php echo $sitename; ?>" />
                                </a>
                                <?php else: ?> 
                                <div class="logo">
                                    <a href="<?php echo $this->baseurl ?>"><?php echo $logo_txt; ?></a>
                                    <span class="slogan">
                                        <?php echo $slogan_txt; ?>
                                    </span>
                                </div>
                                <?php endif; ?>                            
                            </div>                                    
                        
                        	<jdoc:include type="modules" name="as-position-1" style="themeHtml5" />
                        </div>                       
                    </div>
                </div>
            </div>
            
            <?php if ($this->countModules('as-position-5')): ?>
            <div id="slider-row">
                <div class="top-wrapper">
                    <div class="container"> 
                        <div class="row">
                            <jdoc:include type="modules" name="as-position-5" style="themeHtml5" />
                        </div>
                    </div> 
                </div>   
            </div>
            <?php endif; ?> 
            
            <div id="breadcrumbs-row">
             <?php if ($this->countModules('as-position-2')): ?>       
                  <div class="container"> 
                      <div class="row-fluid">
                          <jdoc:include type="modules" name="as-position-2" style="themeHtml5" />
                      </div>
                  </div>       
              <?php endif; ?>
            </div>
        </div>    

    	<!-- END OF HEADER ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ --> 
    	

        <div id="content-wrapper">     
           <div class="main">
                
                <?php if ($this->countModules('as-position-6')): ?>
                <div id="featured-row">
                    <div class="featured-row-wrapper"> 
                    	<div class="container">       
                            <div class="row-fluid">
                                <jdoc:include type="modules" name="as-position-6" style="themeHtml5" />
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                
               
            
                <?php if ($this->countModules('as-position-7')): ?>
                <div id="header-bottom-row">
                    <div class="header-bottom-row-wrapper"> 
                        <div class="container">        
                            <div class="row-fluid">
                                <jdoc:include type="modules" name="as-position-7" style="themeHtml5" />
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                       
            
                <!-- CONTENT ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <div id="content-row">
                    <div class="container">
                        <div class="content-inner row">
                        
                            <!-- COLUMN LEFT ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                            
                            <?php if(($this->countModules('as-position-10') || $this->countModules('as-position-11'))): ?>
                            <div id="aside-left" class="span<?php echo $aside_left_width; ?>">
                                <aside>
                                   
                                    <?php if($this->countModules('as-position-10')): ?>
                                    <div id="aside-row-1-left">
                                        <jdoc:include type="modules" name="as-position-10" style="html5nosize" />
                                    </div>
                                    <?php endif; ?>
                                   
                                    <?php if($this->countModules('as-position-11')): ?>
                                    <div id="aside-row-2-left">
                                        <jdoc:include type="modules" name="as-position-11" style="html5nosize" />
                                    </div>
                                    <?php endif; ?>
                                    
                                     
                                    
                                </aside>
                            </div>
                            <?php endif; ?>
                            <!-- END OF COlUMN LEFT ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                    
                            <!-- COLUMN MAIN ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->                
                            <div id="component" class="span<?php echo $mainContentWidth; ?>">
                        
                                <?php if ($this->countModules('as-position-20')): ?>
                                <div id="content-row-1" class="row-fluid">
                                    <div class="content-row-1">
                                        <jdoc:include type="modules" name="as-position-20" style="themeHtml5" />
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if ($this->countModules('as-position-21')): ?>
                                <div id="content-row-2" class="row-fluid">
                                    <div class="content-row-2">
                                        <jdoc:include type="modules" name="as-position-21" style="themeHtml5" />
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="row">
                                    <jdoc:include type="message" />
                                    <jdoc:include type="component" />
                                </div>
                                <?php if ($this->countModules('as-position-22')): ?>
                                <div id="content-row-3" class="row-fluid">
                                    <div class="content-row-3">
                                        <jdoc:include type="modules" name="as-position-22" style="themeHtml5" />
                                    </div>
                                </div>
                                <?php endif; ?>
                                
                            </div>
                            <!-- END OF COLUMN MAIN ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            
                            <!-- COLUMN RIGHT ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->                    
                            <?php if (($this->countModules('as-position-15') || $this->countModules('as-position-16'))): ?>
                            <div id="aside-right" class="span<?php echo $aside_right_width; ?>">
                                <aside>
                                    <?php if($this->countModules('as-position-15')): ?>
                                    <div id="aside-row-1-right">
                                        <jdoc:include type="modules" name="as-position-15" style="html5nosize" />
                                    </div>
                                    <?php endif; ?>
                                    <?php if($this->countModules('as-position-16')): ?>
                                    <div id="aside-row-2-right">
                                        <jdoc:include type="modules" name="as-position-16" style="html5nosize" />
                                    </div>
                                    <?php endif; ?>
                                </aside>
                            </div>
                            <?php endif; ?>
                            <!-- END OF COLUMN RIGHT ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                        </div>
                    </div>
                </div>


                <!-- sessão criada por Vitor -->
                <div id="content-row-5" > 
                    <div class="container" style="border-top: 3px solid #6f9e2e; overflow: hidden; padding: 8px 0;">
                        <div style="width:25%; float:left;">
                            <jdoc:include type="modules" name="as-position-25" style="themeHtml5" />
                        </div>
                        <div style=" float:left; width:43%;">
                            <jdoc:include type="modules" name="as-position-24" style="themeHtml5" />
                        </div>
                        <div style=" float:right; width:30%;">
                            <jdoc:include type="modules" name="as-position-23" style="themeHtml5" />
                        </div>
                    </div>
                </div>
                <!-- fim seção criada -->
                
                
                              
              
             </div> <!-- end main -->
         </div> <!-- end content-wrapper -->

         <!-- FOOTER ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
         <div id="footer">
             <?php if ($this->countModules('as-position-30') || $this->countModules('as-position-31')): ?>
             <div class="container">
             <div id="footer-wrapper">
             <div id="footer-row">
                      
                      
                          <?php if ($this->countModules('as-position-30')): ?>
                          <div class="row-fluid">
                          <div class="footer-row-1">
                              <jdoc:include type="modules" name="as-position-30" style="themeHtml5" />
                          </div>
                          </div>
                          <?php endif; ?>
                          
                          <?php if ($this->countModules('as-position-31')): ?>
                          <div class="footer-row-separator"></div>
                          <div class="row-fluid">
                          <div class="footer-row-2">                    
                              <?php if ($this->countModules('as-position-30') && $this->countModules('as-position-31')): ?>
                              
                              <?php endif; ?>
                              <jdoc:include type="modules" name="as-position-31" style="themeHtml5" />
                          </div>
                          </div>
                          <?php endif; ?>
                     
                  
             </div>
             </div>
             </div>
             <?php endif; ?>
              
             
                            
              <div id="copyright-row">
              <div id="copyright-wrapper">
                  <div class="container">   
                      <div id="trademark">
                          Copyright &copy; <?php echo date('Y'); ?> <?php echo $app->getCfg('sitename'); ?>
                      </div>
                          <div id="copyright-menu">
                            <!-- DO NOT REMOVE OR CHANGE THE CONTENT BELOW, THIS THEME MAY NOT WORK PROPERLY -->
                            
                                <div id="ascopy">
                                <a href="http://formoso.ifto.edu.br" target="_blank">
                                    IFTO CA Formodo do Araguaia
                                </a>    
                                <a href="http://www.astemplates.com/" target="_blank">
                                    <!--&nbsp;&nbsp;&nbsp;&nbsp;DESIGNED BY:&nbsp;&nbsp;ASDESIGNING-->
                                </a>
                                </div>
                            
                            <!-- DO NOT REMOVE OR CHANGE THE CONTENT ABOVE, THIS THEME MAY NOT WORK PROPERLY -->
                          </div>
                  </div>   
              </div>
              </div>
         </div>
        
         <!-- END OF FOOTER ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->    
        
    <!-- END OF main container ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    
    <?php if($this->params->get('feature_totop')): ?>
    <div id="back-top">
    	<a href="#"><span></span><?php echo $this->params->get('feature_totop_text') ?></a>
    </div>
    <?php endif; ?>
    
    <?php if ($this->countModules('modal')): ?>
    <jdoc:include type="modules" name="modal" style="modal" />
    <?php endif; ?>
    
    <?php if ($this->countModules('debug')): ?>
    <jdoc:include type="modules" name="debug" style="none"/>
    <?php endif; ?>
        
    <?php
    $doc->addScript($this->baseurl."/media/jui/js/jquery.min.js");
    $doc->addScript($this->baseurl."/media/jui/js/bootstrap.js");
    
    $noConflict = "jQuery.noConflict()";
    $doc->addScriptDeclaration($noConflict);
    
    $doc->addScript($this->baseurl.'/templates/'.$this->template.'/js/jquery.isotope.min.js');
    $doc->addScript($this->baseurl.'/templates/'.$this->template.'/js/touch.gallery.js');
    $doc->addScript($this->baseurl.'/templates/'.$this->template.'/js/scripts.js');
	$doc->addScript($this->baseurl.'/templates/'.$this->template.'/js/jquery-scrolltofixed.js');
    ?>
	</div>
</body>
</html>
