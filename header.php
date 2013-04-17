<?php
/**
 * Header Template
 *
 * This template calls a series of functions that output the head tag of the document.
 * The body and div #main elements are opened at the end of this file. 
 * 
 * @package Thematic
 * @subpackage Templates
 */
 
	// Creates the doctype 
	thematic_doctype();

	// Opens the html tag with attributes
	thematic_html();
	
	// Opens the head 
	thematic_head();
	
	// Create the meta charset
	thematic_meta_charset();
	
	// Create the meta viewport if theme supports it
	if( current_theme_supports( 'thematic_meta_viewport' ) ) 
		thematic_meta_viewport();
	
	// Create the title tag 
	thematic_doctitle();
	
	// Create the meta description
	thematic_meta_description();
	
	// Create the tag <meta name="robots"  
	thematic_meta_robots();
	
	// Create pingback adress
	thematic_show_pingback();
	
	/* Loads Thematic's stylesheet and scripts
	 * Calling wp_head() is required to provide plugins and child themes
	 * the ability to insert markup within the <head> tag.
	 */
	wp_head();
?>

</head>

<?php 
	// Create the body element and dynamic body classes
	thematic_body(); 

	// Action hook to place content before opening #wrapper
	thematic_before(); 
?>
	<?php
		// Filter provided for removing output of wrapping element follows the body tag
		if ( apply_filters( 'thematic_open_wrapper', true ) ) 
  		  echo ( '<div id="wrapper" class="hfeed">' );

		// Action hook for placing content above the theme header
		thematic_aboveheader(); 
	?>


		<?php
			// Filter provided for altering output of the header opening element
			echo ( apply_filters( 'thematic_open_header',  '<div id="header">' ) );
    	?>


        	<?php 
				// Action hook creating the theme header
				thematic_header();
       		?>
       		
    	<?php  	
    		// Filter provided for altering output of the header closing element
			echo ( apply_filters( 'thematic_close_header', '</div><!-- #header-->' ) );
		?>
		        
    	<?php
			// Action hook for placing content below the theme header
			thematic_belowheader();
    	?>
    	
	<div id="main">
