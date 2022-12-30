<?php
/**
 * load child's stylesheet
 */
add_action('wp_enqueue_scripts', function() {
	$theme       	= wp_get_theme();
    $parentTheme 	= $theme->parent(); // wp_get_theme( $childTheme->get('Template') );
    $textDomain  	= $parentTheme->get('TextDomain');
	$parentVersion	= $parentTheme->get('Version');
	$childVersion	= $theme->get('Version');
	// $hasMinVersion = apply_filters('materialis_stylesheet_has_min', true );
	
	// load style of parent theme
    wp_enqueue_style(
        $textDomain . '-style-ofParent',
        get_template_directory_uri() . '/style.min.css',
		array(),
		$parentVersion
    );
	
	// update material icons
	//wp_dequeue_style( 'material-icons' );
	//wp_deregister_style( 'material-icons' );	
	/*
    wp_enqueue_style(
        'material-icons',
        get_stylesheet_directory_uri() . '/assets/css/material-icons.min.css',
		array(),
		$childVersion
    );
	*/
});