<?php if ( function_exists('dynamic_sidebar') && is_sidebar_active(12) ) { // there is active widgets for this sidebar
    echo '<div id="page-top" class="aside">'. "\n" . '<ul class="xoxo">' . "\n";
    dynamic_sidebar(12);
    echo '</ul>' . "\n" . '</div><!-- #page-top .aside -->'. "\n";
} ?>