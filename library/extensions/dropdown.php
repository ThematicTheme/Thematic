<?php

// Load scripts for the jquery Superfish plugin
// http://users.tpg.com.au/j_birch/plugins/superfish/#examples
function thematic_superfish() { ?>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/scripts/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/scripts/hoverIntent.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/scripts/superfish.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/scripts/supersubs.js"></script>

<script type="text/javascript"> 
 
    $(document).ready(function(){ 
        $("ul.sf-menu").supersubs({ 
            delay:       0,                                 // one second delay on mouseout 
            animation:   {opacity:'show',height:'show'},    // fade-in and slide-down animation 
            speed:       'fast',                            // faster animation speed            
            minWidth:    12,                                // minimum width of sub-menus in em units 
            maxWidth:    27,                                // maximum width of sub-menus in em units 
            extraWidth:  1                                  // extra width can ensure lines don't sometimes turn over 
                                                            // due to slight rounding differences and font-family 
        }).superfish();
    });
 
</script>

<?php }

add_action('wp_head','thematic_superfish');

?>