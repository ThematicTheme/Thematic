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

<?php the_post(); ?>
			<?php thematic_navigation_above();?>

<?php get_sidebar('single-top') ?>

			<div id="post-<?php the_ID(); ?>" class="<?php thematic_post_class(); ?>">
    			<?php thematic_postheader(); ?>
				<div class="entry-content">
<?php the_content(more_text()); ?>

					<?php wp_link_pages('before=<div class="page-link">' .__('Pages:', 'thematic') . '&after=</div>') ?>
				</div>
				<?php thematic_postfooter(); ?>
			</div><!-- .post -->
			
<?php get_sidebar('single-insert') ?>

			<?php thematic_navigation_below();?>

<?php comments_template('', true); ?>

<?php get_sidebar('single-bottom') ?>

		</div><!-- #content -->
	</div><!-- #container -->

<?php thematic_sidebar() ?>
<?php get_footer() ?>
