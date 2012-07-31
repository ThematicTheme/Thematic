<?php
/**
 * Header Extensions
 *
 * @package ThematicCoreLibrary
 * @subpackage HeaderExtensions
 */
  

/**
 * Display the DOCTYPE
 * 
 * Filter: thematic_create_doctype
 */
function thematic_create_doctype() {
    $content = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' . "\n";
    $content .= '<html xmlns="http://www.w3.org/1999/xhtml"';
    echo apply_filters( 'thematic_create_doctype', $content );
}


/**
 * Display the HEAD profile
 * 
 * Filter: thematic_head_profile
 */
function thematic_head_profile() {
    $content = '<head profile="http://gmpg.org/xfn/11">' . "\n";
    echo apply_filters('thematic_head_profile', $content );
}


/**
 * Display the META content-type
 * 
 * Filter: thematic_create_contenttype
 */
function thematic_create_contenttype() {
    $content = "<meta http-equiv=\"Content-Type\" content=\"";
    $content .= get_bloginfo('html_type'); 
    $content .= "; charset=";
    $content .= get_bloginfo('charset');
    $content .= "\" />";
    $content .= "\n";
    echo apply_filters('thematic_create_contenttype', $content);
}


if ( function_exists('childtheme_override_doctitle') )  {
	/**
	 * @ignore
	 */
	 function thematic_doctitle() {
    	childtheme_override_doctitle();
    }
} else {
	/**
	 * Display the content of the title tag
	 * 
	 * Override: childtheme_override_doctitle
	 * Filter: thematic_doctitle_separator
	 *
	 */
	function thematic_doctitle() {
        $separator = apply_filters('thematic_doctitle_separator', '|');
        $doctitle = '<title>' . wp_title( $separator, false, 'right' ) . '</title>' . "\n";
        echo $doctitle;
	} // end thematic_doctitle
}

	
/**
 * Filters wp_title returning the doctitle contents
 * Located in header.php Credits: Tarski Theme
 * 
 * Override: childtheme_override_doctitle
 * Filter: thematic_doctitle_separator
 * Filter: thematic_doctitle
 *
 * @since 1.0.2
 */
function thematic_wptitle( $wp_doctitle, $separator, $sep_location ) { 
	// return original string if on feed or if a seo plugin is being used
    if ( is_feed() || !thematic_seo() )
    	return $wp_doctitle;
   	// otherwise...	
   	$site_name = get_bloginfo('name' , 'display');
        	
    if ( is_single() || ( is_home() && !is_front_page() ) || ( is_page() && !is_front_page() ) ) {
      $content = single_post_title('', FALSE);
    }
    elseif ( is_front_page() ) { 
      $content = get_bloginfo('description', 'display');
    }
    elseif ( is_page() ) { 
      $content = single_post_title('', FALSE); 
    }
    elseif ( is_search() ) { 
      $content = __('Search Results for:', 'thematic'); 
      $content .= ' ' . get_search_query();
    }
    elseif ( is_category() ) {
      $content = __('Category Archives:', 'thematic');
      $content .= ' ' . single_cat_title('', FALSE);;
    }
    elseif ( is_tag() ) { 
      $content = __('Tag Archives:', 'thematic');
      $content .= ' ' . thematic_tag_query();
    }
    elseif ( is_404() ) { 
      $content = __('Not Found', 'thematic'); 
    }
    else { 
      $content = get_bloginfo('description', 'display');
    }
    
    if ( get_query_var('paged') ) {
      $content .= ' ' .$separator. ' ';
      $content .= 'Page';
      $content .= ' ';
      $content .= get_query_var('paged');
    }
    
    if($content) {
      if ( is_front_page() ) {
          $elements = array(
            'site_name' => $site_name,
            'separator' => $separator,
            'content' 	=> $content
          );
      }
      else {
          $elements = array(
            'content' => $content
          );
      }  
    } else {
      $elements = array(
        'site_name' => $site_name
      );
    }
    
    // Filters should return an array
    $elements = apply_filters('thematic_doctitle', $elements);
       
    // But if they don't, it won't try to implode
    if( is_array($elements) ) {
        $thematic_doctitle = implode(' ', $elements);
    } else {
   	    $thematic_doctitle = $elements;
    }
   	
    return $thematic_doctitle;
}

add_filter( 'wp_title', 'thematic_wptitle', 10, 3);


/**
 * Switch Thematic's SEO functions on or off
 * 
 * Provides compatibility with SEO plugins: All in One SEO Pack, HeadSpace, 
 * Platinum SEO Pack, wpSEO and Yoast SEO. Default: ON
 * 
 * Filter: thematic_seo
 */
