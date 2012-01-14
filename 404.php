<?php

/**
 * Error 404 Page Template
 *
 * Displays a "Not Found" message and a search form
 *
 * @link http://codex.wordpress.org/Creating_an_Error_404_Pag
 *
 * @package Thematic
 * @subpackage Templates
 */

    @header("HTTP/1.1 404 Not found", true, 404);

    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();

?>

		<div id="container">
		
			<?php thematic_abovecontent();
		
			echo apply_filters( 'thematic_open_id_content', '<div id="content">' . "\n" );
			
				thematic_abovepost(); ?>
		
				<div id="post-0" class="post error404">
				
				<?php
		
    	            // action hook for the 404 content
    	            thematic_404()
		
    	        ?>
				
				</div><!-- .post -->
				
				<?php thematic_belowpost(); ?>
		
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