<?php get_header() ?>
    <?php 

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
$projects = get_posts($args);
$num_projects = count($projects);
?>
  <main id="page-wrap" role="main">
   <!--case studies-->
<section id="case-studies" data-title="<?php wp_title() ?>" class="<?php if($num_projects > 8): ?>fixed <?php endif ?>section">
<div class="main column width-45-pct" role="main">
 <?php echo $post->post_content ?>
<?php get_template_part('includes/case-studies-nav') ?>
</div>
<aside class="beta column width-55-pct">
  <div class="inner"> 
<?php 
if($num_projects):
?>
<?php switch ($num_projects){ 
  case 1:
    $location = get_field('location',$projects[0]->ID);
    $stage = get_field('stage',$projects[0]->ID);
    $value = get_field('value',$projects[0]->ID);
  ?>
  <div class="cell bg-fill-cell" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($projects[$i]->ID)); ?>');">
<a href="<?php echo get_permalink($projects[$i]->ID) ?>" class="case-study-link overlay"><ul class="case-study-meta"><li class="client"><?php echo $projects[$i]->post_title ?></li>
<?php
if(!empty($location)): ?>
      <li class="location"><?php echo $location ?></li>
<?php endif ?>
<?php
if(!empty($stage)): ?>
      <li class="stage"><?php echo $stage ?></li>
<?php endif ?>
    </ul>
<p><?php echo $projects[$i]->post_excerpt?></p>
  </a></div>
  <?php
  break;

  // 2 case studies
  case 2:
 for($i=0;$i<count($projects);$i++):
    $location = get_field('location',$projects[$i]->ID);
    $stage = get_field('stage',$projects[$i]->ID);
    $value = get_field('value',$projects[$i]->ID);
?>
<div class="row height-50-pct no-gutter masked">
 <div class="cell bg-fill-cell" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($projects[$i]->ID)); ?>');">
<a href="<?php echo get_permalink($projects[$i]->ID) ?>" class="case-study-link overlay"><ul class="case-study-meta"><li class="client"><?php echo $projects[$i]->post_title ?></li>
<?php
if(!empty($location)): ?>
      <li class="location"><?php echo $location ?></li>
<?php endif ?>
<?php
if(!empty($stage)): ?>
      <li class="stage"><?php echo $stage ?></li>
<?php endif ?>
    </ul>
<p><?php echo $projects[$i]->post_excerpt?></p>
  </a></div>
</div>
  <?php endfor; ?>
  <?php
  break;

  //3 case studies
  case 3:
  for($i=0;$i<count($projects);$i++):
    $location = get_field('location',$projects[$i]->ID);
    $stage = get_field('stage',$projects[$i]->ID);
    $value = get_field('value',$projects[$i]->ID);
    if($i==0):
  ?>
<div class="row height-50-pct no-gutter masked">
 <div class="cell bg-fill-cell" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($projects[$i]->ID)); ?>');">
<a href="<?php echo get_permalink($projects[$i]->ID) ?>" class="case-study-link overlay"><ul class="case-study-meta"><li class="client"><?php echo $projects[$i]->post_title ?></li>
<?php
if(!empty($location)): ?>
      <li class="location"><?php echo $location ?></li>
<?php endif ?>
<?php
if(!empty($stage)): ?>
      <li class="stage"><?php echo $stage ?></li>
<?php endif ?>
    </ul>
<p><?php echo $projects[$i]->post_excerpt?></p>
  </a>
</div>
</div>
<div class="row height-50-pct no-gutter masked">
<?php else: ?>
<div class="cell half bg-fill-cell" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($projects[$i]->ID)); ?>');"><a href="<?php echo get_permalink($projects[$i]->ID) ?>" class="case-study-link overlay"><ul class="case-study-meta"><li class="client"><?php echo $projects[$i]->post_title ?></li>
<?php
if(!empty($location)): ?>
      <li class="location"><?php echo $location ?></li>
<?php endif ?>
<?php
if(!empty($stage)): ?>
      <li class="stage"><?php echo $stage ?></li>
<?php endif ?>
    </ul>
<p><?php echo $projects[$i]->post_excerpt?></p>
  </a></div>
<?php endif ?>
<?php endfor ?>
</div>
  <?php
  break;

  //4 case studies
  case 4:
  ?>
    <div class="row height-50-pct no-gutter masked">
    <?php
  for($i=0;$i<count($projects);$i++):
    $location = get_field('location',$projects[$i]->ID);
    $stage = get_field('stage',$projects[$i]->ID);
    $value = get_field('value',$projects[$i]->ID);
    ?>
    <div class="cell half bg-fill-cell" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($projects[$i]->ID)); ?>');"><a href="<?php echo get_permalink($projects[$i]->ID) ?>" class="case-study-link overlay"><ul class="case-study-meta"><li class="client"><?php echo $projects[$i]->post_title ?></li>
<?php
if(!empty($location)): ?>
      <li class="location"><?php echo $location ?></li>
<?php endif ?>
<?php
if(!empty($stage)): ?>
      <li class="stage"><?php echo $stage ?></li>
<?php endif ?>
    </ul>
<p><?php echo $projects[$i]->post_excerpt?></p>
  </a></div>
  <?php if($i==1): ?>
 </div><div class="row height-50-pct no-gutter masked">
<?php endif ?>
  <?php
      endfor;
      ?>
      </div>
  <?php
  break;

  //5 case studies
  case 5:
