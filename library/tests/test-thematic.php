<?php
/**
 * Create a base class for Unit testing
 * 
 * @package ThematicUnitTests
 */

/**
 * @group default
 */
class Thematic_UnitTestCase extends WP_UnitTestCase {
	
	/**
	 * @var array
	 */
	public $theme_options;

	function setUp() {
	    parent::setUp();
		
		/* Make sure the active theme is Thematic */
	    switch_theme( 'Thematic' );
		
		
		/* Include the Thematic function file and extensions */
		require_once '../../functions.php';
		
		include_once '../extensions/comments-extensions.php';
		include_once '../extensions/content-extensions.php';
		include_once '../extensions/discussion-extensions.php';
		include_once '../extensions/discussion.php';
		include_once '../extensions/dynamic-classes.php';
		include_once '../extensions/footer-extensions.php';
		include_once '../extensions/header-extensions.php';
		include_once '../extensions/helpers.php';
		include_once '../extensions/shortcodes.php';
		include_once '../extensions/sidebar-extensions.php';
		include_once '../extensions/theme-options.php';
		include_once '../extensions/widgets-extensions.php';
		include_once '../extensions/widgets.php';
		

		/* Setup the theme options */
		$this->theme_options =  thematic_default_opt() ;
		$this->theme_options['legacy_xhtml'] = '0';	
		$this->update_test_options( 'thematic_theme_opt', $this->theme_options );
		
		
		/* Define Thematic constants */
		define('THEMATIC_MB', false);
		
		if ( defined( 'WP_TESTS_MULTISITE') && WP_TESTS_MULTISITE )
			define('THEMATIC_MB', true);
	} // end setup


	function test_active_theme() {
	    $this->assertTrue( 'Thematic' == get_current_theme() );
	}
	
	
	function test_we_have_options() {
		$options = $this->get_test_options( 'thematic_theme_opt' );
		$this->assertArrayHasKey( 'legacy_xhtml' , $options );
	}


	/**
	 * A wrapper for retrieving theme options on the test install
	 * 
	 * @param string $option_name The option name
	 * @return mixed Value set for the option
	 */
	function get_test_options( $option_name ) {
		if ( defined( 'WP_TESTS_MULTISITE') && WP_TESTS_MULTISITE ) {
			global $blog_id;
			$options = get_blog_option( $blog_id, $option_name, $this->theme_options );
		} else {
			$options = get_option( $option_name, $this->theme_options );
		}
		return $options;
	}


	/**
	 * A wrapper for updating theme options on the test install
	 * 
	 * @param string $option_name The option name
	 * @param array The options array to update
	 * @return bool True on success, false on failure.
	 */
	function update_test_options( $option_name, $options_array ) {
		if ( defined( 'WP_TESTS_MULTISITE') && WP_TESTS_MULTISITE ) {
			global $blog_id;
			$options = update_blog_option( $blog_id, $option_name, $options_array );
		} else {
			$options = update_option( $option_name, $options_array );
		}
		return $options;
	}
}
