<?php if ( function_exists('dynamic_sidebar') ) { ?>
    <?php if ( is_sidebar_active(3) || is_sidebar_active(4) || is_sidebar_active(5) ) { // one of the subsidiary asides has a widget ?>
    <div id="subsidiary">
    
        <?php if ( function_exists('dynamic_sidebar') && is_sidebar_active(3) ) { // there are active widgets for this aside
            echo '<div id="first" class="aside sub-aside">'. "\n" . '<ul class="xoxo">' . "\n";
            dynamic_sidebar(3);
            echo '</ul>' . "\n" . '</div><!-- #first .aside -->'. "\n";
        } ?>                
    
        <?php if ( function_exists('dynamic_sidebar') && is_sidebar_active(4) ) { // there are active widgets for this aside
            echo '<div id="second" class="aside sub-aside">'. "\n" . '<ul class="xoxo">' . "\n";
            dynamic_sidebar(4);
            echo '</ul>' . "\n" . '</div><!-- #second .aside -->'. "\n";
        } ?>       
   
        <?php if ( function_exists('dynamic_sidebar') && is_sidebar_active(5) ) { // there are active widgets for this aside
            echo '<div id="third" class="aside sub-aside">'. "\n" . '<ul class="xoxo">' . "\n";
            dynamic_sidebar(5);
            echo '</ul>' . "\n" . '</div><!-- #third .aside -->'. "\n";
        } ?>        
        
    </div><!-- #subsidiary -->
    <?php } ?>
<?php } ?>