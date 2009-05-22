<?php
global $options;
foreach ($options as $value) {
    if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; }
    else { $$value['id'] = get_option( $value['id'] ); }
    }
?>
<?php get_header() ?>
	
	<div id="container">
		<div id="content">

	<?php thematic_page_title() ?>

			<?php thematic_navigation_above();?>
			
<?php thematic_above_tagloop() ?>			

<?php thematic_tagloop() ?>

<?php thematic_below_tagloop() ?>			

			<?php thematic_navigation_below();?>

		</div><!-- #content -->
	</div><!-- #container -->

<?php thematic_sidebar() ?>
<?php get_footer() ?>
