<?php

require_once getenv( 'WP_TESTS_DIR' ) . '/includes/functions.php';

require getenv( 'WP_TESTS_DIR' ) . '/includes/bootstrap.php';

require_once 'test-thematic.php';

/* Define Thematic constants */
define('THEMATIC_MB', false);

if ( defined( 'WP_TESTS_MULTISITE') && WP_TESTS_MULTISITE ) {
	define('THEMATIC_MB', true);
}


function include_main_theme_files() {
	include_once '../../functions.php';

	include_once '../extensions/comments-extensions.php';
	include_once '../extensions/content-extensions.php';
	include_once '../extensions/discussion-extensions.php';
	include_once '../extensions/discussion.php';
	include_once '../extensions/dynamic-classes.php';
	include_once '../extensions/footer-extensions.php';
	include_once '../extensions/header-extensions.php';
	include_once '../extensions/helpers.php';
	include_once '../extensions/shortcodes.php';
	include_once '../extensions/sidebar-extensions.php';
	include_once '../extensions/theme-options.php';
	include_once '../extensions/widgets-extensions.php';
	include_once '../extensions/widgets.php';
}

function include_legacy_xhtml_files() {
	include_once '../legacy/deprecated.php';
	include_once '../legacy/legacy.php';
}