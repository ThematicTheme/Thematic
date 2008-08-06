<?php if ( function_exists('dynamic_sidebar') && is_sidebar_active(6) ) { // there is active widgets for this sidebar
    echo '<div id="index-top" class="aside">'.PHP_EOL;
    dynamic_sidebar(6);
    echo '</div><!-- #index-top .aside -->'.PHP_EOL;
} ?>