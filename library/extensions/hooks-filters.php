<?php

//
// Thematic Theme hooks
//

// Located in header.php 
// Just after the opening body tag, before anything else.
function thematic_before() {
    do_action('thematic_before');
}

// Located in header.php 
// Just before the header div
function thematic_aboveheader() {
    do_action('thematic_aboveheader');
}

// Located in header.php
// In the header div
function thematic_header() {
    do_action('thematic_header');
}

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

// Located in header.php 
// Just after the header div
function thematic_belowheader() {
    do_action('thematic_belowheader');
}

// Located in comments.php
// Just before #comments
function thematic_abovecomments() {
    do_action('thematic_abovecomments');
}

// Located in comments.php
// Just before #comments-list
function thematic_abovecommentslist() {
    do_action('thematic_abovecommentslist');
}

// Located in comments.php
// Just after #comments-list
function thematic_belowcommentslist() {
    do_action('thematic_belowcommentslist');
}

// Located in comments.php
// Just before #trackbacks-list
function thematic_abovetrackbackslist() {
    do_action('thematic_abovetrackbackslist');
}

// Located in comments.php
// Just after #trackbacks-list
function thematic_belowtrackbackslist() {
    do_action('thematic_belowtrackbackslist');
}

// Located in comments.php
// Just before the comments form
function thematic_abovecommentsform() {
    do_action('thematic_abovecommentsform');
}

// Adds the Subscribe to comments button
function thematic_show_subscription_checkbox() {
    if(function_exists('show_subscription_checkbox')) { show_subscription_checkbox(); }
}
add_action('comment_form', 'thematic_show_subscription_checkbox', 98);

// Located in comments.php
// Just after the comments form
function thematic_belowcommentsform() {
    do_action('thematic_belowcommentsform');
}

// Adds the Subscribe without commenting button
function thematic_show_manual_subscription_form() {
    if(function_exists('show_manual_subscription_form')) { show_manual_subscription_form(); }
}
add_action('thematic_belowcommentsform', 'thematic_show_manual_subscription_form', 5);

// Located in comments.php
// Just after #comments
function thematic_belowcomments() {
    do_action('thematic_belowcomments');
}

// Located in sidebar.php 
// Just before the main asides (commonly used as sidebars)
function thematic_abovemainasides() {
    do_action('thematic_abovemainasides');
}

// Located in sidebar.php 
// Between the main asides (commonly used as sidebars)
function thematic_betweenmainasides() {
    do_action('thematic_betweenmainasides');
}

// Located in sidebar.php 
// after the main asides (commonly used as sidebars)
function thematic_belowmainasides() {
    do_action('thematic_belowmainasides');
}

// Located in footer.php
// Just before the footer div
function thematic_abovefooter() {
    do_action('thematic_abovefooter');
}

// Located in footer.php
// Just after the footer div
function thematic_belowfooter() {
    do_action('thematic_belowfooter');
}

// Located in footer.php 
// Just before the closing body tag, after everything else.
function thematic_after() {
    do_action('thematic_after');
}

//
// Thematic Theme Filters
//

// Located in header.php 
// Creates the DOCTYPE section
function thematic_create_doctype() {
    $content = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' . "\n";
    $content .= '<html xmlns="http://www.w3.org/1999/xhtml"';
    echo apply_filters('thematic_create_head', $content);
}

