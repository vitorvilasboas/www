<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
JHtml::_("bootstrap.tooltip");
JHtml::_("behavior.multiselect");
JHtml::_("formbehavior.chosen", "select");

$listOrder = $this->escape($this->state->get("list.ordering"));
$listDirn = $this->escape($this->state->get("list.direction"));
?>

<form action="<?php echo JRoute::_("index.php?option=com_nexevocontact&view=enquiries"); ?>" method="post" name="adminForm" id="adminForm">
	<?php if (!empty($this->sidebar)) : ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
		<?php else : ?>
		<div id="j-main-container">
			<?php endif; ?>
			<?php echo JLayoutHelper::render("joomla.searchtools.default", array("view" => $this)) ?>

			<?php if (empty($this->items)) : ?>
				<div class="alert alert-no-items">
					<?php echo JText::_("JGLOBAL_NO_MATCHING_RESULTS"); ?>
				</div>
			<?php else : ?>
				<table class="table table-striped">
					<thead>
					<tr>
						<th width="1%">
							<?php echo JHtml::_("grid.checkall"); ?>
						</th>
						<th>
							<?php echo JText::_("COM_NEXEVOCONTACT_FROM") ?>
						</th>
						<th width="1%">
							<?php echo JHtml::_("searchtools.sort", "JDATE", "a.date", $listDirn, $listOrder); ?>
						</th>
						<th class="hidden-phone nowrap">
							<?php echo JText::_("COM_NEXEVOCONTACT_REFERRING_FORM"); ?>
						</th>
					</tr>
					</thead>
					<tfoot>
					<tr>
						<td colspan="6">
							<?php echo $this->pagination->getListFooter(); ?>
						</td>
					</tr>
					</tfoot>
					<tbody>
					<?php foreach ($this->items as $i => $item) :
						$ordering = ($listOrder == "ordering");
						?>
						<tr class="row<?php echo $i % 2 . $item->class; ?>">

							<td class="center">
								<?php echo JHtml::_("grid.id", $i, $item->id); ?>
							</td>
							<td class="nowrap">
								<div class="pull-left sender">
									<?php foreach ($item->sender_data as $sender_data) : ?>
										<div class="small">
											<?php echo $sender_data ?>
										</div>
									<?php endforeach ?>
								</div>
							</td>
													<td class="nowrap">
								<div class="small pull-left">
									<?php echo JFactory::getDate($item->date)->format("d M Y") ?>
								</div>
							</td>
							<td class="hidden-phone nowrap">
								<div class="small pull-left">
									<?php echo $item->form ?>
								</div>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
			<?php endif; ?>
			<input type="hidden" name="boxchecked" value="0"/>
			<input type="hidden" name="task" value=""/>

			<?php echo JHtml::_("form.token"); ?>

		</div>
</form>
