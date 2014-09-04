<?php
/**
 * Thematic Theme Options
 *
 * An improved theme options page using the WP Settings API
 * Child themes can use the WP settings api and the filters provided here to 
 * customize their child theme's options and settings validation. <br>
 *
 * For Reference: {@link http://codex.wordpress.org/Creating_an_Archive_Index Codex-Creating an Archive Index}
 *
 * @package ThematicCoreLibrary
 * @subpackage ThemeOptions
 */
 
/**
 * Sets default options in database if not pre-existent.
 * Registers with WP settings API, adds a main section with three settings fields.
 * 
 * Override: childtheme_override_opt_init
 *
 * @since 1.0.0
 */
if (function_exists('childtheme_override_opt_init')) {
	function thematic_opt_init() {
		childtheme_override_opt_init();
	}
} else {
	function thematic_opt_init() {

		// Retrieve current options from database	
		$current_options = thematic_get_wp_opt('thematic_theme_opt');
		$legacy_options = thematic_convert_legacy_opt();
		

		// Check for pre-1.0 options
		if ( false !== ( $legacy_options ) )  {
			// Theme upgrade: Convert legacy to current format and add to database
			add_option( 'thematic_theme_opt', $legacy_options );
		}

		
		// If we are missing a 2.0 option, this is an upgrade from previous version
		if ( !isset( $current_options['layout'] ) && isset( $current_options['footer_txt'] ) ) {
			$current_options = wp_parse_args( $current_options, thematic_default_opt() );
			// enable xhtml mode by default on theme upgrades
			$current_options['legacy_xhtml'] = 1;
			update_option( 'thematic_theme_opt', $current_options );
		}
		
		register_setting ('thematic_opt_group', 'thematic_theme_opt', 'thematic_validate_opt');
		
		add_settings_section ('thematic_opt_section_main', '', 'thematic_do_opt_section_main', 'thematic_theme_opt');
	
		add_settings_field ('thematic_insert_opt', __('Index Insert Position', 'thematic')	, 'thematic_do_insert_opt'	, 'thematic_theme_opt', 'thematic_opt_section_main');
		add_settings_field ('thematic_auth_opt',   __('Info on Author Page'	, 'thematic')	, 'thematic_do_auth_opt'	, 'thematic_theme_opt', 'thematic_opt_section_main');
		add_settings_field ('thematic_footer_opt', __('Text in Footer'	, 'thematic')		, 'thematic_do_footer_opt'	, 'thematic_theme_opt', 'thematic_opt_section_main');

		/**
		 * Filter to enable child themes to hide the legacy mode checkbox
		 * 
		 * @param bool true
		 */
		if( apply_filters( 'thematic_show_legacymode_checkbox', false ) ) {
			// show check box option for restoring legacy xtml1.0 doctype and compatible markup
			add_settings_field ('thematic_legacy_xhtml_opt', __('Restore Legacy XHTML1.0 Doctype'	, 'thematic'), 'thematic_do_legacy_xhtml_opt'	, 'thematic_theme_opt', 'thematic_opt_section_main');
		}

		// Show checkbox option for removing old options from database
		if ( isset( $legacy_options ) && false !== $legacy_options ) {
			add_settings_field ('thematic_legacy_opt', __('Remove Legacy Options'	, 'thematic'), 'thematic_do_legacy_opt'	, 'thematic_theme_opt', 'thematic_opt_section_main');
		} 

	}
}

add_action ('admin_init', 'thematic_opt_init');

	
/**
 * A wrapper for get_option that provides WP multi site compatibility.
 *
 * Returns an option's value from wp_otions table in database
 * or returns false if no value is found for that row 
 *
 * @since 1.0.0
 */
function thematic_get_wp_opt( $option_name, $default = false ) {
	global $blog_id;
	
	if (THEMATIC_MB) {
		$opt = get_blog_option( $blog_id, $option_name, $default );
	} else {
		$opt = get_option( $option_name, $default );
	}
	
	return $opt;
}


/**
 * Returns or echoes a theme option value by its key
 * or returns false if no value is found
 *
 * @uses thematic_get_wp_opt()
 * @since 1.0.0
 */
