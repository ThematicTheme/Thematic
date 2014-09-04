<?php
/**
 * Thematic back compat functionality
 *
 * Prevents Thematic from running on WordPress versions prior to 3.6,
 * since this theme is not meant to be backward compatible and relies on
 * many new functions and markup changes introduced in 3.6.
 *
 * @package ThematicCoreLibrary
 * @subpackage BackwardsCompatibility
 * @since Thematic 2.0.0
 */

/**
 * Prevent switching to Thematic on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since 2.0.0
 *
 * @return void
 */
function thematic_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'thematic_upgrade_notice' );
}
add_action( 'after_switch_theme', 'thematic_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Thematic on WordPress versions prior to 3.6.
 *
 * @since 2.0.0
 *
 * @return void
 */
function thematic_upgrade_notice() {
	$message = sprintf( __( 'Thematic requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'thematic' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevent the Theme Customizer from being loaded on WordPress versions prior to 3.6.
 *
 * @since 2.0.0
 *
 * @return void
 */
function thematic_customize() {
	wp_die( sprintf( __( 'Thematic requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'thematic' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'thematic_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 3.4.
 *
 * @since 2.0.0
 *
 * @return void
 */
function thematic_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Thematic requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'thematic' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'thematic_preview' );
