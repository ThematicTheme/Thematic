<?php
/**
 * Legacy Fucntionality
 * 
 * @since 2.0.0
 *
 * @package ThematicLegacy
 */

/**
 * Load legacy template files when needed
 * 
 * @since 2.0.0
 */
function thematic_load_legacy_template_files( $template ) {
		
	if( is_attachment() )
		$template = THEMATIC_LIB . '/legacy/legacy-attachment.php';
		
	if( is_page() && ! is_page_template() )
		$template = THEMATIC_LIB . '/legacy/legacy-page.php';
		
	if( is_page_template( 'links.php' ) )
		$template = THEMATIC_LIB . '/legacy/legacy-links.php';
		
	if( is_page_template( 'template-page-archives.php' ) )
		$template = THEMATIC_LIB . '/legacy/legacy-template-page-archives.php';
		
	if( is_page_template( 'template-page-fullwidth.php' ) )
		$template = THEMATIC_LIB . '/legacy/legacy-template-page-fullwidth.php';
		
	return $template;
}
add_filter( 'template_include', 'thematic_load_legacy_template_files' );


// Restore xhtml1.0 doctype and version 1.0.4 html tag
// Check for new overrides before restoring legacy functionality
if ( !function_exists( 'childtheme_override_doctype' ) || !function_exists( 'childtheme_override_html' )  ) {
	/**
	* @ignore
	*/
	function childtheme_override_doctype() {
		thematic_create_doctype();
	}
	/**
	* The laguage attributes and closing of the html tag were originally
	* included in the previous version of the header.php template.
	*
	* @ignore
	*/
	function childtheme_override_html() {
		echo " ";
		language_attributes();
		echo ">\n";
	}
}


// Restore head profile
// Check for new overrides before restoring legacy functionality
if ( !function_exists( 'childtheme_override_head' ) ) {
	/**
	* @ignore
	*/
	function childtheme_override_head() {
		thematic_head_profile();
	}
}


// Restore meta content type / charset
// Check for new overrides before restoring legacy functionality
if ( !function_exists( 'childtheme_override_meta_charset' ) ) {
	/**
	* @ignore
	*/
	function childtheme_override_meta_charset() {
		thematic_create_contenttype();
	}
}


/**
 * Add filter to wp_list_comments arguments to use xhtml comments callback
 * 
 * @since 2.0.0
 * 
 * @param $content array Previous arguments
 * @return $content array Array with new arguments
 */
function thematic_comments_arg_xhtml( $content ) {
	$content[ 'callback' ] = 'thematic_comments_xhtml';
	return $content;
}
add_filter( 'thematic_list_comments_arg', 'thematic_comments_arg_xhtml' );


/**
 * Custom callback function to list comments in the Thematic style. 
 * 
 * Used in legacy xhtml mode
 * 
 * @since 2.0.0
 *
 * @param object $comment 
 * @param array $args 
 * @param int $depth 
 */
function thematic_comments_xhtml($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
	$GLOBALS['comment_depth'] = $depth;
?>
    
       	<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
    	
    		<?php 
    			// action hook for inserting content above #comment
    			thematic_abovecomment();
    		?>
    		
    		<div class="comment-author vcard"><?php thematic_commenter_link() ?></div>
    		
    			<?php thematic_commentmeta(TRUE); ?>
    		
    			<?php  
    				if ( $comment->comment_approved == '0' ) {
    					echo "\t\t\t\t\t" . '<span class="unapproved">';
    					_e( 'Your comment is awaiting moderation', 'thematic' );
    					echo ".</span>\n";
    				}
    			?>
    			
            <div class="comment-content">
            
        		<?php comment_text() ?>
        		
    		</div>
    		
			<?php // echo the comment reply link with help from Justin Tadlock http://justintadlock.com/ and Will Norris http://willnorris.com/
				
				if( $args['type'] == 'all' || get_comment_type() == 'comment' ) :
					comment_reply_link( array_merge( $args, array(
						'reply_text' => __( 'Reply','thematic' ), 
						'login_text' => __( 'Log in to reply.','thematic' ),
						'depth'      => $depth,
						'before'     => '<div class="comment-reply-link">', 
						'after'      => '</div>'
					)));
				endif;
			?>
			
			<?php
				// action hook for inserting content above #comment
				thematic_belowcomment() 
			?>

<?php }


