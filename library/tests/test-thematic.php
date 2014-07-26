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

	function setUp() {
	    parent::setUp();
		
		/* Make sure the active theme is Thematic */
		switch_theme( 'Thematic' );

		/* Include the Thematic function file and extensions */
		include_main_theme_files();

	} // end setup


	function test_active_theme() {
	    $this->assertTrue( 'Thematic' == wp_get_theme() );
	}

}
