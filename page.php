<?php get_header() ?>

	<div id="container">
<?php get_sidebar('page-top') ?>
		<div id="content">

<?php the_post() ?>
			<div id="post-<?php the_ID(); ?>" class="<?php sandbox_post_class() ?>">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="entry-content">
<?php the_content() ?>

<?php wp_link_pages("\t\t\t\t\t<div class='page-link'>".__('Pages: ', 'thematic'), "</div>\n", 'number'); ?>

<?php edit_post_link(__('Edit', 'thematic'),'<span class="edit-link">','</span>') ?>

				</div>
			</div><!-- .post -->

<?php if ( get_post_custom_values('comments') ) comments_template() // Add a key+value of "comments" to enable comments on this page ?>

		</div><!-- #content -->
<?php get_sidebar('page-bottom') ?>
	</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>