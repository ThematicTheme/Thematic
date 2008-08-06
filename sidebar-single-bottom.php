<?php if ( function_exists('dynamic_sidebar') && is_sidebar_active(11) ) { // there is active widgets for this sidebar
    echo '<div id="single-bottom" class="aside">'.PHP_EOL;
    dynamic_sidebar(11);
    echo '</div><!-- #single-bottom .aside -->'.PHP_EOL;
} ?>