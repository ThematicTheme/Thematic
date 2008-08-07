<?php if ( function_exists('dynamic_sidebar') && is_sidebar_active(13) ) { // there is active widgets for this sidebar
    echo '<div id="page-bottom" class="aside">'. "\n" . '<ul class="xoxo">' . "\n";
    dynamic_sidebar(13);
    echo '</ul>' . "\n" . '</div><!-- #page-bottom .aside -->'. "\n";
} ?>