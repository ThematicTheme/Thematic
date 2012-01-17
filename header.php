<?php
/**
 * Header Template
 *
 * This template calls a series of functions that outputs the head of the document.
 * The body and div #main elements are opened at the end of this file. 
 * 
 * @package Thematic
 * @subpackage Templates
 */
 
	// Creating the doctype
	thematic_create_doctype();
	echo " ";
	language_attributes();
	echo ">\n";
	
	// Creating the head profile
	thematic_head_profile();
	
	// Creating the doc title
	thematic_doctitle();
	
	// Creating the content type
	thematic_create_contenttype();
	
	// Creating the description
	thematic_show_description();
	
	// Creating the robots tags
	thematic_show_robots();
	
	// Loading the stylesheet
	thematic_create_stylesheet();
	
	// check for defined constant to enable Thematic's feedlinks functions
	if (THEMATIC_COMPATIBLE_FEEDLINKS) {    
		// Creating the internal RSS links
		thematic_show_rss();
	
		// Creating the comments RSS links
		thematic_show_commentsrss();
	}
	
	// Creating the pingback adress
	thematic_show_pingback();
	
	// Enables comment threading
	thematic_show_commentreply();
	
	// Calling WordPress' header action hook
	wp_head();
?>
</head>

<?php 
	// outputs the body element and dynamic body classes
	thematic_body();

	// action hook for placing content before opening #wrapper
	thematic_before(); 

	// filter to control the output of the wrapping element that follows the body
	if (apply_filters('thematic_open_wrapper', true)) {
  	  echo ('<div id="wrapper" class="hfeed">' . "\n");
	}

	// action hook for placing content above the theme header
	thematic_aboveheader(); 
?>
   
	<div id="header">
        
        <?php 
			// action hook creating the theme header
			thematic_header();
        ?>
        
	</div><!-- #header-->
    
    <?php
		// action hook for placing content below the theme header
		thematic_belowheader();
    ?>
	<div id="main">
