<?php
/*
Template Name: Links Page
*/
?>
<?php

    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();

?>

	<div id="container">
		<div id="content">

            <?php
            
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
                    
                    ?>

					<ul id="links-page" class="xoxo">
                    
                        <?php
                        
                        wp_list_bookmarks(list_bookmarks_args());
                        
                        ?>
                        
					</ul>
                    
                    <?php
                    
                    edit_post_link(__('Edit', 'thematic'),'<span class="edit-link">','</span>');
                    
                    ?>

				</div>
			</div><!-- .post -->

            <?php 
        
            if ( get_post_custom_values('comments') ) 
                comments_template() // Add a key/value of "comments" to enable comments on pages!
        
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