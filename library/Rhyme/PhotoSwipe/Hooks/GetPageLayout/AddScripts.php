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

namespace Rhyme\PhotoSwipe\Hooks\GetPageLayout;


/**
 * Class AddPhotoSwipeScripts 
 * Runs hook for \Contao\PageRegular\getPageLayout
 */
class AddScripts extends \Controller
{

    /**
	 * Modify the page or layout object - Add in custom PhotoSwipe scripts
	 * @param objPage
	 * @param $objLayout
	 * @param $objPageRegular
	 * @return void
	 */
	public function run($objPage, &$objLayout, $objPageRegular)
	{
		if (TL_MODE === 'FE')
		{
			// Javascript
			array_insert($GLOBALS['TL_BODY'], 9999999, array
            (
            	'<script src="system/modules/rhyme_photoswipe/assets/js/rhyme.photoswipe.js"></script>',
            ));

            /**
             * Add in vendor Javascript
             */
            array_insert($GLOBALS['TL_JAVASCRIPT'], 10, array(
                'system/modules/rhyme_photoswipe/vendor/photoswipe/' . PHOTOSWIPE . '/dist/photoswipe.min.js|static',
                'system/modules/rhyme_photoswipe/vendor/photoswipe/' . PHOTOSWIPE . '/dist/photoswipe-ui-default.min.js|static',
            ));
            
            /**
             * Add in vendor CSS
             */
            array_insert($GLOBALS['TL_CSS'], 10, array(
                'system/modules/rhyme_photoswipe/vendor/photoswipe/' . PHOTOSWIPE . '/dist/photoswipe.css|screen|static',
                'system/modules/rhyme_photoswipe/vendor/photoswipe/' . PHOTOSWIPE . '/dist/default-skin/default-skin.css|screen|static',
            ));
		}
	}

} 