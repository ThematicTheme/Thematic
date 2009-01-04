<?php if ( function_exists('dynamic_sidebar') && is_sidebar_active('Page Bottom') ) { // there is active widgets for this sidebar
    echo '<div id="page-bottom" class="aside">'. "\n" . '<ul class="xoxo">' . "\n";
    dynamic_sidebar('Page Bottom');
    echo '</ul>' . "\n" . '</div><!-- #page-bottom .aside -->'. "\n";
} ?>