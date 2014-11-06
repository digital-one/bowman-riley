<?php /* Template Name: 3 images */ ?>
<?php get_header() ?>

 <main id="page-wrap" role="main">
    <section class="section <?php echo get_field('theme',$post->ID)?>" data-anchor="<?php echo $post->post_name?>">
<div class="main column width-45-pct" role="main">
  <div class="main-content">
 <?php echo $post->post_content ?>
</div>
<?php get_template_part('includes/secondary-nav') ?>
<?php
$children = get_pages("child_of=$post->post_parent&sort_column=menu_order&sort_order=DESC");
$lastchild = $children[0];
if($post->ID != $lastchild->ID):
?>
<div class="arrow-divide"><a href=""><img data-no-retina src="<?php echo get_template_directory_uri(); ?>/images/arrow-down.svg" /></a></div>
<?php endif ?>
</div>
<aside class="beta column width-55-pct">
  <div class="inner">
  	  	<?php 
$cs = get_field('case_study',$post->ID);
if(!empty($cs)):

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