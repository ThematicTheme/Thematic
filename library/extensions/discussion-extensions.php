<?php
/**
 * Discussion Extensions
 *
 * @package ThematicCoreLibrary
 * @subpackage DiscussionExtensions
 */
 
if (function_exists('childtheme_override_commentmeta'))  {
	/**
	 * @ignore
	 */
	function thematic_commentmeta() {
		childtheme_override_commentmeta();
	}
} else {
	/**
	 * Create comment meta
	 * 
	 * Located in discussion.php
	 * 
	 * Override: childtheme_override_commentmeta <br>
	 * Filter: thematic_commentmeta
	 */
	function thematic_commentmeta($print = TRUE) {
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

	} // end thematic_commentmeta
}

/**
 * Register action hook: thematic_abovecomment
 * 
 * Located in discussion.php, at the beginning of the li#comment-[id] element.
 * Note that this is *per comment*
 */
function thematic_abovecomment() {
	do_action('thematic_abovecomment');
}

/**
 * Register action hook: thematic_belowcomment
 * 
 * Located discussion.php, just after the comment reply link.
 * Note that this is *per comment*:
 */
function thematic_belowcomment() {
	do_action('thematic_belowcomment');
}

?>