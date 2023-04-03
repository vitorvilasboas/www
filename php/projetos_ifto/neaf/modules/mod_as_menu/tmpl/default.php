<?php
/*******************************************************************************************/
/*
/*        Web: http://www.asdesigning.com
/*        Web: http://www.astemplates.com
/*        License: GNU/GPL
/*
/*******************************************************************************************/

// No direct access.
defined('_JEXEC') or die;
require __DIR__ . '/styles.php';

?>

<!--[if (gt IE 9)|!(IE)]><!-->
<script type="text/javascript">

    jQuery(function(){
        jQuery('<?php if($module_id) echo '#menu_'.$module_id; ?>.as-menu').mobileMenu({});
    })

</script>
<!--<![endif]-->

<div id="as-menu" class="menu-wrapper">
	<?php
		$class_sfx	= htmlspecialchars($params->get('class_sfx'));	
		$tagid = '';
        if ($module_id) 
            $tagid = ' id="menu_'.$module_id.'"';
    ?>

    <ul class="as-menu <?php echo $class_sfx; ?>" <?php echo $tagid; ?> >
    
    <?php
    foreach ($list as $i => &$item) :
        $class = 'item-'.$item->id;
        if ($item->id == $active_id) 
		{
            $class .= ' current';
        }
    
        if (in_array($item->id, $path)) 
		{
            $class .= ' active';
        }
        elseif ($item->type == 'alias') 
		{
            $aliasToId = $item->params->get('aliasoptions');
            if (count($path) > 0 && $aliasToId == $path[count($path)-1]) 
			{
                $class .= ' active';
            }
            elseif (in_array($aliasToId, $path)) 
			{
                $class .= ' alias-parent-active';
            }
        }
    
        if ($item->deeper) 
		{
            $class .= ' deeper';
        }
    
        if ($item->parent) 
		{
            $class .= ' parent';
        }
    
        if (!empty($class)) 
		{
            $class = ' class="'.trim($class) .'"';
        }
    
        echo '<li'.$class.'>';
    
        switch ($item->type) :
            case 'separator':
            case 'url':
            case 'component':
                require JModuleHelper::getLayoutPath('mod_as_menu', 'default_'.$item->type);
                break;
    
            default:
                require JModuleHelper::getLayoutPath('mod_as_menu', 'default_url');
                break;
        endswitch;
    
        if ($item->deeper) 
		{
            echo '<ul>';
        }
        elseif ($item->shallower) 
		{
            echo '</li>';
            echo str_repeat('</ul></li>', $item->level_diff);
        }
        else 
		{
            echo '</li>';
        }
    endforeach;
    ?>
    </ul>
</div>


<script type="text/javascript">
	jQuery(function(){
		jQuery('ul.as-menu').asmenu({
			hoverClass:    'asHover',         
		    pathClass:     'overideThisToUse',
		    pathLevels:    1,    
		    delay:         <?php echo $params->get('menu_delay'); ?>, 
		    speed:         '<?php echo $params->get("menu_speed"); ?>',   
		    autoArrows:    false, 
		    dropShadows:   true, 
		    disableHI:     false, 
		    onInit:        function(){},
		    onBeforeShow:  function(){},
		    onShow:        function(){},
		    onHide:        function(){}
		});
	});
</script>