<?php
/**
 * Content Extensions
 *
 * @package ThematicCoreLibrary
 * @subpackage ContentExtensions
 * @todo revisit docblock desciptions & tags
 */
 

/**
 * Register action hook: thematic_abovecontainer
 * 
 * Located in 404.php, archive.php, archives.php, attachement.php, author.php, category.php index.php, 
 * links.php, page.php, search.php, single.php, tag.php
 * Just between #main and #container
 */
function thematic_abovecontainer() {
    do_action('thematic_abovecontainer');
} // end thematic_abovecontainer


/**
 * Register action hook: thematic_abovecontent
 *
 * Located in 404.php, archive.php, archives.php, attachement.php, author.php, category.php index.php,
 * links.php, page.php, search.php, single.php, tag.php
 * Just between #main and #container
 */
function thematic_abovecontent() {
    do_action('thematic_abovecontent');
} // end thematic_abovecontent


/**
 * Register action hook: thematic_abovepost 
 *
 * Located in 404.php, archives.php, attachment.php, links.php, page.php, search.php and template-page-fullwidth.php
 * Just above #post
 */
function thematic_abovepost() {
    do_action('thematic_abovepost');
} // end thematic_abovepost


/**
 * Register action hook: thematic_archives 
 *
 * Located in archives.php
 * Just after the content
 */
function thematic_archives() {
	do_action('thematic_archives');
} // end thematic_archives


/**
 * Register action hook: thematic_navigation_above 
 *
 * Located in archive.php, author.php, category.php, index.php, search.php, single.php, tag.php
 * Just before the content
 */
function thematic_navigation_above() {
	do_action('thematic_navigation_above');
} // end thematic_navigation_above


/**
 * Register action hook: thematic_navigation_below 
 *
 * Located in archive.php, author.php, category.php, index.php, search.php, single.php, tag.php
 * Just after the content
 */
function thematic_navigation_below() {
	do_action('thematic_navigation_below');
} // end thematic_navigation_below


/**
 * Register action hook: thematic_above_indexloop 
 *
 * Located in index.php 
 * Just before the loop
 */
function thematic_above_indexloop() {
    do_action('thematic_above_indexloop');
} // end thematic_above_indexloop


/**
 * Register action hook: thematic_above_archiveloop 
 *
 * Located in archive.php 
 * Just before the loop
 */
function thematic_above_archiveloop() {
    do_action('thematic_above_archiveloop');
} // end thematic_above_archiveloop


/**
 * Register action hook: thematic_archiveloop 
 *
 * Located in archive.php
 * The Loop used on archive pages
 */
function thematic_archiveloop() {
	do_action('thematic_archiveloop');
} // end thematic_archiveloop


/**
 * Register action hook: thematic_authorloop 
 *
 * Located in author.pgp
 * The Loop used on author pages
 */
function thematic_authorloop() {
	do_action('thematic_authorloop');
} // end thematic_authorloop


/**
 * Register action hook: thematic_categoryloop 
 *
 * Located in category.php
 * The Loop used on category pages
 */
function thematic_categoryloop() {
	do_action('thematic_categoryloop');
} // end thematic_categoryloop


/**
 * Register action hook: thematic_indexloop 
 *
 * Located in index.php
 * The default loop
 */
function thematic_indexloop() {
	do_action('thematic_indexloop');
} // end thematic_indexloop


/**
 * Register action hook: thematic_searchloop 
 *
 * Located in search.php
 * The loop used on search result pages
 */
function thematic_searchloop() {
	do_action('thematic_searchloop');
} // end thematic_searchloop


/**
 * Register action hook: thematic_singlepost 
 *
 * Located in single.php
 * The Loop on single pages
 */
function thematic_singlepost() {
	do_action('thematic_singlepost');
} //end thematic_singlepost


/**
 * Register action hook: thematic_tagloop 
 *
 * Located in tag.php
 * The Loop on tag archive pages
 */
function thematic_tagloop() {
	do_action('thematic_tagloop');
} // end thematic_tagloop


/**
 * Register action hook: thematic_below_indexloop 
 *
 * Located in index.php
 * Just after the loop
 */
function thematic_below_indexloop() {
    do_action('thematic_below_indexloop');
} // end thematic_below_indexloop


/**
 * Register action hook: thematic_below_archiveloop 
 *
 * Located in archive.php
 * Just after the loop
 */
function thematic_below_archiveloop() {
    do_action('thematic_below_archiveloop');
} // end thematic_below_archiveloop


/**
 * Register action hook: thematic_above_categoryloop 
 *
 * Located in category.php
 * Just before the loop
 */
function thematic_above_categoryloop() {
    do_action('thematic_above_categoryloop');
} // end thematic_above_categoryloop


/**
 * Register action hook: thematic_below_categoryloop 
 *
 * Located in category.php
 * Just after the loop
 */
function thematic_below_categoryloop() {
    do_action('thematic_below_categoryloop');
} // end thematic_below_categoryloop


/**
 * Register action hook: thematic_above_searchloop 
 *
 * Located in search.php
 * Just before the loop
 */
function thematic_above_searchloop() {
    do_action('thematic_above_searchloop');
} // end thematic_above_searchloop


/**
 * Register action hook: thematic_below_searchloop 
 *
 * Located in search.php
 * Just after the loop
 */
function thematic_below_searchloop() {
    do_action('thematic_below_searchloop');
} // end thematic_below_searchloop


/**
 * Register action hook: thematic_above_tagloop 
 *
 * Located in tag.php
 * Just before the loop
 */
function thematic_above_tagloop() {
    do_action('thematic_above_tagloop');
} // end thematic_above_tagloop


/**
 * Register action hook: thematic_init 
 *
 * Located in tag.php
 * Just after the loop
 */
function thematic_below_tagloop() {
    do_action('thematic_below_tagloop');
} // end thematic_below_tagloop


/**
 * Register action hook: thematic_belowpost 
 *
 * Located in 404.php, archives.php, attachment.php, links.php, page.php, search.php and template-page-fullwidth.php
 * Just below #post
 */
function thematic_belowpost() {
    do_action('thematic_belowpost');
} // end thematic_belowpost


/**
 * Register action hook: thematic_belowcontent 
 *
 * Located in 404.php, archive.php, archives.php, attachement.php, author.php, category.php index.php, 
 * links.php, page.php, search.php, single.php, tag.php
 * Just below #content
 */
function thematic_belowcontent() {
    do_action('thematic_belowcontent');
} // end thematic_belowcontent


/**
 * Register action hook: thematic_belowcontainer 
 *
 * Located in 404.php, archive.php, archives.php, attachement.php, author.php, category.php index.php,
 * links.php, page.php, search.php, single.php, tag.php
 * Just below #container
 */
function thematic_belowcontainer() {
    do_action('thematic_belowcontainer');
} // end thematic_belowcontainer


