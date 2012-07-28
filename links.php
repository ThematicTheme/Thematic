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
			
	            // start the loop
	            while ( have_posts() ) : the_post();

				// action hook for placing content above #post
    	    	thematic_abovepost();
    	    ?>
    	        
				<?php
					
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> > 

				<?php
	            	    
    	        	// creating the post header
    	        	thematic_postheader();
    	        ?>
    	            
					<div class="entry-content">
    	            
    	                <?php the_content(); ?>
		
						<ul id="links-page" class="xoxo">
    	                
    	                    <?php wp_list_bookmarks( thematic_list_bookmarks_args() ); ?>
    	                    
						</ul>
    	                
    	                <?php edit_post_link( __( 'Edit', 'thematic' ),'<span class="edit-link">','</span>' ); ?>
		
					</div><!-- .entry-content -->
					
				</div><!-- #post -->
		
    	        <?php 
					// action hook for placing contentbelow #post
    	        	thematic_belowpost();
    	    
       				// action hook for calling the comments_template
        			thematic_comments_template();
        			
        			// end loop
        			endwhile;
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