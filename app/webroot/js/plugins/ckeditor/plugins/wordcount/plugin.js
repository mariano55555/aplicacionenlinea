/**
 * @license Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */
 
CKEDITOR.plugins.add('wordcount', {
    lang: ['de', 'en', 'es'],
    init: function (editor) {
        var defaultLimit = 'unlimited';
        var defaultFormat = '<span class="cke_path_item">' + editor.lang.wordcount.WordCount + ' %count%</span>';
        var limit = defaultLimit;
        var format = defaultFormat;
        var intervalId;
        var lastCount = 0;
        var limitReachedNotified = false;
        var limitRestoredNotified = false;
        
		CKEDITOR.document.appendStyleSheet(this.path + 'css/wordcount.css');

        function counterId(editor) {
            return 'cke_wordcount_' + editor.name
        }

        function counterElement(editor) {
            return document.getElementById(counterId(editor))
        }

        function strip(html) {
            var tmp = document.createElement("div");
            tmp.innerHTML = html;
            return tmp.textContent || tmp.innerText
        }

        function updateCounter(editor) {
            var count = 0;
            if (editor.getData()) {
                count = strip(editor.getData()).trim().split(/\s+/).length;
            }
            var html = format.replace('%count%', count);
            counterElement(editor).innerHTML = html
            if (count == lastCount) {
                return true
            } else {
                lastCount = count
            }
            if (count > limit) {
                limitReached(editor, limitReachedNotified)
            } else if (!limitRestoredNotified && count < limit) {
                limitRestored(editor)
            }
        }

        function limitReached(editor, notify) {
            limitReachedNotified = true;
            limitRestoredNotified = false;
            editor.execCommand('undo');
            if (!notify) {
                editor.fire('limitReached', {}, editor);
            }
            // lock editor
            editor.config.Locked = 1;
            editor.fire("change");
        }

        function limitRestored(editor) {
            limitRestoredNotified = true;
            limitReachedNotified = false;
            editor.config.Locked = 0;
        }
        editor.on('uiSpace', function (event) {
            if (event.data.space == 'bottom') {
                event.data.html += '<div id="' + counterId(event.editor) + '" class="cke_wordcount" style=""' + ' title="' + CKEDITOR.tools.htmlEncode('Words Counter') + '"' + '>&nbsp;</div>'
            }
        }, editor, null, 100);
        editor.on('instanceReady', function (event) {
            if (editor.config.wordcount_limit != undefined) {
                limit = editor.config.wordcount_limit
            }
            if (editor.config.wordcount_format != undefined) {
                format = editor.config.wordcount_format
            }
        }, editor, null, 100);
        editor.on('dataReady', function (event) {
            var count = event.editor.getData().length;
            if (count > limit) {
                limitReached(editor)
            }
            updateCounter(event.editor)
        }, editor, null, 100);
        editor.on('change', function (event) {
            updateCounter(event.editor)
        }, editor, null, 100);
        editor.on('focus', function (event) {
            editorHasFocus = true;
            intervalId = window.setInterval(function (editor) {
                updateCounter(editor)
            }, 1000, event.editor)
        }, editor, null, 100);
        editor.on('blur', function (event) {
            editorHasFocus = false;
            if (intervalId) clearInterval(intervalId)
        }, editor, null, 100)
    }
});