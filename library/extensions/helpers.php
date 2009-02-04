<?php

// create bullet-proof excerpt for meta name="description"

function thematic_trim_excerpt($text) {
	if ( '' == $text ) {
		$text = get_the_content('');

		$text = strip_shortcodes( $text );

		$text = str_replace(']]>', ']]&gt;', $text);
		$text = strip_tags($text);
		$excerpt_length = apply_filters('excerpt_length', 55);
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words) > $excerpt_length) {
			array_pop($words);
			array_push($words, '[...]');
			$text = implode(' ', $words);
		}
	}
	return $text;
}

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

add_filter('thematic_excerpt_rss', 'thematic_trim_excerpt');

// create nice multi_tag_title

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