function EmailChooserChange(select)
{
	// Get the visibility state from the option class name
	var visibility = select.options[select.selectedIndex].className;
	// Get the child fieldset to be hidden
	var children = document.getElementById(select.id + "_children");
	// Set the visible state
	//children.style.visibility = visibility;
	children.style.display = visibility;
}

jQuery(document).ready(function ()
{
	var selects = document.getElementsByTagName('select');

	for (var i = 0; i < selects.length; ++i)
	{
		var select = selects[i];
		if (select.getAttribute('class') == 'nexevoemailchooser')
		{
			select.onchange(select);
		}
	}
});