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

<?php get_sidebar('index-top') ?>

			<div id="nav-above" class="navigation">
                <?php if(function_exists('wp_pagenavi')) { ?>
                <?php wp_pagenavi(); ?>
                <?php } else { ?>  
				<div class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">&laquo;</span> Older posts', 'thematic')) ?></div>
				<div class="nav-next"><?php previous_posts_link(__('Newer posts <span class="meta-nav">&raquo;</span>', 'thematic')) ?></div>
				<?php } ?>
			</div>
			

<?php $count = 1 ?>
<?php while ( have_posts() ) : the_post() ?>

			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
				<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php printf(__('Permalink to %s', 'thematic'), wp_specialchars(get_the_title(), 1)) ?>" rel="bookmark"><?php the_title() ?></a></h2>
				<div class="entry-meta">
                    <?php /* if default setting of no author link */ if($thm_authorlink == 'false') { ?>
                    					<span class="author vcard"><?php $author = get_the_author(); ?><?php _e('By ') ?><span class="fn n"><?php _e("$author") ?></span></span>
                    <?php /* else show a link to the author page */ } else { ?>	
                                        <span class="author vcard"><?php printf(__('By %s', 'thematic'), '<a class="url fn n" href="'.get_author_link(false, $authordata->ID, $authordata->user_nicename).'" title="' . sprintf(__('View all posts by %s', 'thematic'), $authordata->display_name) . '">'.get_the_author().'</a>') ?></span>
                    <?php } ?>				    
					<span class="meta-sep">|</span>
    				<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><?php unset($previousday); printf(__('%1$s', 'sandbox'), the_date('', '', '', false), get_the_time()) ?></abbr></span>
				</div><!-- .entry-meta -->
				<div class="entry-content">
<?php the_content(''.__('Read More <span class="meta-nav">&raquo;</span>', 'thematic').''); ?>

				<?php wp_link_pages('before=<div class="page-link">' .__('Pages:', 'thematic') . '&after=</div>') ?>
				</div>
				<div class="entry-utility">
					<span class="comments-link"><?php comments_popup_link(__('Leave a comment', 'thematic'), __('1 Comment', 'thematic'), __('% Comments', 'thematic')) ?></span>
                    <?php edit_post_link(__('Edit', 'thematic'), "\t\t\t\t\t<span class=\"meta-sep\">|</span>\n<span class=\"edit-link\">", "</span>\t\t\t\t\t"); ?>
				</div><!-- .entry-utility -->
			</div><!-- .post -->

<?php comments_template() ?>

<?php if ($count==$thm_insert_position) { ?><?php get_sidebar('index-insert') ?><?php } ?>
<?php $count = $count + 1; ?>
<?php endwhile ?>

			<div id="nav-below" class="navigation">
                <?php if(function_exists('wp_pagenavi')) { ?>
                <?php wp_pagenavi(); ?>
                <?php } else { ?>  
				<div class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">&laquo;</span> Older posts', 'thematic')) ?></div>
				<div class="nav-next"><?php previous_posts_link(__('Newer posts <span class="meta-nav">&raquo;</span>', 'thematic')) ?></div>
				<?php } ?>
			</div>

<?php get_sidebar('index-bottom') ?>

		</div><!-- #content -->
	</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>