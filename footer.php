<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; }
    else { $$value['id'] = get_settings( $value['id'] ); }
    }
?>
    </div><!-- #main -->
    
<?php thematic_abovefooter(); ?>    

	<div id="footer">
        <?php get_sidebar('subsidiary'); ?>
        <div id="siteinfo">        
    		<?php /* footer text set in theme options */ echo do_shortcode(__(stripslashes(thematic_footertext($thm_footertext)), 'thematic')); ?>
		</div><!-- #siteinfo -->
	</div><!-- #footer -->
	
<?php thematic_belowfooter(); ?>  

</div><!-- #wrapper .hfeed -->

<?php wp_footer() ?>

<?php thematic_after(); ?>
</body>
</html>