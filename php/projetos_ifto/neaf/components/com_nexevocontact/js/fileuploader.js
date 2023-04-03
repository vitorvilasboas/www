/* 
 ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 :::: Joomla Nexevo Responsive Conact Form             ::::
 :::: Author - Nexevo.in <info@nexevo.in>              ::::
 :::: Copyright (C) 2009 - 2015 Nexevo-Extension       ::::
 :::: license GNU/GPL,for full license                 ::::
 ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
*/

//
// Helper functions
//

var qq = qq || {};

/**
 * Adds all missing properties from second obj to first obj
 */
qq.extend = function (first, second)
{
	for (var prop in second)
	{
		first[prop] = second[prop];
	}
};

/**
 * Searches for a given element in the array, returns -1 if it is not present.
 * @param {Number} [from] The index at which to begin the search
 */
qq.indexOf = function (arr, elt, from)
{
	if (arr.indexOf) return arr.indexOf(elt, from);

	from = from || 0;
	var len = arr.length;

	if (from < 0) from += len;

	for (; from < len; from++)
	{
		if (from in arr && arr[from] === elt)
		{
			return from;
		}
	}
	return -1;
};

qq.getUniqueId = (function ()
{
	var id = 0;
	return function ()
	{
		return id++;
	};
})();

//
// Events

qq.attach = function (element, type, fn)
{
	if (element.addEventListener)
	{
		element.addEventListener(type, fn, false);
	}
	else if (element.attachEvent)
	{
		element.attachEvent('on' + type, fn);
	}
};
qq.detach = function (element, type, fn)
{
	if (element.removeEventListener)
	{
		element.removeEventListener(type, fn, false);
	}
	else if (element.attachEvent)
	{
		element.detachEvent('on' + type, fn);
	}
};

qq.preventDefault = function (e)
{
	if (e.preventDefault)
	{
		e.preventDefault();
	}
	else
	{
		e.returnValue = false;
	}
};

//
// Node manipulations

/**
 * Insert node a before node b.
 */
qq.insertBefore = function (a, b)
{
	b.parentNode.insertBefore(a, b);
};
qq.remove = function (element)
{
	element.parentNode.removeChild(element);
};

qq.contains = function (parent, descendant)
{
	// compareposition returns false in this case
	if (parent == descendant) return true;

	if (parent.contains)
	{
		return parent.contains(descendant);
	}
	else
	{
		return !!(descendant.compareDocumentPosition(parent) & 8);
	}
};

/**
 * Creates and returns element from html string
 * Uses innerHTML to create an element
 */
qq.toElement = (function ()
{
	var div = document.createElement('div');
	return function (html)
	{
		div.innerHTML = html;
		var element = div.firstChild;
		div.removeChild(element);
		return element;
	};
})();

//
// Node properties and attributes

/**
 * Sets styles for an element.
 * Fixes opacity in IE6-8.
 */
qq.css = function (element, styles)
{
	if (styles.opacity != null)
	{
		if (typeof element.style.opacity != 'string' && typeof(element.filters) != 'undefined')
		{
			styles.filter = 'alpha(opacity=' + Math.round(100 * styles.opacity) + ')';
		}
	}
	qq.extend(element.style, styles);
};
qq.hasClass = function (element, name)
{
	var re = new RegExp('(^| )' + name + '( |$)');
	return re.test(element.className);
};
qq.addClass = function (element, name)
{
	if (!qq.hasClass(element, name))
	{
		element.className += ' ' + name;
	}
};
qq.removeClass = function (element, name)
{
	var re = new RegExp('(^| )' + name + '( |$)');
	element.className = element.className.replace(re, ' ').replace(/^\s+|\s+$/g, "");
};
qq.setText = function (element, text)
{
	element.innerText = text;
	element.textContent = text;
};

//
// Selecting elements

qq.children = function (element)
{
	var children = [],
		child = element.firstChild;

	while (child)
	{
		if (child.nodeType == 1)
		{
			children.push(child);
		}
		child = child.nextSibling;
	}

	return children;
};

