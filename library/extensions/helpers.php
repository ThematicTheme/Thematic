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

function thematic_tag_query() {
  $nice_tag_query = $_SERVER['REQUEST_URI'];
  $nice_tag_query = preg_replace('/.*(\/tag\/|\?tag=)/', '', $nice_tag_query);
  $nice_tag_query = str_replace(',', ', ', $nice_tag_query);
  $nice_tag_query = str_replace('/','', $nice_tag_query);
  $nice_tag_query = str_replace('%20','', $nice_tag_query);
  $nice_tag_query = str_replace('+',' + ', $nice_tag_query);

  return $nice_tag_query;
}


?>