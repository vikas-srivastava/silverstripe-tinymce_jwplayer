/**
 * Inserts FLV video markup into TinyMCE. Needs JwPlayerParser on the PHP side to parse the custom
 * [jwplayer] tag into a flash object tag.
 */
JwPlayerVideoFlashFormOption = Class.extend('FlashFormOption');
JwPlayerVideoFlashFormOption.prototype = {
	
	onSelect: function() {
		$('Form_EditorToolbarFlashForm').toggleFileSelection(true);
	},
	
	generateMarkup: function(href, options) {
		return '[jwplayer href="' + href + '" width="' + options['jwplayervideo[Width]'] + '" height="' + options['jwplayervideo[Height]'] + '"]';
	}
}
JwPlayerVideoFlashFormOption.applyTo('#JwPlayerVideoFlashFormOption');