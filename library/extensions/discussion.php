<?php

function custom_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>
    	<li id="comment-<?php comment_ID() ?>" class="<?php thematic_comment_class() ?>">
    		<div class="comment-author vcard"><?php thematic_commenter_link() ?></div>
    		<div class="comment-meta"><?php printf(__('Posted %1$s at %2$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'thematic'),
    					get_comment_date(),
    					get_comment_time(),
    					'#comment-' . get_comment_ID() );
    					edit_comment_link(__('Edit', 'thematic'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
    <?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'thematic') ?>
            <div class="comment-content">
        		<?php comment_text() ?>
    		</div>
<?php echo get_comment_reply_link(array('depth' => $depth, 'max_depth'=> $args['depth'])) ?>              
    		
    <?php
}

?>