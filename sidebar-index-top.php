<?php if ( is_sidebar_active('index-top') ) { // there is active widgets for this sidebar
    echo '<div id="index-top" class="aside">'. "\n" . '<ul class="xoxo">' . "\n";
    dynamic_sidebar('index-top');
    echo '</ul>' . "\n" . '</div><!-- #index-top .aside -->'. "\n";
} ?>