function thematic_get_theme_opt( $opt_key, $echo = false ) {
	
	$theme_opt =  wp_parse_args( thematic_get_wp_opt( 'thematic_theme_opt', array() ), thematic_default_opt() );
	
	if ( !isset( $theme_opt[$opt_key] ) ) {
		return false;
	}

	if ( false === $echo ) {
		return $theme_opt[$opt_key];
	} else {
		echo $theme_opt[$opt_key];
	}

}


/**
 * Retrieves legacy Thematic options from database
 * Returns theme as a sanitized array or false
 *
 * @uses thematic_theme_convert_legacy_opt
 * 
 * @since 1.0.0
 */
function thematic_convert_legacy_opt() {
    $thm_insert_position = thematic_get_wp_opt( 'thm_insert_position' );
    $thm_authorinfo = thematic_get_wp_opt( 'thm_authorinfo' );
    $thm_footertext = thematic_get_wp_opt( 'thm_footertext' );
    
    // Return false if no options found
    if ( false === $thm_insert_position && false === $thm_authorinfo && false === $thm_footertext ) {
    	return false; 
	}
    	
    // Return a sanitized array from legacy options if found
    $legacy_sanitized_opt = array(
		'index_insert' 	=> intval( $thm_insert_position ),
		'author_info'  	=> ( $thm_authorinfo == "true" ) ? 1 : 0,
		'footer_txt' 	=> wp_kses_post( $thm_footertext ),
		'del_legacy_opt'=> 0,
		'legacy_xhtml'	=> 1,  // 0 = not checked 1 = check
		'layout'        => thematic_default_theme_layout()
	);

    return apply_filters( 'thematic_theme_convert_legacy_opt', $legacy_sanitized_opt );
}

/**
 * Returns default theme options.
 *
 * Filter: thematic_theme_default_opt
 * 
 * @since 1.0.0
 *
 */
function thematic_default_opt() {
	$thematic_default_opt = array(
		'index_insert' 	=> 2,
		'author_info'  	=> 0, // 0 = not checked 1 = checked
		'footer_txt' 	=> 'Powered by [wp-link]. Built on the [theme-link].',
		'del_legacy_opt'=> 0, // 0 = not checked 1 = check
		'legacy_xhtml'	=> 0,  // 0 = not checked 1 = check
		'layout'        => thematic_default_theme_layout()
	);

	return apply_filters( 'thematic_theme_default_opt', $thematic_default_opt );
}	

	
/**
 * Adds the theme option page as an admin menu item, 
 * and queues the contextual help on theme options page load
 *
 * Filter: thematic_theme_add_opt_page
 * The filter provides the ability for child themes to customize or remove and add 
 * their own options page and queue contextual help in one function
 * 
 * @since 1.0.0
 */
 
function thematic_opt_add_page() {

	$thematic_opt_page = add_theme_page ( __('Theme Options', 'thematic') , __('Theme Options', 'thematic'), 'edit_theme_options', 'thematic_opt', 'thematic_do_opt_page');
	$thematic_opt_page = apply_filters ('thematic_theme_add_opt_page', $thematic_opt_page );
	
	if ( ! $thematic_opt_page ) {
		return;
	}
	
	add_action( "load-$thematic_opt_page", 'thematic_opt_page_help' );
}

add_action( 'admin_menu', 'thematic_opt_add_page' );


/**
 * Generates the help texts and help sidebar items for the options screen
 *
 * Filter: thematic_theme_opt_help_txt <br>
 * Filter: thematic_theme_opt_help_sidebar <br>
 * Override: childtheme_override_opt_page_help <br>
 * 
 * @since 1.0.0
 */
