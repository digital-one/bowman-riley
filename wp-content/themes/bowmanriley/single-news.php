<?php get_header() ?>
<?php
$page = get_post(32);
?>
  <main id="page-wrap" role="main">
<!-- our story section -->
<section id="news" class="section fixed <?php echo get_field('theme',$post->ID)?>">
<div class="main column width-45-pct" role="main">
  <?php echo $page->post_content?>
<?php get_template_part('includes/news-nav') ?>
</div>
<aside class="beta column width-55-pct">
  <div class="inner no-cell">
  <div class="row height-45-pct bg-fill-cell masked gutter-2x " style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');">
  </div>
  <div class="row height-55-pct  gutter-2x">

<article class="single column gutter-2x">
  <h2><?php echo $post->post_title?></h2>
  <p> <time datetime="<?php echo mysql2date('Y-M-d', $post->post_date); ?>"><?php echo mysql2date('d', $post->post_date); ?><sup><?php echo mysql2date('S', $post->post_date); ?></sup> <?php echo mysql2date('F Y', $post->post_date); ?></time></p>
<?php echo $post->post_content ?>
<a href="<?php echo get_permalink(32)?>" class="close">Close</a>
  </article>
  </div>
</div>
</aside>
</section>
</main>
<?php get_footer() ?>