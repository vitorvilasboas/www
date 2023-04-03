if (typeof Nexevo == 'undefined')
{
	Nexevo = {};
	Nexevo.Text =
	{
		strings: {},
		get: function (key)
		{
			return this.strings[key];
		},
		add: function (object)
		{
			for (var key in object)
			{
				this.strings[key] = object[key];
			}
			return this;
		}
	};
}


(function ()
{
	Nexevo.Text.add(
		{
			"JCANCEL": '<?php echo JText::_("JCANCEL"); ?>',
			"COM_NEXEVOCONTACT_BROWSE_FILES": '<?php echo JText::_("COM_NEXEVOCONTACT_BROWSE_FILES"); ?>',
			"COM_NEXEVOCONTACT_FAILED": '<?php echo JText::_("COM_NEXEVOCONTACT_FAILED"); ?>',
			"COM_NEXEVOCONTACT_SUCCESS": '<?php echo JText::_("COM_NEXEVOCONTACT_SUCCESS"); ?>',
			"COM_NEXEVOCONTACT_NO_RESULTS_MATCH": '<?php echo JText::_("COM_NEXEVOCONTACT_NO_RESULTS_MATCH"); ?>',
			"COM_NEXEVOCONTACT_REMOVE_ALT": '<?php echo JText::_("COM_NEXEVOCONTACT_REMOVE_ALT"); ?>',
			"COM_NEXEVOCONTACT_REMOVE_TITLE": '<?php echo JText::_("COM_NEXEVOCONTACT_REMOVE_TITLE"); ?>'
		}
	);
})();


jQuery(document).ready(function ($)
{
	jQuery('.nexevo_select').chosen(
		{
			disable_search_threshold: 10,
			allow_single_deselect: true,
			no_results_text: '<?php echo JText::_("COM_NEXEVOCONTACT_NO_RESULTS_MATCH"); ?>'
		});
});

// Called by the Reset button
function ResetNexevoControls()
{
	// Reset each dropdown to its first value
	jQuery('select.nexevo_select').each(
		function (index, value)
		{
			// Search for the first option, select it and force a refresh
			jQuery(value).find('option:first-child').prop('selected', true).end().trigger('liszt:updated');
		});
}


