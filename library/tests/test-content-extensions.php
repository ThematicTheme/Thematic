<?php
/**
 * Tests for Content Extensions
 *
 * @package ThematicUnitTests
 */

/**
 * @group default
 */
class TestContentExtensions extends Thematic_UnitTestCase {
	
	function setUp() {
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

	function test_thematic_nav_above() {
		$this->expectOutputRegex( '/<nav id="nav-above"/', thematic_nav_above() );	
	}
	
	function test_thematic_archiveloop() {		
		$this->expectOutputRegex( '/<article id="post/', thematic_archiveloop() );
	}
	
	function test_thematic_authorloop() {		
		$this->expectOutputRegex( '/<article id="post/', thematic_authorloop() );
	}
	
	function test_thematic_categoryloop() {		
		$this->expectOutputRegex( '/<article id="post/', thematic_categoryloop() );
	}
	
	function test_thematic_indexloop() {		
		$this->expectOutputRegex( '/<article id="post/', thematic_indexloop() );
	}
	
	function test_thematic_searchloop() {		
		$this->expectOutputRegex( '/<article id="post/', thematic_searchloop() );
	}
	
	function test_thematic_singlepost() {		
		$this->expectOutputRegex( '/<article id="post/', thematic_singlepost() );
	}
	
	function test_thematic_tagloop() {		
		$this->expectOutputRegex( '/<article id="post/', thematic_tagloop() );
	}
	
	
	function test_thematic_postheader() {
		$this->expectOutputRegex( '/<header/', thematic_postheader() );	
	}
	
	function test_thematic_postheader_posttitle() {
		$content = thematic_postheader_posttitle();
		$this->assertRegexp( '/^\n\n\t\t\t\t\t<h1/', $content );
		$this->assertRegexp( '/<\/h1>$/', $content );
	}
	
	function test_thematic_link_pages_args() {
		$post = $this->factory->post->create_and_get( array( 'post_content' => 'Page 0<!--nextpage-->Page 1<!--nextpage-->Page 2<!--nextpage-->Page 3' ) );
		setup_postdata( $post );
		
		$content = wp_link_pages( array( 'before' => sprintf( '<nav class="page-link">%s', __( 'Pages:', 'thematic' ) ),'after' => '</nav>', 'echo' => '0' ) );
		$this->assertRegexp( '/^<nav/', $content );
	}
	
	function test_thematic_postfooter() {
		$this->expectOutputRegex( '/<footer/', thematic_postfooter() );	
	}
	
	function test_thematic_nav_below() {
		$this->expectOutputRegex( '/<nav id="nav-below"/', thematic_nav_below() );	
	}

}