if (function_exists('childtheme_override_page_title'))  {
	/**
	 * @ignore
	 */
	function thematic_page_title() {
		childtheme_override_page_title();
	}
} else {
	/**
	 * Create the page title.
	 * 
	 * Echoes the title of the webpage for specific queries. The markup is conditionally set using template tags.
	 * Located in templates: archive.php, attachement.php, author.php, category.php, search.php, tag.php
	 * 
	 * Override: childtheme_override_page_title <br>
	 * Filter: thematic_page_title 
	 * 
	 * @todo review and remove possiblity for displaying an empty div for archive-meta
	 */
	function thematic_page_title() {
		
		global $post;
		
		$content = "\t\t\t\t";
		if (is_attachment()) {
				$content .= '<h2 class="page-title"><a href="';
				$content .= apply_filters('the_permalink',get_permalink($post->post_parent));
				$content .= '" rev="attachment"><span class="meta-nav">&laquo; </span>';
				$content .= get_the_title($post->post_parent);
				$content .= '</a></h2>';
		} elseif (is_author()) {
				$content .= '<h1 class="page-title author">';
				$author = get_the_author_meta( 'display_name', $post->post_author );
				$content .= __('Author Archives:', 'thematic');
				$content .= ' <span>' . $author .'</span>';
				$content .= '</h1>';
		} elseif (is_category()) {
				$content .= '<h1 class="page-title">';
				$content .= __('Category Archives:', 'thematic');
				$content .= ' <span>' . single_cat_title('', FALSE) .'</span>';
				$content .= '</h1>' . "\n";
				$content .= "\n\t\t\t\t" . '<div class="archive-meta">';
				if ( !(''== category_description()) ) : $content .= apply_filters('archive_meta', category_description()); endif;
				$content .= '</div>';
		} elseif (is_search()) {
				$content .= '<h1 class="page-title">';
				$content .= __('Search Results for:', 'thematic');
				$content .= ' <span id="search-terms">' . get_search_query() .'</span>';
				$content .= '</h1>';
		} elseif (is_tag()) {
				$content .= '<h1 class="page-title">';
				$content .= __('Tag Archives:', 'thematic');
				$content .= ' <span>';
				$content .= single_tag_title( '', false );
				$content .= '</span></h1>';
		} elseif (is_tax()) {
			    global $taxonomy;
				$content .= '<h1 class="page-title">';
				$tax = get_taxonomy($taxonomy);
				$content .= $tax->labels->singular_name . ' ';
				$content .= __('Archives:', 'thematic');
				$content .= ' <span>' . thematic_get_term_name() .'</span>';
				$content .= '</h1>';
 		} elseif (is_post_type_archive()) { 
				$content .= '<h1 class="page-title">';
				$post_type_obj = get_post_type_object( get_post_type() );
				$post_type_name = $post_type_obj->labels->singular_name;
				$content .= __('Archives:', 'thematic');
				$content .= ' <span>' . $post_type_name . '</span>';
				$content .= '</h1>';	
		} elseif (is_day()) {
				$content .= '<h1 class="page-title">';
				$content .= sprintf( __('Daily Archives: %s', 'thematic'), '<span>' . get_the_time( get_option('date_format') ) ) . '</span>';
				$content .= '</h1>';
		} elseif (is_month()) {
				$content .= '<h1 class="page-title">';
				$content .= sprintf( __('Monthly Archives: %s', 'thematic') , '<span>' . get_the_time('F Y') ) . '</span>';
				$content .= '</h1>';
		} elseif (is_year()) {
				$content .= '<h1 class="page-title">';
				$content .= sprintf( __('Yearly Archives: %s', 'thematic'), '<span>' . get_the_time('Y') ) . '</span>';
				$content .= '</h1>';
		}
		$content .= "\n";
		echo apply_filters('thematic_page_title', $content);
	}
}

 

if (function_exists('childtheme_override_nav_above'))  {
	/**
	 * @ignore
	 */
	function thematic_nav_above() {
		childtheme_override_nav_above();
	}
} else {
	/**
	 * Create the above navigation
	 * 
	 * Includes compatibility with WP-PageNavi plugin
	 * 
	 * Override: childtheme_override_nav_above <br>
	 * 
	 * @link http://wordpress.org/extend/plugins/wp-pagenavi/ WP-PageNavi Plugin Page
	 */
	function thematic_nav_above() {
		if (is_single()) { 
		?>
				<div id="nav-above" class="navigation">
				
					<div class="nav-previous"><?php thematic_previous_post_link() ?></div>
					
					<div class="nav-next"><?php thematic_next_post_link() ?></div>
					
				</div>
		<?php } else { ?>
				<div id="nav-above" class="navigation">
               		<?php if ( function_exists( 'wp_pagenavi' ) ) { ?>
                	<?php wp_pagenavi(); ?>
					<?php } else { ?>
					  
					<div class="nav-previous"><?php next_posts_link(sprintf('<span class="meta-nav">&laquo;</span> %s', __('Older posts', 'thematic') ) ) ?></div>
					
					<div class="nav-next"><?php previous_posts_link(sprintf('%s <span class="meta-nav">&raquo;</span>',__( 'Newer posts', 'thematic') ) ) ?></div>

					<?php } ?>
					
				</div>	
		<?php
		}
	}
} // end nav_above

add_action('thematic_navigation_above', 'thematic_nav_above', 2);


if (function_exists('childtheme_override_archive_loop'))  {
	/**
	 * @ignore
	 */
	function thematic_archive_loop() {
		childtheme_override_archive_loop();
	}
} else {
	/**
	 * The Archive loop
	 * 
	 * Located in archive.php
	 * 
	 * Override: childtheme_override_archive_loop
	 */
	function thematic_archive_loop() {
		while ( have_posts() ) : the_post(); 

				// action hook for insterting content above #post
				thematic_abovepost(); 
				?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> > 

				<?php

	            	// creating the post header
	            	thematic_postheader();
	            ?>
					
					<div class="entry-content">
						
						<?php thematic_content(); ?>

					</div><!-- .entry-content -->
					
					<?php thematic_postfooter(); ?>
					
				</div><!-- #post -->

			<?php 
				// action hook for insterting content below #post
				thematic_belowpost();
		
		endwhile;
	}
} // end archive_loop

add_action('thematic_archiveloop', 'thematic_archive_loop');


if (function_exists('childtheme_override_author_loop'))  {
	/**
	 * @ignore
	 */
	function thematic_author_loop() {
		childtheme_override_author_loop();
	}
} else {
	/**
	 * The Author loop
	 * 
	 * Located in author.php
	 * 
	 * Override: childtheme_override_author_loop
	 */
	function thematic_author_loop() {
		rewind_posts();
		while ( have_posts() ) : the_post(); 

				// action hook for insterting content above #post
				thematic_abovepost();
				?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> > 

				<?php

	            	// creating the post header
	            	thematic_postheader();
	            ?>
     				
					<div class="entry-content">
					
						<?php thematic_content(); ?>

					</div><!-- .entry-content -->
					
					<?php thematic_postfooter(); ?>
					
				</div><!-- #post -->

			<?php 
				// action hook for insterting content below #post
				thematic_belowpost();
		
		endwhile;
	}
} // end author_loop

