<?php

/**
 * Copyright (C) 2017 Rhyme Digital, LLC.
 * 
 * @author		Blair Winans <blair@rhyme.digital>
 * @author		Adam Fisher <adam@rhyme.digital>
 * @author		Cassondra Hayden <cassie@rhyme.digital>
 * @author		Melissa Frechette <melissa@rhyme.digital>
 * @link		http://rhyme.digital
 * @license		http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

namespace Rhyme\PhotoSwipe\ContentElement;


/**
 * Front end content element "PhotoSwipe image".
 *
 * @author Adam Fisher <adam@rhyme.digital>
 */
class Image extends \ContentImage
{
	
	/**
	 * Generate the content element
	 */
	protected function compile()
	{
		parent::compile();
		
		if (!is_file(TL_ROOT . '/' . $this->singleSRC))
		{
			return;
		}
		
		$objFile = new \File($this->singleSRC);
		
		// Add PhotoSwipe attributes to the template
		$this->Template->attributes = '';
		$this->Template->attributes .= ' data-photoswipe="image"';
		$this->Template->attributes .= ' data-photoswipe-image-id="'.$this->id.'"';
		$this->Template->attributes .= ' data-photoswipe-image-gallery="'.$this->photoswipe_gallery_id.'"';
		$this->Template->attributes .= ' data-photoswipe-image-size="'.intval($objFile->width).'x'.intval($objFile->height).'"';
		$this->Template->attributes .= ' data-photoswipe-image-title="'.$this->Template->title.'"'; // Todo: Make this configurable
		
		// Add the PhotoSwipe HTML
		if (!isset($GLOBALS['TL_BODY']['photoswipe']))
		{
			$objTemplate = new \FrontendTemplate('photoswipe_default'); // Todo: Make this configurable
			$GLOBALS['TL_BODY']['photoswipe'] = $objTemplate->parse();
		}
	}
}
