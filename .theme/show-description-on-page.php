<?php

function get_page_description() {
	// Tag
	if (is_tag())
		return tag_description();
	
	// Category
	if (is_category())
		return category_description();
	
	// no description available
	return false;
}

$pageDescription = get_page_description();
if ($pageDescription) {
	?>
	<div class="col-xs-12 col-sm-12 col-md-12 space-bottom">
		<div id="page-description" class="mdc-card mdc-elevation--z3 col-padding">
			<?php echo $pageDescription; ?>
		</div>
	</div>
	<?php
}