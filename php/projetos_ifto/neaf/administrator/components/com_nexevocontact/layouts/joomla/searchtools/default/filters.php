<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/

$data = $displayData;

$filters = $data['view']->filterForm->getGroup('filter');
?>
<?php if ($filters) : ?>
	<?php foreach ($filters as $fieldName => $field) : ?>
		<?php if ($fieldName != 'filter_search') : ?>
			<div class="js-stools-field-filter">
				<?php echo $field->label; ?>
				<?php echo $field->input; ?>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>
