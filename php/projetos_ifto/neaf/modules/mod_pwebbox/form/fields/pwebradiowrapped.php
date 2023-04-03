<?php
/**
 * @package     pwebbox
 * @version 	2.0.0
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die('Restricted access');

JFormHelper::loadFieldClass('Radio');

class JFormFieldPwebRadioWrapped extends JFormFieldRadio
{
    protected $type = 'PwebRadioWrapped';

    /**
     * Method to get the radio button field input markup.
     *
     * @return  string  The field input markup.
     *
     * @since   11.1
     */
    protected function getInput()
    {
        $doc = JFactory::getDocument();
        
        $doc->addScript(JURI::root(true) . '/media/mod_pwebbox/js/admin.js');
        
        $html = array();

        // Initialize some field attributes.
        $class     = !empty($this->element['class']) ? ' class="radio ' . $this->element['class'] . '"' : ' class="radio"';
        $required  = $this->required ? ' required aria-required="true"' : '';
        $autofocus = $this->autofocus ? ' autofocus' : '';
        $disabled  = $this->disabled ? ' disabled' : '';
        $readonly  = $this->readonly;

        // Start the radio field output.
        $html[] = '<fieldset id="' . $this->id . '"' . $class . $required . $autofocus . $disabled . ' >';

        // Get the field options.
        $options = $this->getOptions();

        // Build the radio field output.
        foreach ($options as $i => $option)
        {
                // Initialize some option attributes.
                $checked = ((string) $option->value == (string) $this->value) ? ' checked="checked"' : '';
                $active = '';
                if ($checked)
                {
                    $active = 'pweb-radio-option-active';
                }
                $class = !empty($option->class) ? ' class="' . $option->class . '"' : '';

                $disabled = !empty($option->disable) || ($readonly && !$checked);

                $disabled = $disabled ? ' disabled' : '';

                // Initialize some JavaScript option attributes.
                $onclick = !empty($option->onclick) ? ' onclick="' . $option->onclick . '"' : '';
                $onchange = !empty($option->onchange) ? ' onchange="' . $option->onchange . '"' : '';

                $html[] = '<div class="pweb-radio-option-group ' . $active . '">';

                $html[] = '<input type="radio" id="' . $this->id . $i . '" name="' . $this->name . '" value="'
                        . htmlspecialchars($option->value, ENT_COMPAT, 'UTF-8') . '"' . $checked . $class . $required . $onclick
                        . $onchange . $disabled . ' />';

                $html[] = '<label for="' . $this->id . $i . '"' . $class . ' ><div class="pweb-radio-option-text">'
                        . JText::alt($option->text, preg_replace('/[^a-zA-Z0-9_\-]/', '_', $this->fieldname)) . '</div>'
                        . '<div class="pweb-radio-option-img ' . $option->class . '"></div></label>';

                $html[] = '</div>';

                $required = '';
        }

        // End the radio field output.
        $html[] = '</fieldset>';

        $input = implode($html);
        
        if ($this->element['hidden'])
        {
            require_once 'fieldhelper.php';
            
            return modPwebboxFieldHelper::generateFieldWithLabel($this->id, $input, $this->element['label'], $this->element['description'], $this->required, $this->element['pweb_showon']);
        }
        
        return $input;
    }
}
