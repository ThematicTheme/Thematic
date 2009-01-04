<?php if ( is_sidebar_active('Index Top') ) { // there is active widgets for this sidebar
    echo '<div id="index-top" class="aside">'. "\n" . '<ul class="xoxo">' . "\n";
    dynamic_sidebar('Index Top');
    echo '</ul>' . "\n" . '</div><!-- #index-top .aside -->'. "\n";
} ?>