<?php

/**
 * Add filter to add icon for categories to title.
 *
 * USAGE:
 * - set CSS class in category custom field "icon_class"
 */
add_filter('materialis_header_title', function($title) {
	// guard: no title
	if (!$title)
		return $title;
	
	// guard: only on single page
	if (!is_category())
		return $title;

	// guard: Pods plugin not installed
	if( !function_exists('pods_field_raw') )
		return $title;

	// get pod
	$iconClass = pods_field_raw( 
		// pod name
		'category', 
		// id
		get_queried_object_id(), 
		// field name
		'icon_class',
		// return single
		true
	);
	
	// guard: no icon set
	if (!$iconClass)
		return '[ERR: NO icon_class SET] ' . $title;
	
	/*
	 * modify title
	 */
	$fancyTitle = '<i class="' . $iconClass . '"></i>' . $title;
	
	/*
	 * finish
	 */
	return $fancyTitle;
}, 
	// later execution!
	20
);