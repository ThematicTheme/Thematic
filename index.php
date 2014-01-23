<?php
/**
 * Index Template
 *
 * This file is required by WordPress to recoginze Thematic as a valid theme.
 * It is also the default template WordPress will use to display your web site,
 * when no other applicable templates are present in this theme's root directory
 * that apply to the query made to the site.
 *
 * WP Codex Reference: http://codex.wordpress.org/Template_Hierarchy
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

	// create the navigation above the content
	thematic_navigation_above();

	// calling the widget area 'index-top'
	get_sidebar('index-top');

	// action hook for placing content above the index loop
	thematic_above_indexloop();

	// action hook creating the index loop
	thematic_indexloop();

	// action hook for placing content below the index loop
	thematic_below_indexloop();

	// calling the widget area 'index-bottom'
	get_sidebar('index-bottom');

	// create the navigation below the content
	thematic_navigation_below();

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
