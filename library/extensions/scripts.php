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
    
    $scripts .= <<<EOD
    <script type="text/javascript">
    jQuery.noConflict();
    jQuery(document).ready(function(){ 
        jQuery("ul.sf-menu").supersubs({ 
            minWidth:    12,                                // minimum width of sub-menus in em units 
            maxWidth:    27,                                // maximum width of sub-menus in em units 
            extraWidth:  1                                  // extra width can ensure lines don't sometimes turn over 
                                                            // due to slight rounding differences and font-family 
        }).superfish({ 
            delay:       100,                               // delay on mouseout 
            animation:   {opacity:'show',height:'show'},    // fade-in and slide-down animation 
            speed:       'fast',                            // faster animation speed 
            autoArrows:  false,                             // disable generation of arrow mark-up 
            dropShadows: false                              // disable drop shadows 
        }); 
    });
    </script>
    
EOD;

    // Print filtered scripts
    print apply_filters('thematic_head_scripts', $scripts);

}
add_action('wp_head','thematic_head_scripts');

?>