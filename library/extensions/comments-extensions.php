<?php
/**
 * Comments Extensions
 *
 * @package ThematicCoreLibrary
 * @subpackage CommentsExtensions
 */

/**
 * Action Hook: thematic_abovecomments
 * 
 * Located in comments.php
 * Just before #comments
 */
function thematic_abovecomments() {
    do_action('thematic_abovecomments');
}

/**
 * Action Hook: thematic_abovecommentslist
 * 
 * Located in comments.php
 * Just before #comments-list
 */
function thematic_abovecommentslist() {
    do_action('thematic_abovecommentslist');
}

/**
 * Action Hook: thematic_belowcommentslist
 * 
 * Located in comments.php
 * Just after #comments-list
 */
function thematic_belowcommentslist() {
    do_action('thematic_belowcommentslist');
}

/**
 * Action Hook: thematic_abovetrackbackslist
 * 
 * Located in comments.php
 * Just before #trackbacks-list
 */
function thematic_abovetrackbackslist() {
    do_action('thematic_abovetrackbackslist');
}

/**
 * Action Hook: thematic_belowtrackbackslist
 * 
 * Located in comments.php
 * Just after #trackbacks-list
 */
function thematic_belowtrackbackslist() {
    do_action('thematic_belowtrackbackslist');
}

/**
 * Action Hook: thematic_abovecommentsform
 * 
 * Located in comments.php
 * Just before the comments form
 */
function thematic_abovecommentsform() {
    do_action('thematic_abovecommentsform');
}

/**
 * Provides Plugin Compatibility: Subscribe to Comments
 *
 * Adds the subscribe to comments button.
 *
 * @link http://wordpress.org/extend/plugins/subscribe-to-comments/ Subscribe to Comments Plugin Page
 */
function thematic_show_subscription_checkbox() {
    if(function_exists('show_subscription_checkbox')) { show_subscription_checkbox(); }
}
add_action('comment_form', 'thematic_show_subscription_checkbox', 98);

/**
 * Action Hook: thematic_belowcommentsform
 * 
 * Located in comments.php
 * Just after the comments form
 */
function thematic_belowcommentsform() {
    do_action('thematic_belowcommentsform');
}

/**
 * Provides Plugin Compatibility: Subscribe to Comments
 *
 * Adds the subscribe without commenting button
 *
 * @link http://wordpress.org/extend/plugins/subscribe-to-comments/ Subscribe to Comments Plugin Page
 */
function thematic_show_manual_subscription_form() {
    if(function_exists('show_manual_subscription_form')) { show_manual_subscription_form(); }
}
add_action('thematic_belowcommentsform', 'thematic_show_manual_subscription_form', 5);

/**
 * Action Hook: thematic_belowcomments
 * 
 * Located in comments.php
 * Just after #comments
 */
function thematic_belowcomments() {
    do_action('thematic_belowcomments');
}

/**
 * Filter: thematic_singlecomment_text
 *
 * Creates the standard text for one comment
 * Located in comments.php
 */
function thematic_singlecomment_text() {
    $content = __('<span>One</span> Comment', 'thematic');
    return apply_filters( 'thematic_singlecomment_text', $content );
}

/**
 * Filter: thematic_multiplecomments_text
 *
 * Creates the standard text for more than one comment
 * Located in comments.php
 */
function thematic_multiplecomments_text() {
    $content = '<span>%d</span> ' . __('Comments', 'thematic');
    return apply_filters( 'thematic_multiplecomments_text', $content );
}


/**
 * Filter: list_comments_arg
 * 
 * Creates the list comments arguments
 */
function thematic_list_comments_arg() {
	$content = 'type=comment&callback=thematic_comments';
	return apply_filters('list_comments_arg', $content);
}


/**
 * Filter: thematic_postcomment_text
 * 
 * Creates the standard text 'Post a Comment'
 * Located in comments.php
 */
function thematic_postcomment_text() {
    $content = __('Post a Comment', 'thematic');
    return apply_filters( 'thematic_postcomment_text', $content );
}

/**
 * Filter: thematic_postreply_text
 * 
 * Creates the standard text 'Post a Reply to %s'
 * Located in comments.php
 */
function thematic_postreply_text() {
    $content = __('Post a Reply to %s', 'thematic');
    return apply_filters( 'thematic_postreply_text', $content );
}

/**
 * Filter: thematic_commentbox_text
 * 
 * Creates the standard text 'Comment' for the text box
 * Located in comments.php
 */
function thematic_commentbox_text() {
    $content = __('Comment', 'thematic');
    return apply_filters( 'thematic_commentbox_text', $content );
}

/**
 * Filter: thematic_cancelreply_text function.
 * 
 * Creates the standard text 'Cancel reply'
 * Located in comments-extensions.php
 */
function thematic_cancelreply_text() {
    $content = __('Cancel reply', 'thematic');
    return apply_filters( 'thematic_cancelreply_text', $content );
}

/**
 * Filter: thematic_commentbutton_text
 * 
 * Creates the standard text 'Post Comment' for the send button
 * Located in comments.php
 */