add_action('thematic_authorloop', 'thematic_author_loop');


if (function_exists('childtheme_override_category_loop'))  {
	/**
	 * @ignore
	 */
	function thematic_category_loop() {
		childtheme_override_category_loop();
	}
} else {
	/**
	 * The Category loop
	 * 
	 * Located in category.php
	 * 
	 * Override: childtheme_override_category_loop
	 */
	function thematic_category_loop() {
		while ( have_posts() ) : the_post(); 

				// action hook for insterting content above #post
				thematic_abovepost();
				?>
	
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> > 

				<?php

	            	// creating the post header
	            	thematic_postheader();
	            ?>
     			
					<div class="entry-content">
						
						<?php thematic_content(); ?>
	
					</div><!-- .entry-content -->
					
					<?php thematic_postfooter(); ?>
					
				</div><!-- #post -->

			<?php 
				// action hook for insterting content below #post
				thematic_belowpost();
		
		endwhile;
	}
} // end category_loop

add_action('thematic_categoryloop', 'thematic_category_loop');


if (function_exists('childtheme_override_index_loop'))  {
	/**
	 * @ignore
	 */
	function thematic_index_loop() {
		childtheme_override_index_loop();
	}
} else {
	/**
	 * The Index loop
	 * 
	 * Located in index.php
	 * 
	 * Override: childtheme_override_index_loop
	 */
	function thematic_index_loop() {
		
		// Count the number of posts so we can insert a widgetized area
		$count = 1;
		while ( have_posts() ) : the_post();

				// action hook for inserting content above #post
				thematic_abovepost();
				?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> > 

				<?php

	            	// creating the post header
	            	thematic_postheader();
	            ?>
     				
					<div class="entry-content">
					
						<?php thematic_content(); ?>

						<?php wp_link_pages(array('before' => sprintf('<div class="page-link">%s', __('Pages:', 'thematic')),
													'after' => '</div>')); ?>
					
					</div><!-- .entry-content -->
					
					<?php thematic_postfooter(); ?>
					
				</div><!-- #post -->

			<?php 
				// action hook for insterting content below #post
				thematic_belowpost();
				
				comments_template();

				if ( $count == thematic_get_theme_opt( 'index_insert' ) ) {
					get_sidebar('index-insert');
				}
				$count = $count + 1;
		endwhile;
	}
} // end index_loop

add_action('thematic_indexloop', 'thematic_index_loop');


if (function_exists('childtheme_override_single_post'))  {
	/**
	 * @ignore
	 */
	function thematic_single_post() {
		childtheme_override_single_post();
	}
} else {
	/**
	 * The Single post loop
	 * 
	 * Located in single.php
	 * 
	 * Override: childtheme_override_single_post
	 */
	function thematic_single_post() { 

				// action hook for insterting content above #post
				thematic_abovepost();
				?>
			
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> > 

				<?php

	            	// creating the post header
	            	thematic_postheader();
	            ?>
     				
					<div class="entry-content">
					
						<?php thematic_content(); ?>

						<?php wp_link_pages(array('before' => sprintf('<div class="page-link">%s', __('Pages:', 'thematic')),
													'after' => '</div>')); ?>
						
					</div><!-- .entry-content -->
					
					<?php thematic_postfooter(); ?>
					
				</div><!-- #post -->
		<?php
			// action hook for insterting content below #post
			thematic_belowpost();
	}
} // end single_post

add_action('thematic_singlepost', 'thematic_single_post');


if (function_exists('childtheme_override_search_loop'))  {
	/**
	 * @ignore
	 */
	function thematic_search_loop() {
		childtheme_override_search_loop();
	}
} else {
	/**
	 * The Search loop
	 * 
	 * Located in search.php
	 * 
	 * Override: childtheme_override_search_loop
	 */
	function thematic_search_loop() {
		while ( have_posts() ) : the_post(); 

				// action hook for insterting content above #post
				thematic_abovepost();
				?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> > 

				<?php

	            	// creating the post header
	            	thematic_postheader();
	            ?>
     				
					<div class="entry-content">
					
						<?php thematic_content(); ?>

					</div><!-- .entry-content -->
					
					<?php thematic_postfooter(); ?>
					
				</div><!-- #post -->

			<?php 
				// action hook for insterting content below #post
				thematic_belowpost();
		
		endwhile;
	}
} // end search_loop

add_action('thematic_searchloop', 'thematic_search_loop');


if (function_exists('childtheme_override_tag_loop'))  {
	/**
	 * @ignore
	 */
	function thematic_tag_loop() {
		childtheme_override_tag_loop();
	}
} else {
	/**
	 * The Tag loop
	 * 
	 * Located in tag.php
	 * 
	 * Override: childtheme_override_tag_loop
	 */
	function thematic_tag_loop() {
		while ( have_posts() ) : the_post(); 

				// action hook for insterting content above #post
				thematic_abovepost(); 
				?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> > 

				<?php

	            	// creating the post header
	            	thematic_postheader();
	            ?>
     				
					<div class="entry-content">
					
						<?php thematic_content(); ?>

					</div><!-- .entry-content -->
					
					<?php thematic_postfooter(); ?>
					
				</div><!-- #post -->

			<?php 
				// action hook for insterting content below #post
				thematic_belowpost();
		
		endwhile;
	}
} // end tag_loop

add_action('thematic_tagloop', 'thematic_tag_loop');


/**
 * Filter: thematic_time_title
 * 
 * Create the time url title displayed in the post header
 */
function thematic_time_title() {

	$time_title = 'Y-m-d\TH:i:sO';
	
	// Filters should return correct 
	$time_title = apply_filters('thematic_time_title', $time_title);
	
	return $time_title;
} // end time_title


/**
 * Filter: thematic_time_display
 * 
 * Create the time displayed in the post header
 */
function thematic_time_display() {

	$time_display = get_option('date_format');
	
	// Filters should return correct 
	$time_display = apply_filters('thematic_time_display', $time_display);
	
	return $time_display;
} // end time_display


if (function_exists('childtheme_override_postheader'))  {
	/**
	 * @ignore
	 */
	function thematic_postheader() {
		childtheme_override_postheader();
	}
} else {
	/**
	 * Create the post header
	 * 
	 * Override: childtheme_override_postheader <br>
	 * Filter: thematic_postheader
	 */
	function thematic_postheader() {
 	   
 	   global $post;
 	 
 	   if ( is_404() || $post->post_type == 'page') {
 	       $postheader = thematic_postheader_posttitle();        
 	   } else {
 	       $postheader = thematic_postheader_posttitle() . thematic_postheader_postmeta();    
 	   }
 	   
 	   echo apply_filters( 'thematic_postheader', $postheader ); // Filter to override default post header
	}
}  // end postheader


