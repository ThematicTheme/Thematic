<?php
/**
 * Header Template
 *
 * This template calls a series of functions that output the head tag of the document.
 * The body and div #main elements are opened at the end of this file.
 *
 * @package Thematic
 * @subpackage Templates
 */

	// Creates the doctype
	thematic_doctype();

	// Opens the html tag with attributes
	thematic_html();

	// Opens the head
	thematic_head();

	// Create the meta charset
	thematic_meta_charset();

	// Create the meta viewport if theme supports it
	thematic_meta_viewport();

	// Create the title tag
	thematic_doctitle();

	// Create the meta description
	thematic_meta_description();

	// Create the tag <meta name="robots"
	thematic_meta_robots();

	// Create pingback adress
	thematic_show_pingback();

	/* Loads Thematic's stylesheet and scripts
	 * Calling wp_head() is required to provide plugins and child themes
	 * the ability to insert markup within the <head> tag.
	 */
	wp_head();

	// Filter provided for altering output of the head closing element
	echo ( apply_filters( 'thematic_close_head',  '</head>' . "\n" ) );

	// Create the body element and dynamic body classes
	thematic_body();

	// Action hook to place content before opening #wrapper
	thematic_before();

	// Filter provided for removing output of wrapping element follows the body tag
	echo ( apply_filters( 'thematic_open_wrapper', '<div id="wrapper" class="hfeed site-wrapper">' ) );

	// Action hook for placing content above the theme header
	thematic_aboveheader();

	// Filter provided for altering output of the header opening element
	echo ( apply_filters( 'thematic_open_header',  '<header id="header" class="site-header" role="banner">' ) );

	// Action hook creating the theme header
	thematic_header();

	// Filter provided for altering output of the header closing element
	echo ( apply_filters( 'thematic_close_header', '</header><!-- .site-header-->' ) );

	// Action hook for placing content below the theme header
	thematic_belowheader();

	// Filter provided for altering output of the #main div opening element
	echo ( apply_filters( 'thematic_open_main',  '<div id="main" class="site-main">' ) );
