<?php
/**
 * Custom Child Theme Functions
 *
 * This file's parent directory can be moved to the wp-content/themes directory 
 * to allow this Child theme to be activated in the Appearance - Themes section of the WP-Admin.
 *
 * Included is a basic theme setup that will add the reponsive stylesheet that comes with Thematic. 
 *
 * More ideas can be found in the community documentation for Thematic
 * @link http://docs.thematictheme.com
 *
 * @package ThematicSampleChildTheme
 * @subpackage ThemeInit
 */


/**
 * Use the parent stylesheet
 * 
 * This will enqueue Thematic's responsive stylesheet before the child theme's style.css.
 * Any style declarations written in style.css will override the parent styles.
 */
function samplechildtheme_add_thematic_styledependency() {
    return array( 'thematic-main' );  
}
add_action( 'thematic_childtheme_style_dependencies', 'samplechildtheme_add_thematic_styledependency' );



/**
 * Define theme setup
 */
function samplechildtheme_setup() {
	// Add any additional functionality for your theme here
}
add_action( 'after_setup_theme', 'samplechildtheme_setup' );

