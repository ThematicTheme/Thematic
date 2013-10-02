<?php
/**
 * Legacy Fucntionality
 *
 * @package ThematicLegacy
 */

// Restore xhtml1.0 doctype and version 1.0.4 html tag
// Check for new overrides before restoring legacy functionality
if ( !function_exists( 'childtheme_override_doctype' ) || !function_exists( 'childtheme_override_html' )  ) {
	/**
	* @ignore
	*/
	function childtheme_override_doctype() {
		thematic_create_doctype();
	}
	/**
	* The laguage attributes and closing of the html tag were originally
	* included in the previous version of the header.php template.
	*
	* @ignore
	*/
	function childtheme_override_html() {
		echo " ";
		language_attributes();
		echo ">\n";
	}
}


// Restore head profile
// Check for new overrides before restoring legacy functionality
if ( !function_exists( 'childtheme_override_head' ) ) {
	/**
	* @ignore
	*/
	function childtheme_override_head() {
		thematic_head_profile();
	}
}


// Restore meta content type / charset
// Check for new overrides before restoring legacy functionality
if ( !function_exists( 'childtheme_override_meta_charset' ) ) {
	/**
	* @ignore
	*/
	function childtheme_override_meta_charset() {
		thematic_create_contenttype();
	}
}


/**
 * Switch .site-header opening tag to xhtml
 */
function thematic_open_header_xhtml( $content ) {
	$content = '<div id="header" class="site-header">';
	return $content;
}
add_filter( 'thematic_open_header', 'thematic_open_header_xhtml' );


/**
 * Switch .site-header closing tag to xhtml
 */
function thematic_close_header_xhtml( $content ) {
	$content = '</div><!-- .site-header-->';
	return $content;
}
add_filter( 'thematic_close_header', 'thematic_close_header_xhtml' );


/**
 * Filter the main menu to use div tag
 */
function thematic_xhtml_navmenu_args( $args ) {
	$args[ 'container' ] = 'div';
	return $args;
}
add_filter( 'thematic_nav_menu_args', 'thematic_xhtml_navmenu_args' );


/**
 * Filter the thematic_before_widget_area to use div tags
 */
function thematic_xhtml_before_widget_area( $content ) {
	$content = str_replace( '<aside', '<div ', $content);
	$content = str_replace( '<div class="inner xoxo">', '<ul class="xoxo">', $content);
	return $content;
}
add_filter( 'thematic_before_widget_area', 'thematic_xhtml_before_widget_area' );


/**
 * Filter the thematic_after_widget_area to use div tags
 */
function thematic_xhtml_after_widget_area( $content ) {
	$content = str_replace( '</aside>', '</div>', $content);
	$content = str_replace( '</div><!-- .inner -->', '</ul>', $content);
	return $content;
}
add_filter( 'thematic_after_widget_area', 'thematic_xhtml_after_widget_area' );