if (function_exists('childtheme_override_opt_page_help')) {
	function thematic_opt_page_help() {
		childtheme_override_opt_page_help();
	}
} else {
	function thematic_opt_page_help() {	
		
		$screen = get_current_screen();
		
		$sidebar  = '<p><strong>' . __( 'For more information:', 'thematic') . '</strong></p>';
		$sidebar .= '<a href="http://thematictheme.com">ThematicTheme.com</a></p>';
		$sidebar .= '<p><strong>' . __('For support:', 'thematic') . '</strong></p>';
		$sidebar .= '<a href="http://thematictheme.com/forums/"> Thematic ';
		$sidebar .= __('forums', 'thematic' ) . '</a></p>';
		
		$sidebar = apply_filters ( 'thematic_theme_opt_help_sidebar', $sidebar );
		
		$help =  '<p>' . __('The options below are enabled by the Thematic Theme and/or a child theme.', 'thematic') .' ';
		$help .= __('New options can be added and the default ones removed by creating a child theme. This contextual help can be customized in a child theme also.', 'thematic') . '</p>';
		
		$help = apply_filters ( 'thematic_theme_opt_help_txt', $help );
	
        $screen->add_help_tab( array( 'title' => __( 'Overview', 'thematic' ), 'id' => 'theme-opt-help', 'content' => $help, ) );
		$screen->set_help_sidebar( $sidebar );
                        
        }
}

/**
 * Renders the theme options page
 *
 * @since 1.0.0
 */
function thematic_do_opt_page() { ?>

 <div class="wrap">
	<?php screen_icon(); ?>

	<?php 
		$frameworkData = wp_get_theme();
    	$theme = $frameworkData->display( 'Name', false ); 
 	?>

	<h2><?php printf( _x( '%s Theme Options', '{$current theme} Theme Options', 'thematic' ), $theme ); ?></h2>
	<?php settings_errors(); ?>
	
	<form action="options.php" method="post" >
		<?php
			settings_fields( 'thematic_opt_group' );
			do_settings_sections( 'thematic_theme_opt' );
			submit_button();			
		?>
	</form>
 
 </div>
 
<?php 
}


/**
 * Renders the "Main" settings section. This is left blank in Thematic and outputs nothing
 *
 * Filter: thematic_theme_opt_section_main
 *
 * @since 1.0.0
 */
function thematic_do_opt_section_main() {
	$thematic_opt_section_main = '';
	echo ( apply_filters( 'thematic_theme_opt_section_main' , $thematic_opt_section_main ) );
}


/**
 * Renders Index Insert elements
 *
 * @since 1.0.0
 */
function thematic_do_insert_opt() { 
?>
	<input type="text" maxlength="4" size="4" value="<?php esc_attr_e( (thematic_get_theme_opt('index_insert') ) ) ;  ?>" id="thm_insert_position" name="thematic_theme_opt[index_insert]">
	<label for="thm_insert_position"><?php _e('The Index Insert widget area will appear after this post number. Entering nothing or 0 will disable this feature.','thematic'); ?></label>
<?php 
}


/**
 * Renders Author Info elements
 *
 * @since 1.0.0
 */
function thematic_do_auth_opt() { 
?>
	<input id="thm_authorinfo" type="checkbox"  value="1" name="thematic_theme_opt[author_info]"  <?php checked( thematic_get_theme_opt('author_info') , 1 ); ?> />
	<label for="thm_authorinfo"><?php printf( _x('Display a %1$smicroformatted vCard%2$s with the author\'s avatar, bio and email on the author page.', '%1$s and %2$s are <a> tags', 'thematic' ) , '<a target="_blank" href="http://microformats.org/wiki/hcard">', '</a>' ); ?></label>
<?php
}


/**
 * Renders Footer Text elements
 *
 * @since 1.0.0
 */
function thematic_do_footer_opt() { 
?>
	<textarea rows="5" cols="94" id="thm_footertext" name="thematic_theme_opt[footer_txt]"><?php thematic_get_theme_opt('footer_txt', true ); ?></textarea>
	<br><?php printf( _x('You can use HTML and shortcodes in your footer text. Shortcode examples: %s', '%s are shortcode tags', 'thematic'), '[wp-link] [theme-link] [loginout-link] [blog-title] [blog-link] [the-year]' ); ?>
<?php
}

