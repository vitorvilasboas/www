<?php
/**
 * Articles Newsflash Advanced
 *
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 
 * 
*/
defined('_JEXEC') or die;
	$item_heading = $params->get('item_heading', 'h4');
	$item_images = json_decode($item->images);
?>

<!-- Item title -->
	<?php if ($params->get('item_title')) : ?>
		<<?php echo $item_heading; ?> class="item_title item_title__<?php echo $params->get('moduleclass_sfx'); ?>">
		<?php if ($params->get('link_titles') && $item->link != '') : ?>
			<a href="<?php echo $item->link;?>">
				<?php echo $item->title;?></a>
		<?php else : ?>
			<?php echo $item->title; ?>
		<?php endif; ?>
		</<?php echo $item_heading; ?>>
	<?php endif; ?>



<div class="item_content">
	
	<!-- Intro Image -->
    <?php if ($params->get('intro_image')): ?>
        <?php  if (isset($item_images->image_intro) and !empty($item_images->image_intro)) : ?>
        <?php $imgfloat = (empty($item_images->float_intro)) ? $params->get('float_intro') : $item_images->float_intro; ?>
            <div class="item_img img-intro img-intro__<?php echo htmlspecialchars($params->get('intro_image_align')); ?>"> 
                <a href="<?php echo $item->link;?>">
                <img
                <?php if ($item_images->image_intro_caption):
                    echo 'class="caption"'.' title="' .htmlspecialchars($item_images->image_intro_caption) .'"';
                endif; ?>
                src="<?php echo htmlspecialchars($item_images->image_intro); ?>" alt="<?php echo htmlspecialchars($item_images->image_intro_alt); ?>"/></a> 
            </div>
        <?php endif; ?>
    <?php endif; ?>
    
	<?php if (!$item_images->image_intro && $item_images->image_intro_caption): ?>
       <i class="caption-ico <?php echo htmlspecialchars($item_images->image_intro_caption) ?>"></i>
    <?php endif; ?>    
	
	<!-- Introtext -->
    <?php if ($params->get('item_Introtext')) : ?>
		<div class="item_introtext"><?php echo $item->introtext; ?></div>
	<?php endif; ?>
	
	<!-- Read More link -->
	<?php if (isset($item->link) && $item->readmore != 0 && $params->get('readmore')) :
		$readMoreText = JText::_('MOD_ARTICLES_NEWS_READMORE');
			if ($item->alternative_readmore){
				$readMoreText = $item->alternative_readmore;
			}
		echo '<a class="btn btn-info readmore" href="'.$item->link.'"><span>'. $readMoreText .'</span></a>';
	endif; ?>
</div>

<div class="clearfix"></div>