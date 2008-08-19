<?php

// Add a theme page to the design section
function thematic_add_guide() {
    add_theme_page("A Guide To Thematic", "Thematic Guide", 'edit_themes', basename(__FILE__), 'thematic_guide');
}

// Create theme page content
function thematic_guide() { ?>
    <div class="wrap">
    
        <h2>A Guide To Thematic</h2>
        <div>
            <p>Thematic is more than just a WordPress theme, it's also a Theme Framework. Now, that doesn't mean it's hard to use, bloated or overcomplicated. Quite the opposite. It's extremely easy to use, lean and well organized.</p>
            <h3>Widget-Ready Areas</h3>
            <p>Thematic has 13 widget-ready areas, called <em>Asides</em>, that can be used creatively to customize your theme.</p>
            <ul>
                <li><h4>Primary Aside</h4>
                <p>Located immediately after the content area in the markup. Typically used as a sidebar. By default it contains <em>Search</em>, <em>Pages</em>, <em>Categories</em> and <em>Archives</em> widgets. Use the widgets panel under <code>Design</code> to add your own widgets and override the default.</p></li>
                <li><h4>Secondary Aside</h4>
                <p>Located immediately after the Primary Aside in the markup. Typically used as a sidebar. By default it contains <em>Links</em>, <em>RSS Feeds</em> and <em>Meta</em> widgets.</p></li>
                <li><h4>Subsidiary Asides</h4>
                <p>Located in the footer. Empty of widgets by default, they will not apear in the theme markup until you add a widget.</p></li>
                <li><h4>Index Asides</h4>
                <p>Located in the content area of the index, or blog page. Empty of widgets by default, they will not apear in the theme markup until you add a widget. The location of the <em>Index Insert</em>, which appears between posts, is controlled from the theme options page. The default position sets it to appear after the second post.</p></li>
                <li><h4>Single Asides</h4>
                <p>Located in the content area of single post pages. Empty of widgets by default, they will not apear in the theme markup until you add a widget.</p></li>
                <li><h4>Page Asides</h4>
                <p>Located in the content area of static pages. Empty of widgets by default, they will not apear in the theme markup until you add a widget.</p></li>
            </ul>
            
            <h3>Contextual Body Classes</h3>
            <p>Thematic makes use of the contextual class functions developed by Scott Wallick and Andy Skelton for The Sandbox. These functions make Thematic almost endlessley customizable through <abbr title="Cascading Stylesheets">CSS</abbr> alone.</p>
            <p>To really see how these classes work, where they appear and how you can use them, I recommend the Firefox extension, <a href="http://www.getfirebug.com/">Firebug</a>.</p>
            
            <h3>Child Themes</h3>        
            <p>Thematic has been specially optimized to take advantage of the power of WordPress Child Themes. Unless you plan on making <strong>extreme</strong> modifications I recommend you use a Child Theme to customize Thematic.</p>
            <p>I've compiled a few Thematic Child Themes that can help you get started. If you'd like to see your Child Theme listed here, <a href="http://themeshaper.com/contact/">contact Ian Stewart</a>.</p>
            <h4>Free Child Themes</h4>
            <ul>
                <li><a href="">Junction</a></li>
            </ul>
            <h4>Commercial Child Themes</h4>
            <ul>
                <li><a href="http://themeshaper.com/acamas-theme-clarity-elegance-power/">Acamas</a></li>
                <li><a href="http://themeshaper.com/travailler-professional-wordpress-cms-theme/">Travailler</a></li>
            </ul>
            
            <h3>Find An Answer To Common Problems</h3>
            <p>If you have a question, problem or concern with Thematic, I recommend posting to the <a href="http://themeshaper.com/forums/" title="ThemeShaper Forums">ThemeShaper Forums</a> after looking there for an answer.</p>
            <iframe id="ts-forums" src="http://themeshaper.com/forums/"></iframe>
            
        </div>
    </div>
<?php }

add_action('admin_menu' , 'thematic_add_guide'); 

// Load styles for theme page
function thematic_guide_admin_head() {
	print('
<style type="text/css">
p {
    width:75%;
}
#ts-forums {
	height: 300px;
	margin-top: 10px;
	width: 95%;
}
</style>
	');
}
add_action('admin_head', 'thematic_guide_admin_head');


?>