<?php thematic_abovesingletop() ?>

<?php if ( is_sidebar_active('single-top') ) { // there is active widgets for this sidebar
    echo '<div id="single-top" class="aside">'. "\n" . '<ul class="xoxo">' . "\n";
    dynamic_sidebar('single-top');
    echo '</ul>' . "\n" . '</div><!-- #single-top .aside -->' . "\n";
} ?>

<?php thematic_belowsingletop() ?>
