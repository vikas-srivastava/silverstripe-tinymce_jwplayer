<?php
class JwPlayerVideoFlashFormOption extends HtmlEditorField_FlashFormOption {
	function __construct() {
		Requirements::javascript('cms/javascript/flashform/FlashFormOption.js');
		Requirements::javascript('tinymce_jwplayer/javascript/JwPlayerVideoFlashFormOption.js');
	}
	
	function getFields() {
		$fields = new FieldGroup(_t('HtmlEditorField.IMAGEDIMENSIONS', "Dimensions"),
			$fieldWidth = new TextField("jwplayer[Width]", _t('JwPlayerFlashFormOption.IMAGEWIDTHPX', "Width"), JwPlayerParser::$default_width),
			$fieldHeight = new TextField("jwplayer[Height]", _t('JwPlayerFlashFormOption.IMAGEHEIGHTPX', "Height"), JwPlayerParser::$default_height)
		);
		$fieldWidth->addExtraClass('small');
		$fieldHeight->addExtraClass('small');
		
		return $fields;
	}
	
	function getTitle() {
		return _t('JwPlayerFlashFormOption.TITLEVIDEO', 'Video');
	}
}
?>