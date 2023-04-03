var JText = [];
JText['COM_NEXEVOCONTACT_MESSAGE_DELIVERY_LBL'] = '<?php echo JText::_("COM_NEXEVOCONTACT_MESSAGE_DELIVERY_LBL"); ?>';
JText['COM_NEXEVOCONTACT_FIELDS_LBL'] = '<?php echo JText::_("COM_NEXEVOCONTACT_FIELDS_LBL"); ?>';
JText['COM_NEXEVOCONTACT_EVENTS_LBL'] = '<?php echo JText::_("COM_NEXEVOCONTACT_EVENTS_LBL"); ?>';
JText['COM_NEXEVOCONTACT_SECURITY_LBL'] = '<?php echo JText::_("COM_NEXEVOCONTACT_SECURITY_LBL"); ?>';
JText['COM_NEXEVOCONTACT_NEWSLETTER_INTEGRATION_LBL'] = '<?php echo JText::_("COM_NEXEVOCONTACT_NEWSLETTER_INTEGRATION_LBL"); ?>';

jQuery(document).ready(function ()
{
	// Only works on Isis template.
	if (!jQuery('div#status').length) return;

	// Prepare the accordion container
	var $accordion = jQuery('<div />',
		{
			id: 'nexevooptions',
			class: 'accordion',
		});
	// Attach the accordion to the insert point on the main panel
	jQuery('div#basic').append($accordion);

	// Count existing tabs
	var tabs = jQuery('ul[class="nav nav-tabs"]').children();

	tabs.each(
		function (index)
		{
			// Exclude the standard Joomla tabs, and only act on our own tabs
			if (index < 1 || index > 0) return;

			// Read the caption of the tab, we will need it while creating the accordion item
			var caption = jQuery(this).children('a').text().trim();
			// Try to translate. Fallback to the current text exactly as it is
			// Todo: move shared translations to the plugin
			var caption = JText[caption] || caption;

			// Create the accordion item
			var $accordion_inner;
			$accordion.append(
				jQuery('<div />', {class: 'accordion-group'}).append(
					jQuery('<div />', {class: 'accordion-heading'}).append(
						jQuery('<strong />').append(
							jQuery('<a />', {class: 'accordion-toggle collapsed', 'data-toggle': 'collapse', href: '#collapse' + index, 'data-parent': '#' + $accordion.attr('id'), html: caption})
						)
					),
					jQuery('<div />', {class: 'accordion-body collapse', id: 'collapse' + index}).append(
						$accordion_inner = jQuery('<div />', {class: 'accordion-inner'})
					)
				)
			);

			// Detect the panel associated to this tab
			var panel = jQuery('div.tab-pane:eq(' + index + ')');
			// Detect the fields inside this panel
			var fields = panel.find('div.control-group');
			fields.each(
				function ()
				{
					// Skip the void fields (fenvironment)
					if (!jQuery(this).text().length) return;

					// Move this field and populate the accordion item
					$accordion_inner.append(this);
				}
			);

			// Remove the tab
			jQuery(this).remove();
			// Todo: non si possono rimuovere i pannelli perche' contengono ancora i campi hidden. Nello specifico, il secondo pannello (attrib-fields)
		});
});
