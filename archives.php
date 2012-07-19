<?php
/**
 * Template Name: Deprecated Archives Template
 *
 * This tamplate has bben deprecated for proper template namespacing
 * This file is going away.
 * 
 * If you wish to use Thematic's Archives page template, please set 
 * your Page Attributes: Template to use the template named "Archives"
 * on the WP-Admin Edit Page screen.
 *
 * @package Thematic
 * @subpackage Templates
 *
 * @link http://codex.wordpress.org/Template_Hierarchy Codex: Template Hierarchy
 * @deprecated 1.0
 */

	// Providing deprecated file notice to be seen when WP_DEBUG is true
	_deprecated_file( sprintf( __( 'The template %s', 'thematic' ) . ':', basename(__FILE__) ), '1.0', 'template-page-archives.php' );


	// calling the header.php
	get_template_part( 'template-page' , 'archives' );

?>