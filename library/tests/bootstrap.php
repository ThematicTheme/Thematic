<?php

require_once getenv( 'WP_TESTS_DIR' ) . '/includes/functions.php';

require getenv( 'WP_TESTS_DIR' ) . '/includes/bootstrap.php';

require_once 'test-thematic.php';

/* Define Thematic constants */
define('THEMATIC_MB', false);

if ( defined( 'WP_TESTS_MULTISITE') && WP_TESTS_MULTISITE ) {
	define('THEMATIC_MB', true);
}