function thematic_seo() {
	if ( class_exists('All_in_One_SEO_Pack') || class_exists('HeadSpace_Plugin') || class_exists('Platinum_SEO_Pack') || class_exists('wpSEO') || defined('WPSEO_VERSION') ) {
		$content = FALSE;
	} else {
		$content = true;
	}
		return apply_filters( 'thematic_seo', $content );
}


/**
 * Switch use of thematic_the_excerpt() in the meta-tag description
 * 
 * Default: ON
 * 
 * Filter: thematic_use_excerpt
 */
function thematic_use_excerpt() {
    $display = TRUE;
    $display = apply_filters('thematic_use_excerpt', $display);
    return $display;
}


/**
 * Switch use of thematic_use_autoexcerpt() in the meta-tag description
 * 
 * Default: OFF
 * 
 * Filter: thematic_use_autoexcerpt
 */
function thematic_use_autoexcerpt() {
    $display = FALSE;
    $display = apply_filters('thematic_use_autoexcerpt', $display);
    return $display;
}


/**
 * Display the meta-tag description
 * 
 * This can be switched on or off using thematic_show_description
 * 
 * Filter: thematic_create_description
 */
function thematic_create_description() {
	$content = '';
	if ( thematic_seo() ) {
    	if ( is_single() || is_page() ) {
      		if ( have_posts() ) {
          		while ( have_posts() ) {
            		the_post();
					if ( thematic_the_excerpt() == "" ) {
                        if ( thematic_use_autoexcerpt() ) {
					    	$content = '<meta name="description" content="';
                    		$content .= thematic_excerpt_rss();
                    		$content .= '" />';
                    		$content .= "\n";
                        }
                	} else {
                        if ( thematic_use_excerpt() ) {
                    		$content = '<meta name="description" content="';
                    		$content .= thematic_the_excerpt();
                    		$content .= '" />';
                    		$content .= "\n";
                        }
                	}
            	}
        	}
        } elseif ( is_home() || is_front_page() ) {
    		$content = '<meta name="description" content="';
    		$content .= get_bloginfo( 'description', 'display' );
    		$content .= '" />';
    		$content .= "\n";
        }
        echo apply_filters ('thematic_create_description', $content);
	}
} // end thematic_create_description


/**
 * Switch creating the meta-tag description
 * 
 * Default: ON
 * 
 * Filter: thematic_show_description
 */
function thematic_show_description() {
    $display = TRUE;
    $display = apply_filters('thematic_show_description', $display);
    if ( $display ) {
        thematic_create_description();
    }
} // end thematic_show_description


/**
 * Create the robots meta-tag
 * 
 * This can be switched on or off using thematic_show_robots
 * 
 * Filter: thematic_create_robots
 */
function thematic_create_robots() {
        global $paged;
		if ( thematic_seo() ) {
    		if ( ( is_home() && ( $paged < 2 ) ) || is_front_page() || is_single() || is_page() || is_attachment() ) {
				$content = '<meta name="robots" content="index,follow" />';
    		} elseif ( is_search() ) {
        		$content = '<meta name="robots" content="noindex,nofollow" />';
    		} else {	
        		$content = '<meta name="robots" content="noindex,follow" />';
    		}
    		$content .= "\n";
    		if ( get_option('blog_public') ) {
    				echo apply_filters('thematic_create_robots', $content);
    		}
		}
} // end thematic_create_robots


/**
 * Switch creating the robots meta-tag
 * 
 * Default: ON
 * 
 * Filter: thematic_show_robots
 */
function thematic_show_robots() {
    $display = TRUE;
    $display = apply_filters('thematic_show_robots', $display);
    if ( $display ) {
        thematic_create_robots();
    }
} // end thematic_show_robots

/**
 * Display links to RSS feed
 * 
 * This can be switched on or off using thematic_show_rss. Default: ON
 * 
 * Filter: thematic_show_rss
 * Filter: thematic_rss
 */
function thematic_show_rss() {
    $display = TRUE;
    $display = apply_filters('thematic_show_rss', $display);
    if ($display) {
        $content = '<link rel="alternate" type="application/rss+xml" href="';
        $content .= get_feed_link( get_default_feed() );
        $content .= '" title="';
        $content .= esc_attr( get_bloginfo('name', 'display') );
        $content .= ' ' . __('Posts RSS feed', 'thematic');
        $content .= '" />';
        $content .= "\n";
        echo apply_filters('thematic_rss', $content);
    }
}


/**
 * Display links to RSS feed for comments
 * 
 * This can be switched on or off using thematic_show_commentsrss. Default: ON
 * 
 * Filter: thematic_show_commentsrss
 * Filter: thematic_commentsrss
 */
