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

class JFormFieldPwebOpenTag extends JFormField
{
    protected $type = 'PwebOpenTag';

    /**
     * Method to get the field input markup.
     *
     * @return	string	The field input markup.
     * @since	1.6
     */
    protected function getInput()
    {
        $tag_id = '';
        if ($this->element['pweb_id']) {
            $tag_id = 'id="' . $this->element['pweb_id'] .'"';
        }        
        
        $tag_class = '';
        // $this->class property doesn't exist in J!2.5 so let's use $this->element['class'].
        if ($this->element['class']) {
            $tag_class = 'class="pweb-container ' . $this->element['class'] .'"';
        }
        
        $header = '';
        if ($this->element['pweb_header']) {
           $header = '<h4>' . JText::_($this->element['pweb_header']) . '</h4>';
        }
        
        $description = '';
        if ($this->element['description']) {
           $description = '<div class="' . $this->element['pweb_description_class'] . '">' . JText::_($this->element['description']) . '</div>';
        }        
        
        return '<div ' . $tag_id . ' ' . $tag_class . '>' . $header . $description;
    }

}
