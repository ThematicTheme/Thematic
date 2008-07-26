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
    global $authordata;
    
    $posttitle = '<h2 class="entry-title"><a href="';
    $posttitle .= get_permalink();
    $posttitle .= '" title="';
    $posttitle .= __('Permalink to ', 'thematic') . wp_specialchars(get_the_title(), 1);
    $posttitle .= '" rel="bookmark">';
    $posttitle .= get_the_title();   
    $posttitle .= "</a></h2>\n";
    
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
    
    $postheader = $posttitle . $postmeta;    
    echo apply_filters( 'thematic_postheader', $postheader ); // Filter to override default post header
}

?>