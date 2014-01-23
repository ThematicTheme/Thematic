<?php
/**
 * Author Template
 *
 * Displays an archive index of posts by a singular Author.
 * It can display a micrformatted vCard for Author if option is selcted in the default Theme Options.
 *
 * @package Thematic
 * @subpackage Templates
 *
 * @link http://codex.wordpress.org/Author_Templates Codex:Author Templates
 */

	// calling the header.php
	get_header();

	// action hook for placing content above #container
	thematic_abovecontainer();

	// filter for manipulating the output of the #container opening element
	echo apply_filters( 'thematic_open_id_container', '<div id="container" class="content-wrapper">' . "\n\n" );

	// action hook for placing content above #content
	thematic_abovecontent();

	echo apply_filters( 'thematic_open_id_content', '<div id="content" class="site-content" role="main">' . "\n\n" );

	// displays the page title
	thematic_page_title();

	// create the navigation above the content
	thematic_navigation_above();

	// display microformatted vCard if selected in Theme Options and display only on the first page of the archive's pagination
	if ( thematic_get_theme_opt( 'author_info' ) == 1 & !is_paged() ) :

		// setup the first post to acess the Author's metadata
		the_post();

	?>

			<div id="author-info" class="vcard">

				<h2 class="entry-title"><?php the_author_meta( 'first_name' ); ?> <?php the_author_meta( 'last_name' ); ?></h2>

				<?php
					// display the author's avatar
					thematic_author_info_avatar();
				?>

				<div class="author-bio note">

					<?php
						// Display Author's discription if it exists
						if ( get_the_author_meta( 'user_description' ) )
							// Filterable use the_author_user_description *or* get_the_author_user_description
							the_author_meta( 'user_description' );
					?>

				</div>

			<div id="author-email">

				<a class="email" title="<?php echo antispambot( get_the_author_meta( 'user_email' ) ); ?>" href="mailto:<?php echo antispambot( get_the_author_meta( 'user_email' ) ); ?>">
					<?php _e( 'Email ', 'thematic' ) ?>
					<span class="fn n">
						<span class="given-name"><?php the_author_meta( 'first_name' ); ?></span>
						<span class="family-name"><?php the_author_meta( 'last_name' ); ?></span>
					</span>
				</a>

				<a class="url"  style="display:none;" href="<?php echo home_url() ?>/"><?php bloginfo('name') ?></a>

			</div>

		</div><!-- #author-info -->

	<?php

	//end microformmatted vCard
	endif;

	// Return to the beginning of the loop
	rewind_posts();

	// action hook creating the author loop
	thematic_authorloop();

	// create the navigation below the content
	thematic_navigation_below();

	// filter for manipulating the output of the #content closing element
	echo apply_filters( 'thematic_close_id_content', '</div><!-- #content -->' . "\n\n" );

	// action hook for placing content below #content
	thematic_belowcontent();

	// filter for manipulating the output of the #container closing element
	echo apply_filters( 'thematic_close_id_container', '</div><!-- #container -->' . "\n\n" );

	// action hook for placing content below #container
	thematic_belowcontainer();

	// calling the standard sidebar
	thematic_sidebar();

	// calling footer.php
	get_footer();
