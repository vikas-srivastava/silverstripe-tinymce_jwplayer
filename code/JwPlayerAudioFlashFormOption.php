<?php
class JwPlayerAudioFlashFormOption extends HtmlEditorField_FlashFormOption {
	function __construct() {
		Requirements::javascript('cms/javascript/flashform/FlashFormOption.js');
		Requirements::javascript('tinymce_jwplayer/javascript/JwPlayerAudioFlashFormOption.js');
	}
	
	function getFields() {
		$fields = new FieldGroup(_t('HtmlEditorField.IMAGEDIMENSIONS', "Dimensions"),
			$fieldWidth = new TextField("jwplayeraudio[Width]", _t('JwPlayerFlashFormOption.IMAGEWIDTHPX', "Width"), JwPlayerParser::$default_width),
			$fieldHeight = new TextField("jwplayeraudio[Height]", _t('JwPlayerFlashFormOption.IMAGEHEIGHTPX', "Height"), 18)
		);
		$fieldWidth->addExtraClass('small');
		$fieldHeight->addExtraClass('small');
		
		return $fields;
	}
	
	function getTitle() {
		return _t('JwPlayerFlashFormOption.TITLEAUDIO', 'Audio');
	}
}
?>