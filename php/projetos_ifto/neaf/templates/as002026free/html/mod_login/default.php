<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_login
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('bootstrap.tooltip');

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
?>

<div class="mod-login mod-login__<?php echo $moduleclass_sfx ?>">
	<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form" class="">
		<?php if ($params->get('pretext')): ?>
			<div class="mod-login_pretext">
				<p><?php echo $params->get('pretext'); ?></p>
			</div>
		<?php endif; ?>
			<div class="mod-login_userdata">

							<input class="inputbox mod-login_username" type="text" name="username" tabindex="1" size="18" placeholder="<?php echo JText::_('MOD_LOGIN_VALUE_USERNAME') ?>" />
							
							<input class="inputbox mod-login_passwd" type="password" name="password" tabindex="2" size="18" placeholder="<?php echo JText::_('JGLOBAL_PASSWORD') ?>" />

				<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
					<label for="mod-login_remember" class="checkbox"><?php echo JText::_('MOD_LOGIN_REMEMBER_ME') ?>
						<input class="mod-login_remember" type="checkbox" name="remember" value="yes"/>
					</label> 
				<?php endif; ?>

						<div class="mod-login_submit">
							<button type="submit" tabindex="3" name="Submit" class="btn btn-primary"><?php echo JText::_('JLOGIN') ?></button>
						</div>

				<?php
					$usersConfig = JComponentHelper::getParams('com_users'); ?>
					
						<ul class="unstyled">
							<li>
								<a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>" class="" title="<?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_USERNAME'); ?>"><?php echo JText::_('TPL_REMIND'); ?></a></a>
							</li>
							<li>
								<a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>" class="" title="<?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_PASSWORD'); ?>"><?php echo JText::_('TPL_RESET'); ?></a></a>
							</li>
							<?php if ($usersConfig->get('allowUserRegistration')) : ?>
							<li>
								<a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>"><?php echo JText::_('MOD_LOGIN_REGISTER'); ?></a>
							</li>
							<?php endif; ?>
						</ul>
				
				<input type="hidden" name="option" value="com_users" />
				<input type="hidden" name="task" value="user.login" />
				<input type="hidden" name="return" value="<?php echo $return; ?>" />
				<?php echo JHtml::_('form.token'); ?>
			</div>
		<?php if ($params->get('posttext')): ?>
			<div class="mod-login_posttext">
				<p><?php echo $params->get('posttext'); ?></p>
			</div>
		<?php endif; ?>
	</form>
</div>
