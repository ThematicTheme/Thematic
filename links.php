<?php
/**
 * Template Name: Links Page
 *
 * …
 * 
 * @package Thematic
 * @subpackage Templates
 */

	// calling the header.php
	get_header();
	
	// action hook for placing content above #container
	thematic_abovecontainer();
?>

		<div id="container">
		
			<?php
				// action hook for placing content above #content
				thematic_abovecontent();

				// filter for manipulating the element that wraps the content 
				echo apply_filters( 'thematic_open_id_content', '<div id="content">' . "\n\n" );
			
				the_post();

				// action hook for placing content above #post
    	    	thematic_abovepost();
    	    ?>
    	        
				<?php
					echo '<div id="post-' . get_the_ID() . '" ';
					// Checking for defined constant to enable Thematic's post classes
					if ( ! ( THEMATIC_COMPATIBLE_POST_CLASS ) ) {
						post_class();
						echo '>';
					} else {
						echo 'class="';
						thematic_post_class();
						echo '">';
					}
	            	    
    	        	// creating the post header
    	        	thematic_postheader();
    	        ?>
    	            
					<div class="entry-content">
    	            
    	                <?php the_content(); ?>
		
						<ul id="links-page" class="xoxo">
    	                
    	                    <?php wp_list_bookmarks(list_bookmarks_args() ); ?>
    	                    
						</ul>
    	                
    	                <?php edit_post_link( __( 'Edit', 'thematic' ),'<span class="edit-link">','</span>' ); ?>
		
					</div><!-- .entry-content -->
					
				</div><!-- #post -->
		
    	        <?php 
					// action hook for placing contentbelow #post
    	        	thematic_belowpost();
    	    
	        		// calling the comments template
        			if ( THEMATIC_COMPATIBLE_COMMENT_HANDLING ) {
       					if ( get_post_custom_values( 'comments' ) ) {
							// Add a key/value of "comments" to enable comments on pages!
	        				thematic_comments_template();
        				}
        			} else {
       					thematic_comments_template();
        			}
    	        ?>
		
			</div><!-- #content -->
			
			<?php 
				// action hook for placing content below #content
				thematic_belowcontent(); 
			?> 
		</div><!-- #container -->

<?php 
    // action hook for placing content below #container
    thematic_belowcontainer();

    // calling the standard sidebar 
    thematic_sidebar();
    
    // calling footer.php
    get_footer();
?>