/**
 *  Specify style dependencies when legacy mode is activated
 *  
 *  @since 2.0.0
 */
function thematic_legacy_style_dependency( $dependencies ) {

	$theme = wp_get_theme();
	$template = wp_get_theme( 'thematic' );

	// enqueue legacy stylesheet when Thematic is used as active theme
	$childtheme_style_dependencies = ( $theme == $template) ? array( 'thematic-legacy' ) : array();

	return $childtheme_style_dependencies;
}
add_filter( 'thematic_childtheme_style_dependencies', 'thematic_legacy_style_dependency', 9 );


if ( !function_exists( 'childtheme_override_head' ) ) {
	/**
	 * @ignore
	 */
	function childtheme_override_commentmeta() {
		$content = '<div class="comment-meta">' . 
					sprintf( _x('Posted %s at %s', 'Posted {$date} at {$time}', 'thematic') , 
						get_comment_date(),
						get_comment_time() );

		$content .= ' <span class="meta-sep">|</span> ' . sprintf( '<a href="%1$s" title="%2$s">%3$s</a>', '#comment-' . get_comment_ID() , __( 'Permalink to this comment', 'thematic' ), __( 'Permalink', 'thematic' ) );
							
		if ( get_edit_comment_link() ) {
			$content .=	sprintf(' <span class="meta-sep">|</span><span class="edit-link"> <a class="comment-edit-link" href="%1$s" title="%2$s">%3$s</a></span>',
						get_edit_comment_link(),
						__( 'Edit comment' , 'thematic' ),
						__( 'Edit', 'thematic' ) );
			}
		
		$content .= '</div>' . "\n";
			
		return $print ? print(apply_filters('thematic_commentmeta', $content)) : apply_filters('thematic_commentmeta', $content);
	
	}
}

/**
 * Remove the html5shiv markup
 * 
 * @since 2.0.0
 * 
 * @return bool false
 */
function thematic_xhtml_remove_shiv() {
	return false;
}
add_filter( 'thematic_use_html5shiv', 'thematic_xhtml_remove_shiv' );


/**
 * Filter .site-header opening tag to xhtml
 * 
 * @since 2.0.0
 */
function thematic_open_header_xhtml( $content ) {
	$content = '<div id="header" class="site-header">';
	return $content;
}
add_filter( 'thematic_open_header', 'thematic_open_header_xhtml' );


/**
 * Filter .site-header closing tag to xhtml
 * 
 * @since 2.0.0
 */
function thematic_close_header_xhtml( $content ) {
	$content = '</div><!-- .site-header-->';
	return $content;
}
add_filter( 'thematic_close_header', 'thematic_close_header_xhtml' );


/**
 * Filter the main menu to use div tag
 * 
 * @since 2.0.0
 */
function thematic_navmenu_args_xhtml( $args ) {
	$args[ 'container' ] = 'div';
	return $args;
}
add_filter( 'thematic_nav_menu_args', 'thematic_navmenu_args_xhtml' );


