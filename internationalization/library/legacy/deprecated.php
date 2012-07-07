<?php
/**
 * Deprecated Functions
 *
 * @package ThematicLegacy
 */
 
/**
 * Function for handling the bloginfo / get_bloginfo data using our own 'cache'.
 *
 * We removed the functionality because it will not run on all systems. The system used
 * a fallback, but we could not guarantee that the fallback would meet every possible
 * error condition.
 *
 * @since 0.9.6
 * @deprecated 0.9.6.1
 */
function thm_bloginfo($command = '', $echo = FALSE) {
	_deprecated_function( __FUNCTION__, '0.9.6.1', 'bloginfo() or get_bloginfo()' );
    if ($echo) {
	   bloginfo($command);
    } else {
        return get_bloginfo($command);
    }
}


/**
 * Function for testing, if a sidebar has registered widgets.
 *
 * We removed the functionality because WordPress own function is_active_sidebar() is 
 * stable.
 *
 * @since 0.9.6
 * @deprecated 0.9.7.3
 */
function is_sidebar_active( $index ){
	_deprecated_function( __FUNCTION__, '0.9.7.3', 'is_active_sidebar()' );
	return is_active_sidebar( $index );
}


/**
 * Switch adding the comment-reply script 
 * 
 * Removed in favor of hooking into wp_enqueue_scripts over calling directly in header.php
 * Note that in 1.0 the comment reply script is still enqueued by default.
 * Use wp_dequeue_script('comment-reply') to remove the script instead of using the filter: thematic_show_commentreply.
 *
 * @deprecated 1.0
 */
function thematic_show_commentreply() {
	_deprecated_function( __FUNCTION__, '1.0' );
    $display = TRUE;
    $display = apply_filters('thematic_show_commentreply', $display);
    if ($display)
        if ( is_singular() ) 
            wp_enqueue_script('comment-reply'); 
}


/**
 * Get the page number for title tag
 *
 * This has been integrated into thematic_doctitle()
 *
 * @deprecated 1.0
 */
function pageGetPageNo() {
	_deprecated_function( __FUNCTION__, '1.0' );
    if ( get_query_var('paged') )
        print ' | Page ' . get_query_var('paged');
}


if ( function_exists( 'childtheme_override_comment_class' ) )  {
	_deprecated_function('childtheme_override_comment_class', '1.0', 'comment_class()' );
	/**
 	 * @ignore
 	 */
 	function thematic_comment_class() {
		childtheme_override_comment_class();
	}
} else {
	/**
	 * Generates semantic classes for each comment LI element
	 * 
	 * Removed due to duplication of the core WordPress comment_class()
	 * 
 	 * @deprecated 1.0
	 */
	function thematic_comment_class( $print = true ) {
		_deprecated_function( __FUNCTION__, '1.0', 'comment_class()' );

		global $comment, $post, $thematic_comment_alt, $comment_depth, $comment_thread_alt;

		// Collects the comment type (comment, trackback),
		$c = array( $comment->comment_type );

		// Counts trackbacks (t[n]) or comments (c[n])
		if ( $comment->comment_type == 'comment' ) {
			$c[] = "c$thematic_comment_alt";
		} else {
			$c[] = "t$thematic_comment_alt";
		}

		// If the comment author has an id (registered), then print the log in name
		if ( $comment->user_id > 0 ) {
			$user = get_userdata($comment->user_id);
			// For all registered users, 'byuser'; to specificy the registered user, 'commentauthor+[log in name]'
			$c[] = 'byuser comment-author-' . sanitize_title_with_dashes(strtolower( $user->user_login ));
			// For comment authors who are the author of the post
			if ( $comment->user_id === $post->post_author )
				$c[] = 'bypostauthor';
		}

		// If it's the other to the every, then add 'alt' class; collects time- and date-based classes
		thematic_date_classes( mysql2date( 'U', $comment->comment_date ), $c, 'c-' );
		if ( ++$thematic_comment_alt % 2 )
			$c[] = 'alt';

		// Comment depth
		$c[] = "depth-$comment_depth";

		// Separates classes with a single space, collates classes for comment LI
		$c = join( ' ', apply_filters( 'comment_class', $c ) ); // Available filter: comment_class

		// Tada again!
		return $print ? print($c) : $c;
	}
}

/**
 * Generates the Thematic "Read more" text for excerpts 
 * 
 * Removed for namespacing
 *
 * @deprecated 1.0
 */
