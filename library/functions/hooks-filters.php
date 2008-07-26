<?php

function thematic_belowheader() {
    do_action('thematic_belowheader');
}

function thematic_abovefooter() {
    do_action('thematic_abovefooter');
}

// Produces a clean list of pages in the header — thanks to Scott Wallick and Andy Skelton.
function sandbox_globalnav() {
	$menu = '<div id="menu"><ul>';
	$menu .= str_replace( array( "\r", "\n", "\t" ), '', wp_list_pages('title_li=&sort_column=menu_order&echo=0') );
	$menu .= "</ul></div>\n";
	echo apply_filters( 'sandbox_menu', $menu ); // Filter to override default globalnav
}

// Information in Post Header
function thematic_postheader() {
    global $post, $authordata;
    
    if (is_single() || is_page()) {
        $posttitle = '<h1 class="entry-title">' . get_the_title() . "</h1>\n";
    } elseif (is_404()) {    
        $posttitle = '<h1 class="entry-title">' . __('Not Found', 'thematic') . "</h1>\n";
    } else {
        $posttitle = '<h2 class="entry-title"><a href="';
        $posttitle .= get_permalink();
        $posttitle .= '" title="';
        $posttitle .= __('Permalink to ', 'thematic') . wp_specialchars(get_the_title(), 1);
        $posttitle .= '" rel="bookmark">';
        $posttitle .= get_the_title();   
        $posttitle .= "</a></h2>\n";
    }
    
    $postmeta = '<div class="entry-meta">';
    $postmeta .= '<span class="author vcard">';
    $postmeta .= __('By ', 'thematic') . '<a class="url fn n" href="';
    $postmeta .= get_author_link(false, $authordata->ID, $authordata->user_nicename);
    $postmeta .= '" title="' . __('View all posts by ', 'thematic') . get_the_author() . '">';
    $postmeta .= get_the_author();
    $postmeta .= '</a></span><span class="meta-sep"> | </span>';
    $postmeta .= '<span class="entry-date"><abbr class="published" title="';
    $postmeta .= get_the_time('Y-m-d\TH:i:sO') . '">';
    $postmeta .= the_date('', '', '', false);
    $postmeta .= '</abbr></span>';
    $postmeta .= "</div><!-- .entry-meta -->\n";
    
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
    $posteditlink .= '<a href="' . get_bloginfo('wpurl') . '/wp-admin/post.php?action=edit&post=' . $id;
    $posteditlink .= '" title="' . __('Edit post', 'thematic') .'">';
    $posteditlink .= __('Edit', 'thematic') . '</a>';
    
    // Display the post categories  
    $postcategory = '<div class="entry-utility">';
    $postcategory .= '<span class="cat-links">';
    if (is_single()) {
        $postcategory .= __('This entry was posted in ', 'thematic') . get_the_category_list(', ');
        $postcategory .= '</span>';
    } else {
        $postcategory .= __('Posted in ', 'thematic') . get_the_category_list(', ');
        $postcategory .= '</span> <span class="meta-sep">|</span>';
    }
    
    // Display the tags
    if (is_single()) {
        $tagtext = __(' and tagged', 'thematic');
        $posttags = get_the_tag_list("<span class=\"tag-links\"> $tagtext ",', ','</span>');
    } else {
        $tagtext = __('Tagged', 'thematic');
        $posttags = get_the_tag_list("<span class=\"tag-links\"> $tagtext ",', ','</span> <span class="meta-sep">|</span>');
    }
    
    // Display comments link and edit link
    if (comments_open()) {
        $postcommentnumber = get_comments_number();
        if ($postcommentnumber > '1') {
            $postcomments = ' <a href="' . get_permalink() . '#comments" title="' . __('Comment on ', 'thematic') . wp_specialchars(get_the_title(), 1) . '">';
            $postcomments .= get_comments_number() . __(' Comments', 'thematic') . '</a>';
        } elseif ($postcommentnumber == '1') {
            $postcomments = ' <a href="' . get_permalink() . '#comments" title="' . __('Comment on ', 'thematic') . wp_specialchars(get_the_title(), 1) . '">';
            $postcomments .= get_comments_number() . __(' Comment', 'thematic') . '</a>';
        } elseif ($postcommentnumber == '0') {
            $postcomments = ' <a href="' . get_permalink() . '#comments" title="' . __('Comment on ', 'thematic') . wp_specialchars(get_the_title(), 1) . '">';
            $postcomments .= __('Leave a comment', 'thematic') . '</a>';
        }
    } else {
        $postcomments = ' <span class="comments-link">Comments Closed</span>';
    }
    // Display edit link
    if (current_user_can('edit_posts')) {
        $postcomments .= ' <span class="meta-sep">|</span> ' . $posteditlink;
    }               
    
    // Display permalink, comments link, and RSS on single posts
    $postconnect .= __('. Bookmark the ', 'thematic') . '<a href="' . get_permalink() . '" title="' . __('Permalink to ', 'thematic') . wp_specialchars(get_the_title(), 1) . '">';
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
    
    // Add it all up
    if ($post->post_type == 'page' && current_user_can('edit_posts')) { /* For logged-in "page" search results */
        $postfooter = '<div class="entry-utility">' . $posteditlink;
        $postfooter .= "</div><!-- .entry-utility -->\n";    
    } elseif ($post->post_type == 'page') { /* For logged-out "page" search results */
        $postfooter = '';
    } else {
        if (is_single()) {
            $postfooter = $postcategory . $posttags . $postconnect;
        } else {
            $postfooter = $postcategory . $posttags . $postcomments;
        }
        $postfooter .= "</div><!-- .entry-utility -->\n";    
    }
    
    // Put it on the screen
    echo apply_filters( 'thematic_postfooter', $postfooter ); // Filter to override default post footer
}

?>