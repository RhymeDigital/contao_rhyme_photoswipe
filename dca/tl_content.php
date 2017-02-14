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
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['photoswipe_image'] = str_replace(array(',caption', ',fullsize', 'imageUrl'), array(',caption,photoswipe_gallery_id', '', ''), $GLOBALS['TL_DCA']['tl_content']['palettes']['image']);


/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['photoswipe_gallery_id'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['photoswipe_gallery_id'],
	'exclude'                 => true,
	'search'                  => true,
	'default'				  => '0',
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
	'sql'                     => "varchar(255) NOT NULL default '0'"
);