<?php if ( function_exists('dynamic_sidebar') && is_sidebar_active('page-bottom') ) { // there is active widgets for this sidebar
    echo '<div id="page-bottom" class="aside">'. "\n" . '<ul class="xoxo">' . "\n";
    dynamic_sidebar('page-bottom');
    echo '</ul>' . "\n" . '</div><!-- #page-bottom .aside -->'. "\n";
} ?>