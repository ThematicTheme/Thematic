<?php

    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();

?>

	<div id="container">
		<div id="content">

            <?php
        
            // calling the widget area 'page-top'
            get_sidebar('page-top');

            the_post();
        
            ?>
            
			<div id="post-<?php the_ID(); ?>" class="<?php thematic_post_class() ?>">
            
                <?php 
                
                // creating the post header
                thematic_postheader();
                
                ?>
                
				<div class="entry-content">

                    <?php
                    
                    the_content();
                    
                    wp_link_pages("\t\t\t\t\t<div class='page-link'>".__('Pages: ', 'thematic'), "</div>\n", 'number');
                    
                    edit_post_link(__('Edit', 'thematic'),'<span class="edit-link">','</span>') ?>

				</div>
			</div><!-- .post -->

        <?php
        
        if ( get_post_custom_values('comments') ) 
            thematic_comments_template(); // Add a key/value of "comments" to enable comments on pages!
        
        // calling the widget area 'page-bottom'
        get_sidebar('page-bottom');
        
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