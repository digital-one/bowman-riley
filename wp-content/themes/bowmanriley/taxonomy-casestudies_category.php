<?php get_header() ?>
  <?php $page = get_post(24); ?>
  <main id="page-wrap" role="main">
   <!--case studies-->
<section id="case-studies" class="fixed section <?php echo get_field('theme',$page->ID) ?>">
<div class="main column width-45-pct" role="main">
 <?php echo $page->post_content ?>
<?php get_template_part('includes/case-studies-nav') ?>
</div>
<aside class="beta column width-55-pct">
  <div class="inner"> 
    <?php 
$term = null;
     global $wp_query;
    if( isset( $wp_query->query_vars['term'])) {
        $term_name = $wp_query->query_vars['term'];
    }
$args = array( 
  'post_type' => 'casestudies',
  'posts_per_page' => -1,
  'post_status' => 'publish',
  'tax_query' => array(
    array(
      'taxonomy' => 'casestudies_category',
      'field' => 'slug',
      'terms' => $term_name
    )
  ),
  'orderby' => 'menu_index',
  'order' => 'ASC'
);

if($projects = get_posts($args)):

  for($i=0;$i<count($projects);$i++):
?>
<?php if($i==0): ?>
  <div class="row height-45-pct no-gutter masked">
  <?php endif ?>

  <?php if($i<2): ?>
    <div class="cell half bg-fill-cell" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($projects[$i]->ID)); ?>');"><a href="<?php echo get_permalink($projects[$i]->ID) ?>" class="case-study-link overlay"><ul class="case-study-meta"><li class="client"><?php echo $projects[$i]->post_title ?></li><li class="location"><?php echo get_field('location',$projects[$i]->ID) ?></li></ul></a></div>
  <?php else: ?>
<div class="cell one-third height-50-pct bg-fill-cell" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($projects[$i]->ID)); ?>');"><a href="<?php echo get_permalink($projects[$i]->ID) ?>" class="case-study-link overlay"><ul class="case-study-meta"><li class="client"><?php echo $projects[$i]->post_title ?></li><li class="location"><?php echo get_field('location',$projects[$i]->ID) ?></li></ul></a></div>
  <?php endif ?>

    <?php if($i==1): ?>
  </div>
   <div class="row height-55-pct no-gutter">
<?php endif ?>
<?php endfor ?>
<?php endif ?>
  </div>
</div>
</aside>
  </section>
   <!--/case studies-->

</main>
<?php get_footer() ?>