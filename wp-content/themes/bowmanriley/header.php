<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php wp_title() ?></title>
        <!--<meta name="description" content="">-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
        <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" />
        <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js"></script>
       <!--[if (gte IE 6)&(lte IE 8)]>
<script src="js/selectivizr-min.js"></script>
<![endif]-->
        <!--[if lte IE 9]>
          <script src="js/respond.min.js"></script>
        <![endif]-->
         <?php wp_head() ?>
    </head>
    <body>
   <!--header-->
   <header id="header" <?php if(is_front_page()):?>class="front-page"<?php endif ?>>
    <h1 id="home-link"><img src="<?php echo get_template_directory_uri(); ?>/images/bowman-riley.svg" /></h1>
<nav id="nav"><a id="mobile">Mobile</a>
<?php
    wp_nav_menu( array(
        'menu'=>'Main Navigation',
        'container' => false, 
        'fallback_cb' => 'wp_page_menu'//,
        //'menu_class' => 'inline',
        //'link_after' => '<span></span>'
        )
    );
    ?>
<!--<ul><li class="menu-item-has-children"><a href="http://bowmanriley.localhost/">All About Bowman Riley</a><ul class="sub-menu"><li><a href="">Home</a></li><li><a href="http://bowmanriley.localhost/our-story">Our story</a></li><li><a href="http://bowmanriley.localhost/our-people/">Our people</a></li><li><a href="http://bowmanriley.localhost/our-approach">Our approach</a></li><li><a href="">Our sustainability</a></li><li><a href="">Our CSR</a></li></ul></li><li><a href="http://bowmanriley.localhost/architects.php">Architects</a></li><li><a href="http://bowmanriley.localhost/building-consultancy.php">Building Consultancy</a></li><li><a href="http://bowmanriley.localhost/healthcare.php">Healthcare</a></li><li><a href="http://bowmanriley.localhost/case-studies.php">Case Studies</a></li><li><a href="http://bowmanriley.localhost/work-with-us.php">Work with us</a></li><li><a href="http://bowmanriley.localhost/media.php">Media &amp; Latest News</a></li><li><a href="http://bowmanriley.localhost/contact.php">Contact</a></li></ul>-->
</nav>
  </header>
  <!--/header-->