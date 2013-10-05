<?php
/**
 * Tests for Content Extensions
 *
 * @package ThematicUnitTests
 */

class TestContentExtensions extends Thematic_UnitTestCase {

	function test_thematic_nav_above() {
		$this->expectOutputRegex( '/<nav id="nav-above"/', thematic_nav_above() );	
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