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
						// Collect the comments and pings
						$thematic_comments = $wp_query->comments_by_type['comment'];
						$thematic_pings = $wp_query->comments_by_type['pings'];
						
						// Calculate the total number of each
						$thematic_comment_count = count( $thematic_comments );
						$thematic_ping_count = count( $thematic_pings );
						
						// Get the page count for each
						$thematic_comment_pages = get_comment_pages_count( $thematic_comments );
						$thematic_ping_pages = get_comment_pages_count( $thematic_pings );
						
						// Determine which is the greater pagination number between the two (comment,ping) paginations
						$thematic_max_response_pages = ( $thematic_ping_pages > $thematic_comment_pages ) ? $thematic_ping_pages : $thematic_comment_pages;
						
						// Reset the query var to use our calculation for the maximum page (newest/oldest)
						if ( $overridden_cpage )
							set_query_var( 'cpage', 'newest' == get_option('default_comments_page') ? $thematic_comment_pages : 1 );
					?>
					
					<?php if ( ! empty( $comments_by_type['comment'] ) ) : ?>
							
					<?php
						// action hook for inserting content above #comments-list
						thematic_abovecommentslist() ;
					?>

						<?php if ( get_query_var('cpage') <= $thematic_comment_pages )  : ?>
					
					<div id="comments-list-wrapper" class="comments">

						<h3><?php printf( $thematic_comment_count > 1 ? __( thematic_multiplecomments_text(), 'thematic' ) : __( thematic_singlecomment_text(), 'thematic' ), $thematic_comment_count ) ?></h3>
	
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
	        		
	        			<div class="paginated-comments-links"><?php paginate_comments_links( 'total=' . $thematic_max_response_pages ); ?></div>
	                
	                </div>	
	                	                  
					<?php if ( ! empty( $comments_by_type['pings'] ) ) : ?>
	
					<?php 
						// action hook for inserting content above #trackbacks-list-wrapper
						thematic_abovetrackbackslist();
					?>
						
						<?php if ( get_query_var('cpage') <= $thematic_ping_pages ) : ?>
						
					<div id="pings-list-wrapper" class="pings">
						
						<h3><?php printf( $thematic_ping_count > 1 ? '<span>%d</span> ' . __( 'Trackbacks', 'thematic' ) : sprintf( _x( '%1$sOne%2$s Trackback', '%1$ and %2$s are <span> tags', 'thematic' ), '<span>', '</span>' ), $thematic_ping_count ) ?></h3>
	
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
					if ( current_theme_supports( 'thematic_legacy_comment_form' ) ) {
						
						thematic_legacy_comment_form();

					} else {

						// action hook for inserting content above #commentform
						thematic_abovecommentsform();
						
						comment_form( thematic_comment_form_args() );

						// action hook for inserting content below #commentform
						thematic_belowcommentsform();
								
					}
				endif /* if ( 'open' == $post->comment_status ) */ 
						?>
	
				</div><!-- #comments -->
				
				<?php
					// action hook for inserting content below #comments
					thematic_belowcomments()
				?>