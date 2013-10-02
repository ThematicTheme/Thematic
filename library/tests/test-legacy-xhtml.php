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
	

}

