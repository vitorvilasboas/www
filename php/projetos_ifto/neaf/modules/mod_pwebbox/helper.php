<?php
/**
 * @package     pwebbox
 * @version 	2.0.8
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

class ModPwebboxHelper
{
     	/**
	 * Init box layout - its additional parameters, neccessary scripts, stylesheet, css classes..
         * 
	 * @param   \Joomla\Registry\Registry   $params     module parameters  
	 */    
        public static function initBox($params)
        {
                static $call_count = 1;
                // Set layout_type to slidebox, modal, accordion or static. Basing on param 'effect' value (e.g. slidebox:slide_in, modal:rotate).
                $layout_type_and_effect = explode(':', $params->get('effect'));
                $params->set('layout_type', $layout_type_and_effect[0]);
                
                $params->def('cache_key', md5($params->get('modify_date')));
                
                // Get layout name
                $layout = $params->get('layout_type', 'slidebox'); 
                
                // Position and offset
                $toggler_position = explode(':', $params->get('toggler_position', 'left:top'));
                $params->set('toggler_position', $toggler_position[0]);
                $params->def('toggler_offset_position', array_key_exists(1, $toggler_position) ? $toggler_position[1] : 'top');   
                
                // Auto RTL
                $lang = JFactory::getLanguage(); 
                if ($params->get('rtl', 2) == 2) 
                {
                        if (!$lang->isRTL())
                        {
                                $params->set('rtl', 0);
                        }
                        else 
                        {
                                switch ($params->get('toggler_position')) 
                                {
                                        case 'left':
                                                $params->set('toggler_position', 'right');
                                                break;
                                        case 'right':
                                                $params->set('toggler_position', 'left');
                                                break;
                                        case 'top':
                                        case 'bottom':
                                                switch ($params->get('toggler_offset_position')) 
                                                {
                                                    case 'left':
                                                        $params->set('toggler_offset_position', 'right');
                                                        break;
                                                    case 'right':
                                                        $params->set('toggler_offset_position', 'left');
                                                }
                                }
                                $params->set('toggler_rotate', 0 - $params->get('toggler_rotate', 1));
                        }
                } 
                
                // Set static position for handler button
                if ($params->get('handler') == 'button') 
                {
                        $params->set('toggler_position', 'static');
                }   
                
                // Disable vertical toggler if position is not left or right
                if (!in_array($params->get('toggler_position'), array('left', 'right'))) 
                {
                        $params->set('toggler_vertical', 0);
                }
                // Disable sliding of toggler if it is not vertical and position is left or right
                elseif (!$params->get('toggler_vertical', 0)) 
                {
                        $params->set('toggler_slide', 0);
                }

                // Toggler position
                if ($layout == 'slidebox') 
                {
                        if ($params->get('handler', 'tab') == 'hidden') 
                        {
                            $params->set('toggler_vertical', 0);
                            $params->set('toggler_slide', 0);
                        }
                }
                elseif ($layout == 'accordion') 
                {
                    if ($params->get('handler', 'tab') == 'button') 
                    {
                        $params->def('toggler_offset_position', 'fixed');
                    }
                }

                // Disable auto-open for static layout
                if ($layout == 'static') 
                {
                    $params->set('open_toggler', 0);
                }    
                
                // Toggler tab name
                $toggler_name = explode('|', $params->get('toggler_name', JText::_('MOD_PWEBBOX_OPEN_CLOSE_TOGGLER'))); 
                $toggler_name_open = str_replace('"', '', $toggler_name[0]);
                $toggler_name_close = array_key_exists(1, $toggler_name) ? str_replace('"', '', $toggler_name[1]) : null;
                if ($params->get('toggler_rotate', -1) == 0 && $params->get('toggler_vertical', 0) == 1)
                {
                    $toggler_name_open = substr($toggler_name_open, 0, 1);
                    if ($toggler_name_close)
                    {
                        $toggler_name_close = substr($toggler_name_close, 0 ,1);
                    }
                }
                $params->def('toggler_name_open', $toggler_name_open); 
                $params->def('toggler_name_close', $toggler_name_close); 
                
                // Set default toggler font if none is choosen.
                if ($params->get('toggler_font') == -1)
                {
                    $params->set('toggler_font', 'NotoSans-Regular');
                }
                
                // If content has its own width param set it also to box (if box width isn't set).
                if (isset($params->get('plugin_config')->params->width))
                {
                    $content_width = $params->get('plugin_config')->params->width;
                    $box_width =  $params->get('box_width');
                    if (!empty($content_width) && empty($box_width))
                    {
                        $bg_padding = (int)$params->get('bg_padding');
                        $padding_width = 0;
                        if (!empty($bg_padding))
                        {
                            $bg_padding_position = $params->get('bg_padding_position');
                            if ($bg_padding_position == 'all' || $bg_padding_position == 'left' || $bg_padding_position == 'right')
                            {
                                $content_width += $bg_padding;
                            }
                        }
                        
                        $params->set('box_width', $content_width);
                    }
                }

                // Load CSS and JS files and JS translations
                self::initHeader($params);

                // Module CSS classes
                self::initCssClassess($params);
                
                // Check only once if user agent is with iOS.
                if ($call_count == 1)
                {
                    $jinput = JFactory::getApplication()->input;
                    
                    $user_agent = $jinput->server->get('HTTP_USER_AGENT', null, null);
                    
                    if (stripos($user_agent, 'iPod') || stripos($user_agent, 'iPhone') || stripos($user_agent, 'iPad'))
                    {
                        JFactory::getDocument()->addStyleDeclaration('[class^="pweb"] {cursor: pointer;}');
                    }
                }
                
                $call_count++;

                return true;                
        }  
        
	public static function initHeader($params) 
	{
                $doc            = JFactory::getDocument();
                $module_id      = $params->get('id');
                $uri_base       = JURI::base(true);
		$media_url 	= $params->get('media_url');
		$media_path     = $params->get('media_path');
		$layout 	= $params->get('layout_type', 'slidebox');
		$debug 		= $params->get('debug');
                $bootstrap      = false;
        
		// jQuery
		if ($params->get('load_jquery', 1)) 
                {
                        // When modules debug mode was on, then jquery.js script was added and jquery.min.js script (from J!).
                        //$doc->addScript($uri_base . '/media/jui/js/jquery' . ($debug ? '' : '.min') . '.js');
                        $doc->addScript($uri_base . '/media/jui/js/jquery.min.js');
		}
                
                if (version_compare(JVERSION, '3.0.0') == -1)
                {      
                    $doc->addScript($uri_base . '/media/jui/js/jquery-noconflict.js');
                    $doc->addScript($uri_base . '/media/jui/js/jquery-migrate.min.js');
                }          
                
                // Bootstrap JS
		if ($params->get('load_bootstrap', 1)) 
                {
                        if ($params->get('bootstrap_version', 2) == 2) 
                        {
                                // When modules debug mode was on, then bootstrap.js script was added and bootstrap.min.js script (from J!).
                                //$doc->addScript($uri_base . '/media/jui/js/bootstrap' . ($debug ? '' : '.min') . '.js');
                                $doc->addScript($uri_base . '/media/jui/js/bootstrap.min.js');
                                $bootstrap = 2;
                        }
		}
		
		// Bootstrap CSS
		if ($params->get('load_bootstrap_css', 2) == 1) 
                {
                        $doc->addStyleSheet($uri_base . '/media/jui/css/bootstrap' . ($debug ? '' : '.min') . '.css');
                        $doc->addStyleSheet($uri_base . '/media/jui/css/bootstrap-responsive' . ($debug ? '' : '.min') . '.css');
		}
		elseif ($params->get('load_bootstrap_css', 2) == 2) // Load only required styles.
                {
                        $doc->addStyleSheet($media_url . 'css/bootstrap-custom.css');
                        if ($params->get('rtl', 0)) 
                        {
                                $doc->addStyleSheet($media_url . 'css/bootstrap-custom-rtl.css');
                        }
		}


		// CSS layout
		$doc->addStyleSheet($media_url . 'css/layout.css');
		if ($params->get('rtl', 0))
                {
			$doc->addStyleSheet($media_url . 'css/layout-rtl.css');
                }

        
		$doc->addStyleSheet($media_url . 'css/animations.css');

                // Toggler icomoon
                if ($bootstrap !== 3 AND $params->get('load_icomoon', 1) AND ( in_array($params->get('handler', 'tab'), array('button', 'tab')) AND $params->get('toggler_icon') == 'icomoon' AND $params->get('toggler_icomoon') )) {
                        $doc->addStyleSheet($media_url . 'css/icomoon.css');
                }

                if ($layout == 'slidebox') 
		{
			if (strpos($params->get('effect_transition'), 'ease') !== false AND $params->get('load_jquery_ui', 1)) {
				$doc->addScript($uri_base . '/media/jui/js/jquery.ui.core' . ($debug ? '' : '.min') . '.js');
                                $doc->addScript($media_url . 'js/jquery.ui.effects.min.js');
			}
		}
		elseif ($layout == 'accordion' OR ($layout == 'modal' AND $params->get('effect') != 'modal:fade' AND $params->get('effect') != 'modal:drop'))
		{
                        // Didn't see such param in configuration.
			//if ($params->get('load_jquery_ui_effects', 1)) {
                                $doc->addScript($media_url . 'js/jquery.ui.effects.min.js');
			//}
		}
                
                // Load jQuery Cookie for auto-open count
                if ($params->get('open_toggler') AND $params->get('open_count') AND $params->get('load_jquery_cookie', 1) AND ($params->get('open_counter_storage', 0) == 0)) {
                        $doc->addScript($media_url . 'js/jquery.cookie' . ($debug ? '' : '.min') . '.js');
                }        
                
                // Load jQuery Cookie for Bottom Bar
                if ($params->get('layout_type') == 'bottombar') {
                    $doc->addScript($media_url . 'js/jquery.cookie' . ($debug ? '' : '.min') . '.js');
                }
		
                $doc->addScript($media_url . 'js/jquery.pwebbox' . ($debug ? '' : '.min') . '.js');

		// CSS styles
                if (($theme = $params->get('theme')) !== null AND JFile::exists($media_path . '/css/themes/' . $theme . '.css')) {
                        $doc->addStyleSheet($media_url . 'css/themes/' . $theme . '.css');
                }
                
                // Custom styles
                if (JFile::exists($media_path . 'css/custom.css')) {
                        $doc->addStyleSheet($media_url . 'css/custom.css');
                }

                        // Set theme custom styles
                if ($params->get('cache_css', 1))
                {
                    $path = $params->get('media_path').'cache/';
                    $file = $params->get('cache_key').'-'.$module_id.'.css';

                    if (!is_file($path . $file)) {
                            $css = self::compileCustomCSS($params);

                            // set write permissions to cache folder
                            if (!is_writable($path) AND JPath::canChmod($path)) {
                                JPath::setPermissions($path, null, '0777');
                            }

                            // write cache file
                            if (!JFile::write($path.$file, $css)) 
                            {
                                    $doc->addStyleDeclaration($css);
                                    $file = false;
                            }
                            else {
                                    // delete old cached files
                                    if (is_dir($path)) 
                                    {
                                            $dir = new DirectoryIterator($path);
                                            foreach ($dir as $fileinfo) 
                                            {
                                                    if ($fileinfo->isFile() AND $fileinfo->getFilename() !== $file AND preg_match('/^[a-f0-9]{32}\-'.$module_id.'\.css$/i', $fileinfo->getFilename()) === 1) {
                                                            JFile::delete( $fileinfo->getPathname() );
                                                    }
                                            }
                                    }
                            }
                    }

                    if ($file !== false) {
                        $doc->addStyleSheet($media_url . 'cache/' . $file);
                    }
                }
                else 
                {
                    $css = self::compileCustomCSS($params);
                    $doc->addStyleDeclaration($css);
                }
                 
                // CSS IE  
                $doc->addStyleSheet($media_url . 'css/ie8.css');
	}        
        
	/**
	 * Init css classess for box.
         * 
	 * @param   \Joomla\Registry\Registry   $params     module parameters  
	 */         
	public static function initCssClassess($params)
	{
                $moduleClasses = array();
                $positionClasses = array();
                $togglerClasses = array();
                $boxClasses = array();
        
                $layout = $params->get('layout_type', 'slidebox');
                $moduleClasses[] = 'pweb-'.$layout;
                $moduleClasses[] = 'pwebbox-plugin-' . $params->get('plugin');
                
                if ($params->get('effect') == 'slidebox:slide_in_full')
                {
                    $moduleClasses[] = 'pweb-slidebox-full-dimension';
                }
                
                // Set open and close event - mouse.
                if ($params->get('open_event') == 'mouseenter')
                {
                    $moduleClasses[] = 'pweb-open-event-mouseenter';
                }
                if ($params->get('close_event') == 'mouseleave')
                {
                    $moduleClasses[] = 'pweb-close-event-mouseleave';
                }
                
                if ($params->get('toggler_image', 0))
                {
                    $togglerClasses[] = 'pweb-img';
                }
        
                if (($class = $params->get('theme'))) $moduleClasses[] = 'pweb-theme-'.$class;
        
                //$moduleClasses[] = 'pweb-labels-'.$params->get('labels_position', 'inline');
        
                if ((int)$params->get('gradient', 1) === 1) $moduleClasses[] = $togglerClasses[] = 'pweb-gradient';
                if ($params->get('rounded')) $moduleClasses[] = $togglerClasses[] = 'pweb-radius';
		if ($params->get('shadow')) $moduleClasses[] = $togglerClasses[] = 'pweb-shadow';
                
		if ($layout != 'static') 
		{
			if (in_array($layout, array('slidebox', 'modal')))
			{
				$positionClasses[] = 'pweb-'.$params->get('toggler_position', 'left');
				$positionClasses[] = 'pweb-offset-'.$params->get('toggler_offset_position', 'top');
                
				if ($params->get('toggler_vertical')) 
                                {
					$moduleClasses[] = 'pweb-vertical';
                    if ($params->get('toggler_vertical_type', 1) == 1) $togglerClasses[] = 'pweb-vertical-css';
					if ($params->get('toggler_rotate', 1) == -1) $togglerClasses[] = 'pweb-rotate';
					if ($params->get('toggler_rotate', 1) == 0) $togglerClasses[] = 'pweb-no-rotate';
				} 
                                else 
                                {
					$moduleClasses[] = 'pweb-horizontal';
				}
				
				if ($layout == 'slidebox')
				{
					if ($params->get('handler', 'tab') == 'hidden' AND $params->get('toggler_offset_position') == 'fixed') $moduleClasses[] = 'pweb-toggler-hidden';
					if ($params->get('toggler_slide')) $moduleClasses[] = 'pweb-toggler-slide';
					if (!$params->get('debug')) $boxClasses[] = 'pweb-init';
				}
			}
			elseif ($layout == 'accordion') 
			{
				if ($params->get('accordion_boxed', 1)) $boxClasses[] = 'pweb-accordion-boxed';
				if (!$params->get('debug')) $boxClasses[] = 'pweb-init';
			}
                }
                else
                {       
                        $staticTogglerPositionClasses[] = 'pweb-'.$params->get('toggler_position', 'left');
                        $staticTogglerPositionClasses[] = 'pweb-offset-'.$params->get('toggler_offset_position', 'top');

                        if ($params->get('toggler_vertical')) 
                        {
                                $staticTogglerModuleClasses[] = 'pweb-vertical';
                                if ($params->get('toggler_rotate', 1) == -1) $togglerClasses[] = 'pweb-rotate';
                        } 
                        else 
                        {
                                $staticTogglerModuleClasses[] = 'pweb-horizontal';
                        }
                }
                
                if (($class = $params->get('theme'))) $togglerClasses[] = 'pweb-theme-'.$class;
                if ($icon = $params->get('toggler_icon')) $togglerClasses[] = 'pweb-icon pweb-icon-'.$icon;                
        
                if ($params->get('rtl', 0)) $moduleClasses[] = $togglerClasses[] = 'pweb-rtl';
        
		if ($moduleclass_sfx = $params->get('moduleclass_sfx')) 
                {
			$moduleclasses_sfx = explode(' ', $moduleclass_sfx);
			for ($i = 0; $i < count($moduleclasses_sfx); $i++) 
				if (strpos($moduleclasses_sfx[$i], 'icon-') !== false) 
					unset($moduleclasses_sfx[$i]);
			$moduleClasses[] = $togglerClasses[] = htmlspecialchars(implode(' ', $moduleclasses_sfx));
		}
		
		$params->def('positionClass', implode(' ', $positionClasses));
		$params->def('togglerClass', implode(' ', $togglerClasses));
		$params->def('moduleClass', implode(' ', $moduleClasses));
		$params->def('boxClass', implode(' ', $boxClasses));
                if ($layout == 'static') 
                {
                        $params->def('staticTogglerPositionClass', implode(' ', $staticTogglerPositionClasses));
                        $params->def('staticTogglerModuleClass', implode(' ', $staticTogglerModuleClasses));
                }
	}      
        
	/**
	 * Get script to initialize popup box js features.
         * 
	 * @param   \Joomla\Registry\Registry   $params     module parameters  
	 */           
	public static function getScript($params) 
	{
		$layout 	= $params->get('layout_type', 'slidebox');
		$position 	= $params->get('toggler_position', 'left');
                $module_id      = $params->get('id');
		
		$options = array();	
		$options[] = 'id:'.$module_id;
		
		if ($params->get('debug', 0))
                {
			$options[] = 'debug:1';
                }
                
		if (($value = (int)$params->get('bootstrap_version', 2)) != 2)
                {
			$options[] = 'bootstrap:'.$value;                
                }
		
		
                if ($value = $params->get('theme'))
                {
			$options[] = 'theme:"'.$value.'"';
                }
        
		$options[] = 'layout:"'.$layout.'"';
		$options[] = 'position:"'.$position.'"';
		$options[] = 'offsetPosition:"'.$params->get('toggler_offset_position').'"';
		
                if ($value = $params->get('toggler_name_close') AND !$params->get('toggler_vertical', 0) OR $params->get('toggler_vertical_type', 1))
			$options[] = 'togglerNameClose:"'.$value.'"';
		
		
		if (($open = (int)$params->get('open_toggler')) > 0)
		{
			$max_count = (int)$params->get('open_count');
                        $open_after_count = (int)$params->get('open_after_count');

                        $allow_open = true;

                        if ($open_after_count != 0) {
                            if ($params->get('open_counter_storage', 0) == 1)
                            {
                                // session
                                $session = JFactory::getSession();
                                if (($count = (int)$session->get('openautoafter', 0, 'pwebbox'.$module_id)) < $open_after_count)
                                {
                                    $session->set('openautoafter', ++$count, 'pwebbox'.$module_id);
                                    $allow_open = false;
                                } else {
                                    $allow_open = true;
                                }
                            }
                            else
                            {
                                // cookie
                                $cfg = JFactory::getConfig();
                                $expire_param = (int)$params->get('cookie_lifetime', 30);
                                $expire = time() + $expire_param*3600*24;
                                $path = $cfg->get('cookie_path', '/');
                                $domain = $cfg->get('cookie_domain', '');

                                $jinput = JFactory::getApplication()->input;

                                if (($count = (int)$jinput->cookie->get('pwebbox'.$module_id.'_openautoafter', 0)) < $open_after_count)
                                {
                                    $count++;
                                    JFactory::getDocument()->addScriptDeclaration("
                                        <!-- Perfect EE set cookie -->
                                        var date=new Date();
                                        date.setTime(date.getTime()+(".$expire_param."*24*60*60*1000));
                                        var expires=date.toGMTString();
                                        document.cookie='pwebbox".$module_id."_openautoafter=".$count.";expires='+expires+';path=".$path."';
                                        console.log(1);
                                        <!-- End Perfect EE set cookie -->
                                    ");    
                                    
                                    
                                    // For some reason cookie is not set - try to do it again.
                                    if ($count != $jinput->cookie->get('pwebbox'.$module_id.'_openautoafter', 0)) {
                                        $jinput->cookie->set('pwebbox'.$module_id.'_openautoafter', $count, $expire, $path, $domain);                                       
                                    }
                                    
                                    $allow_open = false;
                                } else {
                                    $allow_open = true;
                                }
                            }
                        }

                        if ($allow_open) {
                            if ($max_count == 0)
                            {
                                    $options[] = 'openAuto:'.$open;
                            }
                            elseif ($max_count > 0)
                            {
                                if ($params->get('open_counter_storage', 0) == 1)
                                {
                                    // session
                                    $session = JFactory::getSession();
                                    if (($count = (int)$session->get('openauto', 0, 'pwebbox'.$module_id)) < $max_count)
                                    {
                                            $session->set('openauto', ++$count, 'pwebbox'.$module_id);
                                            $options[] = 'openAuto:'.$open;
                                    }
                                }
                                else
                                {
                                    // cookie
                                    $cfg = JFactory::getConfig();

                                    $options[] = 'openAuto:'.$open;
                                    $options[] = 'maxAutoOpen:'.$max_count;
                                    if (($value = (int)$params->get('cookie_lifetime', 30)) != 30)
                                    {
                                            $options[] = 'cookieLifetime:'.$value;
                                    }
                                    if (($value = $cfg->get('cookie_path', JUri::base(true))) != '/')
                                    {
                                            $options[] = 'cookiePath:"'.$value.'"';
                                    }
                                    if ($value = $cfg->get('cookie_domain'))
                                    {
                                            $options[] = 'cookieDomain:"'.$value.'"';
                                    }
                                }
                            }

                            if (($value = (int)$params->get('open_delay')) > 0)
                            {
                                    $options[] = 'openDelay:'.$value;
                            }
                        }
		}
                
		if (($value = (int)$params->get('close_delay')) > 0)
                {
			$options[] = 'closeDelay:'.$value;
                }            
                
		if (!$params->get('close_other', 1))
                {
			$options[] = 'closeOther:0';                
                }
		
		$options2 = array();
		// Google Analytics Tracking
            if ($params->get('analytics_tracker_type') == 1)
                {
                    if ($params->get('analytics_tracker_page'))
                                {
                                    $options2[] = 'if(typeof pageTracker!="undefined")pageTracker._trackPageview("'.$params->get('analytics_tracker_page').'");';
                                }
                    if ($params->get('analytics_tracker_event'))
                                {
                                    $options2[] = 'if(typeof pageTracker!="undefined")try{pageTracker._trackEvent('.$params->get('analytics_tracker_event').')}catch(e){};';
                                }
                }
            elseif ($params->get('analytics_tracker_type') == 2)
                {
                    if ($params->get('analytics_tracker_page'))
                                {
                                    $options2[] = 'if(typeof _gaq!="undefined")_gaq.push(["_trackPageview","'.$params->get('analytics_tracker_page').'"]);';
                                }
                    if ($params->get('analytics_tracker_event'))
                                {
                                    $options2[] = 'if(typeof _gaq!="undefined")try{_gaq.push(["_trackEvent",'.$params->get('analytics_tracker_event').'])}catch(e){};';
                                }
		        }
           elseif ($params->get('analytics_tracker_type') == 3)
           {
                   if ($params->get('analytics_tracker_page'))
                               {
                                   $options2[] = 'if(typeof ga!="undefined")ga("send", "pageview", '.$params->get('analytics_tracker_page').');';
                               }
                   if ($params->get('analytics_tracker_event'))
                               {
                                   $options2[] = 'if(typeof ga!="undefined")try{ga("event", "'.$params->get('analytics_tracker_event').'")}catch(e){};';
                               }
           }

        // Google AdWords Conversion Tracking
		if ($value = $params->get('adwords_url')) 
                {
			$options2[] = '$("<img/>",{"src":"'.$value.'","width":1,"height":1,"border":0}).appendTo("body");';
		}
		// Microsoft adCenter Conversion Tracking
		if ($value = $params->get('adcenter_url')) 
                {
			$options2[] = '$("<iframe/>",{"src":"'.$value.'","width":1,"height":1,"frameborder":0,"scrolling":"no"}).css({"visibility":"hidden","display":"none"}).appendTo("body");';
		}

        // Facebook Pixel Conversion Tracking
        if ($params->get('fb_pixel_id'))
        {
            JFactory::getDocument()->addScriptDeclaration('
            <!-- Facebook Pixel Code -->
            !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
            n.push=n;n.loaded=!0;n.version=\'2.0\';n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
            document,\'script\',\'//connect.facebook.net/en_US/fbevents.js\');
            fbq(\'init\', \''.$params->get('fb_pixel_id').'\');
            fbq(\'track\', \'PageView\');
            <!-- End Facebook Pixel Code -->
        ');
        }

		// Custom tracking script               
		if ($value = $params->get('custom_script')) 
                {
			$options2[] = 'try{'.strip_tags($value)."\r\n".'}catch(e){this.debug(e)}';
		}
                if (count($options2)) 
                {
                    $options[] = 'onTrack:function(){'.implode('', $options2).'}';
                }
                
		// On load, open and close events
		if ($value = $params->get('onload')) {
			$options[] = 'onLoad:function(){try{'.strip_tags($value)."\r\n".'}catch(e){this.debug(e)}}';
		}
		if ($value = $params->get('onopen')) {
			$options[] = 'onOpen:function(){try{'.strip_tags($value)."\r\n".'}catch(e){this.debug(e)}}';
		}
		if ($value = $params->get('onclose')) {
			$options[] = 'onClose:function(){try{'.strip_tags($value)."\r\n".'}catch(e){this.debug(e)}}';
		}
		
		// Slide Box
		if ($layout == 'slidebox') 
		{
			// Box width
			if (($value = $params->get('box_width')))
                        {
				$options[] = 'slideWidth:'.(int)$value;
                        }
			if (($value = (int)$params->get('effect_duration')) > 0) 
                        {
				$options[] = 'slideDuration:'.$value;
                        }
			if (($value = $params->get('effect_transition')) != -1 AND $value != -2 AND $value) 
                        { 
				$options[] = 'slideTransition:"'.$value.'"';
			}
		}
		// Lightbox window
		else if ($layout == 'modal') 
		{
			if ($params->get('modal_opacity', -1) == 0) 
                        {
				$options[] = 'modalBackdrop:0';
                        }
                        
			if ($params->get('modal_disable_close'))
                        {
				$options[] = 'modalClose:0';
                        }
			if (($value = $params->get('effect_duration', 400)) != 400)
                        {
				$options[] = 'modalEffectDuration:'.(int)$value;
                        }
			if (($value = $params->get('effect', 'modal:fade')) != 'modal:fade')
                        {
				$options[] = 'modalEffect:"'.substr($value, strpos($value, ':')+1).'"';
                        }
		}
                // Accordion
		else if ($layout == 'accordion') 
		{
			if (($value = $params->get('effect_duration', 400)) != 500)
                        {
				$options[] = 'accordionDuration:'.(int)$value;
                        }
		}
		
		// JavaScript initialization
		$script = 
		'jQuery(document).ready(function($){'.
			'pwebBox'.$module_id.'=new pwebBox({'.implode(',', $options).'})'. 
		'});';
		
		
		if ($params->get('debug'))
		{
			$script = 
			'jQuery(document).ready(function($){'.
				'if(typeof pwebBox'.$module_id.'Count=="undefined"){'.
					// Check if document header has been loaded
					'if(typeof pwebBox=="undefined")alert("Perfect Popup Box Debug: Popup Box module has been loaded incorrect.");'.
					// Check if one module instance has been loaded only once
					'pwebBox'.$module_id.'Count=$(".pwebbox'.$module_id.'_box").length;'.
					'if(pwebBox'.$module_id.'Count>1)'.
						'alert("Perfect Popup Box Debug: Popup Box module ID '.$module_id.' has been loaded "+pwebBox'.$module_id.'Count+" times.")'.
				'}'.
			'});'.
			$script
			;
		}

		return $script;
	}   
        
	/**
	 * Prepare custom CSS.
         * 
	 * @param   \Joomla\Registry\Registry   $params     module parameters
	 */          
	public static function compileCustomCSS($params)
	{
                $lang                   = JFactory::getLanguage();
		$module_id 		= (int) $params->get('id');
		$media_url 		= $params->get('media_url');
		$layout 		= $params->get('layout_type', 'slidebox');
		$css 			= null;
		$declarations           = array();
        
                // Box width
		if ($value = (int)$params->get('box_width')) 
                {
			//if ($layout != 'slidebox')
                        {
				$css .= '#pwebbox'.$module_id.'_box{max-width:'.$value.'px;}';
                        }
		}
                
                // Box height
		if ($value = (int)$params->get('box_height')) 
                {
			if ($layout != 'slidebox')
                        {
				$css .= '#pwebbox'.$module_id.'_box{max-height:'.$value.'px;}';
                        }
		}
		// Position offset
		if ($value = $params->get('offset'))
                {
			$css .= '#pwebbox'.$module_id.'{'.$params->get('toggler_offset_position', '').':'.$value.'}';
                        if ($layout == 'static')
                        {
                            $css .= '#pwebbox_toggler_static'.$module_id.'{'.$params->get('toggler_offset_position', '').':'.$value.'}';
                        }
                }

		// Layer level
		if ($value = (int)$params->get('zindex')) 
                {
			// Slide box and Lightbox toggler
			$css .=  '#pwebbox'.$module_id.'.pweb-left,'
					.'#pwebbox'.$module_id.'.pweb-right,'
					.'#pwebbox'.$module_id.'.pweb-top,'
					.'#pwebbox'.$module_id.'.pweb-bottom'
					.'{z-index:'.$value.'}';
			// Lightbox window
			if (($layout == 'modal' OR $params->get('load_modal_backdrop')) AND $value > 1030) 
                        {
				$css .= 'body.pweb-modal-open > .modal-backdrop{z-index:'.($value+10).'}';
				$css .= '.pwebbox-modal.modal{z-index:'.($value+20).'}';
                                $css .= '.pweb-modal.modal{z-index:'.($value+21).'}';
				$css .= '.ui-effects-transfer.pweb-genie{z-index:'.($value+19).'}';
			}
		}
		
		
		if ($layout == 'slidebox' OR (in_array($layout, array('accordion', 'modal', 'static')) AND in_array($params->get('handler', 'tab'), array('button', 'tab'))) )
		{
			// Toggler
                        if ($value = $params->get('toggler_bg')) 
                        {
                            // Toggler background color
                            $declarations[] = 'background-color:'.$value;

                            if ($value !== 'transparent') 
                            {
                                    // Toggler gradient and border
                                    if ((int)$params->get('gradient') === 1) 
                                    {
                                            $secondary_color = self::changeRgbColorBrightness( self::parseToRgbColor($value), 30 );

                                            // Rotate gradient
                                            switch ($params->get('toggler_position')) 
                                            {
                                                    case 'left':
                                                            $direction = $params->get('toggler_vertical') ? 'left' : 'top';
                                                            break;

                                                    case 'right':
                                                            $direction = $params->get('toggler_vertical') ? 'right' : 'top';
                                                            break;

                                                    case 'bottom:left':
                                                    case 'bottom:right':
                                                            $direction = 'bottom';
                                                            break;

                                                    case 'top:left':
                                                    case 'top:right':
                                                    default:
                                                            $direction = 'top';
                                            }

                                            self::getCSS3Gradient($direction, $value, self::getCSSColor($secondary_color), $declarations);

                                            $declarations[] = 'border-color:'.$value;
                                    }
                                    else 
                                    {
                                        $secondary_color = self::changeRgbColorBrightness( self::parseToRgbColor($value), -30 );

                                        $declarations[] = 'background-image:none';
                                        $declarations[] = 'border-color:'.self::getCSSColor($secondary_color);
                                    }

                                    // Toggler text shadow
                                    if ($secondary_color['r'] + $secondary_color['g'] + $secondary_color['b'] > 384) 
                                    {
                                        $declarations[] = 'text-shadow:0 1px 1px rgba(0,0,0,0.5)';
                                    }
                                    else 
                                    {
                                        $declarations[] = 'text-shadow:0 1px 1px rgba(255,255,255,0.5)';
                                    }

                                    unset($secondary_color);
                                }
                        }
                        
			if ($value = $params->get('toggler_color'))
                        {
				$declarations[] = 'color:'.$value;
                        }
                        
			if ($value = $params->get('toggler_font_size'))
                        {
				$declarations[] = 'font-size:'.$value;
                        }
                        
			if ($value = $params->get('toggler_font_family'))
                        {
				$declarations[] = 'font-family:'.$value;
                        }
            
			if ($value = $params->get('toggler_width'))
                        {
				$declarations[] = 'width:'.(int)$value.'px';
                        }
                        
			if ($value = $params->get('toggler_height'))
                        {
				$declarations[] = 'height:'.(int)$value.'px';
                        }
                        
                        $link_css = '';
                        if ($layout == 'static' && $params->get('handler') == 'button')
                        {
                            $link_css = 'display:block;';
                        }
            
			if (count($declarations)) 
                        {
				$css .= '#pwebbox'.$module_id.'_toggler{'.implode(';', $declarations).'}';
				$css .= '#pwebbox'.$module_id.'_toggler .pwebbox-toggler-link{text-decoration:none;'.$link_css.implode(';', $declarations).'}';
				$declarations = array();
			}
			
			// Toggler icon
			if ($params->get('toggler_icon') == 'gallery') 
                        {
				if ($value = $params->get('toggler_icon_gallery_image')) 
                                {
					$css .=  '#pwebbox'.$module_id.'_toggler .pweb-icon'
                                            .'{background-image:url("'.$media_url.'images/icons/'.urlencode($value).'")}';
                                }
			}
			elseif ($params->get('toggler_icon') == 'custom') 
                        {
				if ($value = $params->get('toggler_icon_custom_image')) 
                                {
                                        //TODO parse and encode URL with JS
                                        $pos = strpos($value, '//');
                                        $css .=  '#pwebbox'.$module_id.'_toggler .pweb-icon'
                                            .'{background-image:url("'.( ($pos !== false AND $pos <= 6) ? $value : JURI::base(true).'/'.ltrim($value, '/') ).'")}';
                                }
			}
			elseif ($params->get('toggler_icon') == 'icomoon') 
                        {
				if ($value = $params->get('toggler_icomoon'))
                                {
					$css .= '#pwebbox'.$module_id.'_toggler .pweb-icon:before{content:"\\'.$value.'"}';
                                }
			}

			// Toggler vertical text
			if ($params->get('toggler_vertical') && !$params->get('toggler_vertical_type', 1) && ($params->get('toggler_rotate', -1) != 0) && (!$params->get('toggler_image', 0)))
			{                        
                                $lang_code = $lang->getTag();
                                $path  = $params->get('media_path').'cache/';
                                $file = 'toggler-'.$module_id.'-'.$lang_code.'-'.md5(
                                         (int)$params->get('toggler_width', 30)
                                        .(int)$params->get('toggler_height', 120)
                                        .(int)$params->get('toggler_font_size', 12)
                                        .(int)$params->get('toggler_rotate', 1)
                                        .$params->get('toggler_font', 'NotoSans-Regular')
                                        .$params->get('toggler_color')
                                        .$params->get('toggler_name')
                                ).'.png';

                                /*if (function_exists('WP_Filesystem') AND WP_Filesystem()) {
                                    global $wp_filesystem;*/

                                if (!JFile::exists( $path . $file )) 
                                {
                                        self::createToggleImage($params, $path, $file, $lang_code);
                                }

                                $image_contents = file_get_contents( $path. $file );
                                /*}
                                else {
                                    if (!file_exists( $path . $file )) {
                                        self::createToggleImage($module_id, $path, $file, $lang_code);
                                    }

                                    $image_contents = file_get_contents( $path. $file );
                                }*/

                                //$css .= '#pwebbox'.$module_id.'_toggler .pweb-text{background-image:url("'.$params->get('media_url').'cache/'.$file.'")}';
                                $css .= '#pwebbox'.$module_id.'_toggler .pweb-text{background-image:url(data:image/png;base64,'
                                        .base64_encode($image_contents) 
                                        .')}';

                                unset($lang_code, $path, $file, $image_contents);
			}
		}
		
		// Box container font
		if ($value = $params->get('font_size'))
                {
			$declarations[] = 'font-size:'.$value;
                }
                
		if ($value = $params->get('font_family'))
                {
			$declarations[] = 'font-family:'.$value;
                }
                
		if (count($declarations)) 
                {
			$css .=  '#pwebbox'.$module_id.'_box,'
					.'#pwebbox'.$module_id.'_box label,'
					.'#pwebbox'.$module_id.'_box input,'
					.'#pwebbox'.$module_id.'_box textarea,'
					.'#pwebbox'.$module_id.'_box select,'
					.'#pwebbox'.$module_id.'_box button,'
					.'#pwebbox'.$module_id.'_box .btn'
					.'{'.implode(';', $declarations).'}';
			$declarations = array();
		}
        
		// Box container text
		if ($value = $params->get('text_color')) 
                {
			$css .=  '#pwebbox'.$module_id.'_box .pwebbox-content'
					.'{color:'.$value.'}';
		}
		
                // Background color
		if ($value = $params->get('bg_color')) 
                {
			if (($opacity = (float)$params->get('bg_opacity')) < 1 AND $value !== 'transparent') 
                        {
				$bg_color = self::parseToRgbColor($value);
				$value .= ';background-color:'.self::getCSSColor($bg_color, $opacity);
			}
                        
			$container_bg = 'background-color:'.$value;
			$css .= '#pwebbox'.$module_id.'_container{'.$container_bg.'}';
            
                        unset($opacity);
		}

                if ($layout == 'modal' OR $params->get('load_modal_backdrop')) 
                {
                        // Modal backdrop
                        if (($value = (float)$params->get('modal_opacity')) > 0) 
                        {
                                $declarations[] = 'opacity:'.$value;
                        }
                        
                        if ($value = $params->get('modal_bg')) 
                        {
                                $declarations[] = 'background-color:'.$value;
                        }
                        
                        if (count($declarations)) 
                        {
                                $css .= '.pwebbox'.$module_id.'_modal-open .modal-backdrop.fade.in{'.implode(';', $declarations).'}';
                                $declarations = array();
                        }
                }
        
		// Background image
		$declarations_mobile = array();
		if ($value = $params->get('bg_image')) 
                {
                        $pos = strpos($value, '//');
			$declarations[] = 'background-image:url("'.( ($pos !== false AND $pos <= 6) ? $value : JURI::base(true).'/'.ltrim($value, '/') ).'")';
		}
                
		if ($value = $params->get('bg_position')) 
                {
			if ($params->get('rtl') == 2) {
				if (strpos($value, 'left') !== false)
					$value = str_replace('left', 'right', $value);
				elseif (strpos($value, 'right') !== false)
					$value = str_replace('right', 'left', $value);
			}
			$declarations[] = 'background-position:'.$value;
		}
                
                if ($value = $params->get('bg_repeat')) {
			$declarations[] = 'background-repeat:'.$value;
		}
                
                if ($value = $params->get('bg_size')) {
			$declarations[] = 'background-size:'.$value;
		}
                
		if (($padding_position = $params->get('bg_padding_position')) AND ($padding = $params->get('bg_padding'))) 
                {
			if ($params->get('rtl') == 2) 
                        {
				if ($padding_position == 'left')
					$padding_position = 'right';
				elseif ($padding_position == 'right')
					$padding_position = 'left';
			}
			$declarations[] = 'padding'.($padding_position !== 'all' ? '-'.$padding_position : '').':'.(int)$padding.'px';
			
                        // Padding on mobile
			if (($padding_position == 'left' OR $padding_position == 'right')) 
                        {
				$padding = 10;
				if ($layout == 'slidebox' 
					AND ($params->get('toggler_position') == 'left' OR $params->get('toggler_position') == 'right') 
					AND $params->get('toggler_vertical') AND !$params->get('toggler_slide')) 
                                {
						$padding = 50;
				}
                                // Disable single background image on mobile
				if ($params->get('bg_image') AND !$params->get('bg_repeat') AND !$params->get('bg_size')) 
                                {
					$declarations_mobile[] = 'background-image:none';
				}
				$declarations_mobile[] = 'padding-'.$padding_position.':'.$padding.'px';
			}
		}
		if (count($declarations)) 
                {
			$css .= '#pwebbox'.$module_id.'_container{'.implode(';', $declarations).'}';
			if (count($declarations_mobile)) {
				$css .= '@media(max-width:480px){#pwebbox'.$module_id.'_container{'.implode(';', $declarations_mobile).'}}';
			}
			$declarations = array();
		}
                
                unset($padding, $padding_position, $declarations_mobile);


		// Accordion boxed with arrow
		if ($layout == 'accordion' AND $params->get('accordion_boxed', 1) AND $params->get('bg_color')) 
                {
			
                        $border_color = self::getCSSColor( self::changeRgbColorBrightness( 
                                isset($bg_color) ? $bg_color : self::parseToRgbColor($params->get('bg_color')), -25 ));

                        $declarations[0] = 'box-shadow:'.($params->get('shadow', 1) ? '0 0 4px rgba(0,0,0,0.5),' : '')
                                .'inset 0 0 8px '.$border_color;
                        $declarations[] = '-moz-'.$declarations[0];
                        $declarations[] = '-webkit-'.$declarations[0];
                        $declarations[] = 'border-color:'.$border_color;

                        $css .= '#pwebbox'.$module_id.'_container{'.implode(';', $declarations).'}';
                        $css .= '#pwebbox'.$module_id.'_box .pweb-arrow{border-bottom-color:'.$border_color.'}';

                        $declarations = array();

                        unset($border_color);
		}

                if ($layout == 'modal') 
		{
			// Modal transfer effect
			if (($value = (float)$params->get('effect_duration', 400)) !== 400) 
                        {
				$declarations[0] = 'animation-duration:'.$value.'ms';
				$declarations[] = '-o-'.$declarations[0];
				$declarations[] = '-ms-'.$declarations[0];
				$declarations[] = '-moz-'.$declarations[0];
				$declarations[] = '-webkit-'.$declarations[0];
			}
                        
			if (isset($container_bg))
                        {
				$declarations[] = $container_bg;
                        }
                        
			if (count($declarations)) 
                        {
                                if (($class = $params->get('theme'))) 
                                {
					$css .= '.pweb-theme-'.$class;
                                }
                                
				$css .= '.ui-effects-transfer.pweb-genie.pwebbox'.$module_id.'-genie{'.implode(';', $declarations).'}';
				$declarations = array();
			}
		}
                
                unset($declarations);

		return $css;
	}    
        
	protected static function parseToRgbColor($color = null)
	{
		$color = trim(strtolower($color));
        
                if (empty($color) OR $color === 'transparent') 
                {
                    $color = array(
                                        'r' => 255,
                                        'g' => 255,
                                        'b' => 255,
                                        'opacity' => 0
                                );
                }
		// parse hex color
		elseif (preg_match('/^\#([0-9abcdef]{1,2})([0-9abcdef]{1,2})([0-9abcdef]{1,2})$/i', $color, $match)) 
		{
			if (strlen($match[1]) == 2)
			{
				$color = array(
					'r' => hexdec($match[1]),
					'g' => hexdec($match[2]),
					'b' => hexdec($match[3])
				);
			}
			else 
			{
				$color = array(
					'r' => hexdec($match[1].$match[1]),
					'g' => hexdec($match[2].$match[2]),
					'b' => hexdec($match[3].$match[3])
				);
			}
		}
		// parse rgb color
		elseif (preg_match('/\((\d+),(\d+),(\d+)(,(\d?\.?\d+))?/i', $color, $match))
		{
			$color = array(
				'r' => $match[1],
				'g' => $match[2],
				'b' => $match[3]
			);
                        if (array_key_exists(5, $match)) {
                            $color['opacity'] = $match[5];
                        }
		}
		
		return $color;
	}
    
    
        protected static function changeRgbColorBrightness($color = array(), $hue_diff = 0)
	{
                foreach ($color as $hue => $value) 
                {
                    if ($hue === 'opacity') {
                        continue;
                    }

                    $value += $hue_diff;
                    if ($value > 255) {
                        $value = 255;
                    }
                    elseif ($value < 0) {
                        $value = 0;
                    }
                    $color[$hue] = $value;
                }
		
		return $color;
	}      
        
        protected static function getCSS3Gradient($direction = 'top', $color_from, $color_to, &$declarations) 
        {
                $linear_gradient = 'linear-gradient('.$direction.','.$color_from.','.$color_to.')';

                $declarations[] = 'background-image:-webkit-linear-gradient('.$direction.','.$color_to.','.$color_from.')';
                $declarations[] = 'background-image:-moz-'.$linear_gradient;
                $declarations[] = 'background-image:-ms-'.$linear_gradient;
                $declarations[] = 'background-image:-o-'.$linear_gradient;
                $declarations[] = 'background-image:'.$linear_gradient;
        }    
        
        protected static function getCSSColor($color, $opacity = null) 
        {
                if (is_numeric($opacity) AND !isset($color['opacity'])) 
                {
                        $color['opacity'] = $opacity;
                }

                return (isset($color['opacity']) ? 'rgba' : 'rgb')
                        . '('. $color['r'] .','. $color['g'] .','. $color['b']
                        . (isset($color['opacity']) ? ','.$color['opacity'] : '')
                        . ')';
        }     
        
	protected static function utf8_strconvert($str)
	{
		if (function_exists('mb_detect_encoding') AND is_callable('mb_detect_encoding') AND
			function_exists('mb_convert_encoding') AND is_callable('mb_convert_encoding') AND
			function_exists('mb_encode_numericentity') AND is_callable('mb_encode_numericentity'))
		{
			$encoding = mb_detect_encoding($str, 'UTF-8, ISO-8859-1');
			if ($encoding != 'UTF-8') {
				$str = mb_convert_encoding($str, 'UTF-8', $encoding);
			}
			$str = mb_encode_numericentity($str, array(0x0, 0xffff, 0, 0xffff), 'UTF-8');
		}
		
		return $str;
	}


        protected static function utf8_strrev($str)
	{
		if (empty($str)) return null;
		
		preg_match_all('/./us', $str, $ar);
		return join('', array_reverse($ar[0]));
	}        
        
	protected static function createToggleImage($params, $path = null, $file = null, $lang_code = 'en-US')
	{
                $module_id              = $params->get('id');
		$font_path 		= $params->get('media_path') . 'images/fonts/'.$params->get('toggler_font', 'NotoSans-Regular').'.ttf';
		$font_size 		= (int)$params->get('toggler_font_size', 12);
		$text_open 		= $params->get('toggler_name_open');
		$text_close             = $params->get('toggler_name_close');
		
		if ($params->get('rtl')) 
                {
			$text_open 	= self::utf8_strrev($text_open);
		}
                
		$text_length            = strlen($text_open);
		$text_open 		= self::utf8_strconvert($text_open);
		
		if ($text_close) 
		{
			if ($params->get('rtl'))
                        {
				$text_close = self::utf8_strrev($text_close);
			}
                        
			if (strlen($text_close) > $text_length) 
                        {
				$text_length = strlen($text_close);
			}
			$text_close = self::utf8_strconvert($text_close);
		}
		
		$width 			= $params->get('toggler_width', 30);
                $height 		= is_numeric($params->get('toggler_height')) ? $params->get('toggler_height') : $text_length * $font_size / 1.2;
		
		$rotate 		= (int)$params->get('toggler_rotate', 1);
		
		// Parse font color
		$color = self::parseToRgbColor( $params->get('toggler_color') );
		
		// create image
		$im = imagecreatetruecolor($text_close ? $width * 2 : $width, $height);
		imagesavealpha($im, true);
		imagealphablending($im, false);
		
		// set transparent background color
		$bg = imagecolorallocatealpha($im, 255, 0, 255, 127);
		imagefill($im, 0, 0, $bg);
		
		// set font color
		$font_color = imagecolorallocate($im, $color['r'], $color['g'], $color['b']);
		
		// display text
		if ($rotate > 0) 
                {
			imagettftext($im, 
				$font_size, -90, 
				$width * 0.25, 
				0, 
				$font_color, $font_path, $text_open
			);
			
			if ($text_close) 
                        {
				imagettftext($im, 
					$font_size, -90, 
					$width + $width * 0.25, 
					0, 
					$font_color, $font_path, $text_close
				);
                        }
		}
		else 
                {
			imagettftext($im, 
				$font_size, 90, 
				$width * 0.75, 
				$height, 
				$font_color, $font_path, $text_open
			);
			
			if ($text_close) 
                        {
				imagettftext($im, 
					$font_size, 90, 
					$width + $width * 0.75, 
					$height, 
					$font_color, $font_path, $text_close
				);
                        }
		}
		
		// set write permissions to cache folder
        if (!is_writable($path) AND JPath::canChmod($path)) {
            JPath::setPermissions($path, null, '0777');
        }
			
		// save image
		//TODO consider output image and catch it with ob_get_contents() and then write with JFile
		$result = imagepng($im, $path . $file);
		imagedestroy($im);
        
                // delete old cached files
                if ($result === true) 
                {
                        if (is_dir($path)) {
                                $dir = new DirectoryIterator($path);
                                foreach ($dir as $fileinfo) {
                                        if ($fileinfo->isFile() AND $fileinfo->getFilename() !== $file AND preg_match('/^toggler\-'.$module_id.'\-'.$lang_code.'\-[a-f0-9]{32}\.png$/i', $fileinfo->getFilename()) === 1) {
                                                unlink( $fileinfo->getPathname() );
                                        }
                                }
                        }
                }
	}   
        
	public static function getParams($module_id = 0) 
	{
		if (!empty($module_id))
		{
			jimport('joomla.registry.registry');
		
			$db = JFactory::getDBO();
			$query = $db->getQuery(true);
			$query->select('params')
				  ->from('#__modules')
				  ->where('id='.(int)$module_id)
				  ;
			$db->setQuery($query);
			
			try {
				$params_str = $db->loadResult();
			} catch (RuntimeException $e) {
				$params_str = null;
			}
			
			$params = new JRegistry($params_str);
			$params->def('id', (int)$module_id);
                        
                        return $params;
		}
	}        
        
	/**
	 * Display layout.
         * 
	 * @param   \Joomla\Registry\Registry   $params     module parameters
	 * @param   string                      $plugin_html       plugin html code
	 */    
        public static function displayBox($params, $plugin_html)
        {
                // Get JavaScript init code
                $script = self::getScript($params); 
                
                require(JModuleHelper::getLayoutPath('mod_pwebbox', $params->get('layout', 'default')));
        }        
}
