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

class JFormFieldPwebButtonLink extends JFormField
{
    protected $type = 'PwebButtonLink';

    /**
     * Method to get the field input markup.
     *
     * @return	string	The field input markup.
     * @since	1.6
     */
    protected function getInput()
    {   
        // $this->class property doesn't exist in J!2.5 so let's use $this->element['class'].
        $html = '<a href="' . $this->element['pweb_url'] . '" class="btn btn-warning ' . $this->element['class'] . '" target="_blank">' . JText::_($this->element['label']) . '</a>';
        
        return $html;
    }

}
