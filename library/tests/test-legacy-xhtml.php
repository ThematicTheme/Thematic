<?php
/**
 * Tests for Legacy XHTML mode
 * 
 * Run these tests separately with `phpunit text-legacy-xhtml.php`
 *
 * @package ThematicUnitTests
 */

/**
 * @group legacy
 */
class TestLegacyXTHML extends Thematic_UnitTestCase {
	
	function setUp() {
		
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
		
		thematic_replace_loops();
	}


	function test_thematic_doctype() {
		$this->expectOutputRegex( '/^<!DOCTYPE html PUBLIC/', thematic_doctype() );	
	}
	
	
	function test_thematic_open_header_xhtml() {
		$actual = apply_filters( 'thematic_open_header', '<header id="header" class="site-header">' );
		$this->assertEquals( '<div id="header" class="site-header">', $actual );	
	}
	
	
	function test_thematic_close_header_xhtml() {
		$actual = apply_filters( 'thematic_close_header', '</header><!-- .site-header-->' );
		$this->assertEquals( '</div><!-- .site-header-->', $actual );	
	}
	
	
	function test_thematic_navmenu_args_xhtml() {
		$args = array(
			'container' => 'nav'
		);
		$actual = apply_filters( 'thematic_nav_menu_args', $args );
		$this->assertEquals( 'div', $actual[ 'container' ] );
	}
	
	function test_xhtml_nav_above() {
		$this->expectOutputRegex( '/<div id="nav-above"/', thematic_nav_above() );	
	}
	
	function test_thematic_archiveloop_xhtml() {		
		$this->expectOutputRegex( '/<div id="post/', thematic_archiveloop() );
	}
	
	function test_thematic_authorloop_xhtml() {		
		$this->expectOutputRegex( '/<div id="post/', thematic_authorloop() );
	}
	
	function test_thematic_categoryloop_xhtml() {		
		$this->expectOutputRegex( '/<div id="post/', thematic_categoryloop() );
	}
	
	function test_thematic_indexloop_xhtml() {		
		$this->expectOutputRegex( '/<div id="post/', thematic_indexloop() );
	}
	
	function test_thematic_searchloop_xhtml() {		
		$this->expectOutputRegex( '/<div id="post/', thematic_searchloop() );
	}
	
	function test_thematic_singlepost_xhtml() {		
		$this->expectOutputRegex( '/<div id="post/', thematic_singlepost() );
	}
	
	function test_thematic_tagloop_xhtml() {		
		$this->expectOutputRegex( '/<div id="post/', thematic_tagloop() );
	}
	
	
	function test_xhtml_thematic_postheader() {
		$content = get_echo( 'thematic_postheader' );
		$this->assertRegexp( '/^\n\n\t\t\t\t\t<h2/', $content );
	}
	
	function test_xhtml_thematic_postheader_posttitle() {
		$content = thematic_postheader_posttitle();
		$this->assertRegexp( '/^\n\n\t\t\t\t\t<h2/', $content );
		$this->assertRegexp( '/<\/h2>$/', $content );
	}
	
	function test_xhtml_thematic_postfooter() {
		$content = get_echo( 'thematic_postfooter' );
		$this->assertRegexp( '/^<div/', $content );
	}
	
	function test_xhtml_thematic_link_pages_args() {
		$post = $this->factory->post->create_and_get( array( 'post_content' => 'Page 0<!--nextpage-->Page 1<!--nextpage-->Page 2<!--nextpage-->Page 3' ) );
		setup_postdata( $post );
		
		$content = wp_link_pages( array( 'before' => sprintf( '<nav class="page-link">%s', __( 'Pages:', 'thematic' ) ),'after' => '</nav>', 'echo' => '0' ) );
		
		$this->assertRegexp( '/^<div/', $content );
		$this->assertRegexp( '/<\/div>$/', $content );
	}
	
	function test_xhtml_nav_below() {
		$this->expectOutputRegex( '/<div id="nav-below"/', thematic_nav_below() );	
	}
	
	function test_xhtml_before_widget_area() {			
		$content = '<aside id="third" class="third-sub-aside aside sub-aside">';
		$this->assertRegexp( '/^<aside/', $content );
		
		$actual = apply_filters( 'thematic_before_widget_area', $content );
		$this->assertRegexp( '/^<div/', $actual );
	}
	
	
	function test_xhtml_after_widget_area() {			
		$ul_content = '</div><!-- .inner -->';		
		$ul_actual = apply_filters( 'thematic_after_widget_area', $ul_content );
		$this->assertRegexp( '/^<\/ul/', $ul_actual );
		
		$aside_content = '</aside><!-- .third-sub-aside -->';
		$aside_actual = apply_filters( 'thematic_after_widget_area', $aside_content );
		$this->assertRegexp( '/^<\/div/', $aside_actual );
	}
	
	
	function test_xhtml_before_widget() {			
		$content = '<section id="%1$s" class="widgetcontainer %2$s">';		
		$actual = apply_filters( 'thematic_before_widget', $content );
		$this->assertRegexp( '/^<li/', $actual );
	}
	
	
	function test_xhtml_after_widget() {			
		$content = '</section>';		
		$actual = apply_filters( 'thematic_after_widget', $content );
		$this->assertRegexp( '/^<\/li/', $actual );
	}
	
	
	function test_xhtml_before_widgettitle() {			
		$content = '<h1 class="widgettitle">';		
		$actual = apply_filters( 'thematic_before_title', $content );
		$this->assertRegexp( '/^<h3/', $actual );
	}
	
	
	function test_xhtml_after_widgettitle() {			
		$content = '<\h1>';		
		$actual = apply_filters( 'thematic_after_title', $content );
		$this->assertRegexp( '/^<\/h3/', $actual );
	}
	
	
	function test_thematic_open_footer_xhtml() {
		$actual = apply_filters( 'thematic_open_footer', '<footer id="footer" class="site-footer">' );
		$this->assertEquals( '<div id="footer" class="site-footer">', $actual );	
	}
	
	
	function test_thematic_close_footer_xhtml() {
		$actual = apply_filters( 'thematic_close_footer', '</footer><!-- .site-footer -->' );
		$this->assertEquals( '</div><!-- .site-footer -->', $actual );	
	}

}

