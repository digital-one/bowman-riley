<?php get_header() ?>
<?php
$page = get_post(32);
?>
 <main id="page-wrap" role="main">
<!-- our story section -->
<section id="news" class="section fixed <?php echo get_field('theme',$post->ID)?>"  data-title="<?php wp_title()?>" data-anchor="<?php echo $post->post_name?>">
<div class="main column width-45-pct" role="main">
  <?php echo $page->post_content?>
<?php get_template_part('includes/news-nav') ?>
<div class="arrow-divide"><a href=""><img data-no-retina src="<?php echo get_template_directory_uri(); ?>/images/arrow-down.svg" /></a></div>
</div>
<aside class="beta column width-55-pct">
  <div class="inner">
 <?php
  $term = isset($wp->query_vars['term']) ? $wp->query_vars['term'] : '';
  $year = isset($wp->query_vars['yr']) ? $wp->query_vars['yr'] : date('Y');

  $args = array(
    'post_type' => 'news',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page'   => -1,
    'post_status' => 'publish',
    //'monthnum'=>$monthnum,
    'year'=>$year,
    'taxonomy' => 'news-category',
    'term'=>$term
);
  if($articles = get_posts($args)):
    foreach($articles as $article):
?>
 <article>
  <a href="<?php echo get_permalink($article->ID)?>" class="news-link">
    <figure>
  <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($article->ID)); ?>" />
</figure>
  <div class="story">
<h3><?php echo $article->post_title ?></h3>
 <p><time datetime="<?php echo mysql2date('Y-M-d', $article->post_date); ?>"><?php echo mysql2date('d', $article->post_date); ?><sup><?php echo mysql2date('S', $article->post_date); ?></sup> <?php echo mysql2date('F Y', $article->post_date); ?></time></p>
<p><?php echo $article->post_excerpt?> MORE</p>
</div>
<?php if ( '' != get_the_post_thumbnail($article->ID)): ?>

<?php endif ?>
</a>
 </article>
<?php endforeach ?>
<?php endif ?>
</div>
</aside>
</section>
</main>
<?php get_footer() ?>