qq.getByClass = function (element, className)
{
	if (element.querySelectorAll)
	{
		return element.querySelectorAll('.' + className);
	}

	var result = [];
	var candidates = element.getElementsByTagName("*");
	var len = candidates.length;

	for (var i = 0; i < len; i++)
	{
		if (qq.hasClass(candidates[i], className))
		{
			result.push(candidates[i]);
		}
	}
	return result;
};


qq.obj2url = function (obj, temp, prefixDone)
{
	var uristrings = [],
		prefix = '&',
		add = function (nextObj, i)
		{
			var nextTemp = temp
				? (/\[\]$/.test(temp)) // prevent double-encoding
				? temp
				: temp + '[' + i + ']'
				: i;
			if ((nextTemp != 'undefined') && (i != 'undefined'))
			{
				uristrings.push(
					(typeof nextObj === 'object')
						? qq.obj2url(nextObj, nextTemp, true)
						: (Object.prototype.toString.call(nextObj) === '[object Function]')
						? encodeURIComponent(nextTemp) + '=' + encodeURIComponent(nextObj())
						: encodeURIComponent(nextTemp) + '=' + encodeURIComponent(nextObj)
				);
			}
		};

	if (!prefixDone && temp)
	{
		prefix = (/\?/.test(temp)) ? (/\?$/.test(temp)) ? '' : '&' : '?';
		uristrings.push(temp);
		uristrings.push(qq.obj2url(obj));
	}
	else if ((Object.prototype.toString.call(obj) === '[object Array]') && (typeof obj != 'undefined'))
	{
		// we wont use a for-in-loop on an array (performance)
		for (var i = 0, len = obj.length; i < len; ++i)
		{
			add(obj[i], i);
		}
	}
	else if ((typeof obj != 'undefined') && (obj !== null) && (typeof obj === "object"))
	{
		// for anything else but a scalar, we will use for-in-loop
		for (var i in obj)
		{
			add(obj[i], i);
		}
	}
	else
	{
		uristrings.push(encodeURIComponent(temp) + '=' + encodeURIComponent(obj));
	}

	return uristrings.join(prefix)
		.replace(/^&/, '')
		.replace(/%20/g, '+');
};



var qq = qq || {};

/**
 * Creates upload button, validates upload, but doesn't create file list or dd.
 */
qq.FileUploaderBasic = function (o)
{
	this._options = {
		// set to true to see the server response
		debug:false,
		action:'/server/upload',
		params:{},
		button:null,
		multiple:true,
		maxConnections:3,
		// validation
		allowedExtensions:[],
		sizeLimit:0,
		minSizeLimit:0,
		// events
		// return false to cancel submit
		onSubmit:function (id, fileName)
		{
		},
		onProgress:function (id, fileName, loaded, total)
		{
		},
		onComplete:function (id, fileName, responseJSON)
		{
		},
		onCancel:function (id, fileName)
		{
		},
		// messages
		messages:{
			typeError:"{file} has invalid extension. Only {extensions} are allowed.",
			sizeError:"{file} is too large, maximum file size is {sizeLimit}.",
			minSizeError:"{file} is too small, minimum file size is {minSizeLimit}.",
			emptyError:"{file} is empty, please select files again without it.",
			onLeave:"The files are being uploaded, if you leave now the upload will be cancelled."
		},
		showMessage:function (message)
		{
			alert(message);
		}
	};
	qq.extend(this._options, o);

	// number of files being uploaded
	this._filesInProgress = 0;
	this._handler = this._createUploadHandler();

	if (this._options.button)
	{
		this._button = this._createUploadButton(this._options.button);
	}

	this._preventLeaveInProgress();
};

