/**
 * Inserts FLV video markup into TinyMCE. Needs JwPlayerParser on the PHP side to parse the custom
 * [jwplayer] tag into a flash object tag.
 */
var JwPlayerVideoFlashFormOption = Class.create();
JwPlayerVideoFlashFormOption.prototype = {
	
	onSelect: function() {
		$('Form_EditorToolbarFlashForm').toggleFileSelection(true);
	},
	
	generateMarkup: function(href) {
		var options = {};
		jQuery(':input', this).each(function() {
			options[this.name] = this.value;
		});
		return '[jwplayer href="' + href + '" width="' + options['jwplayervideo[Width]'] + '" height="' + options['jwplayervideo[Height]'] + '"]';
	}
}
JwPlayerVideoFlashFormOption.applyTo('#JwPlayerVideoFlashFormOption');