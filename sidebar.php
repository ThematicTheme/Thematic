<?php thematic_abovemainasides(); ?>

	<div id="primary" class="aside main-aside">
		<ul class="xoxo">
		
<?php if (!dynamic_sidebar('primary-aside') ) : // begin primary sidebar widgets ?>
<?php endif; // end primary sidebar widgets  ?>

		</ul>
	</div><!-- #primary .aside -->

<?php thematic_betweenmainasides(); ?>

	<div id="secondary" class="aside main-aside">
		<ul class="xoxo">

<?php if (!dynamic_sidebar('secondary-aside') ) : // begin  secondary sidebar widgets ?>
<?php endif; // end secondary sidebar widgets  ?>

		</ul>
	</div><!-- #secondary .aside -->
	
<?php thematic_belowmainasides(); ?>