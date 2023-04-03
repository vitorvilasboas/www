<?php
/**
 * @package     pwebbox
 * @version 	2.0.0
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die;
?>
<!-- PWebBox Facebook Likebox plugin -->
<div class="pwebbox-facebook-pageplugin-container" style="width:<?php echo (int) $plugin_params->get('width'); ?>px; height: <?php echo (int) $plugin_params->get('height'); ?>px;">
    <div id="pwebbox_facebook_pageplugin_<?php echo $id; ?>" class="pwebbox-facebook-pageplugin-container-in">
        <?php if (!empty($pretext)) : ?>
        <div class="pwebbox-facebook-pageplugin-pretext">
            <?php echo $pretext; ?>
        </div>
        <?php endif; ?>
        <div class="pwebbox-facebook-pageplugin-content">
            <?php echo $like_box; ?>
        </div>
    </div>
</div>
<?php if ($track_script) : ?>
    <script type="text/javascript">
        <?php echo $track_script; ?>
    </script>
<?php endif; ?>
<!-- PWebBox Facebook Likebox plugin end -->
