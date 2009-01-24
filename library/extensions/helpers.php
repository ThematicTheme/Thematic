<?php

// create bullet-proof excerpt for meta name="description"

function thematic_the_excerpt($deprecated = '') {
	global $post;
	$output = '';
	$output = strip_tags($post->post_excerpt);
	if ( post_password_required($post) ) {
		$output = __('There is no excerpt because this is a protected post.');
		return $output;
	}

	return $output;
	
}

// create bullet-proof excerpt for meta name="description"

function thematic_excerpt_rss() {
	global $post;
	$output = '';
	$output = strip_tags($post->post_excerpt);
	if ( post_password_required($post) ) {
		$output = __('There is no excerpt because this is a protected post.');
		return $output;
}

	return apply_filters('thematic_excerpt_rss', $output);

}

add_filter('thematic_excerpt_rss', 'wp_trim_excerpt');


?>