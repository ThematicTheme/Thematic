<?php

// create bullet-proof excerpt for meta name="description"

function thematic_the_excerpt($deprecated = '') {
	global $post;
	$output = '';
	$output = $post->post_excerpt;
	if ( post_password_required($post) ) {
		$output = __('There is no excerpt because this is a protected post.');
		return $output;
	}

	return $output;
}
?>