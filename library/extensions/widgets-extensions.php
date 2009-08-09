<?php
function thematic_search_form() {
				$search_form = "\n" . "\t";
				$search_form .= '<form id="searchform" method="get" action="' . thm_bloginfo('home', FALSE) .'">';
				$search_form .= "\n" . "\t" . "\t";
				$search_form .= '<div>';
				$search_form .= "\n" . "\t" . "\t". "\t";
				if (is_search()) {
						$search_form .= '<input id="s" name="s" type="text" value="' . wp_specialchars(stripslashes($_GET['s']), true) .'" size="32" tabindex="1" />';
				} else {
						$value = __('To search, type and hit enter', 'thematic');
						$value = apply_filters('search_field_value',$value);
						$search_form .= '<input id="s" name="s" type="text" value="' . $value . '" onfocus="if (this.value == \'' . $value . '\') {this.value = \'\';}" onblur="if (this.value == \'\') {this.value = \'' . $value . '\';}" size="32" tabindex="1" />';
				}
				$search_form .= "\n" . "\t" . "\t". "\t";

				$search_submit = '<input id="searchsubmit" name="searchsubmit" type="submit" value="' . __('Search', 'thematic') . '" tabindex="2" />';

				$search_form .= apply_filters('thematic_search_submit', $search_submit);

				$search_form .= "\n" . "\t" . "\t";
				$search_form .= '</div>';

				$search_form .= "\n" . "\t";
				$search_form .= '</form>';

				echo apply_filters('thematic_search_form', $search_form);

}

// Easy creation of widget areas
// Credits:   Nathan Rice
// Additions: Chris Gossmann

function thematic_create_widget_area($sidebar_name, $before_widget = null, $after_widget = NULL, $before_title = null, $after_title = NULL, $action_hook, $function = 'thematic_standard_widget_area', $priority = 10) {

	// if $sidebar_name is empty we will stop any further processing
	if ($sidebar_name == NULL) {
		return;
	}
	
	// if $before_widget is empty we assign the default value
	if ($before_widget == NULL) {
		$before_widget = thematic_before_widget();
	}
	
	// if $after_widget is empty we assign the default value
	if ($after_widget == NULL) {
		$after_widget = thematic_after_widget();
	}
	
	// if $before_title is empty we assign the default value
	if ($before_title == NULL) {
		$before_title = thematic_before_title();
	}

	// if $after_title is empty we assign the default value
	if ($after_title == NULL) {
		$after_title = thematic_after_title();
	}
	
	// now we register our new widget area
	register_sidebar(array(
       	'name' => $sidebar_name,
       	'id' => strtolower(str_replace(' ', '-', $sidebar_name)),
       	'before_widget' => $before_widget,
       	'after_widget' => $after_widget,
		'before_title' => $before_title,
		'after_title' => $after_title,
    ));
    
    add_action($action_hook, $function, $priority);
}

// this wil transform the content of $hook into the ID of the widget area
function thematic_process_hook($hook) {
	$hook = str_replace('widget_area_','', $hook);
	$hook = str_replace('_', '-', $hook);
	return apply_filters('thematic_process_hook', $hook);	
}

// this function returns the opening CSS markup for the widget area 
function thematic_before_widget_area($hook) {
	$content =  "\n";
	if ($hook == 'primary-aside') {
		$content .= '<div id="primary" class="aside main-aside">' . "\n";
	} elseif ($hook == 'secondary-aside') {
		$content .= '<div id="secondary" class="aside main-aside">' . "\n";
	} elseif ($hook == '1st-subsidiary-aside') {
		$content .= '<div id="first" class="aside sub-aside">' . "\n";
	} elseif ($hook == '2nd-subsidiary-aside') {
		$content .= '<div id="second" class="aside sub-aside">' . "\n";
	} elseif ($hook == '3rd-subsidiary-aside') {
		$content .= '<div id="third" class="aside sub-aside">' . "\n";
	} else {
		$content .= '<div id="' . $hook . '" class="aside">' ."\n";
	}
	$content .= "\t" . '<ul class="xoxo">' . "\n";
	return apply_filters('thematic_before_widget_area', $content);
}

// this function returns the clossing CSS markup for the widget area
function thematic_after_widget_area($hook) {
	$content = "\n" . "\t" . '</ul>' ."\n";
	if ($hook == 'primary-aside') {
		$content .= '</div><!-- #primary .aside -->' ."\n";
	} elseif ($hook == 'secondary-aside') {
		$content .= '</div><!-- #secondary .aside -->' ."\n";
	} elseif ($hook == '1st-subsidiary-aside') {
		$content .= '</div><!-- #first .aside -->' ."\n";
	} elseif ($hook == '2nd-subsidiary-aside') {
		$content .= '</div><!-- #second .aside -->' ."\n";
	} elseif ($hook == '3rd-subsidiary-aside') {
		$content .= '</div><!-- #third .aside -->' ."\n";
	} else {
		$content .= '</div><!-- #' . $hook . ' .aside -->' ."\n";
	} 
	return apply_filters('thematic_after_widget_area', $content);
}

// this is our standard function for a widget area
function thematic_standard_widget_area() {
	$hook = current_filter();
	$hook = thematic_process_hook($hook);
	if (is_sidebar_active($hook)) {
		echo thematic_before_widget_area($hook);
		dynamic_sidebar($hook);
		echo thematic_after_widget_area($hook);
	}
}
?>