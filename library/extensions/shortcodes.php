<?php
/**
 * Shortcodes
 *
 * @package ThematicCoreLibrary
 * @subpackage Shortcodes
 *
 * @todo review functions and revisit documentation
 */


/**
 * thmfooter_wp_link function.
 * 
 */
function thmfooter_wp_link() {
    return '<a class="wp-link" href="http://WordPress.org/" title="WordPress" rel="generator">WordPress</a>';
}
add_shortcode('wp-link', 'thmfooter_wp_link');		  

		  
/**
 * thmfooter_theme_link function.
 * 
 */
function thmfooter_theme_link() {
    $themelink = '<a class="theme-link" href="http://themeshaper.com/thematic/" title="Thematic Theme Framework" rel="designer">Thematic Theme Framework</a>';
    return apply_filters('thematic_theme_link',$themelink);
}
add_shortcode('theme-link', 'thmfooter_theme_link');	


/**
 * thmfooter_login_link function.
 * 
 */
function thmfooter_login_link() {
    if ( ! is_user_logged_in() )
        $link = '<a href="' . site_url('/wp-login.php') . '">' . __('Login','thematic') . '</a>';
    else
    $link = '<a href="' . wp_logout_url() . '">' . __('Logout','thematic') . '</a>';
    return apply_filters('loginout', $link);
}
add_shortcode('loginout-link', 'thmfooter_login_link');		  	  


/**
 * thmfooter_blog_title function.
 * 
 */
function thmfooter_blog_title() {
	return '<span class="blog-title">' . get_bloginfo('name', 'display') . '</span>';
}
add_shortcode('blog-title', 'thmfooter_blog_title');


/**
 * thmfooter_blog_link function.
 *
 */
function thmfooter_blog_link() {
	return '<a href="' . site_url('/') . '" title="' . esc_attr( get_bloginfo('name', 'display') ) . '" >' . get_bloginfo('name', 'display') . "</a>";
}
add_shortcode('blog-link', 'thmfooter_blog_link');


/**
 * thmfooter_year function.
 * 
 */
function thmfooter_year() {   
    return '<span class="the-year">' . date('Y') . '</span>';
}
add_shortcode('the-year', 'thmfooter_year');





// Providing information about Thematic


/**
 * theme_name function.
 * 
 */
function theme_name() {
    return THEMENAME;
}
add_shortcode('theme-name', 'theme_name');


/**
 * theme_author function.
 * 
 */
function theme_author() {
    return THEMEAUTHOR;
}
add_shortcode('theme-author', 'theme_author');


/**
 * theme_uri function.
 * 
 */
function theme_uri() {
    return THEMEURI;
}
add_shortcode('theme-uri', 'theme_uri');


/**
 * theme_version function.
 * 
 */
function theme_version() {
    return THEMATICVERSION;
}
add_shortcode('theme-version', 'theme_version');





// Providing information about the child theme


/**
 * child_name function.
 * 
 */
function child_name() {
    return TEMPLATENAME;
}
add_shortcode('child-name', 'child_name');


/**
 * child_author function.
 * 
 */
function child_author() {
    return TEMPLATEAUTHOR;
}
add_shortcode('child-author', 'child_author');


/**
 * child_uri function.
 * 
 */
function child_uri() {
    return TEMPLATEURI;
}
add_shortcode('child-uri', 'child_uri');


/**
 * child_version function.
 * 
 */
function child_version() {
    return TEMPLATEVERSION;
}
add_shortcode('child-version', 'child_version');

?>