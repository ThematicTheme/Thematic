<?php
/**
 * Attachments Template
 *
 * Displays singular WordPress Media Library items.
 *
 * @package Thematic
 * @subpackage Templates
 *
 * @link http://codex.wordpress.org/Using_Image_and_File_Attachments Codex:Using Attachments
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

	        	// displays the page title
				thematic_page_title();

				// action hook for placing content above #post
				thematic_abovepost();
			?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> > 

				<?php

	            	// creating the post header
	            	thematic_postheader();
	            ?>

					<div class="entry-content">

						<div class="entry-attachment"><?php the_attachment_link( $post->ID, true ) ?></div>

	                        <?php 
	                        	the_content( thematic_more_text() );

	                        	wp_link_pages( 'before=<div class="page-link">' . __( 'Pages:', 'thematic' ) . '&after=</div>' );
	                        ?>

					</div><!-- .entry-content -->

					<?php
	                	// creating the post footer
	                	thematic_postfooter();
	                ?>

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