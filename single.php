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
			<div id="nav-above" class="navigation">
				<div class="nav-previous"><?php thematic_previous_post_link() ?></div>
				<div class="nav-next"><?php thematic_next_post_link() ?></div>
			</div>

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

			<div id="nav-below" class="navigation">
				<div class="nav-previous"><?php thematic_previous_post_link() ?></div>
				<div class="nav-next"><?php thematic_next_post_link() ?></div>
			</div>

<?php comments_template('', true); ?>

<?php get_sidebar('single-bottom') ?>

		</div><!-- #content -->
	</div><!-- #container -->

<?php thematic_sidebar() ?>
<?php get_footer() ?>
