<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?> 
<?php get_header() ?>

<main id="page-wrap" role="main">
  <!--home-->
<section class="section" id="about"  data-title="<?php wp_title()?>" data-anchor="about-bowman-riley">
<div class="main column width-45-pct">
 <?php echo do_shortcode($post->post_content) ?>

<?php get_template_part('includes/secondary-nav-home') ?>
<div class="arrow-divide"><a href=""><img data-no-retina src="<?php echo get_template_directory_uri(); ?>/images/arrow-down.svg" /></a></div>
</div>
<aside class="beta column width-55-pct split">
  <div class="inner">
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   viewBox="0 0 105.7 108.7" enable-background="new 0 0 105.7 108.7" xml:space="preserve">
<g id="Covers_x2B_footers">
</g>
<g id="Screens">
</g>
<g id="Design">
</g>
<g id="text">
  <g>
    <g>
      <path fill="#77787B" d="M102.7,0.3c-1.4,0-2.5,0.9-2.9,2.1l-7.8,23.3L84.5,2.6c-0.4-1.4-1.5-2.4-3-2.4H81c-1.5,0-2.5,1-3,2.4
        l-7.6,23.1L62.6,2.5c-0.4-1.3-1.5-2.2-2.9-2.2c-1.6,0-3,1.3-3,2.9c0,0.4,0.1,0.8,0.2,1.2l0.4,1.1C54.2,2.1,49.6,0,44.2,0
        C33.9,0,26.5,8,26.5,17.5v0.1c0,0.7,0.1,1.4,0.1,2.1c-1.2-1.3-2.9-2.2-4.8-2.9c2.5-1.3,4.8-3.5,4.8-7.5V9.2
        c0-2.3-0.8-4.1-2.3-5.6c-1.9-1.9-5-3-8.8-3H3.4c-1.7,0-3,1.3-3,3v27.8c0,1.7,1.3,3,3,3H16c7.2,0,12.1-3,12.5-8.6
        c2.8,5.4,8.5,9.2,15.6,9.2c10.1,0,17.3-7.6,17.7-16.7l5.1,14.2c0.6,1.5,1.6,2.5,3.1,2.5h0.6c1.4,0,2.6-0.9,3.1-2.5l7.5-22.1
        l7.5,22.1c0.5,1.5,1.6,2.5,3,2.5h0.6c1.4,0,2.6-1,3.1-2.5l10-28c0.1-0.3,0.3-0.8,0.3-1.2C105.7,1.6,104.3,0.3,102.7,0.3z
         M6.2,5.8h8.5c3.8,0,5.9,1.6,5.9,4.3v0.1c0,3.1-2.6,4.6-6.4,4.6H6.2V5.8z M22.6,24.5c0,3-2.5,4.6-6.5,4.6H6.2v-9.3h9.4
        C20.3,19.8,22.6,21.5,22.6,24.5L22.6,24.5z M55.6,17.6c0,6.6-4.7,11.9-11.4,11.9s-11.5-5.4-11.5-12v-0.1
        c0-6.6,4.7-11.9,11.4-11.9S55.6,10.9,55.6,17.6L55.6,17.6z"/>
      <path fill="#77787B" d="M97.6,44.7c-1.6,0-2.9,1.3-2.9,2.9v13.2L77.8,38.9c-0.8-1-1.6-1.7-3.1-1.7h-0.6c-1.7,0-3,1.4-3,3V55
        l-7-15.7c-0.7-1.5-1.8-2.4-3.5-2.4h-0.3c-1.7,0-2.9,0.9-3.6,2.4l-10,22.3l-7.9-22.1C38.2,38,37.2,37,35.7,37h-0.6
        c-1.4,0-2.6,0.9-3.1,2.5l-7.5,22.1L17,39.5c-0.5-1.5-1.6-2.5-3-2.5h-0.6c-1.4,0-2.6,1-3.1,2.5l-10,28C0.1,67.8,0,68.3,0,68.7
        c0,1.6,1.4,2.8,2.9,2.8c1.4,0,2.5-0.9,2.9-2.1l7.8-23.3l7.6,23.1c0.4,1.4,1.5,2.4,3,2.4h0.4c1.5,0,2.5-1,3-2.4l7.6-23.1L43,69.4
        c0.4,1.3,1.5,2.2,2.9,2.2c0.4,0,0.8-0.1,1.2-0.2c0.9-0.2,1.7-0.8,2.1-1.8l2.8-6.5h16.4l2.7,6.1c0.3,1.2,1.2,2.1,2.5,2.3
        c0,0,0,0,0.1,0c0.1,0,0.2,0,0.3,0c0,0,0,0,0,0c0,0,0,0,0.1,0c1.6,0,2.8-1.3,2.8-2.8c0,0,0-0.1,0-0.1V47.1l17.4,22.5
        c0.8,1.1,1.7,1.8,3.1,1.8h0.2c1.6,0,2.9-1.3,2.9-2.9V47.5C100.5,46,99.2,44.7,97.6,44.7z M54.3,57.7l5.9-13.7l5.9,13.7H54.3z"/>
    </g>
    <path fill="#00AEEF" d="M2.9,79.6c-1.5,0-2.7-1.2-2.7-2.7s1.2-2.7,2.7-2.7l0.6,0h8.7c4.3,0,7.7,1.3,9.9,3.4C24,79.4,25,82,25,85
      v0.1c0,5.5-3.2,8.8-7.8,10.2l6.6,8.3c0.6,0.7,1,1.4,1,2.3c0,1.7-1.4,2.8-2.9,2.8c-1.4,0-2.3-0.6-2.9-1.6l-8.3-10.6
      c0,0-4.8-5.3,1.2-5.3c4.3,0,7-2.3,7-5.7v-0.1c0-3.7-2.6-5.7-7.1-5.7H6.5l-2.8,0L2.9,79.6z"/>
    <path fill="#00AEEF" d="M27.7,76.9c0-1.7,1.3-3,3-3c1.7,0,3,1.3,3,3v28.8c0,1.7-1.3,3-3,3c-1.7,0-3-1.3-3-3V76.9z"/>
    <path fill="#00AEEF" d="M36.8,76.9c0-1.7,1.3-3,3-3c1.7,0,3,1.3,3,3v26h11.5c1.5,0,2.7,1.2,2.7,2.7s-1.2,2.7-2.7,2.7H39.8
      c-1.7,0-3-1.3-3-3V76.9z"/>
    <path fill="#00AEEF" d="M102.4,73.9c-1.3,0-2.2,0.7-2.9,1.8l-9.7,13.8l-9.2-13.4c-0.7-1-1.6-1.8-2.8-1.8c-0.2-0.1-0.5-0.1-0.7-0.1
      H62.2c-1.7,0-3,1.3-3,3v28.2c0,1.7,1.3,3,3,3h15.1c1.5,0,2.7-1.2,2.7-2.7c0-1.5-1.2-2.7-2.7-2.7H65.2v-9.2h9.6
      c1.5,0,2.7-1.2,2.7-2.6c0-1.5-1.2-2.7-2.7-2.7h-9.6v-8.9h10.3l11.3,15.6v10.6c0,1.7,1.3,3,3,3c1.7,0,3-1.3,3-3V95l11.7-16
      c0.4-0.6,0.8-1.3,0.8-2.2C105.3,75.2,104.2,73.9,102.4,73.9z"/>
  </g>
</g>
</svg>
</div>
</aside>
</section>
<!--/home-->
</main>

<?php get_footer() ?>
<?php endwhile;?>
 <?php endif; ?>