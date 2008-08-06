<?php if ( function_exists('dynamic_sidebar') && is_sidebar_active(9) ) { // there is active widgets for this sidebar
    echo '<div id="single-top" class="aside">'.PHP_EOL;
    dynamic_sidebar(9);
    echo '</div><!-- #single-top .aside -->'.PHP_EOL;
} ?>