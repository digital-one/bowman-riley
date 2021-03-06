<?php get_header() ?>
<?php
$terms = wp_get_post_terms( $post->ID, 'casestudies_category');
$term = $terms[0];
$description = get_field('long_description',$term);
?>

  <?php $page = get_post(24); ?>
  <main id="page-wrap" role="main">
   <section id="case-studies"  data-title="<?php wp_title()?>" class="fixed section <?php echo get_field('theme',$page->ID) ?>">
<div class="main column width-45-pct" role="main">

  <?php echo $page->post_content ?>
  <?php
  if(!empty($description)): ?>
  <p class="description"><?php echo $description ?></p>
<?php endif ?>
<?php get_template_part('includes/case-studies-nav') ?>
</div>
<aside class="beta column width-55-pct">
  <div class="inner no-cell">
    <?php
if(get_field('image_slider',$post->ID)):
  ?>
<div class="row height-60-pct bg-fill-cell masked gutter-2x">

<div class="slider owl-carousel">
  <?php while(the_repeater_field('image_slider')):  ?>
  <?php list($src,$w,$h) = wp_get_attachment_image_src(get_sub_field('slider_image'), 'full'); ?>
<div class="image-slide" class="bg-fill-cell" style="background-image:url('<?php echo $src ?>');"></div>
<?php endwhile ?>
</div>
</div>
<?php else: ?>
  <div class="row height-60-pct bg-fill-cell masked gutter-2x" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');">
  </div>
<?php endif ?>
  <div class="row height-40-pct  gutter-2x">
<div class="column width-25-pct gutter-2x"><ul class="case-study-meta"><li>Client: <?php echo $post->post_title?></li>
  <?php
  $location = get_field('location',$post->ID);
  $stage = get_field('stage',$post->ID);
  $value = get_field('value',$post->ID);
 if($location): ?>
  <li class="location">Location: <?php echo $location ?></li>
<?php endif ?>
<?php if($stage): ?>
 <li class="stage">Stage: <?php echo $stage ?></li>
 <?php endif ?>
 <?php if($value): ?>
 <li class="value">Value: <?php echo $value ?></li>
 <?php endif ?>
</ul>

<div  class="case-study-links">
  <ul class="category-links">
  <?php
if($terms = wp_get_post_terms($post->ID, 'casestudies_category')):
foreach($terms as $term):
  ?>
<li><a href="<?php echo get_term_link($term) ?>">See more in <?php echo $term->name ?></a></li>
<?php
endforeach;
endif;
?> 
</ul>
<?php if(get_field('download_pdf',$post->ID)):?>
<a href="<?php echo get_field('download_pdf',$post->ID); ?>" target="_blank" class="download">Download case study</a>
<?php endif ?>
</div>
</div>
<article class="column width-75-pct gutter-2x">
<?php echo $post->post_content ?>
<a href="<?php echo get_permalink(24) ?>" class="close">Close</a>
  </article>
  </div>
</div>
</aside>
</section>
</main>
<?php get_footer() ?>