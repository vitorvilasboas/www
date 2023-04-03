<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
?>
<a name="cid_<?php echo $this->menu_id ?>"></a>

<div
	id="nexevocontainer_c<?php echo $this->menu_id ?>"
	class="nexevocontainer<?php echo $this->cparams->get('pageclass_sfx') ?>">
	
	<?php if ($this->cparams->get('show_page_heading')) : ?>
		<h1><?php echo $this->escape($this->cparams->get('page_heading')) ?></h1>
	<?php endif ?>

	<?php if (!empty($this->page_subheading)) : ?>
		<h2><?php echo $this->page_subheading ?></h2>
	<?php endif ?>

	<?php $this->MessageBoard->Display() ?>

	<?php if (!empty($this->FormText)) : ?>
		<form enctype="multipart/form-data"
				id="nexevo_form_c<?php echo $this->menu_id ?>"
				name="nexevo_form_c<?php echo $this->menu_id ?>"
				class="nexevo_form nexevoform-<?php echo $this->cparams->get("form_layout", "extended") ?>"
				method="post"
				action="<?php echo(JFactory::getApplication()->input->server->get("REQUEST_URI", "", "string") . "#cid_" . $this->menu_id) ?>">
			<!-- <?php echo "com_" . $this->_name . " " . (string)$this->xml->version . " " . (string)$this->xml->license ?> -->
			<?php echo $this->FormText ?>
		</form>
	<?php endif ?>
</div>
