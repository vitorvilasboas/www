<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$class = 'first';

JHtml::_('bootstrap.tooltip');

if (count($this->children[$this->category->id]) > 0 && $this->maxLevel != 0) : ?>

	<?php foreach($this->children[$this->category->id] as $id => $child) : ?>
		<?php
		if ($this->params->get('show_empty_categories') || $child->numitems || count($child->getChildren())) :
			if (!isset($this->children[$this->category->id][$id + 1])) :
				$class = 'last';
			endif;
		?>
		<div class="<?php echo $class; ?> span4 category_child">
			<?php $class = ''; ?>
			
			<?php 
				$child_params = explode('"', $child->params);
				$subcatImg = str_replace('\\', '', $child_params[7]);

			?>
			<?php if($subcatImg): ?>
				<div class="item_img category_item">
					<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($child->id));?>">
						<img src="<?php echo JURI::base() . $subcatImg ?>" alt="">
					</a>
				</div>
			<?php endif;?>

			<p class="category_title">
				<b>
					<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($child->id));?>">
						<?php echo $this->escape($child->title); ?>
					</a>
						<?php if ( $this->params->get('show_cat_num_articles', 1)) : ?>
							<span class="badge badge-info tip hasTooltip" title="<?php echo JText::_('COM_CONTENT_NUM_ITEMS'); ?>">
								<?php echo $child->getNumItems(true); ?>
							</span>
						<?php endif; ?>
					
						<?php if (count($child->getChildren()) > 0) : ?>
						<a href="#category-<?php echo $child->id;?>" data-toggle="collapse" data-toggle="button" class="btn btn-mini pull-right"><i class="icon-plus"></i></a>
					<?php endif;?>
				</b>
			</p>

			<?php if ($this->params->get('show_subcat_desc') == 1) :?>
				<?php if ($child->description) : ?>
					<div class="category_desc">
						<?php echo JHtml::_('content.prepare', $child->description, '', 'com_content.category'); ?>
					</div>
				<?php endif; ?>
       <?php endif; ?>

			<?php if (count($child->getChildren()) > 0) :?>
			<div class="collapse fade" id="category-<?php echo $child->id;?>">
				<?php
				$this->children[$child->id] = $child->getChildren();
				$this->category = $child;
				$this->maxLevel--;
				if ($this->maxLevel != 0) :
					echo $this->loadTemplate('children');
				endif;
				$this->category = $child->getParent();
				$this->maxLevel++;
				?>
			</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>
	<?php endforeach; ?>

<?php endif;
