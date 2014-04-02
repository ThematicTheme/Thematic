<?php
/**
 * Page Template
 *
 * …
 * 
 * @package Thematic
 * @subpackage LegacyTemplates
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
	echo apply_filters( 'thematic_open_id_content', '<div id="content" class="site-content" role="main">' . "\n" );

	// calling the widget area 'page-top'
	get_sidebar('page-top');

	// start the loop
	while ( have_posts() ) : the_post();

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
	            	the_content();
            
	            	wp_link_pages( "\t\t\t\t\t<nav class='page-link'>" . __( 'Pages: ', 'thematic' ), "</nav>\n", 'number' );
            
	            	edit_post_link( __( 'Edit', 'thematic' ), "\n\t\t\t\t\t\t" . '<span class="edit-link">' , '</span>' . "\n" );
	            ?>

			</div><!-- .entry-content -->
		
		</div><!-- #post -->
	
	<?php

	// action hook for inserting content below #post
	thematic_belowpost();

	// action hook for calling the comments_template
	thematic_comments_template();

	// end loop
	endwhile;

	// calling the widget area 'page-bottom'
	get_sidebar( 'page-bottom' );

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
