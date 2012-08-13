<?php

/**
 * Widgets Extensions
 *
 * @package ThematicCoreLibrary
 * @subpackage WidgetsExtensions
 */


/**
 * Displays a filterable Search Form
 *
 * This function is called from the searchform.php template. 
 * That template is called by the WP function get_search_form()
 *
 * Filter: search_field_value Controls the input element's size attribute <br>
 * Filter: thematic_search_submit Controls the form's "submit" input element <br>
 * Filters: thematic_search_form Controls the entire from output just before display <br>
 *
 * @see Thematic_Widget_Search
 * @link http://codex.wordpress.org/Function_Reference/get_search_form Codex: get_search_form()
 */
function thematic_search_form() {
	$search_form_length = apply_filters('thematic_search_form_length', '32');
	$search_form  = "\n\t\t\t\t\t\t";
	$search_form .= '<form id="searchform" method="get" action="' . home_url() .'/">';
	$search_form .= "\n\n\t\t\t\t\t\t\t";
	$search_form .= '<div>';
	$search_form .= "\n\t\t\t\t\t\t\t\t";
	if (is_search()) {
	    	$search_form .= '<input id="s" name="s" type="text" value="' . esc_html ( stripslashes( $_GET['s'] ) ) .'" size="' . $search_form_length . '" tabindex="1" />';
	} else {
	    	$value = __( 'To search, type and hit enter', 'thematic' );
	    	$value = apply_filters( 'search_field_value',$value );
	    	$search_form .= '<input id="s" name="s" type="text" value="' . $value . '" onfocus="if (this.value == \'' . $value . '\') {this.value = \'\';}" onblur="if (this.value == \'\') {this.value = \'' . $value . '\';}" size="'. $search_form_length .'" tabindex="1" />';
	}
	$search_form .= "\n\n\t\t\t\t\t\t\t\t";
	
	$search_submit = '<input id="searchsubmit" name="searchsubmit" type="submit" value="' . __('Search', 'thematic') . '" tabindex="2" />';
	
	$search_form .= apply_filters('thematic_search_submit', $search_submit);
	
	$search_form .= "\n\t\t\t\t\t\t\t";
	$search_form .= '</div>';
	
	$search_form .= "\n\n\t\t\t\t\t\t";
	$search_form .= '</form>' . "\n\n\t\t\t\t\t";
	
	echo apply_filters('thematic_search_form', $search_form);
}

/**
 * Defines the array for creating and displaying the widgetized areas
 * in the WP-Admin and front-end of the site.
 * 
 * Filter: thematic_widgetized_areas
 *
 * @uses thematic_before_widget()
 * @uses thematic_after_widget()
 * @uses thematic_before_title()
 * @uses thematic_after_title()
 * @return array
 */
