<?php if ( function_exists('dynamic_sidebar') && is_sidebar_active(12) ) { // there is active widgets for this sidebar
    echo '<div id="page-top" class="aside">'.PHP_EOL;
    dynamic_sidebar(12);
    echo '</div><!-- #page-top .aside -->'.PHP_EOL;
} ?>