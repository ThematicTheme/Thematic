<?php
/**
 * Custom Child Theme Functions
 *
 * This file's parent directory can be moved to the wp-content/themes directory 
 * to allow this Child theme to be activated in the Appearance - Themes section of the WP-Admin.
 *
 * Included is a basic theme setup that will add support for custom header images and custom 
 * backgrounds. There are also a set of commented theme supports that can be uncommented if you need
 * them for backwards compatibility. If you are starting a new theme, these legacy functionality can be deleted.  
 *
 * More ideas can be found in the community documentation for Thematic
 * @link http://docs.thematictheme.com
 *
 * @package ThematicSampleChildTheme
 * @subpackage ThemeInit
 */


/**
 * Define theme setup
 */
function childtheme_setup() {
	// For backwards compatibility with some older child themes
	// add_theme_support( 'thematic_legacy_feedlinks' ); // replaces define( 'THEMATIC_COMPATIBLE_FEEDLINKS', true );
	// add_theme_support( 'thematic_legacy_body_class' ); // replaces define( 'THEMATIC_COMPATIBLE_BODY_CLASS', true );
	// add_theme_support( 'thematic_legacy_post_class' ); // replaces define( 'THEMATIC_COMPATIBLE_POST_CLASS', true );
	// add_theme_support( 'thematic_legacy_comment_form' ); // replaces define( 'THEMATIC_COMPATIBLE_COMMENT_FORM', true );
	// add_theme_support( 'thematic_legacy_comment_handling' ); // replaces define( 'THEMATIC_COMPATIBLE_COMMENT_HANDLING', true );
	
	
	/*
	 * Add support for custom background
	 * 
	 * Allow users to specify a custom background image or color.
	 * Requires at least WordPress 3.4
	 * 
	 * @link http://codex.wordpress.org/Custom_Backgrounds Custom Backgrounds
	 */
	add_theme_support( 'custom-background' );
	
	
	/**
	 * Add support for custom headers
	 * 
	 * Customize to match your child theme layout and style.
	 * Requires at least WordPress 3.4
	 * 
	 * @link http://codex.wordpress.org/Custom_Headers Custom Headers
	 */
	add_theme_support( 'custom-header', array(
		// Header image default
		'default-image'	=> '',
		// Header text display default
		'header-text'	=> true,
		// Header text color default
		'default-text-color'	=> '',
		// Header image width (in pixels)
		'width'	=> '940',
		// Header image height (in pixels)
		'height'	=> '235',
		// Header image random rotation default
		'random-default'	=> false,
		// Template header style callback
		'wp-head-callback'	=> 'childtheme_header_style',
		// Admin header style callback
		'admin-head-callback'	=> 'childtheme_admin_header_style'
			) 
	);
	
}
add_action('after_setup_theme', 'childtheme_setup', 20);


/**
 * Custom Image Header Front-End Callback
 *
 * Defines the front-end style definitions for 
 * the custom image header.
 *
 * @link http://codex.wordpress.org/Function_Reference/get_header_image get_header_image()
 * @link http://codex.wordpress.org/Function_Reference/get_header_textcolor get_header_textcolor()
 */
function childtheme_header_style() {
	?>	
	<style type="text/css">
	/* Sets header image as background for div#branding */
	<?php
	if ( get_header_image() && HEADER_IMAGE != get_header_image() ) {
		?>
		#branding {
			background:url('<?php header_image(); ?>') no-repeat center top;
			overflow: hidden;
		}
		<?php if ( 'blank' != get_header_textcolor() ) { ?>
		#blog-title, #blog-title a {
			color:#000;
		}
		<?php
		}	
	}
	?>
	/* Sets text color for #blog-title and #blog-description */
	<?php
	if ( get_header_textcolor() ) {
		?>
		#blog-title, #blog-title a, #blog-description {
			color:#<?php header_textcolor(); ?>;
		}
		<?php
	}
	?>
	</style>
	<?php
}


/**
 * Custom Image Header Admin Callback
 *
 * Callback to define the admin (back-end) style
 * definitions for the custom image header. Customize
 * css to match your theme defaults.
 */
function childtheme_admin_header_style() {
	?>
	<style type="text/css">
	#headimg {
		width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
		height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
	}
	#headimg h1,
	#headimg div {
	border:0;
	}
	#headimg h1 {
	    font-family:Arial,sans-serif;
	    font-size:34px;
	    font-weight:bold;
	    line-height:40px;
		padding-top:88px;
		margin:0;
	}
	#headimg h1 a {
		text-decoration: none;
	}
	#headimg div {
	    font-size:13px;
	    font-style:italic;
	}
	</style>
	<?php
}

