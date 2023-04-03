<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/

$data = $displayData;

$list = $data['view']->filterForm->getGroup('list');
?>
<?php if ($list) : ?>
	<div class="ordering-select hidden-phone">
		<?php foreach ($list as $fieldName => $field) : ?>
			<div class="js-stools-field-list">
				<?php echo $field->label; ?>
				<?php echo $field->input; ?>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
