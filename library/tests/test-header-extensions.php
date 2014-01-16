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

}

