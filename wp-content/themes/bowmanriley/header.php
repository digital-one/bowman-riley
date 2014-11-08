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
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/fancybox/jquery.fancybox.css" />
        <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js"></script>
       <!--[if (gte IE 6)&(lte IE 8)]>
<script src="js/selectivizr-min.js"></script>
<![endif]-->
        <!--[if lte IE 9]>
          <script src="js/respond.min.js"></script>
        <![endif]-->
  <?php gravity_form_enqueue_scripts(2,true); ?>
         <?php wp_head() ?>
    </head>
    <body>
<div style="display:none;">
<div id="fancyboxID-1" class="popup-form">
<?php echo do_shortcode('[gravityform id="1" ajax="true"]') ?>
</div>
</div>
<div style="display:none;">
<div id="fancyboxID-2" class="popup-form">
<?php echo do_shortcode('[gravityform id="2" ajax="true"]') ?>
</div>
</div>
<div style="display:none;">
<div id="fancyboxID-3" class="popup-form">
<?php echo do_shortcode('[gravityform id="3" ajax="true"]') ?>
</div>
</div>
   <!--header-->
   <header id="header" <?php if(is_front_page()):?>class="front-page"<?php endif ?>>
    <h1 id="home-link"><a href="<?php echo home_url() ?>"><img data-no-retina src="<?php echo get_template_directory_uri(); ?>/images/bowman-riley.svg" /></a></h1>
<nav id="nav"><a id="mobile">Mobile</a>
<?php
    wp_nav_menu( array(
        'menu'=>'Main Navigation',
        'container' => false, 
        'fallback_cb' => 'wp_page_menu'//,
        //'walker' => new test_nav ()
        //'menu_class' => 'inline',
        //'link_after' => '<span></span>'
        )
    );
    ?>
</nav>
  </header>
  <!--/header-->