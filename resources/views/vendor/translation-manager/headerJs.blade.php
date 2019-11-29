
{{--    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>--}}
{{--<script src="//cdnjs.c.loudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap-editable/js/bootstrap-editable.min.js"></script>--}}
{{--<script src="//cdnjs.cloudflare.com/a42jax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>--}}


    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    

    
    
{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">--}}
{{--<link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>--}}

{{--новая версия--}}
{{--<script>
    /* jshint node: true */
    /**
     * Unobtrusive scripting adapter for jQuery
     * https://github.com/rails/jquery-ujs
     *
     * Requires jQuery 1.8.0 or later.
     *
     * Released under the MIT license
     *
     */
    
    (function() {
        'use strict';

        var jqueryUjsInit = function($, undefined) {

            // Cut down on the number of issues from people inadvertently including jquery_ujs twice
            // by detecting and raising an error when it happens.
            if ( $.rails !== undefined ) {
                $.error('jquery-ujs has already been loaded!');
            }

            // Shorthand to make it a little easier to call public rails functions from within rails.js
            var rails;
            var $document = $(document);

            $.rails = rails = {
                // Link elements bound by jquery-ujs
                linkClickSelector: 'a[data-confirm], a[data-method], a[data-remote]:not([disabled]), a[data-disable-with], a[data-disable]',

                // Button elements bound by jquery-ujs
                buttonClickSelector: 'button[data-remote]:not([form]):not(form button), button[data-confirm]:not([form]):not(form button)',

                // Select elements bound by jquery-ujs
                inputChangeSelector: 'select[data-remote], input[data-remote], textarea[data-remote]',

                // Form elements bound by jquery-ujs
                formSubmitSelector: 'form',

                // Form input elements bound by jquery-ujs
                formInputClickSelector: 'form input[type=submit], form input[type=image], form button[type=submit], form button:not([type]), input[type=submit][form], input[type=image][form], button[type=submit][form], button[form]:not([type])',

                // Form input elements disabled during form submission
                disableSelector: 'input[data-disable-with]:enabled, button[data-disable-with]:enabled, textarea[data-disable-with]:enabled, input[data-disable]:enabled, button[data-disable]:enabled, textarea[data-disable]:enabled',

                // Form input elements re-enabled after form submission
                enableSelector: 'input[data-disable-with]:disabled, button[data-disable-with]:disabled, textarea[data-disable-with]:disabled, input[data-disable]:disabled, button[data-disable]:disabled, textarea[data-disable]:disabled',

                // Form required input elements
                requiredInputSelector: 'input[name][required]:not([disabled]), textarea[name][required]:not([disabled])',

                // Form file input elements
                fileInputSelector: 'input[name][type=file]:not([disabled])',

                // Link onClick disable selector with possible reenable after remote submission
                linkDisableSelector: 'a[data-disable-with], a[data-disable]',

                // Button onClick disable selector with possible reenable after remote submission
                buttonDisableSelector: 'button[data-remote][data-disable-with], button[data-remote][data-disable]',

                // Up-to-date Cross-Site Request Forgery token
                csrfToken: function() {
                    return $('meta[name=csrf-token]').attr('content');
                },

                // URL param that must contain the CSRF token
                csrfParam: function() {
                    return $('meta[name=csrf-param]').attr('content');
                },

                // Make sure that every Ajax request sends the CSRF token
                CSRFProtection: function(xhr) {
                    var token = rails.csrfToken();
                    if (token) xhr.setRequestHeader('X-CSRF-Token', token);
                },

                // Make sure that all forms have actual up-to-date tokens (cached forms contain old ones)
                refreshCSRFTokens: function(){
                    $('form input[name="' + rails.csrfParam() + '"]').val(rails.csrfToken());
                },

                // Triggers an event on an element and returns false if the event result is false
                fire: function(obj, name, data) {
                    var event = $.Event(name);
                    obj.trigger(event, data);
                    return event.result !== false;
                },

                // Default confirm dialog, may be overridden with custom confirm dialog in $.rails.confirm
                confirm: function(message) {
                    return confirm(message);
                },

                // Default ajax function, may be overridden with custom function in $.rails.ajax
                ajax: function(options) {
                    return $.ajax(options);
                },

                // Default way to get an element's href. May be overridden at $.rails.href.
                href: function(element) {
                    return element[0].href;
                },

                // Checks "data-remote" if true to handle the request through a XHR request.
                isRemote: function(element) {
                    return element.data('remote') !== undefined && element.data('remote') !== false;
                },

                // Submits "remote" forms and links with ajax
                handleRemote: function(element) {
                    var method, url, data, withCredentials, dataType, options;

                    if (rails.fire(element, 'ajax:before')) {
                        withCredentials = element.data('with-credentials') || null;
                        dataType = element.data('type') || ($.ajaxSettings && $.ajaxSettings.dataType);

                        if (element.is('form')) {
                            method = element.data('ujs:submit-button-formmethod') || element.attr('method');
                            url = element.data('ujs:submit-button-formaction') || element.attr('action');
                            data = $(element[0]).serializeArray();
                            // memoized value from clicked submit button
                            var button = element.data('ujs:submit-button');
                            if (button) {
                                data.push(button);
                                element.data('ujs:submit-button', null);
                            }
                            element.data('ujs:submit-button-formmethod', null);
                            element.data('ujs:submit-button-formaction', null);
                        } else if (element.is(rails.inputChangeSelector)) {
                            method = element.data('method');
                            url = element.data('url');
                            data = element.serialize();
                            if (element.data('params')) data = data + '&' + element.data('params');
                        } else if (element.is(rails.buttonClickSelector)) {
                            method = element.data('method') || 'get';
                            url = element.data('url');
                            data = element.serialize();
                            if (element.data('params')) data = data + '&' + element.data('params');
                        } else {
                            method = element.data('method');
                            url = rails.href(element);
                            data = element.data('params') || null;
                        }

                        options = {
                            type: method || 'GET', data: data, dataType: dataType,
                            // stopping the "ajax:beforeSend" event will cancel the ajax request
                            beforeSend: function(xhr, settings) {
                                if (settings.dataType === undefined) {
                                    xhr.setRequestHeader('accept', '*/*;q=0.5, ' + settings.accepts.script);
                                }
                                if (rails.fire(element, 'ajax:beforeSend', [xhr, settings])) {
                                    element.trigger('ajax:send', xhr);
                                } else {
                                    return false;
                                }
                            },
                            success: function(data, status, xhr) {
                                element.trigger('ajax:success', [data, status, xhr]);
                            },
                            complete: function(xhr, status) {
                                element.trigger('ajax:complete', [xhr, status]);
                            },
                            error: function(xhr, status, error) {
                                element.trigger('ajax:error', [xhr, status, error]);
                            },
                            crossDomain: rails.isCrossDomain(url)
                        };

                        // There is no withCredentials for IE6-8 when
                        // "Enable native XMLHTTP support" is disabled
                        if (withCredentials) {
                            options.xhrFields = {
                                withCredentials: withCredentials
                            };
                        }

                        // Only pass url to `ajax` options if not blank
                        if (url) { options.url = url; }

                        return rails.ajax(options);
                    } else {
                        return false;
                    }
                },

                // Determines if the request is a cross domain request.
                isCrossDomain: function(url) {
                    var originAnchor = document.createElement('a');
                    originAnchor.href = location.href;
                    var urlAnchor = document.createElement('a');

                    try {
                        urlAnchor.href = url;
                        // This is a workaround to a IE bug.
                        urlAnchor.href = urlAnchor.href;

                        // If URL protocol is false or is a string containing a single colon
                        // *and* host are false, assume it is not a cross-domain request
                        // (should only be the case for IE7 and IE compatibility mode).
                        // Otherwise, evaluate protocol and host of the URL against the origin
                        // protocol and host.
                        return !(((!urlAnchor.protocol || urlAnchor.protocol === ':') && !urlAnchor.host) ||
                            (originAnchor.protocol + '//' + originAnchor.host ===
                                urlAnchor.protocol + '//' + urlAnchor.host));
                    } catch (e) {
                        // If there is an error parsing the URL, assume it is crossDomain.
                        return true;
                    }
                },

                // Handles "data-method" on links such as:
                // <a href="/users/5" data-method="delete" rel="nofollow" data-confirm="Are you sure?">Delete</a>
                handleMethod: function(link) {
                    var href = rails.href(link),
                        method = link.data('method'),
                        target = link.attr('target'),
                        csrfToken = rails.csrfToken(),
                        csrfParam = rails.csrfParam(),
                        form = $('<form method="post" action="' + href + '"></form>'),
                        metadataInput = '<input name="_method" value="' + method + '" type="hidden" />';

                    if (csrfParam !== undefined && csrfToken !== undefined && !rails.isCrossDomain(href)) {
                        metadataInput += '<input name="' + csrfParam + '" value="' + csrfToken + '" type="hidden" />';
                    }

                    if (target) { form.attr('target', target); }

                    form.hide().append(metadataInput).appendTo('body');
                    form.submit();
                },

                // Helper function that returns form elements that match the specified CSS selector
                // If form is actually a "form" element this will return associated elements outside the from that have
                // the html form attribute set
                formElements: function(form, selector) {
                    return form.is('form') ? $(form[0].elements).filter(selector) : form.find(selector);
                },

                /* Disables form elements:
									- Caches element value in 'ujs:enable-with' data store
									- Replaces element text with value of 'data-disable-with' attribute
									- Sets disabled property to true
								*/
                disableFormElements: function(form) {
                    rails.formElements(form, rails.disableSelector).each(function() {
                        rails.disableFormElement($(this));
                    });
                },

                disableFormElement: function(element) {
                    var method, replacement;

                    method = element.is('button') ? 'html' : 'val';
                    replacement = element.data('disable-with');

                    if (replacement !== undefined) {
                        element.data('ujs:enable-with', element[method]());
                        element[method](replacement);
                    }

                    element.prop('disabled', true);
                    element.data('ujs:disabled', true);
                },

                /* Re-enables disabled form elements:
									- Replaces element text with cached value from 'ujs:enable-with' data store (created in `disableFormElements`)
									- Sets disabled property to false
								*/
                enableFormElements: function(form) {
                    rails.formElements(form, rails.enableSelector).each(function() {
                        rails.enableFormElement($(this));
                    });
                },

                enableFormElement: function(element) {
                    var method = element.is('button') ? 'html' : 'val';
                    if (element.data('ujs:enable-with') !== undefined) {
                        element[method](element.data('ujs:enable-with'));
                        element.removeData('ujs:enable-with'); // clean up cache
                    }
                    element.prop('disabled', false);
                    element.removeData('ujs:disabled');
                },

                /* For 'data-confirm' attribute:
									 - Fires `confirm` event
									 - Shows the confirmation dialog
									 - Fires the `confirm:complete` event
						 
									 Returns `true` if no function stops the chain and user chose yes; `false` otherwise.
									 Attaching a handler to the element's `confirm` event that returns a `falsy` value cancels the confirmation dialog.
									 Attaching a handler to the element's `confirm:complete` event that returns a `falsy` value makes this function
									 return false. The `confirm:complete` event is fired whether or not the user answered true or false to the dialog.
								*/
                allowAction: function(element) {
                    var message = element.data('confirm'),
                        answer = false, callback;
                    if (!message) { return true; }

                    if (rails.fire(element, 'confirm')) {
                        try {
                            answer = rails.confirm(message);
                        } catch (e) {
                            (console.error || console.log).call(console, e.stack || e);
                        }
                        callback = rails.fire(element, 'confirm:complete', [answer]);
                    }
                    return answer && callback;
                },

                // Helper function which checks for blank inputs in a form that match the specified CSS selector
                blankInputs: function(form, specifiedSelector, nonBlank) {
                    var foundInputs = $(),
                        input,
                        valueToCheck,
                        radiosForNameWithNoneSelected,
                        radioName,
                        selector = specifiedSelector || 'input,textarea',
                        requiredInputs = form.find(selector),
                        checkedRadioButtonNames = {};

                    requiredInputs.each(function() {
                        input = $(this);
                        if (input.is('input[type=radio]')) {

                            // Don't count unchecked required radio as blank if other radio with same name is checked,
                            // regardless of whether same-name radio input has required attribute or not. The spec
                            // states https://www.w3.org/TR/html5/forms.html#the-required-attribute
                            radioName = input.attr('name');

                            // Skip if we've already seen the radio with this name.
                            if (!checkedRadioButtonNames[radioName]) {

                                // If none checked
                                if (form.find('input[type=radio]:checked[name="' + radioName + '"]').length === 0) {
                                    radiosForNameWithNoneSelected = form.find(
                                        'input[type=radio][name="' + radioName + '"]');
                                    foundInputs = foundInputs.add(radiosForNameWithNoneSelected);
                                }

                                // We only need to check each name once.
                                checkedRadioButtonNames[radioName] = radioName;
                            }
                        } else {
                            valueToCheck = input.is('input[type=checkbox],input[type=radio]') ? input.is(':checked') : !!input.val();
                            if (valueToCheck === nonBlank) {
                                foundInputs = foundInputs.add(input);
                            }
                        }
                    });
                    return foundInputs.length ? foundInputs : false;
                },

                // Helper function which checks for non-blank inputs in a form that match the specified CSS selector
                nonBlankInputs: function(form, specifiedSelector) {
                    return rails.blankInputs(form, specifiedSelector, true); // true specifies nonBlank
                },

                // Helper function, needed to provide consistent behavior in IE
                stopEverything: function(e) {
                    $(e.target).trigger('ujs:everythingStopped');
                    e.stopImmediatePropagation();
                    return false;
                },

                //  Replace element's html with the 'data-disable-with' after storing original html
                //  and prevent clicking on it
                disableElement: function(element) {
                    var replacement = element.data('disable-with');

                    if (replacement !== undefined) {
                        element.data('ujs:enable-with', element.html()); // store enabled state
                        element.html(replacement);
                    }

                    element.on('click.railsDisable', function(e) { // prevent further clicking
                        return rails.stopEverything(e);
                    });
                    element.data('ujs:disabled', true);
                },

                // Restore element to its original state which was disabled by 'disableElement' above
                enableElement: function(element) {
                    if (element.data('ujs:enable-with') !== undefined) {
                        element.html(element.data('ujs:enable-with')); // set to old enabled state
                        element.removeData('ujs:enable-with'); // clean up cache
                    }
                    element.off('click.railsDisable'); // enable element
                    element.removeData('ujs:disabled');
                }
            };

            if (rails.fire($document, 'rails:attachBindings')) {

                $.ajaxPrefilter(function(options, originalOptions, xhr){ if ( !options.crossDomain ) { rails.CSRFProtection(xhr); }});

                // This event works the same as the load event, except that it fires every
                // time the page is loaded.
                //
                // See https://github.com/rails/jquery-ujs/issues/357
                // See https://developer.mozilla.org/en-US/docs/Using_Firefox_1.5_caching
                $(window).on('pageshow.rails', function () {
                    $($.rails.enableSelector).each(function () {
                        var element = $(this);

                        if (element.data('ujs:disabled')) {
                            $.rails.enableFormElement(element);
                        }
                    });

                    $($.rails.linkDisableSelector).each(function () {
                        var element = $(this);

                        if (element.data('ujs:disabled')) {
                            $.rails.enableElement(element);
                        }
                    });
                });

                $document.on('ajax:complete', rails.linkDisableSelector, function() {
                    rails.enableElement($(this));
                });

                $document.on('ajax:complete', rails.buttonDisableSelector, function() {
                    rails.enableFormElement($(this));
                });

                $document.on('click.rails', rails.linkClickSelector, function(e) {
                    var link = $(this), method = link.data('method'), data = link.data('params'), metaClick = e.metaKey || e.ctrlKey;
                    if (!rails.allowAction(link)) return rails.stopEverything(e);

                    if (!metaClick && link.is(rails.linkDisableSelector)) rails.disableElement(link);

                    if (rails.isRemote(link)) {
                        if (metaClick && (!method || method === 'GET') && !data) { return true; }

                        var handleRemote = rails.handleRemote(link);
                        // Response from rails.handleRemote() will either be false or a deferred object promise.
                        if (handleRemote === false) {
                            rails.enableElement(link);
                        } else {
                            handleRemote.fail( function() { rails.enableElement(link); } );
                        }
                        return false;

                    } else if (method) {
                        rails.handleMethod(link);
                        return false;
                    }
                });

                $document.on('click.rails', rails.buttonClickSelector, function(e) {
                    var button = $(this);

                    if (!rails.allowAction(button) || !rails.isRemote(button)) return rails.stopEverything(e);

                    if (button.is(rails.buttonDisableSelector)) rails.disableFormElement(button);

                    var handleRemote = rails.handleRemote(button);
                    // Response from rails.handleRemote() will either be false or a deferred object promise.
                    if (handleRemote === false) {
                        rails.enableFormElement(button);
                    } else {
                        handleRemote.fail( function() { rails.enableFormElement(button); } );
                    }
                    return false;
                });

                $document.on('change.rails', rails.inputChangeSelector, function(e) {
                    var link = $(this);
                    if (!rails.allowAction(link) || !rails.isRemote(link)) return rails.stopEverything(e);

                    rails.handleRemote(link);
                    return false;
                });

                $document.on('submit.rails', rails.formSubmitSelector, function(e) {
                    var form = $(this),
                        remote = rails.isRemote(form),
                        blankRequiredInputs,
                        nonBlankFileInputs;

                    if (!rails.allowAction(form)) return rails.stopEverything(e);

                    // Skip other logic when required values are missing or file upload is present
                    if (form.attr('novalidate') === undefined) {
                        if (form.data('ujs:formnovalidate-button') === undefined) {
                            blankRequiredInputs = rails.blankInputs(form, rails.requiredInputSelector, false);
                            if (blankRequiredInputs && rails.fire(form, 'ajax:aborted:required', [blankRequiredInputs])) {
                                return rails.stopEverything(e);
                            }
                        } else {
                            // Clear the formnovalidate in case the next button click is not on a formnovalidate button
                            // Not strictly necessary to do here, since it is also reset on each button click, but just to be certain
                            form.data('ujs:formnovalidate-button', undefined);
                        }
                    }

                    if (remote) {
                        nonBlankFileInputs = rails.nonBlankInputs(form, rails.fileInputSelector);
                        if (nonBlankFileInputs) {
                            // Slight timeout so that the submit button gets properly serialized
                            // (make it easy for event handler to serialize form without disabled values)
                            setTimeout(function(){ rails.disableFormElements(form); }, 13);
                            var aborted = rails.fire(form, 'ajax:aborted:file', [nonBlankFileInputs]);

                            // Re-enable form elements if event bindings return false (canceling normal form submission)
                            if (!aborted) { setTimeout(function(){ rails.enableFormElements(form); }, 13); }

                            return aborted;
                        }

                        rails.handleRemote(form);
                        return false;

                    } else {
                        // Slight timeout so that the submit button gets properly serialized
                        setTimeout(function(){ rails.disableFormElements(form); }, 13);
                    }
                });

                $document.on('click.rails', rails.formInputClickSelector, function(event) {
                    var button = $(this);

                    if (!rails.allowAction(button)) return rails.stopEverything(event);

                    // Register the pressed submit button
                    var name = button.attr('name'),
                        data = name ? {name:name, value:button.val()} : null;

                    var form = button.closest('form');
                    if (form.length === 0) {
                        form = $('#' + button.attr('form'));
                    }
                    form.data('ujs:submit-button', data);

                    // Save attributes from button
                    form.data('ujs:formnovalidate-button', button.attr('formnovalidate'));
                    form.data('ujs:submit-button-formaction', button.attr('formaction'));
                    form.data('ujs:submit-button-formmethod', button.attr('formmethod'));
                });

                $document.on('ajax:send.rails', rails.formSubmitSelector, function(event) {
                    if (this === event.target) rails.disableFormElements($(this));
                });

                $document.on('ajax:complete.rails', rails.formSubmitSelector, function(event) {
                    if (this === event.target) rails.enableFormElements($(this));
                });

                $(function(){
                    rails.refreshCSRFTokens();
                });
            }

        };
        if (window.jQuery) {
            jqueryUjsInit(jQuery);
        } else if (typeof exports === 'object' && typeof module === 'object') {
            module.exports = jqueryUjsInit;
        }
    })();
</script>--}}


{{--старая версия--}}
{{--//https://github.com/rails/jquery-ujs/blob/master/src/rails.js--}}
<script>
   (function(e,t){if(e.rails!==t){e.error("jquery-ujs has already been loaded!")}var n;var r=e(document);e.rails=n={linkClickSelector:"a[data-confirm], a[data-method], a[data-remote], a[data-disable-with]",buttonClickSelector:"button[data-remote], button[data-confirm]",inputChangeSelector:"select[data-remote], input[data-remote], textarea[data-remote]",formSubmitSelector:"form",formInputClickSelector:"form input[type=submit], form input[type=image], form button[type=submit], form button:not([type])",disableSelector:"input[data-disable-with], button[data-disable-with], textarea[data-disable-with]",enableSelector:"input[data-disable-with]:disabled, button[data-disable-with]:disabled, textarea[data-disable-with]:disabled",requiredInputSelector:"input[name][required]:not([disabled]),textarea[name][required]:not([disabled])",fileInputSelector:"input[type=file]",linkDisableSelector:"a[data-disable-with]",buttonDisableSelector:"button[data-remote][data-disable-with]",CSRFProtection:function(t){var n=e('meta[name="csrf-token"]').attr("content");if(n)t.setRequestHeader("X-CSRF-Token",n)},refreshCSRFTokens:function(){var t=e("meta[name=csrf-token]").attr("content");var n=e("meta[name=csrf-param]").attr("content");e('form input[name="'+n+'"]').val(t)},fire:function(t,n,r){var i=e.Event(n);t.trigger(i,r);return i.result!==false},confirm:function(e){return confirm(e)},ajax:function(t){return e.ajax(t)},href:function(e){return e.attr("href")},handleRemote:function(r){var i,s,o,u,a,f,l,c;if(n.fire(r,"ajax:before")){u=r.data("cross-domain");a=u===t?null:u;f=r.data("with-credentials")||null;l=r.data("type")||e.ajaxSettings&&e.ajaxSettings.dataType;if(r.is("form")){i=r.attr("method");s=r.attr("action");o=r.serializeArray();var h=r.data("ujs:submit-button");if(h){o.push(h);r.data("ujs:submit-button",null)}}else if(r.is(n.inputChangeSelector)){i=r.data("method");s=r.data("url");o=r.serialize();if(r.data("params"))o=o+"&"+r.data("params")}else if(r.is(n.buttonClickSelector)){i=r.data("method")||"get";s=r.data("url");o=r.serialize();if(r.data("params"))o=o+"&"+r.data("params")}else{i=r.data("method");s=n.href(r);o=r.data("params")||null}c={type:i||"GET",data:o,dataType:l,beforeSend:function(e,i){if(i.dataType===t){e.setRequestHeader("accept","*/*;q=0.5, "+i.accepts.script)}if(n.fire(r,"ajax:beforeSend",[e,i])){r.trigger("ajax:send",e)}else{return false}},success:function(e,t,n){r.trigger("ajax:success",[e,t,n])},complete:function(e,t){r.trigger("ajax:complete",[e,t])},error:function(e,t,n){r.trigger("ajax:error",[e,t,n])},crossDomain:a};if(f){c.xhrFields={withCredentials:f}}if(s){c.url=s}return n.ajax(c)}else{return false}},handleMethod:function(r){var i=n.href(r),s=r.data("method"),o=r.attr("target"),u=e("meta[name=csrf-token]").attr("content"),a=e("meta[name=csrf-param]").attr("content"),f=e('<form method="post" action="'+i+'"></form>'),l='<input name="_method" value="'+s+'" type="hidden" />';if(a!==t&&u!==t){l+='<input name="'+a+'" value="'+u+'" type="hidden" />'}if(o){f.attr("target",o)}f.hide().append(l).appendTo("body");f.submit()},formElements:function(t,n){return t.is("form")?e(t[0].elements).filter(n):t.find(n)},disableFormElements:function(t){n.formElements(t,n.disableSelector).each(function(){n.disableFormElement(e(this))})},disableFormElement:function(e){var t=e.is("button")?"html":"val";e.data("ujs:enable-with",e[t]());e[t](e.data("disable-with"));e.prop("disabled",true)},enableFormElements:function(t){n.formElements(t,n.enableSelector).each(function(){n.enableFormElement(e(this))})},enableFormElement:function(e){var t=e.is("button")?"html":"val";if(e.data("ujs:enable-with"))e[t](e.data("ujs:enable-with"));e.prop("disabled",false)},allowAction:function(e){var t=e.data("confirm"),r=false,i;if(!t){return true}if(n.fire(e,"confirm")){r=n.confirm(t);i=n.fire(e,"confirm:complete",[r])}return r&&i},blankInputs:function(t,n,r){var i=e(),s,o,u=n||"input,textarea",a=t.find(u);a.each(function(){s=e(this);o=s.is("input[type=checkbox],input[type=radio]")?s.is(":checked"):s.val();if(!o===!r){if(s.is("input[type=radio]")&&a.filter('input[type=radio]:checked[name="'+s.attr("name")+'"]').length){return true}i=i.add(s)}});return i.length?i:false},nonBlankInputs:function(e,t){return n.blankInputs(e,t,true)},stopEverything:function(t){e(t.target).trigger("ujs:everythingStopped");t.stopImmediatePropagation();return false},disableElement:function(e){e.data("ujs:enable-with",e.html());e.html(e.data("disable-with"));e.bind("click.railsDisable",function(e){return n.stopEverything(e)})},enableElement:function(e){if(e.data("ujs:enable-with")!==t){e.html(e.data("ujs:enable-with"));e.removeData("ujs:enable-with")}e.unbind("click.railsDisable")}};if(n.fire(r,"rails:attachBindings")){e.ajaxPrefilter(function(e,t,r){if(!e.crossDomain){n.CSRFProtection(r)}});r.delegate(n.linkDisableSelector,"ajax:complete",function(){n.enableElement(e(this))});r.delegate(n.buttonDisableSelector,"ajax:complete",function(){n.enableFormElement(e(this))});r.delegate(n.linkClickSelector,"click.rails",function(r){var i=e(this),s=i.data("method"),o=i.data("params"),u=r.metaKey||r.ctrlKey;if(!n.allowAction(i))return n.stopEverything(r);if(!u&&i.is(n.linkDisableSelector))n.disableElement(i);if(i.data("remote")!==t){if(u&&(!s||s==="GET")&&!o){return true}var a=n.handleRemote(i);if(a===false){n.enableElement(i)}else{a.error(function(){n.enableElement(i)})}return false}else if(i.data("method")){n.handleMethod(i);return false}});r.delegate(n.buttonClickSelector,"click.rails",function(t){var r=e(this);if(!n.allowAction(r))return n.stopEverything(t);if(r.is(n.buttonDisableSelector))n.disableFormElement(r);var i=n.handleRemote(r);if(i===false){n.enableFormElement(r)}else{i.error(function(){n.enableFormElement(r)})}return false});r.delegate(n.inputChangeSelector,"change.rails",function(t){var r=e(this);if(!n.allowAction(r))return n.stopEverything(t);n.handleRemote(r);return false});r.delegate(n.formSubmitSelector,"submit.rails",function(r){var i=e(this),s=i.data("remote")!==t,o,u;if(!n.allowAction(i))return n.stopEverything(r);if(i.attr("novalidate")==t){o=n.blankInputs(i,n.requiredInputSelector);if(o&&n.fire(i,"ajax:aborted:required",[o])){return n.stopEverything(r)}}if(s){u=n.nonBlankInputs(i,n.fileInputSelector);if(u){setTimeout(function(){n.disableFormElements(i)},13);var a=n.fire(i,"ajax:aborted:file",[u]);if(!a){setTimeout(function(){n.enableFormElements(i)},13)}return a}n.handleRemote(i);return false}else{setTimeout(function(){n.disableFormElements(i)},13)}});r.delegate(n.formInputClickSelector,"click.rails",function(t){var r=e(this);if(!n.allowAction(r))return n.stopEverything(t);var i=r.attr("name"),s=i?{name:i,value:r.val()}:null;r.closest("form").data("ujs:submit-button",s)});r.delegate(n.formSubmitSelector,"ajax:send.rails",function(t){if(this==t.target)n.disableFormElements(e(this))});r.delegate(n.formSubmitSelector,"ajax:complete.rails",function(t){if(this==t.target)n.enableFormElements(e(this))});e(function(){n.refreshCSRFTokens()})}})(jQuery)
</script>
