var TextEditor = function() {"use strict";
	var ckEditorHandler = function() {
		CKEDITOR.disableAutoInline = true;
		$('textarea.ckeditor').ckeditor();
	};

	return {
		init: function() {
			ckEditorHandler();
		}
	};
}();
