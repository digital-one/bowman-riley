<?php /* Template Name: Row layout with 4 links */ ?>
<?php get_header(); ?>
  <main id="page-wrap" role="main">
  <section class="section <?php echo get_field('theme')?>">
<div class="main column width-45-pct" role="main">
  <h1>All things media and our latest news</h1>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
<?php get_template_part('includes/secondary-nav') ?>
</div>
<aside class="beta column width-55-pct">
  <div class="inner">
  <div class="row height-60-pct bg-fill-cell" style="background-image:url('images/careers.jpg');">
  </div>
  <div class="row height-40-pct">
 <div class="column width-40-pct"><a href="http://bowmanriley.localhost/latest-news.php" class="fit-cell <?php echo get_field('theme')?> push-link">Latest press releases</a></div>
 <div class="column width-60-pct">
  <div class="row height-40-pct"><a href="" class="fit-cell grey down">Media pack download</a></div>
 <div class="row height-60-pct"><div class="column width-55-pct"><a href="" class="fit-cell brown inverted down">Download out brochures</a></div><div class="column width-45-pct"><a href="" class="fit-cell white">Contact Us</a></div></div>
</div>
</div>
</div>
</aside>
</section>
</main>
<?php get_footer(); ?>