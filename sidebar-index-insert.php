<?php 
/**
 * Sidebar Index Insert Template
 *
 * …
 * 
 * @package Thematic
 * @subpackage Templates
 */
 
    // action hook for placing content above the 'index-insert' widget area
    thematic_aboveindexinsert();

    // action hook creating the 'index-insert' widget area
    thematic_widget_area_index_insert();

    // action hook for placing content below the 'index-insert' widget area
    thematic_belowindexinsert();
?>