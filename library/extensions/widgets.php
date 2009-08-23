<?php

// Pre-set Widgets
$preset_widgets = array (
	'primary-aside'  => array( 'search', 'pages-2', 'categories-2', 'archives-2' ),
	'secondary-aside'  => array( 'links-2', 'rss-links', 'meta' )
);

if ( isset( $_GET['activated'] ) ) {
	update_option( 'sidebars_widgets', apply_filters('thematic_preset_widgets',$preset_widgets ));
}
	

// Check for static widgets in widget-ready areas

function is_sidebar_active( $index ){
  global $wp_registered_sidebars;

  $widgetcolums = wp_get_sidebars_widgets();
		 
  if ($widgetcolums[$index]) return true;
  
	return false;
}

function thematic_before_widget() {
	$content = '<li id="%1$s" class="widgetcontainer %2$s">';
	return apply_filters('thematic_before_widget', $content);
}

function thematic_after_widget() {
	$content = '</li>';
	return apply_filters('thematic_after_widget', $content);
}

function thematic_before_title() {
	$content = "<h3 class=\"widgettitle\">";
	return apply_filters('thematic_before_title', $content);
}

function thematic_after_title() {
	$content = "</h3>\n";
	return apply_filters('thematic_after_title', $content);
}

// Widget: Thematic Search
function widget_thematic_search($args) {
	extract($args);
	if ( empty($title) )
		$title = __('Search', 'thematic');
?>
			<?php echo $before_widget ?>
				<?php echo thematic_before_title() ?><label for="s"><?php echo $title ?></label><?php echo thematic_after_title();
				get_search_form();
			echo $after_widget;
}

// Widget: Thematic Meta
function widget_thematic_meta($args) {
	extract($args);
	if ( empty($title) )
		$title = __('Meta', 'thematic');
?>
			<?php echo $before_widget; ?>
				<?php echo thematic_before_title() . $title . thematic_after_title(); ?>
				<ul>
					<?php wp_register() ?>
					<li><?php wp_loginout() ?></li>
					<?php wp_meta() ?>
				</ul>
			<?php echo $after_widget; ?>
<?php
}

// Widget: Thematic RSS links
function widget_thematic_rsslinks($args) {
	extract($args);
	$options = get_option('widget_thematic_rsslinks');
	$title = empty($options['title']) ? __('RSS Links', 'thematic') : $options['title'];
?>
		<?php echo $before_widget; ?>
			<?php echo thematic_before_title() . $title . thematic_after_title(); ?>
			<ul>
				<li><a href="<?php thm_bloginfo('rss2_url', TRUE) ?>" title="<?php echo wp_specialchars(thm_bloginfo('name', FALSE), 1) ?> <?php _e('Posts RSS feed', 'thematic'); ?>" rel="alternate nofollow" type="application/rss+xml"><?php _e('All posts', 'thematic') ?></a></li>
				<li><a href="<?php thm_bloginfo('comments_rss2_url', TRUE) ?>" title="<?php echo wp_specialchars(thm_bloginfo('name', FALSE), 1) ?> <?php _e('Comments RSS feed', 'thematic'); ?>" rel="alternate nofollow" type="application/rss+xml"><?php _e('All comments', 'thematic') ?></a></li>
			</ul>
		<?php echo $after_widget; ?>
<?php
}

// Widget: RSS links; element controls for customizing text within Widget plugin
function widget_thematic_rsslinks_control() {
	$options = $newoptions = get_option('widget_thematic_rsslinks');
	if ( $_POST["rsslinks-submit"] ) {
		$newoptions['title'] = strip_tags(stripslashes($_POST["rsslinks-title"]));
	}
	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option('widget_thematic_rsslinks', $options);
	}
	$title = htmlspecialchars($options['title'], ENT_QUOTES);
?>
			<p><label for="rsslinks-title"><?php _e('Title:'); ?> <input style="width: 250px;" id="rsslinks-title" name="rsslinks-title" type="text" value="<?php echo $title; ?>" /></label></p>
			<input type="hidden" id="rsslinks-submit" name="rsslinks-submit" value="1" />
<?php
}

