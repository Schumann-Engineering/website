<?php
/**
 * Add configuration for showing thumbnail of post
 */
 
// add settings to customizer
function materialis_SE_add_blog_options( $section ) {
	$priority = 1;

	materialis_add_kirki_field( array(
		'type'     => 'checkbox',
		'settings' => 'blog_show_thumbnail',
		'label'    => '[SE-mod] Show post thumbnail in post page',
		'section'  => $section,
		'priority' => $priority,
	) );
}
add_action( 'materialis_add_sections', function ($wp_customizer) {
	materialis_SE_add_blog_options( 'blog_settings' );
});


// add filter to method
add_filter( 'has_post_thumbnail', function ($has_thumbnail) {
  if (!$has_thumbnail)
	  return false;
  
  if (!is_single())
	  return $has_thumbnail;
  
  if (materialis_get_theme_mod('blog_show_thumbnail', true))
    return $has_thumbnail;
  
  return false;
});