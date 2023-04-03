<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.tooltip');
if (isset($this->error)) : ?>
	<div class="contact-error">
		<?php echo $this->error; ?>
	</div>
<?php endif; ?>

<?php if($this->params->get('show_email_form')): ?>
<div class="contact_form">
	<form id="contact-form" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-validate">
		<fieldset>
			<!-- <legend></legend> -->
			<p>
				<i class="muted"><?php echo JText::_('COM_CONTACT_FORM_LABEL'); ?></i>
			</p>
			<div class="clearfix"></div>

			<div class="row-fluid">
				<div class="span5">
						<?php echo $this->form->getLabel('contact_name'); ?>
						<div class="controls"><?php echo $this->form->getInput('contact_name'); ?></div>

						<?php echo $this->form->getLabel('contact_email'); ?>
						<div class="controls"><?php echo $this->form->getInput('contact_email'); ?></div>

						<?php echo $this->form->getLabel('contact_subject'); ?>
						<div class="controls"><?php echo $this->form->getInput('contact_subject'); ?></div>
				</div>

				<div class="span7">
						<?php echo $this->form->getLabel('contact_message'); ?>
						<div class="controls"><?php echo $this->form->getInput('contact_message'); ?></div>
					<?php //Dynamically load any additional fields from plugins. ?>
					<?php foreach ($this->form->getFieldsets() as $fieldset): ?>
						<?php if ($fieldset->name != 'contact'):?>
							<?php $fields = $this->form->getFieldset($fieldset->name);?>
							<?php foreach($fields as $field): ?>
								<div class="control-group">
									<?php if ($field->hidden): ?>
										<div class="controls">
											<?php echo $field->input;?>
										</div>
									<?php else:?>
										<div class="control-label">
											<?php echo $field->label; ?>
											<?php if (!$field->required && $field->type != "Spacer"): ?>
												<span class="optional"><?php echo JText::_('COM_CONTACT_OPTIONAL');?></span>
											<?php endif; ?>
										</div>
										<div class="controls"><?php echo $field->input;?></div>
									<?php endif;?>
								</div>
							<?php endforeach;?>
						<?php endif ?>
					<?php endforeach;?>
				</div>
			</div>
			<div class="controls">

				<button class="btn validate btn-primary pull-right" type="submit"><?php echo JText::_('COM_CONTACT_CONTACT_SEND'); ?></button>

				<?php if ($this->params->get('show_email_copy')) { ?>
						<div class="contact_email-copy pull-right">
							<?php echo $this->form->getLabel('contact_email_copy'); ?>
							<span class="checkbox-radio-wrap__inline"><?php echo $this->form->getInput('contact_email_copy'); ?></span>
						</div>
				<?php } ?>		

				<input type="hidden" name="option" value="com_contact" />
				<input type="hidden" name="task" value="contact.submit" />
				<input type="hidden" name="return" value="<?php echo $this->return_page;?>" />
				<input type="hidden" name="id" value="<?php echo $this->contact->slug; ?>" />
				<?php echo JHtml::_('form.token'); ?>
			</div>
		</fieldset>
	</form>
</div>
<?php endif; ?>
