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
		include_legacy_xhtml_files();

		/* Load the thematic files */
		parent::setUp();
		
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
		$this->assertEquals( 'override archive loop!', get_echo( 'thematic_archiveloop' )  );
	}
	
	
	function test_thematic_override_author_loop() {
		$this->assertEquals( 'override author loop!', get_echo( 'thematic_authorloop' )  );
	}
	
	
	function test_thematic_override_category_loop() {
		$this->assertEquals( 'override category loop!', get_echo( 'thematic_categoryloop' )  );
	}
	
	
	function test_thematic_override_index_loop() {
		$this->assertEquals( 'override index loop!', get_echo( 'thematic_indexloop' )  );
	}
	
	
	function test_thematic_override_search_loop() {
		$this->assertEquals( 'override search loop!', get_echo( 'thematic_searchloop' )  );
	}
	
	
	function test_thematic_override_single_post() {
		$this->assertEquals( 'override single post loop!', get_echo( 'thematic_singlepost' )  );
	}
	
	
	function test_thematic_override_tag_loop() {
		$this->assertEquals( 'override tag loop!', get_echo( 'thematic_tagloop' )  );
	}
	
}