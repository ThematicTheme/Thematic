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

	                    <?php 
	                    	the_content();

	                    	// action hook for the archives content… the "Page" content is displayed followed by a list of archived posts
	                    	thematic_archives();

	                    	edit_post_link( __( 'Edit', 'thematic' ),'<span class="edit-link">','</span>' );
	                    ?>

					</div><!-- .entry-content -->

				</div><!-- #post -->

	        <?php
	       		// action hook for placing contentbelow #post
	       		thematic_belowpost();

	        	// Checking for defined constant to enable conditional comment display for Pages
        		if ( THEMATIC_COMPATIBLE_COMMENT_HANDLING ) {
        		    // Needs post-meta key/value of "comments" to call comments template on Pages!
       			    if ( get_post_custom_values('comments') ) {
				    	// calls the comments template
	        	    	thematic_comments_template();
        		    }
        		} else {
        		    // calls the comments template
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