    <div id="subsidiary">
    
        <?php if ( function_exists('dynamic_sidebar') && is_sidebar_active(3) ) { // there is active widgets for this sidebar
            echo '<div id="first" class="aside sub-aside">'.PHP_EOL;
            dynamic_sidebar(3);
            echo '</div><!-- #first .aside -->'.PHP_EOL;
        } ?>                
    
        <?php if ( function_exists('dynamic_sidebar') && is_sidebar_active(4) ) { // there is active widgets for this sidebar
            echo '<div id="second" class="aside sub-aside">'.PHP_EOL;
            dynamic_sidebar(4);
            echo '</div><!-- #second .aside -->'.PHP_EOL;
        } ?>       
   
        <?php if ( function_exists('dynamic_sidebar') && is_sidebar_active(5) ) { // there is active widgets for this sidebar
            echo '<div id="third" class="aside sub-aside">'.PHP_EOL;
            dynamic_sidebar(5);
            echo '</div><!-- #third .aside -->'.PHP_EOL;
        } ?>        
        
    </div><!-- #subsidiary -->
    