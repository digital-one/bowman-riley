<?php /* Template Name: Row layout with 4 links */ ?>
<?php get_header(); ?>
  <main id="page-wrap" role="main">
  <section class="section <?php echo get_field('theme',$post->ID)?>" data-anchor="<?php echo $post->post_name?>">
<div class="main column width-45-pct" role="main">
 <?php echo $post->post_content ?>
<?php get_template_part('includes/secondary-nav') ?>
<?php if($post->post_parent==0): ?>
<div class="arrow-divide"><a href=""><img src="<?php echo get_template_directory_uri(); ?>/images/arrow-down.svg" /></a></div>
<?php endif ?>
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
  <div class="row height-60-pct bg-fill-cell" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($image_id)); ?>');">
  <?php if($has_case_study): ?>
  <a href="<?php echo get_permalink($cs->ID)?>" class="main overlay push-link <?php echo get_field('theme',$post->ID)?>">
<ul class="case-study-meta">
<li class="client"><?php echo $cs->post_title?></li>
<li class="location"><?php echo get_field('location',$cs->ID) ?></li>
</ul>
<p><?php echo $cs->post_excerpt ?></p>
  </a>
<?php endif ?></div>
  <div class="row height-40-pct">
 <div class="column width-40-pct">
<?php
switch(get_field('link_1_type')){
	case 'page':
	$label = !empty(get_field('link_1_label',$post->ID)) ? get_field('link_1_label',$post->ID) : $page->post_title;
	$permalink = get_field('link_1_page',$post->ID);
	$arrow_direction = 'right';
	$target = "_parent";
	break;
	case 'anchor':
	$post_id = url_to_postid(get_field('link_1_anchor',$post->ID));
	$page = get_post($post_id);
	$label = !empty(get_field('link_1_label',$post->ID)) ? get_field('link_1_label',$post->ID) : $page->post_title;
	if($page->post_parent==0):
		$permalink = get_permalink($page->ID); //if the target page is the parent page
	else:
		$permalink = get_permalink($page->parent); //if the target page is a child page
	endif;
	$permalink = $permalink.'#'.$page->post_name;
	$arrow_direction = get_field('link_1_arrow_direction',$post->ID);
	$target = "_parent";
	break;
	case 'download':
	$permalink = get_field('link_1_file',$post->ID);
	$label = get_field('link_1_label',$post->ID);
	$arrow_direction = 'down';
	$target = "_blank";
	break;
}
?>
 	<a href="<?php echo $permalink ?>" target="<?php echo $target ?>" class="fit-cell <?php echo get_field('theme',$post->ID)?> push-link <?php echo $arrow_direction ?>"><?php echo $label ?></a>

 </div>
 <div class="column width-60-pct">
  <div class="row height-40-pct">
  	<!--link 2-->
<?php
switch(get_field('link_2_type')){
	case 'page':
	$label = !empty(get_field('link_2_label',$post->ID)) ? get_field('link_2_label',$post->ID) : $page->post_title;
	$permalink = get_field('link_2_page',$post->ID);
	$arrow_direction = 'right';
	$target = "_parent";
	break;
	case 'anchor':
	$post_id = url_to_postid(get_field('link_2_anchor',$post->ID));
	$page = get_post($post_id);
	$label = !empty(get_field('link_2_label',$post->ID)) ? get_field('link_2_label',$post->ID) : $page->post_title;
	if($page->post_parent==0):
		$permalink = get_permalink($page->ID); //if the target page is the parent page
	else:
		$permalink = get_permalink($page->parent); //if the target page is a child page
	endif;
	$permalink = $permalink.'#'.$page->post_name;
	$arrow_direction = get_field('link_2_arrow_direction',$post->ID);
	$target = "_parent";
	break;
	case 'download':
	$permalink = get_field('link_2_file',$post->ID);
	$label = get_field('link_2_label',$post->ID);
	$arrow_direction = 'down';
	$target = "_blank";
	break;
}
?>
<a href="<?php echo $permalink ?>" target="<?php echo $target ?>" class="fit-cell grey <?php echo $arrow_direction ?>"><?php echo $label ?></a>
<!--/link 2-->
  </div>
 <div class="row height-60-pct"><div class="column width-55-pct">
 	<!--link 3-->
 	<?php
switch(get_field('link_3_type')){
	case 'page':
	$label = !empty(get_field('link_3_label',$post->ID)) ? get_field('link_3_label',$post->ID) : $page->post_title;
	$permalink = get_field('link_3_page',$post->ID);
	$arrow_direction = 'right';
	$target = "_parent";
	break;
	case 'anchor':
	//$post_id = get_field('link_3_anchor',$post->ID);
	$post_id = url_to_postid(get_field('link_3_anchor',$post->ID));
	$page = get_post($post_id);
	$label = !empty(get_field('link_3_label',$post->ID)) ? get_field('link_3_label',$post->ID) : $page->post_title;
	if($page->post_parent==0):
		$permalink = get_permalink($page->ID); //if the target page is the parent page
	else:
		$permalink = get_permalink($page->parent); //if the target page is a child page
	endif;
	$permalink = $permalink.'#'.$page->post_name;
	$arrow_direction = get_field('link_3_arrow_direction',$post->ID);
	$target = "_parent";
	break;
	case 'download':
	$permalink = get_field('link_3_file',$post->ID);
	$label = get_field('link_3_label',$post->ID);
	$arrow_direction = 'down';
	$target = "_blank";
	break;
}
?>
 	<a href="<?php echo $permalink ?>" target="<?php echo $target ?>" class="fit-cell <?php echo get_field('theme',$post->ID)?> inverted <?php echo $arrow_direction ?>"><?php echo $label ?></a>
 	<!--/link 3-->
 </div><div class="column width-45-pct">
 <!--link 4-->
 <?php
switch(get_field('link_4_type')){
	case 'page':
	$label = !empty(get_field('link_4_label',$post->ID)) ? get_field('link_4_label',$post->ID) : $page->post_title;
	$permalink = get_field('link_4_page',$post->ID);
	$arrow_direction = 'right';
	$target = "_parent";
	break;
	case 'anchor':
	$post_id = url_to_postid(get_field('link_4_anchor',$post->ID));
	$page = get_post($post_id);
	$label = !empty(get_field('link_4_label',$post->ID)) ? get_field('link_4_label',$post->ID) : $page->post_title;
	if($page->post_parent==0):
		$permalink = get_permalink($page->ID); //if the target page is the parent page
	else:
		$permalink = get_permalink($page->parent); //if the target page is a child page
	endif;
	$permalink = $permalink.'#'.$page->post_name;
	$arrow_direction = get_field('link_4_arrow_direction',$post->ID);
	$target = "_parent";
	break;
	case 'download':
	$permalink = get_field('link_4_file',$post->ID);
	$label = get_field('link_4_label',$post->ID);
	$arrow_direction = 'down';
	$target = "_blank";
	break;
}
?>
 <a href="<?php echo $permalink?>" target="<?php echo $target ?>" class="fit-cell white <?php echo $arrow_direction ?>"><?php echo $label ?></a>
<!--/link 4-->
</div></div>
</div>
</div>
</div>
</aside>
</section>
</main>
<?php get_footer(); ?>