?>
<div class="row height-50-pct no-gutter masked">
    <?php
  for($i=0;$i<count($projects);$i++):
    $location = get_field('location',$projects[$i]->ID);
    $stage = get_field('stage',$projects[$i]->ID);
    $value = get_field('value',$projects[$i]->ID);
    ?>
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
    </ul>
<p><?php echo $projects[$i]->post_excerpt?></p>
  </a></div>
   <?php if($i==1): ?>
 </div><div class="row height-50-pct no-gutter masked">
<?php endif ?>
    <?php else: ?>
<div class="cell one-third bg-fill-cell" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($projects[$i]->ID)); ?>');"><a href="<?php echo get_permalink($projects[$i]->ID) ?>" class="case-study-link overlay"><ul class="case-study-meta"><li class="client"><?php echo $projects[$i]->post_title ?></li>
<?php
if(!empty($location)): ?>
      <li class="location"><?php echo $location ?></li>
<?php endif ?>
<?php
if(!empty($stage)): ?>
      <li class="stage"><?php echo $stage ?></li>
<?php endif ?>
</ul></a></div>
<?php endif ?>
<?php endfor ?>
</div>
  <?php
  break;

  //6 case studies
  case 6:
  ?>
  <div class="row height-one-third no-gutter masked">
     <?php
  for($i=0;$i<count($projects);$i++):
    $location = get_field('location',$projects[$i]->ID);
    $stage = get_field('stage',$projects[$i]->ID);
    $value = get_field('value',$projects[$i]->ID);
    ?>
    <div class="cell half bg-fill-cell" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($projects[$i]->ID)); ?>');"><a href="<?php echo get_permalink($projects[$i]->ID) ?>" class="case-study-link overlay"><ul class="case-study-meta"><li class="client"><?php echo $projects[$i]->post_title ?></li>
<?php
if(!empty($location)): ?>
      <li class="location"><?php echo $location ?></li>
<?php endif ?>
<?php
if(!empty($stage)): ?>
      <li class="stage"><?php echo $stage ?></li>
<?php endif ?>
    </ul>
<p><?php echo $projects[$i]->post_excerpt?></p>
  </a></div>
  <?php if($i==1 or $i==3): ?>
 </div><div class="row height-one-third no-gutter masked">
  <?php endif; ?>
<?php endfor ?>
<?php
  break;

  //7 case studies
  case 7:
?>
<?php
 for($i=0;$i<count($projects);$i++):
    $location = get_field('location',$projects[$i]->ID);
    $stage = get_field('stage',$projects[$i]->ID);
    $value = get_field('value',$projects[$i]->ID);
    ?>
    <?php if($i==0): ?>
 <div class="row height-one-third no-gutter masked">
<div class="cell bg-fill-cell" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($projects[$i]->ID)); ?>');"><a href="<?php echo get_permalink($projects[$i]->ID) ?>" class="case-study-link overlay"><ul class="case-study-meta"><li class="client"><?php echo $projects[$i]->post_title ?></li>
<?php
if(!empty($location)): ?>
      <li class="location"><?php echo $location ?></li>
<?php endif ?>
<?php
if(!empty($stage)): ?>
      <li class="stage"><?php echo $stage ?></li>
<?php endif ?>
    </ul>
<p><?php echo $projects[$i]->post_excerpt?></p>
  </a></div>
 </div>
 <div class="row height-one-third no-gutter masked">
 <?php elseif($i>0): ?>
<div class="cell half bg-fill-cell" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($projects[$i]->ID)); ?>');"><a href="<?php echo get_permalink($projects[$i]->ID) ?>" class="case-study-link overlay"><ul class="case-study-meta"><li class="client"><?php echo $projects[$i]->post_title ?></li>
<?php
if(!empty($location)): ?>
      <li class="location"><?php echo $location ?></li>
<?php endif ?>
<?php
if(!empty($stage)): ?>
      <li class="stage"><?php echo $stage ?></li>
<?php endif ?>
    </ul>
<p><?php echo $projects[$i]->post_excerpt?></p>
  </a></div>
  <?php if($i==2): ?>
</div><div class="row height-one-third no-gutter masked">
<?php endif ?>
<?php elseif($i>2): ?>
<div class="cell one-third bg-fill-cell" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($projects[$i]->ID)); ?>');"><a href="<?php echo get_permalink($projects[$i]->ID) ?>" class="case-study-link overlay"><ul class="case-study-meta"><li class="client"><?php echo $projects[$i]->post_title ?></li>
<?php
if(!empty($location)): ?>
      <li class="location"><?php echo $location ?></li>
<?php endif ?>
<?php
if(!empty($stage)): ?>
      <li class="stage"><?php echo $stage ?></li>
<?php endif ?>
    </ul>
  </a></div>
<?php endif ?>
<?php endfor ?>
</div>
  <?php
  break;
  default:
?>
<div class="row height-45-pct no-gutter masked">
  <?php
 for($i=0;$i<count($projects);$i++):
    $location = get_field('location',$projects[$i]->ID);
    $stage = get_field('stage',$projects[$i]->ID);
    $value = get_field('value',$projects[$i]->ID);
    ?>
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
    </ul>
<p><?php echo $projects[$i]->post_excerpt?></p>
  </a></div>
  <?php if($i==1): ?>
 </div>  <div class="row height-55-pct no-gutter">
<?php endif ?>
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
</ul></a></div>
  <?php endif ?>
<?php endfor ?>
</div>
<?php
  break;
}
?>
<?php endif ?>
</div>
</aside>
  </section>
   <!--/case studies-->

</main>
<?php get_footer() ?>