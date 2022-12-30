<?php

/**
 * Add filter to allow for fancy multiline titles.
 *
 * USAGE:
 * - add custom field 'materialis_se_title'
 * - delimiter line break with | char
 */
// add_filter('get_the_archive_title', function($title, $original_title, $prefix) {
// add_filter('the_title', function($title) {
add_filter('materialis_header_title', function($title) {
	// guard: only on single page
	if (!is_singular())
		return $title;
	
	// get meta data for post
	$metaTitle = get_post_meta( 
		// int $post_id, 
		get_the_ID(), 
		// string $key = '', 
		'materialis_se_title', 
		// bool $single = false
		true 
	);
	
	// guard: no title set
	if (!$metaTitle)
		return $title;
	
	/*
	 * modify title
	 */
	$titleParts = explode( '|', $metaTitle );
	
	$fancyTitle = '';
	for ($partId = 0; $partId<count($titleParts); $partId++)
	{
		// part of title
		$titlePart = $titleParts[ $partId ];
		
		// CSS class for line
		$cssClassLine = 'title-line-' . ($partId+1);
		
		// CSS class for first and last line
		$cssClassSpecial = '';
		if ($partId == 0)
			$cssClassSpecial .= ' title-line-first color1';
		if ($partId == count($titleParts) - 1)
			$cssClassSpecial .= ' title-line-last color1';
		
		// add to title
		$fancyTitle .=
			'<span class="title-line ' . $cssClassLine . $cssClassSpecial . '">' .
				$titlePart .
			'</span>'
		;		
		
		// add line break if needed
		if ($partId < count($titleParts))
			$fancyTitle .= '<br/>';
	}
	
	// return str_replace( '|', '<br/>', $fancyTitle);
	return $fancyTitle;
});