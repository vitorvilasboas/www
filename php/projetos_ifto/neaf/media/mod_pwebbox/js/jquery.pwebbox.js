/*!
 * @package     pwebbox
 * @version 	2.0.9
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 * 
 * jQuery 1.8+
 */

var pwebBoxes = pwebBoxes || [], 
    pwebbox_l10n = pwebbox_l10n || {};
    
(function ($) {
    
    pwebBox = function (options) {
        this.init(options);
    };
    
    pwebBox.prototype = (function () {
        
        // private members
        
        // public members
        
        return {
            constructor: pwebBox, 
            
            defaults: {
                id: "", 
                selector: "#pwebbox", 
                selectorClass: ".pwebbox", 
                debug: false, 
                bootstrap: 2, 
                
                openAuto: false, 
                openDelay: 0, 
                maxAutoOpen: 0, 
                closeAuto: false, 
                closeDelay: 0, 
                closeOther: true, 
                
                layout: "slidebox", 
                theme: "", 
                position: "left", 
                offsetPosition: "top", 
                msgCloseDelay: 10, 
                
                togglerNameOpen: "", 
                togglerNameClose: "", 
                
                slideWidth: 0, 
                slideDuration: 400, 
                slideTransition: "swing", 
                
                accordionDuration: 500, 
                accordionEaseIn: "easeInBack", 
                accordionEaseOut: "easeOutBounce", 
                
                modalBackdrop: true, 
                modalClose: true, 
                modalStyle: "default", 
                modalEffect: "fade", 
                modalEffectDuration: 400, 
                modalEaseIn: "easeInCubic", 
                modalEaseOut: "easeOutCubic", 
                
                cookieLifetime: 30, 
                cookiePath: "/", 
                cookieDomain: "", 
                
                onLoad: function () {}, 
                onOpen: function () {}, 
                onClose: function () {}, 
                onTrack: function () {}
            }, 
            
            status: 0, 
            hidden: true, 
            timer: false, 
            
            init: function (options) 
            {
                
                var that = this;
                
                this.options = $.extend({}, this.defaults, options);
                
                this.options.selector = this.options.selector + this.options.id;
                this.options.selectorClass = this.options.selectorClass + this.options.id;
                
                this.element = $(this.options.selector);
                this.Content = $(this.options.selector + "_content");
                this.Toggler = $(this.options.selector + "_toggler");
                this.Box = $(this.options.selector + "_box");
                this.Container = $(this.options.selector + "_container");
                
                this.options.autoClose = (this.options.closeDelay > 0) ? true : false;
                this.options.tracked = false;
                this.options.openEvent = 'click';
                
                if (this.Box.hasClass('pweb-open-event-mouseenter'))
                {
                    this.options.openEvent = 'mouseenter';
                }                 
                this.options.closeEvent = 'click';
                if (this.Box.hasClass('pweb-close-event-mouseleave'))
                {
                    this.options.closeEvent = 'mouseleave';
                }                 

                // apply toggler class to links with toggler hash
                $('a[href="'+this.options.selector+'_toggler"]').addClass((this.options.selector.replace('#', ''))+'_toggler');
                
                if (this.options.layout == "slidebox") 
                {
                    // move box
                    this.element.appendTo(document.body);
                    
                    // slidebox
                    this.initSlidebox();
                } 
                else 
                {
                    if (this.options.layout == "modal") 
                    {
                        // move box
                        this.element.appendTo(document.body);
                        
                        if (!this.initModal()) 
                        {
                            return false;
                        }
                    } 
                    else {
                        if (this.options.layout == "accordion") 
                        {
                            // accordion
                            this.initAccordion();
                        }
                    }
                }
                
                // load event
                this.options.onLoad.apply(this);
                this.element.trigger("onLoad");
                
                var openOnLoad = false;
                if (document.location.hash.indexOf(this.options.selector + ":") !== -1) {
                    var data = document.location.hash.replace(this.options.selector + ":", "");
                    if (data.indexOf("open") === 0 && (typeof data[4] === "undefined" || data[4] == ":")) {
                        data = data.replace(/open(:)?/i, "");
                        openOnLoad = true;
                    }
                }
                
                if (this.options.layout != "static") 
                {
                    if (this.options.openEvent == 'click' && this.options.closeEvent == 'click') 
                    {
                        $(this.options.selectorClass + "_toggler").click(function (e) {
                            e.preventDefault();
                            that.toggleBox(-1, -1, this, e);
                        });
                    } 
                    else 
                    {
                        this.Box.find('.pweb-button-close').click(function (e) {
                            e.preventDefault();
                            that.toggleBox(-1, -1, this, e);
                        });                        
                        if (this.options.openEvent == 'mouseenter') 
                        {
                            $(this.Toggler).mouseenter(function (e) {
                                e.preventDefault();
                                that.toggleBox(1, 1, this, e);
                            });                        
                        }
                        else 
                        {
                            $(this.Toggler).click(function (e) {
                                e.preventDefault();
                                that.toggleBox(1, 1, this, e);
                            });                        
                        }
                        if (this.options.closeEvent == 'mouseleave') 
                        {
                            var mouseTarget = this.element;
                            if (this.options.layout == 'modal') {
                                mouseTarget = this.Box;
                            }
                            $(mouseTarget).mouseleave(function (e) {
                                if (that.Toggler.hasClass('pweb-opened')) {
                                    e.preventDefault();
                                    that.toggleBox(0, -1, this, e);
                                }
                            });                        
                        }
                        else 
                        {
                            $(this.Toggler).click(function (e) {
                                if (that.Toggler.hasClass('pweb-opened')) {
                                    e.preventDefault();
                                    that.toggleBox(0, -1, this, e);
                                }
                            });                        
                        }
                    }
                    if (this.options.togglerNameClose) {
                        this.options.togglerNameOpen = this.Toggler.find(".pweb-text").text();
                    }
                    if (this.options.closeOther) {
                        pwebBoxes.push(this);
                    }
                    if (openOnLoad) 
                    {
                        this.autoPopupOnPageLoad();
                    } 
                    else 
                    {
                        if (this.options.openAuto) 
                        {
                            if (this.options.maxAutoOpen > 0) 
                            {
                                if (!this.initAutoPopupCookie())
                                {
                                    this.options.openAuto = false;
                                }
                            }
                            
                            switch (this.options.openAuto) {
                                case 1:
                                    this.autoPopupOnPageLoad();
                                    break;
                                case 2:
                                    this.autoPopupOnPageScroll();
                                    break;
                                case 3:
                                    this.autoPopupOnPageExit();
                                }
                        }
                    }
                    if(that.options.layout == 'bottombar')
                    {
                            var bottomBarHeight = $(that.options.selector).find('.pwebbox-container').outerHeight();
                            that.Toggler.height(bottomBarHeight).css('line-height', bottomBarHeight + 'px');
                    }
                    $(window).resize(function() {
                        if(that.options.layout == 'bottombar')
                        {
                            var bottomBarHeight = $(that.options.selector).find('.pwebbox-container').outerHeight();
                            that.Toggler.height(bottomBarHeight).css('line-height', bottomBarHeight + 'px');
                        }
                    });
                }
                this.initHiddenFields();
                return this;
            }, 
            
            initSlidebox: function () 
            {
                
                var that = this;
                
                // init slide box options
                this.options.togglerSlide = this.Box.hasClass("pweb-toggler-slide");
                this.options.togglerHidden = this.Box.hasClass("pweb-toggler-hidden");
                
                // initialize box position and size
                this.options.slidePos = this.element.css("position");       
                if (!this.options.slideWidth) {
                    this.options.slideWidth = parseInt(this.Box.css("max-width"));
                }
                this.Box.css("width", this.options.slideWidth);
                if (this.options.position == "left" || this.options.position == "right") 
                {
                    this.Box.css(this.options.position, -this.options.slideWidth);
                    
                    this.options.togglerWidth = this.options.togglerSlide ? this.Toggler.outerWidth() : 0;
                    this.options.togglerHeight = this.options.togglerSlide ? parseInt(this.Box.css("top")) : 0;
                    this.options.slideOffset = parseInt(this.element.css("top"));
                    
                    // set toggler position
                    if (this.options.togglerSlide) 
                    {
                        this.Toggler.css(this.options.position == "left" ? "right" : "left", -this.Toggler.outerWidth());
                    }
                } 
                else 
                {
                    setTimeout(function () {
                        that.Box.css(that.options.position, -that.Box.height())
                    }, 100);
                    
                    this.options.togglerWidth = 0;
                    this.options.togglerHeight = this.options.togglerSlide ? this.Toggler.outerHeight() : 0;
                    this.options.slideOffset = 0;
                    
                    // set toggler position
                    if (this.options.togglerSlide) 
                    {
                        this.Toggler.css(this.options.position == "top" ? "bottom" : "top", -this.Toggler.outerHeight());
                    }
                }
                this.Box.addClass("pweb-closed");
                
                setTimeout(function () {
                    that.Box.removeClass("pweb-init");
                }, 100);
                
                // hidden toggler
                if (this.options.togglerHidden) {
                    this.Toggler.fadeOut(0).removeClass("pweb-closed").addClass("pweb-opened");
                    if (this.options.togglerNameClose) {
                        this.Toggler.find(".pweb-text").text(this.options.togglerNameClose)
                    }
                }
                
                // is Firefox
                this.isFF = navigator.userAgent.indexOf("Gecko") != -1;
                
                // change top offset to fit box into page
                $(window).scroll(function (e) {
                    
                    if (!that.hidden && that.element.css("position") == "absolute" && that.options.slidePos == "fixed") 
                    {
                        var offset = $(this).scrollTop();
                        if (that.options.position == "bottom") 
                        {
                            offset = offset + $(this).height();
                            if (offset > that.element.offset().top) {
                                if (that.isFF) {
                                    that.element.css("top", offset);
                                } else {
                                    that.element.stop().animate({top: offset}, 250, "linear");
                                }
                            }
                        } else {
                            offset = offset + that.options.slideOffset;
                            if (offset < that.element.offset().top) {
                                if (that.isFF) {
                                    that.element.css("top", offset);
                                } else {
                                    that.element.stop().animate({top: offset}, 250, "linear");
                                }
                            }
                        }
                    }
                });
                
                $(window).resize(function () {
                    
                    if (!that.hidden) 
                    {
                        var css = {width: that.options.slideWidth};
                        
                        var maxWidth = $(window).width();
                        
                        // calculate width of box
                        if (that.options.position == "left" || that.options.position == "right") 
                        {
                            if (that.options.slideWidth + that.options.togglerWidth > maxWidth) {
                                css.width = maxWidth - that.options.togglerWidth;
                            }
                        } 
                        else 
                        {
                            var offset = that.element.offset().left;
                            if (that.options.offsetPosition == "right") {
                                offset = $(document).width() - offset;
                            }
                            if (that.options.slideWidth + offset > maxWidth) {
                                css.width = maxWidth - offset;
                            }
                        }
                        
                        that.Box.css(css);
                        
                        // change position to absolute if box is bigger than viewport
                        if (that.options.slidePos == "fixed") 
                        {
                            var css = {position: "absolute"};
                            
                            if (that.options.position == "left" || that.options.position == "right") 
                            {
                                css.top = that.element.offset().top;
                                if (that.Box.height() + that.options.togglerHeight + css.top - $(window).scrollTop() <= $(window).height()) {
                                    css.position = "fixed";
                                    css.top = that.options.slideOffset;
                                }
                            } 
                            else 
                            {
                                if (that.Box.height() + that.options.togglerHeight > $(window).height()) {
                                    css.top = that.element.offset().top;
                                    if (that.options.position == "bottom") {
                                        css.bottom = "auto";
                                    }
                                } else {
                                    css.position = "fixed";
                                    css[that.options.position] = 0;
                                    if (that.options.position == "bottom") {
                                        css.top = "auto";
                                    }
                                }
                            }
                            that.element.css(css);
                        }
                    }
                });
            }, 
            
            initModal: function () 
            {
                var that = this;
                
                if (typeof $.fn.modal === "function") 
                {
                    this.Modal = $(this.options.selector + "_modal");
                    
                    // body class for opened modal
                    this.options.modalClass = "pwebbox" + this.options.id + "_modal-open pweb-modal-open" + (this.options.theme ? " pweb-theme-" + this.options.theme + "-modal" : "") + " pweb-modal-" + this.options.modalStyle;
                    
                    // initailize Bootstrap Modal
                    this.Modal.appendTo(document.body).modal({
                        show: false, 
                        //disable closing with esc key
                        keyboard: false, 
                        // to disable closing backdrop set: static
                        backdrop: !this.options.modalClose && this.options.modalBackdrop ? "static" : this.options.modalBackdrop
                    }).on(this.options.bootstrap === 2 ? "hidden" : "hidden.bs.modal", function (e) {
                        // do not close if clicked on box
                        e.stopPropagation();
                        if (e.target !== e.currentTarget) return;
                        
                        // close box
                        that.toggleBox(0);
                        // remove opened class from body
                        $(document.body).removeClass(that.options.modalClass);
                        // add closed class from box
                        that.Box.addClass("pweb-closed");
                        
                    }).on(this.options.bootstrap === 2 ? "show" : "show.bs.modal", function (e) {
                        // do not close if clicked on box
                        e.stopPropagation();
                        if (e.target !== e.currentTarget) return;
                        
                        // add opened class to body
                        $(document.body).addClass(that.options.modalClass);
                        // remove closed class from box
                        that.Box.removeClass("pweb-closed");
                        
                    }).click(function (e) {
                        // disable click on backdrop
                        if (e.target !== e.currentTarget || !that.options.modalClose) return;
                        // close box
                        that.toggleBox(0);
                    });
                    
                    // apply effect for animation if there is chosen one
                    if (this.options.modalEffect !== "fade" && this.options.modalEffect !== "drop") {
                        this.initGenie();
                    }
                    
                    return true;
                } 
                else 
                {
                    if (this.options.debug) {
                        this.debug("Bootstrap Modal Plugin is not loaded");
                    }
                }
                
                return false;
            }, 
            
            initGenie: function () 
            {
                var that = this, 
                    bgColorClass = this.Box.attr("class").match(/pweb-bg-[a-z]+/i);
            
                // transfer effect classes
                this.options.modalGenieClass = "pweb-genie pweb-" + this.options.modalEffect + "-" + (this.options.position !== "static" ? this.options.position : "bottom") 
                        + " pwebbox" + this.options.id + "-genie" 
                        + (this.options.theme ? " pweb-theme-" + this.options.theme : "") 
                        + (this.Box.hasClass("pweb-radius") ? " pweb-radius" : "") 
                        + (this.Box.hasClass("pweb-shadow") ? " pweb-shadow" : "") 
                        + (bgColorClass ? " " + bgColorClass[0] : "");
                
                // effect easing
                if (this.options.modalEffect === "smooth") {
                    this.options.modalEaseIn = "easeInQuart";
                    this.options.modalEaseOut = "easeOutQuart";
                } else {
                    if (this.options.modalEffect === "rotate") {
                        this.options.modalEaseIn = "easeInQuint";
                        this.options.modalEaseOut = "easeOutQuint";
                    }
                }
                
                // modal window events
                this.Modal.on(this.options.bootstrap === 2 ? "show" : "show.bs.modal", function (e) {
                    // do not trigger if box is the target
                    e.stopPropagation();
                    if (e.target !== e.currentTarget) return;
                    
                    if (typeof that.eventSource !== "undefined" && $(that.eventSource).length) {
                        // hide container
                        that.Container.css({visibility: "hidden", opacity: 0});
                    }
                }).on(this.options.bootstrap === 2 ? "shown" : "shown.bs.modal", function (e) {
                    // do not trigger if box is the target
                    e.stopPropagation();
                    if (e.target !== e.currentTarget) return;
                    
                    if (typeof that.eventSource !== "undefined" && $(that.eventSource).length) {
                        // run transfer effect
                        $(that.eventSource).trigger("modalOpen");
                    }
                });
                
                // show window
                $(this.options.selectorClass + "_toggler").on("modalOpen", function () {
                    $(this).effect({
                        effect: "transfer", 
                        to: that.Container, 
                        duration: that.options.modalEffectDuration, 
                        easing: that.options.modalEaseIn, 
                        className: "pweb-genie-show " + that.options.modalGenieClass, 
                        complete: function () {
                            that.Container.css({visibility: "visible", opacity: 1});
                        }});
                });
                
                // hide window
                this.Container.on("modalClose", function () {
                    $(this).css({visibility: "hidden", opacity: 0}).effect({
                        effect: "transfer", 
                        to: $(that.eventSource), 
                        duration: that.options.modalEffectDuration, 
                        easing: that.options.modalEaseOut, 
                        className: "pweb-genie-hide " + that.options.modalGenieClass, 
                        complete: function () {
                            that.Modal.modal("hide");
                        }});
                });
            }, 
            
            initAccordion: function () 
            {
                var that = this;
                
                $(this.options.selectorClass + "_toggler").on("openAccordion", function () {
                    that.Box.removeClass("pweb-closed").slideDown({
                        duration: that.options.accordionDuration, 
                        easing: that.options.accordionEaseOut, 
                        complete: function () {
                            // scroll page that toggler and top of form would be visible
                            var winHeight = $(window).height(), 
                                eleHeight = that.element.outerHeight(), 
                                eleTop = that.element.offset().top;
                            if (eleTop + eleHeight > $(window).scrollTop() + winHeight) {
                                if (eleHeight < winHeight) {
                                    eleTop = eleTop + eleHeight - winHeight;
                                }
                                $("html,body").animate({scrollTop: parseInt(eleTop)}, 500);
                            }
                            $(that.Toggler).trigger("openedAccordion");
                        }
                    });
                });
                
                $(this.element).on("closeAccordion", function () {
                    that.Box.slideUp({
                        duration: that.options.accordionDuration, 
                        easing: that.options.accordionEaseIn, 
                        complete: function () {
                            that.Box.addClass("pweb-closed");
                        }
                    });
                });
                
                this.Box.css("display", "none").removeClass("pweb-init");
                
                return true;
            }, 
            
            initHiddenFields: function () 
            {
                // Screen resolution
                $("<input/>", {
                    type: "hidden", 
                    name: "screen_resolution", 
                    value: screen.width + "x" + screen.height
                }).appendTo(this.Content);
                
                // Debug on server side
                if (this.options.debug) {
                    $("<input/>", {
                        type: "hidden", 
                        name: "debug", 
                        value: 1
                    }).appendTo(this.Content);
                }
                
                return true;
            }, 
            
            close: function () 
            {
                this.toggleBox(0);
            }, 
            
            toggleBox: function (state, recipient, bind, event) 
            {
                var that = this;
                
                if (typeof state === "undefined") {
                    state = -1;
                }
                if (typeof bind === "undefined") {
                    bind = this.Toggler;
                }
                
                // close
                if (!this.hidden && (state === -1 || state === 0)) 
                {
                    this.hidden = true;
                    if (this.Toggler.length && !this.options.togglerHidden) {
                        // add toggler closed class
                        this.Toggler.removeClass("pweb-opened").addClass("pweb-closed");
                        // change toggler name
                        if (this.options.togglerNameClose) {
                            this.Toggler.find(".pweb-text").text(this.options.togglerNameOpen);
                        }
                    }
                    
                    if (this.options.openAuto === false && this.timer) {
                        clearTimeout(this.timer);
                    }
                    
                    if (this.options.layout == "slidebox") 
                    {
                        var css = {};
                        css[this.options.position] = (this.options.position == "left" || this.options.position == "right") ? -this.Box.width() : -this.Box.height();                     
                        
                        // slide out the box
                        this.Box.stop(true, false).animate(css, this.options.slideDuration, this.options.slideTransition, function () {
                            
                            that.Box.addClass("pweb-closed");
                            
                            // restore fixed position
                            if (that.element.css("position") == "absolute" && that.options.slidePos == "fixed") 
                            {
                                var css = {position: "fixed"};
                                if (that.options.position == "left" || that.options.position == "right") {
                                    css.top = that.options.slideOffset;
                                } else {
                                    css[that.options.position] = 0;
                                    if (that.options.position == "bottom") {
                                        css.top = "auto";
                                    }
                                }
                                that.element.css(css);
                            }
                            $(bind).trigger("closedSlidebox");
                        });   
                        
                        // hide toggler if disabled
                        if (this.options.togglerHidden) this.Toggler.fadeOut(this.options.slideDuration);
                    } 
                    else 
                    {
                        if (this.options.layout == "modal") 
                        {
                            if (this.options.modalEffect !== "fade" && this.options.modalEffect !== "drop" && typeof this.eventSource !== "undefined") {
                                this.Container.trigger("modalClose");
                            } else {
                                this.Modal.modal("hide");
                            }
                        } 
                        else 
                        {
                            if (this.options.layout == "accordion") {
                                $(bind).trigger("closeAccordion");
                            } else {
                                if (this.options.layout == "bottombar") {
                                        this.element.hide();
                                }
                            }
                        }
                    }
                    
                    // close event
                    this.options.onClose.apply(this);
                    this.element.trigger("onClose");
                    
                } 
                
                // open
                else 
                {
                    if (this.hidden && (state === -1 || state === 1)) {
                        // close other Perfect Web Boxes
                        if (this.options.closeOther) 
                        {
                            $.each(pwebBoxes, function () {
                                if (this.options.id != that.options.id && typeof this.close === "function") {
                                    this.close();
                                }
                            });
                        }
                        
                        // disable auto-open when box is being opened
                        if (this.options.openAuto === 1 || this.options.openAuto === 2) 
                        {
                            this.options.openAuto = false;
                            if (this.timer) {
                                clearTimeout(this.timer);
                            }
                        }
                       
                        this.hidden = false;
                        
                        if (this.Toggler.length && !this.options.togglerHidden) 
                        {
                            // add toggler opened class
                            this.Toggler.removeClass("pweb-closed").addClass("pweb-opened");
                            // change toggler name
                            if (this.options.togglerNameClose) {
                                this.Toggler.find(".pweb-text").text(this.options.togglerNameClose);
                            }
                        }
                        
                        if (this.options.layout == "slidebox") 
                        {
                            var css = {width: this.options.slideWidth};
                            css[this.options.position] = 0;
                            
                            var maxWidth = $(window).width();
                            
                            // calculate width of box
                            if (this.options.position == "left" || this.options.position == "right") 
                            {
                                if (this.options.slideWidth + this.options.togglerWidth > maxWidth) {
                                    css.width = maxWidth - this.options.togglerWidth;
                                }
                            } 
                            else 
                            {
                                var offset = this.element.offset().left;
                                if (this.options.offsetPosition == "right") {
                                    offset = $(document).width() - offset;
                                }
                                if (this.options.slideWidth + offset > maxWidth) {
                                    css.width = maxWidth - offset;
                                }
                            }
                            
                            // slide in the box
                            this.Box.stop(true, false).animate(css, this.options.slideDuration, this.options.slideTransition, function () {
                                
                                // change position to absolute if box is bigger than viewport                                
                                if (that.options.slidePos == "fixed") 
                                {
                                    var css = {position: "absolute"};
                                    
                                    if (that.options.position == "left" || that.options.position == "right") 
                                    {
                                        css.top = that.element.offset().top;
                                        if (that.Box.height() + that.options.togglerHeight + css.top - $(window).scrollTop() > $(window).height()) {
                                            css.top = that.element.offset().top;
                                            that.element.css(css);
                                        }
                                    } 
                                    else 
                                    {
                                        if (that.Box.height() + that.options.togglerHeight > $(window).height()) 
                                        {
                                            css.top = that.element.offset().top;
                                            if (that.options.position == "bottom") {
                                                css.bottom = "auto";
                                            }
                                            that.element.css(css);
                                        }
                                    }
                                }
                                
                                $(bind).trigger("shownSlidebox");
                                
                            }).css("overflow", "visible").removeClass("pweb-closed");
                            
                            // show toggler if disabled
                            if (this.options.togglerHidden) {
                                this.Toggler.fadeIn(this.options.slideDuration);
                            }
                        } 
                        else 
                        {
                            if (this.options.layout == "modal") 
                            {
                                if (this.options.modalEffect !== "fade" && this.options.modalEffect !== "drop" && $(bind).length) {
                                    this.eventSource = bind;
                                }
                                this.Modal.modal("show");
                            } 
                            else 
                            {
                                if (this.options.layout == "accordion") 
                                {
                                    $(bind).trigger("openAccordion");
                                } 
                                else 
                                {
                                    if (this.options.layout == "bottombar") 
                                    {
                                        this.Box.parent().show();
                                    }
                                }
                            }
                        }
                        
                        // open event
                        this.options.onOpen.apply(this);
                        this.element.trigger("onOpen");
                        
                        if(!this.options.tracked) {
                            this.options.tracked = true;
                            this.options.onTrack.apply(this);
                            this.element.trigger("onTrack");
                        } 
                        
                        this.autoClose();
                    }
                }
            }, 
            
            initAutoPopupCookie: function () 
            {
                if (typeof $.cookie === "function") 
                {
                    var counter = parseInt($.cookie("pwebbox" + this.options.id + "_openauto"));
                    counter = isNaN(counter) ? 1 : counter + 1;
                    if (counter <= this.options.maxAutoOpen) 
                    {
                        $.cookie("pwebbox" + this.options.id + "_openauto", counter, {
                            domain: this.options.cookieDomain, 
                            path: this.options.cookiePath, 
                            expires: this.options.cookieLifetime
                        });
                        
                        return true;
                    }
                } 
                else  if (this.options.debug) this.debug("jQuery Cookie Plugin is not loaded");
                
                return false;
            }, 
            
            autoPopupOnPageLoad: function () 
            {
                if (this.options.openDelay) {
                    this.timer = this.delay(this.toggleBox, this.options.openDelay, this, [1]);
                } else {
                    this.toggleBox(1);
                }
            }, 
            
            autoPopupOnPageScroll: function () 
            {
                var that = this;
                
                this.autoOpen = true;
                $(window).scroll(function () {
                    if (that.autoOpen) {
                        that.autoOpen = false;
                        if (that.options.openDelay) {
                            that.timer = that.delay(that.toggleBox, that.options.openDelay, that, [1]);
                        } else {
                            that.toggleBox(1);
                        }
                    }
                });
            }, 
            
            autoPopupOnPageExit: function () 
            {
                var that = this;
                
                this.autoOpen = -1;
                $(window).mousemove(function (e) {
                    if (that.autoOpen == -1 && e.clientY > 70) {
                        that.autoOpen = 1;
                    } else {
                        if (that.autoOpen == 1 && e.clientY < 30) {
                            that.autoOpen = 0;
                            if (that.options.openDelay) {
                                that.timer = that.delay(that.toggleBox, that.options.openDelay, that, [1])
                            } else {
                                that.toggleBox(1);
                            }
                        }
                    }
                });
            }, 
            
            autoClose: function () 
            {
                if (this.options.autoClose) {
                    if (this.options.closeDelay) {
                        this.timer = this.delay(this.toggleBox, this.options.closeDelay, this, [0]);
                    } else {
                        this.toggleBox(0);
                    }
                }
            }, 
            
            delay: function (element, delay, bind, args) 
            {
                return setTimeout(function () {
                    return element.apply(bind, args || arguments);
                }, delay);
            }, 
            
            displayAlert: function (html, type, heading, close) 
            {
                if (typeof $.fn.alert === "function") 
                {
                    // Display popup with alert
                    var $alert = $('<div class="pweb-alert alert alert-block ' + (type ? "alert-" + type : "") + ' fade in">'
                    + '<button data-dismiss="alert" class="close" type="button">&times;</button>' 
                    + (typeof heading !== "undefined" ? '<h4 class="alert-heading">' + heading + "</h4>" : "") 
                    + "<p>" + html + "</p>"
                    + "</div>").alert().appendTo(document.body);
            
                    if ((typeof close === "undefined" || close) && this.options.msgCloseDelay) {
                        setTimeout(function () { $alert.alert("close"); }, this.options.msgCloseDelay * 1000);
                    }
                } 
                else alert(html.replace("<br>", "\r\n"));
            }, 
            
            debug: function (html, code) 
            {
                if ($.isArray(html)) {
                    html = html.join("<br>");
                }
                if (typeof code !== "undefined") {
                    html = html + "<br>Response code: " + code;
                }
                this.displayAlert(html, "info", "Perfect Popup Box", false);
            }};
    })();
    
    pwebBox.options = pwebBox.prototype.options;
    
})(window.jQuery);