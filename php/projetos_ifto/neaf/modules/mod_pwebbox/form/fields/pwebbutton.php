<?php
/**
 * @package     pwebbox
 * @version 	2.0.0
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

class JFormFieldPwebButton extends JFormField
{
    protected $type = 'PwebButton';

    /**
     * Method to get the field input markup.
     *
     * @return	string	The field input markup.
     * @since	1.6
     */
    protected function getInput()
    {   
        $hasTooltip = '';
        if ($this->element['description']) {
            $hasTooltip = 'hasTooltip';
        }
        
        $icon = '';
        // For J!2.5 integration.
        if (is_file(JPATH_ROOT.'/media/jui/css/icomoon.css'))
        {
            $icon = '<i class="' . $this->element['pweb_icon'] . '"></i> ';
        }
                
        
        // $this->class property doesn't exist in J!2.5 so let's use $this->element['class'].
        $html = '<button type="button" class="btn ' . $this->element['class'] . ' ' . $hasTooltip . '" id="' . $this->element['pweb_id'] . '" title="' . JText::_($this->element['description']) . '">
                    ' . $icon . '<span>' . JText::_($this->element['label']) . '</span>
                </button>';
        
        return $html;
    }

}
