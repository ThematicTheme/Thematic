<?php
/**
 * Tests for Childtheme overrides functions
 *
 * @package ThematicUnitTests
 */

/**
 * @group overrides
 */
class TestChildthemeOverrides extends Thematic_UnitTestCase {
	
	function setUp() {
		include_once 'childtheme-overrides.php';
		
		parent::setUp();
		
		/* Create and setup a loop for testing */
		$post_ids = $this->factory->post->create_many( 10 );
		foreach ( $post_ids as $post_id )
			clean_post_cache( $post_id );
			
		$query = new WP_Query( array(
			'post_type' => 'post',
			'posts_per_page' => 3,
		) );
		
		$GLOBALS['wp_query'] = $query;
	}

	function test_thematic_override_archive_loop() {
		//do_action('thematic_archiveloop');		
		//$this->assertTrue( 'OVERRIDES_INCLUDED' );
		$this->assertEquals( 'override archive loop!', get_echo( 'thematic_archiveloop' )  );
	}
	
}