qq.FileUploaderBasic.prototype = {
	setParams:function (params)
	{
		this._options.params = params;
	},
	getInProgress:function ()
	{
		return this._filesInProgress;
	},
	_createUploadButton:function (element)
	{
		var self = this;

		return new qq.UploadButton({
			element:element,
			multiple:this._options.multiple && qq.UploadHandlerXhr.isSupported(),
			onChange:function (input)
			{
				self._onInputChange(input);
			}
		});
	},
	_createUploadHandler:function ()
	{
		var self = this,
			handlerClass;

		if (qq.UploadHandlerXhr.isSupported())
		{
			handlerClass = 'UploadHandlerXhr';
		}
		else
		{
			handlerClass = 'UploadHandlerForm';
		}

		var handler = new qq[handlerClass]({
			debug:this._options.debug,
			action:this._options.action,
			maxConnections:this._options.maxConnections,
			onProgress:function (id, fileName, loaded, total)
			{
				self._onProgress(id, fileName, loaded, total);
				self._options.onProgress(id, fileName, loaded, total);
			},
			onComplete:function (id, fileName, result)
			{
				self._onComplete(id, fileName, result);
				self._options.onComplete(id, fileName, result);
			},
			onCancel:function (id, fileName)
			{
				self._onCancel(id, fileName);
				self._options.onCancel(id, fileName);
			}
		});

		return handler;
	},
	_preventLeaveInProgress:function ()
	{
		var self = this;

		qq.attach(window, 'beforeunload', function (e)
		{
			if (!self._filesInProgress)
			{
				return;
			}

			var e = e || window.event;
			// for ie, ff
			e.returnValue = self._options.messages.onLeave;
			// for webkit
			return self._options.messages.onLeave;
		});
	},
	_onSubmit:function (id, fileName)
	{
		this._filesInProgress++;
	},
	_onProgress:function (id, fileName, loaded, total)
	{
	},
	_onComplete:function (id, fileName, result)
	{
		this._filesInProgress--;
		if (result.error)
		{
			this._options.showMessage(result.error);
		}
	},
	_onCancel:function (id, fileName)
	{
		this._filesInProgress--;
	},
	_onInputChange:function (input)
	{
		if (this._handler instanceof qq.UploadHandlerXhr)
		{
			this._uploadFileList(input.files);
		}
		else
		{
			if (this._validateFile(input))
			{
				this._uploadFile(input);
			}
		}
		this._button.reset();
	},
	_uploadFileList:function (files)
	{
		for (var i = 0; i < files.length; i++)
		{
			if (!this._validateFile(files[i]))
			{
				return;
			}
		}

		for (var i = 0; i < files.length; i++)
		{
			this._uploadFile(files[i]);
		}
	},
	_uploadFile:function (fileContainer)
	{
		var id = this._handler.add(fileContainer);
		var fileName = this._handler.getName(id);

		if (this._options.onSubmit(id, fileName) !== false)
		{
			this._onSubmit(id, fileName);
			this._handler.upload(id, this._options.params);
		}
	},
	_validateFile:function (file)
	{
		var name, size;

		if (file.value)
		{
			// it is a file input
			// get input value and remove path to normalize
			name = file.value.replace(/.*(\/|\\)/, "");
		}
		else
		{
			// fix missing properties in Safari
			name = file.fileName != null ? file.fileName : file.name;
			size = file.fileSize != null ? file.fileSize : file.size;
		}

		if (!this._isAllowedExtension(name))
		{
			this._error('typeError', name);
			return false;

		}
		else if (size === 0)
		{
			this._error('emptyError', name);
			return false;

		}
		else if (size && this._options.sizeLimit && size > this._options.sizeLimit)
		{
			this._error('sizeError', name);
			return false;

		}
		else if (size && size < this._options.minSizeLimit)
		{
			this._error('minSizeError', name);
			return false;
		}

		return true;
	},
	_error:function (code, fileName)
	{
		var message = this._options.messages[code];

		function r(name, replacement)
		{
			message = message.replace(name, replacement);
		}

		r('{file}', this._formatFileName(fileName));
		r('{extensions}', this._options.allowedExtensions.join(', '));
		r('{sizeLimit}', this._formatSize(this._options.sizeLimit), 'auto');
		r('{minSizeLimit}', this._formatSize(this._options.minSizeLimit), 'auto');

		this._options.showMessage(message);
	},
	_formatFileName:function (name)
	{
		if (name.length > 33)
		{
			name = name.slice(0, 19) + '...' + name.slice(-13);
		}
		return name;
	},
	_isAllowedExtension:function (fileName)
	{
		var ext = (-1 !== fileName.indexOf('.')) ? fileName.replace(/.*[.]/, '').toLowerCase() : '';
		var allowed = this._options.allowedExtensions;

		if (!allowed.length)
		{
			return true;
		}

		for (var i = 0; i < allowed.length; i++)
		{
			if (allowed[i].toLowerCase() == ext)
			{
				return true;
			}
		}

		return false;
	},
	_formatSize:function (bytes, decimals)
	{
		for (var i = 0; bytes >= 1000; ++i)
		{
			bytes /= 1024;
		}

		// Automatic decimals means 3 significant digits. Examples: 290MB 90.5Kb 9.52Gb
		if (decimals === "auto")
		{
			decimals = 3 - String(Math.floor(bytes)).length;
	   }

		return bytes.toFixed(decimals) + ' ' + ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'][i];
	}
};


