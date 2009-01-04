<?php if ( function_exists('dynamic_sidebar') && is_sidebar_active('Single Bottom') ) { // there is active widgets for this sidebar
    echo '<div id="single-bottom" class="aside">'. "\n" . '<ul class="xoxo">' . "\n";
    dynamic_sidebar('Single Bottom');
    echo '</ul>' . "\n" . '</div><!-- #single-bottom .aside -->'. "\n";
} ?>