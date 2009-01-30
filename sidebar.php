<?php thematic_abovemainasides(); ?>
	<div id="primary" class="aside main-aside">
		<ul class="xoxo">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('primary-aside') ) : // begin primary sidebar widgets ?>
			<li id="search">
				<h3><label for="s"><?php _e('Search', 'thematic') ?></label></h3>
				<form id="searchform" method="get" action="<?php bloginfo('home') ?>">
					<div>
						<input id="s" name="s" type="text" value="<?php echo wp_specialchars(stripslashes($_GET['s']), true) ?>" size="20" tabindex="1" />
						<input id="searchsubmit" name="searchsubmit" type="submit" value="<?php _e('Search', 'thematic') ?>" tabindex="2" />
					</div>
				</form>
			</li>

			<li id="pages">
				<h3><?php _e('Pages', 'thematic') ?></h3>
				<ul>
<?php wp_list_pages('title_li=&sort_column=post_title' ) ?>
				</ul>
			</li>

			<li id="categories">
				<h3><?php _e('Categories', 'thematic'); ?></h3>
				<ul>
<?php wp_list_categories('title_li=&show_count=0&hierarchical=1') ?> 

				</ul>
			</li>

			<li id="archives">
				<h3><?php _e('Archives', 'thematic') ?></h3>
				<ul>
<?php wp_get_archives('type=monthly') ?>

				</ul>
			</li>
<?php endif; // end primary sidebar widgets  ?>
		</ul>
	</div><!-- #primary .aside -->

<?php thematic_betweenmainasides(); ?>

	<div id="secondary" class="aside main-aside">
		<ul class="xoxo">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('secondary-aside') ) : // begin  secondary sidebar widgets ?>

<?php wp_list_bookmarks('title_before=<h3>&title_after=</h3>&show_images=1') ?>

			<li id="rss-links">
				<h3><?php _e('RSS Feeds', 'thematic') ?></h3>
				<ul>
					<li><a href="<?php bloginfo('rss2_url') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?> <?php _e('Posts RSS feed', 'thematic'); ?>" rel="alternate" type="application/rss+xml"><?php _e('All posts', 'thematic') ?></a></li>
					<li><a href="<?php bloginfo('comments_rss2_url') ?>" title="<?php echo wp_specialchars(bloginfo('name'), 1) ?> <?php _e('Comments RSS feed', 'thematic'); ?>" rel="alternate" type="application/rss+xml"><?php _e('All comments', 'thematic') ?></a></li>
				</ul>
			</li>

			<li id="meta">
				<h3><?php _e('Meta', 'thematic') ?></h3>
				<ul>
					<?php wp_register() ?>

					<li><?php wp_loginout() ?></li>
					<?php wp_meta() ?>

				</ul>
			</li>
<?php endif; // end secondary sidebar widgets  ?>
		</ul>
	</div><!-- #secondary .aside -->
	
<?php thematic_belowmainasides(); ?>