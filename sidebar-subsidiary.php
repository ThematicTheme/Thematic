<?php if ( function_exists('dynamic_sidebar') ) { ?>
    <?php if ( is_sidebar_active('1st Subsidiary Aside') || is_sidebar_active('2nd Subsidiary Aside') || is_sidebar_active('3rd Subsidiary Aside') ) { // one of the subsidiary asides has a widget ?>
    <div id="subsidiary">
    
        <?php if ( function_exists('dynamic_sidebar') && is_sidebar_active('1st Subsidiary Aside') ) { // there are active widgets for this aside
            echo '<div id="first" class="aside sub-aside">'. "\n" . '<ul class="xoxo">' . "\n";
            dynamic_sidebar('1st Subsidiary Aside');
            echo '</ul>' . "\n" . '</div><!-- #first .aside -->'. "\n";
        } ?>                
    
        <?php if ( function_exists('dynamic_sidebar') && is_sidebar_active('2nd Subsidiary Aside') ) { // there are active widgets for this aside
            echo '<div id="second" class="aside sub-aside">'. "\n" . '<ul class="xoxo">' . "\n";
            dynamic_sidebar('2nd Subsidiary Aside');
            echo '</ul>' . "\n" . '</div><!-- #second .aside -->'. "\n";
        } ?>       
   
        <?php if ( function_exists('dynamic_sidebar') && is_sidebar_active('3rd Subsidiary Aside') ) { // there are active widgets for this aside
            echo '<div id="third" class="aside sub-aside">'. "\n" . '<ul class="xoxo">' . "\n";
            dynamic_sidebar('3rd Subsidiary Aside');
            echo '</ul>' . "\n" . '</div><!-- #third .aside -->'. "\n";
        } ?>        
        
    </div><!-- #subsidiary -->
    <?php } ?>
<?php } ?>