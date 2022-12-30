<?php

/**
 * Allow HTML in term (category, tag) descriptions
 *
 * (source: https://plugins.trac.wordpress.org/browser/allow-html-in-category-descriptions/trunk/html-in-category-descriptions.php) 
 */
add_action('init', function() {
        if (current_user_can('unfiltered_html')) {
                // Disables Kses only for textarea saves
                foreach (array('pre_term_description', 'pre_link_description', 'pre_link_notes', 'pre_user_description') as $filter) {
                        remove_filter($filter, 'wp_filter_kses');
                }
        }

        // Disables Kses only for textarea admin displays
        foreach (array('term_description', 'link_description', 'link_notes', 'user_description') as $filter) {
                remove_filter($filter, 'wp_kses_data');
        }
});