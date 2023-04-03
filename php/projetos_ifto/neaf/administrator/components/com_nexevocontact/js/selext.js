function SelextSelectChange(select, prefix)
{

	var text = document.getElementById(prefix + '_text');


	if (select.options[select.selectedIndex].value == 'auto')
	{

		text.value = '';

		text.style.display = 'none';
	}
	else
	{

		text.style.display = 'inline';
	}
}


jQuery(document).ready(function ()
{
	jQuery('select.selext').each(
		function (index, value)
		{
			this.onchange();
		});
});
