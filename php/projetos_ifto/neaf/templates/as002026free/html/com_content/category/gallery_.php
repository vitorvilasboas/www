<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');

JHtml::_('behavior.caption');
?>
<div class="page-gallery page-gallery__<?php echo $this->pageclass_sfx;?>">

	<?php if ($this->params->get('show_page_heading', 1)) : ?>
	<div class="page_header">
		<h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
	</div>
	<?php endif; ?>

	<?php if ($this->params->get('show_category_title', 1) or $this->params->get('page_subheading')) : ?>
		<div class="category_title">
			<h2> <?php echo $this->escape($this->params->get('page_subheading')); ?>
				<?php if ($this->params->get('show_category_title')) : ?>
				<span class="subheading-category"><?php echo $this->category->title;?></span>
				<?php endif; ?>
			</h2>
		</div>
	<?php endif; ?>

	<?php if ($this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
	<div class="category_desc">
		<?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
			<img src="<?php echo $this->category->getParams()->get('image'); ?>"/>
		<?php endif; ?>
		<?php if ($this->params->get('show_description') && $this->category->description) : ?>
			<?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
		<?php endif; ?>
		<div class="clr"></div>
	</div>
	<?php endif; ?>

  <!-- Filter -->
  <?php 
    $galleryCategories = array();
    foreach ($this->intro_items as $key => &$item){
        $categoryTitle = strtolower(str_replace(" ","_",$item->category_title));
        $galleryCategories[] = $categoryTitle;
    }; 

    $galleryCategories = array_unique($galleryCategories);
  ?>

  <?php if((!empty($this->lead_items) || (!empty($this->intro_items))) &&  $this->params->get('show_filter')): ?>
    <div class="well">
      <div class="row">
        <div class="filters span10">

          <ul id="filters" class="unstyled">
            <li><b><?php echo JText::_('TPL_COM_CONTENT_GALLERY_FILTER_BY_CATEGORY'); ?>:</b></li>
            <li><a href="#" data-filter="*" class="selected"><?php echo JText::_('TPL_COM_CONTENT_GALLERY_FILTER_SHOW_ALL'); ?></a></li>
            <?php foreach ($galleryCategories as $key => $value) : ?>
              <li><a class="" href="#"data-filter=".<?php echo $value; ?>"><?php echo ucwords(str_replace("_"," ",$value)); ?></a></li>
            <?php endforeach; ?>
          </ul>
          
          <div class="clearfix"></div>
        </div>
      </div>
    </div>	
  <?php endif; ?>

	<?php $leadingcount = 0; ?>
	<?php if (!empty($this->lead_items)) : ?>
	<div class="items-leading">
		<?php foreach ($this->lead_items as &$item) : ?>
		<div class="leading-<?php echo $leadingcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?>">
			<?php
				$this->item = &$item;
				echo $this->loadTemplate('item');
			?>
		</div>
		<div class="clearfix"></div>
		<?php
			$leadingcount++;
		?>
		<?php endforeach; ?>
	</div><!-- end items-leading -->
	<div class="clearfix"></div>
	<?php endif; ?>


  <?php
    $introcount = (count($this->intro_items));
    $counter = 0;
  ?>

  <?php if (!empty($this->intro_items)) : ?>
  <?php $row = $counter / $this->columns; ?>
  <?php 
    $galleryContainerId = "";
    $galleryContainerClass = "singleColumn";
    if($this->params->get('show_filter')){
       $galleryContainerId = "isotopeContainer";
       $galleryContainerClass = "thumbnails";
    }
   ?>
  <ul id="<?php echo $galleryContainerId; ?>" class="items-row cols-<?php echo (int) $this->columns;?> <?php echo $galleryContainerClass /*'row-'.$row;*/; ?>">

  <?php foreach ($this->intro_items as $key => &$item) : ?>
  <?php
    $key = ($key - $leadingcount) + 1;
    $rowcount = (((int) $key - 1) % (int) $this->columns) + 1;

    if ($rowcount == 1) : 
    ?>
    
    <?php endif; ?>
      <li class="item span<?php echo round((12 / $this->columns)) ;?> <?php echo strtolower(str_replace(" ","_",$item->category_title)); ?>">
          <?php
          $this->item = &$item;
          echo $this->loadTemplate('item');
        ?>
        <?php $counter++; ?>
        <div class="clearfix"></div>
      </li><!-- end span -->
      <?php if (($rowcount == $this->columns) or ($counter == $introcount)): ?>     
    
      <?php endif; ?>
  <?php endforeach; ?>
  </ul><!-- end row -->
  <?php endif; ?>
	
	<?php if (!empty($this->link_items)) : ?>
	<div class="items-more">
	<?php echo $this->loadTemplate('links'); ?>
	</div>
	<?php endif; ?>

	<?php if (($this->params->def('show_pagination', 1) == 1  || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
	
	<div class="pagination">
		<?php  if ($this->params->def('show_pagination_results', 1)) : ?>
		<p class="counter pull-right"> <?php echo $this->pagination->getPagesCounter(); ?> </p>
		<?php endif; ?>
		<?php echo $this->pagination->getPagesLinks(); ?> </div>
	<?php  endif; ?>
</div>


<script type="text/javascript">
  jQuery(document).ready(function() {
  (function($){ 
   $(window).load(function(){

    $(window).resize(function(){
      $windowWidth = $(window).width();
    });

    var $container = $('#isotopeContainer');

    $container.isotope({
      animationEngine: 'best-available',
      animationOptions: {
          queue: false,
          duration: 800
        },
        containerClass : 'isotope',
        containerStyle: {
          position: 'relative',
          overflow: 'hidden'
        },
        hiddenClass : 'isotope-hidden',
        itemClass : 'isotope-item',
        itemPositionDataEnabled: false,
         layoutMode : 'fitRows',
        resizable: true,
        resizesContainer : true,
        sortBy : 'title',
        sortAscending : true,
        transformsEnabled: !$.browser.opera // disable transforms in Opera
    });

    // filter items when filter link is clicked
    $('#filters a').click(function(){
      var selector = $(this).attr('data-filter');
      $container.isotope({ filter: selector });
      return false;
    });

    var $optionSets = $('#filters li'),
        $optionLinks = $optionSets.find('a');

        $optionLinks.click(function(){
            var $this = $(this);
            // don't proceed if already selected
            if ( $this.hasClass('selected') ) {
              return false;
            }
            var $optionSet = $this.parents('#filters');
            $optionSet.find('.selected').removeClass('selected');
            $this.addClass('selected');
      
            // make option object dynamically, i.e. { filter: '.my-filter-class' }
            var options = {},
                key = $optionSet.attr('data-option-key'),
                value = $this.attr('data-option-value');
            // parse 'false' as false boolean
            value = value === 'false' ? false : value;
            options[ key ] = value;
            if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
              // changes in layout modes need extra logic
              changeLayoutMode( $this, options )
            } else {
              // otherwise, apply new options
              $container.isotope( options );
            }
            
            return false;
        });
  });
})(jQuery);
}); 
</script>