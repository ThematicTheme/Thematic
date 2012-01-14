<?php

/**
 * Archive Template 
 *
 * Displays an Archive index for archives that do not have an unique template.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
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
		
		    <?php thematic_abovecontent();
		
			echo apply_filters( 'thematic_open_id_content', '<div id="content">' . "\n" ); 
		
		        the_post();
		
		        // displays the page title
		        thematic_page_title();
		
		        rewind_posts();
		
		        // create the navigation above the content
		        thematic_navigation_above();
			
            	// action hook for placing content above the index loop
            	thematic_above_archiveloop();

		        // action hook creating the archive loop
		        thematic_archiveloop();
				
            	// action hook for placing content below the index loop
            	thematic_below_archiveloop();
		
		        // create the navigation below the content
		        thematic_navigation_below();
		
		        ?>
		
		    </div><!-- #content -->
		    
		    <?php thematic_belowcontent(); ?> 
		    
		</div><!-- #container -->

<?php 

    // action hook for placing content below #container
    thematic_belowcontainer();

    // calling the standard sidebar 
    thematic_sidebar();
    
    // calling footer.php
    get_footer();

?>