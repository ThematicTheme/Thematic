<?php

function thematic_head_scripts() {
// Load scripts for the jquery Superfish plugin http://users.tpg.com.au/j_birch/plugins/superfish/#examples

    $scriptdir_start = '    <script type="text/javascript" src="';
    $scriptdir_start .= get_bloginfo('template_directory');
    $scriptdir_start .= '/library/scripts/';
    
    $scriptdir_end = '"></script>';
    
    $scripts = "\n";
    $scripts .= $scriptdir_start . 'hoverIntent.js' . $scriptdir_end . "\n";
    $scripts .= $scriptdir_start . 'superfish.js' . $scriptdir_end . "\n";
    $scripts .= $scriptdir_start . 'supersubs.js' . $scriptdir_end . "\n";
    $dropdown_options = $scriptdir_start . 'thematic-dropdowns.js' . $scriptdir_end . "\n";
    
    $scripts = $scripts . apply_filters('thematic_dropdown_options', $dropdown_options);

    // Print filtered scripts
    print apply_filters('thematic_head_scripts', $scripts);

}
add_action('wp_head','thematic_head_scripts');

?>