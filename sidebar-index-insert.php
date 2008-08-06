<?php if ( function_exists('dynamic_sidebar') && is_sidebar_active(7) ) { // there is active widgets for this sidebar
    echo '<div id="index-insert" class="aside">'.PHP_EOL;
    dynamic_sidebar(7);
    echo '</div><!-- #index-insert .aside -->'.PHP_EOL;
} ?>