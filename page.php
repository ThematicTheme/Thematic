<?php get_header() ?>

	<div id="container">
		<div id="content">

<?php get_sidebar('page-top') ?>

<?php the_post() ?>
			<div id="post-<?php the_ID(); ?>" class="<?php thematic_post_class() ?>">
    			<?php thematic_postheader(); ?>
				<div class="entry-content">
<?php the_content() ?>

<?php wp_link_pages("\t\t\t\t\t<div class='page-link'>".__('Pages: ', 'thematic'), "</div>\n", 'number'); ?>

<?php edit_post_link(__('Edit', 'thematic'),'<span class="edit-link">','</span>') ?>

				</div>
			</div><!-- .post -->

<?php if ( get_post_custom_values('comments') ) comments_template('', true) // Add a key+value of "comments" to enable comments on this page ?>

<?php get_sidebar('page-bottom') ?>

		</div><!-- #content -->
	</div><!-- #container -->

<?php thematic_sidebar() ?>
<?php get_footer() ?>