if (function_exists('childtheme_override_postheader_posteditlink'))  {
	/**
	 * @ignore
	 */
	function thematic_postheader_posteditlink() {
		return childtheme_override_postheader_posteditlink(); 
	}
} else {
	/**
	 * Create the post edit link
	 * 
	 * Override: childtheme_override_postheader_posteditlink <br>
	 * Filter: thematic_postheader_posteditlink
	 */
	function thematic_postheader_posteditlink() {

    	$posteditlink = sprintf( '<a href="%s" title="%s" class="edit">%s</a>' , 

			    			get_edit_post_link(),
			    			esc_attr__('Edit post', 'thematic'),
							/* translators: post edit link */
			    			__('Edit', 'thematic'));
		
		return apply_filters('thematic_postheader_posteditlink', $posteditlink); 

	}
} // end postheader_posteditlink


if (function_exists('childtheme_override_postheader_posttitle'))  {
	/**
	 * @ignore
	 */
	function thematic_postheader_posttitle() {
		return childtheme_override_postheader_posttitle();
	}
} else {
	/**
	 * Create the post title
	 * 
	 * Override: childtheme_override_postheader_posttitle <br>
	 * Filter: thematic_postheader_posttitle
	 */
	function thematic_postheader_posttitle() {
		
		$posttitle = "\n\n\t\t\t\t\t";
	    if (is_single() || is_page()) {
	        $posttitle .= '<h1 class="entry-title">' . get_the_title() . "</h1>\n";
	    } elseif (is_404()) {    
	        $posttitle .= '<h1 class="entry-title">' . __('Not Found', 'thematic') . "</h1>\n";
	    } else {
	        $posttitle .= '<h2 class="entry-title">';
	        $posttitle .= sprintf('<a href="%s" title="%s" rel="bookmark">%s</a>',
	        						apply_filters('the_permalink', get_permalink()),
									sprintf( esc_attr__('Permalink to %s', 'thematic'), the_title_attribute( 'echo=0' ) ),
	        						get_the_title());   
	        $posttitle .= "</h2>\n";
	    }
	    
	    return apply_filters('thematic_postheader_posttitle',$posttitle); 
	
	} 
} // end postheader_posttitle


if (function_exists('childtheme_override_postheader_postmeta'))  {
	/**
	 * @ignore
	 */
	function thematic_postheader_postmeta() {
		return childtheme_override_postheader_postmeta();
	}
} else {
	/**
	 * Create the post meta
	 * 
	 * Override: childtheme_override_postheader_postmeta <br>
	 * Filter: thematic_postheader_postmeta
	 */
	function thematic_postheader_postmeta() {
		
		$postmeta  = "\n\t\t\t\t\t";
	    $postmeta .= '<div class="entry-meta">' . "\n\n";
	    $postmeta .= "\t" . thematic_postmeta_authorlink() . "\n\n";
	    $postmeta .= "\t" . '<span class="meta-sep meta-sep-entry-date"> | </span>'. "\n\n";
	    $postmeta .= "\t" . thematic_postmeta_entrydate() . "\n\n";
	    
	    $postmeta .= "\t" . thematic_postmeta_editlink() . "\n\n";
	                   
	    $postmeta .= '</div><!-- .entry-meta -->' . "\n";
	    
	    return apply_filters('thematic_postheader_postmeta',$postmeta); 
	
	}
} // end postheader_postmeta


if (function_exists('childtheme_override_postmeta_authorlink'))  {
	/**
	 * @ignore
	 */
	function thematic_postmeta_authorlink() {
		return childtheme_override_postmeta_authorlink();
	}
} else {
	/**
	 * Create the author link for post meta
	 * 
	 * Override: childtheme_override_postmeta_authorlink <br>
	 * Filter: thematic_postmeta_authorlink
	 */
	function thematic_postmeta_authorlink() {
		global $authordata;
	
	    $author_prep = '<span class="meta-prep meta-prep-author">' . __('By', 'thematic') . ' </span>';
	    
	    if ( thematic_is_custom_post_type() && !current_theme_supports( 'thematic_support_post_type_author_link' ) ) {
	    	$author_info  = '<span class="vcard"><span class="fn nickname">';
	    	$author_info .= get_the_author_meta( 'display_name' ) ;
	    	$author_info .= '</span></span>';
	    } else {
	    	$author_info  = '<span class="author vcard">';
	    	$author_info .= sprintf('<a class="url fn n" href="%s" title="%s">%s</a>',
	    							get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
									/* translators: author name */
	    							sprintf( esc_attr__( 'View all posts by %s', 'thematic' ), get_the_author_meta( 'display_name' ) ),
	    							get_the_author_meta( 'display_name' ));
	    	$author_info .= '</span>';
	    }
	    
	    $author_credit = $author_prep . $author_info ;
	    
	    return apply_filters('thematic_postmeta_authorlink', $author_credit);
	   
	}
} // end postmeta_authorlink


if (function_exists('childtheme_override_postmeta_entrydate'))  {
	/**
	 * @ignore
	 */
	function thematic_postmeta_entrydate() {
		return childtheme_override_postmeta_entrydate();
	}
} else {
	/**
	 * Create entry date for post meta
	 * 
	 * Override: childtheme_override_postmeta_entrydate <br>
	 * Filter: thematic_postmeta_entrydate
	 */ 
	function thematic_postmeta_entrydate() {
	
	    $entrydate = '<span class="meta-prep meta-prep-entry-date">' . __('Published:', 'thematic') . ' </span>';
	    $entrydate .= '<span class="entry-date"><abbr class="published" title="';
	    $entrydate .= get_the_time(thematic_time_title()) . '">';
	    $entrydate .= get_the_time(thematic_time_display());
	    $entrydate .= '</abbr></span>';
	    
	    return apply_filters('thematic_postmeta_entrydate', $entrydate);
	   
	}
} // end postmeta_entrydate


if (function_exists('childtheme_override_postmeta_editlink'))  {
	/**
	 * @ignore
	 */
	function thematic_postmeta_editlink() {
		return childtheme_override_postmeta_editlink();
	}
} else {
	/**
	 * Create edit link for post meta
	 * 
	 * Override: childtheme_override_postmeta_editlink <br>
	 * Filter: thematic_postmeta_editlink
	 */
	function thematic_postmeta_editlink() {
    
	    // Display edit link
	    if (current_user_can('edit_posts')) {
	        $editlink = '<span class="meta-sep meta-sep-edit">|</span> ' . "\n\n\t\t\t\t\t\t" . thematic_postheader_posteditlink();
	        return apply_filters('thematic_postmeta_editlink', $editlink);
	    }               
	}
} // end postmeta_editlink


