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

	function tearDown() {
		remove_filter( 'thematic_default_theme_layout', array( $this, 'switch_layout' ) );

		parent::tearDown();
	}


	function test_thematic_body_class_layout() {
		$body_classes = thematic_body_class( array() );
		$this->assertContains( 'right-sidebar', $body_classes );	
	}

	
	function test_thematic_filter_current_theme_layout() {
		add_filter( 'thematic_current_theme_layout', array( $this, 'switch_layout' ) );
		
		$current_layout = apply_filters( 'thematic_current_theme_layout', '' );
		
		$body_classes = thematic_body_class( array() );
		$this->assertContains( 'left-sidebar', $body_classes );	
	}


	function test_thematic_add_available_layout() {
		add_filter( 'thematic_available_theme_layouts', array( $this, 'add_layout' ) );

		$available_layouts = apply_filters( 'thematic_available_theme_layouts', thematic_available_theme_layouts() );

		$this->assertArrayHasKey( 'half-sidebar', $available_layouts );
	}


	function test_thematic_remove_available_layout() {
		add_filter( 'thematic_available_theme_layouts', array( $this, 'remove_layout' ) );

		$available_layouts = apply_filters( 'thematic_available_theme_layouts', thematic_available_theme_layouts() );

		$this->assertArrayNotHasKey( 'right-sidebar', $available_layouts );
	}


	function test_thematic_unavailable_layout() {
		add_filter( 'thematic_current_theme_layout', array( $this, 'unavailable_layout' ) );

		$body_classes = thematic_body_class( array() );
		$this->assertNotContains( 'wacko', $body_classes );
		$this->assertContains( 'right-sidebar', $body_classes );
	}


	function test_thematic_change_default_layout() {
		add_filter( 'thematic_default_theme_layout', array( $this, 'switch_layout' ) );

		$this->theme_options['layout'] = apply_filters( 'thematic_default_theme_layout', $this->theme_options['layout'] );

		$this->assertEquals( $this->theme_options['layout'], 'left-sidebar' );
	}


	function test_thematic_unavailable_layout_different_default() {
		add_filter( 'thematic_current_theme_layout', array( $this, 'unavailable_layout' ) );

		add_filter( 'thematic_default_theme_layout', array( $this, 'switch_layout' ) );
		$this->theme_options['layout'] = apply_filters( 'thematic_default_theme_layout', $this->theme_options['layout'] );

		$body_classes = thematic_body_class( array() );
		$this->assertNotContains( 'wacko', $body_classes );
		$this->assertContains( 'left-sidebar', $body_classes );
	}


	function switch_layout( $layout ) {
		return 'left-sidebar';
	}


	function add_layout( $layouts ) {
		$layouts['half-sidebar'] = array(
			'slug' => 'half-sidebar',
			'title' => 'Half Sidebar'
		);
		return $layouts;
	}


	function remove_layout( $layouts ) {
		unset( $layouts['right-sidebar'] );
		return $layouts;
	}


	function unavailable_layout() {
		return 'wacko';
	}

}