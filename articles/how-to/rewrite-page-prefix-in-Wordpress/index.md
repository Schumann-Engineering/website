---
title:            How to rewrite a page prefix in Wordpress?
post_author:      janekschumann
post_date:        2022/08/20
post_status:      draft
post_excerpt:
featured_image:   featured-image.webp
menu_order:
page_template:
comment_status:   closed
stick_post:
skip_file:        no
taxonomy:
    category:
        - software
    post_tag:   
        - engineering
        - software
        - wordpress
        - source-code
custom_fields:
    materialis_se_title: How to|rewrite|a page|prefix in|Wordpress
SEO:
    keyphrase:
    keyphrases:
    synonyms:
    title:
    excerpt:
    is_cornerstone:
    show_in_search_results:
    follow_links:
    disallow:
    breadcrumb_title:    
    facebook:
        image:
        title:
        description:
    twitter:
        image:
        title:
        description:
---

# TL;DR

Somewhere appropriate, e.g. '<theme>/functions.php', add the following code to change (here: remove completely) the prefix of tag pages:

```
add_filter('get_the_archive_title_prefix', function($prefix) {
  if(is_tag()) {
    return '';
  }
  return $prefix;
});
```

# The problem {#1-the-problem .double-diamond .problem }

## Discover: What does the user want? {#2-discover-what-does-the-user-want .double-diamond .discover}

While navigating through WordPress posts, I noticed that some pages have a prefix in front of the page's title. For example, the overview page for a tag adds "Tag: ". It seems that these prefix cannot be configured neither in WordPress' UI nor through a setting.

This is annoying because I want my page titles to look exactly like I configured them: without any prefix!

## Define: What is the problem? {#3-define-what-is-the-problem .double-diamond .define}

Wordpress defines default 'prefix' for every page type. The definition of those can be found in '/wp-includes/general-template.php'. The following code shows an excerpt of this file.

```
[...]
function get_the_archive_title() {
	if ( is_category() ) {
		$prefix = _x( 'Category:', 'category archive title prefix' );
	} elseif ( is_tag() ) {
		$prefix = _x( 'Tag:', 'tag archive title prefix' );
	} elseif ( is_author() ) {
		$prefix = _x( 'Author:', 'author archive title prefix' );
	} elseif ( is_year() ) {
		$prefix = _x( 'Year:', 'date archive title prefix' );
	} elseif ( is_month() ) {
		$prefix = _x( 'Month:', 'date archive title prefix' );
	} elseif ( is_day() ) {
		$prefix = _x( 'Day:', 'date archive title prefix' );
	} elseif ( is_tax( 'post_format' ) ) {
[...]
```

As we can see, tags are prefixed with 'Tag: ' by default.

Since version 5.5.0 however, the same function calls a filter to modify the prefix before returning it:

```
/**
 * Filters the archive title prefix.
 *
 * @since 5.5.0
 *
 * @param string $prefix Archive title prefix.
 */
$prefix = apply_filters( 'get_the_archive_title_prefix', $prefix );
```

<div class="se-styled-box se-info-box" markdown="1">
  <p><strong>What we learned:</strong></p>
  <ol>
    <li>WordPress is adding a prefix to certain page types</li>
    <li>This behaviour is not configurable WordPress' UI</li>
  </ol>
</div>

# The solution {#4-the-solution .double-diamond .solution}

## Develop: How can it be solved? {#5-develop-how-can-it-be-solved .double-diamond .develop}

In order to change the prefix of any given page type, we could apply to following solutions:
1. Modify the function in WordPress' code
1. Override the entire function through a plugin or theme
1. Amend the function's behaviour by adding a filter

Modifying WordPress' code directly is not a good solution for various reasons:
1. each update of WordPress will reset the changes and they have to be applied again
1. most hosters do not allow to modify WordPress files for security and maintenance reasons

Overriding the entire function is similar to modifying the code directly. In addition:
1. code will be duplicated

Which leaves us with amending the functions behaviour somehow. As we have learned, filters get applied in the function before returning the prefixed page title. Let's try to use that.

## Deliver: Step-by-step solution {#6-deliver-step-by-step-solution .double-diamond .deliver}

<div class="se-styled-box se-tip-box" markdown="1">
  <p><strong>We need to do 2 steps:</strong></p>
  <ol>
    <li>hook into 'get_the_archive_title_prefix' - or similar - function</li>
    <li>override the prefix or final title</li>
  </ol>
</div>

### Add a filter {#6.1-add-a-filter .smart-list}

There are multiple filter to choose from:
1. get_the_archive_title( $title, $original_title, $prefix )
1. get_the_archive_title_prefix( $prefix )

The latter is the perfect fix if only the prefix shall be changed.

In order to add a handler to Wordpress' filter chain, the following code needs to be applied:

```
add_filter('<filter_name>', '<function_name>');
```

OR

```
add_filter('<filter_name>', function($arg1, $arg2, ...) {
  [CODE]
});
```

### Set prefix {#6.2-set-prefix .smart-list}

```
// add handler to filter chain
add_filter(
  // use the prefix filter
  'get_the_archive_title_prefix',
  // pass anonymous function
  function($prefix) {
    // change only tag pages
    if(is_tag()) {
      // clear it to get rid of "Tag:"
      return '';
    }
    // leave the prefix intact for everything else
    return $prefix;
  }
);
```

This code can be added (almost) everywhere. The major place to add this to is the `<theme>/functions.php`.

# Bonus tip {#7-bonus-tip}

Instead of changing theme files directly, you can create a [child theme](https://developer.wordpress.org/themes/advanced-topics/child-themes/). This is especially advisable if your theme comes from a third party. A child theme allows the original theme to get updates without overriding the custom changes.