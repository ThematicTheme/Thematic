<?php thematic_abovemainasides(); ?>

<?php if (is_sidebar_active('primary-aside')) { ?>
	<div id="primary" class="aside main-aside">
		<ul class="xoxo">
	<?php dynamic_sidebar('primary-aside'); ?>
		</ul>
	</div><!-- #primary .aside -->
<?php } ?>		

<?php thematic_betweenmainasides(); ?>

<?php if (is_sidebar_active('secondary-aside')) { ?>
	<div id="secondary" class="aside main-aside">
		<ul class="xoxo">
<?php dynamic_sidebar('secondary-aside') ?>
		</ul>
	</div><!-- #secondary .aside -->
<?php } ?>		
	
<?php thematic_belowmainasides(); ?>