// Widgets plugin: intializes the plugin after the widgets above have passed snuff
function thematic_widgets_init() {
	if ( !function_exists('register_sidebars') )
		return;

	// Register Widgetized areas.
	// Area 1
	thematic_create_widget_area('Primary Aside', thematic_before_widget(), thematic_after_widget(), thematic_before_title(), thematic_after_title(), 'widget_area_primary_aside');

	// Area 2
    thematic_create_widget_area('Secondary Aside', thematic_before_widget(), thematic_after_widget(), thematic_before_title(), thematic_after_title(), 'widget_area_secondary_aside');

	// Area 3
    thematic_create_widget_area('1st Subsidiary Aside', thematic_before_widget(), thematic_after_widget(), thematic_before_title(), thematic_after_title(), 'widget_area_1st_subsidiary_aside');

	// Area 4
    thematic_create_widget_area('2nd Subsidiary Aside', thematic_before_widget(), thematic_after_widget(), thematic_before_title(), thematic_after_title(), 'widget_area_2nd_subsidiary_aside');  
   
	// Area 5
    thematic_create_widget_area('3rd Subsidiary Aside', thematic_before_widget(), thematic_after_widget(), thematic_before_title(), thematic_after_title(), 'widget_area_3rd_subsidiary_aside');  

	// Area 6
    thematic_create_widget_area('Index Top', thematic_before_widget(), thematic_after_widget(), thematic_before_title(), thematic_after_title(), 'widget_area_index_top');  

	// Area 7
    thematic_create_widget_area('Index Insert', thematic_before_widget(), thematic_after_widget(), thematic_before_title(), thematic_after_title(), 'widget_area_index_insert');

	// Area 8
    thematic_create_widget_area('Index Bottom', thematic_before_widget(), thematic_after_widget(), thematic_before_title(), thematic_after_title(), 'widget_area_index_bottom');      

	// Area 9
    thematic_create_widget_area('Single Top', thematic_before_widget(), thematic_after_widget(), thematic_before_title(), thematic_after_title(), 'widget_area_single_top');  

	// Area 10
    thematic_create_widget_area('Single Insert', thematic_before_widget(), thematic_after_widget(), thematic_before_title(), thematic_after_title(), 'widget_area_single_insert');      
    
	// Area 11
    thematic_create_widget_area('Single Bottom', thematic_before_widget(), thematic_after_widget(), thematic_before_title(), thematic_after_title(), 'widget_area_single_bottom');      
      
	// Area 12
    thematic_create_widget_area('Page Top', thematic_before_widget(), thematic_after_widget(), thematic_before_title(), thematic_after_title(), 'widget_area_page_top');      
   
	// Area 13
    thematic_create_widget_area('Page Bottom', thematic_before_widget(), thematic_after_widget(), thematic_before_title(), thematic_after_title(), 'widget_area_page_bottom');      
	  
    // we will check for a Thematic widgets directory and and add and activate additional widgets
    // Thanks to Joern Kretzschmar
	  $widgets_dir = @ dir(ABSPATH . '/wp-content/themes/' . get_template() . '/widgets');
	  if ($widgets_dir)	{
		  while(($widgetFile = $widgets_dir->read()) !== false) {
			 if (!preg_match('|^\.+$|', $widgetFile) && preg_match('|\.php$|', $widgetFile))
				  include(ABSPATH . '/wp-content/themes/' . get_template() . '/widgets/' . $widgetFile);
		  }
	  }

	  // we will check for the child themes widgets directory and add and activate additional widgets
    // Thanks to Joern Kretzschmar 
	  $widgets_dir = @ dir(ABSPATH . '/wp-content/themes/' . get_stylesheet() . '/widgets');
	  if ((TEMPLATENAME != THEMENAME) && ($widgets_dir)) {
		  while(($widgetFile = $widgets_dir->read()) !== false) {
			 if (!preg_match('|^\.+$|', $widgetFile) && preg_match('|\.php$|', $widgetFile))
				  include(ABSPATH . '/wp-content/themes/' . get_stylesheet() . '/widgets/' . $widgetFile);
		  }
	  }   
   
	// Finished intializing Widgets plugin, now let's load the thematic default widgets
	register_sidebar_widget(__('Search', 'thematic'), 'widget_thematic_search', null, 'search');
	unregister_widget_control('search');
	register_sidebar_widget(__('Meta', 'thematic'), 'widget_thematic_meta', null, 'meta');
	unregister_widget_control('meta');
	register_sidebar_widget(array(__('RSS Links', 'thematic'), 'widgets'), 'widget_thematic_rsslinks');
	register_widget_control(array(__('RSS Links', 'thematic'), 'widgets'), 'widget_thematic_rsslinks_control', 300, 90);
}

// Runs our code at the end to check that everything needed has loaded
add_action( 'init', 'thematic_widgets_init' );

?>