// Sets up the post content 
if (function_exists('childtheme_override_content_init'))  {
	/**
	 * @ignore
	 */
	function thematic_content_init() {
		childtheme_override_content_init();
	}
} else {
	/**
	 * Set up the post content to use excerpt or full posts
	 * 
	 * Uses conditional template tags to decide whether posts should be displayed using excerpts or the full content
	 * 
	 * Override: childtheme_override_content_init <br>
	 * Filter: thematic_content
	 */
	function thematic_content_init() {
		global $thematic_content_length;
		
		$content = '';
		$thematic_content_length = '';
		
		if (is_home() || is_front_page()) { 
			$content = 'full';
		} elseif (is_single()) {
			$content = 'full';
		} elseif (is_tag()) {
			$content = 'excerpt';
		} elseif (is_search()) {
			$content = 'excerpt';	
		} elseif (is_category()) {
			$content = 'excerpt';
		} elseif (is_author()) {
			$content = 'excerpt';
		} elseif (is_archive()) {
			$content = 'excerpt'; 
		}
		
		$thematic_content_length = apply_filters('thematic_content', $content);
		
	}
} // end content_init

add_action('thematic_abovepost','thematic_content_init');


if (function_exists('childtheme_override_content'))  {
	/**
	 * @ignore
	 */
	function thematic_content() {
		childtheme_override_content();
	}
} else {
	/**
	 * Create the post content
	 *
	 * Detects whether to use the full length or excerpt of a post and displays it. Post thumbnails are included on
	 * excerpt posts.
	 * 
	 * Override: childtheme_override_content <br>
	 * Filter: thematic_post_thumbs <br>
	 * Filter: thematic_post_thumb_size <br>
	 * Filter: thematic_post_thumb_attr <br>
	 * Filter: thematic_post 
	 */
	function thematic_content() {
		global $thematic_content_length;
	
		if ( strtolower($thematic_content_length) == 'full' ) {
			$post = get_the_content( thematic_more_text() );
			$post = apply_filters('the_content', $post);
			$post = str_replace(']]>', ']]&gt;', $post);
		} elseif ( strtolower($thematic_content_length) == 'excerpt') {
			$post = '';
			$post .= get_the_excerpt();
			$post = apply_filters('the_excerpt',$post);
			if ( apply_filters( 'thematic_post_thumbs', TRUE) ) {
				$post_title = get_the_title();
				$size = apply_filters( 'thematic_post_thumb_size' , array(100,100) );
				$attr = apply_filters( 'thematic_post_thumb_attr', array('title'	=> sprintf( esc_attr__('Permalink to %s', 'thematic'), the_title_attribute( 'echo=0' ) ) ) );
				if ( has_post_thumbnail() ) {
					$post = sprintf('<a class="entry-thumb" href="%s" title="%s">%s</a>',
									get_permalink() ,
									sprintf( esc_attr__('Permalink to %s', 'thematic'), the_title_attribute( 'echo=0' ) ),
									get_the_post_thumbnail(get_the_ID(), $size, $attr)) . $post;
					}
			}
		} elseif ( strtolower($thematic_content_length) == 'none') {
		} else {
			$post = get_the_content( thematic_more_text() );
			$post = apply_filters('the_content', $post);
			$post = str_replace(']]>', ']]&gt;', $post);
		}
		echo apply_filters('thematic_post', $post);
	} 
} // end content


if (function_exists('childtheme_override_archivesopen'))  {
	/**
	 * @ignore
	 */
	function thematic_archivesopen() {
		childtheme_override_archivesopen();
	}
} else {
	/**
	 * Open the list of archived posts in the page template Archives Page
	 * 
	 * Override: childtheme_override_archivesopen
	 */
	function thematic_archivesopen() { ?>
		
		<ul id="archives-page" class="xoxo">
<?php }
} // end archivesopen

add_action('thematic_archives', 'thematic_archivesopen', 1);


if (function_exists('childtheme_override_category_archives'))  {
	/**
	 * @ignore
	 */
	function thematic_category_archives() {
		childtheme_override_category_archives();
	}
} else {
	/**
	 * Display category archives 
	 * 
	 * Added to the archive list on the page template Archives Page
	 * 
	 * Override: childtheme_override_category_archives
	 */
	function thematic_category_archives() { ?>
				<li id="category-archives" class="content-column">
					<h2><?php _e('Archives by Category', 'thematic') ?></h2>
					<ul>
						<?php wp_list_categories(array('optioncount' => true, 
														'feed' => 'RSS',
														'title_li' => '',
														'show_count' => true)); ?> 
					</ul>
				</li>
<?php }
} // end category_archives

add_action('thematic_archives', 'thematic_category_archives', 3);


if (function_exists('childtheme_override_monthly_archives'))  {
	/**
	 * @ignore
	 */
	function thematic_monthly_archives() {
		childtheme_override_monthly_archives();
	}
} else {
	/**
	 * Display monthly archives 
	 * 
	 * Added to the archive list on the page template Archives Page
	 * 
	 * Override: childtheme_override_monthly_archives
	 */
	function thematic_monthly_archives() { ?>
				<li id="monthly-archives" class="content-column">
					<h2><?php _e('Archives by Month', 'thematic') ?></h2>
					<ul>
						<?php wp_get_archives(array('type' => 'monthly',
													'show_post_count' => true )); ?>
					</ul>
				</li>
<?php }
} // end monthly_archives

add_action('thematic_archives', 'thematic_monthly_archives', 5);


 if (function_exists('childtheme_override_archivesclose'))  {
	/**
	 * @ignore
	 */
	function thematic_archivesclose() {
		childtheme_override_archivesclose();
	}
} else {
	/**
	 * Close the archive list used in the page template Archives Page
	 * 
	 * Override: childtheme_override_archivesclose
	 */
	function thematic_archivesclose() { ?>
		</ul>
<?php }
} // end _archivesclose

add_action('thematic_archives', 'thematic_archivesclose', 9);
		

/**
 * Register action hook: thematic_404 
 *
 * Located in 404.php
 */
function thematic_404() {
	do_action('thematic_404');
} // end thematic_404


if ( function_exists('childtheme_override_404_content') )  {
	/**
	 * @ignore
	 */
	function thematic_404_content() {
		childtheme_override_404_content();
	}
} else {
	/**
	 * Create the content for the 404 Error page
	 * 
	 * Located in 404.php
	 * Override: childtheme_override_404_content
	 */
	function thematic_404_content() { ?>
  			<?php thematic_postheader(); ?>
  			
			<div class="entry-content">
				<p><?php _e( 'Apologies, but we were unable to find what you were looking for. Perhaps searching will help.', 'thematic' ) ?></p>
			</div><!-- .entry-content -->
			
			<form id="error404-searchform" method="get" action="<?php echo home_url(); ?>/">
				<div>
					<input id="error404-s" name="s" type="text" value="<?php the_search_query(); ?>" size="40" />
					<input id="error404-searchsubmit" name="searchsubmit" type="submit" value="<?php esc_attr_e( 'Find', 'thematic' ); ?>" />
				</div>
			</form>
<?php }
} // end 404_content

add_action( 'thematic_404','thematic_404_content' );


/**
 * Create the $more_link_text for the_content
 * 
 * Used on posts that are divided using the more tag in post editor
 * 
 * Filter: more_text
 *
 */
