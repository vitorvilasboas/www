<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcuts to some parameters.
$params  = $this->item->params;
$images  = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$canEdit = $params->get('access-edit');
$user    = JFactory::getUser();
$info    = $params->get('info_block_position', 0);
JHtml::_('behavior.caption');

?>
<div class="page-item page-item__<?php echo $this->pageclass_sfx?>">

	<?php /*if ($this->params->get('show_page_heading', 1)) : ?>
		<div class="page-header">
			<h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
		</div>
	<?php endif;*/

if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && $this->item->paginationrelative)
{
	echo $this->item->pagination;
}
?>
	<?php if (!$this->print) : ?>
		<?php if ($canEdit || $params->get('show_print_icon') || $params->get('show_email_icon')) : ?>
			<div class="item_icons btn-group pull-right">
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> <i class="icon-cog"></i> <span class="caret"></span> </a>
				<?php // Note the actions class is deprecated. Use dropdown-menu instead. ?>
				<ul class="dropdown-menu actions">
					<?php if ($params->get('show_print_icon')) : ?>
						<li class="print-icon"> <?php echo JHtml::_('icon.print_popup', $this->item, $params); ?> </li>
					<?php endif; ?>
					<?php if ($params->get('show_email_icon')) : ?>
						<li class="email-icon"> <?php echo JHtml::_('icon.email', $this->item, $params); ?> </li>
					<?php endif; ?>
					<?php if ($canEdit) : ?>
						<li class="edit-icon"> <?php echo JHtml::_('icon.edit', $this->item, $params); ?> </li>
					<?php endif; ?>
				</ul>
			</div>
		<?php endif; ?>
	<?php else : ?>
		<div class="pull-right">
			<?php echo JHtml::_('icon.print_screen', $this->item, $params); ?>
		</div>
	<?php endif; ?>

	<?php if ($params->get('show_title') || $params->get('show_author')) : ?>
	<div class="item_header">
		<h2 class="item_title">
			<?php if ($this->item->state == 0): ?>
				<span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
			<?php endif; ?>
			<?php if ($params->get('show_title')) : ?>
				<?php echo $this->escape($this->item->title); ?>
			<?php endif; ?>
		</h2>
			<?php if ($params->get('show_author') && !empty($this->item->author )) : ?>

				<div class="item_createdby">
					<?php $author = $this->item->created_by_alias ? $this->item->created_by_alias : $this->item->author; ?>
					<?php if (!empty($this->item->contactid) && $params->get('link_author') == true) : ?>
					<?php
					$needle = 'index.php?option=com_contact&view=contact&id=' . $this->item->contactid;
					$menu = JFactory::getApplication()->getMenu();
					$item = $menu->getItems('link', $needle, true);
					$cntlink = !empty($item) ? $needle . '&Itemid=' . $item->id : $needle;
								?>
					<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', JHtml::_('link', JRoute::_($cntlink), $author)); ?>
					<?php else: ?>
					<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
					<?php endif; ?>
				</div>

				<?php endif; ?>
	</div>
	<?php endif; ?>

