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
 * Registers action hook: thematic_init 
 * 
 * @since Thematic 1.0
 */
function thematic_init() {
	do_action('thematic_init');
}


/**
 * thematic_theme_setup & childtheme_override_theme_setup
 *
 * Override: childtheme_override_theme_setup
 *
 * @since Thematic 1.0
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
	 * @since Thematic 1.0?
	 */
	function thematic_theme_setup() {
		global $content_width;

		/**
		 * Set the content width based on the theme's design and stylesheet.
		 *
		 * Used to set the width of images and content. Should be equal to the width the theme
		 * is designed for, generally via the style.css stylesheet.
		 *
		 * @since Thematic 1.0
		 */
		if ( !isset($content_width) )
			$content_width = 540;

		/**
		 * Get Theme and Child Theme Data.
		 * Credits: Joern Kretzschmar
		 * 
		 * Used to get title, version, author, URI of the parent and the child theme.
		 */
		
		// WordPress 3.4 
		if ( function_exists( 'wp_get_theme' ) ) {
			$frameworkData = wp_get_theme(  get_template_directory() . '/style.css' );
		// WordPress 3.3
		} else {
			$frameworkData = get_theme_data(  get_template_directory() . '/style.css' );
		}
		
		$framework_version = trim( $frameworkData['Version'] );
		
		if ( !$framework_version )
			$framework_version = "unknown";

		// WordPress 3.4 
		if ( function_exists( 'wp_get_theme' ) ) {
			$childthemeData = wp_get_theme( get_stylesheet_directory() . '/style.css' );
		// WordPress 3.3
		} else { 
			$childthemeData = get_theme_data( get_stylesheet_directory() . '/style.css' );
		}
		
		$childtheme_version = trim( $childthemeData['Version'] );
		
		if ( !$childtheme_version )
			$childtheme_version = "unknown";

		if ( !defined( 'THEMENAME' ) )
			define( 'THEMENAME', 	$frameworkData['Title'] );

		if ( !defined('THEMEAUTHOR') )
			define( 'THEMEAUTHOR', 	$frameworkData['Author'] );

		if ( !defined( 'THEMEURI') )
			define( 'THEMEURI', 	$frameworkData['URI'] );

		if ( !defined( 'THEMATICVERSION' ) )
			define( 'THEMATICVERSION', $framework_version );

		define( 'TEMPLATENAME', 	$childthemeData['Title'] );
		define( 'TEMPLATEAUTHOR', 	$childthemeData['Author'] );
		define( 'TEMPLATEURI', 		$childthemeData['URI'] );
		define( 'TEMPLATEVERSION', 	$childtheme_version );

		// set feed links handling
		// If you set this to TRUE, thematic_show_rss() and thematic_show_commentsrss() are used instead of add_theme_support( 'automatic-feed-links' )
		if ( !defined('THEMATIC_COMPATIBLE_FEEDLINKS') ) 
				define( 'THEMATIC_COMPATIBLE_FEEDLINKS', false );

		// set comments handling for pages, archives and links
		// If you set this to TRUE, comments only show up on pages with a key/value of "comments"
		if ( !defined( 'THEMATIC_COMPATIBLE_COMMENT_HANDLING') )
			define( 'THEMATIC_COMPATIBLE_COMMENT_HANDLING', false );

		// set body class handling to WP body_class()
		// If you set this to TRUE, Thematic will use thematic_body_class instead
		if ( !defined( 'THEMATIC_COMPATIBLE_BODY_CLASS') )
			define( 'THEMATIC_COMPATIBLE_BODY_CLASS', false );

		// set post class handling to WP post_class()
		// If you set this to TRUE, Thematic will use thematic_post_class instead
		if ( !defined( 'THEMATIC_COMPATIBLE_POST_CLASS') )
			define( 'THEMATIC_COMPATIBLE_POST_CLASS', false );

		// If you set this to TRUE, Thematic will use it's legacy comment form
		if ( !defined('THEMATIC_COMPATIBLE_COMMENT_FORM') ) 
 				define( 'THEMATIC_COMPATIBLE_COMMENT_FORM', false ); 

		// Check for MultiSite
		define( 'THEMATIC_MB', is_multisite()  );

		// Create the feedlinks
		if ( !( THEMATIC_COMPATIBLE_FEEDLINKS ) )
 			add_theme_support( 'automatic-feed-links' );
 
		if ( apply_filters( 'thematic_post_thumbs', true ) )
			add_theme_support( 'post-thumbnails' );
 
		add_theme_support( 'thematic_superfish' );

		// Path constants
		define( 'THEMELIB',  get_template_directory() .  '/library' );

		// Create Theme Options Page
		require_once ( THEMELIB . '/extensions/theme-options.php' );
		
		// Load legacy functions
		require_once ( THEMELIB . '/legacy/deprecated.php' );

		// Load widgets
		require_once ( THEMELIB . '/extensions/widgets.php' );

		// Load custom header extensions
		require_once ( THEMELIB . '/extensions/header-extensions.php' );

		// Load custom content filters
		require_once ( THEMELIB . '/extensions/content-extensions.php' );

		// Load custom Comments filters
		require_once ( THEMELIB . '/extensions/comments-extensions.php' );

		// Load custom discussion filters
		require_once ( THEMELIB . '/extensions/discussion-extensions.php' );

		// Load custom Widgets
		require_once ( THEMELIB . '/extensions/widgets-extensions.php' );

		// Load the Comments Template functions and callbacks
		require_once ( THEMELIB . '/extensions/discussion.php' );

		// Load custom sidebar hooks
		require_once ( THEMELIB . '/extensions/sidebar-extensions.php' );

		// Load custom footer hooks
		require_once ( THEMELIB . '/extensions/footer-extensions.php' );

		// Add Dynamic Contextual Semantic Classes
		require_once ( THEMELIB . '/extensions/dynamic-classes.php' );

		// Need a little help from our helper functions
		require_once ( THEMELIB . '/extensions/helpers.php' );

		// Load shortcodes
		require_once ( THEMELIB . '/extensions/shortcodes.php' );

		// Adds filters for the description/meta content in archive templates
		add_filter( 'archive_meta', 'wptexturize' );
		add_filter( 'archive_meta', 'convert_smilies' );
		add_filter( 'archive_meta', 'convert_chars' );
		add_filter( 'archive_meta', 'wpautop' );

		// Remove the WordPress Generator - via http://blog.ftwr.co.uk/archives/2007/10/06/improving-the-wordpress-generator/
		function thematic_remove_generators() {
 			return '';
 		}
 		if ( apply_filters( 'thematic_hide_generators', true ) )
 			add_filter( 'the_generator', 'thematic_remove_generators' );
 
		// Translate, if applicable
		load_theme_textdomain( 'thematic', THEMELIB . '/languages' );

		$locale = get_locale();
		$locale_file = THEMELIB . "/languages/$locale.php";
		if ( is_readable($locale_file) )
			require_once ($locale_file);
	}
}

add_action('after_setup_theme', 'thematic_theme_setup', 10);


/**
 * Registers action hook: thematic_child_init
 * 
 * @since Thematic 1.0
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