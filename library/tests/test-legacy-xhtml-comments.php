<?php
/**
 * Tests for Comments and Discussions
 * 
 *
 * @package ThematicUnitTests
 */

/**
 * @group legacy
 */
class TestLegacyComments extends Thematic_UnitTestCase {
	
	function setUp() {
		/* Load the legacy files before anything else - needed for childtheme_overrides* to work */
		include_legacy_xhtml_files();

		/* Load the thematic files */
		parent::setUp();

		/* Create and setup some comments for testing */
		$post_id = $this->factory->post->create();
		$this->factory->comment->create_post_comments( $post_id, 10 );
		
		$comments = get_comments( array( 'post_id' => $post_id ) );
		
		$query = new WP_Query();
		
		$query->comments = $comments;
		
		$GLOBALS['wp_query'] = $query;
	}
	
	
	function test_thematic_comment_class() {
		$this->expectOutputRegex( '/thm-c-/', wp_list_comments( thematic_list_comments_arg() ) );
	}
	
	function test_thematic_comments_args_filter() {
		$args = array(
			'type' => 'comment',
			'callback' => 'thematic_comments'
		);
		$actual = apply_filters( 'thematic_list_comments_arg', $args );
		
		$this->assertEquals( 'thematic_comments_xhtml', $actual[ 'callback' ] );
	}

	function test_thematic_comments_callback() {
		$this->expectOutputRegex( '/(?!<article)./', wp_list_comments( thematic_list_comments_arg() ) );	
	}
	
	function test_thematic_commentmeta() {
		$this->expectOutputRegex( '/(?!<time)./', thematic_commentmeta() );	
	}
	
}