<?php

// Check for widgets in widget-ready areas http://wordpress.org/support/topic/190184?replies=7#post-808787
// Thanks to Chaos Kaizer http://blog.kaizeku.com/
function is_sidebar_active( $index = 1){
	$sidebars	= wp_get_sidebars_widgets();
	$key		= (string) 'sidebar-'.$index;

	return (isset($sidebars[$key]));
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
    register_sidebar(array(
       	'name' => 'Primary Aside',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));

    register_sidebar(array(
       	'name' => 'Secondary Aside',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));

    register_sidebar(array(
       	'name' => '1st Subsidiary Aside',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));  

    register_sidebar(array(
       	'name' => '2nd Subsidiary Aside',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));  
   
    register_sidebar(array(
       	'name' => '3rd Subsidiary Aside',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));  

    register_sidebar(array(
       	'name' => 'Index Top',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));  

    register_sidebar(array(
       	'name' => 'Index Insert',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));

    register_sidebar(array(
       	'name' => 'Index Bottom',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));      

    register_sidebar(array(
       	'name' => 'Single Top',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));  

    register_sidebar(array(
       	'name' => 'Single Insert',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));      
    
    register_sidebar(array(
       	'name' => 'Single Bottom',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));      
      
    register_sidebar(array(
       	'name' => 'Page Top',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));      
   
    register_sidebar(array(
       	'name' => 'Page Bottom',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));      
   
   
	// Finished intializing Widgets plugin, now let's load the thematic default widgets
	register_sidebar_widget(__('Blog Index', 'thematic'), 'widget_blog_index', null, 'blog index');
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