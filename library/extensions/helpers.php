<?php
/**
 * Helper Functions
 *
 * @package ThematicCoreLibrary
 * @subpackage Helpers
 */
 
 

/**
 * Create bullet-proof excerpt for meta name="description"
 * 
 * @param mixed $text
 * @return $text
 */
function thematic_trim_excerpt($text) {
	if ( '' == $text ) {
		$text = get_the_content('');

		$text = strip_shortcodes( $text );

		$text = str_replace(']]>', ']]&gt;', $text);
		$text = strip_tags($text);
	  $text = str_replace('"', '\'', $text);
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


/**
 * thematic_the_excerpt function.
 * 
 * @param string $deprecated (default: '')
 * @return $output
 */
function thematic_the_excerpt( $deprecated = '' ) {
	global $post;
	$output = '';
	$output = strip_tags( $post->post_excerpt );
	$output = str_replace( '"', '\'', $output );
	if ( post_password_required($post) ) {
		$output = __( 'There is no excerpt because this is a protected post.', 'thematic');
		return $output;
	}

	return $output;
	
}


/**
 * thematic_excerpt_rss function.
 *
 * @return $output
 */
function thematic_excerpt_rss() {
	global $post;
	$output = '';
	$output = strip_tags( $post->post_excerpt );
	if ( post_password_required( $post ) ) {
		$output = __( 'There is no excerpt because this is a protected post.', 'thematic' );
		return $output;
}

	return apply_filters( 'thematic_excerpt_rss', $output );

}

add_filter( 'thematic_excerpt_rss', 'thematic_trim_excerpt' );


/**
 * Create nice multi_tag_title
 */
function thematic_tag_query() {
	$nice_tag_query = get_query_var( 'tag' ); // tags in current query
	$nice_tag_query = str_replace(' ', '+', $nice_tag_query); // get_query_var returns ' ' for AND, replace by +
	$tag_slugs = preg_split('%[,+]%', $nice_tag_query, -1, PREG_SPLIT_NO_EMPTY); // create array of tag slugs
	$tag_ops = preg_split('%[^,+]*%', $nice_tag_query, -1, PREG_SPLIT_NO_EMPTY); // create array of operators

	$tag_ops_counter = 0;
	$nice_tag_query = '';

	foreach ($tag_slugs as $tag_slug) { 
		$tag = get_term_by('slug', $tag_slug ,'post_tag');
		// prettify tag operator, if any
		if ( isset($tag_ops[$tag_ops_counter])  &&  $tag_ops[$tag_ops_counter] == ',') {
			$tag_ops[$tag_ops_counter] = ', ';
		} elseif ( isset( $tag_ops[$tag_ops_counter])  &&  $tag_ops[$tag_ops_counter] == '+') {
			$tag_ops[$tag_ops_counter] = ' + ';
		}
		// concatenate display name and prettified operators
		if ( isset( $tag_ops[$tag_ops_counter] ) ) {
			$nice_tag_query = $nice_tag_query.$tag->name.$tag_ops[$tag_ops_counter];
			$tag_ops_counter += 1;
		} else {
			$nice_tag_query = $nice_tag_query.$tag->name;
			$tag_ops_counter += 1;
		}
	}
	return $nice_tag_query;
}


/**
 * Gets the term name of the current post
 *
 * @todo deprcate when thematic_body_class becomes a filter of body_class
 * @return $term->name
 */
function thematic_get_term_name() {
	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
	return $term->name;
}


/**
 * Check to see if the current post is a custom post type
 * 
 * @return bool
 */
function thematic_is_custom_post_type() {
	global $post; 

	if ( !in_array(  $post->post_type , get_post_types( array( '_builtin' => true ) ) ) ) {
		return true;
 	}
 	return false;
 }

?>