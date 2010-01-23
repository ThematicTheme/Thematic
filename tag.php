<?php
    // calling the theme options
    global $options;
    foreach ($options as $value) {
        if (get_option( $value['id'] ) === FALSE) { 
            $$value['id'] = $value['std']; 
        } else {
            $$value['id'] = get_option( $value['id'] );
        }
    }

    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();

?>

	<div id="container">
		<div id="content">

            <?php
        
            // displays the page title
            thematic_page_title();

            // create the navigation above the content
            thematic_navigation_above();
			
            // action hook for placing content above the tag loop
            thematic_above_tagloop();		

            // action hook creating the tag loop
            thematic_tagloop();

            // action hook for placing content below the tag loop
            thematic_below_tagloop();

            // create the navigation below the content
            thematic_navigation_below();
            
            ?>

		</div><!-- #content -->
	</div><!-- #container -->

<?php 

    // action hook for placing content below #container
    thematic_belowcontainer();

    // calling the standard sidebar 
    thematic_sidebar();
    
    // calling footer.php
    get_footer();

?>