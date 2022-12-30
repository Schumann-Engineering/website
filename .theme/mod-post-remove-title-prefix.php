<?php

/**
 * Add filter to get rid of "Tag:" prefix in page title
 */
add_filter('get_the_archive_title_prefix', function($prefix) {
	// tag
	if( is_tag() )
		return '';
	
	// category
	if( is_category() )
		return '';
	
	// everything else
	return $prefix;
});