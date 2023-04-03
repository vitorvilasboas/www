<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_footer
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app = JFactory::getApplication();
$sitename = $app->getCfg( 'sitename' );
?>

<div class="mod-footer mod-footer__<?php echo $moduleclass_sfx ?>">
	<span class="siteName"><?php echo $sitename. ' </span>&copy; '. date('Y'); ?> | <a href="index.php/privacy-policy"><?php echo JText::_('TPL_PRIVACY_POLICY'); ?></a> <!-- <a href="index.php/terms-of-use"><?php /*echo JText::_('TPL_TERMS_OF_USE');*/ ?></a>  -->
</div>

