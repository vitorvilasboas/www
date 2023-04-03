<?php
/**
 * @package     pwebbox
 * @version 	2.0.0
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die;

class plgFBPagePluginHelper
{
    protected static $params = null;


    public static function setParams(&$params)
    {
        self::$params = $params;
    }


    public static function getParams()
    {
        return self::$params;
    }


    protected static function getFacebookLocale()
    {
        $locales = array('af_ZA', 'ar_AR', 'az_AZ', 'be_BY', 'bg_BG', 'bn_IN', 'bs_BA', 'ca_ES', 'cs_CZ', 'cx_PH', 'cy_GB', 'da_DK', 'de_DE', 'el_GR', 'en_GB', 'en_PI', 'en_UD', 'en_US', 'eo_EO', 'es_ES', 'es_LA', 'et_EE', 'eu_ES', 'fa_IR', 'fb_LT', 'fi_FI', 'fo_FO', 'fr_CA', 'fr_FR', 'fy_NL', 'ga_IE', 'gl_ES', 'gn_PY', 'he_IL', 'hi_IN', 'hr_HR', 'hu_HU', 'hy_AM', 'id_ID', 'is_IS', 'it_IT', 'ja_JP', 'jv_ID', 'ka_GE', 'km_KH', 'kn_IN', 'ko_KR', 'ku_TR', 'la_VA', 'lt_LT', 'lv_LV', 'mk_MK', 'ml_IN', 'ms_MY', 'nb_NO', 'ne_NP', 'nl_NL', 'nn_NO', 'pa_IN', 'pl_PL', 'ps_AF', 'pt_BR', 'pt_PT', 'ro_RO', 'ru_RU', 'si_LK', 'sk_SK', 'sl_SI', 'sq_AL', 'sr_RS', 'sv_SE', 'sw_KE', 'ta_IN', 'te_IN', 'th_TH', 'tl_PH', 'tr_TR', 'uk_UA', 'ur_PK', 'vi_VN', 'zh_CN', 'zh_HK', 'zh_TW');

        $lang = JFactory::getLanguage();
        $locale = str_replace('-', '_', $lang->getTag());

        return in_array($locale, $locales) ? $locale : 'en_US';
    }


    public static function displayLikeBox()
    {
        $html = '';

        $params = self::getParams();

        if (!defined('MOD_PWEBBOX_FBLIKEBOX_SDK'))
        {
            define('MOD_PWEBBOX_FBLIKEBOX_SDK', 1);

            if ($params->get('box_type', 'html5') != 'iframe')
            {
                if ($params->get('fb_root', 1))
                {
                    $html .= '<div id="fb-root"></div>';
                }
                if ($params->get('fb_jssdk', 1))
                {
                    $doc = JFactory::getDocument();
                    $doc->addScriptDeclaration(
                        '(function(d,s,id){'.
                        'var js,fjs=d.getElementsByTagName(s)[0];'.
                        'if(d.getElementById(id))return;'.
                        'js=d.createElement(s);js.id=id;'.
                        'js.src="//connect.facebook.net/'.self::getFacebookLocale().'/sdk.js#xfbml=1'.
                        ($params->get('fb_appid') ? '&appId='.$params->get('fb_appid') : '&appId=497672883745150').
                        '&version=v2.9";'.
                        'fjs.parentNode.insertBefore(js,fjs);'.
                        '}(document,"script","facebook-jssdk"));'
                    );
                }
            }
        }

        $width = (int)$params->get('width', 280);
        /*if (!$width OR $width == 300) // what for?
            $width = null;*/


        $paramtabs = array();
        $params->get('show_posts') ? $paramtabs['timeline'] = 'timeline' : null;
        $params->get('show_events') ? $paramtabs['events'] = 'events' : null;
        $params->get('show_messages') ? $paramtabs['messages'] = 'messages' : null;


        //select output format
        switch ($params->get('box_type', 'html5'))
        {
            case 'html5':
                $html .= '<div class="fb-page" id="pwebbox_fbpageplugin'.$params->get('id').'_html5"'
                    .' data-href="'.$params->get('href').'"'
                    .($width ? ' data-width="'.$width.'"' : '')
                    .($params->get('height') ? ' data-height="'.(int)$params->get('height').'"' : '')
                    .($params->get('small_header') ? ' data-small-header="true"' : '')
                    .($params->get('hide_cover') ? ' data-hide-cover="true"' : '')
                    .(!$params->get('show_facepile', 1) ? ' data-show-facepile="false"' : '')
                    .($paramtabs ? ' data-tabs="'. implode(',', $paramtabs) .'"' : '')
                    .($params->get('hide_cta') ? ' data-hide-cta="true"' : '')
                    .'></div>';

                break;
            case 'xfbml':
                $html .= '<fb:page id="pwebbox_fbpageplugin'.$params->get('id').'_xfbml"'
                    .' href="'.$params->get('href').'"'
                    .($width ? ' width="'.$width.'"' : '')
                    .($params->get('height') ? ' height="'.(int)$params->get('height').'"' : '')
                    .($params->get('small_header') ? ' small_header="true"' : '')
                    .($params->get('hide_cover') ? ' hide_cover="true"' : '')
                    .(!$params->get('show_facepile', 1) ? ' show_facepile="false"' : '')
                    .($paramtabs ? ' data-tabs="'. implode(',', $paramtabs) .'"' : '')
                    .($params->get('hide_cta') ? ' hide_cta="true"' : '')
                    .'></fb:page>';
                break;
            case 'iframe':
                // iframe for Page Plugin is not responsive, so fit iframe width to theme and it's padding.
                $correction = 0;
                $padding_position = $params->get('bg_padding_position');
                $padding_val = $params->get('bg_padding');
                if ($padding_position == 'left' || $padding_position == 'right')
                {
                    $correction += $padding_val - 25;
                }
                elseif ($padding_position == 'all')
                {
                    $correction += $padding_val;
                }
                else
                {
                    $correction += 35;
                }
                $theme = $params->get('theme');
                $toggler_vertical = $params->get('toggler_vertical');
                $toggler_slide = $params->get('toggler_slide');
                if ($theme == 'ribbon' || $theme == 'antique-letter' || ($toggler_vertical && !$toggler_slide))
                {
                    $correction += 33;
                    if ($theme == 'antique-letter' && $toggler_vertical && !$toggler_slide)
                    {
                        $correction += 33;
                    }
                }
                elseif ($theme == 'notebook')
                {
                    $correction += 10;
                }
                $width -= $correction;
                $show_facepile  = $params->get('show_facepile', 1);
                $show_posts = $params->get('show_posts');
                if (!($height = (int)$params->get('height')))
                {
                    if (!$show_facepile AND !$show_posts)
                        $height = 133;
                    elseif ($show_facepile AND !$show_posts)
                        $height = 228;
                    elseif (!$show_facepile AND $show_posts)
                        $height = 435;
                    elseif ($show_facepile AND $show_posts)
                        $height = 558;
                }
                $html .= '<iframe id="pwebbox_fbpageplugin'.$params->get('id').'_iframe" src="//www.facebook.com/plugins/page.php?'
                    .'href='.rawurlencode(urldecode($params->get('href')))
                    .'&amp;show_posts='.($show_posts ? 'true' : 'false')
                    .(!$show_facepile ? '&amp;show_facepile=false' : '')
                    .($params->get('small_header') ? '&amp;small_header=true' : '')
                    .($params->get('hide_cover') ? '&amp;hide_cover=true' : '')
                    .($params->get('hide_cta') ? '&amp;hide_cta=true' : '')
                    .($width ? '&amp;width='.$width : '')
                    .'&amp;height='.$height
                    .'&amp;locale='.self::getFacebookLocale()
                    .'" scrolling="no" frameborder="0" style="border:none; overflow:hidden; max-width:100%;'
                    .' width:'.$width.'px;'
                    .' height:'.$height.'px;"'
                    .' allowTransparency="true"></iframe>';


        }

        return $html;
    }


    public static function getTrackSocialScript()
    {
        if (defined('MOD_PWEBBOX_FBLIKEBOX_SUBSCRIBE')) { return null; }

        $params = self::getParams();

        if (!$params->get('track_social', 3) OR $params->get('box_type', 'html5') == 'iframe') { return null; }

        define('MOD_PWEBBOX_FBLIKEBOX_SUBSCRIBE', 1);

        $script =
            'if(typeof window.fbAsyncInit=="function")window.fbAsyncInitPweb=window.fbAsyncInit;'.
            'window.fbAsyncInit=function(){'.
            'FB.Event.subscribe("edge.create",function(u){'.
            ($params->get('track_social') == 3
                ? 'if(typeof ga!="undefined")ga("send","social","facebook","like",u)'
                : ($params->get('track_social') == 2
                    ? 'if(typeof _gaq!="undefined")_gaq.push(["_trackSocial","facebook","like",u])'
                    : 'if(typeof pageTracker!="undefined")pageTracker._trackSocial("facebook","like",u)'
                )
            ).
            ($params->get('debug') ? ';console.log("facebook like: "+u)' : '').
            '});'.
            'FB.Event.subscribe("edge.remove",function(u){'.
            ($params->get('track_social') == 3
                ? 'if(typeof ga!="undefined")ga("send","social","facebook","unlike",u)'
                : ($params->get('track_social') == 2
                    ? 'if(typeof _gaq!="undefined")_gaq.push(["_trackSocial","facebook","unlike",u])'
                    : 'if(typeof pageTracker!="undefined")pageTracker._trackSocial("facebook","unlike",u)'
                )
            ).
            ($params->get('debug') ? ';console.log("facebook unlike: "+u)' : '').
            '});'.
            'if(typeof window.fbAsyncInitPweb=="function")window.fbAsyncInitPweb.apply(this,arguments)'.
            '};';

        return $script;
    }

    public static function getTrackSocialOnClick()
    {
        $params = self::getParams();

        if (!$params->get('track_social', 3)) { return null; }

        return ($params->get('track_social') == 3
            ? 'if(typeof ga!=\'undefined\')ga(\'send\',\'trackSocial\',\'facebook\',\'visit\')'
            : ($params->get('track_social') == 2
                ? 'if(typeof _gaq!=\'undefined\')_gaq.push([\'_trackSocial\',\'facebook\',\'visit\'])'
                : 'if(typeof pageTracker!=\'undefined\')pageTracker._trackSocial(\'facebook\',\'visit\')'
            )
        );
    }
}
