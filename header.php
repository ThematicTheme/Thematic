<?php thematic_create_doctype(); echo " "; language_attributes(); echo ">\n";?>
<head profile="http://gmpg.org/xfn/11">

<?php 

thematic_doctitle();
thematic_create_contenttype();
thematic_show_description();
thematic_show_robots();
thematic_canonical_url();
thematic_create_stylesheet();
thematic_show_rss();
thematic_show_commentsrss();
thematic_show_pingback();
thematic_show_commentreply();

wp_head(); ?>

</head>

<body class="<?php thematic_body_class() ?>">
<?php thematic_before(); ?>

<div id="wrapper" class="hfeed">

<?php thematic_aboveheader(); ?>   

    <div id="header">
        <?php thematic_header() ?>
    </div><!-- #header-->
    
<?php thematic_belowheader(); ?>   

    <div id="main">
    