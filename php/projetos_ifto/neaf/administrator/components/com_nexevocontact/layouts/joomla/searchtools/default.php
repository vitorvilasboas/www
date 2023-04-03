<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/

$data = $displayData;


$data['options'] = !empty($data['options']) ? $data['options'] : array();


$customOptions = array(
	'filtersHidden'       => isset($data['options']['filtersHidden']) ? $data['options']['filtersHidden'] : empty($data['view']->activeFilters),
	'defaultLimit'        => isset($data['options']['defaultLimit']) ? $data['options']['defaultLimit'] : JFactory::getConfig()->get("list_limit", 20),
	'searchFieldSelector' => '#filter_search',
	'orderFieldSelector'  => '#list_fullordering'
);

$data['options'] = array_unique(array_merge($customOptions, $data['options']));

$formSelector = !empty($data['options']['formSelector']) ? $data['options']['formSelector'] : '#adminForm';

JHtml::_('searchtools.form', $formSelector, $data['options']);

?>
<div class="js-stools clearfix">
	<div class="clearfix">
		<div class="js-stools-container-bar">
			<?php echo JLayoutHelper::render('joomla.searchtools.default.bar', $data); ?>
		</div>
		<div class="js-stools-container-list hidden-phone hidden-tablet">
			<?php echo JLayoutHelper::render('joomla.searchtools.default.list', $data); ?>
		</div>
	</div>
	<!-- Filters div -->
	<div class="js-stools-container-filters hidden-phone clearfix">
		<?php echo JLayoutHelper::render('joomla.searchtools.default.filters', $data); ?>
	</div>
</div>