// Located in header.php 
// Creates the content of the Title tag
// Credits: Tarski Theme
function thematic_doctitle() {

    $site_name = get_bloginfo('name');
    $separator = '|';
        	
    if ( is_single() ) {
      $content = single_post_title('', FALSE);
    }
    elseif ( is_home() || is_front_page() ) { 
      $content = get_bloginfo('description');
    }
    elseif ( is_page() ) { 
      $content = single_post_title('', FALSE); 
    }
    elseif ( is_search() ) { 
      $content = __('Search Results for:', 'thematic'); 
      $content .= ' ' . wp_specialchars(stripslashes(get_search_query()), true);
    }
    elseif ( is_category() ) {
      $content = __('Category Archives:', 'thematic');
      $content .= ' ' . single_cat_title("", false);;
    }
    elseif ( is_tag() ) { 
      $content = __('Tag Archives:', 'thematic');
      $content .= ' ' . thematic_tag_query();
    }
    elseif ( is_404() ) { 
      $content = __('Not Found', 'thematic'); 
    }
    else { 
      $content = get_bloginfo('description');
    }

    if (get_query_var('paged')) {
      $content .= ' ' .$separator. ' ';
      $content .= 'Page';
      $content .= ' ';
      $content .= get_query_var('paged');
    }

    if($content) {
      if ( is_home() || is_front_page() ) {
          $elements = array(
            'site_name' => $site_name,
            'separator' => $separator,
            'content' => $content
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
    if(is_array($elements)) {
      $doctitle = implode(' ', $elements);
    }
    else {
      $doctitle = $elements;
    }
    
    $doctitle = "\t" . "<title>" . $doctitle . "</title>" . "\n\n";
      
    echo $doctitle;

}

// Located in header.php 
// Creates the content-type section
function thematic_create_contenttype() {
    $content  = "\t";
    $content .= "<meta http-equiv=\"content-type\" content=\"";
    $content .= get_bloginfo('html_type'); 
    $content .= " charset=";
    $content .= get_bloginfo('charset');
    $content .= "\"";
    $content .= "/>";
    $content .= "\n\n";
    echo apply_filters('thematic_create_contenttype', $content);
}

// Creates the canonical URL
function thematic_canonical_url() {
    if ( is_singular() ) {
        $canonical_url ="\t";
        $canonical_url .= '<link rel="canonical" href="' . get_permalink() . '"/>';
        $canonical_url .= "\n\n";        
        echo apply_filters('thematic_canonical_url', $canonical_url);
    }

}

// switch use of thematic_the_excerpt() - default: ON
function thematic_use_excerpt() {
    $display = TRUE;
    $display = apply_filters('thematic_use_excerpt', $display);
    return $display;
}

// switch use of thematic_the_excerpt() - default: OFF
function thematic_use_autoexcerpt() {
    $display = FALSE;
    $display = apply_filters('thematic_use_autoexcerpt', $display);
    return $display;
}

// Creates the meta-tag description
function thematic_create_description() {

    if (is_single() || is_page() ) {
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                if (thematic_the_excerpt() == "") {
                    if (thematic_use_autoexcerpt()) {
                        $content ="\t";
                        $content .= "<meta name=\"description\" content=\"";
                        $content .= thematic_excerpt_rss();
                        $content .= "\" />";
                        $content .= "\n\n";
                    }
                } else {
                    if (thematic_use_excerpt()) {
                        $content ="\t";
                        $content .= "<meta name=\"description\" content=\"";
                        $content .= thematic_the_excerpt();
                        $content .= "\" />";
                        $content .= "\n\n";
                    }
                }
            }
        }
    } elseif(is_home()) {
        $content ="\t";
        $content .= "<meta name=\"description\" content=\"";
        $content .= get_bloginfo('description');
        $content .= "\" />";
        $content .= "\n\n";
    }
    echo apply_filters ('thematic_create_description', $content);
}

// Located in header.php
// meta-tag description is switchable using a filter
function thematic_show_description() {
    $display = TRUE;
    apply_filters('thematic_show_description', $display);
    if ($display) {
        thematic_create_description();
    }
}

// create meta-tag robots
function thematic_create_robots() {
    $content = "\t";
    if((is_home() && ($paged < 2 )) || is_front_page() || is_single() || is_page() || is_attachment()) {
      $content .= "<meta name=\"robots\" content=\"index,follow\" />";
    } elseif (is_search()) {
        $content .= "<meta name=\"robots\" content=\"noindex,nofollow\" />";
    } else {	
        $content .= "<meta name=\"robots\" content=\"noindex,follow\" />";
    }
    $content .= "\n\n";
    echo apply_filters('thematic_create_robots', $content);
}

// Located in header.php
// meta-tag robots is switchable using a filter
function thematic_show_robots() {
    $display = TRUE;
    apply_filters('thematic_show_robots', $display);
    if ($display) {
        thematic_create_robots();
    }
}

// Located in header.php
// creates link to style.css
function thematic_create_stylesheet() {
    $content = "\t";
    $content .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"";
    $content .= get_bloginfo('stylesheet_url');
    $content .= "\" />";
    $content .= "\n\n";
    echo apply_filters('thematic_create_stylesheet', $content);
}

// Located in header.php
// rss usage is switchable using a filter
function thematic_show_rss() {
    $display = TRUE;
    apply_filters('thematic_show_rss', §display);
    if (§display) {
        $content = "\t";
        $content .= "<link rel=\"alternate\" type=\"application/rss+xml\" href=\"";
        $content .= get_bloginfo('rss2_url');
        $content .= "\" title=\"";
        $content .= wp_specialchars(get_bloginfo('name'), 1);
        $content .= " " . __('Posts RSS feed', 'thematic');
        $content .= "\" />";
        $content .= "\n";
        echo $content;
    }
}

// Located in header.php
// comments rss usage is switchable using a filter
function thematic_show_commentsrss() {
    $display = TRUE;
    apply_filters('thematic_show_commentsrss', §display);
    if (§display) {
        $content = "\t";
        $content .= "<link rel=\"alternate\" type=\"application/rss+xml\" href=\"";
        $content .= get_bloginfo('comments_rss2_url');
        $content .= "\" title=\"";
        $content .= wp_specialchars(get_bloginfo('name'), 1);
        $content .= " " . __('Comments RSS feed', 'thematic');
        $content .= "\" />";
        $content .= "\n\n";
        echo $content;
    }
}

// Located in header.php
// pingback usage is switchable using a filter
function thematic_show_pingback() {
    $display = TRUE;
    apply_filters('thematic_show_pingback', §display);
    if (§display) {
        $content = "\t";
        $content .= "<link rel=\"pingback\" href=\"";
        $content .= get_bloginfo('pingback_url');
        $content .= "\" />";
        $content .= "\n\n";
        echo $content;
    }
}

// Located in header.php
// comment reply usage is switchable using a filter
function thematic_show_commentreply() {
    $display = TRUE;
    apply_filters('thematic_show_commentreply', §display);
    if (§display)
        if ( is_singular() ) 
            wp_enqueue_script( 'comment-reply' ); // support for comment threading
}

// Add ID and CLASS attributes to the first <ul> occurence in wp_page_menu
function thematic_add_menuclass($ulclass) {
return preg_replace('/<ul>/', '<ul id="nav" class="sf-menu">', $ulclass, 1);
}
add_filter('wp_page_menu','thematic_add_menuclass');

// Filter to create the time url title displayed in Post Header
function thematic_time_title() {

  $time_title = 'Y-m-d\TH:i:sO';

	// Filters should return correct 
	$time_title = apply_filters('thematic_time_title', $time_title);
	
	return $time_title;
}

// Filter to create the time displayed in Post Header
function thematic_time_display() {

  $time_display = get_option('date_format');

	// Filters should return correct 
	$time_display = apply_filters('thematic_time_display', $time_display);
	
	return $time_display;
}


// Filter to create the sidebar
function thematic_sidebar() {

  $show = TRUE;

	// Filters should return Boolean 
	$show = apply_filters('thematic_sidebar', $show);
	
	if ($show) {
    get_sidebar();}
	
	return;
}

// Information in Post Header
function thematic_postheader() {
    global $id, $post, $authordata;
    
    // Create $posteditlink    
    $posteditlink .= '<a href="' . get_bloginfo('wpurl') . '/wp-admin/post.php?action=edit&amp;post=' . $id;
    $posteditlink .= '" title="' . __('Edit post', 'thematic') .'">';
    $posteditlink .= __('Edit', 'thematic') . '</a>';
    $posteditlink = apply_filters('thematic_postheader_posteditlink',$posteditlink); 

    
    if (is_single() || is_page()) {
        $posttitle = '<h1 class="entry-title">' . get_the_title() . "</h1>\n";
    } elseif (is_404()) {    
        $posttitle = '<h1 class="entry-title">' . __('Not Found', 'thematic') . "</h1>\n";
    } else {
        $posttitle = '<h2 class="entry-title"><a href="';
        $posttitle .= get_permalink();
        $posttitle .= '" title="';
        $posttitle .= __('Permalink to ', 'thematic') . the_title_attribute('echo=0');
        $posttitle .= '" rel="bookmark">';
        $posttitle .= get_the_title();   
        $posttitle .= "</a></h2>\n";
    }
    $posttitle = apply_filters('thematic_postheader_posttitle',$posttitle); 
    
    $postmeta = '<div class="entry-meta">';
    $postmeta .= '<span class="author vcard">';
    $postmeta .= __('By ', 'thematic') . '<a class="url fn n" href="';
    $postmeta .= get_author_link(false, $authordata->ID, $authordata->user_nicename);
    $postmeta .= '" title="' . __('View all posts by ', 'thematic') . get_the_author() . '">';
    $postmeta .= get_the_author();
    $postmeta .= '</a></span><span class="meta-sep"> | </span>';
    $postmeta .= __('Published: ', 'thematic');
    $postmeta .= '<span class="entry-date"><abbr class="published" title="';
    $postmeta .= get_the_time(thematic_time_title()) . '">';
    $postmeta .= get_the_time(thematic_time_display());
    $postmeta .= '</abbr></span>';
    // Display edit link
    if (current_user_can('edit_posts')) {
        $postmeta .= ' <span class="meta-sep">|</span> ' . $posteditlink;
    }               
    $postmeta .= "</div><!-- .entry-meta -->\n";
    $postmeta = apply_filters('thematic_postheader_postmeta',$postmeta); 

    
    if ($post->post_type == 'page' || is_404()) {
        $postheader = $posttitle;        
    } else {
        $postheader = $posttitle . $postmeta;    
    }
    
    echo apply_filters( 'thematic_postheader', $postheader ); // Filter to override default post header
}

// Information in Post Footer
function thematic_postfooter() {
    global $id, $post;

    // Create $posteditlink    
    $posteditlink .= '<a href="' . get_bloginfo('wpurl') . '/wp-admin/post.php?action=edit&amp;post=' . $id;
    $posteditlink .= '" title="' . __('Edit post', 'thematic') .'">';
    $posteditlink .= __('Edit', 'thematic') . '</a>';
    $posteditlink = apply_filters('thematic_postfooter_posteditlink',$posteditlink); 
    
    // Display the post categories  
    $postcategory .= '<span class="cat-links">';
    if (is_single()) {
        $postcategory .= __('This entry was posted in ', 'thematic') . get_the_category_list(', ');
        $postcategory .= '</span>';
    } elseif ( is_category() && $cats_meow = thematic_cats_meow(', ') ) { /* Returns categories other than the one queried */
        $postcategory .= __('Also posted in ', 'thematic') . $cats_meow;
        $postcategory .= '</span> <span class="meta-sep">|</span>';
    } else {
        $postcategory .= __('Posted in ', 'thematic') . get_the_category_list(', ');
        $postcategory .= '</span> <span class="meta-sep">|</span>';
    }
    $postcategory = apply_filters('thematic_postfooter_postcategory',$postcategory); 
    
    // Display the tags
    if (is_single()) {
        $tagtext = __(' and tagged', 'thematic');
        $posttags = get_the_tag_list("<span class=\"tag-links\"> $tagtext ",', ','</span>');
    } elseif ( is_tag() && $tag_ur_it = thematic_tag_ur_it(', ') ) { /* Returns tags other than the one queried */
        $posttags = '<span class="tag-links">' . __(' Also tagged ', 'thematic') . $tag_ur_it . '</span> <span class="meta-sep">|</span>';
    } else {
        $tagtext = __('Tagged', 'thematic');
        $posttags = get_the_tag_list("<span class=\"tag-links\"> $tagtext ",', ','</span> <span class="meta-sep">|</span>');
    }
    $posttags = apply_filters('thematic_postfooter_posttags',$posttags); 
    
    // Display comments link and edit link
    if (comments_open()) {
        $postcommentnumber = get_comments_number();
        if ($postcommentnumber > '1') {
            $postcomments = ' <span class="comments-link"><a href="' . get_permalink() . '#comments" title="' . __('Comment on ', 'thematic') . the_title_attribute('echo=0') . '">';
            $postcomments .= get_comments_number() . __(' Comments', 'thematic') . '</a></span>';
        } elseif ($postcommentnumber == '1') {
            $postcomments = ' <span class="comments-link"><a href="' . get_permalink() . '#comments" title="' . __('Comment on ', 'thematic') . the_title_attribute('echo=0') . '">';
            $postcomments .= get_comments_number() . __(' Comment', 'thematic') . '</a></span>';
        } elseif ($postcommentnumber == '0') {
            $postcomments = ' <span class="comments-link"><a href="' . get_permalink() . '#comments" title="' . __('Comment on ', 'thematic') . the_title_attribute('echo=0') . '">';
            $postcomments .= __('Leave a comment', 'thematic') . '</a></span>';
        }
    } else {
        $postcomments = ' <span class="comments-link">' . __('Comments closed', 'thematic') .'</span>';
    }
    // Display edit link
    if (current_user_can('edit_posts')) {
        $postcomments .= ' <span class="meta-sep">|</span> ' . $posteditlink;
    }               
    $postcomments = apply_filters('thematic_postfooter_postcomments',$postcomments); 
    
    // Display permalink, comments link, and RSS on single posts
    $postconnect .= __('. Bookmark the ', 'thematic') . '<a href="' . get_permalink() . '" title="' . __('Permalink to ', 'thematic') . the_title_attribute('echo=0') . '">';
    $postconnect .= __('permalink', 'thematic') . '</a>.';
    if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) { /* Comments are open */
        $postconnect .= ' <a class="comment-link" href="#respond" title ="' . __('Post a comment', 'thematic') . '">' . __('Post a comment', 'thematic') . '</a>';
        $postconnect .= __(' or leave a trackback: ', 'thematic');
        $postconnect .= '<a class="trackback-link" href="' . trackback_url(FALSE) . '" title ="' . __('Trackback URL for your post', 'thematic') . '" rel="trackback">' . __('Trackback URL', 'thematic') . '</a>.';
    } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) { /* Only trackbacks are open */
        $postconnect .= __(' Comments are closed, but you can leave a trackback: ', 'thematic');
        $postconnect .= '<a class="trackback-link" href="' . trackback_url(FALSE) . '" title ="' . __('Trackback URL for your post', 'thematic') . '" rel="trackback">' . __('Trackback URL', 'thematic') . '</a>.';
    } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) { /* Only comments open */
        $postconnect .= __(' Trackbacks are closed, but you can ', 'thematic');
        $postconnect .= '<a class="comment-link" href="#respond" title ="' . __('Post a comment', 'thematic') . '">' . __('post a comment', 'thematic') . '</a>.';
    } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) { /* Comments and trackbacks closed */
        $postconnect .= __(' Both comments and trackbacks are currently closed.', 'thematic');
    }
    // Display edit link on single posts
    if (current_user_can('edit_posts')) {
        $postconnect .= ' ' . $posteditlink;
    }
    $postconnect = apply_filters('thematic_postfooter_postconnect',$postconnect); 
    
    
    // Add it all up
    if ($post->post_type == 'page' && current_user_can('edit_posts')) { /* For logged-in "page" search results */
        $postfooter = '<div class="entry-utility">' . $posteditlink;
        $postfooter .= "</div><!-- .entry-utility -->\n";    
    } elseif ($post->post_type == 'page') { /* For logged-out "page" search results */
        $postfooter = '';
    } else {
        if (is_single()) {
            $postfooter = '<div class="entry-utility">' . $postcategory . $posttags . $postconnect;
        } else {
            $postfooter = '<div class="entry-utility">' . $postcategory . $posttags . $postcomments;
        }
        $postfooter .= "</div><!-- .entry-utility -->\n";    
    }
    
    // Put it on the screen
    echo apply_filters( 'thematic_postfooter', $postfooter ); // Filter to override default post footer
}

