<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; }
    else { $$value['id'] = get_settings( $value['id'] ); }
    }
?>
    </div><!-- #center -->

	<div id="footer">
        <?php get_sidebar('footer-columns'); ?>
        <div id="site-info">        
    		<p><?php /* footer text set in theme options */ echo stripslashes($thm_footertext); ?></p>
		</div><!-- #site-info -->
	</div><!-- #footer -->

</div><!-- #wrapper .hfeed -->

<?php wp_footer() ?>

</body>
</html>