/**
 * Class that creates upload widget with drag-and-drop and file list
 * @inherits qq.FileUploaderBasic
 */
qq.FileUploader = function (o)
{

	qq.FileUploaderBasic.apply(this, arguments);


	qq.extend(this._options, {
		element:null,
		listElement:null,

		template:'<div class="qq-uploader">' +
			'<div class="qq-upload-button btn"><span class="qq-upload-button-caption">' + Nexevo.Text.get('COM_NEXEVOCONTACT_BROWSE_FILES') + '</span></div>' +
			'<ul class="qq-upload-list"></ul>' +
			'</div>',

		// template for one item in file list
		fileTemplate:'<li>' +
			'<span class="qq-upload-file"></span>' +
			'<span class="qq-upload-size"></span>' +
			'<span class="qq-upload-spinner"></span>' +
			'<a class="qq-upload-cancel" href="#">' + Nexevo.Text.get('JCANCEL') + '</a>' +
			'<span class="qq-upload-failed-text">' + Nexevo.Text.get('COM_NEXEVOCONTACT_FAILED') + '</span>' +
			'<span class="qq-upload-success-text">' + Nexevo.Text.get('COM_NEXEVOCONTACT_SUCCESS') + '</span>' +
			'</li>',

		classes:{
			// used to get elements from templates
			button:'qq-upload-button',
			list:'qq-upload-list',

			file:'qq-upload-file',
			spinner:'qq-upload-spinner',
			size:'qq-upload-size',
			cancel:'qq-upload-cancel',

			// added to list item when upload completes
			// used in css to hide progress spinner
			success:'qq-upload-success',
			fail:'qq-upload-fail'
		}
	});
	// overwrite options with user supplied
	qq.extend(this._options, o);

	this._element = this._options.element;
	this._element.innerHTML = this._options.template;
	this._listElement = this._options.listElement || document.getElementById(this._options.uniqueid) || this._find(this._element, 'list');

	this._classes = this._options.classes;

	this._button = this._createUploadButton(this._find(this._element, 'button'));

	this._bindCancelEvent();
};

// inherit from Basic Uploader
qq.extend(qq.FileUploader.prototype, qq.FileUploaderBasic.prototype);

