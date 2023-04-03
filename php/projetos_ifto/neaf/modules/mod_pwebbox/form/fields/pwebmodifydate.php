<?php
/**
 * @package     pwebbox
 * @version 	2.0.0
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die('Restricted access');

JFormHelper::loadFieldClass('Text');

class JFormFieldPwebModifyDate extends JFormFieldText
{
    protected $type = 'PwebModifyDate';

    /**
     * Method to get the field input markup.
     *
     * @return	string	The field input markup.
     * @since	1.6
     */
    protected function getInput()
    {
        $dt = new DateTime(); 
        
        $this->value = $dt->format('Y-m-d H:i:s'); 
        
        return '<div style="display: none;">' . parent::getInput() . '</div>';
    }

}
