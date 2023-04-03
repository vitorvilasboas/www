<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * marker_class: Class based on the selection of text, none, or #__
 * jicon-text, jicon-none, jicon-icon
 */
?>


<div class="contact_details">

	<?php if (($this->params->get('address_check') > 0) &&
		($this->contact->address || $this->contact->suburb  || $this->contact->state || $this->contact->country || $this->contact->postcode)) : ?>
		<div class="row-fluid">
		<div class="span6">

			<?php if ($this->params->get('address_check') > 0) : ?>
				<i class="icons-marker icon-home"></i>
			<?php endif; ?>
			<div class="contact_address">
					<?php if ($this->contact->address && $this->params->get('show_street_address')) : ?>
						<?php echo $this->contact->address; ?><br/>
					<?php endif; ?>

					<?php if ($this->contact->suburb && $this->params->get('show_suburb')) : ?>
								<?php echo $this->contact->suburb; ?><br/>
					<?php endif; ?>

					<?php if ($this->contact->state && $this->params->get('show_state')) : ?>
								<?php echo $this->contact->state; ?>
					<?php endif; ?>

					<?php if ($this->contact->postcode && $this->params->get('show_postcode')) : ?>
								<?php echo $this->contact->postcode; ?><br/>
					<?php endif; ?>

					<?php if ($this->contact->country && $this->params->get('show_country')) : ?>
							<?php echo $this->contact->country; ?>
					<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>

	<div class="span6">
		<?php if ($this->contact->email_to && $this->params->get('show_email')) : ?>

			<i class="icons-marker icon-mail"></i>
			<div class="contact_details_emailto">				
				<?php echo $this->contact->email_to; ?>
			</div>
			<div class="clearfix"></div>
		<?php endif; ?>

		<?php if ($this->contact->telephone && $this->params->get('show_telephone')) : ?>
			<i class="icons-marker icon-phone"></i>
			<div class="contact_details_telephone">
				<?php echo nl2br($this->contact->telephone); ?>
			</div>			
			<div class="clearfix"></div>
		<?php endif; ?>

		<?php if ($this->contact->fax && $this->params->get('show_fax')) : ?>
			<i class="icons-marker icon-printer"></i>
				<div class="contact_details_fax">
					<?php echo nl2br($this->contact->fax); ?>
				</div>
				<div class="clearfix"></div>
		<?php endif; ?>

		<?php if ($this->contact->mobile && $this->params->get('show_mobile')) :?>
				<i class="icons-marker icon-mobile"></i>
				<div class="contact_details_mobile">
					<?php echo nl2br($this->contact->mobile); ?>
				</div>
				<div class="clearfix"></div>
		<?php endif; ?>

		<?php if ($this->contact->webpage && $this->params->get('show_webpage')) : ?>
			<i class="icons-marker icon-list-alt"></i>
			<div class="contact_details_webpage">
					<a href="<?php echo $this->contact->webpage; ?>" target="_blank">
					<?php echo $this->contact->webpage; ?></a>
				</div>
				<div class="clearfix"></div>
		<?php endif; ?>
	</div>
	</div>
<?php if ($this->params->get('allow_vcard')) :  ?>
	      <div class="contact_vcard">
	      	<i class="muted"><?php echo JText::_('COM_CONTACT_DOWNLOAD_INFORMATION_AS');?>
		      	<a href="<?php echo JRoute::_('index.php?option=com_contact&amp;view=contact&amp;id='.$this->contact->id . '&amp;format=vcf'); ?>">
		      		  <?php echo JText::_('COM_CONTACT_VCARD');?></a>
	      	</i>
	      </div>
	       <div class="clearfix"></div>
			 <?php endif; ?>
	
</div>
