jQuery(document).ready(function()
{
	var configTabs = jQuery('ul#configTabs');
	// Remove the tab
	configTabs.children('li:first').remove()
	// Remove the associated panel
	jQuery('div#JACTION_ADMIN').remove();
	// Activate the next tab
	configTabs.children('li:first').addClass('active');
	// Activate the next associated panel
	jQuery('div#adminemail').addClass('active');
});