function thematic_show_commentsrss() {
    $display = TRUE;
    $display = apply_filters('thematic_show_commentsrss', $display);
    if ($display) {
        $content = '<link rel="alternate" type="application/rss+xml" href="';
        $content .= get_feed_link( 'comments_' . get_default_feed() );
        $content .= '" title="';
        $content .= esc_attr( get_bloginfo('name') );
        $content .= ' ' . __('Comments RSS feed', 'thematic');
        $content .= '" />';
        $content .= "\n";
        echo apply_filters('thematic_commentsrss', $content);
    }
}


/**
 * Display pingback link
 * 
 * This can be switched on or off using thematic_show_pingback. Default: ON
 * 
 * Filter: thematic_show_pingback
 * Filter: thematic_pingback_url
 */
function thematic_show_pingback() {
    $display = TRUE;
    $display = apply_filters('thematic_show_pingback', $display);
    if ($display) {
        $content = '<link rel="pingback" href="';
        $content .= get_bloginfo('pingback_url');
        $content .= '" />';
        $content .= "\n";
        echo apply_filters('thematic_pingback_url',$content);
    }
}

/**
 * Add the default stylesheet to the head of the document.
 * 
 * Register and enqueue Thematic style.css
 * 
 * @todo check WP versions > 3.3 for addiytion of wp_enqueue_styles
 */
function thematic_create_stylesheet() {
	wp_enqueue_style( 'thematic_style', get_stylesheet_uri() );
}

add_action('wp_enqueue_scripts','thematic_create_stylesheet');

if ( function_exists('childtheme_override_head_scripts') )  {
    /**
     * @ignore
     */
    function thematic_head_scripts() {
    	childtheme_override_head_scripts();
    }
} else {
    /**
     * Adds comment reply and navigation menu scripts to the head of the document.
     *
     * Child themes should use wp_dequeue_scripts to remove individual scripts.
     * Larger changes can be made using the override.
     *
     * Override: childtheme_override_head_scripts <br>
     *
     * For Reference: {@link http://users.tpg.com.au/j_birch/plugins/superfish/#getting-started Superfish Jquery Plugin}
     *
     * @since 1.0
     */
    function thematic_head_scripts() {
    	
    	// load comment reply script on posts and pages when option is set and check for deprecated filter
    	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			has_filter( 'thematic_show_commentreply' ) ? thematic_show_commentreply() : wp_enqueue_script( 'comment-reply' );
		
		// load jquery and superfish associated plugins when theme support is active
    	if ( current_theme_supports('thematic_superfish') ) {
			$scriptdir = get_template_directory_uri();
			$scriptdir .= '/library/scripts/';

			wp_enqueue_script('jquery');
			wp_deregister_script('hoverIntent');
      wp_enqueue_script('hoverIntent', includes_url('js/hoverIntent.js'), array('jquery'), false, true);
			wp_enqueue_script('superfish', $scriptdir . 'superfish.js', array('jquery'), '1.4.8', true);
			wp_enqueue_script('supersubs', $scriptdir . 'supersubs.js', array('jquery'), '0.2b', true);
			wp_enqueue_script('thematic-dropdowns', apply_filters('thematic_dropdown_options', $scriptdir . 'thematic-dropdowns.js') , array('jquery', 'superfish' ), '1.0', true);
     	
     	}
 	}
 }

add_action('wp_enqueue_scripts','thematic_head_scripts');


/**
 * Return the default arguments for wp_page_menu()
 * 
 * This is used as fallback when the user has not created a custom nav menu in wordpress admin
 * 
 * Filter: thematic_page_menu_args
 *
 * @return array
 */
function thematic_page_menu_args() {
	$args = array (
		'sort_column' => 'menu_order',
		'menu_class'  => 'menu',
		'include'     => '',
		'exclude'     => '',
		'echo'        => FALSE,
		'show_home'   => FALSE,
		'link_before' => '',
		'link_after'  => ''
	);
	return apply_filters('thematic_page_menu_args', $args);
}


/**
 * Return the default arguments for wp_nav_menu
 * 
 * Filter: thematic_primary_menu_id <br>
 * Filter: thematic_nav_menu_args
 *
 * @return array
 */
function thematic_nav_menu_args() {
	$args = array (
		'theme_location'	=> apply_filters('thematic_primary_menu_id', 'primary-menu'),
		'menu'				=> '',
		'container'			=> 'div',
		'container_class'	=> 'menu',
		'menu_class'		=> 'sf-menu',
		'fallback_cb'		=> 'wp_page_menu',
		'before'			=> '',
		'after'				=> '',
		'link_before'		=> '',
		'link_after'		=> '',
		'depth'				=> 0,
		'walker'			=> '',
		'echo'				=> false
	);
	
	return apply_filters('thematic_nav_menu_args', $args);
}


