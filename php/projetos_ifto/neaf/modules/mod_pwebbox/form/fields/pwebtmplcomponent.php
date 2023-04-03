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

class JFormFieldPwebTmplComponent extends JFormField
{
    protected $type = 'PwebTmplComponent';

    /**
     * Method to get the field input markup.
     *
     * @return	string	The field input markup.
     * @since	1.6
     */
    protected function getInput()
    {
        $jinput = JFactory::getApplication()->input;
        
        if ($jinput->get('tmpl') == 'component')
        {
            $doc = JFactory::getDocument();
            
            $module_id = $jinput->get('id', 0);
            
            $doc->addStyleDeclaration('
                        .pweb-buttons {position:absolute; top:5px; left:0;}
                        .pweb-buttons .btn {margin-right:5px;}
                        #system-message-container {margin-top: 40px;}
                    ');
            
            $doc->addScriptDeclaration('
                        jQuery(document).ready(function($){
                            window.parent.eeModuleId = ' . $module_id . ';
                            var html = \'<div class="pweb-buttons">\'
                                    + \'<button class="btn btn-small btn-success" type="button" onclick="Joomla.submitbutton(\\\'module.apply\\\');"><span class="icon-apply icon-white"></span>' . JText::_('JTOOLBAR_APPLY') . '</button>\'
                                    //+ \'<button class="btn btn-small" type="button" onclick="Joomla.submitbutton(\\\'module.save\\\');"><span class="icon-save"></span>' . JText::_('JSAVE') . '</button>\'
                                    //+ \'<button class="btn btn-small" id="pweb_ee_modal_cancel" type="button" onclick="Joomla.submitbutton(\\\'module.cancel\\\');window.parent.pwebCloseModal();"><span class="icon-cancel"></span>' . JText::_('JTOOLBAR_CLOSE') . '</button>\'
                                    + \'<button class="btn btn-small" id="pweb_ee_modal_cancel" type="button" onclick="window.parent.pwebCloseModal();"><span class="icon-cancel"></span>' . JText::_('JTOOLBAR_CLOSE') . '</button>\'
                            + \'</div>\';

                            $("body").prepend(html);
                            
                            var formAction = $("#module-form").attr("action");
                            
                            $("#module-form").attr("action", formAction + "&tmpl=component");
                            
                            $("#jform_position").val("");
                            $("#jform_position").parent().parent().hide();
                        });
                    ');
            
            return null;
        }
    }

}
