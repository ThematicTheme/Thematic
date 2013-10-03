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

}