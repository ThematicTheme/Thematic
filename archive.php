<?php
/**
 * Archive Template
 *
 * Displays an Archive index of post-type items. Other more specific archive templates
 * may override the display of this template for example the category.php.
 *
 * @package Thematic
 * @subpackage Templates
 *
 * @link http://codex.wordpress.org/Template_Hierarchy Codex: Template Hierarchy
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

	// displays the page title
	thematic_page_title();

	// create the navigation above the content
	thematic_navigation_above();

	// action hook for placing content above the archive loop
	thematic_above_archiveloop();

	// action hook creating the archive loop
	thematic_archiveloop();

	// action hook for placing content below the archive loop
	thematic_below_archiveloop();

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
