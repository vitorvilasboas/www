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

class JFormFieldPwebButtonConfig extends JFormField
{
    protected $type = 'PwebButtonConfig';

    /**
     * Method to get the field input markup.
     *
     * @return	string	The field input markup.
     * @since	1.6
     */
    protected function getInput()
    {   
        $icon1 = '';
        $icon2 = '';
        // For J!2.5 integration.
        if (is_file(JPATH_ROOT.'/media/jui/css/icomoon.css'))
        {
            $icon1 = '<i class="icon-cog"></i> ';
            $icon2 = '  <i class="icon-chevron-up"></i><i class="icon-chevron-down"></i>';
        }
        
        // $this->class property doesn't exist in J!2.5 so let's use $this->element['class'].
        $html = '<button type="button" class="btn pweb-button-toggler ' . $this->element['class'] . '" data-target-id="#' . $this->element['pweb_target_id'] . '">
                    ' . $icon1 . '<span>' . JText::_($this->element['label']) . '</span>' . $icon2 .
                '</button>';
        
        return $html;
    }

}
