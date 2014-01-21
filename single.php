<?php
/**
 * Single Post Template
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

	// filter for manipulating the output of the #container opening element
	echo apply_filters( 'thematic_open_id_container', '<div id="container" class="content-wrapper">' . "\n\n" );

	// action hook for placing content above #content
	thematic_abovecontent();

	// filter for manipulating the element that wraps the content
	echo apply_filters( 'thematic_open_id_content', '<div id="content" class="site-content" role="main">' . "\n\n" );

	// start the loop
	while ( have_posts() ) : the_post();

		// create the navigation above the content
		thematic_navigation_above();

		// calling the widget area 'single-top'
		get_sidebar('single-top');

		// action hook creating the single post
		thematic_singlepost();

		// calling the widget area 'single-insert'
		get_sidebar('single-insert');

		// create the navigation below the content
		thematic_navigation_below();

		// action hook for calling the comments_template
		thematic_comments_template();

	// end the loop
	endwhile;

	// calling the widget area 'single-bottom'
	get_sidebar('single-bottom');

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
