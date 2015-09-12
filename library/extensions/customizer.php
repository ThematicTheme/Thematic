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
 * @since 1.1
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function thematic_customize_register( $wp_customize ) {
	
	/**
	 * Create a custom control to use a textarea for the footer text
	 * 
	 * @link http://ottopress.com/2012/making-a-custom-control-for-the-theme-customizer/
	 */
	class Thematic_Customize_Textarea_Control extends WP_Customize_Control {
	    public $type = 'textarea';

	    public function render_content() {
	        ?>
	        <label>
	        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	        </label>
	        <?php
	    }
	}
	
	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	
	// Get the theme options array
	$thematic_defaults = thematic_default_opt();

	// Get the default index insert position value
	$thematic_default_index_insert = $thematic_defaults['index_insert'];
	
	/**
	 * Index Insert
	 */
	 
	// Add section for thematic index insert position
    $wp_customize->add_section( 'thematic_index_insert', array(
		'title'			=> __( 'Index Insert Position', 'thematic'),
		'description'	=> __('Choose the number of posts that appear before the Index Insert Widget Area', 'thematic'), 
		'priority'		=> 125,
	) );

	// Add setting for index insert  
    $wp_customize->add_setting( 'thematic_theme_opt[index_insert]', array(
		'default'		=> $thematic_default_index_insert,
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'refresh'
	) );
 
	// Add control for index insert
	$wp_customize->add_control( 'thematic_theme_opt[index_insert]', array(
		'label'			=> __('Index Insert', 'thematic'),
		'section'		=> 'thematic_index_insert',
		'type'			=> 'number',
		'settings'		=> 'thematic_theme_opt[index_insert]'
	) );
	
	/**
	 * Author Info vCard
	 */

    $wp_customize->add_section( 'thematic_author_info', array(
		'title'			=> __( 'Info on Author Page', 'thematic'),
		'description'	=> sprintf( _x('Display a %1$smicroformatted vCard%2$s with the author\'s avatar, bio and email on the author page.', '%1$s and %2$s are <a> tags', 'thematic' ) , '<a target="_blank" href="http://microformats.org/wiki/hcard">', '</a>' ), 
		'priority'		=> 130,
	) );

	// Get the default author info value
	$thematic_default_author_info = $thematic_defaults['author_info'];

	// Add setting for author info  
    $wp_customize->add_setting( 'thematic_theme_opt[author_info]', array(
		'default'		=> $thematic_default_author_info,
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'refresh'
	) );
 
	// Add control for author info
	$wp_customize->add_control( 'thematic_theme_opt[author_info]', array(
		'label'			=> __('Info on Author Page', 'thematic'),
		'section'		=> 'thematic_author_info',
		'type'			=> 'checkbox',
		'settings'		=> 'thematic_theme_opt[author_info]'
	) );
	
	/**
	 * Footer Text
	 */
	 
	// Add section for thematic footer options 
    $wp_customize->add_section( 'thematic_footer_text', array(
		'title'			=> __( 'Footer', 'thematic'),
		'description'	=> sprintf( _x('You can use HTML and shortcodes in your footer text. Shortcode examples: %s', '%s are shortcode tags', 'thematic'), '[wp-link] [theme-link] [loginout-link] [blog-title] [blog-link] [the-year]' ),
		'priority'		=> 135,
	) );
	
	// Set the default thematic footer text 
	$thematic_default_footertext = $thematic_defaults['footer_txt'];

	// Add setting for footer text 
    $wp_customize->add_setting( 'thematic_theme_opt[footer_txt]', array(
		'default'		=> $thematic_default_footertext,
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'postMessage'
	) );
 
	// Add control for footer text 
	$wp_customize->add_control( new Thematic_Customize_Textarea_Control( $wp_customize, 'thematic_theme_opt[footer_txt]', array(
		'label'			=> __('Footer text', 'thematic'),
		'section'		=> 'thematic_footer_text',
		'type'			=> 'textarea',
		'settings'		=> 'thematic_theme_opt[footer_txt]'
	) ) );
	
}
add_action( 'customize_register', 'thematic_customize_register' );


/**
 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since 1.1
 */
function thematic_customize_preview_js() {
	wp_enqueue_script( 'thematic_customizer', get_template_directory_uri() . '/library/js/customizer.js', array( 'customize-preview' ), '20131119', true );
}
add_action( 'customize_preview_init', 'thematic_customize_preview_js' );
