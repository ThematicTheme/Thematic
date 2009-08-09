<?php thematic_abovesubasides() ?>

    <?php if ( is_sidebar_active('1st-subsidiary-aside') || is_sidebar_active('2nd-subsidiary-aside') || is_sidebar_active('3rd-subsidiary-aside') ) { // one of the subsidiary asides has a widget ?>
    <div id="subsidiary">
    
		<?php thematic_before_first_sub() ?>
    		
		<?php widget_area_1st_subsidiary_aside() ?>
        
        <?php thematic_between_firstsecond_sub() ?>
		
		<?php widget_area_2nd_subsidiary_aside() ?>
        
        <?php thematic_between_secondthird_sub() ?>
   
        <?php widget_area_3rd_subsidiary_aside() ?>       
        
        <?php thematic_after_third_sub() ?> 
        
    </div><!-- #subsidiary -->
    <?php } ?>


<?php thematic_belowsubasides() ?>
