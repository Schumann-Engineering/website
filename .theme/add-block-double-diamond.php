<?php

add_action( 'init', function() {
	register_block_pattern_category(
		'Schumann.Engineering',
		array( 'label' => __( 'Schumann.Engineering', 'materialis-SE' ) )
	);
	
/*
	registerBlockType(
		'schumannengineering/demo',
		{
			title:			__( 'Demo' ),
			
			description:	__( 'Block showing a demo.' ),
			
			category:		'text',

			edit() {
				return (
					<div>Block Content im Editor</div>
				);
			},

			save() {
				return (
					<div>Block Content im Frontend</div>
				);
			},
		}
	);
*/
	
    register_block_pattern(
        'schumannengineering/demo-pattern',
		
		// for documentation see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-patterns/
        array(
            'title'       => __( 'Page Intro Blocks', 'page-intro-block' ),
            
            'description' => _x( 'Includes a cover block, two columns with headings and text, a separator and a single-column text block.', 'Block pattern description', 'page-intro-block' ),
            
            'content'     => '<!-- wp:schumannengineering/demo -->
							  <div>
							  no edit
							  <!-- wp:paragraph -->
							  <p>Demo text with paragraph</p>
							  <!-- /wp:paragraph -->
							  <p>Demo text without paragraph</p>
							  </div>
							  <!-- /wp:schumannengineering/demo -->',
            
            'categories'  => array('Schumann.Engineering'),
        )
    );
});