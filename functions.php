<?php

// Getting Theme and Child Theme Data
// Credits: Joern Kretzschmar

$themeData = get_theme_data(TEMPLATEPATH . '/style.css');
$thm_version = trim($themeData['Version']);
if(!$thm_version)
    $thm_version = "unknown";

$ct=get_theme_data(STYLESHEETPATH . '/style.css');
$templateversion = trim($ct['Version']);
if(!$templateversion)
    $templateversion = "unknown";

// set theme constants
define('THEMENAME', $themeData['Title']);
define('THEMEAUTHOR', $themeData['Author']);
define('THEMEURI', $themeData['URI']);
define('THEMATICVERSION', $thm_version);

// set child theme constants
define('TEMPLATENAME', $ct['Title']);
define('TEMPLATEAUTHOR', $ct['Author']);
define('TEMPLATEURI', $ct['URI']);
define('TEMPLATEVERSION', $templateversion);


// set feed links handling
// If you set this to TRUE, thematic_show_rss() and thematic_show_commentsrss() are used instead of add_theme_support( 'automatic-feed-links' )
if (!defined('THEMATIC_COMPATIBLE_FEEDLINKS')) {	
	if (function_exists('comment_form')) {
		define('THEMATIC_COMPATIBLE_FEEDLINKS', false); // WordPress 3.0
	} else {
		define('THEMATIC_COMPATIBLE_FEEDLINKS', true); // below WordPress 3.0
	}
}

// set comments handling for pages, archives and links
// If you set this to TRUE, comments only show up on pages with a key/value of "comments"
if (!defined('THEMATIC_COMPATIBLE_COMMENT_HANDLING')) {
	define('THEMATIC_COMPATIBLE_COMMENT_HANDLING', false);
}

// set body class handling to WP body_class()
// If you set this to TRUE, Thematic will use thematic_body_class instead
if (!defined('THEMATIC_COMPATIBLE_BODY_CLASS')) {
	define('THEMATIC_COMPATIBLE_BODY_CLASS', false);
}

// set post class handling to WP post_class()
// If you set this to TRUE, Thematic will use thematic_post_class instead
if (!defined('THEMATIC_COMPATIBLE_POST_CLASS')) {
	define('THEMATIC_COMPATIBLE_POST_CLASS', false);
}
// which comment form should be used
if (!defined('THEMATIC_COMPATIBLE_COMMENT_FORM')) {
	if (function_exists('comment_form')) {
		define('THEMATIC_COMPATIBLE_COMMENT_FORM', false); // WordPress 3.0
	} else {
		define('THEMATIC_COMPATIBLE_COMMENT_FORM', true); // below WordPress 3.0
	}
}

// Check for WordPress mu or WordPress 3.0
define('THEMATIC_MB', function_exists('get_blog_option'));

// Create the feedlinks
if (!(THEMATIC_COMPATIBLE_FEEDLINKS)) {
	add_theme_support( 'automatic-feed-links' );
}

// Check for WordPress 2.9 add_theme_support()
if ( apply_filters( 'thematic_post_thumbs', TRUE) ) {
	if ( function_exists( 'add_theme_support' ) )
	add_theme_support( 'post-thumbnails' );
}

// Load jQuery
wp_enqueue_script('jquery');

// Path constants
define('THEMELIB', TEMPLATEPATH . '/library');

// Create Theme Options Page
require_once(THEMELIB . '/extensions/theme-options.php');

// Load legacy functions
require_once(THEMELIB . '/legacy/deprecated.php');

// Load widgets
require_once(THEMELIB . '/extensions/widgets.php');

// Load custom header extensions
require_once(THEMELIB . '/extensions/header-extensions.php');

// Load custom content filters
require_once(THEMELIB . '/extensions/content-extensions.php');

// Load custom Comments filters
require_once(THEMELIB . '/extensions/comments-extensions.php');
 
// Load custom discussion filters
require_once(THEMELIB . '/extensions/discussion-extensions.php');

// Load custom Widgets
require_once(THEMELIB . '/extensions/widgets-extensions.php');

// Load the Comments Template functions and callbacks
require_once(THEMELIB . '/extensions/discussion.php');

// Load custom sidebar hooks
require_once(THEMELIB . '/extensions/sidebar-extensions.php');

// Load custom footer hooks
require_once(THEMELIB . '/extensions/footer-extensions.php');

// Add Dynamic Contextual Semantic Classes
require_once(THEMELIB . '/extensions/dynamic-classes.php');

// Need a little help from our helper functions
require_once(THEMELIB . '/extensions/helpers.php');

// Load shortcodes
require_once(THEMELIB . '/extensions/shortcodes.php');

// Adds filters for the description/meta content in archives.php
add_filter( 'archive_meta', 'wptexturize' );
add_filter( 'archive_meta', 'convert_smilies' );
add_filter( 'archive_meta', 'convert_chars' );
add_filter( 'archive_meta', 'wpautop' );

// Remove the WordPress Generator - via http://blog.ftwr.co.uk/archives/2007/10/06/improving-the-wordpress-generator/
function thematic_remove_generators() { return ''; }
if (apply_filters('thematic_hide_generators', TRUE)) {  
    add_filter('the_generator','thematic_remove_generators');
}

// Translate, if applicable
load_theme_textdomain('thematic', THEMELIB . '/languages');

$locale = get_locale();
$locale_file = THEMELIB . "/languages/$locale.php";
if ( is_readable($locale_file) )
	require_once($locale_file);


?>