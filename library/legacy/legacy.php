<?php
/**
 * Legacy Fucntionality
 *
 * @package ThematicLegacy
 */

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
 * Filter .site-header opening tag to xhtml
 */
function thematic_open_header_xhtml( $content ) {
	$content = '<div id="header" class="site-header">';
	return $content;
}
add_filter( 'thematic_open_header', 'thematic_open_header_xhtml' );


/**
 * Filter .site-header closing tag to xhtml
 */
function thematic_close_header_xhtml( $content ) {
	$content = '</div><!-- .site-header-->';
	return $content;
}
add_filter( 'thematic_close_header', 'thematic_close_header_xhtml' );


/**
 * Filter the main menu to use div tag
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
}


/**
 * Filter thematic_postheader to remove the <header> element
 */
function thematic_postheader_xhtml( $content ) {
	$content = str_replace( '<header class="entry-header">', '', $content);
	$content = str_replace( '</header>', '', $content);
	return $content;
}
add_filter( 'thematic_postheader', 'thematic_postheader_xhtml' );


/**
 * Filter thematic_postfooter to use <div> tag
 */
function thematic_postfooter_xhtml( $content ) {
	$content = str_replace( '<footer class="entry-utility">', '<div class="entry-utility">', $content);
	$content = str_replace( '</footer><!-- .entry-utility -->', '</div><!-- .entry-utility -->', $content);
	return $content;
}
add_filter( 'thematic_postfooter', 'thematic_postfooter_xhtml' );


// Restore nav below to use <div> tags instead of <nav>
if ( !function_exists( 'childtheme_override_nav_below' ) ) {
	/**
	 * @ignore
	 */
	function childtheme_override_nav_below() {
		if ( is_single() ) { ?>

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
}


/**
 * Filter the thematic_before_widget_area to use div tags
 */
function thematic_xhtml_before_widget_area( $content ) {
	$content = str_replace( '<aside', '<div ', $content);
	$content = str_replace( '<div class="inner xoxo">', '<ul class="xoxo">', $content);
	return $content;
}
add_filter( 'thematic_before_widget_area', 'thematic_xhtml_before_widget_area' );


/**
 * Filter the thematic_after_widget_area to use div tags
 */
function thematic_xhtml_after_widget_area( $content ) {
	$content = str_replace( '</aside>', '</div>', $content);
	$content = str_replace( '</div><!-- .inner -->', '</ul>', $content);
	return $content;
}
add_filter( 'thematic_after_widget_area', 'thematic_xhtml_after_widget_area' );


/**
 * Filter the thematic_before_widget to use li tags
 */
function thematic_xhtml_before_widget( $content ) {
	$content = '<li id="%1$s" class="widgetcontainer %2$s">';
	return $content;
}
add_filter( 'thematic_before_widget', 'thematic_xhtml_before_widget' );


/**
 * Filter the thematic_after_widget to use li tags
 */
function thematic_xhtml_after_widget( $content ) {
	$content = '</li>';
	return $content;
}
add_filter( 'thematic_after_widget', 'thematic_xhtml_after_widget' );


/**
 * Filter the thematic_before_title to use h3 tags
 */
function thematic_xhtml_before_title( $content ) {
	$content = '<h3 class="widgettitle">';
	return $content;
}
add_filter( 'thematic_before_title', 'thematic_xhtml_before_title' );


/**
 * Filter the thematic_after_title to use h3 tags
 */
function thematic_xhtml_after_title( $content ) {
	$content = "</h3>\n";
	return $content;
}
add_filter( 'thematic_after_title', 'thematic_xhtml_after_title' );


/**
 * Filter .site-footer opening tag to xhtml
 */
function thematic_open_footer_xhtml( $content ) {
	$content = '<div id="footer" class="site-footer">';
	return $content;
}
add_filter( 'thematic_open_footer', 'thematic_open_footer_xhtml' );


/**
 * Filter .site-footer closing tag to xhtml
 */
function thematic_close_footer_xhtml( $content ) {
	$content = '</div><!-- .site-footer -->';
	return $content;
}
add_filter( 'thematic_close_footer', 'thematic_close_footer_xhtml' );