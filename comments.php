<?php
/**
 * Comments Template
 *
 * Lists the comments and displays the comments form. 
 * 
 * @package Thematic
 * @subpackage Templates
 *
 * @todo chase the invalid counts & pagination for comments/trackbacks
 * @todo remove the THEMATIC_COMPATIBLE_COMMENT_FORM condition to a legacy function for template berevity
 */
?>
				<?php
					// action hook for inserting content above #comments
					thematic_abovecomments() 
				?>
				
				<div id="comments">
	
				<?php 
					// Disable direct access to the comments script
					if ( 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) )
					    die ( __('Please do not load this page directly.', 'thematic')  );
					
					// Set required varible from options
					$req = get_option('require_name_email');
					
					// Check post password and cookies
					if ( post_password_required() ) :
				?>
	
					<div class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'thematic') ?></div>
				
				</div><!-- #comments -->
	
				<?php 
						return;
					endif; 
				
				?>
	
				<?php if ( have_comments() ) : ?>
	
					<?php
						// count the number of replies
						$thematic_reply_count = '0';
						
						foreach ( $comments as $comment ) {
							if ( $comment->comment_parent )
								++$thematic_reply_count;
						}
						
						// calculate comments, threads and pings
						echo ("\n thematic_comment_count=".$thematic_comment_count = count( $wp_query->comments_by_type['comment'] ));
						echo ("\n thematic_thread_count=".$thematic_thread_count = ( $thematic_comment_count - $thematic_reply_count ));
						echo ("\n thematic_ping_count=".$thematic_ping_count = count( $wp_query->comments_by_type['pings'] ));
						echo ("\n thematic_ping_cpages=".$thematic_ping_pages = get_comment_pages_count( $wp_query->comments_by_type['pings'] ));
						echo ("\n thematic_thread_cpages=".$thematic_thread_pages = get_comment_pages_count( $wp_query->comments_by_type['comment'] ) );

						// calculate the maximum pagination number
						if ( $thematic_thread_count > $thematic_ping_count ) {
							$thematic_max_response_pages = ( $thematic_thread_count / get_query_var('comments_per_page') );
						} else {
							$thematic_max_response_pages = ( $thematic_ping_count / get_query_var('comments_per_page') );
						}
						
						echo '  thematic_max_response_pages='.$thematic_max_response_pages . ' '; echo ' '. get_option('comments_per_page') . ' ';
					?>
	
					<?php if ( ! empty($comments_by_type['comment']) ) : ?>
							
					<?php
						// action hook for inserting content above #comments-list
						thematic_abovecommentslist() ;
					?>

						<?php if ( $thematic_max_response_pages >= ( $thematic_thread_count / get_option('comments_per_page') ) )  : ?>
					
					<div class="comments-list-wrapper" class="comments">

						<h3><?php printf( $thematic_thread_count > 1 ? __( thematic_multiplecomments_text(), 'thematic' ) : __( thematic_singlecomment_text(), 'thematic' ), $thematic_comment_count ) ?></h3>
	
						<ol id="comments-list" >
							<?php wp_list_comments( thematic_list_comments_arg() ); ?>
						</ol>
										
					</div><!-- #comments-list-wrapper .comments -->
					
						<?php endif; ?>
						
					<?php 
						// action hook for inserting content below #comments-list
						thematic_belowcommentslist() 
					?>
					
					<?php endif; ?>
					
					<div id="comments-nav-below" class="comment-navigation">
	        		
	        			<div class="paginated-comments-links"><?php paginate_comments_links( 'total='. $thematic_max_response_pages ); ?></div>
	                
	                </div>	
	                	                  
					<?php if ( ! empty( $comments_by_type['pings'] ) ) : ?>
	
					<?php 
						// action hook for inserting content above #trackbacks-list-wrapper
						thematic_abovetrackbackslist();
					?>
						<?php if ( $thematic_max_response_pages >= ( $thematic_ping_count / get_option('comments_per_page') ) ) : ?>
						
					<div id="pings-list-wrapper" class="pings">
						
						<h3><?php printf( $thematic_ping_count > 1 ? '<span>%d</span> ' . __( 'Trackbacks', 'thematic' ) : __( '<span>One</span> Trackback', 'thematic' ), $thematic_ping_count ) ?></h3>
	
						<ul id="trackbacks-list">
							<?php wp_list_comments( 'type=pings&callback=thematic_pings' ); ?>
						</ul>				
	
					</div><!-- #pings-list-wrapper .pings -->			
						
						<?php endif; ?>
						
					<?php
						// action hook for inserting content below #trackbacks-list
						thematic_belowtrackbackslist();
					?>
									
					<?php endif; ?>

				<?php endif; ?>
							
			<?php
				if ( 'open' == $post->comment_status ) : 
					if ( !THEMATIC_COMPATIBLE_COMMENT_FORM ) {
			?>
			
					<div id="respond">
					
	    				<h3><?php comment_form_title( __( thematic_postcomment_text(), 'thematic' ), __( thematic_postreply_text(), 'thematic' ) ); ?></h3>
	
	    				<div id="cancel-comment-reply"><?php cancel_comment_reply_link() ?></div>
	
						<?php if ( get_option( 'comment_registration' ) && !$user_ID ) : ?>
							<p id="login-req"><?php printf( __( 'You must be <a href="%s" title="Log in">logged in</a> to post a comment.', 'thematic' ), site_url( '/wp-login.php?redirect_to=' . get_permalink() ) ) ?></p>
						
						<?php else : ?>
						<div class="formcontainer">	
	
							<?php
								// action hook for inserting content above #commentform
								thematic_abovecommentsform() 
							?>					
	
							<form id="commentform" action="<?php echo site_url( '/wp-comments-post.php' ) ?>" method="post">
	
							<?php if ( $user_ID ) : ?>
	
								<p id="login"><?php printf( __( '<span class="loggedin">Logged in as <a href="%1$s" title="Logged in as %2$s">%2$s</a>.</span> <span class="logout"><a href="%3$s" title="Log out of this account">Log out?</a></span>', 'thematic' ),
									site_url( '/wp-admin/profile.php' ),
									esc_html( $user_identity ),
									wp_logout_url( get_permalink() ) ) ?>
								</p>
	
							<?php else : ?>
	
								<p id="comment-notes"><?php _e( 'Your email is <em>never</em> published nor shared.', 'thematic' ) ?> <?php if ( $req ) _e( 'Required fields are marked <span class="required">*</span>', 'thematic' ) ?></p>
	
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
	                                <p><span><?php _e( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:', 'thematic' ) ?></span> <code><?php echo allowed_tags(); ?></code></p>
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
								} else {
								
									comment_form( thematic_comment_form_args() );
									
								}
							endif /* if ( 'open' == $post->comment_status ) */ 
						?>
	
				</div><!-- #comments -->
				
				<?php
					// action hook for inserting content below #comments
					thematic_belowcomments()
				?>