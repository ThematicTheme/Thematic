<?php
/**
 * Tests for Theme Options
 *
 * @package ThematicUnitTests
 */

/**
 * @group default
 */
class TestThemeOptions extends Thematic_UnitTestCase {

	function tearDown() {
		delete_option( 'thematic_theme_opt' );
		
		parent::tearDown();
	}


	function test_options_not_in_database_by_default() {
		$this->assertFalse( get_option( 'thematic_theme_opt' ) );

		thematic_opt_init();

		$this->assertFalse( get_option( 'thematic_theme_opt' ) );
	}


	function test_thematic_opt_init_upgrade_from_pre_v1() {
		$this->add_legacy_pre_v1_options();

		thematic_opt_init();

		$expected_ops = array(
    		'index_insert' 	=> 4,
    		'author_info'  	=> 1,
    		'footer_txt' 	=> 'Powered by [wp-link]. Built on the [theme-link].',
    		'del_legacy_opt'=> 0,
			'legacy_xhtml'	=> 1,
			'layout'        => thematic_default_theme_layout()
    	);

		$upgraded_ops = get_option( 'thematic_theme_opt' );

		$this->assertEquals( $expected_ops, $upgraded_ops, 'Pre-1 options should be converted' );
		$this->assertEquals( $upgraded_ops['legacy_xhtml'], 1, 'Theme options should set xhtml mode to true');

		$this->delete_legacy_pre_v1_options();
	}
	
	
	function test_thematic_opt_init_upgrade_from_v1() {

		/* filter the validation so the old theme options will save */
		add_filter( 'thematic_theme_opt_validation', array( $this, 'upgrade_pre_v2_validation' ) );

		$previous_defaults = array(
			'index_insert' 	=> 2,
			'author_info'  	=> 0, // 0 = not checked 1 = checked
			'footer_txt' 	=> 'Powered by [wp-link]. Built on the [theme-link].',
			'del_legacy_opt'=> 0  // 0 = not checked 1 = check
		);
		add_option( 'thematic_theme_opt', $previous_defaults );

		/* Theme options now equals the 1.0.4 defaults */
		$this->assertEquals( $previous_defaults, get_option( 'thematic_theme_opt' ), 'Theme options should be 1.x defaults' );

		/* reset the validation filter */
		remove_filter( 'thematic_theme_opt_validation', array( $this, 'upgrade_pre_v2_validation' ) );		

		/* Run upgrading routine */
		thematic_opt_init();

		$new_options = get_option( 'thematic_theme_opt' );

		$this->assertArrayHasKey( 'layout', $new_options );
		$this->assertEquals( $new_options['legacy_xhtml'], 1, 'Theme options should set xhtml mode to true');
	}
	
	
	function test_thematic_get_theme_opt_default_opt_parsed_in_returned() {
		$this->assertFalse( get_option('thematic_theme_opt') );

		$footer_text = thematic_get_theme_opt( 'footer_txt' );

		$this->assertEquals( 'Powered by [wp-link]. Built on the [theme-link].', $footer_text );		
	}
	
	
	function test_thematic_get_theme_opt_default_opt_parsed_in_echoed() {
		$this->assertFalse( get_option('thematic_theme_opt') );

		$footer_text = thematic_get_theme_opt( 'footer_txt', true );

		$this->expectOutputString( 'Powered by [wp-link]. Built on the [theme-link].', $footer_text );		
	}
	
	
	function test_thematic_get_theme_opt_nonexisting_option() {
		$this->assertFalse( get_option('thematic_theme_opt') );

		$nonexisting_option = thematic_get_theme_opt( 'wacko' );

		$this->assertFalse( $nonexisting_option );		
	}
	
	
	function test_thematic_convert_legacy_opt() {
		$this->add_legacy_pre_v1_options();

		$converted_ops = thematic_convert_legacy_opt();

		$expected_ops = array(
    		'index_insert' 	=> 4,
    		'author_info'  	=> 1,
    		'footer_txt' 	=> 'Powered by [wp-link]. Built on the [theme-link].',
    		'del_legacy_opt'=> 0,
			'legacy_xhtml'	=> 1,
			'layout'        => thematic_default_theme_layout()
    	);

		$this->assertEquals( $expected_ops, $converted_ops );
	}
	
	
	function test_thematic_default_opt() {
		$expected_ops = array(
			'index_insert' 	=> 2,
			'author_info'  	=> 0, // 0 = not checked 1 = checked
			'footer_txt' 	=> 'Powered by [wp-link]. Built on the [theme-link].',
			'del_legacy_opt'=> 0, // 0 = not checked 1 = check
			'legacy_xhtml'	=> 0,  // 0 = not checked 1 = check
			'layout'        => thematic_default_theme_layout()
		);

		$this->assertEquals( $expected_ops, thematic_default_opt() );
	}
	
	
	/**
	 * @dataProvider options_to_validate
	 */
	function test_thematic_validate_opt( $input, $expected ) {

		$actual = thematic_validate_opt( $input );

		$this->assertEquals( $expected, $actual );
	}
	
	
	function add_legacy_pre_v1_options() {
		add_option( 'thm_insert_position', '4' );
		add_option( 'thm_authorinfo', 'true' );
		add_option( 'thm_footertext', 'Powered by [wp-link]. Built on the [theme-link].' );
	}
	
	
	function delete_legacy_pre_v1_options() {
		delete_option( 'thm_insert_position' );
		delete_option( 'thm_authorinfo' );
		delete_option( 'thm_footertext' );
	}
	
	
	function add_v1_default_options() {
		$default_ops = array(
			'index_insert' 	=> 4,
			'author_info'  	=> 0, // 0 = not checked 1 = checked
			'footer_txt' 	=> 'Powered by [wp-link]. Built on the [theme-link].',
			'del_legacy_opt'=> 0  // 0 = not checked 1 = check
		);
		add_option( 'thematic_theme_opt', $default_ops );
	}
	