function thematic_widgets_array() {
	$thematic_widgetized_areas = array(
		'Primary Aside' => array(
			'admin_menu_order' => 100,
			'args' => array (
				'name' => __( 'Primary Aside', 'thematic' ),
				'id' => 'primary-aside',
                'description' => __('The primary widget area, most often used as a sidebar.', 'thematic'),
				'before_widget' => thematic_before_widget(),
				'after_widget' => thematic_after_widget(),
				'before_title' => thematic_before_title(),
				'after_title' => thematic_after_title(),
				),
			'action_hook'	=> 'widget_area_primary_aside',
			'function'		=> 'thematic_primary_aside',
			'priority'		=> 10,
			),
		'Secondary Aside' => array(
			'admin_menu_order' => 200,
			'args' => array (
				'name' => __( 'Secondary Aside', 'thematic' ),
				'id' => 'secondary-aside',
                'description' => __('The secondary widget area, most often used as a sidebar.', 'thematic'),
				'before_widget' => thematic_before_widget(),
				'after_widget' => thematic_after_widget(),
				'before_title' => thematic_before_title(),
				'after_title' => thematic_after_title(),
				),
			'action_hook'	=> 'widget_area_secondary_aside',
			'function'		=> 'thematic_secondary_aside',
			'priority'		=> 10,
			),
		'1st Subsidiary Aside' => array(
			'admin_menu_order' => 300,
			'args' => array (
				'name' => __( '1st Subsidiary Aside', 'thematic' ),
				'id' => '1st-subsidiary-aside',
                'description' => __('The 1st widget area in the footer.', 'thematic'),
				'before_widget' => thematic_before_widget(),
				'after_widget' => thematic_after_widget(),
				'before_title' => thematic_before_title(),
				'after_title' => thematic_after_title(),
				),
			'action_hook'	=> 'widget_area_subsidiaries',
			'function'		=> 'thematic_1st_subsidiary_aside',
			'priority'		=> 30,
			),
		'2nd Subsidiary Aside' => array(
			'admin_menu_order' => 400,
			'args' => array (
				'name' => __( '2nd Subsidiary Aside', 'thematic' ),
				'id' => '2nd-subsidiary-aside',
                'description' => __('The 2nd widget area in the footer.', 'thematic'),
				'before_widget' => thematic_before_widget(),
				'after_widget' => thematic_after_widget(),
				'before_title' => thematic_before_title(),
				'after_title' => thematic_after_title(),
				),
			'action_hook'	=> 'widget_area_subsidiaries',
			'function'		=> 'thematic_2nd_subsidiary_aside',
			'priority'		=> 50,
			),
		'3rd Subsidiary Aside' => array(
			'admin_menu_order' => 500,
			'args' => array (
				'name' => __( '3rd Subsidiary Aside', 'thematic' ),
				'id' => '3rd-subsidiary-aside',
                'description' => __('The 3rd widget area in the footer.', 'thematic'),
				'before_widget' => thematic_before_widget(),
				'after_widget' => thematic_after_widget(),
				'before_title' => thematic_before_title(),
				'after_title' => thematic_after_title(),
				),
			'action_hook'	=> 'widget_area_subsidiaries',
			'function'		=> 'thematic_3rd_subsidiary_aside',
			'priority'		=> 70,
		),
		'Index Top' => array(
			'admin_menu_order' => 600,
			'args' => array (
				'name' => __( 'Index Top', 'thematic' ),
				'id' => 'index-top',
                'description' => __('The top widget area displayed on the index page.', 'thematic'),
				'before_widget' => thematic_before_widget(),
				'after_widget' => thematic_after_widget(),
				'before_title' => thematic_before_title(),
				'after_title' => thematic_after_title(),
				),
			'action_hook'	=> 'widget_area_index_top',
			'function'		=> 'thematic_index_top',
			'priority'		=> 10,
			),
		'Index Insert' => array(
			'admin_menu_order' => 700,
			'args' => array (
				'name' => __( 'Index Insert', 'thematic' ),
				'id' => 'index-insert',
                'description' => __('The widget area inserted after x posts on the index page.', 'thematic'),
				'before_widget' => thematic_before_widget(),
				'after_widget' => thematic_after_widget(),
				'before_title' => thematic_before_title(),
				'after_title' => thematic_after_title(),
				),
			'action_hook'	=> 'widget_area_index_insert',
			'function'		=> 'thematic_index_insert',
			'priority'		=> 10,
			),
		'Index Bottom' => array(
			'admin_menu_order' => 800,
			'args' => array (
				'name' => __( 'Index Bottom', 'thematic' ),
				'id' => 'index-bottom',
                'description' => __('The bottom widget area displayed on the index page.', 'thematic'),
				'before_widget' => thematic_before_widget(),
				'after_widget' => thematic_after_widget(),
				'before_title' => thematic_before_title(),
				'after_title' => thematic_after_title(),
				),
			'action_hook'	=> 'widget_area_index_bottom',
			'function'		=> 'thematic_index_bottom',
			'priority'		=> 10,
			),
		'Single Top' => array(
			'admin_menu_order' => 900,
			'args' => array (
				'name' => __( 'Single Top', 'thematic' ),
				'id' => 'single-top',
                'description' => __('The top widget area displayed on a single post.', 'thematic'),
				'before_widget' => thematic_before_widget(),
				'after_widget' => thematic_after_widget(),
				'before_title' => thematic_before_title(),
				'after_title' => thematic_after_title(),
				),
			'action_hook'	=> 'widget_area_single_top',
			'function'		=> 'thematic_single_top',
			'priority'		=> 10,
			),
		'Single Insert' => array(
			'admin_menu_order' => 1000,
			'args' => array (
				'name' => __( 'Single Insert', 'thematic' ),
				'id' => 'single-insert',
                'description' => __('The widget area inserted between the post and the comments on a single post.', 'thematic'),
				'before_widget' => thematic_before_widget(),
				'after_widget' => thematic_after_widget(),
				'before_title' => thematic_before_title(),
				'after_title' => thematic_after_title(),
				),
			'action_hook'	=> 'widget_area_single_insert',
			'function'		=> 'thematic_single_insert',
			'priority'		=> 10,
			),
		'Single Bottom' => array(
			'admin_menu_order' => 1100,
			'args' => array (
				'name' => __( 'Single Bottom', 'thematic' ),
				'id' => 'single-bottom',
                'description' => __('The bottom widget area displayed on a single post.', 'thematic'),
				'before_widget' => thematic_before_widget(),
				'after_widget' => thematic_after_widget(),
				'before_title' => thematic_before_title(),
				'after_title' => thematic_after_title(),
				),
			'action_hook'	=> 'widget_area_single_bottom',
			'function'		=> 'thematic_single_bottom',
			'priority'		=> 10,
			),
		'Page Top' => array(
			'admin_menu_order' => 1200,
			'args' => array (
				'name' => __( 'Page Top', 'thematic' ),
				'id' => 'page-top',
                'description' => __('The top widget area displayed on a page.', 'thematic'),
				'before_widget' => thematic_before_widget(),
				'after_widget' => thematic_after_widget(),
				'before_title' => thematic_before_title(),
				'after_title' => thematic_after_title(),
				),
			'action_hook'	=> 'widget_area_page_top',
			'function'		=> 'thematic_page_top',
			'priority'		=> 10,
			),
		'Page Bottom' => array(
			'admin_menu_order' => 1300,
			'args' => array (
				'name' => __( 'Page Bottom', 'thematic' ),
				'id' => 'page-bottom',
                'description' => __('The bottom widget area displayed on a page.', 'thematic'),
				'before_widget' => thematic_before_widget(),
				'after_widget' => thematic_after_widget(),
				'before_title' => thematic_before_title(),
				'after_title' => thematic_after_title(),
				),
			'action_hook'	=> 'widget_area_page_bottom',
			'function'		=> 'thematic_page_bottom',
			'priority'		=> 10,
			),
		);
	
	return apply_filters('thematic_widgetized_areas', $thematic_widgetized_areas);
	
}

