<?php
function thematic_head_create_head() {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head profile="http://gmpg.org/xfn/11">

<?php
}

function thematic_head_create_title() {
?>
    <title><?php thematic_doctitle();?></title>

<?php
}

function thematic_head_create_contenttype() {
?>
    <meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />

<?php
}

function thematic_head_create_description() {
    if (is_single() || is_page() ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <meta name="description" content="<?php if (thematic_the_excerpt() == "") {echo thematic_excerpt_rss(); } else { echo thematic_the_excerpt(); } ?>" />
<?php endwhile; endif; elseif(is_home()) : ?>
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    
<?php endif;
}

function thematic_head_create_robots() {
if((is_home() && ($paged < 2 )) || is_front_page() || is_single() || is_page() || is_attachment()) {
      echo '    <meta name="robots" content="index,follow" />';
    } elseif (is_search()) {
      echo '    <meta name="robots" content="noindex,nofollow" />';
    } else {	
      echo '    <meta name="robots" content="noindex,follow" />';
    }
}

function thematic_head_create_stylesheet() {
?>


    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />

<?php
}

function thematic_head_create_rss() {
?>
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?> <?php _e('Posts RSS feed', 'thematic'); ?>" />
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?> <?php _e('Comments RSS feed', 'thematic'); ?>" />

<?php
}

function thematic_head_create_pingback() {
?>
    <link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />

<?php
}

function thematic_head_create_commentreply() {
  if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); // support for comment threading
}

function thematic_head_scripts() {
// Load scripts for the jquery Superfish plugin http://users.tpg.com.au/j_birch/plugins/superfish/#examples

    $scriptdir_start = '    <script type="text/javascript" src="';
    $scriptdir_start .= get_bloginfo('template_directory');
    $scriptdir_start .= '/library/scripts/';
    
    $scriptdir_end = '"></script>';
    
    $scripts .= $scriptdir_start . 'jquery-1.2.6.min.js' . $scriptdir_end . "\n";
    $scripts .= $scriptdir_start . 'hoverIntent.js' . $scriptdir_end . "\n";
    $scripts .= $scriptdir_start . 'superfish.js' . $scriptdir_end . "\n";
    $scripts .= $scriptdir_start . 'supersubs.js' . $scriptdir_end . "\n";
    
    $scripts .= <<<EOD
    <script type="text/javascript">
    $(document).ready(function(){ 
        $("ul.sf-menu").supersubs({ 
            minWidth:    12,                                // minimum width of sub-menus in em units 
            maxWidth:    27,                                // maximum width of sub-menus in em units 
            extraWidth:  1                                  // extra width can ensure lines don't sometimes turn over 
                                                            // due to slight rounding differences and font-family 
        }).superfish({ 
            delay:       300,                               // delay on mouseout 
            animation:   {opacity:'show',height:'show'},    // fade-in and slide-down animation 
            speed:       'fast',                            // faster animation speed 
            autoArrows:  false,                             // disable generation of arrow mark-up 
            dropShadows: false                              // disable drop shadows 
        }); 
    }); 
    </script>
    
EOD;

    // Print filtered scripts
    print apply_filters('thematic_head_scripts', $scripts);

}

?>