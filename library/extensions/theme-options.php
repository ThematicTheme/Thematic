<?php

// Theme options adapted from "A Theme Tip For WordPress Theme Authors"
// http://literalbarrage.org/blog/archives/2007/05/03/a-theme-tip-for-wordpress-theme-authors/

$themename = "Thematic";
$shortname = "thm";

// Create theme options

$options = array (
										
				array(	"name" => "Index Insert Position",
						"desc" => "The widgetized Index Insert will follow after this post number.",
						"id" => $shortname."_insert_position",
						"std" => "2",
						"type" => "text"),

				array(	"name" => "Info on Author Page",
						"desc" => "Display a <a href=\"http://microformats.org/wiki/hcard\" target=\"_blank\">microformatted vCard</a>—with the author's avatar, bio and email—on the author page.",
						"id" => $shortname."_authorinfo",
						"std" => "false",
						"type" => "checkbox"),


				array(	"name" => "Text in Footer",
						"desc" => "Enter the HTML text that will appear in the bottom of your footer. Feel free to remove or change any links. <strong>Hint:</strong> <a href=\"http://www.w3schools.com/HTML/html_links.asp\" target=\"_blank\">how to write a link</a>.",
						"id" => $shortname."_footertext",
						"std" => "<span id=\"generator-link\">Powered by <a href=\"http://WordPress.org/\" title=\"WordPress\" rel=\"generator\">WordPress</a></span><span class=\"meta-sep\">. </span><span id=\"designer-link\">Built on the <a href=\"http://themeshaper.com/thematic-for-wordpress\" title=\"Thematic Theme Framework\" rel=\"designer\">Thematic Theme Framework</a>.</span>",
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

        }
    }

    add_theme_page($themename." Options", "Thematic Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
    
?>
<div class="wrap">
<h2><?php echo $themename; ?> Options</h2>

<form method="post">

<table class="form-table">

<?php foreach ($options as $value) { 
	
	switch ( $value['type'] ) {
		case 'text':
		?>
		<tr valign="top"> 
		    <th scope="row"><?php echo $value['name']; ?>:</th>
		    <td>
		        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" />
			    <?php echo $value['desc']; ?>
		    </td>
		</tr>
		<?php
		break;
		
		case 'select':
		?>
		<tr valign="top"> 
	        <th scope="row"><?php echo $value['name']; ?>:</th>
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
	        <th scope="row"><?php echo $value['name']; ?>:</th>
	        <td>
			    <?php echo $value['desc']; ?>
				<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="<?php echo $ta_options['cols']; ?>" rows="<?php echo $ta_options['rows']; ?>"><?php 
				if( get_settings($value['id']) != "") {
						echo stripslashes(get_settings($value['id']));
					}else{
						echo $value['std'];
				}?></textarea>
	        </td>
	    </tr>
		<?php
		break;

		case "radio":
		?>
		<tr valign="top"> 
	        <th scope="row"><?php echo $value['name']; ?>:</th>
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
		        <th scope="row"><?php echo $value['name']; ?>:</th>
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
			    <?php echo $value['desc']; ?>
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
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

<p><?php _e('For more information about this theme, <a href="http://themeshaper.com">visit ThemeShaper</a>. Please visit the <a href="http://themeshaper.com/forums/">ThemeShaper Forums</a> if you have any questions about Thematic.', 'thematic'); ?></p>

<?php
}

add_action('admin_menu' , 'mytheme_add_admin'); 


?>
