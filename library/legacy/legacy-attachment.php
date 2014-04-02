<?php
/**
 * Attachments Template
 *
 * Displays singular WordPress Media Library items.
 *
 * @package Thematic
 * @subpackage LegacyTemplates
 *
 * @link http://codex.wordpress.org/Using_Image_and_File_Attachments Codex:Using Attachments
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

                    	wp_link_pages( array( 'before' => sprintf( '<div class="page-link">%s', __( 'Pages:', 'thematic' ) ),
													'after' => '</div>' ) );
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