qq.extend(qq.FileUploader.prototype, {
	/**
	 * Gets one of the elements listed in this._options.classes
	 **/
	_find:function (parent, type)
	{
		var element = qq.getByClass(parent, this._options.classes[type])[0];
		if (!element)
		{
			throw new Error('element not found ' + type);
		}

		return element;
	},
	_onSubmit:function (id, fileName)
	{
		qq.FileUploaderBasic.prototype._onSubmit.apply(this, arguments);
		this._addToList(id, fileName);
	},
	_onProgress:function (id, fileName, loaded, total)
	{
		qq.FileUploaderBasic.prototype._onProgress.apply(this, arguments);

		var item = this._getItemByFileId(id);
		var size = this._find(item, 'size');
		size.style.display = 'inline-block';

		var text;
		if (loaded != total)
		{
			text = Math.round(loaded / total * 100) + '% / ' + this._formatSize(total, 'auto');
		}
		else
		{
			text = this._formatSize(total, 'auto');
		}

		qq.setText(size, text);
	},
	_onComplete:function (id, fileName, result)
	{
		qq.FileUploaderBasic.prototype._onComplete.apply(this, arguments);

		// mark completed
		var item = this._getItemByFileId(id);
		qq.remove(this._find(item, 'cancel'));
		qq.remove(this._find(item, 'spinner'));

		if (result.success)
		{
			qq.addClass(item, this._classes.success);
		}
		else
		{
			qq.addClass(item, this._classes.fail);
		}

		if (result.success)
		{
			var span = document.createElement("span");
			span.appendChild(document.createTextNode(Nexevo.Text.get('COM_NEXEVOCONTACT_REMOVE_ALT')));
			span.setAttribute("class","qq-upload-remove");
			span.setAttribute("title", Nexevo.Text.get('COM_NEXEVOCONTACT_REMOVE_TITLE'));
			// Append the span to the list item <li>
			item.appendChild(span);

			var url = this._options.action;
			// Set the onclick event to the remove button of this new item
			span.onclick = function(){ deletefile(span, result.index, url); };
		}
	},
	_addToList:function (id, fileName)
	{
		var item = qq.toElement(this._options.fileTemplate);
		item.qqFileId = id;

		var fileElement = this._find(item, 'file');
		qq.setText(fileElement, this._formatFileName(fileName));
		this._find(item, 'size').style.display = 'none';

		this._listElement.appendChild(item);
	},
	_getItemByFileId:function (id)
	{
		var item = this._listElement.firstChild;

		// there can't be txt nodes in dynamically created list
		// and we can  use nextSibling
		while (item)
		{
			if (item.qqFileId == id) return item;
			item = item.nextSibling;
		}
	},
	/**
	 * delegate click event for cancel link
	 **/
	_bindCancelEvent:function ()
	{
		var self = this,
			list = this._listElement;

		qq.attach(list, 'click', function (e)
		{
			e = e || window.event;
			var target = e.target || e.srcElement;

			if (qq.hasClass(target, self._classes.cancel))
			{
				qq.preventDefault(e);

				var item = target.parentNode;
				self._handler.cancel(item.qqFileId);
				qq.remove(item);
			}
		});
	}
});


qq.UploadButton = function (o)
{
	this._options = {
		element:null,
		// if set to true adds multiple attribute to file input
		multiple:false,
		// name attribute of file input
		name:'file',
		onChange:function (input)
		{
		},
		hoverClass:'qq-upload-button-hover',
		focusClass:'qq-upload-button-focus'
	};

	qq.extend(this._options, o);

	this._element = this._options.element;

	// make button suitable container for input
	qq.css(this._element, {
		position:'relative',
		overflow:'hidden',

		direction:'ltr'
	});

	this._input = this._createInput();
};

qq.UploadButton.prototype = {

	getInput:function ()
	{
		return this._input;
	},

	reset:function ()
	{
		if (this._input.parentNode)
		{
			qq.remove(this._input);
		}

		qq.removeClass(this._element, this._options.focusClass);
		this._input = this._createInput();
	},
	_createInput:function ()
	{
		var input = document.createElement("input");

		if (this._options.multiple)
		{
			input.setAttribute("multiple", "multiple");
		}

		input.setAttribute("type", "file");
		input.setAttribute("name", this._options.name);

		qq.css(input, {
			position:'absolute',
			right:0,
			top:0,
			fontFamily:'Arial',
			fontSize:'118px',
			margin:0,
			padding:0,
			cursor:'pointer',
			opacity:0
		});

		this._element.appendChild(input);

		var self = this;
		qq.attach(input, 'change', function ()
		{
			self._options.onChange(input);
		});

		qq.attach(input, 'mouseover', function ()
		{
			qq.addClass(self._element, self._options.hoverClass);
		});
		qq.attach(input, 'mouseout', function ()
		{
			qq.removeClass(self._element, self._options.hoverClass);
		});
		qq.attach(input, 'focus', function ()
		{
			qq.addClass(self._element, self._options.focusClass);
		});
		qq.attach(input, 'blur', function ()
		{
			qq.removeClass(self._element, self._options.focusClass);
		});

		// IE and Opera, unfortunately have 2 tab stops on file input
		// which is unacceptable in our case, disable keyboard access
		if (window.attachEvent)
		{
			// it is IE or Opera
			input.setAttribute('tabIndex', "-1");
		}

		return input;
	}
};

