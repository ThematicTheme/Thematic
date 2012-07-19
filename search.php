<?php
/**
 * Search Template
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
	            // action hook for inserting contentabove #content
				thematic_abovecontent();
		
				// filter for manipulating the element that wraps the content 
				echo apply_filters( 'thematic_open_id_content', '<div id="content">' . "\n\n" );
							
				if (have_posts()) {
	
	                // displays the page title
	                thematic_page_title();
	
	                // create the navigation above the content
	                thematic_navigation_above();
				
	                // action hook for placing content above the search loop
	                thematic_above_searchloop();			
	
	                // action hook creating the search loop
	                thematic_searchloop();
	
	                // action hook for placing content below the search loop
	                thematic_below_searchloop();			
	
	                // create the navigation below the content
	                thematic_navigation_below();
	
	            } else {
	            
	            	// action hook for inserting content above #post
	           		thematic_abovepost();
	           ?>

				<div id="post-0" class="post noresults">
					
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'thematic' ) ?></h1>
					
					<div class="entry-content">
						
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'thematic' ) ?></p>
					
					</div><!-- .entry-content -->
					
					<form id="noresults-searchform" method="get" action="<?php echo home_url() ?>/">
						
						<div>
							
							<input id="noresults-s" name="s" type="text" value="<?php the_search_query();  ?>" size="40" />
							
							<input id="noresults-searchsubmit" name="searchsubmit" type="submit" value="<?php esc_attr_e( 'Find', 'thematic' ) ?>" />
						
						</div>
					
					</form>
				
				</div><!-- #post -->
	
	            <?php
	            	// action hook for inserting content below #post
	            	thematic_belowpost();
	            }
	            ?>
	            
			</div><!-- #content -->
			
			<?php 
				// action hook for inserting content below #content
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