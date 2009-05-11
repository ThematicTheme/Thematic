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
			<div id="post-<?php the_ID(); ?>" class="<?php thematic_post_class() ?>">
    			<?php thematic_postheader(); ?>
				<div class="entry-content">
					<div class="entry-attachment"><?php the_attachment_link($post->post_ID, true) ?></div>
<?php the_content(more_text()); ?>

					<?php wp_link_pages('before=<div class="page-link">' .__('Pages:', 'thematic') . '&after=</div>') ?>
				</div>
				<?php thematic_postfooter(); ?>
			</div><!-- .post -->

<?php comments_template(); ?>

		</div><!-- #content -->
	</div><!-- #container -->

<?php thematic_sidebar() ?>
<?php get_footer() ?>