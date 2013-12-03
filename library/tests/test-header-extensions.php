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

	function testThematicDoctype() {
	
		$this->expectOutputRegex( '/^<!DOCTYPE html>/', thematic_doctype() );
		
	}

}

