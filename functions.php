<?php

zp_register_filter('checkPageValidity', 'modelrailTheme::checkLinks');

/**
 * Plugin option handling class
 *
 */
class modelrailTheme {
	
	static function checkLinks($count, $gallery_page, $page) {
    	switch (stripSuffix($gallery_page))
    	{
        	case 'recent-uploads':
        	    return true;
		}
	}
}
?>