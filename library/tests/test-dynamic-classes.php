<?php
/**
 * Tests for Dynamic Classes
 *
 * @package ThematicUnitTests
 */

/**
 * @group default
 */
class TestDynamicClasses extends Thematic_UnitTestCase {

	function test_thematic_body_class_layout() {
		$body_classes = thematic_body_class( array() );
		$this->assertContains( 'right-sidebar', $body_classes );	
	}
	
	function test_thematic_body_class_filter_layout() {
		add_filter( 'thematic_theme_layout', array( $this, 'switch_layout' ) );
		
		$current_layout = apply_filters( 'thematic_theme_layout', '' );
		
		$body_classes = thematic_body_class( array() );
		$this->assertContains( 'left-sidebar', $body_classes );	
	}

	function switch_layout( $layout ) {
		return 'left-sidebar';
	}

}