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

			<?php thematic_navigation_above();?>
			
<?php get_sidebar('index-top') ?>

<?php thematic_above_indexloop() ?>

<?php /* Count the number of posts so we can insert a widgetized area */ $count = 1 ?>
<?php while ( have_posts() ) : the_post() ?>

			<div id="post-<?php the_ID() ?>" class="<?php thematic_post_class() ?>">
    			<?php thematic_postheader(); ?>
				<div class="entry-content">
<?php thematic_content(); ?>

				<?php wp_link_pages('before=<div class="page-link">' .__('Pages:', 'thematic') . '&after=</div>') ?>
				</div>
				<?php thematic_postfooter(); ?>
			</div><!-- .post -->

<?php comments_template() ?>

<?php if ($count==$thm_insert_position) { ?><?php get_sidebar('index-insert') ?><?php } ?>
<?php $count = $count + 1; ?>
<?php endwhile ?>

<?php thematic_below_indexloop() ?>

<?php get_sidebar('index-bottom') ?>

			<?php thematic_navigation_below();?>

		</div><!-- #content -->
	</div><!-- #container -->

<?php thematic_sidebar() ?>
<?php get_footer() ?>