/**
 * Renders Leagcy XTML1.0 mode checkbox
 *
 * @since Thematic 2.0.0
 */
 function thematic_do_legacy_xhtml_opt() {
?>
	<input id="thm_legacy_xhtml" type="checkbox" value="1" name="thematic_theme_opt[legacy_xhtml]"  <?php checked( thematic_get_theme_opt('legacy_xhtml'), 1 ); ?> />

	<label for="thm_legacy_xhtml"><?php printf( __( 'Restore the legacy XHTML Doctype and xhtml compatible markup.', 'thematic' ) ) ?></label>
<?php
}

/**
 * Renders Legacy Options elements
 *
 * @since 1.0.0
 */
function thematic_do_legacy_opt() {
?>
	<input id="thm_legacy_opt" type="checkbox" value="1" name="thematic_theme_opt[del_legacy_opt]"  <?php checked( thematic_get_theme_opt('del_legacy_opt'), 1 ); ?> />

	<?php 
        $frameworkData = wp_get_theme();
        $theme = $frameworkData->display( 'Name', false );
 	?>
 	
	<label for="thm_legacy_opt"><?php printf( __( '%s Theme Options have been upgraded to an improved format. Remove the legacy options from the database.', '{$current theme} Theme Options', 'thematic' ), $theme ); ?></label>

<?php
}


/**
 * Validates theme options form post data.
 * Provides error reporting for invalid input.
 *
 * Override: childtheme_override_validate_opt <br>
 * Filter: thematic_theme_opt_validation
 * 
 * @since 1.0.0
 */
if (function_exists('childtheme_override_validate_opt')) {
	function thematic_validate_opt($input) {
		return childtheme_override_validate_opt($input);
	}
} else {
	function thematic_validate_opt($input){
		$output = thematic_get_wp_opt( 'thematic_theme_opt', thematic_default_opt() );	
 	   
		// Index Insert position must be a non-negative number
		if ( !is_numeric( $input['index_insert'] ) || $input['index_insert'] < 0 )  {
 	   		add_settings_error(
 	   			'thematic_theme_opt',
 	   			'thematic_insert_opt',
 	   			__('The index insert position value must be a number equal to or greater than zero. This setting has been reverted to the previous value.', 'thematic' ),
 	   			'error'
 	   		);
		} else {
			// A sanitize numeric value to ensure a whole number
			$output['index_insert'] = intval( $input['index_insert'] );
		}
 	   
		// Author Info CheckBox value either 1(yes) or 0(no)
		$output['author_info'] = ( isset( $input['author_info'] ) && 1 == $input['author_info'] ?  1 : 0 );
 	 
		// Footer Text sanitized allowing HTML and WP shortcodes
		if ( isset( $input['footer_txt'] ) ) {
			$output['footer_txt'] = wp_kses_post( $input['footer_txt'] ) ;	
		}

		// Remove Legacy XHTML CheckBox value either 1(yes) or 0(no)
		$output['legacy_xhtml'] = ( isset( $input['legacy_xhtml'] ) && 1 == $input['legacy_xhtml'] ?  1 : 0 );
		
		// Check and set layout
		if( isset( $input['layout'] ) ) {
			$available_layouts = thematic_available_layout_slugs();

			if( in_array( $input['layout'], $available_layouts ) ) {
				$output['layout'] = $input['layout'];
			} else {
				$output['layout'] = thematic_default_theme_layout();
			}
		}
 	   
		// Remove Legacy Options CheckBox value either 1(yes) or 0(no)
		$output['del_legacy_opt'] = ( isset( $input['del_legacy_opt'] ) && 1 == $input['del_legacy_opt'] ?  1 : 0 );

 	   
		if ( 1 == $output['del_legacy_opt'] ) {
 	   	
			// Remove options if the choice is yes
 	   		delete_option('thm_insert_position');
 	   		delete_option('thm_authorinfo');
 	   		delete_option('thm_footertext');
 	   	
 	   		// Reset checkbox value to unchecked in case a legacy set of options is ever saved to database again
 	   		$output['del_legacy_opt'] = 0;
		}
 	   	
		return apply_filters( 'thematic_theme_opt_validation', $output, $input );
	}
} 
