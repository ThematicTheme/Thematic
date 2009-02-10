<?php

$themeData = get_theme_data(TEMPLATEPATH . '/style.css');
define('THEMENAME', $themeData['Title']);

$cur=(STYLESHEETPATH . '/style.css');
$localhost=strstr($cur, 'localhost');
$ct=get_theme_data($cur);
define('TEMPLATENAME', $ct['Title']);

// load jQuery
wp_enqueue_script('jquery');

// Path constants
define('THEMELIB', TEMPLATEPATH . '/library');

// Create Theme Options Page
require_once(THEMELIB . '/extensions/theme-options.php');

// Get the page number
require_once(THEMELIB . '/extensions/page-numbers.php');

// Load widgets
require_once(THEMELIB . '/extensions/widgets.php');

// Load custom theme hooks and filters
require_once(THEMELIB . '/extensions/hooks-filters.php');

// Load custom actions
require_once(THEMELIB . '/extensions/actions.php');

// Start custom actions
require_once(THEMELIB . '/extensions/launcher.php');

// Load the Comments Template functions and callbacks
require_once(THEMELIB . '/extensions/discussion.php');

// Add Dynamic Contextual Semantic Classes
require_once(THEMELIB . '/extensions/dynamic-classes.php');

// Need a little help from our helper functions
require_once(THEMELIB . '/extensions/helpers.php');

// Produces an avatar image with the hCard-compliant photo class for author info
require_once(THEMELIB . '/extensions/author-info-avatar.php');

// Adds filters for the description/meta content in archives.php
add_filter( 'archive_meta', 'wptexturize' );
add_filter( 'archive_meta', 'convert_smilies' );
add_filter( 'archive_meta', 'convert_chars' );
add_filter( 'archive_meta', 'wpautop' );

// Remove the WordPress Generator – via http://blog.ftwr.co.uk/archives/2007/10/06/improving-the-wordpress-generator/
function thematic_remove_generators() { return ''; }  
add_filter('the_generator','thematic_remove_generators');

// Load the dropdown scripts
require_once(THEMELIB . '/extensions/dropdown.php');

// Translate, if applicable
load_theme_textdomain('thematic');

?>