function thematic_more_text() {
	/* translators: %s is right angle brackets */
	$content = sprintf ( __('Read More %s', 'thematic'), ' <span class="meta-nav">&raquo;</span>');
	return apply_filters('more_text', $content);
} // end thematic_more_text


/**
 * Create the arguments for wp_list_bookmarks in links.php
 * 
 * Filter: list_bookmarks_args
 *
 */
function thematic_list_bookmarks_args() {
	$content = array ( 'title_before' => '<h2>',
						'title_after' => '</h2>');
	return apply_filters('list_bookmarks_args', $content);
} // end thematic_list_bookmarks_args


if (function_exists('childtheme_override_postfooter'))  {
	/**
	 * @ignore
	 */
	function thematic_postfooter() {
		childtheme_override_postfooter();
	}
} else {
	/**
	 * Create the post footer
	 * 
	 * Override: childtheme_override_postfooter <br>
	 * Filter: thematic_postfooter
	 */
	function thematic_postfooter() {
	    	    
	    $post_type = get_post_type();
	    $post_type_obj = get_post_type_object($post_type);
	    
		// Check for "Page" post-type and logged in user to show edit link
	    if ( $post_type == 'page' && current_user_can('edit_posts') ) {
	        $postfooter = '<div class="entry-utility">' . thematic_postfooter_posteditlink();
	        $postfooter .= "</div><!-- .entry-utility -->\n";
	    // Display nothing for logged out users on a "Page" post-type 
	    } elseif ( $post_type == 'page' ) {
	        $postfooter = '';
	    // For post-types other than "Pages" press on
	    } else {
	    	$postfooter = '<div class="entry-utility">';
	        if ( is_single() ) {
	        	$post_type_archive_link = ( function_exists( 'get_post_type_archive_link' )  ? get_post_type_archive_link( $post_type ) :  home_url( '/?post_type=' . $post_type ) );
	        	if ( thematic_is_custom_post_type() && $post_type_obj->has_archive ) {
		
					/* translators: %s is custom post type singular name, wrapped in link tags */
					$postfooter .= sprintf( __( 'Browse the %s archive.', 'thematic' ), 
					/* translators: %s is custom post type singular name */
					' <a href="' . $post_type_archive_link . '" title="' . sprintf( esc_attr__( 'Permalink to %s Archive', 'thematic' ), $post_type_obj->labels->singular_name )  . '">' . $post_type_obj->labels->singular_name . '</a>'
					);
					$postfooter .= ' ';

	        	}
	        	$postfooter .= thematic_postfooter_posttax();
	    		$postfooter .= sprintf( _x('Bookmark the %1$spermalink%2$s.', '1s and 2s are the a href link wrappers, do not reverse them', 'thematic'), sprintf('<a title="%s" href="%s">', sprintf( esc_attr__('Permalink to %s', 'thematic'), the_title_attribute( 'echo=0' ) ), apply_filters('the_permalink', get_permalink())) , '</a>') . ' ';

	    			if ( post_type_supports( $post_type, 'comments') ) {
	            		$postfooter .= thematic_postfooter_postconnect();
	            	}
	        } elseif ( post_type_supports( $post_type, 'comments') ) {
	        	$postfooter .= thematic_postfooter_posttax();
	            $postfooter .= thematic_postfooter_postcomments();
	        }
	       	// Display edit link
	    	if (current_user_can('edit_posts')) {
	    		if ( !is_single() && post_type_supports( $post_type, 'comments') ) {
	        		$postfooter .= "\n\n\t\t\t\t\t\t" . '<span class="meta-sep meta-sep-edit">|</span> ';
	        	} 
	        	$postfooter .= ' ' . thematic_postfooter_posteditlink();
	    	}   
	    	$postfooter .= "\n\n\t\t\t\t\t</div><!-- .entry-utility -->\n";    
	    }
	    // Put it on the screen
	    echo apply_filters( 'thematic_postfooter', $postfooter ); // Filter to override default post footer
    }
} // end postfooter


if (function_exists('childtheme_override_postfooter_posteditlink'))  {
	/**
	 * @ignore
	 */
	function thematic_postfooter_posteditlink() {
		return childtheme_override_postfooter_posteditlink();
	}
} else {
	/**
	 * Create the post edit link for the post footer
	 * 
	 * Override: childtheme_override_postfooter_posteditlink <br>
	 * Filter: thematic_postfooter_posteditlink
	 */
	function thematic_postfooter_posteditlink() {

	    $posteditlink = sprintf( '<a href="%s" title="%s" class="edit">%s</a>' , 
			    			get_edit_post_link(),
			    			esc_attr__('Edit post', 'thematic'),
							/* translators: post edit link */
			    			__('Edit', 'thematic'));


	    return apply_filters('thematic_postfooter_posteditlink',$posteditlink); 
	    
	} 
} // end postfooter_posteditlink


if (function_exists('childtheme_override_postfooter_posttax'))  {
	/**
	 * @ignore
	 */
	function thematic_postfooter_posttax() {
		return childtheme_override_postfooter_posttax();
	}
} else {
	/**
	 * Create the taxonomy list for the post footer
	 * 
	 * Lists categories, tags, and custom taxonomies
	 * 
	 * Override: childtheme_override_postfooter_posttax <br>
	 * Filter: thematic_postfooter_posttax
	 */
	function thematic_postfooter_posttax() {		
		
		$post_type_tax = get_post_taxonomies();
		$post_tax_list = ''; 
		
		if ( isset($post_type_tax) && $post_type_tax ) { 
	    	foreach ( $post_type_tax as $tax  )   {
	    		if ($tax  == 'category') {
	    			$post_tax_list .= thematic_postfooter_postcategory();
	    		} elseif ($tax  == 'post_tag') {
	    			$post_tax_list .= thematic_postfooter_posttags();
	    		} else {
	    			$post_tax_list .= thematic_postfooter_postterms($tax);
	    		}
	    	}
	    }
		return apply_filters('thematic_postfooter_posttax',$post_tax_list); // Filter for default post terms	
	}
}


if (function_exists('childtheme_override_postfooter_postterms'))  {
	/**
	 * @ignore
	 */
	function thematic_postfooter_postterms($tax) {
		return childtheme_override_postfooter_postterms($tax);
	}
} else {
	/**
	 * Create the list of custom taxonomy terms for post footer
	 *
	 * Override: childtheme_override_postfooter_postterms($tax) <br>
	 * Filter: thematic_postfooter_postterms
	 * 
	 * @param string $tax The taxonomy that the terms will be fetched from
	 */
	function thematic_postfooter_postterms($tax) {
		global $post;
		
		if ($tax == 'post_format') return;
		$tax_terms = '';	
		$tax_obj = get_taxonomy($tax);
		
		if ( wp_get_object_terms($post->ID, $tax) ) {
			$term_list = get_the_term_list( 0, $tax, '' , ', ', '' );		
			$tax_terms = '<span class="' . $tax . '-links">';
			
			if ( strpos( $term_list, ',' ) ) {
				$tax_terms .= $tax_obj->labels->name . ': ';
			} else {
				$tax_terms .= $tax_obj->labels->singular_name . ': ';
			}
			
			$tax_terms .= $term_list;

			if ( is_single() ) { 
		 		$tax_terms .= '. ';
		 		$tax_terms .= '</span>';
			} else {
				$tax_terms .= '</span>' . "\n\n\t\t\t\t\t\t" . '<span class="meta-sep meta-sep-tag-links">|</span> ';
			}
			
		}
		
		return apply_filters('thematic_postfooter_postterms', $tax_terms ); // Filter for custom taxonomy terms
	}
}


