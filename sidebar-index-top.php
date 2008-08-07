<?php if ( function_exists('dynamic_sidebar') && is_sidebar_active(6) ) { // there is active widgets for this sidebar
    echo '<div id="index-top" class="aside">'. "\n" . '<ul class="xoxo">' . "\n";
    dynamic_sidebar(6);
    echo '</ul>' . "\n" . '</div><!-- #index-top .aside -->'. "\n";
} ?>