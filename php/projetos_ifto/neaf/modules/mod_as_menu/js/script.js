
/*
 *
 * Dual licensed under the MIT and GPL licenses:
 * 	http://www.opensource.org/licenses/mit-license.php
 * 	http://www.gnu.org/licenses/gpl.html
 *
 */

;(function($){
	$.fn.asmenu = function(op){

		var as = $.fn.asmenu,
			c = as.c,
			$arrow = $(['<span class="',c.arrowClass,'"> &#187;</span>'].join('')),
			over = function(){
				var $$ = $(this), menu = getMenu($$);
				clearTimeout(menu.asTimer);
				$$.showasmenuUl().siblings().hideasmenuUl();
			},
			out = function(){
				var $$ = $(this), menu = getMenu($$), o = as.op;
				clearTimeout(menu.asTimer);
				menu.asTimer=setTimeout(function(){
					o.retainPath=($.inArray($$[0],o.$path)>-1);
					$$.hideasmenuUl();
					if (o.$path.length && $$.parents(['li.',o.hoverClass].join('')).length<1){over.call(o.$path);}
				},o.delay);	
			},
			getMenu = function($menu){
				var menu = $menu.parents(['ul.',c.menuClass,':first'].join(''))[0];
				as.op = as.o[menu.serial];
				return menu;
			},
			addArrow = function($a){ $a.addClass(c.anchorClass).append($arrow.clone()); };
			
		return this.each(function() {
			var s = this.serial = as.o.length;
			var o = $.extend({},as.defaults,op);
			o.$path = $('li.'+o.pathClass,this).slice(0,o.pathLevels).each(function(){
				$(this).addClass([o.hoverClass,c.bcClass].join(' '))
					.filter('li:has(ul)').removeClass(o.pathClass);
			});
			as.o[s] = as.op = o;
			
			$('li:has(ul)',this)[($.fn.hoverIntent && !o.disableHI) ? 'hoverIntent' : 'hover'](over,out).each(function() {
				if (o.autoArrows) addArrow( $('>a:first-child',this) );
			})
			.not('.'+c.bcClass)
				.hideasmenuUl();
			
			var $a = $('a',this);
			$a.each(function(i){
				var $li = $a.eq(i).parents('li');
			});
			o.onInit.call(this);
			
		}).each(function() {
			var menuClasses = [c.menuClass];
			if (as.op.dropShadows  && !($.browser.msie && $.browser.version < 7)) menuClasses.push(c.shadowClass);
			$(this).addClass(menuClasses.join(' '));
		});
	};

	var as = $.fn.asmenu;
	as.o = [];
	as.op = {};
	as.IE7fix = function(){
		var o = as.op;
		if ($.browser.msie && $.browser.version > 6 && o.dropShadows && o.animation.opacity!=undefined)
			this.toggleClass(as.c.shadowClass+'-off');
		};
	as.c = {
		bcClass     : 'as-breadcrumb',
		menuClass   : 'as-js-enabled',
		anchorClass : 'as-with-ul',
		arrowClass  : 'as-sub-indicator',
		shadowClass : 'as-shadow'
	};
	as.defaults = {
		hoverClass	: 'asHover',
		pathClass	: 'overideThisToUse',
		pathLevels	: 2,
		delay		: 1000,
		animation	: {opacity:'show', height:'show'},
		speed		: 'normal',
		autoArrows	: false,
		dropShadows : false,
		disableHI	: false,		// true disables hoverIntent detection
		easing      : 'swing',
		onInit		: function(){}, // callback functions
		onBeforeShow: function(){},
		onShow		: function(){},
		onHide		: function(){}
	};
	$.fn.extend({
		hideasmenuUl : function(){
			var o = as.op,
				not = (o.retainPath===true) ? o.$path : '';
			o.retainPath = false;
			var $ul = $(['li.',o.hoverClass].join(''),this).add(this).not(not).removeClass(o.hoverClass)
					.find('>ul').hide();
			o.onHide.call($ul);
			/*Cufon.refresh();*/
			return this;
		},
		showasmenuUl : function(){
			var o = as.op,
				sh = as.c.shadowClass+'-off',
				$ul = this.not('.accorChild').addClass(o.hoverClass)
					.find('>ul:hidden');
			as.IE7fix.call($ul);
			o.onBeforeShow.call($ul);
			$ul.animate(o.animation,o.speed,o.easing,function() 
				{ as.IE7fix.call($ul); o.onShow.call($ul); }); 
        return this; 
		}
	});

})(jQuery);