function thematic_commentbutton_text() {
    $content = esc_attr( __('Post Comment', 'thematic') );
    return apply_filters( 'thematic_commentbutton_text', $content );
}

/**
 * Function: thematic_comment_form_args
 * Filter: comment_form_default_fields
 * 
 * Creates the standard arguments for comment_form()
 * Located in comments.php
 */
function thematic_comment_form_args( $post_id = null ) {
	global $user_identity, $id;
	
	if ( null === $post_id )
          $post_id = $id;
      else
          $id = $post_id;
	
	$req = get_option( 'require_name_email' );
	
	$commenter = wp_get_current_commenter();
	
	$aria_req = ( $req ? " aria-required='true'" : '' );
	
	$fields =  array(
		'author' => '<div id="form-section-author" class="form-section"><div class="form-label">' . '<label for="author">' . __( 'Name', 'thematic' ) . '</label> ' . ( $req ? __('<span class="required">*</span>', 'thematic') : '' ) . '</div>' . '<div class="form-input">' . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' .  ' maxlength="20" tabindex="3"' . $aria_req . ' /></div></div><!-- #form-section-author .form-section -->',
		'email'  => '<div id="form-section-email" class="form-section"><div class="form-label"><label for="email">' . __( 'Email', 'thematic' ) . '</label> ' . ( $req ? __('<span class="required">*</span>', 'thematic') : '' ) . '</div><div class="form-input">' . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" maxlength="50" tabindex="4"' . $aria_req . ' /></div></div><!-- #form-section-email .form-section -->',
		'url'    => '<div id="form-section-url" class="form-section"><div class="form-label"><label for="url">' . __( 'Website', 'thematic' ) . '</label></div>' . '<div class="form-input"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="50" tabindex="5" /></div></div><!-- #form-section-url .form-section -->',
	);

	
	$args = array(
		'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'        => '<div id="form-section-comment" class="form-section"><div class="form-label"><label for="comment">' . __(thematic_commentbox_text(), 'thematic') . '</label></div><div class="form-textarea"><textarea id="comment" name="comment" cols="45" rows="8" tabindex="6" aria-required="true"></textarea></div></div><!-- #form-section-comment .form-section -->',
		'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email is <em>never</em> published nor shared.', 'thematic' ) . ( $req ? ' ' . __('Required fields are marked <span class="required">*</span>', 'thematic') : '' ) . '</p>',
		'must_log_in'          => '<p id="login-req">' .  sprintf( __( 'You must be <a href="%s" title="Log in">logged in</a> to post a comment.', 'thematic' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'logged_in_as'         => '<p id="login">' . sprintf( __('<span class="loggedin">Logged in as <a href="%1$s" title="Logged in as %2$s">%2$s</a>.</span> <span class="logout"><a href="%3$s" title="Log out of this account">Log out?</a></span>', 'thematic'),  admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'comment_notes_after'  => '<div id="form-allowed-tags" class="form-section"><p><span>' . __('You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:', 'thematic') . '</span> <code>' . allowed_tags() . '</code></p></div>',


		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => thematic_postcomment_text(),
		'title_reply_to'       => thematic_postreply_text(),
		'cancel_reply_link'    => thematic_cancelreply_text(),
		'label_submit'         => thematic_commentbutton_text(),

	);
	return apply_filters( 'thematic_comment_form_args', $args );	
}

/**
 * Produces an avatar image with the hCard-compliant photo class
 */
function thematic_commenter_link() {
	$commenter = get_comment_author_link();
	if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
		$commenter = ereg_replace( '(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter );
	} else {
		$commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );
	}
	$avatar_email = get_comment_author_email();
	$avatar_size = apply_filters( 'avatar_size', '80' ); // Available filter: avatar_size
	$avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, $avatar_size ) );
	echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
} 

/**
 * ActionHook: thematic_comments_template
 */
function thematic_comments_template() {
	do_action('thematic_comments_template');
}

/**
 *  Outputs the standard comments template
 */
function thematic_include_comments() {
	// Checking for defined constant to enable conditional comment display for Pages
    if ( THEMATIC_COMPATIBLE_COMMENT_HANDLING && is_page() ) {
    	// Needs post-meta key/value of "comments" to call comments template on Pages!
       	if ( get_post_custom_values('comments') )
			comments_template('', true);	    	
	// WordPress standard comment handling is the default if constant is not set
	} else {
		comments_template('', true);
	}
}

add_action('thematic_comments_template','thematic_include_comments', 5);

function thematic_get_comment_link( $link , $comment, $args ) {
	global  $wp_rewrite; 

	$args['type'] = 'comment';
	$args['page'] = get_page_of_comment( $comment->comment_ID, $args );

	if ( $wp_rewrite->using_permalinks() )
	   	$link = user_trailingslashit( trailingslashit( get_permalink( $comment->comment_post_ID ) ) . 'comment-page-' . $args['page'], 'comment' );
	else
		$link = add_query_arg( 'cpage', $args['page'] , get_permalink( $comment->comment_post_ID ) );

	return $link; 
}
add_filter( 'get_comment_link', 'thematic_get_comment_link', 10, 3 );

?>