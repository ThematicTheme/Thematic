<?php if ( function_exists('dynamic_sidebar') && is_sidebar_active(10) ) { // there is active widgets for this sidebar
    echo '<div id="single-insert" class="aside">'.PHP_EOL;
    dynamic_sidebar(10);
    echo '</div><!-- #single-insert .aside -->'.PHP_EOL;
} ?>