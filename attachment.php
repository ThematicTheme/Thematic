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
            
            // displays the page title
			thematic_page_title();
            
            ?>
            
			<div id="post-<?php the_ID(); ?>" class="<?php thematic_post_class() ?>">
            
    			<?php
                
                // creating the post header
                thematic_postheader();
                
                ?>
                
				<div class="entry-content">
					<div class="entry-attachment"><?php the_attachment_link($post->post_ID, true) ?></div>
                    
                        <?php 
                        
                        the_content(more_text());

                        wp_link_pages('before=<div class="page-link">' .__('Pages:', 'thematic') . '&after=</div>');
                        
                        ?>
                        
				</div>
                
				<?php
                
                // creating the post footer
                thematic_postfooter();
                
                ?>
                
			</div><!-- .post -->

            <?php
            
            comments_template();
            
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