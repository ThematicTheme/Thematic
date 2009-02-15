<?php

// Check for static widgets in widget-ready areas

function is_sidebar_active( $index ){
  global $wp_registered_sidebars;

  $widgetcolums = wp_get_sidebars_widgets();
		 
  if ($widgetcolums[$index]) return true;
  
	return false;
}

// Widget: Thematic Search
function widget_thematic_search($args) {
	extract($args);
	if ( empty($title) )
		$title = __('Search', 'thematic');
?>
			<?php echo $before_widget ?>
				<?php echo $before_title ?><label for="s"><?php echo $title ?></label><?php echo $after_title ?>
				<form id="searchform" method="get" action="<?php bloginfo('home') ?>">
					<div>
						<input id="s" name="s" type="text" value="<?php echo wp_specialchars(stripslashes($_GET['s']), true) ?>" size="20" tabindex="1" />
						<input id="searchsubmit" name="searchsubmit" type="submit" value="<?php _e('Search', 'thematic') ?>" tabindex="2" />
					</div>
				</form>
			<?php echo $after_widget ?>

<?php
}

// Widget: Thematic Meta
function widget_thematic_meta($args) {
	extract($args);
	if ( empty($title) )
		$title = __('Meta', 'thematic');
?>
			<?php echo $before_widget; ?>
				<?php echo $before_title . $title . $after_title; ?>
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
			<?php echo $before_title . $title . $after_title; ?>
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
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));

	// Area 2
    register_sidebar(array(
       	'name' => 'Secondary Aside',
       	'id' => 'secondary-aside', 
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));

	// Area 3
    register_sidebar(array(
       	'name' => '1st Subsidiary Aside',
       	'id' => '1st-subsidiary-aside',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));  

	// Area 4
    register_sidebar(array(
       	'name' => '2nd Subsidiary Aside',
       	'id' => '2nd-subsidiary-aside',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));  
   
	// Area 5
    register_sidebar(array(
       	'name' => '3rd Subsidiary Aside',
       	'id' => '3rd-subsidiary-aside',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));  

	// Area 6
    register_sidebar(array(
       	'name' => 'Index Top',
       	'id' => 'index-top',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));  

	// Area 7
    register_sidebar(array(
       	'name' => 'Index Insert',
       	'id' => 'index-insert',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));

	// Area 8
    register_sidebar(array(
       	'name' => 'Index Bottom',
       	'id' => 'index-bottom',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));      

	// Area 9
    register_sidebar(array(
       	'name' => 'Single Top',
       	'id' => 'single-top',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));  

	// Area 10
    register_sidebar(array(
       	'name' => 'Single Insert',
       	'id' => 'single-insert',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));      
    
	// Area 11
    register_sidebar(array(
       	'name' => 'Single Bottom',
       	'id' => 'single-bottom',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));      
      
	// Area 12
    register_sidebar(array(
       	'name' => 'Page Top',
       	'id' => 'page-top',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));      
   
	// Area 13
    register_sidebar(array(
       	'name' => 'Page Bottom',
       	'id' => 'page-bottom',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
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