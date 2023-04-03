/*
	Masked Input plugin for jQuery
	Copyright (c) 2007-2009 Josh Bush (digitalbush.com)
	Licensed under the MIT license (http://digitalbush.com/projects/masked-input-plugin/#license) 
	Version: 1.2.2 (03/09/2009 22:39:06)
*/
(function(a){var c=(a.browser.msie?"paste":"input")+".mask";var b=(window.orientation!=undefined);a.mask={definitions:{"9":"[0-9]",a:"[A-Za-z]","*":"[A-Za-z0-9]"}};a.fn.extend({caret:function(e,f){if(this.length==0){return}if(typeof e=="number"){f=(typeof f=="number")?f:e;return this.each(function(){if(this.setSelectionRange){this.focus();this.setSelectionRange(e,f)}else{if(this.createTextRange){var g=this.createTextRange();g.collapse(true);g.moveEnd("character",f);g.moveStart("character",e);g.select()}}})}else{if(this[0].setSelectionRange){e=this[0].selectionStart;f=this[0].selectionEnd}else{if(document.selection&&document.selection.createRange){var d=document.selection.createRange();e=0-d.duplicate().moveStart("character",-100000);f=e+d.text.length}}return{begin:e,end:f}}},unmask:function(){return this.trigger("unmask")},mask:function(j,d){if(!j&&this.length>0){var f=a(this[0]);var g=f.data("tests");return a.map(f.data("buffer"),function(l,m){return g[m]?l:null}).join("")}d=a.extend({placeholder:"_",completed:null},d);var k=a.mask.definitions;var g=[];var e=j.length;var i=null;var h=j.length;a.each(j.split(""),function(m,l){if(l=="?"){h--;e=m}else{if(k[l]){g.push(new RegExp(k[l]));if(i==null){i=g.length-1}}else{g.push(null)}}});return this.each(function(){var r=a(this);var m=a.map(j.split(""),function(x,y){if(x!="?"){return k[x]?d.placeholder:x}});var n=false;var q=r.val();r.data("buffer",m).data("tests",g);function v(x){while(++x<=h&&!g[x]){}return x}function t(x){while(!g[x]&&--x>=0){}for(var y=x;y<h;y++){if(g[y]){m[y]=d.placeholder;var z=v(y);if(z<h&&g[y].test(m[z])){m[y]=m[z]}else{break}}}s();r.caret(Math.max(i,x))}function u(y){for(var A=y,z=d.placeholder;A<h;A++){if(g[A]){var B=v(A);var x=m[A];m[A]=z;if(B<h&&g[B].test(x)){z=x}else{break}}}}function l(y){var x=a(this).caret();var z=y.keyCode;n=(z<16||(z>16&&z<32)||(z>32&&z<41));if((x.begin-x.end)!=0&&(!n||z==8||z==46)){w(x.begin,x.end)}if(z==8||z==46||(b&&z==127)){t(x.begin+(z==46?0:-1));return false}else{if(z==27){r.val(q);r.caret(0,p());return false}}}function o(B){if(n){n=false;return(B.keyCode==8)?false:null}B=B||window.event;var C=B.charCode||B.keyCode||B.which;var z=a(this).caret();if(B.ctrlKey||B.altKey||B.metaKey){return true}else{if((C>=32&&C<=125)||C>186){var x=v(z.begin-1);if(x<h){var A=String.fromCharCode(C);if(g[x].test(A)){u(x);m[x]=A;s();var y=v(x);a(this).caret(y);if(d.completed&&y==h){d.completed.call(r)}}}}}return false}function w(x,y){for(var z=x;z<y&&z<h;z++){if(g[z]){m[z]=d.placeholder}}}function s(){return r.val(m.join("")).val()}function p(y){var z=r.val();var C=-1;for(var B=0,x=0;B<h;B++){if(g[B]){m[B]=d.placeholder;while(x++<z.length){var A=z.charAt(x-1);if(g[B].test(A)){m[B]=A;C=B;break}}if(x>z.length){break}}else{if(m[B]==z[x]&&B!=e){x++;C=B}}}if(!y&&C+1<e){r.val("");w(0,h)}else{if(y||C+1>=e){s();if(!y){r.val(r.val().substring(0,C+1))}}}return(e?B:i)}if(!r.attr("readonly")){r.one("unmask",function(){r.unbind(".mask").removeData("buffer").removeData("tests")}).bind("focus.mask",function(){q=r.val();var x=p();s();setTimeout(function(){if(x==j.length){r.caret(0,x)}else{r.caret(x)}},0)}).bind("blur.mask",function(){p();if(r.val()!=q){r.change()}}).bind("keydown.mask",l).bind("keypress.mask",o).bind(c,function(){setTimeout(function(){r.caret(p(true))},0)})}p()})}})})(jQuery);

/*
* Price Format jQuery Plugin
* By Eduardo Cuducos
* cuducos [at] gmail [dot] com
* Version: 1.0
* Release: 2009-01-21
*/

(function($) {

	$.fn.priceFormat = function(options) {  

		var defaults = {  
			prefix: 'US$ ',
			centsSeparator: '.',  
			thousandsSeparator: ','
		};  
		var options = $.extend(defaults, options);
		
		return this.each(function() {
			
			var obj = $(this);

			function price_format () {

				// format definitions
				var prefix = options.prefix;
				var centsSeparator = options.centsSeparator;
				var thousandsSeparator = options.thousandsSeparator;
				var formatted = '';
				var thousandsFormatted = '';
				var str = obj.val();

				// skip everything that isn't a number
				// and skip left 0
				var isNumber = /[0-9]/;
				for (var i=0;i<(str.length);i++) {
					char = str.substr(i,1);
					if (formatted.length==0 && char==0) char = false;
					if (char && char.match(isNumber)) formatted = formatted+char;
				}
				
				// format to fill with zeros when < 100
				while (formatted.length<3) formatted = '0'+formatted;
				var centsVal = formatted.substr(formatted.length-2,2);
				var integerVal = formatted.substr(0,formatted.length-2);
			
				// apply cents pontuation
				formatted = integerVal+centsSeparator+centsVal;
			
				// apply thousands pontuation
				if (thousandsSeparator) {
					var thousandsCount = 0;
					for (var j=integerVal.length;j>0;j--) {
						char = integerVal.substr(j-1,1);
						thousandsCount++;
						if (thousandsCount%3==0) char = thousandsSeparator+char;
						thousandsFormatted = char+thousandsFormatted;
					}
					if (thousandsFormatted.substr(0,1)==thousandsSeparator) thousandsFormatted = thousandsFormatted.substring(1,thousandsFormatted.length);
					formatted = thousandsFormatted+centsSeparator+centsVal;
				}
				
				// apply the prefix
				if (prefix) formatted = prefix+formatted;
				
				// replace the value
				obj.val(formatted);
			
			}

			$(this).bind('keyup',price_format);
			if ($(this).val().length>0) price_format();

		});

	}; 		
		
})(jQuery);