	function upgrade_pre_v2_validation( $output ) {
		
		$previous_defaults = array(
			'index_insert' 	=> 2,
			'author_info'  	=> 0, // 0 = not checked 1 = checked
			'footer_txt' 	=> 'Powered by [wp-link]. Built on the [theme-link].',
			'del_legacy_opt'=> 0  // 0 = not checked 1 = check
		);

		return $previous_defaults;
	}
	
	
	function options_to_validate() {
		return array(
			array(    //first iteration
				array(
					'index_insert' 	=> 3.45,
					'author_info'  	=> 1,
					'footer_txt' 	=> 'go to <a href="">link</a><script></script>',
					'layout'        => 'full-width'
				),
				array(
					'index_insert' 	=> 3,
					'author_info'  	=> 1,
					'footer_txt' 	=> 'go to <a href="">link</a>',
					'del_legacy_opt'=> 0,
					'legacy_xhtml'	=> 0,
					'layout'        => 'full-width'					
				)	
			),
			array(    //second iteration
				array(
					'index_insert' 	=> -5,
					'footer_txt' 	=> '<iframe></iframe>text<embed></embed>',
					'layout'        => 'wacko'
				),
				array(
					'index_insert' 	=> 2,
					'author_info'  	=> 0,
					'footer_txt' 	=> 'text',
					'del_legacy_opt'=> 0,
					'legacy_xhtml'	=> 0,
					'layout'        => 'right-sidebar'
				)
			),
			array(    //third iteration
				array(
					'del_legacy_opt'=> 1,
					'legacy_xhtml'	=> 1
				),
				array(
					'index_insert' 	=> 2,
					'author_info'  	=> 0,
					'footer_txt' 	=> 'Powered by [wp-link]. Built on the [theme-link].',
					'del_legacy_opt'=> 0,
					'legacy_xhtml'	=> 1,
					'layout'        => 'right-sidebar'
				)
			),
			array(    //fourth iteration
				array(
					'super_option' => 'lalaland'
				),
				array(
					'index_insert' 	=> 2,
					'author_info'  	=> 0,
					'footer_txt' 	=> 'Powered by [wp-link]. Built on the [theme-link].',
					'del_legacy_opt'=> 0,
					'legacy_xhtml'	=> 0,
					'layout'        => 'right-sidebar'
				)
			)
			
		);
	}
	
}