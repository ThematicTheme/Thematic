			<div id="comments">
<?php
	$req = get_option('require_name_email'); // Checks if fields are required. Thanks, Adam. ;-)
	if ( 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )
		die ( 'Please do not load this page directly. Thanks!' );
	if ( ! empty($post->post_password) ) :
		if ( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) :
?>
				<div class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'thematic') ?></div>
			</div><!-- .comments -->
<?php
		return;
	endif;
endif;
?>
<?php if ( $comments ) : ?>
<?php global $thematic_comment_alt ?>

<?php /* numbers of pings and comments */
$ping_count = $comment_count = 0;
foreach ( $comments as $comment )
	get_comment_type() == "comment" ? ++$comment_count : ++$ping_count;
?>
<?php if ( $comment_count ) : ?>
<?php $thematic_comment_alt = 0 ?>

				<div id="comments-list" class="comments">
					<h3><?php printf($comment_count > 1 ? __('<span>%d</span> Comments', 'thematic') : __('<span>One</span> Comment', 'thematic'), $comment_count) ?></h3>

					<ol>
<?php foreach ($comments as $comment) : ?>
<?php if ( get_comment_type() == "comment" ) : ?>
						<li id="comment-<?php comment_ID() ?>" class="<?php thematic_comment_class() ?>">
							<div class="comment-author vcard"><?php thematic_commenter_link() ?></div>
							<div class="comment-meta"><?php printf(__('Posted %1$s at %2$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'thematic'),
										get_comment_date(),
										get_comment_time(),
										'#comment-' . get_comment_ID() );
										edit_comment_link(__('Edit', 'thematic'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
<?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'thematic') ?>
							<?php comment_text() ?>
						</li>
<?php endif; /* if ( get_comment_type() == "comment" ) */ ?>
<?php endforeach; ?>

					</ol>
				</div><!-- #comments-list .comments -->

<?php endif; /* if ( $comment_count ) */ ?>
<?php if ( $ping_count ) : ?>
<?php $thematic_comment_alt = 0 ?>

				<div id="trackbacks-list" class="comments">
					<h3><?php printf($ping_count > 1 ? __('<span>%d</span> Trackbacks', 'thematic') : __('<span>One</span> Trackback', 'thematic'), $ping_count) ?></h3>

					<ol>
<?php foreach ( $comments as $comment ) : ?>
<?php if ( get_comment_type() != "comment" ) : ?>

						<li id="comment-<?php comment_ID() ?>" class="<?php thematic_comment_class() ?>">
							<div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'thematic'),
									get_comment_author_link(),
									get_comment_date(),
									get_comment_time() );
									edit_comment_link(__('Edit', 'thematic'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
<?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'thematic') ?>
							<?php comment_text() ?>
						</li>
<?php endif /* if ( get_comment_type() != "comment" ) */ ?>
<?php endforeach; ?>

					</ol>
				</div><!-- #trackbacks-list .comments -->

<?php endif /* if ( $ping_count ) */ ?>
<?php endif /* if ( $comments ) */ ?>
<?php if ( 'open' == $post->comment_status ) : ?>
				<div id="respond">
					<h3><?php _e('Post a Comment', 'thematic') ?></h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
					<p id="login-req"><?php printf(__('You must be <a href="%s" title="Log in">logged in</a> to post a comment.', 'thematic'),
					get_option('siteurl') . '/wp-login.php?redirect_to=' . get_permalink() ) ?></p>

<?php else : ?>
					<div class="formcontainer">	
						<form id="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">

<?php if ( $user_ID ) : ?>
							<p id="login"><?php printf(__('<span class="loggedin">Logged in as <a href="%1$s" title="Logged in as %2$s">%2$s</a>.</span> <span class="logout"><a href="%3$s" title="Log out of this account">Log out?</a></span>', 'thematic'),
								get_option('siteurl') . '/wp-admin/profile.php',
								wp_specialchars($user_identity, true),
								get_option('siteurl') . '/wp-login.php?action=logout&amp;redirect_to=' . get_permalink() ) ?></p>

<?php else : ?>

							<p id="comment-notes"><?php _e('Your email is <em>never</em> published nor shared.', 'thematic') ?> <?php if ($req) _e('Required fields are marked <span class="required">*</span>', 'thematic') ?></p>

                            <div id="form-section-author" class="form-section">
    							<div class="form-label"><label for="author"><?php _e('Name', 'thematic') ?></label> <?php if ($req) _e('<span class="required">*</span>', 'thematic') ?></div>
    							<div class="form-input"><input id="author" name="author" type="text" value="<?php echo $comment_author ?>" size="30" maxlength="20" tabindex="3" /></div>
                            </div><!-- #form-section-author .form-section -->

                            <div id="form-section-email" class="form-section">
    							<div class="form-label"><label for="email"><?php _e('Email', 'thematic') ?></label> <?php if ($req) _e('<span class="required">*</span>', 'thematic') ?></div>
    							<div class="form-input"><input id="email" name="email" type="text" value="<?php echo $comment_author_email ?>" size="30" maxlength="50" tabindex="4" /></div>
                            </div><!-- #form-section-email .form-section -->

                            <div id="form-section-url" class="form-section">
    							<div class="form-label"><label for="url"><?php _e('Website', 'thematic') ?></label></div>
    							<div class="form-input"><input id="url" name="url" type="text" value="<?php echo $comment_author_url ?>" size="30" maxlength="50" tabindex="5" /></div>
                            </div><!-- #form-section-url .form-section -->

<?php endif /* if ( $user_ID ) */ ?>

                            <div id="form-section-comment" class="form-section">
    							<div class="form-label"><label for="comment"><?php _e('Comment', 'thematic') ?></label></div>
    							<div class="form-textarea"><textarea id="comment" name="comment" cols="45" rows="8" tabindex="6"></textarea></div>
                            </div><!-- #form-section-comment .form-section -->

<?php if(function_exists('show_subscription_checkbox')) { show_subscription_checkbox(); } ?>

							<div class="form-submit"><input id="submit" name="submit" type="submit" value="<?php _e('Post Comment', 'thematic') ?>" tabindex="7" /><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></div>

							<?php do_action('comment_form', $post->ID); ?>

						</form><!-- #commentform -->
						
<?php if(function_exists('show_manual_subscription_form')) { show_manual_subscription_form(); } ?>
						
					</div><!-- .formcontainer -->
<?php endif /* if ( get_option('comment_registration') && !$user_ID ) */ ?>

				</div><!-- #respond -->
<?php endif /* if ( 'open' == $post->comment_status ) */ ?>

			</div><!-- #comments -->
