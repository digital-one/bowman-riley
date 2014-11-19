<?php get_header() ?>
<main id="page-wrap" role="main">
  <!--explore-->
<section id="explore" class="section"  data-title="<?php wp_title()?>" data-anchor="explore-our-services">
<div class="main column width-45-pct" role="main">
 <?php echo $post->post_content?>
<?php get_template_part('includes/secondary-nav'); ?>
</div>
<aside class="beta column width-55-pct">
  <div class="inner">
    <div class="square cell half"><a href="<?php echo get_permalink(18)?>" class="service-link push-link architects"><span><img src="<?php echo get_template_directory_uri(); ?>/images/br-architects.svg" /></span></a></div>
    <div class="square cell half"><a href="<?php echo get_permalink(20)?>" class="service-link push-link building-consultants"><span><img src="<?php echo get_template_directory_uri(); ?>/images/br-building-consultancy.svg" /></span></a></div>
    <div class="square cell half"><a href="<?php echo get_permalink(22)?>" class="service-link push-link healthcare"><span><img src="<?php echo get_template_directory_uri(); ?>/images/br-healthcare.svg" /></span></a></div>
    <div class="square cell half"><a href="<?php echo get_permalink(247)?>" class="service-link push-link innovate"><span><img src="<?php echo get_template_directory_uri(); ?>/images/br-innovate.svg" /></span></a></div>
</div>
</aside>
</section>
<!--/explore-->
</main>
<?php get_footer() ?>