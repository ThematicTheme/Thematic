<?php

// Filter to create the sidebar
function thematic_sidebar() {

  $show = TRUE;

	// Filters should return Boolean 
	$show = apply_filters('thematic_sidebar', $show);
	
	if ($show) {
    get_sidebar();}
	
	return;
}


// Located in sidebar.php 
// Just before the main asides (commonly used as sidebars)
function thematic_abovemainasides() {
    do_action('thematic_abovemainasides');
} // end thematic_abovemainasides


// Located in sidebar.php 
// Between the main asides (commonly used as sidebars)
function thematic_betweenmainasides() {
    do_action('thematic_betweenmainasides');
} // end thematic_betweenmainasides


// Located in sidebar.php 
// after the main asides (commonly used as sidebars)
function thematic_belowmainasides() {
    do_action('thematic_belowmainasides');
} // end thematic_belowmainasides