<?php

// Pre-set Widgets
$preset_widgets = array (
	'primary-aside'  => array( 'search', 'pages', 'categories', 'archives' ),
	'secondary-aside'  => array( 'links', 'RSS Links', 'meta' )
);
if ( isset( $_GET['activated'] ) ) {
	update_option( 'sidebars_widgets', $preset_widgets );
}


// Check for static widgets in widget-ready areas

function is_sidebar_active( $index ){
  global $wp_registered_sidebars;

  $widgetcolums = wp_get_sidebars_widgets();
		 
  if ($widgetcolums[$index]) return true;
  
	return false;
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
				<li><a href="<?php bloginfo('rss2_url') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?> <?php _e('Posts RSS feed', 'thematic'); ?>" rel="alternate nofollow" type="application/rss+xml"><?php _e('All posts', 'thematic') ?></a></li>
				<li><a href="<?php bloginfo('comments_rss2_url') ?>" title="<?php echo wp_specialchars(bloginfo('name'), 1) ?> <?php _e('Comments RSS feed', 'thematic'); ?>" rel="alternate nofollow" type="application/rss+xml"><?php _e('All comments', 'thematic') ?></a></li>
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
    register_sidebar(array(
       	'name' => 'Primary Aside',
       	'id' => 'primary-aside',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => thematic_before_title(),
		'after_title' => thematic_after_title(),
    ));

	// Area 2
    register_sidebar(array(
       	'name' => 'Secondary Aside',
       	'id' => 'secondary-aside', 
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => thematic_before_title(),
		'after_title' => thematic_after_title(),
    ));

	// Area 3
    register_sidebar(array(
       	'name' => '1st Subsidiary Aside',
       	'id' => '1st-subsidiary-aside',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => thematic_before_title(),
		'after_title' => thematic_after_title(),
    ));  

	// Area 4
    register_sidebar(array(
       	'name' => '2nd Subsidiary Aside',
       	'id' => '2nd-subsidiary-aside',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => thematic_before_title(),
		'after_title' => thematic_after_title(),
    ));  
   
	// Area 5
    register_sidebar(array(
       	'name' => '3rd Subsidiary Aside',
       	'id' => '3rd-subsidiary-aside',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => thematic_before_title(),
		'after_title' => thematic_after_title(),
    ));  

	// Area 6
    register_sidebar(array(
       	'name' => 'Index Top',
       	'id' => 'index-top',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => thematic_before_title(),
		'after_title' => thematic_after_title(),
    ));  

	// Area 7
    register_sidebar(array(
       	'name' => 'Index Insert',
       	'id' => 'index-insert',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => thematic_before_title(),
		'after_title' => thematic_after_title(),
    ));

	// Area 8
    register_sidebar(array(
       	'name' => 'Index Bottom',
       	'id' => 'index-bottom',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => thematic_before_title(),
		'after_title' => thematic_after_title(),
    ));      

	// Area 9
    register_sidebar(array(
       	'name' => 'Single Top',
       	'id' => 'single-top',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => thematic_before_title(),
		'after_title' => thematic_after_title(),
    ));  

	// Area 10
    register_sidebar(array(
       	'name' => 'Single Insert',
       	'id' => 'single-insert',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => thematic_before_title(),
		'after_title' => thematic_after_title(),
    ));      
    
	// Area 11
    register_sidebar(array(
       	'name' => 'Single Bottom',
       	'id' => 'single-bottom',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => thematic_before_title(),
		'after_title' => thematic_after_title(),
    ));      
      
	// Area 12
    register_sidebar(array(
       	'name' => 'Page Top',
       	'id' => 'page-top',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => thematic_before_title(),
		'after_title' => thematic_after_title(),
    ));      
   
	// Area 13
    register_sidebar(array(
       	'name' => 'Page Bottom',
       	'id' => 'page-bottom',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => thematic_before_title(),
		'after_title' => thematic_after_title(),
    ));      
	  
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