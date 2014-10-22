<?php /* Template Name: Row layout with 2 links */ ?>
<?php get_header() ?>
 <main id="page-wrap" role="main">
  <!--overview-->
<section class="section <?php echo get_field('theme')?>" data-anchor="architects">
<div class="main column width-45-pct" role="main">
  <h1>COMMERCIALLY<br />CREATIVE<br /><span>ARCHITECTS</span></h1>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
<?php get_template_part('includes/secondary-nav') ?>
</div>
<aside class="beta column width-55-pct">
  <div class="inner">
  <div class="row height-60-pct gutter masked" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/rose-bowl.jpg');">
  </div>
  <div class="row height-40-pct">
 <div class="column width-40-pct"><a href="" class="fit-cell down <?php echo get_field('theme')?>">Our Architectural Services</a></div>
 <div class="column width-60-pct"><a href="" class="fit-cell grey">Case Studies</a></div>
  </div>
</div>
</aside>
</section>
  <!--/overview-->
</main>
<?php get_footer() ?>