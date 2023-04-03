<?php
/**
 * @package     pwebbox
 * @version 	2.0.0
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die( 'Restricted access' );

JFormHelper::loadFieldClass('List');

/**
 * IcoMoon select list
 */
class JFormFieldPwebIcoMoon extends JFormFieldList
{
	public $type = 'PwebIcoMoon';
	
	
	protected function getInput()
	{
		$doc = JFactory::getDocument();
		
		if (is_file(JPATH_ROOT.'/media/jui/css/icomoon.css'))
		{
			$doc->addStyleSheet(JUri::root(true).'/media/mod_pwebbox/css/icomoon.css');
			$doc->addStyleDeclaration(
				'#'.$this->id.','.
				'#'.$this->id.'_chzn ul li,'.
				'#'.$this->id.'_chzn .chzn-single span'.
				'{font-size:18px;font-family:\'IcoMoon\'}'.
				'.icon-48-module{height:auto;width:auto}'
			);
			
			$html = parent::getInput();
		}
		else
		{
			JHtml::_('behavior.framework');
			$doc->addScriptDeclaration(
				'window.addEvent("domready",function(){'.
					'$$("#'.$this->formControl.'_'.$this->group.'_icon3").setProperty("disabled","disabled").each(function(el){'.
						'$$("label[for="+el.get("id")+"]").addClass("disabled").removeEvents("click");'.
					'});'.
				'});'
			);
			$doc->addStyleDeclaration(
				'label.disabled{color:#aaa}'
			);
				
			$html = '<span class="badge badge-warning">'.JText::_('MOD_PWEBBOX_ICOMOON_NOT_INSTALLED').'</span>';
			if (version_compare(JVERSION, '3.0.0') == -1)
			{
				$html = '<div class="fltlft">'.$html.'</div>';
			}
		}
                
                if ($this->element['hidden'])
                {
                    require_once 'fieldhelper.php';

                    return modPwebboxFieldHelper::generateFieldWithLabel($this->id, $html, $this->element['label'], $this->element['description'], $this->required, $this->element['pweb_showon']);
                }

		return $html;
	}

	
	protected function getOptions()
	{
		$options = array();
		
		$css = file_get_contents(JPATH_ROOT.'/media/jui/css/icomoon.css');
		
		if (preg_match_all('/\.(icon-[^:]+):before\s*\{\s*content:\s*"\\\([^"]+)";\s*\}/i', $css, $matches, PREG_SET_ORDER))
		{
			foreach ($matches as $icon) {
				$options[] = JHtml::_('select.option', $icon[2], '&#x'.$icon[2].';');
			}
		}

		// Merge any additional options in the XML definition.
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}