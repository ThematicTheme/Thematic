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
 * @since 2.0.0
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

	// Get the default thematic footer text 
	$thematic_defaults = thematic_default_opt();
	$thematic_default_footertext = $thematic_defaults['footer_txt'];
	$thematic_default_layout = $thematic_defaults['layout'];

	// Only show the layout section if the theme supports it
	if( current_theme_supports('thematic_customizer_layout') ) {
		
		$wp_customize->add_section( 'thematic_layout', array(
			'title'       => __( 'Layout', 'thematic' ),
			'description' => __( 'Choose the main layout of your theme', 'thematic' ),
			'capability'  => 'edit_theme_options',
			'priority'    => '90'
		) );
		
		$wp_customize->add_setting( 'thematic_theme_opt[layout]', array(
			'default'  => $thematic_default_layout,
			'type'   => 'option',
		) );
		
		$possible_layouts = thematic_available_theme_layouts();
		$available_layouts = array();
		foreach( $possible_layouts as $layout) {
			$available_layouts[ $layout['slug'] ] = $layout['title'];
		}

		$wp_customize->add_control( 'thematic_layout_control', array(
			'type'  => 'radio',
			'label'  => __( 'Theme layout', 'thematic' ),
			'section' => 'thematic_layout',
			'choices' => $available_layouts,
			'settings' => 'thematic_theme_opt[layout]'
		) );
	}
	
	// Add section for thematic footer options 
    $wp_customize->add_section( 'thematic_footer_text', array(
		'title'			=> __( 'Footer', 'thematic'),
		'description'	=> sprintf( _x('You can use HTML and shortcodes in your footer text. Shortcode examples: %s', '%s are shortcode tags', 'thematic'), '[wp-link] [theme-link] [loginout-link] [blog-title] [blog-link] [the-year]' ),
		'priority'		=> 135,
	) );
	
	// Add setting for footer text 
    $wp_customize->add_setting( 'thematic_theme_opt[footer_txt]', array(
		'default'		=> $thematic_default_footertext,
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'refresh'
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
 * @since 2.0.0
 */
function thematic_customize_preview_js() {
	wp_enqueue_script( 'thematic_customizer', get_template_directory_uri() . '/library/js/customizer.js', array( 'customize-preview' ), '20131119', true );
}
add_action( 'customize_preview_init', 'thematic_customize_preview_js' );
