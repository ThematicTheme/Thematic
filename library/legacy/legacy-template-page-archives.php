<?php
/**
 * Template Name: Archives Page
 *
 * This is a custom Page template for displaying an index of Archives.
 * It will display the page content above an unordered list of the different 
 * post-type archives nested with an unordered list of thier post-type items.
 *
 * @package Thematic
 * @subpackage LegacyTemplates
 *
 * @link http://codex.wordpress.org/Creating_an_Archive_Index Codex: Creating an Archives Index
 */

	// calling the header.php
	get_header();

	// action hook for placing content above #container
	thematic_abovecontainer();

	// filter for manipulating the output of the #container opening element
	echo apply_filters( 'thematic_open_id_container', '<div id="container" class="content-wrapper">' . "\n\n" );

	// action hook for placing content above #content
	thematic_abovecontent();

	// filter for manipulating the element that wraps the content 
	echo apply_filters( 'thematic_open_id_content', '<div id="content" class="site-content" role="main">' . "\n\n" );

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

	// filter for manipulating the output of the #content closing element
	echo apply_filters( 'thematic_close_id_content', '</div><!-- #content -->' . "\n\n" );

	// action hook for placing content below #content
	thematic_belowcontent();

	// filter for manipulating the output of the #container closing element
	echo apply_filters( 'thematic_close_id_container', '</div><!-- #container -->' . "\n\n" );

	// action hook for placing content below #container
	thematic_belowcontainer();

	// calling the standard sidebar 
	thematic_sidebar();

	// calling footer.php
	get_footer();
