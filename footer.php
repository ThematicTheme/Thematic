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
    		<?php /* footer text set in theme options */ echo stripslashes($thm_footertext); ?>
		</div><!-- #siteinfo -->
	</div><!-- #footer -->

</div><!-- #wrapper .hfeed -->

<?php wp_footer() ?>

</body>
</html>