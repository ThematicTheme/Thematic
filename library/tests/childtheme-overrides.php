<?php
/**
 * Childtheme override functions for use in unit testing
 *
 * @package ThematicUnitTests
 */

	
/* Override the archive loop */
function childtheme_override_archive_loop() {
	echo 'override archive loop!';
}


/* Override the author loop */
function childtheme_override_author_loop() {
	echo 'override author loop!';
}


/* Override the category loop */
function childtheme_override_category_loop() {
	echo 'override category loop!';
}


/* Override the index loop */
function childtheme_override_index_loop() {
	echo 'override index loop!';
}

/* Override the search loop */
function childtheme_override_search_loop() {
	echo 'override search loop!';
}


/* Override the single post loop */
function childtheme_override_single_post() {
	echo 'override single post loop!';
}


/* Override the tag loop */
function childtheme_override_tag_loop() {
	echo 'override tag loop!';
}
