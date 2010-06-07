<?php


// Located in footer.php
// Just before the footer div
function thematic_abovefooter() {
    do_action('thematic_abovefooter');
} // end thematic_abovefooter

// Located in footer.php
// Just after the footer div
function thematic_footer() {
    do_action('thematic_footer');
} // end thematic_footer


// located in footer.php
// the footer text can now be filtered and controlled from your own functions.php
function thematic_footertext($thm_footertext) {
    $thm_footertext = apply_filters('thematic_footertext', $thm_footertext);
    return $thm_footertext;
} // end thematic_footertext


// Located in footer.php
// Just after the footer div
function thematic_belowfooter() {
    do_action('thematic_belowfooter');
} // end thematic_belowfooter


// Located in footer.php 
// Just before the closing body tag, after everything else.
function thematic_after() {
    do_action('thematic_after');
} // end thematic_after


// Functions that hook into thematic_footer()
	
	if (function_exists('childtheme_override_subsidiaries'))  {
		function thematic_subsidiaries() {
			childtheme_override_subsidiaries();
		}
	} else {
    	function thematic_subsidiaries() {
       	 widget_area_subsidiaries();
    	}
    	add_action('thematic_footer', 'thematic_subsidiaries', 10);
    }
    
	if (function_exists('childtheme_override_siteinfoopen'))  {
		function thematic_siteinfoopen() {
			childtheme_override_siteinfoopen();
		}
	} else {
	    function thematic_siteinfoopen() { ?>
    
        <div id="siteinfo">        

    	<?php
    	}
    	add_action('thematic_footer', 'thematic_siteinfoopen', 20);
    }
    
	if (function_exists('childtheme_override_siteinfo'))  {
		function thematic_siteinfo() {
			childtheme_override_siteinfo();
		}
	} else {
	    function thematic_siteinfo() {
        	global $options, $blog_id;
			foreach ($options as $value) {
        		if (get_option( $value['id'] ) === FALSE) { 
            		$$value['id'] = $value['std']; 
        		} else {
        			if (THEMATIC_MB) {
            			$$value['id'] = get_blog_option( $blog_id, $value['id'] );
					} else {
            			$$value['id'] = get_option( $value['id'] );
  					}
        		}
			}
        	/* footer text set in theme options */
        	echo do_shortcode(__(stripslashes(thematic_footertext($thm_footertext)), 'thematic'));
        }
    	add_action('thematic_footer', 'thematic_siteinfo', 30);
    }
    
	if (function_exists('childtheme_override_siteinfoclose'))  {
		function thematic_siteinfoclose() {
			childtheme_override_siteinfoclose();
		}
	} else {
	    function thematic_siteinfoclose() { ?>
    
		</div><!-- #siteinfo -->
    
    	<?php
    	}
    	add_action('thematic_footer', 'thematic_siteinfoclose', 40);
	}