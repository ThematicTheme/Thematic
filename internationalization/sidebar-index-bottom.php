<?php 
/**
 * Sidebar Index Bottom Template
 *
 * …
 * 
 * @package Thematic
 * @subpackage Templates
 */
 
    // action hook for placing content above the 'index-bottom' widget area
    thematic_aboveindexbottom();

    // action hook creating the 'index-bottom' widget area
    thematic_widget_area_index_bottom();

    // action hook for placing content below the 'index-bottom' widget area
    thematic_belowindexbottom();
?>