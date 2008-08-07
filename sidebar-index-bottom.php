<?php if ( function_exists('dynamic_sidebar') && is_sidebar_active(8) ) { // there is active widgets for this sidebar
    echo '<div id="index-bottom" class="aside">'. "\n" . '<ul class="xoxo">' . "\n";
    dynamic_sidebar(8);
    echo '</ul>' . "\n" . '</div><!-- #index-bottom .aside -->'. "\n";
} ?>