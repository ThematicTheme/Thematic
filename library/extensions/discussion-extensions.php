<?php

// Located in discussion.php
// after comment-author
if (function_exists('childtheme_override_commentmeta'))  {
	function thematic_commentmeta() {
		childtheme_override_commentmeta();
	}
} else {
	// Creates comment meta
	function thematic_commentmeta($print = TRUE) {
		$content = '<div class="comment-meta">' . 
					sprintf( __('Posted %1$s at %2$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'thematic' ),
					get_comment_date(),
					get_comment_time(),
					'#comment-' . get_comment_ID() ) .
					' <span class="meta-sep">|</span> ' .
					sprintf('<span class="edit-link"><a class="comment-edit-link" href="%1$s" title="%2$s">%3$s</a></span>',
					get_edit_comment_link(),
					__( 'Edit comment' ),
					__( 'Edit', 'thematic' ) ) .
					'</div>' . "\n";

		return $print ? print(apply_filters('thematic_commentmeta', $content)) : apply_filters('thematic_commentmeta', $content);

	} // end thematic_commentmeta
}
?>