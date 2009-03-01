<?php

// Theme options adapted from "A Theme Tip For WordPress Theme Authors"
// http://literalbarrage.org/blog/archives/2007/05/03/a-theme-tip-for-wordpress-theme-authors/

$themename = "Thematic";
$shortname = "thm";

// Create theme options

$options = array (
										
				array(	"name" => __('Index Insert Position','thematic'),
						"desc" => __('The widgetized Index Insert will follow after this post number.','thematic'),
						"id" => $shortname."_insert_position",
						"std" => "2",
						"type" => "text"),

				array(	"name" => __('Info on Author Page','thematic'),
						"desc" => __("Display a <a href=\"http://microformats.org/wiki/hcard\" target=\"_blank\">microformatted vCard</a>—with the author's avatar, bio and email—on the author page.",'thematic'),
						"id" => $shortname."_authorinfo",
						"std" => "false",
						"type" => "checkbox"),


				array(	"name" => __('Text in Footer','thematic'),
						"desc" => __("Enter the text that will appear in the bottom of your footer. You can use these shortcodes: [wp-link] [theme-link] [loginout-link] [blog-title] [the-year]",'thematic'),
						"id" => $shortname."_footertext",
						"std" => __("Powered by [wp-link]. Built on the [theme-link].", 'thematic'),
						"type" => "textarea",
						"options" => array(	"rows" => "5",
											"cols" => "94") ),

		  );

function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=theme-options.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=theme-options.php&reset=true");
            die;

        } else if ( 'reset_widgets' == $_REQUEST['action'] ) {
            $null = null;
            update_option('sidebars_widgets',$null);
            header("Location: themes.php?page=theme-options.php&reset=true");
            die;
        }
    }

    add_theme_page($themename." Options", "Thematic Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '.__('settings saved.','thematic').'</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '.__('settings reset.','thematic').'</strong></p></div>';
    if ( $_REQUEST['reset_widgets'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '.__('widgets reset.','thematic').'</strong></p></div>';
    
?>
<div class="wrap">
<?php if ( function_exists('screen_icon') ) screen_icon(); ?>
<h2><?php echo $themename; ?> Options</h2>

<form method="post">

<table class="form-table">

<?php foreach ($options as $value) { 
	
	switch ( $value['type'] ) {
		case 'text':
		?>
		<tr valign="top"> 
		    <th scope="row"><?php echo __($value['name'],'thematic'); ?>:</th>
		    <td>
		        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" />
			    <?php echo __($value['desc'],'thematic'); ?>
		    </td>
		</tr>
		<?php
		break;
		
		case 'select':
		?>
		<tr valign="top"> 
	        <th scope="row"><?php echo __($value['name'],'thematic'); ?>:</th>
	        <td>
	            <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
	                <?php foreach ($value['options'] as $option) { ?>
	                <option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
	                <?php } ?>
	            </select>
	        </td>
	    </tr>
		<?php
		break;
		
		case 'textarea':
		$ta_options = $value['options'];
		?>
		<tr valign="top"> 
	        <th scope="row"><?php echo __($value['name'],'thematic'); ?>:</th>
	        <td>
			    <?php echo __($value['desc'],'thematic'); ?>
				<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="<?php echo $ta_options['cols']; ?>" rows="<?php echo $ta_options['rows']; ?>"><?php 
				if( get_settings($value['id']) != "") {
						echo __(stripslashes(get_settings($value['id'])),'thematic');
					}else{
						echo __($value['std'],'thematic');
				}?></textarea>
	        </td>
	    </tr>
		<?php
		break;

		case "radio":
		?>
		<tr valign="top"> 
	        <th scope="row"><?php echo __($value['name'],'thematic'); ?>:</th>
	        <td>
	            <?php foreach ($value['options'] as $key=>$option) { 
				$radio_setting = get_settings($value['id']);
				if($radio_setting != ''){
		    		if ($key == get_settings($value['id']) ) {
						$checked = "checked=\"checked\"";
						} else {
							$checked = "";
						}
				}else{
					if($key == $value['std']){
						$checked = "checked=\"checked\"";
					}else{
						$checked = "";
					}
				}?>
	            <input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $option; ?><br />
	            <?php } ?>
	        </td>
	    </tr>
		<?php
		break;
		
		case "checkbox":
		?>
			<tr valign="top"> 
		        <th scope="row"><?php echo __($value['name'],'thematic'); ?>:</th>
		        <td>
		           <?php
						if(get_settings($value['id'])){
							$checked = "checked=\"checked\"";
						}else{
							$checked = "";
						}
					?>
		            <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
		            <?php  ?>
			    <?php echo __($value['desc'],'thematic'); ?>
		        </td>
		    </tr>
			<?php
		break;

		default:

		break;
	}
}
?>

</table>

<p class="submit">
<input name="save" type="submit" value="<?php _e('Save changes','thematic'); ?>" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="<?php _e('Reset','thematic'); ?>" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset_widgets" type="submit" value="<?php _e('Reset Widgets','thematic'); ?>" />
<input type="hidden" name="action" value="reset_widgets" />
</p>
</form>

<p><?php _e('For more information about this theme, <a href="http://themeshaper.com">visit ThemeShaper</a>. Please visit the <a href="http://themeshaper.com/forums/">ThemeShaper Forums</a> if you have any questions about Thematic.', 'thematic'); ?></p>

<?php
}

add_action('admin_menu' , 'mytheme_add_admin'); 


?>
