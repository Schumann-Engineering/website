<?php
function arrayToList($in) {
	echo '<ul>';
	foreach ($in as $v) {
		if (is_array($v)) 
			arrayToList($v);
		else 
			echo '<li>' . $v . '</li>';
	}
	echo '</ul>';
}
?>
<?php materialis_get_header(); ?>
<div <?php echo materialis_page_content_atts("content post-page"); ?>>
    <div class="gridContainer">
		<?php 
		/*
		 * START MODIFICATION: add breadcrumbs
		 */
		if ( function_exists('yoast_breadcrumb') ) { ?>
        <div class="row">
			<div>
				<?php yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); ?>
			</div>
		</div>
		<?php 
		/*
		 * END MODIFICATION
		 */
		} ?>

		<?php 
		/*
		 * START MODIFICATION: add table of contents
		 */
		$materialisSE_content = array();
		if (have_posts()):
			while (have_posts()):
				the_post();
				ob_start();
				get_template_part('template-parts/content', 'single');
				$materialisSE_content[] = ob_get_contents();
				ob_end_clean();
			endwhile;
		else :
			ob_start();
			get_template_part('template-parts/content', 'none');
			$materialisSE_content[] = ob_get_contents();
			ob_end_clean();
		endif;
		 
		 
		// add TOC if only one post was processed
		if (count($materialisSE_content) == 1):
			// parse output to find header tags
			preg_match_all('/<h(\d)[^>]+id="([^"]+)"[^>]*>(.*)<\/h\d>/isU', $materialisSE_content[0], $headers, PREG_SET_ORDER );
		endif;
		
		if (count($materialisSE_content) == 1 && count($headers) > 0):
		?>
        <div class="row">
            <div class="col-sm-12">
				<div>
					<div class="se_table-of-contents">
						<?php
							$tocLevel = 1;
						
							foreach ($headers as $i => $header) { // ($i=0; $i<count($headers[0]); $i++) {
								$header_level = ((int)$header[1]);
								$header_id    = $header[2];
								$header_text  = $header[3];
								
								// ignore h1
								if ($header_level <= 1)
									continue;
								// ignore empty id
								if (!$header_id)
									continue;
								// ignore bullshit
								if ($header_id == 'reply-title')
									continue;
									
								$closeLastItem = $i > 0;
								// drill down
								while ($tocLevel < $header_level) {
									// create new level
									echo '<ul><li>';
									$tocLevel++;
									$closeLastItem = false;
								}	
								
								// drill up
								while ($tocLevel > $header_level) {
									echo '</li></ul>';
									$tocLevel--;
								}	

								// close last item
								if ($closeLastItem) {
									echo '</li><li>';
								}	
								
								
								// item
								echo '<a href="#' . $header_id .'">' . $header_text . '</a>';
							}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php 
		/*
		 * END MODIFICATION
		 */
		endif; ?>

		
        <div class="row">
            <div class="<?php echo materialis_posts_wrapper_class(); ?>">
                <div class="post-item">
                    <?php
					foreach ($materialisSE_content as $content) {
						echo $content;
					}
					
					/*
                    if (have_posts()):
                        while (have_posts()):
                            the_post();
                            get_template_part('template-parts/content', 'single');
                        endwhile;
                    else :
						echo materialisSE_templatePart; //get_template_part('template-parts/content', 'none');
                    endif;
					*/
                    ?>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>

</div>
<?php get_footer(); ?>