/**
 * Registers Widget Areas(Sidebars) and pre-sets default widgets
 *
 * @uses thematic_presetwidgets
 * @todo consider deprecating the widgets directory search this seems to have never been used
 */
function thematic_widgets_init() {

	$thematic_widgetized_areas = thematic_widgets_array();
	foreach ( $thematic_widgetized_areas as $key => $value ) {
		register_sidebar( $thematic_widgetized_areas[$key]['args'] );
	}  
	
	// Remove WP default Widgets
	// WP 2.8 function using $widget_class
    unregister_widget( 'WP_Widget_Meta' );
    unregister_widget( 'WP_Widget_Search' );

	// Finished intializing Widgets plugin, now let's load the thematic default widgets
	register_widget( 'Thematic_Widget_Search' );
	register_widget( 'Thematic_Widget_Meta' );
	register_widget( 'Thematic_Widget_RSSlinks' );

	// Pre-set Widgets
	$preset_widgets = array (
		'primary-aside'  => array( 'search-2', 'pages-2', 'categories-2', 'archives-2' ),
		'secondary-aside'  => array( 'links-2', 'rss-links-2', 'meta-2' )
		);

    if ( isset( $_GET['activated'] ) ) {
    	thematic_presetwidgets();
  		update_option( 'sidebars_widgets', apply_filters('thematic_preset_widgets',$preset_widgets ));
  	}

}