/**
 * Class for uploading files, uploading itself is handled by child classes
 */
qq.UploadHandlerAbstract = function (o)
{
	this._options = {
		debug:false,
		action:'/upload.php',
		// maximum number of concurrent uploads
		maxConnections:999,
		onProgress:function (id, fileName, loaded, total)
		{
		},
		onComplete:function (id, fileName, response)
		{
		},
		onCancel:function (id, fileName)
		{
		}
	};
	qq.extend(this._options, o);

	this._queue = [];
	// params for files in queue
	this._params = [];
};
qq.UploadHandlerAbstract.prototype = {
	log:function (str)
	{
		if (this._options.debug && window.console) console.log('[uploader] ' + str);
	},
	/**
	 * Adds file or file input to the queue
	 * @returns id
	 **/
	add:function (file)
	{
	},
	/**
	 * Sends the file identified by id and additional query params to the server
	 */
	upload:function (id, params)
	{
		var len = this._queue.push(id);

		var copy = {};
		qq.extend(copy, params);
		this._params[id] = copy;

		// if too many active uploads, wait...
		if (len <= this._options.maxConnections)
		{
			this._upload(id, this._params[id]);
		}
	},
	/**
	 * Cancels file upload by id
	 */
	cancel:function (id)
	{
		this._cancel(id);
		this._dequeue(id);
	},
	/**
	 * Cancells all uploads
	 */
	cancelAll:function ()
	{
		for (var i = 0; i < this._queue.length; i++)
		{
			this._cancel(this._queue[i]);
		}
		this._queue = [];
	},
	/**
	 * Returns name of the file identified by id
	 */
	getName:function (id)
	{
	},
	/**
	 * Returns size of the file identified by id
	 */
	getSize:function (id)
	{
	},
	/**
	 * Returns id of files being uploaded or
	 * waiting for their turn
	 */
	getQueue:function ()
	{
		return this._queue;
	},
	/**
	 * Actual upload method
	 */
	_upload:function (id)
	{
	},
	/**
	 * Actual cancel method
	 */
	_cancel:function (id)
	{
	},
	/**
	 * Removes element from queue, starts upload of next
	 */
	_dequeue:function (id)
	{
		var i = qq.indexOf(this._queue, id);
		this._queue.splice(i, 1);

		var max = this._options.maxConnections;

		if (this._queue.length >= max)
		{
			var nextId = this._queue[max - 1];
			this._upload(nextId, this._params[nextId]);
		}
	}
};

/**
 * Class for uploading files using form and iframe
 * @inherits qq.UploadHandlerAbstract
 */
qq.UploadHandlerForm = function (o)
{
	qq.UploadHandlerAbstract.apply(this, arguments);

	this._inputs = {};
};
// @inherits qq.UploadHandlerAbstract
qq.extend(qq.UploadHandlerForm.prototype, qq.UploadHandlerAbstract.prototype);

