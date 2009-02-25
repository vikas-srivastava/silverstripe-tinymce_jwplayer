<?php
/**
 * Parses bbcode-style tags with references to local Flash Video Files (FLV) into 
 * a Flash-based video player (http://www.longtailvideo.com/).
 * 
 * Usually hooked into {@link HTMLText} fields like SiteTree->Content which parse
 * the content automatically. SilverStripe-specific TinyMCE plugins provide a graphical
 * way of inserting these codes through the SilverStripe sidebar and the "insert flash" button.
 * 
 * You'll need to overload Page->Content() for the parser to kick in, see installation instructions.
 * 
 * @author Ingo Schommer, SilverStripe Ltd.
 *
 * @package tinymce_jwplayer
 * @subpackage parsers
 */
class JwPlayerParser extends TextParser {
	
	static $player_url = 'tinymce_jwplayer/thirdparty/mediaplayer-4.2/player.swf';
	
	static $default_width = '400';
	
	static $default_height = '300';
	
	function parse() {
		if(!preg_match('/\[jwplayer/', $this->content)) return $this->content;
		
		$replaceVars = array("PLAYER", "HREF", "WIDTH", "HEIGHT", "POSTID");
		$replaceVals = array(self::$player_url, '', self::$default_width, self::$default_height, rand());
		
		$html = '';
		
		// build the output html.	
		$html = "
		<object width=\"%WIDTH%\" height=\"%HEIGHT%\" data=\"%PLAYER%\" type=\"application/x-shockwave-flash\">
			<param name=\"movie\" value=\"%PLAYER%\" />
			<param name=\"allowfullscreen\" value=\"true\" />
			<param name=\"allowscriptaccess\" value=\"always\" />
			<param name=\"flashvars\" value=\"file=%HREF%\" />
		</object>";

		preg_match_all('!\[jwplayer(.*?)\]!i', $this->content, $matches);

		$fullMatch = $matches[0];
		$attrs = $matches[1];
		for ($i = 0; $i < count($attrs); $i++){
			preg_match_all('!(href|width|height)="([^"]*)"!i',$attrs[$i],$matches);
			$tmp = $html;
			$flowSetVars = $flowSetVals = array();
			for ($j = 0; $j < count($matches[1]); $j++){
				$flowSetVars[$j] = strtoupper($matches[1][$j]);
				$flowSetVals[$j] = $matches[2][$j];
			}
			for ($j = 0; $j < count($replaceVars); $j++){
				$key = array_search($replaceVars[$j], $flowSetVars);
				$val = (is_int($key)) ? $flowSetVals[$key] : $replaceVals[$j];
				if ($replaceVars[$j] == 'HEIGHT') $val = intval($val);
				if ($replaceVars[$j] == 'HREF' && !Director::is_absolute($val)) $val = Director::absoluteBaseURL() . $val;
				$tmp = str_replace('%'.$replaceVars[$j].'%', $val, $tmp);
			}
			$this->content = str_replace($fullMatch[$i], "\n\n".$tmp."\n\n", $this->content);
		}
		
		return $this->content;
	}
}
?>