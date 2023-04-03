<?php
/**
 * @package     pwebbox
 * @version 	2.0.0
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

class modPwebboxFieldHelper
{
    public static function generateFieldWithLabel($field_id, $input, $label = null, $description = null, $required = null, $showon = null)
    {
        if ($showon)
        {
            $showon = explode(':', $showon, 2);
            $showon_class = ' pweb_showon_' . implode(' pweb_showon_', explode(',', $showon[1]));
            $showon_rel = ' rel="pweb_showon_jform[params][' . $showon[0] . ']"';
            
             $html[] = '<div class="control-group ' . $showon_class . '" ' . $showon_rel . '>';
        }
        else 
        {
            $html[] = '<div class="control-group">';
        }
        
        if ($label)
        {
            $label_required = $required ? 
                                    array('class' => ' required ', 'star' => '<span class="star">&nbsp;*</span>') 
                                  : array('class' => '', 'star' => '');
            $label_description = $description ? 
                                    array('class' => ' hasTooltip ', 'description' => JText::_($description), 'title' => '') 
                                  : array('class' => '', 'description' => '', 'title' => '');    
            
            if (version_compare(JVERSION, '3.0.0') == -1 && $description)
            {            
                $label_description['class'] = ' hasTip ';
                $label_description['title'] = $label_description['description'];
            }
            
            $html[] = '<div class="control-label">';
            
            $html[] = '<label ';
            $html[] = ' id="' . $field_id . '-lbl" for="' . $field_id . '" ';
            $html[] = ' class="' . $label_description['class'] . $label_required['class'] . '" ';
            $html[] = ' title="' . $label_description['title'] . '" ';
            if (version_compare(JVERSION, '3.0.0') != -1)
            {
                $html[] = ' data-original-title="<strong>' . $label_description['description'] . '</strong>"';
            }
            $html[] = ' >';
            $html[] = JText::_($label);
            $html[] = $label_required['star'];
            $html[] = '</label>';
            
            $html[] = '</div>';
            
        }   
        
        $html[] = '<div class="controls">';
        $html[] = $input;
        $html[] = '</div>';
        $html[] = '</div>';
        
        return implode($html);
    }
}
