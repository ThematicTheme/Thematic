<?php
/**
 * Widgets
 *
 * @package ThematicCoreLibrary
 * @subpackage Widgets
 */


/**
 * Markup before the widget
 */
function thematic_before_widget() {
	$content = '<section id="%1$s" class="widgetcontainer %2$s">';
	return apply_filters('thematic_before_widget', $content);
}


/**
 * Markup after the widget
 */
function thematic_after_widget() {
	$content = '</section>';
	return apply_filters('thematic_after_widget', $content);
}



/**
 * Markup before the widget title
 */
function thematic_before_title() {
	$content = '<h1 class="widgettitle">';
	return apply_filters('thematic_before_title', $content);
}


/**
 * Markup after the widget title
 */
function thematic_after_title() {
	$content = "</h1>\n";
	return apply_filters('thematic_after_title', $content);
}


/**
 * Enforce title on search widget
 * 
 * Replaces the functionality of deprecated widget Thematic_Widget_Search
 * 
 * @since 2.0.0
 * 
 * @param  string  $title    The current widget title
 * @param  object  $instance The current widget instance
 * @param  string  $id_base  The registered id of current widget
 */
function thematic_filter_search_widget( $title, $instance = '', $id_base = '' ) {
	
	if ( 'search' == $id_base ) {
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Search', 'thematic' ) : $instance['title'] );
		$title = '<label for="s">' . $title . '</label>';
	}
	
	return $title;
}
add_filter( 'widget_title', 'thematic_filter_search_widget', 10, 3 );


/**
 * Meta widget class
 *
 * Displays log in/out
 *
 * @since 0.9.6.3
 */
class Thematic_Widget_Meta extends WP_Widget {

	function Thematic_Widget_Meta() {
		$widget_ops = array('classname' => 'widget_meta', 'description' => __( "Log in/out and admin", 'thematic') );
		$this->WP_Widget('thematic-meta', __('Thematic Meta', 'thematic'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Meta', 'thematic') : $instance['title']);

		echo $before_widget;
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
?>
			<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
			</ul>
<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = strip_tags($instance['title']);
?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'thematic'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
<?php
	}
}
    
/**
 * RSS links widget class
 *
 * @since 0.9.6.3
 */
class Thematic_Widget_RSSlinks extends WP_Widget {

	function Thematic_Widget_RSSlinks() {
		$widget_ops = array( 'description' => __('Links to your posts and comments feed', 'thematic') );
		$this->WP_Widget( 'rss-links', __('RSS Links', 'thematic'), $widget_ops);
	}

	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? __('RSS Links', 'thematic') : $instance['title']);
		echo $before_widget;
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
?>
			<ul>
				<li><a href="<?php bloginfo('rss2_url') ?>" rel="alternate nofollow" type="application/rss+xml"><?php _e('All posts', 'thematic') ?></a></li>
				<li><a href="<?php bloginfo('comments_rss2_url') ?>" rel="alternate nofollow" type="application/rss+xml"><?php _e('All comments', 'thematic') ?></a></li>
			</ul>
<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = strip_tags($instance['title']);
?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'thematic'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
<?php
	}
}

?>