function more_text() {
	_deprecated_function( __FUNCTION__, '1.0', 'thematic_more_text()');
	thematic_more_text();
}

/**
 * Filter: list_comments_arg
 * 
 * Removed for namespacing
 *
 * @deprecated 1.0
 */
function list_comments_arg() {
	_deprecated_function( __FUNCTION__, '1.0', 'thematic_list_comments_arg()');
	thematic_list_comments_arg();
}

/**
 * Create the arguments for wp_list_bookmarks in links.php
 * 
 * Removed for namespacing
 *
 * @deprecated 1.0
 */
function list_bookmarks_args() {
	_deprecated_function( __FUNCTION__, '1.0', 'thematic_list_bookmarks_args()' );
	thematic_list_bookmarks_args();
}


/**
 * Register action hook: widget_area_primary_aside
 * 
 * Removed for namespacing
 *
 * @deprecated 1.0
 */
function widget_area_primary_aside() {
	_deprecated_function( __FUNCTION__, '1.0', 'thematic_widget_area_primary_aside()' );
	thematic_widget_area_primary_aside();
}


/**
 * Register action hook: widget_area_secondary_aside 
 *
 * Removed for namespacing
 *
 * @deprecated 1.0
 */
function widget_area_secondary_aside() {
	_deprecated_function( __FUNCTION__, '1.0', 'thematic_widget_area_secondary_aside()' );
    thematic_widget_area_secondary_aside();
}


/**
 * Register action hook: widget_area_index_top
 *
 * Removed for namespacing
 *
 * @deprecated 1.0
 */
function widget_area_index_top() {
	_deprecated_function( __FUNCTION__, '1.0', 'thematic_widget_area_index_top()' );
    thematic_widget_area_index_top();
}


/**
 * Register action hook: widget_area_index_insert
 *
 * Removed for namespacing
 *
 * @deprecated 1.0
 */
function widget_area_index_insert() {
	_deprecated_function( __FUNCTION__, '1.0', 'thematic_widget_area_index_insert()' );
	thematic_widget_area_index_insert();
}


/**
 * Register action hook: widget_area_index_bottom 
 *
 * Removed for namespacing
 *
 * @deprecated 1.0
 */	
function widget_area_index_bottom() {
	_deprecated_function( __FUNCTION__, '1.0', 'thematic_widget_area_index_bottom()' );
    thematic_widget_area_index_bottom();
}


/**
 * Register action hook: widget_area_single_top 
 *
 * Removed for namespacing
 *
 * @deprecated 1.0
 */
function widget_area_single_top() {
	_deprecated_function( __FUNCTION__, '1.0', 'thematic_widget_area_single_top()' );
    thematic_widget_area_single_top();
}


/**
 * Register action hook: widget_area_single_insert 
 *
 * Removed for namespacing
 *
 * @deprecated 1.0
 */
function widget_area_single_insert() {
	_deprecated_function( __FUNCTION__, '1.0', 'thematic_widget_area_single_insert()' );
    thematic_widget_area_single_insert();
}


/**
 * Register action hook: widget_area_single_bottom 
 *
 * Removed for namespacing
 *
 * @deprecated 1.0
 */
function widget_area_single_bottom() {
	_deprecated_function( __FUNCTION__, '1.0', 'thematic_widget_area_single_bottom()' );
    thematic_widget_area_single_bottom();
}


/**
 * Register action hook: widget_area_page_top 
 *
 * Removed for namespacing
 *
 * @deprecated 1.0	 
 */
function widget_area_page_top() {
	_deprecated_function( __FUNCTION__, '1.0', 'thematic_widget_area_page_top()' );
	thematic_widget_area_page_top();
}
	
	
/**
 * Register action hook: widget_area_page_bottom 
 *
 * Removed for namespacing
 *
 * @deprecated 1.0	 
 */
function widget_area_page_bottom() {
	_deprecated_function( __FUNCTION__, '1.0', 'thematic_widget_page_bottom()' );
	thematic_widget_page_bottom();
}


/**
 * Register action hook: widget_area_subsidiaries
 * 
 * Removed for namespacing
 *
 * @deprecated 1.0
 */
 function widget_area_subsidiaries() {
	_deprecated_function( __FUNCTION__, '1.0', 'thematic_widget_area_subsidiaries()' );
	thematic_widget_area_subsidiaries();
}

?>