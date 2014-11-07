<?php get_header() ?>
  <main id="page-wrap" role="main">
   <!--case studies-->
<section id="case-studies" class="fixed section">
<div class="main column width-45-pct" role="main">
  <h1>Take a look at our<br /><span>case studies</span></h1>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
<?php get_template_part('includes/case-studies-nav') ?>
</div>
<aside class="beta column width-55-pct">
  <div class="inner"> 
    <?php 
 if($terms = get_terms('casestudies_category',array('hide_empty' => 0))): 
 // print_r($terms);
endif;



$args = array( 
  'post_type' => 'casestudies',
  'posts_per_page' => -1,
  //'post_status' => 'publish',
  'tax_query' => array(
    array(
      'taxonomy' => 'casestudies_category',
      'field' => 'slug',
      'terms' => 'featured'
    )
  ),
  'orderby' => 'menu_order',
  'order' => 'ASC'
);

if($projects = get_posts($args)):

  for($i=0;$i<count($projects);$i++):
$location = get_field('location',$projects[$i]->ID);
$stage = get_field('stage',$projects[$i]->ID);
$value = get_field('value',$projects[$i]->ID);
?>
<?php if($i==0): ?>
  <div class="row height-45-pct no-gutter masked">
  <?php endif ?>

  <?php if($i<2): ?>
    <div class="cell half bg-fill-cell" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($projects[$i]->ID)); ?>');"><a href="<?php echo get_permalink($projects[$i]->ID) ?>" class="case-study-link overlay"><ul class="case-study-meta"><li class="client"><?php echo $projects[$i]->post_title ?></li>
      <?php
if(!empty($location)): ?>
      <li class="location"><?php echo $location ?></li>
<?php endif ?>
<?php
if(!empty($stage)): ?>
      <li class="stage"><?php echo $stage ?></li>
<?php endif ?>
    </ul><p><?php echo $projects[$i]->post_excerpt?></p></a></div>
  <?php else: ?>
<div class="cell one-third height-50-pct bg-fill-cell" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($projects[$i]->ID)); ?>');"><a href="<?php echo get_permalink($projects[$i]->ID) ?>" class="case-study-link overlay"><ul class="case-study-meta"><li class="client"><?php echo $projects[$i]->post_title ?></li>
 <?php
if(!empty($location)): ?>
      <li class="location"><?php echo $location ?></li>
<?php endif ?>
<?php
if(!empty($stage)): ?>
      <li class="stage"><?php echo $stage ?></li>
<?php endif ?>
<?php
if(!empty($value)): ?>
      <li class="value"><?php echo $value ?></li>
<?php endif ?>


</ul></a></div>
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