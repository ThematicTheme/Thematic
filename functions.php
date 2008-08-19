<?php

// load jQuery
wp_enqueue_script('jquery');

// Path constants
define('THEMELIB', TEMPLATEPATH . '/library');

// Create Theme Options Page
require_once(THEMELIB . '/functions/theme-options.php');

// Create Theme Guide
require_once(THEMELIB . '/functions/theme-guide.php');

// Get the page number
require_once(THEMELIB . '/functions/page-numbers.php');

// Load widgets
require_once(THEMELIB . '/functions/widgets.php');

// Load custom theme hooks and filters
require_once(THEMELIB . '/functions/hooks-filters.php');

// Add Dynamic Contextual Semantic Classes
require_once(THEMELIB . '/functions/sandbox-functions.php');

// Produces an avatar image with the hCard-compliant photo class for author info
require_once(THEMELIB . '/functions/author-info-avatar.php');

// Translate, if applicable
// I'll be hunting down and merging Thematic and The Sandbox
// if only for the sake of our sanity
load_theme_textdomain('thematic');
load_theme_textdomain('sandbox');

// Remove the WordPress Generator – via http://blog.ftwr.co.uk/archives/2007/10/06/improving-the-wordpress-generator/
function thematic_remove_generators() { return ''; }  
add_filter('the_generator','thematic_remove_generators');

?>