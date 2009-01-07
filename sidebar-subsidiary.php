<?php if ( function_exists('dynamic_sidebar') ) { ?>
    <?php if ( is_sidebar_active('1st-subsidiary-aside') || is_sidebar_active('2nd-subsidiary-aside') || is_sidebar_active('3rd-subsidiary-aside') ) { // one of the subsidiary asides has a widget ?>
    <div id="subsidiary">
    
        <?php if ( function_exists('dynamic_sidebar') && is_sidebar_active('1st-subsidiary-aside') ) { // there are active widgets for this aside
            echo '<div id="first" class="aside sub-aside">'. "\n" . '<ul class="xoxo">' . "\n";
            dynamic_sidebar('1st-subsidiary-aside');
            echo '</ul>' . "\n" . '</div><!-- #first .aside -->'. "\n";
        } ?>                
    
        <?php if ( function_exists('dynamic_sidebar') && is_sidebar_active('2nd-subsidiary-aside') ) { // there are active widgets for this aside
            echo '<div id="second" class="aside sub-aside">'. "\n" . '<ul class="xoxo">' . "\n";
            dynamic_sidebar('2nd-subsidiary-aside');
            echo '</ul>' . "\n" . '</div><!-- #second .aside -->'. "\n";
        } ?>       
   
        <?php if ( function_exists('dynamic_sidebar') && is_sidebar_active('3rd-subsidiary-aside') ) { // there are active widgets for this aside
            echo '<div id="third" class="aside sub-aside">'. "\n" . '<ul class="xoxo">' . "\n";
            dynamic_sidebar('3rd-subsidiary-aside');
            echo '</ul>' . "\n" . '</div><!-- #third .aside -->'. "\n";
        } ?>        
        
    </div><!-- #subsidiary -->
    <?php } ?>
<?php } ?>