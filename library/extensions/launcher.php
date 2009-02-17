<?php
add_action('thematic_head', 'thematic_head_create_head', 1);
add_action('thematic_head', 'thematic_head_create_title', 2);
add_action('thematic_head', 'thematic_head_create_contenttype', 3);
add_action('thematic_head', 'thematic_head_create_description', 4);
add_action('thematic_head', 'thematic_head_create_robots', 5);
add_action('thematic_head', 'thematic_head_create_stylesheet', 6);
add_action('thematic_head', 'thematic_head_create_rss', 7);
add_action('thematic_head', 'thematic_head_create_pingback', 8);
add_action('thematic_head', 'thematic_head_create_commentreply', 9);
add_action('thematic_head','thematic_head_scripts', 10);
?>
