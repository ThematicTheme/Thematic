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

<?php if (have_posts()) : ?>

		<h1 class="page-title"><?php _e('Search Results for:', 'thematic') ?> <span id="search-terms"><?php echo wp_specialchars(stripslashes($_GET['s']), true); ?></span></h1>

			<?php thematic_navigation_above();?>
			
<?php thematic_above_searchloop() ?>			

<?php while ( have_posts() ) : the_post(); ?>

			<div id="post-<?php the_ID() ?>" class="<?php thematic_post_class() ?>">
    			<?php thematic_postheader(); ?>
				<div class="entry-content">
<?php thematic_content(); ?>

				</div>
				<?php thematic_postfooter(); ?>
			</div><!-- .post -->

<?php endwhile; ?>

<?php thematic_below_searchloop() ?>			

			<?php thematic_navigation_below();?>

<?php else : ?>

			<div id="post-0" class="post noresults">
				<h1 class="entry-title"><?php _e('Nothing Found', 'thematic') ?></h1>
				<div class="entry-content">
					<p><?php _e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'thematic') ?></p>
				</div>
				<form id="noresults-searchform" method="get" action="<?php bloginfo('home') ?>">
					<div>
						<input id="noresults-s" name="s" type="text" value="<?php echo wp_specialchars(stripslashes($_GET['s']), true) ?>" size="40" />
						<input id="noresults-searchsubmit" name="searchsubmit" type="submit" value="<?php _e('Find', 'thematic') ?>" />
					</div>
				</form>
			</div><!-- .post -->

<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #container -->

<?php thematic_sidebar() ?>
<?php get_footer() ?>