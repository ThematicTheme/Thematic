<?php
/**
 * Category Template
 *
 * Displays an archive index of posts assigned to a Category. 
 *
 * @package Thematic
 * @subpackage Templates
 *
 * @link http://codex.wordpress.org/Category_Templates Codex: Category Templates
 */

	// calling the header.php
	get_header();

	// action hook for placing content above #container
	thematic_abovecontainer();
?>

		<div id="container">

			<?php
				// action hook for placing content above #content
				thematic_abovecontent();

				// filter for manipulating the element that wraps the content 
				echo apply_filters( 'thematic_open_id_content', '<div id="content">' . "\n\n" );

				// displays the page title
	        	thematic_page_title();

	        	// create the navigation above the content
	        	thematic_navigation_above();

	        	// action hook for placing content above the category loop
	        	thematic_above_categoryloop();			

	        	// action hook creating the category loop
	        	thematic_categoryloop();

	        	// action hook for placing content below the category loop
	        	thematic_below_categoryloop();			

	        	// create the navigation below the content
	        	thematic_navigation_below();
	        ?>

			</div><!-- #content -->

			<?php
				// action hook for placing content below #content
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