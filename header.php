<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head profile="http://gmpg.org/xfn/11">
<title><?php
    if ( is_single() ) { single_post_title(); }
    elseif ( is_home() ) { bloginfo('name'); print ' | '; bloginfo('description'); pageGetPageNo(); }
    elseif ( is_page() ) { single_post_title(''); }
    elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); pageGetPageNo(); }
    elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
    else { bloginfo('name'); wp_title('|'); pageGetPageNo(); }
?></title>
<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<meta name="description" content="<?php bloginfo('description') ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version') ?>" /><!-- Please leave for stats -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/custom.css" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/print.css" type="text/css" media="print" />
  	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?> <?php _e('Posts RSS feed', 'thematic'); ?>" />
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?> <?php _e('Comments RSS feed', 'thematic'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
	
<?php wp_head() ?>

    <script src="<?php bloginfo('template_directory'); ?>/library/scripts/ie7/IE8.js" type="text/javascript"></script>     
    <script type="text/javascript">
    	jQuery(document).ready(function(){
    		// Hide the site-meta panel
    		jQuery('#meta-panel').hide();
    		
    		// Toggle site-meta panel visibilty and class when handle is clicked
    		jQuery('#meta-anchor').click(function() {
    			jQuery('#meta-panel').slideToggle(50);
                jQuery(this).toggleClass("active");
    			return false;
    		} );	
    	});
            
    </script>   
         
</head>

<body class="<?php sandbox_body_class() ?>">

<div id="wrapper" class="hfeed">

    <?php if (is_user_logged_in()) { ?>
    <div id="site-meta">
    	<div id="meta-panel">
        	<ul>
        		<?php wp_register() ?>
        		<li><?php wp_loginout() ?></li>
        	</ul>
    	</div>
    	<a href="" id="meta-anchor">Site Meta</a>
    </div><!-- #site-meta -->
    <?php } ?>

    <div id="header">
    	<div id="branding">
    		<div id="blog-title"><span><a href="<?php echo get_option('home') ?>/" title="<?php bloginfo('name') ?>" rel="home"><?php bloginfo('name') ?></a></span></div>
    		<?php if (is_home()) { ?>
    		<h1 id="blog-description"><?php bloginfo('description') ?></h1>
    		<?php } else { ?>	
    		<div id="blog-description"><?php bloginfo('description') ?></div>
    		<?php } ?>
    	</div><!--  #branding -->
    	<div id="access">
    		<div class="skip-link"><a href="#content" title="<?php _e('Skip navigation to the content', 'thematic'); ?>"><?php _e('Skip to content', 'thematic'); ?></a></div>
            <?php sandbox_globalnav() ?>
        </div><!-- #access -->    
    </div><!-- #header-->   
    
    <div id="main">
    