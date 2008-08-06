<?php if ( function_exists('dynamic_sidebar') && is_sidebar_active(8) ) { // there is active widgets for this sidebar
    echo '<div id="index-bottom" class="aside">'.PHP_EOL;
    dynamic_sidebar(8);
    echo '</div><!-- #index-bottom .aside -->'.PHP_EOL;
} ?>