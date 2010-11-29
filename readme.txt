=== Thematic ===
Contributors: iandstewart, chrisgossmann, emhr
Tags: white, three-columns, two-columns, fixed-width, theme-options, left-sidebar, right-sidebar, threaded-comments, sticky-post, microformats
Requires at least: 2.9.2
Tested up to: 3.0.1
Stable tag: 0.9.8

The ultimate in SEO-ready themes, Thematic is a highly extensible, WordPress Theme Framework featuring 13 widget-ready areas, &amp; a whole lot more.

== Description ==

Thematic is a free, open-source, highly extensible, search-engine optimized WordPress Theme Framework featuring 13 widget-ready areas, grid-based layout samples, styling for popular plugins, and a whole community behind it. It's perfect for beginner bloggers and WordPress development professionals.

Features:

* Perfect to use as-is or as a blank WordPress theme for development
* Fully Search-Engine Optimized
* Extra widget-ready areas (13 in total) and more possible in your Child Theme
* Free and commercially supported Child Themes are available for upgrading the theme
* Includes a sample WordPress Child Theme for rapid development
* A wiki-editable guide to Thematic Customization
* Ready for WordPress plugins like Subscribe to Comments, WP-PageNavi, and Comment-license
* Fully compatible with All-In-One SEO and Platinum SEO plugins
* Multiple, easy to implement, bulletproof layout options for 2, or 3 column designs
* Modular CSS with pre-packaged resets and basic typography
* Dynamic post and body classes make it a hyper-canvas for CSS artists
* Editable footer text—remove the theme credit without harming the theme
* Options for multi-author blogs

== Changelog ==

