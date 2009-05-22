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

<?php the_post() ?>

<?php thematic_page_title() ?>

<?php rewind_posts() ?>

			<?php thematic_navigation_above();?>

<?php thematic_archiveloop() ?>

			<?php thematic_navigation_below();?>

		</div><!-- #content .hfeed -->
	</div><!-- #container -->

<?php thematic_sidebar() ?>
<?php get_footer() ?>