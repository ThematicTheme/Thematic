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