if (function_exists('childtheme_override_postfooter_postcategory'))  {
	/**
	 * @ignore
	 */
	function thematic_postfooter_postcategory() {
		return childtheme_override_postfooter_postcategory();
	}
} else {
	/**
	 * Create the category list for post footer
	 * 
	 * Override: childtheme_override_postfooter_postcategory <br>
	 * Filter: thematic_postfooter_postcategory
	 */
	function thematic_postfooter_postcategory() {
    
	    $postcategory = "\n\n\t\t\t\t\t\t" . '<span class="cat-links">';
	    if (is_single()) {
			/* translators: %s is postfooter categories */
	        $postcategory .= sprintf( __('This entry was posted in %s', 'thematic'), get_the_category_list(', ') );
	        $postcategory .= '</span>';
	        $posttags = get_the_tags();
			if ( !$posttags ) {
				$postcategory .= '. ';
			} else {
				//$postcategory .= ' ';
			}

	    } elseif ( is_category() && $cats_meow = thematic_cats_meow(', ') ) { /* Returns categories other than the one queried */
			/* translators: %s is postfooter categories */
	        $postcategory .= sprintf( __('Also posted in %s', 'thematic'), $cats_meow );
	        $postcategory .= '</span>' . "\n\n\t\t\t\t\t\t" . '<span class="meta-sep meta-sep-tag-links">|</span> ';
	    } else {
			/* translators: %s is postfooter categories */
	        $postcategory .= sprintf( __('Posted in %s', 'thematic'), get_the_category_list(', ') );
	        $postcategory .= '</span>' . "\n\n\t\t\t\t\t\t" . '<span class="meta-sep meta-sep-tag-links">|</span> ';
	    }
	    return apply_filters('thematic_postfooter_postcategory',$postcategory); 
	    
	}
}  // end postfooter_postcategory


if (function_exists('childtheme_override_postfooter_posttags'))  {
	/**
	 * @ignore
	 */
	function thematic_postfooter_posttags() {
		return childtheme_override_postfooter_posttags();
	}
} else {
	/**
	 * Create the tags list for post footer
	 * 
	 * Override: childtheme_override_postfooter_posttags <br>
	 * Filter: thematic_postfooter_posttags
	 */
	function thematic_postfooter_posttags() {

	    if ( is_single() && !is_object_in_taxonomy( get_post_type(), 'category' ) ) {
	        $tagtext = __('This entry is tagged', 'thematic') . ' ';
	        $posttags = get_the_tag_list("<span class=\"tag-links\"> $tagtext ",', ','</span>. ');
	    } elseif ( is_single() ) {
	    	$tagtext = __('and tagged', 'thematic') . ' ';
	        $posttags = get_the_tag_list("<span class=\"tag-links\"> $tagtext ",', ','</span>. ');
	    } elseif ( is_tag() && $tag_ur_it = thematic_tag_ur_it(', ') ) { /* Returns tags other than the one queried */
	        $posttags = '<span class="tag-links">' . __('Also tagged', 'thematic') . ' ' . $tag_ur_it . '</span>' . "\n\n\t\t\t\t\t\t" . '<span class="meta-sep meta-sep-comments-link">|</span> ';
	    } else {
	        $tagtext = __('Tagged', 'thematic') . ' ';
	        $posttags = get_the_tag_list("<span class=\"tag-links\"> $tagtext ",', ','</span>' . "\n\n\t\t\t\t\t\t" . '<span class="meta-sep meta-sep-comments-link">|</span> ');
	    }
	    return apply_filters('thematic_postfooter_posttags',$posttags); 
	
	}
} // end postfooter_posttags


if (function_exists('childtheme_override_postfooter_postcomments'))  {
	/**
	 * @ignore
	 */
	function thematic_postfooter_postcomments() {
		return childtheme_override_postfooter_postcomments();
	}
} else {
	/**
	 * Create the comments link for the post footer on archive pages
	 * 
	 * Override: childtheme_override_postfooter_postcomments <br>
	 * Filter: thematic_postfooter_postcomments
	 */
	function thematic_postfooter_postcomments() {
	    if (comments_open()) {
	        $postcommentnumber = get_comments_number();

	        if ($postcommentnumber > '0') {
	        	$postcomments = sprintf('<span class="comments-link"><a href="%s" title="%s" rel="bookmark">%s</a></span>',
	        						apply_filters('the_permalink', get_permalink()) . '#respond',
	        						sprintf( esc_attr__('Comment on %s', 'thematic'), the_title_attribute( 'echo=0' ) ),
									/* translators: number of comments and trackbacks */
	        						sprintf( _n('%s Response', '%s Responses', $postcommentnumber, 'thematic'), number_format_i18n( $postcommentnumber ) ) );
			} else {
	            $postcomments = sprintf('<span class="comments-link"><a href="%s" title="%s" rel="bookmark">%s</a></span>',
	        						apply_filters('the_permalink', get_permalink()) . '#respond',
	        						sprintf( esc_attr__('Comment on %s', 'thematic'), the_title_attribute( 'echo=0' ) ),
	        						__('Leave a comment', 'thematic'));
	        }
	    } else {
	        $postcomments = '<span class="comments-link comments-closed-link">' . __('Comments closed', 'thematic') .'</span>';
	    }            
	    return apply_filters('thematic_postfooter_postcomments',$postcomments); 
	}
} // end postfooter_postcomments


