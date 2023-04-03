<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
?>
<a name="<?php echo("mid_" . $module->id); ?>"></a>

<div
	id="nexevocontainer_m<?php echo $module->id; ?>"
	class="nexevocontainer<?php echo $params->get("moduleclass_sfx"); ?>">

	<?php
	if (!empty($page_subheading))
		echo("<h2>" . $page_subheading . "</h2>" . PHP_EOL);

	$messageboard->Display();
	?>

	<?php if (!empty($form_text)) { ?>
	<form enctype="multipart/form-data"
			id="nexevo_form_m<?php echo $module->id; ?>"
			name="nexevo_form_m<?php echo $module->id; ?>"
			class="nexevo_form nexevoform-<?php echo $params->get("form_layout", "extended"); ?>"
			method="post"
			action="<?php echo($action); ?>">
		<!-- <?php echo($app->scope . " " . (string)$xml->version . " " . (string)$xml->license); ?> -->
		<?php echo($form_text); ?>
	</form>
	<?php } ?>

</div>