/**
 * Switch adding superfish css class to wp_page_menu
 * 
 * This adds a css class of "sf-menu" to the first <ul> of wp_page_menu. Default: ON
 * Switchable using included filter.
 * 
 * Filter: thematic_use_superfish
 *
 * @param string
 * @return string
 */
function thematic_add_menuclass($ulclass) {
	if ( apply_filters( 'thematic_use_superfish', TRUE ) ) {
		return preg_replace( '/<ul>/', '<ul class="sf-menu">', $ulclass, 1 );
	} else {
		return $ulclass;
	}
}


/**
 * Register action hook: thematic_before
 * 
 * Located in header.php, just after the opening body tag, before anything else.
 */
function thematic_before() {
    do_action( 'thematic_before' );
}


/**
 * Register action hook: thematic_abovefooter
 * 
 * Located in header.php, inside the header div
 */
function thematic_aboveheader() {
    do_action( 'thematic_aboveheader' );
}


/**
 * Register action hook: thematic_abovefooter
 * 
 * Located in header.php, inside the header div
 */
function thematic_header() {
    do_action( 'thematic_header' );
}


if ( function_exists( 'childtheme_override_brandingopen' ) )  {
	/**
	 * @ignore
	 */
	function thematic_brandingopen() {
		childtheme_override_brandingopen();
		}
	} else {
	/**
	 * Display the opening of the #branding div
	 * 
	 * Override: childtheme_override_brandingopen
	 */
    function thematic_brandingopen() {
    	echo "\t<div id=\"branding\">\n";
    }
}

add_action( 'thematic_header','thematic_brandingopen',1 );


if ( function_exists( 'childtheme_override_blogtitle' ) )  {
	/**
	 * @ignore
	 */
    function thematic_blogtitle() {
    	childtheme_override_blogtitle();
    }
} else {
    /**
     * Display the blog title within the #branding div
     * 
     * Override: childtheme_override_blogtitle
     */    
    function thematic_blogtitle() { 
    ?>
    
    	<div id="blog-title"><span><a href="<?php echo home_url() ?>/" title="<?php bloginfo('name') ?>" rel="home"><?php bloginfo('name') ?></a></span></div>
    
    <?php 
    }
}

add_action('thematic_header','thematic_blogtitle',3);


if ( function_exists('childtheme_override_blogdescription') )  {
	/**
	 * @ignore
	 */
    function thematic_blogdescription() {
    	childtheme_override_blogdescription();
    }
} else {
    /**
     * Display the blog description within the #branding div
     * 
     * Override: childtheme_override_blogdescription
     */
    function thematic_blogdescription() {
    	$blogdesc = '"blog-description">' . get_bloginfo('description', 'display');
    	if ( is_home() || is_front_page() ) { 
        	echo "\t<h1 id=$blogdesc</h1>\n\n";
        } else {	
        	echo "\t<div id=$blogdesc</div>\n\n";
        }
    }
}

add_action('thematic_header','thematic_blogdescription',5);


if ( function_exists('childtheme_override_brandingclose') )  {
	/**
	 * @ignore
	 */
	 function thematic_brandingclose() {
    	childtheme_override_brandingclose();
    }
} else {
    /**
     * Display the closing of the #branding div
     * 
     * Override: childtheme_override_brandingclose
     */    
    function thematic_brandingclose() {
    	echo "\t\t</div><!--  #branding -->\n";
    }
}

add_action('thematic_header','thematic_brandingclose',7);


if ( function_exists('childtheme_override_access') )  {
    /**
	 * @ignore
	 */
	 function thematic_access() {
    	childtheme_override_access();
    }
} else {
    /**
     * Display the #access div
     * 
     * Override: childtheme_override_access
     */    
    function thematic_access() { 
    ?>
    
    <div id="access">
    
    	<div class="skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip navigation to the content', 'thematic' ); ?>"><?php _e('Skip to content', 'thematic'); ?></a></div><!-- .skip-link -->
    	
    	<?php 
    	if ( ( function_exists("has_nav_menu") ) && ( has_nav_menu( apply_filters('thematic_primary_menu_id', 'primary-menu') ) ) ) {
    	    echo  wp_nav_menu(thematic_nav_menu_args());
    	} else {
    	    echo  thematic_add_menuclass(wp_page_menu(thematic_page_menu_args()));	
    	}
    	?>
    	
    </div><!-- #access -->
    <?php 
    }
}

add_action('thematic_header','thematic_access',9);


/**
 * Register action hook: thematic_belowheader
 * 
 * Located in header.php, just after the header div
 */
function thematic_belowheader() {
    do_action('thematic_belowheader');
} // end thematic_belowheader
		

?>