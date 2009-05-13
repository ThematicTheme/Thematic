<?php @header("HTTP/1.1 404 Not found", TRUE, 404); ?>
<?php get_header() ?>

	<div id="container">
		<div id="content">

			<div id="post-0" class="post error404">
			
			<?php thematic_404() ?>
			
			</div><!-- .post -->

		</div><!-- #content -->
	</div><!-- #container -->

<?php thematic_sidebar() ?>
<?php get_footer() ?>