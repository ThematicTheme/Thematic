<?php
/**
 * Footer Template
 *
 * This template closes #main div and displays the #footer div.
 *
 * Thematic Action Hooks: thematic_abovefooter thematic_belowfooter thematic_after
 * Thematic Filters: thematic_close_wrapper can be used to remove the closing of the #wrapper div
 *
 * @package Thematic
 * @subpackage Templates
 */

  	// action hook for placing content above the closing of the #main div
	thematic_abovemainclose();

	// Filter provided for altering output of the #main div closing element
	echo ( apply_filters( 'thematic_close_main', '</div><!-- #main -->' . "\n" ) );

	// action hook for placing content above the footer
	thematic_abovefooter();

	// Filter provided for altering output of the footer opening element
	echo ( apply_filters( 'thematic_open_footer', '<footer id="footer" class="site-footer">' ) );

	// action hook creating the footer
	thematic_footer();

	// Filter provided for altering output of the footer closing element
	echo ( apply_filters( 'thematic_close_footer', '</footer><!-- .site-footer -->' . "\n" ) );

	// action hook for placing content below the footer
	thematic_belowfooter();

	// Filter provided for altering output of wrapping element follows the body tag
	echo ( apply_filters( 'thematic_close_wrapper', '</div><!-- #wrapper .hfeed -->' . "\n" ) );

	// action hook for placing content before closing the BODY tag
	thematic_after();

	// calling WordPress' footer action hook
	wp_footer();

	// Filter provided for altering output of the body closing tag
	echo ( apply_filters( 'thematic_close_body', '</body>' . "\n" ) );

	// Filter provided for altering output of the html closing tag
	echo ( apply_filters( 'thematic_close_html', '</html>' ) );
