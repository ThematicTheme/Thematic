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
						"std" => false,
						"type" => "checkbox"),

				array(	"name" => __('Text in Footer','thematic'),
						"desc" => __("You can use the following shortcodes in your footer text: [wp-link] [theme-link] [loginout-link] [blog-title] [blog-link] [the-year]",'thematic'),
						"id" => $shortname."_footertext",
						"std" => __("Powered by [wp-link]. Built on the [theme-link].", 'thematic'),
						"type" => "textarea",
						"options" => array(	"rows" => "5",
											"cols" => "94") ),

		);

function mytheme_add_admin() {

    global $themename, $shortname, $options, $blog_id;
    
    $page ='';

	if (isset($_GET["page"]) && !empty($_GET["page"])) $page = $_GET["page"];
	
    if ( $page == basename(__FILE__) ) {
    	
    	$action = '';
    	
    	if (isset($_REQUEST["action"]) && !empty($_REQUEST["action"])) $action = $_REQUEST["action"];
    	
        if ( 'save' == $action ) {

			check_admin_referer('thematic-theme-options');
    
                foreach ($options as $value) {
					
                	if (THEMATIC_MB) 
					{
						if (isset($_REQUEST[ $value['id'] ])) {
							update_blog_option( $blog_id, $value['id'], $_REQUEST[ $value['id'] ] );
						} else {
							update_blog_option( $blog_id, $value['id'], $value['std'] );
						}
					} 
					
					else 
					
					{
						if (isset($_REQUEST[ $value['id'] ])) {
							update_option( $value['id'], $_REQUEST[ $value['id'] ] );
						} else {
							update_option( $value['id'], $value['std'] );
						}
					}
					
				}			
	
                header("Location: themes.php?page=theme-options.php&saved=true");
                die;

        } else if( 'reset' == $action ) {

			check_admin_referer('thematic-reset');

            foreach ($options as $value) {
				if (THEMATIC_MB) 
				{
					delete_blog_option( $blog_id, $value['id'] );
				} 
					
				else 
					
				{
					delete_option( $value['id'] );
				}
			}

            header("Location: themes.php?page=theme-options.php&reset=true");
            die;

        } else if ( 'resetwidgets' == $action ) {
			check_admin_referer('thematic-reset-widgets');
            update_option('sidebars_widgets',NULL);
            header("Location: themes.php?page=theme-options.php&resetwidgets=true");
            die;
        } 
    }

    add_theme_page($themename." Options", "Thematic Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if (isset($_REQUEST["saved"]) && !empty($_REQUEST["saved"])) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '.__('settings saved.','thematic').'</strong></p></div>';
    if (isset($_REQUEST["reset"]) && !empty($_REQUEST["reset"])) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '.__('settings reset.','thematic').'</strong></p></div>';
    if (isset($_REQUEST["resetwidgets"]) && !empty($_REQUEST["resetwidgets"])) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '.__('widgets reset.','thematic').'</strong></p></div>';
    
?>
<div class="wrap">
<?php if ( function_exists('screen_icon') ) screen_icon(); ?>
<h2><?php echo $themename; ?> Options</h2>

<form method="post" action="">

	<?php wp_nonce_field('thematic-theme-options'); ?>

	<table class="form-table">

<?php foreach ($options as $value) { 
	
	switch ( $value['type'] ) {
		case 'text':
		?>
		<tr valign="top"> 
			<th scope="row"><label for="<?php echo $value['id']; ?>"><?php echo __($value['name'],'thematic'); ?></label></th>
			<td>
				<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if (THEMATIC_MB) {if ( get_blog_option( $blog_id, $value['id'] ) != "") { echo get_blog_option( $blogid, $value['id'] ); } else { echo $value['std']; }} else {if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; }} ?>" />
				<?php echo __($value['desc'],'thematic'); ?>

			</td>
		</tr>
		<?php
		break;
		
		case 'select':
		?>
		<tr valign="top">
			<th scope="row"><label for="<?php echo $value['id']; ?>"><?php echo __($value['name'],'thematic'); ?></label></th>
			<td>
				<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
					<?php foreach ($value['options'] as $option) { ?>
						<option<?php if(THEMATIC_MB){ if ( get_blog_option($blog_id, $value['id']) == $option) { echo ' selected="selected"'; } elseif (!get_option($value['id']) && $value['std'] == $option) { echo ' selected="selected"'; }} else { if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif (!get_option($value['id']) && $value['std'] == $option) { echo ' selected="selected"'; }} ?>><?php echo $option; ?></option>
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
			<th scope="row"><label for="<?php echo $value['id']; ?>"><?php echo __($value['name'],'thematic'); ?></label></th>
			<td><textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="<?php echo $ta_options['cols']; ?>" rows="<?php echo $ta_options['rows']; ?>"><?php
				if (THEMATIC_MB)
				{
					if( get_blog_option($blog_id, $value['id']) != "") 
					{
						echo __(stripslashes(get_blog_option($blog_id, $value['id'])),'thematic');
					}
					else
					{
						echo __($value['std'],'thematic');
					}
				} 
				else
				{ 
					if( get_option($value['id']) != "") 
					{
						echo __(stripslashes(get_option($value['id'])),'thematic');
					}
					else
					{
						echo __($value['std'],'thematic');
					}
				}
				
				?></textarea><br /><?php echo __($value['desc'],'thematic'); ?></td>
		</tr>
		<?php
		break;

		case 'radio':
		?>
		<tr valign="top"> 
			<th scope="row"><?php echo __($value['name'],'thematic'); ?></th>
			<td>
				<?php
				
				foreach ($value['options'] as $key=>$option)
				{
					if (THEMATIC_MB)
					{
						$radio_setting = get_blog_option($blog_id, $value['id']);						
					}
					else
					{
						$radio_setting = get_option($value['id']);						
					}
					if($radio_setting != '')
					{
						if (THEMATIC_MB)
						{
							if ($key == get_blog_option($blog_id, $value['id']) ) 
							{
								$checked = "checked=\"checked\"";
							}
							else
							{
								$checked = "";
							}
						}
						else
						{
							if ($key == get_option($value['id']) ) 
							{
								$checked = "checked=\"checked\"";
							}
							else
							{
								$checked = "";
							}
						}
					}
					else
					{
						if($key == $value['std'])
						{
							$checked = "checked=\"checked\"";
						}
						else
						{
							$checked = "";
						}
					}
				?>
				<input type="radio" name="<?php echo $value['id']; ?>" id="<?php echo $value['id'] . $key; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><label for="<?php echo $value['id'] . $key; ?>"><?php echo $option; ?></label><br />
				<?php 
				} ?>
			</td>
		</tr>
		<?php
		break;
		
		case 'checkbox':
		?>
		<tr valign="top"> 
			<th scope="row"><?php echo __($value['name'],'thematic'); ?></th>
			<td>
				<?php
					if(get_option($value['id'])){
						$checked = "checked=\"checked\"";
					}else{
						$checked = "";
					}
				?>
				<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
				<label for="<?php echo $value['id']; ?>"><?php echo __($value['desc'],'thematic'); ?></label>
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
		<input class="button-primary" name="save" type="submit" value="<?php _e('Save changes','thematic'); ?>" />    
		<input type="hidden" name="action" value="save" />
	</p>
</form>
<form method="post" action="">
	<?php wp_nonce_field('thematic-reset'); ?>
	<p class="submit">
		<input class="button-secondary" name="reset" type="submit" value="<?php _e('Reset','thematic'); ?>" />
		<input type="hidden" name="action" value="reset" />
	</p>
</form>
<form method="post" action="">
	<?php wp_nonce_field('thematic-reset-widgets'); ?>
	<p class="submit">
		<input class="button-secondary" name="reset_widgets" type="submit" value="<?php _e('Reset Widgets','thematic'); ?>" />
		<input type="hidden" name="action" value="resetwidgets" />
	</p>
</form>

<p><?php _e('For more information about this theme, <a href="http://themeshaper.com">visit ThemeShaper</a>. Please visit the <a href="http://themeshaper.com/forums/">ThemeShaper Forums</a> if you have any questions about Thematic.', 'thematic'); ?></p>
</div>
<?php
}

add_action('admin_menu' , 'mytheme_add_admin'); 


?>