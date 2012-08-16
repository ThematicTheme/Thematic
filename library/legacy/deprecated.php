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
 * thematic_canonical_url is no longer necessary because the functionality has been included in WordPress core since 2.9.0
 *
 * @deprecated 1.0
 */
function thematic_canonical_url() {
	_deprecated_function( __FUNCTION__, '1.0' );
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


/**
 * Generates the legacy comment form
 *
 * We removed the functionality because WordPress supplies its own function comment_form()
 *
 * @deprecated 1.0.2.3
 */

function thematic_legacy_comment_form(){ 

	_deprecated_function( __FUNCTION__, '1.0.2.3', 'comment_form( thematic_comment_form_args() )' ); 

	$user = wp_get_current_user();

	$user_ID =  ! ( is_wp_error( $user ) ) ? $user->ID : FALSE; ?>
			
	<div id="respond">
	
 		<h3><?php comment_form_title( thematic_postcomment_text(), thematic_postreply_text() ); ?></h3>
 		<div id="cancel-comment-reply"><?php cancel_comment_reply_link() ?></div>
		
		<?php if ( get_option( 'comment_registration' ) && !$user_ID ) : ?>
		
			<p id="login-req"><?php printf( __('You must be %1$slogged in%2$s to post a comment.', 'thematic'), sprintf('<a href="%s" title ="%s">', wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ), esc_attr__( 'Log in', 'thematic' ) ), '</a>' ) ?></p>
			
		<?php else : ?>
		
			<div class="formcontainer">	
				<?php
				// action hook for inserting content above #commentform
				thematic_abovecommentsform() 
				?>					
	
				<form id="commentform" action="<?php echo site_url( '/wp-comments-post.php' ) ?>" method="post">
				
				<?php if ( $user_ID ) : ?>
					<p id="login"><span class="loggedin"><?php _e('Logged in as', 'thematic' ) . printf( ' <a href="%1$s" title="%2$s">%3$s</a>', admin_url( 'profile.php' ), sprintf( esc_attr__('Logged in as %s', 'thematic'), $user_identity ) , $user_identity ) ;?></span> <span class="logout"><?php printf('<a href="%s" title="%s">%s</a>' , esc_attr( wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ), esc_attr__('Log out of this account', 'thematic' ) , __('Log out?', 'thematic' ) ); ?></span>
					</p>
	
				<?php else : ?>

					<p id="comment-notes"><?php printf( _x( 'Your email is %1$snever%2$s published nor shared.' , '%$1s and %$2s are <em> tags for emphasis on never', 'thematic' ), '<em>' , '</em>' ) ?></p>
	
                    <div id="form-section-author" class="form-section">
						<div class="form-label"><label for="author"><?php _e( 'Name', 'thematic' ) ?></label> <?php if ( $req ) _e( '<span class="required">*</span>', 'thematic' ) ?></div>
						<div class="form-input"><input id="author" name="author" type="text" value="<?php echo $comment_author ?>" size="30" maxlength="20" tabindex="3" /></div>
                    </div><!-- #form-section-author .form-section -->
	
                    <div id="form-section-email" class="form-section">
						<div class="form-label"><label for="email"><?php _e( 'Email', 'thematic' ) ?></label> <?php if ( $req ) _e( '<span class="required">*</span>', 'thematic' ) ?></div>
						<div class="form-input"><input id="email" name="email" type="text" value="<?php echo $comment_author_email ?>" size="30" maxlength="50" tabindex="4" /></div>
                    </div><!-- #form-section-email .form-section -->
	
                    <div id="form-section-url" class="form-section">
						<div class="form-label"><label for="url"><?php _e( 'Website', 'thematic' ) ?></label></div>
						<div class="form-input"><input id="url" name="url" type="text" value="<?php echo $comment_author_url ?>" size="30" maxlength="50" tabindex="5" /></div>
	                </div><!-- #form-section-url .form-section -->
	
				<?php endif /* if ( $user_ID ) */ ?>
	
	            <div id="form-section-comment" class="form-section">
					<div class="form-label"><label for="comment"><?php _e( thematic_commentbox_text(), 'thematic' ) ?></label></div>
	    			<div class="form-textarea"><textarea id="comment" name="comment" cols="45" rows="8" tabindex="6"></textarea></div>
	            </div><!-- #form-section-comment .form-section -->
	                            
                <div id="form-allowed-tags" class="form-section">
                    <p><span><?php printf( _x('You may use these %1$sHTML%2$s tags and attributes', '%$1s and %$2s are <abbr> tags', 'thematic'), '<abbr title="HyperText Markup Language">', '</abbr>' ) ?></span> <code><?php echo allowed_tags(); ?></code></p>
                </div>
								
       			<?php do_action( 'comment_form', $post->ID ); ?>
	                  
				<div class="form-submit"><input id="submit" name="submit" type="submit" value="<?php echo thematic_commentbutton_text(); ?>" tabindex="7" /><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></div>
	
                <?php comment_id_fields(); ?>    
	
			</form><!-- #commentform -->
	
			<?php
			// action hook for inserting content below #commentform
			thematic_belowcommentsform()
			?>
	
		</div><!-- .formcontainer -->
		<?php endif /* if ( get_option('comment_registration') && !$user_ID ) */ ?>
		
	</div><!-- #respond -->
	
<?php
}

?>