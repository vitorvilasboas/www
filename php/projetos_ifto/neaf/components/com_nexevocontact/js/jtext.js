jQuery(document).ready(function ($)
{

	jQuery('.nexevo_select').chosen(
		{
			disable_search_threshold:10,
			allow_single_deselect:true,
			no_results_text:'<?php echo JText::_("COM_NEXEVOCONTACT_NO_RESULTS_MATCH"); ?>'
		});
});