add_action( 'widgets_init', 'thematic_widgets_init' );

/**
 * Registers action hook.
 *
 * Action Hook: thematic_presetwidgets
 */
function thematic_presetwidgets() {
	do_action( 'thematic_presetwidgets' );
}

if ( function_exists( 'childtheme_override_init_presetwidgets') )  {
    /**
     * @ignore
     */
    function thematic_init_presetwidgets() {
    	childtheme_override_init_presetwidgets();
    }
} else {
	/**
	 * Sets the "pre-set" widgets in options table
	 */
	function thematic_init_presetwidgets() {
		update_option( 'widget_search', array( 2 => array( 'title' => '' ), '_multiwidget' => 1 ) );
		update_option( 'widget_pages', array( 2 => array( 'title' => ''), '_multiwidget' => 1 ) );
		update_option( 'widget_categories', array( 2 => array( 'title' => '', 'count' => 0, 'hierarchical' => 0, 'dropdown' => 0 ), '_multiwidget' => 1 ) );
		update_option( 'widget_archives', array( 2 => array( 'title' => '', 'count' => 0, 'dropdown' => 0 ), '_multiwidget' => 1 ) );
		update_option( 'widget_links', array( 2 => array( 'title' => ''), '_multiwidget' => 1 ) );
		update_option( 'widget_rss-links', array( 2 => array( 'title' => ''), '_multiwidget' => 1 ) );
		update_option( 'widget_meta', array( 2 => array( 'title' => ''), '_multiwidget' => 1 ) );
	}
}

add_action( 'thematic_presetwidgets', 'thematic_init_presetwidgets' );

/**
 * Add wigitized area functions to specific action hooks.
 *
 * @uses thematic_widgets_array to get function names and action hooks.
 */
function thematic_connect_functions() {

	$thematic_widgetized_areas = thematic_widgets_array();

	foreach ( $thematic_widgetized_areas as $key => $value ) {
		if ( !has_action( $thematic_widgetized_areas[$key]['action_hook'], $thematic_widgetized_areas[$key]['function'] ) )
			add_action( $thematic_widgetized_areas[$key]['action_hook'], $thematic_widgetized_areas[$key]['function'], $thematic_widgetized_areas[$key]['priority'] );	
	}

}

add_action( 'wp_head', 'thematic_connect_functions');


/**
 * Filters the order in which the Widget Areas (Sidebars) will be listed in the WP-Admin/Widgets
 * 
 * It sorts the array generated by thematic_widgetized_areas() by [admin_menu_order]
 * allowing for child themes to filter thematic_widgetized_areas to control
 * the sidebar list order in the WP-Admin/Widgets.
 * 
 * @see thematic_widgetized_areas
 * @param array
 * @return array
 */
function thematic_sort_widgetized_areas($content) {
	asort($content);
	return $content;
}
add_filter('thematic_widgetized_areas', 'thematic_sort_widgetized_areas', 100);


/**
 * Displays the Primary Aside
 * 
 * @uses thematic_before_widget_area
 * @uses thematic_after_widget_area
 */
function thematic_primary_aside() {	
	global $wp_customize;
	$args =	array(	
			'before_title' 	=> thematic_before_title(),
			'after_title' 	=> thematic_after_title()
			);
			
	if ( is_active_sidebar( 'primary-aside' ) ) { 
		echo thematic_before_widget_area( 'primary-aside' );
		dynamic_sidebar( 'primary-aside' );
		echo thematic_after_widget_area( 'primary-aside' );
	// WordPress 3.4
	} elseif ( method_exists ( $wp_customize,'is_preview' ) && $wp_customize->is_preview()  ){ 
		echo thematic_before_widget_area( 'primary-aside' );
		the_widget('Thematic_Widget_Search', null , $args);
		the_widget('WP_Widget_Pages', null , $args);
		the_widget('WP_Widget_Categories', null , $args);
		the_widget('WP_Widget_Archives', null, $args);
		echo thematic_after_widget_area( 'primary-aside' );
	}
}

/**
 * Displays the Secondary Aside 
 *
 * @uses thematic_before_widget_area
 * @uses thematic_after_widget_area
 */