= 0.9.8ß =
* Added: Thematic Compatible Comment Handling comment to sample child theme functions.php.
* Added: Thematic Compatible Comment Handling to full page template.
* Added: New filter thematic_open_id_content. Defaults to: <code>'<div id="content">' . "\n"</code>.
* Added: $content_width defines the max image width.
* Added: Farsi language files. Credits: Ehsan
* Changed: Removed changelog.html in favor of the new readme.txt.
* Fixed: An E_NOTICE in dynamic_classes.php (occured while displaying a 404 page). Credits: markauk
* Fixed: childtheme_override_content_init() is now working.
* Fixed: Updated Brazilian Portuguese language files. Credits: Eduardo Zulian.
* Fixed: Removed sidebar-subsidiary.php. Code is created using action hooks.
* Fixed: The override part of some more functions.
* Fixed: Set Thematic filter thematic_page_menu_args for thematic_page_menu_args().
* Fixed: Removed thematic_page_menu_args() filter of wp_page_menu_args.
* Fixed: Reinstated thematic_nav_menu filter.
* Fixed: Undefined variable $redirect in thmfooter_login_link() from shortcodes.php.
* Fixed: The override part of a few functions creating the header missed the add_action part.
= 0.9.7.7 =
* Fixed: search.php call to undefined function blog_info().
* Fixed: Theme Review Images Test via CSS.
= 0.9.7.6 =
* Fixed: "Constant * already defined" notices when defining constants in a child themes.
* Fixed: "Undefined variable" $id, $aria_req notices when using default comment_form().
* Fixed: "Undefined constant assumed get_post_type_object" notice in thematic_post_class.
= 0.9.7.5 =
* Added: The constant THEMATIC_COMPATIBLE_FEEDLINKS which defaults to false. In this case the WordPress functions add_theme_support( 'automatic-feed-links' ) is used. If you set it to TRUE, Thematic will use its own functionality. This is a requirement by the Theme Review Team.
* Added: New function thematic_body() to header.php defined in dynamic-classes.php 
* Added: New function childtheme_override_body() defined in dynamic-classes.php
* Added: New function thematic_body_open() defined in dynamic-classes.php
* Added: Added Estonian language files. Credits: Peeter Marvet
* Added: Thematic's browser / OS class to WorpPress' body_class(). Menu will now display properly with the Test Data.
* Added: the constant THEMATIC_COMPATIBLE_COMMENT_FORM which defaults to false. In this case the WordPress function comment_form() is used. If you set it to TRUE, Thematic will use its own functionality. This is a requirement by the Theme Review Team. * Added: Added: Thematic's browser / OS class to WorpPress' body_class(). Menu will now display properly with the Test Data.
* Added: the constant THEMATIC_COMPATIBLE_POST_CLASS which defaults to false. In this case the WordPress function post_class() is used. If you set it to TRUE, Thematic will use its own function thematic_post_class(). This is a requirement by the Theme Review Team.
* Added: the constant THEMATIC_COMPATIBLE_BODY_CLASS which defaults to false. In this case the WordPress function body_class() is used. If you set it to TRUE, Thematic will use its own function thematic_body_class(). This is a requirement by the Theme Review Team.
* Added: Better SSL support by replacing bloginfo('siteurl') & get_bloginfo('siteurl') with site_url()
* Changed: the filter body_class to thematic_body_class.
* Fixed: Finnish language files. Credits: Peeter Marvet
* Fixed: Trailing slashes in the search forms of search.php and thematic_404()
* Fixed: childtheme_override_access().
* Fixed: the closing > for the post_class part.
* Fixed behaviour of thematic_show_bodyclass. The body tag will now be created, if a filter returns false.
* Fixed: Removed add_theme_support('menu') according to Andrew Nacin.
* Fixed: Comment handling for archives.php, links.php and page.php can be made compatible with old handling controlled by a key/value of "comments".
* Wrapped some WP 3.0 function calls. Thematic still supports WP 2.9.x.
= 0.9.7.4 =
* Added: Filter thematic_post_thumb_size in thematic_content()
* Added: Filter thematic_post_thumb_attr in thematic_content()
* Added: Filter thematic_post_thumbs Default TRUE in thematic_content()
* Added: Post Thumbnails to thematic_content() excerpts
* Added: add_theme_support( 'post-thumbnails' ) as required by WP Theme Dev Checklist
* Added: Post and Body classes for custom post types
* Added: Helper function thematic_is_custom_post_type()
* Added: Czech language files Credits: JanJan Fertek
* Added: Filter thematic_show_bc_taxonomyarchives Default True
* Added: Post and Body classes for custom taxonomies
* Added: Custom taxonomy support for archives in thematic_page_title()
* Added: Helper function thematic_get_term_name() for retrieving custom taxonomy name Credit Justin Tadlock 
* Added: CDATA encoding to JavaScript
* Added: Blog template page-blog.php  
* Added: Page template page-fullwidth.php and relative styles in thematic>library>layouts *.css files for full width content
* Fixed: Clearing Floats issues in compliance with Theme_Unit_Test WordPress Theme Review Guidelines
* Fixed: Conditional display of comment-edit anchor tag and meta separator
* Fixed: Trailing slash in thematic_search_form()
* Fixed: Missing Dutch nl_NL.po
* Added add_theme_support( 'automatic-feed-links' ).
* Removed the deprecated function call get_the_author().
* Renamed template files page-... to template-page-... according to <a href="http://codex.wordpress.org/Theme_Review#Custom_Template_Naming_Conventions">4.5.4 Custom Template Naming Conventions</a> and adjusted the CSS files.
* Updated: PT lang files Thanks to: Bernardo Maciel
* Updated: Dutch translation props: Fili
= 0.9.7.3 =
* Fixed: Changed trackback_url() to get_trackback_url().
* Fixed: Displaying WordPress Galleries is fixed.
* Fixed: Cleaned up theme-options.php.
* Fixed: Cleaned up comments-extensions.php.
* Fixed: Removed the custom field check to display the comments template for page.php, archives.php and links.php.
* Fixed: Deprecated is_sidebar_active() in favor of is_active_sidebar().
* Fixed: Cleaned up the deprecated function calls
* Fixed: duplicate key in thematic_nav_menu_args().
* Fixed: The deprecated function uses WordPress' functionality for reporting.
= 0.9.7.2 =
* Added: Fallback to wp_page_menu if theme location has no menu
* Added: thematic_init_navmenu registers the theme location for our menu. Override: childtheme_override_init_navmenu
* Added: thematic_primary_menu_name filters the menu name 'Primary Menu'.
* Added: thematic_primary_menu_id filters the  menu id 'primary-menu'.
* Added: The main menu uses the menu id 'primary-menu' and the menu name 'Primary Menu'.
* Fixed: Changed add_theme_support( 'nav-menus' ) to add_theme_support( 'menus' ).
* Fixed: a bug that prevents the 'Reset Widgets'.
= 0.9.7.1 =
* Fixed: Potential security issue in theme-options.php.
= 0.9.7 =
* Added: new function: thematic_init_presetwidgets() to initialize the preset widgets. Override function: childtheme_override_init_presetwidgets()
* Added: new function: thematic_content_init() to set up new post classes.
* Added: childtheme_override_content_init() overrides thematic_content_init
* Added: new post classes: is-full is-excerpt custom-excerpt auto-excerpt wp-teaser has-more wp-more has-teaser
* Added: new filter thematic_get_excerpt to thematic_content()
* Added: filter to customize the length ofthematic_search_form() in widgets-extensions.php. Credits: Aaron Jorbin
* Added: childtheme_override_doctitle() overrides thematic_doctitle
* Added: childtheme_override_head_scripts() overrides thematic_head_scripts
* Added: childtheme_override_brandingopen() overrides thematic_brandingopen
* Added: childtheme_override_blogtitle() overrides thematic_blogtitle
* Added: childtheme_override_blogdescription() overrides thematic_blogdescription            
* Added: childtheme_override_brandingclose() overrides thematic_brandingclose
* Added: childtheme_override_access() overrides thematic_access
* Added: childtheme_override_subsidiaries() overrides thematic_subsidiaries
* Added: childtheme_override_siteinfoopen() overrides thematic_siteinfoopen()
* Added: childtheme_override_siteinfo() overrides thematic_siteinfo()
* Added: childtheme_override_siteinfoclose() overrides thematic_siteinfoclose()
* Added: New action hooks thematic_abovecomment and thematic_belowcomment Credits: heaven.
* Added: childtheme_override_commentmeta overrides thematic_commentmeta()
* Added: new filter thematic_commentmeta() to discussion.php. Credits: heaven
* Added: childtheme_override_body_class() overrides thematic_body_class()
* Added: childtheme_override_post_class() overrides thematic_post_class()
* Added: childtheme_override_comment_class() overrides thematic_archive_loop()
* Added: childtheme_override_author_loop() overrides thematic_comment_class()
* Added: childtheme_override_date_classes() overrides thematic_date_classes()
* Added: Finnish language files. Credits: Mikito Takada
* Added: new filter thematic_open_wrapper to the header.php. This filter defaults to true.
* Added: new filter thematic_close_wrapper to the footer.php. This filter defaults to true.
* Added: childtheme_override_page_title() overrides thematic_page_title()
* Added: childtheme_override_nav_above() overrides thematic_nav_above()
* Added: childtheme_override_archive_loop() overrides thematic_archive_loop()
* Added: childtheme_override_author_loop() overrides thematic_author_loop()
* Added: childtheme_override_category_loop() overrides thematic_category_loop()
* Added: childtheme_override_index_loop() overrides thematic_index_loop()
* Added: childtheme_override_single_post() overrides thematic_single_post()
* Added: childtheme_override_search_loop() overrides thematic_search_loop()
* Added: childtheme_override_tag_loop() overrides thematic_tag_loop()
* Added: childtheme_override_postheader() overrides thematic_postheader()
* Added: childtheme_override_postheader_posteditlink() overrides thematic_postheader_posteditlink()
* Added: childtheme_override_postheader_posttitle() overrides thematic_postheader_posttitle()
* Added: childtheme_override_postheader_postmeta() overrides thematic_postheader_postmeta()
* Added: childtheme_override_postmeta_authorlink() overrides thematic_postmeta_authorlink()
* Added: childtheme_override_postmeta_entrydate() overrides thematic_postmeta_entrydate()
* Added: childtheme_override_postmeta_editlink() overrides thematic_postmeta_editlink()
* Added: childtheme_override_content() overrides thematic_content()
* Added: childtheme_override_archivesopen() overrides thematic_archivesopen()
* Added: childtheme_override_category_archives() overrides thematic_category_archives()
* Added: childtheme_override_monthly_archives() overrides thematic_monthly_archives()
* Added: childtheme_override_archivesclose() overrides thematic_archivesclose()
* Added: childtheme_override_404_content() overrides thematic_404_content()
* Added: childtheme_override_postfooter() overrides thematic_postfooter()
* Added: childtheme_override_postfooter_posteditlink() overrides thematic_postfooter_posteditlink()
* Added: childtheme_override_postfooter_postcategory() overrides thematic_postfooter_postcategory()
* Added: childtheme_override_postfooter_posttags() overrides thematic_postfooter_posttags()
* Added: childtheme_override_postfooter_postcomments() overrides thematic_postfooter_postcomments()
* Added: childtheme_override_postfooter_postconnect() overrides thematic_postfooter_postconnect()
* Added: childtheme_override_nav_below() overrides thematic_nav_below()
* Added: childtheme_override_previous_post_link() overrides thematic_previous_post_link()
* Added: childtheme_override_next_post_link() overrides thematic_next_post_link()
* Added: childtheme_override_author_info_avatar() overrides thematic_author_info_avatar()
* Added: childtheme_override_cats_meow() overrides thematic_cats_meow()
* Added: childtheme_override_tag_ur_it() overrides thematic_tag_ur_it()
* Added: Support for wp_nav_menu().
* Added: New filter thematic_menu_type to switch between wp_page_menu() and wp_nav_menu(). Defaults to wp_page_menu().
* Added: New filter thematic_nav_menu_args to filter the arguments for wp_nav_menu().
* Added: New filter thematic_page_menu_args to filter the arguments for wp_page_menu().
* Added: New filter thematic_use_superfish to prevent the use of Superfish for the menu.
* Added: New filter thematic_show_bc_blogid to prevent the BODY class blogid-n. 
* Added: New BODY class blogid-n.
* Added: New action hooks thematic_abovepost and thematic_belowpost.
* Added: New action hooks thematic_abovecontent and thematic_belowcontent.
* Added: Theme options support WordPress mu and WordPress 3.0 Multi-User option.
* Fixed: The UL Class sf-menu will be created only for the wp_page_menu() in the header.
* Fixed: Changed #trackbacks-list .comment-content to left:-10000px; in default.css. Fixes a glitch with the 'Many Tackbacks' post (WordPress Test Data).
* Fixed: Changed $version to $thm_version to prevent a collision with WP E-Commerce.
* Fixed: Widget areas can now be moved based on a conditional tag.
* Fixed: Removed thematic_before_widget() and thematic_after_widget() from Search Widget
* Fixed: Upgraded the Thematic widgets to the new API. Thematic now requires WordPress 2.8.x or above.
* Updated: Norwegian language files updated. Credits: peter.holme.
* Updated: Norwegian language files updated. Credits: Thomas Misund.
= 0.9.6.2 =
* Fixed: a bug in widgets-extensions.php not loading the preset widgets after switching themes.
* Fixed: a bug in page.php not loading thematic_comments_template()
* Fixed: missing gettext in comments-extensions.php
= 0.9.6.1 =
* Added: thematic_abovecontainer()
* Added: thematic_belowcontainer()
* Added: Thematic prevents the creation of the WordPress Generator. This can be filtered using a filter for thematic_hide_generators. Return TRUE and the WordPress Generator will be created.
* Added: The standard text 'One Comment' can be filtered using thematic_singlecomment_text.
* Added: The standard text 'n Comments' can be filtered using thematic_multiplecomments_text.
* Added: The standard text 'Post a Comment' can be filtered using thematic_postcomment_text.
* Added: The standard text 'Post a Reply to %s' can be filtered using thematic_postreply_text.
* Added: The standard text 'Comment' for the text box can be filtered using thematic_commentbox_text.
* Added: The standard text 'Post Comment' for the send button can be filtered using thematic_commentbutton_text.
* Added: Split up thematic_postheader() and thematic_postfooter() into sub-functions. With these new functions it is easier to rearrange the displayed data.
* Added: thematic_postheader_posttitle()
* Added: thematic_postheader_postmeta()
* Added: thematic_postmeta_authorlink()
* Added: thematic_postmeta_entrydate()
* Added: thematic_postmeta_editlink()
* Added: thematic_postfooter()
* Added: thematic_postfooter_posteditlink()
* Added: thematic_postfooter_postcategory()
* Added: thematic_postfooter_posttags()
* Added: thematic_postfooter_postconnect()
* Added: thematic_postfooter_postcomments()
* Added: thematic_show_bodyclass (master switch)
* Added: thematic_show_bc_wordpress
* Added: thematic_show_bc_datetime
* Added: thematic_show_bc_contenttype
* Added: thematic_show_bc_singular
* Added: thematic_show_bc_singlepost
* Added: thematic_show_bc_authorarchives
* Added: thematic_show_bc_categoryarchives
* Added: thematic_show_bc_tagarchives
* Added: thematic_show_bc_pages
* Added: thematic_show_bc_search
* Added: thematic_show_bc_loggedin
* Added: thematic_show_bc_browser
* Added: thematic_head_profile.
* Added: Complete rewrite of the widget areas: 
* Fixed: a bug in thematic_page_title() not displaying a correct title in attachement.php
* Fixed: Fixed the widget area 'Index Insert'.
* Fixed: Fixed a bug in thematic_create_robots().
