<?php if ( function_exists('dynamic_sidebar') && is_sidebar_active('Index Insert') ) { // there is active widgets for this sidebar
    echo '<div id="index-insert" class="aside">'. "\n" . '<ul class="xoxo">' . "\n";
    dynamic_sidebar('Index Insert');
    echo '</ul>' . "\n" . '</div><!-- #index-insert .aside -->'. "\n";
} ?>