function thematic_secondary_aside() {
	global $wp_customize;
	$args =	array(	
			'before_title' 	=> thematic_before_title(),
			'after_title' 	=> thematic_after_title()
			);
				
	if ( is_active_sidebar( 'secondary-aside' ) ) {
		echo thematic_before_widget_area( 'secondary-aside' );
		dynamic_sidebar( 'secondary-aside' );
		echo thematic_after_widget_area( 'secondary-aside' );
	// WordPress 3.4
	} elseif ( method_exists ( $wp_customize,'is_preview' ) && $wp_customize->is_preview()  ){ 
		echo thematic_before_widget_area( 'secondary-aside' );
		the_widget('Thematic_Widget_RSS', null, $args);
		the_widget('Thematic_Widget_Meta', null, $args); 
		echo thematic_after_widget_area( 'secondary-aside' );
	}
}

/**
 * Displays the 2nd Subsidiary Aside
 *
 * @uses thematic_before_widget_area
 * @uses thematic_after_widget_area
 */
function thematic_1st_subsidiary_aside() {
	if ( is_active_sidebar( '1st-subsidiary-aside' ) ) {
		echo thematic_before_widget_area( '1st-subsidiary-aside' );
		dynamic_sidebar( '1st-subsidiary-aside' );
		echo thematic_after_widget_area( '1st-subsidiary-aside' );
	}
}

/**
 * Displays the 2nd Subsidiary Aside
 *
 * @uses thematic_before_widget_area
 * @uses thematic_after_widget_area
 */
function thematic_2nd_subsidiary_aside() {
	if ( is_active_sidebar( '2nd-subsidiary-aside' ) ) {
		echo thematic_before_widget_area('2nd-subsidiary-aside' );
		dynamic_sidebar( '2nd-subsidiary-aside' );
		echo thematic_after_widget_area( '2nd-subsidiary-aside' );
	}
}

/**
 * Displays the 3rd Subsidiary Aside
 *
 * @uses thematic_before_widget_area
 * @uses thematic_after_widget_area
 */
function thematic_3rd_subsidiary_aside() {
	if ( is_active_sidebar( '3rd-subsidiary-aside' ) ) {
		echo thematic_before_widget_area('3rd-subsidiary-aside' );
		dynamic_sidebar( '3rd-subsidiary-aside' );
		echo thematic_after_widget_area( '3rd-subsidiary-aside' );
	}
}

/**
 * Displays the Index Top
 *
 * @uses thematic_before_widget_area
 * @uses thematic_after_widget_area
 */
function thematic_index_top() {
	if ( is_active_sidebar( 'index-top' ) ) {
		echo thematic_before_widget_area( 'index-top' );
		dynamic_sidebar('index-top');
		echo thematic_after_widget_area( 'index-top' );
	}
}

/**
 * Displays the Index Insert
 *
 * @uses thematic_before_widget_area
 * @uses thematic_after_widget_area
 */
function thematic_index_insert() {
	if ( is_active_sidebar( 'index-insert' ) ) {
		echo thematic_before_widget_area( 'index-insert' );
		dynamic_sidebar( 'index-insert' );
		echo thematic_after_widget_area( 'index-insert' );
	}
}

/**
 * Displays the Index Bottom
 *
 * @uses thematic_before_widget_area
 * @uses thematic_after_widget_area
 */
function thematic_index_bottom() {
	if ( is_active_sidebar( 'index-bottom' ) ) {
		echo thematic_before_widget_area( 'index-bottom' );
		dynamic_sidebar( 'index-bottom' );
		echo thematic_after_widget_area( 'index-bottom' );
	}
}

/**
 * Displays the Single Top
 *
 * @uses thematic_before_widget_area
 * @uses thematic_after_widget_area
 */
function thematic_single_top() {
	if ( is_active_sidebar( 'single-top' ) ) {
		echo thematic_before_widget_area( 'single-top' );
		dynamic_sidebar( 'single-top' );
		echo thematic_after_widget_area( 'single-top' );
	}
}

