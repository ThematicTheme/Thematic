<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; }
    else { $$value['id'] = get_settings( $value['id'] ); }
    }
?>
<?php get_header() ?>

	<div id="container">
		<div id="content">

<?php the_post() ?>

<?php thematic_page_title() ?>

<?php rewind_posts() ?>

			<?php thematic_navigation_above();?>

<?php while ( have_posts() ) : the_post(); ?>

			<div id="post-<?php the_ID() ?>" class="<?php thematic_post_class() ?>">
    			<?php thematic_postheader(); ?>
				<div class="entry-content">
<?php thematic_content(); ?>

				</div>
				<?php thematic_postfooter(); ?>
			</div><!-- .post -->

<?php endwhile ?>

			<?php thematic_navigation_below();?>

		</div><!-- #content .hfeed -->
	</div><!-- #container -->

<?php thematic_sidebar() ?>
<?php get_footer() ?>