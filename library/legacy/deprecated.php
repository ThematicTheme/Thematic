<?php
/**
 * Deprecated Functions
 *
 * @package ThematicLegacy
 */
 
/**
 * Function for handling the bloginfo / get_bloginfo data using our own 'cache'.
 *
 * We removed the functionality because it will not run on all systems. The system used
 * a fallback, but we could not guarantee that the fallback would meet every possible
 * error condition.
 *
 * @since 0.9.6
 * @deprecated 0.9.6.1
 */
function thm_bloginfo($command = '', $echo = FALSE) {

	_deprecated_function( __FUNCTION__, '0.9.6.1', 'bloginfo() or get_bloginfo()' );

    if ($echo) {
	   bloginfo($command);
    } else {
        return get_bloginfo($command);
    }
}


/**
 * Function for testing, if a sidebar has registered widgets.
 *
 * We removed the functionality because WordPress own function is_active_sidebar() is 
 * stable.
 *
 * @since 0.9.6
 * @deprecated 0.9.7.3
 */
function is_sidebar_active( $index ){

	_deprecated_function( __FUNCTION__, '0.9.7.3', 'is_active_sidebar()' );

	return is_active_sidebar( $index );

}


/**
 * Switch adding the comment-reply script 
 * 
 * Removed in favor of hooking into wp_enqueue_scripts over calling directly in header.php
 * Note that in 0.9.8 the comment reply script is still enqueued by default.
 * Use wp_dequeue_script('comment-reply') to remove the script instead of using the filter: thematic_show_commentreply.
 *
 * @deprecated 0.9.8
 */
function thematic_show_commentreply() {
	_deprecated_function( __FUNCTION__, '0.9.8' );

    $display = TRUE;
    $display = apply_filters('thematic_show_commentreply', $display);
    if ($display)
        if ( is_singular() ) 
            wp_enqueue_script('comment-reply'); 
}


/**
 * Register action hook: widget_area_primary_aside
 * 
 * Removed for namespacing
 *
 * @deprecated 0.9.8
 */
function widget_area_primary_aside() {
	_deprecated_function( __FUNCTION__, '0.9.8', 'thematic_widget_area_primary_aside()' );
	
	thematic_widget_area_primary_aside();
}


/**
 * Register action hook: widget_area_secondary_aside 
 *
 * Removed for namespacing
 *
 * @deprecated 0.9.8
 */
function widget_area_secondary_aside() {
	_deprecated_function( __FUNCTION__, '0.9.8', 'thematic_widget_area_secondary_aside()' );
	
    thematic_widget_area_secondary_aside();
}


/**
 * Register action hook: widget_area_index_top
 *
 * Removed for namespacing
 *
 * @deprecated 0.9.8
 */
function widget_area_index_top() {
	_deprecated_function( __FUNCTION__, '0.9.8', 'thematic_widget_area_index_top()' );

    thematic_widget_area_index_top();
}


/**
 * Register action hook: widget_area_index_insert
 *
 * Removed for namespacing
 *
 * @deprecated 0.9.8
 */
function widget_area_index_insert() {
	_deprecated_function( __FUNCTION__, '0.9.8', 'thematic_widget_area_index_insert()' );
	
	thematic_widget_area_index_insert();
}


/**
 * Register action hook: widget_area_index_bottom 
 *
 * Removed for namespacing
 *
 * @deprecated 0.9.8
 */	
function widget_area_index_bottom() {
	_deprecated_function( __FUNCTION__, '0.9.8', 'thematic_widget_area_index_bottom()' );
	
    thematic_widget_area_index_bottom();
}


/**
 * Register action hook: widget_area_single_top 
 *
 * Removed for namespacing
 *
 * @deprecated 0.9.8
 */
function widget_area_single_top() {
	_deprecated_function( __FUNCTION__, '0.9.8', 'thematic_widget_area_single_top()' );

    thematic_widget_area_single_top();
}


/**
 * Register action hook: widget_area_single_insert 
 *
 * Removed for namespacing
 *
 * @deprecated 0.9.8
 */
function widget_area_single_insert() {
	_deprecated_function( __FUNCTION__, '0.9.8', 'thematic_widget_area_single_insert()' );

    thematic_widget_area_single_insert();
}


/**
 * Register action hook: widget_area_single_bottom 
 *
 * Removed for namespacing
 *
 * @deprecated 0.9.8
 */
function widget_area_single_bottom() {
	_deprecated_function( __FUNCTION__, '0.9.8', 'thematic_widget_area_single_bottom()' );

    thematic_widget_area_single_bottom();
}


/**
 * Register action hook: widget_area_page_top 
 *
 * Removed for namespacing
 *
 * @deprecated 0.9.8	 
 */
function widget_area_page_top() {
	_deprecated_function( __FUNCTION__, '0.9.8', 'thematic_widget_area_page_top()' );
	
	thematic_widget_area_page_top();
}
	
	
/**
 * Register action hook: widget_area_page_bottom 
 *
 * Removed for namespacing
 *
 * @deprecated 0.9.8	 
 */
function widget_area_page_bottom() {
	_deprecated_function( __FUNCTION__, '0.9.8', 'thematic_widget_page_bottom()' );
	
	thematic_widget_page_bottom();
}


/**
 * Register action hook: widget_area_subsidiaries
 * 
 * Removed for namespacing
 *
 * @deprecated 0.9.8
 */
 function widget_area_subsidiaries() {
	_deprecated_function( __FUNCTION__, '0.9.8', 'thematic_widget_area_subsidiaries()' );
	
	thematic_widget_area_subsidiaries();
}

    