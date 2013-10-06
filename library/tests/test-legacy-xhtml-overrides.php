<?php
/**
 * Tests for Override functions in Legacy XHTML mode
 *
 * @package ThematicUnitTests
 */


/**
 * @group overrides
 */
class TestLegacyOverridesXTHML extends Thematic_UnitTestCase {
	
	function setUp() {
		
		include_once 'childtheme-overrides.php';
		
		/* Load the legacy files before anything else - needed for childtheme_overrides* to work */
		include_once '../legacy/deprecated.php';
		include_once '../legacy/legacy.php';
		
		/* Load the thematic files */
		parent::setUp();
		
		/* Set the option to use legacy mode */
		$this->theme_options = $this->get_test_options( 'thematic_theme_opt' );
		$this->theme_options['legacy_xhtml'] = '1';
		
		$this->update_test_options( 'thematic_theme_opt', $this->theme_options );
		
		/* Create and setup a loop for testing */
		$post_ids = $this->factory->post->create_many( 10 );
		foreach ( $post_ids as $post_id )
			clean_post_cache( $post_id );
			
		$query = new WP_Query( array(
			'post_type' => 'post',
			'posts_per_page' => 5,
		) );
		
		$GLOBALS['wp_query'] = $query;
		
	}
	
	
	function test_thematic_override_archive_loop() {
		//do_action('thematic_archiveloop');		
		//$this->assertTrue( 'OVERRIDES_INCLUDED' );
		$this->expectOutputRegex( '/override archive loop!/', thematic_archiveloop() );
	}
	
}