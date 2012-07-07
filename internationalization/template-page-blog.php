<?php
/**
 * Template Name: Deprecated Blog Template
 *
 * This template is here for Backwards compatibility with child themes that use it.
 * This file will be removed in a future version of thematic. <br>
 *
 * This was originally intended to allow you to display the latest posts on any page of the site.<br>
 *
 * The recommended way to do this by setting the "Front Page" and "Posts Page" options 
 * in WP-Admin/Settings/Reading. If those options are set the index.php will be used
 * to display the blog page.
 *
 * If you desire a different template for your blog page, create a home.php in a child theme.
 *
 * @package Thematic
 * @subpackage Templates
 * @deprecated 1.0
 */

	// Providing deprecated file notice to be seen when WP_DEBUG is true
	_deprecated_file( sprintf( __( 'The template %s', 'thematic' ) . ':', basename(__FILE__) ), 'Thematic 1.0', null, sprintf( __( 'You can include a %s in a childtheme', 'thematic' ) . '.', 'home.php' ) );

    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();
?>

		<div id="container">
	
			<?php 
				// action hook for inserting content above #content
				thematic_abovecontent();
	    	
				// filter for manipulating the element that wraps the content 
				echo apply_filters( 'thematic_open_id_content', '<div id="content">' . "\n\n" );
	    		
	    		$wp_query = new WP_Query();
	    		$wp_query->query( array( 'posts_per_page' => get_option( 'posts_per_page' ), 'paged' => $paged ) );
	    		$more = 0;
			?>

				<?php 
	            	// create the navigation above the content
	            	thematic_navigation_above();
					
	            	// calling the widget area 'index-top'
	            	get_sidebar('index-top');
					
	            	// action hook for placing content above the index loop
	            	thematic_above_indexloop();
					
	            	// action hook creating the index loop
	            	thematic_indexloop();
					
	            	// action hook for placing content below the index loop
	            	thematic_below_indexloop();
					
	            	// calling the widget area 'index-bottom'
	            	get_sidebar('index-bottom');
					
	            	// create the navigation below the content
	            	thematic_navigation_below();
            	?>
				
			</div><!-- #content -->
		
			<?php 
				// action hook for inserting content below #content
				thematic_belowcontent(); 
			?> 		
		</div><!-- #container -->

<?php 
    // action hook for placing content below #container
    thematic_belowcontainer();

    // calling the standard sidebar 
    thematic_sidebar();
    
    // calling footer.php
    get_footer();
?>