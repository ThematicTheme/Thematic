<?php
/**
 * Footer Extensions
 *
 * @package ThematicCoreLibrary
 * @subpackage FooterExtensions
 */
 
/**
 * Register action hook: thematic_abovemainclose
 * 
 * Located in footer.php, just before the closing of the main div
 */
function thematic_abovemainclose() {
    do_action('thematic_abovemainclose');
} // end thematic_belowmainsidebar


/**
 * Register action hook: thematic_abovefooter
 * 
 * Located in footer.php, just before the footer div
 */
function thematic_abovefooter() {
    do_action('thematic_abovefooter');
} // end thematic_abovefooter


/**
 * Register action hook: thematic_footer
 * 
 * Located in footer.php, inside the footer div
 */
function thematic_footer() {
    do_action('thematic_footer');
} // end thematic_footer


/**
 * Filter: thematic_footertext
 * 
 * The footertext is now set in theme options. This function is obsolete. 
 */
function thematic_footertext($thm_footertext) {
    $thm_footertext = apply_filters('thematic_footertext', $thm_footertext);
    return $thm_footertext;
} // end thematic_footertext


/**
 * Register action hook: thematic_belowfooter
 * 
 * Located in footer.php, just after the footer div
 */
function thematic_belowfooter() {
    do_action('thematic_belowfooter');
} // end thematic_belowfooter


/**
 * Register action hook: thematic_after
 * 
 * Located in footer.php, just before the closing body tag, after everything else.
 */
function thematic_after() {
    do_action('thematic_after');
} // end thematic_after


if (function_exists('childtheme_override_subsidiaries'))  {
	/**
	 * @ignore
	 */
	function thematic_subsidiaries() {
		childtheme_override_subsidiaries();
	}
} else {
	/**
	 * Create the subsidiary widgets areas in footer
	 * 
	 * Override: childtheme_override_subsidiaries
	 */
	function thematic_subsidiaries() {
	      	
		// action hook for placing content above the subsidiary widget areas
		thematic_abovesubasides();
		
		// action hook for creating the subsidiary widget areas
		thematic_widget_area_subsidiaries();
		
		// action hook for placing content below subsidiary widget areas
		thematic_belowsubasides();
   	}
}

add_action('thematic_footer', 'thematic_subsidiaries', 10);


if (function_exists('childtheme_override_siteinfoopen'))  {
	/**
	 * @ignore
	 */
	function thematic_siteinfoopen() {
		childtheme_override_siteinfoopen();
	}
} else {
	/**
	 * Open the #siteinfo div
	 * 
	 * Override: childtheme_override_siteinfoopen
	 */
	function thematic_siteinfoopen() {
    ?>
    
	<div id="siteinfo">        

   	<?php
   	}
}

add_action('thematic_footer', 'thematic_siteinfoopen', 20);
  
 
if (function_exists('childtheme_override_siteinfo'))  {
	/**
	 * @ignore
	 */
	function thematic_siteinfo() {
		childtheme_override_siteinfo();
	}
} else {
	/**
	 * Display the footer text from theme options within the #siteinfo div
	 * 
	 * Override: childtheme_override_siteinfo
	 */
	function thematic_siteinfo() {
		// footer text set in theme options
		echo "\t\t" . do_shortcode( thematic_get_theme_opt( 'footer_txt' ) ) . "\n";
	}
}

add_action('thematic_footer', 'thematic_siteinfo', 30);

   
if (function_exists('childtheme_override_siteinfoclose'))  {
	/**
	 * @ignore
	 */
	function thematic_siteinfoclose() {
		childtheme_override_siteinfoclose();
	}
} else {
	/**
	 * Close the #siteinfo div
	 * 
	 * Override: childtheme_override_siteinfoclose
	 */
	function thematic_siteinfoclose() {
    ?>

	</div><!-- #siteinfo -->
	
   	<?php
   	}
}

add_action('thematic_footer', 'thematic_siteinfoclose', 40);