<?php
/**
 * Tests for Header Extensions
 *
 * @package ThematicUnitTests
 */

/**
 * @group default
 */
class TestHeaderExtensions extends Thematic_UnitTestCase {

	function test_thematic_doctype() {
		$this->expectOutputRegex( '/^<!DOCTYPE html>/', thematic_doctype() );
	}
	
	function test_mobile_navigation_buttontext_filter() {
		$text = 'Menu';
		add_filter( 'thematic_mobile_navigation_buttontext', array( $this, 'mobile_navigation_button' ) );
		
		$navigation_text = apply_filters( 'thematic_mobile_navigation_buttontext', $text );
		$this->assertEquals( 'nav', $navigation_text );
	}

	function mobile_navigation_button( $text ) {
		return 'nav';
	}
}