/**
 * Displays the Single Insert
 *
 * @uses thematic_before_widget_area
 * @uses thematic_after_widget_area
 */
function thematic_single_insert() {
	if ( is_active_sidebar( 'single-insert' ) ) {
		echo thematic_before_widget_area( 'single-insert' );
		dynamic_sidebar( 'single-insert' );
		echo thematic_after_widget_area( 'single-insert' );
	}
}

/**
 * Displays the Single Bottom
 *
 * @uses thematic_before_widget_area
 * @uses thematic_after_widget_area
 */
function thematic_single_bottom() {
	if ( is_active_sidebar( 'single-bottom' ) ) {
		echo thematic_before_widget_area( 'single-bottom' );
		dynamic_sidebar( 'single-bottom' );
		echo thematic_after_widget_area( 'single-bottom' );
	}
}

/**
 * Displays the Page Top
 *
 * @uses thematic_before_widget_area
 * @uses thematic_after_widget_area
 */
function thematic_page_top() {
	if ( is_active_sidebar( 'page-top' ) ) {
		echo thematic_before_widget_area( 'page-top' );
		dynamic_sidebar( 'page-top' );
		echo thematic_after_widget_area( 'page-top' );
	}
}

/**
 * Displays the Page Bottom
 *
 * @uses thematic_before_widget_area
 * @uses thematic_after_widget_area
 */
function thematic_page_bottom() {
	if ( is_active_sidebar( 'page-bottom' ) ) {
		echo thematic_before_widget_area( 'page-bottom' );
		dynamic_sidebar( 'page-bottom' );
		echo thematic_after_widget_area( 'page-bottom' );
	}
}

/**
 * Returns the opening CSS markup before the widget area
 *
 * Filter: thematic_before_widget_area
 * 
 * @param $hook determines the markup specific to the widget area
 * @return string 
 */
function thematic_before_widget_area($hook) {
	$content =  "\n\t\t";
	if ( $hook == 'primary-aside' ) {
		$content .= '<div id="primary" class="aside main-aside">' . "\n\n";
	} elseif ( $hook == 'secondary-aside' ) {
		$content .= '<div id="secondary" class="aside main-aside">' . "\n\n";
	} elseif ( $hook == '1st-subsidiary-aside' ) {
		$content .= '<div id="first" class="aside sub-aside">' . "\n\n";
	} elseif ( $hook == '2nd-subsidiary-aside' ) {
		$content .= '<div id="second" class="aside sub-aside">' . "\n\n";
	} elseif ( $hook == '3rd-subsidiary-aside' ) {
		$content .= '<div id="third" class="aside sub-aside">' . "\n\n";
	} else {
		$content .= '<div id="' . $hook . '" class="aside">' ."\n";
	}
	$content .= "\t\t\t" . '<ul class="xoxo">' . "\n\n\t\t\t\t";
	return apply_filters( 'thematic_before_widget_area', $content, $hook );
}

/**
 * Returns the closing CSS markup before the widget area
 *
 * Filter: thematic_after_widget_area
 * 
 * @param $hook determines the markup specific to the widget area
 * @return string 
 */
function thematic_after_widget_area($hook) {
	$content = "\n\t\t\t\t" . '</ul>' ."\n\n\t\t";
	if ( $hook == 'primary-aside' ) {
		$content .= '</div><!-- #primary .aside -->' ."\n\n";
	} elseif ( $hook == 'secondary-aside' ) {
		$content .= '</div><!-- #secondary .aside -->' ."\n\n";
	} elseif ( $hook == '1st-subsidiary-aside' ) {
		$content .= '</div><!-- #first .aside -->' ."\n\n";
	} elseif ( $hook == '2nd-subsidiary-aside' ) {
		$content .= '</div><!-- #second .aside -->' ."\n\n";
	} elseif ( $hook == '3rd-subsidiary-aside' ) {
		$content .= '</div><!-- #third .aside -->' ."\n\n";
	} else {
		$content .= '</div><!-- #' . $hook . ' .aside -->' ."\n\n";
	} 
	return apply_filters( 'thematic_after_widget_area', $content, $hook );
}

?>