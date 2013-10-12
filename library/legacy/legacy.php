<?php
/**
 * Legacy Fucntionality
 *
 * @package ThematicLegacy
 */

// Restore xhtml1.0 doctype and version 1.0.4 html tag
// Check for new overrides before restoring leagcy functionality
if ( !function_exists( 'childtheme_override_doctype' ) || !function_exists( 'childtheme_override_html' )  ) {
	/**
	* @ignore
	*/
	function childtheme_override_doctype() {
		thematic_create_doctype();
	}
	/**
	* The laguage attributes and closing of the html tag were originally
	* included in the previous version of the header.php template.
	*
	* @ignore
	*/
	function childtheme_override_html() {
		echo " ";
		language_attributes();
		echo ">\n";
	}
}


// Restore head profile
// Check for new overrides before restoring leagcy functionality
if ( !function_exists( 'childtheme_override_head' ) ) {
	/**
	* @ignore
	*/
	function childtheme_override_head() {
		thematic_head_profile();
	}
}


// Restore meta content type / charset
// Check for new overrides before restoring leagcy functionality
if ( !function_exists( 'childtheme_override_meta_charset' ) ) {
	/**
	* @ignore
	*/
	function childtheme_override_meta_charset() {
		thematic_create_contenttype();
	}
}


/**
 * Add filter to wp_list_comments arguments to use xhtml comments callback
 * 
 * @param $content array Previous arguments
 * @return $content array Array with new arguments
 */
function thematic_comments_arg_xhtml( $content ) {
	$content[ 'callback' ] = 'thematic_comments_xhtml';
	return $content;
}
add_filter( 'thematic_list_comments_arg', 'thematic_comments_arg_xhtml' );


/**
 * Custom callback function to list comments in the Thematic style. 
 * 
 * Used in legacy xhtml mode
 *
 * @param object $comment 
 * @param array $args 
 * @param int $depth 
 */
function thematic_comments_xhtml($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
	$GLOBALS['comment_depth'] = $depth;
?>
    
       	<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
    	
    		<?php 
    			// action hook for inserting content above #comment
    			thematic_abovecomment();
    		?>
    		
    		<div class="comment-author vcard"><?php thematic_commenter_link() ?></div>
    		
    			<?php thematic_commentmeta(TRUE); ?>
    		
    			<?php  
    				if ( $comment->comment_approved == '0' ) {
    					echo "\t\t\t\t\t" . '<span class="unapproved">';
    					_e( 'Your comment is awaiting moderation', 'thematic' );
    					echo ".</span>\n";
    				}
    			?>
    			
            <div class="comment-content">
            
        		<?php comment_text() ?>
        		
    		</div>
    		
			<?php // echo the comment reply link with help from Justin Tadlock http://justintadlock.com/ and Will Norris http://willnorris.com/
				
				if( $args['type'] == 'all' || get_comment_type() == 'comment' ) :
					comment_reply_link( array_merge( $args, array(
						'reply_text' => __( 'Reply','thematic' ), 
						'login_text' => __( 'Log in to reply.','thematic' ),
						'depth'      => $depth,
						'before'     => '<div class="comment-reply-link">', 
						'after'      => '</div>'
					)));
				endif;
			?>
			
			<?php
				// action hook for inserting content above #comment
				thematic_belowcomment() 
			?>

<?php }

if ( !function_exists( 'childtheme_override_head' ) ) {
	/**
	 * @ignore
	 */
	function childtheme_override_commentmeta() {
		$content = '<div class="comment-meta">' . 
					sprintf( _x('Posted %s at %s', 'Posted {$date} at {$time}', 'thematic') , 
						get_comment_date(),
						get_comment_time() );

		$content .= ' <span class="meta-sep">|</span> ' . sprintf( '<a href="%1$s" title="%2$s">%3$s</a>', '#comment-' . get_comment_ID() , __( 'Permalink to this comment', 'thematic' ), __( 'Permalink', 'thematic' ) );
							
		if ( get_edit_comment_link() ) {
			$content .=	sprintf(' <span class="meta-sep">|</span><span class="edit-link"> <a class="comment-edit-link" href="%1$s" title="%2$s">%3$s</a></span>',
						get_edit_comment_link(),
						__( 'Edit comment' , 'thematic' ),
						__( 'Edit', 'thematic' ) );
			}
		
		$content .= '</div>' . "\n";
			
		return $print ? print(apply_filters('thematic_commentmeta', $content)) : apply_filters('thematic_commentmeta', $content);
	
	}
}



