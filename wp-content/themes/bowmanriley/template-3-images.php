<?php /* Template Name: 3 images */ ?>
<?php get_header() ?>

 <main id="page-wrap" role="main">
    <section class="section <?php echo get_field('theme',$post->ID)?>" data-anchor="<?php echo $post->post_name?>">
<div class="main column width-45-pct" role="main">
 <?php echo $post->post_content ?>
<?php get_template_part('includes/secondary-nav') ?>
</div>
<aside class="beta column width-55-pct">
  <div class="inner">
  	  	<?php if(!empty(get_field('case_study',$post->ID))):
$cs = get_field('case_study',$post->ID);
$image_id = $cs->ID;
$has_case_study = true;
else:
$image_id = $post->ID;
$has_case_study = false;
	endif;
	?>
  <div class="row height-60-pct bg-fill-cell masked" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($image_id)); ?>');">
  	<?php if($has_case_study):?>
  <a href="<?php echo get_permalink($cs->ID)?>" class="main overlay push-link <?php echo get_field('theme',$post->ID)?>">
<ul class="case-study-meta">
<li class="client"><?php echo $cs->post_title?></li>
<li class="location"><?php echo get_field('location',$cs->ID) ?></li>
</ul>
<p><?php echo $cs->post_excerpt ?></p>
  </a>
<?php endif ?>
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