<?php
/**
 * Template Name: Archives Page
 *
 * This is a custom Page template for displaying an index of Archives.
 * It will display the page content above an unordered list of the different 
 * post-type archives nested with an unordered list of thier post-type items.
 *
 * @package Thematic
 * @subpackage Templates
 *
 * @link http://codex.wordpress.org/Creating_an_Archive_Index Codex: Creating an Archives Index
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

				// start the loop to get the page content
				the_post();
				
				// action hook for placing content above #post
				thematic_abovepost();
			?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> > 

				<?php

	            	// creating the post header
	            	thematic_postheader();
	            ?>

					<div class="entry-content">

	                    <?php 
	                    	// displays the "Page" content 
	                    	the_content();

	                    	// action hook for displaying a list of archive links
	                    	thematic_archives();

	                    	edit_post_link( __( 'Edit', 'thematic' ),'<span class="edit-link">','</span>' );
	                    ?>

					</div><!-- .entry-content -->

				</div><!-- #post -->

	        <?php
	       		// action hook for placing contentbelow #post
	       		thematic_belowpost();

       			// action hook for calling the comments_template
       			thematic_comments_template();
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