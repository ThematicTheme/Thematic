<?php
function thematic_search_form() {
				$search_form = "\n" . "\t";
				$search_form .= '<form id="searchform" method="get" action="' . get_bloginfo('home') .'">';
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
?>