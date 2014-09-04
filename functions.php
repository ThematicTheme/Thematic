<?php
/**
 * Theme Functions
 *
 * This file is used by WordPress to initialize the theme.
 * Thematic is designed to be used as a theme framework and this file should not be modified.
 * You should use a Child Theme to make your customizations. A sample child theme is provided
 * as an example in root directory of this theme. You can move it into the wp-content/themes to
 * enable activation of the child theme. <br>
 *
 * Reference:  {@link http://codex.wordpress.org/Child_Themes Codex: Child Themes}
 * 
 * @package Thematic
 * @subpackage ThemeInit
 */


/**
 * Thematic only works in WordPress 3.6 or later.
 * 
 * @since Thematic 2.0.0
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6-alpha', '<' ) ) {
	require get_template_directory() . '/library/extensions/back-compat.php';
}


/**
 * Registers action hook: thematic_init 
 * 
 * @since 1.0.0
 */
function thematic_init() {
	do_action('thematic_init');
}


/**
 * thematic_theme_setup & childtheme_override_theme_setup
 *
 * Override: childtheme_override_theme_setup
 *
 * @since 1.0.0
 */
if ( function_exists('childtheme_override_theme_setup') ) {
	/**
	 * @ignore
	 */
	function thematic_theme_setup() {
		childtheme_override_theme_setup();
	}
} else {
	/**
	 * thematic_theme_setup
	 *
	 * @todo review for impact of deprecations on child themes & fix comment blocks?
	 * @since 1.0.0?
	 */
	function thematic_theme_setup() {
		global $content_width;

		/**
		 * Set the content width based on the theme's design and stylesheet.
		 *
		 * Used to set the width of images and content. Should be equal to the width the theme
		 * is designed for, generally via the style.css stylesheet.
		 *
		 * @since 1.0.0
		 */
		if ( !isset($content_width) ) {
			$content_width = 600;
		}
		
		// Check for MultiSite
		define( 'THEMATIC_MB', is_multisite()  );

		// Create the feedlinks
		if ( ! current_theme_supports( 'thematic_legacy_feedlinks' ) ) {
			add_theme_support( 'automatic-feed-links' );
		}
 
		if ( apply_filters( 'thematic_post_thumbs', true ) ) {
			add_theme_support( 'post-thumbnails' );
		}
 
		add_theme_support( 'thematic_superfish' );
		
		// Path constants
		define( 'THEMATIC_LIB',  get_template_directory() .  '/library' );

		// Create Theme Options Page
		require_once ( THEMATIC_LIB . '/extensions/theme-options.php' );
		
		// Need a little help from our helper functions
		require_once ( THEMATIC_LIB . '/extensions/helpers.php' );
		
		// Load legacy functions
		require_once ( THEMATIC_LIB . '/legacy/deprecated.php' );
		
		// Load overrides to activate the old xhtml markup if set
		if ( !is_admin() && thematic_is_legacy_xhtml() ) {
			require_once ( THEMATIC_LIB . '/legacy/legacy.php' );
		}
		
		// Add functionality only when not using old xhtml markup
		if( !thematic_is_legacy_xhtml() ) {
			add_theme_support( 'thematic_meta_viewport' );
			add_theme_support('thematic_customizer_layout');
		}

		// Load widgets
		require_once ( THEMATIC_LIB . '/extensions/widgets.php' );

		// Load custom header extensions
		require_once ( THEMATIC_LIB . '/extensions/header-extensions.php' );

		// Load custom content filters
		require_once ( THEMATIC_LIB . '/extensions/content-extensions.php' );

		// Load custom Comments filters
		require_once ( THEMATIC_LIB . '/extensions/comments-extensions.php' );

		// Load custom discussion filters
		require_once ( THEMATIC_LIB . '/extensions/discussion-extensions.php' );

		// Load custom Widgets
		require_once ( THEMATIC_LIB . '/extensions/widgets-extensions.php' );

		// Load the Comments Template functions and callbacks
		require_once ( THEMATIC_LIB . '/extensions/discussion.php' );

		// Load custom sidebar hooks
		require_once ( THEMATIC_LIB . '/extensions/sidebar-extensions.php' );

		// Load custom footer hooks
		require_once ( THEMATIC_LIB . '/extensions/footer-extensions.php' );

		// Add Dynamic Contextual Semantic Classes
		require_once ( THEMATIC_LIB . '/extensions/dynamic-classes.php' );

		// Load shortcodes
		require_once ( THEMATIC_LIB . '/extensions/shortcodes.php' );

		// Load Theme Customizer support
		require_once ( THEMATIC_LIB . '/extensions/customizer.php' );
		
		// Adds filters for the description/meta content in archive templates
		add_filter( 'archive_meta', 'wptexturize' );
		add_filter( 'archive_meta', 'convert_smilies' );
		add_filter( 'archive_meta', 'convert_chars' );
		add_filter( 'archive_meta', 'wpautop' );

		// Remove the WordPress Generator - via http://blog.ftwr.co.uk/archives/2007/10/06/improving-the-wordpress-generator/
		function thematic_remove_generators() {
 			return '';
 		}
 		if ( apply_filters( 'thematic_hide_generators', true ) ) {
 			add_filter( 'the_generator', 'thematic_remove_generators' );
		}
 
		// Translate, if applicable
		load_theme_textdomain( 'thematic', THEMATIC_LIB . '/languages' );

		$locale = get_locale();
		$locale_file = THEMATIC_LIB . "/languages/$locale.php";
		if ( is_readable($locale_file) ) {
			require_once ($locale_file);
		}
	}
}

add_action('after_setup_theme', 'thematic_theme_setup', 10);


/**
 * Registers action hook: thematic_child_init
 * 
 * @since 1.0.0
 */
function thematic_child_init() {
	do_action('thematic_child_init');
}

add_action('after_setup_theme', 'thematic_child_init', 20);


if ( function_exists('childtheme_override_init_navmenu') )  {
	/**
	 * @ignore
	 */
	 function thematic_init_navmenu() {
    	childtheme_override_init_navmenu();
    }
} else {
	/**
	 * Register primary nav menu
	 * 
	 * Override: childtheme_override_init_navmenu
	 * Filter: thematic_primary_menu_id
	 * Filter: thematic_primary_menu_name
	 */
    function thematic_init_navmenu() {
		register_nav_menu( apply_filters('thematic_primary_menu_id', 'primary-menu'), apply_filters('thematic_primary_menu_name', __( 'Primary Menu', 'thematic' ) ) );
	}
}
add_action('init', 'thematic_init_navmenu');