if (function_exists('childtheme_override_postfooter_postconnect'))  {
	/**
	 * @ignore
	 */
	function thematic_postfooter_postconnect() {
		return childtheme_override_postfooter_postconnect();
	}
} else {
	/**
	 * Create the comments link for the post footer on single posts
	 * 
	 * Override: childtheme_override_postfooter_postconnect <br>
	 * Filter: thematic_postfooter_postconnect
	 */
		function thematic_postfooter_postconnect() {
    
	    if ((comments_open()) && (pings_open())) { /* Comments are open */
	        $postconnect = sprintf( _x('%1$sPost a comment%2$s or leave a trackback: %3$s', '1s and 2s are the a href link wrappers, do not reverse them. 3s is trackback url.', 'thematic'), 
								sprintf('<a class="comment-link" title="%s" href="#respond">', esc_attr__('Post a comment', 'thematic')), 
								'</a>' ,
								sprintf('<a class="trackback-link" href="%s" title ="%s" rel="trackback">%s</a>.', 
									get_trackback_url(),
									esc_attr__('Trackback URL for your post', 'thematic'),
						 			__('Trackback URL', 'thematic'))
							);
	    } elseif (!(comments_open()) && (pings_open())) { /* Only trackbacks are open */
	        $postconnect = sprintf( _x('Comments are closed, but you can leave a trackback: %s', '%s is trackback url, wrapped in link tags', 'thematic'),
							sprintf('<a class="trackback-link" href="%s" title="%s" rel="trackback">%s</a>.', 
								get_trackback_url(), 
								esc_attr__('Trackback URL for your post', 'thematic'), 
								__('Trackback URL', 'thematic'))
							);
	    } elseif ((comments_open()) && !(pings_open())) { /* Only comments open */
	        $postconnect = sprintf( __('Trackbacks are closed, but you can %1$spost a comment%2$s.', '1s and 2s are the a href link wrappers, do not reverse them', 'thematic'), sprintf('<a class="comment-link" title="%s" href="#respond">', esc_attr__('Post a comment', 'thematic')), '</a>');
	    } elseif (!(comments_open()) && !(pings_open())) { /* Comments and trackbacks closed */
	        $postconnect = __('Both comments and trackbacks are currently closed.', 'thematic');
	    }
	    return apply_filters('thematic_postfooter_postconnect',$postconnect); 
	}
} // end postfooter_postconnect


// Action to create the below navigation
if (function_exists('childtheme_override_nav_below'))  {
	/**
	 * @ignore
	 */
	function thematic_nav_below() {
		childtheme_override_nav_below();
	}
} else {
	/**
	 * Create the below navigation
	 * 
	 * Provides compatibility with WP-PageNavi plugin
	 * 
	 * Override: childtheme_override_nav_below
	 * 
	 * @link http://wordpress.org/extend/plugins/wp-pagenavi/ WP-PageNavi Plugin Page
	 */
	function thematic_nav_below() {
		if (is_single()) { ?>

			<div id="nav-below" class="navigation">
				<div class="nav-previous"><?php thematic_previous_post_link() ?></div>
				<div class="nav-next"><?php thematic_next_post_link() ?></div>
			</div>

<?php
		} else { ?>

			<div id="nav-below" class="navigation">
                <?php if(function_exists('wp_pagenavi')) { ?>
                <?php wp_pagenavi(); ?>
                <?php } else { ?>  
				
				<div class="nav-previous"><?php next_posts_link(sprintf('<span class="meta-nav">&laquo;</span> %s', __('Older posts', 'thematic') ) ) ?></div>
					
				<div class="nav-next"><?php previous_posts_link(sprintf('%s <span class="meta-nav">&raquo;</span>',__( 'Newer posts', 'thematic') ) ) ?></div>

				<?php } ?>
			</div>	
	
<?php
		}
	}
} // end nav_below

add_action('thematic_navigation_below', 'thematic_nav_below', 2);


if (function_exists('childtheme_override_previous_post_link'))  {
	/**
	 * @ignore
	 */
	function thematic_previous_post_link() {
		childtheme_override_previous_post_link();
	}
} else {
	/**
	 * Create the previous post link on single pages
	 * 
	 * Override: childtheme_override_previous_post_link
	 * Filter: thematic_previous_post_link_args
	 */
	function thematic_previous_post_link() {
	
		$args = array ( 
			'format'              => '%link',
			'link'                => '<span class="meta-nav">&laquo;</span> %title',
			'in_same_cat'         => FALSE,
			'excluded_categories' => ''
		);
						
		$args = apply_filters('thematic_previous_post_link_args', $args );
		
		previous_post_link($args['format'], $args['link'], $args['in_same_cat'], $args['excluded_categories']);
	}
} // end previous_post_link


if (function_exists('childtheme_override_next_post_link'))  {
	/**
	 * @ignore
	 */
	function thematic_next_post_link() {
		childtheme_override_next_post_link();
	}
} else {
	/**
	 * Create the next post link on single pages
	 * 
	 * Override: childtheme_override_next_post_link
	 * Filter: thematic_next_post_link_args
	 */
	function thematic_next_post_link() {
		$args = array (
			'format' => '%link',
			'link' => '%title <span class="meta-nav">&raquo;</span>',
			'in_same_cat' => FALSE,
			'excluded_categories' => ''
		);
		
		$args = apply_filters('thematic_next_post_link_args', $args );
		next_post_link($args['format'], $args['link'], $args['in_same_cat'], $args['excluded_categories']);
	}
} // end next_post_link


if (function_exists('childtheme_override_author_info_avatar'))  {
	/**
	 * @ignore
	 */
	function thematic_author_info_avatar() {
		childtheme_override_author_info_avatar();
	}
} else {
	/**
	 * Create an avatar image for the author info
	 * 
	 * Includes the hCard-compliant photo class on the image. Located in author.php
	 * 
	 * Override: childtheme_override_author_info_avatar
	 */
	function thematic_author_info_avatar() {
    
	    global $wp_query; $curauth = $wp_query->get_queried_object();
		
		$email = $curauth->user_email;
		$avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar("$email") );
		echo $avatar;
	}
} // end author_info_avatar


if (function_exists('childtheme_override_cats_meow'))  {
	/**
	 * @ignore
	 */
	function thematic_cats_meow() {
		return childtheme_override_cats_meow();
	}
} else {
	/**
	 * Create a category list with all categories except the current one
	 * 
	 * Used in post footer on category archives (redundant)
	 * 
	 * Override: childtheme_override_cats_meow
	 */
	function thematic_cats_meow($glue) {
		$current_cat = single_cat_title( '', false );
		$separator = "\n";
		$cats = explode( $separator, get_the_category_list($separator) );
		foreach ( $cats as $i => $str ) {
			if ( strpos( $str, ">$current_cat<" ) > 0) {
				unset($cats[$i]);
				break;
			}
		}
		if ( empty($cats) )
			return false;
	
		return trim(join( $glue, $cats ));
	}
} // end cats_meow


if (function_exists('childtheme_override_tag_ur_it'))  {
	/**
	 * @ignore
	 */
	function thematic_tag_ur_it() {
		return childtheme_override_tag_ur_it();
	}
} else {
	/**
	 * Create a tag list with all tags except the current one
	 * 
	 * Used in post footer on tag archives (redundant)
	 * 
	 * Override: childtheme_override_tag_ur_it
	 */
	function thematic_tag_ur_it($glue) {
		$current_tag = single_tag_title( '', '',  false );
		$separator = "\n";
		$tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
		foreach ( $tags as $i => $str ) {
			if ( strpos( $str, ">$current_tag<" ) > 0 ) {
				unset($tags[$i]);
				break;
			}
		}
		if ( empty($tags) )
			return false;
		
		return trim( join( $glue, $tags ) );
	}
} // end thematic_tag_ur_it


?>