qq.extend(qq.UploadHandlerForm.prototype, {
	add:function (fileInput)
	{
		fileInput.setAttribute('name', 'qqfile');
		var id = 'qq-upload-handler-iframe' + qq.getUniqueId();

		this._inputs[id] = fileInput;

		// remove file input from DOM
		if (fileInput.parentNode)
		{
			qq.remove(fileInput);
		}

		return id;
	},
	getName:function (id)
	{
		// get input value and remove path to normalize
		return this._inputs[id].value.replace(/.*(\/|\\)/, "");
	},
	_cancel:function (id)
	{
		this._options.onCancel(id, this.getName(id));

		delete this._inputs[id];

		var iframe = document.getElementById(id);
		if (iframe)
		{
			iframe.setAttribute('src', 'javascript:false;');

			qq.remove(iframe);
		}
	},
	_upload:function (id, params)
	{
		var input = this._inputs[id];

		if (!input)
		{
			throw new Error('file with passed id was not added, or already uploaded or cancelled');
		}

		var fileName = this.getName(id);

		var iframe = this._createIframe(id);
		var form = this._createForm(iframe, params);
		form.appendChild(input);

		var self = this;
		this._attachLoadEvent(iframe, function ()
		{
			self.log('iframe loaded');

			var response = self._getIframeContentJSON(iframe);

			self._options.onComplete(id, fileName, response);
			self._dequeue(id);

			delete self._inputs[id];
			setTimeout(function ()
			{
				qq.remove(iframe);
			}, 1);
		});

		form.submit();
		qq.remove(form);

		return id;
	},
	_attachLoadEvent:function (iframe, callback)
	{
		qq.attach(iframe, 'load', function ()
		{

			if (!iframe.parentNode)
			{
				return;
			}

			if (iframe.contentDocument &&
				iframe.contentDocument.body &&
				iframe.contentDocument.body.innerHTML == "false")
			{
				return;
			}

			callback();
		});
	},
	/**
	 * Returns json object received by iframe from server.
	 */
	_getIframeContentJSON:function (iframe)
	{
		
		var doc = iframe.contentDocument ? iframe.contentDocument : iframe.contentWindow.document,
			response;

		this.log("converting iframe's innerHTML to JSON");
		this.log("innerHTML = " + doc.body.innerHTML);

		try
		{
			response = eval("(" + doc.body.innerHTML + ")");
		} catch (err)
		{
			response = {};
		}

		return response;
	},
	/**
	 * Creates iframe with unique name
	 */
	_createIframe:function (id)
	{


		var iframe = qq.toElement('<iframe src="javascript:false;" name="' + id + '" />');
		// src="javascript:false;" removes ie6 prompt on https

		iframe.setAttribute('id', id);

		iframe.style.display = 'none';
		document.body.appendChild(iframe);

		return iframe;
	},
	/**
	 * Creates form, that will be submitted to iframe
	 */
	_createForm:function (iframe, params)
	{
		var form = qq.toElement('<form method="post" enctype="multipart/form-data"></form>');

		var queryString = qq.obj2url(params, this._options.action);

		form.setAttribute('action', queryString);
		form.setAttribute('target', iframe.name);
		form.style.display = 'none';
		document.body.appendChild(form);

		return form;
	}
});

/**
 * Class for uploading files using xhr
 * @inherits qq.UploadHandlerAbstract
 */
qq.UploadHandlerXhr = function (o)
{
	qq.UploadHandlerAbstract.apply(this, arguments);

	this._files = [];
	this._xhrs = [];

	// current loaded size in bytes for each file
	this._loaded = [];
};

// static method
qq.UploadHandlerXhr.isSupported = function ()
{
	var input = document.createElement('input');
	input.type = 'file';

	return (
		'multiple' in input &&
			typeof File != "undefined" &&
			typeof (new XMLHttpRequest()).upload != "undefined" );
};

// @inherits qq.UploadHandlerAbstract
qq.extend(qq.UploadHandlerXhr.prototype, qq.UploadHandlerAbstract.prototype);

