<?php
/**
 * @package     pwebbox
 * @version 	2.0.0
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

/**
 * Everything in Everyway button
 */
class PlgButtonPerfect_everything_in_everyway extends JPlugin
{
	/**
	 * Load the language file on instantiation.
	 *
	 * @var    boolean
	 * @since  3.1
	 */
	protected $autoloadLanguage = true;

	/**
	 * Display the button
	 *
	 * @param   string  $name  The name of the button to add
	 *
	 * @return object
	 */
	public function onDisplay($name)
	{
                static $instance_count = 0;
                
                // Get mod_pwebbox id from extensions table.
                $db = JFactory::getDbo();

                $query = $db->getQuery(true);

                $query
                        ->select($db->quoteName('extension_id'))
                        ->from($db->quoteName('#__extensions'))
                        ->where($db->quoteName('element') . ' = ' . $db->quote('mod_pwebbox'));

                $db->setQuery($query);

                try
                {
                        $result = $db->loadResult();
                }
                catch (Exception $e)
                {
                        echo $e->getMessage();
                }                

                if (!empty($result))
                {
                    $doc = JFactory::getDocument();   
                    
                    if (class_exists('JHtmlJquery')) 
                    {        
                        JHtml::_('jquery.framework');
                    } 
                    
                    if (class_exists('JHtmlBootstrap')) 
                    {
                        JHtml::_('bootstrap.modal');        
                    }      
                    
                    $click_source = '.pweb-ee-modal-show';
                    
                    $call_close_module_func = '';
                    
                    $editor_selector = array();
                    
                    // For J!2.5
                    if (version_compare(JVERSION, '3.0.0') == -1) 
                    {
                        $editor_selector = array(
                            'textarea'  =>  '#jform_articletext',
                            'tinyMCE'   =>  '.mceEditor',
                            'CodeMirror'   =>  '.CodeMirror-wrapping',
                            'jce'           =>  '.mceEditor',
                            'cke'           =>  '#cke_jform_articletext',//for ark and cke editor
                        );  
                        
                        $click_source = '.pweb-ee-modal-show a';
                        
                        // Collect all existing EE modules ids to allow direct access to its edit forms.
                        $query = $db->getQuery(true);

                        $query
                                ->select($db->quoteName('id'))
                                ->from($db->quoteName('#__modules'))
                                ->where($db->quoteName('module') . ' = ' . $db->quote('mod_pwebbox'));

                        $db->setQuery($query);

                        try
                        {
                                $ee_mod_ids = $db->loadColumn();
                        }
                        catch (Exception $e)
                        {
                                echo $e->getMessage();
                        }       
                        
                        if (!empty($ee_mod_ids))
                        {
                            foreach ($ee_mod_ids as $ee_id)
                            {
                                $this->holdEditId('com_modules.edit.module', $ee_id);
                            }
                        }
                    }   
                    else
                    {
                        $editor_selector = array(
                            'textarea'      =>  '#jform_articletext',
                            'tinyMCE'       =>  '.mce-tinymce',
                            'CodeMirror'    =>  '.CodeMirror-wrap',
                            'jce'           =>  '.mceEditor',
                            'cke'           =>  '#cke_jform_articletext',//for ark and cke editor
                        );  
                        
                        // Closing module in J!2.5 was disabling modules edit possibility so call it only for J!3>.
                        $call_close_module_func = 'closeModule();';
                    }
                    
                    if ($instance_count == 0)
                    {
                        $doc->addScriptDeclaration("
                            window.eeModuleId = null; // Value is set in iframe with ee module edition.
                            
                            if (typeof jQuery != 'undefined') {
                                jQuery(document).ready(function($) {
                                    window.clickEEButtonAction = function() {
                                        var selectedText, selectedRange, selectedRangeOffset, rangeText;
                                        var shortcodeRE = /{everything_in_everyway (\d+)}/g; // Shortcode to search for in editor's text.
                                        var shortcodeRESingle = /{everything_in_everyway (\d+)}/; // Shortcode to search for in editor's text.
                                        
                                        window.eeModuleId = null;
                                        shortcodeId = null;
                                        
                                        // For tinyMCE and JCE.
                                        if (($('" . $editor_selector['tinyMCE'] . "').length && $('" . $editor_selector['tinyMCE'] . "').css('display') != 'none') || ($('" . $editor_selector['jce'] . "').length && $('" . $editor_selector['jce'] . "').css('display') != 'none')) {
                                            if (typeof tinyMCE != 'undefined') {
                                                // If part of editor's text is selected.
                                                selectedText = tinyMCE.activeEditor.selection.getContent(); // Maybe this way better: tinyMCE.get('TXT_AREA_ID') ?
                                                
                                                // If text isn't selected check if cursor is in EE shortcode.
                                                if (!selectedText) {
                                                    selectedRange = tinyMCE.activeEditor.selection.getRng(); // Selected part of editor's body.
                                                    selectedRangeOffset = tinyMCE.activeEditor.selection.getRng().startOffset; // Position of cursor.
                                                    rangeText = selectedRange.startContainer.textContent; // Text of selected editor's body.
                                                }
                                            }
                                        }
                                        // For textarea.
                                        else  if ($('" . $editor_selector['textarea'] . "').length && $('" . $editor_selector['textarea'] . "').css('display') != 'none') {
                                            var editorField = document.getElementById('jform_articletext');
                                             
                                            if (editorField.selectionStart || editorField.selectionStart == '0')
                                            {
                                                // If part of editor's text is selected.
                                                var startPos = editorField.selectionStart;
                                                var endPos = editorField.selectionEnd;
                                                selectedText = editorField.value.substring(startPos, endPos); 
                                                
                                                // If text isn't selected check if cursor is in EE shortcode.
                                                if (!selectedText) {
                                                    selectedRangeOffset = startPos; // Position of cursor.
                                                    rangeText = editorField.value; // Text of selected editor's body.
                                                }
                                            } 
                                            else if (document.selection)
                                            {
                                                // IE < 9 support
                                                // If part of editor's text is selected.
                                                editorField.focus();
                                                var sel = document.selection.createRange();
                                                selectedText = sel.text;
                                                
                                                // If text isn't selected check if cursor is in EE shortcode.
                                                if (!selectedText) {
                                                    sel.moveStart('character', -editorField.value.length);
                                                    selectedRangeOffset = sel.text.length;   
                                                    rangeText = editorField.value; // Text of selected editor's body.                                             
                                                }
                                            }                                            
                                        }
                                        // For CodeMirror
                                        else  if ($('" . $editor_selector['CodeMirror'] . "').length && $('" . $editor_selector['CodeMirror'] . "').css('display') != 'none') {
                                            if (typeof CodeMirror != 'undefined') {
                                                var pwebCm = Joomla.editors.instances['jform_articletext'];
                                                " . ((version_compare(JVERSION, '3.0.0') == -1) ? 'selectedText = pwebCm.editor.selectedText();' : 'selectedText = pwebCm.getSelection();') . " 
                                                
                                                if (!selectedText) {
                                                    " . ((version_compare(JVERSION, '3.0.0') == -1) ? 'selectedRangeOffset = pwebCm.editor.cursorPosition().character;' : 'selectedRangeOffset = pwebCm.getCursor().ch - pwebCm.getTokenAt(pwebCm.getCursor()).start;') . "
                                                    " . ((version_compare(JVERSION, '3.0.0') == -1) ? 'rangeText = pwebCm.editor.lineContent(pwebCm.editor.cursorPosition().line);' : 'rangeText = pwebCm.getTokenAt(pwebCm.getCursor()).string;') . "
                                                }
                                            }
                                        }
                                        // For ARK and CKE Editor
                                        else  if ($('" . $editor_selector['cke'] . "').length && $('" . $editor_selector['cke'] . "').css('display') != 'none') {
                                            if (typeof CKEDITOR != 'undefined') {
                                                selectedText = CKEDITOR.instances['jform_articletext'].getSelection().getSelectedText();
                                                
                                                // If text isn't selected check if cursor is in EE shortcode.
                                                if (!selectedText) {
                                                    selectedRange = CKEDITOR.instances['jform_articletext'].getSelection().getRanges(); // Selected part of editor's body.
                                                    selectedRangeOffset = selectedRange[0].startOffset; // Position of cursor.
                                                    rangeText = selectedRange[0].startContainer.getText(); // Text of selected editor's body.
                                                }
                                            }
                                        }
                                            
                                        // If text isn't selected check if cursor is in EE shortcode.
                                        if (!selectedText) {     
                                            var shortcodeFound, shortcodeFoundStart, shortcodeFoundEnd;

                                            // Find all occurances of shortcode in selected part of editor's body.
                                            while (((shortcodeFound = shortcodeRE.exec(rangeText)) != null)) {
                                                shortcodeFoundStart = shortcodeFound.index;
                                                shortcodeFoundEnd = shortcodeFoundStart + shortcodeFound[0].length;

                                                // If position of cursor is in shortcode then select this shortcode for displaying in modal box.
                                                if (selectedRangeOffset > shortcodeFoundStart && selectedRangeOffset < shortcodeFoundEnd) {
                                                    selectedText = shortcodeFound[0];
                                                    break;
                                                }
                                            }                                            
                                        }

                                        if (selectedText) {
                                            shortcodeId = selectedText.match(shortcodeRESingle);
                                        }

                                        if (shortcodeId && shortcodeId[1]) {
                                            $('#pweb_ee_modal_box .modal-body iframe').attr('src', link_edit_ee + '&id=' + shortcodeId[1]);
                                        }
                                        else {
                                            $('#pweb_ee_modal_box .modal-body iframe').attr('src', link_create_ee);
                                        }
                                    }
                                    
                                    var link_create_ee = 'index.php?option=com_modules&task=module.add&eid=" . $result . "&tmpl=component';// . '&amp;' . JSession::getFormToken() . '=1';
                                    var link_edit_ee = 'index.php?option=com_modules&view=module&tmpl=component&layout=edit';// . '&amp;' . JSession::getFormToken() . '=1';
                                    var shortcodeId = null;
                                    
                                    var clickSource = $('" . $click_source . "');
                                        
                                    // For CKE Editor.
                                    if (!clickSource.length) {
                                        clickSource = $('.pweb-ee-modal-show-wrapper a');
                                    }

                                    // Prepare button for calling modal box.
                                    var btnEEmod = clickSource;
                                    btnEEmod.attr('href', '#pweb_ee_modal_box');
                                    btnEEmod.attr('role', 'button');
                                    btnEEmod.attr('data-toggle', 'modal');

                                    // Add modal box to body.
                                    $('body').append('<div class=\"modal hide fade\" id=\"pweb_ee_modal_box\"><div class=\"modal-body modal-batch\"><iframe src=\"\" width=\"100%\" height=\"400px\" style=\"width:100%;height:400px;border:0!important;\"></iframe></div></div>');
                                    //console.log(Joomla.editors.instances['jform_articletext']);
                                    // Call modal box with edition of EE module.
                                    clickSource.click(window.clickEEButtonAction);
                                    
                                    $('#pweb_ee_modal_box').on('hidden', function(e) {
                                        if (!shortcodeId) {
                                            jAddEEModuleShortcode(window.eeModuleId);
                                        }
                                        " . $call_close_module_func . "
                                        // Clear ifame content before loading new content.
                                        $('#pweb_ee_modal_box .modal-body iframe').contents().find('body').html(''); 
                                        $('#pweb_ee_modal_box .modal-body iframe').attr('src', '');
                                    }); 
                                    
                                    function closeModule() {
                                        $.ajax({
                                            url: 'index.php?option=com_modules&view=module&layout=edit&id=' + window.eeModuleId,
                                            async: true,
                                            method: 'POST',
                                            data: {
                                                '" . JSession::getFormToken() . "': 1,
                                                task : 'module.cancel',
                                            }
                                        });                                    
                                    }
                                    
                                    // Add shortcode to editor.
                                    function jAddEEModuleShortcode(id)
                                    {
                                        if (id) {
                                            var tag = '{everything_in_everyway ' + id + '}';
                                            
                                            // For tinyMCE an JCE.
                                            if (($('" . $editor_selector['tinyMCE'] . "').length && $('" . $editor_selector['tinyMCE'] . "').css('display') != 'none') || ($('" . $editor_selector['jce'] . "').length && $('" . $editor_selector['jce'] . "').css('display') != 'none')) {
                                                jInsertEditorText(tag, '" . $name . "');
                                            }
                                            // For textarea.
                                            else  if ($('" . $editor_selector['textarea'] . "').length && $('" . $editor_selector['textarea'] . "').css('display') != 'none') {
                                                var editorField = document.getElementById('jform_articletext');

                                                if (editorField.selectionStart || editorField.selectionStart == '0')
                                                {
                                                    // If part of editor's text is selected.
                                                    var startPos = editorField.selectionStart;
                                                    var endPos = editorField.selectionEnd;
                                                    selectedText = editorField.value.substring(startPos, endPos); 
                                                    editorField.value = editorField.value.substring(0, startPos)
                                                        + tag
                                                        + editorField.value.substring(endPos, editorField.value.length);
                                                } 
                                                else if (document.selection)
                                                {
                                                    // IE < 9 support
                                                    // If part of editor's text is selected.
                                                    editorField.focus();
                                                    var sel = document.selection.createRange();
                                                    sel.text = tag;
                                                }                                                    
                                            }
                                            // For CodeMirror
                                            else  if ($('" . $editor_selector['CodeMirror'] . "').length && $('" . $editor_selector['CodeMirror'] . "').css('display') != 'none') {
                                                if (typeof CodeMirror != 'undefined') {
                                                    var pwebCm = Joomla.editors.instances['jform_articletext'];
                                                    " . ((version_compare(JVERSION, '3.0.0') == -1) ? 'var cursorPosition = pwebCm.editor.cursorPosition();' : 'var cursorPosition = pwebCm.getCursor();') . " 
                                                    " . ((version_compare(JVERSION, '3.0.0') == -1) ? 'pwebCm.editor.replaceSelection(tag);' : 'pwebCm.replaceRange(tag, cursorPosition, cursorPosition);') . "

                                                }
                                            } 
                                            // For ARK and CKE Editor
                                            else  if ($('" . $editor_selector['cke'] . "').length && $('" . $editor_selector['cke'] . "').css('display') != 'none') {
                                                if (typeof CKEDITOR != 'undefined') {
                                                    CKEDITOR.instances['jform_articletext'].insertText(tag);
                                                }
                                            }
                                        }
                                    }
                                    
                                    window.pwebCloseModal = function() {
                                        $('#pweb_ee_modal_box').modal('hide')
                                    }
                                    
                                    if (typeof IeCursorFix == 'undefined') {
                                        window.IeCursorFix = function() {}
                                    }
                                    
                                    window.clickEEButton = function() {
                                        if (typeof tinyMCE != 'undefined') { 
                                            tinyMCE.activeEditor.windowManager.close();
                                            var btnEEmod = $('.mce-btn[aria-label=\"Everything in Everyway\"]');
                                            if (btnEEmod.attr('href') != '#pweb_ee_modal_box') {
                                                btnEEmod.attr('href', '#pweb_ee_modal_box');
                                                btnEEmod.attr('role', 'button');
                                                btnEEmod.attr('data-toggle', 'modal');
                                            }
                                            window.clickEEButtonAction();
                                        }
                                    }                                    
                                }); 
                            }
                        ");
                        
                        if (version_compare(JVERSION, '3.0.0') == -1) 
                        {                        
                            $doc->addStyleDeclaration('
                                /* bootstrap modal */
                                .fade{opacity: 0;-webkit-transition: opacity 0.15s linear;-moz-transition: opacity 0.15s linear;-o-transition: opacity 0.15s linear;transition: opacity 0.15s linear;}
                                .fade.in{opacity: 1;}
                                .close{float: right;font-size: 20px;font-weight: bold;line-height: 20px;color: #000000;text-shadow: 0 1px 0 #ffffff;opacity: 0.2;filter: alpha(opacity=20);}
                                .close:hover,.close:focus{color: #000000;text-decoration: none;cursor: pointer;opacity: 0.4;filter: alpha(opacity=40);}
                                button.close{padding: 0;cursor: pointer;background: transparent;border: 0;-webkit-appearance: none;}
                                .modal-backdrop{position: fixed;top: 0;right: 0;bottom: 0;left: 0;z-index: 1040;background-color: #000000;}
                                .modal-backdrop.fade{opacity: 0;}
                                .modal-backdrop,.modal-backdrop.fade.in{opacity: 0.8;filter: alpha(opacity=80);}
                                .modal-header{padding: 9px 15px;border-bottom: 1px solid #eee;}
                                .modal-header .close{margin-top: 2px;}
                                .modal-header h3{margin: 0;line-height: 30px;}
                                .modal-body{position: relative;max-height: 400px;padding: 15px;overflow-y: auto;width: 98%;}
                                .modal-body iframe{width: 100%;max-height: none;border: 0 !important;}
                                .modal-form{margin-bottom: 0;}
                                .modal-footer{padding: 14px 15px 15px;margin-bottom: 0;text-align: right;background-color: #f5f5f5;border-top: 1px solid #ddd;-webkit-border-radius: 0 0 6px 6px;-moz-border-radius: 0 0 6px 6px;border-radius: 0 0 6px 6px;*zoom: 1;-webkit-box-shadow: inset 0 1px 0 #ffffff;-moz-box-shadow: inset 0 1px 0 #ffffff;box-shadow: inset 0 1px 0 #ffffff;}
                                .modal-footer:before,.modal-footer:after{display: table;line-height: 0;content: "";}
                                .modal-footer:after{clear: both;}
                                .modal-footer .btn + .btn{margin-bottom: 0;margin-left: 5px;}
                                .modal-footer .btn-group .btn + .btn{margin-left: -1px;}
                                .modal-footer .btn-block + .btn-block{margin-left: 0;}
                                div.modal{position: fixed;top: 5%;left: 50%;z-index: 1050;width: 80%;margin-left: -40%;background-color: #ffffff;border: 1px solid #999;border: 1px solid rgba(0, 0, 0, 0.3);*border: 1px solid #999;-webkit-border-radius: 6px;-moz-border-radius: 6px;border-radius: 6px;outline: none;-webkit-box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);-moz-box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);-webkit-background-clip: padding-box;-moz-background-clip: padding-box;background-clip: padding-box;}
                                div.modal.fade{top: -25%;-webkit-transition: opacity 0.3s linear, top 0.3s ease-out;-moz-transition: opacity 0.3s linear, top 0.3s ease-out;-o-transition: opacity 0.3s linear, top 0.3s ease-out;transition: opacity 0.3s linear, top 0.3s ease-out;}
                                div.modal.fade.in{top: 10%;}                            
                            ');
                        }
                    }
                }
                
		$button = new JObject;
		$button->modal = false;
		$button->class = 'btn pweb-ee-modal-show';
		$button->link = null;
		$button->text = JText::_('Everything in Everyway');
		$button->name = 'upload pweb-ee-modal-show-wrapper';
        if (version_compare(JVERSION, '3.0.0') == -1)
        {
            $button->name = 'article pweb-ee-modal-show';
        }
        if (version_compare(JVERSION, '3.5.0') != -1)
        {
            $button->onclick = 'window.clickEEButton();return false;';
        }
		$button->options = null;
                
        $instance_count++;

		return $button;
	}
        
	/**
	 * Method to add a record ID to the edit list. For J!2.5
	 *
	 * @param   string   $context  The context for the session storage.
	 * @param   integer  $id       The ID of the record to add to the edit list.
	 *
	 * @return  void
	 */        
	protected function holdEditId($context, $id)
	{
		// Initialise variables.
		$app = JFactory::getApplication();
		$values = (array) $app->getUserState($context . '.id');

		// Add the id to the list if non-zero.
		if (!empty($id))
		{
			array_push($values, (int) $id);
			$values = array_unique($values);
			$app->setUserState($context . '.id', $values);

			if (defined('JDEBUG') && JDEBUG)
			{
				JLog::add(
					sprintf(
						'Holding edit ID %s.%s %s',
						$context,
						$id,
						str_replace("\n", ' ', print_r($values, 1))
					),
					JLog::INFO,
					'controller'
				);
			}
		}
	}        
}
