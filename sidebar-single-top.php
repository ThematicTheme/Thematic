<?php if ( function_exists('dynamic_sidebar') && is_sidebar_active('Single Top') ) { // there is active widgets for this sidebar
    echo '<div id="single-top" class="aside">'. "\n" . '<ul class="xoxo">' . "\n";
    dynamic_sidebar('Single Top');
    echo '</ul>' . "\n" . '</div><!-- #single-top .aside -->' . "\n";
} ?>