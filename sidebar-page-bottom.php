<?php if ( function_exists('dynamic_sidebar') && is_sidebar_active(13) ) { // there is active widgets for this sidebar
    echo '<div id="page-bottom" class="aside">'.PHP_EOL;
    dynamic_sidebar(13);
    echo '</div><!-- #page-bottom .aside -->'.PHP_EOL;
} ?>