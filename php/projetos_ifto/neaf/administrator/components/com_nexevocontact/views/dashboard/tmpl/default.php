<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
	$forum = "http://www.nexevo.in";
	$rating = '#';
	$download = "http://www.nexevo.in/demo";
	$documentation = "http://www.nexevo.in/Nexevo-contact-documentaion.html";

	$com_name = JFactory::getApplication()->input->get("option", "");
	$name = substr($com_name, 4);
	$xml = JFactory::getXML(JPATH_ADMINISTRATOR . '/components/' . $com_name . "/" . $name . '.xml');

	$prefix = strtoupper($com_name) . "_";
	$language = JFactory::getLanguage();
	$language->load($com_name . '.sys');   
	$language->load("mod_quickicon");  
	$freesoftware = str_replace("licenses/gpl-3.0.html", "copyleft/gpl.html", sprintf($language->_('JGLOBAL_ISFREESOFTWARE'), JText::_("COM_NEXEVOCONTACT") . " " . (string)$xml->version));
	$s_description = sprintf($language->_($prefix . 'SHORTDESCRIPTION'),
	"<a href=\"index.php?option=com_menus&view=items\">" . $language->_('MOD_QUICKICON_MENU_MANAGER') . '</a>',
	"<a href=\"index.php?option=com_modules\">" . $language->_('MOD_QUICKICON_MODULE_MANAGER') . '</a>');

	$direction = intval(JFactory::getLanguage()->get('rtl', 0));
	$left  = $direction ? "right" : "left";
	$right = $direction ? "left" : "right";
$tag = str_replace("-", "_", $language->get("tag"));
if ($tag == "sr-YU")
{
	$tag = "sr_RS@latin";
}
$language_url = 'https://www.transifex.com/projects' . $tag . '/';
?>
<div id="cpanel">
     <div style="float:left;padding:5px;">
        <div class="icon">
                <a href="index.php?option=com_menus&view=items">
                    <img alt="<?php echo JText::_('MOD_QUICKICON_MENU_MANAGER'); ?>" src="../media/com_nexevocontact/images/menu.png" />
                    <span><?php echo JText::_('MOD_QUICKICON_MENU_MANAGER'); ?></span>
                </a>
				
        </div>
    </div>
	<div style="float:left;padding:5px;">
        <div class="icon">
				<a href="index.php?option=com_modules">
					<img alt="<?php echo JText::_('MOD_QUICKICON_MODULE_MANAGER'); ?>" src="../media/com_nexevocontact/images/modulem.png" />
					<span><?php echo JText::_('MOD_QUICKICON_MODULE_MANAGER'); ?></span>
				</a>
		</div>
    </div>			
    <div style="float:left;padding:5px;">
        <div class="icon">
           
			 <a href="index.php?option=com_nexevocontact&view=enquiries">
                    <img alt="<?php echo JText::_('COM_NEXEVOCONTACT_SUBMENU_ENQUIRIES'); ?>" src="../media/com_nexevocontact/images/lead.png" />
                    <span><?php echo JText::_('COM_NEXEVOCONTACT_SUBMENU_ENQUIRIES'); ?></span>
             </a>
        </div>
    </div>
<div id="tabs" style="float:right; width:40%;">

    <?php
    $options = array(
        'onActive' => 'function(title, description){
        description.setStyle("display", "block");
        title.addClass("open").removeClass("closed");
    }',
        'onBackground' => 'function(title, description){
        description.setStyle("display", "none");
        title.addClass("closed").removeClass("open");
    }',
        'startOffset' => 0, 
        'useCookie' => true, 
        'startTransition' => 1,
    );
    ?>
    <?php echo JHtml::_('sliders.start', 'slider_group_id', $options); ?>
    <?php echo JHtml::_('sliders.panel', JText::_('COM_NEXEVOCONTACT_SLIDER_TITLE_ABOUT'), 'slider_1_id'); ?>
    <div class="cw-slider">
           
            <?php echo JText::_('COM_NEXEVOCONTACT_DESC'); ?>
    </div>

    <?php echo JHtml::_('sliders.panel', JText::_('COM_NEXEVOCONTACT_FIELD_RELEASE_VERSION_LABEL'), 'slider_2_id'); ?>
    <div class="cw-slider">
        <?php echo JText::_('COM_NEXEVOCONTACT_SUPPORT_DESCRIPTION'); ?>
    </div>
    
    <?php echo JHtml::_('sliders.panel', JText::_('COM_NEXEVOCONTACT_SLIDER_TITLE_VERSION'), 'slider_3_id'); ?>
	 <?php
		$version = "Joomla 3.0+";
		$download = "http://www.nexevo.in/demo";
		$documentation = "http://www.nexevo.in/Nexevo-contact-documentaion.html";
        $date = "Sep 2015"
    ?>
    <div class="cw-slider">
		<div class="cw-module">
            <h3> <?php echo JText::_('COM_NEXEVOCONTACT_RELEASE_TITLE'); ?> </h3>
            <ul class="cw_module">
                <li>  <?php echo JText::_('COM_NEXEVOCONTACT_FIELD_DOCUMENTATION'); ?>  <strong><?php echo $documentation; ?> </strong></li>
                <li>   <?php echo JText::_('COM_NEXEVOCONTACT_FIELD_RELEASE_VERSION_LABEL'); ?> <strong> <?php echo $version?> </strong></li>
                <li>  <?php echo JText::_('COM_CWCONTACT_FIELD_RELEASE_DATE_LABEL'); ?>  <strong> <?php echo $date; ?>  </strong></li>
            </ul>
        </div>
    </div>

    <?php echo JHtml::_('sliders.end'); ?>       
</div>
    <div class="clr"></div>
</div>
