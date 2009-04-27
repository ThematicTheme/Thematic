<?php

//creates the content
function thematic_content() {

	if (is_home() || is_front_page()) { 
		$content = 'full';
	} elseif (is_tag()) {
		$content = 'excerpt';
	} elseif (is_search()) {
		$content = 'excerpt';	
	} elseif (is_category()) {
		$content = 'excerpt';
	} elseif (is_author()) {
		$content = 'excerpt';
	} elseif (is_archive()) {
		$content = 'excerpt';
	}
	
	$content = apply_filters('thematic_content', $content);

	if ( strtolower($content) == 'full' ) {
		the_content(more_text());
	} elseif ( strtolower($content) == 'excerpt') {
		the_excerpt();
	} elseif ( strtolower($content) == 'none') {
	} else {
		the_content(more_text());
	}
}

// creates the $more_link_text for the_content
function more_text() {
	$content = ''.__('Read More <span class="meta-nav">&raquo;</span>', 'thematic').'';
	return apply_filters('more_text', $content);
} // end more_text

// creates the previous_post_link
function thematic_previous_post_link() {
	$args = array ('format'              => '%link',
								 'link'                => '<span class="meta-nav">&laquo;</span> %title',
								 'in_same_cat'         => FALSE,
								 'excluded_categories' => '');
	$args = apply_filters('thematic_previous_post_link_args', $args );
	previous_post_link($args['format'], $args['link'], $args['in_same_cat'], $args['excluded_categories']);
} // end thematic_previous_post_link

// creates the next_post_link
function thematic_next_post_link() {
	$args = array ('format'              => '%link',
								 'link'                => '%title <span class="meta-nav">&raquo;</span>',
								 'in_same_cat'         => FALSE,
								 'excluded_categories' => '');
	$args = apply_filters('thematic_next_post_link_args', $args );
	next_post_link($args['format'], $args['link'], $args['in_same_cat'], $args['excluded_categories']);
} // end thematic_next_post_link

// Produces an avatar image with the hCard-compliant photo class for author info
function thematic_author_info_avatar() {
    global $wp_query; $curauth = $wp_query->get_queried_object();
	$email = $curauth->user_email;
	$avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar("$email") );
	echo $avatar;
} // end thematic_author_info_avatar

?>