/**
 * Inserts FLV Audio markup into TinyMCE. Needs JwPlayerParser on the PHP side to parse the custom
 * [jwplayer] tag into a flash object tag.
 */
var JwPlayerAudioFlashFormOption = Class.create();
JwPlayerAudioFlashFormOption.prototype = {
	
	onSelect: function() {
		$('Form_EditorToolbarFlashForm').toggleFileSelection(true);
	},
	
	generateMarkup: function(href) {
		var options = {};
		jQuery(':input', this).each(function() {
			options[this.name] = this.value;
		});
		return '[jwplayer href="' + href + '" width="' + options['jwplayeraudio[Width]'] + '" height="' + options['jwplayeraudio[Height]'] + '"]';
	}
}
JwPlayerAudioFlashFormOption.applyTo('#JwPlayerAudioFlashFormOption');