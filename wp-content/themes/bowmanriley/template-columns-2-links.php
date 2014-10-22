<?php /* Template Name: Column layout with 2 links */ ?>
<?php get_header() ?>
  <main id="page-wrap" role="main">
    <!--overview-->
<section class="section <?php echo get_field('theme')?>" data-anchor="building-consultants">
<div class="main column width-45-pct" role="main">
<h1>Headline Before<br /><span>Building Consultants</span></h1>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
<?php get_template_part('includes/secondary-nav') ?>
</div>
<aside class="beta column width-55-pct">
  <div class="inner">
  <div class="column width-two-thirds gutter masked bg-fill-cell" style="background-image:url('images/rose-bowl.jpg');">
image here
  </div>
  <div class="column width-one-third masked" style="background-color:#fff;">
    <div class="row height-40-pct gutter"><a href="" class="fit-cell <?php echo get_field('theme')?> down">Our Consultancy Services</a></div>
     <div class="row height-60-pct"><a href="" class="fit-cell grey">Case Studies</a></div>
  </div>
</div>
</aside>
</section>
  <!--/overview-->
</main>
<?php get_footer() ?>