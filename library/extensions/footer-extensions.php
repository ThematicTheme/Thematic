<?php


// Located in footer.php
// Just before the footer div
function thematic_abovefooter() {
    do_action('thematic_abovefooter');
} // end thematic_abovefooter


// Located in footer.php
// Just after the footer div
function thematic_belowfooter() {
    do_action('thematic_belowfooter');
} // end thematic_belowfooter


// Located in footer.php 
// Just before the closing body tag, after everything else.
function thematic_after() {
    do_action('thematic_after');
} // end thematic_after