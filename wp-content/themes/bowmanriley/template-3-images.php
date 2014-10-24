<?php /* Template Name: 3 images */ ?>
<?php get_header() ?>

 <main id="page-wrap" role="main">
    <section class="section <?php echo get_field('theme',$post->ID)?>" data-anchor="<?php echo $post->post_name?>">
<div class="main column width-45-pct" role="main">
 <?php echo $post->post_content ?>
<?php echo get_template_part('includes/secondary-nav') ?>
</div>
<aside class="beta column width-55-pct">
  <div class="inner">
  <div class="row height-60-pct bg-fill-cell masked" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');">
  </div>
  <div class="row height-40-pct">
 <div class="column width-50-pct bg-fill-cell" style="background-image:url('<?php echo wp_get_attachment_url(get_field('image_2_src',$post->ID)); ?>');"></div>
<div class="column width-50-pct bg-fill-cell" style="background-image:url('<?php echo wp_get_attachment_url(get_field('image_3_src',$post->ID)); ?>');"></div>
</div>
</div>
</aside>
</section>
</main>
<?php get_footer() ?>