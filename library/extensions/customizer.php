<?php
/**
 * Thematic support for Theme Customizer
 *
 * @package ThematicCoreLibrary
 * @subpackage Customizer
 */


/**
 * Implement Theme Customizer additions and adjustments.
 *
 * @since 2.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function thematic_customize_register( $wp_customize ) {
	
	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	
	// Add section for thematic footer options 
    $wp_customize->add_section( 'thematic_footer_text', array(
        'title'			=> __( 'Footer', 'tornfeldt'),
        'priority'		=> 135,
    ) );
	
	// Get the default thematic footer text 
	$thematic_defaults = thematic_default_opt();
	$thematic_default_footertext = $thematic_defaults['footer_txt'];

	// Add setting for footer text 
    $wp_customize->add_setting( 'thematic_theme_opt[footer_txt]', array(
        'default'		=> $thematic_default_footertext,
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'postMessage'
    ) );
 
	// Add control for footer text 
    $wp_customize->add_control( 'thematic_theme_opt[footer_txt]', array(
        'label'			=> __('Footer text', 'thematic'),
        'section'		=> 'thematic_footer_text',
        'type'			=> 'text',
		'settings'		=> 'thematic_theme_opt[footer_txt]'
    ) );
	
}
add_action( 'customize_register', 'thematic_customize_register' );

/**
 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since 2.0
 */
function thematic_customize_preview_js() {
	wp_enqueue_script( 'thematic_customizer', get_template_directory_uri() . '/library/js/customizer.js', array( 'customize-preview' ), '20131119', true );
}
add_action( 'customize_preview_init', 'thematic_customize_preview_js' );