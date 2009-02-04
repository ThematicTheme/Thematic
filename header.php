<?php thematic_header(); ?>

<?php wp_head(); ?>

</head>

<body class="<?php thematic_body_class() ?>">
<?php thematic_before(); ?>

<div id="wrapper" class="hfeed">

<?php thematic_aboveheader(); ?>   

    <div id="header">
    	<div id="branding">
    		<div id="blog-title"><span><a href="<?php echo get_option('home') ?>/" title="<?php bloginfo('name') ?>" rel="home"><?php bloginfo('name') ?></a></span></div>
    		<?php if (is_home() || is_front_page()) { ?>
    		<h1 id="blog-description"><?php bloginfo('description') ?></h1>
    		<?php } else { ?>	
    		<div id="blog-description"><?php bloginfo('description') ?></div>
    		<?php } ?>
    	</div><!--  #branding -->
    	<div id="access">
    		<div class="skip-link"><a href="#content" title="<?php _e('Skip navigation to the content', 'thematic'); ?>"><?php _e('Skip to content', 'thematic'); ?></a></div>
            <?php wp_page_menu('sort_column=menu_order') ?>
        </div><!-- #access -->
    </div><!-- #header-->
    
<?php thematic_belowheader(); ?>   

    <div id="main">
    