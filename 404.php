<?php

    @header("HTTP/1.1 404 Not found", true, 404);

    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();

?>

	<div id="container">
		<div id="content">

			<div id="post-0" class="post error404">
			
			<?php

                // action hook for the 404 content
                thematic_404()

            ?>
			
			</div><!-- .post -->

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