<?php
/**
 * @package     pwebbox
 * @version 	2.0.0
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

$module_id              = $params->get('id');
$layout_type            = $params->get('layout_type');
$handler                = $params->get('handler');
$position_class         = $params->get('positionClass');
$module_class           = $params->get('moduleClass');
$box_class              = $params->get('boxClass');
$static_tog_pos_class   = $params->get('staticTogglerPositionClass');
$static_tog_mod_class   = $params->get('staticTogglerModuleClass');
$dir                    = $params->get('rtl', 0) ? 'rtl' : 'ltr';
$plugin                 = $params->get('plugin');

$url_open_tag = '';
$url_close_tag = '';

if ($plugin == 'link')
{
        $url = '';
        if ($plg_url = $params->get('plugin_config')->params->url)
        {
                if ((strpos($plg_url, 'http:') === false) && (strpos($plg_url, 'https:') === false))
                {
                    $plg_url = 'http://' . $plg_url;
                }            
                $url = JRoute::_($plg_url, true);
        }
        elseif ($itemid = $params->get('plugin_config')->params->menuitem)
        {
                $url = JRoute::_('index.php?Itemid='.$itemid, true);
        }  
        $target = $params->get('plugin_config')->params->target;
        $url_open_tag = '<a class="pwebbox-toggler-link" href="' . $url . '" target="' . $target . '">';
        $url_close_tag = '</a>';
}
elseif ($plugin == 'facebook_likebox' && ($params->get('handler') == 'tab' || $params->get('handler') == 'button') && $params->get('effect') == 'static:none')
{
        $url = '';
        if ($plg_url = $params->get('plugin_config')->params->href)
        {
                if ((strpos($plg_url, 'http:') === false) && (strpos($plg_url, 'https:') === false))
                {
                    $plg_url = 'https://' . $plg_url;
                }            
                $url = JRoute::_($plg_url, true);
        }  
        
        $url_open_tag = '<a class="pwebbox-toggler-link" href="' . $url . '" target="_blank">';
        $url_close_tag = '</a>';    
}

if ($params->get('toggler_image', 0))
{
    if ($params->get('toggler_image', 0) == 'gallery')
    {
        $img_src = JURI::base(true) . '/media/mod_pwebbox/images/toggler/' . $params->get('toggler_image_gallery_image');
    }
    else if ($params->get('toggler_image', 0) == 'custom')
    {
        $img_src = JURI::base(true) . '/' . $params->get('toggler_image_custom_image');
    }
    $toggler_content = '<span class="pweb-toggler-img"><img src="' . $img_src . '" alt="'.$plugin.'"></span>';
}
else
{
    $toggler_content = 	'<span class="pweb-text">'.(($params->get('toggler_vertical', 0) && $params->get('toggler_rotate', -1) != 0) && !$params->get('toggler_vertical_type', 1) ? ' ' : $params->get('toggler_name_open')).'</span>';
}

$toggler = 
        $url_open_tag
	.'<div id="pwebbox'.$module_id.'_toggler" class="pwebbox'.$module_id.'_toggler pwebbox_toggler pweb-closed '.$params->get('togglerClass').'">'
        . $toggler_content
        .'<span class="pweb-icon"></span>'
	.'</div>'
        .$url_close_tag;

$bottombar_close = '<div id="pwebbox'.$module_id.'_toggler" class="pwebbox'.$module_id.'_toggler pwebbox_'.$layout_type.'_toggler pweb pwebbox_toggler pweb-opened '.$params->get('togglerClass').'">'
        .'<i class="icon-remove"></i>'
        . '</div>';
?>
<!-- PWebBox -->
<?php if ($layout_type == 'modal' AND $handler == 'button') : ?>
<div class="<?php echo $module_class; ?>" dir="<?php echo $dir; ?>">
	<?php echo $toggler; ?>
</div>
<?php endif; ?>

<?php if ($layout_type == 'static') : ?>
    <?php if ($handler == 'button') : ?>
        <div id="pwebbox_toggler_static<?php echo $module_id; ?>" class="<?php echo $module_class; ?>" dir="<?php echo $dir; ?>">
                <?php echo $toggler; ?>
        </div>
    <?php elseif ($handler == 'tab') : ?>
        <div id="pwebbox_toggler_static<?php echo $module_id; ?>" class="pwebbox <?php echo $static_tog_pos_class.' '.$static_tog_mod_class; ?>" dir="<?php echo $dir; ?>">
            <div class="<?php echo $module_class . ' ' . $static_tog_mod_class; ?>" dir="<?php echo $dir; ?>">
                    <?php echo $toggler; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php if ($plugin != 'link' && !($plugin == 'facebook_likebox' && ($params->get('handler') == 'tab' || $params->get('handler') == 'button') && $params->get('effect') == 'static:none')) : ?>
    <div id="pwebbox<?php echo $module_id; ?>" class="pwebbox <?php echo $position_class.' '.$module_class; ?>" dir="<?php echo $dir; ?>">

        <?php 
        if ( ($layout_type == 'accordion' AND $handler == 'button') OR ( ( ($layout_type == 'slidebox' AND !$params->get('toggler_slide')) OR $layout_type == 'modal') AND $handler == 'tab' ) ) {
            echo $toggler; 
        }
        ?>

        <?php if ($layout_type == 'modal') : ?>
            <div id="pwebbox<?php echo $module_id; ?>_modal" class="pwebbox-modal modal fade<?php if ((int)$params->get('bootstrap_version', 2) === 2) echo ' hide'; ?>" style="display:none">
        <?php endif; ?>
        <?php if($layout_type == 'bottombar') : ?>
            <div id="pwebbox<?php echo $module_id; ?>_bottombar" style="display:none;">
        <?php endif; ?>

        <div id="pwebbox<?php echo $module_id; ?>_box" class="pwebbox-box <?php echo $module_class.' '.$box_class; ?>" dir="<?php echo $dir; ?>">

            <div class="pwebbox-container-outset">
                <div id="pwebbox<?php echo $module_id; ?>_container" class="pwebbox-container<?php if ($layout_type == 'modal' AND (int)$params->get('bootstrap_version', 2) === 3) echo ' modal-dialog'; ?>">
                    <div class="pwebbox-container-inset">

                        <?php if ($layout_type == 'slidebox' AND $handler == 'tab' AND $params->get('toggler_slide')) echo $toggler; ?>

                        <?php if ($layout_type == 'accordion' OR ($layout_type == 'modal' AND !$params->get('modal_disable_close', 0))) : ?>
                        <button type="button" class="pwebbox<?php echo $module_id; ?>_toggler pweb-button-close" aria-hidden="true"<?php if ($value = $params->get('toggler_name_close')) echo ' title="'.$value.'"' ?> data-role="none">&times;</button>
                        <?php endif; ?>

                        <?php if ($layout_type == 'accordion') : ?><div class="pweb-arrow"></div><?php endif; ?>

                        <div class="pwebbox-content" id="pwebbox<?php echo $module_id; ?>_content">
                                <?php echo $plugin_html ?>
                        </div>                    

                    </div>
                    
                    <?php if ($layout_type == 'bottombar') : ?>
                        <div class="<?php echo $module_class; ?>" dir="<?php echo $dir; ?>">
                                <?php echo $bottombar_close; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
                
        <?php if ($layout_type == 'modal' || $layout_type == 'bottombar') : ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>

<script type="text/javascript">
<?php echo $script; ?>
</script>
<!-- PWebBox end -->
