<?php

// Open #branding
// In the header div
function thematic_brandingopen() { ?>
    	<div id="branding">
<?php }
add_action('thematic_header','thematic_brandingopen',1);

// Create the blog title
// In the header div
function thematic_blogtitle() { ?>
    		<div id="blog-title"><span><a href="<?php echo get_option('home') ?>/" title="<?php bloginfo('name') ?>" rel="home"><?php bloginfo('name') ?></a></span></div>
<?php }
add_action('thematic_header','thematic_blogtitle',3);

// Create the blog description
// In the header div
function thematic_blogdescription() {
    		if (is_home() || is_front_page()) { ?>
    		<h1 id="blog-description"><?php bloginfo('description') ?></h1>
    		<?php } else { ?>	
    		<div id="blog-description"><?php bloginfo('description') ?></div>
    		<?php }
}
add_action('thematic_header','thematic_blogdescription',5);

// Close #branding
// In the header div
function thematic_brandingclose() { ?>
    	</div><!--  #branding -->
<?php }
add_action('thematic_header','thematic_brandingclose',7);

// Create #access
// In the header div
function thematic_access() { ?>
    	<div id="access">
    		<div class="skip-link"><a href="#content" title="<?php _e('Skip navigation to the content', 'thematic'); ?>"><?php _e('Skip to content', 'thematic'); ?></a></div>
            <?php wp_page_menu('sort_column=menu_order') ?>
        </div><!-- #access -->
<?php }
add_action('thematic_header','thematic_access',9);

?>
