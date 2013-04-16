<?php
/**
 * Legacy Fucntionality
 *
 * Calling add_theme_support( 'thematic_legacy_quiet' ) will turn off
 * deprecated notices for legacy functions. This is meant to aid in dubugging
 * issues not related to legacy deprecations.
 *
 * @package ThematicLegacy
 */


/**
 * Display the DOCTYPE
 * 
 * Filter: thematic_create_doctype
 */
function thematic_create_doctype() {
	if ( !current_theme_supports( 'thematic_legacy_quiet' ) ) {
		_deprecated_function( __FUNCTION__, '1.1', 'childtheme_override_doctype childtheme_override_html' );

	}
    $content = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' . "\n";
    $content .= '<html xmlns="http://www.w3.org/1999/xhtml"';
    echo apply_filters( 'thematic_create_doctype', $content );
}

// Check for new overrides before restoring leagcy functionality
if ( !function_exists( 'childtheme_doctype' ) || !function_exists( 'childtheme_html' )  ) {
	/**
	* Wrap legacy function in an overrride to echo 
	* the doctype and the opening of the html tag.
	*
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
