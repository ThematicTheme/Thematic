<?php
/**
 * Tests for Legacy XHTML mode
 * 
 * Run these tests separately with `phpunit text-legacy-xhtml.php`
 *
 * @package ThematicUnitTests
 */


class TestLegacyXTHML extends Thematic_UnitTestCase {
	
	function setUp() {
		
		/* Load the legacy files before anything else - needed for childtheme_overrides* to work */
		include_once '../legacy/deprecated.php';
		include_once '../legacy/legacy.php';
		
		/* Load the thematic files */
		parent::setUp();
		
		/* Set the option to use legacy mode */
		$this->theme_options = $this->get_test_options( 'thematic_theme_opt' );
		$this->theme_options['legacy_xhtml'] = '1';
		
		$this->update_test_options( 'thematic_theme_opt', $this->theme_options );
	}
	
	
	function test_legacy_theme_options() {
		$this->assertEquals( '1',  $this->theme_options['legacy_xhtml'] );
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
	
	
	function test_thematic_xhtml_navmenu_args() {
		$args = array(
			'container' => 'nav'
		);
		$actual = apply_filters( 'thematic_nav_menu_args', $args );
		$this->assertEquals( 'div', $actual[ 'container' ] );
	}
	
	function test_xhtml_nav_above() {
		$this->expectOutputRegex( '/<div id="nav-above"/', thematic_nav_above() );	
	}
	
	function test_xhtml_before_widget_area() {	
		do_action( 'widgets_init' );
		
		$content = '<aside id="third" class="third-sub-aside aside sub-aside">';
		$this->assertRegexp( '/^<aside/', $content );
		
		$actual = apply_filters( 'thematic_before_widget_area', $content );
		$this->assertRegexp( '/^<div/', $actual );
	}
	
	
	function test_xhtml_after_widget_area() {	
		do_action( 'widgets_init' );
		
		$ul_content = '</div><!-- .inner -->';		
		$ul_actual = apply_filters( 'thematic_after_widget_area', $ul_content );
		$this->assertRegexp( '/^<\/ul/', $ul_actual );
		
		$aside_content = '</aside><!-- .third-sub-aside -->';
		$aside_actual = apply_filters( 'thematic_after_widget_area', $aside_content );
		$this->assertRegexp( '/^<\/div/', $aside_actual );
	}
	
	
	function test_xhtml_before_widget() {	
		do_action( 'widgets_init' );
		
		$content = '<section id="%1$s" class="widgetcontainer %2$s">';		
		$actual = apply_filters( 'thematic_before_widget', $content );
		$this->assertRegexp( '/^<li/', $actual );
	}
	
	
	function test_xhtml_after_widget() {	
		do_action( 'widgets_init' );
		
		$content = '</section>';		
		$actual = apply_filters( 'thematic_after_widget', $content );
		$this->assertRegexp( '/^<\/li/', $actual );
	}
	
	
	function test_xhtml_before_widgettitle() {	
		do_action( 'widgets_init' );
		
		$content = '<h1 class="widgettitle">';		
		$actual = apply_filters( 'thematic_before_title', $content );
		$this->assertRegexp( '/^<h3/', $actual );
	}
	
	
	function test_xhtml_after_widgettitle() {	
		do_action( 'widgets_init' );
		
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