qq.extend(qq.UploadHandlerXhr.prototype, {
	/**
	 * Adds file to the queue
	 * Returns id to use with upload, cancel
	 **/
	add:function (file)
	{
		if (!(file instanceof File))
		{
			throw new Error('Passed obj in not a File (in qq.UploadHandlerXhr)');
		}

		return this._files.push(file) - 1;
	},
	getName:function (id)
	{
		var file = this._files[id];
		// fix missing name in Safari 4
		return file.fileName != null ? file.fileName : file.name;
	},
	getSize:function (id)
	{
		var file = this._files[id];
		return file.fileSize != null ? file.fileSize : file.size;
	},
	/**
	 * Returns uploaded bytes for file identified by id
	 */
	getLoaded:function (id)
	{
		return this._loaded[id] || 0;
	},
	/**
	 * Sends the file identified by id and additional query params to the server
	 * @param {Object} params name-value string pairs
	 */
	_upload:function (id, params)
	{
		var file = this._files[id],
			name = this.getName(id),
			size = this.getSize(id);

		this._loaded[id] = 0;

		var xhr = this._xhrs[id] = new XMLHttpRequest();
		var self = this;

		xhr.upload.onprogress = function (e)
		{
			if (e.lengthComputable)
			{
				self._loaded[id] = e.loaded;
				self._options.onProgress(id, name, e.loaded, e.total);
			}
		};

		xhr.onreadystatechange = function ()
		{
			if (xhr.readyState == 4)
			{
				self._onComplete(id, xhr);
			}
		};

		// build query string
		params = params || {};
		params['qqfile'] = name;
		var queryString = qq.obj2url(params, this._options.action);

		xhr.open("POST", queryString, true);
		xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
		xhr.setRequestHeader("X-File-Name", encodeURIComponent(name));
		xhr.setRequestHeader("Content-Type", "application/octet-stream");
		xhr.send(file);
	},
	_onComplete:function (id, xhr)
	{
		// the request was aborted/cancelled
		if (!this._files[id]) return;

		var name = this.getName(id);
		var size = this.getSize(id);

		this._options.onProgress(id, name, size, size);

		if (xhr.status == 200)
		{
			this.log("xhr - server response received");
			this.log("responseText = " + xhr.responseText);

			var response;

			try
			{
				response = eval("(" + xhr.responseText + ")");
			} catch (err)
			{
				response = {};
			}

			this._options.onComplete(id, name, response);

		}
		else
		{
			this._options.onComplete(id, name, {});
		}

		this._files[id] = null;
		this._xhrs[id] = null;
		this._dequeue(id);
	},
	_cancel:function (id)
	{
		this._options.onCancel(id, this.getName(id));

		this._files[id] = null;

		if (this._xhrs[id])
		{
			this._xhrs[id].abort();
			this._xhrs[id] = null;
		}
	}
});

function deletefile(span, fileindex, url)
{
	jQuery.ajax({
		type: 'GET',
		url: url,
		cache: false,
		// The remaining part of the query string
		data: {
			'action' : 'deletefile',
			'fileindex' : fileindex
		},
		dataType: 'json', // Specify the type because the automatic recognition doesn't work on Firefox

		beforeSend: OnBeforeSend,
		success: OnLoadSuccess,
		error: OnLoadError, /* "error" is deprecated in jQuery 1.8, superseded by "fail" */
		complete: OnLoadComplete
	});

	function OnBeforeSend(jqXHR, settings)
	{
		// Hide the remove button until the operation is in progress
		document.body.style.cursor = "wait";
		jQuery(span).hide();
	}

	function OnLoadSuccess(data/*, textStatus, jqXHR*/)
	{
			// This means that the communication has been ended successfully, not the deletion itself
			if (data.success)
			{
				// Deletion successful: remove the element from the list
				jQuery(span).parent().remove();
			}
			else
			{
				alert(data.error);
			}
	}

	function OnLoadError(jqXHR, textStatus, errorThrown)
	{
		// Communication failed without an error code from the server. The only thing we can do is restoring the "remove" button.
		jQuery(span).show();
	}

	function OnLoadComplete(jqXHR, textStatus)
	{
		document.body.style.cursor = "default";
	}
}


function CreateUploadButton(uploadid, owner, id, url)
{
	var uploader = new qq.FileUploader(
		{
			element:document.getElementById(uploadid),
			action: url,
			params:{
			},
			uniqueid: 'uploadlist-' + owner + id,
			debug:true
		});
}




/* Captcha begin */
function ReloadNCaptcha(id)
{
	var image = document.getElementById(id);

	// Generates a unique id with an 8 digits fixed length
	var uniqueid = Math.floor(Math.random() * Math.pow(10, 8));
	image.src = image.src.replace(/uniqueid=[0-9]{8}/, "uniqueid=" + uniqueid);
}


function BuildReloadButton(id)
{
	document.getElementById(id).src = document.getElementById(id).src.replace("transparent.gif", "reload-16.png");
}
/* Captcha end */
