<?php

/**
 * Thematic Theme Options
 *
 * Functions for initializing and retrieving theme options.
 *
 * @package ThematicCoreLibrary
 * @subpackage ThemeOptions
 */
	
/**
 * A wrapper for get_option that provides WP multi site compatibility.
 *
 * Returns an option's value from wp_otions table in database
 * or returns false if no value is found for that row 
 *
 * @since Thematic 1.0
 */
function thematic_get_wp_opt( $option_name, $default = false ) {
	global $blog_id;
	
	if (THEMATIC_MB) {
		$opt = get_blog_option( $blog_id, $option_name, $default );
	} else {
		$opt = get_option( $option_name, $default );
	}
	
	return $opt;
}

/**
 * Returns or echoes a theme option value by its key
 * or returns false if no value is found
 *
 * @uses thematic_get_wp_opt()
 * @since Thematic 1.0
 */
function thematic_get_theme_opt( $opt_key, $echo = false ) {
	
	$theme_opt = thematic_get_wp_opt( 'thematic_theme_opt' );
	
	if ( isset( $theme_opt[$opt_key] ) ) {
		if ( false === $echo ) {
			return $theme_opt[$opt_key] ;
		} else { 
			echo $theme_opt[$opt_key];
		}
	} else {
		return false;
	}
}

/**
 * Retrieves legacy Thematic options from database
 * Returns theme as a sanitized array or false
 *
 * @uses thematic_theme_convert_legacy_opt
 * 
 * @since Thematic 1.0
 */
function thematic_convert_legacy_opt() {
    $thm_insert_position = thematic_get_wp_opt( 'thm_insert_position' );
    $thm_authorinfo = thematic_get_wp_opt( 'thm_authorinfo' );
    $thm_footertext = thematic_get_wp_opt( 'thm_footertext' );
    
    // Return false if no options found
    if ( false === $thm_insert_position && false === $thm_authorinfo && false === $thm_footertext )
    	return false; 
    	
    // Return a sanitized array from legacy options if found
    $legacy_sanitized_opt = array(
    		'index_insert' 	=> intval( $thm_insert_position ),
    		'author_info'  	=> ( $thm_authorinfo == "true" ) ? 1 : 0,
    		'footer_txt' 	=> wp_kses_post( $thm_footertext ),
    		'del_legacy_opt'=> 0
    	);

    return apply_filters( 'thematic_theme_convert_legacy_opt', $legacy_sanitized_opt );
}

/**
 * Returns default theme options.
 *
 * Filter: thematic_theme_default_opt
 * 
 * @since Thematic 1.0
 *
 */
function thematic_default_opt() {
	$thematic_default_opt = array(
		'index_insert' 	=> 2,
		'author_info'  	=> 0, 
		'footer_txt' 	=> 'Powered by [wp-link]. Built on the [theme-link].'
	);

	return apply_filters( 'thematic_theme_default_opt', $thematic_default_opt );
}	

/**
 * Sets default options in database if not pre-existent. 
 * Sets leagacy options in the newer format if they are present and if more recent options do not exist.
 *
 * @since Thematic 1.0
 */

function thematic_opt_init() {
	// Retrieve current options from database	
	$current_options = thematic_get_wp_opt('thematic_theme_opt');
	$legacy_options = thematic_convert_legacy_opt();
	
	// If no current settings exist
	if ( false === $current_options )  {
	    // Check for legacy options
	    if ( false !== ( $legacy_options ) )  {
	    	// Theme upgrade: Convert legacy to current format and add to database 
	    	add_option( 'thematic_theme_opt', $legacy_options );
	    } else {
	    	// Fresh theme installation: Add default settings to database
	    	add_option( 'thematic_theme_opt', thematic_default_opt() );
	    }
	}
}

add_action ('after_switch_theme', 'thematic_opt_init');