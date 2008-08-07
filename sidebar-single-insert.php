<?php if ( function_exists('dynamic_sidebar') && is_sidebar_active(10) ) { // there is active widgets for this sidebar
    echo '<div id="single-insert" class="aside">'. "\n" . '<ul class="xoxo">' . "\n";
    dynamic_sidebar(10);
    echo '</ul>' . "\n" . '</div><!-- #single-insert .aside -->' . "\n";
} ?>