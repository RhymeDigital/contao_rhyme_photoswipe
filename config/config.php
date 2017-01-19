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


/**
 * Photoswipe version
 */
define('PHOTOSWIPE', '4.1.0');


/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['getPageLayout'][]             	= array('Rhyme\PhotoSwipe\Hooks\GetPageLayout\AddScripts', 'run');


/**
 * Content elements
 */
$GLOBALS['TL_CTE']['media']['photoswipe_image'] 		= 'Rhyme\PhotoSwipe\ContentElement\Image'; // Todo: Add other element types too