<?php $useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date')
	|| $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category')); ?>
	<?php if ($useDefList && ($info == 0 || $info == 2)) : ?>
		<div class="item_info muted">
			<dl class="item_info_dl">
			<!-- <dt class="article-info-term"><?php /*echo JText::_('COM_CONTENT_ARTICLE_INFO');*/ ?></dt>
 -->
			<?php if ($params->get('show_parent_category') && !empty($this->item->parent_slug)) : ?>
				<dd>
					<div class="item_parent-category-name">
						<?php $title = $this->escape($this->item->parent_title);
						$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_slug)).'">'.$title.'</a>';?>
						<?php if ($params->get('link_parent_category') && !empty($this->item->parent_slug)) : ?>
							<?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
						<?php else : ?>
							<?php echo JText::sprintf('COM_CONTENT_PARENT', $title); ?>
						<?php endif; ?>
					</div>
				</dd>
			<?php endif; ?>
			<?php if ($params->get('show_category')) : ?>
				<dd>
					<div class="item_category-name">
						<?php $title = $this->escape($this->item->category_title);
						$url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug)) . '">' . $title . '</a>';?>
						<?php if ($params->get('link_category') && $this->item->catslug) : ?>
							<?php echo JText::sprintf('TPL_IN', $url); ?>
						<?php else : ?>
							<?php echo JText::sprintf('TPL_IN', $title); ?>
						<?php endif; ?>
					</div>
				</dd>
			<?php endif; ?>

			<?php if ($params->get('show_publish_date')) : ?>
				<dd>
					<div class="item_published">
						<?php echo JText::sprintf('TPL_ON', JHtml::_('date', $this->item->publish_up, JText::_('DATE_FORMAT_LC3'))); ?>
					</div>
				</dd>
			<?php endif; ?>

			<?php if ($info == 0): ?>
				<?php if ($params->get('show_modify_date')) : ?>
					<dd>
						<div class="item_modified">
							<?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
						</div>
					</dd>
				<?php endif; ?>
				<?php if ($params->get('show_create_date')) : ?>
					<dd>
						<div class="item_create">
							<?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date', $this->item->created, JText::_('DATE_FORMAT_LC3'))); ?>
						</div>
					</dd>
				<?php endif; ?>

				<?php if ($params->get('show_hits')) : ?>
					<dd>
						<div class="item_hits">
							<?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $this->item->hits); ?>
						</div>
					</dd>
				<?php endif; ?>
			<?php endif; ?>
			</dl>
		</div>
	<?php endif; ?>

	<?php if (!$params->get('show_intro')) : echo $this->item->event->afterDisplayTitle; endif; ?>
	<?php echo $this->item->event->beforeDisplayContent; ?>

	<?php if (isset($urls) && ((!empty($urls->urls_position) && ($urls->urls_position == '0')) || ($params->get('urls_position') == '0' && empty($urls->urls_position)))
		|| (empty($urls->urls_position) && (!$params->get('urls_position')))) : ?>
	<?php echo $this->loadTemplate('links'); ?>
	<?php endif; ?>

	<?php if ($params->get('access-view')):?>


	<!-- Article Image -->	
	<?php  if (isset($images->image_fulltext) and !empty($images->image_fulltext)) : ?>
		<?php  if (isset($images->image_fulltext) and !empty($images->image_fulltext)) : ?>

		<?php $imgfloat = (empty($images->float_fulltext)) ? $params->get('float_fulltext') : $images->float_fulltext; ?>
			<div class="page-gallery_img">
				<div class="item_img img-full img-full__<?php echo htmlspecialchars($imgfloat); ?> span5">
					<a class="touchGalleryLink zoom" href="<?php echo htmlspecialchars($images->image_fulltext); ?>">
						<span class="zoom-bg"></span>
				          <span class="zoom-icon"></span>
						<img
							<?php if ($images->image_fulltext_caption):
								echo 'class="caption"'.' title="' .htmlspecialchars($images->image_fulltext_caption) .'"';
							endif; ?>
							src="<?php echo htmlspecialchars($images->image_fulltext); ?>" alt="<?php echo htmlspecialchars($images->image_fulltext_alt); ?>"/>
					</a> 
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>		

	<?php
	if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && !$this->item->paginationrelative):
		echo $this->item->pagination;
	endif;
	?>
	<?php if (isset ($this->item->toc)) :
		echo $this->item->toc;
	endif; ?>

	<div class="item_fulltext"><?php echo $this->item->text; ?></div>

	<?php if ($useDefList && ($info == 1 || $info == 2)) : ?>
		<div class="item_info muted">
			<dl class="item_info_dl">
			<!-- <dt class="article-info-term"><?php/* echo JText::_('COM_CONTENT_ARTICLE_INFO');*/ ?></dt> -->

			<?php if ($info == 1): ?>
				<?php if ($params->get('show_parent_category') && !empty($this->item->parent_slug)) : ?>
					<dd>
						<div class="item_parent-category-name">
							<?php	$title = $this->escape($this->item->parent_title);
							$url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_slug)) . '">' . $title . '</a>';?>
							<?php if ($params->get('link_parent_category') && $this->item->parent_slug) : ?>
								<?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
							<?php else : ?>
								<?php echo JText::sprintf('COM_CONTENT_PARENT', $title); ?>
							<?php endif; ?>
						</div>
					</dd>
				<?php endif; ?>
				<?php if ($params->get('show_category')) : ?>
					<dd>
						<div class="item_category-name">
							<?php 	$title = $this->escape($this->item->category_title);
							$url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug)) . '">' . $title . '</a>';?>
							<?php if ($params->get('link_category') && $this->item->catslug) : ?>
								<?php echo JText::sprintf('TPL_IN', $url); ?>
							<?php else : ?>
								<?php echo JText::sprintf('TPL_IN', $title); ?>
							<?php endif; ?>
						</div>
					</dd>
				<?php endif; ?>
				<?php if ($params->get('show_publish_date')) : ?>
					<dd>
						<div class="item_published">
							<?php echo JText::sprintf('TPL_ON', JHtml::_('date', $this->item->publish_up, JText::_('DATE_FORMAT_LC3'))); ?>
						</div>
					</dd>
				<?php endif; ?>
			<?php endif; ?>

			<?php if ($params->get('show_create_date')) : ?>
				<dd>
					<div class="item_create"><?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
					</div>
				</dd>
			<?php endif; ?>
			<?php if ($params->get('show_modify_date')) : ?>
				<dd>
					<div class="item_modified"><?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
					</div>
				</dd>
			<?php endif; ?>
			<?php if ($params->get('show_hits')) : ?>
				<dd>
					<div class="item_hits">
						<?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $this->item->hits); ?>
					</div>
				</dd>
			<?php endif; ?>
			</dl>
		</div>
	<?php endif; ?>

	<?php
if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && !$this->item->paginationrelative):
	echo $this->item->pagination;
?>
	<?php endif; ?>
	<?php if (isset($urls) && ((!empty($urls->urls_position) && ($urls->urls_position == '1')) || ($params->get('urls_position') == '1'))): ?>
	<?php echo $this->loadTemplate('links'); ?>
	<?php endif; ?>
	<?php //optional teaser intro text for guests ?>
	<?php elseif ($params->get('show_noauth') == true && $user->get('guest')) : ?>
	<?php echo $this->item->introtext; ?>
	<?php //Optional link to let them register to see the whole article. ?>
	<?php if ($params->get('show_readmore') && $this->item->fulltext != null) :
		$link1 = JRoute::_('index.php?option=com_users&view=login');
		$link = new JURI($link1);?>
	<div class="item_readmore">
		<a href="<?php echo $link; ?>" class="btn btn-info readmore">
		<?php $attribs = json_decode($this->item->attribs); ?>
		<?php
		if ($attribs->alternative_readmore == null) :
			echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
		elseif ($readmore = $this->item->alternative_readmore) :
			echo $readmore;
			if ($params->get('show_readmore_title', 0) != 0) :
				echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
			endif;
		elseif ($params->get('show_readmore_title', 0) == 0) :
			echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
		else :
			echo JText::_('COM_CONTENT_READ_MORE');
			echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
		endif; ?>
		</a>
	</div>
	<?php endif; ?>
	<?php endif; ?>
	<?php
if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && $this->item->paginationrelative) :
	echo $this->item->pagination;
?>
	<?php endif; ?>
	<?php echo $this->item->event->afterDisplayContent; ?> </div>
