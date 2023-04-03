/**
 * @package     pwebbox
 * @version 	2.0.0
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */

jQuery(document).ready(function ($) {
    var modPwebBoxInfoUrl = 'https://www.perfect-web.co/index.php?option=com_ars&view=everyway&format=json';
    // free version defaultTheme = 'free' flipsterDefaultIndex = 5 pro version defaultTheme = 'elastica' flipsterDefaultIndex = 3
    var defaultTheme = 'free'; 
    var flipsterDefaultIndex = 5;     
    
    // Add plugin name to page-title.
    function setPageTitle(plugin_type) {
        if (!plugin_type) {
            plugin_type = $('#jform_params_plugin').val();
        }

        var page_title_content_name = $('#pweb_page_title_content');
        if (plugin_type) {
            var plugin_name = $('#pweb_btn_content_' + plugin_type).data('name');            
            
            if (page_title_content_name.length) {
                page_title_content_name.html(plugin_name);
            }
            else {
                var page_title = $('.page-title');
                if (page_title.length) {
                    page_title.append(' - <span id="pweb_page_title_content">' + plugin_name + '</span>');
                }
                else { // J!2.5
                    $('.pagetitle h2').append(' - <span id="pweb_page_title_content">' + plugin_name + '</span>');
                }
            }
        }
    }
    setPageTitle();
    
    // Set choosen radio option as active (loaction & effects options).
    $(".pweb-radio-fieldset").on("change", "input", function() {
        $(this).parent().parent().find(".pweb-radio-option-group").each(function() {
            $(this).removeClass("pweb-radio-option-active");
        });
        $(this).parent().addClass("pweb-radio-option-active");
    });
    
    // Show/hide tag with target-id after button click.
    $(".pweb-button-toggler").click(function(e) {
        e.preventDefault();
        var targetId = $(this).data("target-id");
        $(this).toggleClass("pweb-button-active");
        $(targetId).slideToggle("fast", function() {
            $(this).toggleClass("pweb-hidden");
        });
    });
    // Themes coverflow.
    var $flipster = $("#pweb-themes-coverflow");
    var start = $flipster.find(".pweb-active-theme").index();
    var $flipsterObj;

    // Add copy button to Facebook pixel sample codes
    $('.pweb-pixel-code code').each(function () {
        $('<a>', {
            href: '#',
            html: '<i class="icon-copy"></i> ' + Joomla.JText._('MOD_PWEBBOX_COPY_BUTTON'),
            'class': 'pweb-copy-code-button'
        }).click(function (e) {
            e.preventDefault();

            var code = $(this).prev().html(),
                field = $('#jform_params_custom_script'),
                old_code = field.val(),
                pos = field.offset().top,
                maxPos = pos + field.outerHeight() - $(window).height();
            field.val((old_code ? old_code + '\r\n' : '') + code);
            if (pos > maxPos) pos = maxPos;
            $('html, body').animate({scrollTop: pos}, 500);

        }).insertAfter($(this));
    });

    
    function initFlipster()
    {
        $flipsterObj = $flipster.flipster({
            itemContainer: "ul",
            itemSelector: "li",
            style: "coverflow",
            start: start > -1 ? start : flipsterDefaultIndex,
            enableKeyboard: false,
            enableMousewheel: false,
            enableTouch: true,
            enableNav: false,
            enableNavButtons: false
        });         
    }
    
    // Flipster wasn't show full images, so need to set timeout.
    setTimeout(function(){ initFlipster(); }, 50);
    
    // Flipster wasn't show full images, so need to set timeout.
    $('#myTabTabs').on('click', 'a[href="#attrib-mod_pwebbox_layout"]', function(e) {
        e.preventDefault();
        setTimeout(function(){ $flipsterObj.resize(); }, 50);
    });    
    
    // Flipster wasn't show full images, so need to set timeout. #J!2.5
    $('.panel').on('click', '.title', function(e) {
        e.preventDefault();
        if ($(this).attr('id') === 'mod_pwebbox_layout-options') {
            setTimeout(function(){ $flipsterObj.resize(); }, 50);
        }
    });   
    
    // Go to specific tab after clicking button in summary.
    $("#pweb_summary_container button").click(function(e) {
        e.preventDefault();
        var target = $(this).data("target");
        var link = $('a[href="' + target + '"]');
        
        if (link.length) {
            link.click();
        }
        
        // J!2.5 resize flipster after clicking button.
        if (target == '#mod_pwebbox_layout-options') {
            setTimeout(function(){ $flipsterObj.resize(); }, 50);
        }
    });

    // Themes coverflow navigation
    $("#pweb-themes-coverflow-control-prev").click(function(e){
        e.preventDefault();
        //$flipster.flipster("jump", "left"); // wasn't working
        $("#pweb-themes-coverflow").find('.flip-current').prev('.flip-item').click();
    });
    $("#pweb-themes-coverflow-control-next").click(function(e){
        e.preventDefault();
        //$flipster.flipster("jump", "right"); // wasn't working
        $("#pweb-themes-coverflow").find('.flip-current').next('.flip-item').click();
    }); 
    
    // Set text in "Choose this theme" button.
    $('#pweb-themes-coverflow').on('click', '.flip-item', function() {
       var themeWrapper = $(this).find('.pweb-theme');
       var chooseThemeBtn = $('#pweb-themes-coverflow-control-load');
       var chooseThemeBtnInfo = $('#pweb-themes-coverflow-control-load span');
       
        if (themeWrapper.hasClass('pweb-theme-no-json')) {
           var infoBtn = Joomla.JText._('MOD_PWEBBOX_THEME_BUY_LABEL');
            if ($('#pweb_themes_price').length) {
                infoBtn = Joomla.JText._('MOD_PWEBBOX_THEME_GET_LABEL') + ' ' + $('#pweb_themes_price').val();
            }           
            chooseThemeBtnInfo.html(infoBtn);
            
            // Change btn color.
            chooseThemeBtn.removeClass('btn-info');
            if (!chooseThemeBtn.hasClass('btn-warning')) {
                chooseThemeBtn.addClass('btn-warning');
            }
        }
        else {
            chooseThemeBtnInfo.html(Joomla.JText._('MOD_PWEBBOX_BUTTON_LOAD_THEME_AND_SAVE_FORM_LABEL'));
            
            // Change btn color.
            chooseThemeBtn.removeClass('btn-warning');
            if (!chooseThemeBtn.hasClass('btn-info')) {
                chooseThemeBtn.addClass('btn-info');
            }            
        }
    });
    
    // Set theme.
    $('#pweb-themes-coverflow-control-load').click(function(e) {
        e.preventDefault();
        var currentFlip = $(this).parent().parent().find(".flip-current");
        if (currentFlip.find('.pweb-theme-no-json').length) {
            if ($('#pweb_themes_url').length) {
                var urlToGetTheme = $('#pweb_themes_url').val();
                window.open(urlToGetTheme, '_blank');
            }
        }
        else {
            var selectedTheme = currentFlip.find(".pweb-theme");
            var themeName = selectedTheme.data("name");
            var themeSettings = selectedTheme.data("settings");
            var themeDesc = selectedTheme.find('.pweb-theme-caption p');

            // Set theme input to selected theme.
            $("#jform_params_theme").val(themeName);

            setThemeSettings(themeSettings); 

            // Set theme settings info.
            var themeInfoImgWrapp = $('.pweb-theme-active-info-image');
            var themeInfoImg = themeInfoImgWrapp.find('img');
            var themeUrl = themeInfoImgWrapp.data('url');
            var themeInfoTitDescWrapp = $('.pweb-theme-active-info-caption');
            var themeInfoTitle = themeInfoTitDescWrapp.find('h3');
            var themeInfoDesc = themeInfoTitDescWrapp.find('p');

            // Set image.
            themeInfoImg.attr('src', themeUrl + themeName + '.jpg');

            // Set title.
            var theme_name_lang_var = 'MOD_PWEBBOX_THEME_' + themeName.toUpperCase() + '_LABEL';  

            $('#pweb_acc_theme_name').html(Joomla.JText._(theme_name_lang_var));
            themeInfoTitle.html(Joomla.JText._(theme_name_lang_var));
            $('#pweb_summary_layout span').html(Joomla.JText._(theme_name_lang_var));

            // Set description.
            themeInfoDesc.html(themeDesc.html());

            $('#pweb_theme_acc_group').removeClass('pweb-hidden');
        }
    });
    
    // Set default theme if non is chosen.
    function setDefaultTheme() {
        var themeField = $('#jform_params_theme');
        
        if (!themeField.val()) {
            var themeItem = $('#pweb-themes-coverflow').find("[data-name='" + defaultTheme + "']");
            var themeSettings = themeItem.data('settings');
            
            themeField.val(defaultTheme); 
            setThemeSettings(themeSettings, 1);             
        }
    }
    
    setDefaultTheme();
    
    // Save and publish module.
    $('#pweb_configuration_check_ok_save').click(function(e) {
        e.preventDefault();
        $('#jform_published').find('option[value="1"]').prop("selected", true).trigger("change");      
        Joomla.submitbutton('module.apply');
    });
    
    // Reset theme settings.
    $('#pweb_clear_theme_settings').click(function(e) {
        e.preventDefault();
        var themeSettings = $("#pweb-themes-coverflow-controls").data("settings");
        
        setThemeSettings(themeSettings);
    });
    
    // Set theme settings fields.
    function setThemeSettings(themeSettings, flag) {
        $.each( themeSettings, function(option, value) {
            var field = $("#pweb_themes_advanced_options #jform_params_" + option);
            var input = null, label = null, option = null, optionText = null;
            // Check if field exists.
            if (field.prop("tagName")) {
                if (field.prop("tagName").toLowerCase() === "fieldset") { // Set value for radio inputs.
                    input = field.find('input[value="' + value + '"]');
                    label = input.parent().find('label[for="' + input.attr("id") + '"]');
                    label.click();
                    input.prop("checked", true).trigger("change");
                    input.click();
                }
                else if (field.prop("tagName").toLowerCase() === "select") { // Set value for select inputs.
                    option = field.find('option[value="' + value + '"]');
                    optionText = option.text();
                    option.prop("selected", true).trigger("change");
                    option.parent().parent().find('.chzn-container .chzn-single span').html(optionText);
                }
                else { // Set value for text inputs.
                    field.val(value).trigger("change");
                    field.click();
                }
            }
        });
        
        // There were some problems with minicolors when assigining default theme.
        if (flag !== 1) {
            // Reset minicolors color picker.
            $('#pweb_themes_advanced_options input.minicolors').each(function() {
                var color = $(this).val();
                $(this).minicolors('value', color);
            });       
        }
    }
    
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
            pwebMessageNotOkContainer.append(defaultMessageContainer.html());
            pwebMessageNotOkContainer.show();
            defaultMessageContainer.html("");
        } 
        else {
            info_block.html(Joomla.JText._('MOD_PWEBBOX_OK'));
            pwebMessageNotOkContainer.hide();
            pwebMessageOkContainer.show();
            defaultMessageContainer.find(".alert-error").remove(); 
        }        
    }    
    
    // Functionality of configuration check tab.
    $('#myTabTabs').on('click', 'a[href="#attrib-mod_pwebbox_configuration_check"]', function(e) {
        e.preventDefault();
        chechConfig();
    });     
    
    // Functionality of configuration check tab.
    $('#myTabTabs').on('click', 'a[href="#general"]', function(e) {
        e.preventDefault();
        chechConfig();
    });   
    
    // Set new module content (plugin) after clicking content button.
    $('#pweb_content_btns_acc_group').on('click', '.pweb-button-content', function(e) {
        e.preventDefault();
        var content = $(this).data("content");
        ajaxCall(content, null, false, true);
    });   
    
    // Make ajax call to Joomla Ajax Interface.
    window.ajaxCall = function(content, data, urlWithHash, goToTop) {
        var request = {
            'option' : 'com_ajax',
             'group' : 'everything_in_everyway',
            'plugin' : content,
            'format' : 'json'
        };
        var content_accordion = $("#pweb_accordion2 a.accordion-toggle").first();
        var content_summary_info = $('#pweb_summary_content span');
        var acc_group_content_options = $('#pweb_content_acc_group');
        var acc_group_content_name = $('#pweb_acc_content_name');
        var content_options = $("#pweb_content_options");
        var plugin_name = $('#pweb_btn_content_' + content).data('name');  
        if (data) {
            request.data = data;
        }
        
        var currentPlugin = $("#jform_params_plugin").val();        
        
        $.ajax({
            type    : 'POST',
            data    : request,
            dataType : 'json',
            success : function (response) {
                if (typeof response.data !== 'undefined' && response.data !== null && typeof response.data[0] !== 'undefined') {     
                    content_options.html(response.data[0].params);
                    
                    // Add asset of plugin to page.
                    if (response.data[0].asset && response.data[0].asset.length > 0) {
                        response.data[0].asset.each(function(index, value) {
                            var significantChar = index[index.length-2];                        
                            var googleMapsInitialized = false;
                            var bingMapsInitialized = false;
                            
                            if (significantChar == 'j') { // js script.
                                // Add asset to page and initialize scripts.
                                $.getScript(index, function() {
                                    if (response.data[0].plugin == "google_maps" && !googleMapsInitialized) {
                                        initializeGoogleMaps();  
                                        googleMapsInitialized = true;
                                    }
                                    else if (response.data[0].plugin == "bing_maps" && !bingMapsInitialized) {
                                        initializeBingMaps();
                                        bingMapsInitialized = true;
                                    }
                                });
                            } 
                            else if (significantChar == 's') { // css style sheet.
                                var cssLink = $("<link rel='stylesheet' type='text/css' href='" + index + "'>");
                                $("head").append(cssLink);                             
                            }                        
                        });
                    }
                  
                    // Initialize standard fields in response data.
                    initializeAfterResponse();
                    // Set plugin param to selected content.
                    $("#jform_params_plugin").val(content);
                    
                    // Set active content button after success ajax call.                    
                    $('.pweb-btn-content-wrapper').each(function(){
                        $(this).removeClass('active');
                    });
                    $('#pweb_btn_content_' + content).parent().parent().addClass('active');                    

                    // Show content options accordion group.
                    acc_group_content_options.removeClass('pweb-hidden');
                    
                    // Open accordion with content after choosing plugin/content.
                    if (content_accordion.hasClass('collapsed')) {
                        // When creating new module instance after clicking button in plugin there were errors with opening accordion gorup.
                        if (!urlWithHash) {
                            content_accordion.click();
                        }
                    }   
                    
                    // Go to top of the page.
                    if (goToTop) {
                        $('html, body').animate({ scrollTop: $('#pweb_content_acc_group').offset().top - 80 }, 100);
                    }                    
                    
                    if (!data) {
                        // Set name of new choosen plugin in content accordion group header.             
                        acc_group_content_name.html(plugin_name);
                    }
                    
                    removeDisableFromParams();                    
                    // If plugin was changed.
                    if (currentPlugin != content) {
                        // Set required parameters when choosing new plugin.
                        setDefaultParams(content, 'required');
                        if (!currentPlugin || window.location.href.indexOf("&id=") < 0) {
                            // Set optional parameters when choosing new plugin and there wasn't any selected before.
                            setDefaultParams(content, 'optional');
                        }
                    }
                    disableParams(content);
                    
                    // For link plugin set default effect. We use setDefaultParams and disableParams but keep this code for a while.
                    if (content == 'link') {
                        $('#jform_params_open_event').parent().parent().addClass('pweb-hidden');
                        $('#jform_params_close_event').parent().parent().addClass('pweb-hidden');
                        $('#jform_params___field26-lbl').parent().parent().addClass('pweb-hidden');
                        $('#jform_params_open_toggler0').click();
                        $('#jform_params_open_toggler').parent().parent().addClass('pweb-hidden');
                        $('#jform_params_close_delay').parent().parent().addClass('pweb-hidden');
                        $('#jform_params_effect7').click();
                    } else {
                        $('#jform_params_open_event').parent().parent().removeClass('pweb-hidden');
                        $('#jform_params_close_event').parent().parent().removeClass('pweb-hidden');
                        $('#jform_params___field26-lbl').parent().parent().removeClass('pweb-hidden');
                        $('#jform_params_open_toggler').parent().parent().removeClass('pweb-hidden');
                        $('#jform_params_close_delay').parent().parent().removeClass('pweb-hidden');                      
                    }                     
                    
                    // Set correct plugin in module's summary.
                    content_summary_info.html(plugin_name); 
                    
                    // Set page title with current plugin name.
                    setPageTitle(content);
                }
                else {
                    // Set name of new choosen plugin in content accordion group header.   
                    acc_group_content_name.html(plugin_name);
                    
                    // Alert when plugin's params can't be loaded.
                    var additional_warning = '';
                    if ($('#com_ajax_update_error').length > 0)
                    {
                        additional_warning = ' ' + $('#com_ajax_update_error').html();
                    }
                    content_options.html('<div class="alert alert-error span12">' + Joomla.JText._('MOD_PWEBBOX_PLUGIN_NOT_ENABLED') + additional_warning + '</div>');
                    
                    // Show content options accordion group.
                    acc_group_content_options.removeClass('pweb-hidden');
                    
                    // Open accordion with content after choosing plugin/content.
                    if (content_accordion.hasClass('collapsed')) {
                        // When creating new module instance after clicking button in plugin there were errors with opening accordion gorup.
                        if (!urlWithHash) {
                            content_accordion.click();
                        }
                    }   
                    
                    // Go to top of the page.
                    if (goToTop) {
                        $('html, body').animate({ scrollTop: $('#pweb_content_acc_group').offset().top - 80 }, 100);
                    }                    
                    
                    // Set correct plugin in module's summary.
                    content_summary_info.html('');             
                    
                    // Set page title with current plugin name.
                    setPageTitle(content);
                }
            }
        }).done(function() {
            
        });         
    };
    
    // Set default content's parameters.
    function setDefaultParams(content, type) {
        var contentDefaultConfig = $("#pweb_btn_content_" + content).data("default-config");
        
        if (typeof contentDefaultConfig != 'undefined' && contentDefaultConfig != null) {
            // Set parameters.
            var paramsSource = null;
            if (type == 'required' && typeof contentDefaultConfig.required != 'undefined') {
                paramsSource = contentDefaultConfig.required;
            }
            else if (type == 'optional' && typeof contentDefaultConfig.optional != 'undefined') {
                paramsSource = contentDefaultConfig.optional;
            }
            if (paramsSource) {
                var input = null, label = null, option = null, optionText = null;        
                $.each( paramsSource, function(option, value) {
                    var field = $("#jform_params_" + option);

                    // Set default theme.
                    if (option == "theme") {
                        $('#pweb-themes-coverflow').find("[data-name='" + value + "']").click();
                        $('#pweb-themes-coverflow-control-load').click();                
                    }            

                    input = null, label = null, option = null, optionText = null;

                    // Check if field exists.
                    if (field.prop("tagName")) {
                        if (field.prop("tagName").toLowerCase() === "fieldset") { // Set value for radio inputs.
                            input = field.find('input[value="' + value + '"]');
                            label = input.parent().find('label[for="' + input.attr("id") + '"]');
                            label.click();
                            input.prop("checked", true).trigger("change");
                            input.click();
                        }
                        else if (field.prop("tagName").toLowerCase() === "select") { // Set value for select inputs.
                            option = field.find('option[value="' + value + '"]');
                            optionText = option.text();
                            option.prop("selected", true).trigger("change");
                            option.parent().parent().find('.chzn-container .chzn-single span').html(optionText);
                        }
                        else { // Set value for text inputs.
                            field.val(value).trigger("change");
                            field.click();
                        }
                    }
                }); 
            }
        }
    }
    
    function disableParams(content) {
        var contentDefaultConfig = $("#pweb_btn_content_" + content).data("default-config");
        
        if (typeof contentDefaultConfig != 'undefined' && contentDefaultConfig != null) {
            if (typeof contentDefaultConfig.disabled != 'undefined') {
                var input = null, label = null, option = null, valuesArray = null, wrongSelection = false, rightSelection = null;        
                $.each( contentDefaultConfig.disabled, function(option, value) {
                    var field = $("#jform_params_" + option);           

                    input = null, label = null, option = null, valuesArray = null, wrongSelection = false, rightSelection = null;
                    
                    if (value != 'disable-all') {
                        valuesArray = value.split(',');
                    }

                    // Check if field exists.
                    if (field.prop("tagName")) {
                        if (field.prop("tagName").toLowerCase() === "fieldset") { // Set value for radio inputs.
                            // If disable all options from fieldset.
                            if (value == 'disable-all') {
                                field.attr("disabled", "disabled");
                                field.addClass("disabled");
                                field.find('input').each(function(){
                                    $(this).addClass("disabled");
                                    $(this).attr("disabled", "disabled");
                                });
                                field.find('label').each(function(){
                                    $(this).addClass("disabled");
                                    $(this).attr("disabled", "disabled");
                                    $(this).css("cursor", "not-allowed");
                                });
                            }
                            // If disable some options from fieldset.
                            else {
                                $.each(valuesArray, function(opt, val) {
                                    input = field.find('input[value="' + val + '"]');
                                    // Check if disabled option is selected.
                                    if (input.is(':checked')) {
                                        wrongSelection = true;
                                    }
                                    label = input.parent().find('label[for="' + input.attr("id") + '"]');
                                    input.attr("disabled", "disabled");
                                    input.addClass("disabled");
                                    label.attr("disabled", "disabled");
                                    label.addClass("disabled");
                                    label.css("cursor", "not-allowed");
                                });
                                
                                // If disabled option is selected, then select first enabled option.
                                if (wrongSelection) {
                                    rightSelection = field.find('input:not(.disabled)').first();
                                    if (rightSelection) {
                                        label = rightSelection.parent().find('label[for="' + rightSelection.attr("id") + '"]');
                                        label.click();
                                        rightSelection.prop("checked", true).trigger("change");
                                        rightSelection.click();
                                    }
                                }
                            }
                        }
                        else if (field.prop("tagName").toLowerCase() === "select") { // Set value for select inputs.
                            if (value == 'disable-all') {
                                field.attr("disabled", "disabled");
                                field.addClass("disabled");
                            }
                            else {
                                $.each(valuesArray, function(opt, val) {                                
                                    field.find('option[value="' + val + '"]').attr("disabled", "disabled");
                                    field.find('option[value="' + val + '"]').addClass("disabled");
                                });
                            }
                        }
                        else { // Set value for text inputs.
                            field.attr("disabled", "disabled");
                            field.addClass("disabled");
                        }
                    }                    
                }); 
            }
        }        
    }
    
    function removeDisableFromParams() {
        $('#pweb_accordion1 fieldset').each(function(){
            $(this).removeAttr("disabled");
            $(this).removeClass("disabled");
        });
        $('#pweb_accordion1 select').each(function(){
            $(this).removeAttr("disabled");
            $(this).removeClass("disabled");
            $(this).find('option').each(function() {
                $(this).removeAttr("disabled");
                $(this).removeClass("disabled");
            });            
        });
        $('#pweb_accordion1 input').each(function(){
            $(this).removeAttr("disabled");
            $(this).removeClass("disabled");
        });       
        $('#pweb_accordion1 label').each(function(){
            $(this).removeAttr("disabled");
            $(this).removeClass("disabled");
            $(this).css("cursor", "pointer");
        });       
    }    
    
    // Prepare module content after success ajax response - standard form elements.
    window.initializeAfterResponse = function() {
        // Turn radios into btn-group
        $('.content-ajax .radio.btn-group label').addClass('btn');
        $('.content-ajax .btn-group label:not(.active)').click(function()
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
        $('.content-ajax .btn-group input[checked=checked]').each(function()
        {
            if ($(this).val() == '') {
                $('label[for=' + $(this).attr('id') + ']').addClass('active btn-primary');
            } else if ($(this).val() == 0) {
                $('label[for=' + $(this).attr('id') + ']').addClass('active btn-danger');
            } else {
                $('label[for=' + $(this).attr('id') + ']').addClass('active btn-success');
            }
        });  
        
        // Initialize color type fields.
        $('.content-ajax .minicolors').each(function() {
                $(this).minicolors({
                        control: $(this).attr('data-control') || 'hue',
                        position: $(this).attr('data-position') || 'right',
                        theme: 'bootstrap'
                });
        });  
        
        $('.content-ajax .hasTooltip').tooltip({"html": true,"container": "body"});
        
        // Initialize color type fields for J!2.5.
        if (typeof initColorPickersJ25 !== 'undefined' && $.isFunction(initColorPickersJ25)) {
            initColorPickersJ25();
        }
        
        // Initialize fields tooltips for J!2.5.
        if (typeof initTooltipsJ25 !== 'undefined' && $.isFunction(initTooltipsJ25)) {
            initTooltipsJ25();
        }
        
        // Initialize modal box.
        SqueezeBox.initialize({});
        SqueezeBox.assign($('a.modal').get(), {
                parse: 'rel'
        });  
	window.jModalClose = function() {
            SqueezeBox.close();
        };
        
        // Initialize select item from modal box for Joomla Content/FLEXIcontent and Seblod.
        //was - jSelectArticle_jform_params_article_id; now - jSelectArticle_jform_params_ + _plugin_config__params_ + article_id
	window.jSelectArticle_jform_params__plugin_config__params_article_id = function(id, title, catid, object) {
		document.getElementById("jform_params__plugin_config__params_article_id_id").value = id;
		document.getElementById("jform_params__plugin_config__params_article_id_name").value = title;
		jQuery("#jform_params__plugin_config__params_article_id_edit").removeClass("hidden");
		jModalClose();
	};  
        
        // Initialize select item from modal box for K2 .
        window.jSelectItem = function(id, title, object) {
                document.getElementById('jform[params][plugin_config][params][article_id]' + '_id').value = id;
                document.getElementById('jform[params][plugin_config][params][article_id]' + '_name').value = title;
                if(typeof(window.parent.SqueezeBox.close=='function')){
                        window.parent.SqueezeBox.close();
                }
                else {
                        document.getElementById('sbox-window').close();
                }
        };   
        
        // Initialize chosen jQuery plugin for select boxes.
        if (typeof $.fn.chosen !== 'undefined' && $.isFunction($.fn.chosen)) {
            $('#pweb_content_acc_group select').chosen({
                "disable_search_threshold":10,
                "allow_single_deselect":true,
                "placeholder_text_multiple":"Select some options",
                "placeholder_text_single":"Select an option",
                "no_results_text":"No results match"
            });
        }
    };
    
    // Showon functionality for all J! versions.
    var elements = {},
            linkedoptions = function(element, target, checkType) {
                    var v = element.val(), id = element.attr('id');
                    if(checkType && !element.is(':checked'))
                            return;
                    $('[rel=\"pweb_showon_'+target+'\"]').each(function(){
                            var i = jQuery(this);
                            if (i.hasClass('pweb_showon_' + v))
                                    i.slideDown();
                            else
                                    i.slideUp();
                    });
            };
    $('[rel^=\"pweb_showon_\"]').each(function(){
            var el = $(this), target = el.attr('rel').replace('pweb_showon_', ''), targetEl = $('[name=\"' + target+'\"]');
            if (!elements[target]) {
                    var targetType = targetEl.attr('type'), checkType = (targetType == 'checkbox' || targetType == 'radio');
                    targetEl.bind('change', function(){
                            linkedoptions( $(this), target, checkType);
                    }).bind('click', function(){
                            linkedoptions( $(this), target, checkType );
                    }).each(function(){
                            linkedoptions( $(this), target, checkType );
                    });
                    elements[target] = true;
            }
    }); 
    
    // Bind handlers with effects.
    $('input[name="jform[params][handler]"]').each(function(){
        $(this).on('change', function(){
            if ($(this).is(':checked')) {
                var id = $(this).attr('id');
                var target = '';
                var id_prefix = 'jform_params_handler';
                if (id == (id_prefix + '0')) {
                    if ($('#jform_params_effect0').is(':checked') || $('#jform_params_effect1').is(':checked') || $('#jform_params_effect8').is(':checked')) {
                        target = '#jform_params_effect6';
                    }
                }
                else if (id == (id_prefix + '1')) {
                    if ($('#jform_params_effect6').is(':checked') || $('#jform_params_effect8').is(':checked')) {
                        target = '#jform_params_effect0';
                    }
                }
                else if (id == (id_prefix + '2')) {
                    target = '#jform_params_effect7';
                }
                else if (id == (id_prefix + '3')) {
                    if ($('#jform_params_effect0').is(':checked') || $('#jform_params_effect1').is(':checked') || $('#jform_params_effect6').is(':checked') || $('#jform_params_effect7').is(':checked') || $('#jform_params_effect8').is(':checked')) {
                        target = '#jform_params_effect2';
                    }
                }
                else if (id == (id_prefix + '4')) {
                    target = '#jform_params_effect8';
                }
                
                if (target != '') {
                        $(target).click();                   
                } 
                
                // Change summary info after changing Location & Effects parameters.     
                var handler_summary_info = $('#pweb_summary_handler span');
                var lang_var = 'MOD_PWEBBOX_VALUE_' + $(this).val().toUpperCase();

                handler_summary_info.html(Joomla.JText._(lang_var));  
            }            
        });
    }); 
    
    // Bind effects with handlers.
    $('input[name="jform[params][effect]"]').each(function(){
        $(this).on('change', function(){
            if ($(this).is(':checked')) {
                var id = $(this).attr('id');
                var target = '';
                var id_prefix = 'jform_params_effect';
                if (id == (id_prefix + '0') || id == (id_prefix + '1')) {
                    if ($('#jform_params_handler0').is(':checked') || $('#jform_params_handler2').is(':checked') || $('#jform_params_handler3').is(':checked') || $('#jform_params_handler4').is(':checked')) {
                        target = '#jform_params_handler1';
                    }
                }
                else if (id == (id_prefix + '2') || id == (id_prefix + '3') || id == (id_prefix + '4') || id == (id_prefix + '5')) {
                    if ($('#jform_params_handler2').is(':checked') || $('#jform_params_handler4').is(':checked')) {
                        target = '#jform_params_handler1';
                    }
                }
                else if (id == (id_prefix + '6')) {
                    if ($('#jform_params_handler1').is(':checked') || $('#jform_params_handler2').is(':checked') || $('#jform_params_handler3').is(':checked') || $('#jform_params_handler4').is(':checked')) {
                        target = '#jform_params_handler0';
                    }
                }                
                else if (id == (id_prefix + '7')) {
                    if ($('#jform_params_handler3').is(':checked') || $('#jform_params_handler4').is(':checked')) {
                        target = '#jform_params_handler2';
                    }
                }
                else if (id == (id_prefix + '8')) {
                    target = '#jform_params_handler4';
                }

                $(target).click();
                
                // Change summary info after changing Location & Effects parameters.     
                var effect_summary_info = $('#pweb_summary_effect span');
                var lang_var = '';
                var selected_val = $(this).val();
                
                if (selected_val == 'slidebox:slide_in') {
                    lang_var = 'MOD_PWEBBOX_VALUE_SLIDEBOX_SLIDE_IN';
                }
                else if (selected_val == 'slidebox:slide_in_full') {
                    lang_var = 'MOD_PWEBBOX_VALUE_SLIDEBOX_SLIDE_IN_FULL';
                }
                else if (selected_val == 'modal:fade') {
                    lang_var = 'MOD_PWEBBOX_VALUE_MODAL_FADE';
                }
                else if (selected_val == 'modal:rotate') {
                    lang_var = 'MOD_PWEBBOX_VALUE_MODAL_ROTATE';
                }
                else if (selected_val == 'modal:square') {
                    lang_var = 'MOD_PWEBBOX_VALUE_MODAL_SQUARE';
                }
                else if (selected_val == 'modal:smooth') {
                    lang_var = 'MOD_PWEBBOX_VALUE_MODAL_SMOOTH';
                }
                else if (selected_val == 'accordion:slide_down') {
                    lang_var = 'MOD_PWEBBOX_VALUE_ACCORDION_SLIDE_DOWN';
                }
                else if (selected_val == 'static:none') {
                    lang_var = 'MOD_PWEBBOX_VALUE_ACCORDION_STATIC_NONE';
                }

                effect_summary_info.html(Joomla.JText._(lang_var));                  
            }            
        });
    });
    
    // Set auto open for bottom bar handler.
    $('#jform_params_handler').find('input').change(function(){
        var input, label;
        if ($(this).val() == 'bottombar') {
            input = $('#jform_params_open_toggler').find('input[value="1"]');
            label = input.parent().find('label[for="' + input.attr("id") + '"]');
            label.click();
            input.prop("checked", true).trigger("change");
            input.click();     

            $('#jform_params_open_count').val(0);
        }
        else {
            input = $('#jform_params_open_toggler').find('input[value="0"]');
            label = input.parent().find('label[for="' + input.attr("id") + '"]');
            label.click();
            input.prop("checked", true).trigger("change");
            input.click();                
        }
    });
    
    // Set plugin if there is #plugin-xxx in URL and module id isn't set.
    function setPlugin() {
        // Check if id in URL is set and if not load plugin.
        if(window.location.href.indexOf("&id=") < 0)
        {
            var pluginHash = window.location.hash;
            if (pluginHash) {
                var hashArr = pluginHash.split('-');
                var plugin = hashArr[1];
                ajaxCall(plugin, null, true, false);
            }
        }   
    }
    setPlugin();
        
    // Take care of action after clicking download content/plugin in content tab.
    $('#pweb_content_btns_acc_group').on('click', '.pweb-btn-install-content', function(e) {
        e.preventDefault();
        var url = $(this).data('url'),
            token = $(this).data('token'),
            pwebForm = $('#pwebInstallForm');
            
        if (url.indexOf("https:") == -1) {
            url = 'https:' + url;
        }
        
        // Create form if doesn't exists with correct url and token.
        if (!pwebForm.length) {
            // Create form.
            var form    =   '<form enctype="multipart/form-data"'
                        +   'action="index.php?option=com_installer&amp;view=install"'
                        +   'method="post" name="pwebInstallForm" id="pwebInstallForm" target="_blank">'
                        +   '<input type="hidden" name="type" value="" />'
                        +   '<input type="hidden" name="installtype" value="url" />'
                        +   '<input type="hidden" name="install_url" value="' + url + '" />'
                        +   '<input type="hidden" name="task" value="install.install" />'
                        +   '<input type="hidden" name="' + token + '" value="1" />'
                        +   '</form>';
                
            $('body').append(form);
            
            pwebForm = $('#pwebInstallForm');
        }
        // If form already exists change url to new one.
        else {
            pwebForm.find('input[name="install_url"]').val(url);
        }
        
        pwebForm.submit();
    });
    
    // Communication with Pweb server to gather information about plugins.
    window.pwebServerCommunication = function(lastRequestData, jVersion, pluginForAjaxCall) {
        var sendData = {
            'jversion' : jVersion,
                'dlid' : null
        };        
        $.ajax({
            type : 'GET',
            url : modPwebBoxInfoUrl,
            data : sendData,
            jsonpCallback : 'pwebJsonpCallback',
            contentType: "application/json",
            dataType: 'jsonp',
            success: function(pwebServResponse) {
                // Make thing only when last request data is older than last update of modPwebBoxInfoUrl json data.
                //if (!lastRequestData || (new Date(pwebServResponse.updated) > new Date(lastRequestData))) {
                    if (pluginForAjaxCall) {
                        // Save Pweb server response in local file.               
                        var request = {
                            'option' : 'com_ajax',
                            'group' : 'everything_in_everyway',
                            'plugin' : pluginForAjaxCall,
                            'format' : 'json',
                            'pwebServerCommunication': true,
                            'data' : pwebServResponse
                        };
                        $.ajax({
                            type    : 'POST',
                            data    : request,
                            dataType : 'json',
                            success : function (pluginResponse) {
                                
                            },
                            error: function(e) {
                               console.log(e.message);
                            }                            
                        });
                        
                        if (!lastRequestData || (new Date(pwebServResponse.updated) > new Date(lastRequestData))) {
                            // Set text and url for "Buy all plugins!" (when module is running for the first time - there isn't any cache - so url will be empty).
                            var buyAllBtn = $('#buy_all_plugins');
                            if (pwebServResponse.bundle.price != buyAllBtn.html()) {
                                buyAllBtn.html(pwebServResponse.bundle.price);
                            }

                            if (pwebServResponse.bundle.url != buyAllBtn.attr('href')) {
                                buyAllBtn.attr('href', pwebServResponse.bundle.url);
                            }

                            // Set themes price if not set.
                            var pwebThemesPriceInput = $('#pweb_themes_price');                        
                            if (!pwebThemesPriceInput.length) {
                                $('#pweb-themes-coverflow-controls').append('<input type="hidden" id="pweb_themes_price" value="' + pwebServResponse.theme.price + '">');
                            }
                            // Set themes new price.
                            else if (pwebThemesPriceInput.val() != pwebServResponse.theme.price) {
                                pwebThemesPriceInput.val(pwebServResponse.theme.price);
                            }

                            // Set themes url if not set.
                            var pwebThemesUrlInput = $('#pweb_themes_url');                          
                            if (!pwebThemesUrlInput.length) {
                                $('#pweb-themes-coverflow-controls').append('<input type="hidden" id="pweb_themes_url" value="' + pwebServResponse.theme.url + '">');
                            }
                            // Set themes new url.
                            else if (pwebThemesUrlInput.val() != pwebServResponse.theme.url) {
                                pwebThemesUrlInput.val(pwebServResponse.theme.url);
                            }                        

                            // Keep info about previous plugin button to set order from Pweb server info.
                            var previous = null;

                            // Check if to display additional button with new plugins.
                            pwebServResponse.plugins.each(function(plugin) {
                                var btnsWrapper = $('#pweb_content_btns_acc_group');
                                var currentBtn = btnsWrapper.find('button[data-name="' + plugin.name + '"]');
                                var mark = '';

                                // Add button if it doesn't exists.
                                if (!currentBtn.length) {
                                    //console.log(newPlgName);
                                    var pluginAdditionalInfo = '';

                                    if (plugin.price) {
                                        pluginAdditionalInfo = '<a href="' + plugin.url + '" class="btn btn-warning pweb-cant-override-update" target="_blank">' + plugin.price + '</a>';
                                    }
                                    else if (plugin.url) {
                                        var formToken = $('#pwebFormToken').val();
                                        pluginAdditionalInfo = '<button type="button" data-url="' 
                                                                + plugin.url 
                                                                + '" data-token="' 
                                                                + formToken 
                                                                + '" class="btn btn-success pweb-btn-install-content pweb-cant-override-update" >' 
                                                                + Joomla.JText._('MOD_PWEBBOX_BUTTON_LINK_DOWNLOAD_GROUP_LABEL') 
                                                                + '</button>';
                                    }
                                    else {
                                        pluginAdditionalInfo = Joomla.JText._('MOD_PWEBBOX_COMMING_SOON_LABEL');
                                    }

                                    if (plugin.new) {
                                        mark = '<div class="mark-wrapper"><span class="mark mark-new">' + Joomla.JText._('MOD_PWEBBOX_NEW_LABEL') + ' <span>' +  Joomla.JText._('MOD_PWEBBOX_NEW_LETTER_LABEL') + '</span></span></div>';
                                    }
                                    else if (plugin.popular) {
                                        mark = '<div class="mark-wrapper"><span class="mark mark-popular">' + Joomla.JText._('MOD_PWEBBOX_POPULAR_LABEL') + ' <span>' + Joomla.JText._('MOD_PWEBBOX_POPULAR_LETTER_LABEL') + '</span></span></div>';
                                    }

                                    var wholePlgBtn = '<div class="pweb-btn-content-wrapper not-selectable">'
                                                    +       mark
                                                    +       '<div class="pweb-btn-content-wrapper-in">'
                                                    +           '<button type="button" class="pweb-btn-large  pweb-button-content" data-name="' + plugin.name + '" disabled>'
                                                    +               '<img src="' + plugin.image + '" alt="' + plugin.name + '" title="' + plugin.name + '">'
                                                    +           '</button>'
                                                    +       '</div>'
                                                    +       '<div class="text-center">' + pluginAdditionalInfo + '</div>'
                                                    + '</div>';

                                    if (!previous) {
                                        btnsWrapper.find('.pwebPlgBtnsWrapper').prepend(wholePlgBtn);
                                    }
                                    else {
                                        $(wholePlgBtn).insertAfter(btnsWrapper.find('button[data-name="' + previous.name + '"]').parent().parent());
                                    }
                                }
                                // If button exists check if image has src and if there is update available.
                                else {
                                    var plgImg = currentBtn.find('img');
                                    if (!plgImg.attr('src')) {
                                        plgImg.attr('src', plugin.image);
                                    }
                                    var currentVersion = currentBtn.data('version');

                                    // Add update button.
                                    if (currentVersion && (String(currentVersion) < String(plugin.version))) {
                                        var pluginAdditionalInfo = '<a href="index.php?option=com_installer&view=update" class="btn btn-warning pweb-btn-update" target="_blank">' + Joomla.JText._('MOD_PWEBBOX_BUTTON_LINK_UPDATE_LABEL') + '</a>';

                                        // Add button if button that can't be replaced by update button doesn't already exists.
                                        if (!currentBtn.parent().parent().find('.pweb-cant-override-update').length) {
                                            currentBtn.parent().parent().find('.text-center').html(pluginAdditionalInfo);
                                        }
                                    }
                                    var currentBtnWrapper = '';
                                    currentBtnWrapper = currentBtn.parent().parent().clone().wrap('<div>').parent().html();
                                    currentBtn.parent().parent().remove();                                    
                                    if (previous) {
                                        $(currentBtnWrapper).insertAfter(btnsWrapper.find('button[data-name="' + previous.name + '"]').parent().parent());
                                    } 
                                    else {
                                        btnsWrapper.find('.pwebPlgBtnsWrapper').prepend(currentBtnWrapper);
                                    }
                                }

                                previous = plugin;                  
                            });
                        }
                    }
                //}
                /*else {
                    if (pluginForAjaxCall) {
                        // Save only request data in local file.               
                        var request = {
                            'option' : 'com_ajax',
                            'group' : 'everything_in_everyway',
                            'plugin' : pluginForAjaxCall,
                            'format' : 'json',
                            'pwebServerCommunication': true,
                            'data' : {'update_only_request_date' : 1}
                        };
                        $.ajax({
                            type    : 'POST',
                            data    : request,
                            dataType : 'json',
                            success : function (pluginResponse) {
                                
                            },
                            error: function(e) {
                               console.log(e.message);
                            }                            
                        });
                    }
                }*/
            },
            error: function(e) {
               console.log(e.message);
            }
        });
    };
    
    // Prepare plugin form with values.
    window.getPluginFormWithValues = function(content, data) {
        ajaxCall(content, data, false, false);
    };
    
    // validate url
    $('.pweb-filter-url').on('change', function() {
            var regex = /^((http|https):){0,1}\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?$/i;
            if (!this.value || regex.test(this.value)) {
                    $(this).removeClass('invalid').closest('.control-group').removeClass('error');
            } else {
                    $(this).addClass('invalid').closest('.control-group').addClass('error');
            }
    });    
});