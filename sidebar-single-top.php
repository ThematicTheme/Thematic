<?php if ( function_exists('dynamic_sidebar') && is_sidebar_active(9) ) { // there is active widgets for this sidebar
    echo '<div id="single-top" class="aside">'. "\n" . '<ul class="xoxo">' . "\n";
    dynamic_sidebar(9);
    echo '</ul>' . "\n" . '</div><!-- #single-top .aside -->' . "\n";
} ?>