// For category lists on category archives: Returns other categories except the current one (redundant)
function thematic_cats_meow($glue) {
	$current_cat = single_cat_title( '', false );
	$separator = "\n";
	$cats = explode( $separator, get_the_category_list($separator) );
	foreach ( $cats as $i => $str ) {
		if ( strstr( $str, ">$current_cat<" ) ) {
			unset($cats[$i]);
			break;
		}
	}
	if ( empty($cats) )
		return false;

	return trim(join( $glue, $cats ));
}

// For tag lists on tag archives: Returns other tags except the current one (redundant)
function thematic_tag_ur_it($glue) {
	$current_tag = single_tag_title( '', '',  false );
	$separator = "\n";
	$tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
	foreach ( $tags as $i => $str ) {
		if ( strstr( $str, ">$current_tag<" ) ) {
			unset($tags[$i]);
			break;
		}
	}
	if ( empty($tags) )
		return false;

	return trim(join( $glue, $tags ));
}

// Produces an avatar image with the hCard-compliant photo class
function thematic_commenter_link() {
	$commenter = get_comment_author_link();
	if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
		$commenter = ereg_replace( '(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter );
	} else {
		$commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );
	}
	$avatar_email = get_comment_author_email();
	$avatar_size = apply_filters( 'avatar_size', '80' ); // Available filter: avatar_size
	$avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, $avatar_size ) );
	echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
}

// located in footer.php
// the footer text can now be filtered and controlled from your own functions.php
function thematic_footertext($thm_footertext) {
    $thm_footertext = apply_filters('thematic_footertext', $thm_footertext);
    return $thm_footertext;
}

?>