// Restore nav above using <div> tags instead of <nav>
if ( !function_exists( 'childtheme_override_nav_above' ) )  {
	/**
	 * @ignore
	 */
	function childtheme_override_nav_above() {
		if ( is_single() ) { 
		?>
				<div id="nav-above" class="navigation" role="navigation">
				
					<div class="nav-previous"><?php thematic_previous_post_link() ?></div>
					
					<div class="nav-next"><?php thematic_next_post_link() ?></div>
					
				</div>
		<?php } else { ?>
				<div id="nav-above" class="navigation" role="navigation">
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
}

/**
 * Replace the loops with xhtml versions
 * 
 * @since 2.0.0
 */
function thematic_replace_loops() {
	// replace the archive loop
	if ( !function_exists( 'childtheme_override_archive_loop' ) ) {
		remove_action( 'thematic_archiveloop', 'thematic_archive_loop');
		add_action( 'thematic_archiveloop', 'thematic_default_loop_xhtml' );
	}

	// replace the author loop
	if ( !function_exists( 'childtheme_override_author_loop' ) ) {
		remove_action( 'thematic_authorloop', 'thematic_author_loop');
		add_action( 'thematic_authorloop', 'thematic_default_loop_xhtml' );
	}

	// replace the category loop
	if ( !function_exists( 'childtheme_override_category_loop' ) ) {
		remove_action( 'thematic_categoryloop', 'thematic_category_loop');
		add_action( 'thematic_categoryloop', 'thematic_default_loop_xhtml' );
	}

	// replace the search loop
	if ( !function_exists( 'childtheme_override_search_loop' ) ) {
		remove_action( 'thematic_searchloop', 'thematic_search_loop' );
		add_action( 'thematic_searchloop', 'thematic_default_loop_xhtml' );
	}

	// replace the tag loop
	if ( !function_exists( 'childtheme_override_tag_loop' ) ) {
		remove_action( 'thematic_tagloop', 'thematic_tag_loop');
		add_action( 'thematic_tagloop', 'thematic_default_loop_xhtml' );
	}

	// replace the index loop
	if ( !function_exists( 'childtheme_override_index_loop' ) ) {
		remove_action( 'thematic_indexloop', 'thematic_index_loop');
		add_action( 'thematic_indexloop', 'thematic_index_loop_xhtml' );
	}


	// replace the single post loop
	if ( !function_exists( 'childtheme_override_single_post' ) ) {
		remove_action( 'thematic_singlepost', 'thematic_single_post');
		add_action( 'thematic_singlepost', 'thematic_single_post_xhtml' );
	}
}
add_action( 'init', 'thematic_replace_loops' );


/**
 * The default xhtml loop
 * 
 * @since 2.0.0
 */
function thematic_default_loop_xhtml() {
	if ( is_author() ) {
		rewind_posts();
	}
		
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


/**
 * The index xhtml loop
 * 
 * @since 2.0.0
 */
function thematic_index_loop_xhtml() {
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

					<?php wp_link_pages( array( 'before' => sprintf( '<div class="page-link">%s', __( 'Pages:', 'thematic' ) ),
												'after' => '</div>' ) ); ?>
				
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


/**
 * The single posts xhtml loop
 * 
 * @since 2.0.0
 */
function thematic_single_post_xhtml() {	
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

					<?php wp_link_pages( array( 'before' => sprintf( '<div class="page-link">%s', __( 'Pages:', 'thematic' ) ),
												'after' => '</div>' ) ); ?>
					
				</div><!-- .entry-content -->
				
				<?php thematic_postfooter(); ?>
				
			</div><!-- #post -->
	<?php
		// action hook for insterting content below #post
		thematic_belowpost();
}



/**
 * Filter thematic_postheader to remove the <header> element
 * 
 * @since 2.0.0
 */
function thematic_postheader_xhtml( $content ) {
	$content = str_replace( '<header class="entry-header">', '', $content);
	$content = str_replace( '</header>', '', $content);
	return $content;
}
add_filter( 'thematic_postheader', 'thematic_postheader_xhtml' );


/**
 * Filter thematic_postheader_posttitle to use <h2> tags
 * 
 * @since 2.0.0
 */
function thematic_postheader_posttitle_xhtml( $content ) {
	if ( !is_single() || !is_page() || !is_404() ) {
		$content = str_replace( '<h1 class="entry-title">', '<h2 class="entry-title">', $content);
		$content = str_replace( '</h1>', '</h2>', $content);
	}
	return $content;
}
add_filter( 'thematic_postheader_posttitle', 'thematic_postheader_posttitle_xhtml' );


/**
 * Filter thematic_postfooter to use <div> tag
 * 
 * @since 2.0.0
 */
function thematic_postfooter_xhtml( $content ) {
	$content = str_replace( '<footer class="entry-utility">', '<div class="entry-utility">', $content);
	$content = str_replace( '</footer><!-- .entry-utility -->', '</div><!-- .entry-utility -->', $content);
	return $content;
}
add_filter( 'thematic_postfooter', 'thematic_postfooter_xhtml' );


/**
 * Filter wp_link_pages_args to use <div> tags
 * 
 * @since 2.0.0
 */
function thematic_link_pages_args_xhtml( $args ) {
	$args['before'] = sprintf( '<div class="page-link">%s', __( 'Pages:', 'thematic' ) ); 
	$args['after'] = '</div>';
	return $args;
}
add_filter( 'wp_link_pages_args', 'thematic_link_pages_args_xhtml' );


// Restore nav below to use <div> tags instead of <nav>
if ( !function_exists( 'childtheme_override_nav_below' ) ) {
	/**
	 * @ignore
	 */
	function childtheme_override_nav_below() {
		if ( is_single() ) { ?>

			<div id="nav-below" class="navigation" role="navigation">
				<div class="nav-previous"><?php thematic_previous_post_link() ?></div>
				<div class="nav-next"><?php thematic_next_post_link() ?></div>
			</div>

<?php
		} else { ?>

			<div id="nav-below" class="navigation" role="navigation">
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
}


/**
 * Filter the thematic_before_widget_area to use div tags
 * 
 * @since 2.0.0
 */
function thematic_xhtml_before_widget_area( $content ) {
	$content = str_replace( '<aside', '<div ', $content);
	$content = str_replace( '<div class="inner xoxo">', '<ul class="xoxo">', $content);
	return $content;
}
add_filter( 'thematic_before_widget_area', 'thematic_xhtml_before_widget_area' );


/**
 * Filter the thematic_after_widget_area to use div tags
 * 
 * @since 2.0.0
 */
function thematic_xhtml_after_widget_area( $content ) {
	$content = str_replace( '</aside>', '</div>', $content);
	$content = str_replace( '</div><!-- .inner -->', '</ul>', $content);
	return $content;
}
add_filter( 'thematic_after_widget_area', 'thematic_xhtml_after_widget_area' );


/**
 * Filter the thematic_before_widget to use li tags
 * 
 * @since 2.0.0
 */
function thematic_xhtml_before_widget( $content ) {
	$content = '<li id="%1$s" class="widgetcontainer %2$s">';
	return $content;
}
add_filter( 'thematic_before_widget', 'thematic_xhtml_before_widget' );


/**
 * Filter the thematic_after_widget to use li tags
 * 
 * @since 2.0.0
 */
function thematic_xhtml_after_widget( $content ) {
	$content = '</li>';
	return $content;
}
add_filter( 'thematic_after_widget', 'thematic_xhtml_after_widget' );


/**
 * Filter the thematic_before_title to use h3 tags
 * 
 * @since 2.0.0
 */
function thematic_xhtml_before_title( $content ) {
	$content = '<h3 class="widgettitle">';
	return $content;
}
add_filter( 'thematic_before_title', 'thematic_xhtml_before_title' );


/**
 * Filter the thematic_after_title to use h3 tags
 * 
 * @since 2.0.0
 */
function thematic_xhtml_after_title( $content ) {
	$content = "</h3>\n";
	return $content;
}
add_filter( 'thematic_after_title', 'thematic_xhtml_after_title' );


/**
 * Filter .site-footer opening tag to xhtml
 * 
 * @since 2.0.0
 */
function thematic_open_footer_xhtml( $content ) {
	$content = '<div id="footer" class="site-footer">';
	return $content;
}
add_filter( 'thematic_open_footer', 'thematic_open_footer_xhtml' );


/**
 * Filter .site-footer closing tag to xhtml
 * 
 * @since 2.0.0
 */
function thematic_close_footer_xhtml( $content ) {
	$content = '</div><!-- .site-footer -->';
	return $content;
}
add_filter( 'thematic_close_footer', 'thematic_close_footer_xhtml' );
