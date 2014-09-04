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

/**
 * Determine if we want to use html5 or xhtml markup
 *
 * @return bool True for xhtml, false for html5 markup
 */
function thematic_is_legacy_xhtml() {

	// Child themes can set html5 markup
	if ( current_theme_supports( 'thematic_html5' ) ) {
		return false;
	}

	// Child themes can opt to use xhtml
	if ( current_theme_supports( 'thematic_xhtml' ) ) {
		return true;
	}

	// New 2.0 installations do not use the legacy mode by default
	if ( 0 == thematic_get_theme_opt( 'legacy_xhtml' ) ) {
		return false;
	}

	return apply_filters( 'thematic_is_legacy_xhtml', true );
}


/**
 * Specifies the available layouts for the theme
 *
 * @since 2.0.0
 *
 * @return array $layouts
 */
function thematic_available_theme_layouts() {
	$layouts = array(
		'left-sidebar' => array(
			'slug'  => 'left-sidebar',
			'title' => __( 'Left Sidebar', 'thematic' )
		),
		'right-sidebar' => array(
			'slug' => 'right-sidebar',
			'title' => __( 'Right Sidebar', 'thematic' )
		),
		'three-columns' => array(
			'slug' => 'three-columns',
			'title' => __( 'Three columns', 'thematic' )
		),
		'full-width' => array(
			'slug' => 'full-width',
			'title' => __( 'Full width', 'thematic' )
		)
	);

	return apply_filters( 'thematic_available_theme_layouts', $layouts );
}


/**
 * Create a simple array of the available layout strings
 *
 * @since 2.0.0
 *
 * @return array $layouts
 */
function thematic_available_layout_slugs() {
	$possible_layouts = thematic_available_theme_layouts();
	$available_layouts = array();
	foreach( $possible_layouts as $layout) {
		$available_layouts[] = $layout['slug'];
	}

	return $available_layouts;
}


/**
 * Decide the default layout of the theme
 *
 * @since 2.0.0
 *
 * @return string $default_layout
 */
function thematic_default_theme_layout() {

	$options = thematic_get_wp_opt( 'thematic_theme_opt' );

	// use a default layout of right-sidebar if no theme option has been set
	$thematic_default_layout = isset( $options['layout'] ) ? $options['layout'] : 'right-sidebar';

	/**
	 * Filter for the default layout
	 *
	 * Specifies the theme layout upon first setup. The returned string need to match 
	 * one of the available layout slugs. Any invalid slug will be ignored.
	 *
	 * @since 2.0.0
	 *
	 * @see thematic_available_layout_slugs()
	 *
	 * @param string $thematic_default_layout
	 */
	$thematic_possible_default_layout = apply_filters( 'thematic_default_theme_layout', $thematic_default_layout );

	// only use the filtered layout if it is a valid layout
	if ( in_array( $thematic_possible_default_layout, thematic_available_layout_slugs() ) ) {
		$thematic_default_layout = $thematic_possible_default_layout;
	}

	return $thematic_default_layout;
}
?>