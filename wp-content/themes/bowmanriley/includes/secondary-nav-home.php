<section class="secondary-nav">
  <section id="twitter-feed"></section>
  <section id="latest-work">
  <h4>Latest examples of our work</h4>
  <ul>
    <?php
$args = array( 
  'post_type' => 'casestudies',
  'posts_per_page' => 4,
  'meta_key' => 'featured_on_homepage',
  'meta_value' => 'yes',
   'meta_compare' => '=',
  'post_status' => 'publish',
  'orderby' => 'menu_order',
  'order' => 'ASC'
);

if($projects  = get_posts($args)):
foreach($projects as $project):
  $image = wp_get_attachment_image_src(get_post_thumbnail_id($project->ID),'landscape-tn');
  ?>
   <li><a href="<?php echo get_permalink($project->ID)?>" style="background-image:url('<?php echo $image[0]; ?>');" class="bg-fill-cell push-link"></a></li>
   <?
  endforeach;
  endif;
?>

<!--
    <li><a href=""><img src="images/1.jpg" /></a></li><li><a href=""><img src="images/3.jpg" /></a></li><li><a href=""><img src="images/18.jpg" /></a></li><li><a href=""><img src="images/4.jpg" /></a></li>
  --></ul>
</section>

<?php get_template_part('includes/utility-nav'); ?>
</section>