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
	
	function test_thematic_nav_below() {
		$this->expectOutputRegex( '/<nav id="nav-below"/', thematic_nav_below() );	
	}

}