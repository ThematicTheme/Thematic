<?php
/**
 * Theme Functions
 *
 * This file is used by WordPress to initialize the theme.
 * Thematic is designed to be used as a theme framework and this file should not be modified.
 * You should use a Child Theme to make your customizations. A sample child theme is provided
 * as an example in root directory of this theme. You can move it into the wp-content/themes to
 * enable activation of the child theme.
 * 
 * @package Thematic
 * @subpackage ThemeInit
 *
 * @link http://codex.wordpress.org/Child_Themes Codex: Child Themes
 * @uses thematic_init Used to load the core functionality of Thematic.
 */

require_once (TEMPLATEPATH . '/library/extensions/init.php');

thematic_init();