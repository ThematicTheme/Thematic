<?php

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

// creates the list comments arguments
function list_comments_arg() {
	$content = 'type=comment&callback=thematic_comments';
	return apply_filters('list_comments_arg', $content);
}

?>