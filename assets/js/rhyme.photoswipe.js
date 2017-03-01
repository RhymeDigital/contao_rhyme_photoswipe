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

//Namespace
var Rhyme = window.Rhyme || {};

//Encapsulate
(function ($) {

Rhyme.PhotoSwipe = {

    /*
     * Initialization
     */
    init: function( settings ) 
    {
        //Default configuration
        Rhyme.PhotoSwipe.config = {
            
        };
 
        // allow overriding the default config
        jQuery.extend( Rhyme.PhotoSwipe.config, settings );
        Rhyme.PhotoSwipe.setup();
    },
    
    /*
     * Setup any necessary initial event listeners/callbacks
     */
    setup: function() {
        Rhyme.PhotoSwipe.configureGalleries();
    },
        
    /*
     * Register the galleries
     */
    configureGalleries: function() {

        var selector = '[data-photoswipe]',
            pswp = $('.pswp')[0],
            galleries = {};
        
        var createItem = function($el){
            var $size = $el.data('photoswipe-image-size').split('x'),
                caption = $el.data('photoswipe-image-title');
            var item = {
                src: $el.attr('href'),
                w: $size[0],
                h: $size[1]
            };
            if(caption){
                item.title = caption;
            }
            return item;
        };

        if (pswp){
            
            //Add click events and init
            jQuery('body').on('click', selector, function(ev) {
                ev.preventDefault();
                
                var el = jQuery(ev.currentTarget).eq(0),
		            items = [],
		            startIndex = 0;
	        
	            //Set up the galleries
                if (el.data('photoswipe-image-gallery') == 0) {
	                startIndex = 0;
	                
					var item = createItem(el);
	                items.push(item);
			                
	                // Todo: Use this for caching this search as well as the image loading
	                galleries[item.src]     		= galleries[item.src] || [];
	                galleries[item.src][0]			= galleries[item.src][0] || new Image();
	                galleries[item.src][0].src 		= galleries[item.src][0].src || item.src;
                }
                else {
		            jQuery(selector).each(function(idx, a) {
		                var $a = jQuery(a);
		                
		                if (el.data('photoswipe-image-gallery') == $a.data('photoswipe-image-gallery')) {
							var item = createItem($a);
			                items.push(item);
			                var currIdx = items.length - 1;
			                
			                if (el.data('photoswipe-image-id') == $a.data('photoswipe-image-id')) {
				                startIndex = currIdx;
			                }
			                
			                // Todo: Use this for caching this search as well as the image loading
			                galleries[item.src]     			= galleries[item.src] || [];
			                galleries[item.src][currIdx]		= galleries[item.src][currIdx] || new Image();
			                galleries[item.src][currIdx].src 	= galleries[item.src][currIdx].src || item.src;
		                }
		            });
                }
                
                var options = {
                    index: startIndex,
                    bgOpacity: 0.9,
                    showHideOpacity: true,
                    closeOnScroll: false
                };

                var lightBox = new PhotoSwipe(pswp, PhotoSwipeUI_Default, items, options);
                lightBox.init();
            });
        }
    }
};
    
$(document).ready(Rhyme.PhotoSwipe.init);

}(jQuery));


