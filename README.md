# JWPlayer Module

*This module is unmaintained, and doesn't work as advertised.*
*Feel free to take this code as a starting point for a JWPlayer integration with SilverStripe*

Background: The module was a custom development for the client,
and the underlying framework options like `HtmlEditorField_FlashFormOption` 
have never been merged back to the open source project.

## Maintainer

Unmaintained

## Requirements
-----------------------------------------------
SilverStripe 2.4

## License

For non-commercial use only, see http://www.longtailvideo.com/.
Creative Commons Attribution-Noncommercial-Share Alike 3.0 Unported (http://creativecommons.org/licenses/by-nc-sa/3.0/)

## Installation Instructions

For now, you'll need to modify your Page.php class to get JwPlayerParser
to pick up any [jwplayer] tags in your $Content variable.

Example:

	class Page extends SiteTree {
		function Content() {
			// This is necessary because ViewableData won't push content through this channel for us.
			$content = DBField::create('HTMLText', $this->Content);
			return $content->forTemplate();
		}
	}