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

			<h2 class="page-title"><a href="<?php echo get_permalink($post->post_parent) ?>" rev="attachment"><span class="meta-nav">&laquo; </span><?php echo get_the_title($post->post_parent) ?></a></h2>
			<div id="post-<?php the_ID(); ?>" class="<?php thematic_post_class() ?>">
    			<?php thematic_postheader(); ?>
				<div class="entry-content">
					<div class="entry-attachment"><?php the_attachment_link($post->post_ID, true) ?></div>
<?php the_content(''.__('Read More <span class="meta-nav">&raquo;</span>', 'thematic').''); ?>

					<?php wp_link_pages('before=<div class="page-link">' .__('Pages:', 'thematic') . '&after=</div>') ?>
				</div>
				<?php thematic_postfooter(); ?>
			</div><!-- .post -->

<?php comments_template(); ?>

		</div><!-- #content -->
	</div><!-- #container -->

<?php thematic_sidebar() ?>
<?php get_footer() ?>