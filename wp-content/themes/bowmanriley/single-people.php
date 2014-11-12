<?php
$terms = wp_get_post_terms( $post->ID, 'people_category');
$term = $terms[0];
$theme = get_field('theme',$term);
?>
<?php get_header() ?>

  <main id="page-wrap" role="main">
<!-- our story section -->
<section id="people-single"  data-title="<?php wp_title()?>" class="<?php echo $theme ?> section fixed <?php echo get_field('theme',$post->ID)?>">
<div class="main column width-45-pct" role="main">
  <h1><?php echo $term->name ?> Team</h1>
    <?php echo get_field('term_long_description',$term) ?>
<?php get_template_part('includes/secondary-nav-people') ?>
</div>
<aside class="beta column width-55-pct">
  <div class="inner no-cell">
  <div class="row height-60-pct bg-fill-cell masked gutter-2x " style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');">
  </div>
  <div class="row height-40-pct  gutter-2x">

<article class="single column gutter-2x">
  <h2><?php echo $post->post_title?></h2>
  <p> <?php echo get_field('position',$post->ID) ?></p>
<?php echo $post->post_content ?>
<a href="<?php echo get_term_link($term) ?>" class="close">Close</a>
  </article>
  </div>
</div>
</aside>
</section>
</main>
<?php get_footer() ?>