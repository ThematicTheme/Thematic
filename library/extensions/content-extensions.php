<?php

// creates the $more_link_text for the_content
function more_text() {
	$content = ''.__('Read More <span class="meta-nav">&raquo;</span>', 'thematic').'';
	return apply_filters('more_text', $content);
}

function thematic_previous_post_link() {
	$args = array ('format'              => '%link',
								 'link'                => '<span class="meta-nav">&laquo;</span> %title',
								 'in_same_cat'         => FALSE,
								 'excluded_categories' => '');
	$args = apply_filters('thematic_previous_post_link_args', $args );
	previous_post_link($args['format'], $args['link'], $args['in_same_cat'], $args['excluded_categories']);
}

function thematic_next_post_link() {
	$args = array ('format'              => '%link',
								 'link'                => '%title <span class="meta-nav">&raquo;</span>',
								 'in_same_cat'         => FALSE,
								 'excluded_categories' => '');
	$args = apply_filters('thematic_next_post_link_args', $args );
	next_post_link($args['format'], $args['link'], $args['in_same_cat'], $args['excluded_categories']);
}

?>