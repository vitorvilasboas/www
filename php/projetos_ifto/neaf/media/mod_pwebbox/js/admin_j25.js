/**
 * @package     pwebbox
 * @version 	2.0.0
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */

jQuery(document).ready(function ($) {
    // Turn radios into btn-group
    $('.radio.btn-group label').addClass('btn');
    $('.btn-group label:not(.active)').click(function()
    {
        var label = $(this);
        var input = $('#' + label.attr('for'));

        if (!input.prop('checked')) {
            label.closest('.btn-group').find('label').removeClass('active btn-success btn-danger btn-primary');
            if (input.val() == '') {
                label.addClass('active btn-primary');
            } else if (input.val() == 0) {
                label.addClass('active btn-danger');
            } else {
                label.addClass('active btn-success');
            }
            input.prop('checked', true);
            input.trigger('change');
        }
    });
    $('.btn-group input[checked=checked]').each(function()
    {
        if ($(this).val() == '') {
            $('label[for=' + $(this).attr('id') + ']').addClass('active btn-primary');
        } else if ($(this).val() == 0) {
            $('label[for=' + $(this).attr('id') + ']').addClass('active btn-danger');
        } else {
            $('label[for=' + $(this).attr('id') + ']').addClass('active btn-success');
        }
    }); 
    
    // Go to specific tab after clicking button in summary.
    $("#pweb_summary_container button").click(function(e) {
        e.preventDefault();
        var linkId = $(this).data("target");
        
        if (linkId == '#mod_pwebbox_configuration_check-options') {
            chechConfig();
        }
        
        var thisPanelTitle = $('#basic-options');
        var thisPanel = thisPanelTitle.parent();
        var thisPanelContent = thisPanel.find('.content');
        
        var nextPanelTitle = $(linkId);
        var nextPanel = nextPanelTitle.parent();
        var nextPanelContent = nextPanel.find('.content');
        
        thisPanelContent.toggleClass('pane-hide');
        thisPanelContent.toggleClass('pane-down');
        thisPanelTitle.toggleClass('pane-toggler-down');
        thisPanelTitle.toggleClass('pane-toggler');
        
        nextPanelContent.toggleClass('pane-hide');
        nextPanelContent.toggleClass('pane-down');
        nextPanelTitle.toggleClass('pane-toggler-down');
        nextPanelTitle.toggleClass('pane-toggler');
        
        thisPanelContent.css('height', '0');
        nextPanelContent.css('height', 'auto');
    });     
    
    function chechConfig() {
        var info_block = $('#pweb_summary_config_check span');
        var defaultMessageContainer = $('#system-message-container');
        var pwebMessageNotOkContainer = $('#pweb_configuration_check_not_ok');
        var pwebMessageNotOkInfo = $('#pweb_configuration_check_not_ok_info').html();
        var pwebMessageOkContainer = $('#pweb_configuration_check_ok');
        var result = document.formvalidator.isValid(document.getElementById('module-form'));
        if (!result) {
            info_block.html(Joomla.JText._('MOD_PWEBBOX_SOME_PROBLEMS'));
            pwebMessageOkContainer.hide();
            pwebMessageNotOkContainer.html(pwebMessageNotOkInfo);
            pwebMessageNotOkContainer.append(defaultMessageContainer.find(".alert-error").html());
            pwebMessageNotOkContainer.show();
            defaultMessageContainer.find(".alert-error").remove();
        } 
        else {
            info_block.html(Joomla.JText._('MOD_PWEBBOX_OK'));
            pwebMessageNotOkContainer.hide();
            pwebMessageOkContainer.show();
            defaultMessageContainer.find(".alert-error").remove(); 
        }        
    }
    
    // Functionality of configuration check tab. #J!2.5    
    $('.panel').on('click', '.title', function(e) {
        e.preventDefault();
        if ($(this).attr('id') === 'mod_pwebbox_configuration_check-options') {
            chechConfig();
        }
        else if ($(this).attr('id') === 'basic-options') {
            chechConfig();
        }
    });     
});