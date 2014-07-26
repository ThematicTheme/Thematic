<?php
/**
 * Tests for Thematic helper functions
 *
 * @package ThematicUnitTests
 */

/**
 * @group default
 */
class TestHelpers extends Thematic_UnitTestCase {
	
	/**
	 * The theme options from 1.0
	 * @var array
	 */
	private $pre_upgrade_opt;


	function setUp() {
		
		$this->pre_upgrade_opt = array(
			'index_insert' 	=> 2,
			'author_info'  	=> 0,
			'footer_txt' 	=> 'Powered by [wp-link]. Built on the [theme-link].',
			'del_legacy_opt'=> 0
		);
		
		parent::setUp();
	}


	function test_html5_markup_by_default() {
		$this->assertFalse( thematic_is_legacy_xhtml() );
	}
	
	
	function test_xhtml_mode_set_by_database() {

		$this->set_xhtml_theme_option();
		
		$this->assertTrue( thematic_is_legacy_xhtml() );
		
		$this->delete_theme_option();
	}


	function test_html5_markup_specified_by_theme_support() {
		
		$this->set_xhtml_theme_option();
		$this->assertTrue( thematic_is_legacy_xhtml() );
		
		add_theme_support( 'thematic_html5' );
		$this->assertFalse( thematic_is_legacy_xhtml() );
		
		remove_theme_support( 'thematic_html5' );
		$this->assertTrue( thematic_is_legacy_xhtml() );
		
		$this->delete_theme_option();
	}
	
	
	function test_xhtml_markup_specified_by_theme_support() {
		
		$this->assertFalse( thematic_is_legacy_xhtml() );
		
		add_theme_support( 'thematic_xhtml' );
		$this->assertTrue( thematic_is_legacy_xhtml() );
		
		remove_theme_support( 'thematic_xhtml' );
		$this->assertFalse( thematic_is_legacy_xhtml() );
	}
	
	
	function test_xhtml_mode_set_by_upgrade() {

		// set pre-upgrade options
		$this->update_theme_option( $this->pre_upgrade_opt );
		
		// run upgrade routine - function is hooked to admin_init
		thematic_opt_init();
		
		$this->assertEquals( 'right-sidebar', thematic_get_theme_opt( 'layout' ) );
		$this->assertTrue( thematic_is_legacy_xhtml() );
		
		$this->delete_theme_option();
	}
	
	
	function set_xhtml_theme_option() {
		$options = thematic_default_opt();
		$options['legacy_xhtml'] = 1;
		
		$this->update_theme_option( $options );
	}

}
