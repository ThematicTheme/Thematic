<?php

// load jQuery
wp_enqueue_script('jquery');

// Path constants
define('THEMELIB', TEMPLATEPATH . '/library');

// Create Theme Options Page
require_once(THEMELIB . '/functions/theme-options.php');

// Load widgets
require_once(THEMELIB . '/functions/widgets.php');

// Add Dynamic Contextual Semantic Classes
require_once(THEMELIB . '/functions/sandbox-functions.php');

// Get the page number
require_once(THEMELIB . '/functions/page-numbers.php');

// Produces an avatar image with the hCard-compliant photo class for author info
require_once(THEMELIB . '/functions/author-info-avatar.php');

// Translate, if applicable
load_theme_textdomain('thematic');

?>