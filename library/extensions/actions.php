<?php
function thematic_header_create_head() {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head profile="http://gmpg.org/xfn/11">

<?php
}

function thematic_header_create_title() {
?>
    <title><?php
        if ( is_single() ) { single_post_title(); }
        elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; bloginfo('description'); pageGetPageNo(); }
        elseif ( is_page() ) { single_post_title(''); }
        elseif ( is_search() ) { bloginfo('name'); print ' | '; _e('Search Results for:','thematic'); print ' ' . wp_specialchars(stripslashes($_GET['s']), true); pageGetPageNo(); }
        elseif ( is_tag() ) { bloginfo('name'); print ' | '; _e(thematic_tag_query()); pageGetPageNo(); }
        elseif ( is_404() ) { bloginfo('name'); print ' | '; _e('Not Found', 'thematic'); }
        else { bloginfo('name'); wp_title('|'); pageGetPageNo(); }
    ?></title>
    
<?php
}

function thematic_header_create_contenttype() {
?>
    <meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />

<?php
}

function thematic_header_create_description() {
    if (is_single() || is_page() ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <meta name="description" content="<?php if (thematic_the_excerpt() == "") {echo thematic_excerpt_rss(); } else { echo thematic_the_excerpt(); } ?>" />
<?php endwhile; endif; elseif(is_home()) : ?>
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    
<?php endif;
}

function thematic_header_create_robots() {
if((is_home() && ($paged < 2 )) || is_front_page() || is_single() || is_page() || is_attachment()) {
      echo '    <meta name="robots" content="index,follow" />';
    } elseif (is_search()) {
      echo '    <meta name="robots" content="noindex,nofollow" />';
    } else {	
      echo '    <meta name="robots" content="noindex,follow" />';
    }
}

function thematic_header_create_stylesheet() {
?>


    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />

<?php
}

function thematic_header_create_rss() {
?>
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?> <?php _e('Posts RSS feed', 'thematic'); ?>" />
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?> <?php _e('Comments RSS feed', 'thematic'); ?>" />

<?php
}

function thematic_header_create_pingback() {
?>
    <link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />

<?php
}

function thematic_header_create_commentreply() {
  if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); // support for comment threading
}
?>