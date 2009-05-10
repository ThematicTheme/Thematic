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

		<h1 class="page-title"><?php _e('Category Archives:', 'thematic') ?> <span><?php echo single_cat_title(); ?></span></h1>
			<div class="archive-meta"><?php if ( !(''== category_description()) ) : echo apply_filters('archive_meta', category_description()); endif; ?></div>

			<?php thematic_navigation_above();?>
			
<?php thematic_above_categoryloop() ?>			

<?php while (have_posts()) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" class="<?php thematic_post_class(); ?>">
    			<?php thematic_postheader(); ?>
				<div class="entry-content">
<?php thematic_content(); ?>

				</div>
				<?php thematic_postfooter(); ?>
			</div><!-- .post -->

<?php endwhile; ?>

<?php thematic_below_categoryloop() ?>			

			<?php thematic_navigation_below();?>

		</div><!-- #content -->
	</div><!-- #container -->

<?php thematic_sidebar() ?>
<?php get_footer() ?>