<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$images = json_decode($item->images);

$item_heading = $params->get('item_heading', 'h3');
?>


<?php /** For Intro Image **/ if (isset($images->image_intro) and !empty($images->image_intro)) : ?>
   <?php $imgfloat = (empty($images->float_intro)) ? $item->params->get('float_intro') : $images->float_intro; ?>
   <div class="img-intro-<?php echo htmlspecialchars($imgfloat); ?>">      
      <a href="<?php echo $item->link; ?>">      
         <img
         <?php if ($images->image_intro_caption):
            echo 'class="caption"'.' title="' .htmlspecialchars($images->image_intro_caption) .'"';
         endif; ?>
         src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"/>      
      </a>
   </div>
<?php /** End For Intro Image **/endif; ?>

<?php if ($params->get('item_title')) : ?>
	<div class="newsflash-title<?php echo $params->get('header_class'); ?>">
        <div class="newsflash-title-wrapper">
        <<?php echo $item_heading; ?>>
        <?php if ($params->get('link_titles') && $item->link != '') : ?>
            <a href="<?php echo $item->link;?>">
                <?php echo $item->title;?></a>
        <?php else : ?>
            <?php echo $item->title; ?>
        <?php endif; ?>
        </<?php echo $item_heading; ?>>
        </div>
    </div>
<?php endif; ?>

<?php if (!$params->get('intro_only')) :
	echo $item->afterDisplayTitle;
endif; ?>

<?php echo $item->beforeDisplayContent; ?>

<?php echo $item->introtext; ?>

<?php if (isset($item->link) && $item->readmore != 0 && $params->get('readmore')) :
	echo '<a class="readmore" href="'.$item->link.'">'.$item->linkText.'</a>';
endif; ?>
