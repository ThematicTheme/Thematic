<?php if ( function_exists('dynamic_sidebar') && is_sidebar_active('index-insert') ) { // there is active widgets for this sidebar
    echo '<div id="index-insert" class="aside">'. "\n" . '<ul class="xoxo">' . "\n";
    dynamic_sidebar('index-insert');
    echo '</ul>' . "\n" . '</div><!-- #index-insert .aside -->'. "\n";
} ?>