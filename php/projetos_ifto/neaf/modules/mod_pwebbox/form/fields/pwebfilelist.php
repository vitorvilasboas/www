<?php
/**
 * @package     pwebbox
 * @version 	2.0.0
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die('Restricted access');

JFormHelper::loadFieldClass('FileList');

class JFormFieldPwebFileList extends JFormFieldFileList
{
    public $type = 'PwebFileList';

    /**
     * Method to get the field input markup.
     *
     * @return	string	The field input markup.
     * @since	1.6
     */
    protected function getInput()
    {   
        $input = parent::getInput();
        
        if ($this->element['hidden'])
        {
            require_once 'fieldhelper.php';
            
            return modPwebboxFieldHelper::generateFieldWithLabel($this->id, $input, $this->element['label'], $this->element['description'], $this->required, $this->element['pweb_showon']);
        }
        
        return $input;        
    }

}
